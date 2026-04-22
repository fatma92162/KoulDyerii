<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIQuizGeneratorService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface     $logger,
        private ?string             $openAiApiKey = null
    ) {
    }

    /**
     * Génère $count questions variées pour une formation.
     * - Prompt enrichi avec angle pédagogique aléatoire pour éviter la répétition IA
     * - Vérification stricte d'unicité (hash MD5 du texte normalisé)
     * - Vérification unicité des réponses dans chaque question
     * - Fallback sur mockQuestions si l'IA échoue ou si la clé est absente
     *
     * @return array<int, array{question: string, answers: array<int, array{text: string, isCorrect: bool}>}>
     */
    public function generateQuestions(string $formationTitle, string $formationDescription, int $count = 5): array
    {
        $count = max(1, $count);

        if (trim((string) $this->openAiApiKey) === '') {
            $this->logger->info('[AIQuiz] Clé OpenAI absente – utilisation des questions factices.');
            return $this->mockQuestions($formationTitle, $formationDescription, $count);
        }

        // ✅ Angle pédagogique aléatoire pour varier les questions à chaque appel
        $angles = [
            'théorie et définitions',
            'application pratique et cas concrets',
            'analyse et comparaison de concepts',
            'bonnes pratiques et erreurs courantes',
            'compréhension approfondie et nuances',
        ];
        shuffle($angles);
        $selectedAngles = implode(', ', array_slice($angles, 0, 3));

        // ✅ Seed temporelle pour forcer la diversité
        $seed = substr(md5(uniqid((string) mt_rand(), true)), 0, 8);

        $prompt = sprintf(
            "Référence unique : %s\n"
            . "Crée EXACTEMENT %d questions à choix multiples DIFFÉRENTES sur cette formation.\n"
            . "Titre : %s\nDescription : %s\n"
            . "Angles pédagogiques à couvrir : %s\n"
            . "RÈGLES STRICTES :\n"
            . "- Chaque question doit être UNIQUE et ne jamais se répéter\n"
            . "- Chaque question a EXACTEMENT 4 réponses différentes\n"
            . "- UNE SEULE réponse est isCorrect=true par question\n"
            . "- Les 3 autres réponses fausses doivent être plausibles mais incorrectes\n"
            . "- Varier les formulations : 'Qu'est-ce que', 'Pourquoi', 'Comment', 'Lequel', 'Quelle est la différence', etc.\n"
            . "Réponds UNIQUEMENT en JSON valide avec un tableau nommé \"questions\".\n"
            . "Format : {\"questions\": [{\"question\": \"...\", \"answers\": [{\"text\": \"...\", \"isCorrect\": true/false}]}]}",
            $seed,
            $count,
            $formationTitle,
            $formationDescription,
            $selectedAngles
        );

        try {
            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->openAiApiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'           => 'gpt-4o-mini',
                    'temperature'     => 1.0,  // ✅ Température haute pour plus de diversité
                    'top_p'           => 0.95,
                    'response_format' => ['type' => 'json_object'],
                    'messages'        => [
                        [
                            'role'    => 'system',
                            'content' => 'Tu es un expert pédagogique. Tu crées des questions de quiz e-learning variées, jamais répétitives, toujours pertinentes. Tu réponds uniquement en JSON valide.',
                        ],
                        ['role' => 'user', 'content' => $prompt],
                    ],
                ],
                'timeout' => 30,
            ]);

            $payload = $response->toArray(false);
            $raw     = $payload['choices'][0]['message']['content'] ?? '';

            $this->logger->debug('[AIQuiz] Réponse brute OpenAI : {raw}', ['raw' => mb_substr($raw, 0, 500)]);

            $decoded = json_decode($raw, true);
            $items   = $decoded['questions'] ?? (is_array($decoded) ? $decoded : []);

            if (!is_array($items) || $items === []) {
                $this->logger->warning('[AIQuiz] Réponse OpenAI invalide ou vide – fallback mock.');
                return $this->mockQuestions($formationTitle, $formationDescription, $count);
            }

            $normalized = array_map(
                static function (array $item): array {
                    $rawAnswers = (array) ($item['answers'] ?? []);

                    // Normaliser les réponses (garde isCorrect intact)
                    $answers = array_slice(array_map(static function (array $a): array {
                        return [
                            'text'      => trim((string) ($a['text'] ?? 'Réponse')),
                            'isCorrect' => (bool) ($a['isCorrect'] ?? false),
                        ];
                    }, $rawAnswers), 0, 4);

                    // Compléter à 4 si besoin
                    while (count($answers) < 4) {
                        $answers[] = ['text' => 'Autre option', 'isCorrect' => false];
                    }

                    // S'assurer qu'EXACTEMENT une réponse est correcte
                    $correctCount = count(array_filter($answers, fn($a) => $a['isCorrect']));
                    if ($correctCount === 0) {
                        $answers[0]['isCorrect'] = true;
                    } elseif ($correctCount > 1) {
                        $found = false;
                        foreach ($answers as &$a) {
                            if ($a['isCorrect']) {
                                if ($found) {
                                    $a['isCorrect'] = false;
                                }
                                $found = true;
                            }
                        }
                        unset($a);
                    }

                    return [
                        'question' => trim((string) ($item['question'] ?? 'Question générée')),
                        'answers'  => $answers,
                    ];
                },
                array_slice($items, 0, $count * 2)
            );

            $result = $this->uniqueQuestions($normalized, $count, $formationTitle, $formationDescription);

            $this->logger->info('[AIQuiz] {count} questions uniques générées via OpenAI pour "{title}".', [
                'count' => count($result),
                'title' => $formationTitle,
            ]);

            return $result;
        } catch (\Throwable $e) {
            $this->logger->error('[AIQuiz] Erreur OpenAI : {msg} – fallback mock.', ['msg' => $e->getMessage()]);
            return $this->mockQuestions($formationTitle, $formationDescription, $count);
        }
    }

    /**
     * Retourne des points forts / faibles selon le score.
     *
     * @return array{strengths: array<int, string>, weaknesses: array<int, string>}
     */
    public function generateFeedback(float $score): array
    {
        if ($score >= 85) {
            return [
                'strengths'  => ['Excellente compréhension globale', 'Maîtrise parfaite des notions clés'],
                'weaknesses' => ['Continuez à pratiquer pour maintenir ce niveau'],
            ];
        }

        if ($score >= 80) {
            return [
                'strengths'  => ['Bon niveau général', 'Seuil de certification atteint !'],
                'weaknesses' => ['Quelques points avancés à approfondir', 'Pratiquer sur des cas concrets'],
            ];
        }

        if ($score >= 60) {
            return [
                'strengths'  => ['Bonne base de connaissances', 'Motivation à poursuivre'],
                'weaknesses' => ['Revoir les notions avancées', 'Score insuffisant pour la certification (seuil : 80%)'],
            ];
        }

        return [
            'strengths'  => ['Motivation à apprendre reconnaissable'],
            'weaknesses' => [
                'Revoir les fondamentaux',
                'Refaire le quiz après des révisions ciblées',
                'Seuil de certification non atteint (80% requis)',
            ],
        ];
    }

    /**
     * Questions factices variées — jamais répétées grâce au hash MD5.
     *
     * @return array<int, array{question: string, answers: array<int, array{text: string, isCorrect: bool}>}>
     */
    private function mockQuestions(string $title, string $description, int $count): array
    {
        $topic   = trim($title) !== '' ? $title : 'la formation';
        $snippet = mb_substr(trim($description), 0, 60);
        if ($snippet === '') {
            $snippet = 'les objectifs pédagogiques';
        }

        $templates = [
            [
                'question' => sprintf('Quel est l\'objectif principal de la formation "%s" ?', $topic),
                'correct'  => sprintf('Acquérir les compétences pratiques en %s', $snippet),
                'wrongs'   => ['Éviter toute évaluation', 'Ignorer les bonnes pratiques', 'Ne pas appliquer les notions'],
            ],
            [
                'question' => sprintf('Quelle compétence développe-t-on principalement dans "%s" ?', $topic),
                'correct'  => 'La maîtrise des concepts fondamentaux du domaine',
                'wrongs'   => ['La gestion des stocks', 'Le marketing digital uniquement', 'La conception graphique'],
            ],
            [
                'question' => sprintf('Pourquoi la formation "%s" est-elle importante ?', $topic),
                'correct'  => sprintf('Elle permet de comprendre et appliquer : %s', $snippet),
                'wrongs'   => ['Elle n\'a pas d\'utilité pratique', 'Elle est uniquement théorique', 'Elle ne couvre pas les bases'],
            ],
            [
                'question' => sprintf('Quelle est la meilleure approche pour réussir "%s" ?', $topic),
                'correct'  => 'Étudier régulièrement et appliquer les connaissances progressivement',
                'wrongs'   => ['Mémoriser sans comprendre', 'Ignorer les exercices pratiques', 'Sauter les chapitres difficiles'],
            ],
            [
                'question' => sprintf('Quelle méthode est recommandée dans "%s" ?', $topic),
                'correct'  => 'Approche progressive avec mise en pratique régulière',
                'wrongs'   => ['Apprentissage passif uniquement', 'Copier sans comprendre', 'Aucune méthode particulière'],
            ],
            [
                'question' => sprintf('Quel résultat peut-on attendre à la fin de "%s" ?', $topic),
                'correct'  => 'Une maîtrise opérationnelle des concepts enseignés',
                'wrongs'   => ['Aucun bénéfice mesurable', 'Un niveau identique au départ', 'Des connaissances hors-sujet'],
            ],
            [
                'question' => sprintf('Comment évalue-t-on les acquis de la formation "%s" ?', $topic),
                'correct'  => 'Par un quiz final avec score et certification si ≥ 80%',
                'wrongs'   => ['Par un simple dépôt de devoir', 'Sans aucune évaluation', 'Par un examen oral uniquement'],
            ],
            [
                'question' => sprintf('Quelle notion est centrale dans la formation "%s" ?', $topic),
                'correct'  => sprintf('La compréhension appliquée de : %s', $snippet),
                'wrongs'   => ['La répétition mécanique', 'L\'abstraction théorique seule', 'La non-pratique'],
            ],
        ];

        $items = [];
        $seen  = [];

        foreach ($templates as $tpl) {
            if (count($items) >= $count) {
                break;
            }

            // ✅ Normalisation avant comparaison pour détecter les doublons
            $key = md5(mb_strtolower(trim((string) preg_replace('/\s+/', ' ', $tpl['question']))));
            if (isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;

            $answers = [
                ['text' => $tpl['correct'],    'isCorrect' => true],
                ['text' => $tpl['wrongs'][0],  'isCorrect' => false],
                ['text' => $tpl['wrongs'][1],  'isCorrect' => false],
                ['text' => $tpl['wrongs'][2],  'isCorrect' => false],
            ];

            // ✅ Mélanger pour que la bonne réponse ne soit pas toujours en premier
            shuffle($answers);

            $items[] = [
                'question' => $tpl['question'],
                'answers'  => $answers,
            ];
        }

        return $items;
    }

    /**
     * Filtre les doublons d'une liste de questions.
     * Complète avec des questions mock si la liste est trop courte.
     *
     * @param array<int, array{question: string, answers: array<int, array{text: string, isCorrect: bool}>}> $items
     * @return array<int, array{question: string, answers: array<int, array{text: string, isCorrect: bool}>}>
     */
    private function uniqueQuestions(array $items, int $count, string $title, string $description): array
    {
        $seen   = [];
        $unique = [];

        foreach ($items as $item) {
            // ✅ Normalisation complète : trim, minuscules, espaces multiples → 1 espace
            $key = md5(mb_strtolower(trim((string) preg_replace('/\s+/', ' ', $item['question']))));

            if (isset($seen[$key])) {
                $this->logger->debug('[AIQuiz] Question dupliquée ignorée : {q}', ['q' => mb_substr($item['question'], 0, 80)]);
                continue;
            }

            // ✅ Vérifier que les réponses de la question ne sont pas dupliquées entre elles
            $answerHashes = array_map(
                fn($a) => md5(mb_strtolower(trim($a['text']))),
                $item['answers']
            );
            if (count(array_unique($answerHashes)) < count($item['answers'])) {
                $this->logger->debug('[AIQuiz] Réponses dupliquées dans la question – ignorée.');
                continue;
            }

            $seen[$key] = true;
            $unique[]   = $item;

            if (count($unique) >= $count) {
                break;
            }
        }

        // ✅ Compléter avec des questions mock si l'IA n'a pas fourni assez de questions uniques
        if (count($unique) < $count) {
            $this->logger->warning('[AIQuiz] Questions uniques insuffisantes ({got}/{need}) – complétion avec mock.', [
                'got'  => count($unique),
                'need' => $count,
            ]);

            foreach ($this->mockQuestions($title, $description, $count * 2) as $fallback) {
                $key = md5(mb_strtolower(trim((string) preg_replace('/\s+/', ' ', $fallback['question']))));
                if (isset($seen[$key])) {
                    continue;
                }
                $seen[$key] = true;
                $unique[]   = $fallback;

                if (count($unique) >= $count) {
                    break;
                }
            }
        }

        return array_slice($unique, 0, $count);
    }
}

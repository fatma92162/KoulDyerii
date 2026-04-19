<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* formations/quiz.html.twig */
class __TwigTemplate_fc225d92d4e01ed483c12d245c8546fa extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "formations/quiz.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Quiz — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<style>
    .quiz-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-bottom: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quiz-timer-wrapper {
        text-align: center;
    }

    .quiz-timer {
        font-size: 36px;
        font-weight: 800;
        font-variant-numeric: tabular-nums;
        letter-spacing: 2px;
    }

    .quiz-timer.warning { color: #ffd700; }
    .quiz-timer.danger  { color: #ff4444; animation: pulse 1s infinite; }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    .question-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        border-left: 5px solid #8B0000;
        transition: box-shadow 0.2s ease;
    }

    .question-card:hover { box-shadow: 0 6px 20px rgba(139,0,0,0.12); }

    .question-number {
        font-size: 12px;
        font-weight: 700;
        color: #8B0000;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .question-text {
        font-size: 17px;
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 16px;
    }

    .answer-option {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border: 2px solid #e8d5b7;
        border-radius: 12px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #fffaf5;
    }

    .answer-option:hover {
        border-color: #8B0000;
        background: #fff8f0;
        transform: translateX(4px);
    }

    .answer-option input[type=\"radio\"] {
        width: 18px;
        height: 18px;
        accent-color: #8B0000;
        cursor: pointer;
        flex-shrink: 0;
    }

    .answer-option:has(input:checked) {
        border-color: #8B0000;
        background: #fff0f0;
        font-weight: 600;
    }

    .quiz-progress {
        background: #e9ecef;
        border-radius: 999px;
        height: 8px;
        margin-bottom: 24px;
        overflow: hidden;
    }

    .quiz-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #8B0000, #A52A2A);
        border-radius: 999px;
        transition: width 0.4s ease;
    }

    .btn-submit-quiz {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 48px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(139,0,0,0.3);
    }

    .btn-submit-quiz:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(139,0,0,0.4);
    }

    .answered-count {
        font-size: 14px;
        color: #6c757d;
        text-align: center;
        margin-top: 8px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 142
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 143
        yield "<div class=\"container py-4\">

    ";
        // line 146
        yield "    <div class=\"quiz-header\">
        <div>
            <h2 class=\"mb-1 fw-bold\">📝 ";
        // line 148
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 148, $this->source); })()), "titre", [], "any", false, false, false, 148), "html", null, true);
        yield "</h2>
            <p class=\"mb-0 opacity-75\">";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 149, $this->source); })())), "html", null, true);
        yield " question";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 149, $this->source); })())) > 1)) ? ("s") : (""));
        yield " — Répondez à toutes avant la fin du temps</p>
        </div>
        <div class=\"quiz-timer-wrapper\">
            <div class=\"quiz-timer\" id=\"quiz-timer\"></div>
            <div style=\"font-size: 12px; opacity: 0.8; margin-top: 4px;\">⏱ Temps restant</div>
        </div>
    </div>

    ";
        // line 158
        yield "    <div class=\"quiz-progress mb-3\">
        <div class=\"quiz-progress-fill\" id=\"answer-progress\" style=\"width: 0%\"></div>
    </div>
    <p class=\"answered-count\" id=\"answered-count\">0 / ";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 161, $this->source); })())), "html", null, true);
        yield " réponses</p>

    ";
        // line 164
        yield "    <form method=\"post\"
          action=\"";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_quiz_submit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 165, $this->source); })()), "idFormation", [], "any", false, false, false, 165)]), "html", null, true);
        yield "\"
          id=\"quiz-form\">

        ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 168, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 169
            yield "            <div class=\"question-card\" id=\"qcard-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 169), "html", null, true);
            yield "\">
                <div class=\"question-number\">Question ";
            // line 170
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 170), "html", null, true);
            yield " / ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 170, $this->source); })())), "html", null, true);
            yield "</div>
                <div class=\"question-text\">";
            // line 171
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "content", [], "any", false, false, false, 171), "html", null, true);
            yield "</div>

                ";
            // line 173
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "answers", [], "any", false, false, false, 173));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                // line 174
                yield "                    <label class=\"answer-option\" for=\"answer_";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 174), "html", null, true);
                yield "\">
                        <input type=\"radio\"
                               name=\"answers[";
                // line 176
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 176), "html", null, true);
                yield "]\"
                               id=\"answer_";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 177), "html", null, true);
                yield "\"
                               value=\"";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "id", [], "any", false, false, false, 178), "html", null, true);
                yield "\"
                               data-qindex=\"";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 179), "loop", [], "any", false, false, false, 179), "index", [], "any", false, false, false, 179), "html", null, true);
                yield "\"
                               class=\"radio-answer\">
                        <span>";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["answer"], "content", [], "any", false, false, false, 181), "html", null, true);
                yield "</span>
                    </label>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 184
            yield "            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        yield "
        <div class=\"text-center mt-4\">
            <button type=\"submit\" class=\"btn-submit-quiz\" id=\"submit-btn\">
                <i class=\"fas fa-check-circle me-2\"></i> Soumettre le quiz
            </button>
            <p class=\"text-muted small mt-3\">
                <i class=\"fas fa-info-circle me-1\"></i>
                Assurez-vous de répondre à toutes les questions avant de soumettre.
            </p>
        </div>
    </form>

</div>

<script>
(function () {
    const totalQuestions = ";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 202, $this->source); })())), "html", null, true);
        yield ";
    let remaining = ";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 203, $this->source); })()), "duration", [], "any", false, false, false, 203), "html", null, true);
        yield ";
    const timerEl   = document.getElementById('quiz-timer');
    const progressEl = document.getElementById('answer-progress');
    const countEl   = document.getElementById('answered-count');
    const form      = document.getElementById('quiz-form');

    // ── Compte à rebours ──
    function render() {
        const m = Math.floor(remaining / 60);
        const s = remaining % 60;
        timerEl.textContent = `\${m}:\${String(s).padStart(2, '0')}`;

        timerEl.classList.remove('warning', 'danger');
        if (remaining <= 30) {
            timerEl.classList.add('danger');
        } else if (remaining <= 60) {
            timerEl.classList.add('warning');
        }
    }

    render();
    const interval = setInterval(() => {
        remaining--;
        render();
        if (remaining <= 0) {
            clearInterval(interval);
            form.submit();
        }
    }, 1000);

    // ── Suivi des réponses ──
    const answered = new Set();
    document.querySelectorAll('.radio-answer').forEach(radio => {
        radio.addEventListener('change', function () {
            answered.add(this.dataset.qindex);
            const pct = (answered.size / totalQuestions) * 100;
            progressEl.style.width = pct + '%';
            countEl.textContent = `\${answered.size} / \${totalQuestions} réponse\${answered.size > 1 ? 's' : ''}`;
        });
    });

    // ── Confirmation si réponses manquantes ──
    form.addEventListener('submit', function (e) {
        if (answered.size < totalQuestions) {
            if (!confirm(`Vous n'avez répondu qu'à \${answered.size} question(s) sur \${totalQuestions}. Soumettre quand même ?`)) {
                e.preventDefault();
            }
        }
    });
})();
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "formations/quiz.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  411 => 203,  407 => 202,  389 => 186,  374 => 184,  357 => 181,  352 => 179,  348 => 178,  344 => 177,  340 => 176,  334 => 174,  317 => 173,  312 => 171,  306 => 170,  301 => 169,  284 => 168,  278 => 165,  275 => 164,  270 => 161,  265 => 158,  252 => 149,  248 => 148,  244 => 146,  240 => 143,  230 => 142,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Quiz — {{ formation.titre }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .quiz-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-bottom: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quiz-timer-wrapper {
        text-align: center;
    }

    .quiz-timer {
        font-size: 36px;
        font-weight: 800;
        font-variant-numeric: tabular-nums;
        letter-spacing: 2px;
    }

    .quiz-timer.warning { color: #ffd700; }
    .quiz-timer.danger  { color: #ff4444; animation: pulse 1s infinite; }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    .question-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        border-left: 5px solid #8B0000;
        transition: box-shadow 0.2s ease;
    }

    .question-card:hover { box-shadow: 0 6px 20px rgba(139,0,0,0.12); }

    .question-number {
        font-size: 12px;
        font-weight: 700;
        color: #8B0000;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .question-text {
        font-size: 17px;
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 16px;
    }

    .answer-option {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border: 2px solid #e8d5b7;
        border-radius: 12px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #fffaf5;
    }

    .answer-option:hover {
        border-color: #8B0000;
        background: #fff8f0;
        transform: translateX(4px);
    }

    .answer-option input[type=\"radio\"] {
        width: 18px;
        height: 18px;
        accent-color: #8B0000;
        cursor: pointer;
        flex-shrink: 0;
    }

    .answer-option:has(input:checked) {
        border-color: #8B0000;
        background: #fff0f0;
        font-weight: 600;
    }

    .quiz-progress {
        background: #e9ecef;
        border-radius: 999px;
        height: 8px;
        margin-bottom: 24px;
        overflow: hidden;
    }

    .quiz-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #8B0000, #A52A2A);
        border-radius: 999px;
        transition: width 0.4s ease;
    }

    .btn-submit-quiz {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 48px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(139,0,0,0.3);
    }

    .btn-submit-quiz:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(139,0,0,0.4);
    }

    .answered-count {
        font-size: 14px;
        color: #6c757d;
        text-align: center;
        margin-top: 8px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-4\">

    {# ── En-tête avec timer ── #}
    <div class=\"quiz-header\">
        <div>
            <h2 class=\"mb-1 fw-bold\">📝 {{ formation.titre }}</h2>
            <p class=\"mb-0 opacity-75\">{{ questions|length }} question{{ questions|length > 1 ? 's' : '' }} — Répondez à toutes avant la fin du temps</p>
        </div>
        <div class=\"quiz-timer-wrapper\">
            <div class=\"quiz-timer\" id=\"quiz-timer\"></div>
            <div style=\"font-size: 12px; opacity: 0.8; margin-top: 4px;\">⏱ Temps restant</div>
        </div>
    </div>

    {# ── Barre de progression des réponses ── #}
    <div class=\"quiz-progress mb-3\">
        <div class=\"quiz-progress-fill\" id=\"answer-progress\" style=\"width: 0%\"></div>
    </div>
    <p class=\"answered-count\" id=\"answered-count\">0 / {{ questions|length }} réponses</p>

    {# ── Formulaire quiz ── #}
    <form method=\"post\"
          action=\"{{ path('app_formations_quiz_submit', {id: formation.idFormation}) }}\"
          id=\"quiz-form\">

        {% for question in questions %}
            <div class=\"question-card\" id=\"qcard-{{ loop.index }}\">
                <div class=\"question-number\">Question {{ loop.index }} / {{ questions|length }}</div>
                <div class=\"question-text\">{{ question.content }}</div>

                {% for answer in question.answers %}
                    <label class=\"answer-option\" for=\"answer_{{ answer.id }}\">
                        <input type=\"radio\"
                               name=\"answers[{{ question.id }}]\"
                               id=\"answer_{{ answer.id }}\"
                               value=\"{{ answer.id }}\"
                               data-qindex=\"{{ loop.parent.loop.index }}\"
                               class=\"radio-answer\">
                        <span>{{ answer.content }}</span>
                    </label>
                {% endfor %}
            </div>
        {% endfor %}

        <div class=\"text-center mt-4\">
            <button type=\"submit\" class=\"btn-submit-quiz\" id=\"submit-btn\">
                <i class=\"fas fa-check-circle me-2\"></i> Soumettre le quiz
            </button>
            <p class=\"text-muted small mt-3\">
                <i class=\"fas fa-info-circle me-1\"></i>
                Assurez-vous de répondre à toutes les questions avant de soumettre.
            </p>
        </div>
    </form>

</div>

<script>
(function () {
    const totalQuestions = {{ questions|length }};
    let remaining = {{ quiz.duration }};
    const timerEl   = document.getElementById('quiz-timer');
    const progressEl = document.getElementById('answer-progress');
    const countEl   = document.getElementById('answered-count');
    const form      = document.getElementById('quiz-form');

    // ── Compte à rebours ──
    function render() {
        const m = Math.floor(remaining / 60);
        const s = remaining % 60;
        timerEl.textContent = `\${m}:\${String(s).padStart(2, '0')}`;

        timerEl.classList.remove('warning', 'danger');
        if (remaining <= 30) {
            timerEl.classList.add('danger');
        } else if (remaining <= 60) {
            timerEl.classList.add('warning');
        }
    }

    render();
    const interval = setInterval(() => {
        remaining--;
        render();
        if (remaining <= 0) {
            clearInterval(interval);
            form.submit();
        }
    }, 1000);

    // ── Suivi des réponses ──
    const answered = new Set();
    document.querySelectorAll('.radio-answer').forEach(radio => {
        radio.addEventListener('change', function () {
            answered.add(this.dataset.qindex);
            const pct = (answered.size / totalQuestions) * 100;
            progressEl.style.width = pct + '%';
            countEl.textContent = `\${answered.size} / \${totalQuestions} réponse\${answered.size > 1 ? 's' : ''}`;
        });
    });

    // ── Confirmation si réponses manquantes ──
    form.addEventListener('submit', function (e) {
        if (answered.size < totalQuestions) {
            if (!confirm(`Vous n'avez répondu qu'à \${answered.size} question(s) sur \${totalQuestions}. Soumettre quand même ?`)) {
                e.preventDefault();
            }
        }
    });
})();
</script>
{% endblock %}
", "formations/quiz.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\formations\\quiz.html.twig");
    }
}

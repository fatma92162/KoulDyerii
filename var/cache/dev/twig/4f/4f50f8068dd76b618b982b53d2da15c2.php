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

/* formations/mes_inscriptions.html.twig */
class __TwigTemplate_b5583c4a38584fca756b72b4baa72e7a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "formations/mes_inscriptions.html.twig"));

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

        yield "Mes inscriptions - Koul Dyeri";
        
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
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    
    .inscription-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border: 1px solid #E8D5B7;
    }
    
    .inscription-card:hover {
        transform: translateY(-5px);
    }
    
    .inscription-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 15px 20px;
    }
    
    .btn-annuler {
        background: #dc3545;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        border: 1px solid #E8D5B7;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 66
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 67
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-calendar-check\"></i> Mes inscriptions</h1>
        <p class=\"lead\">Suivez vos formations en cours</p>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 75, $this->source); })()), "flashes", ["success"], "method", false, false, false, 75));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 76
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "    
    ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "flashes", ["error"], "method", false, false, false, 82));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 83
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "    
    ";
        // line 89
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["inscriptions"]) || array_key_exists("inscriptions", $context) ? $context["inscriptions"] : (function () { throw new RuntimeError('Variable "inscriptions" does not exist.', 89, $this->source); })())) > 0)) {
            // line 90
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["inscriptions"]) || array_key_exists("inscriptions", $context) ? $context["inscriptions"] : (function () { throw new RuntimeError('Variable "inscriptions" does not exist.', 90, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["inscription"]) {
                // line 91
                yield "            ";
                if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "formation", [], "any", false, false, false, 91))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 92
                    yield "            <div class=\"inscription-card\">
                <div class=\"inscription-header\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <h5 class=\"mb-0\">";
                    // line 95
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "formation", [], "any", false, false, false, 95), "titre", [], "any", false, false, false, 95), "html", null, true);
                    yield "</h5>
                        ";
                    // line 97
                    yield "                        ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 97) == "acceptee")) {
                        // line 98
                        yield "                            <span class=\"badge bg-success\">✅ Acceptée</span>
                        ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 99
$context["inscription"], "statut", [], "any", false, false, false, 99) == "refusee")) {
                        // line 100
                        yield "                            <span class=\"badge bg-danger\">❌ Refusée</span>
                        ";
                    } else {
                        // line 102
                        yield "                            <span class=\"badge bg-warning text-dark\">⏳ En attente</span>
                        ";
                    }
                    // line 104
                    yield "                    </div>
                </div>
                <div class=\"p-4\">
                    <div class=\"row\">
                        <div class=\"col-md-8\">
                            <p class=\"text-muted\">";
                    // line 109
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "formation", [], "any", false, false, false, 109), "description", [], "any", false, false, false, 109), 0, 150), "html", null, true);
                    yield "...</p>
                            <p><strong>Date d'inscription :</strong> ";
                    // line 110
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "dateInscription", [], "any", false, false, false, 110), "d/m/Y H:i"), "html", null, true);
                    yield "</p>
                            <p><strong>Prix :</strong> ";
                    // line 111
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "formation", [], "any", false, false, false, 111), "prix", [], "any", false, false, false, 111), 2, ",", " "), "html", null, true);
                    yield " €</p>
                            <p><strong>Statut :</strong>
                                ";
                    // line 113
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 113) == "acceptee")) {
                        // line 114
                        yield "                                    <span class=\"badge bg-success\">✅ Inscription acceptée</span>
                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 115
$context["inscription"], "statut", [], "any", false, false, false, 115) == "refusee")) {
                        // line 116
                        yield "                                    <span class=\"badge bg-danger\">❌ Inscription refusée</span>
                                    <small class=\"text-muted d-block mt-1\">Contactez l'administrateur pour plus d'informations.</small>
                                ";
                    } else {
                        // line 119
                        yield "                                    <span class=\"badge bg-warning text-dark\">⏳ En attente de validation</span>
                                    <small class=\"text-muted d-block mt-1\">Un administrateur validera votre demande prochainement.</small>
                                ";
                    }
                    // line 122
                    yield "                            </p>

                            ";
                    // line 125
                    yield "                            ";
                    $context["lastQuiz"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["quizResults"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idFormation", [], "any", false, false, false, 125), [], "array", true, true, false, 125) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["quizResults"]) || array_key_exists("quizResults", $context) ? $context["quizResults"] : (function () { throw new RuntimeError('Variable "quizResults" does not exist.', 125, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idFormation", [], "any", false, false, false, 125), [], "array", false, false, false, 125)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["quizResults"]) || array_key_exists("quizResults", $context) ? $context["quizResults"] : (function () { throw new RuntimeError('Variable "quizResults" does not exist.', 125, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idFormation", [], "any", false, false, false, 125), [], "array", false, false, false, 125)) : (null));
                    // line 126
                    yield "                            ";
                    if ((($tmp = (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 126, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 127
                        yield "                                ";
                        $context["passed"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 127, $this->source); })()), "percentage", [], "any", false, false, false, 127) >= 80);
                        // line 128
                        yield "                                <div class=\"mt-2 p-3 rounded border-start border-4 ";
                        yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 128, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("border-success bg-success bg-opacity-10") : ("border-warning bg-warning bg-opacity-10"));
                        yield "\">
                                    <div class=\"d-flex align-items-center gap-2 flex-wrap\">
                                        <strong>📊 Dernier quiz :</strong>
                                        <span class=\"fw-bold fs-5 ";
                        // line 131
                        yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 131, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("text-success") : ("text-warning"));
                        yield "\">
                                            ";
                        // line 132
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 132, $this->source); })()), "percentage", [], "any", false, false, false, 132), 0), "html", null, true);
                        yield "%
                                        </span>
                                        <small class=\"text-muted\">
                                            (";
                        // line 135
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 135, $this->source); })()), "score", [], "any", false, false, false, 135), "html", null, true);
                        yield "/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 135, $this->source); })()), "totalQuestions", [], "any", false, false, false, 135), "html", null, true);
                        yield " — ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 135, $this->source); })()), "submittedAt", [], "any", false, false, false, 135), "d/m/Y"), "html", null, true);
                        yield ")
                                        </small>
                                    </div>
                                    ";
                        // line 138
                        if ((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 138, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 139
                            yield "                                        <div class=\"mt-1\">
                                            <span class=\"badge bg-success\">🎓 Certification obtenue</span>
                                            ";
                            // line 141
                            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 141, $this->source); })()), "certificate", [], "any", false, false, false, 141)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                // line 142
                                yield "                                                <a href=\"";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastQuiz"]) || array_key_exists("lastQuiz", $context) ? $context["lastQuiz"] : (function () { throw new RuntimeError('Variable "lastQuiz" does not exist.', 142, $this->source); })()), "certificate", [], "any", false, false, false, 142), "id", [], "any", false, false, false, 142)]), "html", null, true);
                                yield "\"
                                                   class=\"badge bg-primary ms-1 text-decoration-none\">
                                                    📄 Voir le certificat
                                                </a>
                                            ";
                            }
                            // line 147
                            yield "                                        </div>
                                    ";
                        } else {
                            // line 149
                            yield "                                        <div class=\"mt-1\">
                                            <span class=\"badge bg-warning text-dark\">⚠️ Certification non obtenue — seuil : 80%</span>
                                        </div>
                                    ";
                        }
                        // line 153
                        yield "                                </div>
                            ";
                    } else {
                        // line 155
                        yield "                                <p class=\"text-muted small mt-2 mb-0\">
                                    <i class=\"fas fa-circle-info me-1\"></i> Aucun quiz passé pour cette formation.
                                </p>
                            ";
                    }
                    // line 159
                    yield "                        </div>
                        <div class=\"col-md-4 text-end\">
                            <a href=\"";
                    // line 161
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idFormation", [], "any", false, false, false, 161)]), "html", null, true);
                    yield "\" class=\"btn btn-primary mb-2 w-100\">
                                <i class=\"fas fa-eye\"></i> Voir la formation
                            </a>
                            ";
                    // line 165
                    yield "                            ";
                    if (((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 165) == "acceptee") &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "formation", [], "any", false, false, false, 165), "quiz", [], "any", false, false, false, 165)))) {
                        // line 166
                        yield "                                <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_quiz_start", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idFormation", [], "any", false, false, false, 166)]), "html", null, true);
                        yield "\"
                                   class=\"btn btn-success mb-2 w-100\">
                                    <i class=\"fas fa-play-circle\"></i> Faire le quiz
                                </a>
                            ";
                    }
                    // line 171
                    yield "                            ";
                    // line 172
                    yield "                            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 172) != "acceptee")) {
                        // line 173
                        yield "                            <form action=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_inscription_annuler", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 173)]), "html", null, true);
                        yield "\" method=\"post\">
                                <button type=\"submit\" class=\"btn-annuler w-100\" onclick=\"return confirm('Annuler votre inscription ?')\">
                                    <i class=\"fas fa-times\"></i> Annuler l'inscription
                                </button>
                            </form>
                            ";
                    }
                    // line 179
                    yield "                        </div>
                    </div>
                </div>
            </div>
            ";
                }
                // line 184
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['inscription'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 185
            yield "    ";
        } else {
            // line 186
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-calendar-times\"></i>
            <h4>Aucune inscription</h4>
            <p class=\"text-muted\">Vous n'êtes inscrit à aucune formation pour le moment.</p>
            <a href=\"";
            // line 190
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_index");
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-graduation-cap\"></i> Découvrir les formations
            </a>
        </div>
    ";
        }
        // line 195
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "formations/mes_inscriptions.html.twig";
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
        return array (  429 => 195,  421 => 190,  415 => 186,  412 => 185,  406 => 184,  399 => 179,  389 => 173,  386 => 172,  384 => 171,  375 => 166,  372 => 165,  366 => 161,  362 => 159,  356 => 155,  352 => 153,  346 => 149,  342 => 147,  333 => 142,  331 => 141,  327 => 139,  325 => 138,  315 => 135,  309 => 132,  305 => 131,  298 => 128,  295 => 127,  292 => 126,  289 => 125,  285 => 122,  280 => 119,  275 => 116,  273 => 115,  270 => 114,  268 => 113,  263 => 111,  259 => 110,  255 => 109,  248 => 104,  244 => 102,  240 => 100,  238 => 99,  235 => 98,  232 => 97,  228 => 95,  223 => 92,  220 => 91,  215 => 90,  213 => 89,  210 => 88,  200 => 84,  197 => 83,  193 => 82,  190 => 81,  180 => 77,  177 => 76,  173 => 75,  163 => 67,  153 => 66,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes inscriptions - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    
    .inscription-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border: 1px solid #E8D5B7;
    }
    
    .inscription-card:hover {
        transform: translateY(-5px);
    }
    
    .inscription-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 15px 20px;
    }
    
    .btn-annuler {
        background: #dc3545;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        border: 1px solid #E8D5B7;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-calendar-check\"></i> Mes inscriptions</h1>
        <p class=\"lead\">Suivez vos formations en cours</p>
    </div>
</div>

<div class=\"container mb-5\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    {% if inscriptions|length > 0 %}
        {% for inscription in inscriptions %}
            {% if inscription.formation is not null %}
            <div class=\"inscription-card\">
                <div class=\"inscription-header\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <h5 class=\"mb-0\">{{ inscription.formation.titre }}</h5>
                        {# ✅ Badge statut coloré selon la valeur #}
                        {% if inscription.statut == 'acceptee' %}
                            <span class=\"badge bg-success\">✅ Acceptée</span>
                        {% elseif inscription.statut == 'refusee' %}
                            <span class=\"badge bg-danger\">❌ Refusée</span>
                        {% else %}
                            <span class=\"badge bg-warning text-dark\">⏳ En attente</span>
                        {% endif %}
                    </div>
                </div>
                <div class=\"p-4\">
                    <div class=\"row\">
                        <div class=\"col-md-8\">
                            <p class=\"text-muted\">{{ inscription.formation.description|slice(0, 150) }}...</p>
                            <p><strong>Date d'inscription :</strong> {{ inscription.dateInscription|date('d/m/Y H:i') }}</p>
                            <p><strong>Prix :</strong> {{ inscription.formation.prix|number_format(2, ',', ' ') }} €</p>
                            <p><strong>Statut :</strong>
                                {% if inscription.statut == 'acceptee' %}
                                    <span class=\"badge bg-success\">✅ Inscription acceptée</span>
                                {% elseif inscription.statut == 'refusee' %}
                                    <span class=\"badge bg-danger\">❌ Inscription refusée</span>
                                    <small class=\"text-muted d-block mt-1\">Contactez l'administrateur pour plus d'informations.</small>
                                {% else %}
                                    <span class=\"badge bg-warning text-dark\">⏳ En attente de validation</span>
                                    <small class=\"text-muted d-block mt-1\">Un administrateur validera votre demande prochainement.</small>
                                {% endif %}
                            </p>

                            {# ── Score du dernier quiz ── #}
                            {% set lastQuiz = quizResults[inscription.idFormation] ?? null %}
                            {% if lastQuiz %}
                                {% set passed = lastQuiz.percentage >= 80 %}
                                <div class=\"mt-2 p-3 rounded border-start border-4 {{ passed ? 'border-success bg-success bg-opacity-10' : 'border-warning bg-warning bg-opacity-10' }}\">
                                    <div class=\"d-flex align-items-center gap-2 flex-wrap\">
                                        <strong>📊 Dernier quiz :</strong>
                                        <span class=\"fw-bold fs-5 {{ passed ? 'text-success' : 'text-warning' }}\">
                                            {{ lastQuiz.percentage|number_format(0) }}%
                                        </span>
                                        <small class=\"text-muted\">
                                            ({{ lastQuiz.score }}/{{ lastQuiz.totalQuestions }} — {{ lastQuiz.submittedAt|date('d/m/Y') }})
                                        </small>
                                    </div>
                                    {% if passed %}
                                        <div class=\"mt-1\">
                                            <span class=\"badge bg-success\">🎓 Certification obtenue</span>
                                            {% if lastQuiz.certificate %}
                                                <a href=\"{{ path('app_certificate_show', {id: lastQuiz.certificate.id}) }}\"
                                                   class=\"badge bg-primary ms-1 text-decoration-none\">
                                                    📄 Voir le certificat
                                                </a>
                                            {% endif %}
                                        </div>
                                    {% else %}
                                        <div class=\"mt-1\">
                                            <span class=\"badge bg-warning text-dark\">⚠️ Certification non obtenue — seuil : 80%</span>
                                        </div>
                                    {% endif %}
                                </div>
                            {% else %}
                                <p class=\"text-muted small mt-2 mb-0\">
                                    <i class=\"fas fa-circle-info me-1\"></i> Aucun quiz passé pour cette formation.
                                </p>
                            {% endif %}
                        </div>
                        <div class=\"col-md-4 text-end\">
                            <a href=\"{{ path('app_formations_show', {id: inscription.idFormation}) }}\" class=\"btn btn-primary mb-2 w-100\">
                                <i class=\"fas fa-eye\"></i> Voir la formation
                            </a>
                            {# ✅ Bouton quizz visible uniquement si inscription acceptée #}
                            {% if inscription.statut == 'acceptee' and inscription.formation.quiz is not null %}
                                <a href=\"{{ path('app_formations_quiz_start', {id: inscription.idFormation}) }}\"
                                   class=\"btn btn-success mb-2 w-100\">
                                    <i class=\"fas fa-play-circle\"></i> Faire le quiz
                                </a>
                            {% endif %}
                            {# Ne pas permettre d'annuler une inscription acceptée #}
                            {% if inscription.statut != 'acceptee' %}
                            <form action=\"{{ path('app_inscription_annuler', {id: inscription.idInscription}) }}\" method=\"post\">
                                <button type=\"submit\" class=\"btn-annuler w-100\" onclick=\"return confirm('Annuler votre inscription ?')\">
                                    <i class=\"fas fa-times\"></i> Annuler l'inscription
                                </button>
                            </form>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}
        {% endfor %}
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-calendar-times\"></i>
            <h4>Aucune inscription</h4>
            <p class=\"text-muted\">Vous n'êtes inscrit à aucune formation pour le moment.</p>
            <a href=\"{{ path('app_formations_index') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-graduation-cap\"></i> Découvrir les formations
            </a>
        </div>
    {% endif %}
</div>
{% endblock %}", "formations/mes_inscriptions.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\formations\\mes_inscriptions.html.twig");
    }
}

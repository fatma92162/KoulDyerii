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

/* formations/show.html.twig */
class __TwigTemplate_be7492aac577b841315c95f3f30aa125 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "formations/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        yield " - Koul Dyeri";
        
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
    .formation-detail {
        padding: 40px 0;
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px;
        border-radius: 20px;
        color: white;
        margin-bottom: 30px;
    }
    
    .price-box {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .price {
        font-size: 36px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .btn-inscrire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 15px;
        font-size: 18px;
        font-weight: 700;
        width: 100%;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-inscrire:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
    }
    
    .btn-deja-inscrit {
        background: #28a745;
        border: none;
        border-radius: 50px;
        padding: 15px;
        font-size: 18px;
        font-weight: 700;
        width: 100%;
        color: white;
        cursor: not-allowed;
    }
    
    .info-box {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .info-box i {
        color: #8B0000;
        margin-right: 10px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 77
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 78
        yield "<div class=\"formation-detail\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-8\">
                <div class=\"formation-header\">
                    <h1>";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 83, $this->source); })()), "titre", [], "any", false, false, false, 83), "html", null, true);
        yield "</h1>
                    <span class=\"status-badge status-";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 84, $this->source); })()), "statut", [], "any", false, false, false, 84), "html", null, true);
        yield " mt-2\">
                        ";
        // line 85
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 85, $this->source); })()), "statut", [], "any", false, false, false, 85) == "en_cours")) {
            // line 86
            yield "                            🟢 En cours
                        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 87
(isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 87, $this->source); })()), "statut", [], "any", false, false, false, 87) == "termine")) {
            // line 88
            yield "                            ✅ Terminé
                        ";
        }
        // line 90
        yield "                    </span>
                </div>
                
                <div class=\"info-box\">
                    <h4><i class=\"fas fa-align-left\"></i> Description</h4>
                    <p>";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 95, $this->source); })()), "description", [], "any", false, false, false, 95), "html", null, true);
        yield "</p>
                </div>
            </div>
            
            <div class=\"col-md-4\">
                <div class=\"price-box\">
                    <h4>Prix de la formation</h4>
                    <div class=\"price\">";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 102, $this->source); })()), "prix", [], "any", false, false, false, 102), 2, ",", " "), "html", null, true);
        yield " €</div>
                </div>
                
                ";
        // line 105
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 105, $this->source); })()), "user", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 106
            yield "                    ";
            if ((($tmp = (isset($context["dejaInscrit"]) || array_key_exists("dejaInscrit", $context) ? $context["dejaInscrit"] : (function () { throw new RuntimeError('Variable "dejaInscrit" does not exist.', 106, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 107
                yield "                        <div class=\"alert alert-success text-center\">
                            <i class=\"fas fa-check-circle\"></i> Vous êtes déjà inscrit à cette formation !
                        </div>
                        <button class=\"btn-deja-inscrit\" disabled>
                            <i class=\"fas fa-check\"></i> Déjà inscrit
                        </button>
                    ";
            } else {
                // line 114
                yield "                        <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_inscrire", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 114, $this->source); })()), "idFormation", [], "any", false, false, false, 114)]), "html", null, true);
                yield "\">
                            <button type=\"submit\" class=\"btn-inscrire\">
                                <i class=\"fas fa-calendar-plus\"></i> S'inscrire maintenant
                            </button>
                        </form>
                    ";
            }
            // line 120
            yield "                ";
        } else {
            // line 121
            yield "                    <div class=\"alert alert-warning text-center\">
                        <i class=\"fas fa-exclamation-triangle\"></i> Connectez-vous pour vous inscrire
                    </div>
                    <a href=\"";
            // line 124
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn-inscrire\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </a>
                ";
        }
        // line 128
        yield "                
                <div class=\"info-box mt-3\">
                    <h5><i class=\"fas fa-info-circle\"></i> Informations</h5>
                    <p><i class=\"fas fa-clock\"></i> Formation à votre rythme</p>
                    <p><i class=\"fas fa-certificate\"></i> Certificat à la fin</p>
                    <p><i class=\"fas fa-chalkboard-user\"></i> Formateurs experts</p>
                </div>

                ";
        // line 137
        yield "                ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "user", [], "any", false, false, false, 137) && (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 137, $this->source); })()))) {
            // line 138
            yield "                    ";
            $context["passed"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 138, $this->source); })()), "percentage", [], "any", false, false, false, 138) >= 80);
            // line 139
            yield "                    <div class=\"mt-3 p-3 rounded border-start border-4 ";
            yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 139, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("border-success bg-success bg-opacity-10") : ("border-warning bg-warning bg-opacity-10"));
            yield "\">
                        <div class=\"d-flex align-items-center justify-content-between flex-wrap gap-2\">
                            <div>
                                <strong>📊 Votre dernier score :</strong>
                                <span class=\"fw-bold fs-5 ms-1 ";
            // line 143
            yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 143, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("text-success") : ("text-warning"));
            yield "\">
                                    ";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 144, $this->source); })()), "percentage", [], "any", false, false, false, 144), 0), "html", null, true);
            yield "%
                                </span>
                                <small class=\"text-muted d-block\">
                                    ";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 147, $this->source); })()), "score", [], "any", false, false, false, 147), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 147, $this->source); })()), "totalQuestions", [], "any", false, false, false, 147), "html", null, true);
            yield " — ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 147, $this->source); })()), "submittedAt", [], "any", false, false, false, 147), "d/m/Y"), "html", null, true);
            yield "
                                </small>
                            </div>
                            ";
            // line 150
            if ((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 150, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 151
                yield "                                <span class=\"badge bg-success fs-6\">🎓 Certification obtenue</span>
                            ";
            } else {
                // line 153
                yield "                                <span class=\"badge bg-warning text-dark\">⚠️ Non certifié (seuil : 80%)</span>
                            ";
            }
            // line 155
            yield "                        </div>
                        ";
            // line 156
            if (((isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 156, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 156, $this->source); })()), "certificate", [], "any", false, false, false, 156))) {
                // line 157
                yield "                            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 157, $this->source); })()), "certificate", [], "any", false, false, false, 157), "id", [], "any", false, false, false, 157)]), "html", null, true);
                yield "\"
                               class=\"btn btn-sm btn-outline-success mt-2\">
                                <i class=\"fas fa-certificate me-1\"></i> Voir mon certificat
                            </a>
                        ";
            }
            // line 162
            yield "                    </div>
                ";
        }
        // line 164
        yield "
                ";
        // line 165
        if ((($tmp = (isset($context["quizAvailable"]) || array_key_exists("quizAvailable", $context) ? $context["quizAvailable"] : (function () { throw new RuntimeError('Variable "quizAvailable" does not exist.', 165, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 166
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_quiz_start", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 166, $this->source); })()), "idFormation", [], "any", false, false, false, 166)]), "html", null, true);
            yield "\" class=\"btn btn-primary w-100 mt-3\">
                        <i class=\"fas fa-";
            // line 167
            yield (((($tmp = (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 167, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("redo") : ("play-circle"));
            yield " me-1\"></i>
                        ";
            // line 168
            yield (((($tmp = (isset($context["lastResult"]) || array_key_exists("lastResult", $context) ? $context["lastResult"] : (function () { throw new RuntimeError('Variable "lastResult" does not exist.', 168, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Repasser le quiz") : ("Start Quiz"));
            yield "
                        (";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((int) floor((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 169, $this->source); })()), "quiz", [], "any", false, false, false, 169), "duration", [], "any", false, false, false, 169) / 60)), "html", null, true);
            yield " min)
                    </a>
                ";
        } else {
            // line 172
            yield "                    <div class=\"alert alert-info mt-3 mb-0\">
                        Quiz bientôt disponible pour cette formation.
                    </div>
                ";
        }
        // line 176
        yield "            </div>
        </div>
    </div>
</div>

<style>
    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    .status-termine {
        background: #4CAF50;
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "formations/show.html.twig";
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
        return array (  365 => 176,  359 => 172,  353 => 169,  349 => 168,  345 => 167,  340 => 166,  338 => 165,  335 => 164,  331 => 162,  322 => 157,  320 => 156,  317 => 155,  313 => 153,  309 => 151,  307 => 150,  297 => 147,  291 => 144,  287 => 143,  279 => 139,  276 => 138,  273 => 137,  263 => 128,  256 => 124,  251 => 121,  248 => 120,  238 => 114,  229 => 107,  226 => 106,  224 => 105,  218 => 102,  208 => 95,  201 => 90,  197 => 88,  195 => 87,  192 => 86,  190 => 85,  186 => 84,  182 => 83,  175 => 78,  165 => 77,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ formation.titre }} - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .formation-detail {
        padding: 40px 0;
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px;
        border-radius: 20px;
        color: white;
        margin-bottom: 30px;
    }
    
    .price-box {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .price {
        font-size: 36px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .btn-inscrire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 15px;
        font-size: 18px;
        font-weight: 700;
        width: 100%;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-inscrire:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
    }
    
    .btn-deja-inscrit {
        background: #28a745;
        border: none;
        border-radius: 50px;
        padding: 15px;
        font-size: 18px;
        font-weight: 700;
        width: 100%;
        color: white;
        cursor: not-allowed;
    }
    
    .info-box {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .info-box i {
        color: #8B0000;
        margin-right: 10px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"formation-detail\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-8\">
                <div class=\"formation-header\">
                    <h1>{{ formation.titre }}</h1>
                    <span class=\"status-badge status-{{ formation.statut }} mt-2\">
                        {% if formation.statut == 'en_cours' %}
                            🟢 En cours
                        {% elseif formation.statut == 'termine' %}
                            ✅ Terminé
                        {% endif %}
                    </span>
                </div>
                
                <div class=\"info-box\">
                    <h4><i class=\"fas fa-align-left\"></i> Description</h4>
                    <p>{{ formation.description }}</p>
                </div>
            </div>
            
            <div class=\"col-md-4\">
                <div class=\"price-box\">
                    <h4>Prix de la formation</h4>
                    <div class=\"price\">{{ formation.prix|number_format(2, ',', ' ') }} €</div>
                </div>
                
                {% if app.user %}
                    {% if dejaInscrit %}
                        <div class=\"alert alert-success text-center\">
                            <i class=\"fas fa-check-circle\"></i> Vous êtes déjà inscrit à cette formation !
                        </div>
                        <button class=\"btn-deja-inscrit\" disabled>
                            <i class=\"fas fa-check\"></i> Déjà inscrit
                        </button>
                    {% else %}
                        <form method=\"post\" action=\"{{ path('app_formations_inscrire', {id: formation.idFormation}) }}\">
                            <button type=\"submit\" class=\"btn-inscrire\">
                                <i class=\"fas fa-calendar-plus\"></i> S'inscrire maintenant
                            </button>
                        </form>
                    {% endif %}
                {% else %}
                    <div class=\"alert alert-warning text-center\">
                        <i class=\"fas fa-exclamation-triangle\"></i> Connectez-vous pour vous inscrire
                    </div>
                    <a href=\"{{ path('app_login') }}\" class=\"btn-inscrire\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </a>
                {% endif %}
                
                <div class=\"info-box mt-3\">
                    <h5><i class=\"fas fa-info-circle\"></i> Informations</h5>
                    <p><i class=\"fas fa-clock\"></i> Formation à votre rythme</p>
                    <p><i class=\"fas fa-certificate\"></i> Certificat à la fin</p>
                    <p><i class=\"fas fa-chalkboard-user\"></i> Formateurs experts</p>
                </div>

                {# ── Score du dernier quiz ── #}
                {% if app.user and lastResult %}
                    {% set passed = lastResult.percentage >= 80 %}
                    <div class=\"mt-3 p-3 rounded border-start border-4 {{ passed ? 'border-success bg-success bg-opacity-10' : 'border-warning bg-warning bg-opacity-10' }}\">
                        <div class=\"d-flex align-items-center justify-content-between flex-wrap gap-2\">
                            <div>
                                <strong>📊 Votre dernier score :</strong>
                                <span class=\"fw-bold fs-5 ms-1 {{ passed ? 'text-success' : 'text-warning' }}\">
                                    {{ lastResult.percentage|number_format(0) }}%
                                </span>
                                <small class=\"text-muted d-block\">
                                    {{ lastResult.score }}/{{ lastResult.totalQuestions }} — {{ lastResult.submittedAt|date('d/m/Y') }}
                                </small>
                            </div>
                            {% if passed %}
                                <span class=\"badge bg-success fs-6\">🎓 Certification obtenue</span>
                            {% else %}
                                <span class=\"badge bg-warning text-dark\">⚠️ Non certifié (seuil : 80%)</span>
                            {% endif %}
                        </div>
                        {% if passed and lastResult.certificate %}
                            <a href=\"{{ path('app_certificate_show', {id: lastResult.certificate.id}) }}\"
                               class=\"btn btn-sm btn-outline-success mt-2\">
                                <i class=\"fas fa-certificate me-1\"></i> Voir mon certificat
                            </a>
                        {% endif %}
                    </div>
                {% endif %}

                {% if quizAvailable %}
                    <a href=\"{{ path('app_formations_quiz_start', {id: formation.idFormation}) }}\" class=\"btn btn-primary w-100 mt-3\">
                        <i class=\"fas fa-{{ lastResult ? 'redo' : 'play-circle' }} me-1\"></i>
                        {{ lastResult ? 'Repasser le quiz' : 'Start Quiz' }}
                        ({{ formation.quiz.duration // 60 }} min)
                    </a>
                {% else %}
                    <div class=\"alert alert-info mt-3 mb-0\">
                        Quiz bientôt disponible pour cette formation.
                    </div>
                {% endif %}
            </div>
        </div>
    </div>
</div>

<style>
    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    .status-termine {
        background: #4CAF50;
        color: white;
    }
</style>
{% endblock %}", "formations/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\formations\\show.html.twig");
    }
}

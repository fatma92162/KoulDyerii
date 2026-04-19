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

/* certificate/show.html.twig */
class __TwigTemplate_779fd4e0e46f91b73d4fd74051034821 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "certificate/show.html.twig"));

        if ((($tmp =  !(isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 1, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
        }
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

        yield "Certificat — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 3, $this->source); })()), "quizResult", [], "any", false, false, false, 3), "quiz", [], "any", false, false, false, 3), "formation", [], "any", false, false, false, 3), "titre", [], "any", false, false, false, 3), "html", null, true);
        
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
        if ((($tmp =  !(isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 6, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        }
        // line 7
        yield "<style>
    .cert-page {
        min-height: 100vh;
        background: ";
        // line 10
        if ((($tmp = (isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "white";
        } else {
            yield "linear-gradient(135deg, #f5f0e8 0%, #e8d5b7 100%)";
        }
        yield ";
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .cert-wrapper {
        max-width: 820px;
        width: 100%;
    }

    .cert-card {
        background: white;
        border-radius: ";
        // line 24
        if ((($tmp = (isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "0px";
        } else {
            yield "24px";
        }
        yield ";
        box-shadow: ";
        // line 25
        if ((($tmp = (isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 25, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "none";
        } else {
            yield "0 20px 60px rgba(0,0,0,0.15)";
        }
        yield ";
        overflow: hidden;
        border: 3px solid #c8a96e;
        position: relative;
    }

    /* Bordure décorative intérieure */
    .cert-card::before {
        content: '';
        position: absolute;
        inset: 10px;
        border: 1px solid #e8d5b7;
        border-radius: ";
        // line 37
        if ((($tmp = (isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 37, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "0px";
        } else {
            yield "16px";
        }
        yield ";
        pointer-events: none;
        z-index: 0;
    }

    .cert-header {
        ";
        // line 43
        if (((isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 43, $this->source); })()) &&  !((array_key_exists("gdAvailable", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["gdAvailable"]) || array_key_exists("gdAvailable", $context) ? $context["gdAvailable"] : (function () { throw new RuntimeError('Variable "gdAvailable" does not exist.', 43, $this->source); })()), true)) : (true)))) {
            // line 44
            yield "        background: #8B0000;
        ";
        } else {
            // line 46
            yield "        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 60%, #C0392B 100%);
        ";
        }
        // line 48
        yield "        padding: 36px 48px 28px;
        text-align: center;
        color: white;
        position: relative;
        z-index: 1;
    }

    .cert-header .cert-logo {
        font-size: 48px;
        margin-bottom: 8px;
        display: block;
        ";
        // line 59
        if ((($tmp =  !((isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 59, $this->source); })()) &&  !((array_key_exists("gdAvailable", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["gdAvailable"]) || array_key_exists("gdAvailable", $context) ? $context["gdAvailable"] : (function () { throw new RuntimeError('Variable "gdAvailable" does not exist.', 59, $this->source); })()), true)) : (true)))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 60
            yield "        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        ";
        }
        // line 62
        yield "    }

    .cert-header h1 {
        font-size: 28px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .cert-header p {
        font-size: 14px;
        opacity: 0.85;
        margin: 6px 0 0;
        letter-spacing: 1.5px;
    }

    .cert-body {
        padding: 44px 56px;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .cert-awarded-to {
        font-size: 15px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .cert-name {
        font-size: 42px;
        font-weight: 800;
        color: #8B0000;
        font-family: Georgia, 'Times New Roman', serif;
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .cert-text {
        font-size: 16px;
        color: #444;
        margin-bottom: 8px;
        line-height: 1.6;
    }

    .cert-formation {
        font-size: 22px;
        font-weight: 700;
        color: #2c2c2c;
        margin: 10px 0 20px;
        padding: 10px 24px;
        display: inline-block;
        border-bottom: 3px solid #c8a96e;
    }

    .cert-score-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-radius: 50px;
        padding: 10px 28px;
        font-size: 20px;
        font-weight: 800;
        margin: 16px 0;
        box-shadow: 0 4px 15px rgba(40,167,69,0.3);
    }

    .cert-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 20px 56px 36px;
        border-top: 1px solid #e8d5b7;
        position: relative;
        z-index: 1;
    }

    .cert-uid-block {
        text-align: left;
    }

    .cert-uid-block label {
        font-size: 11px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 4px;
    }

    .cert-uid-block .uid {
        font-family: monospace;
        font-size: 13px;
        color: #555;
        background: #f5f5f5;
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .cert-date-block {
        text-align: right;
    }

    .cert-date-block label {
        font-size: 11px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 4px;
    }

    .cert-date-block .date {
        font-size: 15px;
        font-weight: 600;
        color: #444;
    }

    /* Décorations coin */
    .corner-ornament {
        position: absolute;
        width: 60px;
        height: 60px;
        opacity: 0.15;
        font-size: 40px;
        z-index: 0;
    }
    .corner-tl { top: 16px; left: 16px; }
    .corner-tr { top: 16px; right: 16px; transform: scaleX(-1); }
    .corner-bl { bottom: 16px; left: 16px; transform: scaleY(-1); }
    .corner-br { bottom: 16px; right: 16px; transform: scale(-1); }

    /* Boutons (mode web uniquement) */
    .cert-actions {
        text-align: center;
        margin-top: 28px;
    }

    .btn-pdf {
        background: linear-gradient(135deg, #dc3545, #c0392b);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220,53,69,0.3);
        margin-right: 12px;
    }

    .btn-pdf:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(220,53,69,0.4);
        color: white;
    }

    .btn-back {
        background: #e9ecef;
        color: #495057;
        border: none;
        border-radius: 50px;
        padding: 14px 28px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #dee2e6;
        color: #333;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 248
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 249
        yield "<div class=\"cert-page\">
    <div class=\"cert-wrapper\">

        <div class=\"cert-card\">

            ";
        // line 255
        yield "            <div class=\"corner-ornament corner-tl\">✦</div>
            <div class=\"corner-ornament corner-tr\">✦</div>
            <div class=\"corner-ornament corner-bl\">✦</div>
            <div class=\"corner-ornament corner-br\">✦</div>

            ";
        // line 261
        yield "            <div class=\"cert-header\">
                <span class=\"cert-logo\">🎓</span>
                <h1>Certificat de Réussite</h1>
                <p>Certificate of Achievement — Koul Dyeri</p>
            </div>

            ";
        // line 268
        yield "            <div class=\"cert-body\">
                <p class=\"cert-awarded-to\">Ce certificat est décerné à</p>
                <div class=\"cert-name\">";
        // line 270
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 270, $this->source); })()), "quizResult", [], "any", false, false, false, 270), "user", [], "any", false, false, false, 270), "nom", [], "any", false, false, false, 270), "html", null, true);
        yield "</div>

                <p class=\"cert-text\">pour avoir complété avec succès la formation</p>

                <div class=\"cert-formation\">
                    ";
        // line 275
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 275, $this->source); })()), "quizResult", [], "any", false, false, false, 275), "quiz", [], "any", false, false, false, 275), "formation", [], "any", false, false, false, 275), "titre", [], "any", false, false, false, 275), "html", null, true);
        yield "
                </div>

                <div>
                    <div class=\"cert-score-badge\">
                        <i class=\"fas fa-trophy\"></i>
                        Score : ";
        // line 281
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 281, $this->source); })()), "quizResult", [], "any", false, false, false, 281), "percentage", [], "any", false, false, false, 281), 1), "html", null, true);
        yield "%
                        (";
        // line 282
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 282, $this->source); })()), "quizResult", [], "any", false, false, false, 282), "score", [], "any", false, false, false, 282), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 282, $this->source); })()), "quizResult", [], "any", false, false, false, 282), "totalQuestions", [], "any", false, false, false, 282), "html", null, true);
        yield ")
                    </div>
                </div>

                <p class=\"cert-text mt-3\" style=\"color:#888; font-size:14px;\">
                    Seuil de certification atteint : ≥ 80%
                </p>
            </div>

            ";
        // line 292
        yield "            <div class=\"cert-footer\">
                <div class=\"cert-uid-block\">
                    <label>Identifiant du certificat</label>
                    <span class=\"uid\">";
        // line 295
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 295, $this->source); })()), "certificateUid", [], "any", false, false, false, 295), "html", null, true);
        yield "</span>
                </div>
                <div style=\"text-align:center; color:#c8a96e; font-size: 24px;\">✦ ✦ ✦</div>
                <div class=\"cert-date-block\">
                    <label>Date d'émission</label>
                    <span class=\"date\">";
        // line 300
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 300, $this->source); })()), "createdAt", [], "any", false, false, false, 300), "d/m/Y"), "html", null, true);
        yield "</span>
                </div>
            </div>

        </div>";
        // line 305
        yield "
        ";
        // line 307
        yield "        ";
        if ((($tmp =  !(isset($context["pdfMode"]) || array_key_exists("pdfMode", $context) ? $context["pdfMode"] : (function () { throw new RuntimeError('Variable "pdfMode" does not exist.', 307, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 308
            yield "        <div class=\"cert-actions\">
            <a href=\"";
            // line 309
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 309, $this->source); })()), "id", [], "any", false, false, false, 309)]), "html", null, true);
            yield "\" class=\"btn-pdf\" target=\"_blank\">
                <i class=\"fas fa-file-pdf me-2\"></i> Télécharger en PDF
            </a>
            <a href=\"";
            // line 312
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_index");
            yield "\" class=\"btn-back\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour aux formations
            </a>
        </div>
        ";
        }
        // line 317
        yield "
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "certificate/show.html.twig";
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
        return array (  494 => 317,  486 => 312,  480 => 309,  477 => 308,  474 => 307,  471 => 305,  464 => 300,  456 => 295,  451 => 292,  437 => 282,  433 => 281,  424 => 275,  416 => 270,  412 => 268,  404 => 261,  397 => 255,  390 => 249,  380 => 248,  188 => 62,  184 => 60,  182 => 59,  169 => 48,  165 => 46,  161 => 44,  159 => 43,  146 => 37,  127 => 25,  119 => 24,  98 => 10,  93 => 7,  89 => 6,  79 => 5,  61 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if not pdfMode %}{% extends 'base.html.twig' %}{% endif %}

{% block title %}Certificat — {{ certificate.quizResult.quiz.formation.titre }}{% endblock %}

{% block stylesheets %}
{% if not pdfMode %}{{ parent() }}{% endif %}
<style>
    .cert-page {
        min-height: 100vh;
        background: {% if pdfMode %}white{% else %}linear-gradient(135deg, #f5f0e8 0%, #e8d5b7 100%){% endif %};
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .cert-wrapper {
        max-width: 820px;
        width: 100%;
    }

    .cert-card {
        background: white;
        border-radius: {% if pdfMode %}0px{% else %}24px{% endif %};
        box-shadow: {% if pdfMode %}none{% else %}0 20px 60px rgba(0,0,0,0.15){% endif %};
        overflow: hidden;
        border: 3px solid #c8a96e;
        position: relative;
    }

    /* Bordure décorative intérieure */
    .cert-card::before {
        content: '';
        position: absolute;
        inset: 10px;
        border: 1px solid #e8d5b7;
        border-radius: {% if pdfMode %}0px{% else %}16px{% endif %};
        pointer-events: none;
        z-index: 0;
    }

    .cert-header {
        {% if pdfMode and not gdAvailable|default(true) %}
        background: #8B0000;
        {% else %}
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 60%, #C0392B 100%);
        {% endif %}
        padding: 36px 48px 28px;
        text-align: center;
        color: white;
        position: relative;
        z-index: 1;
    }

    .cert-header .cert-logo {
        font-size: 48px;
        margin-bottom: 8px;
        display: block;
        {% if not (pdfMode and not gdAvailable|default(true)) %}
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        {% endif %}
    }

    .cert-header h1 {
        font-size: 28px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .cert-header p {
        font-size: 14px;
        opacity: 0.85;
        margin: 6px 0 0;
        letter-spacing: 1.5px;
    }

    .cert-body {
        padding: 44px 56px;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .cert-awarded-to {
        font-size: 15px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .cert-name {
        font-size: 42px;
        font-weight: 800;
        color: #8B0000;
        font-family: Georgia, 'Times New Roman', serif;
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .cert-text {
        font-size: 16px;
        color: #444;
        margin-bottom: 8px;
        line-height: 1.6;
    }

    .cert-formation {
        font-size: 22px;
        font-weight: 700;
        color: #2c2c2c;
        margin: 10px 0 20px;
        padding: 10px 24px;
        display: inline-block;
        border-bottom: 3px solid #c8a96e;
    }

    .cert-score-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-radius: 50px;
        padding: 10px 28px;
        font-size: 20px;
        font-weight: 800;
        margin: 16px 0;
        box-shadow: 0 4px 15px rgba(40,167,69,0.3);
    }

    .cert-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 20px 56px 36px;
        border-top: 1px solid #e8d5b7;
        position: relative;
        z-index: 1;
    }

    .cert-uid-block {
        text-align: left;
    }

    .cert-uid-block label {
        font-size: 11px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 4px;
    }

    .cert-uid-block .uid {
        font-family: monospace;
        font-size: 13px;
        color: #555;
        background: #f5f5f5;
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .cert-date-block {
        text-align: right;
    }

    .cert-date-block label {
        font-size: 11px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 4px;
    }

    .cert-date-block .date {
        font-size: 15px;
        font-weight: 600;
        color: #444;
    }

    /* Décorations coin */
    .corner-ornament {
        position: absolute;
        width: 60px;
        height: 60px;
        opacity: 0.15;
        font-size: 40px;
        z-index: 0;
    }
    .corner-tl { top: 16px; left: 16px; }
    .corner-tr { top: 16px; right: 16px; transform: scaleX(-1); }
    .corner-bl { bottom: 16px; left: 16px; transform: scaleY(-1); }
    .corner-br { bottom: 16px; right: 16px; transform: scale(-1); }

    /* Boutons (mode web uniquement) */
    .cert-actions {
        text-align: center;
        margin-top: 28px;
    }

    .btn-pdf {
        background: linear-gradient(135deg, #dc3545, #c0392b);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220,53,69,0.3);
        margin-right: 12px;
    }

    .btn-pdf:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(220,53,69,0.4);
        color: white;
    }

    .btn-back {
        background: #e9ecef;
        color: #495057;
        border: none;
        border-radius: 50px;
        padding: 14px 28px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #dee2e6;
        color: #333;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"cert-page\">
    <div class=\"cert-wrapper\">

        <div class=\"cert-card\">

            {# Ornements de coins #}
            <div class=\"corner-ornament corner-tl\">✦</div>
            <div class=\"corner-ornament corner-tr\">✦</div>
            <div class=\"corner-ornament corner-bl\">✦</div>
            <div class=\"corner-ornament corner-br\">✦</div>

            {# ── En-tête ── #}
            <div class=\"cert-header\">
                <span class=\"cert-logo\">🎓</span>
                <h1>Certificat de Réussite</h1>
                <p>Certificate of Achievement — Koul Dyeri</p>
            </div>

            {# ── Corps ── #}
            <div class=\"cert-body\">
                <p class=\"cert-awarded-to\">Ce certificat est décerné à</p>
                <div class=\"cert-name\">{{ certificate.quizResult.user.nom }}</div>

                <p class=\"cert-text\">pour avoir complété avec succès la formation</p>

                <div class=\"cert-formation\">
                    {{ certificate.quizResult.quiz.formation.titre }}
                </div>

                <div>
                    <div class=\"cert-score-badge\">
                        <i class=\"fas fa-trophy\"></i>
                        Score : {{ certificate.quizResult.percentage|number_format(1) }}%
                        ({{ certificate.quizResult.score }}/{{ certificate.quizResult.totalQuestions }})
                    </div>
                </div>

                <p class=\"cert-text mt-3\" style=\"color:#888; font-size:14px;\">
                    Seuil de certification atteint : ≥ 80%
                </p>
            </div>

            {# ── Pied de page ── #}
            <div class=\"cert-footer\">
                <div class=\"cert-uid-block\">
                    <label>Identifiant du certificat</label>
                    <span class=\"uid\">{{ certificate.certificateUid }}</span>
                </div>
                <div style=\"text-align:center; color:#c8a96e; font-size: 24px;\">✦ ✦ ✦</div>
                <div class=\"cert-date-block\">
                    <label>Date d'émission</label>
                    <span class=\"date\">{{ certificate.createdAt|date('d/m/Y') }}</span>
                </div>
            </div>

        </div>{# .cert-card #}

        {# ── Boutons (mode web seulement) ── #}
        {% if not pdfMode %}
        <div class=\"cert-actions\">
            <a href=\"{{ path('app_certificate_pdf', {id: certificate.id}) }}\" class=\"btn-pdf\" target=\"_blank\">
                <i class=\"fas fa-file-pdf me-2\"></i> Télécharger en PDF
            </a>
            <a href=\"{{ path('app_formations_index') }}\" class=\"btn-back\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour aux formations
            </a>
        </div>
        {% endif %}

    </div>
</div>
{% endblock %}
", "certificate/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\certificate\\show.html.twig");
    }
}

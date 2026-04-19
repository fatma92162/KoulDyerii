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

/* certificate/simple.html.twig */
class __TwigTemplate_4d845fae7fa313af02e51ff88660660d extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "certificate/simple.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Certificat — ";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 5, $this->source); })()), "quizResult", [], "any", false, false, false, 5), "quiz", [], "any", false, false, false, 5), "formation", [], "any", false, false, false, 5), "titre", [], "any", false, false, false, 5), "html", null, true);
        yield "</title>
    <style>
        /* ─── Reset ─── */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: \"DejaVu Sans\", Arial, sans-serif;
            font-size: 13px;
            color: #2c2c2c;
            background: white;
        }

        /* ─── Page (A4 paysage) ─── */
        .page {
            width: 100%;
            padding: 20px 30px;
        }

        /* ─── Bordure extérieure ─── */
        .outer-border {
            border: 4px solid #8B0000;
            padding: 0;
        }

        /* ─── Bordure intérieure ─── */
        .inner-border {
            border: 1px solid #c8a96e;
            margin: 6px;
            padding: 0;
        }

        /* ─── En-tête ─── */
        .cert-header {
            background-color: #8B0000;
            color: white;
            text-align: center;
            padding: 22px 40px 16px;
        }

        .cert-header .logo-text {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 4px;
            display: block;
        }

        .cert-header h1 {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 0;
        }

        .cert-header .subtitle {
            font-size: 11px;
            margin-top: 4px;
            opacity: 0.85;
            letter-spacing: 1.5px;
        }

        /* ─── Corps ─── */
        .cert-body {
            padding: 30px 50px 24px;
            text-align: center;
        }

        .cert-awarded-to {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .cert-name {
            font-size: 32px;
            font-weight: bold;
            color: #8B0000;
            font-family: \"DejaVu Serif\", Georgia, serif;
            margin-bottom: 18px;
        }

        .cert-text {
            font-size: 13px;
            color: #444;
            margin-bottom: 8px;
        }

        .cert-formation {
            font-size: 18px;
            font-weight: bold;
            color: #2c2c2c;
            margin: 8px 0 16px;
            padding-bottom: 6px;
            border-bottom: 2px solid #c8a96e;
            display: inline-block;
        }

        /* ─── Badge score ─── */
        .score-badge {
            display: inline-block;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            padding: 6px 20px;
            font-size: 16px;
            font-weight: bold;
            margin: 12px 0;
        }

        .threshold-text {
            font-size: 11px;
            color: #888;
            margin-top: 4px;
        }

        /* ─── Séparateur ─── */
        .divider {
            border-top: 1px solid #e8d5b7;
            margin: 0 30px;
        }

        /* ─── Pied de page ─── */
        .cert-footer {
            display: table;
            width: 100%;
            padding: 14px 40px 20px;
        }

        .cert-footer-left {
            display: table-cell;
            width: 50%;
            vertical-align: bottom;
            text-align: left;
        }

        .cert-footer-right {
            display: table-cell;
            width: 50%;
            vertical-align: bottom;
            text-align: right;
        }

        .cert-footer label {
            font-size: 9px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 3px;
        }

        .uid {
            font-family: \"DejaVu Sans Mono\", monospace;
            font-size: 11px;
            color: #555;
            background: #f5f5f5;
            padding: 3px 8px;
            border: 1px solid #ddd;
        }

        .date-text {
            font-size: 13px;
            font-weight: bold;
            color: #444;
        }

        .cert-footer-center {
            display: table-cell;
            width: 0%;
            text-align: center;
            vertical-align: bottom;
            color: #c8a96e;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class=\"page\">
    <div class=\"outer-border\">
        <div class=\"inner-border\">

            <!-- En-tête -->
            <div class=\"cert-header\">
                <span class=\"logo-text\">🎓</span>
                <h1>Certificat de Réussite</h1>
                <p class=\"subtitle\">Certificate of Achievement — Koul Dyeri</p>
            </div>

            <!-- Corps -->
            <div class=\"cert-body\">
                <p class=\"cert-awarded-to\">Ce certificat est décerné à</p>
                <div class=\"cert-name\">";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 198, $this->source); })()), "quizResult", [], "any", false, false, false, 198), "user", [], "any", false, false, false, 198), "nom", [], "any", false, false, false, 198), "html", null, true);
        yield "</div>

                <p class=\"cert-text\">pour avoir complété avec succès la formation</p>

                <div class=\"cert-formation\">
                    ";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 203, $this->source); })()), "quizResult", [], "any", false, false, false, 203), "quiz", [], "any", false, false, false, 203), "formation", [], "any", false, false, false, 203), "titre", [], "any", false, false, false, 203), "html", null, true);
        yield "
                </div>

                <div>
                    <div class=\"score-badge\">
                        &#x1F3C6; Score : ";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 208, $this->source); })()), "quizResult", [], "any", false, false, false, 208), "percentage", [], "any", false, false, false, 208), 1), "html", null, true);
        yield "%
                        (";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 209, $this->source); })()), "quizResult", [], "any", false, false, false, 209), "score", [], "any", false, false, false, 209), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 209, $this->source); })()), "quizResult", [], "any", false, false, false, 209), "totalQuestions", [], "any", false, false, false, 209), "html", null, true);
        yield ")
                    </div>
                </div>
                <p class=\"threshold-text\">Seuil de certification atteint : ≥ 80%</p>
            </div>

            <!-- Séparateur -->
            <div class=\"divider\"></div>

            <!-- Pied de page -->
            <div class=\"cert-footer\">
                <div class=\"cert-footer-left\">
                    <label>Identifiant du certificat</label>
                    <span class=\"uid\">";
        // line 222
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 222, $this->source); })()), "certificateUid", [], "any", false, false, false, 222), "html", null, true);
        yield "</span>
                </div>
                <div class=\"cert-footer-center\">✦ ✦ ✦</div>
                <div class=\"cert-footer-right\">
                    <label>Date d'émission</label>
                    <span class=\"date-text\">";
        // line 227
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["certificate"]) || array_key_exists("certificate", $context) ? $context["certificate"] : (function () { throw new RuntimeError('Variable "certificate" does not exist.', 227, $this->source); })()), "createdAt", [], "any", false, false, false, 227), "d/m/Y"), "html", null, true);
        yield "</span>
                </div>
            </div>

        </div><!-- /.inner-border -->
    </div><!-- /.outer-border -->
</div><!-- /.page -->
</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "certificate/simple.html.twig";
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
        return array (  293 => 227,  285 => 222,  267 => 209,  263 => 208,  255 => 203,  247 => 198,  51 => 5,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Certificat — {{ certificate.quizResult.quiz.formation.titre }}</title>
    <style>
        /* ─── Reset ─── */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: \"DejaVu Sans\", Arial, sans-serif;
            font-size: 13px;
            color: #2c2c2c;
            background: white;
        }

        /* ─── Page (A4 paysage) ─── */
        .page {
            width: 100%;
            padding: 20px 30px;
        }

        /* ─── Bordure extérieure ─── */
        .outer-border {
            border: 4px solid #8B0000;
            padding: 0;
        }

        /* ─── Bordure intérieure ─── */
        .inner-border {
            border: 1px solid #c8a96e;
            margin: 6px;
            padding: 0;
        }

        /* ─── En-tête ─── */
        .cert-header {
            background-color: #8B0000;
            color: white;
            text-align: center;
            padding: 22px 40px 16px;
        }

        .cert-header .logo-text {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 4px;
            display: block;
        }

        .cert-header h1 {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 0;
        }

        .cert-header .subtitle {
            font-size: 11px;
            margin-top: 4px;
            opacity: 0.85;
            letter-spacing: 1.5px;
        }

        /* ─── Corps ─── */
        .cert-body {
            padding: 30px 50px 24px;
            text-align: center;
        }

        .cert-awarded-to {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .cert-name {
            font-size: 32px;
            font-weight: bold;
            color: #8B0000;
            font-family: \"DejaVu Serif\", Georgia, serif;
            margin-bottom: 18px;
        }

        .cert-text {
            font-size: 13px;
            color: #444;
            margin-bottom: 8px;
        }

        .cert-formation {
            font-size: 18px;
            font-weight: bold;
            color: #2c2c2c;
            margin: 8px 0 16px;
            padding-bottom: 6px;
            border-bottom: 2px solid #c8a96e;
            display: inline-block;
        }

        /* ─── Badge score ─── */
        .score-badge {
            display: inline-block;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            padding: 6px 20px;
            font-size: 16px;
            font-weight: bold;
            margin: 12px 0;
        }

        .threshold-text {
            font-size: 11px;
            color: #888;
            margin-top: 4px;
        }

        /* ─── Séparateur ─── */
        .divider {
            border-top: 1px solid #e8d5b7;
            margin: 0 30px;
        }

        /* ─── Pied de page ─── */
        .cert-footer {
            display: table;
            width: 100%;
            padding: 14px 40px 20px;
        }

        .cert-footer-left {
            display: table-cell;
            width: 50%;
            vertical-align: bottom;
            text-align: left;
        }

        .cert-footer-right {
            display: table-cell;
            width: 50%;
            vertical-align: bottom;
            text-align: right;
        }

        .cert-footer label {
            font-size: 9px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 3px;
        }

        .uid {
            font-family: \"DejaVu Sans Mono\", monospace;
            font-size: 11px;
            color: #555;
            background: #f5f5f5;
            padding: 3px 8px;
            border: 1px solid #ddd;
        }

        .date-text {
            font-size: 13px;
            font-weight: bold;
            color: #444;
        }

        .cert-footer-center {
            display: table-cell;
            width: 0%;
            text-align: center;
            vertical-align: bottom;
            color: #c8a96e;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class=\"page\">
    <div class=\"outer-border\">
        <div class=\"inner-border\">

            <!-- En-tête -->
            <div class=\"cert-header\">
                <span class=\"logo-text\">🎓</span>
                <h1>Certificat de Réussite</h1>
                <p class=\"subtitle\">Certificate of Achievement — Koul Dyeri</p>
            </div>

            <!-- Corps -->
            <div class=\"cert-body\">
                <p class=\"cert-awarded-to\">Ce certificat est décerné à</p>
                <div class=\"cert-name\">{{ certificate.quizResult.user.nom }}</div>

                <p class=\"cert-text\">pour avoir complété avec succès la formation</p>

                <div class=\"cert-formation\">
                    {{ certificate.quizResult.quiz.formation.titre }}
                </div>

                <div>
                    <div class=\"score-badge\">
                        &#x1F3C6; Score : {{ certificate.quizResult.percentage|number_format(1) }}%
                        ({{ certificate.quizResult.score }}/{{ certificate.quizResult.totalQuestions }})
                    </div>
                </div>
                <p class=\"threshold-text\">Seuil de certification atteint : ≥ 80%</p>
            </div>

            <!-- Séparateur -->
            <div class=\"divider\"></div>

            <!-- Pied de page -->
            <div class=\"cert-footer\">
                <div class=\"cert-footer-left\">
                    <label>Identifiant du certificat</label>
                    <span class=\"uid\">{{ certificate.certificateUid }}</span>
                </div>
                <div class=\"cert-footer-center\">✦ ✦ ✦</div>
                <div class=\"cert-footer-right\">
                    <label>Date d'émission</label>
                    <span class=\"date-text\">{{ certificate.createdAt|date('d/m/Y') }}</span>
                </div>
            </div>

        </div><!-- /.inner-border -->
    </div><!-- /.outer-border -->
</div><!-- /.page -->
</body>
</html>
", "certificate/simple.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\certificate\\simple.html.twig");
    }
}

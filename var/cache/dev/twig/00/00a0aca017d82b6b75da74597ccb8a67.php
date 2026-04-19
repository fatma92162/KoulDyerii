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

/* formations/quiz_result.html.twig */
class __TwigTemplate_000512ec7869859b6d8b43a5fe320e5c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "formations/quiz_result.html.twig"));

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

        yield "Résultat du Quiz — ";
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
    .result-hero {
        padding: 50px 0 30px;
        text-align: center;
    }

    .score-circle {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-weight: 800;
        font-size: 40px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
    }

    .score-circle:hover { transform: scale(1.05); }

    .score-circle.success {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: 6px solid #1e7e34;
    }

    .score-circle.failure {
        background: linear-gradient(135deg, #fd7e14, #dc3545);
        color: white;
        border: 6px solid #c0392b;
    }

    .score-circle small {
        font-size: 14px;
        font-weight: 400;
        opacity: 0.9;
    }

    .progress-bar-container {
        background: #e9ecef;
        border-radius: 999px;
        height: 20px;
        overflow: hidden;
        margin: 12px 0;
    }

    .progress-bar-fill {
        height: 100%;
        border-radius: 999px;
        transition: width 1.2s ease;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 10px;
        font-size: 12px;
        font-weight: 700;
        color: white;
    }

    .progress-bar-fill.success-bar  { background: linear-gradient(90deg, #20c997, #28a745); }
    .progress-bar-fill.failure-bar  { background: linear-gradient(90deg, #fd7e14, #dc3545); }

    .threshold-line {
        position: relative;
        margin: 16px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #6c757d;
    }

    .threshold-line::before {
        content: '';
        flex: 1;
        height: 1px;
        background: #dee2e6;
    }

    .result-card {
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        border: 1px solid #e8d5b7;
    }

    .feedback-section {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 24px;
        margin-top: 20px;
    }

    .feedback-section h5 {
        font-weight: 700;
        margin-bottom: 12px;
    }

    .feedback-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 8px;
        font-size: 15px;
    }

    .cert-banner {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border-radius: 20px;
        padding: 32px;
        text-align: center;
        margin-bottom: 24px;
        box-shadow: 0 8px 30px rgba(139,0,0,0.3);
    }

    .cert-banner .cert-icon {
        font-size: 64px;
        margin-bottom: 16px;
    }

    .nopass-banner {
        background: #fff3cd;
        border: 2px solid #ffc107;
        border-radius: 20px;
        padding: 28px;
        text-align: center;
        margin-bottom: 24px;
        color: #664d03;
    }

    .btn-cert {
        background: white;
        color: #8B0000;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        font-size: 17px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        margin-top: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .btn-cert:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        color: #8B0000;
    }

    .btn-retry {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-top: 12px;
        transition: all 0.3s ease;
    }

    .btn-retry:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139,0,0,0.4);
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 186
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 187
        yield "<div class=\"container result-hero\">

    ";
        // line 190
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 190, $this->source); })()), "flashes", ["success"], "method", false, false, false, 190));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 191
            yield "        <div class=\"alert alert-success alert-dismissible fade show mb-4\" role=\"alert\">
            <i class=\"fas fa-check-circle me-2\"></i> ";
            // line 192
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 196, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 196));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 197
            yield "        <div class=\"alert alert-warning alert-dismissible fade show mb-4\" role=\"alert\">
            <i class=\"fas fa-exclamation-triangle me-2\"></i> ";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 202
        yield "
    ";
        // line 204
        yield "    ";
        $context["passed"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 204, $this->source); })()), "percentage", [], "any", false, false, false, 204) >= ((array_key_exists("threshold", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["threshold"]) || array_key_exists("threshold", $context) ? $context["threshold"] : (function () { throw new RuntimeError('Variable "threshold" does not exist.', 204, $this->source); })()), 80)) : (80)));
        // line 205
        yield "
    <div class=\"score-circle ";
        // line 206
        yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 206, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("failure"));
        yield "\">
        ";
        // line 207
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 207, $this->source); })()), "percentage", [], "any", false, false, false, 207), 0), "html", null, true);
        yield "%
        <small>";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 208, $this->source); })()), "score", [], "any", false, false, false, 208), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 208, $this->source); })()), "totalQuestions", [], "any", false, false, false, 208), "html", null, true);
        yield "</small>
    </div>

    <h2 class=\"fw-bold mb-1\">";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 211, $this->source); })()), "titre", [], "any", false, false, false, 211), "html", null, true);
        yield "</h2>
    <p class=\"text-muted\">Résultat du quiz</p>

    ";
        // line 215
        yield "    <div class=\"col-md-8 mx-auto\">
        <div class=\"d-flex justify-content-between small text-muted mb-1\">
            <span>Votre score</span>
            <span>Seuil de certification : ";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("threshold", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["threshold"]) || array_key_exists("threshold", $context) ? $context["threshold"] : (function () { throw new RuntimeError('Variable "threshold" does not exist.', 218, $this->source); })()), 80)) : (80)), "html", null, true);
        yield "%</span>
        </div>
        <div class=\"progress-bar-container\">
            <div class=\"progress-bar-fill ";
        // line 221
        yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 221, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success-bar") : ("failure-bar"));
        yield "\"
                 style=\"width: 0%\"
                 data-target=\"";
        // line 223
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 223, $this->source); })()), "percentage", [], "any", false, false, false, 223), "html", null, true);
        yield "\">
                ";
        // line 224
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 224, $this->source); })()), "percentage", [], "any", false, false, false, 224), 0), "html", null, true);
        yield "%
            </div>
        </div>
        <div class=\"threshold-line\">
            <span>";
        // line 228
        yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 228, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("🏆 Seuil atteint !") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("⚠️ Seuil non atteint — " . ((array_key_exists("threshold", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["threshold"]) || array_key_exists("threshold", $context) ? $context["threshold"] : (function () { throw new RuntimeError('Variable "threshold" does not exist.', 228, $this->source); })()), 80)) : (80))) . "% requis"), "html", null, true)));
        yield "</span>
        </div>
    </div>

</div>

<div class=\"container pb-5\">
    <div class=\"col-md-8 mx-auto\">

        ";
        // line 238
        yield "        ";
        if ((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 238, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 239
            yield "            <div class=\"cert-banner\">
                <div class=\"cert-icon\">🏅</div>
                <h3 class=\"fw-bold\">Félicitations !</h3>
                <p class=\"mb-0 opacity-90\">
                    Vous avez obtenu <strong>";
            // line 243
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 243, $this->source); })()), "percentage", [], "any", false, false, false, 243), 0), "html", null, true);
            yield "%</strong>
                    (";
            // line 244
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 244, $this->source); })()), "score", [], "any", false, false, false, 244), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 244, $this->source); })()), "totalQuestions", [], "any", false, false, false, 244), "html", null, true);
            yield " bonnes réponses).<br>
                    Votre certificat de réussite est disponible.
                </p>
                ";
            // line 247
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 247, $this->source); })()), "certificate", [], "any", false, false, false, 247)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 248
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 248, $this->source); })()), "certificate", [], "any", false, false, false, 248), "id", [], "any", false, false, false, 248)]), "html", null, true);
                yield "\" class=\"btn-cert\">
                        <i class=\"fas fa-certificate me-2\"></i> Voir mon certificat
                    </a>
                ";
            }
            // line 252
            yield "            </div>
        ";
        } else {
            // line 254
            yield "            <div class=\"nopass-banner\">
                <div style=\"font-size: 56px; margin-bottom: 12px;\">📖</div>
                <h4 class=\"fw-bold\">Score insuffisant pour la certification</h4>
                <p class=\"mb-2\">
                    Votre score : <strong>";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 258, $this->source); })()), "percentage", [], "any", false, false, false, 258), 0), "html", null, true);
            yield "%</strong>
                    (";
            // line 259
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 259, $this->source); })()), "score", [], "any", false, false, false, 259), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new RuntimeError('Variable "result" does not exist.', 259, $this->source); })()), "totalQuestions", [], "any", false, false, false, 259), "html", null, true);
            yield ").<br>
                    Il vous faut <strong>";
            // line 260
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("threshold", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["threshold"]) || array_key_exists("threshold", $context) ? $context["threshold"] : (function () { throw new RuntimeError('Variable "threshold" does not exist.', 260, $this->source); })()), 80)) : (80)), "html", null, true);
            yield "%</strong> minimum pour obtenir le certificat.
                </p>
                <a href=\"";
            // line 262
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_quiz_start", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 262, $this->source); })()), "idFormation", [], "any", false, false, false, 262)]), "html", null, true);
            yield "\" class=\"btn-retry\">
                    <i class=\"fas fa-redo me-2\"></i> Réessayer le quiz
                </a>
            </div>
        ";
        }
        // line 267
        yield "
        ";
        // line 269
        yield "        <div class=\"result-card\">
            <h5 class=\"fw-bold mb-3\"><i class=\"fas fa-lightbulb text-warning me-2\"></i>Analyse de votre performance</h5>

            <p class=\"mb-2 text-success fw-semibold\"><i class=\"fas fa-thumbs-up me-1\"></i> Points forts</p>
            <ul class=\"list-unstyled mb-4\">
                ";
        // line 274
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 274, $this->source); })()), "strengths", [], "any", false, false, false, 274));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 275
            yield "                    <li class=\"feedback-item\">
                        <span class=\"text-success mt-1\">✔</span>
                        <span>";
            // line 277
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["item"], "html", null, true);
            yield "</span>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 280
        yield "            </ul>

            <p class=\"mb-2 text-danger fw-semibold\"><i class=\"fas fa-thumbs-down me-1\"></i> Points à améliorer</p>
            <ul class=\"list-unstyled mb-0\">
                ";
        // line 284
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 284, $this->source); })()), "weaknesses", [], "any", false, false, false, 284));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 285
            yield "                    <li class=\"feedback-item\">
                        <span class=\"text-danger mt-1\">✖</span>
                        <span>";
            // line 287
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["item"], "html", null, true);
            yield "</span>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        yield "            </ul>
        </div>

        ";
        // line 294
        yield "        <div class=\"d-flex gap-3 flex-wrap justify-content-center\">
            <a href=\"";
        // line 295
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 295, $this->source); })()), "idFormation", [], "any", false, false, false, 295)]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour à la formation
            </a>
            <a href=\"";
        // line 298
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_index");
        yield "\" class=\"btn btn-outline-secondary\">
                <i class=\"fas fa-graduation-cap me-2\"></i> Toutes les formations
            </a>
            ";
        // line 301
        if ((($tmp =  !(isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 301, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 302
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_quiz_start", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 302, $this->source); })()), "idFormation", [], "any", false, false, false, 302)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                    <i class=\"fas fa-redo me-2\"></i> Réessayer
                </a>
            ";
        }
        // line 306
        yield "        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animation de la barre de progression
    const bar = document.querySelector('.progress-bar-fill');
    if (bar) {
        const target = parseFloat(bar.dataset.target);
        setTimeout(() => { bar.style.width = Math.min(target, 100) + '%'; }, 200);
    }
});
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
        return "formations/quiz_result.html.twig";
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
        return array (  538 => 306,  530 => 302,  528 => 301,  522 => 298,  516 => 295,  513 => 294,  508 => 290,  499 => 287,  495 => 285,  491 => 284,  485 => 280,  476 => 277,  472 => 275,  468 => 274,  461 => 269,  458 => 267,  450 => 262,  445 => 260,  439 => 259,  435 => 258,  429 => 254,  425 => 252,  417 => 248,  415 => 247,  407 => 244,  403 => 243,  397 => 239,  394 => 238,  382 => 228,  375 => 224,  371 => 223,  366 => 221,  360 => 218,  355 => 215,  349 => 211,  341 => 208,  337 => 207,  333 => 206,  330 => 205,  327 => 204,  324 => 202,  314 => 198,  311 => 197,  306 => 196,  296 => 192,  293 => 191,  288 => 190,  284 => 187,  274 => 186,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Résultat du Quiz — {{ formation.titre }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .result-hero {
        padding: 50px 0 30px;
        text-align: center;
    }

    .score-circle {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-weight: 800;
        font-size: 40px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
    }

    .score-circle:hover { transform: scale(1.05); }

    .score-circle.success {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: 6px solid #1e7e34;
    }

    .score-circle.failure {
        background: linear-gradient(135deg, #fd7e14, #dc3545);
        color: white;
        border: 6px solid #c0392b;
    }

    .score-circle small {
        font-size: 14px;
        font-weight: 400;
        opacity: 0.9;
    }

    .progress-bar-container {
        background: #e9ecef;
        border-radius: 999px;
        height: 20px;
        overflow: hidden;
        margin: 12px 0;
    }

    .progress-bar-fill {
        height: 100%;
        border-radius: 999px;
        transition: width 1.2s ease;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 10px;
        font-size: 12px;
        font-weight: 700;
        color: white;
    }

    .progress-bar-fill.success-bar  { background: linear-gradient(90deg, #20c997, #28a745); }
    .progress-bar-fill.failure-bar  { background: linear-gradient(90deg, #fd7e14, #dc3545); }

    .threshold-line {
        position: relative;
        margin: 16px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #6c757d;
    }

    .threshold-line::before {
        content: '';
        flex: 1;
        height: 1px;
        background: #dee2e6;
    }

    .result-card {
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-bottom: 24px;
        border: 1px solid #e8d5b7;
    }

    .feedback-section {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 24px;
        margin-top: 20px;
    }

    .feedback-section h5 {
        font-weight: 700;
        margin-bottom: 12px;
    }

    .feedback-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 8px;
        font-size: 15px;
    }

    .cert-banner {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border-radius: 20px;
        padding: 32px;
        text-align: center;
        margin-bottom: 24px;
        box-shadow: 0 8px 30px rgba(139,0,0,0.3);
    }

    .cert-banner .cert-icon {
        font-size: 64px;
        margin-bottom: 16px;
    }

    .nopass-banner {
        background: #fff3cd;
        border: 2px solid #ffc107;
        border-radius: 20px;
        padding: 28px;
        text-align: center;
        margin-bottom: 24px;
        color: #664d03;
    }

    .btn-cert {
        background: white;
        color: #8B0000;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        font-size: 17px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        margin-top: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .btn-cert:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        color: #8B0000;
    }

    .btn-retry {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-top: 12px;
        transition: all 0.3s ease;
    }

    .btn-retry:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139,0,0,0.4);
        color: white;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container result-hero\">

    {# ── Messages Flash ── #}
    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show mb-4\" role=\"alert\">
            <i class=\"fas fa-check-circle me-2\"></i> {{ msg }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    {% for msg in app.flashes('warning') %}
        <div class=\"alert alert-warning alert-dismissible fade show mb-4\" role=\"alert\">
            <i class=\"fas fa-exclamation-triangle me-2\"></i> {{ msg }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {# ── Cercle de score ── #}
    {% set passed = result.percentage >= threshold|default(80) %}

    <div class=\"score-circle {{ passed ? 'success' : 'failure' }}\">
        {{ result.percentage|number_format(0) }}%
        <small>{{ result.score }}/{{ result.totalQuestions }}</small>
    </div>

    <h2 class=\"fw-bold mb-1\">{{ formation.titre }}</h2>
    <p class=\"text-muted\">Résultat du quiz</p>

    {# ── Barre de progression ── #}
    <div class=\"col-md-8 mx-auto\">
        <div class=\"d-flex justify-content-between small text-muted mb-1\">
            <span>Votre score</span>
            <span>Seuil de certification : {{ threshold|default(80) }}%</span>
        </div>
        <div class=\"progress-bar-container\">
            <div class=\"progress-bar-fill {{ passed ? 'success-bar' : 'failure-bar' }}\"
                 style=\"width: 0%\"
                 data-target=\"{{ result.percentage }}\">
                {{ result.percentage|number_format(0) }}%
            </div>
        </div>
        <div class=\"threshold-line\">
            <span>{{ passed ? '🏆 Seuil atteint !' : '⚠️ Seuil non atteint — ' ~ threshold|default(80) ~ '% requis' }}</span>
        </div>
    </div>

</div>

<div class=\"container pb-5\">
    <div class=\"col-md-8 mx-auto\">

        {# ── Bannière certificat ou message d'échec ── #}
        {% if passed %}
            <div class=\"cert-banner\">
                <div class=\"cert-icon\">🏅</div>
                <h3 class=\"fw-bold\">Félicitations !</h3>
                <p class=\"mb-0 opacity-90\">
                    Vous avez obtenu <strong>{{ result.percentage|number_format(0) }}%</strong>
                    ({{ result.score }}/{{ result.totalQuestions }} bonnes réponses).<br>
                    Votre certificat de réussite est disponible.
                </p>
                {% if result.certificate %}
                    <a href=\"{{ path('app_certificate_show', {id: result.certificate.id}) }}\" class=\"btn-cert\">
                        <i class=\"fas fa-certificate me-2\"></i> Voir mon certificat
                    </a>
                {% endif %}
            </div>
        {% else %}
            <div class=\"nopass-banner\">
                <div style=\"font-size: 56px; margin-bottom: 12px;\">📖</div>
                <h4 class=\"fw-bold\">Score insuffisant pour la certification</h4>
                <p class=\"mb-2\">
                    Votre score : <strong>{{ result.percentage|number_format(0) }}%</strong>
                    ({{ result.score }}/{{ result.totalQuestions }}).<br>
                    Il vous faut <strong>{{ threshold|default(80) }}%</strong> minimum pour obtenir le certificat.
                </p>
                <a href=\"{{ path('app_formations_quiz_start', {id: formation.idFormation}) }}\" class=\"btn-retry\">
                    <i class=\"fas fa-redo me-2\"></i> Réessayer le quiz
                </a>
            </div>
        {% endif %}

        {# ── Feedback IA ── #}
        <div class=\"result-card\">
            <h5 class=\"fw-bold mb-3\"><i class=\"fas fa-lightbulb text-warning me-2\"></i>Analyse de votre performance</h5>

            <p class=\"mb-2 text-success fw-semibold\"><i class=\"fas fa-thumbs-up me-1\"></i> Points forts</p>
            <ul class=\"list-unstyled mb-4\">
                {% for item in feedback.strengths %}
                    <li class=\"feedback-item\">
                        <span class=\"text-success mt-1\">✔</span>
                        <span>{{ item }}</span>
                    </li>
                {% endfor %}
            </ul>

            <p class=\"mb-2 text-danger fw-semibold\"><i class=\"fas fa-thumbs-down me-1\"></i> Points à améliorer</p>
            <ul class=\"list-unstyled mb-0\">
                {% for item in feedback.weaknesses %}
                    <li class=\"feedback-item\">
                        <span class=\"text-danger mt-1\">✖</span>
                        <span>{{ item }}</span>
                    </li>
                {% endfor %}
            </ul>
        </div>

        {# ── Boutons de navigation ── #}
        <div class=\"d-flex gap-3 flex-wrap justify-content-center\">
            <a href=\"{{ path('app_formations_show', {id: formation.idFormation}) }}\" class=\"btn btn-secondary\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour à la formation
            </a>
            <a href=\"{{ path('app_formations_index') }}\" class=\"btn btn-outline-secondary\">
                <i class=\"fas fa-graduation-cap me-2\"></i> Toutes les formations
            </a>
            {% if not passed %}
                <a href=\"{{ path('app_formations_quiz_start', {id: formation.idFormation}) }}\" class=\"btn btn-primary\">
                    <i class=\"fas fa-redo me-2\"></i> Réessayer
                </a>
            {% endif %}
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animation de la barre de progression
    const bar = document.querySelector('.progress-bar-fill');
    if (bar) {
        const target = parseFloat(bar.dataset.target);
        setTimeout(() => { bar.style.width = Math.min(target, 100) + '%'; }, 200);
    }
});
</script>
{% endblock %}
", "formations/quiz_result.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\formations\\quiz_result.html.twig");
    }
}

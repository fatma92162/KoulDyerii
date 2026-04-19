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

/* partenaire/collaborations.html.twig */
class __TwigTemplate_02a74e234258448c762f794771163699 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/collaborations.html.twig"));

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

        yield "Mes Collaborations - Koul Dyeri";
        
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

    .nav-tabs {
        border-bottom: 2px solid #E8D5B7;
        margin-bottom: 30px;
    }

    .nav-link {
        color: #8B0000;
        font-weight: 600;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #A52A2A;
        border-bottom-color: #E8D5B7;
    }

    .nav-link.active {
        color: white;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border-radius: 8px 8px 0 0;
        border: none;
    }

    .collaboration-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border-left: 5px solid;
    }

    .collaboration-card.validee {
        border-left-color: #28a745;
    }

    .collaboration-card.refusee {
        border-left-color: #dc3545;
    }

    .collaboration-card.annulee {
        border-left-color: #6c757d;
    }

    .collaboration-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.15);
    }

    .collaboration-header {
        display: flex;
        align-items: center;
        padding: 20px;
        background: #FFF8F0;
        border-bottom: 1px solid #E8D5B7;
    }

    .collaboration-image {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 15px;
        background: #e9ecef;
    }

    .collaboration-info {
        flex: 1;
    }

    .collaboration-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .collaboration-detail {
        font-size: 13px;
        color: #666;
        margin: 3px 0;
    }

    .collaboration-body {
        padding: 20px;
    }

    .statut-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }

    .statut-validee {
        background: #d4edda;
        color: #155724;
    }

    .statut-refusee {
        background: #f8d7da;
        color: #721c24;
    }

    .statut-annulee {
        background: #e2e3e5;
        color: #383d41;
    }

    .btn-annuler {
        background: #dc3545;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(220, 53, 69, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        color: #8B0000;
        text-decoration: none;
        margin-bottom: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        color: #A52A2A;
        gap: 8px;
    }

    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        border-top: 4px solid;
    }

    .stat-card.validee {
        border-top-color: #28a745;
    }

    .stat-card.refusee {
        border-top-color: #dc3545;
    }

    .stat-card.annulee {
        border-top-color: #6c757d;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 8px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 215
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 216
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-link\"></i> Mes Collaborations</h1>
        <p class=\"lead\">Gérez vos collaborations de produits</p>
    </div>
</div>

<div class=\"container mb-5\">
    <a href=\"";
        // line 224
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_index");
        yield "\" class=\"back-link\">
        <i class=\"fas fa-arrow-left\"></i> Retour à l'espace partenaire
    </a>

    ";
        // line 228
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 228, $this->source); })()), "flashes", ["success"], "method", false, false, false, 228));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 229
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 230
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 234
        yield "
    ";
        // line 235
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 235, $this->source); })()), "flashes", ["error"], "method", false, false, false, 235));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 236
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 237
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 241
        yield "
    ";
        // line 243
        yield "    ";
        $context["countValidee"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "validee", [], "array", true, true, false, 243)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 243, $this->source); })()), "validee", [], "array", false, false, false, 243), [])) : ([])));
        // line 244
        yield "    ";
        $context["countRefusee"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "refusee", [], "array", true, true, false, 244)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 244, $this->source); })()), "refusee", [], "array", false, false, false, 244), [])) : ([])));
        // line 245
        yield "    ";
        $context["countAnnulee"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "annulee", [], "array", true, true, false, 245)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 245, $this->source); })()), "annulee", [], "array", false, false, false, 245), [])) : ([])));
        // line 246
        yield "
    ";
        // line 247
        if (((((isset($context["countValidee"]) || array_key_exists("countValidee", $context) ? $context["countValidee"] : (function () { throw new RuntimeError('Variable "countValidee" does not exist.', 247, $this->source); })()) > 0) || ((isset($context["countRefusee"]) || array_key_exists("countRefusee", $context) ? $context["countRefusee"] : (function () { throw new RuntimeError('Variable "countRefusee" does not exist.', 247, $this->source); })()) > 0)) || ((isset($context["countAnnulee"]) || array_key_exists("countAnnulee", $context) ? $context["countAnnulee"] : (function () { throw new RuntimeError('Variable "countAnnulee" does not exist.', 247, $this->source); })()) > 0))) {
            // line 248
            yield "    <div class=\"stats-row\">
        ";
            // line 249
            if (((isset($context["countValidee"]) || array_key_exists("countValidee", $context) ? $context["countValidee"] : (function () { throw new RuntimeError('Variable "countValidee" does not exist.', 249, $this->source); })()) > 0)) {
                // line 250
                yield "        <div class=\"stat-card validee\">
            <div class=\"stat-number\">";
                // line 251
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["countValidee"]) || array_key_exists("countValidee", $context) ? $context["countValidee"] : (function () { throw new RuntimeError('Variable "countValidee" does not exist.', 251, $this->source); })()), "html", null, true);
                yield "</div>
            <div class=\"stat-label\">Active(s)</div>
        </div>
        ";
            }
            // line 255
            yield "        ";
            if (((isset($context["countRefusee"]) || array_key_exists("countRefusee", $context) ? $context["countRefusee"] : (function () { throw new RuntimeError('Variable "countRefusee" does not exist.', 255, $this->source); })()) > 0)) {
                // line 256
                yield "        <div class=\"stat-card refusee\">
            <div class=\"stat-number\">";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["countRefusee"]) || array_key_exists("countRefusee", $context) ? $context["countRefusee"] : (function () { throw new RuntimeError('Variable "countRefusee" does not exist.', 257, $this->source); })()), "html", null, true);
                yield "</div>
            <div class=\"stat-label\">Refusée(s)</div>
        </div>
        ";
            }
            // line 261
            yield "        ";
            if (((isset($context["countAnnulee"]) || array_key_exists("countAnnulee", $context) ? $context["countAnnulee"] : (function () { throw new RuntimeError('Variable "countAnnulee" does not exist.', 261, $this->source); })()) > 0)) {
                // line 262
                yield "        <div class=\"stat-card annulee\">
            <div class=\"stat-number\">";
                // line 263
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["countAnnulee"]) || array_key_exists("countAnnulee", $context) ? $context["countAnnulee"] : (function () { throw new RuntimeError('Variable "countAnnulee" does not exist.', 263, $this->source); })()), "html", null, true);
                yield "</div>
            <div class=\"stat-label\">Annulée(s)</div>
        </div>
        ";
            }
            // line 267
            yield "    </div>
    ";
        }
        // line 269
        yield "
    ";
        // line 271
        yield "    <ul class=\"nav nav-tabs\" role=\"tablist\">
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link active\" id=\"tab-validee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-validee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-check-circle\"></i> Actives (";
        // line 274
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "validee", [], "array", true, true, false, 274)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 274, $this->source); })()), "validee", [], "array", false, false, false, 274), [])) : ([]))), "html", null, true);
        yield ")
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"tab-refusee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-refusee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-times-circle\"></i> Refusées (";
        // line 279
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "refusee", [], "array", true, true, false, 279)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 279, $this->source); })()), "refusee", [], "array", false, false, false, 279), [])) : ([]))), "html", null, true);
        yield ")
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"tab-annulee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-annulee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-ban\"></i> Annulées (";
        // line 284
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "annulee", [], "array", true, true, false, 284)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 284, $this->source); })()), "annulee", [], "array", false, false, false, 284), [])) : ([]))), "html", null, true);
        yield ")
            </button>
        </li>
    </ul>

    <div class=\"tab-content\">
        ";
        // line 291
        yield "        <div class=\"tab-pane fade show active\" id=\"tab-validee-pane\" role=\"tabpanel\">
            ";
        // line 292
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "validee", [], "array", true, true, false, 292)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 292, $this->source); })()), "validee", [], "array", false, false, false, 292), [])) : ([]))) > 0)) {
            // line 293
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 293, $this->source); })()), "validee", [], "array", false, false, false, 293));
            foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                // line 294
                yield "                <div class=\"collaboration-card validee\">
                    <div class=\"collaboration-header\">
                        ";
                // line 296
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 296), "photo", [], "any", false, false, false, 296)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 297
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 297), "photo", [], "any", false, false, false, 297), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 297), "nom", [], "any", false, false, false, 297), "html", null, true);
                    yield "\" class=\"collaboration-image\">
                        ";
                } else {
                    // line 299
                    yield "                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        ";
                }
                // line 301
                yield "                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                ";
                // line 303
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 303), "nom", [], "any", false, false, false, 303), "html", null, true);
                yield "
                                <span class=\"statut-badge statut-validee\">
                                    <i class=\"fas fa-check\"></i> Active
                                </span>
                            </div>
                            ";
                // line 308
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 308), "description", [], "any", false, false, false, 308)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 309
                    yield "                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> ";
                    // line 310
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 310), "description", [], "any", false, false, false, 310), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 310), "description", [], "any", false, false, false, 310)) > 100)) {
                        yield "…";
                    }
                    // line 311
                    yield "                            </div>
                            ";
                }
                // line 313
                yield "                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> ";
                // line 314
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 314), "prix", [], "any", false, false, false, 314), 2, ",", " "), "html", null, true);
                yield " €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Depuis:</strong> ";
                // line 317
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 317), "d/m/Y à H:i"), "html", null, true);
                yield "
                            </div>
                        </div>
                    </div>
                    <div class=\"collaboration-body\">
                        <form action=\"";
                // line 322
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_annuler_collaboration", ["collaborationId" => CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "id", [], "any", false, false, false, 322)]), "html", null, true);
                yield "\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir annuler cette collaboration ?');\">
                            <button type=\"submit\" class=\"btn-annuler\">
                                <i class=\"fas fa-times\"></i> Annuler la collaboration
                            </button>
                        </form>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 330
            yield "            ";
        } else {
            // line 331
            yield "                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">🔗</div>
                    <h4>Aucune collaboration active</h4>
                    <p>Retournez à l'accueil pour activer une collaboration sur un produit recommandé</p>
                    <a href=\"";
            // line 335
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_index");
            yield "\" class=\"btn btn-primary mt-3\">
                        <i class=\"fas fa-arrow-left\"></i> Voir les produits
                    </a>
                </div>
            ";
        }
        // line 340
        yield "        </div>

        ";
        // line 343
        yield "        <div class=\"tab-pane fade\" id=\"tab-refusee-pane\" role=\"tabpanel\">
            ";
        // line 344
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "refusee", [], "array", true, true, false, 344)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 344, $this->source); })()), "refusee", [], "array", false, false, false, 344), [])) : ([]))) > 0)) {
            // line 345
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 345, $this->source); })()), "refusee", [], "array", false, false, false, 345));
            foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                // line 346
                yield "                <div class=\"collaboration-card refusee\">
                    <div class=\"collaboration-header\">
                        ";
                // line 348
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 348), "photo", [], "any", false, false, false, 348)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 349
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 349), "photo", [], "any", false, false, false, 349), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 349), "nom", [], "any", false, false, false, 349), "html", null, true);
                    yield "\" class=\"collaboration-image\">
                        ";
                } else {
                    // line 351
                    yield "                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        ";
                }
                // line 353
                yield "                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                ";
                // line 355
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 355), "nom", [], "any", false, false, false, 355), "html", null, true);
                yield "
                                <span class=\"statut-badge statut-refusee\">
                                    <i class=\"fas fa-times\"></i> Refusée
                                </span>
                            </div>
                            ";
                // line 360
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 360), "description", [], "any", false, false, false, 360)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 361
                    yield "                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> ";
                    // line 362
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 362), "description", [], "any", false, false, false, 362), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 362), "description", [], "any", false, false, false, 362)) > 100)) {
                        yield "…";
                    }
                    // line 363
                    yield "                            </div>
                            ";
                }
                // line 365
                yield "                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> ";
                // line 366
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 366), "prix", [], "any", false, false, false, 366), 2, ",", " "), "html", null, true);
                yield " €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Demandée le:</strong> ";
                // line 369
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 369), "d/m/Y à H:i"), "html", null, true);
                yield "
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 375
            yield "            ";
        } else {
            // line 376
            yield "                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">✅</div>
                    <h4>Aucune collaboration refusée</h4>
                    <p>Toutes vos demandes ont été acceptées !</p>
                </div>
            ";
        }
        // line 382
        yield "        </div>

        ";
        // line 385
        yield "        <div class=\"tab-pane fade\" id=\"tab-annulee-pane\" role=\"tabpanel\">
            ";
        // line 386
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["parStatut"] ?? null), "annulee", [], "array", true, true, false, 386)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 386, $this->source); })()), "annulee", [], "array", false, false, false, 386), [])) : ([]))) > 0)) {
            // line 387
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parStatut"]) || array_key_exists("parStatut", $context) ? $context["parStatut"] : (function () { throw new RuntimeError('Variable "parStatut" does not exist.', 387, $this->source); })()), "annulee", [], "array", false, false, false, 387));
            foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                // line 388
                yield "                <div class=\"collaboration-card annulee\">
                    <div class=\"collaboration-header\">
                        ";
                // line 390
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 390), "photo", [], "any", false, false, false, 390)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 391
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 391), "photo", [], "any", false, false, false, 391), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 391), "nom", [], "any", false, false, false, 391), "html", null, true);
                    yield "\" class=\"collaboration-image\">
                        ";
                } else {
                    // line 393
                    yield "                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        ";
                }
                // line 395
                yield "                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                ";
                // line 397
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 397), "nom", [], "any", false, false, false, 397), "html", null, true);
                yield "
                                <span class=\"statut-badge statut-annulee\">
                                    <i class=\"fas fa-ban\"></i> Annulée
                                </span>
                            </div>
                            ";
                // line 402
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 402), "description", [], "any", false, false, false, 402)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 403
                    yield "                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> ";
                    // line 404
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 404), "description", [], "any", false, false, false, 404), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 404), "description", [], "any", false, false, false, 404)) > 100)) {
                        yield "…";
                    }
                    // line 405
                    yield "                            </div>
                            ";
                }
                // line 407
                yield "                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> ";
                // line 408
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 408), "prix", [], "any", false, false, false, 408), 2, ",", " "), "html", null, true);
                yield " €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Annulée le:</strong> ";
                // line 411
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 411), "d/m/Y à H:i"), "html", null, true);
                yield "
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 417
            yield "            ";
        } else {
            // line 418
            yield "                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">🔄</div>
                    <h4>Aucune collaboration annulée</h4>
                    <p>Vous n'avez pas annulé de collaboration pour le moment</p>
                </div>
            ";
        }
        // line 424
        yield "        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bootstrap tab functionality is already built-in
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
        return "partenaire/collaborations.html.twig";
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
        return array (  743 => 424,  735 => 418,  732 => 417,  720 => 411,  714 => 408,  711 => 407,  707 => 405,  702 => 404,  699 => 403,  697 => 402,  689 => 397,  685 => 395,  681 => 393,  673 => 391,  671 => 390,  667 => 388,  662 => 387,  660 => 386,  657 => 385,  653 => 382,  645 => 376,  642 => 375,  630 => 369,  624 => 366,  621 => 365,  617 => 363,  612 => 362,  609 => 361,  607 => 360,  599 => 355,  595 => 353,  591 => 351,  583 => 349,  581 => 348,  577 => 346,  572 => 345,  570 => 344,  567 => 343,  563 => 340,  555 => 335,  549 => 331,  546 => 330,  532 => 322,  524 => 317,  518 => 314,  515 => 313,  511 => 311,  506 => 310,  503 => 309,  501 => 308,  493 => 303,  489 => 301,  485 => 299,  477 => 297,  475 => 296,  471 => 294,  466 => 293,  464 => 292,  461 => 291,  452 => 284,  444 => 279,  436 => 274,  431 => 271,  428 => 269,  424 => 267,  417 => 263,  414 => 262,  411 => 261,  404 => 257,  401 => 256,  398 => 255,  391 => 251,  388 => 250,  386 => 249,  383 => 248,  381 => 247,  378 => 246,  375 => 245,  372 => 244,  369 => 243,  366 => 241,  356 => 237,  353 => 236,  349 => 235,  346 => 234,  336 => 230,  333 => 229,  329 => 228,  322 => 224,  312 => 216,  302 => 215,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes Collaborations - Koul Dyeri{% endblock %}

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

    .nav-tabs {
        border-bottom: 2px solid #E8D5B7;
        margin-bottom: 30px;
    }

    .nav-link {
        color: #8B0000;
        font-weight: 600;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #A52A2A;
        border-bottom-color: #E8D5B7;
    }

    .nav-link.active {
        color: white;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border-radius: 8px 8px 0 0;
        border: none;
    }

    .collaboration-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border-left: 5px solid;
    }

    .collaboration-card.validee {
        border-left-color: #28a745;
    }

    .collaboration-card.refusee {
        border-left-color: #dc3545;
    }

    .collaboration-card.annulee {
        border-left-color: #6c757d;
    }

    .collaboration-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.15);
    }

    .collaboration-header {
        display: flex;
        align-items: center;
        padding: 20px;
        background: #FFF8F0;
        border-bottom: 1px solid #E8D5B7;
    }

    .collaboration-image {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 15px;
        background: #e9ecef;
    }

    .collaboration-info {
        flex: 1;
    }

    .collaboration-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .collaboration-detail {
        font-size: 13px;
        color: #666;
        margin: 3px 0;
    }

    .collaboration-body {
        padding: 20px;
    }

    .statut-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }

    .statut-validee {
        background: #d4edda;
        color: #155724;
    }

    .statut-refusee {
        background: #f8d7da;
        color: #721c24;
    }

    .statut-annulee {
        background: #e2e3e5;
        color: #383d41;
    }

    .btn-annuler {
        background: #dc3545;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(220, 53, 69, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        color: #8B0000;
        text-decoration: none;
        margin-bottom: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        color: #A52A2A;
        gap: 8px;
    }

    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        border-top: 4px solid;
    }

    .stat-card.validee {
        border-top-color: #28a745;
    }

    .stat-card.refusee {
        border-top-color: #dc3545;
    }

    .stat-card.annulee {
        border-top-color: #6c757d;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 8px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-link\"></i> Mes Collaborations</h1>
        <p class=\"lead\">Gérez vos collaborations de produits</p>
    </div>
</div>

<div class=\"container mb-5\">
    <a href=\"{{ path('app_partenaire_index') }}\" class=\"back-link\">
        <i class=\"fas fa-arrow-left\"></i> Retour à l'espace partenaire
    </a>

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

    {# Statistiques #}
    {% set countValidee = parStatut['validee']|default([])|length %}
    {% set countRefusee = parStatut['refusee']|default([])|length %}
    {% set countAnnulee = parStatut['annulee']|default([])|length %}

    {% if countValidee > 0 or countRefusee > 0 or countAnnulee > 0 %}
    <div class=\"stats-row\">
        {% if countValidee > 0 %}
        <div class=\"stat-card validee\">
            <div class=\"stat-number\">{{ countValidee }}</div>
            <div class=\"stat-label\">Active(s)</div>
        </div>
        {% endif %}
        {% if countRefusee > 0 %}
        <div class=\"stat-card refusee\">
            <div class=\"stat-number\">{{ countRefusee }}</div>
            <div class=\"stat-label\">Refusée(s)</div>
        </div>
        {% endif %}
        {% if countAnnulee > 0 %}
        <div class=\"stat-card annulee\">
            <div class=\"stat-number\">{{ countAnnulee }}</div>
            <div class=\"stat-label\">Annulée(s)</div>
        </div>
        {% endif %}
    </div>
    {% endif %}

    {# Onglets par statut #}
    <ul class=\"nav nav-tabs\" role=\"tablist\">
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link active\" id=\"tab-validee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-validee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-check-circle\"></i> Actives ({{ parStatut['validee']|default([])|length }})
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"tab-refusee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-refusee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-times-circle\"></i> Refusées ({{ parStatut['refusee']|default([])|length }})
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"tab-annulee\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-annulee-pane\" type=\"button\" role=\"tab\">
                <i class=\"fas fa-ban\"></i> Annulées ({{ parStatut['annulee']|default([])|length }})
            </button>
        </li>
    </ul>

    <div class=\"tab-content\">
        {# TAB: Actives #}
        <div class=\"tab-pane fade show active\" id=\"tab-validee-pane\" role=\"tabpanel\">
            {% if parStatut['validee']|default([])|length > 0 %}
                {% for collab in parStatut['validee'] %}
                <div class=\"collaboration-card validee\">
                    <div class=\"collaboration-header\">
                        {% if collab.produit.photo %}
                            <img src=\"{{ collab.produit.photo }}\" alt=\"{{ collab.produit.nom }}\" class=\"collaboration-image\">
                        {% else %}
                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        {% endif %}
                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                {{ collab.produit.nom }}
                                <span class=\"statut-badge statut-validee\">
                                    <i class=\"fas fa-check\"></i> Active
                                </span>
                            </div>
                            {% if collab.produit.description %}
                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> {{ collab.produit.description|slice(0, 100) }}{% if collab.produit.description|length > 100 %}…{% endif %}
                            </div>
                            {% endif %}
                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> {{ collab.produit.prix|number_format(2, ',', ' ') }} €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Depuis:</strong> {{ collab.createdAt|date('d/m/Y à H:i') }}
                            </div>
                        </div>
                    </div>
                    <div class=\"collaboration-body\">
                        <form action=\"{{ path('app_partenaire_annuler_collaboration', {collaborationId: collab.id}) }}\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir annuler cette collaboration ?');\">
                            <button type=\"submit\" class=\"btn-annuler\">
                                <i class=\"fas fa-times\"></i> Annuler la collaboration
                            </button>
                        </form>
                    </div>
                </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">🔗</div>
                    <h4>Aucune collaboration active</h4>
                    <p>Retournez à l'accueil pour activer une collaboration sur un produit recommandé</p>
                    <a href=\"{{ path('app_partenaire_index') }}\" class=\"btn btn-primary mt-3\">
                        <i class=\"fas fa-arrow-left\"></i> Voir les produits
                    </a>
                </div>
            {% endif %}
        </div>

        {# TAB: Refusées #}
        <div class=\"tab-pane fade\" id=\"tab-refusee-pane\" role=\"tabpanel\">
            {% if parStatut['refusee']|default([])|length > 0 %}
                {% for collab in parStatut['refusee'] %}
                <div class=\"collaboration-card refusee\">
                    <div class=\"collaboration-header\">
                        {% if collab.produit.photo %}
                            <img src=\"{{ collab.produit.photo }}\" alt=\"{{ collab.produit.nom }}\" class=\"collaboration-image\">
                        {% else %}
                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        {% endif %}
                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                {{ collab.produit.nom }}
                                <span class=\"statut-badge statut-refusee\">
                                    <i class=\"fas fa-times\"></i> Refusée
                                </span>
                            </div>
                            {% if collab.produit.description %}
                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> {{ collab.produit.description|slice(0, 100) }}{% if collab.produit.description|length > 100 %}…{% endif %}
                            </div>
                            {% endif %}
                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> {{ collab.produit.prix|number_format(2, ',', ' ') }} €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Demandée le:</strong> {{ collab.createdAt|date('d/m/Y à H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">✅</div>
                    <h4>Aucune collaboration refusée</h4>
                    <p>Toutes vos demandes ont été acceptées !</p>
                </div>
            {% endif %}
        </div>

        {# TAB: Annulées #}
        <div class=\"tab-pane fade\" id=\"tab-annulee-pane\" role=\"tabpanel\">
            {% if parStatut['annulee']|default([])|length > 0 %}
                {% for collab in parStatut['annulee'] %}
                <div class=\"collaboration-card annulee\">
                    <div class=\"collaboration-header\">
                        {% if collab.produit.photo %}
                            <img src=\"{{ collab.produit.photo }}\" alt=\"{{ collab.produit.nom }}\" class=\"collaboration-image\">
                        {% else %}
                            <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:32px;\">🛍️</div>
                        {% endif %}
                        <div class=\"collaboration-info\">
                            <div class=\"collaboration-title\">
                                {{ collab.produit.nom }}
                                <span class=\"statut-badge statut-annulee\">
                                    <i class=\"fas fa-ban\"></i> Annulée
                                </span>
                            </div>
                            {% if collab.produit.description %}
                            <div class=\"collaboration-detail\">
                                <strong>Description:</strong> {{ collab.produit.description|slice(0, 100) }}{% if collab.produit.description|length > 100 %}…{% endif %}
                            </div>
                            {% endif %}
                            <div class=\"collaboration-detail\">
                                <strong>Prix:</strong> {{ collab.produit.prix|number_format(2, ',', ' ') }} €
                            </div>
                            <div class=\"collaboration-detail\">
                                <strong>Annulée le:</strong> {{ collab.createdAt|date('d/m/Y à H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            {% else %}
                <div class=\"empty-state\">
                    <div class=\"empty-state-icon\">🔄</div>
                    <h4>Aucune collaboration annulée</h4>
                    <p>Vous n'avez pas annulé de collaboration pour le moment</p>
                </div>
            {% endif %}
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bootstrap tab functionality is already built-in
});
</script>
{% endblock %}
", "partenaire/collaborations.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\collaborations.html.twig");
    }
}

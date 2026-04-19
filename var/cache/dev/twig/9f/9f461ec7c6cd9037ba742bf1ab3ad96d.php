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

/* partenaire/mes_plats.html.twig */
class __TwigTemplate_8b09ec74efbb94effc1d94d2a978ed56 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/mes_plats.html.twig"));

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

        yield "Mes plats - Koul Dyeri";
        
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
    
    /* Cartes statistiques */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: #8B0000;
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 24px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 12px;
        color: #666;
    }
    
    /* Barre de recherche */
    .filter-bar {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 15px 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }
    
    .btn-reset {
        background: #E8D5B7;
        border: none;
        color: #8B4513;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .plat-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border: 1px solid #E8D5B7;
    }
    
    .plat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.15);
    }
    
    .plat-image {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    
    .plat-image-placeholder {
        height: 200px;
        background: linear-gradient(135deg, #F5E6D3, #E8D5B7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: #8B4513;
    }
    
    .price {
        font-size: 24px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        margin-top: 15px;
    }
    
    .btn-action-group .btn {
        flex: 1;
        padding: 8px;
        font-size: 13px;
    }
    
    .btn-modifier {
        background: #ffc107;
        border: none;
        color: #000;
        border-radius: 8px;
    }
    
    .btn-modifier:hover {
        background: #e0a800;
        transform: translateY(-2px);
    }
    
    .btn-supprimer {
        background: #dc3545;
        border: none;
        color: white;
        border-radius: 8px;
    }
    
    .btn-supprimer:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
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

    // line 191
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 192
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-utensils\"></i> Mes plats</h1>
        <p class=\"lead\">Gérez votre carte culinaire</p>
    </div>
</div>

<div class=\"container mb-5\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>Liste de mes plats</h3>
        <a href=\"";
        // line 202
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_ajouter_plat");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter un plat
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card ";
        // line 209
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 209, $this->source); })()) == "")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">";
        // line 210
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 210)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 210, $this->source); })()), "total", [], "any", false, false, false, 210), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total plats</div>
        </div>
        <div class=\"stat-card ";
        // line 213
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 213, $this->source); })()) == "en_attente")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('en_attente')\">
            <div class=\"stat-number\">";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "en_attente", [], "any", true, true, false, 214)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 214, $this->source); })()), "en_attente", [], "any", false, false, false, 214), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card ";
        // line 217
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 217, $this->source); })()) == "accepte")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('accepte')\">
            <div class=\"stat-number\">";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "accepte", [], "any", true, true, false, 218)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 218, $this->source); })()), "accepte", [], "any", false, false, false, 218), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Acceptés</div>
        </div>
        <div class=\"stat-card ";
        // line 221
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 221, $this->source); })()) == "refuse")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('refuse')\">
            <div class=\"stat-number\">";
        // line 222
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "refuse", [], "any", true, true, false, 222)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 222, $this->source); })()), "refuse", [], "any", false, false, false, 222), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Refusés</div>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par nom, description ou ingrédients...\" 
                           value=\"";
        // line 236
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 236, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"statut\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_attente\" ";
        // line 241
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 241, $this->source); })()) == "en_attente")) {
            yield "selected";
        }
        yield ">⏳ En attente</option>
                        <option value=\"accepte\" ";
        // line 242
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 242, $this->source); })()) == "accepte")) {
            yield "selected";
        }
        yield ">✅ Acceptés</option>
                        <option value=\"refuse\" ";
        // line 243
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 243, $this->source); })()) == "refuse")) {
            yield "selected";
        }
        yield ">❌ Refusés</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"date_desc\" ";
        // line 248
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 248, $this->source); })()) == "date_desc")) {
            yield "selected";
        }
        yield ">📅 Plus récents</option>
                        <option value=\"date_asc\" ";
        // line 249
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 249, $this->source); })()) == "date_asc")) {
            yield "selected";
        }
        yield ">📅 Plus anciens</option>
                        <option value=\"nom_asc\" ";
        // line 250
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 250, $this->source); })()) == "nom_asc")) {
            yield "selected";
        }
        yield ">🔤 Nom A→Z</option>
                        <option value=\"nom_desc\" ";
        // line 251
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 251, $this->source); })()) == "nom_desc")) {
            yield "selected";
        }
        yield ">🔤 Nom Z→A</option>
                        <option value=\"prix_asc\" ";
        // line 252
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 252, $this->source); })()) == "prix_asc")) {
            yield "selected";
        }
        yield ">💰 Prix croissant</option>
                        <option value=\"prix_desc\" ";
        // line 253
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 253, $this->source); })()) == "prix_desc")) {
            yield "selected";
        }
        yield ">💰 Prix décroissant</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 259
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_mes_plats");
        yield "\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 267, $this->source); })()), "flashes", ["success"], "method", false, false, false, 267));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 268
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 269
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 273
        yield "    
    ";
        // line 274
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 274, $this->source); })()), "flashes", ["error"], "method", false, false, false, 274));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 275
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 276
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 280
        yield "
    ";
        // line 281
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 281, $this->source); })())) > 0)) {
            // line 282
            yield "        <div class=\"row\">
            ";
            // line 283
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 283, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
                // line 284
                yield "            <div class=\"col-md-4\">
                <div class=\"plat-card\">
                    ";
                // line 286
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 286)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 287
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 287), "html", null, true);
                    yield "\" class=\"plat-image\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 287), "html", null, true);
                    yield "\">
                    ";
                } else {
                    // line 289
                    yield "                        <div class=\"plat-image-placeholder\">
                            <i class=\"fas fa-utensils\"></i>
                        </div>
                    ";
                }
                // line 293
                yield "                    <div class=\"p-3\">
                        <div class=\"d-flex justify-content-between align-items-start\">
                            <h5 class=\"mb-2\">";
                // line 295
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 295), "html", null, true);
                yield "</h5>
                            <span class=\"status-badge status-";
                // line 296
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 296), "html", null, true);
                yield "\">
                                ";
                // line 297
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 297) == "en_attente")) ? ("En attente") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 297) == "accepte")) ? ("Accepté") : ("Refusé"))));
                yield "
                            </span>
                        </div>
                        <p class=\"text-muted small\">";
                // line 300
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 300), 0, 100), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 300)) > 100)) {
                    yield "...";
                }
                yield "</p>
                        <p><strong>Ingrédients:</strong> ";
                // line 301
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "ingredients", [], "any", false, false, false, 301), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "ingredients", [], "any", false, false, false, 301)) > 80)) {
                    yield "...";
                }
                yield "</p>
                        <div class=\"price\">";
                // line 302
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 302), 2, ",", " "), "html", null, true);
                yield " €</div>
                        <div class=\"btn-action-group\">
                            <a href=\"";
                // line 304
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_plat_modifier", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 304)]), "html", null, true);
                yield "\" class=\"btn btn-modifier\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            <form action=\"";
                // line 307
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_plat_supprimer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 307)]), "html", null, true);
                yield "\" method=\"post\" onsubmit=\"return confirm('Supprimer ce plat ?')\" style=\"flex:1\">
                                <input type=\"hidden\" name=\"search\" value=\"";
                // line 308
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 308, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                                <input type=\"hidden\" name=\"statut\" value=\"";
                // line 309
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statut", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 309, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                                <input type=\"hidden\" name=\"sort\" value=\"";
                // line 310
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 310, $this->source); })()), "date_desc")) : ("date_desc")), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn btn-supprimer w-100\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 320
            yield "        </div>
    ";
        } else {
            // line 322
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-utensils\"></i>
            <h4>Aucun plat trouvé</h4>
            <p class=\"text-muted\">Vous n'avez pas encore ajouté de plats ou aucun plat ne correspond à vos critères.</p>
            <a href=\"";
            // line 326
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_ajouter_plat");
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter votre premier plat
            </a>
        </div>
    ";
        }
        // line 331
        yield "</div>

<script>
function filterByStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}
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
        return "partenaire/mes_plats.html.twig";
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
        return array (  609 => 331,  601 => 326,  595 => 322,  591 => 320,  575 => 310,  571 => 309,  567 => 308,  563 => 307,  557 => 304,  552 => 302,  545 => 301,  538 => 300,  532 => 297,  528 => 296,  524 => 295,  520 => 293,  514 => 289,  506 => 287,  504 => 286,  500 => 284,  496 => 283,  493 => 282,  491 => 281,  488 => 280,  478 => 276,  475 => 275,  471 => 274,  468 => 273,  458 => 269,  455 => 268,  451 => 267,  440 => 259,  429 => 253,  423 => 252,  417 => 251,  411 => 250,  405 => 249,  399 => 248,  389 => 243,  383 => 242,  377 => 241,  369 => 236,  352 => 222,  346 => 221,  340 => 218,  334 => 217,  328 => 214,  322 => 213,  316 => 210,  310 => 209,  300 => 202,  288 => 192,  278 => 191,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes plats - Koul Dyeri{% endblock %}

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
    
    /* Cartes statistiques */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: #8B0000;
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 24px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 12px;
        color: #666;
    }
    
    /* Barre de recherche */
    .filter-bar {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 15px 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }
    
    .btn-reset {
        background: #E8D5B7;
        border: none;
        color: #8B4513;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .plat-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border: 1px solid #E8D5B7;
    }
    
    .plat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.15);
    }
    
    .plat-image {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    
    .plat-image-placeholder {
        height: 200px;
        background: linear-gradient(135deg, #F5E6D3, #E8D5B7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: #8B4513;
    }
    
    .price {
        font-size: 24px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        margin-top: 15px;
    }
    
    .btn-action-group .btn {
        flex: 1;
        padding: 8px;
        font-size: 13px;
    }
    
    .btn-modifier {
        background: #ffc107;
        border: none;
        color: #000;
        border-radius: 8px;
    }
    
    .btn-modifier:hover {
        background: #e0a800;
        transform: translateY(-2px);
    }
    
    .btn-supprimer {
        background: #dc3545;
        border: none;
        color: white;
        border-radius: 8px;
    }
    
    .btn-supprimer:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
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
        <h1><i class=\"fas fa-utensils\"></i> Mes plats</h1>
        <p class=\"lead\">Gérez votre carte culinaire</p>
    </div>
</div>

<div class=\"container mb-5\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>Liste de mes plats</h3>
        <a href=\"{{ path('app_partenaire_ajouter_plat') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter un plat
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card {% if statut == '' %}active{% endif %}\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">{{ stats.total|default(0) }}</div>
            <div class=\"stat-label\">Total plats</div>
        </div>
        <div class=\"stat-card {% if statut == 'en_attente' %}active{% endif %}\" onclick=\"filterByStatut('en_attente')\">
            <div class=\"stat-number\">{{ stats.en_attente|default(0) }}</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card {% if statut == 'accepte' %}active{% endif %}\" onclick=\"filterByStatut('accepte')\">
            <div class=\"stat-number\">{{ stats.accepte|default(0) }}</div>
            <div class=\"stat-label\">✅ Acceptés</div>
        </div>
        <div class=\"stat-card {% if statut == 'refuse' %}active{% endif %}\" onclick=\"filterByStatut('refuse')\">
            <div class=\"stat-number\">{{ stats.refuse|default(0) }}</div>
            <div class=\"stat-label\">❌ Refusés</div>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par nom, description ou ingrédients...\" 
                           value=\"{{ search|default('') }}\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"statut\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_attente\" {% if statut == 'en_attente' %}selected{% endif %}>⏳ En attente</option>
                        <option value=\"accepte\" {% if statut == 'accepte' %}selected{% endif %}>✅ Acceptés</option>
                        <option value=\"refuse\" {% if statut == 'refuse' %}selected{% endif %}>❌ Refusés</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"date_desc\" {% if sort == 'date_desc' %}selected{% endif %}>📅 Plus récents</option>
                        <option value=\"date_asc\" {% if sort == 'date_asc' %}selected{% endif %}>📅 Plus anciens</option>
                        <option value=\"nom_asc\" {% if sort == 'nom_asc' %}selected{% endif %}>🔤 Nom A→Z</option>
                        <option value=\"nom_desc\" {% if sort == 'nom_desc' %}selected{% endif %}>🔤 Nom Z→A</option>
                        <option value=\"prix_asc\" {% if sort == 'prix_asc' %}selected{% endif %}>💰 Prix croissant</option>
                        <option value=\"prix_desc\" {% if sort == 'prix_desc' %}selected{% endif %}>💰 Prix décroissant</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"{{ path('app_partenaire_mes_plats') }}\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

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

    {% if plats|length > 0 %}
        <div class=\"row\">
            {% for plat in plats %}
            <div class=\"col-md-4\">
                <div class=\"plat-card\">
                    {% if plat.image %}
                        <img src=\"{{ plat.image }}\" class=\"plat-image\" alt=\"{{ plat.nom }}\">
                    {% else %}
                        <div class=\"plat-image-placeholder\">
                            <i class=\"fas fa-utensils\"></i>
                        </div>
                    {% endif %}
                    <div class=\"p-3\">
                        <div class=\"d-flex justify-content-between align-items-start\">
                            <h5 class=\"mb-2\">{{ plat.nom }}</h5>
                            <span class=\"status-badge status-{{ plat.statut }}\">
                                {{ plat.statut == 'en_attente' ? 'En attente' : (plat.statut == 'accepte' ? 'Accepté' : 'Refusé') }}
                            </span>
                        </div>
                        <p class=\"text-muted small\">{{ plat.description|slice(0, 100) }}{% if plat.description|length > 100 %}...{% endif %}</p>
                        <p><strong>Ingrédients:</strong> {{ plat.ingredients|slice(0, 80) }}{% if plat.ingredients|length > 80 %}...{% endif %}</p>
                        <div class=\"price\">{{ plat.prix|number_format(2, ',', ' ') }} €</div>
                        <div class=\"btn-action-group\">
                            <a href=\"{{ path('app_partenaire_plat_modifier', {id: plat.id}) }}\" class=\"btn btn-modifier\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            <form action=\"{{ path('app_partenaire_plat_supprimer', {id: plat.id}) }}\" method=\"post\" onsubmit=\"return confirm('Supprimer ce plat ?')\" style=\"flex:1\">
                                <input type=\"hidden\" name=\"search\" value=\"{{ search|default('') }}\">
                                <input type=\"hidden\" name=\"statut\" value=\"{{ statut|default('') }}\">
                                <input type=\"hidden\" name=\"sort\" value=\"{{ sort|default('date_desc') }}\">
                                <button type=\"submit\" class=\"btn btn-supprimer w-100\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-utensils\"></i>
            <h4>Aucun plat trouvé</h4>
            <p class=\"text-muted\">Vous n'avez pas encore ajouté de plats ou aucun plat ne correspond à vos critères.</p>
            <a href=\"{{ path('app_partenaire_ajouter_plat') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter votre premier plat
            </a>
        </div>
    {% endif %}
</div>

<script>
function filterByStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}
</script>
{% endblock %}", "partenaire/mes_plats.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\mes_plats.html.twig");
    }
}

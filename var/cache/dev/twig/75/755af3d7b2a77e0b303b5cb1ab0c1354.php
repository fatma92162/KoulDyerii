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

/* admin_posts/index.html.twig */
class __TwigTemplate_bcbfc45ee62c337a4c2c4e1292a9926d extends Template
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
            'admin_title' => [$this, 'block_admin_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/index.html.twig"));

        $this->parent = $this->load("base_admin.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_title"));

        yield "Gestion des publications";
        
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
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --gold: #D4AF37;
        --beige-fonce: #E8D5B7;
    }

    .posts-container { 
        max-width: 100%; 
        margin: 0 auto; 
    }

    /* Cartes statistiques */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: var(--bordeaux);
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
    }

    .search-bar {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid var(--beige-fonce);
    }
    
    .search-bar .form-control,
    .search-bar .form-select {
        border-radius: 50px;
        border: 1px solid var(--beige-fonce);
        padding: 10px 18px;
    }
    
    .search-bar .form-control:focus,
    .search-bar .form-select:focus {
        border-color: var(--bordeaux);
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
    }
    
    .search-bar .btn {
        border-radius: 50px;
        padding: 10px 25px;
        white-space: nowrap;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        color: white;
    }
    
    .search-bar .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    }

    .post-card {
        background: white;
        border-radius: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: transform 0.3s ease;
        position: relative;
        border: 1px solid var(--beige-fonce);
    }

    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.12);
    }

    .post-card.pinned {
        border-left: 4px solid var(--gold);
        background: linear-gradient(135deg, white, #FFF8F0);
    }

    .pin-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--gold), #FFA500);
        color: #2c1810;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        z-index: 10;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .post-author {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .author-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .author-avatar span {
        color: white;
        font-weight: 700;
        font-size: 18px;
    }

    .author-info strong {
        display: block;
        color: #2c1810;
        font-size: 15px;
    }

    .author-info small {
        color: #999;
        font-size: 12px;
    }

    .post-title {
        font-size: 20px;
        font-weight: 700;
        color: #2c1810;
        margin-bottom: 10px;
    }

    .post-content {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .post-image {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .post-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid var(--beige-fonce);
        flex-wrap: wrap;
    }

    .btn-comment, 
    .btn-read-more {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 18px;
        font-size: 14px;
        font-weight: 600;
        color: #888;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
    }

    .btn-comment:hover, 
    .btn-read-more:hover { 
        border-color: var(--bordeaux); 
        color: var(--bordeaux); 
        background: rgba(139, 0, 0, 0.05); 
    }

    .btn-like {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 18px;
        font-size: 14px;
        font-weight: 600;
        color: #888;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-like:hover {
        border-color: var(--bordeaux);
        color: var(--bordeaux);
        background: rgba(139, 0, 0, 0.05);
    }

    .btn-like.reacted {
        border-color: var(--bordeaux);
        color: var(--bordeaux);
        background: rgba(139, 0, 0, 0.1);
    }

    .btn-edit {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #f0ad4e;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        border-color: #f0ad4e;
        color: #f0ad4e;
        background: #fff8f0;
    }

    .btn-delete {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #d9534f;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-delete:hover {
        border-color: #d9534f;
        color: #d9534f;
        background: #fff0f0;
    }

    .btn-pin-admin {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: var(--gold);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-pin-admin:hover {
        border-color: var(--gold);
        color: #8B6914;
        background: rgba(218, 165, 32, 0.1);
    }

    .btn-pin-admin.pinned {
        border-color: var(--gold);
        color: white;
        background: linear-gradient(135deg, var(--gold), #FFA500);
    }

    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left-color: #28a745;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border-left-color: var(--bordeaux);
    }
    
    .btn-new-post {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-new-post:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
        color: white;
    }
    
    .btn-stats {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-stats:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
        color: white;
    }

    /* Style pour le bouton d'export CSV */
    .btn-export {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-export:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        color: white;
    }
    
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .header-actions h4 {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .header-actions .btn-group-header {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    /* Styles pour la modale */
    .modal-content {
        border-radius: 20px;
        overflow: hidden;
    }
    .modal-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border-bottom: none;
    }
    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }
    .modal-body {
        padding: 25px;
    }
    
    /* Style pour le badge de signalement */
    .signalement-badge {
        background: #6c757d;
        color: white;
        border-radius: 20px;
        padding: 2px 10px;
        font-size: 12px;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-left: 10px;
    }
    .signalement-badge.danger {
        background: #dc3545;
    }
    .btn-reset-signal {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 14px;
        cursor: pointer;
        padding: 0 5px;
        transition: 0.2s;
    }
    .btn-reset-signal:hover {
        color: #a71d2a;
        transform: scale(1.1);
    }
    
    @media (max-width: 768px) {
        .search-bar form {
            flex-direction: column;
        }
        .search-bar .btn {
            width: 100%;
        }
        .post-actions {
            flex-direction: column;
        }
        .post-actions a, .post-actions button {
            width: 100%;
            justify-content: center;
        }
        .post-author {
            flex-direction: column;
            align-items: flex-start;
        }
        .ms-auto {
            margin-left: 0 !important;
            margin-top: 10px;
        }
        .header-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .header-actions .btn-group-header {
            justify-content: center;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 509
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 510
        yield "<div class=\"posts-container\">

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 515
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 515)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 515, $this->source); })()), "total", [], "any", false, false, false, 515), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">📊 Total publications</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 519
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "pinned", [], "any", true, true, false, 519)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 519, $this->source); })()), "pinned", [], "any", false, false, false, 519), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">📌 Épinglées</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 523
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "with_comments", [], "any", true, true, false, 523)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 523, $this->source); })()), "with_comments", [], "any", false, false, false, 523), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">💬 Avec commentaires</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 527
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "with_images", [], "any", true, true, false, 527)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 527, $this->source); })()), "with_images", [], "any", false, false, false, 527), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">🖼️ Avec images</div>
        </div>
    </div>

    <div class=\"search-bar\">
        <div class=\"header-actions\">
            <h4><i class=\"fas fa-newspaper\"></i> Toutes les publications</h4>
            <div class=\"btn-group-header\">
                <!-- Bouton export CSV unique -->
                <a href=\"";
        // line 537
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_export", ["search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 537, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 537, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn-export\">
                    <i class=\"fas fa-file-csv\"></i> Exporter CSV
                </a>

                <button type=\"button\" class=\"btn-stats\" data-bs-toggle=\"modal\" data-bs-target=\"#statsModal\">
                    <i class=\"fas fa-chart-line\"></i> Statistiques avancées
                </button>
                <a href=\"";
        // line 544
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_new");
        yield "\" class=\"btn-new-post\">
                    <i class=\"fas fa-plus\"></i> Nouvelle publication
                </a>
            </div>
        </div>
        <form method=\"get\" action=\"";
        // line 549
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"d-flex gap-2\">
            <div class=\"flex-grow-1\">
                <input type=\"text\" 
                       name=\"search\" 
                       class=\"form-control\" 
                       placeholder=\"🔍 Rechercher un post par titre, contenu ou auteur...\" 
                       value=\"";
        // line 555
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 555, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
            </div>
            <div>
                <select name=\"sort\" class=\"form-select\">
                    <option value=\"recent\" ";
        // line 559
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 559, $this->source); })()) == "recent")) ? ("selected") : (""));
        yield ">📅 Les plus récents</option>
                    <option value=\"oldest\" ";
        // line 560
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 560, $this->source); })()) == "oldest")) ? ("selected") : (""));
        yield ">📅 Les plus anciens</option>
                    <option value=\"popular\" ";
        // line 561
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 561, $this->source); })()) == "popular")) ? ("selected") : (""));
        yield ">🔥 Les plus populaires</option>
                    <option value=\"pinned\" ";
        // line 562
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 562, $this->source); })()) == "pinned")) ? ("selected") : (""));
        yield ">📌 Épinglés d'abord</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">
                <i class=\"fas fa-search\"></i> Chercher
            </button>
        </form>
    </div>

    ";
        // line 571
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 571, $this->source); })()), "flashes", ["success"], "method", false, false, false, 571));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 572
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 574
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 574, $this->source); })()), "flashes", ["error"], "method", false, false, false, 574));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 575
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 577
        yield "
    ";
        // line 578
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 578, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 579
            yield "        <div class=\"post-card ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 579)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "pinned";
            }
            yield "\" id=\"post-card-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 579), "html", null, true);
            yield "\">
            
            ";
            // line 581
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 581)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 582
                yield "                <div class=\"pin-badge\">
                    <i class=\"fas fa-thumbtack\"></i> Épinglé
                </div>
            ";
            }
            // line 586
            yield "            
            <div class=\"post-card-body\" style=\"padding: 20px 25px;\">

                <div class=\"post-author\">
                    <div class=\"author-avatar\">
                        ";
            // line 591
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 591) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 591), "photo", [], "any", false, false, false, 591))) {
                // line 592
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 592), "photo", [], "any", false, false, false, 592), "html", null, true);
                yield "\" alt=\"Photo de profil\">
                        ";
            } else {
                // line 594
                yield "                            <span>";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 594)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 594), "nom", [], "any", false, false, false, 594))), "html", null, true);
                } else {
                    yield "?";
                }
                yield "</span>
                        ";
            }
            // line 596
            yield "                    </div>
                    <div class=\"author-info\">
                        <strong>";
            // line 598
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 598)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 598), "nom", [], "any", false, false, false, 598), "html", null, true);
            } else {
                yield "Utilisateur inconnu";
            }
            yield "</strong>
                        <small><i class=\"far fa-clock\"></i> ";
            // line 599
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 599), "d/m/Y à H:i"), "html", null, true);
            yield "</small>
                    </div>
                    
                    <!-- Affichage du compteur de signalements -->
                    <div class=\"ms-2\">
                        <span class=\"signalement-badge ";
            // line 604
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "signalementCount", [], "any", false, false, false, 604) > 0)) {
                yield "danger";
            }
            yield "\">
                            <i class=\"fas fa-flag\"></i> ";
            // line 605
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "signalementCount", [], "any", true, true, false, 605)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "signalementCount", [], "any", false, false, false, 605), 0)) : (0)), "html", null, true);
            yield "
                        </span>
                        ";
            // line 607
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "signalementCount", [], "any", false, false, false, 607) > 0)) {
                // line 608
                yield "                            <button class=\"btn-reset-signal\" data-post-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 608), "html", null, true);
                yield "\" title=\"Réinitialiser les signalements\">
                                <i class=\"fas fa-undo-alt\"></i>
                            </button>
                        ";
            }
            // line 612
            yield "                    </div>
                    
                    <div class=\"ms-auto\">
                        <div class=\"btn-group\" role=\"group\">
                            <button class=\"btn-pin-admin ";
            // line 616
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 616)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "pinned";
            }
            yield "\" 
                                    data-post-id=\"";
            // line 617
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 617), "html", null, true);
            yield "\"
                                    id=\"pin-btn-";
            // line 618
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 618), "html", null, true);
            yield "\">
                                <i class=\"fas fa-thumbtack\"></i>
                                <span id=\"pin-text-";
            // line 620
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 620), "html", null, true);
            yield "\">";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 620)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désépingler") : ("Épingler"));
            yield "</span>
                            </button>
                            
                            ";
            // line 623
            if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 623, $this->source); })()), "user", [], "any", false, false, false, 623) && CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 623)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 623), "idUtilisateur", [], "any", false, false, false, 623) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 623, $this->source); })()), "user", [], "any", false, false, false, 623), "idUtilisateur", [], "any", false, false, false, 623)))) {
                // line 624
                yield "                                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 624)]), "html", null, true);
                yield "\" class=\"btn-edit\">
                                    <i class=\"fas fa-edit\"></i> Modifier
                                </a>
                                <form method=\"post\" action=\"";
                // line 627
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 627)]), "html", null, true);
                yield "\" 
                                      onsubmit=\"return confirm('Supprimer cette publication ?')\" style=\"display: inline;\">
                                    <button type=\"submit\" class=\"btn-delete\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            ";
            }
            // line 634
            yield "                        </div>
                    </div>
                </div>

                <div class=\"post-title\">";
            // line 638
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 638), "html", null, true);
            yield "</div>
                <!-- ✅ CORRECTION : suppression des balises HTML dans l'aperçu -->
                <div class=\"post-content\">
                    ";
            // line 641
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 641)), 0, 200), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 641))) > 200)) {
                yield "...";
            }
            // line 642
            yield "                </div>

                ";
            // line 644
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 644)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 645
                yield "                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 645), "html", null, true);
                yield "\" class=\"post-image\" alt=\"Image du post\" loading=\"lazy\">
                ";
            }
            // line 647
            yield "
                <div class=\"post-actions\">
                    <button class=\"btn-like ";
            // line 649
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["userLikes"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 649), [], "array", true, true, false, 649) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["userLikes"]) || array_key_exists("userLikes", $context) ? $context["userLikes"] : (function () { throw new RuntimeError('Variable "userLikes" does not exist.', 649, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 649), [], "array", false, false, false, 649))) {
                yield "reacted";
            }
            yield "\" 
                            data-post-id=\"";
            // line 650
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 650), "html", null, true);
            yield "\"
                            id=\"like-btn-";
            // line 651
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 651), "html", null, true);
            yield "\">
                        <i class=\"fas fa-heart\"></i>
                        <span id=\"like-count-";
            // line 653
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 653), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["likesCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 653), [], "array", true, true, false, 653)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["likesCount"]) || array_key_exists("likesCount", $context) ? $context["likesCount"] : (function () { throw new RuntimeError('Variable "likesCount" does not exist.', 653, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 653), [], "array", false, false, false, 653), 0)) : (0)), "html", null, true);
            yield "</span>
                    </button>

                    <a href=\"";
            // line 656
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 656)]), "html", null, true);
            yield "\" class=\"btn-comment\">
                        <i class=\"fas fa-comment\"></i> Commentaires (";
            // line 657
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentaires", [], "any", false, false, false, 657)), "html", null, true);
            yield ")
                    </a>
                    <a href=\"";
            // line 659
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 659)]), "html", null, true);
            yield "\" class=\"btn-read-more\">
                        Lire la suite <i class=\"fas fa-arrow-right\"></i>
                    </a>
                </div>

            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        // line 666
        if (!$context['_iterated']) {
            // line 667
            yield "        <div class=\"text-center py-5\">
            <i class=\"fas fa-newspaper fa-3x text-muted mb-3\"></i>
            <p class=\"text-muted\">Aucune publication trouvée.</p>
            <a href=\"";
            // line 670
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_new");
            yield "\" class=\"btn-new-post\">
                <i class=\"fas fa-plus\"></i> Créer la première publication
            </a>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 675
        yield "
</div>

<!-- Modal pour les statistiques -->
<div class=\"modal fade\" id=\"statsModal\" tabindex=\"-1\" aria-labelledby=\"statsModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"statsModalLabel\"><i class=\"fas fa-chart-line\"></i> Statistiques avancées</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
            </div>
            <div class=\"modal-body\">
                <div>
                    <h5 class=\"mb-3\">📊 Statistiques détaillées</h5>
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\"><canvas id=\"modalPostsChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalCommentsChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalLikesChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalTopUsersChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalPinnedChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalImageChart\" style=\"height: 200px;\"></canvas></div>
                    </div>
                    <div class=\"mt-3 text-muted small\">
                        <i class=\"fas fa-chart-line\"></i> Évolution sur 30 jours &nbsp;|&nbsp;
                        <i class=\"fas fa-trophy\"></i> Top 5 utilisateurs &nbsp;|&nbsp;
                        <i class=\"fas fa-thumbtack\"></i> Répartition des épinglés &nbsp;|&nbsp;
                        <i class=\"fas fa-image\"></i> Publications avec image
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// ========== GESTION DES ÉPINGLAGES ==========
document.querySelectorAll('.btn-pin-admin').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        fetch(`/admin/posts/\${postId}/pin`, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) location.reload();
            else alert(data.message || 'Une erreur est survenue');
        })
        .catch(err => { console.error('Erreur épinglage :', err); alert('Erreur de connexion'); });
    });
});

// ========== GESTION DES LIKES ==========
document.querySelectorAll('.btn-like').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        fetch(`/admin/posts/\${postId}/like`, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
            body: JSON.stringify({ type: 'like' })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const countEl = document.getElementById(`like-count-\${postId}`);
                const btnEl = document.getElementById(`like-btn-\${postId}`);
                if (countEl) countEl.textContent = data.count;
                if (btnEl) data.liked ? btnEl.classList.add('reacted') : btnEl.classList.remove('reacted');
            }
        })
        .catch(err => console.error('Erreur like:', err));
    });
});

// ========== RÉINITIALISATION DES SIGNALEMENTS ==========
document.querySelectorAll('.btn-reset-signal').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        if (confirm('Réinitialiser le compteur de signalements pour cette publication ?')) {
            fetch(`/admin/posts/\${postId}/reset-signals`, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) location.reload();
                else alert(data.message || 'Erreur lors de la réinitialisation');
            })
            .catch(err => { console.error('Erreur réinitialisation :', err); alert('Erreur de connexion'); });
        }
    });
});

// ========== INITIALISATION DES GRAPHIQUES ==========
document.addEventListener('DOMContentLoaded', function() {
    const postsDates = ";
        // line 774
        yield (isset($context["postsDates"]) || array_key_exists("postsDates", $context) ? $context["postsDates"] : (function () { throw new RuntimeError('Variable "postsDates" does not exist.', 774, $this->source); })());
        yield ";
    const postsCounts = ";
        // line 775
        yield (isset($context["postsCounts"]) || array_key_exists("postsCounts", $context) ? $context["postsCounts"] : (function () { throw new RuntimeError('Variable "postsCounts" does not exist.', 775, $this->source); })());
        yield ";
    const commentsDates = ";
        // line 776
        yield (isset($context["commentsDates"]) || array_key_exists("commentsDates", $context) ? $context["commentsDates"] : (function () { throw new RuntimeError('Variable "commentsDates" does not exist.', 776, $this->source); })());
        yield ";
    const commentsCounts = ";
        // line 777
        yield (isset($context["commentsCounts"]) || array_key_exists("commentsCounts", $context) ? $context["commentsCounts"] : (function () { throw new RuntimeError('Variable "commentsCounts" does not exist.', 777, $this->source); })());
        yield ";
    const likesDates = ";
        // line 778
        yield (isset($context["likesDates"]) || array_key_exists("likesDates", $context) ? $context["likesDates"] : (function () { throw new RuntimeError('Variable "likesDates" does not exist.', 778, $this->source); })());
        yield ";
    const likesCounts = ";
        // line 779
        yield (isset($context["likesCounts"]) || array_key_exists("likesCounts", $context) ? $context["likesCounts"] : (function () { throw new RuntimeError('Variable "likesCounts" does not exist.', 779, $this->source); })());
        yield ";
    const topUsersNames = ";
        // line 780
        yield (isset($context["topUsersNames"]) || array_key_exists("topUsersNames", $context) ? $context["topUsersNames"] : (function () { throw new RuntimeError('Variable "topUsersNames" does not exist.', 780, $this->source); })());
        yield ";
    const topUsersActivity = ";
        // line 781
        yield (isset($context["topUsersActivity"]) || array_key_exists("topUsersActivity", $context) ? $context["topUsersActivity"] : (function () { throw new RuntimeError('Variable "topUsersActivity" does not exist.', 781, $this->source); })());
        yield ";
    const pinnedPosts = ";
        // line 782
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pinnedPosts"]) || array_key_exists("pinnedPosts", $context) ? $context["pinnedPosts"] : (function () { throw new RuntimeError('Variable "pinnedPosts" does not exist.', 782, $this->source); })()), "html", null, true);
        yield ";
    const unpinnedPosts = ";
        // line 783
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unpinnedPosts"]) || array_key_exists("unpinnedPosts", $context) ? $context["unpinnedPosts"] : (function () { throw new RuntimeError('Variable "unpinnedPosts" does not exist.', 783, $this->source); })()), "html", null, true);
        yield ";
    const withImage = ";
        // line 784
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withImage"]) || array_key_exists("withImage", $context) ? $context["withImage"] : (function () { throw new RuntimeError('Variable "withImage" does not exist.', 784, $this->source); })()), "html", null, true);
        yield ";
    const withoutImage = ";
        // line 785
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withoutImage"]) || array_key_exists("withoutImage", $context) ? $context["withoutImage"] : (function () { throw new RuntimeError('Variable "withoutImage" does not exist.', 785, $this->source); })()), "html", null, true);
        yield ";

    new Chart(document.getElementById('modalPostsChart'), {
        type: 'line', data: { labels: postsDates, datasets: [{ label: 'Publications', data: postsCounts, borderColor: '#FF6B6B', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalCommentsChart'), {
        type: 'line', data: { labels: commentsDates, datasets: [{ label: 'Commentaires', data: commentsCounts, borderColor: '#4CAF50', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalLikesChart'), {
        type: 'line', data: { labels: likesDates, datasets: [{ label: 'Likes', data: likesCounts, borderColor: '#FFC107', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalTopUsersChart'), {
        type: 'bar', data: { labels: topUsersNames, datasets: [{ label: 'Actions (posts + commentaires)', data: topUsersActivity, backgroundColor: '#8B0000' }] },
        options: { responsive: true, maintainAspectRatio: true, scales: { y: { beginAtZero: true } } }
    });
    new Chart(document.getElementById('modalPinnedChart'), {
        type: 'doughnut', data: { labels: ['Épinglés', 'Non épinglés'], datasets: [{ data: [pinnedPosts, unpinnedPosts], backgroundColor: ['#5bc0de', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalImageChart'), {
        type: 'doughnut', data: { labels: ['Avec image', 'Sans image'], datasets: [{ data: [withImage, withoutImage], backgroundColor: ['#FF8E53', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
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
        return "admin_posts/index.html.twig";
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
        return array (  1112 => 785,  1108 => 784,  1104 => 783,  1100 => 782,  1096 => 781,  1092 => 780,  1088 => 779,  1084 => 778,  1080 => 777,  1076 => 776,  1072 => 775,  1068 => 774,  967 => 675,  956 => 670,  951 => 667,  949 => 666,  937 => 659,  932 => 657,  928 => 656,  920 => 653,  915 => 651,  911 => 650,  905 => 649,  901 => 647,  895 => 645,  893 => 644,  889 => 642,  884 => 641,  878 => 638,  872 => 634,  862 => 627,  855 => 624,  853 => 623,  845 => 620,  840 => 618,  836 => 617,  830 => 616,  824 => 612,  816 => 608,  814 => 607,  809 => 605,  803 => 604,  795 => 599,  787 => 598,  783 => 596,  773 => 594,  767 => 592,  765 => 591,  758 => 586,  752 => 582,  750 => 581,  740 => 579,  735 => 578,  732 => 577,  723 => 575,  718 => 574,  709 => 572,  705 => 571,  693 => 562,  689 => 561,  685 => 560,  681 => 559,  674 => 555,  665 => 549,  657 => 544,  647 => 537,  634 => 527,  627 => 523,  620 => 519,  613 => 515,  606 => 510,  596 => 509,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des publications{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --gold: #D4AF37;
        --beige-fonce: #E8D5B7;
    }

    .posts-container { 
        max-width: 100%; 
        margin: 0 auto; 
    }

    /* Cartes statistiques */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: var(--bordeaux);
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
    }

    .search-bar {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid var(--beige-fonce);
    }
    
    .search-bar .form-control,
    .search-bar .form-select {
        border-radius: 50px;
        border: 1px solid var(--beige-fonce);
        padding: 10px 18px;
    }
    
    .search-bar .form-control:focus,
    .search-bar .form-select:focus {
        border-color: var(--bordeaux);
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
    }
    
    .search-bar .btn {
        border-radius: 50px;
        padding: 10px 25px;
        white-space: nowrap;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        color: white;
    }
    
    .search-bar .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    }

    .post-card {
        background: white;
        border-radius: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: transform 0.3s ease;
        position: relative;
        border: 1px solid var(--beige-fonce);
    }

    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.12);
    }

    .post-card.pinned {
        border-left: 4px solid var(--gold);
        background: linear-gradient(135deg, white, #FFF8F0);
    }

    .pin-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--gold), #FFA500);
        color: #2c1810;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        z-index: 10;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .post-author {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .author-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .author-avatar span {
        color: white;
        font-weight: 700;
        font-size: 18px;
    }

    .author-info strong {
        display: block;
        color: #2c1810;
        font-size: 15px;
    }

    .author-info small {
        color: #999;
        font-size: 12px;
    }

    .post-title {
        font-size: 20px;
        font-weight: 700;
        color: #2c1810;
        margin-bottom: 10px;
    }

    .post-content {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .post-image {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .post-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid var(--beige-fonce);
        flex-wrap: wrap;
    }

    .btn-comment, 
    .btn-read-more {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 18px;
        font-size: 14px;
        font-weight: 600;
        color: #888;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
    }

    .btn-comment:hover, 
    .btn-read-more:hover { 
        border-color: var(--bordeaux); 
        color: var(--bordeaux); 
        background: rgba(139, 0, 0, 0.05); 
    }

    .btn-like {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 18px;
        font-size: 14px;
        font-weight: 600;
        color: #888;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-like:hover {
        border-color: var(--bordeaux);
        color: var(--bordeaux);
        background: rgba(139, 0, 0, 0.05);
    }

    .btn-like.reacted {
        border-color: var(--bordeaux);
        color: var(--bordeaux);
        background: rgba(139, 0, 0, 0.1);
    }

    .btn-edit {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #f0ad4e;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        border-color: #f0ad4e;
        color: #f0ad4e;
        background: #fff8f0;
    }

    .btn-delete {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #d9534f;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-delete:hover {
        border-color: #d9534f;
        color: #d9534f;
        background: #fff0f0;
    }

    .btn-pin-admin {
        background: none;
        border: 2px solid var(--beige-fonce);
        border-radius: 50px;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: var(--gold);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-pin-admin:hover {
        border-color: var(--gold);
        color: #8B6914;
        background: rgba(218, 165, 32, 0.1);
    }

    .btn-pin-admin.pinned {
        border-color: var(--gold);
        color: white;
        background: linear-gradient(135deg, var(--gold), #FFA500);
    }

    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left-color: #28a745;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border-left-color: var(--bordeaux);
    }
    
    .btn-new-post {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-new-post:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
        color: white;
    }
    
    .btn-stats {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-stats:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
        color: white;
    }

    /* Style pour le bouton d'export CSV */
    .btn-export {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-export:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        color: white;
    }
    
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .header-actions h4 {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .header-actions .btn-group-header {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    /* Styles pour la modale */
    .modal-content {
        border-radius: 20px;
        overflow: hidden;
    }
    .modal-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        border-bottom: none;
    }
    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }
    .modal-body {
        padding: 25px;
    }
    
    /* Style pour le badge de signalement */
    .signalement-badge {
        background: #6c757d;
        color: white;
        border-radius: 20px;
        padding: 2px 10px;
        font-size: 12px;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-left: 10px;
    }
    .signalement-badge.danger {
        background: #dc3545;
    }
    .btn-reset-signal {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 14px;
        cursor: pointer;
        padding: 0 5px;
        transition: 0.2s;
    }
    .btn-reset-signal:hover {
        color: #a71d2a;
        transform: scale(1.1);
    }
    
    @media (max-width: 768px) {
        .search-bar form {
            flex-direction: column;
        }
        .search-bar .btn {
            width: 100%;
        }
        .post-actions {
            flex-direction: column;
        }
        .post-actions a, .post-actions button {
            width: 100%;
            justify-content: center;
        }
        .post-author {
            flex-direction: column;
            align-items: flex-start;
        }
        .ms-auto {
            margin-left: 0 !important;
            margin-top: 10px;
        }
        .header-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .header-actions .btn-group-header {
            justify-content: center;
        }
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"posts-container\">

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ stats.total|default(0) }}</div>
            <div class=\"stat-label\">📊 Total publications</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ stats.pinned|default(0) }}</div>
            <div class=\"stat-label\">📌 Épinglées</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ stats.with_comments|default(0) }}</div>
            <div class=\"stat-label\">💬 Avec commentaires</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ stats.with_images|default(0) }}</div>
            <div class=\"stat-label\">🖼️ Avec images</div>
        </div>
    </div>

    <div class=\"search-bar\">
        <div class=\"header-actions\">
            <h4><i class=\"fas fa-newspaper\"></i> Toutes les publications</h4>
            <div class=\"btn-group-header\">
                <!-- Bouton export CSV unique -->
                <a href=\"{{ path('app_admin_posts_export', {search: search, sort: sort}) }}\" class=\"btn-export\">
                    <i class=\"fas fa-file-csv\"></i> Exporter CSV
                </a>

                <button type=\"button\" class=\"btn-stats\" data-bs-toggle=\"modal\" data-bs-target=\"#statsModal\">
                    <i class=\"fas fa-chart-line\"></i> Statistiques avancées
                </button>
                <a href=\"{{ path('app_admin_post_new') }}\" class=\"btn-new-post\">
                    <i class=\"fas fa-plus\"></i> Nouvelle publication
                </a>
            </div>
        </div>
        <form method=\"get\" action=\"{{ path('app_admin_posts_index') }}\" class=\"d-flex gap-2\">
            <div class=\"flex-grow-1\">
                <input type=\"text\" 
                       name=\"search\" 
                       class=\"form-control\" 
                       placeholder=\"🔍 Rechercher un post par titre, contenu ou auteur...\" 
                       value=\"{{ search|default('') }}\">
            </div>
            <div>
                <select name=\"sort\" class=\"form-select\">
                    <option value=\"recent\" {{ sort == 'recent' ? 'selected' : '' }}>📅 Les plus récents</option>
                    <option value=\"oldest\" {{ sort == 'oldest' ? 'selected' : '' }}>📅 Les plus anciens</option>
                    <option value=\"popular\" {{ sort == 'popular' ? 'selected' : '' }}>🔥 Les plus populaires</option>
                    <option value=\"pinned\" {{ sort == 'pinned' ? 'selected' : '' }}>📌 Épinglés d'abord</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">
                <i class=\"fas fa-search\"></i> Chercher
            </button>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    {% for post in posts %}
        <div class=\"post-card {% if post.isPinned %}pinned{% endif %}\" id=\"post-card-{{ post.id }}\">
            
            {% if post.isPinned %}
                <div class=\"pin-badge\">
                    <i class=\"fas fa-thumbtack\"></i> Épinglé
                </div>
            {% endif %}
            
            <div class=\"post-card-body\" style=\"padding: 20px 25px;\">

                <div class=\"post-author\">
                    <div class=\"author-avatar\">
                        {% if post.utilisateur and post.utilisateur.photo %}
                            <img src=\"{{ post.utilisateur.photo }}\" alt=\"Photo de profil\">
                        {% else %}
                            <span>{% if post.utilisateur %}{{ post.utilisateur.nom|first|upper }}{% else %}?{% endif %}</span>
                        {% endif %}
                    </div>
                    <div class=\"author-info\">
                        <strong>{% if post.utilisateur %}{{ post.utilisateur.nom }}{% else %}Utilisateur inconnu{% endif %}</strong>
                        <small><i class=\"far fa-clock\"></i> {{ post.createdAt|date('d/m/Y à H:i') }}</small>
                    </div>
                    
                    <!-- Affichage du compteur de signalements -->
                    <div class=\"ms-2\">
                        <span class=\"signalement-badge {% if post.signalementCount > 0 %}danger{% endif %}\">
                            <i class=\"fas fa-flag\"></i> {{ post.signalementCount|default(0) }}
                        </span>
                        {% if post.signalementCount > 0 %}
                            <button class=\"btn-reset-signal\" data-post-id=\"{{ post.id }}\" title=\"Réinitialiser les signalements\">
                                <i class=\"fas fa-undo-alt\"></i>
                            </button>
                        {% endif %}
                    </div>
                    
                    <div class=\"ms-auto\">
                        <div class=\"btn-group\" role=\"group\">
                            <button class=\"btn-pin-admin {% if post.isPinned %}pinned{% endif %}\" 
                                    data-post-id=\"{{ post.id }}\"
                                    id=\"pin-btn-{{ post.id }}\">
                                <i class=\"fas fa-thumbtack\"></i>
                                <span id=\"pin-text-{{ post.id }}\">{{ post.isPinned ? 'Désépingler' : 'Épingler' }}</span>
                            </button>
                            
                            {% if app.user and post.utilisateur and post.utilisateur.idUtilisateur == app.user.idUtilisateur %}
                                <a href=\"{{ path('app_admin_post_edit', {id: post.id}) }}\" class=\"btn-edit\">
                                    <i class=\"fas fa-edit\"></i> Modifier
                                </a>
                                <form method=\"post\" action=\"{{ path('app_admin_post_delete', {id: post.id}) }}\" 
                                      onsubmit=\"return confirm('Supprimer cette publication ?')\" style=\"display: inline;\">
                                    <button type=\"submit\" class=\"btn-delete\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            {% endif %}
                        </div>
                    </div>
                </div>

                <div class=\"post-title\">{{ post.title }}</div>
                <!-- ✅ CORRECTION : suppression des balises HTML dans l'aperçu -->
                <div class=\"post-content\">
                    {{ post.content|striptags|slice(0, 200) }}{% if post.content|striptags|length > 200 %}...{% endif %}
                </div>

                {% if post.imagePath %}
                    <img src=\"{{ post.imagePath }}\" class=\"post-image\" alt=\"Image du post\" loading=\"lazy\">
                {% endif %}

                <div class=\"post-actions\">
                    <button class=\"btn-like {% if userLikes[post.id] is defined and userLikes[post.id] %}reacted{% endif %}\" 
                            data-post-id=\"{{ post.id }}\"
                            id=\"like-btn-{{ post.id }}\">
                        <i class=\"fas fa-heart\"></i>
                        <span id=\"like-count-{{ post.id }}\">{{ likesCount[post.id]|default(0) }}</span>
                    </button>

                    <a href=\"{{ path('app_admin_post_show', {id: post.id}) }}\" class=\"btn-comment\">
                        <i class=\"fas fa-comment\"></i> Commentaires ({{ post.commentaires|length }})
                    </a>
                    <a href=\"{{ path('app_admin_post_show', {id: post.id}) }}\" class=\"btn-read-more\">
                        Lire la suite <i class=\"fas fa-arrow-right\"></i>
                    </a>
                </div>

            </div>
        </div>
    {% else %}
        <div class=\"text-center py-5\">
            <i class=\"fas fa-newspaper fa-3x text-muted mb-3\"></i>
            <p class=\"text-muted\">Aucune publication trouvée.</p>
            <a href=\"{{ path('app_admin_post_new') }}\" class=\"btn-new-post\">
                <i class=\"fas fa-plus\"></i> Créer la première publication
            </a>
        </div>
    {% endfor %}

</div>

<!-- Modal pour les statistiques -->
<div class=\"modal fade\" id=\"statsModal\" tabindex=\"-1\" aria-labelledby=\"statsModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"statsModalLabel\"><i class=\"fas fa-chart-line\"></i> Statistiques avancées</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
            </div>
            <div class=\"modal-body\">
                <div>
                    <h5 class=\"mb-3\">📊 Statistiques détaillées</h5>
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\"><canvas id=\"modalPostsChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalCommentsChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalLikesChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalTopUsersChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalPinnedChart\" style=\"height: 200px;\"></canvas></div>
                        <div class=\"col-md-6\"><canvas id=\"modalImageChart\" style=\"height: 200px;\"></canvas></div>
                    </div>
                    <div class=\"mt-3 text-muted small\">
                        <i class=\"fas fa-chart-line\"></i> Évolution sur 30 jours &nbsp;|&nbsp;
                        <i class=\"fas fa-trophy\"></i> Top 5 utilisateurs &nbsp;|&nbsp;
                        <i class=\"fas fa-thumbtack\"></i> Répartition des épinglés &nbsp;|&nbsp;
                        <i class=\"fas fa-image\"></i> Publications avec image
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// ========== GESTION DES ÉPINGLAGES ==========
document.querySelectorAll('.btn-pin-admin').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        fetch(`/admin/posts/\${postId}/pin`, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) location.reload();
            else alert(data.message || 'Une erreur est survenue');
        })
        .catch(err => { console.error('Erreur épinglage :', err); alert('Erreur de connexion'); });
    });
});

// ========== GESTION DES LIKES ==========
document.querySelectorAll('.btn-like').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        fetch(`/admin/posts/\${postId}/like`, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
            body: JSON.stringify({ type: 'like' })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const countEl = document.getElementById(`like-count-\${postId}`);
                const btnEl = document.getElementById(`like-btn-\${postId}`);
                if (countEl) countEl.textContent = data.count;
                if (btnEl) data.liked ? btnEl.classList.add('reacted') : btnEl.classList.remove('reacted');
            }
        })
        .catch(err => console.error('Erreur like:', err));
    });
});

// ========== RÉINITIALISATION DES SIGNALEMENTS ==========
document.querySelectorAll('.btn-reset-signal').forEach(btn => {
    btn.addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        if (confirm('Réinitialiser le compteur de signalements pour cette publication ?')) {
            fetch(`/admin/posts/\${postId}/reset-signals`, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) location.reload();
                else alert(data.message || 'Erreur lors de la réinitialisation');
            })
            .catch(err => { console.error('Erreur réinitialisation :', err); alert('Erreur de connexion'); });
        }
    });
});

// ========== INITIALISATION DES GRAPHIQUES ==========
document.addEventListener('DOMContentLoaded', function() {
    const postsDates = {{ postsDates|raw }};
    const postsCounts = {{ postsCounts|raw }};
    const commentsDates = {{ commentsDates|raw }};
    const commentsCounts = {{ commentsCounts|raw }};
    const likesDates = {{ likesDates|raw }};
    const likesCounts = {{ likesCounts|raw }};
    const topUsersNames = {{ topUsersNames|raw }};
    const topUsersActivity = {{ topUsersActivity|raw }};
    const pinnedPosts = {{ pinnedPosts }};
    const unpinnedPosts = {{ unpinnedPosts }};
    const withImage = {{ withImage }};
    const withoutImage = {{ withoutImage }};

    new Chart(document.getElementById('modalPostsChart'), {
        type: 'line', data: { labels: postsDates, datasets: [{ label: 'Publications', data: postsCounts, borderColor: '#FF6B6B', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalCommentsChart'), {
        type: 'line', data: { labels: commentsDates, datasets: [{ label: 'Commentaires', data: commentsCounts, borderColor: '#4CAF50', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalLikesChart'), {
        type: 'line', data: { labels: likesDates, datasets: [{ label: 'Likes', data: likesCounts, borderColor: '#FFC107', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalTopUsersChart'), {
        type: 'bar', data: { labels: topUsersNames, datasets: [{ label: 'Actions (posts + commentaires)', data: topUsersActivity, backgroundColor: '#8B0000' }] },
        options: { responsive: true, maintainAspectRatio: true, scales: { y: { beginAtZero: true } } }
    });
    new Chart(document.getElementById('modalPinnedChart'), {
        type: 'doughnut', data: { labels: ['Épinglés', 'Non épinglés'], datasets: [{ data: [pinnedPosts, unpinnedPosts], backgroundColor: ['#5bc0de', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalImageChart'), {
        type: 'doughnut', data: { labels: ['Avec image', 'Sans image'], datasets: [{ data: [withImage, withoutImage], backgroundColor: ['#FF8E53', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
});
</script>
{% endblock %}", "admin_posts/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\index.html.twig");
    }
}

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

/* admin_produits/index.html.twig */
class __TwigTemplate_cec168e4afe6e7efced42d584a2b4f7e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_produits/index.html.twig"));

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

        yield "Gestion des produits";
        
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
    .products-shell {
        color: #2c1a1d;
    }

    .products-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .products-topbar h3 {
        margin: 0;
        font-weight: 800;
        color: #000;
    }

    .btn-add-product {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.18);
    }

    .btn-add-product:hover {
        color: #fff;
        transform: translateY(-1px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-box {
        border-radius: 22px;
        padding: 22px;
        color: #fff;
        position: relative;
        overflow: hidden;
        min-height: 140px;
    }

    .stat-box::after {
        content: \"\";
        position: absolute;
        width: 180px;
        height: 180px;
        right: -60px;
        top: -40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }

    .stat-bordeaux {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-green {
        background: linear-gradient(135deg, #5e8a24 0%, #7aa53a 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-red {
        background: linear-gradient(135deg, #b42318 0%, #d84c4c 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-dark {
        background: linear-gradient(135deg, #5C4033 0%, #7a5a4a 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-title {
        font-size: 15px;
        color: rgba(255,255,255,0.92);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .stat-value {
        font-size: 40px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 10px;
    }

    .stat-subvalue {
        font-size: 14px;
        font-weight: 700;
        opacity: 0.95;
    }

    .filters-card {
        background: #fff7f2;
        border: 1px solid #ead9d2;
        border-radius: 20px;
        padding: 18px;
        margin-bottom: 20px;
    }

    .filters-card .form-control,
    .filters-card .form-select {
        background: #fff;
        border: 1px solid #e3cfc7;
        color: #2c1a1d;
        border-radius: 14px;
        height: 48px;
    }

    .filters-card .form-control::placeholder {
        color: #9a7f75;
    }

    .btn-reset-products {
        background: #6d7683;
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 16px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        width: 100%;
    }

    .btn-reset-products:hover {
        color: #fff;
        opacity: 0.95;
    }

    .products-table-card {
        background: #110015;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
    }

    .products-table {
    margin: 0;
    color: #000 !important; /* BLACK TEXT */
}

    .products-table thead th {
        background: #7b1e2b;
        color: #fff;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        padding: 16px 14px;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .products-table td {
        padding: 15px 14px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .products-table tbody tr:hover {
        background: rgba(255,255,255,0.02);
    }

    .image-thumb {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.1);
        background: #1f1230;
    }

    .image-fallback {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #1f1230;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #d8c4ff;
        font-size: 18px;
    }

    .product-name {
        font-weight: 800;
        color: #fff;
    }

    .product-desc {
        color: #b8a6c9;
        font-size: 13px;
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .price-text {
        font-weight: 800;
        color: #000;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
    }

    .status-on {
        background: #dcfce7;
        color: #166534;
    }

    .status-off {
        background: #fee2e2;
        color: #991b1b;
    }

    .actions-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: flex-end;
    }

    .action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.10);
        background: #1a0626;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .action-btn:hover {
        background: #8B0000;
        color: #fff;
    }

    .flash-box {
        border-radius: 14px;
        margin-bottom: 16px;
    }

    .empty-box {
        text-align: center;
        padding: 50px 20px;
        color: #c4b5d9;
    }

    .product-panel-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 9998;
        opacity: 0;
        visibility: hidden;
        transition: 0.25s ease;
    }

    .product-panel-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    .product-panel {
        position: fixed;
        top: 0;
        right: -760px;
        width: 760px;
        max-width: 100%;
        height: 100vh;
        background: #fff7f2;
        box-shadow: -10px 0 40px rgba(0,0,0,0.25);
        z-index: 9999;
        transition: 0.32s ease;
        overflow-y: auto;
        border-left: 1px solid #ead9d2;
    }

    .product-panel.open {
        right: 0;
    }

    .product-panel-header {
        padding: 22px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid #ead9d2;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    .product-panel-title {
        font-size: 28px;
        font-weight: 900;
        margin: 0;
    }

    .product-panel-close {
        background: #fff;
        color: #8B0000;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: none;
        font-size: 18px;
        font-weight: 900;
        cursor: pointer;
    }

    .product-panel-body {
        padding: 24px;
    }

    .product-section {
        background: #fff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .product-section-head {
        padding: 16px 20px;
        border-bottom: 1px solid #f0dfd8;
        font-size: 22px;
        font-weight: 800;
        color: #5C4033;
    }

    .product-section-content {
        padding: 20px;
    }

    .product-panel label {
        display: block;
        font-weight: 800;
        color: #5C4033;
        margin-bottom: 8px;
    }

   .product-panel .form-control,
.product-panel textarea {
    border-radius: 14px;
    border: 1px solid #e3cfc7;
    background: #fff;
    color: #000 !important; /* ✅ BLACK TEXT */
}

    .product-panel .form-control {
        min-height: 48px;
    }

    .product-panel textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .product-panel .form-control::placeholder,
.product-panel textarea::placeholder {
    color: #888; /* softer gray */
}

    .product-panel .form-check-label {
        color: #5C4033;
        font-weight: 700;
    }

    .upload-box {
        border: 2px dashed #d6bfb5;
        border-radius: 18px;
        background: #fff7f2;
        min-height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 18px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .upload-box:hover {
        background: #fff2eb;
    }

    .upload-placeholder {
        color: #8a6a60;
    }

    .upload-placeholder i {
        font-size: 42px;
        color: #8B0000;
        margin-bottom: 10px;
    }

    .upload-preview {
        max-width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #ead9d2;
        display: none;
    }

    .upload-note {
        margin-top: 10px;
        color: #8a6a60;
        font-size: 13px;
    }

    .save-panel-btn {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        border: none;
        width: 100%;
        min-height: 52px;
        border-radius: 14px;
        font-size: 18px;
        font-weight: 900;
        box-shadow: 0 10px 20px rgba(139, 0, 0, 0.15);
    }

    .save-panel-btn:hover {
        opacity: 0.96;
    }

    .panel-alert {
        display: none;
        margin-bottom: 16px;
        border-radius: 14px;
    }

    .form-small-note {
        font-size: 13px;
        color: #8a6a60;
        margin-top: 6px;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .product-panel {
            width: 100%;
        }
    }
    .product-panel input,
.product-panel textarea {
    color: #000 !important;
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 496
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 497
        yield "<div class=\"products-shell\">
    <div class=\"products-topbar\">
        <h3>📦 Gestion des produits</h3>
        <button type=\"button\" class=\"btn-add-product\" onclick=\"openProductPanel()\">
            <i class=\"fas fa-plus\"></i> Ajouter un produit
        </button>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-box stat-bordeaux\">
            <div class=\"stat-title\">Quantité totale</div>
            <div class=\"stat-value\">";
        // line 508
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 508, $this->source); })()), "total_quantity", [], "any", false, false, false, 508), "html", null, true);
        yield "</div>
            <div class=\"stat-subvalue\">";
        // line 509
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 509, $this->source); })()), "total", [], "any", false, false, false, 509), "html", null, true);
        yield " produit(s)</div>
        </div>

        <div class=\"stat-box stat-green\">
            <div class=\"stat-title\">Quantité disponible</div>
            <div class=\"stat-value\">";
        // line 514
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 514, $this->source); })()), "available_quantity", [], "any", false, false, false, 514), "html", null, true);
        yield "</div>
            <div class=\"stat-subvalue\">";
        // line 515
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 515, $this->source); })()), "disponibles", [], "any", false, false, false, 515), "html", null, true);
        yield " produit(s) actifs</div>
        </div>

        <div class=\"stat-box stat-red\">
            <div class=\"stat-title\">Produits indisponibles</div>
            <div class=\"stat-value\">";
        // line 520
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 520, $this->source); })()), "indisponibles", [], "any", false, false, false, 520), "html", null, true);
        yield "</div>
            <div class=\"stat-subvalue\">Produits désactivés</div>
        </div>

        <div class=\"stat-box stat-dark\">
            <div class=\"stat-title\">Valeur catalogue estimée</div>
            <div class=\"stat-value\" style=\"font-size: 30px;\">
                ";
        // line 527
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 527, $this->source); })()), "catalog_value", [], "any", false, false, false, 527), 2, ",", " "), "html", null, true);
        yield " TND
            </div>
            <div class=\"stat-subvalue\">
                Disponibles: ";
        // line 530
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 530, $this->source); })()), "available_value", [], "any", false, false, false, 530), 2, ",", " "), "html", null, true);
        yield " TND
            </div>
        </div>
    </div>

    <div class=\"filters-card\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-lg-4\">
                    <input
                        type=\"text\"
                        name=\"search\"
                        class=\"form-control\"
                        placeholder=\"Search...\"
                        value=\"";
        // line 544
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 544, $this->source); })()), "html", null, true);
        yield "\"
                    >
                </div>

                <div class=\"col-lg-3\">
                    <select name=\"disponible\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">Tous les produits</option>
                        <option value=\"disponible\" ";
        // line 551
        if (((isset($context["disponible"]) || array_key_exists("disponible", $context) ? $context["disponible"] : (function () { throw new RuntimeError('Variable "disponible" does not exist.', 551, $this->source); })()) == "disponible")) {
            yield "selected";
        }
        yield ">Disponibles</option>
                        <option value=\"indisponible\" ";
        // line 552
        if (((isset($context["disponible"]) || array_key_exists("disponible", $context) ? $context["disponible"] : (function () { throw new RuntimeError('Variable "disponible" does not exist.', 552, $this->source); })()) == "indisponible")) {
            yield "selected";
        }
        yield ">Indisponibles</option>
                    </select>
                </div>

                <div class=\"col-lg-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" ";
        // line 558
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 558, $this->source); })()) == "id_desc")) {
            yield "selected";
        }
        yield ">Plus récents</option>
                        <option value=\"id_asc\" ";
        // line 559
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 559, $this->source); })()) == "id_asc")) {
            yield "selected";
        }
        yield ">Plus anciens</option>
                        <option value=\"nom_asc\" ";
        // line 560
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 560, $this->source); })()) == "nom_asc")) {
            yield "selected";
        }
        yield ">Nom A→Z</option>
                        <option value=\"nom_desc\" ";
        // line 561
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 561, $this->source); })()) == "nom_desc")) {
            yield "selected";
        }
        yield ">Nom Z→A</option>
                        <option value=\"prix_asc\" ";
        // line 562
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 562, $this->source); })()) == "prix_asc")) {
            yield "selected";
        }
        yield ">Prix croissant</option>
                        <option value=\"prix_desc\" ";
        // line 563
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 563, $this->source); })()) == "prix_desc")) {
            yield "selected";
        }
        yield ">Prix décroissant</option>
                    </select>
                </div>

                <div class=\"col-lg-2\">
                    <a href=\"";
        // line 568
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_index");
        yield "\" class=\"btn-reset-products\">
                        <i class=\"fas fa-undo\"></i>&nbsp; Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 576
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 576, $this->source); })()), "flashes", ["success"], "method", false, false, false, 576));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 577
            yield "        <div class=\"alert alert-success flash-box\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 579
        yield "
    ";
        // line 580
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 580, $this->source); })()), "flashes", ["error"], "method", false, false, false, 580));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 581
            yield "        <div class=\"alert alert-danger flash-box\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 583
        yield "
    <div class=\"products-table-card\">
        <div class=\"table-responsive\">
            <table class=\"table products-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Statut</th>
                        <th style=\"text-align:right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 599
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 599, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 600
            yield "                        <tr>
                            <td><strong>";
            // line 601
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 601), "html", null, true);
            yield "</strong></td>

                            <td>
                                ";
            // line 604
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 604)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 605
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 605), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 605), "html", null, true);
                yield "\" class=\"image-thumb\">
                                ";
            } else {
                // line 607
                yield "                                    <span class=\"image-fallback\">
                                        <i class=\"fas fa-box\"></i>
                                    </span>
                                ";
            }
            // line 611
            yield "                            </td>

                            <td>
                                <div class=\"product-name\">";
            // line 614
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 614), "html", null, true);
            yield "</div>
                                <div class=\"product-desc\">
                                    ";
            // line 616
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 616)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 616), 0, 70) . (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 616)) > 70)) ? ("...") : (""))), "html", null, true)) : ("Sans description"));
            yield "
                                </div>
                            </td>

                            <td>
                                <span class=\"price-text\">";
            // line 621
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 621), 2, ",", " "), "html", null, true);
            yield " TND</span>
                            </td>

                            <td>
                                <span class=\"price-text\">";
            // line 625
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", true, true, false, 625)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 625), 0)) : (0)), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                ";
            // line 629
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "disponible", [], "any", false, false, false, 629)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 630
                yield "                                    <span class=\"status-badge status-on\">Shown</span>
                                ";
            } else {
                // line 632
                yield "                                    <span class=\"status-badge status-off\">Hidden</span>
                                ";
            }
            // line 634
            yield "                            </td>

                            <td>
                                <div class=\"actions-wrap\">
                                    <button
    type=\"button\"
    class=\"action-btn\"
    title=\"Modifier\"
    onclick=\"openEditProductPanel(
        '";
            // line 643
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 643), "html", null, true);
            yield "',
        '";
            // line 644
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 644), "js"), "html", null, true);
            yield "',
        '";
            // line 645
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 645), "html", null, true);
            yield "',
        '";
            // line 646
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", true, true, false, 646)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 646), 0)) : (0)), "html", null, true);
            yield "',
        '";
            // line 647
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", true, true, false, 647)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 647), "")) : ("")), "js"), "html", null, true);
            yield "',
        '";
            // line 648
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "disponible", [], "any", false, false, false, 648)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (1) : (0));
            yield "',
        '";
            // line 649
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", true, true, false, 649)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 649), "")) : ("")), "js"), "html", null, true);
            yield "'
    )\"
>
    <i class=\"fas fa-pen\"></i>
</button>

                                    <form action=\"";
            // line 655
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 655)]), "html", null, true);
            yield "\" method=\"post\" style=\"display:inline-block;\">
                                        <button type=\"submit\" class=\"action-btn\" title=\"Supprimer\" onclick=\"return confirm('Supprimer ";
            // line 656
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 656), "html", null, true);
            yield " ?')\" style=\"cursor:pointer;\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 663
        if (!$context['_iterated']) {
            // line 664
            yield "                        <tr>
                            <td colspan=\"7\">
                                <div class=\"empty-box\">
                                    <i class=\"fas fa-box-open fa-2x mb-3\"></i>
                                    <div>Aucun produit trouvé.</div>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 673
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<div id=\"productPanelOverlay\" class=\"product-panel-overlay\" onclick=\"closeProductPanel()\"></div>

<div id=\"productPanel\" class=\"product-panel\">
    <div class=\"product-panel-header\">
        <h3 class=\"product-panel-title\" id=\"productPanelTitle\">Create a product</h3>
        <button type=\"button\" class=\"product-panel-close\" onclick=\"closeProductPanel()\">✕</button>
    </div>

    <div class=\"product-panel-body\">
        <div id=\"productPanelAlert\" class=\"alert panel-alert\"></div>

        <form id=\"productForm\" enctype=\"multipart/form-data\">
        <input type=\"hidden\" id=\"panelProductId\" name=\"id\" value=\"\">
            <div class=\"product-section\">
                <div class=\"product-section-head\">Details</div>
                <div class=\"product-section-content\">
                    <div class=\"row g-4\">
                        <div class=\"col-lg-4\">
                            <label>Image du produit</label>

                            <label for=\"productPhotoInput\" class=\"upload-box\">
                                <div id=\"uploadPlaceholder\" class=\"upload-placeholder\">
                                    <i class=\"fas fa-image\"></i>
                                    <div><strong>Ajouter une image</strong></div>
                                    <div class=\"form-small-note\">JPG, PNG, WEBP - max 2 Mo</div>
                                </div>

                                <img id=\"uploadPreview\" class=\"upload-preview\" alt=\"Preview\">
                            </label>

                            <input type=\"file\" id=\"productPhotoInput\" name=\"photo\" accept=\"image/*\" style=\"display:none;\">

                            <div class=\"upload-note\">Prévisualisation directe avant sauvegarde.</div>
                        </div>

                        <div class=\"col-lg-8\">
                            <div class=\"mb-3\">
                                <label for=\"panelNom\">Nom du produit</label>
                                <input type=\"text\" class=\"form-control\" id=\"panelNom\" name=\"nom\" placeholder=\"Ex: Ma9rouna\" required>
                            </div>

                            <div class=\"row g-3\">
                                <div class=\"col-md-6\">
                                    <label for=\"panelPrix\">Prix</label>
                                    <input type=\"number\" step=\"0.01\" min=\"0.01\" class=\"form-control\" id=\"panelPrix\" name=\"prix\" placeholder=\"Ex: 49.90\" required>
                                </div>

                                <div class=\"col-md-6\">
                                    <label for=\"panelQuantite\">Quantité</label>
                                    <input type=\"number\" min=\"0\" class=\"form-control\" id=\"panelQuantite\" name=\"quantite\" placeholder=\"Ex: 20\" required>
                                </div>
                            </div>

                            <div class=\"mt-3\">
                                <label for=\"panelDescription\">Description</label>
                                <textarea class=\"form-control\" id=\"panelDescription\" name=\"description\" placeholder=\"Décris ton produit...\"></textarea>
                            </div>

                            <div class=\"mt-3\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"panelDisponible\" name=\"disponible\" checked>
                                    <label class=\"form-check-label\" for=\"panelDisponible\">
                                        Produit visible / disponible
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type=\"submit\" class=\"save-panel-btn\" id=\"productPanelSubmitBtn\">
    <i class=\"fas fa-save\"></i> Save Product
</button>
        </form>
    </div>
</div>

<script>
let productPanelMode = 'create';

function resetProductPanel() {
    productPanelMode = 'create';

    document.getElementById('productPanelTitle').textContent = 'Create a product';
    document.getElementById('productPanelSubmitBtn').innerHTML = '<i class=\"fas fa-save\"></i> Save Product';

    document.getElementById('panelProductId').value = '';
    document.getElementById('panelNom').value = '';
    document.getElementById('panelPrix').value = '';
    document.getElementById('panelQuantite').value = '';
    document.getElementById('panelDescription').value = '';
    document.getElementById('panelDisponible').checked = true;
    document.getElementById('productPhotoInput').value = '';

    const uploadPreview = document.getElementById('uploadPreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

    uploadPreview.style.display = 'none';
    uploadPreview.src = '';
    uploadPlaceholder.style.display = 'block';

    const alertBox = document.getElementById('productPanelAlert');
    alertBox.style.display = 'none';
    alertBox.className = 'alert panel-alert';
    alertBox.textContent = '';
}

function openProductPanel() {
    resetProductPanel();
    document.getElementById('productPanel').classList.add('open');
    document.getElementById('productPanelOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function openEditProductPanel(id, nom, prix, quantite, description, disponible, photo) {
    resetProductPanel();
    productPanelMode = 'edit';

    document.getElementById('productPanelTitle').textContent = 'Modifier le produit';
    document.getElementById('productPanelSubmitBtn').innerHTML = '<i class=\"fas fa-save\"></i> Update Product';

    document.getElementById('panelProductId').value = id;
    document.getElementById('panelNom').value = nom;
    document.getElementById('panelPrix').value = prix;
    document.getElementById('panelQuantite').value = quantite;
    document.getElementById('panelDescription').value = description;
    document.getElementById('panelDisponible').checked = disponible == 1;

    const uploadPreview = document.getElementById('uploadPreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

    if (photo) {
        uploadPreview.src = photo;
        uploadPreview.style.display = 'block';
        uploadPlaceholder.style.display = 'none';
    }

    document.getElementById('productPanel').classList.add('open');
    document.getElementById('productPanelOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeProductPanel() {
    document.getElementById('productPanel').classList.remove('open');
    document.getElementById('productPanelOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

const photoInput = document.getElementById('productPhotoInput');
const uploadPreview = document.getElementById('uploadPreview');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');

if (photoInput) {
    photoInput.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            if (!uploadPreview.src) {
                uploadPreview.style.display = 'none';
                uploadPlaceholder.style.display = 'block';
            }
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            uploadPreview.src = e.target.result;
            uploadPreview.style.display = 'block';
            uploadPlaceholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    });
}

const productForm = document.getElementById('productForm');
const productPanelAlert = document.getElementById('productPanelAlert');

if (productForm) {
    productForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(productForm);
        const url = productPanelMode === 'edit'
            ? '";
        // line 863
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produit_ajax_update");
        yield "'
            : '";
        // line 864
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produit_ajax");
        yield "';

        productPanelAlert.style.display = 'none';
        productPanelAlert.className = 'alert panel-alert';

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                productPanelAlert.style.display = 'block';
                productPanelAlert.classList.add('alert-danger');
                productPanelAlert.textContent = data.message || 'Erreur.';
                return;
            }

            productPanelAlert.style.display = 'block';
            productPanelAlert.classList.add('alert-success');
            productPanelAlert.textContent = data.message || 'Succès.';

            setTimeout(() => {
                window.location.reload();
            }, 700);
        } catch (error) {
            productPanelAlert.style.display = 'block';
            productPanelAlert.classList.add('alert-danger');
            productPanelAlert.textContent = 'Erreur réseau ou serveur.';
        }
    });
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeProductPanel();
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
        return "admin_produits/index.html.twig";
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
        return array (  1132 => 864,  1128 => 863,  936 => 673,  922 => 664,  920 => 663,  908 => 656,  904 => 655,  895 => 649,  891 => 648,  887 => 647,  883 => 646,  879 => 645,  875 => 644,  871 => 643,  860 => 634,  856 => 632,  852 => 630,  850 => 629,  843 => 625,  836 => 621,  828 => 616,  823 => 614,  818 => 611,  812 => 607,  804 => 605,  802 => 604,  796 => 601,  793 => 600,  788 => 599,  770 => 583,  761 => 581,  757 => 580,  754 => 579,  745 => 577,  741 => 576,  730 => 568,  720 => 563,  714 => 562,  708 => 561,  702 => 560,  696 => 559,  690 => 558,  679 => 552,  673 => 551,  663 => 544,  646 => 530,  640 => 527,  630 => 520,  622 => 515,  618 => 514,  610 => 509,  606 => 508,  593 => 497,  583 => 496,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des produits{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .products-shell {
        color: #2c1a1d;
    }

    .products-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .products-topbar h3 {
        margin: 0;
        font-weight: 800;
        color: #000;
    }

    .btn-add-product {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.18);
    }

    .btn-add-product:hover {
        color: #fff;
        transform: translateY(-1px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-box {
        border-radius: 22px;
        padding: 22px;
        color: #fff;
        position: relative;
        overflow: hidden;
        min-height: 140px;
    }

    .stat-box::after {
        content: \"\";
        position: absolute;
        width: 180px;
        height: 180px;
        right: -60px;
        top: -40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }

    .stat-bordeaux {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-green {
        background: linear-gradient(135deg, #5e8a24 0%, #7aa53a 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-red {
        background: linear-gradient(135deg, #b42318 0%, #d84c4c 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-dark {
        background: linear-gradient(135deg, #5C4033 0%, #7a5a4a 100%);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .stat-title {
        font-size: 15px;
        color: rgba(255,255,255,0.92);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .stat-value {
        font-size: 40px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 10px;
    }

    .stat-subvalue {
        font-size: 14px;
        font-weight: 700;
        opacity: 0.95;
    }

    .filters-card {
        background: #fff7f2;
        border: 1px solid #ead9d2;
        border-radius: 20px;
        padding: 18px;
        margin-bottom: 20px;
    }

    .filters-card .form-control,
    .filters-card .form-select {
        background: #fff;
        border: 1px solid #e3cfc7;
        color: #2c1a1d;
        border-radius: 14px;
        height: 48px;
    }

    .filters-card .form-control::placeholder {
        color: #9a7f75;
    }

    .btn-reset-products {
        background: #6d7683;
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 16px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        width: 100%;
    }

    .btn-reset-products:hover {
        color: #fff;
        opacity: 0.95;
    }

    .products-table-card {
        background: #110015;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
    }

    .products-table {
    margin: 0;
    color: #000 !important; /* BLACK TEXT */
}

    .products-table thead th {
        background: #7b1e2b;
        color: #fff;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        padding: 16px 14px;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .products-table td {
        padding: 15px 14px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .products-table tbody tr:hover {
        background: rgba(255,255,255,0.02);
    }

    .image-thumb {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.1);
        background: #1f1230;
    }

    .image-fallback {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #1f1230;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #d8c4ff;
        font-size: 18px;
    }

    .product-name {
        font-weight: 800;
        color: #fff;
    }

    .product-desc {
        color: #b8a6c9;
        font-size: 13px;
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .price-text {
        font-weight: 800;
        color: #000;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
    }

    .status-on {
        background: #dcfce7;
        color: #166534;
    }

    .status-off {
        background: #fee2e2;
        color: #991b1b;
    }

    .actions-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: flex-end;
    }

    .action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.10);
        background: #1a0626;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .action-btn:hover {
        background: #8B0000;
        color: #fff;
    }

    .flash-box {
        border-radius: 14px;
        margin-bottom: 16px;
    }

    .empty-box {
        text-align: center;
        padding: 50px 20px;
        color: #c4b5d9;
    }

    .product-panel-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 9998;
        opacity: 0;
        visibility: hidden;
        transition: 0.25s ease;
    }

    .product-panel-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    .product-panel {
        position: fixed;
        top: 0;
        right: -760px;
        width: 760px;
        max-width: 100%;
        height: 100vh;
        background: #fff7f2;
        box-shadow: -10px 0 40px rgba(0,0,0,0.25);
        z-index: 9999;
        transition: 0.32s ease;
        overflow-y: auto;
        border-left: 1px solid #ead9d2;
    }

    .product-panel.open {
        right: 0;
    }

    .product-panel-header {
        padding: 22px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid #ead9d2;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    .product-panel-title {
        font-size: 28px;
        font-weight: 900;
        margin: 0;
    }

    .product-panel-close {
        background: #fff;
        color: #8B0000;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: none;
        font-size: 18px;
        font-weight: 900;
        cursor: pointer;
    }

    .product-panel-body {
        padding: 24px;
    }

    .product-section {
        background: #fff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .product-section-head {
        padding: 16px 20px;
        border-bottom: 1px solid #f0dfd8;
        font-size: 22px;
        font-weight: 800;
        color: #5C4033;
    }

    .product-section-content {
        padding: 20px;
    }

    .product-panel label {
        display: block;
        font-weight: 800;
        color: #5C4033;
        margin-bottom: 8px;
    }

   .product-panel .form-control,
.product-panel textarea {
    border-radius: 14px;
    border: 1px solid #e3cfc7;
    background: #fff;
    color: #000 !important; /* ✅ BLACK TEXT */
}

    .product-panel .form-control {
        min-height: 48px;
    }

    .product-panel textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .product-panel .form-control::placeholder,
.product-panel textarea::placeholder {
    color: #888; /* softer gray */
}

    .product-panel .form-check-label {
        color: #5C4033;
        font-weight: 700;
    }

    .upload-box {
        border: 2px dashed #d6bfb5;
        border-radius: 18px;
        background: #fff7f2;
        min-height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 18px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .upload-box:hover {
        background: #fff2eb;
    }

    .upload-placeholder {
        color: #8a6a60;
    }

    .upload-placeholder i {
        font-size: 42px;
        color: #8B0000;
        margin-bottom: 10px;
    }

    .upload-preview {
        max-width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #ead9d2;
        display: none;
    }

    .upload-note {
        margin-top: 10px;
        color: #8a6a60;
        font-size: 13px;
    }

    .save-panel-btn {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: #fff;
        border: none;
        width: 100%;
        min-height: 52px;
        border-radius: 14px;
        font-size: 18px;
        font-weight: 900;
        box-shadow: 0 10px 20px rgba(139, 0, 0, 0.15);
    }

    .save-panel-btn:hover {
        opacity: 0.96;
    }

    .panel-alert {
        display: none;
        margin-bottom: 16px;
        border-radius: 14px;
    }

    .form-small-note {
        font-size: 13px;
        color: #8a6a60;
        margin-top: 6px;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .product-panel {
            width: 100%;
        }
    }
    .product-panel input,
.product-panel textarea {
    color: #000 !important;
}
</style>
{% endblock %}

{% block admin_content %}
<div class=\"products-shell\">
    <div class=\"products-topbar\">
        <h3>📦 Gestion des produits</h3>
        <button type=\"button\" class=\"btn-add-product\" onclick=\"openProductPanel()\">
            <i class=\"fas fa-plus\"></i> Ajouter un produit
        </button>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-box stat-bordeaux\">
            <div class=\"stat-title\">Quantité totale</div>
            <div class=\"stat-value\">{{ stats.total_quantity }}</div>
            <div class=\"stat-subvalue\">{{ stats.total }} produit(s)</div>
        </div>

        <div class=\"stat-box stat-green\">
            <div class=\"stat-title\">Quantité disponible</div>
            <div class=\"stat-value\">{{ stats.available_quantity }}</div>
            <div class=\"stat-subvalue\">{{ stats.disponibles }} produit(s) actifs</div>
        </div>

        <div class=\"stat-box stat-red\">
            <div class=\"stat-title\">Produits indisponibles</div>
            <div class=\"stat-value\">{{ stats.indisponibles }}</div>
            <div class=\"stat-subvalue\">Produits désactivés</div>
        </div>

        <div class=\"stat-box stat-dark\">
            <div class=\"stat-title\">Valeur catalogue estimée</div>
            <div class=\"stat-value\" style=\"font-size: 30px;\">
                {{ stats.catalog_value|number_format(2, ',', ' ') }} TND
            </div>
            <div class=\"stat-subvalue\">
                Disponibles: {{ stats.available_value|number_format(2, ',', ' ') }} TND
            </div>
        </div>
    </div>

    <div class=\"filters-card\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-lg-4\">
                    <input
                        type=\"text\"
                        name=\"search\"
                        class=\"form-control\"
                        placeholder=\"Search...\"
                        value=\"{{ search }}\"
                    >
                </div>

                <div class=\"col-lg-3\">
                    <select name=\"disponible\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">Tous les produits</option>
                        <option value=\"disponible\" {% if disponible == 'disponible' %}selected{% endif %}>Disponibles</option>
                        <option value=\"indisponible\" {% if disponible == 'indisponible' %}selected{% endif %}>Indisponibles</option>
                    </select>
                </div>

                <div class=\"col-lg-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" {% if sort == 'id_desc' %}selected{% endif %}>Plus récents</option>
                        <option value=\"id_asc\" {% if sort == 'id_asc' %}selected{% endif %}>Plus anciens</option>
                        <option value=\"nom_asc\" {% if sort == 'nom_asc' %}selected{% endif %}>Nom A→Z</option>
                        <option value=\"nom_desc\" {% if sort == 'nom_desc' %}selected{% endif %}>Nom Z→A</option>
                        <option value=\"prix_asc\" {% if sort == 'prix_asc' %}selected{% endif %}>Prix croissant</option>
                        <option value=\"prix_desc\" {% if sort == 'prix_desc' %}selected{% endif %}>Prix décroissant</option>
                    </select>
                </div>

                <div class=\"col-lg-2\">
                    <a href=\"{{ path('app_admin_produits_index') }}\" class=\"btn-reset-products\">
                        <i class=\"fas fa-undo\"></i>&nbsp; Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success flash-box\">{{ message }}</div>
    {% endfor %}

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger flash-box\">{{ message }}</div>
    {% endfor %}

    <div class=\"products-table-card\">
        <div class=\"table-responsive\">
            <table class=\"table products-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Statut</th>
                        <th style=\"text-align:right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for produit in produits %}
                        <tr>
                            <td><strong>{{ produit.idProduit }}</strong></td>

                            <td>
                                {% if produit.photo %}
                                    <img src=\"{{ produit.photo }}\" alt=\"{{ produit.nom }}\" class=\"image-thumb\">
                                {% else %}
                                    <span class=\"image-fallback\">
                                        <i class=\"fas fa-box\"></i>
                                    </span>
                                {% endif %}
                            </td>

                            <td>
                                <div class=\"product-name\">{{ produit.nom }}</div>
                                <div class=\"product-desc\">
                                    {{ produit.description ? produit.description|slice(0, 70) ~ (produit.description|length > 70 ? '...' : '') : 'Sans description' }}
                                </div>
                            </td>

                            <td>
                                <span class=\"price-text\">{{ produit.prix|number_format(2, ',', ' ') }} TND</span>
                            </td>

                            <td>
                                <span class=\"price-text\">{{ produit.quantite|default(0) }}</span>
                            </td>

                            <td>
                                {% if produit.disponible %}
                                    <span class=\"status-badge status-on\">Shown</span>
                                {% else %}
                                    <span class=\"status-badge status-off\">Hidden</span>
                                {% endif %}
                            </td>

                            <td>
                                <div class=\"actions-wrap\">
                                    <button
    type=\"button\"
    class=\"action-btn\"
    title=\"Modifier\"
    onclick=\"openEditProductPanel(
        '{{ produit.idProduit }}',
        '{{ produit.nom|e('js') }}',
        '{{ produit.prix }}',
        '{{ produit.quantite|default(0) }}',
        '{{ produit.description|default('')|e('js') }}',
        '{{ produit.disponible ? 1 : 0 }}',
        '{{ produit.photo|default('')|e('js') }}'
    )\"
>
    <i class=\"fas fa-pen\"></i>
</button>

                                    <form action=\"{{ path('app_admin_produits_delete', {id: produit.idProduit}) }}\" method=\"post\" style=\"display:inline-block;\">
                                        <button type=\"submit\" class=\"action-btn\" title=\"Supprimer\" onclick=\"return confirm('Supprimer {{ produit.nom }} ?')\" style=\"cursor:pointer;\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"7\">
                                <div class=\"empty-box\">
                                    <i class=\"fas fa-box-open fa-2x mb-3\"></i>
                                    <div>Aucun produit trouvé.</div>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id=\"productPanelOverlay\" class=\"product-panel-overlay\" onclick=\"closeProductPanel()\"></div>

<div id=\"productPanel\" class=\"product-panel\">
    <div class=\"product-panel-header\">
        <h3 class=\"product-panel-title\" id=\"productPanelTitle\">Create a product</h3>
        <button type=\"button\" class=\"product-panel-close\" onclick=\"closeProductPanel()\">✕</button>
    </div>

    <div class=\"product-panel-body\">
        <div id=\"productPanelAlert\" class=\"alert panel-alert\"></div>

        <form id=\"productForm\" enctype=\"multipart/form-data\">
        <input type=\"hidden\" id=\"panelProductId\" name=\"id\" value=\"\">
            <div class=\"product-section\">
                <div class=\"product-section-head\">Details</div>
                <div class=\"product-section-content\">
                    <div class=\"row g-4\">
                        <div class=\"col-lg-4\">
                            <label>Image du produit</label>

                            <label for=\"productPhotoInput\" class=\"upload-box\">
                                <div id=\"uploadPlaceholder\" class=\"upload-placeholder\">
                                    <i class=\"fas fa-image\"></i>
                                    <div><strong>Ajouter une image</strong></div>
                                    <div class=\"form-small-note\">JPG, PNG, WEBP - max 2 Mo</div>
                                </div>

                                <img id=\"uploadPreview\" class=\"upload-preview\" alt=\"Preview\">
                            </label>

                            <input type=\"file\" id=\"productPhotoInput\" name=\"photo\" accept=\"image/*\" style=\"display:none;\">

                            <div class=\"upload-note\">Prévisualisation directe avant sauvegarde.</div>
                        </div>

                        <div class=\"col-lg-8\">
                            <div class=\"mb-3\">
                                <label for=\"panelNom\">Nom du produit</label>
                                <input type=\"text\" class=\"form-control\" id=\"panelNom\" name=\"nom\" placeholder=\"Ex: Ma9rouna\" required>
                            </div>

                            <div class=\"row g-3\">
                                <div class=\"col-md-6\">
                                    <label for=\"panelPrix\">Prix</label>
                                    <input type=\"number\" step=\"0.01\" min=\"0.01\" class=\"form-control\" id=\"panelPrix\" name=\"prix\" placeholder=\"Ex: 49.90\" required>
                                </div>

                                <div class=\"col-md-6\">
                                    <label for=\"panelQuantite\">Quantité</label>
                                    <input type=\"number\" min=\"0\" class=\"form-control\" id=\"panelQuantite\" name=\"quantite\" placeholder=\"Ex: 20\" required>
                                </div>
                            </div>

                            <div class=\"mt-3\">
                                <label for=\"panelDescription\">Description</label>
                                <textarea class=\"form-control\" id=\"panelDescription\" name=\"description\" placeholder=\"Décris ton produit...\"></textarea>
                            </div>

                            <div class=\"mt-3\">
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" id=\"panelDisponible\" name=\"disponible\" checked>
                                    <label class=\"form-check-label\" for=\"panelDisponible\">
                                        Produit visible / disponible
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type=\"submit\" class=\"save-panel-btn\" id=\"productPanelSubmitBtn\">
    <i class=\"fas fa-save\"></i> Save Product
</button>
        </form>
    </div>
</div>

<script>
let productPanelMode = 'create';

function resetProductPanel() {
    productPanelMode = 'create';

    document.getElementById('productPanelTitle').textContent = 'Create a product';
    document.getElementById('productPanelSubmitBtn').innerHTML = '<i class=\"fas fa-save\"></i> Save Product';

    document.getElementById('panelProductId').value = '';
    document.getElementById('panelNom').value = '';
    document.getElementById('panelPrix').value = '';
    document.getElementById('panelQuantite').value = '';
    document.getElementById('panelDescription').value = '';
    document.getElementById('panelDisponible').checked = true;
    document.getElementById('productPhotoInput').value = '';

    const uploadPreview = document.getElementById('uploadPreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

    uploadPreview.style.display = 'none';
    uploadPreview.src = '';
    uploadPlaceholder.style.display = 'block';

    const alertBox = document.getElementById('productPanelAlert');
    alertBox.style.display = 'none';
    alertBox.className = 'alert panel-alert';
    alertBox.textContent = '';
}

function openProductPanel() {
    resetProductPanel();
    document.getElementById('productPanel').classList.add('open');
    document.getElementById('productPanelOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function openEditProductPanel(id, nom, prix, quantite, description, disponible, photo) {
    resetProductPanel();
    productPanelMode = 'edit';

    document.getElementById('productPanelTitle').textContent = 'Modifier le produit';
    document.getElementById('productPanelSubmitBtn').innerHTML = '<i class=\"fas fa-save\"></i> Update Product';

    document.getElementById('panelProductId').value = id;
    document.getElementById('panelNom').value = nom;
    document.getElementById('panelPrix').value = prix;
    document.getElementById('panelQuantite').value = quantite;
    document.getElementById('panelDescription').value = description;
    document.getElementById('panelDisponible').checked = disponible == 1;

    const uploadPreview = document.getElementById('uploadPreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

    if (photo) {
        uploadPreview.src = photo;
        uploadPreview.style.display = 'block';
        uploadPlaceholder.style.display = 'none';
    }

    document.getElementById('productPanel').classList.add('open');
    document.getElementById('productPanelOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeProductPanel() {
    document.getElementById('productPanel').classList.remove('open');
    document.getElementById('productPanelOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

const photoInput = document.getElementById('productPhotoInput');
const uploadPreview = document.getElementById('uploadPreview');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');

if (photoInput) {
    photoInput.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            if (!uploadPreview.src) {
                uploadPreview.style.display = 'none';
                uploadPlaceholder.style.display = 'block';
            }
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            uploadPreview.src = e.target.result;
            uploadPreview.style.display = 'block';
            uploadPlaceholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    });
}

const productForm = document.getElementById('productForm');
const productPanelAlert = document.getElementById('productPanelAlert');

if (productForm) {
    productForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(productForm);
        const url = productPanelMode === 'edit'
            ? '{{ path('app_admin_produit_ajax_update') }}'
            : '{{ path('app_admin_produit_ajax') }}';

        productPanelAlert.style.display = 'none';
        productPanelAlert.className = 'alert panel-alert';

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                productPanelAlert.style.display = 'block';
                productPanelAlert.classList.add('alert-danger');
                productPanelAlert.textContent = data.message || 'Erreur.';
                return;
            }

            productPanelAlert.style.display = 'block';
            productPanelAlert.classList.add('alert-success');
            productPanelAlert.textContent = data.message || 'Succès.';

            setTimeout(() => {
                window.location.reload();
            }, 700);
        } catch (error) {
            productPanelAlert.style.display = 'block';
            productPanelAlert.classList.add('alert-danger');
            productPanelAlert.textContent = 'Erreur réseau ou serveur.';
        }
    });
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeProductPanel();
    }
});
</script>
{% endblock %}", "admin_produits/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_produits\\index.html.twig");
    }
}

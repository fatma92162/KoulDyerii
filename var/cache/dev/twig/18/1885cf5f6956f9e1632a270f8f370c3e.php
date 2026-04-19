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

/* admin_commandes/index.html.twig */
class __TwigTemplate_53008ed12afdf7c77146ef124338f89d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_commandes/index.html.twig"));

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

        yield "Gestion des commandes";
        
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
.first-delivery-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    width: min(520px, calc(100vw - 30px));
    max-height: 85vh;
    overflow-y: auto;
    transform: translate(-50%, -50%) scale(0.96);
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 22px;
    box-shadow: 0 24px 60px rgba(0,0,0,0.28);
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.25s ease;
}

.first-delivery-modal.open {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}

.fdg-confirm-btn,
.fdg-cancel-btn {
    min-height: 52px;
    border: none;
    border-radius: 14px;
    font-size: 17px;
    font-weight: 900;
    flex: 1 1 0;
}

.fdg-confirm-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
}

.fdg-confirm-btn:hover {
    transform: translateY(-1px);
}

.fdg-cancel-btn {
    background: #f3dfd7;
    color: #8B0000;
    border: 1px solid #e3cfc7;
}

.fdg-cancel-btn:hover {
    background: #ead2c7;
}
.fdg-btn {
    background: linear-gradient(135deg, #8B0000, #B22222);
    color: white;
    border: none;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.25);
}
.fdg-confirm-btn,
.fdg-cancel-btn {
    min-height: 52px;
    border: none;
    border-radius: 14px;
    font-size: 17px;
    font-weight: 900;
    flex: 1 1 0;
}

.fdg-confirm-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
}

.fdg-confirm-btn:hover {
    transform: translateY(-1px);
}

.fdg-cancel-btn {
    background: #f3dfd7;
    color: #8B0000;
    border: 1px solid #e3cfc7;
}

.fdg-cancel-btn:hover {
    background: #ead2c7;
}

.fdg-btn:hover {
    background: linear-gradient(135deg, #a00000, #d12f2f);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.35);
}
.reco-badge {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
}

.reco-kill {
    background: #ffe0e0;
    color: #b42318;
}

.reco-test {
    background: #fff2cc;
    color: #946200;
}

.reco-scale {
    background: #dcfce7;
    color: #15803d;
}

.scale-helper-link {
    display: inline-block;
    margin-top: 10px;
    font-size: 13px;
    font-weight: 700;
    color: #8B0000;
    cursor: pointer;
    text-decoration: underline;
}

.scale-helper-link:hover {
    color: #6e0000;
}

.scale-helper-box {
    margin-top: 18px;
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 16px;
    padding: 16px;
}

.scale-helper-title {
    font-size: 15px;
    font-weight: 800;
    color: #8B0000;
    margin-bottom: 12px;
}

.scale-helper-result {
    margin-top: 14px;
    padding: 14px;
    border-radius: 14px;
    font-weight: 700;
    line-height: 1.6;
}

.scale-result-good {
    background: #dcfce7;
    color: #166534;
}

.scale-result-warn {
    background: #fff7cc;
    color: #8a6d00;
}

.scale-result-stop {
    background: #ffe0e0;
    color: #b42318;
}

.orders-shell {
    color: #2c1a1d;
}

.top-actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    gap: 12px;
    flex-wrap: wrap;
}

.top-actions-bar h3 {
    margin: 0;
    font-weight: 800;
    color: #7b1e2b;
}

.top-actions-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.performance-card {
    background: linear-gradient(135deg, #7b1e2b 0%, #a83232 100%);
    border-radius: 20px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
}

.performance-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.performance-title {
    font-size: 24px;
    font-weight: 800;
    color: #fff5eb;
}

.performance-legend {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    font-size: 14px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #f4ddd0;
}

.legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
}

.legend-dot-confirmed {
    background: #57d37c;
}

.legend-dot-rejected {
    background: #ff6c6c;
}

.performance-bar {
    width: 100%;
    height: 56px;
    background: #ead7d2;
    border-radius: 999px;
    overflow: hidden;
    display: flex;
    margin-bottom: 18px;
}

.performance-bar-confirmed {
    background: linear-gradient(90deg, #6f9f36 0%, #87b946 100%);
    display: flex;
    align-items: center;
    padding-left: 12px;
    min-width: 0;
}

.performance-bar-rejected {
    background: #ead7d2;
    display: flex;
    align-items: center;
    padding-left: 12px;
    min-width: 0;
}

.bar-pill {
    background: #fff7f2;
    border-radius: 999px;
    padding: 8px 16px;
    font-size: 15px;
    font-weight: 800;
    white-space: nowrap;
}

.bar-pill.confirmed {
    color: #5e8a24;
}

.bar-pill.rejected {
    color: #d84c4c;
}

.mini-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
}

.mini-stat {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 14px;
    padding: 12px;
    text-align: center;
}

.mini-stat-label {
    display: block;
    font-size: 13px;
    color: #f2d7ca;
    margin-bottom: 4px;
}

.mini-stat-value {
    font-size: 22px;
    font-weight: 800;
    color: white;
}

.online-visitors-value {
    color: #8B0000 !important;
}

.mini-stat-note {
    display: block;
    margin-top: 6px;
    font-size: 12px;
    color: #888;
}

.device-stats {
    margin-top: 12px;
    padding-top: 10px;
    border-top: 1px solid rgba(0,0,0,0.08);
    text-align: left;
}

.device-block {
    margin-top: 10px;
}

.device-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    margin-bottom: 6px;
    color: #5C4033;
}

.device-top strong {
    color: #8B0000;
    font-weight: 800;
}

.device-track {
    width: 100%;
    height: 10px;
    background: rgba(92, 64, 51, 0.12);
    border-radius: 999px;
    overflow: hidden;
}

.device-fill {
    height: 100%;
    border-radius: 999px;
    min-width: 0;
}

.device-fill-pc {
    background: linear-gradient(90deg, #57d37c 0%, #87d68d 100%);
}

.device-fill-mobile {
    background: linear-gradient(90deg, #ff7b7b 0%, #ff9a9a 100%);
}

.toolbar-card {
    background: #fff7f0;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 16px;
    margin-bottom: 18px;
}

.form-control,
.form-select {
    background: #ffffff;
    border: 1px solid #e3cfc7;
    color: #2c1a1d;
}

.toolbar-card .form-control::placeholder {
    color: #a9a0b3;
}

.toolbar-card .btn-reset {
    height: 46px;
    border-radius: 12px;
    background: #6d7683;
    color: white;
    border: none;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}
.commande-panel-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: 0.25s ease;
}

.commande-panel-overlay.open {
    opacity: 1;
    visibility: visible;
}

.commande-panel {
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

.commande-panel.open {
    right: 0;
}

.commande-panel-header {
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

.commande-panel-title {
    font-size: 28px;
    font-weight: 900;
    margin: 0;
}

.commande-panel-close {
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

.commande-panel-body {
    padding: 24px;
}

.commande-section {
    background: #fff;
    border: 1px solid #ead9d2;
    border-radius: 18px;
    margin-bottom: 20px;
    overflow: hidden;
}

.commande-section-head {
    padding: 16px 20px;
    border-bottom: 1px solid #f0dfd8;
    font-size: 22px;
    font-weight: 800;
    color: #5C4033;
}

.commande-section-content {
    padding: 20px;
}

.commande-panel label {
    display: block;
    font-weight: 800;
    color: #5C4033;
    margin-bottom: 8px;
}

.commande-panel .form-control,
.commande-panel .form-select {
    border-radius: 14px;
    border: 1px solid #e3cfc7;
    background: #fff;
    color: #2c1a1d;
    min-height: 48px;
}

.commande-panel .form-control::placeholder {
    color: #9a7f75;
}

.commande-items-list {
    display: grid;
    gap: 12px;
}

.commande-item-box {
    display: flex;
    align-items: center;
    gap: 12px;
    border: 1px solid #ead9d2;
    border-radius: 14px;
    background: #fff7f2;
    padding: 12px;
}

.commande-item-box img {
    width: 52px;
    height: 52px;
    object-fit: cover;
    border-radius: 10px;
}

.commande-item-fallback {
    width: 52px;
    height: 52px;
    border-radius: 10px;
    background: #f0dfd8;
    display: flex;
    align-items: center;
    justify-content: center;
}

.save-commande-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
    border: none;
    width: 100%;
    min-height: 52px;
    border-radius: 14px;
    font-size: 18px;
    font-weight: 900;
}

.commande-panel-alert {
    display: none;
    margin-bottom: 16px;
    border-radius: 14px;
}

.table-card {
    background: #110015;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    overflow: hidden;
    margin-bottom: 24px;
}

.orders-table {
    width: 100%;
    margin-bottom: 0;
    color: #fff;
}

.orders-table thead th {
    background: #7b1e2b;
    color: white;
}

.orders-table tbody tr:hover {
    background: rgba(255,255,255,0.02);
}

.orders-table td {
    padding: 14px;
    vertical-align: middle;
    white-space: nowrap;
}

.product-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 160px;
}

.product-thumb {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    object-fit: cover;
    background: #24102d;
    border: 1px solid rgba(255,255,255,0.08);
}

.product-fallback {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #24102d;
    color: #ddd;
    font-size: 14px;
}

.btn-calculator {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 10px 16px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.15);
}

.btn-calculator:hover {
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.22);
}

.status-pill {
    display: inline-flex;
    align-items: center;
    padding: 7px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.status-en_attente {
    background: #ffe6a7;
    color: #8a6d00;
}

.status-acceptee {
    background: #d4f4dd;
    color: #1c7c3c;
}

.status-refusee {
    background: #ffd6d6;
    color: #a11c1c;
}

.status-annulee {
    background: #eee;
    color: #666;
}

.actions-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.icon-btn {
    background: #ffffff;
    border: 1px solid #e3cfc7;
    color: #7b1e2b;
    border-radius: 10px;
    padding: 8px 11px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.icon-btn:hover {
    background: #7b1e2b;
    color: white;
}

.inline-form {
    display: inline-block;
    margin: 0;
}

.flash-dark {
    border-radius: 14px;
    border: none;
}

.advanced-stat-value {
    font-size: 28px;
    font-weight: 900;
    color: #8B0000;
}

.advanced-stat-label {
    font-size: 13px;
    color: #6b4a4a;
    font-weight: 700;
    margin-bottom: 6px;
    display: block;
}

.advanced-stat-card {
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 16px;
    padding: 16px;
    text-align: center;
    height: 100%;
}

.advanced-modal-header {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: white;
}

.advanced-modal-header .btn-close {
    filter: brightness(0) invert(1);
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 741
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 742
        $context["pcPercentage"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["deviceStats"] ?? null), "pc_percentage", [], "any", true, true, false, 742)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["deviceStats"]) || array_key_exists("deviceStats", $context) ? $context["deviceStats"] : (function () { throw new RuntimeError('Variable "deviceStats" does not exist.', 742, $this->source); })()), "pc_percentage", [], "any", false, false, false, 742), 0)) : (0));
        // line 743
        $context["mobilePercentage"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["deviceStats"] ?? null), "mobile_percentage", [], "any", true, true, false, 743)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["deviceStats"]) || array_key_exists("deviceStats", $context) ? $context["deviceStats"] : (function () { throw new RuntimeError('Variable "deviceStats" does not exist.', 743, $this->source); })()), "mobile_percentage", [], "any", false, false, false, 743), 0)) : (0));
        // line 744
        yield "
<div class=\"top-actions-bar\">
    <h3>🛒 Gestion des commandes</h3>

    <div class=\"top-actions-buttons\">
        <a href=\"";
        // line 749
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_calculator");
        yield "\" class=\"btn btn-calculator\">
            <i class=\"fas fa-calculator\"></i> Calculator
        </a>

        <button type=\"button\" class=\"btn btn-calculator\" data-bs-toggle=\"modal\" data-bs-target=\"#advancedStatsModal\">
            <i class=\"fas fa-chart-line\"></i> Stat avancée
        </button>
        <button type=\"button\" class=\"btn btn-calculator\" data-bs-toggle=\"modal\" data-bs-target=\"#importTxtModal\">
    <i class=\"fas fa-file-import\"></i> Import TXT
</button>


        <a href=\"";
        // line 761
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_export_lookalike");
        yield "\" class=\"btn btn-calculator\">
            <i class=\"fas fa-file-excel\"></i> Create Lookalike
        </a>
    </div>
</div>

<div class=\"orders-shell\">
    <div class=\"performance-card\">
        <div class=\"performance-header\">
            <div class=\"performance-title\">📊 Performance des commandes</div>

            <div class=\"performance-legend\">
                <span class=\"legend-item\">
                    <span class=\"legend-dot legend-dot-confirmed\"></span>
                    Confirmées <strong>";
        // line 775
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 775, $this->source); })()), "pourcentage_acceptee", [], "any", false, false, false, 775), "html", null, true);
        yield "%</strong>
                </span>
                <span class=\"legend-item\">
                    <span class=\"legend-dot legend-dot-rejected\"></span>
                    Refusées <strong>";
        // line 779
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 779, $this->source); })()), "pourcentage_refusee", [], "any", false, false, false, 779), "html", null, true);
        yield "%</strong>
                </span>
            </div>
        </div>

        <div class=\"performance-bar\">
            <div class=\"performance-bar-confirmed\" style=\"width: ";
        // line 785
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 785, $this->source); })()), "pourcentage_acceptee", [], "any", false, false, false, 785), "html", null, true);
        yield "%;\">
                ";
        // line 786
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 786, $this->source); })()), "pourcentage_acceptee", [], "any", false, false, false, 786) > 0)) {
            // line 787
            yield "                    <span class=\"bar-pill confirmed\">✅ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 787, $this->source); })()), "pourcentage_acceptee", [], "any", false, false, false, 787), "html", null, true);
            yield "%</span>
                ";
        }
        // line 789
        yield "            </div>
            <div class=\"performance-bar-rejected\" style=\"width: ";
        // line 790
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 790, $this->source); })()), "pourcentage_refusee", [], "any", false, false, false, 790), "html", null, true);
        yield "%;\">
                ";
        // line 791
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 791, $this->source); })()), "pourcentage_refusee", [], "any", false, false, false, 791) > 0)) {
            // line 792
            yield "                    <span class=\"bar-pill rejected\">❌ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 792, $this->source); })()), "pourcentage_refusee", [], "any", false, false, false, 792), "html", null, true);
            yield "%</span>
                ";
        }
        // line 794
        yield "            </div>
        </div>

        <div class=\"mini-stats\">
            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Total</span>
                <span class=\"mini-stat-value\" id=\"orders-total-count\">";
        // line 800
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 800, $this->source); })()), "total", [], "any", false, false, false, 800), "html", null, true);
        yield "</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">En attente</span>
                <span class=\"mini-stat-value\">";
        // line 805
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 805, $this->source); })()), "en_attente", [], "any", false, false, false, 805), "html", null, true);
        yield "</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Acceptées</span>
                <span class=\"mini-stat-value\">";
        // line 810
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 810, $this->source); })()), "acceptee", [], "any", false, false, false, 810), "html", null, true);
        yield "</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Refusées</span>
                <span class=\"mini-stat-value\">";
        // line 815
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 815, $this->source); })()), "refusee", [], "any", false, false, false, 815), "html", null, true);
        yield "</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Annulées</span>
                <span class=\"mini-stat-value\">";
        // line 820
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 820, $this->source); })()), "annulee", [], "any", false, false, false, 820), "html", null, true);
        yield "</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Visiteurs en ligne</span>
                <span class=\"mini-stat-value online-visitors-value\" id=\"online-visitors-count\">";
        // line 825
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["onlineVisitors"]) || array_key_exists("onlineVisitors", $context) ? $context["onlineVisitors"] : (function () { throw new RuntimeError('Variable "onlineVisitors" does not exist.', 825, $this->source); })()), "html", null, true);
        yield "</span>
                <small class=\"mini-stat-note\">Actifs durant les 5 dernières minutes</small>

                <div class=\"device-stats\">
                    <div class=\"device-block\">
                        <div class=\"device-top\">
                            <span>💻 PC</span>
                            <strong>";
        // line 832
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pcPercentage"]) || array_key_exists("pcPercentage", $context) ? $context["pcPercentage"] : (function () { throw new RuntimeError('Variable "pcPercentage" does not exist.', 832, $this->source); })()), "html", null, true);
        yield "%</strong>
                        </div>
                        <div class=\"device-track\">
                            <div class=\"device-fill device-fill-pc\" style=\"width: ";
        // line 835
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pcPercentage"]) || array_key_exists("pcPercentage", $context) ? $context["pcPercentage"] : (function () { throw new RuntimeError('Variable "pcPercentage" does not exist.', 835, $this->source); })()), "html", null, true);
        yield "%;\"></div>
                        </div>
                    </div>

                    <div class=\"device-block\">
                        <div class=\"device-top\">
                            <span>📱 Mobile</span>
                            <strong>";
        // line 842
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mobilePercentage"]) || array_key_exists("mobilePercentage", $context) ? $context["mobilePercentage"] : (function () { throw new RuntimeError('Variable "mobilePercentage" does not exist.', 842, $this->source); })()), "html", null, true);
        yield "%</strong>
                        </div>
                        <div class=\"device-track\">
                            <div class=\"device-fill device-fill-mobile\" style=\"width: ";
        // line 845
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mobilePercentage"]) || array_key_exists("mobilePercentage", $context) ? $context["mobilePercentage"] : (function () { throw new RuntimeError('Variable "mobilePercentage" does not exist.', 845, $this->source); })()), "html", null, true);
        yield "%;\"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"toolbar-card\">
        <form method=\"get\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Search client, téléphone, produit...\" value=\"";
        // line 857
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 857, $this->source); })()), "html", null, true);
        yield "\">
                </div>

                <div class=\"col-md-3\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">Tous les statuts</option>
                        <option value=\"en_attente\" ";
        // line 863
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 863, $this->source); })()) == "en_attente")) {
            yield "selected";
        }
        yield ">Pending</option>
                        <option value=\"acceptee\" ";
        // line 864
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 864, $this->source); })()) == "acceptee")) {
            yield "selected";
        }
        yield ">Accepted</option>
                        <option value=\"refusee\" ";
        // line 865
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 865, $this->source); })()) == "refusee")) {
            yield "selected";
        }
        yield ">Rejected</option>
                        <option value=\"annulee\" ";
        // line 866
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 866, $this->source); })()) == "annulee")) {
            yield "selected";
        }
        yield ">Cancelled</option>
                    </select>
                </div>

                <div class=\"col-md-2\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"date_desc\" ";
        // line 872
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 872, $this->source); })()) == "date_desc")) {
            yield "selected";
        }
        yield ">Plus récentes</option>
                        <option value=\"date_asc\" ";
        // line 873
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 873, $this->source); })()) == "date_asc")) {
            yield "selected";
        }
        yield ">Plus anciennes</option>
                        <option value=\"client_asc\" ";
        // line 874
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 874, $this->source); })()) == "client_asc")) {
            yield "selected";
        }
        yield ">Client A→Z</option>
                        <option value=\"client_desc\" ";
        // line 875
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 875, $this->source); })()) == "client_desc")) {
            yield "selected";
        }
        yield ">Client Z→A</option>
                    </select>
                </div>

                <div class=\"col-md-2\">
                    <a href=\"";
        // line 880
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index");
        yield "\" class=\"btn-reset w-100\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 888
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 888, $this->source); })()), "flashes", ["success"], "method", false, false, false, 888));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 889
            yield "        <div class=\"alert alert-success flash-dark\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 891
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 891, $this->source); })()), "flashes", ["info"], "method", false, false, false, 891));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 892
            yield "        <div class=\"alert alert-info flash-dark\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 894
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 894, $this->source); })()), "flashes", ["error"], "method", false, false, false, 894));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 895
            yield "        <div class=\"alert alert-danger flash-dark\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 897
        yield "
    <div class=\"table-card\">
        <div class=\"table-responsive\">
            <table class=\"table orders-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produits</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Delivery</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th style=\"min-width: 220px;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"normal-orders-tbody\">
                    ";
        // line 914
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 914, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
            // line 915
            yield "                        <tr>
                            <td><strong>";
            // line 916
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 916), "html", null, true);
            yield "</strong></td>

                            <td>
    ";
            // line 919
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "cartSummary", [], "any", false, false, false, 919), "isPanier", [], "any", false, false, false, 919)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 920
                yield "        <div class=\"product-cell\">
            ";
                // line 921
                $context["firstItem"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "cartSummary", [], "any", false, false, false, 921), "items", [], "any", false, false, false, 921));
                // line 922
                yield "            ";
                if (((isset($context["firstItem"]) || array_key_exists("firstItem", $context) ? $context["firstItem"] : (function () { throw new RuntimeError('Variable "firstItem" does not exist.', 922, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["firstItem"]) || array_key_exists("firstItem", $context) ? $context["firstItem"] : (function () { throw new RuntimeError('Variable "firstItem" does not exist.', 922, $this->source); })()), "photo", [], "any", false, false, false, 922))) {
                    // line 923
                    yield "                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["firstItem"]) || array_key_exists("firstItem", $context) ? $context["firstItem"] : (function () { throw new RuntimeError('Variable "firstItem" does not exist.', 923, $this->source); })()), "photo", [], "any", false, false, false, 923), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["firstItem"]) || array_key_exists("firstItem", $context) ? $context["firstItem"] : (function () { throw new RuntimeError('Variable "firstItem" does not exist.', 923, $this->source); })()), "nom", [], "any", false, false, false, 923), "html", null, true);
                    yield "\" class=\"product-thumb\">
            ";
                } else {
                    // line 925
                    yield "                <span class=\"product-fallback\">🛒</span>
            ";
                }
                // line 927
                yield "            <div>
                <div>Commande panier</div>
                <small class=\"text-secondary\">";
                // line 929
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "cartSummary", [], "any", false, false, false, 929), "quantity", [], "any", false, false, false, 929), "html", null, true);
                yield " article(s)</small>
            </div>
        </div>
    ";
            } else {
                // line 933
                yield "        <div class=\"product-cell\">
            ";
                // line 934
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, false, false, 934) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, true, false, 934), "photo", [], "any", true, true, false, 934)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, false, false, 934), "photo", [], "any", false, false, false, 934))) {
                    // line 935
                    yield "                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, false, false, 935), "photo", [], "any", false, false, false, 935), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, false, false, 935), "nom", [], "any", false, false, false, 935), "html", null, true);
                    yield "\" class=\"product-thumb\">
            ";
                } else {
                    // line 937
                    yield "                <span class=\"product-fallback\">📦</span>
            ";
                }
                // line 939
                yield "            <div>
                <div>";
                // line 940
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, true, false, 940), "nom", [], "any", true, true, false, 940)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "produit", [], "any", false, false, false, 940), "nom", [], "any", false, false, false, 940), "Produit")) : ("Produit")), "html", null, true);
                yield "</div>
                <small class=\"text-secondary\">x";
                // line 941
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "cartSummary", [], "any", false, false, false, 941), "quantity", [], "any", false, false, false, 941), "html", null, true);
                yield "</small>
            </div>
        </div>
    ";
            }
            // line 945
            yield "</td>

                            <td>";
            // line 947
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 947), "html", null, true);
            yield "</td>
                            <td>";
            // line 948
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "createdAt", [], "any", false, false, false, 948), "d M Y, H:i"), "html", null, true);
            yield "</td>
                            <td>";
            // line 949
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "location", [], "any", false, false, false, 949), "html", null, true);
            yield "</td>

                            <td>
    <span id=\"fdg-status-";
            // line 952
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 952), "html", null, true);
            yield "\"
          class=\"status-pill status-";
            // line 953
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "status", [], "any", false, false, false, 953), "html", null, true);
            yield "\">
                                    ";
            // line 954
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "status", [], "any", false, false, false, 954) == "en_attente")) {
                // line 955
                yield "                                        Pending
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 956
$context["commande"], "status", [], "any", false, false, false, 956) == "acceptee")) {
                // line 957
                yield "                                        Accepted
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 958
$context["commande"], "status", [], "any", false, false, false, 958) == "refusee")) {
                // line 959
                yield "                                        Rejected
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 960
$context["commande"], "status", [], "any", false, false, false, 960) == "annulee")) {
                // line 961
                yield "                                        Cancelled
                                    ";
            }
            // line 963
            yield "                                </span>
                            </td>

                           <td>
    ";
            // line 967
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "cartSummary", [], "any", false, false, false, 967), "total", [], "any", false, false, false, 967), 2, ",", " "), "html", null, true);
            yield " TND
</td>

                            <td>
                                <div class=\"actions-cell\">
                                <button type=\"button\"
    class=\"icon-btn fdg-btn\"
    onclick=\"openFirstDeliveryModal(";
            // line 974
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 974), "html", null, true);
            yield ")\">
    <i class=\"fas fa-paper-plane\"></i>
</button>
                                    ";
            // line 977
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "status", [], "any", false, false, false, 977) == "en_attente")) {
                // line 978
                yield "                                        <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 978)]), "html", null, true);
                yield "\" method=\"post\" class=\"inline-form\">
                                            <input type=\"hidden\" name=\"status\" value=\"";
                // line 979
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 979, $this->source); })()), "html", null, true);
                yield "\">
                                            <input type=\"hidden\" name=\"search\" value=\"";
                // line 980
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 980, $this->source); })()), "html", null, true);
                yield "\">
                                            <input type=\"hidden\" name=\"sort\" value=\"";
                // line 981
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 981, $this->source); })()), "html", null, true);
                yield "\">
                                            <button type=\"submit\" class=\"icon-btn\" title=\"Accepter\">
                                                <i class=\"fas fa-check\"></i>
                                            </button>
                                        </form>

                                        <form action=\"";
                // line 987
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 987)]), "html", null, true);
                yield "\" method=\"post\" class=\"inline-form\">
                                            <input type=\"hidden\" name=\"status\" value=\"";
                // line 988
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 988, $this->source); })()), "html", null, true);
                yield "\">
                                            <input type=\"hidden\" name=\"search\" value=\"";
                // line 989
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 989, $this->source); })()), "html", null, true);
                yield "\">
                                            <input type=\"hidden\" name=\"sort\" value=\"";
                // line 990
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 990, $this->source); })()), "html", null, true);
                yield "\">
                                            <button type=\"submit\" class=\"icon-btn\" title=\"Refuser\">
                                                <i class=\"fas fa-times\"></i>
                                            </button>
                                        </form>
                                    ";
            }
            // line 996
            yield "
                                    <button
    type=\"button\"
    class=\"icon-btn\"
    title=\"Modifier\"
    onclick=\"openCommandeEditPanel(";
            // line 1001
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 1001), "html", null, true);
            yield ")\"
>
    <i class=\"fas fa-pen\"></i>
</button>

                                    <form action=\"";
            // line 1006
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 1006)]), "html", null, true);
            yield "\" method=\"post\" class=\"inline-form\" onsubmit=\"return confirm('Supprimer cette commande ?');\">
                                        <input type=\"hidden\" name=\"status\" value=\"";
            // line 1007
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 1007, $this->source); })()), "html", null, true);
            yield "\">
                                        <input type=\"hidden\" name=\"search\" value=\"";
            // line 1008
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 1008, $this->source); })()), "html", null, true);
            yield "\">
                                        <input type=\"hidden\" name=\"sort\" value=\"";
            // line 1009
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 1009, $this->source); })()), "html", null, true);
            yield "\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Supprimer\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 1017
        if (!$context['_iterated']) {
            // line 1018
            yield "                        <tr>
                            <td colspan=\"8\" class=\"text-center py-4\">Aucune commande trouvée.</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commande'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1022
        yield "                </tbody>
            </table>
        </div>
    </div>

    <div class=\"top-actions-bar\" style=\"margin-top: 30px;\">
        <h3>📞 Commandes abandonnées</h3>
        <div class=\"top-actions-buttons\">
            <span class=\"btn btn-calculator\" style=\"pointer-events:none;\">
                <span id=\"abandoned-count\">";
        // line 1031
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["abandonedCommandes"]) || array_key_exists("abandonedCommandes", $context) ? $context["abandonedCommandes"] : (function () { throw new RuntimeError('Variable "abandonedCommandes" does not exist.', 1031, $this->source); })())), "html", null, true);
        yield "</span> lead(s)
            </span>
        </div>
    </div>

    <div class=\"table-card\">
        <div class=\"table-responsive\">
            <table class=\"table orders-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produit / Panier</th>
                        <th>Customer</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Source</th>
                        <th>Dernière activité</th>
                        <th>Statut</th>
                        <th style=\"min-width: 180px;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"abandoned-orders-tbody\">
                    ";
        // line 1053
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["abandonedCommandes"]) || array_key_exists("abandonedCommandes", $context) ? $context["abandonedCommandes"] : (function () { throw new RuntimeError('Variable "abandonedCommandes" does not exist.', 1053, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["draft"]) {
            // line 1054
            yield "                        <tr>
                            <td><strong>#";
            // line 1055
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getId", [], "method", false, false, false, 1055), "html", null, true);
            yield "</strong></td>

                            <td>
                                ";
            // line 1058
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "produit", [], "any", false, false, false, 1058)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1059
                yield "                                    <div class=\"product-cell\">
                                        ";
                // line 1060
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "produit", [], "any", false, false, false, 1060), "photo", [], "any", false, false, false, 1060)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1061
                    yield "                                            <img src=\"/uploads/produits/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "produit", [], "any", false, false, false, 1061), "photo", [], "any", false, false, false, 1061), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "produit", [], "any", false, false, false, 1061), "nom", [], "any", false, false, false, 1061), "html", null, true);
                    yield "\" class=\"product-thumb\">
                                        ";
                } else {
                    // line 1063
                    yield "                                            <span class=\"product-fallback\">📦</span>
                                        ";
                }
                // line 1065
                yield "                                        <div>
                                            <div>";
                // line 1066
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "produit", [], "any", false, false, false, 1066), "nom", [], "any", false, false, false, 1066), "html", null, true);
                yield "</div>
                                            <small class=\"text-secondary\">Produit direct</small>
                                        </div>
                                    </div>
                                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 1070
$context["draft"], "getCartData", [], "method", false, false, false, 1070)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1071
                yield "                                    <div class=\"product-cell\">
                                        <span class=\"product-fallback\">🛒</span>
                                        <div>
                                            <div>Panier abandonné</div>
                                            <small class=\"text-secondary\">";
                // line 1075
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getCartData", [], "method", false, false, false, 1075)), "html", null, true);
                yield " article(s)</small>
                                        </div>
                                    </div>
                                ";
            } else {
                // line 1079
                yield "                                    <div class=\"product-cell\">
                                        <span class=\"product-fallback\">📦</span>
                                        <div>
                                            <div>Lead sans produit</div>
                                        </div>
                                    </div>
                                ";
            }
            // line 1086
            yield "                            </td>

                            <td>";
            // line 1088
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getCustomerName", [], "method", false, false, false, 1088)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getCustomerName", [], "method", false, false, false, 1088), "html", null, true)) : ("-"));
            yield "</td>

                            <td>
                                ";
            // line 1091
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getPhone", [], "method", false, false, false, 1091)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1092
                yield "                                    <a href=\"tel:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getPhone", [], "method", false, false, false, 1092), "html", null, true);
                yield "\" style=\"color:#000; text-decoration:underline;\">
                                        ";
                // line 1093
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getPhone", [], "method", false, false, false, 1093), "html", null, true);
                yield "
                                    </a>
                                ";
            } else {
                // line 1096
                yield "                                    -
                                ";
            }
            // line 1098
            yield "                            </td>

                            <td>";
            // line 1100
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getLocation", [], "method", false, false, false, 1100)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getLocation", [], "method", false, false, false, 1100), "html", null, true)) : ("-"));
            yield "</td>
                            <td>";
            // line 1101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getSource", [], "method", false, false, false, 1101), "html", null, true);
            yield "</td>
                            <td>";
            // line 1102
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getUpdatedAt", [], "method", false, false, false, 1102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getUpdatedAt", [], "method", false, false, false, 1102), "d M Y, H:i"), "html", null, true)) : ("-"));
            yield "</td>
                            <td>
                                <span class=\"status-pill status-en_attente\">Abandonnée</span>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <form action=\"";
            // line 1109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_abandoned_commandes_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getId", [], "method", false, false, false, 1109)]), "html", null, true);
            yield "\" method=\"post\" class=\"inline-form\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Accepter le lead\">
                                            <i class=\"fas fa-check\"></i>
                                        </button>
                                    </form>

                                    <form action=\"";
            // line 1115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_abandoned_commandes_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["draft"], "getId", [], "method", false, false, false, 1115)]), "html", null, true);
            yield "\" method=\"post\" class=\"inline-form\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Refuser le lead\">
                                            <i class=\"fas fa-times\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 1123
        if (!$context['_iterated']) {
            // line 1124
            yield "                        <tr>
                            <td colspan=\"9\" class=\"text-center py-4\">Aucune commande abandonnée.</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['draft'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1128
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=\"modal fade\" id=\"advancedStatsModal\" tabindex=\"-1\" aria-labelledby=\"advancedStatsModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header advanced-modal-header\">
                <h5 class=\"modal-title\" id=\"advancedStatsModalLabel\">
                    <i class=\"fas fa-chart-line\"></i> Stat avancée
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>

            <div class=\"modal-body\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Référence campagne</label>
                        <input type=\"text\" id=\"advanced-campaign-ref\" class=\"form-control\" placeholder=\"Ex: Meta CBO 12 May\">
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Période</label>
                        <select id=\"advanced-period\" class=\"form-select\">
                            <option value=\"today\">Aujourd'hui</option>
                            <option value=\"week\">Dernière semaine</option>
                            <option value=\"month\">Dernier mois</option>
                        </select>
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Montant dépensé</label>
                        <input type=\"number\" step=\"0.01\" id=\"advanced-spent\" class=\"form-control\" value=\"0\">
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Dépenses pub</label>
                        <input type=\"number\" step=\"0.01\" id=\"advanced-ads\" class=\"form-control\" value=\"0\">
                    </div>
                </div>

                <div class=\"text-center mb-4 d-flex justify-content-center gap-2 flex-wrap\">
                    <button type=\"button\" class=\"btn btn-calculator\" id=\"calculateAdvancedStatsBtn\">
                        <i class=\"fas fa-bolt\"></i> Calculer
                    </button>

                    <button type=\"button\" class=\"btn btn-calculator\" id=\"saveCampaignComparisonBtn\">
                        <i class=\"fas fa-save\"></i> Sauvegarder campagne
                    </button>
                </div>

                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">Revenue</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-revenue\">0.00</div>
                            <small>TND</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">ROAS</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-roas\">0.00</div>
                            <small>x</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">ROI</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-roi\">0.00</div>
                            <small>%</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">Cmd acceptées</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-count\">0</div>
                            <small>unités</small>
                        </div>
                    </div>
                </div>

                <div class=\"advanced-stat-card mb-4\" style=\"text-align:left;\">
                    <span class=\"advanced-stat-label\">Recommandation</span>
                    <div id=\"campaignRecommendationBox\" style=\"font-weight:700; color:#5c4033;\">
                        Aucune recommandation pour le moment.
                    </div>

                    <div id=\"scaleHelperLinkContainer\" style=\"display:none;\">
                        <span class=\"scale-helper-link\" id=\"openScaleHelper\">
                            Click here to help scale this campaign
                        </span>
                    </div>
                </div>

                <div id=\"scaleHelperBox\" class=\"scale-helper-box\" style=\"display:none;\">
                    <div class=\"scale-helper-title\">Scaling helper</div>

                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label class=\"form-label fw-bold\">Total budget</label>
                            <input type=\"number\" step=\"0.01\" id=\"scale-total-budget\" class=\"form-control\" placeholder=\"Ex: 1000\">
                        </div>

                        <div class=\"col-md-6\">
                            <label class=\"form-label fw-bold\">Daily ad spend</label>
                            <input type=\"number\" step=\"0.01\" id=\"scale-daily-spend\" class=\"form-control\" placeholder=\"Ex: 50\">
                        </div>
                    </div>

                    <div class=\"mt-3\">
                        <button type=\"button\" class=\"btn btn-calculator\" id=\"runScaleHelperBtn\">
                            <i class=\"fas fa-rocket\"></i> Check scaling
                        </button>
                    </div>

                    <div id=\"scaleHelperResult\" class=\"scale-helper-result scale-result-warn\" style=\"display:none;\"></div>
                </div>

                <div class=\"advanced-stat-card\" style=\"text-align:left;\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2\">
                        <span class=\"advanced-stat-label mb-0\">Comparaison campagnes</span>
                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" id=\"clearCampaignComparisonsBtn\">
                            <i class=\"fas fa-trash\"></i> Effacer tout
                        </button>
                    </div>

                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered align-middle mb-0\" style=\"background:white;\">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Période</th>
                                    <th>Revenue</th>
                                    <th>Spent</th>
                                    <th>Ads</th>
                                    <th>ROAS</th>
                                    <th>ROI</th>
                                    <th>Reco</th>
                                </tr>
                            </thead>
                            <tbody id=\"campaignComparisonTableBody\">
                                <tr>
                                    <td colspan=\"8\" class=\"text-center text-muted\">Aucune campagne sauvegardée.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function getAdvancedRecommendation(roas, roi) {
    if (roas < 1.5 || roi < 0) {
        return {
            label: 'Kill',
            className: 'reco-kill',
            text: 'Cette campagne est faible. Coupe-la ou refais complètement l’angle, la créa ou le ciblage.'
        };
    }

    if ((roas >= 1.5 && roas < 2.5) || (roi >= 0 && roi < 30)) {
        return {
            label: 'Leave / Test',
            className: 'reco-test',
            text: 'Campagne correcte mais pas encore forte. Laisse tourner, teste nouvelles créas, hooks et audiences avant de scaler.'
        };
    }

    return {
        label: 'Scale',
        className: 'reco-scale',
        text: 'Bonne campagne. Tu peux scaler progressivement avec prudence: +10% à +20% budget, ou dupliquer sur nouveaux ensembles.'
    };
}

function hideScaleHelper() {
    const linkContainer = document.getElementById('scaleHelperLinkContainer');
    const helperBox = document.getElementById('scaleHelperBox');
    const resultBox = document.getElementById('scaleHelperResult');

    if (linkContainer) linkContainer.style.display = 'none';
    if (helperBox) helperBox.style.display = 'none';
    if (resultBox) {
        resultBox.style.display = 'none';
        resultBox.innerHTML = '';
        resultBox.className = 'scale-helper-result';
    }
}

function showScaleHelperLink() {
    const linkContainer = document.getElementById('scaleHelperLinkContainer');
    if (linkContainer) {
        linkContainer.style.display = 'block';
    }
}

function evaluateScaling(totalBudget, dailySpend, roas, roi) {
    const result = {
        className: 'scale-result-warn',
        title: '',
        text: ''
    };

    if (totalBudget <= 0 || dailySpend <= 0) {
        result.className = 'scale-result-stop';
        result.title = 'Invalid values';
        result.text = 'Add valid total budget and daily ad spend first.';
        return result;
    }

    const budgetDaysLeft = totalBudget / dailySpend;
    const spendRatio = (dailySpend / totalBudget) * 100;

    let suggestedScalePercent = 0;

    if (roas >= 4 && roi >= 40) {
        suggestedScalePercent = 25;
    } else if (roas >= 3 && roi >= 30) {
        suggestedScalePercent = 20;
    } else if (roas >= 2.5 && roi >= 20) {
        suggestedScalePercent = 10;
    } else {
        suggestedScalePercent = 0;
    }

    const newDailySpend = dailySpend + (dailySpend * suggestedScalePercent / 100);
    const newBudgetDaysLeft = newDailySpend > 0 ? totalBudget / newDailySpend : 0;

    if (roas < 2 || roi < 10) {
        result.className = 'scale-result-stop';
        result.title = 'Stop scaling';
        result.text = `
            Current performance is not strong enough to continue scaling.<br>
            ROAS/ROI are too weak for safe scaling.<br>
            Recommendation: stop scaling now and improve creatives, offer, funnel, or targeting first.
        `;
        return result;
    }

    if (budgetDaysLeft < 3 || spendRatio >= 35) {
        result.className = 'scale-result-stop';
        result.title = 'Stop scaling';
        result.text = `
            Your budget is too tight compared to your current daily spend.<br>
            Budget lasts only about <strong>\${budgetDaysLeft.toFixed(1)} days</strong>.<br>
            Recommendation: stop scaling now or add more total budget first.
        `;
        return result;
    }

    if (budgetDaysLeft >= 3 && budgetDaysLeft < 7) {
        result.className = 'scale-result-warn';
        result.title = 'Wait and monitor';
        result.text = `
            Campaign can run, but budget is limited.<br>
            Budget lasts about <strong>\${budgetDaysLeft.toFixed(1)} days</strong>.<br>
            Best move: do not scale hard now. Watch results for 1–2 days before scaling again.
        `;
        return result;
    }

    if (suggestedScalePercent <= 0) {
        result.className = 'scale-result-warn';
        result.title = 'Wait before scaling again';
        result.text = `
            Campaign is decent, but not strong enough for another aggressive scale.<br>
            Keep daily spend at <strong>\${dailySpend.toFixed(2)} TND</strong> and monitor performance.
        `;
        return result;
    }

    result.className = 'scale-result-good';
    result.title = 'Scale again';
    result.text = `
        Campaign looks strong enough to continue scaling.<br>
        Suggested increase: <strong>+\${suggestedScalePercent}%</strong><br>
        Current daily spend: <strong>\${dailySpend.toFixed(2)} TND</strong><br>
        New suggested daily spend: <strong>\${newDailySpend.toFixed(2)} TND</strong><br>
        Estimated budget duration after scaling: <strong>\${newBudgetDaysLeft.toFixed(1)} days</strong><br>
        Recommendation: scale again carefully and monitor CPA, ROAS, and profit after the increase.
    `;

    return result;
}

function runScaleHelper() {
    const totalBudget = parseFloat(document.getElementById('scale-total-budget')?.value) || 0;
    const dailySpend = parseFloat(document.getElementById('scale-daily-spend')?.value) || 0;
    const roas = parseFloat(document.getElementById('advanced-roas')?.textContent) || 0;
    const roi = parseFloat(document.getElementById('advanced-roi')?.textContent) || 0;

    const result = evaluateScaling(totalBudget, dailySpend, roas, roi);
    const resultBox = document.getElementById('scaleHelperResult');

    if (!resultBox) return;

    resultBox.className = 'scale-helper-result ' + result.className;
    resultBox.style.display = 'block';
    resultBox.innerHTML = `
        <strong>\${result.title}</strong><br>
        \${result.text}
    `;
}

async function loadAdvancedStats() {
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');

    if (!periodEl || !spentEl || !adsEl) {
        return;
    }

    const period = periodEl.value;
    const spent = parseFloat(spentEl.value) || 0;
    const ads = parseFloat(adsEl.value) || 0;

    try {
        const response = await fetch('";
        // line 1455
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_advanced_stats");
        yield "?period=' + encodeURIComponent(period));
        if (!response.ok) {
            console.error('Advanced stats route error:', response.status);
            return;
        }

        const data = await response.json();

        const revenue = parseFloat(data.revenue || 0);
        const totalCost = spent + ads;
        const roas = ads > 0 ? (revenue / ads) : 0;
        const roi = totalCost > 0 ? (((revenue - totalCost) / totalCost) * 100) : 0;

        document.getElementById('advanced-revenue').textContent = revenue.toFixed(2);
        document.getElementById('advanced-roas').textContent = roas.toFixed(2);
        document.getElementById('advanced-roi').textContent = roi.toFixed(2);
        document.getElementById('advanced-count').textContent = data.acceptedCount ?? 0;

        const recommendation = getAdvancedRecommendation(roas, roi);
        document.getElementById('campaignRecommendationBox').innerHTML = `
            <span class=\"reco-badge \${recommendation.className}\">\${recommendation.label}</span>
            <div style=\"margin-top:10px;\">\${recommendation.text}</div>
        `;

        hideScaleHelper();

        if (recommendation.label === 'Scale') {
            showScaleHelperLink();
        }
    } catch (error) {
        console.error('Erreur stats avancées:', error);
    }
}

function getSavedCampaignComparisons() {
    try {
        return JSON.parse(localStorage.getItem('campaignComparisons') || '[]');
    } catch (e) {
        return [];
    }
}

function saveCampaignComparisons(data) {
    localStorage.setItem('campaignComparisons', JSON.stringify(data));
}

function renderCampaignComparisons() {
    const tbody = document.getElementById('campaignComparisonTableBody');
    if (!tbody) return;

    const campaigns = getSavedCampaignComparisons();

    if (!campaigns.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan=\"8\" class=\"text-center text-muted\">Aucune campagne sauvegardée.</td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = campaigns.map((campaign) => `
        <tr>
            <td>\${campaign.reference}</td>
            <td>\${campaign.periodLabel}</td>
            <td>\${campaign.revenue.toFixed(2)} TND</td>
            <td>\${campaign.spent.toFixed(2)} TND</td>
            <td>\${campaign.ads.toFixed(2)} TND</td>
            <td>\${campaign.roas.toFixed(2)}</td>
            <td>\${campaign.roi.toFixed(2)}%</td>
            <td><span class=\"reco-badge \${campaign.recommendation.className}\">\${campaign.recommendation.label}</span></td>
        </tr>
    `).join('');
}

function saveCurrentCampaignComparison() {
    const referenceEl = document.getElementById('advanced-campaign-ref');
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');
    const revenueEl = document.getElementById('advanced-revenue');
    const roasEl = document.getElementById('advanced-roas');
    const roiEl = document.getElementById('advanced-roi');

    if (!referenceEl || !periodEl || !spentEl || !adsEl || !revenueEl || !roasEl || !roiEl) {
        return;
    }

    const reference = referenceEl.value.trim();
    if (!reference) {
        alert('Ajoute une référence campagne avant de sauvegarder.');
        return;
    }

    const period = periodEl.value;
    const periodMap = {
        today: \"Aujourd'hui\",
        week: \"Dernière semaine\",
        month: \"Dernier mois\"
    };

    const revenue = parseFloat(revenueEl.textContent) || 0;
    const spent = parseFloat(spentEl.value) || 0;
    const ads = parseFloat(adsEl.value) || 0;
    const roas = parseFloat(roasEl.textContent) || 0;
    const roi = parseFloat(roiEl.textContent) || 0;

    const recommendation = getAdvancedRecommendation(roas, roi);

    const campaigns = getSavedCampaignComparisons();

    campaigns.unshift({
        reference,
        period,
        periodLabel: periodMap[period] || period,
        revenue,
        spent,
        ads,
        roas,
        roi,
        recommendation
    });

    saveCampaignComparisons(campaigns);
    renderCampaignComparisons();
}

document.addEventListener('DOMContentLoaded', function () {
    const counter = document.getElementById('online-visitors-count');
    const advancedModalEl = document.getElementById('advancedStatsModal');
    const calculateBtn = document.getElementById('calculateAdvancedStatsBtn');
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');
    const saveBtn = document.getElementById('saveCampaignComparisonBtn');
    const clearBtn = document.getElementById('clearCampaignComparisonsBtn');
    const openScaleHelperBtn = document.getElementById('openScaleHelper');
    const runScaleHelperBtn = document.getElementById('runScaleHelperBtn');

    async function refreshOnlineVisitors() {
        if (!counter) return;

        try {
            const response = await fetch('";
        // line 1598
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_visitors_count");
        yield "');
            if (!response.ok) return;

            const data = await response.json();
            if (typeof data.onlineVisitors !== 'undefined') {
                counter.textContent = data.onlineVisitors;
            }
        } catch (error) {
            console.error('Erreur compteur visiteurs:', error);
        }
    }

    refreshOnlineVisitors();
    setInterval(refreshOnlineVisitors, 15000);

    renderCampaignComparisons();

    if (advancedModalEl) {
        advancedModalEl.addEventListener('shown.bs.modal', function () {
            loadAdvancedStats();
            renderCampaignComparisons();
        });
    }

    if (calculateBtn) calculateBtn.addEventListener('click', loadAdvancedStats);
    if (periodEl) periodEl.addEventListener('change', loadAdvancedStats);
    if (spentEl) spentEl.addEventListener('input', loadAdvancedStats);
    if (adsEl) adsEl.addEventListener('input', loadAdvancedStats);
    if (saveBtn) saveBtn.addEventListener('click', saveCurrentCampaignComparison);
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            localStorage.removeItem('campaignComparisons');
            renderCampaignComparisons();
        });
    }
    if (openScaleHelperBtn) {
        openScaleHelperBtn.addEventListener('click', function () {
            const helperBox = document.getElementById('scaleHelperBox');
            if (helperBox) {
                helperBox.style.display = helperBox.style.display === 'none' ? 'block' : 'none';
            }
        });
    }
    if (runScaleHelperBtn) runScaleHelperBtn.addEventListener('click', runScaleHelper);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const normalTbody = document.getElementById('normal-orders-tbody');
    const abandonedTbody = document.getElementById('abandoned-orders-tbody');
    const abandonedCount = document.getElementById('abandoned-count');
    const totalCount = document.getElementById('orders-total-count');

    let lastNormalCount = parseInt(totalCount?.textContent || '0', 10);
    let lastAbandonedCount = parseInt(abandonedCount?.textContent || '0', 10);
    let audioUnlocked = false;

    const orderAudio = new Audio('/sounds/order.mp3');
    orderAudio.preload = 'auto';
    orderAudio.volume = 0.7;

    function unlockAudio() {
        audioUnlocked = true;

        orderAudio.play()
            .then(() => {
                orderAudio.pause();
                orderAudio.currentTime = 0;
            })
            .catch(() => {});

        document.removeEventListener('click', unlockAudio);
        document.removeEventListener('keydown', unlockAudio);
    }

    document.addEventListener('click', unlockAudio);
    document.addEventListener('keydown', unlockAudio);

    function playOrderSound() {
        if (!audioUnlocked) return;

        try {
            orderAudio.pause();
            orderAudio.currentTime = 0;
            orderAudio.play().catch(() => {});
        } catch (e) {
            console.error('Sound error:', e);
        }
    }

    function showOrderToast(order) {
        let toast = document.getElementById('shopify-order-toast');

        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'shopify-order-toast';
            toast.style.position = 'fixed';
            toast.style.left = '20px';
            toast.style.bottom = '20px';
            toast.style.zIndex = '99999';
            toast.style.width = '360px';
            toast.style.maxWidth = 'calc(100vw - 30px)';
            toast.style.background = '#ffffff';
            toast.style.borderRadius = '18px';
            toast.style.boxShadow = '0 18px 40px rgba(0,0,0,0.20)';
            toast.style.border = '1px solid #ead9d2';
            toast.style.overflow = 'hidden';
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            toast.style.transition = 'all 0.35s ease';
            document.body.appendChild(toast);
        }

        const imageHtml = order && order.photo
            ? `<img src=\"\${order.photo}\" alt=\"\${order.productName}\" style=\"width:72px;height:72px;object-fit:cover;border-radius:14px;border:1px solid #eee;\">`
            : `<div style=\"width:72px;height:72px;border-radius:14px;background:#f6f1ed;display:flex;align-items:center;justify-content:center;font-size:28px;\">📦</div>`;

        const customerName = order?.customerName || 'Client';
        const productName = order?.productName || 'Produit';
        const price = order?.price || '-';
        const phone = order?.phone || '';

        toast.innerHTML = `
            <div style=\"display:flex;gap:14px;align-items:center;padding:14px;\">
                <div>\${imageHtml}</div>

                <div style=\"flex:1;min-width:0;\">
                    <div style=\"font-size:12px;font-weight:800;color:#8B0000;text-transform:uppercase;letter-spacing:0.4px;margin-bottom:4px;\">
                        Nouvelle commande
                    </div>

                    <div style=\"font-size:15px;font-weight:800;color:#2c1a1d;line-height:1.25;margin-bottom:4px;\">
                        \${customerName}
                    </div>

                    \${phone ? `<div style=\"font-size:13px;color:#6b5b55;margin-bottom:4px;\">\${phone}</div>` : ''}

                    <div style=\"font-size:14px;color:#5f4b45;line-height:1.3;margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;\">
                        \${productName}
                    </div>

                    <div style=\"font-size:14px;font-weight:700;color:#111;\">
                        \${price}
                    </div>
                </div>

                <button type=\"button\" onclick=\"this.closest('#shopify-order-toast').style.opacity='0';this.closest('#shopify-order-toast').style.transform='translateY(20px)';\" style=\"border:none;background:transparent;font-size:18px;color:#999;cursor:pointer;padding:0 4px;\">
                    ×
                </button>
            </div>
        `;

        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';

        setTimeout(() => {
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
            }
        }, 5000);
    }

    function showLeadToast() {
        let toast = document.getElementById('shopify-lead-toast');

        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'shopify-lead-toast';
            toast.style.position = 'fixed';
            toast.style.left = '20px';
            toast.style.bottom = '20px';
            toast.style.zIndex = '99998';
            toast.style.width = '320px';
            toast.style.maxWidth = 'calc(100vw - 30px)';
            toast.style.background = '#fff7e6';
            toast.style.borderRadius = '18px';
            toast.style.boxShadow = '0 18px 40px rgba(0,0,0,0.18)';
            toast.style.border = '1px solid #f1d39b';
            toast.style.overflow = 'hidden';
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            toast.style.transition = 'all 0.35s ease';
            document.body.appendChild(toast);
        }

        toast.innerHTML = `
            <div style=\"display:flex;gap:12px;align-items:center;padding:14px;\">
                <div style=\"width:54px;height:54px;border-radius:14px;background:#fff1bf;display:flex;align-items:center;justify-content:center;font-size:24px;\">
                    📞
                </div>
                <div style=\"flex:1;\">
                    <div style=\"font-size:12px;font-weight:800;color:#946200;text-transform:uppercase;margin-bottom:4px;\">
                        Lead abandonné
                    </div>
                    <div style=\"font-size:14px;font-weight:700;color:#3d2d00;\">
                        Nouveau lead enregistré
                    </div>
                </div>
            </div>
        `;

        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';

        setTimeout(() => {
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
            }
        }, 4000);
    }

    async function refreshOrdersLive() {
        try {
            const params = new URLSearchParams(window.location.search);
            const response = await fetch(`";
        // line 1815
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_live_data");
        yield "?\${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) return;

            const data = await response.json();

            if (normalTbody && typeof data.normalRows !== 'undefined') {
                normalTbody.innerHTML = data.normalRows;
            }

            if (abandonedTbody && typeof data.abandonedRows !== 'undefined') {
                abandonedTbody.innerHTML = data.abandonedRows;
            }

            if (abandonedCount && typeof data.abandonedCount !== 'undefined') {
                abandonedCount.textContent = data.abandonedCount;
            }

            if (totalCount && typeof data.normalCount !== 'undefined') {
                totalCount.textContent = data.normalCount;
            }

            if (typeof data.normalCount !== 'undefined' && data.normalCount > lastNormalCount) {
                playOrderSound();
                showOrderToast(data.latestOrder || null);
            }

            if (typeof data.abandonedCount !== 'undefined' && data.abandonedCount > lastAbandonedCount) {
                playOrderSound();
                showLeadToast();
            }

            lastNormalCount = parseInt(data.normalCount ?? lastNormalCount, 10);
            lastAbandonedCount = parseInt(data.abandonedCount ?? lastAbandonedCount, 10);
        } catch (error) {
            console.error('Live refresh error:', error);
        }
    }

    setInterval(refreshOrdersLive, 7000);
});
</script>
<div class=\"modal fade\" id=\"importTxtModal\" tabindex=\"-1\" aria-labelledby=\"importTxtModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header advanced-modal-header\">
                <h5 class=\"modal-title\" id=\"importTxtModalLabel\">
                    <i class=\"fas fa-file-import\"></i> Importer des commandes TXT
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>

            <form method=\"post\" action=\"";
        // line 1871
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_import_txt");
        yield "\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"alert alert-info\">
                        <strong>Format obligatoire du fichier TXT :</strong><br><br>
                        <code>customer_name|phone|location|product_id|status</code><br><br>
                        <strong>Exemple :</strong><br>
                        <code>Ali Ben Salah|22123456|Tunis|5|en_attente</code><br>
                        <code>Sarra Trabelsi|55111222|Sfax|3|acceptee</code>
                    </div>

                    <div class=\"alert alert-warning\">
                        <strong>Statuts autorisés :</strong>
                        <code>en_attente</code>,
                        <code>acceptee</code>,
                        <code>refusee</code>,
                        <code>annulee</code>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label fw-bold\">Fichier TXT</label>
                        <input type=\"file\" name=\"txt_file\" class=\"form-control\" accept=\".txt\" required>
                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-calculator\">
                        <i class=\"fas fa-upload\"></i> Importer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id=\"commandePanelOverlay\" class=\"commande-panel-overlay\" onclick=\"closeCommandeEditPanel()\"></div>

<div id=\"commandePanel\" class=\"commande-panel\">
    <div class=\"commande-panel-header\">
        <h3 class=\"commande-panel-title\">Modifier commande</h3>
        <button type=\"button\" class=\"commande-panel-close\" onclick=\"closeCommandeEditPanel()\">✕</button>
    </div>

    <div class=\"commande-panel-body\">
        <div id=\"commandePanelAlert\" class=\"alert commande-panel-alert\"></div>

        <form id=\"commandeEditForm\">
            <input type=\"hidden\" id=\"commandeEditId\" name=\"id\">

            <div class=\"commande-section\">
                <div class=\"commande-section-head\">Commande</div>
                <div class=\"commande-section-content\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label>Statut</label>
                            <select id=\"commandeStatus\" name=\"status_commande\" class=\"form-select\">
                                <option value=\"en_attente\">En attente</option>
                                <option value=\"acceptee\">Acceptée</option>
                                <option value=\"refusee\">Refusée</option>
                                <option value=\"annulee\">Annulée</option>
                            </select>
                        </div>

                        <div class=\"col-md-6\">
                            <label>Date</label>
                            <input type=\"text\" id=\"commandeCreatedAt\" class=\"form-control\" readonly>
                        </div>

                        <div class=\"col-md-6\">
                            <label>Produit principal</label>
                            <input type=\"number\" id=\"commandeProductId\" name=\"productId\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-6\">
                            <label>Quantité</label>
                            <input type=\"number\" min=\"1\" id=\"commandeQuantite\" name=\"quantite\" class=\"form-control\" value=\"1\">
                        </div>

                        <div class=\"col-md-12\">
                            <label>Total</label>
                            <input type=\"text\" id=\"commandeTotal\" class=\"form-control\" readonly>
                        </div>

                        <div class=\"col-md-12\">
                            <label>Articles</label>
                            <div id=\"commandeItemsList\" class=\"commande-items-list\"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"commande-section\">
                <div class=\"commande-section-head\">Client</div>
                <div class=\"commande-section-content\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label>Nom</label>
                            <input type=\"text\" id=\"commandeCustomerName\" name=\"customerName\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-6\">
                            <label>Téléphone</label>
                            <input type=\"text\" id=\"commandePhone\" name=\"phone\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-12\">
                            <label>Adresse</label>
                            <input type=\"text\" id=\"commandeLocation\" name=\"location\" class=\"form-control\">
                        </div>
                    </div>
                </div>
            </div>

            <button type=\"submit\" class=\"save-commande-btn\">
                <i class=\"fas fa-save\"></i> Enregistrer
            </button>
        </form>
    </div>
</div>
<div id=\"firstDeliveryOverlay\" class=\"commande-panel-overlay\" onclick=\"closeFirstDeliveryModal()\"></div>

<div id=\"firstDeliveryModal\" class=\"first-delivery-modal\">
    <div class=\"commande-panel-header\">
        <h3 class=\"commande-panel-title\">Envoyer à First Delivery</h3>
        <button type=\"button\" class=\"commande-panel-close\" onclick=\"closeFirstDeliveryModal()\">✕</button>
    </div>

    <div class=\"commande-panel-body\">
        <div id=\"firstDeliveryModalAlert\" class=\"alert commande-panel-alert\"></div>

        <input type=\"hidden\" id=\"firstDeliveryCommandeId\">

        <div class=\"commande-section\">
            <div class=\"commande-section-head\">Confirmation</div>
            <div class=\"commande-section-content\">
                <p style=\"margin-bottom: 10px; color:#5C4033; font-weight:800; font-size:16px;\">
    Envoyer cette commande à First Delivery ?
</p>

<p style=\"margin-bottom: 18px; color:#7a5a4a; font-weight:600; line-height:1.6;\">
    Clique sur <strong>Accepter</strong> pour envoyer la commande, ou sur <strong>Annuler</strong> pour fermer cette fenêtre.
</p>

                <div class=\"d-flex gap-2 flex-wrap\">
    <button type=\"button\"
            id=\"firstDeliveryConfirmBtn\"
            class=\"fdg-confirm-btn\"
            onclick=\"confirmSendToFirstDelivery()\">
        <i class=\"fas fa-check\"></i> Accepter
    </button>

    <button type=\"button\"
            class=\"fdg-cancel-btn\"
            onclick=\"closeFirstDeliveryModal()\">
        <i class=\"fas fa-times\"></i> Annuler
    </button>
</div>
            </div>
        </div>
    </div>
</div>
<script>
function openCommandeEditPanel(id) {
    fetch(`/admin/commandes/\${id}/edit-data`)
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert(data.message || 'Erreur');
                return;
            }

            const c = data.commande;

            document.getElementById('commandeEditId').value = c.id;
            document.getElementById('commandeCustomerName').value = c.customerName || '';
            document.getElementById('commandePhone').value = c.phone || '';
            document.getElementById('commandeLocation').value = c.location || '';
            document.getElementById('commandeStatus').value = c.status || 'en_attente';
            document.getElementById('commandeProductId').value = c.productId || '';
            document.getElementById('commandeCreatedAt').value = c.createdAt || '';
            document.getElementById('commandeTotal').value = c.total || '';
            document.getElementById('commandeQuantite').value = c.quantity || 1;

            const itemsList = document.getElementById('commandeItemsList');

            if (c.items && c.items.length) {
                itemsList.innerHTML = c.items.map(item => `
                    <div class=\"commande-item-box\">
                        \${item.photo ? `<img src=\"\${item.photo}\" alt=\"\${item.nom}\">` : `<div class=\"commande-item-fallback\">📦</div>`}
                        <div>
                            <div><strong>\${item.nom}</strong></div>
                            <div>\${item.quantite} × \${Number(item.prix).toFixed(2)} TND</div>
                            <small>\${Number(item.sous_total).toFixed(2)} TND</small>
                        </div>
                    </div>
                `).join('');
            } else {
                itemsList.innerHTML = '<div class=\"commande-item-box\"><div class=\"commande-item-fallback\">📦</div><div>Commande simple</div></div>';
            }

            document.getElementById('commandePanel').classList.add('open');
            document.getElementById('commandePanelOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        });
}

function closeCommandeEditPanel() {
    document.getElementById('commandePanel').classList.remove('open');
    document.getElementById('commandePanelOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

document.getElementById('commandeEditForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const id = document.getElementById('commandeEditId').value;
    const formData = new FormData(this);
    const alertBox = document.getElementById('commandePanelAlert');

    alertBox.style.display = 'none';
    alertBox.className = 'alert commande-panel-alert';

    try {
        const response = await fetch(`/admin/commandes/\${id}/update-ajax`, {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            alertBox.style.display = 'block';
            alertBox.classList.add('alert-danger');
            alertBox.textContent = data.message || 'Erreur.';
            return;
        }

        alertBox.style.display = 'block';
        alertBox.classList.add('alert-success');
        alertBox.textContent = data.message || 'Commande mise à jour.';

        setTimeout(() => {
            window.location.reload();
        }, 700);
    } catch (error) {
        alertBox.style.display = 'block';
        alertBox.classList.add('alert-danger');
        alertBox.textContent = 'Erreur réseau ou serveur.';
    }
});

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeCommandeEditPanel();
    }
});
function openFirstDeliveryModal(id) {
    document.getElementById('firstDeliveryCommandeId').value = id;
    document.getElementById('firstDeliveryModal').classList.add('open');
    document.getElementById('firstDeliveryOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeFirstDeliveryModal() {
    document.getElementById('firstDeliveryModal').classList.remove('open');
    document.getElementById('firstDeliveryOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

async function confirmSendToFirstDelivery() {
    const id = document.getElementById('firstDeliveryCommandeId').value;
    const confirmBtn = document.getElementById('firstDeliveryConfirmBtn');
    const alertBox = document.getElementById('firstDeliveryModalAlert');

    alertBox.style.display = 'none';
    alertBox.className = 'alert commande-panel-alert';

    confirmBtn.disabled = true;
    confirmBtn.innerHTML = '<i class=\"fas fa-spinner fa-spin\"></i> Envoi en cours...';

    try {
        const response = await fetch(`/admin/livraisons/send-first-delivery/\${id}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            alertBox.style.display = 'block';
            alertBox.classList.add('alert-danger');
            alertBox.textContent = data.message || 'Erreur envoi.';
            confirmBtn.disabled = false;
            confirmBtn.innerHTML = 'Confirmer l’envoi';
            return;
        }

        // change status in table after successful send
        const statusEl = document.getElementById(`fdg-status-\${id}`);
        if (statusEl) {
            statusEl.className = 'status-pill status-acceptee';
            statusEl.textContent = 'Accepted';
        }

        alertBox.style.display = 'block';
        alertBox.classList.add('alert-success');
        alertBox.textContent = data.message || 'Commande envoyée à First Delivery avec succès.';

        setTimeout(() => {
            closeFirstDeliveryModal();
        }, 900);

    } catch (error) {
        alertBox.style.display = 'block';
        alertBox.classList.add('alert-danger');
        alertBox.textContent = 'Erreur réseau ou serveur.';
        confirmBtn.disabled = false;
        confirmBtn.innerHTML = 'Confirmer l’envoi';
    }
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
        return "admin_commandes/index.html.twig";
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
        return array (  2338 => 1871,  2279 => 1815,  2059 => 1598,  1913 => 1455,  1584 => 1128,  1575 => 1124,  1573 => 1123,  1560 => 1115,  1551 => 1109,  1541 => 1102,  1537 => 1101,  1533 => 1100,  1529 => 1098,  1525 => 1096,  1519 => 1093,  1514 => 1092,  1512 => 1091,  1506 => 1088,  1502 => 1086,  1493 => 1079,  1486 => 1075,  1480 => 1071,  1478 => 1070,  1471 => 1066,  1468 => 1065,  1464 => 1063,  1456 => 1061,  1454 => 1060,  1451 => 1059,  1449 => 1058,  1443 => 1055,  1440 => 1054,  1435 => 1053,  1410 => 1031,  1399 => 1022,  1390 => 1018,  1388 => 1017,  1375 => 1009,  1371 => 1008,  1367 => 1007,  1363 => 1006,  1355 => 1001,  1348 => 996,  1339 => 990,  1335 => 989,  1331 => 988,  1327 => 987,  1318 => 981,  1314 => 980,  1310 => 979,  1305 => 978,  1303 => 977,  1297 => 974,  1287 => 967,  1281 => 963,  1277 => 961,  1275 => 960,  1272 => 959,  1270 => 958,  1267 => 957,  1265 => 956,  1262 => 955,  1260 => 954,  1256 => 953,  1252 => 952,  1246 => 949,  1242 => 948,  1238 => 947,  1234 => 945,  1227 => 941,  1223 => 940,  1220 => 939,  1216 => 937,  1208 => 935,  1206 => 934,  1203 => 933,  1196 => 929,  1192 => 927,  1188 => 925,  1180 => 923,  1177 => 922,  1175 => 921,  1172 => 920,  1170 => 919,  1164 => 916,  1161 => 915,  1156 => 914,  1137 => 897,  1128 => 895,  1123 => 894,  1114 => 892,  1109 => 891,  1100 => 889,  1096 => 888,  1085 => 880,  1075 => 875,  1069 => 874,  1063 => 873,  1057 => 872,  1046 => 866,  1040 => 865,  1034 => 864,  1028 => 863,  1019 => 857,  1004 => 845,  998 => 842,  988 => 835,  982 => 832,  972 => 825,  964 => 820,  956 => 815,  948 => 810,  940 => 805,  932 => 800,  924 => 794,  918 => 792,  916 => 791,  912 => 790,  909 => 789,  903 => 787,  901 => 786,  897 => 785,  888 => 779,  881 => 775,  864 => 761,  849 => 749,  842 => 744,  840 => 743,  838 => 742,  828 => 741,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des commandes{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
.first-delivery-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    width: min(520px, calc(100vw - 30px));
    max-height: 85vh;
    overflow-y: auto;
    transform: translate(-50%, -50%) scale(0.96);
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 22px;
    box-shadow: 0 24px 60px rgba(0,0,0,0.28);
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.25s ease;
}

.first-delivery-modal.open {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}

.fdg-confirm-btn,
.fdg-cancel-btn {
    min-height: 52px;
    border: none;
    border-radius: 14px;
    font-size: 17px;
    font-weight: 900;
    flex: 1 1 0;
}

.fdg-confirm-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
}

.fdg-confirm-btn:hover {
    transform: translateY(-1px);
}

.fdg-cancel-btn {
    background: #f3dfd7;
    color: #8B0000;
    border: 1px solid #e3cfc7;
}

.fdg-cancel-btn:hover {
    background: #ead2c7;
}
.fdg-btn {
    background: linear-gradient(135deg, #8B0000, #B22222);
    color: white;
    border: none;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.25);
}
.fdg-confirm-btn,
.fdg-cancel-btn {
    min-height: 52px;
    border: none;
    border-radius: 14px;
    font-size: 17px;
    font-weight: 900;
    flex: 1 1 0;
}

.fdg-confirm-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
}

.fdg-confirm-btn:hover {
    transform: translateY(-1px);
}

.fdg-cancel-btn {
    background: #f3dfd7;
    color: #8B0000;
    border: 1px solid #e3cfc7;
}

.fdg-cancel-btn:hover {
    background: #ead2c7;
}

.fdg-btn:hover {
    background: linear-gradient(135deg, #a00000, #d12f2f);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.35);
}
.reco-badge {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
}

.reco-kill {
    background: #ffe0e0;
    color: #b42318;
}

.reco-test {
    background: #fff2cc;
    color: #946200;
}

.reco-scale {
    background: #dcfce7;
    color: #15803d;
}

.scale-helper-link {
    display: inline-block;
    margin-top: 10px;
    font-size: 13px;
    font-weight: 700;
    color: #8B0000;
    cursor: pointer;
    text-decoration: underline;
}

.scale-helper-link:hover {
    color: #6e0000;
}

.scale-helper-box {
    margin-top: 18px;
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 16px;
    padding: 16px;
}

.scale-helper-title {
    font-size: 15px;
    font-weight: 800;
    color: #8B0000;
    margin-bottom: 12px;
}

.scale-helper-result {
    margin-top: 14px;
    padding: 14px;
    border-radius: 14px;
    font-weight: 700;
    line-height: 1.6;
}

.scale-result-good {
    background: #dcfce7;
    color: #166534;
}

.scale-result-warn {
    background: #fff7cc;
    color: #8a6d00;
}

.scale-result-stop {
    background: #ffe0e0;
    color: #b42318;
}

.orders-shell {
    color: #2c1a1d;
}

.top-actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    gap: 12px;
    flex-wrap: wrap;
}

.top-actions-bar h3 {
    margin: 0;
    font-weight: 800;
    color: #7b1e2b;
}

.top-actions-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.performance-card {
    background: linear-gradient(135deg, #7b1e2b 0%, #a83232 100%);
    border-radius: 20px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
}

.performance-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.performance-title {
    font-size: 24px;
    font-weight: 800;
    color: #fff5eb;
}

.performance-legend {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    font-size: 14px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #f4ddd0;
}

.legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
}

.legend-dot-confirmed {
    background: #57d37c;
}

.legend-dot-rejected {
    background: #ff6c6c;
}

.performance-bar {
    width: 100%;
    height: 56px;
    background: #ead7d2;
    border-radius: 999px;
    overflow: hidden;
    display: flex;
    margin-bottom: 18px;
}

.performance-bar-confirmed {
    background: linear-gradient(90deg, #6f9f36 0%, #87b946 100%);
    display: flex;
    align-items: center;
    padding-left: 12px;
    min-width: 0;
}

.performance-bar-rejected {
    background: #ead7d2;
    display: flex;
    align-items: center;
    padding-left: 12px;
    min-width: 0;
}

.bar-pill {
    background: #fff7f2;
    border-radius: 999px;
    padding: 8px 16px;
    font-size: 15px;
    font-weight: 800;
    white-space: nowrap;
}

.bar-pill.confirmed {
    color: #5e8a24;
}

.bar-pill.rejected {
    color: #d84c4c;
}

.mini-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
}

.mini-stat {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 14px;
    padding: 12px;
    text-align: center;
}

.mini-stat-label {
    display: block;
    font-size: 13px;
    color: #f2d7ca;
    margin-bottom: 4px;
}

.mini-stat-value {
    font-size: 22px;
    font-weight: 800;
    color: white;
}

.online-visitors-value {
    color: #8B0000 !important;
}

.mini-stat-note {
    display: block;
    margin-top: 6px;
    font-size: 12px;
    color: #888;
}

.device-stats {
    margin-top: 12px;
    padding-top: 10px;
    border-top: 1px solid rgba(0,0,0,0.08);
    text-align: left;
}

.device-block {
    margin-top: 10px;
}

.device-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    margin-bottom: 6px;
    color: #5C4033;
}

.device-top strong {
    color: #8B0000;
    font-weight: 800;
}

.device-track {
    width: 100%;
    height: 10px;
    background: rgba(92, 64, 51, 0.12);
    border-radius: 999px;
    overflow: hidden;
}

.device-fill {
    height: 100%;
    border-radius: 999px;
    min-width: 0;
}

.device-fill-pc {
    background: linear-gradient(90deg, #57d37c 0%, #87d68d 100%);
}

.device-fill-mobile {
    background: linear-gradient(90deg, #ff7b7b 0%, #ff9a9a 100%);
}

.toolbar-card {
    background: #fff7f0;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 16px;
    margin-bottom: 18px;
}

.form-control,
.form-select {
    background: #ffffff;
    border: 1px solid #e3cfc7;
    color: #2c1a1d;
}

.toolbar-card .form-control::placeholder {
    color: #a9a0b3;
}

.toolbar-card .btn-reset {
    height: 46px;
    border-radius: 12px;
    background: #6d7683;
    color: white;
    border: none;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}
.commande-panel-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: 0.25s ease;
}

.commande-panel-overlay.open {
    opacity: 1;
    visibility: visible;
}

.commande-panel {
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

.commande-panel.open {
    right: 0;
}

.commande-panel-header {
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

.commande-panel-title {
    font-size: 28px;
    font-weight: 900;
    margin: 0;
}

.commande-panel-close {
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

.commande-panel-body {
    padding: 24px;
}

.commande-section {
    background: #fff;
    border: 1px solid #ead9d2;
    border-radius: 18px;
    margin-bottom: 20px;
    overflow: hidden;
}

.commande-section-head {
    padding: 16px 20px;
    border-bottom: 1px solid #f0dfd8;
    font-size: 22px;
    font-weight: 800;
    color: #5C4033;
}

.commande-section-content {
    padding: 20px;
}

.commande-panel label {
    display: block;
    font-weight: 800;
    color: #5C4033;
    margin-bottom: 8px;
}

.commande-panel .form-control,
.commande-panel .form-select {
    border-radius: 14px;
    border: 1px solid #e3cfc7;
    background: #fff;
    color: #2c1a1d;
    min-height: 48px;
}

.commande-panel .form-control::placeholder {
    color: #9a7f75;
}

.commande-items-list {
    display: grid;
    gap: 12px;
}

.commande-item-box {
    display: flex;
    align-items: center;
    gap: 12px;
    border: 1px solid #ead9d2;
    border-radius: 14px;
    background: #fff7f2;
    padding: 12px;
}

.commande-item-box img {
    width: 52px;
    height: 52px;
    object-fit: cover;
    border-radius: 10px;
}

.commande-item-fallback {
    width: 52px;
    height: 52px;
    border-radius: 10px;
    background: #f0dfd8;
    display: flex;
    align-items: center;
    justify-content: center;
}

.save-commande-btn {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: #fff;
    border: none;
    width: 100%;
    min-height: 52px;
    border-radius: 14px;
    font-size: 18px;
    font-weight: 900;
}

.commande-panel-alert {
    display: none;
    margin-bottom: 16px;
    border-radius: 14px;
}

.table-card {
    background: #110015;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    overflow: hidden;
    margin-bottom: 24px;
}

.orders-table {
    width: 100%;
    margin-bottom: 0;
    color: #fff;
}

.orders-table thead th {
    background: #7b1e2b;
    color: white;
}

.orders-table tbody tr:hover {
    background: rgba(255,255,255,0.02);
}

.orders-table td {
    padding: 14px;
    vertical-align: middle;
    white-space: nowrap;
}

.product-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 160px;
}

.product-thumb {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    object-fit: cover;
    background: #24102d;
    border: 1px solid rgba(255,255,255,0.08);
}

.product-fallback {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #24102d;
    color: #ddd;
    font-size: 14px;
}

.btn-calculator {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 10px 16px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.15);
}

.btn-calculator:hover {
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.22);
}

.status-pill {
    display: inline-flex;
    align-items: center;
    padding: 7px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.status-en_attente {
    background: #ffe6a7;
    color: #8a6d00;
}

.status-acceptee {
    background: #d4f4dd;
    color: #1c7c3c;
}

.status-refusee {
    background: #ffd6d6;
    color: #a11c1c;
}

.status-annulee {
    background: #eee;
    color: #666;
}

.actions-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.icon-btn {
    background: #ffffff;
    border: 1px solid #e3cfc7;
    color: #7b1e2b;
    border-radius: 10px;
    padding: 8px 11px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.icon-btn:hover {
    background: #7b1e2b;
    color: white;
}

.inline-form {
    display: inline-block;
    margin: 0;
}

.flash-dark {
    border-radius: 14px;
    border: none;
}

.advanced-stat-value {
    font-size: 28px;
    font-weight: 900;
    color: #8B0000;
}

.advanced-stat-label {
    font-size: 13px;
    color: #6b4a4a;
    font-weight: 700;
    margin-bottom: 6px;
    display: block;
}

.advanced-stat-card {
    background: #fff7f2;
    border: 1px solid #ead9d2;
    border-radius: 16px;
    padding: 16px;
    text-align: center;
    height: 100%;
}

.advanced-modal-header {
    background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    color: white;
}

.advanced-modal-header .btn-close {
    filter: brightness(0) invert(1);
}
</style>
{% endblock %}

{% block admin_content %}
{% set pcPercentage = deviceStats.pc_percentage|default(0) %}
{% set mobilePercentage = deviceStats.mobile_percentage|default(0) %}

<div class=\"top-actions-bar\">
    <h3>🛒 Gestion des commandes</h3>

    <div class=\"top-actions-buttons\">
        <a href=\"{{ path('app_admin_commandes_calculator') }}\" class=\"btn btn-calculator\">
            <i class=\"fas fa-calculator\"></i> Calculator
        </a>

        <button type=\"button\" class=\"btn btn-calculator\" data-bs-toggle=\"modal\" data-bs-target=\"#advancedStatsModal\">
            <i class=\"fas fa-chart-line\"></i> Stat avancée
        </button>
        <button type=\"button\" class=\"btn btn-calculator\" data-bs-toggle=\"modal\" data-bs-target=\"#importTxtModal\">
    <i class=\"fas fa-file-import\"></i> Import TXT
</button>


        <a href=\"{{ path('app_admin_commandes_export_lookalike') }}\" class=\"btn btn-calculator\">
            <i class=\"fas fa-file-excel\"></i> Create Lookalike
        </a>
    </div>
</div>

<div class=\"orders-shell\">
    <div class=\"performance-card\">
        <div class=\"performance-header\">
            <div class=\"performance-title\">📊 Performance des commandes</div>

            <div class=\"performance-legend\">
                <span class=\"legend-item\">
                    <span class=\"legend-dot legend-dot-confirmed\"></span>
                    Confirmées <strong>{{ stats.pourcentage_acceptee }}%</strong>
                </span>
                <span class=\"legend-item\">
                    <span class=\"legend-dot legend-dot-rejected\"></span>
                    Refusées <strong>{{ stats.pourcentage_refusee }}%</strong>
                </span>
            </div>
        </div>

        <div class=\"performance-bar\">
            <div class=\"performance-bar-confirmed\" style=\"width: {{ stats.pourcentage_acceptee }}%;\">
                {% if stats.pourcentage_acceptee > 0 %}
                    <span class=\"bar-pill confirmed\">✅ {{ stats.pourcentage_acceptee }}%</span>
                {% endif %}
            </div>
            <div class=\"performance-bar-rejected\" style=\"width: {{ stats.pourcentage_refusee }}%;\">
                {% if stats.pourcentage_refusee > 0 %}
                    <span class=\"bar-pill rejected\">❌ {{ stats.pourcentage_refusee }}%</span>
                {% endif %}
            </div>
        </div>

        <div class=\"mini-stats\">
            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Total</span>
                <span class=\"mini-stat-value\" id=\"orders-total-count\">{{ stats.total }}</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">En attente</span>
                <span class=\"mini-stat-value\">{{ stats.en_attente }}</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Acceptées</span>
                <span class=\"mini-stat-value\">{{ stats.acceptee }}</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Refusées</span>
                <span class=\"mini-stat-value\">{{ stats.refusee }}</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Annulées</span>
                <span class=\"mini-stat-value\">{{ stats.annulee }}</span>
            </div>

            <div class=\"mini-stat\">
                <span class=\"mini-stat-label\">Visiteurs en ligne</span>
                <span class=\"mini-stat-value online-visitors-value\" id=\"online-visitors-count\">{{ onlineVisitors }}</span>
                <small class=\"mini-stat-note\">Actifs durant les 5 dernières minutes</small>

                <div class=\"device-stats\">
                    <div class=\"device-block\">
                        <div class=\"device-top\">
                            <span>💻 PC</span>
                            <strong>{{ pcPercentage }}%</strong>
                        </div>
                        <div class=\"device-track\">
                            <div class=\"device-fill device-fill-pc\" style=\"width: {{ pcPercentage }}%;\"></div>
                        </div>
                    </div>

                    <div class=\"device-block\">
                        <div class=\"device-top\">
                            <span>📱 Mobile</span>
                            <strong>{{ mobilePercentage }}%</strong>
                        </div>
                        <div class=\"device-track\">
                            <div class=\"device-fill device-fill-mobile\" style=\"width: {{ mobilePercentage }}%;\"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"toolbar-card\">
        <form method=\"get\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Search client, téléphone, produit...\" value=\"{{ search }}\">
                </div>

                <div class=\"col-md-3\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">Tous les statuts</option>
                        <option value=\"en_attente\" {% if status == 'en_attente' %}selected{% endif %}>Pending</option>
                        <option value=\"acceptee\" {% if status == 'acceptee' %}selected{% endif %}>Accepted</option>
                        <option value=\"refusee\" {% if status == 'refusee' %}selected{% endif %}>Rejected</option>
                        <option value=\"annulee\" {% if status == 'annulee' %}selected{% endif %}>Cancelled</option>
                    </select>
                </div>

                <div class=\"col-md-2\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"date_desc\" {% if sort == 'date_desc' %}selected{% endif %}>Plus récentes</option>
                        <option value=\"date_asc\" {% if sort == 'date_asc' %}selected{% endif %}>Plus anciennes</option>
                        <option value=\"client_asc\" {% if sort == 'client_asc' %}selected{% endif %}>Client A→Z</option>
                        <option value=\"client_desc\" {% if sort == 'client_desc' %}selected{% endif %}>Client Z→A</option>
                    </select>
                </div>

                <div class=\"col-md-2\">
                    <a href=\"{{ path('app_admin_commandes_index') }}\" class=\"btn-reset w-100\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser
                    </a>
                </div>
            </div>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success flash-dark\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('info') %}
        <div class=\"alert alert-info flash-dark\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger flash-dark\">{{ message }}</div>
    {% endfor %}

    <div class=\"table-card\">
        <div class=\"table-responsive\">
            <table class=\"table orders-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produits</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Delivery</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th style=\"min-width: 220px;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"normal-orders-tbody\">
                    {% for commande in commandes %}
                        <tr>
                            <td><strong>{{ commande.id }}</strong></td>

                            <td>
    {% if commande.cartSummary.isPanier %}
        <div class=\"product-cell\">
            {% set firstItem = commande.cartSummary.items|first %}
            {% if firstItem and firstItem.photo %}
                <img src=\"{{ firstItem.photo }}\" alt=\"{{ firstItem.nom }}\" class=\"product-thumb\">
            {% else %}
                <span class=\"product-fallback\">🛒</span>
            {% endif %}
            <div>
                <div>Commande panier</div>
                <small class=\"text-secondary\">{{ commande.cartSummary.quantity }} article(s)</small>
            </div>
        </div>
    {% else %}
        <div class=\"product-cell\">
            {% if commande.produit and commande.produit.photo is defined and commande.produit.photo %}
                <img src=\"{{ commande.produit.photo }}\" alt=\"{{ commande.produit.nom }}\" class=\"product-thumb\">
            {% else %}
                <span class=\"product-fallback\">📦</span>
            {% endif %}
            <div>
                <div>{{ commande.produit.nom|default('Produit') }}</div>
                <small class=\"text-secondary\">x{{ commande.cartSummary.quantity }}</small>
            </div>
        </div>
    {% endif %}
</td>

                            <td>{{ commande.customerName }}</td>
                            <td>{{ commande.createdAt|date('d M Y, H:i') }}</td>
                            <td>{{ commande.location }}</td>

                            <td>
    <span id=\"fdg-status-{{ commande.id }}\"
          class=\"status-pill status-{{ commande.status }}\">
                                    {% if commande.status == 'en_attente' %}
                                        Pending
                                    {% elseif commande.status == 'acceptee' %}
                                        Accepted
                                    {% elseif commande.status == 'refusee' %}
                                        Rejected
                                    {% elseif commande.status == 'annulee' %}
                                        Cancelled
                                    {% endif %}
                                </span>
                            </td>

                           <td>
    {{ commande.cartSummary.total|number_format(2, ',', ' ') }} TND
</td>

                            <td>
                                <div class=\"actions-cell\">
                                <button type=\"button\"
    class=\"icon-btn fdg-btn\"
    onclick=\"openFirstDeliveryModal({{ commande.id }})\">
    <i class=\"fas fa-paper-plane\"></i>
</button>
                                    {% if commande.status == 'en_attente' %}
                                        <form action=\"{{ path('app_admin_commandes_accepter', {id: commande.id}) }}\" method=\"post\" class=\"inline-form\">
                                            <input type=\"hidden\" name=\"status\" value=\"{{ status }}\">
                                            <input type=\"hidden\" name=\"search\" value=\"{{ search }}\">
                                            <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\">
                                            <button type=\"submit\" class=\"icon-btn\" title=\"Accepter\">
                                                <i class=\"fas fa-check\"></i>
                                            </button>
                                        </form>

                                        <form action=\"{{ path('app_admin_commandes_refuser', {id: commande.id}) }}\" method=\"post\" class=\"inline-form\">
                                            <input type=\"hidden\" name=\"status\" value=\"{{ status }}\">
                                            <input type=\"hidden\" name=\"search\" value=\"{{ search }}\">
                                            <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\">
                                            <button type=\"submit\" class=\"icon-btn\" title=\"Refuser\">
                                                <i class=\"fas fa-times\"></i>
                                            </button>
                                        </form>
                                    {% endif %}

                                    <button
    type=\"button\"
    class=\"icon-btn\"
    title=\"Modifier\"
    onclick=\"openCommandeEditPanel({{ commande.id }})\"
>
    <i class=\"fas fa-pen\"></i>
</button>

                                    <form action=\"{{ path('app_admin_commandes_delete', {id: commande.id}) }}\" method=\"post\" class=\"inline-form\" onsubmit=\"return confirm('Supprimer cette commande ?');\">
                                        <input type=\"hidden\" name=\"status\" value=\"{{ status }}\">
                                        <input type=\"hidden\" name=\"search\" value=\"{{ search }}\">
                                        <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Supprimer\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"8\" class=\"text-center py-4\">Aucune commande trouvée.</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>

    <div class=\"top-actions-bar\" style=\"margin-top: 30px;\">
        <h3>📞 Commandes abandonnées</h3>
        <div class=\"top-actions-buttons\">
            <span class=\"btn btn-calculator\" style=\"pointer-events:none;\">
                <span id=\"abandoned-count\">{{ abandonedCommandes|length }}</span> lead(s)
            </span>
        </div>
    </div>

    <div class=\"table-card\">
        <div class=\"table-responsive\">
            <table class=\"table orders-table align-middle\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produit / Panier</th>
                        <th>Customer</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Source</th>
                        <th>Dernière activité</th>
                        <th>Statut</th>
                        <th style=\"min-width: 180px;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"abandoned-orders-tbody\">
                    {% for draft in abandonedCommandes %}
                        <tr>
                            <td><strong>#{{ draft.getId() }}</strong></td>

                            <td>
                                {% if draft.produit %}
                                    <div class=\"product-cell\">
                                        {% if draft.produit.photo %}
                                            <img src=\"/uploads/produits/{{ draft.produit.photo }}\" alt=\"{{ draft.produit.nom }}\" class=\"product-thumb\">
                                        {% else %}
                                            <span class=\"product-fallback\">📦</span>
                                        {% endif %}
                                        <div>
                                            <div>{{ draft.produit.nom }}</div>
                                            <small class=\"text-secondary\">Produit direct</small>
                                        </div>
                                    </div>
                                {% elseif draft.getCartData() %}
                                    <div class=\"product-cell\">
                                        <span class=\"product-fallback\">🛒</span>
                                        <div>
                                            <div>Panier abandonné</div>
                                            <small class=\"text-secondary\">{{ draft.getCartData()|length }} article(s)</small>
                                        </div>
                                    </div>
                                {% else %}
                                    <div class=\"product-cell\">
                                        <span class=\"product-fallback\">📦</span>
                                        <div>
                                            <div>Lead sans produit</div>
                                        </div>
                                    </div>
                                {% endif %}
                            </td>

                            <td>{{ draft.getCustomerName() ?: '-' }}</td>

                            <td>
                                {% if draft.getPhone() %}
                                    <a href=\"tel:{{ draft.getPhone() }}\" style=\"color:#000; text-decoration:underline;\">
                                        {{ draft.getPhone() }}
                                    </a>
                                {% else %}
                                    -
                                {% endif %}
                            </td>

                            <td>{{ draft.getLocation() ?: '-' }}</td>
                            <td>{{ draft.getSource() }}</td>
                            <td>{{ draft.getUpdatedAt() ? draft.getUpdatedAt()|date('d M Y, H:i') : '-' }}</td>
                            <td>
                                <span class=\"status-pill status-en_attente\">Abandonnée</span>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <form action=\"{{ path('app_admin_abandoned_commandes_accepter', {id: draft.getId()}) }}\" method=\"post\" class=\"inline-form\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Accepter le lead\">
                                            <i class=\"fas fa-check\"></i>
                                        </button>
                                    </form>

                                    <form action=\"{{ path('app_admin_abandoned_commandes_refuser', {id: draft.getId()}) }}\" method=\"post\" class=\"inline-form\">
                                        <button type=\"submit\" class=\"icon-btn\" title=\"Refuser le lead\">
                                            <i class=\"fas fa-times\"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"9\" class=\"text-center py-4\">Aucune commande abandonnée.</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=\"modal fade\" id=\"advancedStatsModal\" tabindex=\"-1\" aria-labelledby=\"advancedStatsModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header advanced-modal-header\">
                <h5 class=\"modal-title\" id=\"advancedStatsModalLabel\">
                    <i class=\"fas fa-chart-line\"></i> Stat avancée
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>

            <div class=\"modal-body\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Référence campagne</label>
                        <input type=\"text\" id=\"advanced-campaign-ref\" class=\"form-control\" placeholder=\"Ex: Meta CBO 12 May\">
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Période</label>
                        <select id=\"advanced-period\" class=\"form-select\">
                            <option value=\"today\">Aujourd'hui</option>
                            <option value=\"week\">Dernière semaine</option>
                            <option value=\"month\">Dernier mois</option>
                        </select>
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Montant dépensé</label>
                        <input type=\"number\" step=\"0.01\" id=\"advanced-spent\" class=\"form-control\" value=\"0\">
                    </div>

                    <div class=\"col-md-3\">
                        <label class=\"form-label fw-bold\">Dépenses pub</label>
                        <input type=\"number\" step=\"0.01\" id=\"advanced-ads\" class=\"form-control\" value=\"0\">
                    </div>
                </div>

                <div class=\"text-center mb-4 d-flex justify-content-center gap-2 flex-wrap\">
                    <button type=\"button\" class=\"btn btn-calculator\" id=\"calculateAdvancedStatsBtn\">
                        <i class=\"fas fa-bolt\"></i> Calculer
                    </button>

                    <button type=\"button\" class=\"btn btn-calculator\" id=\"saveCampaignComparisonBtn\">
                        <i class=\"fas fa-save\"></i> Sauvegarder campagne
                    </button>
                </div>

                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">Revenue</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-revenue\">0.00</div>
                            <small>TND</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">ROAS</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-roas\">0.00</div>
                            <small>x</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">ROI</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-roi\">0.00</div>
                            <small>%</small>
                        </div>
                    </div>

                    <div class=\"col-md-3\">
                        <div class=\"advanced-stat-card\">
                            <span class=\"advanced-stat-label\">Cmd acceptées</span>
                            <div class=\"advanced-stat-value\" id=\"advanced-count\">0</div>
                            <small>unités</small>
                        </div>
                    </div>
                </div>

                <div class=\"advanced-stat-card mb-4\" style=\"text-align:left;\">
                    <span class=\"advanced-stat-label\">Recommandation</span>
                    <div id=\"campaignRecommendationBox\" style=\"font-weight:700; color:#5c4033;\">
                        Aucune recommandation pour le moment.
                    </div>

                    <div id=\"scaleHelperLinkContainer\" style=\"display:none;\">
                        <span class=\"scale-helper-link\" id=\"openScaleHelper\">
                            Click here to help scale this campaign
                        </span>
                    </div>
                </div>

                <div id=\"scaleHelperBox\" class=\"scale-helper-box\" style=\"display:none;\">
                    <div class=\"scale-helper-title\">Scaling helper</div>

                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label class=\"form-label fw-bold\">Total budget</label>
                            <input type=\"number\" step=\"0.01\" id=\"scale-total-budget\" class=\"form-control\" placeholder=\"Ex: 1000\">
                        </div>

                        <div class=\"col-md-6\">
                            <label class=\"form-label fw-bold\">Daily ad spend</label>
                            <input type=\"number\" step=\"0.01\" id=\"scale-daily-spend\" class=\"form-control\" placeholder=\"Ex: 50\">
                        </div>
                    </div>

                    <div class=\"mt-3\">
                        <button type=\"button\" class=\"btn btn-calculator\" id=\"runScaleHelperBtn\">
                            <i class=\"fas fa-rocket\"></i> Check scaling
                        </button>
                    </div>

                    <div id=\"scaleHelperResult\" class=\"scale-helper-result scale-result-warn\" style=\"display:none;\"></div>
                </div>

                <div class=\"advanced-stat-card\" style=\"text-align:left;\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2\">
                        <span class=\"advanced-stat-label mb-0\">Comparaison campagnes</span>
                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" id=\"clearCampaignComparisonsBtn\">
                            <i class=\"fas fa-trash\"></i> Effacer tout
                        </button>
                    </div>

                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered align-middle mb-0\" style=\"background:white;\">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Période</th>
                                    <th>Revenue</th>
                                    <th>Spent</th>
                                    <th>Ads</th>
                                    <th>ROAS</th>
                                    <th>ROI</th>
                                    <th>Reco</th>
                                </tr>
                            </thead>
                            <tbody id=\"campaignComparisonTableBody\">
                                <tr>
                                    <td colspan=\"8\" class=\"text-center text-muted\">Aucune campagne sauvegardée.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function getAdvancedRecommendation(roas, roi) {
    if (roas < 1.5 || roi < 0) {
        return {
            label: 'Kill',
            className: 'reco-kill',
            text: 'Cette campagne est faible. Coupe-la ou refais complètement l’angle, la créa ou le ciblage.'
        };
    }

    if ((roas >= 1.5 && roas < 2.5) || (roi >= 0 && roi < 30)) {
        return {
            label: 'Leave / Test',
            className: 'reco-test',
            text: 'Campagne correcte mais pas encore forte. Laisse tourner, teste nouvelles créas, hooks et audiences avant de scaler.'
        };
    }

    return {
        label: 'Scale',
        className: 'reco-scale',
        text: 'Bonne campagne. Tu peux scaler progressivement avec prudence: +10% à +20% budget, ou dupliquer sur nouveaux ensembles.'
    };
}

function hideScaleHelper() {
    const linkContainer = document.getElementById('scaleHelperLinkContainer');
    const helperBox = document.getElementById('scaleHelperBox');
    const resultBox = document.getElementById('scaleHelperResult');

    if (linkContainer) linkContainer.style.display = 'none';
    if (helperBox) helperBox.style.display = 'none';
    if (resultBox) {
        resultBox.style.display = 'none';
        resultBox.innerHTML = '';
        resultBox.className = 'scale-helper-result';
    }
}

function showScaleHelperLink() {
    const linkContainer = document.getElementById('scaleHelperLinkContainer');
    if (linkContainer) {
        linkContainer.style.display = 'block';
    }
}

function evaluateScaling(totalBudget, dailySpend, roas, roi) {
    const result = {
        className: 'scale-result-warn',
        title: '',
        text: ''
    };

    if (totalBudget <= 0 || dailySpend <= 0) {
        result.className = 'scale-result-stop';
        result.title = 'Invalid values';
        result.text = 'Add valid total budget and daily ad spend first.';
        return result;
    }

    const budgetDaysLeft = totalBudget / dailySpend;
    const spendRatio = (dailySpend / totalBudget) * 100;

    let suggestedScalePercent = 0;

    if (roas >= 4 && roi >= 40) {
        suggestedScalePercent = 25;
    } else if (roas >= 3 && roi >= 30) {
        suggestedScalePercent = 20;
    } else if (roas >= 2.5 && roi >= 20) {
        suggestedScalePercent = 10;
    } else {
        suggestedScalePercent = 0;
    }

    const newDailySpend = dailySpend + (dailySpend * suggestedScalePercent / 100);
    const newBudgetDaysLeft = newDailySpend > 0 ? totalBudget / newDailySpend : 0;

    if (roas < 2 || roi < 10) {
        result.className = 'scale-result-stop';
        result.title = 'Stop scaling';
        result.text = `
            Current performance is not strong enough to continue scaling.<br>
            ROAS/ROI are too weak for safe scaling.<br>
            Recommendation: stop scaling now and improve creatives, offer, funnel, or targeting first.
        `;
        return result;
    }

    if (budgetDaysLeft < 3 || spendRatio >= 35) {
        result.className = 'scale-result-stop';
        result.title = 'Stop scaling';
        result.text = `
            Your budget is too tight compared to your current daily spend.<br>
            Budget lasts only about <strong>\${budgetDaysLeft.toFixed(1)} days</strong>.<br>
            Recommendation: stop scaling now or add more total budget first.
        `;
        return result;
    }

    if (budgetDaysLeft >= 3 && budgetDaysLeft < 7) {
        result.className = 'scale-result-warn';
        result.title = 'Wait and monitor';
        result.text = `
            Campaign can run, but budget is limited.<br>
            Budget lasts about <strong>\${budgetDaysLeft.toFixed(1)} days</strong>.<br>
            Best move: do not scale hard now. Watch results for 1–2 days before scaling again.
        `;
        return result;
    }

    if (suggestedScalePercent <= 0) {
        result.className = 'scale-result-warn';
        result.title = 'Wait before scaling again';
        result.text = `
            Campaign is decent, but not strong enough for another aggressive scale.<br>
            Keep daily spend at <strong>\${dailySpend.toFixed(2)} TND</strong> and monitor performance.
        `;
        return result;
    }

    result.className = 'scale-result-good';
    result.title = 'Scale again';
    result.text = `
        Campaign looks strong enough to continue scaling.<br>
        Suggested increase: <strong>+\${suggestedScalePercent}%</strong><br>
        Current daily spend: <strong>\${dailySpend.toFixed(2)} TND</strong><br>
        New suggested daily spend: <strong>\${newDailySpend.toFixed(2)} TND</strong><br>
        Estimated budget duration after scaling: <strong>\${newBudgetDaysLeft.toFixed(1)} days</strong><br>
        Recommendation: scale again carefully and monitor CPA, ROAS, and profit after the increase.
    `;

    return result;
}

function runScaleHelper() {
    const totalBudget = parseFloat(document.getElementById('scale-total-budget')?.value) || 0;
    const dailySpend = parseFloat(document.getElementById('scale-daily-spend')?.value) || 0;
    const roas = parseFloat(document.getElementById('advanced-roas')?.textContent) || 0;
    const roi = parseFloat(document.getElementById('advanced-roi')?.textContent) || 0;

    const result = evaluateScaling(totalBudget, dailySpend, roas, roi);
    const resultBox = document.getElementById('scaleHelperResult');

    if (!resultBox) return;

    resultBox.className = 'scale-helper-result ' + result.className;
    resultBox.style.display = 'block';
    resultBox.innerHTML = `
        <strong>\${result.title}</strong><br>
        \${result.text}
    `;
}

async function loadAdvancedStats() {
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');

    if (!periodEl || !spentEl || !adsEl) {
        return;
    }

    const period = periodEl.value;
    const spent = parseFloat(spentEl.value) || 0;
    const ads = parseFloat(adsEl.value) || 0;

    try {
        const response = await fetch('{{ path('app_admin_commandes_advanced_stats') }}?period=' + encodeURIComponent(period));
        if (!response.ok) {
            console.error('Advanced stats route error:', response.status);
            return;
        }

        const data = await response.json();

        const revenue = parseFloat(data.revenue || 0);
        const totalCost = spent + ads;
        const roas = ads > 0 ? (revenue / ads) : 0;
        const roi = totalCost > 0 ? (((revenue - totalCost) / totalCost) * 100) : 0;

        document.getElementById('advanced-revenue').textContent = revenue.toFixed(2);
        document.getElementById('advanced-roas').textContent = roas.toFixed(2);
        document.getElementById('advanced-roi').textContent = roi.toFixed(2);
        document.getElementById('advanced-count').textContent = data.acceptedCount ?? 0;

        const recommendation = getAdvancedRecommendation(roas, roi);
        document.getElementById('campaignRecommendationBox').innerHTML = `
            <span class=\"reco-badge \${recommendation.className}\">\${recommendation.label}</span>
            <div style=\"margin-top:10px;\">\${recommendation.text}</div>
        `;

        hideScaleHelper();

        if (recommendation.label === 'Scale') {
            showScaleHelperLink();
        }
    } catch (error) {
        console.error('Erreur stats avancées:', error);
    }
}

function getSavedCampaignComparisons() {
    try {
        return JSON.parse(localStorage.getItem('campaignComparisons') || '[]');
    } catch (e) {
        return [];
    }
}

function saveCampaignComparisons(data) {
    localStorage.setItem('campaignComparisons', JSON.stringify(data));
}

function renderCampaignComparisons() {
    const tbody = document.getElementById('campaignComparisonTableBody');
    if (!tbody) return;

    const campaigns = getSavedCampaignComparisons();

    if (!campaigns.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan=\"8\" class=\"text-center text-muted\">Aucune campagne sauvegardée.</td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = campaigns.map((campaign) => `
        <tr>
            <td>\${campaign.reference}</td>
            <td>\${campaign.periodLabel}</td>
            <td>\${campaign.revenue.toFixed(2)} TND</td>
            <td>\${campaign.spent.toFixed(2)} TND</td>
            <td>\${campaign.ads.toFixed(2)} TND</td>
            <td>\${campaign.roas.toFixed(2)}</td>
            <td>\${campaign.roi.toFixed(2)}%</td>
            <td><span class=\"reco-badge \${campaign.recommendation.className}\">\${campaign.recommendation.label}</span></td>
        </tr>
    `).join('');
}

function saveCurrentCampaignComparison() {
    const referenceEl = document.getElementById('advanced-campaign-ref');
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');
    const revenueEl = document.getElementById('advanced-revenue');
    const roasEl = document.getElementById('advanced-roas');
    const roiEl = document.getElementById('advanced-roi');

    if (!referenceEl || !periodEl || !spentEl || !adsEl || !revenueEl || !roasEl || !roiEl) {
        return;
    }

    const reference = referenceEl.value.trim();
    if (!reference) {
        alert('Ajoute une référence campagne avant de sauvegarder.');
        return;
    }

    const period = periodEl.value;
    const periodMap = {
        today: \"Aujourd'hui\",
        week: \"Dernière semaine\",
        month: \"Dernier mois\"
    };

    const revenue = parseFloat(revenueEl.textContent) || 0;
    const spent = parseFloat(spentEl.value) || 0;
    const ads = parseFloat(adsEl.value) || 0;
    const roas = parseFloat(roasEl.textContent) || 0;
    const roi = parseFloat(roiEl.textContent) || 0;

    const recommendation = getAdvancedRecommendation(roas, roi);

    const campaigns = getSavedCampaignComparisons();

    campaigns.unshift({
        reference,
        period,
        periodLabel: periodMap[period] || period,
        revenue,
        spent,
        ads,
        roas,
        roi,
        recommendation
    });

    saveCampaignComparisons(campaigns);
    renderCampaignComparisons();
}

document.addEventListener('DOMContentLoaded', function () {
    const counter = document.getElementById('online-visitors-count');
    const advancedModalEl = document.getElementById('advancedStatsModal');
    const calculateBtn = document.getElementById('calculateAdvancedStatsBtn');
    const periodEl = document.getElementById('advanced-period');
    const spentEl = document.getElementById('advanced-spent');
    const adsEl = document.getElementById('advanced-ads');
    const saveBtn = document.getElementById('saveCampaignComparisonBtn');
    const clearBtn = document.getElementById('clearCampaignComparisonsBtn');
    const openScaleHelperBtn = document.getElementById('openScaleHelper');
    const runScaleHelperBtn = document.getElementById('runScaleHelperBtn');

    async function refreshOnlineVisitors() {
        if (!counter) return;

        try {
            const response = await fetch('{{ path('app_admin_visitors_count') }}');
            if (!response.ok) return;

            const data = await response.json();
            if (typeof data.onlineVisitors !== 'undefined') {
                counter.textContent = data.onlineVisitors;
            }
        } catch (error) {
            console.error('Erreur compteur visiteurs:', error);
        }
    }

    refreshOnlineVisitors();
    setInterval(refreshOnlineVisitors, 15000);

    renderCampaignComparisons();

    if (advancedModalEl) {
        advancedModalEl.addEventListener('shown.bs.modal', function () {
            loadAdvancedStats();
            renderCampaignComparisons();
        });
    }

    if (calculateBtn) calculateBtn.addEventListener('click', loadAdvancedStats);
    if (periodEl) periodEl.addEventListener('change', loadAdvancedStats);
    if (spentEl) spentEl.addEventListener('input', loadAdvancedStats);
    if (adsEl) adsEl.addEventListener('input', loadAdvancedStats);
    if (saveBtn) saveBtn.addEventListener('click', saveCurrentCampaignComparison);
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            localStorage.removeItem('campaignComparisons');
            renderCampaignComparisons();
        });
    }
    if (openScaleHelperBtn) {
        openScaleHelperBtn.addEventListener('click', function () {
            const helperBox = document.getElementById('scaleHelperBox');
            if (helperBox) {
                helperBox.style.display = helperBox.style.display === 'none' ? 'block' : 'none';
            }
        });
    }
    if (runScaleHelperBtn) runScaleHelperBtn.addEventListener('click', runScaleHelper);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const normalTbody = document.getElementById('normal-orders-tbody');
    const abandonedTbody = document.getElementById('abandoned-orders-tbody');
    const abandonedCount = document.getElementById('abandoned-count');
    const totalCount = document.getElementById('orders-total-count');

    let lastNormalCount = parseInt(totalCount?.textContent || '0', 10);
    let lastAbandonedCount = parseInt(abandonedCount?.textContent || '0', 10);
    let audioUnlocked = false;

    const orderAudio = new Audio('/sounds/order.mp3');
    orderAudio.preload = 'auto';
    orderAudio.volume = 0.7;

    function unlockAudio() {
        audioUnlocked = true;

        orderAudio.play()
            .then(() => {
                orderAudio.pause();
                orderAudio.currentTime = 0;
            })
            .catch(() => {});

        document.removeEventListener('click', unlockAudio);
        document.removeEventListener('keydown', unlockAudio);
    }

    document.addEventListener('click', unlockAudio);
    document.addEventListener('keydown', unlockAudio);

    function playOrderSound() {
        if (!audioUnlocked) return;

        try {
            orderAudio.pause();
            orderAudio.currentTime = 0;
            orderAudio.play().catch(() => {});
        } catch (e) {
            console.error('Sound error:', e);
        }
    }

    function showOrderToast(order) {
        let toast = document.getElementById('shopify-order-toast');

        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'shopify-order-toast';
            toast.style.position = 'fixed';
            toast.style.left = '20px';
            toast.style.bottom = '20px';
            toast.style.zIndex = '99999';
            toast.style.width = '360px';
            toast.style.maxWidth = 'calc(100vw - 30px)';
            toast.style.background = '#ffffff';
            toast.style.borderRadius = '18px';
            toast.style.boxShadow = '0 18px 40px rgba(0,0,0,0.20)';
            toast.style.border = '1px solid #ead9d2';
            toast.style.overflow = 'hidden';
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            toast.style.transition = 'all 0.35s ease';
            document.body.appendChild(toast);
        }

        const imageHtml = order && order.photo
            ? `<img src=\"\${order.photo}\" alt=\"\${order.productName}\" style=\"width:72px;height:72px;object-fit:cover;border-radius:14px;border:1px solid #eee;\">`
            : `<div style=\"width:72px;height:72px;border-radius:14px;background:#f6f1ed;display:flex;align-items:center;justify-content:center;font-size:28px;\">📦</div>`;

        const customerName = order?.customerName || 'Client';
        const productName = order?.productName || 'Produit';
        const price = order?.price || '-';
        const phone = order?.phone || '';

        toast.innerHTML = `
            <div style=\"display:flex;gap:14px;align-items:center;padding:14px;\">
                <div>\${imageHtml}</div>

                <div style=\"flex:1;min-width:0;\">
                    <div style=\"font-size:12px;font-weight:800;color:#8B0000;text-transform:uppercase;letter-spacing:0.4px;margin-bottom:4px;\">
                        Nouvelle commande
                    </div>

                    <div style=\"font-size:15px;font-weight:800;color:#2c1a1d;line-height:1.25;margin-bottom:4px;\">
                        \${customerName}
                    </div>

                    \${phone ? `<div style=\"font-size:13px;color:#6b5b55;margin-bottom:4px;\">\${phone}</div>` : ''}

                    <div style=\"font-size:14px;color:#5f4b45;line-height:1.3;margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;\">
                        \${productName}
                    </div>

                    <div style=\"font-size:14px;font-weight:700;color:#111;\">
                        \${price}
                    </div>
                </div>

                <button type=\"button\" onclick=\"this.closest('#shopify-order-toast').style.opacity='0';this.closest('#shopify-order-toast').style.transform='translateY(20px)';\" style=\"border:none;background:transparent;font-size:18px;color:#999;cursor:pointer;padding:0 4px;\">
                    ×
                </button>
            </div>
        `;

        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';

        setTimeout(() => {
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
            }
        }, 5000);
    }

    function showLeadToast() {
        let toast = document.getElementById('shopify-lead-toast');

        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'shopify-lead-toast';
            toast.style.position = 'fixed';
            toast.style.left = '20px';
            toast.style.bottom = '20px';
            toast.style.zIndex = '99998';
            toast.style.width = '320px';
            toast.style.maxWidth = 'calc(100vw - 30px)';
            toast.style.background = '#fff7e6';
            toast.style.borderRadius = '18px';
            toast.style.boxShadow = '0 18px 40px rgba(0,0,0,0.18)';
            toast.style.border = '1px solid #f1d39b';
            toast.style.overflow = 'hidden';
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            toast.style.transition = 'all 0.35s ease';
            document.body.appendChild(toast);
        }

        toast.innerHTML = `
            <div style=\"display:flex;gap:12px;align-items:center;padding:14px;\">
                <div style=\"width:54px;height:54px;border-radius:14px;background:#fff1bf;display:flex;align-items:center;justify-content:center;font-size:24px;\">
                    📞
                </div>
                <div style=\"flex:1;\">
                    <div style=\"font-size:12px;font-weight:800;color:#946200;text-transform:uppercase;margin-bottom:4px;\">
                        Lead abandonné
                    </div>
                    <div style=\"font-size:14px;font-weight:700;color:#3d2d00;\">
                        Nouveau lead enregistré
                    </div>
                </div>
            </div>
        `;

        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';

        setTimeout(() => {
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
            }
        }, 4000);
    }

    async function refreshOrdersLive() {
        try {
            const params = new URLSearchParams(window.location.search);
            const response = await fetch(`{{ path('app_admin_commandes_live_data') }}?\${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) return;

            const data = await response.json();

            if (normalTbody && typeof data.normalRows !== 'undefined') {
                normalTbody.innerHTML = data.normalRows;
            }

            if (abandonedTbody && typeof data.abandonedRows !== 'undefined') {
                abandonedTbody.innerHTML = data.abandonedRows;
            }

            if (abandonedCount && typeof data.abandonedCount !== 'undefined') {
                abandonedCount.textContent = data.abandonedCount;
            }

            if (totalCount && typeof data.normalCount !== 'undefined') {
                totalCount.textContent = data.normalCount;
            }

            if (typeof data.normalCount !== 'undefined' && data.normalCount > lastNormalCount) {
                playOrderSound();
                showOrderToast(data.latestOrder || null);
            }

            if (typeof data.abandonedCount !== 'undefined' && data.abandonedCount > lastAbandonedCount) {
                playOrderSound();
                showLeadToast();
            }

            lastNormalCount = parseInt(data.normalCount ?? lastNormalCount, 10);
            lastAbandonedCount = parseInt(data.abandonedCount ?? lastAbandonedCount, 10);
        } catch (error) {
            console.error('Live refresh error:', error);
        }
    }

    setInterval(refreshOrdersLive, 7000);
});
</script>
<div class=\"modal fade\" id=\"importTxtModal\" tabindex=\"-1\" aria-labelledby=\"importTxtModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header advanced-modal-header\">
                <h5 class=\"modal-title\" id=\"importTxtModalLabel\">
                    <i class=\"fas fa-file-import\"></i> Importer des commandes TXT
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>

            <form method=\"post\" action=\"{{ path('app_admin_commandes_import_txt') }}\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"alert alert-info\">
                        <strong>Format obligatoire du fichier TXT :</strong><br><br>
                        <code>customer_name|phone|location|product_id|status</code><br><br>
                        <strong>Exemple :</strong><br>
                        <code>Ali Ben Salah|22123456|Tunis|5|en_attente</code><br>
                        <code>Sarra Trabelsi|55111222|Sfax|3|acceptee</code>
                    </div>

                    <div class=\"alert alert-warning\">
                        <strong>Statuts autorisés :</strong>
                        <code>en_attente</code>,
                        <code>acceptee</code>,
                        <code>refusee</code>,
                        <code>annulee</code>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label fw-bold\">Fichier TXT</label>
                        <input type=\"file\" name=\"txt_file\" class=\"form-control\" accept=\".txt\" required>
                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-calculator\">
                        <i class=\"fas fa-upload\"></i> Importer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id=\"commandePanelOverlay\" class=\"commande-panel-overlay\" onclick=\"closeCommandeEditPanel()\"></div>

<div id=\"commandePanel\" class=\"commande-panel\">
    <div class=\"commande-panel-header\">
        <h3 class=\"commande-panel-title\">Modifier commande</h3>
        <button type=\"button\" class=\"commande-panel-close\" onclick=\"closeCommandeEditPanel()\">✕</button>
    </div>

    <div class=\"commande-panel-body\">
        <div id=\"commandePanelAlert\" class=\"alert commande-panel-alert\"></div>

        <form id=\"commandeEditForm\">
            <input type=\"hidden\" id=\"commandeEditId\" name=\"id\">

            <div class=\"commande-section\">
                <div class=\"commande-section-head\">Commande</div>
                <div class=\"commande-section-content\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label>Statut</label>
                            <select id=\"commandeStatus\" name=\"status_commande\" class=\"form-select\">
                                <option value=\"en_attente\">En attente</option>
                                <option value=\"acceptee\">Acceptée</option>
                                <option value=\"refusee\">Refusée</option>
                                <option value=\"annulee\">Annulée</option>
                            </select>
                        </div>

                        <div class=\"col-md-6\">
                            <label>Date</label>
                            <input type=\"text\" id=\"commandeCreatedAt\" class=\"form-control\" readonly>
                        </div>

                        <div class=\"col-md-6\">
                            <label>Produit principal</label>
                            <input type=\"number\" id=\"commandeProductId\" name=\"productId\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-6\">
                            <label>Quantité</label>
                            <input type=\"number\" min=\"1\" id=\"commandeQuantite\" name=\"quantite\" class=\"form-control\" value=\"1\">
                        </div>

                        <div class=\"col-md-12\">
                            <label>Total</label>
                            <input type=\"text\" id=\"commandeTotal\" class=\"form-control\" readonly>
                        </div>

                        <div class=\"col-md-12\">
                            <label>Articles</label>
                            <div id=\"commandeItemsList\" class=\"commande-items-list\"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"commande-section\">
                <div class=\"commande-section-head\">Client</div>
                <div class=\"commande-section-content\">
                    <div class=\"row g-3\">
                        <div class=\"col-md-6\">
                            <label>Nom</label>
                            <input type=\"text\" id=\"commandeCustomerName\" name=\"customerName\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-6\">
                            <label>Téléphone</label>
                            <input type=\"text\" id=\"commandePhone\" name=\"phone\" class=\"form-control\">
                        </div>

                        <div class=\"col-md-12\">
                            <label>Adresse</label>
                            <input type=\"text\" id=\"commandeLocation\" name=\"location\" class=\"form-control\">
                        </div>
                    </div>
                </div>
            </div>

            <button type=\"submit\" class=\"save-commande-btn\">
                <i class=\"fas fa-save\"></i> Enregistrer
            </button>
        </form>
    </div>
</div>
<div id=\"firstDeliveryOverlay\" class=\"commande-panel-overlay\" onclick=\"closeFirstDeliveryModal()\"></div>

<div id=\"firstDeliveryModal\" class=\"first-delivery-modal\">
    <div class=\"commande-panel-header\">
        <h3 class=\"commande-panel-title\">Envoyer à First Delivery</h3>
        <button type=\"button\" class=\"commande-panel-close\" onclick=\"closeFirstDeliveryModal()\">✕</button>
    </div>

    <div class=\"commande-panel-body\">
        <div id=\"firstDeliveryModalAlert\" class=\"alert commande-panel-alert\"></div>

        <input type=\"hidden\" id=\"firstDeliveryCommandeId\">

        <div class=\"commande-section\">
            <div class=\"commande-section-head\">Confirmation</div>
            <div class=\"commande-section-content\">
                <p style=\"margin-bottom: 10px; color:#5C4033; font-weight:800; font-size:16px;\">
    Envoyer cette commande à First Delivery ?
</p>

<p style=\"margin-bottom: 18px; color:#7a5a4a; font-weight:600; line-height:1.6;\">
    Clique sur <strong>Accepter</strong> pour envoyer la commande, ou sur <strong>Annuler</strong> pour fermer cette fenêtre.
</p>

                <div class=\"d-flex gap-2 flex-wrap\">
    <button type=\"button\"
            id=\"firstDeliveryConfirmBtn\"
            class=\"fdg-confirm-btn\"
            onclick=\"confirmSendToFirstDelivery()\">
        <i class=\"fas fa-check\"></i> Accepter
    </button>

    <button type=\"button\"
            class=\"fdg-cancel-btn\"
            onclick=\"closeFirstDeliveryModal()\">
        <i class=\"fas fa-times\"></i> Annuler
    </button>
</div>
            </div>
        </div>
    </div>
</div>
<script>
function openCommandeEditPanel(id) {
    fetch(`/admin/commandes/\${id}/edit-data`)
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert(data.message || 'Erreur');
                return;
            }

            const c = data.commande;

            document.getElementById('commandeEditId').value = c.id;
            document.getElementById('commandeCustomerName').value = c.customerName || '';
            document.getElementById('commandePhone').value = c.phone || '';
            document.getElementById('commandeLocation').value = c.location || '';
            document.getElementById('commandeStatus').value = c.status || 'en_attente';
            document.getElementById('commandeProductId').value = c.productId || '';
            document.getElementById('commandeCreatedAt').value = c.createdAt || '';
            document.getElementById('commandeTotal').value = c.total || '';
            document.getElementById('commandeQuantite').value = c.quantity || 1;

            const itemsList = document.getElementById('commandeItemsList');

            if (c.items && c.items.length) {
                itemsList.innerHTML = c.items.map(item => `
                    <div class=\"commande-item-box\">
                        \${item.photo ? `<img src=\"\${item.photo}\" alt=\"\${item.nom}\">` : `<div class=\"commande-item-fallback\">📦</div>`}
                        <div>
                            <div><strong>\${item.nom}</strong></div>
                            <div>\${item.quantite} × \${Number(item.prix).toFixed(2)} TND</div>
                            <small>\${Number(item.sous_total).toFixed(2)} TND</small>
                        </div>
                    </div>
                `).join('');
            } else {
                itemsList.innerHTML = '<div class=\"commande-item-box\"><div class=\"commande-item-fallback\">📦</div><div>Commande simple</div></div>';
            }

            document.getElementById('commandePanel').classList.add('open');
            document.getElementById('commandePanelOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        });
}

function closeCommandeEditPanel() {
    document.getElementById('commandePanel').classList.remove('open');
    document.getElementById('commandePanelOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

document.getElementById('commandeEditForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const id = document.getElementById('commandeEditId').value;
    const formData = new FormData(this);
    const alertBox = document.getElementById('commandePanelAlert');

    alertBox.style.display = 'none';
    alertBox.className = 'alert commande-panel-alert';

    try {
        const response = await fetch(`/admin/commandes/\${id}/update-ajax`, {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            alertBox.style.display = 'block';
            alertBox.classList.add('alert-danger');
            alertBox.textContent = data.message || 'Erreur.';
            return;
        }

        alertBox.style.display = 'block';
        alertBox.classList.add('alert-success');
        alertBox.textContent = data.message || 'Commande mise à jour.';

        setTimeout(() => {
            window.location.reload();
        }, 700);
    } catch (error) {
        alertBox.style.display = 'block';
        alertBox.classList.add('alert-danger');
        alertBox.textContent = 'Erreur réseau ou serveur.';
    }
});

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeCommandeEditPanel();
    }
});
function openFirstDeliveryModal(id) {
    document.getElementById('firstDeliveryCommandeId').value = id;
    document.getElementById('firstDeliveryModal').classList.add('open');
    document.getElementById('firstDeliveryOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeFirstDeliveryModal() {
    document.getElementById('firstDeliveryModal').classList.remove('open');
    document.getElementById('firstDeliveryOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

async function confirmSendToFirstDelivery() {
    const id = document.getElementById('firstDeliveryCommandeId').value;
    const confirmBtn = document.getElementById('firstDeliveryConfirmBtn');
    const alertBox = document.getElementById('firstDeliveryModalAlert');

    alertBox.style.display = 'none';
    alertBox.className = 'alert commande-panel-alert';

    confirmBtn.disabled = true;
    confirmBtn.innerHTML = '<i class=\"fas fa-spinner fa-spin\"></i> Envoi en cours...';

    try {
        const response = await fetch(`/admin/livraisons/send-first-delivery/\${id}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            alertBox.style.display = 'block';
            alertBox.classList.add('alert-danger');
            alertBox.textContent = data.message || 'Erreur envoi.';
            confirmBtn.disabled = false;
            confirmBtn.innerHTML = 'Confirmer l’envoi';
            return;
        }

        // change status in table after successful send
        const statusEl = document.getElementById(`fdg-status-\${id}`);
        if (statusEl) {
            statusEl.className = 'status-pill status-acceptee';
            statusEl.textContent = 'Accepted';
        }

        alertBox.style.display = 'block';
        alertBox.classList.add('alert-success');
        alertBox.textContent = data.message || 'Commande envoyée à First Delivery avec succès.';

        setTimeout(() => {
            closeFirstDeliveryModal();
        }, 900);

    } catch (error) {
        alertBox.style.display = 'block';
        alertBox.classList.add('alert-danger');
        alertBox.textContent = 'Erreur réseau ou serveur.';
        confirmBtn.disabled = false;
        confirmBtn.innerHTML = 'Confirmer l’envoi';
    }
}
</script>
{% endblock %}", "admin_commandes/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_commandes\\index.html.twig");
    }
}

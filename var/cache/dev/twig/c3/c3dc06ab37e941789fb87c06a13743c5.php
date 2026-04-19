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

/* admin_livraisons/index.html.twig */
class __TwigTemplate_3d99db7a656296546bcb16165f7288d7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_livraisons/index.html.twig"));

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

        yield "Gestion des livraisons";
        
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
.barcode-btn {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #8B0000, #B22222);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.25);
}

.barcode-btn i {
    font-size: 18px;
}

.barcode-btn:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.35);
}

.barcode-btn:active {
    transform: scale(0.95);
}
    .delivery-shell {
        color: #2c1a1d;
    }

    .delivery-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .delivery-topbar h3 {
        margin: 0;
        font-weight: 800;
        color: #000;
    }

    .btn-livreur {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.18);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-livreur:hover {
        color: white;
        transform: translateY(-2px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        border-radius: 22px;
        padding: 22px;
        color: #fff;
        position: relative;
        overflow: hidden;
        min-height: 145px;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.16);
    }

    .stat-card::after {
        content: \"\";
        position: absolute;
        width: 180px;
        height: 180px;
        right: -60px;
        top: -40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }

    .stat-bordeaux,
    .stat-blue,
    .stat-green,
    .stat-red {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .stat-title {
        font-size: 15px;
        color: rgba(255,255,255,0.92);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .stat-value {
        font-size: 38px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 10px;
    }

    .stat-subvalue {
        font-size: 14px;
        font-weight: 700;
        opacity: 0.95;
    }

    .top-dashboard-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .dark-card {
        background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.15);
    }

    .dark-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        color: #fff;
        font-weight: 800;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .dark-card-body {
        padding: 20px;
        color: #fff;
    }

    .performance-legend {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .performance-bar {
        width: 100%;
        height: 44px;
        background: rgba(255,255,255,0.10);
        border-radius: 999px;
        overflow: hidden;
        display: flex;
    }

    .performance-delivered {
        height: 100%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        display: flex;
        align-items: center;
        color: #fff;
        font-weight: 800;
        padding-left: 14px;
        transition: width 0.35s ease;
        white-space: nowrap;
    }

    .performance-pending {
        height: 100%;
        background: #f3d6d6;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: #8B0000;
        font-weight: 800;
        padding-right: 14px;
        transition: width 0.35s ease;
        white-space: nowrap;
    }

    .gauge-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 260px;
        position: relative;
    }

    .gauge {
        width: 250px;
        height: 125px;
        border-top-left-radius: 250px;
        border-top-right-radius: 250px;
        border: 20px solid #f4e6e6;
        border-bottom: 0;
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
    }

    .gauge::before {
        content: \"\";
        position: absolute;
        left: 50%;
        bottom: -20px;
        transform: translateX(-50%);
        width: 180px;
        height: 90px;
        background: #441616;
        border-top-left-radius: 180px;
        border-top-right-radius: 180px;
    }

    .gauge-text {
        position: absolute;
        text-align: center;
        top: 56%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .gauge-text .big {
        font-size: 40px;
        font-weight: 900;
        line-height: 1;
        color: #fff;
    }

    .gauge-text .small {
        font-size: 14px;
        color: #f6dddd;
        margin-top: 6px;
        font-weight: 700;
    }

    .gauge-dot {
        position: absolute;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .gauge-dot.left {
        left: 14%;
        bottom: 23%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .gauge-dot.right {
        right: 14%;
        bottom: 23%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .filters-card {
        background: #fff7f2;
        border: 1px solid #ead9d2;
        border-radius: 20px;
        padding: 18px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.06);
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

    .btn-reset {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
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

    .btn-reset:hover {
        color: #fff;
        opacity: 0.95;
    }

    .main-grid {
        display: grid;
        grid-template-columns: 1fr 1.25fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .panel-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--beige-fonce);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.06);
    }

    .panel-header {
        padding: 18px 20px;
        border-bottom: 1px solid var(--beige-fonce);
        font-size: 20px;
        font-weight: 800;
        color: var(--bordeaux);
        background: #fff;
    }

    .panel-body {
        padding: 20px;
    }

    .livreur-card {
        background: #fff7f2;
        border-radius: 16px;
        padding: 15px;
        margin-bottom: 14px;
        border: 1px solid var(--beige-fonce);
        transition: all 0.3s ease;
    }

    .livreur-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .livreur-dispo {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
    }

    .disponible { background: #4CAF50; }
    .indisponible { background: #f44336; }

    .small-muted {
        color: #7a5a4a;
        font-size: 13px;
    }

    .delivery-table-card {
        background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.15);
    }

    .delivery-table {
        margin: 0;
        color: #fff;
    }

    .delivery-table thead th {
        background: #7b1e2b;
        color: #fff;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        padding: 16px 14px;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .delivery-table td {
        padding: 15px 14px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .delivery-table tbody tr:hover {
        background: rgba(255,255,255,0.02);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
    }

    .status-en_cours { background: #FF9800; color: white; }
    .status-livree { background: #4CAF50; color: white; }
    .status-en_attente { background: #2196F3; color: white; }
    .status-annulee { background: #9E9E9E; color: white; }

    .commande-card-modern {
        background: rgba(255,255,255,0.06);
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(255,255,255,0.08);
        margin-bottom: 14px;
        color: #fff;
    }

    .commande-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .commande-title {
        font-weight: 800;
        font-size: 17px;
    }

    .commande-lines p {
        margin-bottom: 7px;
        color: #f0dede;
    }

    .commande-lines strong {
        color: #fff;
    }

    .inline-form-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .inline-form-row .form-select {
        min-width: 220px;
        border-radius: 12px;
        height: 44px;
        border: 1px solid rgba(255,255,255,0.12);
        background: rgba(255,255,255,0.08);
        color: #fff;
    }

    .action-btn {
        border: none;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 800;
        color: #fff;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        transition: all 0.25s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .secondary-btn {
        background: linear-gradient(135deg, #7a1b1b, #9c2b2b);
    }

    .history-details-row {
        display: none;
        background: rgba(255,255,255,0.03);
    }

    .history-details-row.open {
        display: table-row;
    }

    .details-box-wrap {
        padding: 18px 0 6px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 14px;
    }

    .detail-box {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 14px;
    }

    .detail-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #f0dede;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .detail-value {
        color: #fff;
        font-weight: 800;
        word-break: break-word;
    }

    .loading-inline {
        color: #f0dede;
        font-weight: 700;
    }

    .empty-box {
        text-align: center;
        padding: 40px 20px;
        color: #8a6a60;
    }

    .pagination-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 18px 20px;
        border-top: 1px solid rgba(255,255,255,0.08);
        flex-wrap: wrap;
    }

    .pagination-info {
        color: #fff;
        font-weight: 700;
    }

    .pagination-buttons {
        display: flex;
        gap: 10px;
    }

    .pagination-btn {
        border: none;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 800;
        color: #fff;
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        transition: all 0.25s ease;
    }

    .pagination-btn:hover:not(:disabled) {
        transform: translateY(-2px);
    }

    .pagination-btn:disabled {
        opacity: 0.45;
        cursor: not-allowed;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .top-dashboard-grid,
        .main-grid {
            grid-template-columns: 1fr;
        }

        .details-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 614
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 615
        $context["totalLivreurs"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["livreurs"]) || array_key_exists("livreurs", $context) ? $context["livreurs"] : (function () { throw new RuntimeError('Variable "livreurs" does not exist.', 615, $this->source); })()));
        // line 616
        $context["totalCommandes"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 616, $this->source); })()));
        // line 617
        $context["totalLivraisons"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 617, $this->source); })()));
        // line 618
        yield "
";
        // line 619
        $context["enCoursCount"] = 0;
        // line 620
        $context["livreeCount"] = 0;
        // line 621
        $context["attenteCount"] = 0;
        // line 622
        $context["annuleeCount"] = 0;
        // line 623
        yield "
";
        // line 624
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 624, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
            // line 625
            yield "    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 625) == "en_cours")) {
                // line 626
                yield "        ";
                $context["enCoursCount"] = ((isset($context["enCoursCount"]) || array_key_exists("enCoursCount", $context) ? $context["enCoursCount"] : (function () { throw new RuntimeError('Variable "enCoursCount" does not exist.', 626, $this->source); })()) + 1);
                // line 627
                yield "    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 627) == "livree")) {
                // line 628
                yield "        ";
                $context["livreeCount"] = ((isset($context["livreeCount"]) || array_key_exists("livreeCount", $context) ? $context["livreeCount"] : (function () { throw new RuntimeError('Variable "livreeCount" does not exist.', 628, $this->source); })()) + 1);
                // line 629
                yield "    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 629) == "annulee")) {
                // line 630
                yield "        ";
                $context["annuleeCount"] = ((isset($context["annuleeCount"]) || array_key_exists("annuleeCount", $context) ? $context["annuleeCount"] : (function () { throw new RuntimeError('Variable "annuleeCount" does not exist.', 630, $this->source); })()) + 1);
                // line 631
                yield "    ";
            } else {
                // line 632
                yield "        ";
                $context["attenteCount"] = ((isset($context["attenteCount"]) || array_key_exists("attenteCount", $context) ? $context["attenteCount"] : (function () { throw new RuntimeError('Variable "attenteCount" does not exist.', 632, $this->source); })()) + 1);
                // line 633
                yield "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 635
        yield "
";
        // line 636
        $context["deliveredPercent"] = ((((isset($context["totalLivraisons"]) || array_key_exists("totalLivraisons", $context) ? $context["totalLivraisons"] : (function () { throw new RuntimeError('Variable "totalLivraisons" does not exist.', 636, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round((((isset($context["livreeCount"]) || array_key_exists("livreeCount", $context) ? $context["livreeCount"] : (function () { throw new RuntimeError('Variable "livreeCount" does not exist.', 636, $this->source); })()) / (isset($context["totalLivraisons"]) || array_key_exists("totalLivraisons", $context) ? $context["totalLivraisons"] : (function () { throw new RuntimeError('Variable "totalLivraisons" does not exist.', 636, $this->source); })())) * 100), 1)) : (0));
        // line 637
        $context["pendingPercent"] = ((((isset($context["totalLivraisons"]) || array_key_exists("totalLivraisons", $context) ? $context["totalLivraisons"] : (function () { throw new RuntimeError('Variable "totalLivraisons" does not exist.', 637, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round(((((isset($context["enCoursCount"]) || array_key_exists("enCoursCount", $context) ? $context["enCoursCount"] : (function () { throw new RuntimeError('Variable "enCoursCount" does not exist.', 637, $this->source); })()) + (isset($context["attenteCount"]) || array_key_exists("attenteCount", $context) ? $context["attenteCount"] : (function () { throw new RuntimeError('Variable "attenteCount" does not exist.', 637, $this->source); })())) / (isset($context["totalLivraisons"]) || array_key_exists("totalLivraisons", $context) ? $context["totalLivraisons"] : (function () { throw new RuntimeError('Variable "totalLivraisons" does not exist.', 637, $this->source); })())) * 100), 1)) : (0));
        // line 638
        yield "
<div class=\"delivery-shell\">
    <div class=\"delivery-topbar\">
        <h3>🚚 Gestion des livraisons</h3>
        <button type=\"button\" class=\"btn-livreur\">
            <i class=\"fas fa-user-plus\"></i> Ajouter un livreur
        </button>
        
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card stat-bordeaux\">
    <div class=\"stat-title\">Livreurs disponibles</div>
    <div class=\"stat-value\" id=\"stat-livreurs\">";
        // line 651
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalLivreurs"]) || array_key_exists("totalLivreurs", $context) ? $context["totalLivreurs"] : (function () { throw new RuntimeError('Variable "totalLivreurs" does not exist.', 651, $this->source); })()), "html", null, true);
        yield "</div>
    <div class=\"stat-subvalue\">Gestion rapide des affectations</div>
</div>

<div class=\"stat-card stat-blue\">
    <div class=\"stat-title\">Commandes à livrer</div>
    <div class=\"stat-value\" id=\"stat-commandes\">";
        // line 657
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalCommandes"]) || array_key_exists("totalCommandes", $context) ? $context["totalCommandes"] : (function () { throw new RuntimeError('Variable "totalCommandes" does not exist.', 657, $this->source); })()), "html", null, true);
        yield "</div>
    <div class=\"stat-subvalue\">En attente d'affectation</div>
</div>

<div class=\"stat-card stat-green\">
    <div class=\"stat-title\">Livraisons livrées</div>
    <div class=\"stat-value\" id=\"stat-livrees\">";
        // line 663
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["livreeCount"]) || array_key_exists("livreeCount", $context) ? $context["livreeCount"] : (function () { throw new RuntimeError('Variable "livreeCount" does not exist.', 663, $this->source); })()), "html", null, true);
        yield "</div>
    <div class=\"stat-subvalue\"><span id=\"deliveredPercentTextTop\">";
        // line 664
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveredPercent"]) || array_key_exists("deliveredPercent", $context) ? $context["deliveredPercent"] : (function () { throw new RuntimeError('Variable "deliveredPercent" does not exist.', 664, $this->source); })()), "html", null, true);
        yield "</span>% du total</div>
</div>

<div class=\"stat-card stat-red\">
    <div class=\"stat-title\">Livraisons en cours</div>
    <div class=\"stat-value\" id=\"stat-encours\">";
        // line 669
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["enCoursCount"]) || array_key_exists("enCoursCount", $context) ? $context["enCoursCount"] : (function () { throw new RuntimeError('Variable "enCoursCount" does not exist.', 669, $this->source); })()), "html", null, true);
        yield "</div>
    <div class=\"stat-subvalue\"><span id=\"attenteCountTop\">";
        // line 670
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["attenteCount"]) || array_key_exists("attenteCount", $context) ? $context["attenteCount"] : (function () { throw new RuntimeError('Variable "attenteCount" does not exist.', 670, $this->source); })()), "html", null, true);
        yield "</span> en attente</div>
</div>
    </div>

    <div class=\"top-dashboard-grid\">
        <div class=\"dark-card\">
            <div class=\"dark-card-header\">
                <span>Delivery performance</span>
                <span>";
        // line 678
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalLivraisons"]) || array_key_exists("totalLivraisons", $context) ? $context["totalLivraisons"] : (function () { throw new RuntimeError('Variable "totalLivraisons" does not exist.', 678, $this->source); })()), "html", null, true);
        yield " livraisons</span>
            </div>
            <div class=\"dark-card-body\">
                <div class=\"performance-legend\">
    <div>Livrées <strong id=\"deliveredPercentLegend\">";
        // line 682
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveredPercent"]) || array_key_exists("deliveredPercent", $context) ? $context["deliveredPercent"] : (function () { throw new RuntimeError('Variable "deliveredPercent" does not exist.', 682, $this->source); })()), "html", null, true);
        yield "%</strong></div>
    <div>En cours / attente <strong id=\"pendingPercentLegend\">";
        // line 683
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingPercent"]) || array_key_exists("pendingPercent", $context) ? $context["pendingPercent"] : (function () { throw new RuntimeError('Variable "pendingPercent" does not exist.', 683, $this->source); })()), "html", null, true);
        yield "%</strong></div>
</div>

<div class=\"performance-bar\">
    <div class=\"performance-delivered\" id=\"deliveredBar\" style=\"width: ";
        // line 687
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveredPercent"]) || array_key_exists("deliveredPercent", $context) ? $context["deliveredPercent"] : (function () { throw new RuntimeError('Variable "deliveredPercent" does not exist.', 687, $this->source); })()), "html", null, true);
        yield "%\">
        <span id=\"deliveredPercentBar\">";
        // line 688
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveredPercent"]) || array_key_exists("deliveredPercent", $context) ? $context["deliveredPercent"] : (function () { throw new RuntimeError('Variable "deliveredPercent" does not exist.', 688, $this->source); })()), "html", null, true);
        yield "%</span>
    </div>
    <div class=\"performance-pending\" id=\"pendingBar\" style=\"width: ";
        // line 690
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingPercent"]) || array_key_exists("pendingPercent", $context) ? $context["pendingPercent"] : (function () { throw new RuntimeError('Variable "pendingPercent" does not exist.', 690, $this->source); })()), "html", null, true);
        yield "%\">
        <span id=\"pendingPercentBar\">";
        // line 691
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingPercent"]) || array_key_exists("pendingPercent", $context) ? $context["pendingPercent"] : (function () { throw new RuntimeError('Variable "pendingPercent" does not exist.', 691, $this->source); })()), "html", null, true);
        yield "%</span>
    </div>
</div>
            </div>
        </div>

        <div class=\"dark-card\">
            <div class=\"dark-card-header\">
                <span>Average Delivery Time</span>
                <span>Vue rapide</span>
            </div>
            <div class=\"dark-card-body\">
                <div class=\"gauge-wrap\">
                    <div class=\"gauge\"></div>
                    <div class=\"gauge-text\">
    <div class=\"big\" id=\"avgDeliveryTime\">";
        // line 706
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("averageDeliveryTime", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["averageDeliveryTime"]) || array_key_exists("averageDeliveryTime", $context) ? $context["averageDeliveryTime"] : (function () { throw new RuntimeError('Variable "averageDeliveryTime" does not exist.', 706, $this->source); })()), "0h 0m")) : ("0h 0m")), "html", null, true);
        yield "</div>
    <div class=\"small\">Temps moyen réel</div>
</div>
                    <div class=\"gauge-dot left\"><i class=\"fas fa-truck\"></i></div>
                    <div class=\"gauge-dot right\"><i class=\"fas fa-box\"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"filters-card\">
        <div class=\"row g-3\">
            <div class=\"col-lg-4\">
                <input type=\"text\" id=\"deliverySearchInput\" class=\"form-control\" placeholder=\"Rechercher client, téléphone, adresse, commande...\">
            </div>

            <div class=\"col-lg-3\">
                <select id=\"deliveryStatusFilter\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"en_attente\">En attente</option>
                    <option value=\"en_cours\">En cours</option>
                    <option value=\"livree\">Livrée</option>
                    <option value=\"annulee\">Annulée</option>
                </select>
            </div>

            <div class=\"col-lg-3\">
                <select id=\"deliverySectionFilter\" class=\"form-select\">
                    <option value=\"\">Toutes les sections</option>
                    <option value=\"pending\">Commandes à livrer</option>
                    <option value=\"active\">Livraisons en cours</option>
                    <option value=\"history\">Historique</option>
                </select>
            </div>

            <div class=\"col-lg-2\">
                <button type=\"button\" class=\"btn-reset\" onclick=\"resetDeliveryFilters()\">
                    <i class=\"fas fa-undo\"></i>&nbsp; Reset
                </button>
            </div>
        </div>
    </div>

    <div class=\"main-grid\">
        <div class=\"panel-card\">
    <div class=\"panel-header\">📦 Commandes envoyées à First Delivery</div>
    <div class=\"panel-body\">
        ";
        // line 753
        $context["hasFirstOrders"] = false;
        // line 754
        yield "
        ";
        // line 755
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["allCommandes"]) || array_key_exists("allCommandes", $context) ? $context["allCommandes"] : (function () { throw new RuntimeError('Variable "allCommandes" does not exist.', 755, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
            // line 756
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgStatus", [], "any", true, true, false, 756) && CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgStatus", [], "any", false, false, false, 756))) {
                // line 757
                yield "                ";
                $context["hasFirstOrders"] = true;
                // line 758
                yield "                <div class=\"livreur-card\">
                    <div class=\"d-flex justify-content-between align-items-center mb-2\">
                        <strong>Commande #";
                // line 760
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 760), "html", null, true);
                yield "</strong>
                        <span id=\"first-status-badge-";
                // line 761
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 761), "html", null, true);
                yield "\"
      class=\"status-badge ";
                // line 762
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgStatus", [], "any", false, false, false, 762) == "sent")) ? ("status-en_cours") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgStatus", [], "any", false, false, false, 762) == "packed")) ? ("status-livree") : ("status-en_attente"))));
                yield "\">
    ";
                // line 763
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgStatus", [], "any", false, false, false, 763), "html", null, true);
                yield "
</span>
                    </div>

                    <p class=\"small mb-1\">
                        <i class=\"fas fa-user\"></i>
                        ";
                // line 769
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", true, true, false, 769) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 769)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 769), "html", null, true)) : ("Client"));
                yield "
                    </p>

                    <p class=\"small mb-1\">
                        <i class=\"fas fa-phone\"></i>
                        ";
                // line 774
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "phone", [], "any", true, true, false, 774) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "phone", [], "any", false, false, false, 774)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "phone", [], "any", false, false, false, 774), "html", null, true)) : ("—"));
                yield "
                    </p>

                    <div class=\"small-muted\">
                        ";
                // line 778
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgBarcode", [], "any", true, true, false, 778) && CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgBarcode", [], "any", false, false, false, 778))) {
                    // line 779
                    yield "                            Barcode: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgBarcode", [], "any", false, false, false, 779), "html", null, true);
                    yield "
                        ";
                } else {
                    // line 781
                    yield "                            Pas encore de barcode
                        ";
                }
                // line 783
                yield "                    </div>

                    ";
                // line 785
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgPrintLink", [], "any", true, true, false, 785) && CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgPrintLink", [], "any", false, false, false, 785))) {
                    // line 786
                    yield "                        <div class=\"mt-2\">
                            <a href=\"";
                    // line 787
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgPrintLink", [], "any", false, false, false, 787), "html", null, true);
                    yield "\" target=\"_blank\" class=\"btn-reset\" style=\"height: 40px; width: auto; padding: 8px 14px;\">
                                <i class=\"fas fa-print\"></i>&nbsp; Imprimer
                            </a>
                            <button type=\"button\"
        class=\"action-btn secondary-btn\"
        onclick=\"cancelFirstDelivery(";
                    // line 792
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 792), "html", null, true);
                    yield ")\">
    <i class=\"fas fa-times\"></i> Annuler First
</button>
<button type=\"button\"
        class=\"barcode-btn\"
        onclick=\"openPackedModal(";
                    // line 797
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 797), "html", null, true);
                    yield ", '";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgBarcode", [], "any", true, true, false, 797)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "fdgBarcode", [], "any", false, false, false, 797), "")) : ("")), "js"), "html", null, true);
                    yield "')\">
    <i class=\"fas fa-barcode\"></i>
</button>
                        </div>
                    ";
                }
                // line 802
                yield "                </div>
            ";
            }
            // line 804
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commande'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 805
        yield "
        ";
        // line 806
        if ((($tmp =  !(isset($context["hasFirstOrders"]) || array_key_exists("hasFirstOrders", $context) ? $context["hasFirstOrders"] : (function () { throw new RuntimeError('Variable "hasFirstOrders" does not exist.', 806, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 807
            yield "            <div class=\"alert alert-info mb-0\">Aucune commande envoyée à First Delivery.</div>
        ";
        }
        // line 809
        yield "    </div>
</div>

            <div class=\"delivery-table-card\" id=\"pendingSection\">
        <div class=\"dark-card-header\">
    <span>📦 Commandes à livrer</span>
    <span>";
        // line 815
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalCommandes"]) || array_key_exists("totalCommandes", $context) ? $context["totalCommandes"] : (function () { throw new RuntimeError('Variable "totalCommandes" does not exist.', 815, $this->source); })()), "html", null, true);
        yield " commande(s)</span>
</div>
        <div class=\"dark-card-body\">
            ";
        // line 818
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 818, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
            // line 819
            yield "                <div
                    class=\"commande-card-modern filter-item pending-item\"
                    data-section=\"pending\"
                    data-status=\"en_attente\"
                    data-search=\"";
            // line 823
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((((((("commande #" . CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 823)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 823)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "location", [], "any", false, false, false, 823)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "phone", [], "any", false, false, false, 823))), "html", null, true);
            yield "\"
                >
                    <div class=\"commande-head\">
                        <div class=\"commande-title\">Commande #";
            // line 826
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 826), "html", null, true);
            yield "</div>
                        <span class=\"status-badge status-en_attente\">En attente</span>
                    </div>

                    <div class=\"commande-lines\">
                        <p><strong>👤 Client :</strong> ";
            // line 831
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 831), "html", null, true);
            yield "</p>
                        <p><strong>📍 Adresse :</strong> ";
            // line 832
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "location", [], "any", false, false, false, 832), "html", null, true);
            yield "</p>
                        <p><strong>📞 Téléphone :</strong> ";
            // line 833
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "phone", [], "any", false, false, false, 833), "html", null, true);
            yield "</p>
                        <p><strong>📅 Date :</strong> ";
            // line 834
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "createdAt", [], "any", false, false, false, 834)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "createdAt", [], "any", false, false, false, 834), "d/m/Y H:i"), "html", null, true)) : ("—"));
            yield "</p>
                    </div>

                    <div class=\"inline-form-row\">
    <select class=\"form-select livreur-select\" data-commande-id=\"";
            // line 838
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 838), "html", null, true);
            yield "\">
        <option value=\"\">Choisir un livreur</option>
        ";
            // line 840
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livreurs"]) || array_key_exists("livreurs", $context) ? $context["livreurs"] : (function () { throw new RuntimeError('Variable "livreurs" does not exist.', 840, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livreur"]) {
                // line 841
                yield "            <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 841), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "prenom", [], "any", false, false, false, 841), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "nom", [], "any", false, false, false, 841), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "telephone", [], "any", false, false, false, 841), "html", null, true);
                yield "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livreur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 843
            yield "    </select>

    <button type=\"button\" class=\"action-btn\" onclick=\"assignLivreur(";
            // line 845
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 845), "html", null, true);
            yield ")\">
        <i class=\"fas fa-truck\"></i> Affecter
    </button>

    <button type=\"button\" class=\"action-btn secondary-btn\" onclick=\"sendToFirstDelivery(";
            // line 849
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 849), "html", null, true);
            yield ")\">
        <i class=\"fas fa-paper-plane\"></i> Envoyer société
    </button>
</div>
                </div>
            ";
            $context['_iterated'] = true;
        }
        // line 854
        if (!$context['_iterated']) {
            // line 855
            yield "                <div class=\"empty-box\">Aucune commande à livrer.</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commande'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 857
        yield "        </div>

        <div class=\"pagination-wrap\">
            <div class=\"pagination-info\" id=\"pendingPaginationInfo\">Page 1 of 1</div>
            <div class=\"pagination-buttons\">
                <button type=\"button\" class=\"pagination-btn\" id=\"pendingPrevPageBtn\" onclick=\"changePendingPage(-1)\">Previous</button>
                <button type=\"button\" class=\"pagination-btn\" id=\"pendingNextPageBtn\" onclick=\"changePendingPage(1)\">Next</button>
            </div>
        </div>
    </div>

    <div class=\"delivery-table-card mb-4\" id=\"activeSection\">
        <div class=\"dark-card-header\">
            <span>🚚 Livraisons en cours</span>
            <span>";
        // line 871
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["enCoursCount"]) || array_key_exists("enCoursCount", $context) ? $context["enCoursCount"] : (function () { throw new RuntimeError('Variable "enCoursCount" does not exist.', 871, $this->source); })()), "html", null, true);
        yield " livraison(s)</span>
        </div>
        <div class=\"dark-card-body\">
            ";
        // line 874
        $context["hasActive"] = false;
        // line 875
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 875, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
            // line 876
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 876) == "en_cours")) {
                // line 877
                yield "                    ";
                $context["hasActive"] = true;
                // line 878
                yield "                    <div
                        class=\"commande-card-modern filter-item\"
                        data-section=\"active\"
                        data-status=\"";
                // line 881
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 881), "html", null, true);
                yield "\"
                        data-search=\"";
                // line 882
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((((((("livraison #" . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 882)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 882)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idCommande", [], "any", false, false, false, 882)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivreur", [], "any", false, false, false, 882))), "html", null, true);
                yield "\"
                    >
                        <div class=\"commande-head\">
                            <div class=\"commande-title\">Livraison #";
                // line 885
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 885), "html", null, true);
                yield "</div>
                            <span class=\"status-badge status-en_cours\" id=\"active-badge-";
                // line 886
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 886), "html", null, true);
                yield "\">En cours</span>
                        </div>

                        <div class=\"commande-lines\">
                            <p><strong>📍 Adresse :</strong> ";
                // line 890
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 890), "html", null, true);
                yield "</p>
                            <p><strong>👤 Livreur ID :</strong> #";
                // line 891
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivreur", [], "any", false, false, false, 891), "html", null, true);
                yield "</p>
                            <p><strong>📦 Commande ID :</strong> #";
                // line 892
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idCommande", [], "any", false, false, false, 892), "html", null, true);
                yield "</p>
                        </div>

                        <div class=\"inline-form-row\">
                            <select class=\"form-select status-select\" id=\"active-status-";
                // line 896
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 896), "html", null, true);
                yield "\">
                                <option value=\"en_cours\" selected>En cours</option>
                                <option value=\"livree\">Livrée</option>
                                <option value=\"annulee\">Annulée</option>
                            </select>

                            <button type=\"button\" class=\"action-btn\" onclick=\"updateLivraisonStatus(";
                // line 902
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 902), "html", null, true);
                yield ")\">
                                <i class=\"fas fa-save\"></i> Mettre à jour
                            </button>
                        </div>
                    </div>
                ";
            }
            // line 908
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 909
        yield "
            ";
        // line 910
        if ((($tmp =  !(isset($context["hasActive"]) || array_key_exists("hasActive", $context) ? $context["hasActive"] : (function () { throw new RuntimeError('Variable "hasActive" does not exist.', 910, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 911
            yield "                <div class=\"empty-box\">Aucune livraison en cours.</div>
            ";
        }
        // line 913
        yield "        </div>
    </div>

    <div class=\"delivery-table-card\" id=\"historySection\">
        <div class=\"table-responsive\">
            <table class=\"table delivery-table align-middle\">
                <thead>
                    <tr>
                        <th>ID Livraison</th>
                        <th>Commande #</th>
                        <th>Adresse</th>
                        <th>Livreur ID</th>
                        <th>Statut</th>
                        <th style=\"text-align:right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 930
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 930, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
            // line 931
            yield "                        <tr
                            class=\"history-main-row filter-item\"
                            data-section=\"history\"
                            data-status=\"";
            // line 934
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 934), "html", null, true);
            yield "\"
                            data-search=\"";
            // line 935
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((((((((("livraison #" . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 935)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idCommande", [], "any", false, false, false, 935)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 935)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivreur", [], "any", false, false, false, 935)) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 935))), "html", null, true);
            yield "\"
                        >
                            <td>";
            // line 937
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 937), "html", null, true);
            yield "</td>
                            <td>#";
            // line 938
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idCommande", [], "any", false, false, false, 938), "html", null, true);
            yield "</td>
                            <td>";
            // line 939
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 939), 0, 50), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 939)) > 50)) {
                yield "...";
            }
            yield "</td>
                            <td>#";
            // line 940
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivreur", [], "any", false, false, false, 940), "html", null, true);
            yield "</td>
                            <td>
                                <span class=\"status-badge status-";
            // line 942
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 942), "html", null, true);
            yield "\" id=\"history-badge-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 942), "html", null, true);
            yield "\">
                                    ";
            // line 943
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 943) == "livree")) {
                // line 944
                yield "                                        Livrée
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 945
$context["livraison"], "statutLivraison", [], "any", false, false, false, 945) == "en_cours")) {
                // line 946
                yield "                                        En cours
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 947
$context["livraison"], "statutLivraison", [], "any", false, false, false, 947) == "annulee")) {
                // line 948
                yield "                                        Annulée
                                    ";
            } else {
                // line 950
                yield "                                        En attente
                                    ";
            }
            // line 952
            yield "                                </span>
                            </td>
                            <td style=\"text-align:right;\">
                                <div class=\"d-flex justify-content-end gap-2 flex-wrap\">
                                    <select class=\"form-select form-select-sm status-select\" id=\"history-status-";
            // line 956
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 956), "html", null, true);
            yield "\" style=\"width: 150px;\">
                                        <option value=\"en_attente\" ";
            // line 957
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 957) == "en_attente")) {
                yield "selected";
            }
            yield ">En attente</option>
                                        <option value=\"en_cours\" ";
            // line 958
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 958) == "en_cours")) {
                yield "selected";
            }
            yield ">En cours</option>
                                        <option value=\"livree\" ";
            // line 959
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 959) == "livree")) {
                yield "selected";
            }
            yield ">Livrée</option>
                                        <option value=\"annulee\" ";
            // line 960
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 960) == "annulee")) {
                yield "selected";
            }
            yield ">Annulée</option>
                                    </select>

                                    <button type=\"button\" class=\"action-btn secondary-btn\" onclick=\"updateLivraisonStatus(";
            // line 963
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 963), "html", null, true);
            yield ", 'history')\">
                                        <i class=\"fas fa-save\"></i>
                                    </button>

                                    <button type=\"button\" class=\"action-btn\" onclick=\"toggleHistoryDetails(";
            // line 967
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 967), "html", null, true);
            yield ")\">
                                        <i class=\"fas fa-eye\"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr id=\"history-details-row-";
            // line 974
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 974), "html", null, true);
            yield "\" class=\"history-details-row\">
                            <td colspan=\"6\">
                                <div class=\"details-box-wrap\" id=\"history-details-content-";
            // line 976
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 976), "html", null, true);
            yield "\">
                                    <div class=\"loading-inline\">Clique sur l’œil pour afficher les détails…</div>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 981
        if (!$context['_iterated']) {
            // line 982
            yield "                        <tr>
                            <td colspan=\"6\">
                                <div class=\"empty-box\">Aucune livraison trouvée.</div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 988
        yield "                </tbody>
            </table>
        </div>

        <div class=\"pagination-wrap\">
            <div class=\"pagination-info\" id=\"paginationInfo\">Page 1</div>
            <div class=\"pagination-buttons\">
                <button type=\"button\" class=\"pagination-btn\" id=\"prevPageBtn\" onclick=\"changeHistoryPage(-1)\">Previous</button>
                <button type=\"button\" class=\"pagination-btn\" id=\"nextPageBtn\" onclick=\"changeHistoryPage(1)\">Next</button>
            </div>
        </div>
    </div>
</div>
<div id=\"barcodePackedModal\" style=\"display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center;\">
    <div style=\"width:min(420px, 92vw); background:#fff; border-radius:20px; padding:24px; box-shadow:0 20px 60px rgba(0,0,0,0.25); position:relative;\">
        <button type=\"button\"
                onclick=\"closePackedModal()\"
                style=\"position:absolute; top:12px; right:14px; border:none; background:none; font-size:22px; cursor:pointer;\">
            ×
        </button>

        <h4 style=\"margin:0 0 14px; color:#8B0000; font-weight:800;\">
            <i class=\"fas fa-barcode\"></i> Valider le barcode
        </h4>

        <input type=\"hidden\" id=\"packedCommandeId\">

        <div style=\"margin-bottom:12px; color:#444; font-weight:600;\">
            Colle le barcode reçu de First Delivery
        </div>

        <input type=\"text\"
               id=\"packedBarcodeInput\"
               class=\"form-control\"
               placeholder=\"Entrer le barcode...\"
               style=\"height:48px; border-radius:12px; margin-bottom:14px;\">

        <div id=\"packedAnimationBox\" style=\"display:none; text-align:center; padding:18px 12px; border-radius:14px; background:#fff7f2; margin-bottom:14px;\">
            <div style=\"font-size:30px; margin-bottom:10px;\">📦</div>
            <div id=\"packedAnimationText\" style=\"font-weight:800; color:#8B0000;\">
                Statut en cours...
            </div>
        </div>

        <div class=\"d-flex gap-2\">
            <button type=\"button\"
                    class=\"action-btn\"
                    style=\"flex:1;\"
                    onclick=\"confirmPackedStatus()\">
                <i class=\"fas fa-check\"></i> Valider
            </button>

            <button type=\"button\"
                    class=\"action-btn secondary-btn\"
                    style=\"flex:1;\"
                    onclick=\"closePackedModal()\">
                Annuler
            </button>
        </div>
    </div>
</div>
<script>
   let historyCurrentPage = 1;
let pendingCurrentPage = 1;

const historyRowsPerPage = 5;
const pendingRowsPerPage = 5;

    function resetDeliveryFilters() {
    document.getElementById('deliverySearchInput').value = '';
    document.getElementById('deliveryStatusFilter').value = '';
    document.getElementById('deliverySectionFilter').value = '';
    historyCurrentPage = 1;
    pendingCurrentPage = 1;
    applyDeliveryFilters();
}

    function applyDeliveryFilters() {
    const search = document.getElementById('deliverySearchInput').value.toLowerCase().trim();
    const status = document.getElementById('deliveryStatusFilter').value;
    const section = document.getElementById('deliverySectionFilter').value;

    document.querySelectorAll('.filter-item').forEach(item => {
        const itemSearch = item.dataset.search || '';
        const itemStatus = item.dataset.status || '';
        const itemSection = item.dataset.section || '';

        const matchesSearch = !search || itemSearch.includes(search);
        const matchesStatus = !status || itemStatus === status;
        const matchesSection = !section || itemSection === section;

        item.dataset.visibleMatch = (matchesSearch && matchesStatus && matchesSection) ? '1' : '0';

        if (!item.classList.contains('history-main-row') && !item.classList.contains('pending-item')) {
            item.style.display = (matchesSearch && matchesStatus && matchesSection) ? '' : 'none';
        }
    });

    document.getElementById('pendingSection').style.display = (!section || section === 'pending') ? '' : 'none';
    document.getElementById('activeSection').style.display = (!section || section === 'active') ? '' : 'none';
    document.getElementById('historySection').style.display = (!section || section === 'history') ? '' : 'none';

    historyCurrentPage = 1;
    pendingCurrentPage = 1;

    applyPendingPagination();
    applyHistoryPagination();
}

    function applyHistoryPagination() {
        const historyRows = Array.from(document.querySelectorAll('.history-main-row'));
        const visibleRows = historyRows.filter(row => row.dataset.visibleMatch !== '0');

        historyRows.forEach(row => {
            row.style.display = 'none';
            const livraisonId = row.querySelector('[id^=\"history-badge-\"]')?.id?.replace('history-badge-', '');
            if (livraisonId) {
                const detailsRow = document.getElementById('history-details-row-' + livraisonId);
                if (detailsRow) {
                    detailsRow.style.display = 'none';
                    detailsRow.classList.remove('open');
                }
            }
        });

        const totalPages = Math.max(1, Math.ceil(visibleRows.length / historyRowsPerPage));
        if (historyCurrentPage > totalPages) {
            historyCurrentPage = totalPages;
        }

        const start = (historyCurrentPage - 1) * historyRowsPerPage;
        const end = start + historyRowsPerPage;
        const currentRows = visibleRows.slice(start, end);

        currentRows.forEach(row => {
            row.style.display = '';
        });

        const info = document.getElementById('paginationInfo');
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');

        if (info) {
            info.textContent = 'Page ' + historyCurrentPage + ' of ' + totalPages;
        }

        if (prevBtn) {
            prevBtn.disabled = historyCurrentPage <= 1;
        }

        if (nextBtn) {
            nextBtn.disabled = historyCurrentPage >= totalPages;
        }
    }

    function changeHistoryPage(direction) {
        const historyRows = Array.from(document.querySelectorAll('.history-main-row'));
        const visibleRows = historyRows.filter(row => row.dataset.visibleMatch !== '0');
        const totalPages = Math.max(1, Math.ceil(visibleRows.length / historyRowsPerPage));

        historyCurrentPage += direction;

        if (historyCurrentPage < 1) historyCurrentPage = 1;
        if (historyCurrentPage > totalPages) historyCurrentPage = totalPages;

        applyHistoryPagination();
    }

    document.getElementById('deliverySearchInput').addEventListener('input', applyDeliveryFilters);
    document.getElementById('deliveryStatusFilter').addEventListener('change', applyDeliveryFilters);
    document.getElementById('deliverySectionFilter').addEventListener('change', applyDeliveryFilters);

    function assignLivreur(commandeId) {
        const select = document.querySelector('.livreur-select[data-commande-id=\"' + commandeId + '\"]');

        if (!select || !select.value) {
            alert('Choisir un livreur.');
            return;
        }

        const formData = new FormData();
        formData.append('livreur_id', select.value);

        fetch('";
        // line 1171
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_affecter", ["id" => 0]);
        yield "'.replace('/0', '/' + commandeId), {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur serveur');
            }
            return response.text();
        })
        .then(data => {
    try {
        const parsed = typeof data === 'string' ? JSON.parse(data) : data;

        if (parsed.stats) {
            refreshDashboardStats(parsed.stats);
        }

        if (parsed.averageDeliveryTime) {
            refreshAverageDelivery(parsed.averageDeliveryTime);
        }
    } catch (e) {}

    const pendingCard = document.querySelector('.livreur-select[data-commande-id=\"' + commandeId + '\"]')?.closest('.pending-item');
    if (pendingCard) {
        pendingCard.remove();
        applyPendingPagination();
    }
})
        .catch(() => {
            alert('Erreur lors de l’affectation du livreur.');
        });
    }

    function updateLivraisonStatus(livraisonId, prefix = 'active') {
    const selectId = prefix === 'history' ? 'history-status-' + livraisonId : 'active-status-' + livraisonId;
    const badgeId = prefix === 'history' ? 'history-badge-' + livraisonId : 'active-badge-' + livraisonId;

    const select = document.getElementById(selectId);
    const badge = document.getElementById(badgeId);

    if (!select) {
        alert('Sélecteur de statut introuvable.');
        return;
    }

    const formData = new FormData();
    formData.append('status', select.value);

    fetch('/admin/livraisons/status/' + livraisonId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Réponse non JSON:', text);
            throw new Error('Le serveur ne retourne pas un JSON valide.');
        }

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur');
        }

        return data;
    })
    .then(data => {
        if (!data.success) {
            alert(data.message || 'Erreur.');
            return;
        }

        if (badge) {
            badge.className = 'status-badge status-' + data.newStatus;
            badge.textContent = data.badgeLabel;
        }

        if (data.stats) {
            refreshDashboardStats(data.stats);
        }

        if (data.averageDeliveryTime) {
            refreshAverageDelivery(data.averageDeliveryTime);
        }

        if (prefix === 'active' && (data.newStatus === 'livree' || data.newStatus === 'annulee')) {
            const activeBadge = document.getElementById('active-badge-' + livraisonId);
            const activeCard = activeBadge ? activeBadge.closest('.commande-card-modern') : null;

            if (activeCard) {
                activeCard.remove();
            }
        }

        applyPendingPagination();
        applyHistoryPagination();
    })
    .catch(error => {
        console.error('Erreur updateLivraisonStatus:', error);
        alert(error.message || 'Erreur lors de la mise à jour du statut.');
    });
}

    function toggleHistoryDetails(livraisonId) {
        const row = document.getElementById('history-details-row-' + livraisonId);
        const content = document.getElementById('history-details-content-' + livraisonId);

        if (!row || !content) {
            return;
        }

        if (row.classList.contains('open')) {
            row.classList.remove('open');
            row.style.display = 'none';
            return;
        }

        document.querySelectorAll('.history-details-row.open').forEach(el => {
            el.classList.remove('open');
            el.style.display = 'none';
        });

        row.classList.add('open');
        row.style.display = 'table-row';

        if (content.dataset.loaded === '1') {
            return;
        }

        content.innerHTML = '<div class=\"loading-inline\">Chargement des détails...</div>';

        fetch('/admin/livraisons/details/' + livraisonId, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur serveur');
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                content.innerHTML = '<div class=\"alert alert-danger mb-0\">' + (data.message || 'Erreur.') + '</div>';
                return;
            }

            content.innerHTML = data.html;
            content.dataset.loaded = '1';
        })
        .catch(() => {
            content.innerHTML = '<div class=\"alert alert-danger mb-0\">Erreur réseau ou serveur.</div>';
        });
    }
    function applyPendingPagination() {
    const pendingItems = Array.from(document.querySelectorAll('.pending-item'));
    const visibleItems = pendingItems.filter(item => item.dataset.visibleMatch !== '0');

    pendingItems.forEach(item => {
        item.style.display = 'none';
    });

    const totalPages = Math.max(1, Math.ceil(visibleItems.length / pendingRowsPerPage));

    if (pendingCurrentPage > totalPages) {
        pendingCurrentPage = totalPages;
    }

    const start = (pendingCurrentPage - 1) * pendingRowsPerPage;
    const end = start + pendingRowsPerPage;
    const currentItems = visibleItems.slice(start, end);

    currentItems.forEach(item => {
        item.style.display = '';
    });

    const info = document.getElementById('pendingPaginationInfo');
    const prevBtn = document.getElementById('pendingPrevPageBtn');
    const nextBtn = document.getElementById('pendingNextPageBtn');

    if (info) {
        info.textContent = 'Page ' + pendingCurrentPage + ' of ' + totalPages;
    }

    if (prevBtn) {
        prevBtn.disabled = pendingCurrentPage <= 1;
    }

    if (nextBtn) {
        nextBtn.disabled = pendingCurrentPage >= totalPages;
    }
}

function changePendingPage(direction) {
    const pendingItems = Array.from(document.querySelectorAll('.pending-item'));
    const visibleItems = pendingItems.filter(item => item.dataset.visibleMatch !== '0');
    const totalPages = Math.max(1, Math.ceil(visibleItems.length / pendingRowsPerPage));

    pendingCurrentPage += direction;

    if (pendingCurrentPage < 1) pendingCurrentPage = 1;
    if (pendingCurrentPage > totalPages) pendingCurrentPage = totalPages;

    applyPendingPagination();
}
function refreshDashboardStats(stats) {
    const elLivreurs = document.getElementById('stat-livreurs');
    const elCommandes = document.getElementById('stat-commandes');
    const elLivrees = document.getElementById('stat-livrees');
    const elEncours = document.getElementById('stat-encours');

    const elDeliveredTop = document.getElementById('deliveredPercentTextTop');
    const elAttenteTop = document.getElementById('attenteCountTop');

    const elDeliveredLegend = document.getElementById('deliveredPercentLegend');
    const elPendingLegend = document.getElementById('pendingPercentLegend');

    const elDeliveredBar = document.getElementById('deliveredBar');
    const elPendingBar = document.getElementById('pendingBar');

    const elDeliveredBarText = document.getElementById('deliveredPercentBar');
    const elPendingBarText = document.getElementById('pendingPercentBar');

    if (elLivreurs) elLivreurs.textContent = stats.total_livreurs;
    if (elCommandes) elCommandes.textContent = stats.total_commandes;
    if (elLivrees) elLivrees.textContent = stats.livrees;
    if (elEncours) elEncours.textContent = stats.en_cours;

    if (elDeliveredTop) elDeliveredTop.textContent = stats.delivered_percent;
    if (elAttenteTop) elAttenteTop.textContent = stats.attente;

    if (elDeliveredLegend) elDeliveredLegend.textContent = stats.delivered_percent + '%';
    if (elPendingLegend) elPendingLegend.textContent = stats.pending_percent + '%';

    if (elDeliveredBar) elDeliveredBar.style.width = stats.delivered_percent + '%';
    if (elPendingBar) elPendingBar.style.width = stats.pending_percent + '%';

    if (elDeliveredBarText) elDeliveredBarText.textContent = stats.delivered_percent + '%';
    if (elPendingBarText) elPendingBarText.textContent = stats.pending_percent + '%';
}

function refreshAverageDelivery(value) {
    const avg = document.getElementById('avgDeliveryTime');
    if (avg) {
        avg.textContent = value;
    }
}
function sendToFirstDelivery(commandeId) {
    const formData = new FormData();

    fetch('/admin/livraisons/send-first-delivery/' + commandeId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
    console.error('Réponse brute du serveur:', text);
    alert(text);
    throw new Error('Réponse serveur invalide.');
}

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur.');
        }

        return data;
    })
    .then(data => {
        alert(data.message || 'Commande envoyée avec succès.');
        console.log('Barcode:', data.barCode);
        console.log('Print link:', data.printLink);
    })
    .catch(error => {
        console.error('Erreur sendToFirstDelivery:', error);
        alert(error.message || 'Erreur lors de l’envoi.');
    });
}
function cancelFirstDelivery(commandeId) {
    fetch('/admin/livraisons/cancel-first-delivery/' + commandeId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Réponse brute du serveur:', text);
            throw new Error('Réponse serveur invalide.');
        }

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur.');
        }

        return data;
    })
    .then(data => {
        alert(data.message || 'Commande annulée.');
        window.location.reload();
    })
    .catch(error => {
        console.error('Erreur cancelFirstDelivery:', error);
        alert(error.message || 'Erreur lors de l’annulation.');
    });
}
function openPackedModal(commandeId, barcode) {
    document.getElementById('packedCommandeId').value = commandeId;
    document.getElementById('packedBarcodeInput').value = barcode || '';
    document.getElementById('packedAnimationBox').style.display = 'none';
    document.getElementById('barcodePackedModal').style.display = 'flex';
}

function closePackedModal() {
    document.getElementById('barcodePackedModal').style.display = 'none';
}

function confirmPackedStatus() {
    const commandeId = document.getElementById('packedCommandeId').value;
    const barcodeInput = document.getElementById('packedBarcodeInput').value.trim();
    const animationBox = document.getElementById('packedAnimationBox');
    const animationText = document.getElementById('packedAnimationText');

    if (!barcodeInput) {
        alert('Entre un barcode.');
        return;
    }

    animationBox.style.display = 'block';
    animationText.textContent = 'Vérification du barcode...';

    setTimeout(() => {
        animationText.textContent = 'Statut: sent';
    }, 500);

    setTimeout(() => {
        animationText.textContent = 'Transition vers packed...';
    }, 1100);

    setTimeout(() => {
        const badge = document.getElementById('first-status-badge-' + commandeId);

        if (badge) {
            badge.textContent = 'packed';
            badge.className = 'status-badge status-livree';
        }

        closePackedModal();
        alert('Commande passée de sent à packed.');
    }, 1800);
}
   document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.history-main-row').forEach(row => {
        row.dataset.visibleMatch = '1';
    });

    document.querySelectorAll('.pending-item').forEach(item => {
        item.dataset.visibleMatch = '1';
    });

    applyPendingPagination();
    applyHistoryPagination();
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
        return "admin_livraisons/index.html.twig";
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
        return array (  1624 => 1171,  1439 => 988,  1428 => 982,  1426 => 981,  1416 => 976,  1411 => 974,  1401 => 967,  1394 => 963,  1386 => 960,  1380 => 959,  1374 => 958,  1368 => 957,  1364 => 956,  1358 => 952,  1354 => 950,  1350 => 948,  1348 => 947,  1345 => 946,  1343 => 945,  1340 => 944,  1338 => 943,  1332 => 942,  1327 => 940,  1320 => 939,  1316 => 938,  1312 => 937,  1307 => 935,  1303 => 934,  1298 => 931,  1293 => 930,  1274 => 913,  1270 => 911,  1268 => 910,  1265 => 909,  1259 => 908,  1250 => 902,  1241 => 896,  1234 => 892,  1230 => 891,  1226 => 890,  1219 => 886,  1215 => 885,  1209 => 882,  1205 => 881,  1200 => 878,  1197 => 877,  1194 => 876,  1189 => 875,  1187 => 874,  1181 => 871,  1165 => 857,  1158 => 855,  1156 => 854,  1146 => 849,  1139 => 845,  1135 => 843,  1120 => 841,  1116 => 840,  1111 => 838,  1104 => 834,  1100 => 833,  1096 => 832,  1092 => 831,  1084 => 826,  1078 => 823,  1072 => 819,  1067 => 818,  1061 => 815,  1053 => 809,  1049 => 807,  1047 => 806,  1044 => 805,  1038 => 804,  1034 => 802,  1024 => 797,  1016 => 792,  1008 => 787,  1005 => 786,  1003 => 785,  999 => 783,  995 => 781,  989 => 779,  987 => 778,  980 => 774,  972 => 769,  963 => 763,  959 => 762,  955 => 761,  951 => 760,  947 => 758,  944 => 757,  941 => 756,  937 => 755,  934 => 754,  932 => 753,  882 => 706,  864 => 691,  860 => 690,  855 => 688,  851 => 687,  844 => 683,  840 => 682,  833 => 678,  822 => 670,  818 => 669,  810 => 664,  806 => 663,  797 => 657,  788 => 651,  773 => 638,  771 => 637,  769 => 636,  766 => 635,  759 => 633,  756 => 632,  753 => 631,  750 => 630,  747 => 629,  744 => 628,  741 => 627,  738 => 626,  735 => 625,  731 => 624,  728 => 623,  726 => 622,  724 => 621,  722 => 620,  720 => 619,  717 => 618,  715 => 617,  713 => 616,  711 => 615,  701 => 614,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des livraisons{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
.barcode-btn {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #8B0000, #B22222);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 6px 18px rgba(139, 0, 0, 0.25);
}

.barcode-btn i {
    font-size: 18px;
}

.barcode-btn:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.35);
}

.barcode-btn:active {
    transform: scale(0.95);
}
    .delivery-shell {
        color: #2c1a1d;
    }

    .delivery-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .delivery-topbar h3 {
        margin: 0;
        font-weight: 800;
        color: #000;
    }

    .btn-livreur {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.18);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-livreur:hover {
        color: white;
        transform: translateY(-2px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        border-radius: 22px;
        padding: 22px;
        color: #fff;
        position: relative;
        overflow: hidden;
        min-height: 145px;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.16);
    }

    .stat-card::after {
        content: \"\";
        position: absolute;
        width: 180px;
        height: 180px;
        right: -60px;
        top: -40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }

    .stat-bordeaux,
    .stat-blue,
    .stat-green,
    .stat-red {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .stat-title {
        font-size: 15px;
        color: rgba(255,255,255,0.92);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .stat-value {
        font-size: 38px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 10px;
    }

    .stat-subvalue {
        font-size: 14px;
        font-weight: 700;
        opacity: 0.95;
    }

    .top-dashboard-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .dark-card {
        background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.15);
    }

    .dark-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        color: #fff;
        font-weight: 800;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .dark-card-body {
        padding: 20px;
        color: #fff;
    }

    .performance-legend {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .performance-bar {
        width: 100%;
        height: 44px;
        background: rgba(255,255,255,0.10);
        border-radius: 999px;
        overflow: hidden;
        display: flex;
    }

    .performance-delivered {
        height: 100%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        display: flex;
        align-items: center;
        color: #fff;
        font-weight: 800;
        padding-left: 14px;
        transition: width 0.35s ease;
        white-space: nowrap;
    }

    .performance-pending {
        height: 100%;
        background: #f3d6d6;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: #8B0000;
        font-weight: 800;
        padding-right: 14px;
        transition: width 0.35s ease;
        white-space: nowrap;
    }

    .gauge-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 260px;
        position: relative;
    }

    .gauge {
        width: 250px;
        height: 125px;
        border-top-left-radius: 250px;
        border-top-right-radius: 250px;
        border: 20px solid #f4e6e6;
        border-bottom: 0;
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
    }

    .gauge::before {
        content: \"\";
        position: absolute;
        left: 50%;
        bottom: -20px;
        transform: translateX(-50%);
        width: 180px;
        height: 90px;
        background: #441616;
        border-top-left-radius: 180px;
        border-top-right-radius: 180px;
    }

    .gauge-text {
        position: absolute;
        text-align: center;
        top: 56%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .gauge-text .big {
        font-size: 40px;
        font-weight: 900;
        line-height: 1;
        color: #fff;
    }

    .gauge-text .small {
        font-size: 14px;
        color: #f6dddd;
        margin-top: 6px;
        font-weight: 700;
    }

    .gauge-dot {
        position: absolute;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .gauge-dot.left {
        left: 14%;
        bottom: 23%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .gauge-dot.right {
        right: 14%;
        bottom: 23%;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
    }

    .filters-card {
        background: #fff7f2;
        border: 1px solid #ead9d2;
        border-radius: 20px;
        padding: 18px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.06);
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

    .btn-reset {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
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

    .btn-reset:hover {
        color: #fff;
        opacity: 0.95;
    }

    .main-grid {
        display: grid;
        grid-template-columns: 1fr 1.25fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .panel-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--beige-fonce);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.06);
    }

    .panel-header {
        padding: 18px 20px;
        border-bottom: 1px solid var(--beige-fonce);
        font-size: 20px;
        font-weight: 800;
        color: var(--bordeaux);
        background: #fff;
    }

    .panel-body {
        padding: 20px;
    }

    .livreur-card {
        background: #fff7f2;
        border-radius: 16px;
        padding: 15px;
        margin-bottom: 14px;
        border: 1px solid var(--beige-fonce);
        transition: all 0.3s ease;
    }

    .livreur-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .livreur-dispo {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
    }

    .disponible { background: #4CAF50; }
    .indisponible { background: #f44336; }

    .small-muted {
        color: #7a5a4a;
        font-size: 13px;
    }

    .delivery-table-card {
        background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(139, 0, 0, 0.15);
    }

    .delivery-table {
        margin: 0;
        color: #fff;
    }

    .delivery-table thead th {
        background: #7b1e2b;
        color: #fff;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        padding: 16px 14px;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .delivery-table td {
        padding: 15px 14px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .delivery-table tbody tr:hover {
        background: rgba(255,255,255,0.02);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
    }

    .status-en_cours { background: #FF9800; color: white; }
    .status-livree { background: #4CAF50; color: white; }
    .status-en_attente { background: #2196F3; color: white; }
    .status-annulee { background: #9E9E9E; color: white; }

    .commande-card-modern {
        background: rgba(255,255,255,0.06);
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(255,255,255,0.08);
        margin-bottom: 14px;
        color: #fff;
    }

    .commande-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .commande-title {
        font-weight: 800;
        font-size: 17px;
    }

    .commande-lines p {
        margin-bottom: 7px;
        color: #f0dede;
    }

    .commande-lines strong {
        color: #fff;
    }

    .inline-form-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .inline-form-row .form-select {
        min-width: 220px;
        border-radius: 12px;
        height: 44px;
        border: 1px solid rgba(255,255,255,0.12);
        background: rgba(255,255,255,0.08);
        color: #fff;
    }

    .action-btn {
        border: none;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 800;
        color: #fff;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        transition: all 0.25s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .secondary-btn {
        background: linear-gradient(135deg, #7a1b1b, #9c2b2b);
    }

    .history-details-row {
        display: none;
        background: rgba(255,255,255,0.03);
    }

    .history-details-row.open {
        display: table-row;
    }

    .details-box-wrap {
        padding: 18px 0 6px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 14px;
    }

    .detail-box {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 14px;
    }

    .detail-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #f0dede;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .detail-value {
        color: #fff;
        font-weight: 800;
        word-break: break-word;
    }

    .loading-inline {
        color: #f0dede;
        font-weight: 700;
    }

    .empty-box {
        text-align: center;
        padding: 40px 20px;
        color: #8a6a60;
    }

    .pagination-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 18px 20px;
        border-top: 1px solid rgba(255,255,255,0.08);
        flex-wrap: wrap;
    }

    .pagination-info {
        color: #fff;
        font-weight: 700;
    }

    .pagination-buttons {
        display: flex;
        gap: 10px;
    }

    .pagination-btn {
        border: none;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 800;
        color: #fff;
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        transition: all 0.25s ease;
    }

    .pagination-btn:hover:not(:disabled) {
        transform: translateY(-2px);
    }

    .pagination-btn:disabled {
        opacity: 0.45;
        cursor: not-allowed;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .top-dashboard-grid,
        .main-grid {
            grid-template-columns: 1fr;
        }

        .details-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
{% endblock %}

{% block admin_content %}
{% set totalLivreurs = livreurs|length %}
{% set totalCommandes = commandes|length %}
{% set totalLivraisons = livraisons|length %}

{% set enCoursCount = 0 %}
{% set livreeCount = 0 %}
{% set attenteCount = 0 %}
{% set annuleeCount = 0 %}

{% for livraison in livraisons %}
    {% if livraison.statutLivraison == 'en_cours' %}
        {% set enCoursCount = enCoursCount + 1 %}
    {% elseif livraison.statutLivraison == 'livree' %}
        {% set livreeCount = livreeCount + 1 %}
    {% elseif livraison.statutLivraison == 'annulee' %}
        {% set annuleeCount = annuleeCount + 1 %}
    {% else %}
        {% set attenteCount = attenteCount + 1 %}
    {% endif %}
{% endfor %}

{% set deliveredPercent = totalLivraisons > 0 ? ((livreeCount / totalLivraisons) * 100)|round(1) : 0 %}
{% set pendingPercent = totalLivraisons > 0 ? (((enCoursCount + attenteCount) / totalLivraisons) * 100)|round(1) : 0 %}

<div class=\"delivery-shell\">
    <div class=\"delivery-topbar\">
        <h3>🚚 Gestion des livraisons</h3>
        <button type=\"button\" class=\"btn-livreur\">
            <i class=\"fas fa-user-plus\"></i> Ajouter un livreur
        </button>
        
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card stat-bordeaux\">
    <div class=\"stat-title\">Livreurs disponibles</div>
    <div class=\"stat-value\" id=\"stat-livreurs\">{{ totalLivreurs }}</div>
    <div class=\"stat-subvalue\">Gestion rapide des affectations</div>
</div>

<div class=\"stat-card stat-blue\">
    <div class=\"stat-title\">Commandes à livrer</div>
    <div class=\"stat-value\" id=\"stat-commandes\">{{ totalCommandes }}</div>
    <div class=\"stat-subvalue\">En attente d'affectation</div>
</div>

<div class=\"stat-card stat-green\">
    <div class=\"stat-title\">Livraisons livrées</div>
    <div class=\"stat-value\" id=\"stat-livrees\">{{ livreeCount }}</div>
    <div class=\"stat-subvalue\"><span id=\"deliveredPercentTextTop\">{{ deliveredPercent }}</span>% du total</div>
</div>

<div class=\"stat-card stat-red\">
    <div class=\"stat-title\">Livraisons en cours</div>
    <div class=\"stat-value\" id=\"stat-encours\">{{ enCoursCount }}</div>
    <div class=\"stat-subvalue\"><span id=\"attenteCountTop\">{{ attenteCount }}</span> en attente</div>
</div>
    </div>

    <div class=\"top-dashboard-grid\">
        <div class=\"dark-card\">
            <div class=\"dark-card-header\">
                <span>Delivery performance</span>
                <span>{{ totalLivraisons }} livraisons</span>
            </div>
            <div class=\"dark-card-body\">
                <div class=\"performance-legend\">
    <div>Livrées <strong id=\"deliveredPercentLegend\">{{ deliveredPercent }}%</strong></div>
    <div>En cours / attente <strong id=\"pendingPercentLegend\">{{ pendingPercent }}%</strong></div>
</div>

<div class=\"performance-bar\">
    <div class=\"performance-delivered\" id=\"deliveredBar\" style=\"width: {{ deliveredPercent }}%\">
        <span id=\"deliveredPercentBar\">{{ deliveredPercent }}%</span>
    </div>
    <div class=\"performance-pending\" id=\"pendingBar\" style=\"width: {{ pendingPercent }}%\">
        <span id=\"pendingPercentBar\">{{ pendingPercent }}%</span>
    </div>
</div>
            </div>
        </div>

        <div class=\"dark-card\">
            <div class=\"dark-card-header\">
                <span>Average Delivery Time</span>
                <span>Vue rapide</span>
            </div>
            <div class=\"dark-card-body\">
                <div class=\"gauge-wrap\">
                    <div class=\"gauge\"></div>
                    <div class=\"gauge-text\">
    <div class=\"big\" id=\"avgDeliveryTime\">{{ averageDeliveryTime|default('0h 0m') }}</div>
    <div class=\"small\">Temps moyen réel</div>
</div>
                    <div class=\"gauge-dot left\"><i class=\"fas fa-truck\"></i></div>
                    <div class=\"gauge-dot right\"><i class=\"fas fa-box\"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"filters-card\">
        <div class=\"row g-3\">
            <div class=\"col-lg-4\">
                <input type=\"text\" id=\"deliverySearchInput\" class=\"form-control\" placeholder=\"Rechercher client, téléphone, adresse, commande...\">
            </div>

            <div class=\"col-lg-3\">
                <select id=\"deliveryStatusFilter\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"en_attente\">En attente</option>
                    <option value=\"en_cours\">En cours</option>
                    <option value=\"livree\">Livrée</option>
                    <option value=\"annulee\">Annulée</option>
                </select>
            </div>

            <div class=\"col-lg-3\">
                <select id=\"deliverySectionFilter\" class=\"form-select\">
                    <option value=\"\">Toutes les sections</option>
                    <option value=\"pending\">Commandes à livrer</option>
                    <option value=\"active\">Livraisons en cours</option>
                    <option value=\"history\">Historique</option>
                </select>
            </div>

            <div class=\"col-lg-2\">
                <button type=\"button\" class=\"btn-reset\" onclick=\"resetDeliveryFilters()\">
                    <i class=\"fas fa-undo\"></i>&nbsp; Reset
                </button>
            </div>
        </div>
    </div>

    <div class=\"main-grid\">
        <div class=\"panel-card\">
    <div class=\"panel-header\">📦 Commandes envoyées à First Delivery</div>
    <div class=\"panel-body\">
        {% set hasFirstOrders = false %}

        {% for commande in allCommandes %}
            {% if commande.fdgStatus is defined and commande.fdgStatus %}
                {% set hasFirstOrders = true %}
                <div class=\"livreur-card\">
                    <div class=\"d-flex justify-content-between align-items-center mb-2\">
                        <strong>Commande #{{ commande.id }}</strong>
                        <span id=\"first-status-badge-{{ commande.id }}\"
      class=\"status-badge {{ commande.fdgStatus == 'sent' ? 'status-en_cours' : (commande.fdgStatus == 'packed' ? 'status-livree' : 'status-en_attente') }}\">
    {{ commande.fdgStatus }}
</span>
                    </div>

                    <p class=\"small mb-1\">
                        <i class=\"fas fa-user\"></i>
                        {{ commande.customerName ?? 'Client' }}
                    </p>

                    <p class=\"small mb-1\">
                        <i class=\"fas fa-phone\"></i>
                        {{ commande.phone ?? '—' }}
                    </p>

                    <div class=\"small-muted\">
                        {% if commande.fdgBarcode is defined and commande.fdgBarcode %}
                            Barcode: {{ commande.fdgBarcode }}
                        {% else %}
                            Pas encore de barcode
                        {% endif %}
                    </div>

                    {% if commande.fdgPrintLink is defined and commande.fdgPrintLink %}
                        <div class=\"mt-2\">
                            <a href=\"{{ commande.fdgPrintLink }}\" target=\"_blank\" class=\"btn-reset\" style=\"height: 40px; width: auto; padding: 8px 14px;\">
                                <i class=\"fas fa-print\"></i>&nbsp; Imprimer
                            </a>
                            <button type=\"button\"
        class=\"action-btn secondary-btn\"
        onclick=\"cancelFirstDelivery({{ commande.id }})\">
    <i class=\"fas fa-times\"></i> Annuler First
</button>
<button type=\"button\"
        class=\"barcode-btn\"
        onclick=\"openPackedModal({{ commande.id }}, '{{ commande.fdgBarcode|default('')|e('js') }}')\">
    <i class=\"fas fa-barcode\"></i>
</button>
                        </div>
                    {% endif %}
                </div>
            {% endif %}
        {% endfor %}

        {% if not hasFirstOrders %}
            <div class=\"alert alert-info mb-0\">Aucune commande envoyée à First Delivery.</div>
        {% endif %}
    </div>
</div>

            <div class=\"delivery-table-card\" id=\"pendingSection\">
        <div class=\"dark-card-header\">
    <span>📦 Commandes à livrer</span>
    <span>{{ totalCommandes }} commande(s)</span>
</div>
        <div class=\"dark-card-body\">
            {% for commande in commandes %}
                <div
                    class=\"commande-card-modern filter-item pending-item\"
                    data-section=\"pending\"
                    data-status=\"en_attente\"
                    data-search=\"{{ ('commande #' ~ commande.id ~ ' ' ~ commande.customerName ~ ' ' ~ commande.location ~ ' ' ~ commande.phone)|lower }}\"
                >
                    <div class=\"commande-head\">
                        <div class=\"commande-title\">Commande #{{ commande.id }}</div>
                        <span class=\"status-badge status-en_attente\">En attente</span>
                    </div>

                    <div class=\"commande-lines\">
                        <p><strong>👤 Client :</strong> {{ commande.customerName }}</p>
                        <p><strong>📍 Adresse :</strong> {{ commande.location }}</p>
                        <p><strong>📞 Téléphone :</strong> {{ commande.phone }}</p>
                        <p><strong>📅 Date :</strong> {{ commande.createdAt ? commande.createdAt|date('d/m/Y H:i') : '—' }}</p>
                    </div>

                    <div class=\"inline-form-row\">
    <select class=\"form-select livreur-select\" data-commande-id=\"{{ commande.id }}\">
        <option value=\"\">Choisir un livreur</option>
        {% for livreur in livreurs %}
            <option value=\"{{ livreur.idLivreur }}\">{{ livreur.prenom }} {{ livreur.nom }} - {{ livreur.telephone }}</option>
        {% endfor %}
    </select>

    <button type=\"button\" class=\"action-btn\" onclick=\"assignLivreur({{ commande.id }})\">
        <i class=\"fas fa-truck\"></i> Affecter
    </button>

    <button type=\"button\" class=\"action-btn secondary-btn\" onclick=\"sendToFirstDelivery({{ commande.id }})\">
        <i class=\"fas fa-paper-plane\"></i> Envoyer société
    </button>
</div>
                </div>
            {% else %}
                <div class=\"empty-box\">Aucune commande à livrer.</div>
            {% endfor %}
        </div>

        <div class=\"pagination-wrap\">
            <div class=\"pagination-info\" id=\"pendingPaginationInfo\">Page 1 of 1</div>
            <div class=\"pagination-buttons\">
                <button type=\"button\" class=\"pagination-btn\" id=\"pendingPrevPageBtn\" onclick=\"changePendingPage(-1)\">Previous</button>
                <button type=\"button\" class=\"pagination-btn\" id=\"pendingNextPageBtn\" onclick=\"changePendingPage(1)\">Next</button>
            </div>
        </div>
    </div>

    <div class=\"delivery-table-card mb-4\" id=\"activeSection\">
        <div class=\"dark-card-header\">
            <span>🚚 Livraisons en cours</span>
            <span>{{ enCoursCount }} livraison(s)</span>
        </div>
        <div class=\"dark-card-body\">
            {% set hasActive = false %}
            {% for livraison in livraisons %}
                {% if livraison.statutLivraison == 'en_cours' %}
                    {% set hasActive = true %}
                    <div
                        class=\"commande-card-modern filter-item\"
                        data-section=\"active\"
                        data-status=\"{{ livraison.statutLivraison }}\"
                        data-search=\"{{ ('livraison #' ~ livraison.idLivraison ~ ' ' ~ livraison.adresse ~ ' ' ~ livraison.idCommande ~ ' ' ~ livraison.idLivreur)|lower }}\"
                    >
                        <div class=\"commande-head\">
                            <div class=\"commande-title\">Livraison #{{ livraison.idLivraison }}</div>
                            <span class=\"status-badge status-en_cours\" id=\"active-badge-{{ livraison.idLivraison }}\">En cours</span>
                        </div>

                        <div class=\"commande-lines\">
                            <p><strong>📍 Adresse :</strong> {{ livraison.adresse }}</p>
                            <p><strong>👤 Livreur ID :</strong> #{{ livraison.idLivreur }}</p>
                            <p><strong>📦 Commande ID :</strong> #{{ livraison.idCommande }}</p>
                        </div>

                        <div class=\"inline-form-row\">
                            <select class=\"form-select status-select\" id=\"active-status-{{ livraison.idLivraison }}\">
                                <option value=\"en_cours\" selected>En cours</option>
                                <option value=\"livree\">Livrée</option>
                                <option value=\"annulee\">Annulée</option>
                            </select>

                            <button type=\"button\" class=\"action-btn\" onclick=\"updateLivraisonStatus({{ livraison.idLivraison }})\">
                                <i class=\"fas fa-save\"></i> Mettre à jour
                            </button>
                        </div>
                    </div>
                {% endif %}
            {% endfor %}

            {% if not hasActive %}
                <div class=\"empty-box\">Aucune livraison en cours.</div>
            {% endif %}
        </div>
    </div>

    <div class=\"delivery-table-card\" id=\"historySection\">
        <div class=\"table-responsive\">
            <table class=\"table delivery-table align-middle\">
                <thead>
                    <tr>
                        <th>ID Livraison</th>
                        <th>Commande #</th>
                        <th>Adresse</th>
                        <th>Livreur ID</th>
                        <th>Statut</th>
                        <th style=\"text-align:right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for livraison in livraisons %}
                        <tr
                            class=\"history-main-row filter-item\"
                            data-section=\"history\"
                            data-status=\"{{ livraison.statutLivraison }}\"
                            data-search=\"{{ ('livraison #' ~ livraison.idLivraison ~ ' ' ~ livraison.idCommande ~ ' ' ~ livraison.adresse ~ ' ' ~ livraison.idLivreur ~ ' ' ~ livraison.statutLivraison)|lower }}\"
                        >
                            <td>{{ livraison.idLivraison }}</td>
                            <td>#{{ livraison.idCommande }}</td>
                            <td>{{ livraison.adresse|slice(0, 50) }}{% if livraison.adresse|length > 50 %}...{% endif %}</td>
                            <td>#{{ livraison.idLivreur }}</td>
                            <td>
                                <span class=\"status-badge status-{{ livraison.statutLivraison }}\" id=\"history-badge-{{ livraison.idLivraison }}\">
                                    {% if livraison.statutLivraison == 'livree' %}
                                        Livrée
                                    {% elseif livraison.statutLivraison == 'en_cours' %}
                                        En cours
                                    {% elseif livraison.statutLivraison == 'annulee' %}
                                        Annulée
                                    {% else %}
                                        En attente
                                    {% endif %}
                                </span>
                            </td>
                            <td style=\"text-align:right;\">
                                <div class=\"d-flex justify-content-end gap-2 flex-wrap\">
                                    <select class=\"form-select form-select-sm status-select\" id=\"history-status-{{ livraison.idLivraison }}\" style=\"width: 150px;\">
                                        <option value=\"en_attente\" {% if livraison.statutLivraison == 'en_attente' %}selected{% endif %}>En attente</option>
                                        <option value=\"en_cours\" {% if livraison.statutLivraison == 'en_cours' %}selected{% endif %}>En cours</option>
                                        <option value=\"livree\" {% if livraison.statutLivraison == 'livree' %}selected{% endif %}>Livrée</option>
                                        <option value=\"annulee\" {% if livraison.statutLivraison == 'annulee' %}selected{% endif %}>Annulée</option>
                                    </select>

                                    <button type=\"button\" class=\"action-btn secondary-btn\" onclick=\"updateLivraisonStatus({{ livraison.idLivraison }}, 'history')\">
                                        <i class=\"fas fa-save\"></i>
                                    </button>

                                    <button type=\"button\" class=\"action-btn\" onclick=\"toggleHistoryDetails({{ livraison.idLivraison }})\">
                                        <i class=\"fas fa-eye\"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr id=\"history-details-row-{{ livraison.idLivraison }}\" class=\"history-details-row\">
                            <td colspan=\"6\">
                                <div class=\"details-box-wrap\" id=\"history-details-content-{{ livraison.idLivraison }}\">
                                    <div class=\"loading-inline\">Clique sur l’œil pour afficher les détails…</div>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"6\">
                                <div class=\"empty-box\">Aucune livraison trouvée.</div>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>

        <div class=\"pagination-wrap\">
            <div class=\"pagination-info\" id=\"paginationInfo\">Page 1</div>
            <div class=\"pagination-buttons\">
                <button type=\"button\" class=\"pagination-btn\" id=\"prevPageBtn\" onclick=\"changeHistoryPage(-1)\">Previous</button>
                <button type=\"button\" class=\"pagination-btn\" id=\"nextPageBtn\" onclick=\"changeHistoryPage(1)\">Next</button>
            </div>
        </div>
    </div>
</div>
<div id=\"barcodePackedModal\" style=\"display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center;\">
    <div style=\"width:min(420px, 92vw); background:#fff; border-radius:20px; padding:24px; box-shadow:0 20px 60px rgba(0,0,0,0.25); position:relative;\">
        <button type=\"button\"
                onclick=\"closePackedModal()\"
                style=\"position:absolute; top:12px; right:14px; border:none; background:none; font-size:22px; cursor:pointer;\">
            ×
        </button>

        <h4 style=\"margin:0 0 14px; color:#8B0000; font-weight:800;\">
            <i class=\"fas fa-barcode\"></i> Valider le barcode
        </h4>

        <input type=\"hidden\" id=\"packedCommandeId\">

        <div style=\"margin-bottom:12px; color:#444; font-weight:600;\">
            Colle le barcode reçu de First Delivery
        </div>

        <input type=\"text\"
               id=\"packedBarcodeInput\"
               class=\"form-control\"
               placeholder=\"Entrer le barcode...\"
               style=\"height:48px; border-radius:12px; margin-bottom:14px;\">

        <div id=\"packedAnimationBox\" style=\"display:none; text-align:center; padding:18px 12px; border-radius:14px; background:#fff7f2; margin-bottom:14px;\">
            <div style=\"font-size:30px; margin-bottom:10px;\">📦</div>
            <div id=\"packedAnimationText\" style=\"font-weight:800; color:#8B0000;\">
                Statut en cours...
            </div>
        </div>

        <div class=\"d-flex gap-2\">
            <button type=\"button\"
                    class=\"action-btn\"
                    style=\"flex:1;\"
                    onclick=\"confirmPackedStatus()\">
                <i class=\"fas fa-check\"></i> Valider
            </button>

            <button type=\"button\"
                    class=\"action-btn secondary-btn\"
                    style=\"flex:1;\"
                    onclick=\"closePackedModal()\">
                Annuler
            </button>
        </div>
    </div>
</div>
<script>
   let historyCurrentPage = 1;
let pendingCurrentPage = 1;

const historyRowsPerPage = 5;
const pendingRowsPerPage = 5;

    function resetDeliveryFilters() {
    document.getElementById('deliverySearchInput').value = '';
    document.getElementById('deliveryStatusFilter').value = '';
    document.getElementById('deliverySectionFilter').value = '';
    historyCurrentPage = 1;
    pendingCurrentPage = 1;
    applyDeliveryFilters();
}

    function applyDeliveryFilters() {
    const search = document.getElementById('deliverySearchInput').value.toLowerCase().trim();
    const status = document.getElementById('deliveryStatusFilter').value;
    const section = document.getElementById('deliverySectionFilter').value;

    document.querySelectorAll('.filter-item').forEach(item => {
        const itemSearch = item.dataset.search || '';
        const itemStatus = item.dataset.status || '';
        const itemSection = item.dataset.section || '';

        const matchesSearch = !search || itemSearch.includes(search);
        const matchesStatus = !status || itemStatus === status;
        const matchesSection = !section || itemSection === section;

        item.dataset.visibleMatch = (matchesSearch && matchesStatus && matchesSection) ? '1' : '0';

        if (!item.classList.contains('history-main-row') && !item.classList.contains('pending-item')) {
            item.style.display = (matchesSearch && matchesStatus && matchesSection) ? '' : 'none';
        }
    });

    document.getElementById('pendingSection').style.display = (!section || section === 'pending') ? '' : 'none';
    document.getElementById('activeSection').style.display = (!section || section === 'active') ? '' : 'none';
    document.getElementById('historySection').style.display = (!section || section === 'history') ? '' : 'none';

    historyCurrentPage = 1;
    pendingCurrentPage = 1;

    applyPendingPagination();
    applyHistoryPagination();
}

    function applyHistoryPagination() {
        const historyRows = Array.from(document.querySelectorAll('.history-main-row'));
        const visibleRows = historyRows.filter(row => row.dataset.visibleMatch !== '0');

        historyRows.forEach(row => {
            row.style.display = 'none';
            const livraisonId = row.querySelector('[id^=\"history-badge-\"]')?.id?.replace('history-badge-', '');
            if (livraisonId) {
                const detailsRow = document.getElementById('history-details-row-' + livraisonId);
                if (detailsRow) {
                    detailsRow.style.display = 'none';
                    detailsRow.classList.remove('open');
                }
            }
        });

        const totalPages = Math.max(1, Math.ceil(visibleRows.length / historyRowsPerPage));
        if (historyCurrentPage > totalPages) {
            historyCurrentPage = totalPages;
        }

        const start = (historyCurrentPage - 1) * historyRowsPerPage;
        const end = start + historyRowsPerPage;
        const currentRows = visibleRows.slice(start, end);

        currentRows.forEach(row => {
            row.style.display = '';
        });

        const info = document.getElementById('paginationInfo');
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');

        if (info) {
            info.textContent = 'Page ' + historyCurrentPage + ' of ' + totalPages;
        }

        if (prevBtn) {
            prevBtn.disabled = historyCurrentPage <= 1;
        }

        if (nextBtn) {
            nextBtn.disabled = historyCurrentPage >= totalPages;
        }
    }

    function changeHistoryPage(direction) {
        const historyRows = Array.from(document.querySelectorAll('.history-main-row'));
        const visibleRows = historyRows.filter(row => row.dataset.visibleMatch !== '0');
        const totalPages = Math.max(1, Math.ceil(visibleRows.length / historyRowsPerPage));

        historyCurrentPage += direction;

        if (historyCurrentPage < 1) historyCurrentPage = 1;
        if (historyCurrentPage > totalPages) historyCurrentPage = totalPages;

        applyHistoryPagination();
    }

    document.getElementById('deliverySearchInput').addEventListener('input', applyDeliveryFilters);
    document.getElementById('deliveryStatusFilter').addEventListener('change', applyDeliveryFilters);
    document.getElementById('deliverySectionFilter').addEventListener('change', applyDeliveryFilters);

    function assignLivreur(commandeId) {
        const select = document.querySelector('.livreur-select[data-commande-id=\"' + commandeId + '\"]');

        if (!select || !select.value) {
            alert('Choisir un livreur.');
            return;
        }

        const formData = new FormData();
        formData.append('livreur_id', select.value);

        fetch('{{ path('app_admin_livraison_affecter', {id: 0}) }}'.replace('/0', '/' + commandeId), {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur serveur');
            }
            return response.text();
        })
        .then(data => {
    try {
        const parsed = typeof data === 'string' ? JSON.parse(data) : data;

        if (parsed.stats) {
            refreshDashboardStats(parsed.stats);
        }

        if (parsed.averageDeliveryTime) {
            refreshAverageDelivery(parsed.averageDeliveryTime);
        }
    } catch (e) {}

    const pendingCard = document.querySelector('.livreur-select[data-commande-id=\"' + commandeId + '\"]')?.closest('.pending-item');
    if (pendingCard) {
        pendingCard.remove();
        applyPendingPagination();
    }
})
        .catch(() => {
            alert('Erreur lors de l’affectation du livreur.');
        });
    }

    function updateLivraisonStatus(livraisonId, prefix = 'active') {
    const selectId = prefix === 'history' ? 'history-status-' + livraisonId : 'active-status-' + livraisonId;
    const badgeId = prefix === 'history' ? 'history-badge-' + livraisonId : 'active-badge-' + livraisonId;

    const select = document.getElementById(selectId);
    const badge = document.getElementById(badgeId);

    if (!select) {
        alert('Sélecteur de statut introuvable.');
        return;
    }

    const formData = new FormData();
    formData.append('status', select.value);

    fetch('/admin/livraisons/status/' + livraisonId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Réponse non JSON:', text);
            throw new Error('Le serveur ne retourne pas un JSON valide.');
        }

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur');
        }

        return data;
    })
    .then(data => {
        if (!data.success) {
            alert(data.message || 'Erreur.');
            return;
        }

        if (badge) {
            badge.className = 'status-badge status-' + data.newStatus;
            badge.textContent = data.badgeLabel;
        }

        if (data.stats) {
            refreshDashboardStats(data.stats);
        }

        if (data.averageDeliveryTime) {
            refreshAverageDelivery(data.averageDeliveryTime);
        }

        if (prefix === 'active' && (data.newStatus === 'livree' || data.newStatus === 'annulee')) {
            const activeBadge = document.getElementById('active-badge-' + livraisonId);
            const activeCard = activeBadge ? activeBadge.closest('.commande-card-modern') : null;

            if (activeCard) {
                activeCard.remove();
            }
        }

        applyPendingPagination();
        applyHistoryPagination();
    })
    .catch(error => {
        console.error('Erreur updateLivraisonStatus:', error);
        alert(error.message || 'Erreur lors de la mise à jour du statut.');
    });
}

    function toggleHistoryDetails(livraisonId) {
        const row = document.getElementById('history-details-row-' + livraisonId);
        const content = document.getElementById('history-details-content-' + livraisonId);

        if (!row || !content) {
            return;
        }

        if (row.classList.contains('open')) {
            row.classList.remove('open');
            row.style.display = 'none';
            return;
        }

        document.querySelectorAll('.history-details-row.open').forEach(el => {
            el.classList.remove('open');
            el.style.display = 'none';
        });

        row.classList.add('open');
        row.style.display = 'table-row';

        if (content.dataset.loaded === '1') {
            return;
        }

        content.innerHTML = '<div class=\"loading-inline\">Chargement des détails...</div>';

        fetch('/admin/livraisons/details/' + livraisonId, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur serveur');
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                content.innerHTML = '<div class=\"alert alert-danger mb-0\">' + (data.message || 'Erreur.') + '</div>';
                return;
            }

            content.innerHTML = data.html;
            content.dataset.loaded = '1';
        })
        .catch(() => {
            content.innerHTML = '<div class=\"alert alert-danger mb-0\">Erreur réseau ou serveur.</div>';
        });
    }
    function applyPendingPagination() {
    const pendingItems = Array.from(document.querySelectorAll('.pending-item'));
    const visibleItems = pendingItems.filter(item => item.dataset.visibleMatch !== '0');

    pendingItems.forEach(item => {
        item.style.display = 'none';
    });

    const totalPages = Math.max(1, Math.ceil(visibleItems.length / pendingRowsPerPage));

    if (pendingCurrentPage > totalPages) {
        pendingCurrentPage = totalPages;
    }

    const start = (pendingCurrentPage - 1) * pendingRowsPerPage;
    const end = start + pendingRowsPerPage;
    const currentItems = visibleItems.slice(start, end);

    currentItems.forEach(item => {
        item.style.display = '';
    });

    const info = document.getElementById('pendingPaginationInfo');
    const prevBtn = document.getElementById('pendingPrevPageBtn');
    const nextBtn = document.getElementById('pendingNextPageBtn');

    if (info) {
        info.textContent = 'Page ' + pendingCurrentPage + ' of ' + totalPages;
    }

    if (prevBtn) {
        prevBtn.disabled = pendingCurrentPage <= 1;
    }

    if (nextBtn) {
        nextBtn.disabled = pendingCurrentPage >= totalPages;
    }
}

function changePendingPage(direction) {
    const pendingItems = Array.from(document.querySelectorAll('.pending-item'));
    const visibleItems = pendingItems.filter(item => item.dataset.visibleMatch !== '0');
    const totalPages = Math.max(1, Math.ceil(visibleItems.length / pendingRowsPerPage));

    pendingCurrentPage += direction;

    if (pendingCurrentPage < 1) pendingCurrentPage = 1;
    if (pendingCurrentPage > totalPages) pendingCurrentPage = totalPages;

    applyPendingPagination();
}
function refreshDashboardStats(stats) {
    const elLivreurs = document.getElementById('stat-livreurs');
    const elCommandes = document.getElementById('stat-commandes');
    const elLivrees = document.getElementById('stat-livrees');
    const elEncours = document.getElementById('stat-encours');

    const elDeliveredTop = document.getElementById('deliveredPercentTextTop');
    const elAttenteTop = document.getElementById('attenteCountTop');

    const elDeliveredLegend = document.getElementById('deliveredPercentLegend');
    const elPendingLegend = document.getElementById('pendingPercentLegend');

    const elDeliveredBar = document.getElementById('deliveredBar');
    const elPendingBar = document.getElementById('pendingBar');

    const elDeliveredBarText = document.getElementById('deliveredPercentBar');
    const elPendingBarText = document.getElementById('pendingPercentBar');

    if (elLivreurs) elLivreurs.textContent = stats.total_livreurs;
    if (elCommandes) elCommandes.textContent = stats.total_commandes;
    if (elLivrees) elLivrees.textContent = stats.livrees;
    if (elEncours) elEncours.textContent = stats.en_cours;

    if (elDeliveredTop) elDeliveredTop.textContent = stats.delivered_percent;
    if (elAttenteTop) elAttenteTop.textContent = stats.attente;

    if (elDeliveredLegend) elDeliveredLegend.textContent = stats.delivered_percent + '%';
    if (elPendingLegend) elPendingLegend.textContent = stats.pending_percent + '%';

    if (elDeliveredBar) elDeliveredBar.style.width = stats.delivered_percent + '%';
    if (elPendingBar) elPendingBar.style.width = stats.pending_percent + '%';

    if (elDeliveredBarText) elDeliveredBarText.textContent = stats.delivered_percent + '%';
    if (elPendingBarText) elPendingBarText.textContent = stats.pending_percent + '%';
}

function refreshAverageDelivery(value) {
    const avg = document.getElementById('avgDeliveryTime');
    if (avg) {
        avg.textContent = value;
    }
}
function sendToFirstDelivery(commandeId) {
    const formData = new FormData();

    fetch('/admin/livraisons/send-first-delivery/' + commandeId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
    console.error('Réponse brute du serveur:', text);
    alert(text);
    throw new Error('Réponse serveur invalide.');
}

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur.');
        }

        return data;
    })
    .then(data => {
        alert(data.message || 'Commande envoyée avec succès.');
        console.log('Barcode:', data.barCode);
        console.log('Print link:', data.printLink);
    })
    .catch(error => {
        console.error('Erreur sendToFirstDelivery:', error);
        alert(error.message || 'Erreur lors de l’envoi.');
    });
}
function cancelFirstDelivery(commandeId) {
    fetch('/admin/livraisons/cancel-first-delivery/' + commandeId, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Réponse brute du serveur:', text);
            throw new Error('Réponse serveur invalide.');
        }

        if (!response.ok) {
            throw new Error(data.message || 'Erreur serveur.');
        }

        return data;
    })
    .then(data => {
        alert(data.message || 'Commande annulée.');
        window.location.reload();
    })
    .catch(error => {
        console.error('Erreur cancelFirstDelivery:', error);
        alert(error.message || 'Erreur lors de l’annulation.');
    });
}
function openPackedModal(commandeId, barcode) {
    document.getElementById('packedCommandeId').value = commandeId;
    document.getElementById('packedBarcodeInput').value = barcode || '';
    document.getElementById('packedAnimationBox').style.display = 'none';
    document.getElementById('barcodePackedModal').style.display = 'flex';
}

function closePackedModal() {
    document.getElementById('barcodePackedModal').style.display = 'none';
}

function confirmPackedStatus() {
    const commandeId = document.getElementById('packedCommandeId').value;
    const barcodeInput = document.getElementById('packedBarcodeInput').value.trim();
    const animationBox = document.getElementById('packedAnimationBox');
    const animationText = document.getElementById('packedAnimationText');

    if (!barcodeInput) {
        alert('Entre un barcode.');
        return;
    }

    animationBox.style.display = 'block';
    animationText.textContent = 'Vérification du barcode...';

    setTimeout(() => {
        animationText.textContent = 'Statut: sent';
    }, 500);

    setTimeout(() => {
        animationText.textContent = 'Transition vers packed...';
    }, 1100);

    setTimeout(() => {
        const badge = document.getElementById('first-status-badge-' + commandeId);

        if (badge) {
            badge.textContent = 'packed';
            badge.className = 'status-badge status-livree';
        }

        closePackedModal();
        alert('Commande passée de sent à packed.');
    }, 1800);
}
   document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.history-main-row').forEach(row => {
        row.dataset.visibleMatch = '1';
    });

    document.querySelectorAll('.pending-item').forEach(item => {
        item.dataset.visibleMatch = '1';
    });

    applyPendingPagination();
    applyHistoryPagination();
});
</script>

{% endblock %}", "admin_livraisons/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_livraisons\\index.html.twig");
    }
}

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

/* admin_commandes/edit.html.twig */
class __TwigTemplate_27b7236532c901d24c71639aaa7696b0 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_commandes/edit.html.twig"));

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

        yield "Modifier commande";
        
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
    .edit-shell {
        color: #2c1a1d;
    }

    .edit-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .edit-title {
        font-size: 30px;
        font-weight: 800;
        color: var(--bordeaux, #7b1e2b);
    }

    .save-btn {
        background: linear-gradient(135deg, #7b1e2b 0%, #a83232 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 22px;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(123, 30, 43, 0.18);
    }

    .save-btn:hover {
        color: white;
        opacity: 0.95;
    }

    .back-link {
        color: var(--bordeaux, #7b1e2b);
        text-decoration: none;
        font-weight: 700;
    }

    .back-link:hover {
        color: #a83232;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 22px;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.04);
    }

    .edit-card-header {
        padding: 18px 20px;
        background: linear-gradient(135deg, #7b1e2b 0%, #8f2430 100%);
        border-bottom: 1px solid #ead9d2;
        font-size: 17px;
        font-weight: 800;
        color: white;
    }

    .edit-card-body {
        padding: 20px;
        background: #fffdfb;
    }

    .form-label {
        color: #5c2b31;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select,
    textarea.form-control {
        background: #ffffff;
        border: 1px solid #dcc7bf;
        color: #2c1a1d;
        border-radius: 12px;
        min-height: 48px;
        box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus,
    textarea.form-control:focus {
        border-color: #a83232;
        box-shadow: 0 0 0 0.2rem rgba(168, 50, 50, 0.15);
    }

    .form-control::placeholder,
    textarea.form-control::placeholder {
        color: #a38b8f;
    }

    .readonly-box {
        background: #f9f1ec;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        min-height: 48px;
        display: flex;
        align-items: center;
        padding: 0 14px;
        color: #2c1a1d;
        font-weight: 500;
    }

    .product-summary {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff7f2;
        border: 1px solid #e6d3cb;
        border-radius: 14px;
        padding: 14px;
    }

    .product-summary img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2d1ca;
        background: white;
    }

    .product-fallback {
        width: 64px;
        height: 64px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4e7e0;
        border: 1px solid #e2d1ca;
        font-size: 24px;
    }

    .status-preview {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        margin-top: 8px;
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
        background: #eeeeee;
        color: #666666;
    }

    .section-note {
        font-size: 13px;
        color: #8b6f74;
        margin-top: 4px;
    }

    .top-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .secondary-btn {
        background: #f5ebe5;
        color: #7b1e2b;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        padding: 12px 18px;
        font-weight: 700;
        text-decoration: none;
    }

    .secondary-btn:hover {
        background: #efe0d8;
        color: #7b1e2b;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 207
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 208
        yield "<div class=\"edit-shell\">
    <form method=\"post\" action=\"";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 209, $this->source); })()), "id", [], "any", false, false, false, 209)]), "html", null, true);
        yield "\">
        <input type=\"hidden\" name=\"status_filter\" value=\"";
        // line 210
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 210, $this->source); })()), "html", null, true);
        yield "\">
        <input type=\"hidden\" name=\"search_filter\" value=\"";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 211, $this->source); })()), "html", null, true);
        yield "\">
        <input type=\"hidden\" name=\"sort_filter\" value=\"";
        // line 212
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 212, $this->source); })()), "html", null, true);
        yield "\">

        <div class=\"edit-topbar\">
            <div>
                <div class=\"edit-title\">Modifier commande n°";
        // line 216
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 216, $this->source); })()), "id", [], "any", false, false, false, 216), "html", null, true);
        yield "</div>
                <a href=\"";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index", ["status" => (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 217, $this->source); })()), "search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 217, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 217, $this->source); })())]), "html", null, true);
        yield "\" class=\"back-link\">
                    <i class=\"fas fa-arrow-left\"></i> Retour à la liste
                </a>
            </div>

            <div class=\"top-actions\">
                <a href=\"";
        // line 223
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index", ["status" => (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 223, $this->source); })()), "search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 223, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 223, $this->source); })())]), "html", null, true);
        yield "\" class=\"secondary-btn\">
                    Annuler
                </a>
                <button type=\"submit\" class=\"btn save-btn\">
                    <i class=\"fas fa-save\"></i> Enregistrer
                </button>
            </div>
        </div>

        <div class=\"edit-card\">
            <div class=\"edit-card-header\">Détails de la commande</div>
            <div class=\"edit-card-body\">
                <div class=\"row g-4\">
                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Statut</label>
                        <select name=\"status_commande\" class=\"form-select\">
                            <option value=\"en_attente\" ";
        // line 239
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 239, $this->source); })()), "status", [], "any", false, false, false, 239) == "en_attente")) {
            yield "selected";
        }
        yield ">En attente</option>
                            <option value=\"acceptee\" ";
        // line 240
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 240, $this->source); })()), "status", [], "any", false, false, false, 240) == "acceptee")) {
            yield "selected";
        }
        yield ">Acceptée</option>
                            <option value=\"refusee\" ";
        // line 241
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 241, $this->source); })()), "status", [], "any", false, false, false, 241) == "refusee")) {
            yield "selected";
        }
        yield ">Refusée</option>
                            <option value=\"annulee\" ";
        // line 242
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 242, $this->source); })()), "status", [], "any", false, false, false, 242) == "annulee")) {
            yield "selected";
        }
        yield ">Annulée</option>
                        </select>

                        <div class=\"status-preview status-";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 245, $this->source); })()), "status", [], "any", false, false, false, 245), "html", null, true);
        yield "\">
                            ";
        // line 246
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 246, $this->source); })()), "status", [], "any", false, false, false, 246) == "en_attente")) {
            // line 247
            yield "                                ⏳ En attente
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 248
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 248, $this->source); })()), "status", [], "any", false, false, false, 248) == "acceptee")) {
            // line 249
            yield "                                ✅ Acceptée
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 250
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 250, $this->source); })()), "status", [], "any", false, false, false, 250) == "refusee")) {
            // line 251
            yield "                                ❌ Refusée
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 252
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 252, $this->source); })()), "status", [], "any", false, false, false, 252) == "annulee")) {
            // line 253
            yield "                                🚫 Annulée
                            ";
        }
        // line 255
        yield "                        </div>
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Date de commande</label>
                        <div class=\"readonly-box\">";
        // line 260
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 260, $this->source); })()), "createdAt", [], "any", false, false, false, 260), "d/m/Y H:i"), "html", null, true);
        yield "</div>
                    </div>

                    <div class=\"col-md-12\">
                        <label class=\"form-label\">Produit</label>
                        <select name=\"productId\" class=\"form-select\">
                            ";
        // line 266
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 266, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 267
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "idProduit", [], "any", false, false, false, 267), "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["p"], "idProduit", [], "any", false, false, false, 267) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 267, $this->source); })()), "productId", [], "any", false, false, false, 267))) {
                yield "selected";
            }
            yield ">
                                    ";
            // line 268
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "nom", [], "any", false, false, false, 268), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "prix", [], "any", false, false, false, 268), 2, ",", " "), "html", null, true);
            yield " TND
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 271
        yield "                        </select>
                        <div class=\"section-note\">Choisissez le produit lié à cette commande.</div>
                    </div>

                    ";
        // line 275
        if ((($tmp = (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 275, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 276
            yield "                        <div class=\"col-md-12\">
                            <div class=\"product-summary\">
                                ";
            // line 278
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "photo", [], "any", true, true, false, 278) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 278, $this->source); })()), "photo", [], "any", false, false, false, 278))) {
                // line 279
                yield "                                    <img src=\"/uploads/produits/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 279, $this->source); })()), "photo", [], "any", false, false, false, 279), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 279, $this->source); })()), "nom", [], "any", false, false, false, 279), "html", null, true);
                yield "\">
                                ";
            } else {
                // line 281
                yield "                                    <div class=\"product-fallback\">📦</div>
                                ";
            }
            // line 283
            yield "
                                <div>
                                    <div><strong>";
            // line 285
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 285, $this->source); })()), "nom", [], "any", false, false, false, 285), "html", null, true);
            yield "</strong></div>
                                    <div>";
            // line 286
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 286, $this->source); })()), "prix", [], "any", false, false, false, 286), 2, ",", " "), "html", null, true);
            yield " TND</div>
                                    ";
            // line 287
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "description", [], "any", true, true, false, 287) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 287, $this->source); })()), "description", [], "any", false, false, false, 287))) {
                // line 288
                yield "                                        <small class=\"text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 288, $this->source); })()), "description", [], "any", false, false, false, 288), "html", null, true);
                yield "</small>
                                    ";
            }
            // line 290
            yield "                                </div>
                            </div>
                        </div>
                    ";
        }
        // line 294
        yield "                </div>
            </div>
        </div>

        <div class=\"edit-card\">
            <div class=\"edit-card-header\">Informations client</div>
            <div class=\"edit-card-body\">
                <div class=\"row g-4\">
                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Nom</label>
                        <input type=\"text\" name=\"customerName\" class=\"form-control\" value=\"";
        // line 304
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 304, $this->source); })()), "customerName", [], "any", false, false, false, 304), "html", null, true);
        yield "\">
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Téléphone</label>
                        <input type=\"text\" name=\"phone\" class=\"form-control\" value=\"";
        // line 309
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 309, $this->source); })()), "phone", [], "any", false, false, false, 309), "html", null, true);
        yield "\">
                    </div>

                    <div class=\"col-md-12\">
                        <label class=\"form-label\">Adresse / Lieu de livraison</label>
                        <input type=\"text\" name=\"location\" class=\"form-control\" value=\"";
        // line 314
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 314, $this->source); })()), "location", [], "any", false, false, false, 314), "html", null, true);
        yield "\">
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">ID commande</label>
                        <div class=\"readonly-box\">#";
        // line 319
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 319, $this->source); })()), "id", [], "any", false, false, false, 319), "html", null, true);
        yield "</div>
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">ID produit actuel</label>
                        <div class=\"readonly-box\">";
        // line 324
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 324, $this->source); })()), "productId", [], "any", false, false, false, 324), "html", null, true);
        yield "</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
        return "admin_commandes/edit.html.twig";
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
        return array (  545 => 324,  537 => 319,  529 => 314,  521 => 309,  513 => 304,  501 => 294,  495 => 290,  489 => 288,  487 => 287,  483 => 286,  479 => 285,  475 => 283,  471 => 281,  463 => 279,  461 => 278,  457 => 276,  455 => 275,  449 => 271,  438 => 268,  429 => 267,  425 => 266,  416 => 260,  409 => 255,  405 => 253,  403 => 252,  400 => 251,  398 => 250,  395 => 249,  393 => 248,  390 => 247,  388 => 246,  384 => 245,  376 => 242,  370 => 241,  364 => 240,  358 => 239,  339 => 223,  330 => 217,  326 => 216,  319 => 212,  315 => 211,  311 => 210,  307 => 209,  304 => 208,  294 => 207,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Modifier commande{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .edit-shell {
        color: #2c1a1d;
    }

    .edit-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .edit-title {
        font-size: 30px;
        font-weight: 800;
        color: var(--bordeaux, #7b1e2b);
    }

    .save-btn {
        background: linear-gradient(135deg, #7b1e2b 0%, #a83232 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 22px;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(123, 30, 43, 0.18);
    }

    .save-btn:hover {
        color: white;
        opacity: 0.95;
    }

    .back-link {
        color: var(--bordeaux, #7b1e2b);
        text-decoration: none;
        font-weight: 700;
    }

    .back-link:hover {
        color: #a83232;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 22px;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.04);
    }

    .edit-card-header {
        padding: 18px 20px;
        background: linear-gradient(135deg, #7b1e2b 0%, #8f2430 100%);
        border-bottom: 1px solid #ead9d2;
        font-size: 17px;
        font-weight: 800;
        color: white;
    }

    .edit-card-body {
        padding: 20px;
        background: #fffdfb;
    }

    .form-label {
        color: #5c2b31;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select,
    textarea.form-control {
        background: #ffffff;
        border: 1px solid #dcc7bf;
        color: #2c1a1d;
        border-radius: 12px;
        min-height: 48px;
        box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus,
    textarea.form-control:focus {
        border-color: #a83232;
        box-shadow: 0 0 0 0.2rem rgba(168, 50, 50, 0.15);
    }

    .form-control::placeholder,
    textarea.form-control::placeholder {
        color: #a38b8f;
    }

    .readonly-box {
        background: #f9f1ec;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        min-height: 48px;
        display: flex;
        align-items: center;
        padding: 0 14px;
        color: #2c1a1d;
        font-weight: 500;
    }

    .product-summary {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff7f2;
        border: 1px solid #e6d3cb;
        border-radius: 14px;
        padding: 14px;
    }

    .product-summary img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2d1ca;
        background: white;
    }

    .product-fallback {
        width: 64px;
        height: 64px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4e7e0;
        border: 1px solid #e2d1ca;
        font-size: 24px;
    }

    .status-preview {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        margin-top: 8px;
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
        background: #eeeeee;
        color: #666666;
    }

    .section-note {
        font-size: 13px;
        color: #8b6f74;
        margin-top: 4px;
    }

    .top-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .secondary-btn {
        background: #f5ebe5;
        color: #7b1e2b;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        padding: 12px 18px;
        font-weight: 700;
        text-decoration: none;
    }

    .secondary-btn:hover {
        background: #efe0d8;
        color: #7b1e2b;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"edit-shell\">
    <form method=\"post\" action=\"{{ path('app_admin_commandes_update', {id: commande.id}) }}\">
        <input type=\"hidden\" name=\"status_filter\" value=\"{{ status }}\">
        <input type=\"hidden\" name=\"search_filter\" value=\"{{ search }}\">
        <input type=\"hidden\" name=\"sort_filter\" value=\"{{ sort }}\">

        <div class=\"edit-topbar\">
            <div>
                <div class=\"edit-title\">Modifier commande n°{{ commande.id }}</div>
                <a href=\"{{ path('app_admin_commandes_index', {status: status, search: search, sort: sort}) }}\" class=\"back-link\">
                    <i class=\"fas fa-arrow-left\"></i> Retour à la liste
                </a>
            </div>

            <div class=\"top-actions\">
                <a href=\"{{ path('app_admin_commandes_index', {status: status, search: search, sort: sort}) }}\" class=\"secondary-btn\">
                    Annuler
                </a>
                <button type=\"submit\" class=\"btn save-btn\">
                    <i class=\"fas fa-save\"></i> Enregistrer
                </button>
            </div>
        </div>

        <div class=\"edit-card\">
            <div class=\"edit-card-header\">Détails de la commande</div>
            <div class=\"edit-card-body\">
                <div class=\"row g-4\">
                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Statut</label>
                        <select name=\"status_commande\" class=\"form-select\">
                            <option value=\"en_attente\" {% if commande.status == 'en_attente' %}selected{% endif %}>En attente</option>
                            <option value=\"acceptee\" {% if commande.status == 'acceptee' %}selected{% endif %}>Acceptée</option>
                            <option value=\"refusee\" {% if commande.status == 'refusee' %}selected{% endif %}>Refusée</option>
                            <option value=\"annulee\" {% if commande.status == 'annulee' %}selected{% endif %}>Annulée</option>
                        </select>

                        <div class=\"status-preview status-{{ commande.status }}\">
                            {% if commande.status == 'en_attente' %}
                                ⏳ En attente
                            {% elseif commande.status == 'acceptee' %}
                                ✅ Acceptée
                            {% elseif commande.status == 'refusee' %}
                                ❌ Refusée
                            {% elseif commande.status == 'annulee' %}
                                🚫 Annulée
                            {% endif %}
                        </div>
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Date de commande</label>
                        <div class=\"readonly-box\">{{ commande.createdAt|date('d/m/Y H:i') }}</div>
                    </div>

                    <div class=\"col-md-12\">
                        <label class=\"form-label\">Produit</label>
                        <select name=\"productId\" class=\"form-select\">
                            {% for p in produits %}
                                <option value=\"{{ p.idProduit }}\" {% if p.idProduit == commande.productId %}selected{% endif %}>
                                    {{ p.nom }} - {{ p.prix|number_format(2, ',', ' ') }} TND
                                </option>
                            {% endfor %}
                        </select>
                        <div class=\"section-note\">Choisissez le produit lié à cette commande.</div>
                    </div>

                    {% if produit %}
                        <div class=\"col-md-12\">
                            <div class=\"product-summary\">
                                {% if produit.photo is defined and produit.photo %}
                                    <img src=\"/uploads/produits/{{ produit.photo }}\" alt=\"{{ produit.nom }}\">
                                {% else %}
                                    <div class=\"product-fallback\">📦</div>
                                {% endif %}

                                <div>
                                    <div><strong>{{ produit.nom }}</strong></div>
                                    <div>{{ produit.prix|number_format(2, ',', ' ') }} TND</div>
                                    {% if produit.description is defined and produit.description %}
                                        <small class=\"text-muted\">{{ produit.description }}</small>
                                    {% endif %}
                                </div>
                            </div>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>

        <div class=\"edit-card\">
            <div class=\"edit-card-header\">Informations client</div>
            <div class=\"edit-card-body\">
                <div class=\"row g-4\">
                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Nom</label>
                        <input type=\"text\" name=\"customerName\" class=\"form-control\" value=\"{{ commande.customerName }}\">
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">Téléphone</label>
                        <input type=\"text\" name=\"phone\" class=\"form-control\" value=\"{{ commande.phone }}\">
                    </div>

                    <div class=\"col-md-12\">
                        <label class=\"form-label\">Adresse / Lieu de livraison</label>
                        <input type=\"text\" name=\"location\" class=\"form-control\" value=\"{{ commande.location }}\">
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">ID commande</label>
                        <div class=\"readonly-box\">#{{ commande.id }}</div>
                    </div>

                    <div class=\"col-md-6\">
                        <label class=\"form-label\">ID produit actuel</label>
                        <div class=\"readonly-box\">{{ commande.productId }}</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{% endblock %}", "admin_commandes/edit.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_commandes\\edit.html.twig");
    }
}

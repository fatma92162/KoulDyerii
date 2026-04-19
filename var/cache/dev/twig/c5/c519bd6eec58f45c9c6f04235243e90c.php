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

/* admin_commandes/show.html.twig */
class __TwigTemplate_c49a75c1e4eb88748179c1c6c2f2b7bf extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_commandes/show.html.twig"));

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

        yield "Détails de la commande #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        
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
    .detail-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 20px 25px;
        border-radius: 15px;
        color: white;
        margin-bottom: 25px;
    }
    
    .info-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #E8D5B7;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .info-title {
        font-size: 18px;
        font-weight: 700;
        color: #8B0000;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #E8D5B7;
    }
    
    .info-row {
        display: flex;
        margin-bottom: 12px;
        padding: 8px 0;
        border-bottom: 1px dashed #f0e6d6;
    }
    
    .info-label {
        width: 150px;
        font-weight: 600;
        color: #555;
    }
    
    .info-value {
        flex: 1;
        color: #333;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-acceptee {
        background: #4CAF50;
        color: white;
    }
    
    .status-refusee {
        background: #f44336;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .product-image {
        max-width: 200px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .btn-action {
        padding: 10px 25px;
        border-radius: 50px;
        margin-right: 10px;
    }
    
    .btn-accepter {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        border: none;
        color: white;
    }
    
    .btn-refuser {
        background: linear-gradient(135deg, #f44336, #da190b);
        border: none;
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 106
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 107
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>🛒 Détails de la commande #";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 109, $this->source); })()), "id", [], "any", false, false, false, 109), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index", ["status" => (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 110, $this->source); })()), "search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 110, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 110, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"detail-header\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <div>
                <h4 class=\"mb-1\">Commande #";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 118, $this->source); })()), "id", [], "any", false, false, false, 118), "html", null, true);
        yield "</h4>
                <p class=\"mb-0\">Date: ";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 119, $this->source); })()), "createdAt", [], "any", false, false, false, 119), "d/m/Y H:i"), "html", null, true);
        yield "</p>
            </div>
            <div>
                <span class=\"status-badge status-";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 122, $this->source); })()), "status", [], "any", false, false, false, 122), "html", null, true);
        yield "\">
                    ";
        // line 123
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 123, $this->source); })()), "status", [], "any", false, false, false, 123) == "en_attente")) {
            // line 124
            yield "                        ⏳ En attente
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 125
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 125, $this->source); })()), "status", [], "any", false, false, false, 125) == "acceptee")) {
            // line 126
            yield "                        ✅ Acceptée
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 127
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 127, $this->source); })()), "status", [], "any", false, false, false, 127) == "refusee")) {
            // line 128
            yield "                        ❌ Refusée
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 129
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 129, $this->source); })()), "status", [], "any", false, false, false, 129) == "annulee")) {
            // line 130
            yield "                        🚫 Annulée
                    ";
        }
        // line 132
        yield "                </span>
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-md-6\">
            <!-- Informations client -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-user\"></i> Informations client
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Nom complet :</div>
                    <div class=\"info-value\">";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 146, $this->source); })()), "customerName", [], "any", false, false, false, 146), "html", null, true);
        yield "</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Téléphone :</div>
                    <div class=\"info-value\">";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 150, $this->source); })()), "phone", [], "any", false, false, false, 150), "html", null, true);
        yield "</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Adresse de livraison :</div>
                    <div class=\"info-value\">";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 154, $this->source); })()), "location", [], "any", false, false, false, 154), "html", null, true);
        yield "</div>
                </div>
            </div>

            <!-- Informations produit -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-box\"></i> Informations produit
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Nom du produit :</div>
                    <div class=\"info-value\">";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "nom", [], "any", true, true, false, 165)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 165, $this->source); })()), "nom", [], "any", false, false, false, 165), ("Produit #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 165, $this->source); })()), "productId", [], "any", false, false, false, 165)))) : (("Produit #" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 165, $this->source); })()), "productId", [], "any", false, false, false, 165)))), "html", null, true);
        yield "</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Prix unitaire :</div>
                    <div class=\"info-value\">";
        // line 169
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "prix", [], "any", true, true, false, 169)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 169, $this->source); })()), "prix", [], "any", false, false, false, 169), 0)) : (0)), 2, ",", " "), "html", null, true);
        yield " €</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Quantité :</div>
                    <div class=\"info-value\">1</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Total :</div>
                    <div class=\"info-value\"><strong>";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "prix", [], "any", true, true, false, 177)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 177, $this->source); })()), "prix", [], "any", false, false, false, 177), 0)) : (0)), 2, ",", " "), "html", null, true);
        yield " €</strong></div>
                </div>
                ";
        // line 179
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 179, $this->source); })()), "description", [], "any", false, false, false, 179)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 180
            yield "                <div class=\"info-row\">
                    <div class=\"info-label\">Description :</div>
                    <div class=\"info-value\">";
            // line 182
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 182, $this->source); })()), "description", [], "any", false, false, false, 182), "html", null, true);
            yield "</div>
                </div>
                ";
        }
        // line 185
        yield "            </div>
        </div>

        <div class=\"col-md-6\">
            <!-- Image du produit -->
            ";
        // line 190
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 190, $this->source); })()), "photo", [], "any", false, false, false, 190)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 191
            yield "            <div class=\"info-card text-center\">
                <div class=\"info-title\">
                    <i class=\"fas fa-image\"></i> Photo du produit
                </div>
                <img src=\"";
            // line 195
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 195, $this->source); })()), "photo", [], "any", false, false, false, 195), "html", null, true);
            yield "\" class=\"product-image\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 195, $this->source); })()), "nom", [], "any", false, false, false, 195), "html", null, true);
            yield "\">
            </div>
            ";
        }
        // line 198
        yield "
            <!-- Actions -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-cog\"></i> Actions
                </div>
                <div class=\"text-center\">
                    ";
        // line 205
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 205, $this->source); })()), "status", [], "any", false, false, false, 205) == "en_attente")) {
            // line 206
            yield "                        <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 206, $this->source); })()), "id", [], "any", false, false, false, 206)]), "html", null, true);
            yield "\" method=\"post\" style=\"display: inline-block;\">
                            <input type=\"hidden\" name=\"status\" value=\"";
            // line 207
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 207, $this->source); })()), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"search\" value=\"";
            // line 208
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 208, $this->source); })()), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"sort\" value=\"";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 209, $this->source); })()), "html", null, true);
            yield "\">
                            <button type=\"submit\" class=\"btn btn-action btn-accepter\" onclick=\"return confirm('Accepter cette commande ?')\">
                                <i class=\"fas fa-check\"></i> Accepter la commande
                            </button>
                        </form>
                        <button type=\"button\" class=\"btn btn-action btn-refuser\" data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                            <i class=\"fas fa-times\"></i> Refuser la commande
                        </button>
                    ";
        }
        // line 218
        yield "                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Refuser -->
<div class=\"modal fade\" id=\"refuseModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <form action=\"";
        // line 228
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 228, $this->source); })()), "id", [], "any", false, false, false, 228)]), "html", null, true);
        yield "\" method=\"post\">
                <input type=\"hidden\" name=\"status\" value=\"";
        // line 229
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 229, $this->source); })()), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"search\" value=\"";
        // line 230
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 230, $this->source); })()), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"sort\" value=\"";
        // line 231
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 231, $this->source); })()), "html", null, true);
        yield "\">
                <div class=\"modal-header bg-danger text-white\">
                    <h5 class=\"modal-title\">Refuser la commande #";
        // line 233
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 233, $this->source); })()), "id", [], "any", false, false, false, 233), "html", null, true);
        yield "</h5>
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
                </div>
                <div class=\"modal-body\">
                    <label for=\"motif\" class=\"form-label\">Motif du refus (optionnel)</label>
                    <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\" placeholder=\"Expliquez la raison du refus...\"></textarea>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-danger\">Confirmer le refus</button>
                </div>
            </form>
        </div>
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
        return "admin_commandes/show.html.twig";
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
        return array (  425 => 233,  420 => 231,  416 => 230,  412 => 229,  408 => 228,  396 => 218,  384 => 209,  380 => 208,  376 => 207,  371 => 206,  369 => 205,  360 => 198,  352 => 195,  346 => 191,  344 => 190,  337 => 185,  331 => 182,  327 => 180,  325 => 179,  320 => 177,  309 => 169,  302 => 165,  288 => 154,  281 => 150,  274 => 146,  258 => 132,  254 => 130,  252 => 129,  249 => 128,  247 => 127,  244 => 126,  242 => 125,  239 => 124,  237 => 123,  233 => 122,  227 => 119,  223 => 118,  212 => 110,  208 => 109,  204 => 107,  194 => 106,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Détails de la commande #{{ commande.id }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .detail-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 20px 25px;
        border-radius: 15px;
        color: white;
        margin-bottom: 25px;
    }
    
    .info-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #E8D5B7;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .info-title {
        font-size: 18px;
        font-weight: 700;
        color: #8B0000;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #E8D5B7;
    }
    
    .info-row {
        display: flex;
        margin-bottom: 12px;
        padding: 8px 0;
        border-bottom: 1px dashed #f0e6d6;
    }
    
    .info-label {
        width: 150px;
        font-weight: 600;
        color: #555;
    }
    
    .info-value {
        flex: 1;
        color: #333;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-acceptee {
        background: #4CAF50;
        color: white;
    }
    
    .status-refusee {
        background: #f44336;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .product-image {
        max-width: 200px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .btn-action {
        padding: 10px 25px;
        border-radius: 50px;
        margin-right: 10px;
    }
    
    .btn-accepter {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        border: none;
        color: white;
    }
    
    .btn-refuser {
        background: linear-gradient(135deg, #f44336, #da190b);
        border: none;
        color: white;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>🛒 Détails de la commande #{{ commande.id }}</h3>
        <a href=\"{{ path('app_admin_commandes_index', {status: status, search: search, sort: sort}) }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"detail-header\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <div>
                <h4 class=\"mb-1\">Commande #{{ commande.id }}</h4>
                <p class=\"mb-0\">Date: {{ commande.createdAt|date('d/m/Y H:i') }}</p>
            </div>
            <div>
                <span class=\"status-badge status-{{ commande.status }}\">
                    {% if commande.status == 'en_attente' %}
                        ⏳ En attente
                    {% elseif commande.status == 'acceptee' %}
                        ✅ Acceptée
                    {% elseif commande.status == 'refusee' %}
                        ❌ Refusée
                    {% elseif commande.status == 'annulee' %}
                        🚫 Annulée
                    {% endif %}
                </span>
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-md-6\">
            <!-- Informations client -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-user\"></i> Informations client
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Nom complet :</div>
                    <div class=\"info-value\">{{ commande.customerName }}</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Téléphone :</div>
                    <div class=\"info-value\">{{ commande.phone }}</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Adresse de livraison :</div>
                    <div class=\"info-value\">{{ commande.location }}</div>
                </div>
            </div>

            <!-- Informations produit -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-box\"></i> Informations produit
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Nom du produit :</div>
                    <div class=\"info-value\">{{ produit.nom|default('Produit #' ~ commande.productId) }}</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Prix unitaire :</div>
                    <div class=\"info-value\">{{ produit.prix|default(0)|number_format(2, ',', ' ') }} €</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Quantité :</div>
                    <div class=\"info-value\">1</div>
                </div>
                <div class=\"info-row\">
                    <div class=\"info-label\">Total :</div>
                    <div class=\"info-value\"><strong>{{ produit.prix|default(0)|number_format(2, ',', ' ') }} €</strong></div>
                </div>
                {% if produit.description %}
                <div class=\"info-row\">
                    <div class=\"info-label\">Description :</div>
                    <div class=\"info-value\">{{ produit.description }}</div>
                </div>
                {% endif %}
            </div>
        </div>

        <div class=\"col-md-6\">
            <!-- Image du produit -->
            {% if produit.photo %}
            <div class=\"info-card text-center\">
                <div class=\"info-title\">
                    <i class=\"fas fa-image\"></i> Photo du produit
                </div>
                <img src=\"{{ produit.photo }}\" class=\"product-image\" alt=\"{{ produit.nom }}\">
            </div>
            {% endif %}

            <!-- Actions -->
            <div class=\"info-card\">
                <div class=\"info-title\">
                    <i class=\"fas fa-cog\"></i> Actions
                </div>
                <div class=\"text-center\">
                    {% if commande.status == 'en_attente' %}
                        <form action=\"{{ path('app_admin_commandes_accepter', {id: commande.id}) }}\" method=\"post\" style=\"display: inline-block;\">
                            <input type=\"hidden\" name=\"status\" value=\"{{ status }}\">
                            <input type=\"hidden\" name=\"search\" value=\"{{ search }}\">
                            <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\">
                            <button type=\"submit\" class=\"btn btn-action btn-accepter\" onclick=\"return confirm('Accepter cette commande ?')\">
                                <i class=\"fas fa-check\"></i> Accepter la commande
                            </button>
                        </form>
                        <button type=\"button\" class=\"btn btn-action btn-refuser\" data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                            <i class=\"fas fa-times\"></i> Refuser la commande
                        </button>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Refuser -->
<div class=\"modal fade\" id=\"refuseModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <form action=\"{{ path('app_admin_commandes_refuser', {id: commande.id}) }}\" method=\"post\">
                <input type=\"hidden\" name=\"status\" value=\"{{ status }}\">
                <input type=\"hidden\" name=\"search\" value=\"{{ search }}\">
                <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\">
                <div class=\"modal-header bg-danger text-white\">
                    <h5 class=\"modal-title\">Refuser la commande #{{ commande.id }}</h5>
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
                </div>
                <div class=\"modal-body\">
                    <label for=\"motif\" class=\"form-label\">Motif du refus (optionnel)</label>
                    <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\" placeholder=\"Expliquez la raison du refus...\"></textarea>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-danger\">Confirmer le refus</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}", "admin_commandes/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_commandes\\show.html.twig");
    }
}

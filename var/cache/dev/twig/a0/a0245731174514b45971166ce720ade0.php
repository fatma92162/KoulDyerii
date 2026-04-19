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

/* produits/panier.html.twig */
class __TwigTemplate_25aaecf89ea3ea1c85f72118c4d39ad2 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produits/panier.html.twig"));

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

        yield "Mon Panier - Koul Dyeri";
        
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
    .panier-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 50px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }

    .panier-card {
        border: 1px solid #E8D5B7;
        border-radius: 16px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }

    .panier-total {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .btn-theme {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 700;
        transition: opacity 0.3s ease;
    }

    .btn-theme:hover {
        color: white;
        opacity: 0.95;
    }

    .product-thumb {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 12px;
    }

    .qty-input {
        max-width: 90px;
        text-align: center;
        margin: 0 auto;
    }

    .code-section {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
    }

    .code-section .input-group {
        max-width: 400px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 70
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 71
        yield "<div class=\"panier-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-shopping-basket\"></i> Mon Panier</h1>
        <p class=\"lead\">Retrouvez les produits ajoutés</p>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "flashes", ["success"], "method", false, false, false, 79));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 80
            yield "        <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            ";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        yield "
    ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 86, $this->source); })()), "flashes", ["error"], "method", false, false, false, 86));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 87
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            ";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        yield "
    ";
        // line 93
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 93, $this->source); })()))) {
            // line 94
            yield "        <div class=\"alert alert-info text-center py-5\">
            <i class=\"fas fa-shopping-cart fa-3x mb-3\"></i>
            <h3>Votre panier est vide</h3>
            <p class=\"mb-4\">Découvrez nos produits !</p>
            <a href=\"";
            // line 98
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
            yield "\" class=\"btn btn-theme\">
                <i class=\"fas fa-arrow-left\"></i> Retour aux produits
            </a>
        </div>
    ";
        } else {
            // line 103
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 103, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 104
                yield "            <div class=\"card panier-card\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-2 text-center\">
                            ";
                // line 108
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 108), "photo", [], "any", false, false, false, 108)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 109
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 109), "photo", [], "any", false, false, false, 109), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 109), "nom", [], "any", false, false, false, 109), "html", null, true);
                    yield "\" class=\"product-thumb\">
                            ";
                } else {
                    // line 111
                    yield "                                <div class=\"bg-light rounded p-4 d-inline-block\">
                                    <i class=\"fas fa-image fa-2x text-muted\"></i>
                                </div>
                            ";
                }
                // line 115
                yield "                        </div>

                        <div class=\"col-md-3\">
                            <h5>";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 118), "nom", [], "any", false, false, false, 118), "html", null, true);
                yield "</h5>
                            <p class=\"text-muted mb-0\">
                                ";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 120), "description", [], "any", false, false, false, 120), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 120), "description", [], "any", false, false, false, 120)) > 80)) {
                    yield "...";
                }
                // line 121
                yield "                            </p>
                            <small class=\"text-muted\">
                                Prix unitaire : ";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 123), "prix", [], "any", false, false, false, 123), 2, ",", " "), "html", null, true);
                yield " €
                            </small>
                        </div>

                        <div class=\"col-md-2 text-center\">
                            <form method=\"post\" action=\"";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 128), "idProduit", [], "any", false, false, false, 128)]), "html", null, true);
                yield "\">
                                <label class=\"fw-bold mb-2 d-block\">Quantité</label>
                                <div class=\"d-flex justify-content-center gap-2\">
                                    <input type=\"number\" min=\"1\" name=\"quantite\" value=\"";
                // line 131
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantite", [], "any", false, false, false, 131), "html", null, true);
                yield "\" class=\"form-control qty-input\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary\">
                                        <i class=\"fas fa-sync-alt\"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class=\"col-md-2 text-center\">
                            <strong class=\"fs-5\">";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "sousTotal", [], "any", false, false, false, 140), 2, ",", " "), "html", null, true);
                yield " €</strong>
                        </div>

                        <div class=\"col-md-3 text-center\">
                            <form method=\"post\" action=\"";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "produit", [], "any", false, false, false, 144), "idProduit", [], "any", false, false, false, 144)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Voulez-vous vraiment retirer ce produit du panier ?');\">
                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
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
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            yield "
        <!-- Section Code de réduction -->
        <div class=\"card panier-card\">
            <div class=\"card-body\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-12\">
                        <div class=\"code-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3\">
                                <div>
                                    <i class=\"fas fa-ticket-alt fa-2x\" style=\"color: #8B0000;\"></i>
                                    <h5 class=\"d-inline-block ms-2 mb-0\">Code de réduction</h5>
                                </div>
                                <div class=\"input-group\">
                                    <input type=\"text\" id=\"codeReduction\" class=\"form-control\" placeholder=\"Entrez votre code promo...\" style=\"border-radius: 50px 0 0 50px;\">
                                    <button class=\"btn btn-theme\" id=\"appliquerCodeBtn\" style=\"border-radius: 0 50px 50px 0;\">
                                        <i class=\"fas fa-check\"></i> Appliquer
                                    </button>
                                </div>
                            </div>
                            <div id=\"codeMessage\" class=\"alert mt-2\" style=\"display: none;\"></div>
                            <div id=\"reductionInfo\" style=\"display: none;\">
                                <div class=\"alert alert-success d-flex justify-content-between align-items-center\">
                                    <div>
                                        <i class=\"fas fa-gift\"></i> 
                                        <span id=\"reductionTexte\"></span>
                                    </div>
                                    <button id=\"retirerCodeBtn\" class=\"btn btn-sm btn-outline-danger\">
                                        <i class=\"fas fa-times\"></i> Retirer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"card panier-card mt-4\">
            <div class=\"card-body\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-4\">
                        <div class=\"panier-total\">
                            Total : <span id=\"totalCommande\">";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 196, $this->source); })()), 2, ",", " "), "html", null, true);
            yield "</span> €
                        </div>
                        <div id=\"reductionDetail\" class=\"text-success mt-2\" style=\"display: none;\">
                            <i class=\"fas fa-tag\"></i> Réduction : -<span id=\"reductionMontant\">0</span> €
                        </div>
                    </div>

                    <div class=\"col-md-8\">
                        <div class=\"d-flex justify-content-end gap-2 flex-wrap\">
                            <form method=\"post\" action=\"";
            // line 205
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_clear");
            yield "\" onsubmit=\"return confirm('Voulez-vous vraiment vider votre panier ?');\">
                                <button type=\"submit\" class=\"btn btn-outline-danger\">
                                    <i class=\"fas fa-trash-alt\"></i> Vider le panier
                                </button>
                            </form>

                            <a href=\"";
            // line 211
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
            yield "\" class=\"btn btn-outline-secondary\">
                                <i class=\"fas fa-plus\"></i> Continuer mes achats
                            </a>

                            <button type=\"button\" class=\"btn btn-theme\" data-bs-toggle=\"modal\" data-bs-target=\"#commandePanierModal\">
                                <i class=\"fas fa-shopping-cart\"></i> Commander tout le panier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        // line 224
        yield "</div>

<!-- Modal commande -->
<div class=\"modal fade\" id=\"commandePanierModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-danger text-white\">
                <h5 class=\"modal-title\">
                    <i class=\"fas fa-shopping-cart\"></i> Commander tout le panier
                </h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>

            <form method=\"post\" action=\"";
        // line 237
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_commander");
        yield "\" id=\"panierCommandeForm\">
                <div class=\"modal-body\">
                    <input type=\"hidden\" name=\"abandoned_draft_id\" id=\"abandoned_draft_id\">
                    <input type=\"hidden\" name=\"code_reduction\" id=\"codeReductionHidden\" value=\"\">

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Nom complet</label>
                        <input type=\"text\" class=\"form-control\" name=\"customer_name\" id=\"draft_customer_name\" value=\"";
        // line 244
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 244, $this->source); })()), "user", [], "any", false, false, false, 244)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 244, $this->source); })()), "user", [], "any", false, false, false, 244), "nom", [], "any", false, false, false, 244), "html", null, true)) : (""));
        yield "\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Téléphone</label>
                        <input type=\"tel\" class=\"form-control\" name=\"phone\" id=\"draft_phone\" pattern=\"[0-9+\\-\\s]+\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Adresse de livraison</label>
                        <textarea class=\"form-control\" name=\"location\" id=\"draft_location\" rows=\"3\" required></textarea>
                    </div>

                    <div class=\"alert alert-light\">
                        <strong>Total panier :</strong> <span id=\"modalTotal\">";
        // line 258
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 258, $this->source); })()), 2, ",", " "), "html", null, true);
        yield "</span> €
                        <div id=\"modalReduction\" style=\"display: none;\">
                            <hr>
                            <strong>Réduction :</strong> -<span id=\"modalReductionMontant\">0</span> €<br>
                            <strong>Total après réduction :</strong> <span id=\"modalTotalApresReduction\">";
        // line 262
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 262, $this->source); })()), 2, ",", " "), "html", null, true);
        yield "</span> €
                        </div>
                    </div>

                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle\"></i>
                        ";
        // line 268
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 268, $this->source); })())) == 1)) {
            // line 269
            yield "                            1 produit sera commandé
                        ";
        } else {
            // line 271
            yield "                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 271, $this->source); })())), "html", null, true);
            yield " produits seront commandés
                        ";
        }
        // line 273
        yield "                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-theme\">
                        <i class=\"fas fa-check-circle\"></i> Confirmer la commande complète
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Gestion du code de réduction
let codeApplique = false;
let reductionValue = 0;

const codeInput = document.getElementById('codeReduction');
const appliquerBtn = document.getElementById('appliquerCodeBtn');
const codeMessage = document.getElementById('codeMessage');
const reductionInfo = document.getElementById('reductionInfo');
const reductionTexte = document.getElementById('reductionTexte');
const retirerCodeBtn = document.getElementById('retirerCodeBtn');
const totalCommandeSpan = document.getElementById('totalCommande');
const reductionDetail = document.getElementById('reductionDetail');
const reductionMontantSpan = document.getElementById('reductionMontant');
const modalTotal = document.getElementById('modalTotal');
const modalReduction = document.getElementById('modalReduction');
const modalReductionMontant = document.getElementById('modalReductionMontant');
const modalTotalApresReduction = document.getElementById('modalTotalApresReduction');
const codeReductionHidden = document.getElementById('codeReductionHidden');

let totalOriginal = parseFloat('";
        // line 307
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 307, $this->source); })()), "html", null, true);
        yield "');

function showMessage(message, type) {
    codeMessage.textContent = message;
    codeMessage.className = `alert alert-\${type}`;
    codeMessage.style.display = 'block';
    setTimeout(() => {
        codeMessage.style.display = 'none';
    }, 5000);
}

function updateTotalDisplay() {
    let nouveauTotal = totalOriginal;
    if (codeApplique) {
        nouveauTotal = totalOriginal - reductionValue;
    }
    totalCommandeSpan.textContent = nouveauTotal.toFixed(2);
    modalTotal.textContent = nouveauTotal.toFixed(2);
    modalTotalApresReduction.textContent = nouveauTotal.toFixed(2);
}

// Appliquer un code - CORRECTION AVEC credentials
if (appliquerBtn) {
    appliquerBtn.addEventListener('click', async () => {
        const code = codeInput.value.trim().toUpperCase();
        if (!code) {
            showMessage('Veuillez entrer un code', 'danger');
            return;
        }
        
        try {
            const response = await fetch('";
        // line 338
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_appliquer_code");
        yield "', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin',  // ← ESSENTIEL : envoie les cookies de session
                body: JSON.stringify({ code: code, montant_total: totalOriginal })
            });
            const data = await response.json();
            
            if (data.success) {
                codeApplique = true;
                reductionValue = data.reduction;
                showMessage(data.message, 'success');
                reductionInfo.style.display = 'block';
                reductionTexte.textContent = `Code \"\${code}\" appliqué : \${data.reduction}€ de réduction`;
                reductionDetail.style.display = 'block';
                reductionMontantSpan.textContent = data.reduction;
                modalReduction.style.display = 'block';
                modalReductionMontant.textContent = data.reduction;
                codeReductionHidden.value = code;
                codeInput.disabled = true;
                appliquerBtn.disabled = true;
                updateTotalDisplay();
            } else {
                showMessage(data.message, 'danger');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showMessage('Erreur lors de l\\'application du code', 'danger');
        }
    });
}

// Retirer un code - CORRECTION AVEC credentials
if (retirerCodeBtn) {
    retirerCodeBtn.addEventListener('click', async () => {
        try {
            const response = await fetch('";
        // line 377
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_panier_retirer_code");
        yield "', { 
                method: 'POST',
                credentials: 'same-origin'  // ← ESSENTIEL : envoie les cookies de session
            });
            const data = await response.json();
            if (data.success) {
                codeApplique = false;
                reductionValue = 0;
                reductionInfo.style.display = 'none';
                reductionDetail.style.display = 'none';
                modalReduction.style.display = 'none';
                codeReductionHidden.value = '';
                codeInput.disabled = false;
                appliquerBtn.disabled = false;
                codeInput.value = '';
                updateTotalDisplay();
                showMessage('Code de réduction retiré', 'info');
            }
        } catch (error) {
            console.error('Erreur:', error);
        }
    });
}

// Sauvegarde du brouillon
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('commandePanierModal');
    const customerNameInput = document.getElementById('draft_customer_name');
    const phoneInput = document.getElementById('draft_phone');
    const locationInput = document.getElementById('draft_location');
    const draftIdInput = document.getElementById('abandoned_draft_id');

    let saveTimeout = null;

    async function saveDraft() {
        const phone = phoneInput?.value?.trim() || '';
        const customerName = customerNameInput?.value?.trim() || '';
        const location = locationInput?.value?.trim() || '';
        const draftId = draftIdInput?.value?.trim() || '';

        if (phone.length < 6) {
            return;
        }

        try {
            const response = await fetch('";
        // line 422
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_abandoned_commandes_save");
        yield "', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    draft_id: draftId,
                    source: 'panier',
                    customer_name: customerName,
                    phone: phone,
                    location: location
                })
            });

            if (!response.ok) {
                console.error('Draft save failed:', response.status);
                return;
            }

            const data = await response.json();

            if (data.saved && data.draft_id) {
                draftIdInput.value = data.draft_id;
            }
        } catch (e) {
            console.error('Draft save error:', e);
        }
    }

    function queueSaveDraft() {
        if (saveTimeout) {
            clearTimeout(saveTimeout);
        }
        saveTimeout = setTimeout(saveDraft, 800);
    }

    if (customerNameInput) {
        customerNameInput.addEventListener('input', queueSaveDraft);
        customerNameInput.addEventListener('blur', saveDraft);
    }

    if (phoneInput) {
        phoneInput.addEventListener('input', queueSaveDraft);
        phoneInput.addEventListener('blur', saveDraft);
    }

    if (locationInput) {
        locationInput.addEventListener('input', queueSaveDraft);
        locationInput.addEventListener('blur', saveDraft);
    }

    if (modal) {
        modal.addEventListener('hide.bs.modal', function () {
            saveDraft();
        });
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
        return "produits/panier.html.twig";
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
        return array (  639 => 422,  591 => 377,  549 => 338,  515 => 307,  479 => 273,  473 => 271,  469 => 269,  467 => 268,  458 => 262,  451 => 258,  434 => 244,  424 => 237,  409 => 224,  393 => 211,  384 => 205,  372 => 196,  328 => 154,  312 => 144,  305 => 140,  293 => 131,  287 => 128,  279 => 123,  275 => 121,  270 => 120,  265 => 118,  260 => 115,  254 => 111,  246 => 109,  244 => 108,  238 => 104,  233 => 103,  225 => 98,  219 => 94,  217 => 93,  214 => 92,  204 => 88,  201 => 87,  197 => 86,  194 => 85,  184 => 81,  181 => 80,  177 => 79,  167 => 71,  157 => 70,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon Panier - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .panier-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 50px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }

    .panier-card {
        border: 1px solid #E8D5B7;
        border-radius: 16px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }

    .panier-total {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .btn-theme {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 700;
        transition: opacity 0.3s ease;
    }

    .btn-theme:hover {
        color: white;
        opacity: 0.95;
    }

    .product-thumb {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 12px;
    }

    .qty-input {
        max-width: 90px;
        text-align: center;
        margin: 0 auto;
    }

    .code-section {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
    }

    .code-section .input-group {
        max-width: 400px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"panier-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-shopping-basket\"></i> Mon Panier</h1>
        <p class=\"lead\">Retrouvez les produits ajoutés</p>
    </div>
</div>

<div class=\"container mb-5\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {% if panier is empty %}
        <div class=\"alert alert-info text-center py-5\">
            <i class=\"fas fa-shopping-cart fa-3x mb-3\"></i>
            <h3>Votre panier est vide</h3>
            <p class=\"mb-4\">Découvrez nos produits !</p>
            <a href=\"{{ path('app_produits_index') }}\" class=\"btn btn-theme\">
                <i class=\"fas fa-arrow-left\"></i> Retour aux produits
            </a>
        </div>
    {% else %}
        {% for item in panier %}
            <div class=\"card panier-card\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-2 text-center\">
                            {% if item.produit.photo %}
                                <img src=\"{{ item.produit.photo }}\" alt=\"{{ item.produit.nom }}\" class=\"product-thumb\">
                            {% else %}
                                <div class=\"bg-light rounded p-4 d-inline-block\">
                                    <i class=\"fas fa-image fa-2x text-muted\"></i>
                                </div>
                            {% endif %}
                        </div>

                        <div class=\"col-md-3\">
                            <h5>{{ item.produit.nom }}</h5>
                            <p class=\"text-muted mb-0\">
                                {{ item.produit.description|slice(0, 80) }}{% if item.produit.description|length > 80 %}...{% endif %}
                            </p>
                            <small class=\"text-muted\">
                                Prix unitaire : {{ item.produit.prix|number_format(2, ',', ' ') }} €
                            </small>
                        </div>

                        <div class=\"col-md-2 text-center\">
                            <form method=\"post\" action=\"{{ path('app_panier_update', {id: item.produit.idProduit}) }}\">
                                <label class=\"fw-bold mb-2 d-block\">Quantité</label>
                                <div class=\"d-flex justify-content-center gap-2\">
                                    <input type=\"number\" min=\"1\" name=\"quantite\" value=\"{{ item.quantite }}\" class=\"form-control qty-input\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary\">
                                        <i class=\"fas fa-sync-alt\"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class=\"col-md-2 text-center\">
                            <strong class=\"fs-5\">{{ item.sousTotal|number_format(2, ',', ' ') }} €</strong>
                        </div>

                        <div class=\"col-md-3 text-center\">
                            <form method=\"post\" action=\"{{ path('app_panier_remove', {id: item.produit.idProduit}) }}\" onsubmit=\"return confirm('Voulez-vous vraiment retirer ce produit du panier ?');\">
                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {% endfor %}

        <!-- Section Code de réduction -->
        <div class=\"card panier-card\">
            <div class=\"card-body\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-12\">
                        <div class=\"code-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3\">
                                <div>
                                    <i class=\"fas fa-ticket-alt fa-2x\" style=\"color: #8B0000;\"></i>
                                    <h5 class=\"d-inline-block ms-2 mb-0\">Code de réduction</h5>
                                </div>
                                <div class=\"input-group\">
                                    <input type=\"text\" id=\"codeReduction\" class=\"form-control\" placeholder=\"Entrez votre code promo...\" style=\"border-radius: 50px 0 0 50px;\">
                                    <button class=\"btn btn-theme\" id=\"appliquerCodeBtn\" style=\"border-radius: 0 50px 50px 0;\">
                                        <i class=\"fas fa-check\"></i> Appliquer
                                    </button>
                                </div>
                            </div>
                            <div id=\"codeMessage\" class=\"alert mt-2\" style=\"display: none;\"></div>
                            <div id=\"reductionInfo\" style=\"display: none;\">
                                <div class=\"alert alert-success d-flex justify-content-between align-items-center\">
                                    <div>
                                        <i class=\"fas fa-gift\"></i> 
                                        <span id=\"reductionTexte\"></span>
                                    </div>
                                    <button id=\"retirerCodeBtn\" class=\"btn btn-sm btn-outline-danger\">
                                        <i class=\"fas fa-times\"></i> Retirer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"card panier-card mt-4\">
            <div class=\"card-body\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-4\">
                        <div class=\"panier-total\">
                            Total : <span id=\"totalCommande\">{{ total|number_format(2, ',', ' ') }}</span> €
                        </div>
                        <div id=\"reductionDetail\" class=\"text-success mt-2\" style=\"display: none;\">
                            <i class=\"fas fa-tag\"></i> Réduction : -<span id=\"reductionMontant\">0</span> €
                        </div>
                    </div>

                    <div class=\"col-md-8\">
                        <div class=\"d-flex justify-content-end gap-2 flex-wrap\">
                            <form method=\"post\" action=\"{{ path('app_panier_clear') }}\" onsubmit=\"return confirm('Voulez-vous vraiment vider votre panier ?');\">
                                <button type=\"submit\" class=\"btn btn-outline-danger\">
                                    <i class=\"fas fa-trash-alt\"></i> Vider le panier
                                </button>
                            </form>

                            <a href=\"{{ path('app_produits_index') }}\" class=\"btn btn-outline-secondary\">
                                <i class=\"fas fa-plus\"></i> Continuer mes achats
                            </a>

                            <button type=\"button\" class=\"btn btn-theme\" data-bs-toggle=\"modal\" data-bs-target=\"#commandePanierModal\">
                                <i class=\"fas fa-shopping-cart\"></i> Commander tout le panier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {% endif %}
</div>

<!-- Modal commande -->
<div class=\"modal fade\" id=\"commandePanierModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-danger text-white\">
                <h5 class=\"modal-title\">
                    <i class=\"fas fa-shopping-cart\"></i> Commander tout le panier
                </h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>

            <form method=\"post\" action=\"{{ path('app_panier_commander') }}\" id=\"panierCommandeForm\">
                <div class=\"modal-body\">
                    <input type=\"hidden\" name=\"abandoned_draft_id\" id=\"abandoned_draft_id\">
                    <input type=\"hidden\" name=\"code_reduction\" id=\"codeReductionHidden\" value=\"\">

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Nom complet</label>
                        <input type=\"text\" class=\"form-control\" name=\"customer_name\" id=\"draft_customer_name\" value=\"{{ app.user ? app.user.nom : '' }}\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Téléphone</label>
                        <input type=\"tel\" class=\"form-control\" name=\"phone\" id=\"draft_phone\" pattern=\"[0-9+\\-\\s]+\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label class=\"form-label\">Adresse de livraison</label>
                        <textarea class=\"form-control\" name=\"location\" id=\"draft_location\" rows=\"3\" required></textarea>
                    </div>

                    <div class=\"alert alert-light\">
                        <strong>Total panier :</strong> <span id=\"modalTotal\">{{ total|number_format(2, ',', ' ') }}</span> €
                        <div id=\"modalReduction\" style=\"display: none;\">
                            <hr>
                            <strong>Réduction :</strong> -<span id=\"modalReductionMontant\">0</span> €<br>
                            <strong>Total après réduction :</strong> <span id=\"modalTotalApresReduction\">{{ total|number_format(2, ',', ' ') }}</span> €
                        </div>
                    </div>

                    <div class=\"alert alert-info\">
                        <i class=\"fas fa-info-circle\"></i>
                        {% if panier|length == 1 %}
                            1 produit sera commandé
                        {% else %}
                            {{ panier|length }} produits seront commandés
                        {% endif %}
                    </div>
                </div>

                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-theme\">
                        <i class=\"fas fa-check-circle\"></i> Confirmer la commande complète
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Gestion du code de réduction
let codeApplique = false;
let reductionValue = 0;

const codeInput = document.getElementById('codeReduction');
const appliquerBtn = document.getElementById('appliquerCodeBtn');
const codeMessage = document.getElementById('codeMessage');
const reductionInfo = document.getElementById('reductionInfo');
const reductionTexte = document.getElementById('reductionTexte');
const retirerCodeBtn = document.getElementById('retirerCodeBtn');
const totalCommandeSpan = document.getElementById('totalCommande');
const reductionDetail = document.getElementById('reductionDetail');
const reductionMontantSpan = document.getElementById('reductionMontant');
const modalTotal = document.getElementById('modalTotal');
const modalReduction = document.getElementById('modalReduction');
const modalReductionMontant = document.getElementById('modalReductionMontant');
const modalTotalApresReduction = document.getElementById('modalTotalApresReduction');
const codeReductionHidden = document.getElementById('codeReductionHidden');

let totalOriginal = parseFloat('{{ total }}');

function showMessage(message, type) {
    codeMessage.textContent = message;
    codeMessage.className = `alert alert-\${type}`;
    codeMessage.style.display = 'block';
    setTimeout(() => {
        codeMessage.style.display = 'none';
    }, 5000);
}

function updateTotalDisplay() {
    let nouveauTotal = totalOriginal;
    if (codeApplique) {
        nouveauTotal = totalOriginal - reductionValue;
    }
    totalCommandeSpan.textContent = nouveauTotal.toFixed(2);
    modalTotal.textContent = nouveauTotal.toFixed(2);
    modalTotalApresReduction.textContent = nouveauTotal.toFixed(2);
}

// Appliquer un code - CORRECTION AVEC credentials
if (appliquerBtn) {
    appliquerBtn.addEventListener('click', async () => {
        const code = codeInput.value.trim().toUpperCase();
        if (!code) {
            showMessage('Veuillez entrer un code', 'danger');
            return;
        }
        
        try {
            const response = await fetch('{{ path('app_panier_appliquer_code') }}', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin',  // ← ESSENTIEL : envoie les cookies de session
                body: JSON.stringify({ code: code, montant_total: totalOriginal })
            });
            const data = await response.json();
            
            if (data.success) {
                codeApplique = true;
                reductionValue = data.reduction;
                showMessage(data.message, 'success');
                reductionInfo.style.display = 'block';
                reductionTexte.textContent = `Code \"\${code}\" appliqué : \${data.reduction}€ de réduction`;
                reductionDetail.style.display = 'block';
                reductionMontantSpan.textContent = data.reduction;
                modalReduction.style.display = 'block';
                modalReductionMontant.textContent = data.reduction;
                codeReductionHidden.value = code;
                codeInput.disabled = true;
                appliquerBtn.disabled = true;
                updateTotalDisplay();
            } else {
                showMessage(data.message, 'danger');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showMessage('Erreur lors de l\\'application du code', 'danger');
        }
    });
}

// Retirer un code - CORRECTION AVEC credentials
if (retirerCodeBtn) {
    retirerCodeBtn.addEventListener('click', async () => {
        try {
            const response = await fetch('{{ path('app_panier_retirer_code') }}', { 
                method: 'POST',
                credentials: 'same-origin'  // ← ESSENTIEL : envoie les cookies de session
            });
            const data = await response.json();
            if (data.success) {
                codeApplique = false;
                reductionValue = 0;
                reductionInfo.style.display = 'none';
                reductionDetail.style.display = 'none';
                modalReduction.style.display = 'none';
                codeReductionHidden.value = '';
                codeInput.disabled = false;
                appliquerBtn.disabled = false;
                codeInput.value = '';
                updateTotalDisplay();
                showMessage('Code de réduction retiré', 'info');
            }
        } catch (error) {
            console.error('Erreur:', error);
        }
    });
}

// Sauvegarde du brouillon
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('commandePanierModal');
    const customerNameInput = document.getElementById('draft_customer_name');
    const phoneInput = document.getElementById('draft_phone');
    const locationInput = document.getElementById('draft_location');
    const draftIdInput = document.getElementById('abandoned_draft_id');

    let saveTimeout = null;

    async function saveDraft() {
        const phone = phoneInput?.value?.trim() || '';
        const customerName = customerNameInput?.value?.trim() || '';
        const location = locationInput?.value?.trim() || '';
        const draftId = draftIdInput?.value?.trim() || '';

        if (phone.length < 6) {
            return;
        }

        try {
            const response = await fetch('{{ path('app_abandoned_commandes_save') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    draft_id: draftId,
                    source: 'panier',
                    customer_name: customerName,
                    phone: phone,
                    location: location
                })
            });

            if (!response.ok) {
                console.error('Draft save failed:', response.status);
                return;
            }

            const data = await response.json();

            if (data.saved && data.draft_id) {
                draftIdInput.value = data.draft_id;
            }
        } catch (e) {
            console.error('Draft save error:', e);
        }
    }

    function queueSaveDraft() {
        if (saveTimeout) {
            clearTimeout(saveTimeout);
        }
        saveTimeout = setTimeout(saveDraft, 800);
    }

    if (customerNameInput) {
        customerNameInput.addEventListener('input', queueSaveDraft);
        customerNameInput.addEventListener('blur', saveDraft);
    }

    if (phoneInput) {
        phoneInput.addEventListener('input', queueSaveDraft);
        phoneInput.addEventListener('blur', saveDraft);
    }

    if (locationInput) {
        locationInput.addEventListener('input', queueSaveDraft);
        locationInput.addEventListener('blur', saveDraft);
    }

    if (modal) {
        modal.addEventListener('hide.bs.modal', function () {
            saveDraft();
        });
    }
});
</script>
{% endblock %}", "produits/panier.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\produits\\panier.html.twig");
    }
}

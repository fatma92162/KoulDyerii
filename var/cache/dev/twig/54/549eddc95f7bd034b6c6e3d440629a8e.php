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

/* commandes/show.html.twig */
class __TwigTemplate_8bb63d371274e4e2fd0f6b82e1886315 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commandes/show.html.twig"));

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

        yield "Commande #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        yield " - Koul Dyeri";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container py-5\">
    <div class=\"row\">
        <div class=\"col-md-8 mx-auto\">
            <div class=\"card shadow\">
                <div class=\"card-header bg-primary text-white\">
                    <h3 class=\"mb-0\">Commande #";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11), "html", null, true);
        yield "</h3>
                </div>
                <div class=\"card-body\">
                    <div class=\"row mb-4\">
                        <div class=\"col-md-6\">
                            <h5>Statut</h5>
                            <span class=\"status-badge status-";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 17, $this->source); })()), "status", [], "any", false, false, false, 17), ["_" => "-"]), "html", null, true);
        yield " badge-lg\">
                                ";
        // line 18
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 18, $this->source); })()), "status", [], "any", false, false, false, 18) == "en_attente")) {
            // line 19
            yield "                                    ⏳ En attente
                                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 20
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 20, $this->source); })()), "status", [], "any", false, false, false, 20) == "acceptee")) {
            // line 21
            yield "                                    ✅ Acceptée
                                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 22
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 22, $this->source); })()), "status", [], "any", false, false, false, 22) == "refusee")) {
            // line 23
            yield "                                    ❌ Refusée
                                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 24
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 24, $this->source); })()), "status", [], "any", false, false, false, 24) == "annulee")) {
            // line 25
            yield "                                    🚫 Annulée
                                ";
        }
        // line 27
        yield "                            </span>
                        </div>
                        <div class=\"col-md-6 text-md-end\">
                            <h5>Date de commande</h5>
                            <p>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 31, $this->source); })()), "createdAt", [], "any", false, false, false, 31), "d/m/Y H:i"), "html", null, true);
        yield "</p>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class=\"row mb-4\">
                        <div class=\"col-12\">
                            <h5>Détails du produit</h5>
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <strong>Produit :</strong>
                                    <p>";
        // line 43
        if ((($tmp = (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 43, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 43, $this->source); })()), "nom", [], "any", false, false, false, 43), "html", null, true);
        } else {
            yield "Produit #";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 43, $this->source); })()), "productId", [], "any", false, false, false, 43), "html", null, true);
        }
        yield "</p>
                                </div>
                                <div class=\"col-md-4\">
                                    <strong>Prix :</strong>
                                    <p>";
        // line 47
        if ((($tmp = (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 47, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 47, $this->source); })()), "prix", [], "any", false, false, false, 47), 2, ",", " "), "html", null, true);
            yield " €";
        } else {
            yield "-";
        }
        yield "</p>
                                </div>
                                <div class=\"col-md-4\">
                                    <strong>Quantité :</strong>
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class=\"row mb-4\">
                        <div class=\"col-12\">
                            <h5>Informations de livraison</h5>
                            <p><strong>Nom :</strong> ";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 62, $this->source); })()), "customerName", [], "any", false, false, false, 62), "html", null, true);
        yield "</p>
                            <p><strong>Téléphone :</strong> ";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 63, $this->source); })()), "phone", [], "any", false, false, false, 63), "html", null, true);
        yield "</p>
                            <p><strong>Adresse :</strong> ";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 64, $this->source); })()), "location", [], "any", false, false, false, 64), "html", null, true);
        yield "</p>
                        </div>
                    </div>
                    
                    ";
        // line 68
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 68, $this->source); })()), "status", [], "any", false, false, false, 68) == "refusee")) {
            // line 69
            yield "                        <div class=\"alert alert-danger\">
                            <i class=\"fas fa-exclamation-triangle\"></i> Cette commande a été refusée.
                        </div>
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 72
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 72, $this->source); })()), "status", [], "any", false, false, false, 72) == "annulee")) {
            // line 73
            yield "                        <div class=\"alert alert-warning\">
                            <i class=\"fas fa-info-circle\"></i> Cette commande a été annulée.
                        </div>
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 76
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 76, $this->source); })()), "status", [], "any", false, false, false, 76) == "acceptee")) {
            // line 77
            yield "                        <div class=\"alert alert-success\">
                            <i class=\"fas fa-check-circle\"></i> Votre commande a été acceptée et sera bientôt livrée !
                        </div>
                    ";
        }
        // line 81
        yield "                </div>
                <div class=\"card-footer\">
                    <a href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mes_commandes");
        yield "\" class=\"btn btn-secondary\">
                        <i class=\"fas fa-arrow-left\"></i> Retour
                    </a>
                    ";
        // line 86
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 86, $this->source); })()), "status", [], "any", false, false, false, 86) == "en_attente")) {
            // line 87
            yield "                        <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mes_commandes_annuler", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 87, $this->source); })()), "id", [], "any", false, false, false, 87)]), "html", null, true);
            yield "\" method=\"post\" style=\"display: inline-block; float: right;\">
                            <button type=\"submit\" class=\"btn btn-danger\" onclick=\"return confirm('Annuler cette commande ?')\">
                                <i class=\"fas fa-times\"></i> Annuler la commande
                            </button>
                        </form>
                    ";
        }
        // line 93
        yield "                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .status-badge {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
    }
    .status-en-attente {
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
    .badge-lg {
        font-size: 16px;
        padding: 10px 20px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "commandes/show.html.twig";
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
        return array (  243 => 93,  233 => 87,  231 => 86,  225 => 83,  221 => 81,  215 => 77,  213 => 76,  208 => 73,  206 => 72,  201 => 69,  199 => 68,  192 => 64,  188 => 63,  184 => 62,  161 => 47,  149 => 43,  134 => 31,  128 => 27,  124 => 25,  122 => 24,  119 => 23,  117 => 22,  114 => 21,  112 => 20,  109 => 19,  107 => 18,  103 => 17,  94 => 11,  87 => 6,  77 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Commande #{{ commande.id }} - Koul Dyeri{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"row\">
        <div class=\"col-md-8 mx-auto\">
            <div class=\"card shadow\">
                <div class=\"card-header bg-primary text-white\">
                    <h3 class=\"mb-0\">Commande #{{ commande.id }}</h3>
                </div>
                <div class=\"card-body\">
                    <div class=\"row mb-4\">
                        <div class=\"col-md-6\">
                            <h5>Statut</h5>
                            <span class=\"status-badge status-{{ commande.status|replace({'_': '-'}) }} badge-lg\">
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
                        <div class=\"col-md-6 text-md-end\">
                            <h5>Date de commande</h5>
                            <p>{{ commande.createdAt|date('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class=\"row mb-4\">
                        <div class=\"col-12\">
                            <h5>Détails du produit</h5>
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <strong>Produit :</strong>
                                    <p>{% if produit %}{{ produit.nom }}{% else %}Produit #{{ commande.productId }}{% endif %}</p>
                                </div>
                                <div class=\"col-md-4\">
                                    <strong>Prix :</strong>
                                    <p>{% if produit %}{{ produit.prix|number_format(2, ',', ' ') }} €{% else %}-{% endif %}</p>
                                </div>
                                <div class=\"col-md-4\">
                                    <strong>Quantité :</strong>
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class=\"row mb-4\">
                        <div class=\"col-12\">
                            <h5>Informations de livraison</h5>
                            <p><strong>Nom :</strong> {{ commande.customerName }}</p>
                            <p><strong>Téléphone :</strong> {{ commande.phone }}</p>
                            <p><strong>Adresse :</strong> {{ commande.location }}</p>
                        </div>
                    </div>
                    
                    {% if commande.status == 'refusee' %}
                        <div class=\"alert alert-danger\">
                            <i class=\"fas fa-exclamation-triangle\"></i> Cette commande a été refusée.
                        </div>
                    {% elseif commande.status == 'annulee' %}
                        <div class=\"alert alert-warning\">
                            <i class=\"fas fa-info-circle\"></i> Cette commande a été annulée.
                        </div>
                    {% elseif commande.status == 'acceptee' %}
                        <div class=\"alert alert-success\">
                            <i class=\"fas fa-check-circle\"></i> Votre commande a été acceptée et sera bientôt livrée !
                        </div>
                    {% endif %}
                </div>
                <div class=\"card-footer\">
                    <a href=\"{{ path('app_mes_commandes') }}\" class=\"btn btn-secondary\">
                        <i class=\"fas fa-arrow-left\"></i> Retour
                    </a>
                    {% if commande.status == 'en_attente' %}
                        <form action=\"{{ path('app_mes_commandes_annuler', {id: commande.id}) }}\" method=\"post\" style=\"display: inline-block; float: right;\">
                            <button type=\"submit\" class=\"btn btn-danger\" onclick=\"return confirm('Annuler cette commande ?')\">
                                <i class=\"fas fa-times\"></i> Annuler la commande
                            </button>
                        </form>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .status-badge {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
    }
    .status-en-attente {
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
    .badge-lg {
        font-size: 16px;
        padding: 10px 20px;
    }
</style>
{% endblock %}", "commandes/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\commandes\\show.html.twig");
    }
}

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

/* produits/show.html.twig */
class __TwigTemplate_f4c50ea3417c19611dfc7e323e95e1e6 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produits/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
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
        <div class=\"col-md-6\">
            ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 9, $this->source); })()), "photo", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 10, $this->source); })()), "photo", [], "any", false, false, false, 10), "html", null, true);
            yield "\" class=\"img-fluid rounded shadow\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 10, $this->source); })()), "nom", [], "any", false, false, false, 10), "html", null, true);
            yield "\">
            ";
        } else {
            // line 12
            yield "                <div class=\"bg-light rounded shadow d-flex align-items-center justify-content-center\" style=\"height: 400px;\">
                    <i class=\"fas fa-utensils fa-5x text-muted\"></i>
                </div>
            ";
        }
        // line 16
        yield "        </div>
        <div class=\"col-md-6\">
            <h1 class=\"mb-3\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 18, $this->source); })()), "nom", [], "any", false, false, false, 18), "html", null, true);
        yield "</h1>
            <div class=\"mb-3\">
                <span class=\"badge bg-success\">✅ Disponible</span>
            </div>
            <h2 class=\"text-danger mb-4\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 22, $this->source); })()), "prix", [], "any", false, false, false, 22), 2, ",", " "), "html", null, true);
        yield " €</h2>
            <p class=\"text-muted\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 23, $this->source); })()), "description", [], "any", false, false, false, 23), "html", null, true);
        yield "</p>
            
            <hr>
            
            <h4>Passer commande</h4>
            
            ";
        // line 29
        if ((array_key_exists("errors", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 29, $this->source); })())) > 0))) {
            // line 30
            yield "                <div class=\"alert alert-danger\">
                    <ul class=\"mb-0\">
                        ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 32, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 33
                yield "                            <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "                    </ul>
                </div>
            ";
        }
        // line 38
        yield "            
            <form method=\"post\" action=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_commander", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 39, $this->source); })()), "idProduit", [], "any", false, false, false, 39)]), "html", null, true);
        yield "\">
                <div class=\"mb-3\">
                    <label for=\"customer_name\" class=\"form-label\">Nom complet *</label>
                    <input type=\"text\" class=\"form-control\" id=\"customer_name\" name=\"customer_name\" value=\"";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "user", [], "any", false, false, false, 42), "nom", [], "any", false, false, false, 42), "html", null, true);
        yield "\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"phone\" class=\"form-label\">Téléphone *</label>
                    <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"location\" class=\"form-label\">Adresse de livraison *</label>
                    <textarea class=\"form-control\" id=\"location\" name=\"location\" rows=\"3\" required></textarea>
                </div>
                <button type=\"submit\" class=\"btn btn-primary btn-lg w-100\">
                    <i class=\"fas fa-check-circle\"></i> Confirmer la commande
                </button>
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
        return "produits/show.html.twig";
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
        return array (  164 => 42,  158 => 39,  155 => 38,  150 => 35,  141 => 33,  137 => 32,  133 => 30,  131 => 29,  122 => 23,  118 => 22,  111 => 18,  107 => 16,  101 => 12,  93 => 10,  91 => 9,  86 => 6,  76 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ produit.nom }} - Koul Dyeri{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            {% if produit.photo %}
                <img src=\"{{ produit.photo }}\" class=\"img-fluid rounded shadow\" alt=\"{{ produit.nom }}\">
            {% else %}
                <div class=\"bg-light rounded shadow d-flex align-items-center justify-content-center\" style=\"height: 400px;\">
                    <i class=\"fas fa-utensils fa-5x text-muted\"></i>
                </div>
            {% endif %}
        </div>
        <div class=\"col-md-6\">
            <h1 class=\"mb-3\">{{ produit.nom }}</h1>
            <div class=\"mb-3\">
                <span class=\"badge bg-success\">✅ Disponible</span>
            </div>
            <h2 class=\"text-danger mb-4\">{{ produit.prix|number_format(2, ',', ' ') }} €</h2>
            <p class=\"text-muted\">{{ produit.description }}</p>
            
            <hr>
            
            <h4>Passer commande</h4>
            
            {% if errors is defined and errors|length > 0 %}
                <div class=\"alert alert-danger\">
                    <ul class=\"mb-0\">
                        {% for error in errors %}
                            <li>{{ error }}</li>
                        {% endfor %}
                    </ul>
                </div>
            {% endif %}
            
            <form method=\"post\" action=\"{{ path('app_produits_commander', {id: produit.idProduit}) }}\">
                <div class=\"mb-3\">
                    <label for=\"customer_name\" class=\"form-label\">Nom complet *</label>
                    <input type=\"text\" class=\"form-control\" id=\"customer_name\" name=\"customer_name\" value=\"{{ app.user.nom }}\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"phone\" class=\"form-label\">Téléphone *</label>
                    <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\" required>
                </div>
                <div class=\"mb-3\">
                    <label for=\"location\" class=\"form-label\">Adresse de livraison *</label>
                    <textarea class=\"form-control\" id=\"location\" name=\"location\" rows=\"3\" required></textarea>
                </div>
                <button type=\"submit\" class=\"btn btn-primary btn-lg w-100\">
                    <i class=\"fas fa-check-circle\"></i> Confirmer la commande
                </button>
            </form>
        </div>
    </div>
</div>
{% endblock %}", "produits/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\produits\\show.html.twig");
    }
}

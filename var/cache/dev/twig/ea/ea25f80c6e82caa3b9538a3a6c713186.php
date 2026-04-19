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

/* plats_public/top_ventes_user.html.twig */
class __TwigTemplate_bc91441abdb59085f665436800273add extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "plats_public/top_ventes_user.html.twig"));

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

        yield "Meilleures ventes — plats";
        
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
    <h1 class=\"mb-3\">🔥 Meilleures ventes</h1>
    <p class=\"text-muted\">Plats les plus commandés (quantités vendues). Choisissez un plat pour l’ajouter au panier depuis la page publique.</p>

    <div class=\"row g-4\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 11, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
            // line 12
            yield "            <div class=\"col-md-4\">
                <div class=\"card h-100 shadow-sm\">
                    ";
            // line 14
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 14)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 15
                yield "                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 15), "html", null, true);
                yield "\" class=\"card-img-top\" alt=\"\" style=\"height:160px;object-fit:cover;\">
                    ";
            }
            // line 17
            yield "                    <div class=\"card-body\">
                        <h5 class=\"card-title\">";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 18), "html", null, true);
            yield "</h5>
                        <p class=\"small text-muted mb-2\">🛒 ";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "salesCount", [], "any", false, false, false, 19), "html", null, true);
            yield " unités vendues (cumul)</p>
                        ";
            // line 20
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 21
                yield "                            <p class=\"small mb-2\"><i class=\"fas fa-store\"></i> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 21), "nom", [], "any", false, false, false, 21), "html", null, true);
                yield "</p>
                        ";
            }
            // line 23
            yield "                        <p class=\"fw-bold text-danger mb-0\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 23), 2, ",", " "), "html", null, true);
            yield " €</p>
                    </div>
                    <div class=\"card-footer bg-white border-0\">
                        <a href=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public");
            yield "\" class=\"btn btn-sm btn-primary w-100\">Voir sur la carte des plats</a>
                    </div>
                </div>
            </div>
        ";
            $context['_iterated'] = true;
        }
        // line 30
        if (!$context['_iterated']) {
            // line 31
            yield "            <p class=\"text-muted\">Aucun plat pour le moment.</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "    </div>
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
        return "plats_public/top_ventes_user.html.twig";
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
        return array (  153 => 33,  146 => 31,  144 => 30,  135 => 26,  128 => 23,  122 => 21,  120 => 20,  116 => 19,  112 => 18,  109 => 17,  103 => 15,  101 => 14,  97 => 12,  92 => 11,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Meilleures ventes — plats{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <h1 class=\"mb-3\">🔥 Meilleures ventes</h1>
    <p class=\"text-muted\">Plats les plus commandés (quantités vendues). Choisissez un plat pour l’ajouter au panier depuis la page publique.</p>

    <div class=\"row g-4\">
        {% for plat in plats %}
            <div class=\"col-md-4\">
                <div class=\"card h-100 shadow-sm\">
                    {% if plat.image %}
                        <img src=\"{{ plat.image }}\" class=\"card-img-top\" alt=\"\" style=\"height:160px;object-fit:cover;\">
                    {% endif %}
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{{ plat.nom }}</h5>
                        <p class=\"small text-muted mb-2\">🛒 {{ plat.salesCount }} unités vendues (cumul)</p>
                        {% if plat.partenaire %}
                            <p class=\"small mb-2\"><i class=\"fas fa-store\"></i> {{ plat.partenaire.nom }}</p>
                        {% endif %}
                        <p class=\"fw-bold text-danger mb-0\">{{ plat.prix|number_format(2, ',', ' ') }} €</p>
                    </div>
                    <div class=\"card-footer bg-white border-0\">
                        <a href=\"{{ path('app_plats_public') }}\" class=\"btn btn-sm btn-primary w-100\">Voir sur la carte des plats</a>
                    </div>
                </div>
            </div>
        {% else %}
            <p class=\"text-muted\">Aucun plat pour le moment.</p>
        {% endfor %}
    </div>
</div>
{% endblock %}
", "plats_public/top_ventes_user.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\plats_public\\top_ventes_user.html.twig");
    }
}

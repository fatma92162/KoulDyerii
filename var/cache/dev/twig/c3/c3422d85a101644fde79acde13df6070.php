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

/* utilisateur/historique.html.twig */
class __TwigTemplate_20a2d1437815b31fcb76b7b93bda36cb extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/historique.html.twig"));

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

        yield "Mon historique de connexions";
        
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
        yield "<div class=\"container mt-4\">
    <h1>Historique des connexions</h1>
    
    <table class=\"table\">
        <thead>
            <tr>
                <th>Date</th>
                <th>IP</th>
                <th>Navigateur</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["historique"]) || array_key_exists("historique", $context) ? $context["historique"] : (function () { throw new RuntimeError('Variable "historique" does not exist.', 18, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["connexion"]) {
            // line 19
            yield "            <tr>
                <td>";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "dateConnexion", [], "any", false, false, false, 20), "d/m/Y H:i:s"), "html", null, true);
            yield "</td>
                <td>";
            // line 21
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "ipAdresse", [], "any", true, true, false, 21) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "ipAdresse", [], "any", false, false, false, 21)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "ipAdresse", [], "any", false, false, false, 21), "html", null, true)) : ("-"));
            yield "</td>
                <td>";
            // line 22
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "userAgent", [], "any", true, true, false, 22) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "userAgent", [], "any", false, false, false, 22)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["connexion"], "userAgent", [], "any", false, false, false, 22), "html", null, true)) : ("-"));
            yield "</td>
            </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 24
        if (!$context['_iterated']) {
            // line 25
            yield "                <tr><td colspan=\"3\">Aucune connexion enregistrée.</td></tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['connexion'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "        </tbody>
    </table>

    <div class=\"mt-3 d-flex gap-2\">
        <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
        yield "\" class=\"btn btn-secondary\">← Retour au profil</a>
        
        <!-- ✅ Bouton Déconnecter tous les appareils -->
        <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout_all_devices");
        yield "\" 
           class=\"btn btn-danger\" 
           onclick=\"return confirm('Déconnecter tous les appareils ? Vous serez déconnecté de cette session également.')\">
            🔓 Déconnecter tous les appareils
        </a>
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
        return "utilisateur/historique.html.twig";
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
        return array (  143 => 34,  137 => 31,  131 => 27,  124 => 25,  122 => 24,  115 => 22,  111 => 21,  107 => 20,  104 => 19,  99 => 18,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon historique de connexions{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    <h1>Historique des connexions</h1>
    
    <table class=\"table\">
        <thead>
            <tr>
                <th>Date</th>
                <th>IP</th>
                <th>Navigateur</th>
            </tr>
        </thead>
        <tbody>
            {% for connexion in historique %}
            <tr>
                <td>{{ connexion.dateConnexion|date('d/m/Y H:i:s') }}</td>
                <td>{{ connexion.ipAdresse ?? '-' }}</td>
                <td>{{ connexion.userAgent ?? '-' }}</td>
            </tr>
            {% else %}
                <tr><td colspan=\"3\">Aucune connexion enregistrée.</td></tr>
            {% endfor %}
        </tbody>
    </table>

    <div class=\"mt-3 d-flex gap-2\">
        <a href=\"{{ path('app_mon_profil') }}\" class=\"btn btn-secondary\">← Retour au profil</a>
        
        <!-- ✅ Bouton Déconnecter tous les appareils -->
        <a href=\"{{ path('app_logout_all_devices') }}\" 
           class=\"btn btn-danger\" 
           onclick=\"return confirm('Déconnecter tous les appareils ? Vous serez déconnecté de cette session également.')\">
            🔓 Déconnecter tous les appareils
        </a>
    </div>
</div>
{% endblock %}", "utilisateur/historique.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\historique.html.twig");
    }
}

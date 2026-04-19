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

/* utilisateur/index.html.twig */
class __TwigTemplate_8a20d0fbbcccdc37f65beb9b7089f394 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/index.html.twig"));

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

        yield "Liste des utilisateurs";
        
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
    <h1 class=\"mb-4\">Liste des utilisateurs</h1>
    
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "flashes", ["success"], "method", false, false, false, 9));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 10
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        yield "    
    ";
        // line 14
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "role", [], "any", false, false, false, 14) == "admin"))) {
            // line 15
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_nouveau");
            yield "\" class=\"btn btn-primary mb-3\">
            <i class=\"fas fa-plus\"></i> Ajouter un utilisateur
        </a>
    ";
        }
        // line 19
        yield "    
    <div class=\"table-responsive\">
        <table class=\"table table-striped table-bordered\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Région</th>
                    <th>Date naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 35
            yield "                <tr>
                    <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                    <td>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                    <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 40
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 40) == "admin")) {
                // line 41
                yield "                            <span class=\"badge bg-danger\">Admin</span>
                        ";
            } else {
                // line 43
                yield "                            <span class=\"badge bg-success\">User</span>
                        ";
            }
            // line 45
            yield "                    </td>
                    <td>";
            // line 46
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 46)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 46), "html", null, true)) : ("-"));
            yield "</td>
                    <td>";
            // line 47
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 47), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                    <td>
                        <a href=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 49)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">
                            <i class=\"fas fa-edit\"></i> Modifier
                        </a>
                        
                        ";
            // line 53
            if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "role", [], "any", false, false, false, 53) == "admin")) && (CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 53) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "user", [], "any", false, false, false, 53), "idUtilisateur", [], "any", false, false, false, 53)))) {
                // line 54
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" method=\"post\" style=\"display:inline-block\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer ";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 55), "html", null, true);
                yield " ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        ";
            }
            // line 60
            yield "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        yield "            </tbody>
        </table>
    </div>
</div>

<style>
    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-sm {
        margin: 2px;
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
        return "utilisateur/index.html.twig";
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
        return array (  206 => 63,  198 => 60,  190 => 55,  185 => 54,  183 => 53,  176 => 49,  171 => 47,  167 => 46,  164 => 45,  160 => 43,  156 => 41,  154 => 40,  149 => 38,  145 => 37,  141 => 36,  138 => 35,  134 => 34,  117 => 19,  109 => 15,  106 => 14,  103 => 12,  94 => 10,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des utilisateurs{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    <h1 class=\"mb-4\">Liste des utilisateurs</h1>
    
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    
    {# Bouton Ajouter - visible uniquement par l'admin #}
    {% if app.user and app.user.role == 'admin' %}
        <a href=\"{{ path('app_utilisateur_nouveau') }}\" class=\"btn btn-primary mb-3\">
            <i class=\"fas fa-plus\"></i> Ajouter un utilisateur
        </a>
    {% endif %}
    
    <div class=\"table-responsive\">
        <table class=\"table table-striped table-bordered\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Région</th>
                    <th>Date naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for u in utilisateurs %}
                <tr>
                    <td>{{ u.idUtilisateur }}</td>
                    <td>{{ u.nom }}</td>
                    <td>{{ u.email }}</td>
                    <td>
                        {% if u.role == 'admin' %}
                            <span class=\"badge bg-danger\">Admin</span>
                        {% else %}
                            <span class=\"badge bg-success\">User</span>
                        {% endif %}
                    </td>
                    <td>{{ u.region ?: '-' }}</td>
                    <td>{{ u.dateNaissance ? u.dateNaissance|date('d/m/Y') : '-' }}</td>
                    <td>
                        <a href=\"{{ path('app_utilisateur_editer', {id: u.idUtilisateur}) }}\" class=\"btn btn-sm btn-warning\">
                            <i class=\"fas fa-edit\"></i> Modifier
                        </a>
                        
                        {% if app.user and app.user.role == 'admin' and u.idUtilisateur != app.user.idUtilisateur %}
                            <form action=\"{{ path('app_utilisateur_delete', {id: u.idUtilisateur}) }}\" method=\"post\" style=\"display:inline-block\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer {{ u.nom }} ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        {% endif %}
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<style>
    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-sm {
        margin: 2px;
    }
</style>
{% endblock %}", "utilisateur/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\index.html.twig");
    }
}

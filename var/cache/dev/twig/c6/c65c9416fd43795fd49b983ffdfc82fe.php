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

/* admin_quiz/results.html.twig */
class __TwigTemplate_4900e3e38d55fe11449bcd8b8928be62 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_quiz/results.html.twig"));

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

        yield "Résultats des Quiz";
        
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
    .badge-pass  { background: #28a745; color: white; }
    .badge-fail  { background: #fd7e14; color: white; }

    .result-pct-bar {
        width: 90px;
        height: 8px;
        background: #e9ecef;
        border-radius: 999px;
        overflow: hidden;
        display: inline-block;
        vertical-align: middle;
        margin-right: 6px;
    }
    .result-pct-fill {
        height: 100%;
        border-radius: 999px;
    }
    .fill-pass { background: linear-gradient(90deg, #20c997, #28a745); }
    .fill-fail { background: linear-gradient(90deg, #fd7e14, #dc3545); }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 31
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">📊 Résultats des Quiz</h3>
        <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_certificates");
        yield "\" class=\"btn btn-outline-primary btn-sm\">
            <i class=\"fas fa-certificate me-1\"></i> Voir les certificats
        </a>
    </div>

    ";
        // line 39
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["results"]) || array_key_exists("results", $context) ? $context["results"] : (function () { throw new RuntimeError('Variable "results" does not exist.', 39, $this->source); })())) == 0)) {
            // line 40
            yield "        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-chart-bar fa-3x d-block mb-3 opacity-25\"></i>
            <p>Aucun résultat enregistré pour l'instant.</p>
        </div>
    ";
        } else {
            // line 45
            yield "    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Formation</th>
                    <th>Score</th>
                    <th>Pourcentage</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th class=\"text-center\">Certificat</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["results"]) || array_key_exists("results", $context) ? $context["results"] : (function () { throw new RuntimeError('Variable "results" does not exist.', 60, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 61
                yield "                ";
                $context["passed"] = (CoreExtension::getAttribute($this->env, $this->source, $context["r"], "percentage", [], "any", false, false, false, 61) >= 80);
                // line 62
                yield "                <tr>
                    <td class=\"text-muted small\">";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 63), "html", null, true);
                yield "</td>
                    <td><strong>";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "user", [], "any", false, false, false, 64), "nom", [], "any", false, false, false, 64), "html", null, true);
                yield "</strong><br><small class=\"text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "user", [], "any", false, false, false, 64), "email", [], "any", false, false, false, 64), "html", null, true);
                yield "</small></td>
                    <td>";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "quiz", [], "any", false, false, false, 65), "formation", [], "any", false, false, false, 65), "titre", [], "any", false, false, false, 65), "html", null, true);
                yield "</td>
                    <td>
                        <strong>";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "score", [], "any", false, false, false, 67), "html", null, true);
                yield "</strong> / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalQuestions", [], "any", false, false, false, 67), "html", null, true);
                yield "
                    </td>
                    <td>
                        <div class=\"result-pct-bar\">
                            <div class=\"result-pct-fill ";
                // line 71
                yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 71, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("fill-pass") : ("fill-fail"));
                yield "\"
                                 style=\"width: ";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "percentage", [], "any", false, false, false, 72), 0), "html", null, true);
                yield "%\"></div>
                        </div>
                        <strong class=\"";
                // line 74
                yield (((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 74, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("text-success") : ("text-danger"));
                yield "\">
                            ";
                // line 75
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "percentage", [], "any", false, false, false, 75), 1), "html", null, true);
                yield "%
                        </strong>
                    </td>
                    <td>
                        ";
                // line 79
                if ((($tmp = (isset($context["passed"]) || array_key_exists("passed", $context) ? $context["passed"] : (function () { throw new RuntimeError('Variable "passed" does not exist.', 79, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 80
                    yield "                            <span class=\"badge badge-pass rounded-pill\">
                                <i class=\"fas fa-check-circle me-1\"></i> Réussi
                            </span>
                        ";
                } else {
                    // line 84
                    yield "                            <span class=\"badge badge-fail rounded-pill\">
                                <i class=\"fas fa-times-circle me-1\"></i> Non réussi
                            </span>
                        ";
                }
                // line 88
                yield "                    </td>
                    <td class=\"small text-muted\">";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "createdAt", [], "any", false, false, false, 89), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                    <td class=\"text-center\">
                        ";
                // line 91
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["r"], "certificate", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 92
                    yield "                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "certificate", [], "any", false, false, false, 92), "id", [], "any", false, false, false, 92)]), "html", null, true);
                    yield "\"
                               class=\"btn btn-sm btn-outline-success\" target=\"_blank\">
                                <i class=\"fas fa-certificate me-1\"></i> Voir
                            </a>
                        ";
                } else {
                    // line 97
                    yield "                            <span class=\"text-muted small\">—</span>
                        ";
                }
                // line 99
                yield "                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            yield "            </tbody>
        </table>
    </div>
    ";
        }
        // line 106
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_quiz/results.html.twig";
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
        return array (  271 => 106,  265 => 102,  257 => 99,  253 => 97,  244 => 92,  242 => 91,  237 => 89,  234 => 88,  228 => 84,  222 => 80,  220 => 79,  213 => 75,  209 => 74,  204 => 72,  200 => 71,  191 => 67,  186 => 65,  180 => 64,  176 => 63,  173 => 62,  170 => 61,  166 => 60,  149 => 45,  142 => 40,  140 => 39,  132 => 34,  127 => 31,  117 => 30,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Résultats des Quiz{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .badge-pass  { background: #28a745; color: white; }
    .badge-fail  { background: #fd7e14; color: white; }

    .result-pct-bar {
        width: 90px;
        height: 8px;
        background: #e9ecef;
        border-radius: 999px;
        overflow: hidden;
        display: inline-block;
        vertical-align: middle;
        margin-right: 6px;
    }
    .result-pct-fill {
        height: 100%;
        border-radius: 999px;
    }
    .fill-pass { background: linear-gradient(90deg, #20c997, #28a745); }
    .fill-fail { background: linear-gradient(90deg, #fd7e14, #dc3545); }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">📊 Résultats des Quiz</h3>
        <a href=\"{{ path('app_admin_certificates') }}\" class=\"btn btn-outline-primary btn-sm\">
            <i class=\"fas fa-certificate me-1\"></i> Voir les certificats
        </a>
    </div>

    {% if results|length == 0 %}
        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-chart-bar fa-3x d-block mb-3 opacity-25\"></i>
            <p>Aucun résultat enregistré pour l'instant.</p>
        </div>
    {% else %}
    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Formation</th>
                    <th>Score</th>
                    <th>Pourcentage</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th class=\"text-center\">Certificat</th>
                </tr>
            </thead>
            <tbody>
            {% for r in results %}
                {% set passed = r.percentage >= 80 %}
                <tr>
                    <td class=\"text-muted small\">{{ r.id }}</td>
                    <td><strong>{{ r.user.nom }}</strong><br><small class=\"text-muted\">{{ r.user.email }}</small></td>
                    <td>{{ r.quiz.formation.titre }}</td>
                    <td>
                        <strong>{{ r.score }}</strong> / {{ r.totalQuestions }}
                    </td>
                    <td>
                        <div class=\"result-pct-bar\">
                            <div class=\"result-pct-fill {{ passed ? 'fill-pass' : 'fill-fail' }}\"
                                 style=\"width: {{ r.percentage|number_format(0) }}%\"></div>
                        </div>
                        <strong class=\"{{ passed ? 'text-success' : 'text-danger' }}\">
                            {{ r.percentage|number_format(1) }}%
                        </strong>
                    </td>
                    <td>
                        {% if passed %}
                            <span class=\"badge badge-pass rounded-pill\">
                                <i class=\"fas fa-check-circle me-1\"></i> Réussi
                            </span>
                        {% else %}
                            <span class=\"badge badge-fail rounded-pill\">
                                <i class=\"fas fa-times-circle me-1\"></i> Non réussi
                            </span>
                        {% endif %}
                    </td>
                    <td class=\"small text-muted\">{{ r.createdAt|date('d/m/Y H:i') }}</td>
                    <td class=\"text-center\">
                        {% if r.certificate %}
                            <a href=\"{{ path('app_certificate_show', {id: r.certificate.id}) }}\"
                               class=\"btn btn-sm btn-outline-success\" target=\"_blank\">
                                <i class=\"fas fa-certificate me-1\"></i> Voir
                            </a>
                        {% else %}
                            <span class=\"text-muted small\">—</span>
                        {% endif %}
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    {% endif %}
</div>
{% endblock %}
", "admin_quiz/results.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_quiz\\results.html.twig");
    }
}

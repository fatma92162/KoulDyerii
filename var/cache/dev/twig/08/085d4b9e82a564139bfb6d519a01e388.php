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

/* admin_quiz/certificates.html.twig */
class __TwigTemplate_7256880698da85e11511134ee6e32865 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_quiz/certificates.html.twig"));

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

        yield "Certificats émis";
        
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
    .cert-uid {
        font-family: monospace;
        font-size: 13px;
        background: #f8f9fa;
        padding: 3px 8px;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        color: #495057;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 21
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">🏅 Certificats émis</h3>
        <a href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_results");
        yield "\" class=\"btn btn-outline-secondary btn-sm\">
            <i class=\"fas fa-chart-bar me-1\"></i> Voir les résultats
        </a>
    </div>

    ";
        // line 29
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["certificates"]) || array_key_exists("certificates", $context) ? $context["certificates"] : (function () { throw new RuntimeError('Variable "certificates" does not exist.', 29, $this->source); })())) == 0)) {
            // line 30
            yield "        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-certificate fa-3x d-block mb-3 opacity-25\"></i>
            <p>Aucun certificat émis pour l'instant.<br>
               <small>Les certificats sont générés automatiquement lorsqu'un utilisateur obtient ≥ 80%.</small>
            </p>
        </div>
    ";
        } else {
            // line 37
            yield "    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Identifiant (UID)</th>
                    <th>Utilisateur</th>
                    <th>Formation</th>
                    <th>Score obtenu</th>
                    <th>Date d'émission</th>
                    <th class=\"text-center\">Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["certificates"]) || array_key_exists("certificates", $context) ? $context["certificates"] : (function () { throw new RuntimeError('Variable "certificates" does not exist.', 51, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 52
                yield "                <tr>
                    <td class=\"text-muted small\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 53), "html", null, true);
                yield "</td>
                    <td><span class=\"cert-uid\">";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "certificateUid", [], "any", false, false, false, 54), "html", null, true);
                yield "</span></td>
                    <td>
                        <strong>";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 56), "user", [], "any", false, false, false, 56), "nom", [], "any", false, false, false, 56), "html", null, true);
                yield "</strong><br>
                        <small class=\"text-muted\">";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 57), "user", [], "any", false, false, false, 57), "email", [], "any", false, false, false, 57), "html", null, true);
                yield "</small>
                    </td>
                    <td>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 59), "quiz", [], "any", false, false, false, 59), "formation", [], "any", false, false, false, 59), "titre", [], "any", false, false, false, 59), "html", null, true);
                yield "</td>
                    <td>
                        <strong class=\"text-success\">";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 61), "percentage", [], "any", false, false, false, 61), 1), "html", null, true);
                yield "%</strong>
                        <small class=\"text-muted\">(";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 62), "score", [], "any", false, false, false, 62), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quizResult", [], "any", false, false, false, 62), "totalQuestions", [], "any", false, false, false, 62), "html", null, true);
                yield ")</small>
                    </td>
                    <td class=\"small text-muted\">";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "createdAt", [], "any", false, false, false, 64), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                    <td class=\"text-center\">
                        <a href=\"";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 66)]), "html", null, true);
                yield "\"
                           class=\"btn btn-sm btn-outline-success\" target=\"_blank\">
                            <i class=\"fas fa-eye me-1\"></i> Voir
                        </a>
                        <a href=\"";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certificate_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 70)]), "html", null, true);
                yield "\"
                           class=\"btn btn-sm btn-outline-danger\" target=\"_blank\">
                            <i class=\"fas fa-file-pdf me-1\"></i> PDF
                        </a>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            yield "            </tbody>
        </table>
    </div>
    <p class=\"text-muted small mt-2\">
        <i class=\"fas fa-info-circle me-1\"></i>
        ";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["certificates"]) || array_key_exists("certificates", $context) ? $context["certificates"] : (function () { throw new RuntimeError('Variable "certificates" does not exist.', 82, $this->source); })())), "html", null, true);
            yield " certificat";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["certificates"]) || array_key_exists("certificates", $context) ? $context["certificates"] : (function () { throw new RuntimeError('Variable "certificates" does not exist.', 82, $this->source); })())) > 1)) ? ("s") : (""));
            yield " émis au total.
        Seuil de certification : <strong>80%</strong>.
    </p>
    ";
        }
        // line 86
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
        return "admin_quiz/certificates.html.twig";
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
        return array (  239 => 86,  230 => 82,  223 => 77,  210 => 70,  203 => 66,  198 => 64,  191 => 62,  187 => 61,  182 => 59,  177 => 57,  173 => 56,  168 => 54,  164 => 53,  161 => 52,  157 => 51,  141 => 37,  132 => 30,  130 => 29,  122 => 24,  117 => 21,  107 => 20,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Certificats émis{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .cert-uid {
        font-family: monospace;
        font-size: 13px;
        background: #f8f9fa;
        padding: 3px 8px;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        color: #495057;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">🏅 Certificats émis</h3>
        <a href=\"{{ path('app_admin_results') }}\" class=\"btn btn-outline-secondary btn-sm\">
            <i class=\"fas fa-chart-bar me-1\"></i> Voir les résultats
        </a>
    </div>

    {% if certificates|length == 0 %}
        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-certificate fa-3x d-block mb-3 opacity-25\"></i>
            <p>Aucun certificat émis pour l'instant.<br>
               <small>Les certificats sont générés automatiquement lorsqu'un utilisateur obtient ≥ 80%.</small>
            </p>
        </div>
    {% else %}
    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Identifiant (UID)</th>
                    <th>Utilisateur</th>
                    <th>Formation</th>
                    <th>Score obtenu</th>
                    <th>Date d'émission</th>
                    <th class=\"text-center\">Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for c in certificates %}
                <tr>
                    <td class=\"text-muted small\">{{ c.id }}</td>
                    <td><span class=\"cert-uid\">{{ c.certificateUid }}</span></td>
                    <td>
                        <strong>{{ c.quizResult.user.nom }}</strong><br>
                        <small class=\"text-muted\">{{ c.quizResult.user.email }}</small>
                    </td>
                    <td>{{ c.quizResult.quiz.formation.titre }}</td>
                    <td>
                        <strong class=\"text-success\">{{ c.quizResult.percentage|number_format(1) }}%</strong>
                        <small class=\"text-muted\">({{ c.quizResult.score }}/{{ c.quizResult.totalQuestions }})</small>
                    </td>
                    <td class=\"small text-muted\">{{ c.createdAt|date('d/m/Y H:i') }}</td>
                    <td class=\"text-center\">
                        <a href=\"{{ path('app_certificate_show', {id: c.id}) }}\"
                           class=\"btn btn-sm btn-outline-success\" target=\"_blank\">
                            <i class=\"fas fa-eye me-1\"></i> Voir
                        </a>
                        <a href=\"{{ path('app_certificate_pdf', {id: c.id}) }}\"
                           class=\"btn btn-sm btn-outline-danger\" target=\"_blank\">
                            <i class=\"fas fa-file-pdf me-1\"></i> PDF
                        </a>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    <p class=\"text-muted small mt-2\">
        <i class=\"fas fa-info-circle me-1\"></i>
        {{ certificates|length }} certificat{{ certificates|length > 1 ? 's' : '' }} émis au total.
        Seuil de certification : <strong>80%</strong>.
    </p>
    {% endif %}
</div>
{% endblock %}
", "admin_quiz/certificates.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_quiz\\certificates.html.twig");
    }
}

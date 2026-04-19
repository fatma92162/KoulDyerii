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

/* admin_plats/pending.html.twig */
class __TwigTemplate_2ccb3c207d739b74f89debdeff354f1e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_plats/pending.html.twig"));

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

        yield "Modération des plats — En attente";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 6
        yield "
";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "flashes", ["success"], "method", false, false, false, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 9
            yield "    <div class=\"alert alert-success alert-dismissible fade show\">
        <i class=\"fas fa-check-circle me-2\"></i>";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", ["info"], "method", false, false, false, 14));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 15
            yield "    <div class=\"alert alert-info alert-dismissible fade show\">
        <i class=\"fas fa-info-circle me-2\"></i>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        yield "
";
        // line 22
        yield "<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <div>
        <h3 class=\"mb-0\">🍽️ Modération des plats</h3>
        <p class=\"text-muted mb-0\">Approuvez ou rejetez les plats proposés par les partenaires</p>
    </div>
    <a href=\"";
        // line 27
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_index");
        yield "\" class=\"btn btn-outline-secondary\">
        <i class=\"fas fa-list me-1\"></i> Tous les plats
    </a>
</div>

";
        // line 33
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-secondary\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 37, $this->source); })()), "total", [], "any", false, false, false, 37), "html", null, true);
        yield "</div>
                <div class=\"text-muted small\">Total</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-warning\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-warning\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 45, $this->source); })()), "en_attente", [], "any", false, false, false, 45), "html", null, true);
        yield "</div>
                <div class=\"text-muted small\">⏳ En attente</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-success\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-success\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 53, $this->source); })()), "accepte", [], "any", false, false, false, 53), "html", null, true);
        yield "</div>
                <div class=\"text-muted small\">✅ Approuvés</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-danger\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-danger\">";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 61, $this->source); })()), "refuse", [], "any", false, false, false, 61), "html", null, true);
        yield "</div>
                <div class=\"text-muted small\">❌ Rejetés</div>
            </div>
        </div>
    </div>
</div>

";
        // line 69
        yield "<div class=\"card shadow-sm\">
    <div class=\"card-header bg-warning text-dark d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">⏳ Plats en attente de validation</h5>
        <span class=\"badge bg-dark\">";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 72, $this->source); })())), "html", null, true);
        yield "</span>
    </div>
    <div class=\"card-body p-0\">
        ";
        // line 75
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 75, $this->source); })())) > 0)) {
            // line 76
            yield "        <div class=\"table-responsive\">
            <table class=\"table table-hover align-middle mb-0\">
                <thead class=\"table-light\">
                    <tr>
                        <th width=\"60\">Photo</th>
                        <th>Nom du plat</th>
                        <th>Partenaire</th>
                        <th>Proposé par (compte)</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Ingrédients</th>
                        <th>Date</th>
                        <th class=\"text-center\" width=\"160\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 92, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
                // line 93
                yield "                <tr>
                    <td>
                        ";
                // line 95
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 96
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 96), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 96), "html", null, true);
                    yield "\"
                                 class=\"rounded\" style=\"width:48px;height:48px;object-fit:cover;\">
                        ";
                } else {
                    // line 99
                    yield "                            <div class=\"rounded bg-light d-flex align-items-center justify-content-center\"
                                 style=\"width:48px;height:48px;font-size:22px;\">🍽️</div>
                        ";
                }
                // line 102
                yield "                    </td>
                    <td>
                        <strong>";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 104), "html", null, true);
                yield "</strong>
                        ";
                // line 105
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 106
                    yield "                            <br><small class=\"text-muted\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 106), 0, 60), "html", null, true);
                    yield "…</small>
                        ";
                }
                // line 108
                yield "                    </td>
                    <td>
                        ";
                // line 110
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 111
                    yield "                            <span class=\"fw-semibold\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 111), "nom", [], "any", false, false, false, 111), "html", null, true);
                    yield "</span>
                            <br><small class=\"text-muted\">";
                    // line 112
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 112), "type", [], "any", false, false, false, 112), "html", null, true);
                    yield "</small>
                        ";
                } else {
                    // line 114
                    yield "                            <span class=\"text-muted\">—</span>
                        ";
                }
                // line 116
                yield "                    </td>
                    <td class=\"small\">
                        ";
                // line 118
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "proposePar", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 119
                    yield "                            <span class=\"fw-semibold\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "proposePar", [], "any", false, false, false, 119), "nom", [], "any", false, false, false, 119), "html", null, true);
                    yield "</span>
                            <br><span class=\"text-muted\">";
                    // line 120
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "proposePar", [], "any", false, false, false, 120), "email", [], "any", false, false, false, 120), "html", null, true);
                    yield "</span>
                        ";
                } else {
                    // line 122
                    yield "                            <span class=\"text-muted\">—</span>
                        ";
                }
                // line 124
                yield "                    </td>
                    <td>
                        <span class=\"badge bg-secondary\">";
                // line 126
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 126)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 126), "html", null, true)) : ("—"));
                yield "</span>
                    </td>
                    <td class=\"fw-bold text-danger\">
                        ";
                // line 129
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 129), 2, ",", " ") . " €"), "html", null, true)) : ("—"));
                yield "
                    </td>
                    <td class=\"text-muted small\">
                        ";
                // line 132
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "ingredients", [], "any", false, false, false, 132)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "ingredients", [], "any", false, false, false, 132), 0, 50) . "…"), "html", null, true)) : ("—"));
                yield "
                    </td>
                    <td class=\"text-muted small\">
                        ";
                // line 135
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "dateCreation", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "dateCreation", [], "any", false, false, false, 135), "d/m/Y"), "html", null, true)) : ("—"));
                yield "
                    </td>
                    <td class=\"text-center\" style=\"min-width: 200px;\">
                        <form action=\"";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 138)]), "html", null, true);
                yield "\"
                              method=\"post\" class=\"d-inline\"
                              onsubmit=\"return confirm('Approuver « ";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 140), "html", null, true);
                yield " » ?')\">
                            <button type=\"submit\" class=\"btn btn-success btn-sm\"
                                    title=\"Approuver\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                        </form>
                        <form action=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 146)]), "html", null, true);
                yield "\"
                              method=\"post\" class=\"d-inline-block align-top ms-1 text-start\" style=\"max-width: 170px;\"
                              onsubmit=\"return confirm('Rejeter « ";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 148), "html", null, true);
                yield " » ?')\">
                            <input type=\"text\" name=\"reject_comment\" class=\"form-control form-control-sm mb-1\"
                                   placeholder=\"Motif du refus (optionnel)\" autocomplete=\"off\">
                            <button type=\"submit\" class=\"btn btn-danger btn-sm w-100\" title=\"Rejeter\">
                                <i class=\"fas fa-times\"></i> Rejeter
                            </button>
                        </form>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 158
            yield "                </tbody>
            </table>
        </div>
        ";
        } else {
            // line 162
            yield "        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-check-double fa-3x mb-3 text-success\"></i>
            <h5>Aucun plat en attente</h5>
            <p>Tous les plats ont été traités !</p>
        </div>
        ";
        }
        // line 168
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
        return "admin_plats/pending.html.twig";
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
        return array (  377 => 168,  369 => 162,  363 => 158,  347 => 148,  342 => 146,  333 => 140,  328 => 138,  322 => 135,  316 => 132,  310 => 129,  304 => 126,  300 => 124,  296 => 122,  291 => 120,  286 => 119,  284 => 118,  280 => 116,  276 => 114,  271 => 112,  266 => 111,  264 => 110,  260 => 108,  254 => 106,  252 => 105,  248 => 104,  244 => 102,  239 => 99,  230 => 96,  228 => 95,  224 => 93,  220 => 92,  202 => 76,  200 => 75,  194 => 72,  189 => 69,  179 => 61,  168 => 53,  157 => 45,  146 => 37,  140 => 33,  132 => 27,  125 => 22,  122 => 20,  112 => 16,  109 => 15,  105 => 14,  95 => 10,  92 => 9,  88 => 8,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Modération des plats — En attente{% endblock %}

{% block admin_content %}

{# ── Flash messages ── #}
{% for msg in app.flashes('success') %}
    <div class=\"alert alert-success alert-dismissible fade show\">
        <i class=\"fas fa-check-circle me-2\"></i>{{ msg }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}
{% for msg in app.flashes('info') %}
    <div class=\"alert alert-info alert-dismissible fade show\">
        <i class=\"fas fa-info-circle me-2\"></i>{{ msg }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}

{# ── Header ── #}
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <div>
        <h3 class=\"mb-0\">🍽️ Modération des plats</h3>
        <p class=\"text-muted mb-0\">Approuvez ou rejetez les plats proposés par les partenaires</p>
    </div>
    <a href=\"{{ path('app_admin_plats_index') }}\" class=\"btn btn-outline-secondary\">
        <i class=\"fas fa-list me-1\"></i> Tous les plats
    </a>
</div>

{# ── Stats ── #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-secondary\">{{ stats.total }}</div>
                <div class=\"text-muted small\">Total</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-warning\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-warning\">{{ stats.en_attente }}</div>
                <div class=\"text-muted small\">⏳ En attente</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-success\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-success\">{{ stats.accepte }}</div>
                <div class=\"text-muted small\">✅ Approuvés</div>
            </div>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"card text-center border-0 shadow-sm border-start border-4 border-danger\">
            <div class=\"card-body\">
                <div class=\"fs-2 fw-bold text-danger\">{{ stats.refuse }}</div>
                <div class=\"text-muted small\">❌ Rejetés</div>
            </div>
        </div>
    </div>
</div>

{# ── Table plats en attente ── #}
<div class=\"card shadow-sm\">
    <div class=\"card-header bg-warning text-dark d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">⏳ Plats en attente de validation</h5>
        <span class=\"badge bg-dark\">{{ plats|length }}</span>
    </div>
    <div class=\"card-body p-0\">
        {% if plats|length > 0 %}
        <div class=\"table-responsive\">
            <table class=\"table table-hover align-middle mb-0\">
                <thead class=\"table-light\">
                    <tr>
                        <th width=\"60\">Photo</th>
                        <th>Nom du plat</th>
                        <th>Partenaire</th>
                        <th>Proposé par (compte)</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Ingrédients</th>
                        <th>Date</th>
                        <th class=\"text-center\" width=\"160\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for plat in plats %}
                <tr>
                    <td>
                        {% if plat.image %}
                            <img src=\"{{ plat.image }}\" alt=\"{{ plat.nom }}\"
                                 class=\"rounded\" style=\"width:48px;height:48px;object-fit:cover;\">
                        {% else %}
                            <div class=\"rounded bg-light d-flex align-items-center justify-content-center\"
                                 style=\"width:48px;height:48px;font-size:22px;\">🍽️</div>
                        {% endif %}
                    </td>
                    <td>
                        <strong>{{ plat.nom }}</strong>
                        {% if plat.description %}
                            <br><small class=\"text-muted\">{{ plat.description|slice(0,60) }}…</small>
                        {% endif %}
                    </td>
                    <td>
                        {% if plat.partenaire %}
                            <span class=\"fw-semibold\">{{ plat.partenaire.nom }}</span>
                            <br><small class=\"text-muted\">{{ plat.partenaire.type }}</small>
                        {% else %}
                            <span class=\"text-muted\">—</span>
                        {% endif %}
                    </td>
                    <td class=\"small\">
                        {% if plat.proposePar %}
                            <span class=\"fw-semibold\">{{ plat.proposePar.nom }}</span>
                            <br><span class=\"text-muted\">{{ plat.proposePar.email }}</span>
                        {% else %}
                            <span class=\"text-muted\">—</span>
                        {% endif %}
                    </td>
                    <td>
                        <span class=\"badge bg-secondary\">{{ plat.categorie ?: '—' }}</span>
                    </td>
                    <td class=\"fw-bold text-danger\">
                        {{ plat.prix ? plat.prix|number_format(2, ',', ' ') ~ ' €' : '—' }}
                    </td>
                    <td class=\"text-muted small\">
                        {{ plat.ingredients ? plat.ingredients|slice(0,50) ~ '…' : '—' }}
                    </td>
                    <td class=\"text-muted small\">
                        {{ plat.dateCreation ? plat.dateCreation|date('d/m/Y') : '—' }}
                    </td>
                    <td class=\"text-center\" style=\"min-width: 200px;\">
                        <form action=\"{{ path('app_admin_plat_approve', {id: plat.id}) }}\"
                              method=\"post\" class=\"d-inline\"
                              onsubmit=\"return confirm('Approuver « {{ plat.nom }} » ?')\">
                            <button type=\"submit\" class=\"btn btn-success btn-sm\"
                                    title=\"Approuver\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                        </form>
                        <form action=\"{{ path('app_admin_plat_reject', {id: plat.id}) }}\"
                              method=\"post\" class=\"d-inline-block align-top ms-1 text-start\" style=\"max-width: 170px;\"
                              onsubmit=\"return confirm('Rejeter « {{ plat.nom }} » ?')\">
                            <input type=\"text\" name=\"reject_comment\" class=\"form-control form-control-sm mb-1\"
                                   placeholder=\"Motif du refus (optionnel)\" autocomplete=\"off\">
                            <button type=\"submit\" class=\"btn btn-danger btn-sm w-100\" title=\"Rejeter\">
                                <i class=\"fas fa-times\"></i> Rejeter
                            </button>
                        </form>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
        {% else %}
        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-check-double fa-3x mb-3 text-success\"></i>
            <h5>Aucun plat en attente</h5>
            <p>Tous les plats ont été traités !</p>
        </div>
        {% endif %}
    </div>
</div>

{% endblock %}
", "admin_plats/pending.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_plats\\pending.html.twig");
    }
}

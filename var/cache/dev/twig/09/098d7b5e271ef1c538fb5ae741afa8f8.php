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

/* admin_plats/index.html.twig */
class __TwigTemplate_011d816e4dfdfb8c183af992d682c73e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_plats/index.html.twig"));

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

        yield "Tous les plats — Administration";
        
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
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h3 class=\"mb-0\">🍽️ Gestion de tous les plats</h3>
    <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_pending");
        yield "\" class=\"btn btn-warning position-relative\">
        <i class=\"fas fa-clock me-1\"></i> En attente
        ";
        // line 11
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 11, $this->source); })()), "en_attente", [], "any", false, false, false, 11) > 0)) {
            // line 12
            yield "            <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger\">
                ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 13, $this->source); })()), "en_attente", [], "any", false, false, false, 13), "html", null, true);
            yield "
            </span>
        ";
        }
        // line 16
        yield "    </a>
</div>

";
        // line 20
        yield "<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <a href=\"";
        // line 22
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_index");
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 ";
        // line 23
        yield (((($tmp =  !(isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("border border-primary") : (""));
        yield "\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 25, $this->source); })()), "total", [], "any", false, false, false, 25), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">Tous</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_index", ["statut" => "en_attente"]);
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-warning\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-warning\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 35, $this->source); })()), "en_attente", [], "any", false, false, false, 35), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">⏳ En attente</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_index", ["statut" => "accepte"]);
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-success\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-success\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 45, $this->source); })()), "accepte", [], "any", false, false, false, 45), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">✅ Approuvés</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_index", ["statut" => "refuse"]);
        yield "\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-danger\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-danger\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 55, $this->source); })()), "refuse", [], "any", false, false, false, 55), "html", null, true);
        yield "</div>
                    <div class=\"text-muted small\">❌ Rejetés</div>
                </div>
            </div>
        </a>
    </div>
</div>

";
        // line 64
        yield "<div class=\"card shadow-sm\">
    <div class=\"card-header bg-dark text-white d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">
            ";
        // line 67
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 67, $this->source); })()) == "en_attente")) {
            yield "⏳ En attente
            ";
        } elseif ((        // line 68
(isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 68, $this->source); })()) == "accepte")) {
            yield "✅ Approuvés
            ";
        } elseif ((        // line 69
(isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 69, $this->source); })()) == "refuse")) {
            yield "❌ Rejetés
            ";
        } else {
            // line 70
            yield "📋 Tous les plats
            ";
        }
        // line 72
        yield "        </h5>
        <span class=\"badge bg-light text-dark\">";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 73, $this->source); })())), "html", null, true);
        yield "</span>
    </div>
    <div class=\"card-body p-0\">
        ";
        // line 76
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 76, $this->source); })())) > 0)) {
            // line 77
            yield "        <div class=\"table-responsive\">
            <table class=\"table table-hover align-middle mb-0\">
                <thead class=\"table-light\">
                    <tr>
                        <th width=\"60\">Photo</th>
                        <th>Nom</th>
                        <th>Partenaire</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>🔥 Ventes</th>
                        <th>Best-seller</th>
                        <th class=\"text-center\">Actions</th>
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
                                 class=\"rounded\" style=\"width:44px;height:44px;object-fit:cover;\">
                        ";
                } else {
                    // line 99
                    yield "                            <div class=\"rounded bg-light d-flex align-items-center justify-content-center\"
                                 style=\"width:44px;height:44px;font-size:20px;\">🍽️</div>
                        ";
                }
                // line 102
                yield "                    </td>
                    <td><strong>";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 103), "html", null, true);
                yield "</strong></td>
                    <td>
                        ";
                // line 105
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 106
                    yield "                            ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 106), "nom", [], "any", false, false, false, 106), "html", null, true);
                    yield "
                        ";
                } else {
                    // line 108
                    yield "                            <span class=\"text-muted\">ID: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "idPartenaire", [], "any", false, false, false, 108), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 110
                yield "                    </td>
                    <td class=\"fw-bold\">";
                // line 111
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 111), 2, ",", " ") . " €"), "html", null, true)) : ("—"));
                yield "</td>
                    <td>
                        <span class=\"badge
                            ";
                // line 114
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 114) == "accepte")) {
                    yield "bg-success
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 115
$context["plat"], "statut", [], "any", false, false, false, 115) == "refuse")) {
                    yield "bg-danger
                            ";
                } else {
                    // line 116
                    yield "bg-warning text-dark
                            ";
                }
                // line 117
                yield "\">
                            ";
                // line 118
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 118) == "accepte")) {
                    yield "✅ Approuvé
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 119
$context["plat"], "statut", [], "any", false, false, false, 119) == "refuse")) {
                    yield "❌ Rejeté
                            ";
                } else {
                    // line 120
                    yield "⏳ En attente";
                }
                // line 121
                yield "                        </span>
                    </td>
                    <td class=\"text-center\">
                        <span class=\"badge bg-light text-dark border\">";
                // line 124
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "salesCount", [], "any", false, false, false, 124), "html", null, true);
                yield "</span>
                    </td>
                    <td class=\"text-center\">
                        ";
                // line 127
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "isBestSeller", [], "any", false, false, false, 127)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 128
                    yield "                            <span class=\"badge\" style=\"background:#FF6B00;\">🔥 Best-seller</span>
                        ";
                } else {
                    // line 130
                    yield "                            <span class=\"text-muted small\">—</span>
                        ";
                }
                // line 132
                yield "                    </td>
                    <td class=\"text-center\">
                        ";
                // line 134
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 134) == "en_attente")) {
                    // line 135
                    yield "                            <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 135)]), "html", null, true);
                    yield "\"
                                  method=\"post\" class=\"d-inline\">
                                <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Approuver\">
                                    <i class=\"fas fa-check\"></i>
                                </button>
                            </form>
                            <form action=\"";
                    // line 141
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 141)]), "html", null, true);
                    yield "\"
                                  method=\"post\" class=\"d-inline ms-1\">
                                <button type=\"submit\" class=\"btn btn-danger btn-sm\" title=\"Rejeter\">
                                    <i class=\"fas fa-times\"></i>
                                </button>
                            </form>
                        ";
                } else {
                    // line 148
                    yield "                            <span class=\"text-muted small\">Traité</span>
                        ";
                }
                // line 150
                yield "                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 153
            yield "                </tbody>
            </table>
        </div>
        ";
        } else {
            // line 157
            yield "        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-inbox fa-3x mb-3\"></i>
            <p>Aucun plat trouvé.</p>
        </div>
        ";
        }
        // line 162
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
        return "admin_plats/index.html.twig";
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
        return array (  388 => 162,  381 => 157,  375 => 153,  367 => 150,  363 => 148,  353 => 141,  343 => 135,  341 => 134,  337 => 132,  333 => 130,  329 => 128,  327 => 127,  321 => 124,  316 => 121,  313 => 120,  308 => 119,  304 => 118,  301 => 117,  297 => 116,  292 => 115,  288 => 114,  282 => 111,  279 => 110,  273 => 108,  267 => 106,  265 => 105,  260 => 103,  257 => 102,  252 => 99,  243 => 96,  241 => 95,  237 => 93,  233 => 92,  216 => 77,  214 => 76,  208 => 73,  205 => 72,  201 => 70,  196 => 69,  192 => 68,  188 => 67,  183 => 64,  172 => 55,  166 => 52,  156 => 45,  150 => 42,  140 => 35,  134 => 32,  124 => 25,  119 => 23,  115 => 22,  111 => 20,  106 => 16,  100 => 13,  97 => 12,  95 => 11,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Tous les plats — Administration{% endblock %}

{% block admin_content %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h3 class=\"mb-0\">🍽️ Gestion de tous les plats</h3>
    <a href=\"{{ path('app_admin_plats_pending') }}\" class=\"btn btn-warning position-relative\">
        <i class=\"fas fa-clock me-1\"></i> En attente
        {% if stats.en_attente > 0 %}
            <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger\">
                {{ stats.en_attente }}
            </span>
        {% endif %}
    </a>
</div>

{# ── Stats ── #}
<div class=\"row g-3 mb-4\">
    <div class=\"col-md-3\">
        <a href=\"{{ path('app_admin_plats_index') }}\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 {{ not statutFiltre ? 'border border-primary' : '' }}\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold\">{{ stats.total }}</div>
                    <div class=\"text-muted small\">Tous</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('app_admin_plats_index', {statut: 'en_attente'}) }}\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-warning\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-warning\">{{ stats.en_attente }}</div>
                    <div class=\"text-muted small\">⏳ En attente</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('app_admin_plats_index', {statut: 'accepte'}) }}\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-success\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-success\">{{ stats.accepte }}</div>
                    <div class=\"text-muted small\">✅ Approuvés</div>
                </div>
            </div>
        </a>
    </div>
    <div class=\"col-md-3\">
        <a href=\"{{ path('app_admin_plats_index', {statut: 'refuse'}) }}\" class=\"text-decoration-none\">
            <div class=\"card text-center border-0 shadow-sm h-100 border-start border-4 border-danger\">
                <div class=\"card-body\">
                    <div class=\"fs-2 fw-bold text-danger\">{{ stats.refuse }}</div>
                    <div class=\"text-muted small\">❌ Rejetés</div>
                </div>
            </div>
        </a>
    </div>
</div>

{# ── Table ── #}
<div class=\"card shadow-sm\">
    <div class=\"card-header bg-dark text-white d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\">
            {% if statutFiltre == 'en_attente' %}⏳ En attente
            {% elseif statutFiltre == 'accepte' %}✅ Approuvés
            {% elseif statutFiltre == 'refuse' %}❌ Rejetés
            {% else %}📋 Tous les plats
            {% endif %}
        </h5>
        <span class=\"badge bg-light text-dark\">{{ plats|length }}</span>
    </div>
    <div class=\"card-body p-0\">
        {% if plats|length > 0 %}
        <div class=\"table-responsive\">
            <table class=\"table table-hover align-middle mb-0\">
                <thead class=\"table-light\">
                    <tr>
                        <th width=\"60\">Photo</th>
                        <th>Nom</th>
                        <th>Partenaire</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>🔥 Ventes</th>
                        <th>Best-seller</th>
                        <th class=\"text-center\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for plat in plats %}
                <tr>
                    <td>
                        {% if plat.image %}
                            <img src=\"{{ plat.image }}\" alt=\"{{ plat.nom }}\"
                                 class=\"rounded\" style=\"width:44px;height:44px;object-fit:cover;\">
                        {% else %}
                            <div class=\"rounded bg-light d-flex align-items-center justify-content-center\"
                                 style=\"width:44px;height:44px;font-size:20px;\">🍽️</div>
                        {% endif %}
                    </td>
                    <td><strong>{{ plat.nom }}</strong></td>
                    <td>
                        {% if plat.partenaire %}
                            {{ plat.partenaire.nom }}
                        {% else %}
                            <span class=\"text-muted\">ID: {{ plat.idPartenaire }}</span>
                        {% endif %}
                    </td>
                    <td class=\"fw-bold\">{{ plat.prix ? plat.prix|number_format(2, ',', ' ') ~ ' €' : '—' }}</td>
                    <td>
                        <span class=\"badge
                            {% if plat.statut == 'accepte' %}bg-success
                            {% elseif plat.statut == 'refuse' %}bg-danger
                            {% else %}bg-warning text-dark
                            {% endif %}\">
                            {% if plat.statut == 'accepte' %}✅ Approuvé
                            {% elseif plat.statut == 'refuse' %}❌ Rejeté
                            {% else %}⏳ En attente{% endif %}
                        </span>
                    </td>
                    <td class=\"text-center\">
                        <span class=\"badge bg-light text-dark border\">{{ plat.salesCount }}</span>
                    </td>
                    <td class=\"text-center\">
                        {% if plat.isBestSeller %}
                            <span class=\"badge\" style=\"background:#FF6B00;\">🔥 Best-seller</span>
                        {% else %}
                            <span class=\"text-muted small\">—</span>
                        {% endif %}
                    </td>
                    <td class=\"text-center\">
                        {% if plat.statut == 'en_attente' %}
                            <form action=\"{{ path('app_admin_plat_approve', {id: plat.id}) }}\"
                                  method=\"post\" class=\"d-inline\">
                                <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Approuver\">
                                    <i class=\"fas fa-check\"></i>
                                </button>
                            </form>
                            <form action=\"{{ path('app_admin_plat_reject', {id: plat.id}) }}\"
                                  method=\"post\" class=\"d-inline ms-1\">
                                <button type=\"submit\" class=\"btn btn-danger btn-sm\" title=\"Rejeter\">
                                    <i class=\"fas fa-times\"></i>
                                </button>
                            </form>
                        {% else %}
                            <span class=\"text-muted small\">Traité</span>
                        {% endif %}
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
        {% else %}
        <div class=\"text-center py-5 text-muted\">
            <i class=\"fas fa-inbox fa-3x mb-3\"></i>
            <p>Aucun plat trouvé.</p>
        </div>
        {% endif %}
    </div>
</div>

{% endblock %}
", "admin_plats/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_plats\\index.html.twig");
    }
}

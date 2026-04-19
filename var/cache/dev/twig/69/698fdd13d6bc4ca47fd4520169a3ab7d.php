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

/* plats_public/panier.html.twig */
class __TwigTemplate_735b53bb226a4b4397f0a1a350ff7d0b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "plats_public/panier.html.twig"));

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

        yield "Panier plats";
        
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
    <h1 class=\"mb-4\">🛒 Panier plats</h1>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "flashes", ["success"], "method", false, false, false, 9));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 10
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", ["error"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 13
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "flashes", ["info"], "method", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 16
            yield "        <div class=\"alert alert-info alert-dismissible fade show\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "
    ";
        // line 19
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lignes"]) || array_key_exists("lignes", $context) ? $context["lignes"] : (function () { throw new RuntimeError('Variable "lignes" does not exist.', 19, $this->source); })())) == 0)) {
            // line 20
            yield "        <p class=\"text-muted\">Votre panier est vide.</p>
        <a href=\"";
            // line 21
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public");
            yield "\" class=\"btn btn-outline-primary\">Voir les plats</a>
    ";
        } else {
            // line 23
            yield "        <div class=\"table-responsive card shadow-sm\">
            <table class=\"table table-hover mb-0 align-middle\">
                <thead class=\"table-light\">
                    <tr>
                        <th>Plat</th>
                        <th class=\"text-end\">Prix</th>
                        <th style=\"width:140px;\">Qté</th>
                        <th class=\"text-end\">Sous-total</th>
                        <th style=\"width:100px;\"></th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lignes"]) || array_key_exists("lignes", $context) ? $context["lignes"] : (function () { throw new RuntimeError('Variable "lignes" does not exist.', 35, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
                // line 36
                yield "                    <tr>
                        <td>
                            <strong>";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 38), "nom", [], "any", false, false, false, 38), "html", null, true);
                yield "</strong>
                            ";
                // line 39
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, true, false, 39), "partenaire", [], "any", true, true, false, 39) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 39), "partenaire", [], "any", false, false, false, 39))) {
                    // line 40
                    yield "                                <br><small class=\"text-muted\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 40), "partenaire", [], "any", false, false, false, 40), "nom", [], "any", false, false, false, 40), "html", null, true);
                    yield "</small>
                            ";
                }
                // line 42
                yield "                        </td>
                        <td class=\"text-end\">";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 43), "prix", [], "any", false, false, false, 43), 2, ",", " "), "html", null, true);
                yield " €</td>
                        <td>
                            <form action=\"";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_panier_maj", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 45), "id", [], "any", false, false, false, 45)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-flex gap-1\">
                                <input type=\"number\" name=\"quantite\" class=\"form-control form-control-sm\" min=\"1\" value=\"";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "quantite", [], "any", false, false, false, 46), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary\">OK</button>
                            </form>
                        </td>
                        <td class=\"text-end fw-semibold\">";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "sous_total", [], "any", false, false, false, 50), 2, ",", " "), "html", null, true);
                yield " €</td>
                        <td>
                            <form action=\"";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_panier_supprimer", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "plat", [], "any", false, false, false, 52), "id", [], "any", false, false, false, 52)]), "html", null, true);
                yield "\" method=\"post\" onsubmit=\"return confirm('Retirer ce plat ?');\">
                                <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">Retirer</button>
                            </form>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            yield "                </tbody>
                <tfoot>
                    <tr>
                        <th colspan=\"3\" class=\"text-end\">Total</th>
                        <th class=\"text-end\">";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 62, $this->source); })()), 2, ",", " "), "html", null, true);
            yield " €</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class=\"row mt-4\">
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-header\">Coordonnées de livraison</div>
                    <div class=\"card-body\">
                        <form action=\"";
            // line 74
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_panier_commander");
            yield "\" method=\"post\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Nom</label>
                                <input type=\"text\" name=\"customer_name\" class=\"form-control\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Téléphone</label>
                                <input type=\"text\" name=\"phone\" class=\"form-control\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Adresse / lieu</label>
                                <input type=\"text\" name=\"location\" class=\"form-control\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-success\">Valider la commande</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class=\"col-md-6 d-flex flex-column gap-2 align-items-start\">
                <a href=\"";
            // line 93
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public");
            yield "\" class=\"btn btn-outline-secondary\">← Continuer mes achats</a>
                <form action=\"";
            // line 94
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_panier_vider");
            yield "\" method=\"post\" onsubmit=\"return confirm('Vider tout le panier plats ?');\">
                    <button type=\"submit\" class=\"btn btn-outline-danger\">Vider le panier</button>
                </form>
            </div>
        </div>
    ";
        }
        // line 100
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
        return "plats_public/panier.html.twig";
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
        return array (  270 => 100,  261 => 94,  257 => 93,  235 => 74,  220 => 62,  214 => 58,  202 => 52,  197 => 50,  190 => 46,  186 => 45,  181 => 43,  178 => 42,  172 => 40,  170 => 39,  166 => 38,  162 => 36,  158 => 35,  144 => 23,  139 => 21,  136 => 20,  134 => 19,  131 => 18,  122 => 16,  117 => 15,  108 => 13,  103 => 12,  94 => 10,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Panier plats{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <h1 class=\"mb-4\">🛒 Panier plats</h1>

    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">{{ msg }}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    {% endfor %}
    {% for msg in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">{{ msg }}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    {% endfor %}
    {% for msg in app.flashes('info') %}
        <div class=\"alert alert-info alert-dismissible fade show\">{{ msg }}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
    {% endfor %}

    {% if lignes|length == 0 %}
        <p class=\"text-muted\">Votre panier est vide.</p>
        <a href=\"{{ path('app_plats_public') }}\" class=\"btn btn-outline-primary\">Voir les plats</a>
    {% else %}
        <div class=\"table-responsive card shadow-sm\">
            <table class=\"table table-hover mb-0 align-middle\">
                <thead class=\"table-light\">
                    <tr>
                        <th>Plat</th>
                        <th class=\"text-end\">Prix</th>
                        <th style=\"width:140px;\">Qté</th>
                        <th class=\"text-end\">Sous-total</th>
                        <th style=\"width:100px;\"></th>
                    </tr>
                </thead>
                <tbody>
                {% for ligne in lignes %}
                    <tr>
                        <td>
                            <strong>{{ ligne.plat.nom }}</strong>
                            {% if ligne.plat.partenaire is defined and ligne.plat.partenaire %}
                                <br><small class=\"text-muted\">{{ ligne.plat.partenaire.nom }}</small>
                            {% endif %}
                        </td>
                        <td class=\"text-end\">{{ ligne.plat.prix|number_format(2, ',', ' ') }} €</td>
                        <td>
                            <form action=\"{{ path('app_plat_panier_maj', {id: ligne.plat.id}) }}\" method=\"post\" class=\"d-flex gap-1\">
                                <input type=\"number\" name=\"quantite\" class=\"form-control form-control-sm\" min=\"1\" value=\"{{ ligne.quantite }}\">
                                <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary\">OK</button>
                            </form>
                        </td>
                        <td class=\"text-end fw-semibold\">{{ ligne.sous_total|number_format(2, ',', ' ') }} €</td>
                        <td>
                            <form action=\"{{ path('app_plat_panier_supprimer', {id: ligne.plat.id}) }}\" method=\"post\" onsubmit=\"return confirm('Retirer ce plat ?');\">
                                <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">Retirer</button>
                            </form>
                        </td>
                    </tr>
                {% endfor %}
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan=\"3\" class=\"text-end\">Total</th>
                        <th class=\"text-end\">{{ total|number_format(2, ',', ' ') }} €</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class=\"row mt-4\">
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-header\">Coordonnées de livraison</div>
                    <div class=\"card-body\">
                        <form action=\"{{ path('app_plat_panier_commander') }}\" method=\"post\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Nom</label>
                                <input type=\"text\" name=\"customer_name\" class=\"form-control\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Téléphone</label>
                                <input type=\"text\" name=\"phone\" class=\"form-control\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label class=\"form-label\">Adresse / lieu</label>
                                <input type=\"text\" name=\"location\" class=\"form-control\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-success\">Valider la commande</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class=\"col-md-6 d-flex flex-column gap-2 align-items-start\">
                <a href=\"{{ path('app_plats_public') }}\" class=\"btn btn-outline-secondary\">← Continuer mes achats</a>
                <form action=\"{{ path('app_plat_panier_vider') }}\" method=\"post\" onsubmit=\"return confirm('Vider tout le panier plats ?');\">
                    <button type=\"submit\" class=\"btn btn-outline-danger\">Vider le panier</button>
                </form>
            </div>
        </div>
    {% endif %}
</div>
{% endblock %}
", "plats_public/panier.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\plats_public\\panier.html.twig");
    }
}

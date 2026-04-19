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

/* admin_partenaire/voir.html.twig */
class __TwigTemplate_e79ffe22dbd0cd24adcf965f2a0b9ff4 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_partenaire/voir.html.twig"));

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

        yield "Détails partenaire — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
            yield "    <div class=\"alert alert-success alert-dismissible fade show mb-3\">
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
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", ["error"], "method", false, false, false, 14));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 15
            yield "    <div class=\"alert alert-danger alert-dismissible fade show mb-3\">
        <i class=\"fas fa-exclamation-circle me-2\"></i>";
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
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "flashes", ["info"], "method", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 21
            yield "    <div class=\"alert alert-info alert-dismissible fade show mb-3\">
        <i class=\"fas fa-info-circle me-2\"></i>";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "
<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h3 class=\"mb-0\">🤝 Détails du partenaire</h3>
    <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaires_index");
        yield "\" class=\"btn btn-secondary\">
        <i class=\"fas fa-arrow-left me-1\"></i> Retour
    </a>
</div>

<div class=\"row g-4\">

    ";
        // line 37
        yield "    <div class=\"col-md-8\">

        ";
        // line 40
        yield "        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-primary text-white\">
                <h5 class=\"mb-0\"><i class=\"fas fa-info-circle me-2\"></i>Informations générales</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-2\">
                    <div class=\"col-sm-4 fw-bold\">Nom :</div>
                    <div class=\"col-sm-8\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 47, $this->source); })()), "nom", [], "any", false, false, false, 47), "html", null, true);
        yield "</div>
                    <div class=\"col-sm-4 fw-bold\">Type :</div>
                    <div class=\"col-sm-8\">";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 49, $this->source); })()), "type", [], "any", false, false, false, 49), "html", null, true);
        yield "</div>
                    <div class=\"col-sm-4 fw-bold\">Téléphone :</div>
                    <div class=\"col-sm-8\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 51, $this->source); })()), "telephone", [], "any", false, false, false, 51), "html", null, true);
        yield "</div>
                    <div class=\"col-sm-4 fw-bold\">Adresse :</div>
                    <div class=\"col-sm-8\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 53, $this->source); })()), "adresse", [], "any", false, false, false, 53), "html", null, true);
        yield "</div>
                    <div class=\"col-sm-4 fw-bold\">Statut :</div>
                    <div class=\"col-sm-8\">
                        <span class=\"badge ";
        // line 56
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 56, $this->source); })()), "statut", [], "any", false, false, false, 56) == "accepte")) {
            yield "bg-success";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 56, $this->source); })()), "statut", [], "any", false, false, false, 56) == "refuse")) {
            yield "bg-danger";
        } else {
            yield "bg-warning text-dark";
        }
        yield " fs-6\">
                            ";
        // line 57
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 57, $this->source); })()), "statut", [], "any", false, false, false, 57) == "accepte")) {
            yield "✅ Accepté
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 58
(isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 58, $this->source); })()), "statut", [], "any", false, false, false, 58) == "refuse")) {
            yield "❌ Refusé
                            ";
        } else {
            // line 59
            yield "⏳ En attente";
        }
        // line 60
        yield "                        </span>
                    </div>
                    <div class=\"col-sm-4 fw-bold\">Date demande :</div>
                    <div class=\"col-sm-8\">";
        // line 63
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 63, $this->source); })()), "dateDemande", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 63, $this->source); })()), "dateDemande", [], "any", false, false, false, 63), "d/m/Y H:i"), "html", null, true)) : ("—"));
        yield "</div>
                    ";
        // line 64
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 64, $this->source); })()), "dateValidation", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 65
            yield "                        <div class=\"col-sm-4 fw-bold\">Date validation :</div>
                        <div class=\"col-sm-8\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 66, $this->source); })()), "dateValidation", [], "any", false, false, false, 66), "d/m/Y H:i"), "html", null, true);
            yield "</div>
                    ";
        }
        // line 68
        yield "                </div>
            </div>
        </div>

        ";
        // line 72
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 72, $this->source); })()), "description", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 73
            yield "        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-info text-white\">
                <h5 class=\"mb-0\"><i class=\"fas fa-align-left me-2\"></i>Description</h5>
            </div>
            <div class=\"card-body\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 77, $this->source); })()), "description", [], "any", false, false, false, 77), "html", null, true);
            yield "</div>
        </div>
        ";
        }
        // line 80
        yield "
        ";
        // line 82
        yield "        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-dark text-white d-flex justify-content-between align-items-center flex-wrap gap-2\">
                <h5 class=\"mb-0\"><i class=\"fas fa-utensils me-2\"></i>Plats proposés</h5>
                <div class=\"d-flex align-items-center gap-2 flex-wrap\">
                    <a href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plats_pending");
        yield "\" class=\"btn btn-sm btn-outline-light\">
                        <i class=\"fas fa-tasks me-1\"></i> File d’attente plats
                    </a>
                    <span class=\"badge bg-light text-dark\">
                    ";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 90, $this->source); })()), "total", [], "any", false, false, false, 90), "html", null, true);
        yield " plat";
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 90, $this->source); })()), "total", [], "any", false, false, false, 90) > 1)) ? ("s") : (""));
        yield "
                    &nbsp;·&nbsp; ✅ ";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 91, $this->source); })()), "accepte", [], "any", false, false, false, 91), "html", null, true);
        yield "
                    &nbsp;·&nbsp; ⏳ ";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 92, $this->source); })()), "en_attente", [], "any", false, false, false, 92), "html", null, true);
        yield "
                    &nbsp;·&nbsp; ❌ ";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 93, $this->source); })()), "refuse", [], "any", false, false, false, 93), "html", null, true);
        yield "
                    </span>
                </div>
            </div>
            <div class=\"card-body p-0\">
                ";
        // line 98
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 98, $this->source); })())) > 0)) {
            // line 99
            yield "                    <div class=\"table-responsive\">
                        <table class=\"table table-hover mb-0\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Description</th>
                                    <th class=\"text-center\" style=\"min-width: 200px;\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
            // line 112
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 112, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
                // line 113
                yield "                                <tr>
                                    <td class=\"fw-semibold\">
                                        ";
                // line 115
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 116
                    yield "                                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 116), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 116), "html", null, true);
                    yield "\"
                                                 class=\"rounded me-2\"
                                                 style=\"width:36px;height:36px;object-fit:cover;\">
                                        ";
                } else {
                    // line 120
                    yield "                                            <span class=\"me-2\">🍽️</span>
                                        ";
                }
                // line 122
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 122), "html", null, true);
                yield "
                                    </td>
                                    <td><span class=\"badge bg-secondary\">";
                // line 124
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 124)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 124), "html", null, true)) : ("—"));
                yield "</span></td>
                                    <td class=\"fw-bold text-danger\">";
                // line 125
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 125), 2, ",", " "), "html", null, true);
                yield " €</td>
                                    <td>
                                        <span class=\"badge ";
                // line 127
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 127) == "accepte")) {
                    yield "bg-success";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 127) == "refuse")) {
                    yield "bg-danger";
                } else {
                    yield "bg-warning text-dark";
                }
                yield "\">
                                            ";
                // line 128
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 128) == "accepte")) {
                    yield "✅ Accepté
                                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 129
$context["plat"], "statut", [], "any", false, false, false, 129) == "refuse")) {
                    yield "❌ Refusé
                                            ";
                } else {
                    // line 130
                    yield "⏳ En attente";
                }
                // line 131
                yield "                                        </span>
                                    </td>
                                    <td class=\"text-muted small\">";
                // line 133
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 133)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 133), 0, 60) . "…"), "html", null, true)) : ("—"));
                yield "</td>
                                    <td class=\"text-center align-middle\">
                                        ";
                // line 135
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "statut", [], "any", false, false, false, 135) == "en_attente")) {
                    // line 136
                    yield "                                            <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 136)]), "html", null, true);
                    yield "\"
                                                  method=\"post\" class=\"d-inline\"
                                                  onsubmit=\"return confirm('Approuver « ";
                    // line 138
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 138), "js"), "html", null, true);
                    yield " » ?');\">
                                                <input type=\"hidden\" name=\"redirect_route\" value=\"app_admin_partenaire_voir\">
                                                <input type=\"hidden\" name=\"redirect_id\" value=\"";
                    // line 140
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 140, $this->source); })()), "id", [], "any", false, false, false, 140), "html", null, true);
                    yield "\">
                                                <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Approuver le plat\">
                                                    <i class=\"fas fa-check\"></i>
                                                </button>
                                            </form>
                                            <form action=\"";
                    // line 145
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_plat_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 145)]), "html", null, true);
                    yield "\"
                                                  method=\"post\" class=\"d-inline-block align-top ms-1 text-start\"
                                                  style=\"max-width: 170px;\"
                                                  onsubmit=\"return confirm('Rejeter « ";
                    // line 148
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 148), "js"), "html", null, true);
                    yield " » ?');\">
                                                <input type=\"hidden\" name=\"redirect_route\" value=\"app_admin_partenaire_voir\">
                                                <input type=\"hidden\" name=\"redirect_id\" value=\"";
                    // line 150
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 150, $this->source); })()), "id", [], "any", false, false, false, 150), "html", null, true);
                    yield "\">
                                                <input type=\"text\" name=\"reject_comment\" class=\"form-control form-control-sm mb-1\"
                                                       placeholder=\"Motif (optionnel)\" autocomplete=\"off\">
                                                <button type=\"submit\" class=\"btn btn-danger btn-sm w-100\" title=\"Refuser le plat\">
                                                    <i class=\"fas fa-times\"></i> Refuser
                                                </button>
                                            </form>
                                        ";
                } else {
                    // line 158
                    yield "                                            <span class=\"text-muted small\">—</span>
                                        ";
                }
                // line 160
                yield "                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            yield "                            </tbody>
                        </table>
                    </div>
                ";
        } else {
            // line 167
            yield "                    <div class=\"text-center py-4 text-muted\">
                        <i class=\"fas fa-plate-wheat fa-2x mb-2\"></i><br>
                        Aucun plat proposé pour l'instant.
                    </div>
                ";
        }
        // line 172
        yield "            </div>
        </div>

        ";
        // line 176
        yield "        ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 176, $this->source); })()), "statut", [], "any", false, false, false, 176) == "accepte")) {
            // line 177
            yield "        <div class=\"card shadow-sm\">
            <div class=\"card-header text-white\" style=\"background:linear-gradient(135deg,#8B0000,#A52A2A);\">
                <h5 class=\"mb-0\">
                    <i class=\"fas fa-star me-2\"></i>
                    Produits recommandés pour ce partenaire
                    <small class=\"opacity-75 ms-2 fs-6\">(basé sur ses plats)</small>
                </h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 186
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 186, $this->source); })())) > 0)) {
                // line 187
                yield "                    <div class=\"row g-3\">
                        ";
                // line 188
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 188, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
                    // line 189
                    yield "                        <div class=\"col-md-4\">
                            <div class=\"card h-100 border-0 shadow-sm\" style=\"border-radius:12px;overflow:hidden;\">
                                ";
                    // line 191
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 191)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 192
                        yield "                                    <img src=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 192), "html", null, true);
                        yield "\" alt=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 192), "html", null, true);
                        yield "\"
                                         class=\"card-img-top\" style=\"height:120px;object-fit:cover;\">
                                ";
                    } else {
                        // line 195
                        yield "                                    <div class=\"bg-light d-flex align-items-center justify-content-center\"
                                         style=\"height:120px;font-size:40px;\">🛍️</div>
                                ";
                    }
                    // line 198
                    yield "                                <div class=\"card-body p-3\">
                                    <h6 class=\"card-title fw-bold mb-1\">";
                    // line 199
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 199), "html", null, true);
                    yield "</h6>
                                    <p class=\"card-text text-muted small mb-2\">
                                        ";
                    // line 201
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 201)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 201), 0, 60) . "…"), "html", null, true)) : (""));
                    yield "
                                    </p>
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <span class=\"fw-bold text-danger\">";
                    // line 204
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 204), 2, ",", " "), "html", null, true);
                    yield " €</span>
                                        <span class=\"badge bg-light text-dark\">
                                            <i class=\"fas fa-shopping-cart me-1\"></i>";
                    // line 206
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 206), "html", null, true);
                    yield " ventes
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 213
                yield "                    </div>
                ";
            } else {
                // line 215
                yield "                    <div class=\"text-center text-muted py-3\">
                        <i class=\"fas fa-box-open fa-2x mb-2\"></i><br>
                        Aucun produit disponible pour la recommandation.
                    </div>
                ";
            }
            // line 220
            yield "            </div>
        </div>
        ";
        }
        // line 223
        yield "
        ";
        // line 225
        yield "        ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["collaborations"]) || array_key_exists("collaborations", $context) ? $context["collaborations"] : (function () { throw new RuntimeError('Variable "collaborations" does not exist.', 225, $this->source); })())) > 0)) {
            // line 226
            yield "        <div class=\"card shadow-sm\">
            <div class=\"card-header text-white\" style=\"background:linear-gradient(135deg,#2e7d32,#388e3c);\">
                <h5 class=\"mb-0\">
                    <i class=\"fas fa-link me-2\"></i>
                    Collaborations de ce partenaire
                    <span class=\"badge bg-light text-dark ms-2\">";
            // line 231
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["collaborations"]) || array_key_exists("collaborations", $context) ? $context["collaborations"] : (function () { throw new RuntimeError('Variable "collaborations" does not exist.', 231, $this->source); })())), "html", null, true);
            yield "</span>
                </h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"nav nav-tabs mb-3\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link active\" id=\"collab-validee-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-validee-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-check-circle\"></i> Validée(s) 
                            <span class=\"badge bg-success\">";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "validee", [], "array", true, true, false, 240)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 240, $this->source); })()), "validee", [], "array", false, false, false, 240), [])) : ([]))), "html", null, true);
            yield "</span>
                        </button>
                    </li>
                    ";
            // line 243
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "refusee", [], "array", true, true, false, 243)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 243, $this->source); })()), "refusee", [], "array", false, false, false, 243), [])) : ([]))) > 0)) {
                // line 244
                yield "                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link\" id=\"collab-refusee-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-refusee-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-times-circle\"></i> Refusée(s) 
                            <span class=\"badge bg-danger\">";
                // line 248
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "refusee", [], "array", true, true, false, 248)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 248, $this->source); })()), "refusee", [], "array", false, false, false, 248), [])) : ([]))), "html", null, true);
                yield "</span>
                        </button>
                    </li>
                    ";
            }
            // line 252
            yield "                    ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "annulea", [], "array", true, true, false, 252)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 252, $this->source); })()), "annulea", [], "array", false, false, false, 252), [])) : ([]))) > 0)) {
                // line 253
                yield "                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link\" id=\"collab-annulea-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-annulea-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-ban\"></i> Annulée(s) 
                            <span class=\"badge bg-secondary\">";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "annulea", [], "array", true, true, false, 257)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 257, $this->source); })()), "annulea", [], "array", false, false, false, 257), [])) : ([]))), "html", null, true);
                yield "</span>
                        </button>
                    </li>
                    ";
            }
            // line 261
            yield "                </ul>

                <div class=\"tab-content\">
                    ";
            // line 265
            yield "                    <div class=\"tab-pane fade show active\" id=\"collab-validee-pane\" role=\"tabpanel\">
                        ";
            // line 266
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "validee", [], "array", true, true, false, 266)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 266, $this->source); })()), "validee", [], "array", false, false, false, 266), [])) : ([]))) > 0)) {
                // line 267
                yield "                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Depuis</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 278
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 278, $this->source); })()), "validee", [], "array", false, false, false, 278));
                foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                    // line 279
                    yield "                                        <tr>
                                            <td>
                                                <strong>";
                    // line 281
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 281), "nom", [], "any", false, false, false, 281), "html", null, true);
                    yield "</strong>
                                                ";
                    // line 282
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 282), "description", [], "any", false, false, false, 282)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 283
                        yield "                                                <br><small class=\"text-muted\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 283), "description", [], "any", false, false, false, 283), 0, 50), "html", null, true);
                        yield "...</small>
                                                ";
                    }
                    // line 285
                    yield "                                            </td>
                                            <td><strong class=\"text-success\">";
                    // line 286
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 286), "prix", [], "any", false, false, false, 286), 2, ",", " "), "html", null, true);
                    yield " €</strong></td>
                                            <td><small class=\"text-muted\">";
                    // line 287
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 287), "d/m/Y"), "html", null, true);
                    yield "</small></td>
                                            <td>
                                                <form action=\"";
                    // line 289
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaboration_refuser", ["collaborationId" => CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "id", [], "any", false, false, false, 289)]), "html", null, true);
                    yield "\" 
                                                      method=\"post\" style=\"display:inline;\" 
                                                      onsubmit=\"return confirm('Refuser cette collaboration ?');\">
                                                    <button type=\"submit\" class=\"btn btn-danger btn-sm\" title=\"Refuser\">
                                                        <i class=\"fas fa-times\"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 299
                yield "                                    </tbody>
                                </table>
                            </div>
                        ";
            } else {
                // line 303
                yield "                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-check-circle fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration validée
                            </div>
                        ";
            }
            // line 308
            yield "                    </div>

                    ";
            // line 311
            yield "                    <div class=\"tab-pane fade\" id=\"collab-refusee-pane\" role=\"tabpanel\">
                        ";
            // line 312
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "refusee", [], "array", true, true, false, 312)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 312, $this->source); })()), "refusee", [], "array", false, false, false, 312), [])) : ([]))) > 0)) {
                // line 313
                yield "                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 324
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 324, $this->source); })()), "refusee", [], "array", false, false, false, 324));
                foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                    // line 325
                    yield "                                        <tr>
                                            <td>
                                                <strong>";
                    // line 327
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 327), "nom", [], "any", false, false, false, 327), "html", null, true);
                    yield "</strong>
                                                ";
                    // line 328
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 328), "description", [], "any", false, false, false, 328)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 329
                        yield "                                                <br><small class=\"text-muted\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 329), "description", [], "any", false, false, false, 329), 0, 50), "html", null, true);
                        yield "...</small>
                                                ";
                    }
                    // line 331
                    yield "                                            </td>
                                            <td><strong class=\"text-danger\">";
                    // line 332
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 332), "prix", [], "any", false, false, false, 332), 2, ",", " "), "html", null, true);
                    yield " €</strong></td>
                                            <td><small class=\"text-muted\">";
                    // line 333
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 333), "d/m/Y"), "html", null, true);
                    yield "</small></td>
                                            <td>
                                                <form action=\"";
                    // line 335
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaboration_valider", ["collaborationId" => CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "id", [], "any", false, false, false, 335)]), "html", null, true);
                    yield "\" 
                                                      method=\"post\" style=\"display:inline;\" 
                                                      onsubmit=\"return confirm('Valider cette collaboration ?');\">
                                                    <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Valider\">
                                                        <i class=\"fas fa-check\"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 345
                yield "                                    </tbody>
                                </table>
                            </div>
                        ";
            } else {
                // line 349
                yield "                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-times-circle fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration refusée
                            </div>
                        ";
            }
            // line 354
            yield "                    </div>

                    ";
            // line 357
            yield "                    <div class=\"tab-pane fade\" id=\"collab-annulea-pane\" role=\"tabpanel\">
                        ";
            // line 358
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationsParStatut"] ?? null), "annulea", [], "array", true, true, false, 358)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 358, $this->source); })()), "annulea", [], "array", false, false, false, 358), [])) : ([]))) > 0)) {
                // line 359
                yield "                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 369
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationsParStatut"]) || array_key_exists("collaborationsParStatut", $context) ? $context["collaborationsParStatut"] : (function () { throw new RuntimeError('Variable "collaborationsParStatut" does not exist.', 369, $this->source); })()), "annulea", [], "array", false, false, false, 369));
                foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                    // line 370
                    yield "                                        <tr>
                                            <td>
                                                <strong>";
                    // line 372
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 372), "nom", [], "any", false, false, false, 372), "html", null, true);
                    yield "</strong>
                                                ";
                    // line 373
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 373), "description", [], "any", false, false, false, 373)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 374
                        yield "                                                <br><small class=\"text-muted\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 374), "description", [], "any", false, false, false, 374), 0, 50), "html", null, true);
                        yield "...</small>
                                                ";
                    }
                    // line 376
                    yield "                                            </td>
                                            <td><strong>";
                    // line 377
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 377), "prix", [], "any", false, false, false, 377), 2, ",", " "), "html", null, true);
                    yield " €</strong></td>
                                            <td><small class=\"text-muted\">";
                    // line 378
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 378), "d/m/Y"), "html", null, true);
                    yield "</small></td>
                                        </tr>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 381
                yield "                                    </tbody>
                                </table>
                            </div>
                        ";
            } else {
                // line 385
                yield "                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-ban fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration annulée
                            </div>
                        ";
            }
            // line 390
            yield "                    </div>
                </div>
            </div>
        </div>
        ";
        }
        // line 395
        yield "    </div>

    ";
        // line 398
        yield "    <div class=\"col-md-4\">

        ";
        // line 400
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 400, $this->source); })()), "logo", [], "any", false, false, false, 400)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 401
            yield "        <div class=\"card mb-3 shadow-sm\">
            <div class=\"card-header bg-secondary text-white\"><h5 class=\"mb-0\">Logo</h5></div>
            <div class=\"card-body text-center\">
                <img src=\"";
            // line 404
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 404, $this->source); })()), "logo", [], "any", false, false, false, 404), "html", null, true);
            yield "\" class=\"img-fluid rounded\" style=\"max-height:200px;\">
            </div>
        </div>
        ";
        }
        // line 408
        yield "
        <div class=\"card shadow-sm\">
            <div class=\"card-header bg-warning\">
                <h5 class=\"mb-0\"><i class=\"fas fa-cog me-2\"></i>Actions</h5>
            </div>
            <div class=\"card-body d-grid gap-2\">
                ";
        // line 414
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 414, $this->source); })()), "statut", [], "any", false, false, false, 414) == "en_attente")) {
            // line 415
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 415, $this->source); })()), "id", [], "any", false, false, false, 415)]), "html", null, true);
            yield "\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-success w-100\"
                                onclick=\"return confirm('Accepter ce partenaire ?')\">
                            <i class=\"fas fa-check me-1\"></i> Accepter
                        </button>
                    </form>
                    <button type=\"button\" class=\"btn btn-danger w-100\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                        <i class=\"fas fa-times me-1\"></i> Refuser
                    </button>
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 425
(isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 425, $this->source); })()), "statut", [], "any", false, false, false, 425) == "accepte")) {
            // line 426
            yield "                    <div class=\"alert alert-success mb-0 text-center\">
                        <i class=\"fas fa-handshake me-1\"></i><strong>Partenaire actif</strong>
                    </div>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                        <i class=\"fas fa-ban me-1\"></i> Révoquer
                    </button>
                ";
        } else {
            // line 434
            yield "                    <div class=\"alert alert-danger mb-0 text-center\">
                        <i class=\"fas fa-times-circle me-1\"></i><strong>Partenaire refusé</strong>
                    </div>
                ";
        }
        // line 438
        yield "
                <hr>
                <form action=\"";
        // line 440
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_supprimer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 440, $this->source); })()), "id", [], "any", false, false, false, 440)]), "html", null, true);
        yield "\"
                      method=\"post\"
                      onsubmit=\"return confirm('Supprimer définitivement ce partenaire ?')\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm w-100\">
                        <i class=\"fas fa-trash me-1\"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        ";
        // line 451
        yield "        <div class=\"card mt-3 shadow-sm\">
            <div class=\"card-header bg-light\"><h6 class=\"mb-0\">📊 Statistiques plats</h6></div>
            <div class=\"card-body p-3\">
                <div class=\"d-flex justify-content-between mb-1\">
                    <span>Total :</span><strong>";
        // line 455
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 455, $this->source); })()), "total", [], "any", false, false, false, 455), "html", null, true);
        yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-success\">Acceptés :</span><strong class=\"text-success\">";
        // line 458
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 458, $this->source); })()), "accepte", [], "any", false, false, false, 458), "html", null, true);
        yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-warning\">En attente :</span><strong class=\"text-warning\">";
        // line 461
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 461, $this->source); })()), "en_attente", [], "any", false, false, false, 461), "html", null, true);
        yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"text-danger\">Refusés :</span><strong class=\"text-danger\">";
        // line 464
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["platStats"]) || array_key_exists("platStats", $context) ? $context["platStats"] : (function () { throw new RuntimeError('Variable "platStats" does not exist.', 464, $this->source); })()), "refuse", [], "any", false, false, false, 464), "html", null, true);
        yield "</strong>
                </div>
            </div>
        </div>

        ";
        // line 470
        yield "        ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationStats"]) || array_key_exists("collaborationStats", $context) ? $context["collaborationStats"] : (function () { throw new RuntimeError('Variable "collaborationStats" does not exist.', 470, $this->source); })()), "total", [], "any", false, false, false, 470) > 0)) {
            // line 471
            yield "        <div class=\"card mt-3 shadow-sm\">
            <div class=\"card-header bg-light\"><h6 class=\"mb-0\">🔗 Statistiques collaborations</h6></div>
            <div class=\"card-body p-3\">
                <div class=\"d-flex justify-content-between mb-1\">
                    <span>Total :</span><strong>";
            // line 475
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationStats"]) || array_key_exists("collaborationStats", $context) ? $context["collaborationStats"] : (function () { throw new RuntimeError('Variable "collaborationStats" does not exist.', 475, $this->source); })()), "total", [], "any", false, false, false, 475), "html", null, true);
            yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-success\">Validée(s) :</span><strong class=\"text-success\">";
            // line 478
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationStats"]) || array_key_exists("collaborationStats", $context) ? $context["collaborationStats"] : (function () { throw new RuntimeError('Variable "collaborationStats" does not exist.', 478, $this->source); })()), "validee", [], "any", false, false, false, 478), "html", null, true);
            yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-danger\">Refusée(s) :</span><strong class=\"text-danger\">";
            // line 481
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationStats"]) || array_key_exists("collaborationStats", $context) ? $context["collaborationStats"] : (function () { throw new RuntimeError('Variable "collaborationStats" does not exist.', 481, $this->source); })()), "refusee", [], "any", false, false, false, 481), "html", null, true);
            yield "</strong>
                </div>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"text-secondary\">Annulée(s) :</span><strong class=\"text-secondary\">";
            // line 484
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationStats"]) || array_key_exists("collaborationStats", $context) ? $context["collaborationStats"] : (function () { throw new RuntimeError('Variable "collaborationStats" does not exist.', 484, $this->source); })()), "annulee", [], "any", false, false, false, 484), "html", null, true);
            yield "</strong>
                </div>
            </div>
        </div>
        ";
        }
        // line 489
        yield "    </div>
</div>

";
        // line 493
        yield "<div class=\"modal fade\" id=\"refuseModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <form action=\"";
        // line 496
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 496, $this->source); })()), "id", [], "any", false, false, false, 496)]), "html", null, true);
        yield "\" method=\"post\">
                <div class=\"modal-header bg-danger text-white\">
                    <h5 class=\"modal-title\">
                        ";
        // line 499
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 499, $this->source); })()), "statut", [], "any", false, false, false, 499) == "accepte")) {
            yield "Révoquer";
        } else {
            yield "Refuser";
        }
        // line 500
        yield "                        le partenaire
                    </h5>
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
                </div>
                <div class=\"modal-body\">
                    <label for=\"motif\" class=\"form-label\">Motif <small class=\"text-muted\">(optionnel)</small></label>
                    <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\"
                              placeholder=\"Expliquez la raison…\"></textarea>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-danger\">Confirmer</button>
                </div>
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
        return "admin_partenaire/voir.html.twig";
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
        return array (  1015 => 500,  1009 => 499,  1003 => 496,  998 => 493,  993 => 489,  985 => 484,  979 => 481,  973 => 478,  967 => 475,  961 => 471,  958 => 470,  950 => 464,  944 => 461,  938 => 458,  932 => 455,  926 => 451,  913 => 440,  909 => 438,  903 => 434,  893 => 426,  891 => 425,  877 => 415,  875 => 414,  867 => 408,  860 => 404,  855 => 401,  853 => 400,  849 => 398,  845 => 395,  838 => 390,  831 => 385,  825 => 381,  816 => 378,  812 => 377,  809 => 376,  803 => 374,  801 => 373,  797 => 372,  793 => 370,  789 => 369,  777 => 359,  775 => 358,  772 => 357,  768 => 354,  761 => 349,  755 => 345,  739 => 335,  734 => 333,  730 => 332,  727 => 331,  721 => 329,  719 => 328,  715 => 327,  711 => 325,  707 => 324,  694 => 313,  692 => 312,  689 => 311,  685 => 308,  678 => 303,  672 => 299,  656 => 289,  651 => 287,  647 => 286,  644 => 285,  638 => 283,  636 => 282,  632 => 281,  628 => 279,  624 => 278,  611 => 267,  609 => 266,  606 => 265,  601 => 261,  594 => 257,  588 => 253,  585 => 252,  578 => 248,  572 => 244,  570 => 243,  564 => 240,  552 => 231,  545 => 226,  542 => 225,  539 => 223,  534 => 220,  527 => 215,  523 => 213,  510 => 206,  505 => 204,  499 => 201,  494 => 199,  491 => 198,  486 => 195,  477 => 192,  475 => 191,  471 => 189,  467 => 188,  464 => 187,  462 => 186,  451 => 177,  448 => 176,  443 => 172,  436 => 167,  430 => 163,  422 => 160,  418 => 158,  407 => 150,  402 => 148,  396 => 145,  388 => 140,  383 => 138,  377 => 136,  375 => 135,  370 => 133,  366 => 131,  363 => 130,  358 => 129,  354 => 128,  344 => 127,  339 => 125,  335 => 124,  329 => 122,  325 => 120,  315 => 116,  313 => 115,  309 => 113,  305 => 112,  290 => 99,  288 => 98,  280 => 93,  276 => 92,  272 => 91,  266 => 90,  259 => 86,  253 => 82,  250 => 80,  244 => 77,  238 => 73,  236 => 72,  230 => 68,  225 => 66,  222 => 65,  220 => 64,  216 => 63,  211 => 60,  208 => 59,  203 => 58,  199 => 57,  189 => 56,  183 => 53,  178 => 51,  173 => 49,  168 => 47,  159 => 40,  155 => 37,  145 => 29,  140 => 26,  130 => 22,  127 => 21,  123 => 20,  113 => 16,  110 => 15,  106 => 14,  96 => 10,  93 => 9,  89 => 8,  86 => 6,  76 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Détails partenaire — {{ partenaire.nom }}{% endblock %}

{% block admin_content %}

{# ── Messages Flash ── #}
{% for msg in app.flashes('success') %}
    <div class=\"alert alert-success alert-dismissible fade show mb-3\">
        <i class=\"fas fa-check-circle me-2\"></i>{{ msg }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}
{% for msg in app.flashes('error') %}
    <div class=\"alert alert-danger alert-dismissible fade show mb-3\">
        <i class=\"fas fa-exclamation-circle me-2\"></i>{{ msg }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}
{% for msg in app.flashes('info') %}
    <div class=\"alert alert-info alert-dismissible fade show mb-3\">
        <i class=\"fas fa-info-circle me-2\"></i>{{ msg }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
    </div>
{% endfor %}

<div class=\"d-flex justify-content-between align-items-center mb-4\">
    <h3 class=\"mb-0\">🤝 Détails du partenaire</h3>
    <a href=\"{{ path('app_admin_partenaires_index') }}\" class=\"btn btn-secondary\">
        <i class=\"fas fa-arrow-left me-1\"></i> Retour
    </a>
</div>

<div class=\"row g-4\">

    {# ── Colonne principale ── #}
    <div class=\"col-md-8\">

        {# Infos générales #}
        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-primary text-white\">
                <h5 class=\"mb-0\"><i class=\"fas fa-info-circle me-2\"></i>Informations générales</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-2\">
                    <div class=\"col-sm-4 fw-bold\">Nom :</div>
                    <div class=\"col-sm-8\">{{ partenaire.nom }}</div>
                    <div class=\"col-sm-4 fw-bold\">Type :</div>
                    <div class=\"col-sm-8\">{{ partenaire.type }}</div>
                    <div class=\"col-sm-4 fw-bold\">Téléphone :</div>
                    <div class=\"col-sm-8\">{{ partenaire.telephone }}</div>
                    <div class=\"col-sm-4 fw-bold\">Adresse :</div>
                    <div class=\"col-sm-8\">{{ partenaire.adresse }}</div>
                    <div class=\"col-sm-4 fw-bold\">Statut :</div>
                    <div class=\"col-sm-8\">
                        <span class=\"badge {% if partenaire.statut == 'accepte' %}bg-success{% elseif partenaire.statut == 'refuse' %}bg-danger{% else %}bg-warning text-dark{% endif %} fs-6\">
                            {% if partenaire.statut == 'accepte' %}✅ Accepté
                            {% elseif partenaire.statut == 'refuse' %}❌ Refusé
                            {% else %}⏳ En attente{% endif %}
                        </span>
                    </div>
                    <div class=\"col-sm-4 fw-bold\">Date demande :</div>
                    <div class=\"col-sm-8\">{{ partenaire.dateDemande ? partenaire.dateDemande|date('d/m/Y H:i') : '—' }}</div>
                    {% if partenaire.dateValidation %}
                        <div class=\"col-sm-4 fw-bold\">Date validation :</div>
                        <div class=\"col-sm-8\">{{ partenaire.dateValidation|date('d/m/Y H:i') }}</div>
                    {% endif %}
                </div>
            </div>
        </div>

        {% if partenaire.description %}
        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-info text-white\">
                <h5 class=\"mb-0\"><i class=\"fas fa-align-left me-2\"></i>Description</h5>
            </div>
            <div class=\"card-body\">{{ partenaire.description }}</div>
        </div>
        {% endif %}

        {# ── Plats proposés ── #}
        <div class=\"card mb-4 shadow-sm\">
            <div class=\"card-header bg-dark text-white d-flex justify-content-between align-items-center flex-wrap gap-2\">
                <h5 class=\"mb-0\"><i class=\"fas fa-utensils me-2\"></i>Plats proposés</h5>
                <div class=\"d-flex align-items-center gap-2 flex-wrap\">
                    <a href=\"{{ path('app_admin_plats_pending') }}\" class=\"btn btn-sm btn-outline-light\">
                        <i class=\"fas fa-tasks me-1\"></i> File d’attente plats
                    </a>
                    <span class=\"badge bg-light text-dark\">
                    {{ platStats.total }} plat{{ platStats.total > 1 ? 's' : '' }}
                    &nbsp;·&nbsp; ✅ {{ platStats.accepte }}
                    &nbsp;·&nbsp; ⏳ {{ platStats.en_attente }}
                    &nbsp;·&nbsp; ❌ {{ platStats.refuse }}
                    </span>
                </div>
            </div>
            <div class=\"card-body p-0\">
                {% if plats|length > 0 %}
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover mb-0\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Description</th>
                                    <th class=\"text-center\" style=\"min-width: 200px;\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            {% for plat in plats %}
                                <tr>
                                    <td class=\"fw-semibold\">
                                        {% if plat.image %}
                                            <img src=\"{{ plat.image }}\" alt=\"{{ plat.nom }}\"
                                                 class=\"rounded me-2\"
                                                 style=\"width:36px;height:36px;object-fit:cover;\">
                                        {% else %}
                                            <span class=\"me-2\">🍽️</span>
                                        {% endif %}
                                        {{ plat.nom }}
                                    </td>
                                    <td><span class=\"badge bg-secondary\">{{ plat.categorie ?: '—' }}</span></td>
                                    <td class=\"fw-bold text-danger\">{{ plat.prix|number_format(2, ',', ' ') }} €</td>
                                    <td>
                                        <span class=\"badge {% if plat.statut == 'accepte' %}bg-success{% elseif plat.statut == 'refuse' %}bg-danger{% else %}bg-warning text-dark{% endif %}\">
                                            {% if plat.statut == 'accepte' %}✅ Accepté
                                            {% elseif plat.statut == 'refuse' %}❌ Refusé
                                            {% else %}⏳ En attente{% endif %}
                                        </span>
                                    </td>
                                    <td class=\"text-muted small\">{{ plat.description ? plat.description|slice(0, 60) ~ '…' : '—' }}</td>
                                    <td class=\"text-center align-middle\">
                                        {% if plat.statut == 'en_attente' %}
                                            <form action=\"{{ path('app_admin_plat_approve', {id: plat.id}) }}\"
                                                  method=\"post\" class=\"d-inline\"
                                                  onsubmit=\"return confirm('Approuver « {{ plat.nom|e('js') }} » ?');\">
                                                <input type=\"hidden\" name=\"redirect_route\" value=\"app_admin_partenaire_voir\">
                                                <input type=\"hidden\" name=\"redirect_id\" value=\"{{ partenaire.id }}\">
                                                <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Approuver le plat\">
                                                    <i class=\"fas fa-check\"></i>
                                                </button>
                                            </form>
                                            <form action=\"{{ path('app_admin_plat_reject', {id: plat.id}) }}\"
                                                  method=\"post\" class=\"d-inline-block align-top ms-1 text-start\"
                                                  style=\"max-width: 170px;\"
                                                  onsubmit=\"return confirm('Rejeter « {{ plat.nom|e('js') }} » ?');\">
                                                <input type=\"hidden\" name=\"redirect_route\" value=\"app_admin_partenaire_voir\">
                                                <input type=\"hidden\" name=\"redirect_id\" value=\"{{ partenaire.id }}\">
                                                <input type=\"text\" name=\"reject_comment\" class=\"form-control form-control-sm mb-1\"
                                                       placeholder=\"Motif (optionnel)\" autocomplete=\"off\">
                                                <button type=\"submit\" class=\"btn btn-danger btn-sm w-100\" title=\"Refuser le plat\">
                                                    <i class=\"fas fa-times\"></i> Refuser
                                                </button>
                                            </form>
                                        {% else %}
                                            <span class=\"text-muted small\">—</span>
                                        {% endif %}
                                    </td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                {% else %}
                    <div class=\"text-center py-4 text-muted\">
                        <i class=\"fas fa-plate-wheat fa-2x mb-2\"></i><br>
                        Aucun plat proposé pour l'instant.
                    </div>
                {% endif %}
            </div>
        </div>

        {# ── Recommandations Produits (après acceptation) ── #}
        {% if partenaire.statut == 'accepte' %}
        <div class=\"card shadow-sm\">
            <div class=\"card-header text-white\" style=\"background:linear-gradient(135deg,#8B0000,#A52A2A);\">
                <h5 class=\"mb-0\">
                    <i class=\"fas fa-star me-2\"></i>
                    Produits recommandés pour ce partenaire
                    <small class=\"opacity-75 ms-2 fs-6\">(basé sur ses plats)</small>
                </h5>
            </div>
            <div class=\"card-body\">
                {% if recommendations|length > 0 %}
                    <div class=\"row g-3\">
                        {% for produit in recommendations %}
                        <div class=\"col-md-4\">
                            <div class=\"card h-100 border-0 shadow-sm\" style=\"border-radius:12px;overflow:hidden;\">
                                {% if produit.photo %}
                                    <img src=\"{{ produit.photo }}\" alt=\"{{ produit.nom }}\"
                                         class=\"card-img-top\" style=\"height:120px;object-fit:cover;\">
                                {% else %}
                                    <div class=\"bg-light d-flex align-items-center justify-content-center\"
                                         style=\"height:120px;font-size:40px;\">🛍️</div>
                                {% endif %}
                                <div class=\"card-body p-3\">
                                    <h6 class=\"card-title fw-bold mb-1\">{{ produit.nom }}</h6>
                                    <p class=\"card-text text-muted small mb-2\">
                                        {{ produit.description ? produit.description|slice(0,60) ~ '…' : '' }}
                                    </p>
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <span class=\"fw-bold text-danger\">{{ produit.prix|number_format(2, ',', ' ') }} €</span>
                                        <span class=\"badge bg-light text-dark\">
                                            <i class=\"fas fa-shopping-cart me-1\"></i>{{ produit.quantite }} ventes
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {% endfor %}
                    </div>
                {% else %}
                    <div class=\"text-center text-muted py-3\">
                        <i class=\"fas fa-box-open fa-2x mb-2\"></i><br>
                        Aucun produit disponible pour la recommandation.
                    </div>
                {% endif %}
            </div>
        </div>
        {% endif %}

        {# ── Collaborations produits ── #}
        {% if collaborations|length > 0 %}
        <div class=\"card shadow-sm\">
            <div class=\"card-header text-white\" style=\"background:linear-gradient(135deg,#2e7d32,#388e3c);\">
                <h5 class=\"mb-0\">
                    <i class=\"fas fa-link me-2\"></i>
                    Collaborations de ce partenaire
                    <span class=\"badge bg-light text-dark ms-2\">{{ collaborations|length }}</span>
                </h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"nav nav-tabs mb-3\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link active\" id=\"collab-validee-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-validee-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-check-circle\"></i> Validée(s) 
                            <span class=\"badge bg-success\">{{ collaborationsParStatut['validee']|default([])|length }}</span>
                        </button>
                    </li>
                    {% if collaborationsParStatut['refusee']|default([])|length > 0 %}
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link\" id=\"collab-refusee-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-refusee-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-times-circle\"></i> Refusée(s) 
                            <span class=\"badge bg-danger\">{{ collaborationsParStatut['refusee']|default([])|length }}</span>
                        </button>
                    </li>
                    {% endif %}
                    {% if collaborationsParStatut['annulea']|default([])|length > 0 %}
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link\" id=\"collab-annulea-tab\" data-bs-toggle=\"tab\" 
                                data-bs-target=\"#collab-annulea-pane\" type=\"button\" role=\"tab\">
                            <i class=\"fas fa-ban\"></i> Annulée(s) 
                            <span class=\"badge bg-secondary\">{{ collaborationsParStatut['annulea']|default([])|length }}</span>
                        </button>
                    </li>
                    {% endif %}
                </ul>

                <div class=\"tab-content\">
                    {# TAB: Validée #}
                    <div class=\"tab-pane fade show active\" id=\"collab-validee-pane\" role=\"tabpanel\">
                        {% if collaborationsParStatut['validee']|default([])|length > 0 %}
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Depuis</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for collab in collaborationsParStatut['validee'] %}
                                        <tr>
                                            <td>
                                                <strong>{{ collab.produit.nom }}</strong>
                                                {% if collab.produit.description %}
                                                <br><small class=\"text-muted\">{{ collab.produit.description|slice(0, 50) }}...</small>
                                                {% endif %}
                                            </td>
                                            <td><strong class=\"text-success\">{{ collab.produit.prix|number_format(2, ',', ' ') }} €</strong></td>
                                            <td><small class=\"text-muted\">{{ collab.createdAt|date('d/m/Y') }}</small></td>
                                            <td>
                                                <form action=\"{{ path('app_admin_collaboration_refuser', {collaborationId: collab.id}) }}\" 
                                                      method=\"post\" style=\"display:inline;\" 
                                                      onsubmit=\"return confirm('Refuser cette collaboration ?');\">
                                                    <button type=\"submit\" class=\"btn btn-danger btn-sm\" title=\"Refuser\">
                                                        <i class=\"fas fa-times\"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        {% else %}
                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-check-circle fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration validée
                            </div>
                        {% endif %}
                    </div>

                    {# TAB: Refusée #}
                    <div class=\"tab-pane fade\" id=\"collab-refusee-pane\" role=\"tabpanel\">
                        {% if collaborationsParStatut['refusee']|default([])|length > 0 %}
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for collab in collaborationsParStatut['refusee'] %}
                                        <tr>
                                            <td>
                                                <strong>{{ collab.produit.nom }}</strong>
                                                {% if collab.produit.description %}
                                                <br><small class=\"text-muted\">{{ collab.produit.description|slice(0, 50) }}...</small>
                                                {% endif %}
                                            </td>
                                            <td><strong class=\"text-danger\">{{ collab.produit.prix|number_format(2, ',', ' ') }} €</strong></td>
                                            <td><small class=\"text-muted\">{{ collab.createdAt|date('d/m/Y') }}</small></td>
                                            <td>
                                                <form action=\"{{ path('app_admin_collaboration_valider', {collaborationId: collab.id}) }}\" 
                                                      method=\"post\" style=\"display:inline;\" 
                                                      onsubmit=\"return confirm('Valider cette collaboration ?');\">
                                                    <button type=\"submit\" class=\"btn btn-success btn-sm\" title=\"Valider\">
                                                        <i class=\"fas fa-check\"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        {% else %}
                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-times-circle fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration refusée
                            </div>
                        {% endif %}
                    </div>

                    {# TAB: Annulée #}
                    <div class=\"tab-pane fade\" id=\"collab-annulea-pane\" role=\"tabpanel\">
                        {% if collaborationsParStatut['annulea']|default([])|length > 0 %}
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover mb-0\">
                                    <thead class=\"table-light\">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for collab in collaborationsParStatut['annulea'] %}
                                        <tr>
                                            <td>
                                                <strong>{{ collab.produit.nom }}</strong>
                                                {% if collab.produit.description %}
                                                <br><small class=\"text-muted\">{{ collab.produit.description|slice(0, 50) }}...</small>
                                                {% endif %}
                                            </td>
                                            <td><strong>{{ collab.produit.prix|number_format(2, ',', ' ') }} €</strong></td>
                                            <td><small class=\"text-muted\">{{ collab.createdAt|date('d/m/Y') }}</small></td>
                                        </tr>
                                        {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        {% else %}
                            <div class=\"text-center text-muted py-3\">
                                <i class=\"fas fa-ban fa-2x mb-2 opacity-50\"></i><br>
                                Aucune collaboration annulée
                            </div>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
        {% endif %}
    </div>

    {# ── Colonne actions ── #}
    <div class=\"col-md-4\">

        {% if partenaire.logo %}
        <div class=\"card mb-3 shadow-sm\">
            <div class=\"card-header bg-secondary text-white\"><h5 class=\"mb-0\">Logo</h5></div>
            <div class=\"card-body text-center\">
                <img src=\"{{ partenaire.logo }}\" class=\"img-fluid rounded\" style=\"max-height:200px;\">
            </div>
        </div>
        {% endif %}

        <div class=\"card shadow-sm\">
            <div class=\"card-header bg-warning\">
                <h5 class=\"mb-0\"><i class=\"fas fa-cog me-2\"></i>Actions</h5>
            </div>
            <div class=\"card-body d-grid gap-2\">
                {% if partenaire.statut == 'en_attente' %}
                    <form action=\"{{ path('app_admin_partenaire_accepter', {id: partenaire.id}) }}\" method=\"post\">
                        <button type=\"submit\" class=\"btn btn-success w-100\"
                                onclick=\"return confirm('Accepter ce partenaire ?')\">
                            <i class=\"fas fa-check me-1\"></i> Accepter
                        </button>
                    </form>
                    <button type=\"button\" class=\"btn btn-danger w-100\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                        <i class=\"fas fa-times me-1\"></i> Refuser
                    </button>
                {% elseif partenaire.statut == 'accepte' %}
                    <div class=\"alert alert-success mb-0 text-center\">
                        <i class=\"fas fa-handshake me-1\"></i><strong>Partenaire actif</strong>
                    </div>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal\">
                        <i class=\"fas fa-ban me-1\"></i> Révoquer
                    </button>
                {% else %}
                    <div class=\"alert alert-danger mb-0 text-center\">
                        <i class=\"fas fa-times-circle me-1\"></i><strong>Partenaire refusé</strong>
                    </div>
                {% endif %}

                <hr>
                <form action=\"{{ path('app_admin_partenaire_supprimer', {id: partenaire.id}) }}\"
                      method=\"post\"
                      onsubmit=\"return confirm('Supprimer définitivement ce partenaire ?')\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm w-100\">
                        <i class=\"fas fa-trash me-1\"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        {# Résumé statistiques plats #}
        <div class=\"card mt-3 shadow-sm\">
            <div class=\"card-header bg-light\"><h6 class=\"mb-0\">📊 Statistiques plats</h6></div>
            <div class=\"card-body p-3\">
                <div class=\"d-flex justify-content-between mb-1\">
                    <span>Total :</span><strong>{{ platStats.total }}</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-success\">Acceptés :</span><strong class=\"text-success\">{{ platStats.accepte }}</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-warning\">En attente :</span><strong class=\"text-warning\">{{ platStats.en_attente }}</strong>
                </div>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"text-danger\">Refusés :</span><strong class=\"text-danger\">{{ platStats.refuse }}</strong>
                </div>
            </div>
        </div>

        {# Résumé statistiques collaborations #}
        {% if collaborationStats.total > 0 %}
        <div class=\"card mt-3 shadow-sm\">
            <div class=\"card-header bg-light\"><h6 class=\"mb-0\">🔗 Statistiques collaborations</h6></div>
            <div class=\"card-body p-3\">
                <div class=\"d-flex justify-content-between mb-1\">
                    <span>Total :</span><strong>{{ collaborationStats.total }}</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-success\">Validée(s) :</span><strong class=\"text-success\">{{ collaborationStats.validee }}</strong>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                    <span class=\"text-danger\">Refusée(s) :</span><strong class=\"text-danger\">{{ collaborationStats.refusee }}</strong>
                </div>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"text-secondary\">Annulée(s) :</span><strong class=\"text-secondary\">{{ collaborationStats.annulee }}</strong>
                </div>
            </div>
        </div>
        {% endif %}
    </div>
</div>

{# ── Modal Refuser ── #}
<div class=\"modal fade\" id=\"refuseModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <form action=\"{{ path('app_admin_partenaire_refuser', {id: partenaire.id}) }}\" method=\"post\">
                <div class=\"modal-header bg-danger text-white\">
                    <h5 class=\"modal-title\">
                        {% if partenaire.statut == 'accepte' %}Révoquer{% else %}Refuser{% endif %}
                        le partenaire
                    </h5>
                    <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
                </div>
                <div class=\"modal-body\">
                    <label for=\"motif\" class=\"form-label\">Motif <small class=\"text-muted\">(optionnel)</small></label>
                    <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\"
                              placeholder=\"Expliquez la raison…\"></textarea>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn btn-danger\">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{% endblock %}", "admin_partenaire/voir.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_partenaire\\voir.html.twig");
    }
}

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

/* admin_formations/inscriptions.html.twig */
class __TwigTemplate_4814434576fd5fdc6a733cfbde0e575b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_formations/inscriptions.html.twig"));

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

        yield "Inscriptions — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        
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
    .page-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        padding: 22px 28px;
        border-radius: 16px;
        color: white;
        margin-bottom: 28px;
    }

    .stat-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        padding: 18px 16px;
        text-align: center;
        border: 1px solid #E8D5B7;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .stat-number {
        font-size: 30px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 4px;
    }

    .filter-bar {
        background: #fff8f0;
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 24px;
        border: 1px solid #E8D5B7;
    }

    /* Badge statuts */
    .badge-en_attente { background: #ffc107; color: #212529; }
    .badge-acceptee   { background: #28a745; color: white; }
    .badge-refusee    { background: #dc3545; color: white; }

    .badge-statut {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    /* Boutons action */
    .btn-accepter {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-accepter:hover { background: #1e7e34; }

    .btn-refuser {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-refuser:hover { background: #c82333; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 94
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 95
        yield "<div class=\"admin-card\">

    ";
        // line 98
        yield "    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">📋 Inscriptions — ";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 99, $this->source); })()), "titre", [], "any", false, false, false, 99), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 100
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_index");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    ";
        // line 106
        yield "    <div class=\"page-header\">
        <h5 class=\"mb-1\"><i class=\"fas fa-info-circle\"></i> ";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 107, $this->source); })()), "titre", [], "any", false, false, false, 107), "html", null, true);
        yield "</h5>
        <span><strong>Prix :</strong> ";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 108, $this->source); })()), "prix", [], "any", false, false, false, 108), 2, ",", " "), "html", null, true);
        yield " €</span>
        &nbsp;&nbsp;
        <span><strong>Statut :</strong>
            ";
        // line 111
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 111, $this->source); })()), "statut", [], "any", false, false, false, 111) == "en_cours")) {
            // line 112
            yield "                <span class=\"badge bg-warning text-dark\">En cours</span>
            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 113
(isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 113, $this->source); })()), "statut", [], "any", false, false, false, 113) == "termine")) {
            // line 114
            yield "                <span class=\"badge bg-success\">Terminé</span>
            ";
        } else {
            // line 116
            yield "                <span class=\"badge bg-secondary\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 116, $this->source); })()), "statut", [], "any", false, false, false, 116), "html", null, true);
            yield "</span>
            ";
        }
        // line 118
        yield "        </span>
    </div>

    ";
        // line 122
        yield "    <div class=\"stat-cards\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["inscriptions"]) || array_key_exists("inscriptions", $context) ? $context["inscriptions"] : (function () { throw new RuntimeError('Variable "inscriptions" does not exist.', 124, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total inscrits</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#e6a817;\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["counts"]) || array_key_exists("counts", $context) ? $context["counts"] : (function () { throw new RuntimeError('Variable "counts" does not exist.', 128, $this->source); })()), "en_attente", [], "any", false, false, false, 128), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#28a745;\">";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["counts"]) || array_key_exists("counts", $context) ? $context["counts"] : (function () { throw new RuntimeError('Variable "counts" does not exist.', 132, $this->source); })()), "acceptee", [], "any", false, false, false, 132), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Acceptées</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#dc3545;\">";
        // line 136
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["counts"]) || array_key_exists("counts", $context) ? $context["counts"] : (function () { throw new RuntimeError('Variable "counts" does not exist.', 136, $this->source); })()), "refusee", [], "any", false, false, false, 136), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Refusées</div>
        </div>
    </div>

    ";
        // line 142
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 142, $this->source); })()), "flashes", ["success"], "method", false, false, false, 142));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 143
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle me-2\"></i> ";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 148, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 148));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 149
            yield "        <div class=\"alert alert-warning alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-triangle me-2\"></i> ";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 154, $this->source); })()), "flashes", ["error"], "method", false, false, false, 154));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 155
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-times-circle me-2\"></i> ";
            // line 156
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        yield "
    ";
        // line 162
        yield "    <div class=\"filter-bar\">
        <form method=\"get\" class=\"row g-2 align-items-center\">
            <div class=\"col-md-5\">
                <input type=\"text\" name=\"search\" class=\"form-control\"
                       placeholder=\"🔍 Rechercher par nom ou email...\"
                       value=\"";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 167, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
            </div>
            <div class=\"col-md-4\">
                <select name=\"statut_filter\" class=\"form-select\" onchange=\"this.form.submit()\">
                    <option value=\"\">📊 Tous les statuts</option>
                    <option value=\"en_attente\" ";
        // line 172
        yield ((((isset($context["statutFilter"]) || array_key_exists("statutFilter", $context) ? $context["statutFilter"] : (function () { throw new RuntimeError('Variable "statutFilter" does not exist.', 172, $this->source); })()) == "en_attente")) ? ("selected") : (""));
        yield ">⏳ En attente</option>
                    <option value=\"acceptee\"   ";
        // line 173
        yield ((((isset($context["statutFilter"]) || array_key_exists("statutFilter", $context) ? $context["statutFilter"] : (function () { throw new RuntimeError('Variable "statutFilter" does not exist.', 173, $this->source); })()) == "acceptee")) ? ("selected") : (""));
        yield ">✅ Acceptées</option>
                    <option value=\"refusee\"    ";
        // line 174
        yield ((((isset($context["statutFilter"]) || array_key_exists("statutFilter", $context) ? $context["statutFilter"] : (function () { throw new RuntimeError('Variable "statutFilter" does not exist.', 174, $this->source); })()) == "refusee")) ? ("selected") : (""));
        yield ">❌ Refusées</option>
                </select>
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-primary w-100\">
                    <i class=\"fas fa-search me-1\"></i> Filtrer
                </button>
            </div>
        </form>
    </div>

    ";
        // line 186
        yield "    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Date d'inscription</th>
                    <th>Statut</th>
                    <th class=\"text-center\">Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 200
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["inscriptions"]) || array_key_exists("inscriptions", $context) ? $context["inscriptions"] : (function () { throw new RuntimeError('Variable "inscriptions" does not exist.', 200, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["inscription"]) {
            // line 201
            yield "                <tr>
                    <td class=\"text-muted small\">";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 202), "html", null, true);
            yield "</td>
                    <td><strong>";
            // line 203
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "utilisateur", [], "any", false, false, false, 203), "nom", [], "any", false, false, false, 203), "html", null, true);
            yield "</strong></td>
                    <td>";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "utilisateur", [], "any", false, false, false, 204), "email", [], "any", false, false, false, 204), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 206
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "utilisateur", [], "any", false, false, false, 206), "role", [], "any", false, false, false, 206) == "admin")) {
                // line 207
                yield "                            <span class=\"badge bg-danger\">Admin</span>
                        ";
            } else {
                // line 209
                yield "                            <span class=\"badge bg-primary\">Utilisateur</span>
                        ";
            }
            // line 211
            yield "                    </td>
                    <td class=\"small text-muted\">";
            // line 212
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "dateInscription", [], "any", false, false, false, 212), "d/m/Y H:i"), "html", null, true);
            yield "</td>
                    <td>
                        <span class=\"badge-statut badge-";
            // line 214
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 214), "html", null, true);
            yield "\">
                            ";
            // line 215
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 215) == "en_attente")) {
                yield "⏳ En attente
                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 216
$context["inscription"], "statut", [], "any", false, false, false, 216) == "acceptee")) {
                yield "✅ Acceptée
                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 217
$context["inscription"], "statut", [], "any", false, false, false, 217) == "refusee")) {
                yield "❌ Refusée
                            ";
            } else {
                // line 218
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 218), "html", null, true);
            }
            // line 219
            yield "                        </span>
                    </td>
                    <td class=\"text-center\">
                        ";
            // line 223
            yield "                        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "statut", [], "any", false, false, false, 223) == "en_attente")) {
                // line 224
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_inscription_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 224)]), "html", null, true);
                yield "\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-accepter\"
                                        onclick=\"return confirm('Accepter cette inscription ?')\">
                                    <i class=\"fas fa-check me-1\"></i> Accepter
                                </button>
                            </form>
                            <form action=\"";
                // line 231
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_inscription_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 231)]), "html", null, true);
                yield "\"
                                  method=\"post\" style=\"display:inline-block; margin-left:6px;\">
                                <button type=\"submit\" class=\"btn-refuser\"
                                        onclick=\"return confirm('Refuser cette inscription ?')\">
                                    <i class=\"fas fa-times me-1\"></i> Refuser
                                </button>
                            </form>
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 238
$context["inscription"], "statut", [], "any", false, false, false, 238) == "acceptee")) {
                // line 239
                yield "                            ";
                // line 240
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_inscription_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 240)]), "html", null, true);
                yield "\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-refuser btn-sm\"
                                        onclick=\"return confirm('Révoquer cette inscription acceptée ?')\">
                                    <i class=\"fas fa-ban me-1\"></i> Révoquer
                                </button>
                            </form>
                        ";
            } else {
                // line 248
                yield "                            ";
                // line 249
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_inscription_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["inscription"], "idInscription", [], "any", false, false, false, 249)]), "html", null, true);
                yield "\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-accepter btn-sm\"
                                        onclick=\"return confirm('Accepter cette inscription refusée ?')\">
                                    <i class=\"fas fa-check me-1\"></i> Accepter
                                </button>
                            </form>
                        ";
            }
            // line 257
            yield "                    </td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 259
        if (!$context['_iterated']) {
            // line 260
            yield "                <tr>
                    <td colspan=\"7\" class=\"text-center py-5 text-muted\">
                        <i class=\"fas fa-users fa-3x d-block mb-3 opacity-25\"></i>
                        <p class=\"mb-0\">Aucune inscription pour cette formation.</p>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['inscription'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 267
        yield "            </tbody>
        </table>
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
        return "admin_formations/inscriptions.html.twig";
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
        return array (  527 => 267,  515 => 260,  513 => 259,  507 => 257,  495 => 249,  493 => 248,  481 => 240,  479 => 239,  477 => 238,  467 => 231,  456 => 224,  453 => 223,  448 => 219,  445 => 218,  440 => 217,  436 => 216,  432 => 215,  428 => 214,  423 => 212,  420 => 211,  416 => 209,  412 => 207,  410 => 206,  405 => 204,  401 => 203,  397 => 202,  394 => 201,  389 => 200,  373 => 186,  359 => 174,  355 => 173,  351 => 172,  343 => 167,  336 => 162,  333 => 160,  323 => 156,  320 => 155,  315 => 154,  305 => 150,  302 => 149,  297 => 148,  287 => 144,  284 => 143,  279 => 142,  271 => 136,  264 => 132,  257 => 128,  250 => 124,  246 => 122,  241 => 118,  235 => 116,  231 => 114,  229 => 113,  226 => 112,  224 => 111,  218 => 108,  214 => 107,  211 => 106,  203 => 100,  199 => 99,  196 => 98,  192 => 95,  182 => 94,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Inscriptions — {{ formation.titre }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        padding: 22px 28px;
        border-radius: 16px;
        color: white;
        margin-bottom: 28px;
    }

    .stat-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        padding: 18px 16px;
        text-align: center;
        border: 1px solid #E8D5B7;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .stat-number {
        font-size: 30px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 4px;
    }

    .filter-bar {
        background: #fff8f0;
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 24px;
        border: 1px solid #E8D5B7;
    }

    /* Badge statuts */
    .badge-en_attente { background: #ffc107; color: #212529; }
    .badge-acceptee   { background: #28a745; color: white; }
    .badge-refusee    { background: #dc3545; color: white; }

    .badge-statut {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    /* Boutons action */
    .btn-accepter {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-accepter:hover { background: #1e7e34; }

    .btn-refuser {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-refuser:hover { background: #c82333; }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">

    {# ── En-tête ── #}
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3 class=\"mb-0\">📋 Inscriptions — {{ formation.titre }}</h3>
        <a href=\"{{ path('app_admin_formations_index') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    {# ── Info formation ── #}
    <div class=\"page-header\">
        <h5 class=\"mb-1\"><i class=\"fas fa-info-circle\"></i> {{ formation.titre }}</h5>
        <span><strong>Prix :</strong> {{ formation.prix|number_format(2,',',' ') }} €</span>
        &nbsp;&nbsp;
        <span><strong>Statut :</strong>
            {% if formation.statut == 'en_cours' %}
                <span class=\"badge bg-warning text-dark\">En cours</span>
            {% elseif formation.statut == 'termine' %}
                <span class=\"badge bg-success\">Terminé</span>
            {% else %}
                <span class=\"badge bg-secondary\">{{ formation.statut }}</span>
            {% endif %}
        </span>
    </div>

    {# ── Statistiques ── #}
    <div class=\"stat-cards\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ inscriptions|length }}</div>
            <div class=\"stat-label\">Total inscrits</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#e6a817;\">{{ counts.en_attente }}</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#28a745;\">{{ counts.acceptee }}</div>
            <div class=\"stat-label\">✅ Acceptées</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color:#dc3545;\">{{ counts.refusee }}</div>
            <div class=\"stat-label\">❌ Refusées</div>
        </div>
    </div>

    {# ── Messages flash ── #}
    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle me-2\"></i> {{ msg }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    {% for msg in app.flashes('warning') %}
        <div class=\"alert alert-warning alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-triangle me-2\"></i> {{ msg }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    {% for msg in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-times-circle me-2\"></i> {{ msg }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {# ── Filtres ── #}
    <div class=\"filter-bar\">
        <form method=\"get\" class=\"row g-2 align-items-center\">
            <div class=\"col-md-5\">
                <input type=\"text\" name=\"search\" class=\"form-control\"
                       placeholder=\"🔍 Rechercher par nom ou email...\"
                       value=\"{{ search|default('') }}\">
            </div>
            <div class=\"col-md-4\">
                <select name=\"statut_filter\" class=\"form-select\" onchange=\"this.form.submit()\">
                    <option value=\"\">📊 Tous les statuts</option>
                    <option value=\"en_attente\" {{ statutFilter == 'en_attente' ? 'selected' : '' }}>⏳ En attente</option>
                    <option value=\"acceptee\"   {{ statutFilter == 'acceptee'   ? 'selected' : '' }}>✅ Acceptées</option>
                    <option value=\"refusee\"    {{ statutFilter == 'refusee'    ? 'selected' : '' }}>❌ Refusées</option>
                </select>
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-primary w-100\">
                    <i class=\"fas fa-search me-1\"></i> Filtrer
                </button>
            </div>
        </form>
    </div>

    {# ── Tableau ── #}
    <div class=\"table-responsive\">
        <table class=\"table table-hover align-middle\">
            <thead class=\"table-dark\">
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Date d'inscription</th>
                    <th>Statut</th>
                    <th class=\"text-center\">Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for inscription in inscriptions %}
                <tr>
                    <td class=\"text-muted small\">{{ inscription.idInscription }}</td>
                    <td><strong>{{ inscription.utilisateur.nom }}</strong></td>
                    <td>{{ inscription.utilisateur.email }}</td>
                    <td>
                        {% if inscription.utilisateur.role == 'admin' %}
                            <span class=\"badge bg-danger\">Admin</span>
                        {% else %}
                            <span class=\"badge bg-primary\">Utilisateur</span>
                        {% endif %}
                    </td>
                    <td class=\"small text-muted\">{{ inscription.dateInscription|date('d/m/Y H:i') }}</td>
                    <td>
                        <span class=\"badge-statut badge-{{ inscription.statut }}\">
                            {% if inscription.statut == 'en_attente' %}⏳ En attente
                            {% elseif inscription.statut == 'acceptee' %}✅ Acceptée
                            {% elseif inscription.statut == 'refusee' %}❌ Refusée
                            {% else %}{{ inscription.statut }}{% endif %}
                        </span>
                    </td>
                    <td class=\"text-center\">
                        {# ✅ Boutons Accepter / Refuser uniquement si en attente #}
                        {% if inscription.statut == 'en_attente' %}
                            <form action=\"{{ path('app_admin_inscription_accepter', {id: inscription.idInscription}) }}\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-accepter\"
                                        onclick=\"return confirm('Accepter cette inscription ?')\">
                                    <i class=\"fas fa-check me-1\"></i> Accepter
                                </button>
                            </form>
                            <form action=\"{{ path('app_admin_inscription_refuser', {id: inscription.idInscription}) }}\"
                                  method=\"post\" style=\"display:inline-block; margin-left:6px;\">
                                <button type=\"submit\" class=\"btn-refuser\"
                                        onclick=\"return confirm('Refuser cette inscription ?')\">
                                    <i class=\"fas fa-times me-1\"></i> Refuser
                                </button>
                            </form>
                        {% elseif inscription.statut == 'acceptee' %}
                            {# Seule action possible : repasser en attente ou refuser #}
                            <form action=\"{{ path('app_admin_inscription_refuser', {id: inscription.idInscription}) }}\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-refuser btn-sm\"
                                        onclick=\"return confirm('Révoquer cette inscription acceptée ?')\">
                                    <i class=\"fas fa-ban me-1\"></i> Révoquer
                                </button>
                            </form>
                        {% else %}
                            {# Refusée → permettre de ré-accepter #}
                            <form action=\"{{ path('app_admin_inscription_accepter', {id: inscription.idInscription}) }}\"
                                  method=\"post\" style=\"display:inline-block;\">
                                <button type=\"submit\" class=\"btn-accepter btn-sm\"
                                        onclick=\"return confirm('Accepter cette inscription refusée ?')\">
                                    <i class=\"fas fa-check me-1\"></i> Accepter
                                </button>
                            </form>
                        {% endif %}
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan=\"7\" class=\"text-center py-5 text-muted\">
                        <i class=\"fas fa-users fa-3x d-block mb-3 opacity-25\"></i>
                        <p class=\"mb-0\">Aucune inscription pour cette formation.</p>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>

</div>
{% endblock %}", "admin_formations/inscriptions.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_formations\\inscriptions.html.twig");
    }
}

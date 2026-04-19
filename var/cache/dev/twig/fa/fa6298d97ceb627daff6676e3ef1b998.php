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

/* admin_partenaire/collaborations.html.twig */
class __TwigTemplate_461b85cf8f20a8f45189ca19a10a4020 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_partenaire/collaborations.html.twig"));

        $this->parent = $this->load("base_admin.html.twig", 1);
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

        yield "Gestion des Collaborations - Admin";
        
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
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 30px 0;
        color: white;
        margin-bottom: 30px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        border-top: 4px solid;
    }

    .stat-card.validee {
        border-top-color: #28a745;
    }

    .stat-card.refusee {
        border-top-color: #dc3545;
    }

    .stat-card.annulee {
        border-top-color: #6c757d;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 8px;
    }

    .filters {
        background: #FFF8F0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }

    .collaboration-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .collaboration-table table {
        width: 100%;
        margin-bottom: 0;
    }

    .collaboration-table th {
        background: linear-gradient(135deg, #f5f5f5 0%, #ececec 100%);
        border-bottom: 2px solid #E8D5B7;
        padding: 15px;
        font-weight: 600;
        color: #333;
    }

    .collaboration-table td {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
    }

    .collaboration-table tbody tr:hover {
        background: #FFF8F0;
    }

    .collaboration-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .collaboration-badge.validee {
        background: #d4edda;
        color: #155724;
    }

    .collaboration-badge.refusee {
        background: #f8d7da;
        color: #721c24;
    }

    .collaboration-badge.annulee {
        background: #e2e3e5;
        color: #383d41;
    }

    .collaboration-image {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        object-fit: cover;
        background: #e9ecef;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 11px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-refuser {
        background: #dc3545;
        color: white;
    }

    .btn-refuser:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    .btn-valider {
        background: #28a745;
        color: white;
    }

    .btn-valider:hover {
        background: #218838;
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 172
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 173
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-link\"></i> Gestion des Collaborations</h1>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 180
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 180, $this->source); })()), "flashes", ["success"], "method", false, false, false, 180));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 181
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 182
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        yield "
    ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 187, $this->source); })()), "flashes", ["error"], "method", false, false, false, 187));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 188
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 189
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        yield "
    ";
        // line 195
        yield "    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 197, $this->source); })()), "total", [], "any", false, false, false, 197), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total</div>
        </div>
        <div class=\"stat-card validee\">
            <div class=\"stat-number\">";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 201, $this->source); })()), "validee", [], "any", false, false, false, 201), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Validée(s)</div>
        </div>
        <div class=\"stat-card refusee\">
            <div class=\"stat-number\">";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 205, $this->source); })()), "refusee", [], "any", false, false, false, 205), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Refusée(s)</div>
        </div>
        <div class=\"stat-card annulee\">
            <div class=\"stat-number\">";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 209, $this->source); })()), "annulee", [], "any", false, false, false, 209), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Annulée(s)</div>
        </div>
    </div>

    ";
        // line 215
        yield "    <div class=\"filters\">
        <form method=\"get\" class=\"row g-3\">
            <div class=\"col-md-4\">
                <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher par partenaire ou produit...\" value=\"";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 218, $this->source); })()), "html", null, true);
        yield "\">
            </div>
            <div class=\"col-md-4\">
                <select name=\"statut\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"validee\" ";
        // line 223
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 223, $this->source); })()) == "validee")) {
            yield "selected";
        }
        yield ">Validée</option>
                    <option value=\"refusee\" ";
        // line 224
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 224, $this->source); })()) == "refusee")) {
            yield "selected";
        }
        yield ">Refusée</option>
                    <option value=\"annulee\" ";
        // line 225
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 225, $this->source); })()) == "annulea")) {
            yield "selected";
        }
        yield ">Annulée</option>
                </select>
            </div>
            <div class=\"col-md-4\">
                <button type=\"submit\" class=\"btn btn-primary w-100\">
                    <i class=\"fas fa-search\"></i> Filtrer
                </button>
                <a href=\"";
        // line 232
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaborations_index");
        yield "\" class=\"btn btn-secondary w-100 mt-2\">
                    <i class=\"fas fa-redo\"></i> Réinitialiser
                </a>
            </div>
        </form>
    </div>

    ";
        // line 240
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["collaborations"]) || array_key_exists("collaborations", $context) ? $context["collaborations"] : (function () { throw new RuntimeError('Variable "collaborations" does not exist.', 240, $this->source); })())) > 0)) {
            // line 241
            yield "        <div class=\"collaboration-table\">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Partenaire</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 255
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["collaborations"]) || array_key_exists("collaborations", $context) ? $context["collaborations"] : (function () { throw new RuntimeError('Variable "collaborations" does not exist.', 255, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["collab"]) {
                // line 256
                yield "                    <tr>
                        <td>
                            ";
                // line 258
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 258), "photo", [], "any", false, false, false, 258)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 259
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 259), "photo", [], "any", false, false, false, 259), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 259), "nom", [], "any", false, false, false, 259), "html", null, true);
                    yield "\" class=\"collaboration-image\">
                            ";
                } else {
                    // line 261
                    yield "                                <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:20px;\">🛍️</div>
                            ";
                }
                // line 263
                yield "                        </td>
                        <td>
                            <strong>";
                // line 265
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "partenaire", [], "any", false, false, false, 265), "nom", [], "any", false, false, false, 265), "html", null, true);
                yield "</strong>
                            <br>
                            <small class=\"text-muted\">";
                // line 267
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "partenaire", [], "any", false, false, false, 267), "type", [], "any", false, false, false, 267), "html", null, true);
                yield "</small>
                        </td>
                        <td>
                            <strong>";
                // line 270
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 270), "nom", [], "any", false, false, false, 270), "html", null, true);
                yield "</strong>
                            <br>
                            <small class=\"text-muted\">";
                // line 272
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 272), "description", [], "any", false, false, false, 272), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 272), "description", [], "any", false, false, false, 272)) > 50)) {
                    yield "…";
                }
                yield "</small>
                        </td>
                        <td>
                            <strong>";
                // line 275
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "produit", [], "any", false, false, false, 275), "prix", [], "any", false, false, false, 275), 2, ",", " "), "html", null, true);
                yield " €</strong>
                        </td>
                        <td>
                            <span class=\"collaboration-badge collaboration-badge-";
                // line 278
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "statut", [], "any", false, false, false, 278), "html", null, true);
                yield "\">
                                ";
                // line 279
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "statut", [], "any", false, false, false, 279) == "validee")) {
                    // line 280
                    yield "                                    <i class=\"fas fa-check\"></i> Validée
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 281
$context["collab"], "statut", [], "any", false, false, false, 281) == "refusee")) {
                    // line 282
                    yield "                                    <i class=\"fas fa-times\"></i> Refusée
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 283
$context["collab"], "statut", [], "any", false, false, false, 283) == "annulee")) {
                    // line 284
                    yield "                                    <i class=\"fas fa-ban\"></i> Annulée
                                ";
                } else {
                    // line 286
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "statut", [], "any", false, false, false, 286), "html", null, true);
                    yield "
                                ";
                }
                // line 288
                yield "                            </span>
                        </td>
                        <td>
                            <small>";
                // line 291
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "createdAt", [], "any", false, false, false, 291), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                        </td>
                        <td>
                            <div class=\"action-buttons\">
                                ";
                // line 295
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "statut", [], "any", false, false, false, 295) == "validee")) {
                    // line 296
                    yield "                                    <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaboration_refuser", ["collaborationId" => CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "id", [], "any", false, false, false, 296)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir refuser cette collaboration ?');\">
                                        <button type=\"submit\" class=\"btn-sm btn-refuser\" title=\"Refuser\">
                                            <i class=\"fas fa-times\"></i>
                                        </button>
                                    </form>
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 301
$context["collab"], "statut", [], "any", false, false, false, 301) == "refusee")) {
                    // line 302
                    yield "                                    <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaboration_valider", ["collaborationId" => CoreExtension::getAttribute($this->env, $this->source, $context["collab"], "id", [], "any", false, false, false, 302)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir valider cette collaboration ?');\">
                                        <button type=\"submit\" class=\"btn-sm btn-valider\" title=\"Valider\">
                                            <i class=\"fas fa-check\"></i>
                                        </button>
                                    </form>
                                ";
                }
                // line 308
                yield "                            </div>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['collab'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 312
            yield "                </tbody>
            </table>
        </div>
    ";
        } else {
            // line 316
            yield "        <div class=\"empty-state\">
            <div class=\"empty-state-icon\">🔗</div>
            <h4>Aucune collaboration trouvée</h4>
            <p>Il n'y a aucune collaboration correspondant à vos critères de recherche.</p>
        </div>
    ";
        }
        // line 322
        yield "</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Les actions sont gérées par les formulaires avec confirmations
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_partenaire/collaborations.html.twig";
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
        return array (  558 => 322,  550 => 316,  544 => 312,  535 => 308,  525 => 302,  523 => 301,  514 => 296,  512 => 295,  505 => 291,  500 => 288,  494 => 286,  490 => 284,  488 => 283,  485 => 282,  483 => 281,  480 => 280,  478 => 279,  474 => 278,  468 => 275,  459 => 272,  454 => 270,  448 => 267,  443 => 265,  439 => 263,  435 => 261,  427 => 259,  425 => 258,  421 => 256,  417 => 255,  401 => 241,  398 => 240,  388 => 232,  376 => 225,  370 => 224,  364 => 223,  356 => 218,  351 => 215,  343 => 209,  336 => 205,  329 => 201,  322 => 197,  318 => 195,  315 => 193,  305 => 189,  302 => 188,  298 => 187,  295 => 186,  285 => 182,  282 => 181,  278 => 180,  269 => 173,  259 => 172,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block title %}Gestion des Collaborations - Admin{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 30px 0;
        color: white;
        margin-bottom: 30px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        border-top: 4px solid;
    }

    .stat-card.validee {
        border-top-color: #28a745;
    }

    .stat-card.refusee {
        border-top-color: #dc3545;
    }

    .stat-card.annulee {
        border-top-color: #6c757d;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }

    .stat-label {
        font-size: 13px;
        color: #666;
        margin-top: 8px;
    }

    .filters {
        background: #FFF8F0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }

    .collaboration-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .collaboration-table table {
        width: 100%;
        margin-bottom: 0;
    }

    .collaboration-table th {
        background: linear-gradient(135deg, #f5f5f5 0%, #ececec 100%);
        border-bottom: 2px solid #E8D5B7;
        padding: 15px;
        font-weight: 600;
        color: #333;
    }

    .collaboration-table td {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
    }

    .collaboration-table tbody tr:hover {
        background: #FFF8F0;
    }

    .collaboration-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .collaboration-badge.validee {
        background: #d4edda;
        color: #155724;
    }

    .collaboration-badge.refusee {
        background: #f8d7da;
        color: #721c24;
    }

    .collaboration-badge.annulee {
        background: #e2e3e5;
        color: #383d41;
    }

    .collaboration-image {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        object-fit: cover;
        background: #e9ecef;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 11px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-refuser {
        background: #dc3545;
        color: white;
    }

    .btn-refuser:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    .btn-valider {
        background: #28a745;
        color: white;
    }

    .btn-valider:hover {
        background: #218838;
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-link\"></i> Gestion des Collaborations</h1>
    </div>
</div>

<div class=\"container mb-5\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}

    {# Statistiques #}
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-number\">{{ stats.total }}</div>
            <div class=\"stat-label\">Total</div>
        </div>
        <div class=\"stat-card validee\">
            <div class=\"stat-number\">{{ stats.validee }}</div>
            <div class=\"stat-label\">Validée(s)</div>
        </div>
        <div class=\"stat-card refusee\">
            <div class=\"stat-number\">{{ stats.refusee }}</div>
            <div class=\"stat-label\">Refusée(s)</div>
        </div>
        <div class=\"stat-card annulee\">
            <div class=\"stat-number\">{{ stats.annulee }}</div>
            <div class=\"stat-label\">Annulée(s)</div>
        </div>
    </div>

    {# Filtres #}
    <div class=\"filters\">
        <form method=\"get\" class=\"row g-3\">
            <div class=\"col-md-4\">
                <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher par partenaire ou produit...\" value=\"{{ search }}\">
            </div>
            <div class=\"col-md-4\">
                <select name=\"statut\" class=\"form-select\">
                    <option value=\"\">Tous les statuts</option>
                    <option value=\"validee\" {% if statutFiltre == 'validee' %}selected{% endif %}>Validée</option>
                    <option value=\"refusee\" {% if statutFiltre == 'refusee' %}selected{% endif %}>Refusée</option>
                    <option value=\"annulee\" {% if statutFiltre == 'annulea' %}selected{% endif %}>Annulée</option>
                </select>
            </div>
            <div class=\"col-md-4\">
                <button type=\"submit\" class=\"btn btn-primary w-100\">
                    <i class=\"fas fa-search\"></i> Filtrer
                </button>
                <a href=\"{{ path('app_admin_collaborations_index') }}\" class=\"btn btn-secondary w-100 mt-2\">
                    <i class=\"fas fa-redo\"></i> Réinitialiser
                </a>
            </div>
        </form>
    </div>

    {# Tableau des collaborations #}
    {% if collaborations|length > 0 %}
        <div class=\"collaboration-table\">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Partenaire</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for collab in collaborations %}
                    <tr>
                        <td>
                            {% if collab.produit.photo %}
                                <img src=\"{{ collab.produit.photo }}\" alt=\"{{ collab.produit.nom }}\" class=\"collaboration-image\">
                            {% else %}
                                <div class=\"collaboration-image\" style=\"display:flex;align-items:center;justify-content:center;font-size:20px;\">🛍️</div>
                            {% endif %}
                        </td>
                        <td>
                            <strong>{{ collab.partenaire.nom }}</strong>
                            <br>
                            <small class=\"text-muted\">{{ collab.partenaire.type }}</small>
                        </td>
                        <td>
                            <strong>{{ collab.produit.nom }}</strong>
                            <br>
                            <small class=\"text-muted\">{{ collab.produit.description|slice(0, 50) }}{% if collab.produit.description|length > 50 %}…{% endif %}</small>
                        </td>
                        <td>
                            <strong>{{ collab.produit.prix|number_format(2, ',', ' ') }} €</strong>
                        </td>
                        <td>
                            <span class=\"collaboration-badge collaboration-badge-{{ collab.statut }}\">
                                {% if collab.statut == 'validee' %}
                                    <i class=\"fas fa-check\"></i> Validée
                                {% elseif collab.statut == 'refusee' %}
                                    <i class=\"fas fa-times\"></i> Refusée
                                {% elseif collab.statut == 'annulee' %}
                                    <i class=\"fas fa-ban\"></i> Annulée
                                {% else %}
                                    {{ collab.statut }}
                                {% endif %}
                            </span>
                        </td>
                        <td>
                            <small>{{ collab.createdAt|date('d/m/Y H:i') }}</small>
                        </td>
                        <td>
                            <div class=\"action-buttons\">
                                {% if collab.statut == 'validee' %}
                                    <form action=\"{{ path('app_admin_collaboration_refuser', {collaborationId: collab.id}) }}\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir refuser cette collaboration ?');\">
                                        <button type=\"submit\" class=\"btn-sm btn-refuser\" title=\"Refuser\">
                                            <i class=\"fas fa-times\"></i>
                                        </button>
                                    </form>
                                {% elseif collab.statut == 'refusee' %}
                                    <form action=\"{{ path('app_admin_collaboration_valider', {collaborationId: collab.id}) }}\" method=\"post\" style=\"display:inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir valider cette collaboration ?');\">
                                        <button type=\"submit\" class=\"btn-sm btn-valider\" title=\"Valider\">
                                            <i class=\"fas fa-check\"></i>
                                        </button>
                                    </form>
                                {% endif %}
                            </div>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    {% else %}
        <div class=\"empty-state\">
            <div class=\"empty-state-icon\">🔗</div>
            <h4>Aucune collaboration trouvée</h4>
            <p>Il n'y a aucune collaboration correspondant à vos critères de recherche.</p>
        </div>
    {% endif %}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Les actions sont gérées par les formulaires avec confirmations
});
</script>
{% endblock %}
", "admin_partenaire/collaborations.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_partenaire\\collaborations.html.twig");
    }
}

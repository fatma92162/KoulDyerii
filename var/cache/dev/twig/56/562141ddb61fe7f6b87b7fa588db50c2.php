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

/* admin_livraisons/livreurs_liste.html.twig */
class __TwigTemplate_2e5b08030b5f8a694dc103c5daae5af6 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_livraisons/livreurs_liste.html.twig"));

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

        yield "Gestion des livreurs";
        
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
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: #8B0000;
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
    }
    
    .filter-bar {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }
    
    .btn-reset {
        background: #E8D5B7;
        border: none;
        color: #8B4513;
        border-radius: 50px;
        padding: 10px 20px;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 69
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 70
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>👨‍💼 Gestion des livreurs</h3>
        <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_new");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter un livreur
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card ";
        // line 80
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 80, $this->source); })()) == "")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('')\">
            <div class=\"stat-number\">";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 81, $this->source); })()), "total", [], "any", false, false, false, 81), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total livreurs</div>
        </div>
        <div class=\"stat-card ";
        // line 84
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 84, $this->source); })()) == "disponible")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('disponible')\">
            <div class=\"stat-number\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 85, $this->source); })()), "disponibles", [], "any", false, false, false, 85), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Disponibles</div>
        </div>
        <div class=\"stat-card ";
        // line 88
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 88, $this->source); })()) == "indisponible")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('indisponible')\">
            <div class=\"stat-number\">";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 89, $this->source); })()), "indisponibles", [], "any", false, false, false, 89), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Indisponibles</div>
        </div>
    </div>

    <!-- Barre de filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par ID, nom, prénom ou téléphone...\" 
                           value=\"";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 103, $this->source); })()), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"disponible\" ";
        // line 108
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 108, $this->source); })()) == "disponible")) {
            yield "selected";
        }
        yield ">✅ Disponibles</option>
                        <option value=\"indisponible\" ";
        // line 109
        if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 109, $this->source); })()) == "indisponible")) {
            yield "selected";
        }
        yield ">❌ Indisponibles</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" ";
        // line 114
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 114, $this->source); })()) == "id_desc")) {
            yield "selected";
        }
        yield ">📅 Plus récents</option>
                        <option value=\"id_asc\" ";
        // line 115
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 115, $this->source); })()) == "id_asc")) {
            yield "selected";
        }
        yield ">📅 Plus anciens</option>
                        <option value=\"nom_asc\" ";
        // line 116
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 116, $this->source); })()) == "nom_asc")) {
            yield "selected";
        }
        yield ">🔤 Nom A→Z</option>
                        <option value=\"nom_desc\" ";
        // line 117
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 117, $this->source); })()) == "nom_desc")) {
            yield "selected";
        }
        yield ">🔤 Nom Z→A</option>
                        <option value=\"prenom_asc\" ";
        // line 118
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 118, $this->source); })()) == "prenom_asc")) {
            yield "selected";
        }
        yield ">👤 Prénom A→Z</option>
                        <option value=\"prenom_desc\" ";
        // line 119
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 119, $this->source); })()) == "prenom_desc")) {
            yield "selected";
        }
        yield ">👤 Prénom Z→A</option>
                        <option value=\"telephone_asc\" ";
        // line 120
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 120, $this->source); })()) == "telephone_asc")) {
            yield "selected";
        }
        yield ">📞 Téléphone croissant</option>
                        <option value=\"telephone_desc\" ";
        // line 121
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 121, $this->source); })()) == "telephone_desc")) {
            yield "selected";
        }
        yield ">📞 Téléphone décroissant</option>
                        <option value=\"status_asc\" ";
        // line 122
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 122, $this->source); })()) == "status_asc")) {
            yield "selected";
        }
        yield ">🟢 Disponibles d'abord</option>
                        <option value=\"status_desc\" ";
        // line 123
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 123, $this->source); })()) == "status_desc")) {
            yield "selected";
        }
        yield ">🔴 Indisponibles d'abord</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 129
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreurs_liste");
        yield "\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 137
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "flashes", ["success"], "method", false, false, false, 137));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 138
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        yield "    
    ";
        // line 144
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 144, $this->source); })()), "flashes", ["error"], "method", false, false, false, 144));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 145
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "
    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 164
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livreurs"]) || array_key_exists("livreurs", $context) ? $context["livreurs"] : (function () { throw new RuntimeError('Variable "livreurs" does not exist.', 164, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["livreur"]) {
            // line 165
            yield "                <tr>
                    <td>";
            // line 166
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 166), "html", null, true);
            yield "</td>
                    <td>";
            // line 167
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "nom", [], "any", false, false, false, 167), "html", null, true);
            yield "</td>
                    <td>";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "prenom", [], "any", false, false, false, 168), "html", null, true);
            yield "</td>
                    <td>";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "telephone", [], "any", false, false, false, 169), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 171
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "disponibilite", [], "any", false, false, false, 171)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 172
                yield "                            <span class=\"badge bg-success\">
                                <i class=\"fas fa-check-circle\"></i> Disponible
                            </span>
                        ";
            } else {
                // line 176
                yield "                            <span class=\"badge bg-warning\">
                                <i class=\"fas fa-truck\"></i> En livraison
                            </span>
                        ";
            }
            // line 180
            yield "                    </td>
                    <td>
                        <a href=\"";
            // line 182
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 182)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                            <i class=\"fas fa-edit\"></i>
                        </a>
                        <form action=\"";
            // line 185
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 185)]), "html", null, true);
            yield "\" method=\"post\" style=\"display: inline-block;\" 
                              onsubmit=\"return confirm('Supprimer définitivement ";
            // line 186
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "prenom", [], "any", false, false, false, 186), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "nom", [], "any", false, false, false, 186), "html", null, true);
            yield " ?')\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\" title=\"Supprimer\">
                                <i class=\"fas fa-trash\"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 193
        if (!$context['_iterated']) {
            // line 194
            yield "                <tr>
                    <td colspan=\"6\" class=\"text-center py-4\">
                        <i class=\"fas fa-users fa-3x text-muted mb-3 d-block\"></i>
                        <p>Aucun livreur trouvé.</p>
                        <a href=\"";
            // line 198
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_new");
            yield "\" class=\"btn btn-primary btn-sm\">
                            <i class=\"fas fa-plus\"></i> Ajouter un livreur
                        </a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livreur'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 204
        yield "            </tbody>
        </table>
    </div>
</div>

<script>
function filterByStatus(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('status', statut);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
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
        return "admin_livraisons/livreurs_liste.html.twig";
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
        return array (  468 => 204,  456 => 198,  450 => 194,  448 => 193,  434 => 186,  430 => 185,  424 => 182,  420 => 180,  414 => 176,  408 => 172,  406 => 171,  401 => 169,  397 => 168,  393 => 167,  389 => 166,  386 => 165,  381 => 164,  365 => 150,  355 => 146,  352 => 145,  348 => 144,  345 => 143,  335 => 139,  332 => 138,  328 => 137,  317 => 129,  306 => 123,  300 => 122,  294 => 121,  288 => 120,  282 => 119,  276 => 118,  270 => 117,  264 => 116,  258 => 115,  252 => 114,  242 => 109,  236 => 108,  228 => 103,  211 => 89,  205 => 88,  199 => 85,  193 => 84,  187 => 81,  181 => 80,  171 => 73,  166 => 70,  156 => 69,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des livreurs{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.1);
    }
    
    .stat-card.active {
        border-color: #8B0000;
        background: #FFF8F0;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
    }
    
    .filter-bar {
        background: #FFF8F0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #E8D5B7;
    }
    
    .btn-reset {
        background: #E8D5B7;
        border: none;
        color: #8B4513;
        border-radius: 50px;
        padding: 10px 20px;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>👨‍💼 Gestion des livreurs</h3>
        <a href=\"{{ path('app_admin_livreur_new') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter un livreur
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card {% if status == '' %}active{% endif %}\" onclick=\"filterByStatus('')\">
            <div class=\"stat-number\">{{ stats.total }}</div>
            <div class=\"stat-label\">Total livreurs</div>
        </div>
        <div class=\"stat-card {% if status == 'disponible' %}active{% endif %}\" onclick=\"filterByStatus('disponible')\">
            <div class=\"stat-number\">{{ stats.disponibles }}</div>
            <div class=\"stat-label\">✅ Disponibles</div>
        </div>
        <div class=\"stat-card {% if status == 'indisponible' %}active{% endif %}\" onclick=\"filterByStatus('indisponible')\">
            <div class=\"stat-number\">{{ stats.indisponibles }}</div>
            <div class=\"stat-label\">❌ Indisponibles</div>
        </div>
    </div>

    <!-- Barre de filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par ID, nom, prénom ou téléphone...\" 
                           value=\"{{ search }}\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"disponible\" {% if status == 'disponible' %}selected{% endif %}>✅ Disponibles</option>
                        <option value=\"indisponible\" {% if status == 'indisponible' %}selected{% endif %}>❌ Indisponibles</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" {% if sort == 'id_desc' %}selected{% endif %}>📅 Plus récents</option>
                        <option value=\"id_asc\" {% if sort == 'id_asc' %}selected{% endif %}>📅 Plus anciens</option>
                        <option value=\"nom_asc\" {% if sort == 'nom_asc' %}selected{% endif %}>🔤 Nom A→Z</option>
                        <option value=\"nom_desc\" {% if sort == 'nom_desc' %}selected{% endif %}>🔤 Nom Z→A</option>
                        <option value=\"prenom_asc\" {% if sort == 'prenom_asc' %}selected{% endif %}>👤 Prénom A→Z</option>
                        <option value=\"prenom_desc\" {% if sort == 'prenom_desc' %}selected{% endif %}>👤 Prénom Z→A</option>
                        <option value=\"telephone_asc\" {% if sort == 'telephone_asc' %}selected{% endif %}>📞 Téléphone croissant</option>
                        <option value=\"telephone_desc\" {% if sort == 'telephone_desc' %}selected{% endif %}>📞 Téléphone décroissant</option>
                        <option value=\"status_asc\" {% if sort == 'status_asc' %}selected{% endif %}>🟢 Disponibles d'abord</option>
                        <option value=\"status_desc\" {% if sort == 'status_desc' %}selected{% endif %}>🔴 Indisponibles d'abord</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"{{ path('app_admin_livreurs_liste') }}\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

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

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for livreur in livreurs %}
                <tr>
                    <td>{{ livreur.idLivreur }}</td>
                    <td>{{ livreur.nom }}</td>
                    <td>{{ livreur.prenom }}</td>
                    <td>{{ livreur.telephone }}</td>
                    <td>
                        {% if livreur.disponibilite %}
                            <span class=\"badge bg-success\">
                                <i class=\"fas fa-check-circle\"></i> Disponible
                            </span>
                        {% else %}
                            <span class=\"badge bg-warning\">
                                <i class=\"fas fa-truck\"></i> En livraison
                            </span>
                        {% endif %}
                    </td>
                    <td>
                        <a href=\"{{ path('app_admin_livreur_edit', {id: livreur.idLivreur}) }}\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                            <i class=\"fas fa-edit\"></i>
                        </a>
                        <form action=\"{{ path('app_admin_livreur_delete', {id: livreur.idLivreur}) }}\" method=\"post\" style=\"display: inline-block;\" 
                              onsubmit=\"return confirm('Supprimer définitivement {{ livreur.prenom }} {{ livreur.nom }} ?')\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\" title=\"Supprimer\">
                                <i class=\"fas fa-trash\"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan=\"6\" class=\"text-center py-4\">
                        <i class=\"fas fa-users fa-3x text-muted mb-3 d-block\"></i>
                        <p>Aucun livreur trouvé.</p>
                        <a href=\"{{ path('app_admin_livreur_new') }}\" class=\"btn btn-primary btn-sm\">
                            <i class=\"fas fa-plus\"></i> Ajouter un livreur
                        </a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<script>
function filterByStatus(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('status', statut);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
</script>
{% endblock %}", "admin_livraisons/livreurs_liste.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_livraisons\\livreurs_liste.html.twig");
    }
}

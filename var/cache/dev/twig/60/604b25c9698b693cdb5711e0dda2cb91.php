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

/* admin_formations/index.html.twig */
class __TwigTemplate_373b7a75cc64c6e0baa04fb0cb7c015c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_formations/index.html.twig"));

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

        yield "Gestion des formations";
        
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
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .formation-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .formation-card:hover {
        transform: translateY(-5px);
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 15px 20px;
    }
    
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-termine {
        background: #4CAF50;
        color: white;
    }
    
    .status-annule {
        background: #9E9E9E;
        color: white;
    }
    
    .formation-price {
        font-size: 24px;
        font-weight: 700;
        color: #8B0000;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-inscrits {
        background: #17a2b8;
        color: white;
        border: none;
    }
    
    .btn-inscrits:hover {
        background: #138496;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 149
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 150
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📚 Gestion des formations</h3>
        <a href=\"";
        // line 153
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_new");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter une formation
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card ";
        // line 160
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 160, $this->source); })()) == "")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 161)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 161, $this->source); })()), "total", [], "any", false, false, false, 161), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total formations</div>
        </div>
        <div class=\"stat-card ";
        // line 164
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 164, $this->source); })()) == "en_cours")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('en_cours')\">
            <div class=\"stat-number\">";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "en_cours", [], "any", true, true, false, 165)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 165, $this->source); })()), "en_cours", [], "any", false, false, false, 165), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">🟢 En cours</div>
        </div>
        <div class=\"stat-card ";
        // line 168
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 168, $this->source); })()) == "termine")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('termine')\">
            <div class=\"stat-number\">";
        // line 169
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "termine", [], "any", true, true, false, 169)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 169, $this->source); })()), "termine", [], "any", false, false, false, 169), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Terminées</div>
        </div>
        <div class=\"stat-card ";
        // line 172
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 172, $this->source); })()) == "annule")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('annule')\">
            <div class=\"stat-number\">";
        // line 173
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "annule", [], "any", true, true, false, 173)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 173, $this->source); })()), "annule", [], "any", false, false, false, 173), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Annulées</div>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par titre ou description...\" 
                           value=\"";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 187, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"statut\" value=\"";
        // line 188
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statutFiltre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 188, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"statut_filter\" class=\"form-select\" onchange=\"changeStatut(this.value)\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_cours\" ";
        // line 193
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 193, $this->source); })()) == "en_cours")) {
            yield "selected";
        }
        yield ">🟢 En cours</option>
                        <option value=\"termine\" ";
        // line 194
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 194, $this->source); })()) == "termine")) {
            yield "selected";
        }
        yield ">✅ Terminées</option>
                        <option value=\"annule\" ";
        // line 195
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 195, $this->source); })()) == "annule")) {
            yield "selected";
        }
        yield ">❌ Annulées</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" ";
        // line 200
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 200, $this->source); })()) == "id_desc")) {
            yield "selected";
        }
        yield ">📅 Plus récentes</option>
                        <option value=\"id_asc\" ";
        // line 201
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 201, $this->source); })()) == "id_asc")) {
            yield "selected";
        }
        yield ">📅 Plus anciennes</option>
                        <option value=\"titre_asc\" ";
        // line 202
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 202, $this->source); })()) == "titre_asc")) {
            yield "selected";
        }
        yield ">🔤 Titre A→Z</option>
                        <option value=\"titre_desc\" ";
        // line 203
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 203, $this->source); })()) == "titre_desc")) {
            yield "selected";
        }
        yield ">🔤 Titre Z→A</option>
                        <option value=\"prix_asc\" ";
        // line 204
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 204, $this->source); })()) == "prix_asc")) {
            yield "selected";
        }
        yield ">💰 Prix croissant</option>
                        <option value=\"prix_desc\" ";
        // line 205
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 205, $this->source); })()) == "prix_desc")) {
            yield "selected";
        }
        yield ">💰 Prix décroissant</option>
                        <option value=\"statut_asc\" ";
        // line 206
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 206, $this->source); })()) == "statut_asc")) {
            yield "selected";
        }
        yield ">📊 Statut A→Z</option>
                        <option value=\"statut_desc\" ";
        // line 207
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 207, $this->source); })()) == "statut_desc")) {
            yield "selected";
        }
        yield ">📊 Statut Z→A</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 213
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_index");
        yield "\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 221
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 221, $this->source); })()), "flashes", ["success"], "method", false, false, false, 221));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 222
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 224
        yield "
    ";
        // line 225
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["formations"]) || array_key_exists("formations", $context) ? $context["formations"] : (function () { throw new RuntimeError('Variable "formations" does not exist.', 225, $this->source); })())) > 0)) {
            // line 226
            yield "        <div class=\"row\">
            ";
            // line 227
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["formations"]) || array_key_exists("formations", $context) ? $context["formations"] : (function () { throw new RuntimeError('Variable "formations" does not exist.', 227, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
                // line 228
                yield "            <div class=\"col-md-4\">
                <div class=\"formation-card\">
                    <div class=\"formation-header\">
                        <h5 class=\"mb-2\">";
                // line 231
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "titre", [], "any", false, false, false, 231), "html", null, true);
                yield "</h5>
                        <span class=\"status-badge status-";
                // line 232
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "statut", [], "any", false, false, false, 232), "html", null, true);
                yield "\">
                            ";
                // line 233
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "statut", [], "any", false, false, false, 233) == "en_cours")) {
                    // line 234
                    yield "                                🟢 En cours
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 235
$context["formation"], "statut", [], "any", false, false, false, 235) == "termine")) {
                    // line 236
                    yield "                                ✅ Terminé
                            ";
                } else {
                    // line 238
                    yield "                                ❌ Annulé
                            ";
                }
                // line 240
                yield "                        </span>
                    </div>
                    <div class=\"p-3\">
                        <p class=\"text-muted small\">";
                // line 243
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "description", [], "any", false, false, false, 243), 0, 100), "html", null, true);
                yield "...</p>
                        <div class=\"formation-price\">";
                // line 244
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "prix", [], "any", false, false, false, 244), 2, ",", " "), "html", null, true);
                yield " €</div>
                        <div class=\"mt-3 text-muted small\">
                            <i class=\"fas fa-user\"></i> Créé par: Admin #";
                // line 246
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idVendeuse", [], "any", false, false, false, 246), "html", null, true);
                yield "
                        </div>
                    </div>
                    <div class=\"card-footer bg-white p-3\">
                        <div class=\"btn-action-group\">
                            <a href=\"";
                // line 251
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 251)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-warning\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            <a href=\"";
                // line 254
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_inscriptions", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 254)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-inscrits\">
                                <i class=\"fas fa-users\"></i> Inscrits
                            </a>
                            <form action=\"";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_generate_quiz_ai", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 257)]), "html", null, true);
                yield "\" method=\"post\" style=\"display: inline-block;\">
                                <input type=\"hidden\" name=\"duration\" value=\"";
                // line 258
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "quiz", [], "any", false, false, false, 258)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "quiz", [], "any", false, false, false, 258), "duration", [], "any", false, false, false, 258), "html", null, true)) : (240));
                yield "\">
                                <button type=\"submit\" class=\"btn btn-sm btn-primary\">
                                    <i class=\"fas fa-robot\"></i> Generate Quiz with AI
                                </button>
                            </form>
                            <form action=\"";
                // line 263
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_quiz_duration", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 263)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-flex gap-1\">
                                <input type=\"number\" min=\"30\" step=\"30\" name=\"duration\" value=\"";
                // line 264
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "quiz", [], "any", false, false, false, 264)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "quiz", [], "any", false, false, false, 264), "duration", [], "any", false, false, false, 264), "html", null, true)) : (240));
                yield "\" class=\"form-control form-control-sm\" style=\"width: 110px;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-secondary\">Timer</button>
                            </form>
                            <form action=\"";
                // line 267
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 267)]), "html", null, true);
                yield "\" method=\"post\" style=\"display: inline-block;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer cette formation ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['formation'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 277
            yield "        </div>
    ";
        } else {
            // line 279
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-graduation-cap\"></i>
            <h4>Aucune formation trouvée</h4>
            <p class=\"text-muted\">Aucune formation ne correspond à vos critères.</p>
            <a href=\"";
            // line 283
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_new");
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter une formation
            </a>
        </div>
    ";
        }
        // line 288
        yield "</div>

<script>
function filterByStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}

function changeStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
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
        return "admin_formations/index.html.twig";
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
        return array (  561 => 288,  553 => 283,  547 => 279,  543 => 277,  527 => 267,  521 => 264,  517 => 263,  509 => 258,  505 => 257,  499 => 254,  493 => 251,  485 => 246,  480 => 244,  476 => 243,  471 => 240,  467 => 238,  463 => 236,  461 => 235,  458 => 234,  456 => 233,  452 => 232,  448 => 231,  443 => 228,  439 => 227,  436 => 226,  434 => 225,  431 => 224,  422 => 222,  418 => 221,  407 => 213,  396 => 207,  390 => 206,  384 => 205,  378 => 204,  372 => 203,  366 => 202,  360 => 201,  354 => 200,  344 => 195,  338 => 194,  332 => 193,  324 => 188,  320 => 187,  303 => 173,  297 => 172,  291 => 169,  285 => 168,  279 => 165,  273 => 164,  267 => 161,  261 => 160,  251 => 153,  246 => 150,  236 => 149,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des formations{% endblock %}

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
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .formation-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .formation-card:hover {
        transform: translateY(-5px);
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 15px 20px;
    }
    
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-termine {
        background: #4CAF50;
        color: white;
    }
    
    .status-annule {
        background: #9E9E9E;
        color: white;
    }
    
    .formation-price {
        font-size: 24px;
        font-weight: 700;
        color: #8B0000;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-inscrits {
        background: #17a2b8;
        color: white;
        border: none;
    }
    
    .btn-inscrits:hover {
        background: #138496;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📚 Gestion des formations</h3>
        <a href=\"{{ path('app_admin_formations_new') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Ajouter une formation
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card {% if statutFiltre == '' %}active{% endif %}\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">{{ stats.total|default(0) }}</div>
            <div class=\"stat-label\">Total formations</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'en_cours' %}active{% endif %}\" onclick=\"filterByStatut('en_cours')\">
            <div class=\"stat-number\">{{ stats.en_cours|default(0) }}</div>
            <div class=\"stat-label\">🟢 En cours</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'termine' %}active{% endif %}\" onclick=\"filterByStatut('termine')\">
            <div class=\"stat-number\">{{ stats.termine|default(0) }}</div>
            <div class=\"stat-label\">✅ Terminées</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'annule' %}active{% endif %}\" onclick=\"filterByStatut('annule')\">
            <div class=\"stat-number\">{{ stats.annule|default(0) }}</div>
            <div class=\"stat-label\">❌ Annulées</div>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par titre ou description...\" 
                           value=\"{{ search|default('') }}\">
                    <input type=\"hidden\" name=\"statut\" value=\"{{ statutFiltre|default('') }}\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"statut_filter\" class=\"form-select\" onchange=\"changeStatut(this.value)\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_cours\" {% if statutFiltre == 'en_cours' %}selected{% endif %}>🟢 En cours</option>
                        <option value=\"termine\" {% if statutFiltre == 'termine' %}selected{% endif %}>✅ Terminées</option>
                        <option value=\"annule\" {% if statutFiltre == 'annule' %}selected{% endif %}>❌ Annulées</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" {% if sort == 'id_desc' %}selected{% endif %}>📅 Plus récentes</option>
                        <option value=\"id_asc\" {% if sort == 'id_asc' %}selected{% endif %}>📅 Plus anciennes</option>
                        <option value=\"titre_asc\" {% if sort == 'titre_asc' %}selected{% endif %}>🔤 Titre A→Z</option>
                        <option value=\"titre_desc\" {% if sort == 'titre_desc' %}selected{% endif %}>🔤 Titre Z→A</option>
                        <option value=\"prix_asc\" {% if sort == 'prix_asc' %}selected{% endif %}>💰 Prix croissant</option>
                        <option value=\"prix_desc\" {% if sort == 'prix_desc' %}selected{% endif %}>💰 Prix décroissant</option>
                        <option value=\"statut_asc\" {% if sort == 'statut_asc' %}selected{% endif %}>📊 Statut A→Z</option>
                        <option value=\"statut_desc\" {% if sort == 'statut_desc' %}selected{% endif %}>📊 Statut Z→A</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"{{ path('app_admin_formations_index') }}\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}

    {% if formations|length > 0 %}
        <div class=\"row\">
            {% for formation in formations %}
            <div class=\"col-md-4\">
                <div class=\"formation-card\">
                    <div class=\"formation-header\">
                        <h5 class=\"mb-2\">{{ formation.titre }}</h5>
                        <span class=\"status-badge status-{{ formation.statut }}\">
                            {% if formation.statut == 'en_cours' %}
                                🟢 En cours
                            {% elseif formation.statut == 'termine' %}
                                ✅ Terminé
                            {% else %}
                                ❌ Annulé
                            {% endif %}
                        </span>
                    </div>
                    <div class=\"p-3\">
                        <p class=\"text-muted small\">{{ formation.description|slice(0, 100) }}...</p>
                        <div class=\"formation-price\">{{ formation.prix|number_format(2, ',', ' ') }} €</div>
                        <div class=\"mt-3 text-muted small\">
                            <i class=\"fas fa-user\"></i> Créé par: Admin #{{ formation.idVendeuse }}
                        </div>
                    </div>
                    <div class=\"card-footer bg-white p-3\">
                        <div class=\"btn-action-group\">
                            <a href=\"{{ path('app_admin_formations_edit', {id: formation.idFormation}) }}\" class=\"btn btn-sm btn-warning\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            <a href=\"{{ path('app_admin_formations_inscriptions', {id: formation.idFormation}) }}\" class=\"btn btn-sm btn-inscrits\">
                                <i class=\"fas fa-users\"></i> Inscrits
                            </a>
                            <form action=\"{{ path('app_admin_formations_generate_quiz_ai', {id: formation.idFormation}) }}\" method=\"post\" style=\"display: inline-block;\">
                                <input type=\"hidden\" name=\"duration\" value=\"{{ formation.quiz ? formation.quiz.duration : 240 }}\">
                                <button type=\"submit\" class=\"btn btn-sm btn-primary\">
                                    <i class=\"fas fa-robot\"></i> Generate Quiz with AI
                                </button>
                            </form>
                            <form action=\"{{ path('app_admin_formations_quiz_duration', {id: formation.idFormation}) }}\" method=\"post\" class=\"d-flex gap-1\">
                                <input type=\"number\" min=\"30\" step=\"30\" name=\"duration\" value=\"{{ formation.quiz ? formation.quiz.duration : 240 }}\" class=\"form-control form-control-sm\" style=\"width: 110px;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-secondary\">Timer</button>
                            </form>
                            <form action=\"{{ path('app_admin_formations_delete', {id: formation.idFormation}) }}\" method=\"post\" style=\"display: inline-block;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer cette formation ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-graduation-cap\"></i>
            <h4>Aucune formation trouvée</h4>
            <p class=\"text-muted\">Aucune formation ne correspond à vos critères.</p>
            <a href=\"{{ path('app_admin_formations_new') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter une formation
            </a>
        </div>
    {% endif %}
</div>

<script>
function filterByStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}

function changeStatut(statut) {
    const url = new URL(window.location.href);
    if (statut) {
        url.searchParams.set('statut', statut);
    } else {
        url.searchParams.delete('statut');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}
</script>
{% endblock %}", "admin_formations/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_formations\\index.html.twig");
    }
}

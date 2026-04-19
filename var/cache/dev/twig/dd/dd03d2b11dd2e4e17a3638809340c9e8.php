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

/* admin_partenaire/index.html.twig */
class __TwigTemplate_e6889fd3d8c169dc90610014b2fdd616 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_partenaire/index.html.twig"));

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

        yield "Gestion des partenaires";
        
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
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
    
    .partenaire-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .partenaire-card:hover {
        transform: translateY(-5px);
    }
    
    .partenaire-header {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f0e6d6;
        background: #fafafa;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
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

    // line 134
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 135
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>🤝 Gestion des partenaires</h3>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card ";
        // line 142
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 142, $this->source); })()) == "")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 143)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 143, $this->source); })()), "total", [], "any", false, false, false, 143), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total partenaires</div>
        </div>
        <div class=\"stat-card ";
        // line 146
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 146, $this->source); })()) == "en_attente")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('en_attente')\">
            <div class=\"stat-number\">";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "en_attente", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 147, $this->source); })()), "en_attente", [], "any", false, false, false, 147), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card ";
        // line 150
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 150, $this->source); })()) == "accepte")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('accepte')\">
            <div class=\"stat-number\">";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "accepte", [], "any", true, true, false, 151)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 151, $this->source); })()), "accepte", [], "any", false, false, false, 151), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Acceptés</div>
        </div>
        <div class=\"stat-card ";
        // line 154
        if (((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 154, $this->source); })()) == "refuse")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatut('refuse')\">
            <div class=\"stat-number\">";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "refuse", [], "any", true, true, false, 155)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 155, $this->source); })()), "refuse", [], "any", false, false, false, 155), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Refusés</div>
        </div>
    </div>

    <!-- Barre de recherche -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-10\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par nom, type ou téléphone...\" 
                           value=\"";
        // line 169
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 169, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"statut\" value=\"";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statutFiltre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 170, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-2\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">
                        <i class=\"fas fa-search\"></i> Rechercher
                    </button>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaires_index");
        yield "\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser
                    </a>
                    <a href=\"";
        // line 183
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_collaborations_index");
        yield "\" class=\"btn btn-primary\" style=\"margin-left: 10px;\">
                        <i class=\"fas fa-link\"></i> Voir les collaborations
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 191
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 191, $this->source); })()), "flashes", ["success"], "method", false, false, false, 191));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 192
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 194
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 194, $this->source); })()), "flashes", ["info"], "method", false, false, false, 194));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 195
            yield "        <div class=\"alert alert-info\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 197
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 197, $this->source); })()), "flashes", ["error"], "method", false, false, false, 197));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 198
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        yield "
    ";
        // line 201
        if ((array_key_exists("partenaires", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["partenaires"]) || array_key_exists("partenaires", $context) ? $context["partenaires"] : (function () { throw new RuntimeError('Variable "partenaires" does not exist.', 201, $this->source); })())) > 0))) {
            // line 202
            yield "        <div class=\"row\">
            ";
            // line 203
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["partenaires"]) || array_key_exists("partenaires", $context) ? $context["partenaires"] : (function () { throw new RuntimeError('Variable "partenaires" does not exist.', 203, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["partenaire"]) {
                // line 204
                yield "            <div class=\"col-md-6\">
                <div class=\"partenaire-card\">
                    <div class=\"partenaire-header\">
                        <div>
                            <h5 class=\"mb-0\">";
                // line 208
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "nom", [], "any", false, false, false, 208), "html", null, true);
                yield "</h5>
                            <small class=\"text-muted\">";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "type", [], "any", false, false, false, 209), "html", null, true);
                yield "</small>
                        </div>
                        <span class=\"status-badge status-";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "statut", [], "any", false, false, false, 211), "html", null, true);
                yield "\">
                            ";
                // line 212
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "statut", [], "any", false, false, false, 212) == "en_attente")) {
                    // line 213
                    yield "                                ⏳ En attente
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 214
$context["partenaire"], "statut", [], "any", false, false, false, 214) == "accepte")) {
                    // line 215
                    yield "                                ✅ Accepté
                            ";
                } else {
                    // line 217
                    yield "                                ❌ Refusé
                            ";
                }
                // line 219
                yield "                        </span>
                    </div>
                    <div class=\"p-3\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <p><strong>📞 Téléphone:</strong> ";
                // line 224
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "telephone", [], "any", false, false, false, 224), "html", null, true);
                yield "</p>
                                <p><strong>📍 Adresse:</strong> ";
                // line 225
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "adresse", [], "any", false, false, false, 225), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "adresse", [], "any", false, false, false, 225)) > 50)) {
                    yield "...";
                }
                yield "</p>
                                <p><strong>📅 Date demande:</strong> ";
                // line 226
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "dateDemande", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "dateDemande", [], "any", false, false, false, 226), "d/m/Y"), "html", null, true)) : ("-"));
                yield "</p>
                            </div>
                            <div class=\"col-md-6\">
                                ";
                // line 229
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "logo", [], "any", false, false, false, 229)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 230
                    yield "                                    <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "logo", [], "any", false, false, false, 230), "html", null, true);
                    yield "\" class=\"img-fluid rounded\" style=\"max-height: 80px;\">
                                ";
                }
                // line 232
                yield "                            </div>
                        </div>
                        ";
                // line 234
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "description", [], "any", false, false, false, 234)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 235
                    yield "                            <p><strong>📝 Description:</strong> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "description", [], "any", false, false, false, 235), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "description", [], "any", false, false, false, 235)) > 100)) {
                        yield "...";
                    }
                    yield "</p>
                        ";
                }
                // line 237
                yield "                    </div>
                    <div class=\"card-footer bg-white p-3\">
                        <div class=\"btn-action-group\">
                            <a href=\"";
                // line 240
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_voir", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 240)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-info\">
                                <i class=\"fas fa-eye\"></i> Voir détails
                            </a>
                            ";
                // line 243
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "statut", [], "any", false, false, false, 243) == "en_attente")) {
                    // line 244
                    yield "                                <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_accepter", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 244)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"statut\" value=\"";
                    // line 245
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statutFiltre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 245, $this->source); })()), "")) : ("")), "html", null, true);
                    yield "\">
                                    <input type=\"hidden\" name=\"search\" value=\"";
                    // line 246
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 246, $this->source); })()), "")) : ("")), "html", null, true);
                    yield "\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\" onclick=\"return confirm('Accepter ce partenaire ?')\">
                                        <i class=\"fas fa-check\"></i> Accepter
                                    </button>
                                </form>
                                <button type=\"button\" class=\"btn btn-sm btn-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal";
                    // line 251
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 251), "html", null, true);
                    yield "\">
                                    <i class=\"fas fa-times\"></i> Refuser
                                </button>
                            ";
                }
                // line 255
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_supprimer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 255)]), "html", null, true);
                yield "\" method=\"post\" style=\"display: inline-block;\">
                                <input type=\"hidden\" name=\"statut\" value=\"";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statutFiltre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 256, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                                <input type=\"hidden\" name=\"search\" value=\"";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 257, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer ce partenaire ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Refuser -->
            <div class=\"modal fade\" id=\"refuseModal";
                // line 268
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 268), "html", null, true);
                yield "\" tabindex=\"-1\">
                <div class=\"modal-dialog\">
                    <div class=\"modal-content\">
                        <form action=\"";
                // line 271
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaire_refuser", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["partenaire"], "id", [], "any", false, false, false, 271)]), "html", null, true);
                yield "\" method=\"post\">
                            <input type=\"hidden\" name=\"statut\" value=\"";
                // line 272
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("statutFiltre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["statutFiltre"]) || array_key_exists("statutFiltre", $context) ? $context["statutFiltre"] : (function () { throw new RuntimeError('Variable "statutFiltre" does not exist.', 272, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                            <input type=\"hidden\" name=\"search\" value=\"";
                // line 273
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 273, $this->source); })()), "")) : ("")), "html", null, true);
                yield "\">
                            <div class=\"modal-header bg-danger text-white\">
                                <h5 class=\"modal-title\">Refuser le partenaire</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <label for=\"motif\" class=\"form-label\">Motif du refus (optionnel)</label>
                                <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\" placeholder=\"Expliquez la raison du refus...\"></textarea>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                                <button type=\"submit\" class=\"btn btn-danger\">Confirmer le refus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['partenaire'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 291
            yield "        </div>
    ";
        } else {
            // line 293
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-handshake\"></i>
            <h4>Aucun partenaire trouvé</h4>
            <p class=\"text-muted\">Aucun partenaire ne correspond à vos critères.</p>
        </div>
    ";
        }
        // line 299
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
        return "admin_partenaire/index.html.twig";
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
        return array (  577 => 299,  569 => 293,  565 => 291,  541 => 273,  537 => 272,  533 => 271,  527 => 268,  513 => 257,  509 => 256,  504 => 255,  497 => 251,  489 => 246,  485 => 245,  480 => 244,  478 => 243,  472 => 240,  467 => 237,  458 => 235,  456 => 234,  452 => 232,  446 => 230,  444 => 229,  438 => 226,  431 => 225,  427 => 224,  420 => 219,  416 => 217,  412 => 215,  410 => 214,  407 => 213,  405 => 212,  401 => 211,  396 => 209,  392 => 208,  386 => 204,  382 => 203,  379 => 202,  377 => 201,  374 => 200,  365 => 198,  360 => 197,  351 => 195,  346 => 194,  337 => 192,  333 => 191,  322 => 183,  316 => 180,  303 => 170,  299 => 169,  282 => 155,  276 => 154,  270 => 151,  264 => 150,  258 => 147,  252 => 146,  246 => 143,  240 => 142,  231 => 135,  221 => 134,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des partenaires{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
    
    .partenaire-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .partenaire-card:hover {
        transform: translateY(-5px);
    }
    
    .partenaire-header {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f0e6d6;
        background: #fafafa;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
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
        <h3>🤝 Gestion des partenaires</h3>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card {% if statutFiltre == '' %}active{% endif %}\" onclick=\"filterByStatut('')\">
            <div class=\"stat-number\">{{ stats.total|default(0) }}</div>
            <div class=\"stat-label\">Total partenaires</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'en_attente' %}active{% endif %}\" onclick=\"filterByStatut('en_attente')\">
            <div class=\"stat-number\">{{ stats.en_attente|default(0) }}</div>
            <div class=\"stat-label\">⏳ En attente</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'accepte' %}active{% endif %}\" onclick=\"filterByStatut('accepte')\">
            <div class=\"stat-number\">{{ stats.accepte|default(0) }}</div>
            <div class=\"stat-label\">✅ Acceptés</div>
        </div>
        <div class=\"stat-card {% if statutFiltre == 'refuse' %}active{% endif %}\" onclick=\"filterByStatut('refuse')\">
            <div class=\"stat-number\">{{ stats.refuse|default(0) }}</div>
            <div class=\"stat-label\">❌ Refusés</div>
        </div>
    </div>

    <!-- Barre de recherche -->
    <div class=\"filter-bar\">
        <form method=\"get\" id=\"filterForm\">
            <div class=\"row g-3\">
                <div class=\"col-md-10\">
                    <input type=\"text\" 
                           name=\"search\" 
                           class=\"form-control\" 
                           placeholder=\"🔍 Rechercher par nom, type ou téléphone...\" 
                           value=\"{{ search|default('') }}\">
                    <input type=\"hidden\" name=\"statut\" value=\"{{ statutFiltre|default('') }}\">
                </div>
                <div class=\"col-md-2\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">
                        <i class=\"fas fa-search\"></i> Rechercher
                    </button>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"{{ path('app_admin_partenaires_index') }}\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser
                    </a>
                    <a href=\"{{ path('app_admin_collaborations_index') }}\" class=\"btn btn-primary\" style=\"margin-left: 10px;\">
                        <i class=\"fas fa-link\"></i> Voir les collaborations
                    </a>
                </div>
            </div>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('info') %}
        <div class=\"alert alert-info\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    {% if partenaires is defined and partenaires|length > 0 %}
        <div class=\"row\">
            {% for partenaire in partenaires %}
            <div class=\"col-md-6\">
                <div class=\"partenaire-card\">
                    <div class=\"partenaire-header\">
                        <div>
                            <h5 class=\"mb-0\">{{ partenaire.nom }}</h5>
                            <small class=\"text-muted\">{{ partenaire.type }}</small>
                        </div>
                        <span class=\"status-badge status-{{ partenaire.statut }}\">
                            {% if partenaire.statut == 'en_attente' %}
                                ⏳ En attente
                            {% elseif partenaire.statut == 'accepte' %}
                                ✅ Accepté
                            {% else %}
                                ❌ Refusé
                            {% endif %}
                        </span>
                    </div>
                    <div class=\"p-3\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <p><strong>📞 Téléphone:</strong> {{ partenaire.telephone }}</p>
                                <p><strong>📍 Adresse:</strong> {{ partenaire.adresse|slice(0, 50) }}{% if partenaire.adresse|length > 50 %}...{% endif %}</p>
                                <p><strong>📅 Date demande:</strong> {{ partenaire.dateDemande ? partenaire.dateDemande|date('d/m/Y') : '-' }}</p>
                            </div>
                            <div class=\"col-md-6\">
                                {% if partenaire.logo %}
                                    <img src=\"{{ partenaire.logo }}\" class=\"img-fluid rounded\" style=\"max-height: 80px;\">
                                {% endif %}
                            </div>
                        </div>
                        {% if partenaire.description %}
                            <p><strong>📝 Description:</strong> {{ partenaire.description|slice(0, 100) }}{% if partenaire.description|length > 100 %}...{% endif %}</p>
                        {% endif %}
                    </div>
                    <div class=\"card-footer bg-white p-3\">
                        <div class=\"btn-action-group\">
                            <a href=\"{{ path('app_admin_partenaire_voir', {id: partenaire.id}) }}\" class=\"btn btn-sm btn-info\">
                                <i class=\"fas fa-eye\"></i> Voir détails
                            </a>
                            {% if partenaire.statut == 'en_attente' %}
                                <form action=\"{{ path('app_admin_partenaire_accepter', {id: partenaire.id}) }}\" method=\"post\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"statut\" value=\"{{ statutFiltre|default('') }}\">
                                    <input type=\"hidden\" name=\"search\" value=\"{{ search|default('') }}\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\" onclick=\"return confirm('Accepter ce partenaire ?')\">
                                        <i class=\"fas fa-check\"></i> Accepter
                                    </button>
                                </form>
                                <button type=\"button\" class=\"btn btn-sm btn-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#refuseModal{{ partenaire.id }}\">
                                    <i class=\"fas fa-times\"></i> Refuser
                                </button>
                            {% endif %}
                            <form action=\"{{ path('app_admin_partenaire_supprimer', {id: partenaire.id}) }}\" method=\"post\" style=\"display: inline-block;\">
                                <input type=\"hidden\" name=\"statut\" value=\"{{ statutFiltre|default('') }}\">
                                <input type=\"hidden\" name=\"search\" value=\"{{ search|default('') }}\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer ce partenaire ?')\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Refuser -->
            <div class=\"modal fade\" id=\"refuseModal{{ partenaire.id }}\" tabindex=\"-1\">
                <div class=\"modal-dialog\">
                    <div class=\"modal-content\">
                        <form action=\"{{ path('app_admin_partenaire_refuser', {id: partenaire.id}) }}\" method=\"post\">
                            <input type=\"hidden\" name=\"statut\" value=\"{{ statutFiltre|default('') }}\">
                            <input type=\"hidden\" name=\"search\" value=\"{{ search|default('') }}\">
                            <div class=\"modal-header bg-danger text-white\">
                                <h5 class=\"modal-title\">Refuser le partenaire</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
                            </div>
                            <div class=\"modal-body\">
                                <label for=\"motif\" class=\"form-label\">Motif du refus (optionnel)</label>
                                <textarea name=\"motif\" id=\"motif\" class=\"form-control\" rows=\"3\" placeholder=\"Expliquez la raison du refus...\"></textarea>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                                <button type=\"submit\" class=\"btn btn-danger\">Confirmer le refus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-handshake\"></i>
            <h4>Aucun partenaire trouvé</h4>
            <p class=\"text-muted\">Aucun partenaire ne correspond à vos critères.</p>
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
</script>
{% endblock %}", "admin_partenaire/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_partenaire\\index.html.twig");
    }
}

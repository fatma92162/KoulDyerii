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

/* admin_livraisons/livraisons_liste.html.twig */
class __TwigTemplate_9278246661e489ebcc5c95f17915e553 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_livraisons/livraisons_liste.html.twig"));

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

        yield "Gestion des livraisons";
        
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
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-livree {
        background: #4CAF50;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #000;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: #fff;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
    }
    
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        color: #fff;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        color: #fff;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #A52A2A, #8B0000);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: #fff;
    }
    
    .table td {
        vertical-align: middle;
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
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 173
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2\">
        <h3>🚚 Liste des livraisons</h3>
        <div class=\"btn-group\">
            <a href=\"";
        // line 177
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_new");
        yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Nouvelle livraison
            </a>
            <a href=\"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraisons_index");
        yield "\" class=\"btn btn-secondary\">
                <i class=\"fas fa-truck\"></i> Affecter un livreur
            </a>
        </div>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card ";
        // line 188
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 188, $this->source); })()) == "")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('')\">
            <div class=\"stat-number\">";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 189)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 189, $this->source); })()), "total", [], "any", false, false, false, 189), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total livraisons</div>
        </div>
        <div class=\"stat-card ";
        // line 192
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 192, $this->source); })()) == "en_cours")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('en_cours')\">
            <div class=\"stat-number\">";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "en_cours", [], "any", true, true, false, 193)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 193, $this->source); })()), "en_cours", [], "any", false, false, false, 193), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">🚚 En cours</div>
        </div>
        <div class=\"stat-card ";
        // line 196
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 196, $this->source); })()) == "livree")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('livree')\">
            <div class=\"stat-number\">";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "livree", [], "any", true, true, false, 197)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 197, $this->source); })()), "livree", [], "any", false, false, false, 197), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">✅ Livrées</div>
        </div>
        <div class=\"stat-card ";
        // line 200
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 200, $this->source); })()) == "annulee")) {
            yield "active";
        }
        yield "\" onclick=\"filterByStatus('annulee')\">
            <div class=\"stat-number\">";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "annulee", [], "any", true, true, false, 201)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 201, $this->source); })()), "annulee", [], "any", false, false, false, 201), 0)) : (0)), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">❌ Annulées</div>
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
                           placeholder=\"🔍 Rechercher par commande, livreur ou adresse...\" 
                           value=\"";
        // line 215
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 215, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_cours\" ";
        // line 220
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 220, $this->source); })()) == "en_cours")) {
            yield "selected";
        }
        yield ">🚚 En cours</option>
                        <option value=\"livree\" ";
        // line 221
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 221, $this->source); })()) == "livree")) {
            yield "selected";
        }
        yield ">✅ Livrées</option>
                        <option value=\"annulee\" ";
        // line 222
        if (((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 222, $this->source); })()) == "annulee")) {
            yield "selected";
        }
        yield ">❌ Annulées</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" ";
        // line 227
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 227, $this->source); })()) == "id_desc")) {
            yield "selected";
        }
        yield ">📅 Plus récentes</option>
                        <option value=\"id_asc\" ";
        // line 228
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 228, $this->source); })()) == "id_asc")) {
            yield "selected";
        }
        yield ">📅 Plus anciennes</option>
                        <option value=\"statut_asc\" ";
        // line 229
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 229, $this->source); })()) == "statut_asc")) {
            yield "selected";
        }
        yield ">📊 Statut A→Z</option>
                        <option value=\"statut_desc\" ";
        // line 230
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 230, $this->source); })()) == "statut_desc")) {
            yield "selected";
        }
        yield ">📊 Statut Z→A</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 236
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraisons_liste");
        yield "\" class=\"btn btn-reset\">
                        <i class=\"fas fa-undo\"></i> Réinitialiser les filtres
                    </a>
                </div>
            </div>
        </form>
    </div>

    ";
        // line 244
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 244, $this->source); })()), "flashes", ["success"], "method", false, false, false, 244));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 245
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 246
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 250
        yield "    
    ";
        // line 251
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 251, $this->source); })()), "flashes", ["error"], "method", false, false, false, 251));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 252
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 253
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 257
        yield "
    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID Livraison</th>
                    <th>Commande #</th>
                    <th>Adresse</th>
                    <th>Livreur</th>
                    <th>Statut</th>
                    <th style=\"width: 280px;\">Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 271
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 271, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
            // line 272
            yield "                <tr>
                    <td>";
            // line 273
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 273), "html", null, true);
            yield "</td>
                    <td>
                        <span class=\"badge bg-info\">#";
            // line 275
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idCommande", [], "any", false, false, false, 275), "html", null, true);
            yield "</span>
                    </td>
                    <td>";
            // line 277
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 277), 0, 50), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 277)) > 50)) {
                yield "...";
            }
            yield "</td>
                    <td>
                        ";
            // line 279
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 279)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 280
                yield "                            <strong>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 280), "prenom", [], "any", false, false, false, 280), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 280), "nom", [], "any", false, false, false, 280), "html", null, true);
                yield "</strong>
                            <br>
                            <small class=\"text-muted\">";
                // line 282
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 282), "telephone", [], "any", false, false, false, 282), "html", null, true);
                yield "</small>
                        ";
            } else {
                // line 284
                yield "                            Livreur #";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivreur", [], "any", false, false, false, 284), "html", null, true);
                yield "
                        ";
            }
            // line 286
            yield "                    </td>
                    <td>
                        <span class=\"status-badge status-";
            // line 288
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 288), "html", null, true);
            yield "\">
                            ";
            // line 289
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 289) == "en_cours")) {
                // line 290
                yield "                                🚚 En cours
                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 291
$context["livraison"], "statutLivraison", [], "any", false, false, false, 291) == "livree")) {
                // line 292
                yield "                                ✅ Livrée
                            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 293
$context["livraison"], "statutLivraison", [], "any", false, false, false, 293) == "annulee")) {
                // line 294
                yield "                                ❌ Annulée
                            ";
            } else {
                // line 296
                yield "                                ⏳ ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 296), "html", null, true);
                yield "
                            ";
            }
            // line 298
            yield "                        </span>
                     </td>
                    <td>
                        <div class=\"btn-action-group\">
                            <!-- Bouton MODIFIER -->
                            <a href=\"";
            // line 303
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 303)]), "html", null, true);
            yield "\" 
                               class=\"btn btn-sm btn-warning\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            
                            <!-- Bouton SUPPRIMER -->
                            <form action=\"";
            // line 309
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 309)]), "html", null, true);
            yield "\" 
                                  method=\"post\" 
                                  style=\"display: inline-block;\" 
                                  onsubmit=\"return confirm('⚠️ Supprimer définitivement cette livraison ?')\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                            
                            <!-- Bouton TERMINER (visible seulement si en cours) -->
                            ";
            // line 319
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 319) == "en_cours")) {
                // line 320
                yield "                                <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_terminer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 320)]), "html", null, true);
                yield "\" 
                                      method=\"post\" 
                                      style=\"display: inline-block;\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\" onclick=\"return confirm('✅ Confirmer la livraison ?')\">
                                        <i class=\"fas fa-check\"></i> Terminer
                                    </button>
                                </form>
                            ";
            }
            // line 328
            yield "                        </div>
                    </td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 331
        if (!$context['_iterated']) {
            // line 332
            yield "                <tr>
                    <td colspan=\"6\" class=\"text-center py-5\">
                        <i class=\"fas fa-truck fa-3x text-muted mb-3 d-block\"></i>
                        <p class=\"mb-3\">Aucune livraison trouvée.</p>
                        <a href=\"";
            // line 336
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_new");
            yield "\" class=\"btn btn-primary\">
                            <i class=\"fas fa-plus\"></i> Créer une livraison
                        </a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 342
        yield "            </tbody>
        </table>
    </div>
</div>

<script>
function filterByStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
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
        return "admin_livraisons/livraisons_liste.html.twig";
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
        return array (  621 => 342,  609 => 336,  603 => 332,  601 => 331,  594 => 328,  582 => 320,  580 => 319,  567 => 309,  558 => 303,  551 => 298,  545 => 296,  541 => 294,  539 => 293,  536 => 292,  534 => 291,  531 => 290,  529 => 289,  525 => 288,  521 => 286,  515 => 284,  510 => 282,  502 => 280,  500 => 279,  492 => 277,  487 => 275,  482 => 273,  479 => 272,  474 => 271,  458 => 257,  448 => 253,  445 => 252,  441 => 251,  438 => 250,  428 => 246,  425 => 245,  421 => 244,  410 => 236,  399 => 230,  393 => 229,  387 => 228,  381 => 227,  371 => 222,  365 => 221,  359 => 220,  351 => 215,  334 => 201,  328 => 200,  322 => 197,  316 => 196,  310 => 193,  304 => 192,  298 => 189,  292 => 188,  281 => 180,  275 => 177,  269 => 173,  259 => 172,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des livraisons{% endblock %}

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
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        background: #D4A574;
        color: white;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-livree {
        background: #4CAF50;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .btn-action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #000;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: #fff;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
    }
    
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        color: #fff;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        color: #fff;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #A52A2A, #8B0000);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: #fff;
    }
    
    .table td {
        vertical-align: middle;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2\">
        <h3>🚚 Liste des livraisons</h3>
        <div class=\"btn-group\">
            <a href=\"{{ path('app_admin_livraison_new') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Nouvelle livraison
            </a>
            <a href=\"{{ path('app_admin_livraisons_index') }}\" class=\"btn btn-secondary\">
                <i class=\"fas fa-truck\"></i> Affecter un livreur
            </a>
        </div>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-cards\">
        <div class=\"stat-card {% if statusFilter == '' %}active{% endif %}\" onclick=\"filterByStatus('')\">
            <div class=\"stat-number\">{{ stats.total|default(0) }}</div>
            <div class=\"stat-label\">Total livraisons</div>
        </div>
        <div class=\"stat-card {% if statusFilter == 'en_cours' %}active{% endif %}\" onclick=\"filterByStatus('en_cours')\">
            <div class=\"stat-number\">{{ stats.en_cours|default(0) }}</div>
            <div class=\"stat-label\">🚚 En cours</div>
        </div>
        <div class=\"stat-card {% if statusFilter == 'livree' %}active{% endif %}\" onclick=\"filterByStatus('livree')\">
            <div class=\"stat-number\">{{ stats.livree|default(0) }}</div>
            <div class=\"stat-label\">✅ Livrées</div>
        </div>
        <div class=\"stat-card {% if statusFilter == 'annulee' %}active{% endif %}\" onclick=\"filterByStatus('annulee')\">
            <div class=\"stat-number\">{{ stats.annulee|default(0) }}</div>
            <div class=\"stat-label\">❌ Annulées</div>
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
                           placeholder=\"🔍 Rechercher par commande, livreur ou adresse...\" 
                           value=\"{{ search|default('') }}\">
                </div>
                <div class=\"col-md-4\">
                    <select name=\"status\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"\">📊 Tous les statuts</option>
                        <option value=\"en_cours\" {% if statusFilter == 'en_cours' %}selected{% endif %}>🚚 En cours</option>
                        <option value=\"livree\" {% if statusFilter == 'livree' %}selected{% endif %}>✅ Livrées</option>
                        <option value=\"annulee\" {% if statusFilter == 'annulee' %}selected{% endif %}>❌ Annulées</option>
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select name=\"sort\" class=\"form-select\" onchange=\"this.form.submit()\">
                        <option value=\"id_desc\" {% if sort == 'id_desc' %}selected{% endif %}>📅 Plus récentes</option>
                        <option value=\"id_asc\" {% if sort == 'id_asc' %}selected{% endif %}>📅 Plus anciennes</option>
                        <option value=\"statut_asc\" {% if sort == 'statut_asc' %}selected{% endif %}>📊 Statut A→Z</option>
                        <option value=\"statut_desc\" {% if sort == 'statut_desc' %}selected{% endif %}>📊 Statut Z→A</option>
                    </select>
                </div>
            </div>
            <div class=\"row mt-3\">
                <div class=\"col-12\">
                    <a href=\"{{ path('app_admin_livraisons_liste') }}\" class=\"btn btn-reset\">
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
                    <th>ID Livraison</th>
                    <th>Commande #</th>
                    <th>Adresse</th>
                    <th>Livreur</th>
                    <th>Statut</th>
                    <th style=\"width: 280px;\">Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for livraison in livraisons %}
                <tr>
                    <td>{{ livraison.idLivraison }}</td>
                    <td>
                        <span class=\"badge bg-info\">#{{ livraison.idCommande }}</span>
                    </td>
                    <td>{{ livraison.adresse|slice(0, 50) }}{% if livraison.adresse|length > 50 %}...{% endif %}</td>
                    <td>
                        {% if livraison.livreur %}
                            <strong>{{ livraison.livreur.prenom }} {{ livraison.livreur.nom }}</strong>
                            <br>
                            <small class=\"text-muted\">{{ livraison.livreur.telephone }}</small>
                        {% else %}
                            Livreur #{{ livraison.idLivreur }}
                        {% endif %}
                    </td>
                    <td>
                        <span class=\"status-badge status-{{ livraison.statutLivraison }}\">
                            {% if livraison.statutLivraison == 'en_cours' %}
                                🚚 En cours
                            {% elseif livraison.statutLivraison == 'livree' %}
                                ✅ Livrée
                            {% elseif livraison.statutLivraison == 'annulee' %}
                                ❌ Annulée
                            {% else %}
                                ⏳ {{ livraison.statutLivraison }}
                            {% endif %}
                        </span>
                     </td>
                    <td>
                        <div class=\"btn-action-group\">
                            <!-- Bouton MODIFIER -->
                            <a href=\"{{ path('app_admin_livraison_edit', {id: livraison.idLivraison}) }}\" 
                               class=\"btn btn-sm btn-warning\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            
                            <!-- Bouton SUPPRIMER -->
                            <form action=\"{{ path('app_admin_livraison_delete', {id: livraison.idLivraison}) }}\" 
                                  method=\"post\" 
                                  style=\"display: inline-block;\" 
                                  onsubmit=\"return confirm('⚠️ Supprimer définitivement cette livraison ?')\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\">
                                    <i class=\"fas fa-trash\"></i> Supprimer
                                </button>
                            </form>
                            
                            <!-- Bouton TERMINER (visible seulement si en cours) -->
                            {% if livraison.statutLivraison == 'en_cours' %}
                                <form action=\"{{ path('app_admin_livraison_terminer', {id: livraison.idLivraison}) }}\" 
                                      method=\"post\" 
                                      style=\"display: inline-block;\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-success\" onclick=\"return confirm('✅ Confirmer la livraison ?')\">
                                        <i class=\"fas fa-check\"></i> Terminer
                                    </button>
                                </form>
                            {% endif %}
                        </div>
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan=\"6\" class=\"text-center py-5\">
                        <i class=\"fas fa-truck fa-3x text-muted mb-3 d-block\"></i>
                        <p class=\"mb-3\">Aucune livraison trouvée.</p>
                        <a href=\"{{ path('app_admin_livraison_new') }}\" class=\"btn btn-primary\">
                            <i class=\"fas fa-plus\"></i> Créer une livraison
                        </a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<script>
function filterByStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    url.searchParams.delete('page');
    window.location.href = url.toString();
}
</script>
{% endblock %}", "admin_livraisons/livraisons_liste.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_livraisons\\livraisons_liste.html.twig");
    }
}

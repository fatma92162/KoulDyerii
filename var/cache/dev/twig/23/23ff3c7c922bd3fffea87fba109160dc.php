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

/* base_admin.html.twig */
class __TwigTemplate_05d77bc378433c05181d79399bb41387 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'admin_title' => [$this, 'block_admin_title'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_admin.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🍽️</text></svg>\">
        
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
        
        ";
        // line 12
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 260
        yield "
        ";
        // line 261
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 284
        yield "    </head>
    <body>
        <div class=\"admin-wrapper\">
            <!-- Sidebar verticale -->
            <div class=\"admin-sidebar\" id=\"adminSidebar\">
                <div class=\"admin-sidebar-header\">
                    <div class=\"logo-icon\">🍽️</div>
                    <h3>KOUL DYERI</h3>
                    <p>Espace Administration</p>
                </div>
                <div class=\"admin-nav\">
                    <!-- Dashboard -->
                    <a href=\"";
        // line 296
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-tachometer-alt\"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <!-- Gestion des utilisateurs -->
                    <a href=\"";
        // line 302
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_liste");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-users\"></i>
                        <span>Utilisateurs</span>
                    </a>
                    
                    <!-- Gestion des publications -->
                    <a href=\"";
        // line 308
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-newspaper\"></i>
                        <span>Publications</span>
                    </a>
                    
                    <!-- Gestion des produits -->
                    <a href=\"";
        // line 314
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_index");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-box\"></i>
                        <span>Produits</span>
                    </a>
                    
                    <!-- Gestion des commandes -->
                    <a href=\"";
        // line 320
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-shopping-cart\"></i>
                        <span>Commandes</span>
                    </a>
                    
                    <!-- Gestion des livreurs -->
<a href=\"#\">
                        <i class=\"fas fa-users\"></i>
                        <span>Livreurs</span>
                    </a>
                    
                    <!-- Gestion des livraisons -->
                    <a href=\"";
        // line 332
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraisons_liste");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-truck\"></i>
                        <span>Livraisons</span>
                    </a>
                    
                    <!-- Statistiques -->
                    <a href=\"";
        // line 338
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_statistiques");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-chart-line\"></i>
                        <span>Statistiques</span>
                    </a>
                    
                    <div class=\"admin-nav-divider\"></div>
                    
                    <!-- Gestion des formations -->
                    <a href=\"";
        // line 346
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_index");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-graduation-cap\"></i>
                        <span>Formations</span>
                    </a>
                    <a href=\"";
        // line 350
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_results");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-chart-bar\"></i>
                        <span>Quiz Results</span>
                    </a>
                    <a href=\"";
        // line 354
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_certificates");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-certificate\"></i>
                        <span>Certificates</span>
                    </a>
                    
                    <!-- Gestion des partenaires -->
                    <a href=\"";
        // line 360
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_partenaires_index");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-handshake\"></i>
                        <span>Partenaires</span>
                    </a>
                    
                    
                    <!-- Déconnexion -->
                    <a href=\"";
        // line 367
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"admin-nav-item\">
                        <i class=\"fas fa-sign-out-alt\"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
                <div class=\"admin-sidebar-footer\">
                    <!-- Footer vide -->
                </div>
            </div>
            
            <!-- Contenu principal -->
            <div class=\"admin-content\">
                <div class=\"admin-topbar\">
                    <div class=\"admin-topbar-title\">
                        <h2>";
        // line 381
        yield from $this->unwrap()->yieldBlock('admin_title', $context, $blocks);
        yield "</h2>
                    </div>
                    <div class=\"admin-topbar-user\" onclick=\"toggleAdminDropdown()\">
                        <div class=\"admin-avatar\">
                            ";
        // line 385
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 385, $this->source); })()), "user", [], "any", false, false, false, 385), "photo", [], "any", false, false, false, 385)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 386
            yield "                                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 386, $this->source); })()), "user", [], "any", false, false, false, 386), "photo", [], "any", false, false, false, 386), "html", null, true);
            yield "\" alt=\"Photo\">
                            ";
        } else {
            // line 388
            yield "                                <span style=\"font-size: 20px;\">👤</span>
                            ";
        }
        // line 390
        yield "                        </div>
                        <span class=\"admin-name\">";
        // line 391
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 391, $this->source); })()), "user", [], "any", false, false, false, 391), "nom", [], "any", false, false, false, 391), "html", null, true);
        yield "</span>
                        <i class=\"fas fa-chevron-down\" style=\"font-size: 12px;\"></i>
                        
                        <!-- Dropdown menu -->
                        <div class=\"admin-dropdown\" id=\"adminDropdown\">
                            <a href=\"";
        // line 396
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
        yield "\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-user\"></i> Mon profil
                            </a>
                            <a href=\"";
        // line 399
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 399, $this->source); })()), "user", [], "any", false, false, false, 399), "idUtilisateur", [], "any", false, false, false, 399)]), "html", null, true);
        yield "\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-edit\"></i> Modifier mon profil
                            </a>
                            
                            <div class=\"admin-dropdown-divider\"></div>
                            <a href=\"";
        // line 404
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Affichage des messages flash -->
                ";
        // line 412
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 412, $this->source); })()), "flashes", ["success"], "method", false, false, false, 412));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 413
            yield "                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-check-circle\"></i> ";
            // line 414
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 418
        yield "                
                ";
        // line 419
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 419, $this->source); })()), "flashes", ["error"], "method", false, false, false, 419));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 420
            yield "                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 421
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 425
        yield "                
                ";
        // line 426
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 426, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 426));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 427
            yield "                    <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-exclamation-triangle\"></i> ";
            // line 428
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 432
        yield "                
                ";
        // line 433
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 433, $this->source); })()), "flashes", ["info"], "method", false, false, false, 433));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 434
            yield "                    <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-info-circle\"></i> ";
            // line 435
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 439
        yield "                
                ";
        // line 440
        yield from $this->unwrap()->yieldBlock('admin_content', $context, $blocks);
        // line 441
        yield "            </div>
        </div>
        
        <!-- Bouton pour toggle la sidebar sur mobile -->
        <button class=\"admin-toggle-btn\" onclick=\"toggleAdminSidebar()\">
            <i class=\"fas fa-bars\"></i>
        </button>
        
        <!-- Script pour activer les tooltips Bootstrap -->
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    </body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Admin | Koul Dyeri";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        yield "        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            
            body {
                font-family: 'Poppins', sans-serif;
                background: #f5f5f5;
                min-height: 100vh;
            }
            
            /* ADMIN SIDEBAR VERTICALE */
            .admin-wrapper {
                display: flex;
                min-height: 100vh;
            }
            
            .admin-sidebar {
                width: 280px;
                background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
                color: white;
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                overflow-y: auto;
                z-index: 100;
                transition: all 0.3s ease;
            }
            
            .admin-sidebar-header {
                padding: 25px 20px;
                text-align: center;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            .admin-sidebar-header .logo-icon {
                font-size: 50px;
                margin-bottom: 10px;
            }
            
            .admin-sidebar-header h3 {
                font-size: 22px;
                font-weight: 700;
                color: #FECB6E;
                margin-bottom: 5px;
            }
            
            .admin-sidebar-header p {
                font-size: 12px;
                opacity: 0.7;
            }
            
            .admin-nav {
                padding: 20px 0;
            }
            
            .admin-nav-item {
                padding: 12px 25px;
                display: flex;
                align-items: center;
                gap: 15px;
                color: rgba(255,255,255,0.8);
                text-decoration: none;
                transition: all 0.3s ease;
                border-left: 4px solid transparent;
            }
            
            .admin-nav-item:hover {
                background: rgba(255,255,255,0.1);
                color: #FECB6E;
            }
            
            .admin-nav-item.active {
                background: rgba(255,255,255,0.15);
                border-left-color: #FECB6E;
                color: #FECB6E;
            }
            
            .admin-nav-item i {
                width: 25px;
                font-size: 18px;
            }
            
            .admin-nav-divider {
                height: 1px;
                background: rgba(255,255,255,0.1);
                margin: 15px 25px;
            }
            
            .admin-sidebar-footer {
                padding: 20px;
                border-top: 1px solid rgba(255,255,255,0.1);
                margin-top: auto;
            }
            
            .admin-content {
                flex: 1;
                margin-left: 280px;
                padding: 20px;
            }
            
            .admin-topbar {
                background: white;
                border-radius: 15px;
                padding: 15px 25px;
                margin-bottom: 25px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            
            .admin-topbar-title h2 {
                font-size: 20px;
                font-weight: 600;
                color: #333;
                margin: 0;
            }
            
            .admin-topbar-user {
                display: flex;
                align-items: center;
                gap: 15px;
                cursor: pointer;
                position: relative;
            }
            
            .admin-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }
            
            .admin-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .admin-name {
                font-weight: 500;
                color: #333;
            }
            
            .admin-dropdown {
                position: absolute;
                top: 55px;
                right: 0;
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                width: 250px;
                display: none;
                z-index: 1000;
                animation: fadeInDown 0.3s ease;
            }
            
            .admin-dropdown.show {
                display: block;
            }
            
            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .admin-dropdown-item {
                padding: 12px 20px;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #333;
                text-decoration: none;
                transition: background 0.3s ease;
            }
            
            .admin-dropdown-item:hover {
                background: #fefcf8;
            }
            
            .admin-dropdown-item i {
                width: 20px;
                color: #8B0000;
            }
            
            .admin-dropdown-divider {
                height: 1px;
                background: #f0e6d6;
                margin: 5px 0;
            }
            
            .admin-card {
                background: white;
                border-radius: 15px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            
            .admin-toggle-btn {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1001;
                background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
                color: white;
                border: none;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                font-size: 24px;
                cursor: pointer;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }
            
            /* Style des boutons */
            .btn-primary {
                background: linear-gradient(135deg, #8B0000, #A52A2A);
                border: none;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #A52A2A, #8B0000);
                transform: translateY(-2px);
            }
            
            @media (max-width: 768px) {
                .admin-sidebar {
                    transform: translateX(-100%);
                }
                .admin-sidebar.open {
                    transform: translateX(0);
                }
                .admin-content {
                    margin-left: 0;
                }
                .admin-toggle-btn {
                    display: block;
                }
            }
        </style>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 261
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 262
        yield "        
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
        <script>
            function toggleAdminDropdown() {
                const dropdown = document.getElementById('adminDropdown');
                if (dropdown) dropdown.classList.toggle('show');
            }
            
            function toggleAdminSidebar() {
                const sidebar = document.getElementById('adminSidebar');
                if (sidebar) sidebar.classList.toggle('open');
            }
            
            document.addEventListener('click', function(e) {
                const dropdown = document.getElementById('adminDropdown');
                const avatar = document.querySelector('.admin-topbar-user');
                if (dropdown && avatar && !avatar.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.remove('show');
                }
            });
        </script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 381
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_title"));

        yield "Tableau de bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 440
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base_admin.html.twig";
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
        return array (  706 => 440,  689 => 381,  660 => 262,  650 => 261,  396 => 13,  386 => 12,  369 => 5,  345 => 441,  343 => 440,  340 => 439,  330 => 435,  327 => 434,  323 => 433,  320 => 432,  310 => 428,  307 => 427,  303 => 426,  300 => 425,  290 => 421,  287 => 420,  283 => 419,  280 => 418,  270 => 414,  267 => 413,  263 => 412,  252 => 404,  244 => 399,  238 => 396,  230 => 391,  227 => 390,  223 => 388,  217 => 386,  215 => 385,  208 => 381,  191 => 367,  181 => 360,  172 => 354,  165 => 350,  158 => 346,  147 => 338,  138 => 332,  123 => 320,  114 => 314,  105 => 308,  96 => 302,  87 => 296,  73 => 284,  71 => 261,  68 => 260,  66 => 12,  56 => 5,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Admin | Koul Dyeri{% endblock %}</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🍽️</text></svg>\">
        
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
        
        {% block stylesheets %}
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            
            body {
                font-family: 'Poppins', sans-serif;
                background: #f5f5f5;
                min-height: 100vh;
            }
            
            /* ADMIN SIDEBAR VERTICALE */
            .admin-wrapper {
                display: flex;
                min-height: 100vh;
            }
            
            .admin-sidebar {
                width: 280px;
                background: linear-gradient(180deg, #2c0e0e 0%, #4a1818 100%);
                color: white;
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                overflow-y: auto;
                z-index: 100;
                transition: all 0.3s ease;
            }
            
            .admin-sidebar-header {
                padding: 25px 20px;
                text-align: center;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            .admin-sidebar-header .logo-icon {
                font-size: 50px;
                margin-bottom: 10px;
            }
            
            .admin-sidebar-header h3 {
                font-size: 22px;
                font-weight: 700;
                color: #FECB6E;
                margin-bottom: 5px;
            }
            
            .admin-sidebar-header p {
                font-size: 12px;
                opacity: 0.7;
            }
            
            .admin-nav {
                padding: 20px 0;
            }
            
            .admin-nav-item {
                padding: 12px 25px;
                display: flex;
                align-items: center;
                gap: 15px;
                color: rgba(255,255,255,0.8);
                text-decoration: none;
                transition: all 0.3s ease;
                border-left: 4px solid transparent;
            }
            
            .admin-nav-item:hover {
                background: rgba(255,255,255,0.1);
                color: #FECB6E;
            }
            
            .admin-nav-item.active {
                background: rgba(255,255,255,0.15);
                border-left-color: #FECB6E;
                color: #FECB6E;
            }
            
            .admin-nav-item i {
                width: 25px;
                font-size: 18px;
            }
            
            .admin-nav-divider {
                height: 1px;
                background: rgba(255,255,255,0.1);
                margin: 15px 25px;
            }
            
            .admin-sidebar-footer {
                padding: 20px;
                border-top: 1px solid rgba(255,255,255,0.1);
                margin-top: auto;
            }
            
            .admin-content {
                flex: 1;
                margin-left: 280px;
                padding: 20px;
            }
            
            .admin-topbar {
                background: white;
                border-radius: 15px;
                padding: 15px 25px;
                margin-bottom: 25px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            
            .admin-topbar-title h2 {
                font-size: 20px;
                font-weight: 600;
                color: #333;
                margin: 0;
            }
            
            .admin-topbar-user {
                display: flex;
                align-items: center;
                gap: 15px;
                cursor: pointer;
                position: relative;
            }
            
            .admin-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }
            
            .admin-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .admin-name {
                font-weight: 500;
                color: #333;
            }
            
            .admin-dropdown {
                position: absolute;
                top: 55px;
                right: 0;
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                width: 250px;
                display: none;
                z-index: 1000;
                animation: fadeInDown 0.3s ease;
            }
            
            .admin-dropdown.show {
                display: block;
            }
            
            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .admin-dropdown-item {
                padding: 12px 20px;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #333;
                text-decoration: none;
                transition: background 0.3s ease;
            }
            
            .admin-dropdown-item:hover {
                background: #fefcf8;
            }
            
            .admin-dropdown-item i {
                width: 20px;
                color: #8B0000;
            }
            
            .admin-dropdown-divider {
                height: 1px;
                background: #f0e6d6;
                margin: 5px 0;
            }
            
            .admin-card {
                background: white;
                border-radius: 15px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            
            .admin-toggle-btn {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1001;
                background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
                color: white;
                border: none;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                font-size: 24px;
                cursor: pointer;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }
            
            /* Style des boutons */
            .btn-primary {
                background: linear-gradient(135deg, #8B0000, #A52A2A);
                border: none;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #A52A2A, #8B0000);
                transform: translateY(-2px);
            }
            
            @media (max-width: 768px) {
                .admin-sidebar {
                    transform: translateX(-100%);
                }
                .admin-sidebar.open {
                    transform: translateX(0);
                }
                .admin-content {
                    margin-left: 0;
                }
                .admin-toggle-btn {
                    display: block;
                }
            }
        </style>
        {% endblock %}

        {% block javascripts %}
        
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
        <script>
            function toggleAdminDropdown() {
                const dropdown = document.getElementById('adminDropdown');
                if (dropdown) dropdown.classList.toggle('show');
            }
            
            function toggleAdminSidebar() {
                const sidebar = document.getElementById('adminSidebar');
                if (sidebar) sidebar.classList.toggle('open');
            }
            
            document.addEventListener('click', function(e) {
                const dropdown = document.getElementById('adminDropdown');
                const avatar = document.querySelector('.admin-topbar-user');
                if (dropdown && avatar && !avatar.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.remove('show');
                }
            });
        </script>
        {% endblock %}
    </head>
    <body>
        <div class=\"admin-wrapper\">
            <!-- Sidebar verticale -->
            <div class=\"admin-sidebar\" id=\"adminSidebar\">
                <div class=\"admin-sidebar-header\">
                    <div class=\"logo-icon\">🍽️</div>
                    <h3>KOUL DYERI</h3>
                    <p>Espace Administration</p>
                </div>
                <div class=\"admin-nav\">
                    <!-- Dashboard -->
                    <a href=\"{{ path('app_home') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-tachometer-alt\"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <!-- Gestion des utilisateurs -->
                    <a href=\"{{ path('app_utilisateur_liste') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-users\"></i>
                        <span>Utilisateurs</span>
                    </a>
                    
                    <!-- Gestion des publications -->
                    <a href=\"{{ path('app_admin_posts_index') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-newspaper\"></i>
                        <span>Publications</span>
                    </a>
                    
                    <!-- Gestion des produits -->
                    <a href=\"{{ path('app_admin_produits_index') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-box\"></i>
                        <span>Produits</span>
                    </a>
                    
                    <!-- Gestion des commandes -->
                    <a href=\"{{ path('app_admin_commandes_index') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-shopping-cart\"></i>
                        <span>Commandes</span>
                    </a>
                    
                    <!-- Gestion des livreurs -->
<a href=\"#\">
                        <i class=\"fas fa-users\"></i>
                        <span>Livreurs</span>
                    </a>
                    
                    <!-- Gestion des livraisons -->
                    <a href=\"{{ path('app_admin_livraisons_liste') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-truck\"></i>
                        <span>Livraisons</span>
                    </a>
                    
                    <!-- Statistiques -->
                    <a href=\"{{ path('app_admin_statistiques') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-chart-line\"></i>
                        <span>Statistiques</span>
                    </a>
                    
                    <div class=\"admin-nav-divider\"></div>
                    
                    <!-- Gestion des formations -->
                    <a href=\"{{ path('app_admin_formations_index') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-graduation-cap\"></i>
                        <span>Formations</span>
                    </a>
                    <a href=\"{{ path('app_admin_results') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-chart-bar\"></i>
                        <span>Quiz Results</span>
                    </a>
                    <a href=\"{{ path('app_admin_certificates') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-certificate\"></i>
                        <span>Certificates</span>
                    </a>
                    
                    <!-- Gestion des partenaires -->
                    <a href=\"{{ path('app_admin_partenaires_index') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-handshake\"></i>
                        <span>Partenaires</span>
                    </a>
                    
                    
                    <!-- Déconnexion -->
                    <a href=\"{{ path('app_logout') }}\" class=\"admin-nav-item\">
                        <i class=\"fas fa-sign-out-alt\"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
                <div class=\"admin-sidebar-footer\">
                    <!-- Footer vide -->
                </div>
            </div>
            
            <!-- Contenu principal -->
            <div class=\"admin-content\">
                <div class=\"admin-topbar\">
                    <div class=\"admin-topbar-title\">
                        <h2>{% block admin_title %}Tableau de bord{% endblock %}</h2>
                    </div>
                    <div class=\"admin-topbar-user\" onclick=\"toggleAdminDropdown()\">
                        <div class=\"admin-avatar\">
                            {% if app.user.photo %}
                                <img src=\"{{ app.user.photo }}\" alt=\"Photo\">
                            {% else %}
                                <span style=\"font-size: 20px;\">👤</span>
                            {% endif %}
                        </div>
                        <span class=\"admin-name\">{{ app.user.nom }}</span>
                        <i class=\"fas fa-chevron-down\" style=\"font-size: 12px;\"></i>
                        
                        <!-- Dropdown menu -->
                        <div class=\"admin-dropdown\" id=\"adminDropdown\">
                            <a href=\"{{ path('app_mon_profil') }}\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-user\"></i> Mon profil
                            </a>
                            <a href=\"{{ path('app_utilisateur_editer', {id: app.user.idUtilisateur}) }}\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-edit\"></i> Modifier mon profil
                            </a>
                            
                            <div class=\"admin-dropdown-divider\"></div>
                            <a href=\"{{ path('app_logout') }}\" class=\"admin-dropdown-item\">
                                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Affichage des messages flash -->
                {% for message in app.flashes('success') %}
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-check-circle\"></i> {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
                
                {% for message in app.flashes('error') %}
                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-exclamation-circle\"></i> {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
                
                {% for message in app.flashes('warning') %}
                    <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-exclamation-triangle\"></i> {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
                
                {% for message in app.flashes('info') %}
                    <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fas fa-info-circle\"></i> {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endfor %}
                
                {% block admin_content %}{% endblock %}
            </div>
        </div>
        
        <!-- Bouton pour toggle la sidebar sur mobile -->
        <button class=\"admin-toggle-btn\" onclick=\"toggleAdminSidebar()\">
            <i class=\"fas fa-bars\"></i>
        </button>
        
        <!-- Script pour activer les tooltips Bootstrap -->
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    </body>
</html>", "base_admin.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\base_admin.html.twig");
    }
}

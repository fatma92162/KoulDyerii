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

/* base.html.twig */
class __TwigTemplate_5a63835dc8fa0cc28d1c4e465b26c9b0 extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 2
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "request", [], "any", false, false, false, 2), "locale", [], "any", false, false, false, 2), "html", null, true);
        yield "\" data-theme=\"light\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🍽️</text></svg>\">

    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">

    ";
        // line 14
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 15
        yield "
    <style>
        /* ===== MODE CLAIR (par défaut) ===== */
        :root {
            --bordeaux: #8B0000;
            --bordeaux-clair: #A52A2A;
            --bordeaux-fonce: #5C0000;
            --beige: #F5E6D3;
            --beige-clair: #FFF8F0;
            --beige-fonce: #E8D5B7;
            --marron: #8B4513;
            --marron-clair: #A0522D;
            --text-primary: #333;
            --text-secondary: #666;
            --bg-navbar: rgba(255, 248, 240, 0.98);
            --bg-card: #FFF8F0;
            --bg-body: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 50%, #D4A574 100%);
            --border-color: #E8D5B7;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            --input-bg: white;
            --table-hover: #F5E6D3;
            --alert-success-bg: #d4edda;
            --alert-success-text: #155724;
            --alert-danger-bg: #f8d7da;
            --alert-danger-text: #721c24;
            --border-light: #E8D5B7;
        }

        /* ===== MODE SOMBRE ===== */
        [data-theme=\"dark\"] {
            --bordeaux: #D32F2F;
            --bordeaux-clair: #E53935;
            --bordeaux-fonce: #B71C1C;
            --beige: #1a1a2e;
            --beige-clair: #1e1e2e;
            --beige-fonce: #2d2d44;
            --marron: #c62828;
            --marron-clair: #e53935;
            --text-primary: #e0e0e0;
            --text-secondary: #a0a0a0;
            --bg-navbar: rgba(30, 30, 46, 0.98);
            --bg-card: #1e1e2e;
            --bg-body: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            --border-color: #2d2d44;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            --input-bg: #2d2d44;
            --table-hover: #2d2d44;
            --alert-success-bg: #1e4620;
            --alert-success-text: #a5d6a7;
            --alert-danger-bg: #4a1c1c;
            --alert-danger-text: #f8d7da;
            --border-light: #2d2d44;
        }

        body {
            font-family: 'Poppins', system-ui, sans-serif;
            background: var(--bg-body);
            min-height: 100vh;
            color: var(--text-primary);
            transition: background 0.3s ease, color 0.3s ease;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%238B4513' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
            background-repeat: repeat;
            background-size: 60px;
            pointer-events: none;
            z-index: -1;
        }

        [data-theme=\"dark\"] body::before {
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23D32F2F' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        }

        .navbar-custom {
            background: var(--bg-navbar);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 25px rgba(139, 0, 0, 0.1);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            border-bottom: 2px solid var(--bordeaux);
            transition: background 0.3s ease;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: var(--text-primary);
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .nav-link:hover {
            color: var(--bordeaux);
            background: rgba(139, 0, 0, 0.08);
        }

        .profile-avatar-nav {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            border: 2px solid var(--beige-clair);
            box-shadow: 0 2px 10px rgba(139, 0, 0, 0.2);
        }

        .profile-avatar-nav:hover { transform: scale(1.08); }

        .profile-avatar-nav img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 75px;
            right: 20px;
            background: var(--bg-card);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            width: 290px;
            display: none;
            z-index: 1050;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .dropdown-menu-custom.show { display: block; }

        .dropdown-header {
            padding: 25px 20px;
            text-align: center;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .dropdown-name {
            font-weight: 700;
            font-size: 16px;
            color: white;
        }

        .dropdown-email {
            font-size: 12px;
            opacity: 0.8;
            color: white;
        }

        .dropdown-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            margin: 0 auto 12px;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--beige);
            color: var(--bordeaux);
        }

        .dropdown-item i {
            width: 20px;
            color: var(--bordeaux);
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1040;
            display: none;
        }
        
        .overlay.show {
            display: block;
        }
        
        .dropdown-divider {
            height: 1px;
            background: var(--border-color);
            margin: 8px 0;
        }
        
        .container-main {
            min-height: calc(100vh - 80px);
            padding: 30px 0;
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border: none;
            color: white;
            transition: all 0.3s ease;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.4);
            color: white;
        }

        .admin-card, .card {
            background: var(--bg-card);
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--bordeaux-fonce), var(--bordeaux));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
            color: white;
        }

        .btn-secondary {
            background: var(--beige-fonce);
            border: none;
            color: var(--bordeaux);
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: var(--beige);
            color: var(--bordeaux-fonce);
        }

        .alert-success {
            background-color: var(--alert-success-bg);
            border-left: 4px solid #28a745;
            color: var(--alert-success-text);
        }

        .alert-danger {
            background-color: var(--alert-danger-bg);
            border-left: 4px solid var(--bordeaux);
            color: var(--alert-danger-text);
        }

        .table {
            background: var(--bg-card);
            border-radius: 15px;
            overflow: hidden;
            color: var(--text-primary);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            color: white;
            border: none;
            padding: 15px;
        }

        .table tbody tr:hover {
            background: var(--table-hover);
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 12px 16px;
            background: var(--input-bg);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--bordeaux);
            box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        }

        .form-label {
            color: var(--marron);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .badge-notif {
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(30%, -30%);
        }

        .dropdown-menu-notif {
            min-width: 320px;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            white-space: normal;
            word-wrap: break-word;
        }

        .notification-item small {
            font-size: 11px;
        }

        /* Bouton mode sombre */
        .theme-toggle {
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: 50px;
            padding: 6px 14px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-primary);
            font-size: 14px;
        }

        .theme-toggle:hover {
            background: var(--bordeaux);
            color: white;
            border-color: var(--bordeaux);
        }

        .theme-toggle i {
            transition: transform 0.3s;
        }

        .theme-toggle:hover i {
            transform: rotate(15deg);
        }

        /* Bouton résumé */
        .btn-summarize {
            background: none;
            border: 1.5px solid var(--border-light);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #6c5ce7;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-summarize:hover {
            border-color: #6c5ce7;
            color: #6c5ce7;
            background: rgba(108,92,231,0.1);
        }
    </style>
</head>
<body>

    <nav class=\"navbar navbar-expand-lg navbar-custom\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"";
        // line 427
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                🍽️ <span>KOUL DYERI</span>
            </a>

            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto align-items-center gap-1\">
                    ";
        // line 437
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 437, $this->source); })()), "user", [], "any", false, false, false, 437)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 438
            yield "                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 439
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
            yield "\"><i class=\"fas fa-home\"></i> Accueil</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 443
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
            yield "\"><i class=\"fas fa-newspaper\"></i> Publications</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 447
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
            yield "\"><i class=\"fas fa-store\"></i> Produits</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 451
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mes_commandes_index");
            yield "\"><i class=\"fas fa-shopping-cart\"></i> Mes commandes</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 455
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_livraisons");
            yield "\"><i class=\"fas fa-truck\"></i> Mes livraisons</a>
                        </li>

                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 459
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_index");
            yield "\"><i class=\"fas fa-handshake\"></i> Partenaire</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 463
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_index");
            yield "\"><i class=\"fas fa-graduation-cap\"></i> Formations</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 467
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mes_inscriptions");
            yield "\">
                                <i class=\"fas fa-calendar-check\"></i> Mes inscriptions
                            </a>
                        </li>

                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 473
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_abonnement_index");
            yield "\">
                                <i class=\"fas fa-crown\"></i> Abonnement
                            </a>
                        </li>
                        
                        ";
            // line 478
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 478), "role", [], "any", true, true, false, 478) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 478, $this->source); })()), "user", [], "any", false, false, false, 478), "role", [], "any", false, false, false, 478) == "admin"))) {
                // line 479
                yield "                            <li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"adminDropdown\" role=\"button\" data-bs-toggle=\"dropdown\">
                                    <i class=\"fas fa-crown\"></i> Admin
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 484
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_liste");
                yield "\"><i class=\"fas fa-users\"></i> Utilisateurs</a></li>
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 485
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
                yield "\"><i class=\"fas fa-newspaper\"></i> Publications</a></li>
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 486
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_index");
                yield "\"><i class=\"fas fa-box\"></i> Produits</a></li>
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 487
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index");
                yield "\"><i class=\"fas fa-shopping-cart\"></i> Commandes</a></li>
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 488
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_index");
                yield "\"><i class=\"fas fa-graduation-cap\"></i> Formations</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li><a class=\"dropdown-item\" href=\"";
                // line 490
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recompenses_index");
                yield "\"><i class=\"fas fa-gift\"></i> Récompenses</a></li>
                                </ul>
                            </li>
                        ";
            }
            // line 494
            yield "
                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"languageDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-globe\"></i> ";
            // line 497
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 497, $this->source); })()), "request", [], "any", false, false, false, 497), "locale", [], "any", false, false, false, 497)), "html", null, true);
            yield "
                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"languageDropdown\">
                                <li>
                                    <a class=\"dropdown-item ";
            // line 501
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 501, $this->source); })()), "request", [], "any", false, false, false, 501), "locale", [], "any", false, false, false, 501) == "fr")) {
                yield "active";
            }
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_set_locale", ["locale" => "fr"]);
            yield "\">
                                        🇫🇷 Français
                                    </a>
                                </li>
                                <li>
                                    <a class=\"dropdown-item ";
            // line 506
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 506, $this->source); })()), "request", [], "any", false, false, false, 506), "locale", [], "any", false, false, false, 506) == "en")) {
                yield "active";
            }
            yield "\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_set_locale", ["locale" => "en"]);
            yield "\">
                                        🇬🇧 English
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- NOTIFICATIONS -->
                        ";
            // line 514
            $context["unreadCount"] = $this->extensions['App\Twig\NotificationExtension']->getUnreadCount(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 514, $this->source); })()), "user", [], "any", false, false, false, 514), "idUtilisateur", [], "any", false, false, false, 514));
            // line 515
            yield "                        ";
            $context["recentNotifs"] = $this->extensions['App\Twig\NotificationExtension']->getRecentNotifications(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 515, $this->source); })()), "user", [], "any", false, false, false, 515), "idUtilisateur", [], "any", false, false, false, 515), 10);
            // line 516
            yield "
                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link position-relative\" href=\"#\" id=\"notificationDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-bell\"></i>
                                ";
            // line 520
            if (((isset($context["unreadCount"]) || array_key_exists("unreadCount", $context) ? $context["unreadCount"] : (function () { throw new RuntimeError('Variable "unreadCount" does not exist.', 520, $this->source); })()) > 0)) {
                // line 521
                yield "                                    <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge-notif\">
                                        ";
                // line 522
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unreadCount"]) || array_key_exists("unreadCount", $context) ? $context["unreadCount"] : (function () { throw new RuntimeError('Variable "unreadCount" does not exist.', 522, $this->source); })()), "html", null, true);
                yield "
                                    </span>
                                ";
            }
            // line 525
            yield "                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-notif\" aria-labelledby=\"notificationDropdown\">
                                ";
            // line 527
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentNotifs"]) || array_key_exists("recentNotifs", $context) ? $context["recentNotifs"] : (function () { throw new RuntimeError('Variable "recentNotifs" does not exist.', 527, $this->source); })())) > 0)) {
                // line 528
                yield "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentNotifs"]) || array_key_exists("recentNotifs", $context) ? $context["recentNotifs"] : (function () { throw new RuntimeError('Variable "recentNotifs" does not exist.', 528, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
                    // line 529
                    yield "                                        <li>
                                            ";
                    // line 530
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "postId", [], "any", false, false, false, 530)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 531
                        yield "                                                <a class=\"dropdown-item notification-item ";
                        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "isRead", [], "any", false, false, false, 531)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "bg-light border-start border-primary";
                        }
                        yield "\"
                                                   href=\"";
                        // line 532
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "postId", [], "any", false, false, false, 532)]), "html", null, true);
                        yield "\"
                                                   onclick=\"markNotificationAsRead(";
                        // line 533
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "id", [], "any", false, false, false, 533), "html", null, true);
                        yield ")\">
                                                    <div>";
                        // line 534
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", false, false, false, 534), "html", null, true);
                        yield "</div>
                                                    <small class=\"text-muted\">";
                        // line 535
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "createdAt", [], "any", false, false, false, 535), "d/m/Y H:i"), "html", null, true);
                        yield "</small>
                                                </a>
                                            ";
                    } else {
                        // line 538
                        yield "                                                <a class=\"dropdown-item notification-item ";
                        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "isRead", [], "any", false, false, false, 538)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "bg-light border-start border-primary";
                        }
                        yield "\"
                                                   href=\"#\"
                                                   onclick=\"markNotificationAsRead(";
                        // line 540
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "id", [], "any", false, false, false, 540), "html", null, true);
                        yield "); return false;\">
                                                    <div>";
                        // line 541
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", false, false, false, 541), "html", null, true);
                        yield "</div>
                                                    <small class=\"text-muted\">";
                        // line 542
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "createdAt", [], "any", false, false, false, 542), "d/m/Y H:i"), "html", null, true);
                        yield "</small>
                                                </a>
                                            ";
                    }
                    // line 545
                    yield "                                        </li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['notif'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 547
                yield "                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li>
                                        <a class=\"dropdown-item text-center\" href=\"";
                // line 549
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notifications_index");
                yield "\">
                                            Voir toutes les notifications
                                        </a>
                                    </li>
                                ";
            } else {
                // line 554
                yield "                                    <li><span class=\"dropdown-item text-muted\">Aucune notification</span></li>
                                ";
            }
            // line 556
            yield "                            </ul>
                        </li>

                        <!-- DEMANDES DE CONNEXION -->
                        ";
            // line 560
            $context["pendingRequestsCount"] = $this->extensions['App\Twig\NotifRequestExtension']->getPendingCount(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 560, $this->source); })()), "user", [], "any", false, false, false, 560), "idUtilisateur", [], "any", false, false, false, 560));
            // line 561
            yield "                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link position-relative\" href=\"#\" id=\"friendRequestDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-user-plus\"></i>
                                ";
            // line 564
            if (((isset($context["pendingRequestsCount"]) || array_key_exists("pendingRequestsCount", $context) ? $context["pendingRequestsCount"] : (function () { throw new RuntimeError('Variable "pendingRequestsCount" does not exist.', 564, $this->source); })()) > 0)) {
                // line 565
                yield "                                    <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge-notif\">
                                        ";
                // line 566
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingRequestsCount"]) || array_key_exists("pendingRequestsCount", $context) ? $context["pendingRequestsCount"] : (function () { throw new RuntimeError('Variable "pendingRequestsCount" does not exist.', 566, $this->source); })()), "html", null, true);
                yield "
                                    </span>
                                ";
            }
            // line 569
            yield "                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"friendRequestDropdown\">
                                <li>
                                    <a class=\"dropdown-item\" href=\"";
            // line 572
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notif_requests_list");
            yield "\">
                                        <i class=\"fas fa-users\"></i> Demandes de connexion
                                        ";
            // line 574
            if (((isset($context["pendingRequestsCount"]) || array_key_exists("pendingRequestsCount", $context) ? $context["pendingRequestsCount"] : (function () { throw new RuntimeError('Variable "pendingRequestsCount" does not exist.', 574, $this->source); })()) > 0)) {
                // line 575
                yield "                                            <span class=\"badge bg-danger ms-2\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingRequestsCount"]) || array_key_exists("pendingRequestsCount", $context) ? $context["pendingRequestsCount"] : (function () { throw new RuntimeError('Variable "pendingRequestsCount" does not exist.', 575, $this->source); })()), "html", null, true);
                yield "</span>
                                        ";
            }
            // line 577
            yield "                                    </a>
                                </li>
                                <li>
                                    <a class=\"dropdown-item\" href=\"";
            // line 580
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_friends_list");
            yield "\">
                                        <i class=\"fas fa-user-friends\"></i> Mes amis
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- MESSAGERIE -->
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 589
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_messages_inbox");
            yield "\" title=\"Messagerie\">
                                <i class=\"fas fa-envelope\"></i>
                            </a>
                        </li>

                        <!-- BOUTON MODE SOMBRE -->
                        <li class=\"nav-item\">
                            <button class=\"theme-toggle\" id=\"themeToggle\">
                                <i class=\"fas fa-moon\" id=\"themeIcon\"></i>
                                <span id=\"themeText\">Mode sombre</span>
                            </button>
                        </li>

                        <li class=\"nav-item ms-3\">
                            <div class=\"profile-avatar-nav\" onclick=\"toggleDropdown()\">
                                ";
            // line 604
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 604), "photo", [], "any", true, true, false, 604) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 604, $this->source); })()), "user", [], "any", false, false, false, 604), "photo", [], "any", false, false, false, 604))) {
                // line 605
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 605, $this->source); })()), "user", [], "any", false, false, false, 605), "photo", [], "any", false, false, false, 605), "html", null, true);
                yield "\" alt=\"Profil\">
                                ";
            } else {
                // line 607
                yield "                                    <span style=\"color: white; font-weight: 600;\">
                                        ";
                // line 608
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 608, $this->source); })()), "user", [], "any", false, false, false, 608), "nom", [], "any", false, false, false, 608))), "K"), "html", null, true);
                yield "
                                    </span>
                                ";
            }
            // line 611
            yield "                            </div>
                        </li>
                    ";
        } else {
            // line 614
            yield "                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 615
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\"><i class=\"fas fa-sign-in-alt\"></i> Connexion</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"btn btn-gradient ms-2\" href=\"";
            // line 618
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\">
                                <i class=\"fas fa-user-plus\"></i> Inscription
                            </a>
                        </li>
                    ";
        }
        // line 623
        yield "                </ul>
            </div>
        </div>
    </nav>

    <div class=\"overlay\" id=\"overlay\" onclick=\"toggleDropdown()\"></div>

    <div class=\"dropdown-menu-custom\" id=\"dropdownMenu\">
        <div class=\"dropdown-header\">
            <div class=\"dropdown-avatar\">
                ";
        // line 633
        if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 633, $this->source); })()), "user", [], "any", false, false, false, 633) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 633), "photo", [], "any", true, true, false, 633)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 633, $this->source); })()), "user", [], "any", false, false, false, 633), "photo", [], "any", false, false, false, 633))) {
            // line 634
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 634, $this->source); })()), "user", [], "any", false, false, false, 634), "photo", [], "any", false, false, false, 634), "html", null, true);
            yield "\" alt=\"\">
                ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 635
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 635, $this->source); })()), "user", [], "any", false, false, false, 635)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 636
            yield "                    <span style=\"font-size: 36px; color: white;\">
                        ";
            // line 637
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 637, $this->source); })()), "user", [], "any", false, false, false, 637), "nom", [], "any", false, false, false, 637))), "html", null, true);
            yield "
                    </span>
                ";
        } else {
            // line 640
            yield "                    <span style=\"font-size: 36px; color: white;\">🍽️</span>
                ";
        }
        // line 642
        yield "            </div>
            ";
        // line 643
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 643, $this->source); })()), "user", [], "any", false, false, false, 643)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 644
            yield "                <div class=\"dropdown-name\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 644, $this->source); })()), "user", [], "any", false, false, false, 644), "nom", [], "any", false, false, false, 644), "html", null, true);
            yield "</div>
                <div class=\"dropdown-email\">";
            // line 645
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 645), "email", [], "any", true, true, false, 645)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 645, $this->source); })()), "user", [], "any", false, false, false, 645), "email", [], "any", false, false, false, 645), "")) : ("")), "html", null, true);
            yield "</div>
            ";
        }
        // line 647
        yield "        </div>

        ";
        // line 649
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 649, $this->source); })()), "user", [], "any", false, false, false, 649)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 650
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
            yield "\" class=\"dropdown-item\">
                <i class=\"fas fa-user\"></i> Mon profil
            </a>
            <a href=\"";
            // line 653
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 653, $this->source); })()), "user", [], "any", false, false, false, 653), "idUtilisateur", [], "any", false, false, false, 653)]), "html", null, true);
            yield "\" class=\"dropdown-item\">
                <i class=\"fas fa-edit\"></i> Modifier mon profil
            </a>
            <a href=\"";
            // line 656
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recompenses_index");
            yield "\" class=\"dropdown-item\">
                <i class=\"fas fa-gift\"></i> Mes récompenses
            </a>
            <a href=\"";
            // line 659
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_historique_index");
            yield "\" class=\"dropdown-item\">
                <i class=\"fas fa-history\"></i> Historique
            </a>
            <div class=\"dropdown-divider\"></div>
            <a href=\"";
            // line 663
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"dropdown-item text-danger\">
                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
            </a>
        ";
        }
        // line 667
        yield "    </div>

    <div class=\"container mt-3\">
        ";
        // line 670
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 670, $this->source); })()), "flashes", [], "any", false, false, false, 670));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 671
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 672
                yield "                <div class=\"alert alert-";
                yield ((($context["label"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true)));
                yield " alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-";
                // line 673
                yield ((($context["label"] == "success")) ? ("check-circle") : (((($context["label"] == "error")) ? ("exclamation-circle") : ("info-circle"))));
                yield "\"></i>
                    ";
                // line 674
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 678
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 679
        yield "    </div>

    <div class=\"container-main\">
        <div class=\"container\">
            ";
        // line 683
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 684
        yield "        </div>
    </div>

    <!-- Modal pour le résumé de texte -->
    <div class=\"modal fade\" id=\"summaryModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">🤖 Résumé automatique</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                </div>
                <div class=\"modal-body\" id=\"summaryModalBody\">
                    <div class=\"text-center\">
                        <div class=\"spinner-border text-primary\" role=\"status\">
                            <span class=\"visually-hidden\">Génération en cours...</span>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 709
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 848
        yield "
</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Koul Dyeri";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 683
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 709
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 710
        yield "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            const overlay = document.getElementById('overlay');
            if (dropdown && overlay) {
                dropdown.classList.toggle('show');
                overlay.classList.toggle('show');
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const dropdown = document.getElementById('dropdownMenu');
                const overlay = document.getElementById('overlay');
                if (dropdown && overlay) {
                    dropdown.classList.remove('show');
                    overlay.classList.remove('show');
                }
            }
        });

        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            const overlay = document.getElementById('overlay');
            const avatar = document.querySelector('.profile-avatar-nav');

            if (!avatar || !dropdown) return;

            if (!avatar.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('show');
                overlay.classList.remove('show');
            }
        });

        function markNotificationAsRead(notificationId) {
            fetch(`/notification/\${notificationId}/read`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(console.error);
        }

        // ===== GESTION DU MODE SOMBRE =====
        (function() {
            const savedTheme = localStorage.getItem('koul_dyeri_theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            let theme = savedTheme;
            if (!theme) {
                theme = prefersDark ? 'dark' : 'light';
            }
            
            document.documentElement.setAttribute('data-theme', theme);
            updateThemeUI(theme);
            
            const themeToggle = document.getElementById('themeToggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('koul_dyeri_theme', newTheme);
                    updateThemeUI(newTheme);
                });
            }
            
            function updateThemeUI(theme) {
                const themeIcon = document.getElementById('themeIcon');
                const themeText = document.getElementById('themeText');
                
                if (themeIcon && themeText) {
                    if (theme === 'dark') {
                        themeIcon.className = 'fas fa-sun';
                        themeText.textContent = 'Mode clair';
                    } else {
                        themeIcon.className = 'fas fa-moon';
                        themeText.textContent = 'Mode sombre';
                    }
                }
            }
        })();

        // ========== RÉSUMÉ DE TEXTE ==========
        function summarizeText(text, numSentences = 3) {
            if (!text) return \"Texte vide.\";
            const sentences = text.match(/[^\\.!\\?]+[\\.!\\?]+/g) || [];
            if (sentences.length === 0) return \"Texte trop court ou invalide.\";

            const words = text.toLowerCase().replace(/[^\\w\\s]/g, '').split(/\\s+/);
            const wordFreq = {};
            for (const word of words) {
                if (word.length > 2) wordFreq[word] = (wordFreq[word] || 0) + 1;
            }

            const sentenceScores = {};
            for (const sentence of sentences) {
                const cleanSentence = sentence.toLowerCase().replace(/[^\\w\\s]/g, '');
                const sentenceWords = cleanSentence.split(/\\s+/);
                let score = 0;
                for (const w of sentenceWords) if (wordFreq[w]) score += wordFreq[w];
                sentenceScores[sentence] = score / (sentenceWords.length || 1);
            }

            const best = Object.keys(sentenceScores).sort((a,b) => sentenceScores[b] - sentenceScores[a]).slice(0, numSentences);
            const ordered = sentences.filter(s => best.includes(s));
            return ordered.join(' ');
        }

        function summarizePost(btn) {
            const content = btn.getAttribute('data-content');
            if (!content) {
                alert('Contenu non disponible.');
                return;
            }

            const modal = new bootstrap.Modal(document.getElementById('summaryModal'));
            const modalBody = document.getElementById('summaryModalBody');

            modalBody.innerHTML = `<div class=\"text-center py-4\"><div class=\"spinner-border text-primary\" role=\"status\"></div><p class=\"mt-2 text-muted\">Analyse en cours...</p></div>`;
            modal.show();

            setTimeout(() => {
                const summary = summarizeText(content, 3);
                modalBody.innerHTML = `<div class=\"p-3 bg-light rounded\"><i class=\"fas fa-quote-left text-muted me-2\"></i>\${summary.replace(/\\n/g, '<br>')}</div>`;
            }, 10);
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
        return "base.html.twig";
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
        return array (  1103 => 710,  1093 => 709,  1077 => 683,  1061 => 14,  1044 => 6,  1034 => 848,  1032 => 709,  1005 => 684,  1003 => 683,  997 => 679,  991 => 678,  981 => 674,  977 => 673,  972 => 672,  967 => 671,  963 => 670,  958 => 667,  951 => 663,  944 => 659,  938 => 656,  932 => 653,  925 => 650,  923 => 649,  919 => 647,  914 => 645,  909 => 644,  907 => 643,  904 => 642,  900 => 640,  894 => 637,  891 => 636,  889 => 635,  884 => 634,  882 => 633,  870 => 623,  862 => 618,  856 => 615,  853 => 614,  848 => 611,  842 => 608,  839 => 607,  833 => 605,  831 => 604,  813 => 589,  801 => 580,  796 => 577,  790 => 575,  788 => 574,  783 => 572,  778 => 569,  772 => 566,  769 => 565,  767 => 564,  762 => 561,  760 => 560,  754 => 556,  750 => 554,  742 => 549,  738 => 547,  731 => 545,  725 => 542,  721 => 541,  717 => 540,  709 => 538,  703 => 535,  699 => 534,  695 => 533,  691 => 532,  684 => 531,  682 => 530,  679 => 529,  674 => 528,  672 => 527,  668 => 525,  662 => 522,  659 => 521,  657 => 520,  651 => 516,  648 => 515,  646 => 514,  631 => 506,  619 => 501,  612 => 497,  607 => 494,  600 => 490,  595 => 488,  591 => 487,  587 => 486,  583 => 485,  579 => 484,  572 => 479,  570 => 478,  562 => 473,  553 => 467,  546 => 463,  539 => 459,  532 => 455,  525 => 451,  518 => 447,  511 => 443,  504 => 439,  501 => 438,  499 => 437,  486 => 427,  72 => 15,  70 => 14,  59 => 6,  52 => 2,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"{{ app.request.locale }}\" data-theme=\"light\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Koul Dyeri{% endblock %}</title>
    
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🍽️</text></svg>\">

    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">

    {% block stylesheets %}{% endblock %}

    <style>
        /* ===== MODE CLAIR (par défaut) ===== */
        :root {
            --bordeaux: #8B0000;
            --bordeaux-clair: #A52A2A;
            --bordeaux-fonce: #5C0000;
            --beige: #F5E6D3;
            --beige-clair: #FFF8F0;
            --beige-fonce: #E8D5B7;
            --marron: #8B4513;
            --marron-clair: #A0522D;
            --text-primary: #333;
            --text-secondary: #666;
            --bg-navbar: rgba(255, 248, 240, 0.98);
            --bg-card: #FFF8F0;
            --bg-body: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 50%, #D4A574 100%);
            --border-color: #E8D5B7;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            --input-bg: white;
            --table-hover: #F5E6D3;
            --alert-success-bg: #d4edda;
            --alert-success-text: #155724;
            --alert-danger-bg: #f8d7da;
            --alert-danger-text: #721c24;
            --border-light: #E8D5B7;
        }

        /* ===== MODE SOMBRE ===== */
        [data-theme=\"dark\"] {
            --bordeaux: #D32F2F;
            --bordeaux-clair: #E53935;
            --bordeaux-fonce: #B71C1C;
            --beige: #1a1a2e;
            --beige-clair: #1e1e2e;
            --beige-fonce: #2d2d44;
            --marron: #c62828;
            --marron-clair: #e53935;
            --text-primary: #e0e0e0;
            --text-secondary: #a0a0a0;
            --bg-navbar: rgba(30, 30, 46, 0.98);
            --bg-card: #1e1e2e;
            --bg-body: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            --border-color: #2d2d44;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            --input-bg: #2d2d44;
            --table-hover: #2d2d44;
            --alert-success-bg: #1e4620;
            --alert-success-text: #a5d6a7;
            --alert-danger-bg: #4a1c1c;
            --alert-danger-text: #f8d7da;
            --border-light: #2d2d44;
        }

        body {
            font-family: 'Poppins', system-ui, sans-serif;
            background: var(--bg-body);
            min-height: 100vh;
            color: var(--text-primary);
            transition: background 0.3s ease, color 0.3s ease;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%238B4513' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
            background-repeat: repeat;
            background-size: 60px;
            pointer-events: none;
            z-index: -1;
        }

        [data-theme=\"dark\"] body::before {
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23D32F2F' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        }

        .navbar-custom {
            background: var(--bg-navbar);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 25px rgba(139, 0, 0, 0.1);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            border-bottom: 2px solid var(--bordeaux);
            transition: background 0.3s ease;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: var(--text-primary);
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .nav-link:hover {
            color: var(--bordeaux);
            background: rgba(139, 0, 0, 0.08);
        }

        .profile-avatar-nav {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            border: 2px solid var(--beige-clair);
            box-shadow: 0 2px 10px rgba(139, 0, 0, 0.2);
        }

        .profile-avatar-nav:hover { transform: scale(1.08); }

        .profile-avatar-nav img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 75px;
            right: 20px;
            background: var(--bg-card);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            width: 290px;
            display: none;
            z-index: 1050;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .dropdown-menu-custom.show { display: block; }

        .dropdown-header {
            padding: 25px 20px;
            text-align: center;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .dropdown-name {
            font-weight: 700;
            font-size: 16px;
            color: white;
        }

        .dropdown-email {
            font-size: 12px;
            opacity: 0.8;
            color: white;
        }

        .dropdown-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            margin: 0 auto 12px;
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--beige);
            color: var(--bordeaux);
        }

        .dropdown-item i {
            width: 20px;
            color: var(--bordeaux);
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1040;
            display: none;
        }
        
        .overlay.show {
            display: block;
        }
        
        .dropdown-divider {
            height: 1px;
            background: var(--border-color);
            margin: 8px 0;
        }
        
        .container-main {
            min-height: calc(100vh - 80px);
            padding: 30px 0;
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border: none;
            color: white;
            transition: all 0.3s ease;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.4);
            color: white;
        }

        .admin-card, .card {
            background: var(--bg-card);
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--bordeaux-fonce), var(--bordeaux));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
            color: white;
        }

        .btn-secondary {
            background: var(--beige-fonce);
            border: none;
            color: var(--bordeaux);
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: var(--beige);
            color: var(--bordeaux-fonce);
        }

        .alert-success {
            background-color: var(--alert-success-bg);
            border-left: 4px solid #28a745;
            color: var(--alert-success-text);
        }

        .alert-danger {
            background-color: var(--alert-danger-bg);
            border-left: 4px solid var(--bordeaux);
            color: var(--alert-danger-text);
        }

        .table {
            background: var(--bg-card);
            border-radius: 15px;
            overflow: hidden;
            color: var(--text-primary);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
            color: white;
            border: none;
            padding: 15px;
        }

        .table tbody tr:hover {
            background: var(--table-hover);
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 12px 16px;
            background: var(--input-bg);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--bordeaux);
            box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        }

        .form-label {
            color: var(--marron);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .badge-notif {
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(30%, -30%);
        }

        .dropdown-menu-notif {
            min-width: 320px;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            white-space: normal;
            word-wrap: break-word;
        }

        .notification-item small {
            font-size: 11px;
        }

        /* Bouton mode sombre */
        .theme-toggle {
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: 50px;
            padding: 6px 14px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-primary);
            font-size: 14px;
        }

        .theme-toggle:hover {
            background: var(--bordeaux);
            color: white;
            border-color: var(--bordeaux);
        }

        .theme-toggle i {
            transition: transform 0.3s;
        }

        .theme-toggle:hover i {
            transform: rotate(15deg);
        }

        /* Bouton résumé */
        .btn-summarize {
            background: none;
            border: 1.5px solid var(--border-light);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #6c5ce7;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-summarize:hover {
            border-color: #6c5ce7;
            color: #6c5ce7;
            background: rgba(108,92,231,0.1);
        }
    </style>
</head>
<body>

    <nav class=\"navbar navbar-expand-lg navbar-custom\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"{{ path('app_home') }}\">
                🍽️ <span>KOUL DYERI</span>
            </a>

            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto align-items-center gap-1\">
                    {% if app.user %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_home') }}\"><i class=\"fas fa-home\"></i> Accueil</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_posts_index') }}\"><i class=\"fas fa-newspaper\"></i> Publications</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_produits_index') }}\"><i class=\"fas fa-store\"></i> Produits</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_mes_commandes_index') }}\"><i class=\"fas fa-shopping-cart\"></i> Mes commandes</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_client_livraisons') }}\"><i class=\"fas fa-truck\"></i> Mes livraisons</a>
                        </li>

                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_partenaire_index') }}\"><i class=\"fas fa-handshake\"></i> Partenaire</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_formations_index') }}\"><i class=\"fas fa-graduation-cap\"></i> Formations</a>
                        </li>
                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_mes_inscriptions') }}\">
                                <i class=\"fas fa-calendar-check\"></i> Mes inscriptions
                            </a>
                        </li>

                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_abonnement_index') }}\">
                                <i class=\"fas fa-crown\"></i> Abonnement
                            </a>
                        </li>
                        
                        {% if app.user.role is defined and app.user.role == 'admin' %}
                            <li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"adminDropdown\" role=\"button\" data-bs-toggle=\"dropdown\">
                                    <i class=\"fas fa-crown\"></i> Admin
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_utilisateur_liste') }}\"><i class=\"fas fa-users\"></i> Utilisateurs</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_admin_posts_index') }}\"><i class=\"fas fa-newspaper\"></i> Publications</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_admin_produits_index') }}\"><i class=\"fas fa-box\"></i> Produits</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_admin_commandes_index') }}\"><i class=\"fas fa-shopping-cart\"></i> Commandes</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_admin_formations_index') }}\"><i class=\"fas fa-graduation-cap\"></i> Formations</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li><a class=\"dropdown-item\" href=\"{{ path('app_recompenses_index') }}\"><i class=\"fas fa-gift\"></i> Récompenses</a></li>
                                </ul>
                            </li>
                        {% endif %}

                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"languageDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-globe\"></i> {{ app.request.locale|upper }}
                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"languageDropdown\">
                                <li>
                                    <a class=\"dropdown-item {% if app.request.locale == 'fr' %}active{% endif %}\" href=\"{{ path('app_set_locale', {locale: 'fr'}) }}\">
                                        🇫🇷 Français
                                    </a>
                                </li>
                                <li>
                                    <a class=\"dropdown-item {% if app.request.locale == 'en' %}active{% endif %}\" href=\"{{ path('app_set_locale', {locale: 'en'}) }}\">
                                        🇬🇧 English
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- NOTIFICATIONS -->
                        {% set unreadCount = unread_notifications_count(app.user.idUtilisateur) %}
                        {% set recentNotifs = recent_notifications(app.user.idUtilisateur, 10) %}

                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link position-relative\" href=\"#\" id=\"notificationDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-bell\"></i>
                                {% if unreadCount > 0 %}
                                    <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge-notif\">
                                        {{ unreadCount }}
                                    </span>
                                {% endif %}
                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-notif\" aria-labelledby=\"notificationDropdown\">
                                {% if recentNotifs|length > 0 %}
                                    {% for notif in recentNotifs %}
                                        <li>
                                            {% if notif.postId %}
                                                <a class=\"dropdown-item notification-item {% if not notif.isRead %}bg-light border-start border-primary{% endif %}\"
                                                   href=\"{{ path('app_post_show', {id: notif.postId}) }}\"
                                                   onclick=\"markNotificationAsRead({{ notif.id }})\">
                                                    <div>{{ notif.message }}</div>
                                                    <small class=\"text-muted\">{{ notif.createdAt|date('d/m/Y H:i') }}</small>
                                                </a>
                                            {% else %}
                                                <a class=\"dropdown-item notification-item {% if not notif.isRead %}bg-light border-start border-primary{% endif %}\"
                                                   href=\"#\"
                                                   onclick=\"markNotificationAsRead({{ notif.id }}); return false;\">
                                                    <div>{{ notif.message }}</div>
                                                    <small class=\"text-muted\">{{ notif.createdAt|date('d/m/Y H:i') }}</small>
                                                </a>
                                            {% endif %}
                                        </li>
                                    {% endfor %}
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li>
                                        <a class=\"dropdown-item text-center\" href=\"{{ path('app_notifications_index') }}\">
                                            Voir toutes les notifications
                                        </a>
                                    </li>
                                {% else %}
                                    <li><span class=\"dropdown-item text-muted\">Aucune notification</span></li>
                                {% endif %}
                            </ul>
                        </li>

                        <!-- DEMANDES DE CONNEXION -->
                        {% set pendingRequestsCount = notif_requests_count(app.user.idUtilisateur) %}
                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link position-relative\" href=\"#\" id=\"friendRequestDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <i class=\"fas fa-user-plus\"></i>
                                {% if pendingRequestsCount > 0 %}
                                    <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge-notif\">
                                        {{ pendingRequestsCount }}
                                    </span>
                                {% endif %}
                            </a>
                            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"friendRequestDropdown\">
                                <li>
                                    <a class=\"dropdown-item\" href=\"{{ path('app_notif_requests_list') }}\">
                                        <i class=\"fas fa-users\"></i> Demandes de connexion
                                        {% if pendingRequestsCount > 0 %}
                                            <span class=\"badge bg-danger ms-2\">{{ pendingRequestsCount }}</span>
                                        {% endif %}
                                    </a>
                                </li>
                                <li>
                                    <a class=\"dropdown-item\" href=\"{{ path('app_friends_list') }}\">
                                        <i class=\"fas fa-user-friends\"></i> Mes amis
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- MESSAGERIE -->
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_messages_inbox') }}\" title=\"Messagerie\">
                                <i class=\"fas fa-envelope\"></i>
                            </a>
                        </li>

                        <!-- BOUTON MODE SOMBRE -->
                        <li class=\"nav-item\">
                            <button class=\"theme-toggle\" id=\"themeToggle\">
                                <i class=\"fas fa-moon\" id=\"themeIcon\"></i>
                                <span id=\"themeText\">Mode sombre</span>
                            </button>
                        </li>

                        <li class=\"nav-item ms-3\">
                            <div class=\"profile-avatar-nav\" onclick=\"toggleDropdown()\">
                                {% if app.user.photo is defined and app.user.photo %}
                                    <img src=\"{{ app.user.photo }}\" alt=\"Profil\">
                                {% else %}
                                    <span style=\"color: white; font-weight: 600;\">
                                        {{ app.user.nom|first|upper|default('K') }}
                                    </span>
                                {% endif %}
                            </div>
                        </li>
                    {% else %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('app_login') }}\"><i class=\"fas fa-sign-in-alt\"></i> Connexion</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"btn btn-gradient ms-2\" href=\"{{ path('app_register') }}\">
                                <i class=\"fas fa-user-plus\"></i> Inscription
                            </a>
                        </li>
                    {% endif %}
                </ul>
            </div>
        </div>
    </nav>

    <div class=\"overlay\" id=\"overlay\" onclick=\"toggleDropdown()\"></div>

    <div class=\"dropdown-menu-custom\" id=\"dropdownMenu\">
        <div class=\"dropdown-header\">
            <div class=\"dropdown-avatar\">
                {% if app.user and app.user.photo is defined and app.user.photo %}
                    <img src=\"{{ app.user.photo }}\" alt=\"\">
                {% elseif app.user %}
                    <span style=\"font-size: 36px; color: white;\">
                        {{ app.user.nom|first|upper }}
                    </span>
                {% else %}
                    <span style=\"font-size: 36px; color: white;\">🍽️</span>
                {% endif %}
            </div>
            {% if app.user %}
                <div class=\"dropdown-name\">{{ app.user.nom }}</div>
                <div class=\"dropdown-email\">{{ app.user.email|default('') }}</div>
            {% endif %}
        </div>

        {% if app.user %}
            <a href=\"{{ path('app_mon_profil') }}\" class=\"dropdown-item\">
                <i class=\"fas fa-user\"></i> Mon profil
            </a>
            <a href=\"{{ path('app_utilisateur_editer', {id: app.user.idUtilisateur}) }}\" class=\"dropdown-item\">
                <i class=\"fas fa-edit\"></i> Modifier mon profil
            </a>
            <a href=\"{{ path('app_recompenses_index') }}\" class=\"dropdown-item\">
                <i class=\"fas fa-gift\"></i> Mes récompenses
            </a>
            <a href=\"{{ path('app_historique_index') }}\" class=\"dropdown-item\">
                <i class=\"fas fa-history\"></i> Historique
            </a>
            <div class=\"dropdown-divider\"></div>
            <a href=\"{{ path('app_logout') }}\" class=\"dropdown-item text-danger\">
                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
            </a>
        {% endif %}
    </div>

    <div class=\"container mt-3\">
        {% for label, messages in app.flashes %}
            {% for message in messages %}
                <div class=\"alert alert-{{ label == 'error' ? 'danger' : label }} alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-{{ label == 'success' ? 'check-circle' : (label == 'error' ? 'exclamation-circle' : 'info-circle') }}\"></i>
                    {{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}
        {% endfor %}
    </div>

    <div class=\"container-main\">
        <div class=\"container\">
            {% block body %}{% endblock %}
        </div>
    </div>

    <!-- Modal pour le résumé de texte -->
    <div class=\"modal fade\" id=\"summaryModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">🤖 Résumé automatique</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                </div>
                <div class=\"modal-body\" id=\"summaryModalBody\">
                    <div class=\"text-center\">
                        <div class=\"spinner-border text-primary\" role=\"status\">
                            <span class=\"visually-hidden\">Génération en cours...</span>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    {% block javascripts %}
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            const overlay = document.getElementById('overlay');
            if (dropdown && overlay) {
                dropdown.classList.toggle('show');
                overlay.classList.toggle('show');
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const dropdown = document.getElementById('dropdownMenu');
                const overlay = document.getElementById('overlay');
                if (dropdown && overlay) {
                    dropdown.classList.remove('show');
                    overlay.classList.remove('show');
                }
            }
        });

        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            const overlay = document.getElementById('overlay');
            const avatar = document.querySelector('.profile-avatar-nav');

            if (!avatar || !dropdown) return;

            if (!avatar.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('show');
                overlay.classList.remove('show');
            }
        });

        function markNotificationAsRead(notificationId) {
            fetch(`/notification/\${notificationId}/read`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(console.error);
        }

        // ===== GESTION DU MODE SOMBRE =====
        (function() {
            const savedTheme = localStorage.getItem('koul_dyeri_theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            let theme = savedTheme;
            if (!theme) {
                theme = prefersDark ? 'dark' : 'light';
            }
            
            document.documentElement.setAttribute('data-theme', theme);
            updateThemeUI(theme);
            
            const themeToggle = document.getElementById('themeToggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('koul_dyeri_theme', newTheme);
                    updateThemeUI(newTheme);
                });
            }
            
            function updateThemeUI(theme) {
                const themeIcon = document.getElementById('themeIcon');
                const themeText = document.getElementById('themeText');
                
                if (themeIcon && themeText) {
                    if (theme === 'dark') {
                        themeIcon.className = 'fas fa-sun';
                        themeText.textContent = 'Mode clair';
                    } else {
                        themeIcon.className = 'fas fa-moon';
                        themeText.textContent = 'Mode sombre';
                    }
                }
            }
        })();

        // ========== RÉSUMÉ DE TEXTE ==========
        function summarizeText(text, numSentences = 3) {
            if (!text) return \"Texte vide.\";
            const sentences = text.match(/[^\\.!\\?]+[\\.!\\?]+/g) || [];
            if (sentences.length === 0) return \"Texte trop court ou invalide.\";

            const words = text.toLowerCase().replace(/[^\\w\\s]/g, '').split(/\\s+/);
            const wordFreq = {};
            for (const word of words) {
                if (word.length > 2) wordFreq[word] = (wordFreq[word] || 0) + 1;
            }

            const sentenceScores = {};
            for (const sentence of sentences) {
                const cleanSentence = sentence.toLowerCase().replace(/[^\\w\\s]/g, '');
                const sentenceWords = cleanSentence.split(/\\s+/);
                let score = 0;
                for (const w of sentenceWords) if (wordFreq[w]) score += wordFreq[w];
                sentenceScores[sentence] = score / (sentenceWords.length || 1);
            }

            const best = Object.keys(sentenceScores).sort((a,b) => sentenceScores[b] - sentenceScores[a]).slice(0, numSentences);
            const ordered = sentences.filter(s => best.includes(s));
            return ordered.join(' ');
        }

        function summarizePost(btn) {
            const content = btn.getAttribute('data-content');
            if (!content) {
                alert('Contenu non disponible.');
                return;
            }

            const modal = new bootstrap.Modal(document.getElementById('summaryModal'));
            const modalBody = document.getElementById('summaryModalBody');

            modalBody.innerHTML = `<div class=\"text-center py-4\"><div class=\"spinner-border text-primary\" role=\"status\"></div><p class=\"mt-2 text-muted\">Analyse en cours...</p></div>`;
            modal.show();

            setTimeout(() => {
                const summary = summarizeText(content, 3);
                modalBody.innerHTML = `<div class=\"p-3 bg-light rounded\"><i class=\"fas fa-quote-left text-muted me-2\"></i>\${summary.replace(/\\n/g, '<br>')}</div>`;
            }, 10);
        }
    </script>
    {% endblock %}

</body>
</html>", "base.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\base.html.twig");
    }
}

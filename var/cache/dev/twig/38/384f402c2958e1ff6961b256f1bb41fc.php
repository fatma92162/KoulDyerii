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

/* security/login.html.twig */
class __TwigTemplate_ab9cf686a020aac8c66287f0baf0916f extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

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

        yield "Connexion - Koul Dyeri";
        
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
    .login-container {
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        max-width: 1000px;
        width: 100%;
        animation: fadeInUp 0.7s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .login-left {
        background: linear-gradient(135deg, #2c1810 0%, #8B4513 50%, #D2691E 100%);
        padding: 50px 30px;
        color: white;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .login-left::before {
        content: \"🍽️\";
        position: absolute;
        font-size: 250px;
        bottom: -80px;
        right: -80px;
        opacity: 0.1;
        transform: rotate(-15deg);
    }
    
    .login-left::after {
        content: \"🌶️\";
        position: absolute;
        font-size: 180px;
        top: -50px;
        left: -50px;
        opacity: 0.1;
        transform: rotate(10deg);
    }
    
    .login-left h2 {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 20px;
        position: relative;
    }
    
    .login-left p {
        font-size: 16px;
        opacity: 0.9;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .welcome-text {
        margin-top: 40px;
    }
    
    .welcome-text h3 {
        font-size: 24px;
        margin-bottom: 15px;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
        margin-top: 30px;
    }
    
    .feature-list li {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
    }
    
    .feature-list li i {
        width: 35px;
        height: 35px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }
    
    .spices-decoration {
        margin-top: 40px;
        text-align: center;
        font-size: 50px;
        opacity: 0.6;
    }
    
    .login-right {
        padding: 50px 40px;
        background: white;
    }
    
    .login-right h3 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }
    
    .login-right .subtitle {
        color: #888;
        margin-bottom: 30px;
        font-size: 14px;
    }
    
    .form-group {
        margin-bottom: 25px;
        position: relative;
    }
    
    .form-group label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .form-control {
        border: 2px solid #f0e6d6;
        border-radius: 15px;
        padding: 12px 18px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #fefcf8;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: #D2691E;
        box-shadow: 0 0 0 0.2rem rgba(210, 105, 30, 0.15);
        background: white;
        outline: none;
    }
    
    .form-control.is-invalid {
        border-color: #dc3545;
    }
    
    .password-toggle {
        position: absolute;
        right: 15px;
        top: 45px;
        color: #D2691E;
        cursor: pointer;
        z-index: 10;
    }
    
    .btn-login {
        background: linear-gradient(135deg, #D2691E 0%, #CD853F 100%);
        border: none;
        border-radius: 50px;
        padding: 14px;
        font-weight: 700;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease;
        color: white;
        margin-top: 10px;
    }
    
    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(210, 105, 30, 0.4);
    }
    
    .register-link {
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
        color: #666;
    }
    
    .register-link a {
        color: #D2691E;
        text-decoration: none;
        font-weight: 600;
    }
    
    .register-link a:hover {
        text-decoration: underline;
    }
    
    .forgot-password {
        text-align: right;
        margin-top: -15px;
        margin-bottom: 20px;
    }
    
    .forgot-password a {
        color: #888;
        font-size: 12px;
        text-decoration: none;
    }
    
    .forgot-password a:hover {
        color: #D2691E;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .checkbox-group input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .checkbox-group label {
        margin: 0;
        cursor: pointer;
        font-size: 14px;
        color: #666;
    }
    
    @media (max-width: 768px) {
        .login-left {
            display: none;
        }
        .login-right {
            padding: 30px 25px;
        }
        .login-card {
            max-width: 500px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 267
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 268
        yield "<div class=\"login-container\">
    <div class=\"login-card\">
        <div class=\"row g-0\">
            <!-- Partie gauche -->
            <div class=\"col-md-5 login-left\">
                <h2>🍽️ Koul Dyeri</h2>
                <p>Retrouvez vos saveurs préférées</p>
                
                <div class=\"welcome-text\">
                    <h3>Bon retour !</h3>
                    <p>Connectez-vous pour découvrir les dernières recettes, partager vos créations et profiter de nos offres exclusives.</p>
                </div>
                
                <ul class=\"feature-list\">
                    <li><i class=\"fas fa-utensils\"></i><span>Découvrez des recettes authentiques</span></li>
                    <li><i class=\"fas fa-users\"></i><span>Partagez vos créations culinaires</span></li>
                    <li><i class=\"fas fa-star\"></i><span>Gagnez des points de fidélité</span></li>
                </ul>
                
                <div class=\"spices-decoration\">🌶️ 🍅 🍋 🍞 🧂</div>
            </div>
            
            <!-- Partie droite - Formulaire -->
            <div class=\"col-md-7 login-right\">
                <h3>Connexion</h3>
                <p class=\"subtitle\">Accédez à votre compte culinaire</p>
                
                ";
        // line 295
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 295, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 296
            yield "                    <div class=\"alert alert-danger alert-dismissible fade show\">
                        <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 297
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 297, $this->source); })()), "messageKey", [], "any", false, false, false, 297), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 297, $this->source); })()), "messageData", [], "any", false, false, false, 297), "security"), "html", null, true);
            yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                ";
        }
        // line 301
        yield "
                ";
        // line 303
        yield "                ";
        if (((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 303, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["loginAttemptService"]) || array_key_exists("loginAttemptService", $context) ? $context["loginAttemptService"] : (function () { throw new RuntimeError('Variable "loginAttemptService" does not exist.', 303, $this->source); })()), "isBlocked", [(isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 303, $this->source); })())], "method", false, false, false, 303))) {
            // line 304
            yield "                    <div class=\"alert alert-warning mt-3\">
                        <strong>Compte bloqué</strong> pour 15 minutes. Vous pouvez le débloquer par email.
                        <a href=\"";
            // line 306
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_unlock_request");
            yield "\" class=\"btn btn-sm btn-primary mt-2\">Débloquer maintenant</a>
                    </div>
                    ";
            // line 308
            CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 308, $this->source); })()), "session", [], "any", false, false, false, 308), "set", ["last_blocked_email", (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 308, $this->source); })())], "method", false, false, false, 308);
            // line 309
            yield "                ";
        }
        // line 310
        yield "                
                <form method=\"post\" id=\"loginForm\">
                    <div class=\"form-group\">
                        <label for=\"email\">Adresse email</label>
                        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"";
        // line 314
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 314, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"exemple@email.com\" required autofocus>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"password\">Mot de passe</label>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"••••••••\" required>
                        <i class=\"fas fa-eye password-toggle\" onclick=\"togglePassword()\"></i>
                    </div>
                    
                    <div class=\"forgot-password\">
                        <a href=\"";
        // line 324
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password");
        yield "\">Mot de passe oublié ?</a>
                    </div>
                    
                    <div class=\"checkbox-group\">
                        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\">
                        <label for=\"remember_me\">Se souvenir de moi</label>
                    </div>
                    
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 332
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Bridge\Twig\Extension\CsrfRuntime')->getCsrfToken("authenticate"), "html", null, true);
        yield "\">
                    
                    <button type=\"submit\" class=\"btn-login\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </button>
                    
                    <div class=\"register-link\">
                        Pas encore de compte ? 
                        <a href=\"";
        // line 340
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">Inscrivez-vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordField = document.getElementById('password');
    const icon = document.querySelector('.password-toggle');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    emailInput.addEventListener('input', function() {
        const value = this.value.trim();
        const emailRegex = /^[^\\s@]+@([^\\s@.,]+\\.)+[^\\s@.,]{2,}\$/;
        if (value.length > 0 && !emailRegex.test(value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    passwordInput.addEventListener('input', function() {
        if (this.value.length > 0 && this.value.length < 6) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
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
        return "security/login.html.twig";
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
        return array (  466 => 340,  455 => 332,  444 => 324,  431 => 314,  425 => 310,  422 => 309,  420 => 308,  415 => 306,  411 => 304,  408 => 303,  405 => 301,  398 => 297,  395 => 296,  393 => 295,  364 => 268,  354 => 267,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Connexion - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .login-container {
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        max-width: 1000px;
        width: 100%;
        animation: fadeInUp 0.7s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .login-left {
        background: linear-gradient(135deg, #2c1810 0%, #8B4513 50%, #D2691E 100%);
        padding: 50px 30px;
        color: white;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .login-left::before {
        content: \"🍽️\";
        position: absolute;
        font-size: 250px;
        bottom: -80px;
        right: -80px;
        opacity: 0.1;
        transform: rotate(-15deg);
    }
    
    .login-left::after {
        content: \"🌶️\";
        position: absolute;
        font-size: 180px;
        top: -50px;
        left: -50px;
        opacity: 0.1;
        transform: rotate(10deg);
    }
    
    .login-left h2 {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 20px;
        position: relative;
    }
    
    .login-left p {
        font-size: 16px;
        opacity: 0.9;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .welcome-text {
        margin-top: 40px;
    }
    
    .welcome-text h3 {
        font-size: 24px;
        margin-bottom: 15px;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
        margin-top: 30px;
    }
    
    .feature-list li {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
    }
    
    .feature-list li i {
        width: 35px;
        height: 35px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }
    
    .spices-decoration {
        margin-top: 40px;
        text-align: center;
        font-size: 50px;
        opacity: 0.6;
    }
    
    .login-right {
        padding: 50px 40px;
        background: white;
    }
    
    .login-right h3 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }
    
    .login-right .subtitle {
        color: #888;
        margin-bottom: 30px;
        font-size: 14px;
    }
    
    .form-group {
        margin-bottom: 25px;
        position: relative;
    }
    
    .form-group label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .form-control {
        border: 2px solid #f0e6d6;
        border-radius: 15px;
        padding: 12px 18px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #fefcf8;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: #D2691E;
        box-shadow: 0 0 0 0.2rem rgba(210, 105, 30, 0.15);
        background: white;
        outline: none;
    }
    
    .form-control.is-invalid {
        border-color: #dc3545;
    }
    
    .password-toggle {
        position: absolute;
        right: 15px;
        top: 45px;
        color: #D2691E;
        cursor: pointer;
        z-index: 10;
    }
    
    .btn-login {
        background: linear-gradient(135deg, #D2691E 0%, #CD853F 100%);
        border: none;
        border-radius: 50px;
        padding: 14px;
        font-weight: 700;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease;
        color: white;
        margin-top: 10px;
    }
    
    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(210, 105, 30, 0.4);
    }
    
    .register-link {
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
        color: #666;
    }
    
    .register-link a {
        color: #D2691E;
        text-decoration: none;
        font-weight: 600;
    }
    
    .register-link a:hover {
        text-decoration: underline;
    }
    
    .forgot-password {
        text-align: right;
        margin-top: -15px;
        margin-bottom: 20px;
    }
    
    .forgot-password a {
        color: #888;
        font-size: 12px;
        text-decoration: none;
    }
    
    .forgot-password a:hover {
        color: #D2691E;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .checkbox-group input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .checkbox-group label {
        margin: 0;
        cursor: pointer;
        font-size: 14px;
        color: #666;
    }
    
    @media (max-width: 768px) {
        .login-left {
            display: none;
        }
        .login-right {
            padding: 30px 25px;
        }
        .login-card {
            max-width: 500px;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"login-container\">
    <div class=\"login-card\">
        <div class=\"row g-0\">
            <!-- Partie gauche -->
            <div class=\"col-md-5 login-left\">
                <h2>🍽️ Koul Dyeri</h2>
                <p>Retrouvez vos saveurs préférées</p>
                
                <div class=\"welcome-text\">
                    <h3>Bon retour !</h3>
                    <p>Connectez-vous pour découvrir les dernières recettes, partager vos créations et profiter de nos offres exclusives.</p>
                </div>
                
                <ul class=\"feature-list\">
                    <li><i class=\"fas fa-utensils\"></i><span>Découvrez des recettes authentiques</span></li>
                    <li><i class=\"fas fa-users\"></i><span>Partagez vos créations culinaires</span></li>
                    <li><i class=\"fas fa-star\"></i><span>Gagnez des points de fidélité</span></li>
                </ul>
                
                <div class=\"spices-decoration\">🌶️ 🍅 🍋 🍞 🧂</div>
            </div>
            
            <!-- Partie droite - Formulaire -->
            <div class=\"col-md-7 login-right\">
                <h3>Connexion</h3>
                <p class=\"subtitle\">Accédez à votre compte culinaire</p>
                
                {% if error %}
                    <div class=\"alert alert-danger alert-dismissible fade show\">
                        <i class=\"fas fa-exclamation-circle\"></i> {{ error.messageKey|trans(error.messageData, 'security') }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    </div>
                {% endif %}

                {# Blocage du compte #}
                {% if last_username and loginAttemptService.isBlocked(last_username) %}
                    <div class=\"alert alert-warning mt-3\">
                        <strong>Compte bloqué</strong> pour 15 minutes. Vous pouvez le débloquer par email.
                        <a href=\"{{ path('app_unlock_request') }}\" class=\"btn btn-sm btn-primary mt-2\">Débloquer maintenant</a>
                    </div>
                    {% do app.session.set('last_blocked_email', last_username) %}
                {% endif %}
                
                <form method=\"post\" id=\"loginForm\">
                    <div class=\"form-group\">
                        <label for=\"email\">Adresse email</label>
                        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"{{ last_username }}\" placeholder=\"exemple@email.com\" required autofocus>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"password\">Mot de passe</label>
                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"••••••••\" required>
                        <i class=\"fas fa-eye password-toggle\" onclick=\"togglePassword()\"></i>
                    </div>
                    
                    <div class=\"forgot-password\">
                        <a href=\"{{ path('app_forgot_password') }}\">Mot de passe oublié ?</a>
                    </div>
                    
                    <div class=\"checkbox-group\">
                        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\">
                        <label for=\"remember_me\">Se souvenir de moi</label>
                    </div>
                    
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                    
                    <button type=\"submit\" class=\"btn-login\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </button>
                    
                    <div class=\"register-link\">
                        Pas encore de compte ? 
                        <a href=\"{{ path('app_register') }}\">Inscrivez-vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordField = document.getElementById('password');
    const icon = document.querySelector('.password-toggle');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    emailInput.addEventListener('input', function() {
        const value = this.value.trim();
        const emailRegex = /^[^\\s@]+@([^\\s@.,]+\\.)+[^\\s@.,]{2,}\$/;
        if (value.length > 0 && !emailRegex.test(value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    passwordInput.addEventListener('input', function() {
        if (this.value.length > 0 && this.value.length < 6) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});
</script>
{% endblock %}", "security/login.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\security\\login.html.twig");
    }
}

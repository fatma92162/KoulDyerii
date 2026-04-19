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

/* default/index.html.twig */
class __TwigTemplate_34a02889ae0ad441cb43a9a21a0923be extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/index.html.twig"));

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

        yield "Accueil | Koul Dyeri";
        
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
    .hero-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
    }
    
    .hero-card {
        background: white;
        border-radius: 40px;
        padding: 60px 50px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 0.7s ease-out;
        max-width: 800px;
        margin: 0 auto;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .logo-icon {
        font-size: 80px;
        margin-bottom: 20px;
        animation: bounce 2s ease-in-out infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    .hero-title {
        font-size: 48px;
        font-weight: 800;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 15px;
    }
    
    .slogan {
        font-size: 28px;
        color: #FF6B6B;
        font-style: italic;
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .description {
        color: #666;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 40px;
    }
    
    .btn-group-custom {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 14px 40px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
        color: white;
    }
    
    .btn-outline-custom {
        background: transparent;
        border: 2px solid #FF6B6B;
        border-radius: 50px;
        padding: 14px 40px;
        color: #FF6B6B;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }
    
    .btn-outline-custom:hover {
        background: #FF6B6B;
        color: white;
        transform: translateY(-3px);
    }
    
    .welcome-message {
        background: linear-gradient(135deg, #FF6B6B20 0%, #FF8E5320 100%);
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .hero-card {
            padding: 40px 25px;
        }
        .hero-title {
            font-size: 32px;
        }
        .slogan {
            font-size: 20px;
        }
        .logo-icon {
            font-size: 60px;
        }
        .btn-primary-custom, .btn-outline-custom {
            padding: 12px 30px;
            font-size: 14px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 152
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 153
        yield "<div class=\"hero-section\">
    <div class=\"container\">
        <div class=\"hero-card\">
            <div class=\"logo-icon\">🍽️</div>
            <h1 class=\"hero-title\">KOUL DYERI</h1>
            <div class=\"slogan\">\"Kojintek Bin Ydik\"</div>
            <p class=\"description\">
                Découvrez une expérience culinaire unique avec Koul Dyeri. 
                Des plats savoureux préparés avec passion et des ingrédients frais.
            </p>
            
            ";
        // line 164
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 164, $this->source); })()), "user", [], "any", false, false, false, 164)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 165
            yield "                <div class=\"welcome-message\">
                    <h3>👋 Bonjour, <strong>";
            // line 166
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 166, $this->source); })()), "user", [], "any", false, false, false, 166), "nom", [], "any", false, false, false, 166), "html", null, true);
            yield "</strong> !</h3>
                    <p>Bienvenue sur Koul Dyeri. Que souhaitez-vous faire aujourd'hui ?</p>
                </div>
                <div class=\"btn-group-custom\">
                    <a href=\"";
            // line 170
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
            yield "\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-user\"></i> Voir mon profil
                    </a>
                </div>
            ";
        } else {
            // line 175
            yield "                <div class=\"btn-group-custom\">
                    <a href=\"";
            // line 176
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-user-plus\"></i> Créer un compte
                    </a>
                    <a href=\"";
            // line 179
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn-outline-custom\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </a>
                </div>
            ";
        }
        // line 184
        yield "        </div>
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
        return "default/index.html.twig";
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
        return array (  299 => 184,  291 => 179,  285 => 176,  282 => 175,  274 => 170,  267 => 166,  264 => 165,  262 => 164,  249 => 153,  239 => 152,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Accueil | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .hero-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
    }
    
    .hero-card {
        background: white;
        border-radius: 40px;
        padding: 60px 50px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 0.7s ease-out;
        max-width: 800px;
        margin: 0 auto;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .logo-icon {
        font-size: 80px;
        margin-bottom: 20px;
        animation: bounce 2s ease-in-out infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    .hero-title {
        font-size: 48px;
        font-weight: 800;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 15px;
    }
    
    .slogan {
        font-size: 28px;
        color: #FF6B6B;
        font-style: italic;
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .description {
        color: #666;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 40px;
    }
    
    .btn-group-custom {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 14px 40px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
        color: white;
    }
    
    .btn-outline-custom {
        background: transparent;
        border: 2px solid #FF6B6B;
        border-radius: 50px;
        padding: 14px 40px;
        color: #FF6B6B;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }
    
    .btn-outline-custom:hover {
        background: #FF6B6B;
        color: white;
        transform: translateY(-3px);
    }
    
    .welcome-message {
        background: linear-gradient(135deg, #FF6B6B20 0%, #FF8E5320 100%);
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .hero-card {
            padding: 40px 25px;
        }
        .hero-title {
            font-size: 32px;
        }
        .slogan {
            font-size: 20px;
        }
        .logo-icon {
            font-size: 60px;
        }
        .btn-primary-custom, .btn-outline-custom {
            padding: 12px 30px;
            font-size: 14px;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"hero-section\">
    <div class=\"container\">
        <div class=\"hero-card\">
            <div class=\"logo-icon\">🍽️</div>
            <h1 class=\"hero-title\">KOUL DYERI</h1>
            <div class=\"slogan\">\"Kojintek Bin Ydik\"</div>
            <p class=\"description\">
                Découvrez une expérience culinaire unique avec Koul Dyeri. 
                Des plats savoureux préparés avec passion et des ingrédients frais.
            </p>
            
            {% if app.user %}
                <div class=\"welcome-message\">
                    <h3>👋 Bonjour, <strong>{{ app.user.nom }}</strong> !</h3>
                    <p>Bienvenue sur Koul Dyeri. Que souhaitez-vous faire aujourd'hui ?</p>
                </div>
                <div class=\"btn-group-custom\">
                    <a href=\"{{ path('app_mon_profil') }}\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-user\"></i> Voir mon profil
                    </a>
                </div>
            {% else %}
                <div class=\"btn-group-custom\">
                    <a href=\"{{ path('app_register') }}\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-user-plus\"></i> Créer un compte
                    </a>
                    <a href=\"{{ path('app_login') }}\" class=\"btn-outline-custom\">
                        <i class=\"fas fa-sign-in-alt\"></i> Se connecter
                    </a>
                </div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}", "default/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\default\\index.html.twig");
    }
}

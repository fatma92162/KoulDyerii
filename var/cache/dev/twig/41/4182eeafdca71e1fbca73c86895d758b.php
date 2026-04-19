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

/* home/index.html.twig */
class __TwigTemplate_512fbb2060a6933e045a947e7dd3ad14 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

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

        yield "Koul Dyeri - L'Art Culinaire Tunisien";
        
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
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Amiri:wght@400;700&display=swap');
    
    /* Variables - Nouvelles couleurs */
    :root {
        --bordeaux: #9B1B30;
        --bordeaux-clair: #C41E3A;
        --bordeaux-fonce: #6B1320;
        --beige: #FDF5E6;
        --beige-clair: #FFF8F0;
        --beige-fonce: #F5DEB3;
        --marron: #8B4513;
        --gold: #DAA520;
        --vert-olive: #6B8E23;
        --bleu-medina: #1E3A5F;
    }
    
    /* Hero Section Premium */
    .hero-premium {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 0 0 50px 50px;
        margin-bottom: 80px;
    }
    
    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0a0503 0%, #1a0f0a 50%, #2c1a10 100%);
        z-index: 0;
    }
    
    .hero-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 50%, rgba(155, 27, 48, 0.3) 0%, transparent 50%);
        animation: pulseSlow 8s ease-in-out infinite;
    }
    
    .hero-background::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23DAA520' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        background-repeat: repeat;
        background-size: 60px;
        opacity: 0.5;
    }
    
    @keyframes pulseSlow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.05); }
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        max-width: 900px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .hero-badge {
        display: inline-block;
        background: rgba(218, 165, 32, 0.2);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 12px;
        letter-spacing: 2px;
        margin-bottom: 30px;
        border: 1px solid rgba(218, 165, 32, 0.3);
        color: var(--gold);
    }
    
    .hero-title-arabic {
        font-family: 'Amiri', serif;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--gold);
        letter-spacing: 2px;
    }
    
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 64px;
        font-weight: 800;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #FFFFFF 0%, #DAA520 50%, #C41E3A 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 1s ease-out;
    }
    
    .hero-subtitle {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    
    .hero-buttons {
        animation: fadeInUp 1s ease-out 0.4s both;
    }
    
    .btn-hero-primary {
        background: linear-gradient(135deg, var(--gold), #FFD700);
        border: none;
        border-radius: 50px;
        padding: 14px 40px;
        font-weight: 700;
        color: #1a0f0a;
        transition: all 0.3s ease;
        margin: 0 10px;
    }
    
    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(218, 165, 32, 0.4);
        color: #1a0f0a;
    }
    
    .btn-hero-secondary {
        background: transparent;
        border: 2px solid var(--gold);
        border-radius: 50px;
        padding: 12px 38px;
        font-weight: 700;
        color: white;
        transition: all 0.3s ease;
        margin: 0 10px;
    }
    
    .btn-hero-secondary:hover {
        background: rgba(218, 165, 32, 0.2);
        transform: translateY(-3px);
        border-color: #FFD700;
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
    
    /* Floating elements */
    .floating-element {
        position: absolute;
        pointer-events: none;
        z-index: 1;
    }
    
    .float-1 {
        top: 20%;
        left: 5%;
        animation: float 6s ease-in-out infinite;
    }
    
    .float-2 {
        bottom: 15%;
        right: 5%;
        animation: float 8s ease-in-out infinite reverse;
    }
    
    .float-3 {
        top: 50%;
        right: 10%;
        animation: float 7s ease-in-out infinite 1s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    /* Section des valeurs */
    .values-section {
        padding: 80px 0;
        background: var(--beige-clair);
    }
    
    .value-card {
        text-align: center;
        padding: 40px 20px;
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid var(--beige-fonce);
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(155, 27, 48, 0.1);
        border-color: var(--gold);
    }
    
    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        font-weight: 700;
        color: #2c1810;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(135deg, var(--gold), var(--bordeaux));
        border-radius: 3px;
    }
    
    /* Section Produits Premium */
    .products-premium {
        padding: 80px 0;
        background: white;
    }
    
    .product-card-premium {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    
    .product-card-premium:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(155, 27, 48, 0.2);
    }
    
    .product-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gold);
        color: #1a0f0a;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        z-index: 2;
    }
    
    .product-image-premium {
        height: 280px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.5s ease;
    }
    
    .product-card-premium:hover .product-image-premium {
        transform: scale(1.05);
    }
    
    .product-price-premium {
        font-size: 28px;
        font-weight: 800;
        color: var(--bordeaux);
    }
    
    /* Section CTA */
    .cta-section {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-fonce));
        padding: 80px 0;
        text-align: center;
        color: white;
        border-radius: 30px;
        margin: 50px 0;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '🍽️';
        position: absolute;
        font-size: 200px;
        bottom: -50px;
        right: -50px;
        opacity: 0.1;
    }
    
    /* Section Membres (Admins) */
    .members-section {
        padding: 80px 0;
        background: var(--beige);
    }
    
    .member-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        margin: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }
    
    .member-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(155, 27, 48, 0.2);
    }
    
    .member-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        color: white;
        border: 4px solid var(--gold);
    }
    
    .member-role {
        display: inline-block;
        background: linear-gradient(135deg, var(--gold), #FFA500);
        color: #1a0f0a;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        margin: 15px 0;
    }
    
    .member-social {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
    
    .member-social a {
        width: 35px;
        height: 35px;
        background: var(--beige);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--bordeaux);
        transition: all 0.3s ease;
    }
    
    .member-social a:hover {
        background: var(--bordeaux);
        color: white;
        transform: translateY(-3px);
    }
    
    /* Section Contact Créative */
    .contact-creative {
        padding: 80px 0;
        background: white;
    }
    
    .contact-card {
        background: linear-gradient(135deg, var(--beige-clair), var(--beige));
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .contact-info-item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover {
        transform: translateX(10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }
    
    .contact-form-creative input,
    .contact-form-creative textarea {
        border: 2px solid var(--beige-fonce);
        border-radius: 15px;
        padding: 12px 18px;
        margin-bottom: 20px;
        width: 100%;
        transition: all 0.3s ease;
        background: white;
    }
    
    .contact-form-creative input:focus,
    .contact-form-creative textarea:focus {
        border-color: var(--bordeaux);
        outline: none;
        box-shadow: 0 0 0 3px rgba(155, 27, 48, 0.1);
    }
    
    .btn-send-creative {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        border-radius: 50px;
        padding: 14px 30px;
        color: white;
        font-weight: 700;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .btn-send-creative:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(155, 27, 48, 0.3);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 36px;
        }
        .hero-title-arabic {
            font-size: 24px;
        }
        .hero-buttons .btn {
            display: block;
            margin: 10px 0;
        }
        .member-card {
            margin: 10px;
        }
        .contact-card {
            padding: 30px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 504
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 505
        yield "<!-- Hero Section Premium -->
<section class=\"hero-premium\">
    <div class=\"hero-background\"></div>
    
    <div class=\"floating-element float-1\">
        <i class=\"fas fa-utensils\" style=\"font-size: 60px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    <div class=\"floating-element float-2\">
        <i class=\"fas fa-wine-bottle\" style=\"font-size: 50px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    <div class=\"floating-element float-3\">
        <i class=\"fas fa-mortar-pestle\" style=\"font-size: 45px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    
    <div class=\"hero-content\">
        <div class=\"hero-badge\">
            <i class=\"fas fa-star-of-life\"></i> L'EXCELLENCE CULINAIRE
        </div>
        <div class=\"hero-title-arabic\">
            🌙 مرحبا بيك في كوجينتك 🌙
        </div>
        <h1 class=\"hero-title\">
            L'Art de la Cuisine<br>Tunisienne
        </h1>
        <p class=\"hero-subtitle\">
            Découvrez un univers de saveurs authentiques, de traditions millénaires et de créations culinaires d'exception. 
            Rejoignez la plus prestigieuse communauté gastronomique de Tunisie.
        </p>
        <div class=\"hero-buttons\">
            <a href=\"";
        // line 534
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
        yield "\" class=\"btn btn-hero-primary\">
                <i class=\"fas fa-shopping-cart\"></i> Explorer les produits
            </a>
            <a href=\"";
        // line 537
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" class=\"btn btn-hero-secondary\">
                <i class=\"fas fa-newspaper\"></i> Découvrir les recettes
            </a>
        </div>
    </div>
</section>

<!-- Section Valeurs -->
<section class=\"values-section\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Notre Philosophie</h2>
                <p class=\"text-muted\">L'excellence à chaque étape</p>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-leaf\"></i>
                    </div>
                    <h4>Authenticité</h4>
                    <p>Des recettes transmises de génération en génération, préservant les saveurs authentiques de la Tunisie.</p>
                </div>
            </div>
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-hand-sparkles\"></i>
                    </div>
                    <h4>Qualité Premium</h4>
                    <p>Des produits soigneusement sélectionnés auprès des meilleurs artisans et producteurs locaux.</p>
                </div>
            </div>
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-heart\"></i>
                    </div>
                    <h4>Passion</h4>
                    <p>Une communauté animée par l'amour de la bonne cuisine et du partage.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Produits Premium -->
<section class=\"products-premium\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Produits d'Exception</h2>
                <p class=\"text-muted\">Découvrez notre sélection exclusive</p>
            </div>
        </div>
        <div class=\"row\">
            ";
        // line 595
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 595, $this->source); })()), 0, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 596
            yield "            <div class=\"col-md-4\">
                <div class=\"product-card-premium\">
                    <div class=\"product-badge\">
                        <i class=\"fas fa-star\"></i> Best Seller
                    </div>
                    ";
            // line 601
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 601)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 602
                yield "                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 602), "html", null, true);
                yield "\" class=\"product-image-premium\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 602), "html", null, true);
                yield "\">
                    ";
            } else {
                // line 604
                yield "                        <div class=\"product-image-premium d-flex align-items-center justify-content-center\" style=\"background: linear-gradient(135deg, #F5E6D3, #E8D5B7);\">
                            <i class=\"fas fa-utensils\" style=\"font-size: 60px; color: var(--bordeaux);\"></i>
                        </div>
                    ";
            }
            // line 608
            yield "                    <div class=\"p-4\">
                        <h4 class=\"mb-2\">";
            // line 609
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 609), "html", null, true);
            yield "</h4>
                        <p class=\"text-muted small mb-3\">";
            // line 610
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 610), 0, 100), "html", null, true);
            yield "...</p>
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <span class=\"product-price-premium\">";
            // line 612
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 612), 2, ",", " "), "html", null, true);
            yield " €</span>
                            <a href=\"";
            // line 613
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 613)]), "html", null, true);
            yield "\" class=\"btn btn-hero-primary btn-sm\">
                                Commander
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 621
        yield "        </div>
        <div class=\"text-center mt-5\">
            <a href=\"";
        // line 623
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
        yield "\" class=\"btn btn-hero-primary\">
                Voir toute la collection <i class=\"fas fa-arrow-right\"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Membres (Administrateurs) -->
<section class=\"members-section\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Notre Équipe</h2>
                <p class=\"text-muted\">Des passionnés au service de la gastronomie tunisienne</p>
            </div>
        </div>
        <div class=\"row justify-content-center\">
            ";
        // line 640
        if ((array_key_exists("admins", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["admins"]) || array_key_exists("admins", $context) ? $context["admins"] : (function () { throw new RuntimeError('Variable "admins" does not exist.', 640, $this->source); })())) > 0))) {
            // line 641
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["admins"]) || array_key_exists("admins", $context) ? $context["admins"] : (function () { throw new RuntimeError('Variable "admins" does not exist.', 641, $this->source); })()));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                // line 642
                yield "                <div class=\"col-md-4 mb-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            ";
                // line 645
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "photo", [], "any", false, false, false, 645)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 646
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "photo", [], "any", false, false, false, 646), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "nom", [], "any", false, false, false, 646), "html", null, true);
                    yield "\" style=\"width: 100%; height: 100%; object-fit: cover; border-radius: 50%;\">
                            ";
                } else {
                    // line 648
                    yield "                                <i class=\"fas fa-user-tie\"></i>
                            ";
                }
                // line 650
                yield "                        </div>
                        <h4>";
                // line 651
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "nom", [], "any", false, false, false, 651), "html", null, true);
                yield "</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-crown\"></i> 
                            ";
                // line 654
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 654) == 1)) {
                    // line 655
                    yield "                                Fondateur & CEO
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 656
$context["loop"], "index", [], "any", false, false, false, 656) == 2)) {
                    // line 657
                    yield "                                Chef Exécutif
                            ";
                } else {
                    // line 659
                    yield "                                Administrateur
                            ";
                }
                // line 661
                yield "                        </div>
                        <p>
                            ";
                // line 663
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 663) == 1)) {
                    // line 664
                    yield "                                Passionné de cuisine tunisienne depuis plus de 15 ans, ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "nom", [], "any", false, false, false, 664), "html", null, true);
                    yield " a créé Koul Dyeri pour partager l'authenticité des saveurs de sa terre natale.
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 665
$context["loop"], "index", [], "any", false, false, false, 665) == 2)) {
                    // line 666
                    yield "                                Chef renommé, ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "nom", [], "any", false, false, false, 666), "html", null, true);
                    yield " apporte son expertise culinaire et sa créativité pour sélectionner les meilleures recettes et produits.
                            ";
                } else {
                    // line 668
                    yield "                                Membre dévoué de l'équipe Koul Dyeri, ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["admin"], "nom", [], "any", false, false, false, 668), "html", null, true);
                    yield " contribue à faire vivre la communauté et à promouvoir la cuisine tunisienne.
                            ";
                }
                // line 670
                yield "                        </p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 679
            yield "            ";
        } else {
            // line 680
            yield "                <div class=\"col-12 text-center\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-user-tie\"></i>
                        </div>
                        <h4>Ahmed Ben Salah</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-crown\"></i> Fondateur & CEO
                        </div>
                        <p>Passionné de cuisine tunisienne depuis plus de 15 ans, Ahmed a créé Koul Dyeri pour partager l'authenticité des saveurs de sa terre natale.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-user-chef\"></i>
                        </div>
                        <h4>Nour Ben Ali</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-utensils\"></i> Chef Exécutif
                        </div>
                        <p>Chef renommé, Nour apporte son expertise culinaire et sa créativité pour sélectionner les meilleures recettes et produits.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-chart-line\"></i>
                        </div>
                        <h4>Leila Trabelsi</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-store\"></i> Directrice Commerciale
                        </div>
                        <p>Experte en développement commercial, Leila assure la mise en relation entre les producteurs locaux et notre communauté.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 732
        yield "        </div>
    </div>
</section>

<!-- Section CTA -->
<section class=\"cta-section\">
    <div class=\"container\">
        <div class=\"hero-title-arabic\" style=\"color: var(--gold); font-size: 24px; margin-bottom: 15px;\">
            🌟 اهلا وسهلا 🌟
        </div>
        <h2 class=\"mb-3\">Prêt à vivre l'expérience Koul Dyeri ?</h2>
        <p class=\"mb-4\">Rejoignez notre communauté et découvrez un monde de saveurs</p>
        <a href=\"";
        // line 744
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-hero-primary btn-lg\">
            <i class=\"fas fa-user-plus\"></i> Créer un compte gratuitement
        </a>
    </div>
</section>

<!-- Section Contact Créative -->
<section class=\"contact-creative\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Contactez-nous</h2>
                <p class=\"text-muted\">Nous sommes à votre écoute</p>
            </div>
        </div>
        <div class=\"contact-card\">
            <div class=\"row\">
                <div class=\"col-md-5\">
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-map-marker-alt\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Notre Adresse</h6>
                            <p class=\"mb-0 small\">Centre Urbain Nord, Tunis, Tunisie</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-phone-alt\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Téléphone</h6>
                            <p class=\"mb-0 small\">+216 70 123 456</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-envelope\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Email</h6>
                            <p class=\"mb-0 small\">contact@kouldyeri.tn</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-clock\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Horaires</h6>
                            <p class=\"mb-0 small\">Lun - Ven : 9h - 18h</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-7\">
                    <form class=\"contact-form-creative\" method=\"post\" action=\"";
        // line 800
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <input type=\"text\" name=\"nom\" placeholder=\"Votre nom complet\" required>
                            </div>
                            <div class=\"col-md-6\">
                                <input type=\"email\" name=\"email\" placeholder=\"Votre adresse email\" required>
                            </div>
                        </div>
                        <input type=\"text\" name=\"sujet\" placeholder=\"Sujet de votre message\" required>
                        <textarea name=\"message\" rows=\"5\" placeholder=\"Votre message...\" required></textarea>
                        <button type=\"submit\" class=\"btn-send-creative\">
                            <i class=\"fas fa-paper-plane\"></i> Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Animation au scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.value-card, .product-card-premium, .member-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
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
        return "home/index.html.twig";
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
        return array (  1020 => 800,  961 => 744,  947 => 732,  893 => 680,  890 => 679,  868 => 670,  862 => 668,  856 => 666,  854 => 665,  849 => 664,  847 => 663,  843 => 661,  839 => 659,  835 => 657,  833 => 656,  830 => 655,  828 => 654,  822 => 651,  819 => 650,  815 => 648,  807 => 646,  805 => 645,  800 => 642,  782 => 641,  780 => 640,  760 => 623,  756 => 621,  742 => 613,  738 => 612,  733 => 610,  729 => 609,  726 => 608,  720 => 604,  712 => 602,  710 => 601,  703 => 596,  699 => 595,  638 => 537,  632 => 534,  601 => 505,  591 => 504,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Koul Dyeri - L'Art Culinaire Tunisien{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Amiri:wght@400;700&display=swap');
    
    /* Variables - Nouvelles couleurs */
    :root {
        --bordeaux: #9B1B30;
        --bordeaux-clair: #C41E3A;
        --bordeaux-fonce: #6B1320;
        --beige: #FDF5E6;
        --beige-clair: #FFF8F0;
        --beige-fonce: #F5DEB3;
        --marron: #8B4513;
        --gold: #DAA520;
        --vert-olive: #6B8E23;
        --bleu-medina: #1E3A5F;
    }
    
    /* Hero Section Premium */
    .hero-premium {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 0 0 50px 50px;
        margin-bottom: 80px;
    }
    
    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0a0503 0%, #1a0f0a 50%, #2c1a10 100%);
        z-index: 0;
    }
    
    .hero-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 50%, rgba(155, 27, 48, 0.3) 0%, transparent 50%);
        animation: pulseSlow 8s ease-in-out infinite;
    }
    
    .hero-background::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23DAA520' fill-opacity='0.03' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        background-repeat: repeat;
        background-size: 60px;
        opacity: 0.5;
    }
    
    @keyframes pulseSlow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.05); }
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        max-width: 900px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .hero-badge {
        display: inline-block;
        background: rgba(218, 165, 32, 0.2);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 12px;
        letter-spacing: 2px;
        margin-bottom: 30px;
        border: 1px solid rgba(218, 165, 32, 0.3);
        color: var(--gold);
    }
    
    .hero-title-arabic {
        font-family: 'Amiri', serif;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--gold);
        letter-spacing: 2px;
    }
    
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 64px;
        font-weight: 800;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #FFFFFF 0%, #DAA520 50%, #C41E3A 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 1s ease-out;
    }
    
    .hero-subtitle {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    
    .hero-buttons {
        animation: fadeInUp 1s ease-out 0.4s both;
    }
    
    .btn-hero-primary {
        background: linear-gradient(135deg, var(--gold), #FFD700);
        border: none;
        border-radius: 50px;
        padding: 14px 40px;
        font-weight: 700;
        color: #1a0f0a;
        transition: all 0.3s ease;
        margin: 0 10px;
    }
    
    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(218, 165, 32, 0.4);
        color: #1a0f0a;
    }
    
    .btn-hero-secondary {
        background: transparent;
        border: 2px solid var(--gold);
        border-radius: 50px;
        padding: 12px 38px;
        font-weight: 700;
        color: white;
        transition: all 0.3s ease;
        margin: 0 10px;
    }
    
    .btn-hero-secondary:hover {
        background: rgba(218, 165, 32, 0.2);
        transform: translateY(-3px);
        border-color: #FFD700;
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
    
    /* Floating elements */
    .floating-element {
        position: absolute;
        pointer-events: none;
        z-index: 1;
    }
    
    .float-1 {
        top: 20%;
        left: 5%;
        animation: float 6s ease-in-out infinite;
    }
    
    .float-2 {
        bottom: 15%;
        right: 5%;
        animation: float 8s ease-in-out infinite reverse;
    }
    
    .float-3 {
        top: 50%;
        right: 10%;
        animation: float 7s ease-in-out infinite 1s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    /* Section des valeurs */
    .values-section {
        padding: 80px 0;
        background: var(--beige-clair);
    }
    
    .value-card {
        text-align: center;
        padding: 40px 20px;
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid var(--beige-fonce);
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(155, 27, 48, 0.1);
        border-color: var(--gold);
    }
    
    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        font-weight: 700;
        color: #2c1810;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(135deg, var(--gold), var(--bordeaux));
        border-radius: 3px;
    }
    
    /* Section Produits Premium */
    .products-premium {
        padding: 80px 0;
        background: white;
    }
    
    .product-card-premium {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    
    .product-card-premium:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(155, 27, 48, 0.2);
    }
    
    .product-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gold);
        color: #1a0f0a;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        z-index: 2;
    }
    
    .product-image-premium {
        height: 280px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.5s ease;
    }
    
    .product-card-premium:hover .product-image-premium {
        transform: scale(1.05);
    }
    
    .product-price-premium {
        font-size: 28px;
        font-weight: 800;
        color: var(--bordeaux);
    }
    
    /* Section CTA */
    .cta-section {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-fonce));
        padding: 80px 0;
        text-align: center;
        color: white;
        border-radius: 30px;
        margin: 50px 0;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '🍽️';
        position: absolute;
        font-size: 200px;
        bottom: -50px;
        right: -50px;
        opacity: 0.1;
    }
    
    /* Section Membres (Admins) */
    .members-section {
        padding: 80px 0;
        background: var(--beige);
    }
    
    .member-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        margin: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }
    
    .member-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(155, 27, 48, 0.2);
    }
    
    .member-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        color: white;
        border: 4px solid var(--gold);
    }
    
    .member-role {
        display: inline-block;
        background: linear-gradient(135deg, var(--gold), #FFA500);
        color: #1a0f0a;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        margin: 15px 0;
    }
    
    .member-social {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
    
    .member-social a {
        width: 35px;
        height: 35px;
        background: var(--beige);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--bordeaux);
        transition: all 0.3s ease;
    }
    
    .member-social a:hover {
        background: var(--bordeaux);
        color: white;
        transform: translateY(-3px);
    }
    
    /* Section Contact Créative */
    .contact-creative {
        padding: 80px 0;
        background: white;
    }
    
    .contact-card {
        background: linear-gradient(135deg, var(--beige-clair), var(--beige));
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .contact-info-item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover {
        transform: translateX(10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--bordeaux), var(--gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }
    
    .contact-form-creative input,
    .contact-form-creative textarea {
        border: 2px solid var(--beige-fonce);
        border-radius: 15px;
        padding: 12px 18px;
        margin-bottom: 20px;
        width: 100%;
        transition: all 0.3s ease;
        background: white;
    }
    
    .contact-form-creative input:focus,
    .contact-form-creative textarea:focus {
        border-color: var(--bordeaux);
        outline: none;
        box-shadow: 0 0 0 3px rgba(155, 27, 48, 0.1);
    }
    
    .btn-send-creative {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        border-radius: 50px;
        padding: 14px 30px;
        color: white;
        font-weight: 700;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .btn-send-creative:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(155, 27, 48, 0.3);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 36px;
        }
        .hero-title-arabic {
            font-size: 24px;
        }
        .hero-buttons .btn {
            display: block;
            margin: 10px 0;
        }
        .member-card {
            margin: 10px;
        }
        .contact-card {
            padding: 30px;
        }
    }
</style>
{% endblock %}

{% block body %}
<!-- Hero Section Premium -->
<section class=\"hero-premium\">
    <div class=\"hero-background\"></div>
    
    <div class=\"floating-element float-1\">
        <i class=\"fas fa-utensils\" style=\"font-size: 60px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    <div class=\"floating-element float-2\">
        <i class=\"fas fa-wine-bottle\" style=\"font-size: 50px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    <div class=\"floating-element float-3\">
        <i class=\"fas fa-mortar-pestle\" style=\"font-size: 45px; color: rgba(218, 165, 32, 0.2);\"></i>
    </div>
    
    <div class=\"hero-content\">
        <div class=\"hero-badge\">
            <i class=\"fas fa-star-of-life\"></i> L'EXCELLENCE CULINAIRE
        </div>
        <div class=\"hero-title-arabic\">
            🌙 مرحبا بيك في كوجينتك 🌙
        </div>
        <h1 class=\"hero-title\">
            L'Art de la Cuisine<br>Tunisienne
        </h1>
        <p class=\"hero-subtitle\">
            Découvrez un univers de saveurs authentiques, de traditions millénaires et de créations culinaires d'exception. 
            Rejoignez la plus prestigieuse communauté gastronomique de Tunisie.
        </p>
        <div class=\"hero-buttons\">
            <a href=\"{{ path('app_produits_index') }}\" class=\"btn btn-hero-primary\">
                <i class=\"fas fa-shopping-cart\"></i> Explorer les produits
            </a>
            <a href=\"{{ path('app_posts_index') }}\" class=\"btn btn-hero-secondary\">
                <i class=\"fas fa-newspaper\"></i> Découvrir les recettes
            </a>
        </div>
    </div>
</section>

<!-- Section Valeurs -->
<section class=\"values-section\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Notre Philosophie</h2>
                <p class=\"text-muted\">L'excellence à chaque étape</p>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-leaf\"></i>
                    </div>
                    <h4>Authenticité</h4>
                    <p>Des recettes transmises de génération en génération, préservant les saveurs authentiques de la Tunisie.</p>
                </div>
            </div>
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-hand-sparkles\"></i>
                    </div>
                    <h4>Qualité Premium</h4>
                    <p>Des produits soigneusement sélectionnés auprès des meilleurs artisans et producteurs locaux.</p>
                </div>
            </div>
            <div class=\"col-md-4 mb-4\">
                <div class=\"value-card\">
                    <div class=\"value-icon\">
                        <i class=\"fas fa-heart\"></i>
                    </div>
                    <h4>Passion</h4>
                    <p>Une communauté animée par l'amour de la bonne cuisine et du partage.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Produits Premium -->
<section class=\"products-premium\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Produits d'Exception</h2>
                <p class=\"text-muted\">Découvrez notre sélection exclusive</p>
            </div>
        </div>
        <div class=\"row\">
            {% for produit in produits|slice(0, 3) %}
            <div class=\"col-md-4\">
                <div class=\"product-card-premium\">
                    <div class=\"product-badge\">
                        <i class=\"fas fa-star\"></i> Best Seller
                    </div>
                    {% if produit.photo %}
                        <img src=\"{{ produit.photo }}\" class=\"product-image-premium\" alt=\"{{ produit.nom }}\">
                    {% else %}
                        <div class=\"product-image-premium d-flex align-items-center justify-content-center\" style=\"background: linear-gradient(135deg, #F5E6D3, #E8D5B7);\">
                            <i class=\"fas fa-utensils\" style=\"font-size: 60px; color: var(--bordeaux);\"></i>
                        </div>
                    {% endif %}
                    <div class=\"p-4\">
                        <h4 class=\"mb-2\">{{ produit.nom }}</h4>
                        <p class=\"text-muted small mb-3\">{{ produit.description|slice(0, 100) }}...</p>
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <span class=\"product-price-premium\">{{ produit.prix|number_format(2, ',', ' ') }} €</span>
                            <a href=\"{{ path('app_produits_show', {id: produit.idProduit}) }}\" class=\"btn btn-hero-primary btn-sm\">
                                Commander
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
        <div class=\"text-center mt-5\">
            <a href=\"{{ path('app_produits_index') }}\" class=\"btn btn-hero-primary\">
                Voir toute la collection <i class=\"fas fa-arrow-right\"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Membres (Administrateurs) -->
<section class=\"members-section\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Notre Équipe</h2>
                <p class=\"text-muted\">Des passionnés au service de la gastronomie tunisienne</p>
            </div>
        </div>
        <div class=\"row justify-content-center\">
            {% if admins is defined and admins|length > 0 %}
                {% for admin in admins %}
                <div class=\"col-md-4 mb-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            {% if admin.photo %}
                                <img src=\"{{ admin.photo }}\" alt=\"{{ admin.nom }}\" style=\"width: 100%; height: 100%; object-fit: cover; border-radius: 50%;\">
                            {% else %}
                                <i class=\"fas fa-user-tie\"></i>
                            {% endif %}
                        </div>
                        <h4>{{ admin.nom }}</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-crown\"></i> 
                            {% if loop.index == 1 %}
                                Fondateur & CEO
                            {% elseif loop.index == 2 %}
                                Chef Exécutif
                            {% else %}
                                Administrateur
                            {% endif %}
                        </div>
                        <p>
                            {% if loop.index == 1 %}
                                Passionné de cuisine tunisienne depuis plus de 15 ans, {{ admin.nom }} a créé Koul Dyeri pour partager l'authenticité des saveurs de sa terre natale.
                            {% elseif loop.index == 2 %}
                                Chef renommé, {{ admin.nom }} apporte son expertise culinaire et sa créativité pour sélectionner les meilleures recettes et produits.
                            {% else %}
                                Membre dévoué de l'équipe Koul Dyeri, {{ admin.nom }} contribue à faire vivre la communauté et à promouvoir la cuisine tunisienne.
                            {% endif %}
                        </p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                {% endfor %}
            {% else %}
                <div class=\"col-12 text-center\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-user-tie\"></i>
                        </div>
                        <h4>Ahmed Ben Salah</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-crown\"></i> Fondateur & CEO
                        </div>
                        <p>Passionné de cuisine tunisienne depuis plus de 15 ans, Ahmed a créé Koul Dyeri pour partager l'authenticité des saveurs de sa terre natale.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-user-chef\"></i>
                        </div>
                        <h4>Nour Ben Ali</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-utensils\"></i> Chef Exécutif
                        </div>
                        <p>Chef renommé, Nour apporte son expertise culinaire et sa créativité pour sélectionner les meilleures recettes et produits.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"member-card\">
                        <div class=\"member-avatar\">
                            <i class=\"fas fa-chart-line\"></i>
                        </div>
                        <h4>Leila Trabelsi</h4>
                        <div class=\"member-role\">
                            <i class=\"fas fa-store\"></i> Directrice Commerciale
                        </div>
                        <p>Experte en développement commercial, Leila assure la mise en relation entre les producteurs locaux et notre communauté.</p>
                        <div class=\"member-social\">
                            <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                            <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                        </div>
                    </div>
                </div>
            {% endif %}
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class=\"cta-section\">
    <div class=\"container\">
        <div class=\"hero-title-arabic\" style=\"color: var(--gold); font-size: 24px; margin-bottom: 15px;\">
            🌟 اهلا وسهلا 🌟
        </div>
        <h2 class=\"mb-3\">Prêt à vivre l'expérience Koul Dyeri ?</h2>
        <p class=\"mb-4\">Rejoignez notre communauté et découvrez un monde de saveurs</p>
        <a href=\"{{ path('app_register') }}\" class=\"btn btn-hero-primary btn-lg\">
            <i class=\"fas fa-user-plus\"></i> Créer un compte gratuitement
        </a>
    </div>
</section>

<!-- Section Contact Créative -->
<section class=\"contact-creative\">
    <div class=\"container\">
        <div class=\"row text-center mb-5\">
            <div class=\"col-12\">
                <h2 class=\"section-title\">Contactez-nous</h2>
                <p class=\"text-muted\">Nous sommes à votre écoute</p>
            </div>
        </div>
        <div class=\"contact-card\">
            <div class=\"row\">
                <div class=\"col-md-5\">
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-map-marker-alt\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Notre Adresse</h6>
                            <p class=\"mb-0 small\">Centre Urbain Nord, Tunis, Tunisie</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-phone-alt\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Téléphone</h6>
                            <p class=\"mb-0 small\">+216 70 123 456</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-envelope\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Email</h6>
                            <p class=\"mb-0 small\">contact@kouldyeri.tn</p>
                        </div>
                    </div>
                    <div class=\"contact-info-item\">
                        <div class=\"contact-icon\">
                            <i class=\"fas fa-clock\"></i>
                        </div>
                        <div>
                            <h6 class=\"mb-1\">Horaires</h6>
                            <p class=\"mb-0 small\">Lun - Ven : 9h - 18h</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-7\">
                    <form class=\"contact-form-creative\" method=\"post\" action=\"{{ path('app_contact') }}\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <input type=\"text\" name=\"nom\" placeholder=\"Votre nom complet\" required>
                            </div>
                            <div class=\"col-md-6\">
                                <input type=\"email\" name=\"email\" placeholder=\"Votre adresse email\" required>
                            </div>
                        </div>
                        <input type=\"text\" name=\"sujet\" placeholder=\"Sujet de votre message\" required>
                        <textarea name=\"message\" rows=\"5\" placeholder=\"Votre message...\" required></textarea>
                        <button type=\"submit\" class=\"btn-send-creative\">
                            <i class=\"fas fa-paper-plane\"></i> Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Animation au scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.value-card, .product-card-premium, .member-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
});
</script>
{% endblock %}", "home/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\home\\index.html.twig");
    }
}

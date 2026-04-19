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

/* friend/profile.html.twig */
class __TwigTemplate_7ead560be24dbd23be70cdbf05842d1d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "friend/profile.html.twig"));

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

        yield "Profil de ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
    /* ===== STYLE MODERNE AVEC ANIMATIONS ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --gold: #FFD700;
    }

    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Animation fadeIn */
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

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }

    /* Carte profil */
    .profile-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInLeft 0.6s ease-out;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(139,0,0,0.15);
    }

    .profile-header {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        padding: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '👤';
        position: absolute;
        bottom: -20px;
        right: -20px;
        font-size: 100px;
        opacity: 0.1;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        margin: 0 auto 15px;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--bordeaux-light), var(--bordeaux));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        font-weight: bold;
        color: white;
    }

    .profile-name {
        font-size: 28px;
        font-weight: 800;
        color: white;
        margin-bottom: 8px;
    }

    .profile-username {
        font-size: 14px;
        color: rgba(255,255,255,0.8);
        margin-bottom: 15px;
    }

    .profile-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        color: white;
    }

    .profile-body {
        padding: 25px;
    }

    .info-row {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .info-row:hover {
        background: #fef5f5;
        transform: translateX(5px);
        padding-left: 10px;
    }

    .info-icon {
        width: 40px;
        color: var(--bordeaux);
        font-size: 18px;
    }

    .info-label {
        width: 100px;
        font-size: 13px;
        color: #888;
    }

    .info-value {
        flex: 1;
        font-weight: 500;
        color: #333;
    }

    .friends-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        margin: 15px 0;
        animation: pulse 2s infinite;
    }

    /* Bouton retour */
    .btn-back {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.3);
        color: white;
    }

    /* Section publications */
    .publications-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInRight 0.6s ease-out;
    }

    .publications-header {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        padding: 20px 25px;
        color: white;
    }

    .publications-header h4 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .post-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #f0e6d6;
        transition: all 0.3s;
        animation: fadeInUp 0.5s ease-out;
    }

    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139,0,0,0.1);
        border-color: var(--bordeaux-light);
    }

    .post-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--bordeaux);
        margin-bottom: 10px;
    }

    .post-content {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .post-meta {
        font-size: 12px;
        color: #999;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .post-stats {
        display: flex;
        gap: 20px;
        padding-top: 12px;
        border-top: 1px solid #f0e6d6;
    }

    .post-stats span {
        font-size: 13px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .post-stats i {
        font-size: 14px;
    }

    .fa-heart { color: #e74c3c; }
    .fa-comment { color: var(--bordeaux); }

    /* Empty state */
    .empty-posts {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-posts i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 20px;
    }

    .empty-posts p {
        color: #888;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-container {
            padding: 15px;
        }
        .profile-name {
            font-size: 22px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
        }
        .info-row {
            flex-wrap: wrap;
            gap: 8px;
        }
        .info-label {
            width: auto;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 348
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 349
        yield "<div class=\"profile-container\">
    <div class=\"row g-4\">
        <!-- Colonne gauche - Profil -->
        <div class=\"col-md-4\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar\">
                        ";
        // line 356
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 356, $this->source); })()), "photo", [], "any", false, false, false, 356)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 357
            yield "                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 357, $this->source); })()), "photo", [], "any", false, false, false, 357), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 357, $this->source); })()), "nom", [], "any", false, false, false, 357), "html", null, true);
            yield "\">
                        ";
        } else {
            // line 359
            yield "                            <div class=\"avatar-placeholder\">
                                ";
            // line 360
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 360, $this->source); })()), "nom", [], "any", false, false, false, 360))), "html", null, true);
            yield "
                            </div>
                        ";
        }
        // line 363
        yield "                    </div>
                    <div class=\"profile-name\">";
        // line 364
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 364, $this->source); })()), "nom", [], "any", false, false, false, 364), "html", null, true);
        yield "</div>
                    <div class=\"profile-username\">@";
        // line 365
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 365, $this->source); })()), "email", [], "any", false, false, false, 365), "@")), "html", null, true);
        yield "</div>
                    <span class=\"profile-badge\">
                        <i class=\"fas fa-utensils\"></i> Food Lover
                    </span>
                </div>
                <div class=\"profile-body\">
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-map-marker-alt\"></i></div>
                        <div class=\"info-label\">Région</div>
                        <div class=\"info-value\">";
        // line 374
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 374, $this->source); })()), "region", [], "any", false, false, false, 374)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 374, $this->source); })()), "region", [], "any", false, false, false, 374), "html", null, true)) : ("Non renseignée"));
        yield "</div>
                    </div>
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-calendar-alt\"></i></div>
                        <div class=\"info-label\">Membre depuis</div>
                        <div class=\"info-value\">2024</div>
                    </div>
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-envelope\"></i></div>
                        <div class=\"info-label\">Email</div>
                        <div class=\"info-value\">";
        // line 384
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 384, $this->source); })()), "email", [], "any", false, false, false, 384), "html", null, true);
        yield "</div>
                    </div>
                    
                    ";
        // line 387
        if ((($tmp = (isset($context["areFriends"]) || array_key_exists("areFriends", $context) ? $context["areFriends"] : (function () { throw new RuntimeError('Variable "areFriends" does not exist.', 387, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 388
            yield "                        <div class=\"friends-badge\">
                            <i class=\"fas fa-user-check\"></i> Vous êtes amis
                        </div>
                    ";
        }
        // line 392
        yield "                    
                    <a href=\"";
        // line 393
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_friends_list");
        yield "\" class=\"btn-back\">
                        <i class=\"fas fa-arrow-left\"></i> Retour à mes amis
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Colonne droite - Publications -->
        <div class=\"col-md-8\">
            <div class=\"publications-card\">
                <div class=\"publications-header\">
                    <h4>
                        <i class=\"fas fa-newspaper\"></i>
                        Publications de ";
        // line 406
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 406, $this->source); })()), "nom", [], "any", false, false, false, 406), "html", null, true);
        yield "
                    </h4>
                </div>
                <div class=\"card-body p-4\">
                    ";
        // line 410
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 410, $this->source); })())) > 0)) {
            // line 411
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 411, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 412
                yield "                            <div class=\"post-card\">
                                <div class=\"post-title\">";
                // line 413
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 413), "html", null, true);
                yield "</div>
                                <div class=\"post-content\">";
                // line 414
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 414), 0, 200), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 414)) > 200)) {
                    yield "...";
                }
                yield "</div>
                                <div class=\"post-meta\">
                                    <span><i class=\"fas fa-clock\"></i> ";
                // line 416
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 416), "d/m/Y H:i"), "html", null, true);
                yield "</span>
                                </div>
                                <div class=\"post-stats\">
                                    <span><i class=\"fas fa-heart\"></i> ";
                // line 419
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likesCount", [], "any", true, true, false, 419)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likesCount", [], "any", false, false, false, 419), 0)) : (0)), "html", null, true);
                yield " likes</span>
                                    <span><i class=\"fas fa-comment\"></i> ";
                // line 420
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentsCount", [], "any", true, true, false, 420)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentsCount", [], "any", false, false, false, 420), 0)) : (0)), "html", null, true);
                yield " commentaires</span>
                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 424
            yield "                    ";
        } else {
            // line 425
            yield "                        <div class=\"empty-posts\">
                            <i class=\"fas fa-newspaper\"></i>
                            <h4>Aucune publication</h4>
                            <p>";
            // line 428
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friend"]) || array_key_exists("friend", $context) ? $context["friend"] : (function () { throw new RuntimeError('Variable "friend" does not exist.', 428, $this->source); })()), "nom", [], "any", false, false, false, 428), "html", null, true);
            yield " n'a pas encore partagé de publication.</p>
                        </div>
                    ";
        }
        // line 431
        yield "                </div>
            </div>
        </div>
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
        return "friend/profile.html.twig";
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
        return array (  602 => 431,  596 => 428,  591 => 425,  588 => 424,  578 => 420,  574 => 419,  568 => 416,  560 => 414,  556 => 413,  553 => 412,  548 => 411,  546 => 410,  539 => 406,  523 => 393,  520 => 392,  514 => 388,  512 => 387,  506 => 384,  493 => 374,  481 => 365,  477 => 364,  474 => 363,  468 => 360,  465 => 359,  457 => 357,  455 => 356,  446 => 349,  436 => 348,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Profil de {{ friend.nom }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    /* ===== STYLE MODERNE AVEC ANIMATIONS ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --gold: #FFD700;
    }

    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Animation fadeIn */
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

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }

    /* Carte profil */
    .profile-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInLeft 0.6s ease-out;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(139,0,0,0.15);
    }

    .profile-header {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        padding: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '👤';
        position: absolute;
        bottom: -20px;
        right: -20px;
        font-size: 100px;
        opacity: 0.1;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        margin: 0 auto 15px;
        border: 4px solid white;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--bordeaux-light), var(--bordeaux));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        font-weight: bold;
        color: white;
    }

    .profile-name {
        font-size: 28px;
        font-weight: 800;
        color: white;
        margin-bottom: 8px;
    }

    .profile-username {
        font-size: 14px;
        color: rgba(255,255,255,0.8);
        margin-bottom: 15px;
    }

    .profile-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 12px;
        color: white;
    }

    .profile-body {
        padding: 25px;
    }

    .info-row {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .info-row:hover {
        background: #fef5f5;
        transform: translateX(5px);
        padding-left: 10px;
    }

    .info-icon {
        width: 40px;
        color: var(--bordeaux);
        font-size: 18px;
    }

    .info-label {
        width: 100px;
        font-size: 13px;
        color: #888;
    }

    .info-value {
        flex: 1;
        font-weight: 500;
        color: #333;
    }

    .friends-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        margin: 15px 0;
        animation: pulse 2s infinite;
    }

    /* Bouton retour */
    .btn-back {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.3);
        color: white;
    }

    /* Section publications */
    .publications-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInRight 0.6s ease-out;
    }

    .publications-header {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        padding: 20px 25px;
        color: white;
    }

    .publications-header h4 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .post-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #f0e6d6;
        transition: all 0.3s;
        animation: fadeInUp 0.5s ease-out;
    }

    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139,0,0,0.1);
        border-color: var(--bordeaux-light);
    }

    .post-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--bordeaux);
        margin-bottom: 10px;
    }

    .post-content {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .post-meta {
        font-size: 12px;
        color: #999;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .post-stats {
        display: flex;
        gap: 20px;
        padding-top: 12px;
        border-top: 1px solid #f0e6d6;
    }

    .post-stats span {
        font-size: 13px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .post-stats i {
        font-size: 14px;
    }

    .fa-heart { color: #e74c3c; }
    .fa-comment { color: var(--bordeaux); }

    /* Empty state */
    .empty-posts {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-posts i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 20px;
    }

    .empty-posts p {
        color: #888;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-container {
            padding: 15px;
        }
        .profile-name {
            font-size: 22px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
        }
        .info-row {
            flex-wrap: wrap;
            gap: 8px;
        }
        .info-label {
            width: auto;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"profile-container\">
    <div class=\"row g-4\">
        <!-- Colonne gauche - Profil -->
        <div class=\"col-md-4\">
            <div class=\"profile-card\">
                <div class=\"profile-header\">
                    <div class=\"profile-avatar\">
                        {% if friend.photo %}
                            <img src=\"{{ friend.photo }}\" alt=\"{{ friend.nom }}\">
                        {% else %}
                            <div class=\"avatar-placeholder\">
                                {{ friend.nom|first|upper }}
                            </div>
                        {% endif %}
                    </div>
                    <div class=\"profile-name\">{{ friend.nom }}</div>
                    <div class=\"profile-username\">@{{ friend.email|split('@')|first }}</div>
                    <span class=\"profile-badge\">
                        <i class=\"fas fa-utensils\"></i> Food Lover
                    </span>
                </div>
                <div class=\"profile-body\">
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-map-marker-alt\"></i></div>
                        <div class=\"info-label\">Région</div>
                        <div class=\"info-value\">{{ friend.region ?: 'Non renseignée' }}</div>
                    </div>
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-calendar-alt\"></i></div>
                        <div class=\"info-label\">Membre depuis</div>
                        <div class=\"info-value\">2024</div>
                    </div>
                    <div class=\"info-row\">
                        <div class=\"info-icon\"><i class=\"fas fa-envelope\"></i></div>
                        <div class=\"info-label\">Email</div>
                        <div class=\"info-value\">{{ friend.email }}</div>
                    </div>
                    
                    {% if areFriends %}
                        <div class=\"friends-badge\">
                            <i class=\"fas fa-user-check\"></i> Vous êtes amis
                        </div>
                    {% endif %}
                    
                    <a href=\"{{ path('app_friends_list') }}\" class=\"btn-back\">
                        <i class=\"fas fa-arrow-left\"></i> Retour à mes amis
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Colonne droite - Publications -->
        <div class=\"col-md-8\">
            <div class=\"publications-card\">
                <div class=\"publications-header\">
                    <h4>
                        <i class=\"fas fa-newspaper\"></i>
                        Publications de {{ friend.nom }}
                    </h4>
                </div>
                <div class=\"card-body p-4\">
                    {% if posts|length > 0 %}
                        {% for post in posts %}
                            <div class=\"post-card\">
                                <div class=\"post-title\">{{ post.title }}</div>
                                <div class=\"post-content\">{{ post.content|slice(0, 200) }}{% if post.content|length > 200 %}...{% endif %}</div>
                                <div class=\"post-meta\">
                                    <span><i class=\"fas fa-clock\"></i> {{ post.createdAt|date('d/m/Y H:i') }}</span>
                                </div>
                                <div class=\"post-stats\">
                                    <span><i class=\"fas fa-heart\"></i> {{ post.likesCount|default(0) }} likes</span>
                                    <span><i class=\"fas fa-comment\"></i> {{ post.commentsCount|default(0) }} commentaires</span>
                                </div>
                            </div>
                        {% endfor %}
                    {% else %}
                        <div class=\"empty-posts\">
                            <i class=\"fas fa-newspaper\"></i>
                            <h4>Aucune publication</h4>
                            <p>{{ friend.nom }} n'a pas encore partagé de publication.</p>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "friend/profile.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\friend\\profile.html.twig");
    }
}

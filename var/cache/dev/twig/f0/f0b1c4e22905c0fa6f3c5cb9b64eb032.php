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

/* friend/friends.html.twig */
class __TwigTemplate_4fd9968c903402c071c7a9f589c34c53 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "friend/friends.html.twig"));

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

        yield "Mes amis";
        
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
    /* ===== STYLE MODERNE MÊME QUE LA PAGE D'AJOUT D'AMIS ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --gold: #FFD700;
    }

    body {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
    }

    .friends-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background: transparent;
    }

    /* Header */
    .friends-header {
        margin-bottom: 25px;
        padding: 0 10px;
    }

    .friends-header h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
        letter-spacing: -0.5px;
        margin-bottom: 5px;
    }

    .friends-header p {
        font-size: 14px;
        color: #888;
    }

    /* Compteur d'amis */
    .friends-count {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid rgba(139,0,0,0.1);
    }

    .friends-count span:first-child {
        font-weight: 600;
        color: #666;
    }

    .friends-count span:last-child {
        font-size: 28px;
        font-weight: 800;
        color: var(--bordeaux);
    }

    /* Liste des amis - vertical style Snapchat */
    .friends-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .friend-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .friend-item:last-child {
        border-bottom: none;
    }

    .friend-item:hover {
        background: #fef5f5;
        transform: translateX(5px);
    }

    .friend-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .friend-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--bordeaux-light);
    }

    .avatar-placeholder {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 22px;
        font-weight: bold;
        border: 2px solid var(--gold);
    }

    .friend-details {
        flex: 1;
    }

    .friend-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .friend-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .friend-region {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .friend-region i {
        margin-right: 3px;
        font-size: 9px;
    }

    .friend-actions {
        display: flex;
        gap: 10px;
    }

    .btn-view {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-view:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
        color: white;
    }

    .btn-message {
        background: transparent;
        border: 1px solid #e0e0e0;
        color: #666;
        padding: 8px 15px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-message:hover {
        background: #f5f5f5;
        color: var(--bordeaux);
        border-color: var(--bordeaux-light);
    }

    /* Footer */
    .friends-footer {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .btn-requests {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-requests:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139,0,0,0.3);
        color: white;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .friend-item {
        animation: fadeInUp 0.3s ease-out forwards;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }

    .empty-state i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: var(--bordeaux);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #888;
        margin-bottom: 20px;
    }

    .btn-empty {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-empty:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139,0,0,0.3);
        color: white;
    }

    /* Responsive */
    @media (max-width: 550px) {
        .friends-container {
            padding: 15px;
        }
        .friend-item {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .friend-info {
            flex-direction: column;
        }
        .friend-actions {
            width: 100%;
        }
        .btn-view, .btn-message {
            flex: 1;
            justify-content: center;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 324
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 325
        yield "<div class=\"friends-container\">
    <!-- Header -->
    <div class=\"friends-header\">
        <h1><i class=\"fas fa-user-friends\"></i> Mes amis</h1>
        <p>Retrouvez tous vos contacts culinaires</p>
    </div>

    <!-- Compteur d'amis -->
    <div class=\"friends-count\">
        <span><i class=\"fas fa-users\"></i> Amis</span>
        <span>";
        // line 335
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["friends"]) || array_key_exists("friends", $context) ? $context["friends"] : (function () { throw new RuntimeError('Variable "friends" does not exist.', 335, $this->source); })())), "html", null, true);
        yield "</span>
    </div>

    <!-- Liste des amis -->
    ";
        // line 339
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["friends"]) || array_key_exists("friends", $context) ? $context["friends"] : (function () { throw new RuntimeError('Variable "friends" does not exist.', 339, $this->source); })())) > 0)) {
            // line 340
            yield "        <div class=\"friends-list\">
            ";
            // line 341
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["friends"]) || array_key_exists("friends", $context) ? $context["friends"] : (function () { throw new RuntimeError('Variable "friends" does not exist.', 341, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["friend"]) {
                // line 342
                yield "                ";
                $context["friendUser"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["friend"], "sender", [], "any", false, false, false, 342), "idUtilisateur", [], "any", false, false, false, 342) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 342, $this->source); })()), "user", [], "any", false, false, false, 342), "idUtilisateur", [], "any", false, false, false, 342))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["friend"], "receiver", [], "any", false, false, false, 342)) : (CoreExtension::getAttribute($this->env, $this->source, $context["friend"], "sender", [], "any", false, false, false, 342)));
                // line 343
                yield "                <div class=\"friend-item\">
                    <div class=\"friend-info\">
                        ";
                // line 345
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 345, $this->source); })()), "photo", [], "any", false, false, false, 345)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 346
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 346, $this->source); })()), "photo", [], "any", false, false, false, 346), "html", null, true);
                    yield "\" class=\"friend-avatar\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 346, $this->source); })()), "nom", [], "any", false, false, false, 346), "html", null, true);
                    yield "\">
                        ";
                } else {
                    // line 348
                    yield "                            <div class=\"avatar-placeholder\">
                                ";
                    // line 349
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 349, $this->source); })()), "nom", [], "any", false, false, false, 349))), "html", null, true);
                    yield "
                            </div>
                        ";
                }
                // line 352
                yield "                        <div class=\"friend-details\">
                            <div class=\"friend-name\">";
                // line 353
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 353, $this->source); })()), "nom", [], "any", false, false, false, 353), "html", null, true);
                yield "</div>
                            <div class=\"friend-username\">@";
                // line 354
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 354, $this->source); })()), "email", [], "any", false, false, false, 354), "@")), "html", null, true);
                yield "</div>
                            <span class=\"friend-region\">
                                <i class=\"fas fa-map-marker-alt\"></i> ";
                // line 356
                yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 356, $this->source); })()), "region", [], "any", false, false, false, 356)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 356, $this->source); })()), "region", [], "any", false, false, false, 356), "html", null, true)) : ("Non renseignée"));
                yield "
                            </span>
                        </div>
                    </div>
                    <div class=\"friend-actions\">
                        <a href=\"";
                // line 361
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_friend_profile", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 361, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 361)]), "html", null, true);
                yield "\" class=\"btn-view\">
                            <i class=\"fas fa-eye\"></i> Voir
                        </a>
                        <a href=\"";
                // line 364
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_messages_inbox", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["friendUser"]) || array_key_exists("friendUser", $context) ? $context["friendUser"] : (function () { throw new RuntimeError('Variable "friendUser" does not exist.', 364, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 364)]), "html", null, true);
                yield "\" class=\"btn-message\">
                            <i class=\"fas fa-comment\"></i> Message
                        </a>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['friend'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 370
            yield "        </div>
    ";
        } else {
            // line 372
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-user-friends\"></i>
            <h3>Aucun ami pour le moment</h3>
            <p>Connectez-vous avec d'autres membres pour découvrir des recettes et partager vos créations</p>
            <a href=\"";
            // line 376
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notif_requests_list");
            yield "\" class=\"btn-empty\">
                <i class=\"fas fa-user-plus\"></i> Ajouter des amis
            </a>
        </div>
    ";
        }
        // line 381
        yield "
    <!-- Footer -->
    <div class=\"friends-footer\">
        <a href=\"";
        // line 384
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notif_requests_list");
        yield "\" class=\"btn-requests\">
            <i class=\"fas fa-user-plus\"></i> Voir les demandes de connexion
        </a>
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
        return "friend/friends.html.twig";
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
        return array (  536 => 384,  531 => 381,  523 => 376,  517 => 372,  513 => 370,  501 => 364,  495 => 361,  487 => 356,  482 => 354,  478 => 353,  475 => 352,  469 => 349,  466 => 348,  458 => 346,  456 => 345,  452 => 343,  449 => 342,  445 => 341,  442 => 340,  440 => 339,  433 => 335,  421 => 325,  411 => 324,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes amis{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    /* ===== STYLE MODERNE MÊME QUE LA PAGE D'AJOUT D'AMIS ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --gold: #FFD700;
    }

    body {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
    }

    .friends-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background: transparent;
    }

    /* Header */
    .friends-header {
        margin-bottom: 25px;
        padding: 0 10px;
    }

    .friends-header h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
        letter-spacing: -0.5px;
        margin-bottom: 5px;
    }

    .friends-header p {
        font-size: 14px;
        color: #888;
    }

    /* Compteur d'amis */
    .friends-count {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid rgba(139,0,0,0.1);
    }

    .friends-count span:first-child {
        font-weight: 600;
        color: #666;
    }

    .friends-count span:last-child {
        font-size: 28px;
        font-weight: 800;
        color: var(--bordeaux);
    }

    /* Liste des amis - vertical style Snapchat */
    .friends-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .friend-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .friend-item:last-child {
        border-bottom: none;
    }

    .friend-item:hover {
        background: #fef5f5;
        transform: translateX(5px);
    }

    .friend-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .friend-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--bordeaux-light);
    }

    .avatar-placeholder {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 22px;
        font-weight: bold;
        border: 2px solid var(--gold);
    }

    .friend-details {
        flex: 1;
    }

    .friend-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .friend-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .friend-region {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .friend-region i {
        margin-right: 3px;
        font-size: 9px;
    }

    .friend-actions {
        display: flex;
        gap: 10px;
    }

    .btn-view {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-view:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
        color: white;
    }

    .btn-message {
        background: transparent;
        border: 1px solid #e0e0e0;
        color: #666;
        padding: 8px 15px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-message:hover {
        background: #f5f5f5;
        color: var(--bordeaux);
        border-color: var(--bordeaux-light);
    }

    /* Footer */
    .friends-footer {
        background: white;
        border-radius: 20px;
        padding: 15px 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .btn-requests {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-requests:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139,0,0,0.3);
        color: white;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .friend-item {
        animation: fadeInUp 0.3s ease-out forwards;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }

    .empty-state i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: var(--bordeaux);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #888;
        margin-bottom: 20px;
    }

    .btn-empty {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-empty:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139,0,0,0.3);
        color: white;
    }

    /* Responsive */
    @media (max-width: 550px) {
        .friends-container {
            padding: 15px;
        }
        .friend-item {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .friend-info {
            flex-direction: column;
        }
        .friend-actions {
            width: 100%;
        }
        .btn-view, .btn-message {
            flex: 1;
            justify-content: center;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"friends-container\">
    <!-- Header -->
    <div class=\"friends-header\">
        <h1><i class=\"fas fa-user-friends\"></i> Mes amis</h1>
        <p>Retrouvez tous vos contacts culinaires</p>
    </div>

    <!-- Compteur d'amis -->
    <div class=\"friends-count\">
        <span><i class=\"fas fa-users\"></i> Amis</span>
        <span>{{ friends|length }}</span>
    </div>

    <!-- Liste des amis -->
    {% if friends|length > 0 %}
        <div class=\"friends-list\">
            {% for friend in friends %}
                {% set friendUser = friend.sender.idUtilisateur == app.user.idUtilisateur ? friend.receiver : friend.sender %}
                <div class=\"friend-item\">
                    <div class=\"friend-info\">
                        {% if friendUser.photo %}
                            <img src=\"{{ friendUser.photo }}\" class=\"friend-avatar\" alt=\"{{ friendUser.nom }}\">
                        {% else %}
                            <div class=\"avatar-placeholder\">
                                {{ friendUser.nom|first|upper }}
                            </div>
                        {% endif %}
                        <div class=\"friend-details\">
                            <div class=\"friend-name\">{{ friendUser.nom }}</div>
                            <div class=\"friend-username\">@{{ friendUser.email|split('@')|first }}</div>
                            <span class=\"friend-region\">
                                <i class=\"fas fa-map-marker-alt\"></i> {{ friendUser.region ?: 'Non renseignée' }}
                            </span>
                        </div>
                    </div>
                    <div class=\"friend-actions\">
                        <a href=\"{{ path('app_friend_profile', {id: friendUser.idUtilisateur}) }}\" class=\"btn-view\">
                            <i class=\"fas fa-eye\"></i> Voir
                        </a>
                        <a href=\"{{ path('app_messages_inbox', {id: friendUser.idUtilisateur}) }}\" class=\"btn-message\">
                            <i class=\"fas fa-comment\"></i> Message
                        </a>
                    </div>
                </div>
            {% endfor %}
        </div>
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-user-friends\"></i>
            <h3>Aucun ami pour le moment</h3>
            <p>Connectez-vous avec d'autres membres pour découvrir des recettes et partager vos créations</p>
            <a href=\"{{ path('app_notif_requests_list') }}\" class=\"btn-empty\">
                <i class=\"fas fa-user-plus\"></i> Ajouter des amis
            </a>
        </div>
    {% endif %}

    <!-- Footer -->
    <div class=\"friends-footer\">
        <a href=\"{{ path('app_notif_requests_list') }}\" class=\"btn-requests\">
            <i class=\"fas fa-user-plus\"></i> Voir les demandes de connexion
        </a>
    </div>
</div>
{% endblock %}", "friend/friends.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\friend\\friends.html.twig");
    }
}

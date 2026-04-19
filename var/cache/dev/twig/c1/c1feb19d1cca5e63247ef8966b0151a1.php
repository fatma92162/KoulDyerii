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

/* friend/requests.html.twig */
class __TwigTemplate_e533814c4a7c9e99e8533fee5729803b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "friend/requests.html.twig"));

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

        yield "Ajouter des amis";
        
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
    /* ===== STYLE VERTICAL SNAPCHAT/INSTAGRAM ===== */
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

    /* Barre de recherche */
    .search-bar {
        background: white;
        border-radius: 30px;
        padding: 12px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid rgba(139,0,0,0.1);
    }

    .search-bar i {
        color: var(--bordeaux);
        font-size: 18px;
    }

    .search-bar input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 16px;
        background: transparent;
    }

    .search-bar input::placeholder {
        color: #bbb;
    }

    /* Section titre */
    .section-title {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 15px;
        padding: 0 10px;
    }

    .section-title h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--bordeaux);
    }

    .section-title span {
        font-size: 13px;
        color: var(--bordeaux-light);
        font-weight: 600;
    }

    /* Liste des demandes - vertical */
    .requests-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .request-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .request-item:last-child {
        border-bottom: none;
    }

    .request-item:hover {
        background: #fef5f5;
    }

    .request-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .request-avatar {
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
    }

    .request-details {
        flex: 1;
    }

    .request-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .request-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .request-badge {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .request-badge i {
        margin-right: 3px;
        font-size: 9px;
    }

    .request-actions {
        display: flex;
        gap: 10px;
    }

    .btn-accept {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-accept:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }

    .btn-decline {
        background: transparent;
        border: 1px solid #e0e0e0;
        color: #999;
        padding: 8px 15px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-decline:hover {
        background: #f5f5f5;
    }

    /* Liste des suggestions - vertical */
    .suggestions-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .suggestion-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-item:hover {
        background: #fef5f5;
    }

    .suggestion-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .suggestion-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--gold);
    }

    .suggestion-avatar-placeholder {
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

    .suggestion-details {
        flex: 1;
    }

    .suggestion-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .suggestion-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .suggestion-badge {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .suggestion-mutual {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: rgba(139,0,0,0.1);
        color: var(--bordeaux);
        font-weight: 600;
        margin-left: 8px;
    }

    .suggestion-actions {
        display: flex;
        gap: 10px;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-add:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }

    .btn-pending {
        background: #ffc107;
        color: #333;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
    }

    .btn-friend {
        background: #28a745;
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
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

    .request-item, .suggestion-item {
        animation: fadeInUp 0.3s ease-out forwards;
    }

    /* No results */
    .no-results {
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 20px;
    }

    .no-results i {
        font-size: 50px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 15px;
    }

    .no-results h3 {
        color: var(--bordeaux);
        margin-bottom: 5px;
    }

    /* Responsive */
    @media (max-width: 550px) {
        .friends-container {
            padding: 15px;
        }
        .request-item, .suggestion-item {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .request-info, .suggestion-info {
            flex-direction: column;
        }
        .request-actions, .suggestion-actions {
            width: 100%;
        }
        .btn-accept, .btn-add, .btn-pending, .btn-friend {
            flex: 1;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 417
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 418
        yield "<div class=\"friends-container\">
    <!-- Header -->
    <div class=\"friends-header\">
        <h1>Ajouter des amis</h1>
        <p>Trouver des ami-e-s</p>
    </div>

    <!-- Barre de recherche -->
    <div class=\"search-bar\">
        <i class=\"fas fa-search\"></i>
        <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher par nom...\">
    </div>

    <!-- Section \"Ils m'ont ajouté-e\" -->
    <div class=\"section-title\">
        <h3><i class=\"fas fa-user-plus\"></i> Ils m'ont ajouté-e</h3>
        <span>";
        // line 434
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["pendingRequests"]) || array_key_exists("pendingRequests", $context) ? $context["pendingRequests"] : (function () { throw new RuntimeError('Variable "pendingRequests" does not exist.', 434, $this->source); })())), "html", null, true);
        yield " demande";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["pendingRequests"]) || array_key_exists("pendingRequests", $context) ? $context["pendingRequests"] : (function () { throw new RuntimeError('Variable "pendingRequests" does not exist.', 434, $this->source); })())) > 1)) {
            yield "s";
        }
        yield "</span>
    </div>

    <div class=\"requests-list\" id=\"requestsList\">
        ";
        // line 438
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["pendingRequests"]) || array_key_exists("pendingRequests", $context) ? $context["pendingRequests"] : (function () { throw new RuntimeError('Variable "pendingRequests" does not exist.', 438, $this->source); })())) > 0)) {
            // line 439
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pendingRequests"]) || array_key_exists("pendingRequests", $context) ? $context["pendingRequests"] : (function () { throw new RuntimeError('Variable "pendingRequests" does not exist.', 439, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["request"]) {
                // line 440
                yield "            <div class=\"request-item\">
                <div class=\"request-info\">
                    ";
                // line 442
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 442), "photo", [], "any", false, false, false, 442)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 443
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 443), "photo", [], "any", false, false, false, 443), "html", null, true);
                    yield "\" class=\"request-avatar\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 443), "nom", [], "any", false, false, false, 443), "html", null, true);
                    yield "\">
                    ";
                } else {
                    // line 445
                    yield "                        <div class=\"avatar-placeholder\">
                            ";
                    // line 446
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 446), "nom", [], "any", false, false, false, 446))), "html", null, true);
                    yield "
                        </div>
                    ";
                }
                // line 449
                yield "                    <div class=\"request-details\">
                        <div class=\"request-name\">";
                // line 450
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 450), "nom", [], "any", false, false, false, 450), "html", null, true);
                yield "</div>
                        <div class=\"request-username\">@";
                // line 451
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["request"], "sender", [], "any", false, false, false, 451), "email", [], "any", false, false, false, 451), "@")), "html", null, true);
                yield "</div>
                        <span class=\"request-badge\">
                            <i class=\"fas fa-clock\"></i> ";
                // line 453
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["request"], "createdAt", [], "any", false, false, false, 453), "d/m/Y"), "html", null, true);
                yield "
                        </span>
                    </div>
                </div>
                <div class=\"request-actions\">
                    <button class=\"btn-accept\" onclick=\"acceptRequest(";
                // line 458
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["request"], "id", [], "any", false, false, false, 458), "html", null, true);
                yield ")\">
                        <i class=\"fas fa-check\"></i> Accepter
                    </button>
                    <button class=\"btn-decline\" onclick=\"rejectRequest(";
                // line 461
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["request"], "id", [], "any", false, false, false, 461), "html", null, true);
                yield ")\">
                        <i class=\"fas fa-times\"></i>
                    </button>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['request'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 467
            yield "        ";
        } else {
            // line 468
            yield "            <div class=\"request-item\">
                <div class=\"request-info\">
                    <div class=\"avatar-placeholder\" style=\"background: #f0f0f0; color: #999;\">
                        <i class=\"fas fa-user-slash\"></i>
                    </div>
                    <div class=\"request-details\">
                        <div class=\"request-name\">Aucune demande</div>
                        <div class=\"request-username\">Les demandes d'amis apparaîtront ici</div>
                    </div>
                </div>
            </div>
        ";
        }
        // line 480
        yield "    </div>

    <!-- Section Suggestions / PAR AJOUT RAPIDE -->
    <div class=\"section-title\">
        <h3><i class=\"fas fa-users\"></i> Suggestions</h3>
        <span>PAR AJOUT RAPIDE</span>
    </div>

    <div class=\"suggestions-list\" id=\"suggestionsList\">
        ";
        // line 489
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 489, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 490
            yield "            <div class=\"suggestion-item\" data-user-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 490), "nom", [], "any", false, false, false, 490)), "html", null, true);
            yield "\" data-user-email=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 490), "email", [], "any", false, false, false, 490)), "html", null, true);
            yield "\">
                <div class=\"suggestion-info\">
                    ";
            // line 492
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 492), "photo", [], "any", false, false, false, 492)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 493
                yield "                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 493), "photo", [], "any", false, false, false, 493), "html", null, true);
                yield "\" class=\"suggestion-avatar\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 493), "nom", [], "any", false, false, false, 493), "html", null, true);
                yield "\">
                    ";
            } else {
                // line 495
                yield "                        <div class=\"suggestion-avatar-placeholder\">
                            ";
                // line 496
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 496), "nom", [], "any", false, false, false, 496))), "html", null, true);
                yield "
                        </div>
                    ";
            }
            // line 499
            yield "                    <div class=\"suggestion-details\">
                        <div class=\"suggestion-name\">";
            // line 500
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 500), "nom", [], "any", false, false, false, 500), "html", null, true);
            yield "</div>
                        <div class=\"suggestion-username\">@";
            // line 501
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 501), "email", [], "any", false, false, false, 501), "@")), "html", null, true);
            yield "</div>
                        <div>
                            ";
            // line 503
            $context["mutualFriends"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, true, false, 503), "friendsCount", [], "any", true, true, false, 503)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 503), "friendsCount", [], "any", false, false, false, 503), 0)) : (0));
            // line 504
            yield "                            ";
            if (((isset($context["mutualFriends"]) || array_key_exists("mutualFriends", $context) ? $context["mutualFriends"] : (function () { throw new RuntimeError('Variable "mutualFriends" does not exist.', 504, $this->source); })()) > 0)) {
                // line 505
                yield "                                <span class=\"suggestion-mutual\">
                                    <i class=\"fas fa-user-friends\"></i> ";
                // line 506
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mutualFriends"]) || array_key_exists("mutualFriends", $context) ? $context["mutualFriends"] : (function () { throw new RuntimeError('Variable "mutualFriends" does not exist.', 506, $this->source); })()), "html", null, true);
                yield " ami";
                if (((isset($context["mutualFriends"]) || array_key_exists("mutualFriends", $context) ? $context["mutualFriends"] : (function () { throw new RuntimeError('Variable "mutualFriends" does not exist.', 506, $this->source); })()) > 1)) {
                    yield "s";
                }
                yield " en commun
                                </span>
                            ";
            } else {
                // line 509
                yield "                                <span class=\"suggestion-badge\">PAR AJOUT RAPIDE</span>
                            ";
            }
            // line 511
            yield "                        </div>
                    </div>
                </div>
                <div class=\"suggestion-actions\">
                    ";
            // line 515
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "status", [], "any", false, false, false, 515) == "friends")) {
                // line 516
                yield "                        <button class=\"btn-friend\" disabled>
                            <i class=\"fas fa-check-circle\"></i> Amis
                        </button>
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 519
$context["item"], "status", [], "any", false, false, false, 519) == "pending_sent")) {
                // line 520
                yield "                        <button class=\"btn-pending\" disabled>
                            <i class=\"fas fa-clock\"></i> En attente
                        </button>
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 523
$context["item"], "status", [], "any", false, false, false, 523) == "pending_received")) {
                // line 524
                yield "                        <button class=\"btn-add\" onclick=\"acceptRequestFromUser(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 524), "idUtilisateur", [], "any", false, false, false, 524), "html", null, true);
                yield ")\">
                            <i class=\"fas fa-user-check\"></i> Accepter
                        </button>
                    ";
            } else {
                // line 528
                yield "                        <button class=\"btn-add\" onclick=\"sendFriendRequest(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "user", [], "any", false, false, false, 528), "idUtilisateur", [], "any", false, false, false, 528), "html", null, true);
                yield ")\">
                            <i class=\"fas fa-user-plus\"></i> Ajouter
                        </button>
                    ";
            }
            // line 532
            yield "                </div>
            </div>
        ";
            $context['_iterated'] = true;
        }
        // line 534
        if (!$context['_iterated']) {
            // line 535
            yield "            <div class=\"suggestion-item\">
                <div class=\"suggestion-info\">
                    <div class=\"suggestion-avatar-placeholder\" style=\"background: #f0f0f0; color: #999;\">
                        <i class=\"fas fa-users-slash\"></i>
                    </div>
                    <div class=\"suggestion-details\">
                        <div class=\"suggestion-name\">Aucune suggestion</div>
                        <div class=\"suggestion-username\">Revenez plus tard pour découvrir de nouveaux amis</div>
                    </div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 547
        yield "    </div>

    <!-- Message aucun résultat recherche -->
    <div id=\"noResults\" class=\"no-results\" style=\"display: none;\">
        <i class=\"fas fa-search\"></i>
        <h3>Aucun résultat</h3>
        <p class=\"text-muted\">Aucun membre ne correspond à votre recherche</p>
    </div>
</div>

<script>
// Recherche
const searchInput = document.getElementById('searchInput');
const suggestionItems = document.querySelectorAll('.suggestion-item');
const suggestionsList = document.getElementById('suggestionsList');
const noResults = document.getElementById('noResults');

function filterSuggestions() {
    const searchTerm = searchInput.value.toLowerCase();
    let visibleCount = 0;
    
    suggestionItems.forEach(item => {
        const userName = item.dataset.userName || '';
        const userEmail = item.dataset.userEmail || '';
        
        if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
            item.style.display = 'flex';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });
    
    if (visibleCount === 0 && searchTerm !== '') {
        suggestionsList.style.display = 'none';
        noResults.style.display = 'block';
    } else {
        suggestionsList.style.display = 'block';
        noResults.style.display = 'none';
    }
}

searchInput.addEventListener('input', filterSuggestions);

// Fonctions API
function sendFriendRequest(userId) {
    fetch(`/friend/send/\${userId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function acceptRequest(requestId) {
    fetch(`/friend/accept/\${requestId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function rejectRequest(requestId) {
    fetch(`/friend/reject/\${requestId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function acceptRequestFromUser(userId) {
    fetch(`/friend/accept-from-user/\${userId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
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
        return "friend/requests.html.twig";
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
        return array (  768 => 547,  751 => 535,  749 => 534,  743 => 532,  735 => 528,  727 => 524,  725 => 523,  720 => 520,  718 => 519,  713 => 516,  711 => 515,  705 => 511,  701 => 509,  691 => 506,  688 => 505,  685 => 504,  683 => 503,  678 => 501,  674 => 500,  671 => 499,  665 => 496,  662 => 495,  654 => 493,  652 => 492,  644 => 490,  639 => 489,  628 => 480,  614 => 468,  611 => 467,  599 => 461,  593 => 458,  585 => 453,  580 => 451,  576 => 450,  573 => 449,  567 => 446,  564 => 445,  556 => 443,  554 => 442,  550 => 440,  545 => 439,  543 => 438,  532 => 434,  514 => 418,  504 => 417,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Ajouter des amis{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    /* ===== STYLE VERTICAL SNAPCHAT/INSTAGRAM ===== */
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

    /* Barre de recherche */
    .search-bar {
        background: white;
        border-radius: 30px;
        padding: 12px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid rgba(139,0,0,0.1);
    }

    .search-bar i {
        color: var(--bordeaux);
        font-size: 18px;
    }

    .search-bar input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 16px;
        background: transparent;
    }

    .search-bar input::placeholder {
        color: #bbb;
    }

    /* Section titre */
    .section-title {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 15px;
        padding: 0 10px;
    }

    .section-title h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--bordeaux);
    }

    .section-title span {
        font-size: 13px;
        color: var(--bordeaux-light);
        font-weight: 600;
    }

    /* Liste des demandes - vertical */
    .requests-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .request-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .request-item:last-child {
        border-bottom: none;
    }

    .request-item:hover {
        background: #fef5f5;
    }

    .request-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .request-avatar {
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
    }

    .request-details {
        flex: 1;
    }

    .request-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .request-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .request-badge {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .request-badge i {
        margin-right: 3px;
        font-size: 9px;
    }

    .request-actions {
        display: flex;
        gap: 10px;
    }

    .btn-accept {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-accept:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }

    .btn-decline {
        background: transparent;
        border: 1px solid #e0e0e0;
        color: #999;
        padding: 8px 15px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-decline:hover {
        background: #f5f5f5;
    }

    /* Liste des suggestions - vertical */
    .suggestions-list {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .suggestion-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-item:hover {
        background: #fef5f5;
    }

    .suggestion-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .suggestion-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--gold);
    }

    .suggestion-avatar-placeholder {
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

    .suggestion-details {
        flex: 1;
    }

    .suggestion-name {
        font-weight: 700;
        font-size: 16px;
        color: #1a1a2e;
        margin-bottom: 3px;
    }

    .suggestion-username {
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    }

    .suggestion-badge {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: #f0f0f0;
        color: var(--bordeaux);
        font-weight: 600;
    }

    .suggestion-mutual {
        display: inline-block;
        font-size: 10px;
        padding: 3px 8px;
        border-radius: 50px;
        background: rgba(139,0,0,0.1);
        color: var(--bordeaux);
        font-weight: 600;
        margin-left: 8px;
    }

    .suggestion-actions {
        display: flex;
        gap: 10px;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-add:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }

    .btn-pending {
        background: #ffc107;
        color: #333;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
    }

    .btn-friend {
        background: #28a745;
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
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

    .request-item, .suggestion-item {
        animation: fadeInUp 0.3s ease-out forwards;
    }

    /* No results */
    .no-results {
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 20px;
    }

    .no-results i {
        font-size: 50px;
        color: var(--bordeaux-light);
        opacity: 0.5;
        margin-bottom: 15px;
    }

    .no-results h3 {
        color: var(--bordeaux);
        margin-bottom: 5px;
    }

    /* Responsive */
    @media (max-width: 550px) {
        .friends-container {
            padding: 15px;
        }
        .request-item, .suggestion-item {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .request-info, .suggestion-info {
            flex-direction: column;
        }
        .request-actions, .suggestion-actions {
            width: 100%;
        }
        .btn-accept, .btn-add, .btn-pending, .btn-friend {
            flex: 1;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"friends-container\">
    <!-- Header -->
    <div class=\"friends-header\">
        <h1>Ajouter des amis</h1>
        <p>Trouver des ami-e-s</p>
    </div>

    <!-- Barre de recherche -->
    <div class=\"search-bar\">
        <i class=\"fas fa-search\"></i>
        <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher par nom...\">
    </div>

    <!-- Section \"Ils m'ont ajouté-e\" -->
    <div class=\"section-title\">
        <h3><i class=\"fas fa-user-plus\"></i> Ils m'ont ajouté-e</h3>
        <span>{{ pendingRequests|length }} demande{% if pendingRequests|length > 1 %}s{% endif %}</span>
    </div>

    <div class=\"requests-list\" id=\"requestsList\">
        {% if pendingRequests|length > 0 %}
            {% for request in pendingRequests %}
            <div class=\"request-item\">
                <div class=\"request-info\">
                    {% if request.sender.photo %}
                        <img src=\"{{ request.sender.photo }}\" class=\"request-avatar\" alt=\"{{ request.sender.nom }}\">
                    {% else %}
                        <div class=\"avatar-placeholder\">
                            {{ request.sender.nom|first|upper }}
                        </div>
                    {% endif %}
                    <div class=\"request-details\">
                        <div class=\"request-name\">{{ request.sender.nom }}</div>
                        <div class=\"request-username\">@{{ request.sender.email|split('@')|first }}</div>
                        <span class=\"request-badge\">
                            <i class=\"fas fa-clock\"></i> {{ request.createdAt|date('d/m/Y') }}
                        </span>
                    </div>
                </div>
                <div class=\"request-actions\">
                    <button class=\"btn-accept\" onclick=\"acceptRequest({{ request.id }})\">
                        <i class=\"fas fa-check\"></i> Accepter
                    </button>
                    <button class=\"btn-decline\" onclick=\"rejectRequest({{ request.id }})\">
                        <i class=\"fas fa-times\"></i>
                    </button>
                </div>
            </div>
            {% endfor %}
        {% else %}
            <div class=\"request-item\">
                <div class=\"request-info\">
                    <div class=\"avatar-placeholder\" style=\"background: #f0f0f0; color: #999;\">
                        <i class=\"fas fa-user-slash\"></i>
                    </div>
                    <div class=\"request-details\">
                        <div class=\"request-name\">Aucune demande</div>
                        <div class=\"request-username\">Les demandes d'amis apparaîtront ici</div>
                    </div>
                </div>
            </div>
        {% endif %}
    </div>

    <!-- Section Suggestions / PAR AJOUT RAPIDE -->
    <div class=\"section-title\">
        <h3><i class=\"fas fa-users\"></i> Suggestions</h3>
        <span>PAR AJOUT RAPIDE</span>
    </div>

    <div class=\"suggestions-list\" id=\"suggestionsList\">
        {% for item in users %}
            <div class=\"suggestion-item\" data-user-name=\"{{ item.user.nom|lower }}\" data-user-email=\"{{ item.user.email|lower }}\">
                <div class=\"suggestion-info\">
                    {% if item.user.photo %}
                        <img src=\"{{ item.user.photo }}\" class=\"suggestion-avatar\" alt=\"{{ item.user.nom }}\">
                    {% else %}
                        <div class=\"suggestion-avatar-placeholder\">
                            {{ item.user.nom|first|upper }}
                        </div>
                    {% endif %}
                    <div class=\"suggestion-details\">
                        <div class=\"suggestion-name\">{{ item.user.nom }}</div>
                        <div class=\"suggestion-username\">@{{ item.user.email|split('@')|first }}</div>
                        <div>
                            {% set mutualFriends = item.user.friendsCount|default(0) %}
                            {% if mutualFriends > 0 %}
                                <span class=\"suggestion-mutual\">
                                    <i class=\"fas fa-user-friends\"></i> {{ mutualFriends }} ami{% if mutualFriends > 1 %}s{% endif %} en commun
                                </span>
                            {% else %}
                                <span class=\"suggestion-badge\">PAR AJOUT RAPIDE</span>
                            {% endif %}
                        </div>
                    </div>
                </div>
                <div class=\"suggestion-actions\">
                    {% if item.status == 'friends' %}
                        <button class=\"btn-friend\" disabled>
                            <i class=\"fas fa-check-circle\"></i> Amis
                        </button>
                    {% elseif item.status == 'pending_sent' %}
                        <button class=\"btn-pending\" disabled>
                            <i class=\"fas fa-clock\"></i> En attente
                        </button>
                    {% elseif item.status == 'pending_received' %}
                        <button class=\"btn-add\" onclick=\"acceptRequestFromUser({{ item.user.idUtilisateur }})\">
                            <i class=\"fas fa-user-check\"></i> Accepter
                        </button>
                    {% else %}
                        <button class=\"btn-add\" onclick=\"sendFriendRequest({{ item.user.idUtilisateur }})\">
                            <i class=\"fas fa-user-plus\"></i> Ajouter
                        </button>
                    {% endif %}
                </div>
            </div>
        {% else %}
            <div class=\"suggestion-item\">
                <div class=\"suggestion-info\">
                    <div class=\"suggestion-avatar-placeholder\" style=\"background: #f0f0f0; color: #999;\">
                        <i class=\"fas fa-users-slash\"></i>
                    </div>
                    <div class=\"suggestion-details\">
                        <div class=\"suggestion-name\">Aucune suggestion</div>
                        <div class=\"suggestion-username\">Revenez plus tard pour découvrir de nouveaux amis</div>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>

    <!-- Message aucun résultat recherche -->
    <div id=\"noResults\" class=\"no-results\" style=\"display: none;\">
        <i class=\"fas fa-search\"></i>
        <h3>Aucun résultat</h3>
        <p class=\"text-muted\">Aucun membre ne correspond à votre recherche</p>
    </div>
</div>

<script>
// Recherche
const searchInput = document.getElementById('searchInput');
const suggestionItems = document.querySelectorAll('.suggestion-item');
const suggestionsList = document.getElementById('suggestionsList');
const noResults = document.getElementById('noResults');

function filterSuggestions() {
    const searchTerm = searchInput.value.toLowerCase();
    let visibleCount = 0;
    
    suggestionItems.forEach(item => {
        const userName = item.dataset.userName || '';
        const userEmail = item.dataset.userEmail || '';
        
        if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
            item.style.display = 'flex';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });
    
    if (visibleCount === 0 && searchTerm !== '') {
        suggestionsList.style.display = 'none';
        noResults.style.display = 'block';
    } else {
        suggestionsList.style.display = 'block';
        noResults.style.display = 'none';
    }
}

searchInput.addEventListener('input', filterSuggestions);

// Fonctions API
function sendFriendRequest(userId) {
    fetch(`/friend/send/\${userId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function acceptRequest(requestId) {
    fetch(`/friend/accept/\${requestId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function rejectRequest(requestId) {
    fetch(`/friend/reject/\${requestId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

function acceptRequestFromUser(userId) {
    fetch(`/friend/accept-from-user/\${userId}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}
</script>
{% endblock %}
", "friend/requests.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\friend\\requests.html.twig");
    }
}

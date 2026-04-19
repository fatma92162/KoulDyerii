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

/* abonnement/index.html.twig */
class __TwigTemplate_151c4b87cc3a72bb07b964b3b7fd054c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "abonnement/index.html.twig"));

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

        yield "Nos abonnements | Koul Dyeri";
        
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
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-light: #D32F2F;
        --gold: #D4AF37;
    }

    .subscription-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .subscription-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .subscription-header h1 {
        font-size: 42px;
        font-weight: 800;
        color: var(--bordeaux);
        margin-bottom: 15px;
    }

    .subscription-header p {
        font-size: 18px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }

    .current-badge {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 40px;
        color: white;
        text-align: center;
    }

    .current-badge .reduction {
        font-size: 48px;
        font-weight: 800;
        color: var(--gold);
    }

    .plans-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .plan-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        position: relative;
        cursor: pointer;
    }

    .plan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(139,0,0,0.15);
    }

    .plan-card.popular {
        border: 2px solid var(--gold);
        transform: scale(1.02);
    }

    .plan-card.popular:hover {
        transform: translateY(-10px) scale(1.02);
    }

    .popular-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--gold);
        color: var(--bordeaux);
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .plan-header {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        padding: 30px 20px;
        text-align: center;
        color: white;
    }

    .plan-name {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .plan-price {
        font-size: 48px;
        font-weight: 800;
    }

    .plan-price small {
        font-size: 14px;
        font-weight: 400;
    }

    .plan-reduction {
        font-size: 36px;
        font-weight: 800;
        color: var(--gold);
        margin-top: 10px;
    }

    .plan-body {
        padding: 30px;
        text-align: center;
    }

    .plan-description {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .plan-features {
        list-style: none;
        padding: 0;
        margin: 20px 0;
        text-align: left;
    }

    .plan-features li {
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .plan-features li i {
        color: var(--bordeaux);
        width: 20px;
    }

    .btn-subscribe {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-subscribe:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.3);
        color: white;
    }

    .btn-cancel {
        background: #dc3545;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background: #c82333;
        transform: translateY(-2px);
        color: white;
    }

    .info-section {
        background: #f8f9fa;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .plans-grid {
            grid-template-columns: 1fr;
        }
        .plan-card.popular {
            transform: scale(1);
        }
        .subscription-header h1 {
            font-size: 32px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 218
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 219
        yield "<div class=\"subscription-container\">
    <div class=\"subscription-header\">
        <h1>🍽️ Abonnement Koul Dyeri</h1>
        <p>Économisez sur toutes vos commandes avec nos abonnements exclusifs</p>
    </div>

    ";
        // line 225
        if ((($tmp = (isset($context["currentSubscription"]) || array_key_exists("currentSubscription", $context) ? $context["currentSubscription"] : (function () { throw new RuntimeError('Variable "currentSubscription" does not exist.', 225, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 226
            yield "        <div class=\"current-badge\">
            <h3><i class=\"fas fa-crown\"></i> Votre abonnement actif</h3>
            <div class=\"reduction\">";
            // line 228
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentReduction"]) || array_key_exists("currentReduction", $context) ? $context["currentReduction"] : (function () { throw new RuntimeError('Variable "currentReduction" does not exist.', 228, $this->source); })()), "html", null, true);
            yield "% de réduction</div>
            <p>Valable jusqu'au ";
            // line 229
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["currentSubscription"]) || array_key_exists("currentSubscription", $context) ? $context["currentSubscription"] : (function () { throw new RuntimeError('Variable "currentSubscription" does not exist.', 229, $this->source); })()), "endDate", [], "any", false, false, false, 229), "d/m/Y"), "html", null, true);
            yield "</p>
            <a href=\"";
            // line 230
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_abonnement_cancel");
            yield "\" class=\"btn-cancel\" onclick=\"return confirm('Annuler votre abonnement ?')\">
                <i class=\"fas fa-times\"></i> Annuler mon abonnement
            </a>
        </div>
    ";
        }
        // line 235
        yield "
    <div class=\"plans-grid\">
        ";
        // line 237
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plans"]) || array_key_exists("plans", $context) ? $context["plans"] : (function () { throw new RuntimeError('Variable "plans" does not exist.', 237, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["plan"]) {
            // line 238
            yield "            <div class=\"plan-card ";
            if (($context["key"] == "3_months")) {
                yield "popular";
            }
            yield "\">
                ";
            // line 239
            if (($context["key"] == "3_months")) {
                // line 240
                yield "                    <div class=\"popular-badge\">⭐ POPULAIRE</div>
                ";
            }
            // line 242
            yield "                <div class=\"plan-header\">
                    <div class=\"plan-name\">";
            // line 243
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "name", [], "any", false, false, false, 243), "html", null, true);
            yield "</div>
                    <div class=\"plan-price\">";
            // line 244
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "price", [], "any", false, false, false, 244), "html", null, true);
            yield "€<small>/mois</small></div>
                    <div class=\"plan-reduction\">-";
            // line 245
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "reduction", [], "any", false, false, false, 245), "html", null, true);
            yield "%</div>
                </div>
                <div class=\"plan-body\">
                    <div class=\"plan-description\">";
            // line 248
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 248), "html", null, true);
            yield "</div>
                    <ul class=\"plan-features\">
                        <li><i class=\"fas fa-check-circle\"></i> Réduction sur toutes vos commandes</li>
                        <li><i class=\"fas fa-check-circle\"></i> Annulation à tout moment</li>
                        <li><i class=\"fas fa-check-circle\"></i> Sans engagement</li>
                        <li><i class=\"fas fa-check-circle\"></i> Paiement sécurisé Stripe</li>
                    </ul>
                    <a href=\"";
            // line 255
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_abonnement_checkout", ["plan" => $context["key"]]), "html", null, true);
            yield "\" class=\"btn-subscribe\" target=\"_blank\">
                        <i class=\"fab fa-stripe\"></i> S'abonner avec Stripe
                    </a>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['plan'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 261
        yield "    </div>

    <div class=\"info-section\">
        <h3><i class=\"fas fa-shield-alt\"></i> Paiement 100% sécurisé</h3>
        <p>Les paiements sont traités par Stripe, la plateforme de paiement la plus sécurisée au monde.</p>
        <div>
            <i class=\"fab fa-cc-visa fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-mastercard fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-amex fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-paypal fa-2x mx-2\"></i>
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
        return "abonnement/index.html.twig";
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
        return array (  405 => 261,  393 => 255,  383 => 248,  377 => 245,  373 => 244,  369 => 243,  366 => 242,  362 => 240,  360 => 239,  353 => 238,  349 => 237,  345 => 235,  337 => 230,  333 => 229,  329 => 228,  325 => 226,  323 => 225,  315 => 219,  305 => 218,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Nos abonnements | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-light: #D32F2F;
        --gold: #D4AF37;
    }

    .subscription-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .subscription-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .subscription-header h1 {
        font-size: 42px;
        font-weight: 800;
        color: var(--bordeaux);
        margin-bottom: 15px;
    }

    .subscription-header p {
        font-size: 18px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }

    .current-badge {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 40px;
        color: white;
        text-align: center;
    }

    .current-badge .reduction {
        font-size: 48px;
        font-weight: 800;
        color: var(--gold);
    }

    .plans-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .plan-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        position: relative;
        cursor: pointer;
    }

    .plan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(139,0,0,0.15);
    }

    .plan-card.popular {
        border: 2px solid var(--gold);
        transform: scale(1.02);
    }

    .plan-card.popular:hover {
        transform: translateY(-10px) scale(1.02);
    }

    .popular-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--gold);
        color: var(--bordeaux);
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .plan-header {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        padding: 30px 20px;
        text-align: center;
        color: white;
    }

    .plan-name {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .plan-price {
        font-size: 48px;
        font-weight: 800;
    }

    .plan-price small {
        font-size: 14px;
        font-weight: 400;
    }

    .plan-reduction {
        font-size: 36px;
        font-weight: 800;
        color: var(--gold);
        margin-top: 10px;
    }

    .plan-body {
        padding: 30px;
        text-align: center;
    }

    .plan-description {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .plan-features {
        list-style: none;
        padding: 0;
        margin: 20px 0;
        text-align: left;
    }

    .plan-features li {
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .plan-features li i {
        color: var(--bordeaux);
        width: 20px;
    }

    .btn-subscribe {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-subscribe:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.3);
        color: white;
    }

    .btn-cancel {
        background: #dc3545;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background: #c82333;
        transform: translateY(-2px);
        color: white;
    }

    .info-section {
        background: #f8f9fa;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .plans-grid {
            grid-template-columns: 1fr;
        }
        .plan-card.popular {
            transform: scale(1);
        }
        .subscription-header h1 {
            font-size: 32px;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"subscription-container\">
    <div class=\"subscription-header\">
        <h1>🍽️ Abonnement Koul Dyeri</h1>
        <p>Économisez sur toutes vos commandes avec nos abonnements exclusifs</p>
    </div>

    {% if currentSubscription %}
        <div class=\"current-badge\">
            <h3><i class=\"fas fa-crown\"></i> Votre abonnement actif</h3>
            <div class=\"reduction\">{{ currentReduction }}% de réduction</div>
            <p>Valable jusqu'au {{ currentSubscription.endDate|date('d/m/Y') }}</p>
            <a href=\"{{ path('app_abonnement_cancel') }}\" class=\"btn-cancel\" onclick=\"return confirm('Annuler votre abonnement ?')\">
                <i class=\"fas fa-times\"></i> Annuler mon abonnement
            </a>
        </div>
    {% endif %}

    <div class=\"plans-grid\">
        {% for key, plan in plans %}
            <div class=\"plan-card {% if key == '3_months' %}popular{% endif %}\">
                {% if key == '3_months' %}
                    <div class=\"popular-badge\">⭐ POPULAIRE</div>
                {% endif %}
                <div class=\"plan-header\">
                    <div class=\"plan-name\">{{ plan.name }}</div>
                    <div class=\"plan-price\">{{ plan.price }}€<small>/mois</small></div>
                    <div class=\"plan-reduction\">-{{ plan.reduction }}%</div>
                </div>
                <div class=\"plan-body\">
                    <div class=\"plan-description\">{{ plan.description }}</div>
                    <ul class=\"plan-features\">
                        <li><i class=\"fas fa-check-circle\"></i> Réduction sur toutes vos commandes</li>
                        <li><i class=\"fas fa-check-circle\"></i> Annulation à tout moment</li>
                        <li><i class=\"fas fa-check-circle\"></i> Sans engagement</li>
                        <li><i class=\"fas fa-check-circle\"></i> Paiement sécurisé Stripe</li>
                    </ul>
                    <a href=\"{{ path('app_abonnement_checkout', {plan: key}) }}\" class=\"btn-subscribe\" target=\"_blank\">
                        <i class=\"fab fa-stripe\"></i> S'abonner avec Stripe
                    </a>
                </div>
            </div>
        {% endfor %}
    </div>

    <div class=\"info-section\">
        <h3><i class=\"fas fa-shield-alt\"></i> Paiement 100% sécurisé</h3>
        <p>Les paiements sont traités par Stripe, la plateforme de paiement la plus sécurisée au monde.</p>
        <div>
            <i class=\"fab fa-cc-visa fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-mastercard fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-amex fa-2x mx-2\"></i>
            <i class=\"fab fa-cc-paypal fa-2x mx-2\"></i>
        </div>
    </div>
</div>
{% endblock %}", "abonnement/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\abonnement\\index.html.twig");
    }
}

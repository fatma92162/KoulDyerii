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

/* client/livraison_detail.html.twig */
class __TwigTemplate_23595ccaa7beb3edceca9ce76f60572d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/livraison_detail.html.twig"));

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

        yield "Détail livraison #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 3, $this->source); })()), "idLivraison", [], "any", false, false, false, 3), "html", null, true);
        yield " - Koul Dyeri";
        
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
    .detail-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    
    .detail-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 20px 30px;
        color: white;
    }
    
    .detail-body {
        padding: 30px;
    }
    
    .info-section {
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0e6d6;
    }
    
    .info-section h5 {
        color: #8B0000;
        margin-bottom: 15px;
    }
    
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e0e0e0;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }
    
    .timeline-dot {
        position: absolute;
        left: -24px;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ccc;
    }
    
    .timeline-dot.active {
        background: #4CAF50;
    }
    
    .timeline-dot.current {
        background: #FF9800;
        box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.3);
    }
    
    .timeline-content h6 {
        margin-bottom: 5px;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .info-item {
        background: #fefcf8;
        padding: 12px 15px;
        border-radius: 10px;
    }
    
    .info-item strong {
        color: #8B0000;
    }
    
    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 104
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 105
        yield "<div class=\"container py-5\">
    <div class=\"detail-card\">
        <div class=\"detail-header\">
            <h3><i class=\"fas fa-truck\"></i> Livraison #";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 108, $this->source); })()), "idLivraison", [], "any", false, false, false, 108), "html", null, true);
        yield "</h3>
            <p class=\"mb-0\">Suivi de votre colis en temps réel</p>
        </div>
        <div class=\"detail-body\">
            <!-- Informations de la commande -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-shopping-cart\"></i> Informations commande</h5>
                <div class=\"info-grid\">
                    <div class=\"info-item\">
                        <strong>Numéro commande :</strong><br>
                        #";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 118, $this->source); })()), "id", [], "any", false, false, false, 118), "html", null, true);
        yield "
                    </div>
                    <div class=\"info-item\">
                        <strong>Date commande :</strong><br>
                        ";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 122, $this->source); })()), "createdAt", [], "any", false, false, false, 122), "d/m/Y H:i"), "html", null, true);
        yield "
                    </div>
                    <div class=\"info-item\">
                        <strong>Montant :</strong><br>
                        ";
        // line 126
        if ((($tmp = (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 126, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 127
            yield "                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 127, $this->source); })()), "prix", [], "any", false, false, false, 127), 2, ",", " "), "html", null, true);
            yield " €
                        ";
        } else {
            // line 129
            yield "                            -
                        ";
        }
        // line 131
        yield "                    </div>
                    <div class=\"info-item\">
                        <strong>Statut commande :</strong><br>
                        ";
        // line 134
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 134, $this->source); })()), "status", [], "any", false, false, false, 134) == "acceptee")) {
            // line 135
            yield "                            <span class=\"badge bg-success\">Acceptée</span>
                        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 136
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 136, $this->source); })()), "status", [], "any", false, false, false, 136) == "refusee")) {
            // line 137
            yield "                            <span class=\"badge bg-danger\">Refusée</span>
                        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 138
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 138, $this->source); })()), "status", [], "any", false, false, false, 138) == "annulee")) {
            // line 139
            yield "                            <span class=\"badge bg-secondary\">Annulée</span>
                        ";
        } else {
            // line 141
            yield "                            <span class=\"badge bg-warning\">En attente</span>
                        ";
        }
        // line 143
        yield "                    </div>
                </div>
            </div>
            
            <!-- Informations livraison -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-map-marker-alt\"></i> Informations livraison</h5>
                <div class=\"info-grid\">
                    <div class=\"info-item\">
                        <strong>Adresse de livraison :</strong><br>
                        ";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 153, $this->source); })()), "adresse", [], "any", false, false, false, 153), "html", null, true);
        yield "
                    </div>
                    <div class=\"info-item\">
                        <strong>Statut livraison :</strong><br>
                        <span class=\"badge bg-";
        // line 157
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 157, $this->source); })()), "statutLivraison", [], "any", false, false, false, 157) == "livree")) {
            yield "success";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 157, $this->source); })()), "statutLivraison", [], "any", false, false, false, 157) == "en_cours")) {
            yield "warning";
        } else {
            yield "secondary";
        }
        yield "\">
                            ";
        // line 158
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 158, $this->source); })()), "statutLivraison", [], "any", false, false, false, 158) == "en_cours")) {
            yield "🚚 En cours
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 159
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 159, $this->source); })()), "statutLivraison", [], "any", false, false, false, 159) == "livree")) {
            yield "✅ Livrée
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 160
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 160, $this->source); })()), "statutLivraison", [], "any", false, false, false, 160) == "annulee")) {
            yield "❌ Annulée
                            ";
        } else {
            // line 161
            yield "⏳ En attente
                            ";
        }
        // line 163
        yield "                        </span>
                    </div>
                    ";
        // line 165
        if ((($tmp = (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 165, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 166
            yield "                    <div class=\"info-item\">
                        <strong>Livreur :</strong><br>
                        ";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 168, $this->source); })()), "prenom", [], "any", false, false, false, 168), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 168, $this->source); })()), "nom", [], "any", false, false, false, 168), "html", null, true);
            yield "
                    </div>
                    <div class=\"info-item\">
                        <strong>Téléphone livreur :</strong><br>
                        ";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 172, $this->source); })()), "telephone", [], "any", false, false, false, 172), "html", null, true);
            yield "
                    </div>
                    ";
        }
        // line 175
        yield "                </div>
            </div>
            
            <!-- Timeline de livraison -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-chart-line\"></i> Suivi de livraison</h5>
                <div class=\"timeline\">
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot active\"></div>
                        <div class=\"timeline-content\">
                            <h6>Commande validée</h6>
                            <p class=\"text-muted small mb-0\">Votre commande a été acceptée et préparée</p>
                        </div>
                    </div>
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot 
                            ";
        // line 191
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 191, $this->source); })()), "statutLivraison", [], "any", false, false, false, 191) == "en_cours")) {
            yield "current
                            ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 192
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 192, $this->source); })()), "statutLivraison", [], "any", false, false, false, 192) == "livree")) {
            yield "active
                            ";
        }
        // line 193
        yield "\">
                        </div>
                        <div class=\"timeline-content\">
                            <h6>En cours de livraison</h6>
                            <p class=\"text-muted small mb-0\">Votre colis est en route vers votre adresse</p>
                        </div>
                    </div>
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot ";
        // line 201
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 201, $this->source); })()), "statutLivraison", [], "any", false, false, false, 201) == "livree")) {
            yield "active";
        }
        yield "\"></div>
                        <div class=\"timeline-content\">
                            <h6>Livrée</h6>
                            <p class=\"text-muted small mb-0\">Votre colis a été livré avec succès</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class=\"text-center mt-4\">
                <a href=\"";
        // line 212
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_livraisons");
        yield "\" class=\"btn btn-secondary\">
                    <i class=\"fas fa-arrow-left\"></i> Retour à mes livraisons
                </a>
                ";
        // line 215
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 215, $this->source); })()), "statutLivraison", [], "any", false, false, false, 215) == "en_cours")) {
            // line 216
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_livraison_annuler", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 216, $this->source); })()), "idLivraison", [], "any", false, false, false, 216)]), "html", null, true);
            yield "\" method=\"post\" style=\"display: inline-block;\">
                        <button type=\"submit\" class=\"btn btn-danger\" onclick=\"return confirm('Annuler cette livraison ?')\">
                            <i class=\"fas fa-times\"></i> Annuler la livraison
                        </button>
                    </form>
                ";
        }
        // line 222
        yield "            </div>
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
        return "client/livraison_detail.html.twig";
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
        return array (  414 => 222,  404 => 216,  402 => 215,  396 => 212,  380 => 201,  370 => 193,  365 => 192,  361 => 191,  343 => 175,  337 => 172,  328 => 168,  324 => 166,  322 => 165,  318 => 163,  314 => 161,  309 => 160,  305 => 159,  301 => 158,  291 => 157,  284 => 153,  272 => 143,  268 => 141,  264 => 139,  262 => 138,  259 => 137,  257 => 136,  254 => 135,  252 => 134,  247 => 131,  243 => 129,  237 => 127,  235 => 126,  228 => 122,  221 => 118,  208 => 108,  203 => 105,  193 => 104,  88 => 6,  78 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détail livraison #{{ livraison.idLivraison }} - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .detail-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    
    .detail-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 20px 30px;
        color: white;
    }
    
    .detail-body {
        padding: 30px;
    }
    
    .info-section {
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0e6d6;
    }
    
    .info-section h5 {
        color: #8B0000;
        margin-bottom: 15px;
    }
    
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e0e0e0;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }
    
    .timeline-dot {
        position: absolute;
        left: -24px;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ccc;
    }
    
    .timeline-dot.active {
        background: #4CAF50;
    }
    
    .timeline-dot.current {
        background: #FF9800;
        box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.3);
    }
    
    .timeline-content h6 {
        margin-bottom: 5px;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .info-item {
        background: #fefcf8;
        padding: 12px 15px;
        border-radius: 10px;
    }
    
    .info-item strong {
        color: #8B0000;
    }
    
    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"detail-card\">
        <div class=\"detail-header\">
            <h3><i class=\"fas fa-truck\"></i> Livraison #{{ livraison.idLivraison }}</h3>
            <p class=\"mb-0\">Suivi de votre colis en temps réel</p>
        </div>
        <div class=\"detail-body\">
            <!-- Informations de la commande -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-shopping-cart\"></i> Informations commande</h5>
                <div class=\"info-grid\">
                    <div class=\"info-item\">
                        <strong>Numéro commande :</strong><br>
                        #{{ commande.id }}
                    </div>
                    <div class=\"info-item\">
                        <strong>Date commande :</strong><br>
                        {{ commande.createdAt|date('d/m/Y H:i') }}
                    </div>
                    <div class=\"info-item\">
                        <strong>Montant :</strong><br>
                        {% if produit %}
                            {{ produit.prix|number_format(2, ',', ' ') }} €
                        {% else %}
                            -
                        {% endif %}
                    </div>
                    <div class=\"info-item\">
                        <strong>Statut commande :</strong><br>
                        {% if commande.status == 'acceptee' %}
                            <span class=\"badge bg-success\">Acceptée</span>
                        {% elseif commande.status == 'refusee' %}
                            <span class=\"badge bg-danger\">Refusée</span>
                        {% elseif commande.status == 'annulee' %}
                            <span class=\"badge bg-secondary\">Annulée</span>
                        {% else %}
                            <span class=\"badge bg-warning\">En attente</span>
                        {% endif %}
                    </div>
                </div>
            </div>
            
            <!-- Informations livraison -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-map-marker-alt\"></i> Informations livraison</h5>
                <div class=\"info-grid\">
                    <div class=\"info-item\">
                        <strong>Adresse de livraison :</strong><br>
                        {{ livraison.adresse }}
                    </div>
                    <div class=\"info-item\">
                        <strong>Statut livraison :</strong><br>
                        <span class=\"badge bg-{% if livraison.statutLivraison == 'livree' %}success{% elseif livraison.statutLivraison == 'en_cours' %}warning{% else %}secondary{% endif %}\">
                            {% if livraison.statutLivraison == 'en_cours' %}🚚 En cours
                            {% elseif livraison.statutLivraison == 'livree' %}✅ Livrée
                            {% elseif livraison.statutLivraison == 'annulee' %}❌ Annulée
                            {% else %}⏳ En attente
                            {% endif %}
                        </span>
                    </div>
                    {% if livreur %}
                    <div class=\"info-item\">
                        <strong>Livreur :</strong><br>
                        {{ livreur.prenom }} {{ livreur.nom }}
                    </div>
                    <div class=\"info-item\">
                        <strong>Téléphone livreur :</strong><br>
                        {{ livreur.telephone }}
                    </div>
                    {% endif %}
                </div>
            </div>
            
            <!-- Timeline de livraison -->
            <div class=\"info-section\">
                <h5><i class=\"fas fa-chart-line\"></i> Suivi de livraison</h5>
                <div class=\"timeline\">
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot active\"></div>
                        <div class=\"timeline-content\">
                            <h6>Commande validée</h6>
                            <p class=\"text-muted small mb-0\">Votre commande a été acceptée et préparée</p>
                        </div>
                    </div>
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot 
                            {% if livraison.statutLivraison == 'en_cours' %}current
                            {% elseif livraison.statutLivraison == 'livree' %}active
                            {% endif %}\">
                        </div>
                        <div class=\"timeline-content\">
                            <h6>En cours de livraison</h6>
                            <p class=\"text-muted small mb-0\">Votre colis est en route vers votre adresse</p>
                        </div>
                    </div>
                    <div class=\"timeline-item\">
                        <div class=\"timeline-dot {% if livraison.statutLivraison == 'livree' %}active{% endif %}\"></div>
                        <div class=\"timeline-content\">
                            <h6>Livrée</h6>
                            <p class=\"text-muted small mb-0\">Votre colis a été livré avec succès</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class=\"text-center mt-4\">
                <a href=\"{{ path('app_client_livraisons') }}\" class=\"btn btn-secondary\">
                    <i class=\"fas fa-arrow-left\"></i> Retour à mes livraisons
                </a>
                {% if livraison.statutLivraison == 'en_cours' %}
                    <form action=\"{{ path('app_client_livraison_annuler', {id: livraison.idLivraison}) }}\" method=\"post\" style=\"display: inline-block;\">
                        <button type=\"submit\" class=\"btn btn-danger\" onclick=\"return confirm('Annuler cette livraison ?')\">
                            <i class=\"fas fa-times\"></i> Annuler la livraison
                        </button>
                    </form>
                {% endif %}
            </div>
        </div>
    </div>
</div>
{% endblock %}", "client/livraison_detail.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\client\\livraison_detail.html.twig");
    }
}

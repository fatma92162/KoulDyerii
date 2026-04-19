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

/* client/livraisons.html.twig */
class __TwigTemplate_872d584602b372aec3c8d91b8ca81f27 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/livraisons.html.twig"));

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

        yield "Mes livraisons - Koul Dyeri";
        
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
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px 0;
        margin-bottom: 40px;
        color: white;
        text-align: center;
    }
    
    .livraison-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .livraison-card:hover {
        transform: translateY(-5px);
    }
    
    .livraison-header {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f0e6d6;
    }
    
    .livraison-header h5 {
        margin: 0;
        font-weight: 700;
    }
    
    .livraison-body {
        padding: 20px;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-livree {
        background: #4CAF50;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .status-en_attente {
        background: #2196F3;
        color: white;
    }
    
    .tracking-step {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .tracking-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f0e6d6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #8B0000;
    }
    
    .tracking-icon.active {
        background: #4CAF50;
        color: white;
    }
    
    .tracking-icon.current {
        background: #FF9800;
        color: white;
    }
    
    .tracking-content {
        flex: 1;
    }
    
    .btn-cancel {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .btn-track {
        background: #8B0000;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-track:hover {
        background: #A52A2A;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 148
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 149
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-truck\"></i> Mes livraisons</h1>
        <p class=\"mb-0\">Suivez l'état de vos livraisons en temps réel</p>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 157, $this->source); })()), "flashes", ["success"], "method", false, false, false, 157));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 158
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        yield "    
    ";
        // line 164
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 164, $this->source); })()), "flashes", ["error"], "method", false, false, false, 164));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 165
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 166
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        yield "    
    ";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "flashes", ["info"], "method", false, false, false, 171));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 172
            yield "        <div class=\"alert alert-info alert-dismissible fade show\">
            <i class=\"fas fa-info-circle\"></i> ";
            // line 173
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 177
        yield "    
    ";
        // line 178
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 178, $this->source); })())) > 0)) {
            // line 179
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 179, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
                // line 180
                yield "        <div class=\"livraison-card\">
            <div class=\"livraison-header\">
                <h5>Livraison #";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 182), "html", null, true);
                yield "</h5>
                <span class=\"status-badge status-";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 183), "html", null, true);
                yield "\">
                    ";
                // line 184
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 184) == "en_cours")) {
                    // line 185
                    yield "                        🚚 En cours
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 186
$context["livraison"], "statutLivraison", [], "any", false, false, false, 186) == "livree")) {
                    // line 187
                    yield "                        ✅ Livrée
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 188
$context["livraison"], "statutLivraison", [], "any", false, false, false, 188) == "annulee")) {
                    // line 189
                    yield "                        ❌ Annulée
                    ";
                } else {
                    // line 191
                    yield "                        ⏳ En attente
                    ";
                }
                // line 193
                yield "                </span>
            </div>
            <div class=\"livraison-body\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <p><strong>📦 Commande #";
                // line 198
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 198), "id", [], "any", false, false, false, 198), "html", null, true);
                yield "</strong></p>
                        <p><strong>📍 Adresse de livraison :</strong> ";
                // line 199
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 199), "html", null, true);
                yield "</p>
                        <p><strong>📅 Date de commande :</strong> ";
                // line 200
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 200), "createdAt", [], "any", false, false, false, 200), "d/m/Y H:i"), "html", null, true);
                yield "</p>
                        ";
                // line 201
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 201)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 202
                    yield "                            <p><strong>👨‍💼 Livreur :</strong> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 202), "prenom", [], "any", false, false, false, 202), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 202), "nom", [], "any", false, false, false, 202), "html", null, true);
                    yield "</p>
                            <p><strong>📞 Téléphone livreur :</strong> ";
                    // line 203
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 203), "telephone", [], "any", false, false, false, 203), "html", null, true);
                    yield "</p>
                        ";
                }
                // line 205
                yield "                    </div>
                    <div class=\"col-md-6\">
                        <!-- Tracking de livraison -->
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon ";
                // line 209
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 209) != "annulee")) {
                    yield "active";
                }
                yield "\">
                                <i class=\"fas fa-check\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>Commande validée</strong>
                                <small class=\"text-muted d-block\">Votre commande a été acceptée</small>
                            </div>
                        </div>
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon ";
                // line 218
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 218) == "en_cours")) {
                    yield "current";
                }
                yield "\">
                                <i class=\"fas fa-truck\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>En cours de livraison</strong>
                                <small class=\"text-muted d-block\">Votre colis est en route</small>
                            </div>
                        </div>
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon ";
                // line 227
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 227) == "livree")) {
                    yield "active";
                }
                yield "\">
                                <i class=\"fas fa-home\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>Livrée</strong>
                                <small class=\"text-muted d-block\">Votre colis a été livré</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"mt-3 text-end\">
                    <a href=\"";
                // line 239
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_livraison_commande", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 239), "id", [], "any", false, false, false, 239)]), "html", null, true);
                yield "\" class=\"btn btn-track\">
                        <i class=\"fas fa-eye\"></i> Voir les détails
                    </a>
                    ";
                // line 242
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 242) == "en_cours")) {
                    // line 243
                    yield "                        <form action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_livraison_annuler", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 243)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display: inline-block;\">
                            <button type=\"submit\" class=\"btn btn-cancel\" onclick=\"return confirm('Annuler cette livraison ?')\">
                                <i class=\"fas fa-times\"></i> Annuler la livraison
                            </button>
                        </form>
                    ";
                }
                // line 249
                yield "                </div>
            </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 253
            yield "    ";
        } else {
            // line 254
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-truck\"></i>
            <h4>Aucune livraison trouvée</h4>
            <p class=\"text-muted\">Vous n'avez pas encore de livraisons en cours.</p>
            <a href=\"";
            // line 258
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_index");
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-store\"></i> Découvrir nos produits
            </a>
        </div>
    ";
        }
        // line 263
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/livraisons.html.twig";
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
        return array (  482 => 263,  474 => 258,  468 => 254,  465 => 253,  456 => 249,  446 => 243,  444 => 242,  438 => 239,  421 => 227,  407 => 218,  393 => 209,  387 => 205,  382 => 203,  375 => 202,  373 => 201,  369 => 200,  365 => 199,  361 => 198,  354 => 193,  350 => 191,  346 => 189,  344 => 188,  341 => 187,  339 => 186,  336 => 185,  334 => 184,  330 => 183,  326 => 182,  322 => 180,  317 => 179,  315 => 178,  312 => 177,  302 => 173,  299 => 172,  295 => 171,  292 => 170,  282 => 166,  279 => 165,  275 => 164,  272 => 163,  262 => 159,  259 => 158,  255 => 157,  245 => 149,  235 => 148,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes livraisons - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px 0;
        margin-bottom: 40px;
        color: white;
        text-align: center;
    }
    
    .livraison-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .livraison-card:hover {
        transform: translateY(-5px);
    }
    
    .livraison-header {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f0e6d6;
    }
    
    .livraison-header h5 {
        margin: 0;
        font-weight: 700;
    }
    
    .livraison-body {
        padding: 20px;
    }
    
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-livree {
        background: #4CAF50;
        color: white;
    }
    
    .status-annulee {
        background: #9E9E9E;
        color: white;
    }
    
    .status-en_attente {
        background: #2196F3;
        color: white;
    }
    
    .tracking-step {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .tracking-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f0e6d6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #8B0000;
    }
    
    .tracking-icon.active {
        background: #4CAF50;
        color: white;
    }
    
    .tracking-icon.current {
        background: #FF9800;
        color: white;
    }
    
    .tracking-content {
        flex: 1;
    }
    
    .btn-cancel {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
        background: #c82333;
        transform: translateY(-2px);
    }
    
    .btn-track {
        background: #8B0000;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    .btn-track:hover {
        background: #A52A2A;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-truck\"></i> Mes livraisons</h1>
        <p class=\"mb-0\">Suivez l'état de vos livraisons en temps réel</p>
    </div>
</div>

<div class=\"container mb-5\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    {% for message in app.flashes('info') %}
        <div class=\"alert alert-info alert-dismissible fade show\">
            <i class=\"fas fa-info-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    {% if livraisons|length > 0 %}
        {% for livraison in livraisons %}
        <div class=\"livraison-card\">
            <div class=\"livraison-header\">
                <h5>Livraison #{{ livraison.idLivraison }}</h5>
                <span class=\"status-badge status-{{ livraison.statutLivraison }}\">
                    {% if livraison.statutLivraison == 'en_cours' %}
                        🚚 En cours
                    {% elseif livraison.statutLivraison == 'livree' %}
                        ✅ Livrée
                    {% elseif livraison.statutLivraison == 'annulee' %}
                        ❌ Annulée
                    {% else %}
                        ⏳ En attente
                    {% endif %}
                </span>
            </div>
            <div class=\"livraison-body\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <p><strong>📦 Commande #{{ livraison.commande.id }}</strong></p>
                        <p><strong>📍 Adresse de livraison :</strong> {{ livraison.adresse }}</p>
                        <p><strong>📅 Date de commande :</strong> {{ livraison.commande.createdAt|date('d/m/Y H:i') }}</p>
                        {% if livraison.livreur %}
                            <p><strong>👨‍💼 Livreur :</strong> {{ livraison.livreur.prenom }} {{ livraison.livreur.nom }}</p>
                            <p><strong>📞 Téléphone livreur :</strong> {{ livraison.livreur.telephone }}</p>
                        {% endif %}
                    </div>
                    <div class=\"col-md-6\">
                        <!-- Tracking de livraison -->
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon {% if livraison.statutLivraison != 'annulee' %}active{% endif %}\">
                                <i class=\"fas fa-check\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>Commande validée</strong>
                                <small class=\"text-muted d-block\">Votre commande a été acceptée</small>
                            </div>
                        </div>
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon {% if livraison.statutLivraison == 'en_cours' %}current{% endif %}\">
                                <i class=\"fas fa-truck\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>En cours de livraison</strong>
                                <small class=\"text-muted d-block\">Votre colis est en route</small>
                            </div>
                        </div>
                        <div class=\"tracking-step\">
                            <div class=\"tracking-icon {% if livraison.statutLivraison == 'livree' %}active{% endif %}\">
                                <i class=\"fas fa-home\"></i>
                            </div>
                            <div class=\"tracking-content\">
                                <strong>Livrée</strong>
                                <small class=\"text-muted d-block\">Votre colis a été livré</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"mt-3 text-end\">
                    <a href=\"{{ path('app_client_livraison_commande', {id: livraison.commande.id}) }}\" class=\"btn btn-track\">
                        <i class=\"fas fa-eye\"></i> Voir les détails
                    </a>
                    {% if livraison.statutLivraison == 'en_cours' %}
                        <form action=\"{{ path('app_client_livraison_annuler', {id: livraison.idLivraison}) }}\" method=\"post\" style=\"display: inline-block;\">
                            <button type=\"submit\" class=\"btn btn-cancel\" onclick=\"return confirm('Annuler cette livraison ?')\">
                                <i class=\"fas fa-times\"></i> Annuler la livraison
                            </button>
                        </form>
                    {% endif %}
                </div>
            </div>
        </div>
        {% endfor %}
    {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-truck\"></i>
            <h4>Aucune livraison trouvée</h4>
            <p class=\"text-muted\">Vous n'avez pas encore de livraisons en cours.</p>
            <a href=\"{{ path('app_produits_index') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-store\"></i> Découvrir nos produits
            </a>
        </div>
    {% endif %}
</div>
{% endblock %}", "client/livraisons.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\client\\livraisons.html.twig");
    }
}

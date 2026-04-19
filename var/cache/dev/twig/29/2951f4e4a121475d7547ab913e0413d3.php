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

/* partenaire/index.html.twig */
class __TwigTemplate_b8f4bf4cfd224281e5f4e21eef7c6501 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/index.html.twig"));

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

        yield "Espace Partenaire - Koul Dyeri";
        
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
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
        margin-top: 10px;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-partenaire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-partenaire:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
    
    .btn-annuler {
        background: #dc3545;
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: 15px;
    }
    
    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }
    
    .info-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border: 1px solid #E8D5B7;
    }
    
    .alert {
        border-radius: 12px;
        border-left: 4px solid;
    }
    .alert-success {
        border-left-color: #28a745;
    }
    .alert-danger {
        border-left-color: #dc3545;
    }
    .alert-info {
        border-left-color: #17a2b8;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 122
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 123
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-handshake\"></i> Espace Partenaire</h1>
        <p class=\"lead\">Gérez votre activité et vos plats</p>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 131, $this->source); })()), "flashes", ["success"], "method", false, false, false, 131));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 132
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 133
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        yield "    
    ";
        // line 138
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 138, $this->source); })()), "flashes", ["error"], "method", false, false, false, 138));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 139
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            <i class=\"fas fa-exclamation-circle\"></i> ";
            // line 140
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        yield "    
    ";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 145, $this->source); })()), "flashes", ["info"], "method", false, false, false, 145));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 146
            yield "        <div class=\"alert alert-info alert-dismissible fade show\">
            <i class=\"fas fa-info-circle\"></i> ";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        yield "    
    ";
        // line 152
        if ((null === (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 152, $this->source); })()))) {
            // line 153
            yield "        <!-- Pas encore partenaire -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-store fa-4x\" style=\"color: #8B0000; margin-bottom: 20px;\"></i>
                    <h3>Devenez partenaire Koul Dyeri</h3>
                    <p>Rejoignez notre réseau et partagez vos délices avec notre communauté.</p>
                    <a href=\"";
            // line 160
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_devenir");
            yield "\" class=\"btn-partenaire\">
                        <i class=\"fas fa-paper-plane\"></i> Devenir partenaire
                    </a>
                </div>
            </div>
        </div>
    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 166
(isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 166, $this->source); })()), "statut", [], "any", false, false, false, 166) == "en_attente")) {
            // line 167
            yield "        <!-- Demande en attente -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-clock fa-4x\" style=\"color: #FF9800; margin-bottom: 20px;\"></i>
                    <h3>Demande en cours de traitement</h3>
                    <p>Votre demande de partenariat est en cours d'examen par notre équipe.</p>
                    <span class=\"status-badge status-en_attente\">⏳ En attente</span>
                    
                    <!-- ✅ BOUTON POUR ANNULER LA DEMANDE -->
                    <div class=\"mt-4\">
                        <form action=\"";
            // line 178
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_annuler");
            yield "\" method=\"post\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir annuler votre demande de partenariat ?')\">
                            <button type=\"submit\" class=\"btn-annuler\">
                                <i class=\"fas fa-times\"></i> Annuler la demande
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 187
(isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 187, $this->source); })()), "statut", [], "any", false, false, false, 187) == "accepte")) {
            // line 188
            yield "        <!-- Partenaire accepté -->
        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"platCount\">0</div>
                    <div class=\"stat-label\">Mes plats</div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"commandeCount\">0</div>
                    <div class=\"stat-label\">Commandes</div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"caCount\">0</div>
                    <div class=\"stat-label\">Chiffre d'affaires</div>
                </div>
            </div>
        </div>
        
        <div class=\"row mt-4\">
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-utensils\"></i> Gestion des plats</h4>
                    <p>Ajoutez, modifiez ou supprimez vos plats</p>
                    <a href=\"";
            // line 215
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_ajouter_plat");
            yield "\" class=\"btn btn-primary btn-sm\">
                        <i class=\"fas fa-plus\"></i> Ajouter un plat
                    </a>
                    <a href=\"";
            // line 218
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_mes_plats");
            yield "\" class=\"btn btn-secondary btn-sm\">
                        <i class=\"fas fa-list\"></i> Voir mes plats
                    </a>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-link\"></i> Mes collaborations</h4>
                    <p>Consultez et gérez vos collaborations produits</p>
                    <a href=\"";
            // line 227
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_collaborations");
            yield "\" class=\"btn btn-success btn-sm\">
                        <i class=\"fas fa-link\"></i> Voir les collaborations
                    </a>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-chart-line\"></i> Informations</h4>
                    <p><strong>Restaurant:</strong> ";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 235, $this->source); })()), "nom", [], "any", false, false, false, 235), "html", null, true);
            yield "</p>
                    <p><strong>Type:</strong> ";
            // line 236
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 236, $this->source); })()), "type", [], "any", false, false, false, 236), "html", null, true);
            yield "</p>
                    <p><strong>Téléphone:</strong> ";
            // line 237
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 237, $this->source); })()), "telephone", [], "any", false, false, false, 237), "html", null, true);
            yield "</p>
                    <p><strong>Adresse:</strong> ";
            // line 238
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 238, $this->source); })()), "adresse", [], "any", false, false, false, 238), "html", null, true);
            yield "</p>
                    ";
            // line 239
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 239, $this->source); })()), "description", [], "any", false, false, false, 239)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 240
                yield "                        <p><strong>Description:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 240, $this->source); })()), "description", [], "any", false, false, false, 240), 0, 100), "html", null, true);
                yield "...</p>
                    ";
            }
            // line 242
            yield "                </div>
            </div>
        </div>

        ";
            // line 247
            yield "        ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("recommendations", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 247, $this->source); })()), [])) : ([]))) > 0)) {
                // line 248
                yield "        <div class=\"mt-4\">
            <div class=\"info-card\" style=\"border: 2px solid #E8D5B7;\">
                <div class=\"d-flex align-items-center mb-3 gap-2\">
                    <span style=\"font-size:28px;\">⭐</span>
                    <div>
                        <h4 class=\"mb-0\">Produits recommandés pour vous</h4>
                        <small class=\"text-muted\">Sélectionnés selon vos plats — <strong>activez une collaboration</strong> directement sur un produit pour commencer à collaborer</small>
                    </div>
                </div>

                <div class=\"row g-3\">
                    ";
                // line 259
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recommendations"]) || array_key_exists("recommendations", $context) ? $context["recommendations"] : (function () { throw new RuntimeError('Variable "recommendations" does not exist.', 259, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
                    // line 260
                    yield "                    ";
                    $context["collab"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["collaborationParProduitId"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 260), [], "array", true, true, false, 260) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationParProduitId"]) || array_key_exists("collaborationParProduitId", $context) ? $context["collaborationParProduitId"] : (function () { throw new RuntimeError('Variable "collaborationParProduitId" does not exist.', 260, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 260), [], "array", false, false, false, 260)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["collaborationParProduitId"]) || array_key_exists("collaborationParProduitId", $context) ? $context["collaborationParProduitId"] : (function () { throw new RuntimeError('Variable "collaborationParProduitId" does not exist.', 260, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 260), [], "array", false, false, false, 260)) : (null));
                    // line 261
                    yield "                    <div class=\"col-md-4 col-sm-6\">
                        <div class=\"card h-100 border-0 shadow-sm\" style=\"border-radius:14px;overflow:hidden;transition:transform .25s ease;\">
                            <a href=\"";
                    // line 263
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 263)]), "html", null, true);
                    yield "\" class=\"text-decoration-none text-dark\">
                            ";
                    // line 264
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 264)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 265
                        yield "                                <img src=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photo", [], "any", false, false, false, 265), "html", null, true);
                        yield "\" alt=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 265), "html", null, true);
                        yield "\"
                                     class=\"card-img-top\" style=\"height:130px;object-fit:cover;\">
                            ";
                    } else {
                        // line 268
                        yield "                                <div class=\"d-flex align-items-center justify-content-center bg-light\"
                                     style=\"height:130px;font-size:44px;\">🛍️</div>
                            ";
                    }
                    // line 271
                    yield "                            </a>
                            <div class=\"card-body p-3 d-flex flex-column\">
                                <h6 class=\"fw-bold mb-1\">
                                    <a href=\"";
                    // line 274
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 274)]), "html", null, true);
                    yield "\" class=\"text-decoration-none text-dark\">
                                        ";
                    // line 275
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nom", [], "any", false, false, false, 275), "html", null, true);
                    yield "
                                    </a>
                                </h6>
                                ";
                    // line 278
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 278)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 279
                        yield "                                    <p class=\"text-muted small mb-2\" style=\"line-height:1.4;\">
                                        ";
                        // line 280
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 280), 0, 65), "html", null, true);
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 280)) > 65)) {
                            yield "…";
                        }
                        // line 281
                        yield "                                    </p>
                                ";
                    }
                    // line 283
                    yield "                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <span class=\"fw-bold\" style=\"color:#8B0000;font-size:16px;\">
                                        ";
                    // line 285
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 285), 2, ",", " "), "html", null, true);
                    yield " €
                                    </span>
                                    <span class=\"badge bg-light text-dark border\" style=\"font-size:11px;\" title=\"Unités vendues (stock boutique)\">
                                        🛒 ";
                    // line 288
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 288), "html", null, true);
                    yield " ventes
                                    </span>
                                </div>
                                <div class=\"d-grid gap-2 mt-3 position-relative\" style=\"z-index:2;\">
                                    <a href=\"";
                    // line 292
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produits_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 292)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-outline-primary\">
                                        <i class=\"fas fa-eye me-1\"></i>Voir le produit
                                    </a>
                                    ";
                    // line 295
                    if (((isset($context["collab"]) || array_key_exists("collab", $context) ? $context["collab"] : (function () { throw new RuntimeError('Variable "collab" does not exist.', 295, $this->source); })()) == "validee")) {
                        // line 296
                        yield "                                        <span class=\"badge bg-success text-wrap py-2\">
                                            <i class=\"fas fa-handshake me-1\"></i>Collaboration active
                                        </span>
                                    ";
                    } elseif ((                    // line 299
(isset($context["collab"]) || array_key_exists("collab", $context) ? $context["collab"] : (function () { throw new RuntimeError('Variable "collab" does not exist.', 299, $this->source); })()) == "refusee")) {
                        // line 300
                        yield "                                        <span class=\"badge bg-danger mb-1\">Collaboration refusée</span>
                                        <form action=\"";
                        // line 301
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_choisir_collaboration_produit", ["produitId" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 301)]), "html", null, true);
                        yield "\" method=\"post\"
                                              onsubmit=\"return confirm('Activer la collaboration sur ce produit ?');\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary w-100\">
                                                <i class=\"fas fa-redo me-1\"></i>Réessayer
                                            </button>
                                        </form>
                                    ";
                    } else {
                        // line 308
                        yield "                                        <form action=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_choisir_collaboration_produit", ["produitId" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idProduit", [], "any", false, false, false, 308)]), "html", null, true);
                        yield "\" method=\"post\"
                                              onsubmit=\"return confirm('Activer la collaboration sur ce produit ?');\">
                                            <button type=\"submit\" class=\"btn btn-sm w-100 text-white\" style=\"background:#2e7d32;border:none;\">
                                                <i class=\"fas fa-handshake me-1\"></i>Activer la collaboration
                                            </button>
                                        </form>
                                    ";
                    }
                    // line 315
                    yield "                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 320
                yield "                </div>

                <div class=\"text-center mt-3\">
                    <a href=\"";
                // line 323
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_recommandations");
                yield "\" class=\"btn btn-sm btn-outline-secondary\">
                        <i class=\"fas fa-sync-alt me-1\"></i>Actualiser via API
                    </a>
                </div>
            </div>
        </div>
        ";
            }
            // line 330
            yield "
    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 331
(isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 331, $this->source); })()), "statut", [], "any", false, false, false, 331) == "refuse")) {
            // line 332
            yield "        <!-- Demande refusée -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-times-circle fa-4x\" style=\"color: #f44336; margin-bottom: 20px;\"></i>
                    <h3>Demande refusée</h3>
                    <p>Votre demande de partenariat n'a pas été acceptée. Vous pouvez faire une nouvelle demande.</p>
                    <a href=\"";
            // line 339
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_devenir");
            yield "\" class=\"btn-partenaire\">
                        <i class=\"fas fa-redo\"></i> Refaire une demande
                    </a>
                </div>
            </div>
        </div>
    ";
        }
        // line 346
        yield "</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation du compteur de plats
    const platCount = document.getElementById('platCount');
    if (platCount) {
        fetch('/partenaire/mes-plats/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        platCount.textContent = count;
                        clearInterval(interval);
                    } else {
                        platCount.textContent = current;
                    }
                }, 30);
            })
            .catch(() => {
                platCount.textContent = '0';
            });
    }
    
    // Animation du compteur de commandes
    const commandeCount = document.getElementById('commandeCount');
    if (commandeCount) {
        fetch('/partenaire/commandes/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        commandeCount.textContent = count;
                        clearInterval(interval);
                    } else {
                        commandeCount.textContent = current;
                    }
                }, 30);
            })
            .catch(() => {
                commandeCount.textContent = '0';
            });
    }
    
    // Animation du compteur de CA
    const caCount = document.getElementById('caCount');
    if (caCount) {
        fetch('/partenaire/ca/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        caCount.textContent = count + ' €';
                        clearInterval(interval);
                    } else {
                        caCount.textContent = current + ' €';
                    }
                }, 30);
            })
            .catch(() => {
                caCount.textContent = '0 €';
            });
    }
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
        return "partenaire/index.html.twig";
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
        return array (  607 => 346,  597 => 339,  588 => 332,  586 => 331,  583 => 330,  573 => 323,  568 => 320,  558 => 315,  547 => 308,  537 => 301,  534 => 300,  532 => 299,  527 => 296,  525 => 295,  519 => 292,  512 => 288,  506 => 285,  502 => 283,  498 => 281,  493 => 280,  490 => 279,  488 => 278,  482 => 275,  478 => 274,  473 => 271,  468 => 268,  459 => 265,  457 => 264,  453 => 263,  449 => 261,  446 => 260,  442 => 259,  429 => 248,  426 => 247,  420 => 242,  414 => 240,  412 => 239,  408 => 238,  404 => 237,  400 => 236,  396 => 235,  385 => 227,  373 => 218,  367 => 215,  338 => 188,  336 => 187,  324 => 178,  311 => 167,  309 => 166,  300 => 160,  291 => 153,  289 => 152,  286 => 151,  276 => 147,  273 => 146,  269 => 145,  266 => 144,  256 => 140,  253 => 139,  249 => 138,  246 => 137,  236 => 133,  233 => 132,  229 => 131,  219 => 123,  209 => 122,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Espace Partenaire - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 40px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
        margin-top: 10px;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-en_attente {
        background: #FF9800;
        color: white;
    }
    
    .status-accepte {
        background: #4CAF50;
        color: white;
    }
    
    .status-refuse {
        background: #f44336;
        color: white;
    }
    
    .btn-partenaire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-partenaire:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
    
    .btn-annuler {
        background: #dc3545;
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: 15px;
    }
    
    .btn-annuler:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }
    
    .info-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border: 1px solid #E8D5B7;
    }
    
    .alert {
        border-radius: 12px;
        border-left: 4px solid;
    }
    .alert-success {
        border-left-color: #28a745;
    }
    .alert-danger {
        border-left-color: #dc3545;
    }
    .alert-info {
        border-left-color: #17a2b8;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-handshake\"></i> Espace Partenaire</h1>
        <p class=\"lead\">Gérez votre activité et vos plats</p>
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
    
    {% if partenaire is null %}
        <!-- Pas encore partenaire -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-store fa-4x\" style=\"color: #8B0000; margin-bottom: 20px;\"></i>
                    <h3>Devenez partenaire Koul Dyeri</h3>
                    <p>Rejoignez notre réseau et partagez vos délices avec notre communauté.</p>
                    <a href=\"{{ path('app_partenaire_devenir') }}\" class=\"btn-partenaire\">
                        <i class=\"fas fa-paper-plane\"></i> Devenir partenaire
                    </a>
                </div>
            </div>
        </div>
    {% elseif partenaire.statut == 'en_attente' %}
        <!-- Demande en attente -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-clock fa-4x\" style=\"color: #FF9800; margin-bottom: 20px;\"></i>
                    <h3>Demande en cours de traitement</h3>
                    <p>Votre demande de partenariat est en cours d'examen par notre équipe.</p>
                    <span class=\"status-badge status-en_attente\">⏳ En attente</span>
                    
                    <!-- ✅ BOUTON POUR ANNULER LA DEMANDE -->
                    <div class=\"mt-4\">
                        <form action=\"{{ path('app_partenaire_annuler') }}\" method=\"post\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir annuler votre demande de partenariat ?')\">
                            <button type=\"submit\" class=\"btn-annuler\">
                                <i class=\"fas fa-times\"></i> Annuler la demande
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {% elseif partenaire.statut == 'accepte' %}
        <!-- Partenaire accepté -->
        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"platCount\">0</div>
                    <div class=\"stat-label\">Mes plats</div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"commandeCount\">0</div>
                    <div class=\"stat-label\">Commandes</div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-number\" id=\"caCount\">0</div>
                    <div class=\"stat-label\">Chiffre d'affaires</div>
                </div>
            </div>
        </div>
        
        <div class=\"row mt-4\">
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-utensils\"></i> Gestion des plats</h4>
                    <p>Ajoutez, modifiez ou supprimez vos plats</p>
                    <a href=\"{{ path('app_partenaire_ajouter_plat') }}\" class=\"btn btn-primary btn-sm\">
                        <i class=\"fas fa-plus\"></i> Ajouter un plat
                    </a>
                    <a href=\"{{ path('app_partenaire_mes_plats') }}\" class=\"btn btn-secondary btn-sm\">
                        <i class=\"fas fa-list\"></i> Voir mes plats
                    </a>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-link\"></i> Mes collaborations</h4>
                    <p>Consultez et gérez vos collaborations produits</p>
                    <a href=\"{{ path('app_partenaire_collaborations') }}\" class=\"btn btn-success btn-sm\">
                        <i class=\"fas fa-link\"></i> Voir les collaborations
                    </a>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"info-card\">
                    <h4><i class=\"fas fa-chart-line\"></i> Informations</h4>
                    <p><strong>Restaurant:</strong> {{ partenaire.nom }}</p>
                    <p><strong>Type:</strong> {{ partenaire.type }}</p>
                    <p><strong>Téléphone:</strong> {{ partenaire.telephone }}</p>
                    <p><strong>Adresse:</strong> {{ partenaire.adresse }}</p>
                    {% if partenaire.description %}
                        <p><strong>Description:</strong> {{ partenaire.description|slice(0, 100) }}...</p>
                    {% endif %}
                </div>
            </div>
        </div>

        {# ── Recommandations produits ── #}
        {% if recommendations|default([])|length > 0 %}
        <div class=\"mt-4\">
            <div class=\"info-card\" style=\"border: 2px solid #E8D5B7;\">
                <div class=\"d-flex align-items-center mb-3 gap-2\">
                    <span style=\"font-size:28px;\">⭐</span>
                    <div>
                        <h4 class=\"mb-0\">Produits recommandés pour vous</h4>
                        <small class=\"text-muted\">Sélectionnés selon vos plats — <strong>activez une collaboration</strong> directement sur un produit pour commencer à collaborer</small>
                    </div>
                </div>

                <div class=\"row g-3\">
                    {% for produit in recommendations %}
                    {% set collab = collaborationParProduitId[produit.idProduit] ?? null %}
                    <div class=\"col-md-4 col-sm-6\">
                        <div class=\"card h-100 border-0 shadow-sm\" style=\"border-radius:14px;overflow:hidden;transition:transform .25s ease;\">
                            <a href=\"{{ path('app_produits_show', {id: produit.idProduit}) }}\" class=\"text-decoration-none text-dark\">
                            {% if produit.photo %}
                                <img src=\"{{ produit.photo }}\" alt=\"{{ produit.nom }}\"
                                     class=\"card-img-top\" style=\"height:130px;object-fit:cover;\">
                            {% else %}
                                <div class=\"d-flex align-items-center justify-content-center bg-light\"
                                     style=\"height:130px;font-size:44px;\">🛍️</div>
                            {% endif %}
                            </a>
                            <div class=\"card-body p-3 d-flex flex-column\">
                                <h6 class=\"fw-bold mb-1\">
                                    <a href=\"{{ path('app_produits_show', {id: produit.idProduit}) }}\" class=\"text-decoration-none text-dark\">
                                        {{ produit.nom }}
                                    </a>
                                </h6>
                                {% if produit.description %}
                                    <p class=\"text-muted small mb-2\" style=\"line-height:1.4;\">
                                        {{ produit.description|slice(0,65) }}{% if produit.description|length > 65 %}…{% endif %}
                                    </p>
                                {% endif %}
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <span class=\"fw-bold\" style=\"color:#8B0000;font-size:16px;\">
                                        {{ produit.prix|number_format(2, ',', ' ') }} €
                                    </span>
                                    <span class=\"badge bg-light text-dark border\" style=\"font-size:11px;\" title=\"Unités vendues (stock boutique)\">
                                        🛒 {{ produit.quantite }} ventes
                                    </span>
                                </div>
                                <div class=\"d-grid gap-2 mt-3 position-relative\" style=\"z-index:2;\">
                                    <a href=\"{{ path('app_produits_show', {id: produit.idProduit}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                        <i class=\"fas fa-eye me-1\"></i>Voir le produit
                                    </a>
                                    {% if collab == 'validee' %}
                                        <span class=\"badge bg-success text-wrap py-2\">
                                            <i class=\"fas fa-handshake me-1\"></i>Collaboration active
                                        </span>
                                    {% elseif collab == 'refusee' %}
                                        <span class=\"badge bg-danger mb-1\">Collaboration refusée</span>
                                        <form action=\"{{ path('app_partenaire_choisir_collaboration_produit', {produitId: produit.idProduit}) }}\" method=\"post\"
                                              onsubmit=\"return confirm('Activer la collaboration sur ce produit ?');\">
                                            <button type=\"submit\" class=\"btn btn-sm btn-outline-secondary w-100\">
                                                <i class=\"fas fa-redo me-1\"></i>Réessayer
                                            </button>
                                        </form>
                                    {% else %}
                                        <form action=\"{{ path('app_partenaire_choisir_collaboration_produit', {produitId: produit.idProduit}) }}\" method=\"post\"
                                              onsubmit=\"return confirm('Activer la collaboration sur ce produit ?');\">
                                            <button type=\"submit\" class=\"btn btn-sm w-100 text-white\" style=\"background:#2e7d32;border:none;\">
                                                <i class=\"fas fa-handshake me-1\"></i>Activer la collaboration
                                            </button>
                                        </form>
                                    {% endif %}
                                </div>
                            </div>
                        </div>
                    </div>
                    {% endfor %}
                </div>

                <div class=\"text-center mt-3\">
                    <a href=\"{{ path('app_partenaire_recommandations') }}\" class=\"btn btn-sm btn-outline-secondary\">
                        <i class=\"fas fa-sync-alt me-1\"></i>Actualiser via API
                    </a>
                </div>
            </div>
        </div>
        {% endif %}

    {% elseif partenaire.statut == 'refuse' %}
        <!-- Demande refusée -->
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 text-center\">
                <div class=\"info-card\">
                    <i class=\"fas fa-times-circle fa-4x\" style=\"color: #f44336; margin-bottom: 20px;\"></i>
                    <h3>Demande refusée</h3>
                    <p>Votre demande de partenariat n'a pas été acceptée. Vous pouvez faire une nouvelle demande.</p>
                    <a href=\"{{ path('app_partenaire_devenir') }}\" class=\"btn-partenaire\">
                        <i class=\"fas fa-redo\"></i> Refaire une demande
                    </a>
                </div>
            </div>
        </div>
    {% endif %}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation du compteur de plats
    const platCount = document.getElementById('platCount');
    if (platCount) {
        fetch('/partenaire/mes-plats/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        platCount.textContent = count;
                        clearInterval(interval);
                    } else {
                        platCount.textContent = current;
                    }
                }, 30);
            })
            .catch(() => {
                platCount.textContent = '0';
            });
    }
    
    // Animation du compteur de commandes
    const commandeCount = document.getElementById('commandeCount');
    if (commandeCount) {
        fetch('/partenaire/commandes/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        commandeCount.textContent = count;
                        clearInterval(interval);
                    } else {
                        commandeCount.textContent = current;
                    }
                }, 30);
            })
            .catch(() => {
                commandeCount.textContent = '0';
            });
    }
    
    // Animation du compteur de CA
    const caCount = document.getElementById('caCount');
    if (caCount) {
        fetch('/partenaire/ca/count')
            .then(response => response.json())
            .then(data => {
                let count = data.count || 0;
                let current = 0;
                const interval = setInterval(() => {
                    current += Math.ceil(count / 30);
                    if (current >= count) {
                        caCount.textContent = count + ' €';
                        clearInterval(interval);
                    } else {
                        caCount.textContent = current + ' €';
                    }
                }, 30);
            })
            .catch(() => {
                caCount.textContent = '0 €';
            });
    }
});
</script>
{% endblock %}", "partenaire/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\index.html.twig");
    }
}

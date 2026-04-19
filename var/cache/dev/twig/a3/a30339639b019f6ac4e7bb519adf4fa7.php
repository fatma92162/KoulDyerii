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

/* plats_public/index.html.twig */
class __TwigTemplate_0ce437ed46d6440a8e406fc72a7d4d81 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "plats_public/index.html.twig"));

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

        yield "Nos Plats | Koul Dyeri";
        
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
    .plats-hero {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 60%, #C0392B 100%);
        padding: 60px 0 40px;
        color: white;
        text-align: center;
        margin-bottom: 0;
    }
    .plats-hero h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 8px; }

    /* ── Best-seller section ── */
    .bestseller-section {
        background: linear-gradient(180deg, #fff8f0 0%, #ffffff 100%);
        padding: 50px 0 30px;
    }
    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 30px;
    }

    /* ── Plat card ── */
    .plat-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,.09);
        transition: transform .25s ease, box-shadow .25s ease;
        height: 100%;
    }
    .plat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,.15);
    }
    .plat-card .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .plat-card .no-img {
        height: 200px;
        background: #f8f0e8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 56px;
    }
    .plat-card .card-body { padding: 18px 20px; }
    .plat-card .plat-nom { font-weight: 700; font-size: 1.05rem; margin-bottom: 4px; }
    .plat-card .plat-prix {
        font-size: 1.2rem;
        font-weight: 800;
        color: #8B0000;
    }

    /* ── Best-seller badge ── */
    .bs-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(135deg, #FF6B00, #FF9800);
        color: white;
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(255,107,0,.5);
    }

    /* ── Search bar ── */
    .search-bar { background: white; border-radius: 50px; padding: 6px 20px; box-shadow: 0 4px 16px rgba(0,0,0,.1); }
    .search-bar input { border: none; outline: none; font-size: 15px; width: 240px; }
    .btn-search { background: #8B0000; color: white; border: none; border-radius: 30px; padding: 8px 20px; }

    /* ── Filter chips ── */
    .filter-chip {
        display: inline-block;
        padding: 5px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid #e0e0e0;
        color: #555;
        transition: all .2s;
        margin: 3px;
    }
    .filter-chip:hover, .filter-chip.active {
        background: #8B0000;
        border-color: #8B0000;
        color: white;
    }

    /* Séparateur */
    .all-section { padding: 50px 0; }
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
        yield "
";
        // line 107
        yield "<div class=\"plats-hero\">
    <div class=\"container\">
        <h1>🍽️ Nos Plats</h1>
        <p class=\"lead opacity-80\">Découvrez les plats de nos partenaires, approuvés et prêts à la dégustation</p>

        ";
        // line 112
        if (((isset($context["panierPlatsCount"]) || array_key_exists("panierPlatsCount", $context) ? $context["panierPlatsCount"] : (function () { throw new RuntimeError('Variable "panierPlatsCount" does not exist.', 112, $this->source); })()) > 0)) {
            // line 113
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_panier");
            yield "\" class=\"btn btn-light btn-lg rounded-pill mt-2\">
                🛒 Panier plats <span class=\"badge bg-danger ms-1\">";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["panierPlatsCount"]) || array_key_exists("panierPlatsCount", $context) ? $context["panierPlatsCount"] : (function () { throw new RuntimeError('Variable "panierPlatsCount" does not exist.', 114, $this->source); })()), "html", null, true);
            yield "</span>
            </a>
        ";
        }
        // line 117
        yield "
        ";
        // line 119
        yield "        <form method=\"get\" class=\"d-flex justify-content-center mt-4\">
            <div class=\"search-bar d-flex align-items-center\">
                <i class=\"fas fa-search text-muted me-2\"></i>
                <input type=\"text\" name=\"search\" value=\"";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 122, $this->source); })()), "html", null, true);
        yield "\"
                       placeholder=\"Rechercher un plat…\" id=\"search-input\">
                ";
        // line 124
        if ((($tmp = (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 124, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 125
            yield "                    <input type=\"hidden\" name=\"categorie\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 125, $this->source); })()), "html", null, true);
            yield "\">
                ";
        }
        // line 127
        yield "            </div>
            <button type=\"submit\" class=\"btn-search ms-2\">Chercher</button>
            ";
        // line 129
        if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 129, $this->source); })()) || (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 129, $this->source); })()))) {
            // line 130
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public");
            yield "\" class=\"btn btn-outline-light ms-2 rounded-pill\">
                    ✕ Réinitialiser
                </a>
            ";
        }
        // line 134
        yield "        </form>
    </div>
</div>

";
        // line 139
        yield "<div class=\"container mt-3\">
    ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 140, $this->source); })()), "flashes", ["success"], "method", false, false, false, 140));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 141
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            ";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 145, $this->source); })()), "flashes", ["error"], "method", false, false, false, 145));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 146
            yield "        <div class=\"alert alert-danger alert-dismissible fade show\">
            ";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "</div>

";
        // line 153
        if ((((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["bestSellers"]) || array_key_exists("bestSellers", $context) ? $context["bestSellers"] : (function () { throw new RuntimeError('Variable "bestSellers" does not exist.', 153, $this->source); })())) > 0) &&  !(isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 153, $this->source); })())) &&  !(isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 153, $this->source); })()))) {
            // line 154
            yield "<section class=\"bestseller-section\">
    <div class=\"container\">
        <h2 class=\"section-title\">🔥 Meilleures ventes</h2>
        <p class=\"text-muted mb-4\">Classés par quantités réellement commandées (hors commandes annulées)</p>

        <div class=\"row g-4\">
            ";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["bestSellers"]) || array_key_exists("bestSellers", $context) ? $context["bestSellers"] : (function () { throw new RuntimeError('Variable "bestSellers" does not exist.', 160, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
                // line 161
                yield "            <div class=\"col-md-4 col-sm-6\">
                <div class=\"position-relative h-100\">
                    <span class=\"bs-badge\">🔥 #";
                // line 163
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 163), "html", null, true);
                yield " Best-seller</span>
                    <div class=\"plat-card card h-100\">
                        ";
                // line 165
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 165)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 166
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 166), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 166), "html", null, true);
                    yield "\">
                        ";
                } else {
                    // line 168
                    yield "                            <div class=\"no-img\">🍽️</div>
                        ";
                }
                // line 170
                yield "                        <div class=\"card-body d-flex flex-column\">
                            <div class=\"plat-nom\">";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 171), "html", null, true);
                yield "</div>
                            ";
                // line 172
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 172)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 173
                    yield "                                <span class=\"badge bg-secondary mb-2\" style=\"width:fit-content;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 173), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 175
                yield "                            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 175)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 176
                    yield "                                <p class=\"text-muted small mb-auto\">
                                    ";
                    // line 177
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 177), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 177)) > 80)) {
                        yield "…";
                    }
                    // line 178
                    yield "                                </p>
                            ";
                }
                // line 180
                yield "                            <div class=\"d-flex justify-content-between align-items-center mt-3\">
                                <span class=\"plat-prix\">";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 181), 2, ",", " "), "html", null, true);
                yield " €</span>
                                <span class=\"text-muted small\">🛒 ";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "salesCount", [], "any", false, false, false, 182), "html", null, true);
                yield " ventes</span>
                            </div>
                            ";
                // line 184
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 184)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 185
                    yield "                                <small class=\"text-muted mt-1\">
                                    <i class=\"fas fa-store me-1\"></i>";
                    // line 186
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 186), "nom", [], "any", false, false, false, 186), "html", null, true);
                    yield "
                                </small>
                            ";
                }
                // line 189
                yield "                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_select", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 189)]), "html", null, true);
                yield "\" method=\"post\" class=\"mt-3 d-flex gap-2 align-items-center flex-wrap\">
                                <input type=\"number\" name=\"quantite\" value=\"1\" min=\"1\" class=\"form-control form-control-sm\" style=\"width:72px;\">
                                <button type=\"submit\" class=\"btn btn-sm flex-grow-1\"
                                        style=\"background:#8B0000;color:white;border-radius:30px;\">
                                    <i class=\"fas fa-cart-plus me-1\"></i>Ajouter au panier
                                </button>
                            </form>
                        </div>
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
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 201
            yield "        </div>
    </div>
</section>
";
        }
        // line 205
        yield "
";
        // line 207
        yield "<section class=\"all-section\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2\">
            <h2 class=\"section-title mb-0\">
                ";
        // line 211
        if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 211, $this->source); })()) || (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 211, $this->source); })()))) {
            // line 212
            yield "                    🔍 Résultats de recherche
                ";
        } else {
            // line 214
            yield "                    🍽️ Tous les plats disponibles
                ";
        }
        // line 216
        yield "            </h2>
            <span class=\"badge bg-success fs-6\">";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 217, $this->source); })())), "html", null, true);
        yield " plat";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 217, $this->source); })())) > 1)) ? ("s") : (""));
        yield "</span>
        </div>

        ";
        // line 221
        yield "        ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 221, $this->source); })())) > 0)) {
            // line 222
            yield "        <div class=\"mb-4\">
            <a href=\"";
            // line 223
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public", (((($tmp = (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 223, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (["search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 223, $this->source); })())]) : ([]))), "html", null, true);
            yield "\"
               class=\"filter-chip ";
            // line 224
            yield (((($tmp =  !(isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 224, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\">
                Toutes catégories
            </a>
            ";
            // line 227
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 227, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 228
                yield "                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public", ["categorie" => $context["cat"], "search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 228, $this->source); })())]), "html", null, true);
                yield "\"
                   class=\"filter-chip ";
                // line 229
                yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 229, $this->source); })()) == $context["cat"])) ? ("active") : (""));
                yield "\">
                    ";
                // line 230
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cat"], "html", null, true);
                yield "
                </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 233
            yield "        </div>
        ";
        }
        // line 235
        yield "
        ";
        // line 236
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 236, $this->source); })())) > 0)) {
            // line 237
            yield "        <div class=\"row g-4\">
            ";
            // line 238
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 238, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
                // line 239
                yield "            <div class=\"col-md-4 col-sm-6\">
                <div class=\"plat-card card\">
                    ";
                // line 241
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 241)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 242
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "image", [], "any", false, false, false, 242), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 242), "html", null, true);
                    yield "\">
                    ";
                } else {
                    // line 244
                    yield "                        <div class=\"no-img\">🍽️</div>
                    ";
                }
                // line 246
                yield "                    <div class=\"card-body d-flex flex-column\">
                        <div class=\"d-flex justify-content-between align-items-start mb-1\">
                            <div class=\"plat-nom\">";
                // line 248
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 248), "html", null, true);
                yield "</div>
                            ";
                // line 249
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "isBestSeller", [], "any", false, false, false, 249)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 250
                    yield "                                <span style=\"font-size:18px;\" title=\"Best-seller\">🔥</span>
                            ";
                }
                // line 252
                yield "                        </div>
                        ";
                // line 253
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 253)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 254
                    yield "                            <span class=\"badge bg-light text-dark border mb-2\" style=\"width:fit-content;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 254), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 256
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 256)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 257
                    yield "                            <p class=\"text-muted small mb-auto\">
                                ";
                    // line 258
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 258), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "description", [], "any", false, false, false, 258)) > 80)) {
                        yield "…";
                    }
                    // line 259
                    yield "                            </p>
                        ";
                }
                // line 261
                yield "                        <div class=\"d-flex justify-content-between align-items-center mt-3\">
                            <span class=\"plat-prix\">";
                // line 262
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "prix", [], "any", false, false, false, 262), 2, ",", " "), "html", null, true);
                yield " €</span>
                            ";
                // line 263
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "salesCount", [], "any", false, false, false, 263) > 0)) {
                    // line 264
                    yield "                                <span class=\"text-muted small\">🛒 ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "salesCount", [], "any", false, false, false, 264), "html", null, true);
                    yield " ventes</span>
                            ";
                }
                // line 266
                yield "                        </div>
                        ";
                // line 267
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 267)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 268
                    yield "                            <small class=\"text-muted mt-1\">
                                <i class=\"fas fa-store me-1\"></i>";
                    // line 269
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "partenaire", [], "any", false, false, false, 269), "nom", [], "any", false, false, false, 269), "html", null, true);
                    yield "
                            </small>
                        ";
                }
                // line 272
                yield "                        <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plat_select", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 272)]), "html", null, true);
                yield "\" method=\"post\" class=\"mt-3 d-flex gap-2 align-items-center flex-wrap\">
                            <input type=\"number\" name=\"quantite\" value=\"1\" min=\"1\" class=\"form-control form-control-sm\" style=\"width:72px;\">
                            <button type=\"submit\" class=\"btn btn-sm flex-grow-1\"
                                    style=\"background:#8B0000;color:white;border-radius:30px;\">
                                <i class=\"fas fa-cart-plus me-1\"></i>Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 283
            yield "        </div>
        ";
        } else {
            // line 285
            yield "            <div class=\"text-center py-5 text-muted\">
                <i class=\"fas fa-search fa-3x mb-3\"></i>
                <h5>Aucun plat trouvé</h5>
                ";
            // line 288
            if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 288, $this->source); })()) || (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 288, $this->source); })()))) {
                // line 289
                yield "                    <p>Essayez une autre recherche ou supprimez les filtres.</p>
                    <a href=\"";
                // line 290
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_plats_public");
                yield "\" class=\"btn btn-outline-secondary\">
                        Voir tous les plats
                    </a>
                ";
            } else {
                // line 294
                yield "                    <p>Aucun plat approuvé pour le moment. Revenez bientôt !</p>
                ";
            }
            // line 296
            yield "            </div>
        ";
        }
        // line 298
        yield "    </div>
</section>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "plats_public/index.html.twig";
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
        return array (  659 => 298,  655 => 296,  651 => 294,  644 => 290,  641 => 289,  639 => 288,  634 => 285,  630 => 283,  612 => 272,  606 => 269,  603 => 268,  601 => 267,  598 => 266,  592 => 264,  590 => 263,  586 => 262,  583 => 261,  579 => 259,  574 => 258,  571 => 257,  568 => 256,  562 => 254,  560 => 253,  557 => 252,  553 => 250,  551 => 249,  547 => 248,  543 => 246,  539 => 244,  531 => 242,  529 => 241,  525 => 239,  521 => 238,  518 => 237,  516 => 236,  513 => 235,  509 => 233,  500 => 230,  496 => 229,  491 => 228,  487 => 227,  481 => 224,  477 => 223,  474 => 222,  471 => 221,  463 => 217,  460 => 216,  456 => 214,  452 => 212,  450 => 211,  444 => 207,  441 => 205,  435 => 201,  408 => 189,  402 => 186,  399 => 185,  397 => 184,  392 => 182,  388 => 181,  385 => 180,  381 => 178,  376 => 177,  373 => 176,  370 => 175,  364 => 173,  362 => 172,  358 => 171,  355 => 170,  351 => 168,  343 => 166,  341 => 165,  336 => 163,  332 => 161,  315 => 160,  307 => 154,  305 => 153,  301 => 150,  292 => 147,  289 => 146,  284 => 145,  275 => 142,  272 => 141,  268 => 140,  265 => 139,  259 => 134,  251 => 130,  249 => 129,  245 => 127,  239 => 125,  237 => 124,  232 => 122,  227 => 119,  224 => 117,  218 => 114,  213 => 113,  211 => 112,  204 => 107,  201 => 105,  191 => 104,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Nos Plats | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .plats-hero {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 60%, #C0392B 100%);
        padding: 60px 0 40px;
        color: white;
        text-align: center;
        margin-bottom: 0;
    }
    .plats-hero h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 8px; }

    /* ── Best-seller section ── */
    .bestseller-section {
        background: linear-gradient(180deg, #fff8f0 0%, #ffffff 100%);
        padding: 50px 0 30px;
    }
    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 30px;
    }

    /* ── Plat card ── */
    .plat-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,.09);
        transition: transform .25s ease, box-shadow .25s ease;
        height: 100%;
    }
    .plat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,.15);
    }
    .plat-card .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .plat-card .no-img {
        height: 200px;
        background: #f8f0e8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 56px;
    }
    .plat-card .card-body { padding: 18px 20px; }
    .plat-card .plat-nom { font-weight: 700; font-size: 1.05rem; margin-bottom: 4px; }
    .plat-card .plat-prix {
        font-size: 1.2rem;
        font-weight: 800;
        color: #8B0000;
    }

    /* ── Best-seller badge ── */
    .bs-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(135deg, #FF6B00, #FF9800);
        color: white;
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(255,107,0,.5);
    }

    /* ── Search bar ── */
    .search-bar { background: white; border-radius: 50px; padding: 6px 20px; box-shadow: 0 4px 16px rgba(0,0,0,.1); }
    .search-bar input { border: none; outline: none; font-size: 15px; width: 240px; }
    .btn-search { background: #8B0000; color: white; border: none; border-radius: 30px; padding: 8px 20px; }

    /* ── Filter chips ── */
    .filter-chip {
        display: inline-block;
        padding: 5px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid #e0e0e0;
        color: #555;
        transition: all .2s;
        margin: 3px;
    }
    .filter-chip:hover, .filter-chip.active {
        background: #8B0000;
        border-color: #8B0000;
        color: white;
    }

    /* Séparateur */
    .all-section { padding: 50px 0; }
</style>
{% endblock %}

{% block body %}

{# ── Hero ── #}
<div class=\"plats-hero\">
    <div class=\"container\">
        <h1>🍽️ Nos Plats</h1>
        <p class=\"lead opacity-80\">Découvrez les plats de nos partenaires, approuvés et prêts à la dégustation</p>

        {% if panierPlatsCount > 0 %}
            <a href=\"{{ path('app_plat_panier') }}\" class=\"btn btn-light btn-lg rounded-pill mt-2\">
                🛒 Panier plats <span class=\"badge bg-danger ms-1\">{{ panierPlatsCount }}</span>
            </a>
        {% endif %}

        {# Barre de recherche #}
        <form method=\"get\" class=\"d-flex justify-content-center mt-4\">
            <div class=\"search-bar d-flex align-items-center\">
                <i class=\"fas fa-search text-muted me-2\"></i>
                <input type=\"text\" name=\"search\" value=\"{{ search }}\"
                       placeholder=\"Rechercher un plat…\" id=\"search-input\">
                {% if categorie %}
                    <input type=\"hidden\" name=\"categorie\" value=\"{{ categorie }}\">
                {% endif %}
            </div>
            <button type=\"submit\" class=\"btn-search ms-2\">Chercher</button>
            {% if search or categorie %}
                <a href=\"{{ path('app_plats_public') }}\" class=\"btn btn-outline-light ms-2 rounded-pill\">
                    ✕ Réinitialiser
                </a>
            {% endif %}
        </form>
    </div>
</div>

{# ── Flash messages ── #}
<div class=\"container mt-3\">
    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            {{ msg }}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    {% for msg in app.flashes('error') %}
        <div class=\"alert alert-danger alert-dismissible fade show\">
            {{ msg }}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
</div>

{# ── 🔥 Best Sellers ── #}
{% if bestSellers|length > 0 and not search and not categorie %}
<section class=\"bestseller-section\">
    <div class=\"container\">
        <h2 class=\"section-title\">🔥 Meilleures ventes</h2>
        <p class=\"text-muted mb-4\">Classés par quantités réellement commandées (hors commandes annulées)</p>

        <div class=\"row g-4\">
            {% for plat in bestSellers %}
            <div class=\"col-md-4 col-sm-6\">
                <div class=\"position-relative h-100\">
                    <span class=\"bs-badge\">🔥 #{{ loop.index }} Best-seller</span>
                    <div class=\"plat-card card h-100\">
                        {% if plat.image %}
                            <img src=\"{{ plat.image }}\" class=\"card-img-top\" alt=\"{{ plat.nom }}\">
                        {% else %}
                            <div class=\"no-img\">🍽️</div>
                        {% endif %}
                        <div class=\"card-body d-flex flex-column\">
                            <div class=\"plat-nom\">{{ plat.nom }}</div>
                            {% if plat.categorie %}
                                <span class=\"badge bg-secondary mb-2\" style=\"width:fit-content;\">{{ plat.categorie }}</span>
                            {% endif %}
                            {% if plat.description %}
                                <p class=\"text-muted small mb-auto\">
                                    {{ plat.description|slice(0,80) }}{% if plat.description|length > 80 %}…{% endif %}
                                </p>
                            {% endif %}
                            <div class=\"d-flex justify-content-between align-items-center mt-3\">
                                <span class=\"plat-prix\">{{ plat.prix|number_format(2, ',', ' ') }} €</span>
                                <span class=\"text-muted small\">🛒 {{ plat.salesCount }} ventes</span>
                            </div>
                            {% if plat.partenaire %}
                                <small class=\"text-muted mt-1\">
                                    <i class=\"fas fa-store me-1\"></i>{{ plat.partenaire.nom }}
                                </small>
                            {% endif %}
                            <form action=\"{{ path('app_plat_select', {id: plat.id}) }}\" method=\"post\" class=\"mt-3 d-flex gap-2 align-items-center flex-wrap\">
                                <input type=\"number\" name=\"quantite\" value=\"1\" min=\"1\" class=\"form-control form-control-sm\" style=\"width:72px;\">
                                <button type=\"submit\" class=\"btn btn-sm flex-grow-1\"
                                        style=\"background:#8B0000;color:white;border-radius:30px;\">
                                    <i class=\"fas fa-cart-plus me-1\"></i>Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</section>
{% endif %}

{# ── Tous les plats approuvés ── #}
<section class=\"all-section\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2\">
            <h2 class=\"section-title mb-0\">
                {% if search or categorie %}
                    🔍 Résultats de recherche
                {% else %}
                    🍽️ Tous les plats disponibles
                {% endif %}
            </h2>
            <span class=\"badge bg-success fs-6\">{{ plats|length }} plat{{ plats|length > 1 ? 's' : '' }}</span>
        </div>

        {# Filtres catégorie #}
        {% if categories|length > 0 %}
        <div class=\"mb-4\">
            <a href=\"{{ path('app_plats_public', search ? {search: search} : {}) }}\"
               class=\"filter-chip {{ not categorie ? 'active' : '' }}\">
                Toutes catégories
            </a>
            {% for cat in categories %}
                <a href=\"{{ path('app_plats_public', {categorie: cat, search: search}) }}\"
                   class=\"filter-chip {{ categorie == cat ? 'active' : '' }}\">
                    {{ cat }}
                </a>
            {% endfor %}
        </div>
        {% endif %}

        {% if plats|length > 0 %}
        <div class=\"row g-4\">
            {% for plat in plats %}
            <div class=\"col-md-4 col-sm-6\">
                <div class=\"plat-card card\">
                    {% if plat.image %}
                        <img src=\"{{ plat.image }}\" class=\"card-img-top\" alt=\"{{ plat.nom }}\">
                    {% else %}
                        <div class=\"no-img\">🍽️</div>
                    {% endif %}
                    <div class=\"card-body d-flex flex-column\">
                        <div class=\"d-flex justify-content-between align-items-start mb-1\">
                            <div class=\"plat-nom\">{{ plat.nom }}</div>
                            {% if plat.isBestSeller %}
                                <span style=\"font-size:18px;\" title=\"Best-seller\">🔥</span>
                            {% endif %}
                        </div>
                        {% if plat.categorie %}
                            <span class=\"badge bg-light text-dark border mb-2\" style=\"width:fit-content;\">{{ plat.categorie }}</span>
                        {% endif %}
                        {% if plat.description %}
                            <p class=\"text-muted small mb-auto\">
                                {{ plat.description|slice(0,80) }}{% if plat.description|length > 80 %}…{% endif %}
                            </p>
                        {% endif %}
                        <div class=\"d-flex justify-content-between align-items-center mt-3\">
                            <span class=\"plat-prix\">{{ plat.prix|number_format(2, ',', ' ') }} €</span>
                            {% if plat.salesCount > 0 %}
                                <span class=\"text-muted small\">🛒 {{ plat.salesCount }} ventes</span>
                            {% endif %}
                        </div>
                        {% if plat.partenaire %}
                            <small class=\"text-muted mt-1\">
                                <i class=\"fas fa-store me-1\"></i>{{ plat.partenaire.nom }}
                            </small>
                        {% endif %}
                        <form action=\"{{ path('app_plat_select', {id: plat.id}) }}\" method=\"post\" class=\"mt-3 d-flex gap-2 align-items-center flex-wrap\">
                            <input type=\"number\" name=\"quantite\" value=\"1\" min=\"1\" class=\"form-control form-control-sm\" style=\"width:72px;\">
                            <button type=\"submit\" class=\"btn btn-sm flex-grow-1\"
                                    style=\"background:#8B0000;color:white;border-radius:30px;\">
                                <i class=\"fas fa-cart-plus me-1\"></i>Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
        {% else %}
            <div class=\"text-center py-5 text-muted\">
                <i class=\"fas fa-search fa-3x mb-3\"></i>
                <h5>Aucun plat trouvé</h5>
                {% if search or categorie %}
                    <p>Essayez une autre recherche ou supprimez les filtres.</p>
                    <a href=\"{{ path('app_plats_public') }}\" class=\"btn btn-outline-secondary\">
                        Voir tous les plats
                    </a>
                {% else %}
                    <p>Aucun plat approuvé pour le moment. Revenez bientôt !</p>
                {% endif %}
            </div>
        {% endif %}
    </div>
</section>

{% endblock %}
", "plats_public/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\plats_public\\index.html.twig");
    }
}

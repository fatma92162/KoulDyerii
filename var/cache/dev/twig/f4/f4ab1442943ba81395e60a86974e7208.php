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

/* recompenses/index.html.twig */
class __TwigTemplate_b2716e6dd7545622553e7f4024f554a9 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "recompenses/index.html.twig"));

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

        yield "Mes Récompenses - Programme de Fidélité";
        
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
    .points-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }
    
    .points-number {
        font-size: 48px;
        font-weight: bold;
    }
    
    .progress-custom {
        height: 12px;
        border-radius: 10px;
        background: rgba(255,255,255,0.3);
    }
    
    .progress-custom .progress-bar {
        background: #FFD700;
        border-radius: 10px;
    }
    
    .recompense-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        margin-bottom: 20px;
    }
    
    .recompense-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .recompense-card.disabled {
        opacity: 0.6;
        filter: grayscale(0.3);
    }
    
    .recompense-card .card-body {
        text-align: center;
        padding: 25px;
    }
    
    .recompense-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }
    
    .recompense-points {
        font-size: 24px;
        font-weight: bold;
        color: #FF6B6B;
    }
    
    .badge-obtenu {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #4CAF50;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
    
    .palier-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .recompense-obtenue {
        border-left: 4px solid #4CAF50;
        background: #f0fff4;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .btn-echanger {
        animation: pulse 2s infinite;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 100
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 101
        yield "<div class=\"container py-5\">
    <!-- Carte des points -->
    <div class=\"points-card\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <h2>⭐ Programme de Fidélité</h2>
                <p class=\"mb-2\">Vos points accumulés</p>
                <div class=\"points-number\">";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pointsActuels"]) || array_key_exists("pointsActuels", $context) ? $context["pointsActuels"] : (function () { throw new RuntimeError('Variable "pointsActuels" does not exist.', 108, $this->source); })()), "html", null, true);
        yield " points</div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"text-md-end\">
                    <i class=\"fas fa-gem\" style=\"font-size: 64px; opacity: 0.5;\"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Progression vers la prochaine récompense -->
    ";
        // line 119
        if ((($tmp = (isset($context["prochaineRecompense"]) || array_key_exists("prochaineRecompense", $context) ? $context["prochaineRecompense"] : (function () { throw new RuntimeError('Variable "prochaineRecompense" does not exist.', 119, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 120
            yield "    <div class=\"palier-section\">
        <h4 class=\"mb-3\">🎯 Prochaine récompense</h4>
        <div class=\"d-flex justify-content-between mb-2\">
            <span>
                <i class=\"fas ";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["prochaineRecompense"] ?? null), "icone", [], "any", true, true, false, 124)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["prochaineRecompense"]) || array_key_exists("prochaineRecompense", $context) ? $context["prochaineRecompense"] : (function () { throw new RuntimeError('Variable "prochaineRecompense" does not exist.', 124, $this->source); })()), "icone", [], "any", false, false, false, 124), "fa-gift")) : ("fa-gift")), "html", null, true);
            yield "\"></i>
                ";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["prochaineRecompense"]) || array_key_exists("prochaineRecompense", $context) ? $context["prochaineRecompense"] : (function () { throw new RuntimeError('Variable "prochaineRecompense" does not exist.', 125, $this->source); })()), "nom", [], "any", false, false, false, 125), "html", null, true);
            yield "
            </span>
            <span>";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 127, $this->source); })()), "pointsActuels", [], "any", false, false, false, 127), "html", null, true);
            yield " / ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 127, $this->source); })()), "pointsNecessaires", [], "any", false, false, false, 127), "html", null, true);
            yield " points</span>
        </div>
        <div class=\"progress progress-custom mb-2\">
            <div class=\"progress-bar\" style=\"width: ";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 130, $this->source); })()), "pourcentage", [], "any", false, false, false, 130), "html", null, true);
            yield "%\"></div>
        </div>
        <small class=\"text-muted\">
            Plus que ";
            // line 133
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 133, $this->source); })()), "pointsRestants", [], "any", false, false, false, 133), "html", null, true);
            yield " points pour obtenir cette récompense !
        </small>
    </div>
    ";
        } else {
            // line 137
            yield "    <div class=\"palier-section text-center\">
        <i class=\"fas fa-trophy\" style=\"font-size: 48px; color: #FFD700;\"></i>
        <h4 class=\"mt-3\">Félicitations !</h4>
        <p>Vous avez débloqué toutes les récompenses disponibles</p>
    </div>
    ";
        }
        // line 143
        yield "    
    <!-- Récompenses disponibles -->
    <h3 class=\"mb-4\">🎁 Récompenses disponibles</h3>
    <div class=\"row\">
        ";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recompenses"]) || array_key_exists("recompenses", $context) ? $context["recompenses"] : (function () { throw new RuntimeError('Variable "recompenses" does not exist.', 147, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["recompense"]) {
            // line 148
            yield "            ";
            $context["accessible"] = (CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "pointsRequis", [], "any", false, false, false, 148) <= (isset($context["pointsActuels"]) || array_key_exists("pointsActuels", $context) ? $context["pointsActuels"] : (function () { throw new RuntimeError('Variable "pointsActuels" does not exist.', 148, $this->source); })()));
            // line 149
            yield "            <div class=\"col-md-4\">
                <div class=\"card recompense-card ";
            // line 150
            if ((($tmp =  !(isset($context["accessible"]) || array_key_exists("accessible", $context) ? $context["accessible"] : (function () { throw new RuntimeError('Variable "accessible" does not exist.', 150, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "disabled";
            }
            yield "\">
                    ";
            // line 151
            if ((($tmp =  !(isset($context["accessible"]) || array_key_exists("accessible", $context) ? $context["accessible"] : (function () { throw new RuntimeError('Variable "accessible" does not exist.', 151, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 152
                yield "                        <div class=\"badge-obtenu\" style=\"background: #999;\">🔒 Verrouillé</div>
                    ";
            }
            // line 154
            yield "                    <div class=\"card-body\">
                        <div class=\"recompense-icon\">
                            <i class=\"fas ";
            // line 156
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "icone", [], "any", true, true, false, 156)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "icone", [], "any", false, false, false, 156), "fa-gift")) : ("fa-gift")), "html", null, true);
            yield "\"></i>
                        </div>
                        <h5 class=\"card-title\">";
            // line 158
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "nom", [], "any", false, false, false, 158), "html", null, true);
            yield "</h5>
                        <p class=\"card-text\">";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "description", [], "any", false, false, false, 159), "html", null, true);
            yield "</p>
                        <div class=\"recompense-points\">
                            ";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "pointsRequis", [], "any", false, false, false, 161), "html", null, true);
            yield " points
                        </div>
                        ";
            // line 163
            if ((($tmp = (isset($context["accessible"]) || array_key_exists("accessible", $context) ? $context["accessible"] : (function () { throw new RuntimeError('Variable "accessible" does not exist.', 163, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 164
                yield "                            <button class=\"btn btn-primary mt-3 btn-echanger\" 
                                    onclick=\"echangerRecompense(";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "idRecompense", [], "any", false, false, false, 165), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompense"], "nom", [], "any", false, false, false, 165), "html", null, true);
                yield "')\">
                                <i class=\"fas fa-exchange-alt\"></i> Échanger
                            </button>
                        ";
            } else {
                // line 169
                yield "                            <button class=\"btn btn-secondary mt-3\" disabled>
                                <i class=\"fas fa-lock\"></i> Points insuffisants
                            </button>
                        ";
            }
            // line 173
            yield "                    </div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['recompense'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 177
        yield "    </div>
    
    <!-- Récompenses obtenues -->
    ";
        // line 180
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recompensesObtenues"]) || array_key_exists("recompensesObtenues", $context) ? $context["recompensesObtenues"] : (function () { throw new RuntimeError('Variable "recompensesObtenues" does not exist.', 180, $this->source); })())) > 0)) {
            // line 181
            yield "    <h3 class=\"mb-4 mt-5\">🏆 Mes récompenses obtenues</h3>
    <div class=\"row\">
        ";
            // line 183
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recompensesObtenues"]) || array_key_exists("recompensesObtenues", $context) ? $context["recompensesObtenues"] : (function () { throw new RuntimeError('Variable "recompensesObtenues" does not exist.', 183, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["recompenseUser"]) {
                // line 184
                yield "            <div class=\"col-md-4\">
                <div class=\"card recompense-card recompense-obtenue\">
                    <div class=\"badge-obtenu\">
                        ";
                // line 187
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "utilise", [], "any", false, false, false, 187)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "✅ Utilisé";
                } else {
                    yield "🎁 À utiliser";
                }
                // line 188
                yield "                    </div>
                    <div class=\"card-body\">
                        <div class=\"recompense-icon\">
                            <i class=\"fas ";
                // line 191
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "recompense", [], "any", false, true, false, 191), "icone", [], "any", true, true, false, 191)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "recompense", [], "any", false, false, false, 191), "icone", [], "any", false, false, false, 191), "fa-check-circle")) : ("fa-check-circle")), "html", null, true);
                yield "\" style=\"color: #4CAF50;\"></i>
                        </div>
                        <h5 class=\"card-title\">";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "recompense", [], "any", false, false, false, 193), "nom", [], "any", false, false, false, 193), "html", null, true);
                yield "</h5>
                        <p class=\"card-text\">";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "recompense", [], "any", false, false, false, 194), "description", [], "any", false, false, false, 194), "html", null, true);
                yield "</p>
                        ";
                // line 195
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "utilise", [], "any", false, false, false, 195)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 196
                    yield "                            <div class=\"alert alert-success mt-2\">
                                <strong>Code: ";
                    // line 197
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "code", [], "any", false, false, false, 197), "html", null, true);
                    yield "</strong>
                            </div>
                            <small class=\"text-muted\">
                                Obtenu le ";
                    // line 200
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "dateObtention", [], "any", false, false, false, 200), "d/m/Y"), "html", null, true);
                    yield "
                            </small>
                        ";
                } else {
                    // line 203
                    yield "                            <small class=\"text-muted\">
                                Utilisé le ";
                    // line 204
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["recompenseUser"], "dateUtilisation", [], "any", false, false, false, 204), "d/m/Y"), "html", null, true);
                    yield "
                            </small>
                        ";
                }
                // line 207
                yield "                    </div>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['recompenseUser'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 211
            yield "    </div>
    ";
        }
        // line 213
        yield "</div>

<script>
function echangerRecompense(id, nom) {
    if (confirm(`Échanger \${nom} contre vos points ?`)) {
        fetch(`/recompenses/echanger/\${id}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message + '\\nCode: ' + data.code);
                location.reload();
            } else {
                alert('Erreur: ' + data.message);
            }
        })
        .catch(error => {
            alert('Une erreur est survenue');
        });
    }
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
        return "recompenses/index.html.twig";
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
        return array (  429 => 213,  425 => 211,  416 => 207,  410 => 204,  407 => 203,  401 => 200,  395 => 197,  392 => 196,  390 => 195,  386 => 194,  382 => 193,  377 => 191,  372 => 188,  366 => 187,  361 => 184,  357 => 183,  353 => 181,  351 => 180,  346 => 177,  337 => 173,  331 => 169,  322 => 165,  319 => 164,  317 => 163,  312 => 161,  307 => 159,  303 => 158,  298 => 156,  294 => 154,  290 => 152,  288 => 151,  282 => 150,  279 => 149,  276 => 148,  272 => 147,  266 => 143,  258 => 137,  251 => 133,  245 => 130,  237 => 127,  232 => 125,  228 => 124,  222 => 120,  220 => 119,  206 => 108,  197 => 101,  187 => 100,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes Récompenses - Programme de Fidélité{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .points-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }
    
    .points-number {
        font-size: 48px;
        font-weight: bold;
    }
    
    .progress-custom {
        height: 12px;
        border-radius: 10px;
        background: rgba(255,255,255,0.3);
    }
    
    .progress-custom .progress-bar {
        background: #FFD700;
        border-radius: 10px;
    }
    
    .recompense-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        margin-bottom: 20px;
    }
    
    .recompense-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .recompense-card.disabled {
        opacity: 0.6;
        filter: grayscale(0.3);
    }
    
    .recompense-card .card-body {
        text-align: center;
        padding: 25px;
    }
    
    .recompense-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }
    
    .recompense-points {
        font-size: 24px;
        font-weight: bold;
        color: #FF6B6B;
    }
    
    .badge-obtenu {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #4CAF50;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
    }
    
    .palier-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .recompense-obtenue {
        border-left: 4px solid #4CAF50;
        background: #f0fff4;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .btn-echanger {
        animation: pulse 2s infinite;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <!-- Carte des points -->
    <div class=\"points-card\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <h2>⭐ Programme de Fidélité</h2>
                <p class=\"mb-2\">Vos points accumulés</p>
                <div class=\"points-number\">{{ pointsActuels }} points</div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"text-md-end\">
                    <i class=\"fas fa-gem\" style=\"font-size: 64px; opacity: 0.5;\"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Progression vers la prochaine récompense -->
    {% if prochaineRecompense %}
    <div class=\"palier-section\">
        <h4 class=\"mb-3\">🎯 Prochaine récompense</h4>
        <div class=\"d-flex justify-content-between mb-2\">
            <span>
                <i class=\"fas {{ prochaineRecompense.icone|default('fa-gift') }}\"></i>
                {{ prochaineRecompense.nom }}
            </span>
            <span>{{ progression.pointsActuels }} / {{ progression.pointsNecessaires }} points</span>
        </div>
        <div class=\"progress progress-custom mb-2\">
            <div class=\"progress-bar\" style=\"width: {{ progression.pourcentage }}%\"></div>
        </div>
        <small class=\"text-muted\">
            Plus que {{ progression.pointsRestants }} points pour obtenir cette récompense !
        </small>
    </div>
    {% else %}
    <div class=\"palier-section text-center\">
        <i class=\"fas fa-trophy\" style=\"font-size: 48px; color: #FFD700;\"></i>
        <h4 class=\"mt-3\">Félicitations !</h4>
        <p>Vous avez débloqué toutes les récompenses disponibles</p>
    </div>
    {% endif %}
    
    <!-- Récompenses disponibles -->
    <h3 class=\"mb-4\">🎁 Récompenses disponibles</h3>
    <div class=\"row\">
        {% for recompense in recompenses %}
            {% set accessible = recompense.pointsRequis <= pointsActuels %}
            <div class=\"col-md-4\">
                <div class=\"card recompense-card {% if not accessible %}disabled{% endif %}\">
                    {% if not accessible %}
                        <div class=\"badge-obtenu\" style=\"background: #999;\">🔒 Verrouillé</div>
                    {% endif %}
                    <div class=\"card-body\">
                        <div class=\"recompense-icon\">
                            <i class=\"fas {{ recompense.icone|default('fa-gift') }}\"></i>
                        </div>
                        <h5 class=\"card-title\">{{ recompense.nom }}</h5>
                        <p class=\"card-text\">{{ recompense.description }}</p>
                        <div class=\"recompense-points\">
                            {{ recompense.pointsRequis }} points
                        </div>
                        {% if accessible %}
                            <button class=\"btn btn-primary mt-3 btn-echanger\" 
                                    onclick=\"echangerRecompense({{ recompense.idRecompense }}, '{{ recompense.nom }}')\">
                                <i class=\"fas fa-exchange-alt\"></i> Échanger
                            </button>
                        {% else %}
                            <button class=\"btn btn-secondary mt-3\" disabled>
                                <i class=\"fas fa-lock\"></i> Points insuffisants
                            </button>
                        {% endif %}
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
    
    <!-- Récompenses obtenues -->
    {% if recompensesObtenues|length > 0 %}
    <h3 class=\"mb-4 mt-5\">🏆 Mes récompenses obtenues</h3>
    <div class=\"row\">
        {% for recompenseUser in recompensesObtenues %}
            <div class=\"col-md-4\">
                <div class=\"card recompense-card recompense-obtenue\">
                    <div class=\"badge-obtenu\">
                        {% if recompenseUser.utilise %}✅ Utilisé{% else %}🎁 À utiliser{% endif %}
                    </div>
                    <div class=\"card-body\">
                        <div class=\"recompense-icon\">
                            <i class=\"fas {{ recompenseUser.recompense.icone|default('fa-check-circle') }}\" style=\"color: #4CAF50;\"></i>
                        </div>
                        <h5 class=\"card-title\">{{ recompenseUser.recompense.nom }}</h5>
                        <p class=\"card-text\">{{ recompenseUser.recompense.description }}</p>
                        {% if not recompenseUser.utilise %}
                            <div class=\"alert alert-success mt-2\">
                                <strong>Code: {{ recompenseUser.code }}</strong>
                            </div>
                            <small class=\"text-muted\">
                                Obtenu le {{ recompenseUser.dateObtention|date('d/m/Y') }}
                            </small>
                        {% else %}
                            <small class=\"text-muted\">
                                Utilisé le {{ recompenseUser.dateUtilisation|date('d/m/Y') }}
                            </small>
                        {% endif %}
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
    {% endif %}
</div>

<script>
function echangerRecompense(id, nom) {
    if (confirm(`Échanger \${nom} contre vos points ?`)) {
        fetch(`/recompenses/echanger/\${id}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message + '\\nCode: ' + data.code);
                location.reload();
            } else {
                alert('Erreur: ' + data.message);
            }
        })
        .catch(error => {
            alert('Une erreur est survenue');
        });
    }
}
</script>
{% endblock %}", "recompenses/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\recompenses\\index.html.twig");
    }
}

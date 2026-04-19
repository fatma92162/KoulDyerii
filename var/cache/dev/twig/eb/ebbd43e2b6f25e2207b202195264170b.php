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

/* formations/index.html.twig */
class __TwigTemplate_ebe9d134aa8dc3cef868ddd62bc0b2d2 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "formations/index.html.twig"));

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

        yield "Formations - Koul Dyeri";
        
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
        padding: 60px 0;
        text-align: center;
        color: white;
        margin-bottom: 50px;
    }
    
    .formation-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        height: 100%;
    }
    
    .formation-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(139, 0, 0, 0.2);
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 20px;
    }
    
    .formation-price {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .btn-inscrire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-inscrire:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-termine {
        background: #4CAF50;
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 78
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 79
        yield "<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-graduation-cap\"></i> Nos Formations</h1>
        <p class=\"lead\">Développez vos compétences culinaires avec nos experts</p>
    </div>
</div>

<div class=\"container mb-5\">
    ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "flashes", ["success"], "method", false, false, false, 87));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 88
            yield "        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> ";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        yield "    
    <div class=\"row\">
        ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["formations"]) || array_key_exists("formations", $context) ? $context["formations"] : (function () { throw new RuntimeError('Variable "formations" does not exist.', 95, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
            // line 96
            yield "        <div class=\"col-md-4\">
            <div class=\"formation-card\">
                <div class=\"formation-header\">
                    <h4 class=\"mb-2\">";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "titre", [], "any", false, false, false, 99), "html", null, true);
            yield "</h4>
                    <span class=\"status-badge status-";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "statut", [], "any", false, false, false, 100), "html", null, true);
            yield "\">
                        ";
            // line 101
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "statut", [], "any", false, false, false, 101) == "en_cours")) {
                // line 102
                yield "                            🟢 En cours
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 103
$context["formation"], "statut", [], "any", false, false, false, 103) == "termine")) {
                // line 104
                yield "                            ✅ Terminé
                        ";
            } else {
                // line 106
                yield "                            ⚪ ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "statut", [], "any", false, false, false, 106), "html", null, true);
                yield "
                        ";
            }
            // line 108
            yield "                    </span>
                </div>
                <div class=\"p-4\">
                    <p class=\"text-muted\">";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "description", [], "any", false, false, false, 111), 0, 120), "html", null, true);
            yield "...</p>
                    <div class=\"formation-price text-center mb-3\">
                        ";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "prix", [], "any", false, false, false, 113), 2, ",", " "), "html", null, true);
            yield " €
                    </div>
                    <a href=\"";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_formations_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["formation"], "idFormation", [], "any", false, false, false, 115)]), "html", null, true);
            yield "\" class=\"btn-inscrire\">
                        <i class=\"fas fa-info-circle\"></i> Voir les détails
                    </a>
                </div>
            </div>
        </div>
        ";
            $context['_iterated'] = true;
        }
        // line 121
        if (!$context['_iterated']) {
            // line 122
            yield "        <div class=\"col-12\">
            <div class=\"alert alert-info text-center\">
                <i class=\"fas fa-info-circle\"></i> Aucune formation disponible pour le moment.
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['formation'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        yield "    </div>
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
        return "formations/index.html.twig";
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
        return array (  280 => 128,  269 => 122,  267 => 121,  256 => 115,  251 => 113,  246 => 111,  241 => 108,  235 => 106,  231 => 104,  229 => 103,  226 => 102,  224 => 101,  220 => 100,  216 => 99,  211 => 96,  206 => 95,  202 => 93,  192 => 89,  189 => 88,  185 => 87,  175 => 79,  165 => 78,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Formations - Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .page-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        padding: 60px 0;
        text-align: center;
        color: white;
        margin-bottom: 50px;
    }
    
    .formation-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        height: 100%;
    }
    
    .formation-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(139, 0, 0, 0.2);
    }
    
    .formation-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 20px;
    }
    
    .formation-price {
        font-size: 28px;
        font-weight: 800;
        color: #8B0000;
    }
    
    .btn-inscrire {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-inscrire:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .status-en_cours {
        background: #FF9800;
        color: white;
    }
    
    .status-termine {
        background: #4CAF50;
        color: white;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div class=\"container\">
        <h1><i class=\"fas fa-graduation-cap\"></i> Nos Formations</h1>
        <p class=\"lead\">Développez vos compétences culinaires avec nos experts</p>
    </div>
</div>

<div class=\"container mb-5\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show\">
            <i class=\"fas fa-check-circle\"></i> {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        </div>
    {% endfor %}
    
    <div class=\"row\">
        {% for formation in formations %}
        <div class=\"col-md-4\">
            <div class=\"formation-card\">
                <div class=\"formation-header\">
                    <h4 class=\"mb-2\">{{ formation.titre }}</h4>
                    <span class=\"status-badge status-{{ formation.statut }}\">
                        {% if formation.statut == 'en_cours' %}
                            🟢 En cours
                        {% elseif formation.statut == 'termine' %}
                            ✅ Terminé
                        {% else %}
                            ⚪ {{ formation.statut }}
                        {% endif %}
                    </span>
                </div>
                <div class=\"p-4\">
                    <p class=\"text-muted\">{{ formation.description|slice(0, 120) }}...</p>
                    <div class=\"formation-price text-center mb-3\">
                        {{ formation.prix|number_format(2, ',', ' ') }} €
                    </div>
                    <a href=\"{{ path('app_formations_show', {id: formation.idFormation}) }}\" class=\"btn-inscrire\">
                        <i class=\"fas fa-info-circle\"></i> Voir les détails
                    </a>
                </div>
            </div>
        </div>
        {% else %}
        <div class=\"col-12\">
            <div class=\"alert alert-info text-center\">
                <i class=\"fas fa-info-circle\"></i> Aucune formation disponible pour le moment.
            </div>
        </div>
        {% endfor %}
    </div>
</div>
{% endblock %}", "formations/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\formations\\index.html.twig");
    }
}

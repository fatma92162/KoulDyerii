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

/* post/edit_comment.html.twig */
class __TwigTemplate_4dc9ba10f3951f98d8a2c9b533623eb4 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/edit_comment.html.twig"));

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

        yield "Modifier le commentaire | Koul Dyeri";
        
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
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        border: 1px solid #E8D5B7;
    }

    .form-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        padding: 25px 30px;
    }

    .form-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .form-body {
        padding: 30px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #E8D5B7;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .btn-primary {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        border: 2px solid #E8D5B7;
        background: transparent;
        color: #666;
    }

    .btn-secondary:hover {
        border-color: #8B0000;
        color: #8B0000;
    }

    .form-label {
        font-weight: 600;
        color: #5C4033;
        margin-bottom: 8px;
    }

    .help-text {
        font-size: 13px;
        color: #888;
        margin-top: 8px;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-left: 4px solid #8B0000;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 116
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 117
        yield "<div class=\"container mt-5 form-container\">
    <div class=\"row\">
        <div class=\"col-12\">

            <a href=\"";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 121, $this->source); })()), "post", [], "any", false, false, false, 121), "id", [], "any", false, false, false, 121)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary mb-4\">
                <i class=\"fas fa-arrow-left\"></i> Retour à la publication
            </a>

            ";
        // line 125
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 125, $this->source); })()), "flashes", ["error"], "method", false, false, false, 125));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 126
            yield "                <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        yield "
            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h3>✏️ Modifier votre commentaire</h3>
                </div>

                <div class=\"form-body\">
                    <form method=\"post\" action=\"";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_comment_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 135, $this->source); })()), "id", [], "any", false, false, false, 135)]), "html", null, true);
        yield "\" novalidate>
                        <div class=\"mb-4\">
                            <label for=\"content\" class=\"form-label\">Commentaire <span class=\"text-danger\">*</span></label>
                            <textarea class=\"form-control ";
        // line 138
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 138)) {
            yield "is-invalid";
        }
        yield "\" 
                                      id=\"content\" 
                                      name=\"content\" 
                                      rows=\"6\" 
                                      placeholder=\"Modifiez votre commentaire...\"
                                      required>";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 143)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 143, $this->source); })()), "content", [], "any", false, false, false, 143), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 143, $this->source); })()), "content", [], "any", false, false, false, 143))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 143, $this->source); })()), "content", [], "any", false, false, false, 143))), "html", null, true);
        yield "</textarea>
                            ";
        // line 144
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 144)) {
            // line 145
            yield "                                <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 145, $this->source); })()), "content", [], "any", false, false, false, 145), "html", null, true);
            yield "</div>
                            ";
        } else {
            // line 147
            yield "                                <small class=\"help-text\">Le commentaire doit contenir entre 2 et 1000 caractères.</small>
                            ";
        }
        // line 149
        yield "                        </div>

                        <div class=\"d-flex justify-content-between align-items-center mt-5\">
                            <a href=\"";
        // line 152
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 152, $this->source); })()), "post", [], "any", false, false, false, 152), "id", [], "any", false, false, false, 152)]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
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
        return "post/edit_comment.html.twig";
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
        return array (  285 => 152,  280 => 149,  276 => 147,  270 => 145,  268 => 144,  264 => 143,  254 => 138,  248 => 135,  239 => 128,  230 => 126,  226 => 125,  219 => 121,  213 => 117,  203 => 116,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Modifier le commentaire | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        border: 1px solid #E8D5B7;
    }

    .form-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        padding: 25px 30px;
    }

    .form-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .form-body {
        padding: 30px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #E8D5B7;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .btn-primary {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        border: 2px solid #E8D5B7;
        background: transparent;
        color: #666;
    }

    .btn-secondary:hover {
        border-color: #8B0000;
        color: #8B0000;
    }

    .form-label {
        font-weight: 600;
        color: #5C4033;
        margin-bottom: 8px;
    }

    .help-text {
        font-size: 13px;
        color: #888;
        margin-top: 8px;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-left: 4px solid #8B0000;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container mt-5 form-container\">
    <div class=\"row\">
        <div class=\"col-12\">

            <a href=\"{{ path('app_post_show', {id: commentaire.post.id}) }}\" class=\"btn btn-outline-secondary mb-4\">
                <i class=\"fas fa-arrow-left\"></i> Retour à la publication
            </a>

            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger\">{{ message }}</div>
            {% endfor %}

            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h3>✏️ Modifier votre commentaire</h3>
                </div>

                <div class=\"form-body\">
                    <form method=\"post\" action=\"{{ path('app_comment_update', {id: commentaire.id}) }}\" novalidate>
                        <div class=\"mb-4\">
                            <label for=\"content\" class=\"form-label\">Commentaire <span class=\"text-danger\">*</span></label>
                            <textarea class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\" 
                                      id=\"content\" 
                                      name=\"content\" 
                                      rows=\"6\" 
                                      placeholder=\"Modifiez votre commentaire...\"
                                      required>{{ formData.content|default(commentaire.content) }}</textarea>
                            {% if errors.content is defined %}
                                <div class=\"invalid-feedback\">{{ errors.content }}</div>
                            {% else %}
                                <small class=\"help-text\">Le commentaire doit contenir entre 2 et 1000 caractères.</small>
                            {% endif %}
                        </div>

                        <div class=\"d-flex justify-content-between align-items-center mt-5\">
                            <a href=\"{{ path('app_post_show', {id: commentaire.post.id}) }}\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
{% endblock %}", "post/edit_comment.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\post\\edit_comment.html.twig");
    }
}

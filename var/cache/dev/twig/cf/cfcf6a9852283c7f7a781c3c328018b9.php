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

/* admin_posts/edit_comment.html.twig */
class __TwigTemplate_f86c832f2635a7ac9b0a0e124e909f58 extends Template
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
            'admin_title' => [$this, 'block_admin_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/edit_comment.html.twig"));

        $this->parent = $this->load("base_admin.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_title"));

        yield "Modifier le commentaire";
        
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
    }

    .form-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
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
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #FF6B6B;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.15);
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
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255,107,107,0.4);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
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
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 106
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 107
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>✏️ Modifier le commentaire</h3>
        <a href=\"";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 110, $this->source); })()), "post", [], "any", false, false, false, 110), "id", [], "any", false, false, false, 110)]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    ";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 115, $this->source); })()), "flashes", ["error"], "method", false, false, false, 115));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 116
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        yield "
    <div class=\"form-card\">
        <div class=\"form-header\">
            <h3>Modifier votre commentaire</h3>
        </div>

        <div class=\"form-body\">
            <form method=\"post\" action=\"";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comment_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 125, $this->source); })()), "id", [], "any", false, false, false, 125)]), "html", null, true);
        yield "\" novalidate>
                <div class=\"mb-4\">
                    <label for=\"content\" class=\"form-label\">Commentaire <span class=\"text-danger\">*</span></label>
                    <textarea class=\"form-control ";
        // line 128
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 128)) {
            yield "is-invalid";
        }
        yield "\" 
                              id=\"content\" 
                              name=\"content\" 
                              rows=\"6\" 
                              placeholder=\"Modifiez votre commentaire...\"
                              required>";
        // line 133
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 133)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 133, $this->source); })()), "content", [], "any", false, false, false, 133), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 133, $this->source); })()), "content", [], "any", false, false, false, 133))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 133, $this->source); })()), "content", [], "any", false, false, false, 133))), "html", null, true);
        yield "</textarea>
                    ";
        // line 134
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 134)) {
            // line 135
            yield "                        <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 135, $this->source); })()), "content", [], "any", false, false, false, 135), "html", null, true);
            yield "</div>
                    ";
        } else {
            // line 137
            yield "                        <small class=\"help-text\">Le commentaire doit contenir entre 2 et 1000 caractères.</small>
                    ";
        }
        // line 139
        yield "                </div>

                <div class=\"d-flex justify-content-between align-items-center mt-5\">
                    <a href=\"";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 142, $this->source); })()), "post", [], "any", false, false, false, 142), "id", [], "any", false, false, false, 142)]), "html", null, true);
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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_posts/edit_comment.html.twig";
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
        return array (  275 => 142,  270 => 139,  266 => 137,  260 => 135,  258 => 134,  254 => 133,  244 => 128,  238 => 125,  229 => 118,  220 => 116,  216 => 115,  208 => 110,  203 => 107,  193 => 106,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Modifier le commentaire{% endblock %}

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
    }

    .form-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
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
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #FF6B6B;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.15);
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
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255,107,107,0.4);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
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
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>✏️ Modifier le commentaire</h3>
        <a href=\"{{ path('app_admin_post_show', {id: commentaire.post.id}) }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <div class=\"form-card\">
        <div class=\"form-header\">
            <h3>Modifier votre commentaire</h3>
        </div>

        <div class=\"form-body\">
            <form method=\"post\" action=\"{{ path('app_admin_comment_update', {id: commentaire.id}) }}\" novalidate>
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
                    <a href=\"{{ path('app_admin_post_show', {id: commentaire.post.id}) }}\" class=\"btn btn-secondary\">
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
{% endblock %}", "admin_posts/edit_comment.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\edit_comment.html.twig");
    }
}

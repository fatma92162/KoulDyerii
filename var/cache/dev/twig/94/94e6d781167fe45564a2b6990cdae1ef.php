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

/* admin_posts/edit.html.twig */
class __TwigTemplate_360216e28a1f140cddf0370b24b6de63 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/edit.html.twig"));

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

        yield "Modifier la publication";
        
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

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 108
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>✏️ ";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("titre", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 110, $this->source); })()), "Modifier la publication")) : ("Modifier la publication")), "html", null, true);
        yield "</h3>
        ";
        // line 112
        yield "        
        ";
        // line 114
        yield "        <a href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 114, $this->source); })()), "id", [], "any", false, false, false, 114)]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
        
        ";
        // line 119
        yield "        ";
        // line 120
        yield "        ";
        // line 121
        yield "        ";
        // line 122
        yield "        
        ";
        // line 124
        yield "        ";
        // line 125
        yield "        ";
        // line 126
        yield "        ";
        // line 127
        yield "    </div>

    ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 129, $this->source); })()), "flashes", ["error"], "method", false, false, false, 129));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 130
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        yield "
    <div class=\"form-card\">
        <div class=\"form-header\">
            <h3>Modifier votre publication</h3>
        </div>

        <div class=\"form-body\">
            <form method=\"post\" action=\"";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 139, $this->source); })()), "id", [], "any", false, false, false, 139)]), "html", null, true);
        yield "\" novalidate>
                <div class=\"mb-4\">
                    <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" 
                           class=\"form-control ";
        // line 143
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 143)) {
            yield "is-invalid";
        }
        yield "\" 
                           id=\"title\" 
                           name=\"title\" 
                           value=\"";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "title", [], "any", true, true, false, 146)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 146, $this->source); })()), "title", [], "any", false, false, false, 146), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 146, $this->source); })()), "title", [], "any", false, false, false, 146))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 146, $this->source); })()), "title", [], "any", false, false, false, 146))), "html", null, true);
        yield "\"
                           placeholder=\"Titre de la publication...\"
                           required>
                    ";
        // line 149
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 149)) {
            // line 150
            yield "                        <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 150, $this->source); })()), "title", [], "any", false, false, false, 150), "html", null, true);
            yield "</div>
                    ";
        } else {
            // line 152
            yield "                        <small class=\"help-text\">Le titre doit contenir entre 3 et 100 caractères.</small>
                    ";
        }
        // line 154
        yield "                </div>

                <div class=\"mb-4\">
                    <label for=\"content\" class=\"form-label\">Contenu <span class=\"text-danger\">*</span></label>
                    <textarea class=\"form-control ";
        // line 158
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 158)) {
            yield "is-invalid";
        }
        yield "\" 
                              id=\"content\" 
                              name=\"content\" 
                              rows=\"10\" 
                              placeholder=\"Contenu de la publication...\"
                              required>";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 163)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 163, $this->source); })()), "content", [], "any", false, false, false, 163), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 163, $this->source); })()), "content", [], "any", false, false, false, 163))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 163, $this->source); })()), "content", [], "any", false, false, false, 163))), "html", null, true);
        yield "</textarea>
                    ";
        // line 164
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 164)) {
            // line 165
            yield "                        <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 165, $this->source); })()), "content", [], "any", false, false, false, 165), "html", null, true);
            yield "</div>
                    ";
        } else {
            // line 167
            yield "                        <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                    ";
        }
        // line 169
        yield "                </div>

                <div class=\"d-flex justify-content-between align-items-center mt-5\">
                    <a href=\"";
        // line 172
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 172, $this->source); })()), "id", [], "any", false, false, false, 172)]), "html", null, true);
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
        return "admin_posts/edit.html.twig";
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
        return array (  334 => 172,  329 => 169,  325 => 167,  319 => 165,  317 => 164,  313 => 163,  303 => 158,  297 => 154,  293 => 152,  287 => 150,  285 => 149,  279 => 146,  271 => 143,  264 => 139,  255 => 132,  246 => 130,  242 => 129,  238 => 127,  236 => 126,  234 => 125,  232 => 124,  229 => 122,  227 => 121,  225 => 120,  223 => 119,  215 => 114,  212 => 112,  208 => 110,  204 => 108,  194 => 107,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Modifier la publication{% endblock %}

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
        <h3>✏️ {{ titre|default('Modifier la publication') }}</h3>
        {# Utilisez l'une de ces 3 options - décommentez celle qui fonctionne #}
        
        {# Option 1: Retour à la page de détail du post #}
        <a href=\"{{ path('app_admin_post_show', {id: post.id}) }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
        
        {# Option 2: Retour à la liste (si la route existe) #}
        {# <a href=\"{{ path('app_admin_post_index') }}\" class=\"btn btn-secondary\"> #}
        {#     <i class=\"fas fa-arrow-left\"></i> Retour #}
        {# </a> #}
        
        {# Option 3: Navigation JavaScript #}
        {# <a href=\"javascript:history.back()\" class=\"btn btn-secondary\"> #}
        {#     <i class=\"fas fa-arrow-left\"></i> Retour #}
        {# </a> #}
    </div>

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <div class=\"form-card\">
        <div class=\"form-header\">
            <h3>Modifier votre publication</h3>
        </div>

        <div class=\"form-body\">
            <form method=\"post\" action=\"{{ path('app_admin_post_edit', {id: post.id}) }}\" novalidate>
                <div class=\"mb-4\">
                    <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" 
                           class=\"form-control {% if errors.title is defined %}is-invalid{% endif %}\" 
                           id=\"title\" 
                           name=\"title\" 
                           value=\"{{ formData.title|default(post.title) }}\"
                           placeholder=\"Titre de la publication...\"
                           required>
                    {% if errors.title is defined %}
                        <div class=\"invalid-feedback\">{{ errors.title }}</div>
                    {% else %}
                        <small class=\"help-text\">Le titre doit contenir entre 3 et 100 caractères.</small>
                    {% endif %}
                </div>

                <div class=\"mb-4\">
                    <label for=\"content\" class=\"form-label\">Contenu <span class=\"text-danger\">*</span></label>
                    <textarea class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\" 
                              id=\"content\" 
                              name=\"content\" 
                              rows=\"10\" 
                              placeholder=\"Contenu de la publication...\"
                              required>{{ formData.content|default(post.content) }}</textarea>
                    {% if errors.content is defined %}
                        <div class=\"invalid-feedback\">{{ errors.content }}</div>
                    {% else %}
                        <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                    {% endif %}
                </div>

                <div class=\"d-flex justify-content-between align-items-center mt-5\">
                    <a href=\"{{ path('app_admin_post_show', {id: post.id}) }}\" class=\"btn btn-secondary\">
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
{% endblock %}", "admin_posts/edit.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\edit.html.twig");
    }
}

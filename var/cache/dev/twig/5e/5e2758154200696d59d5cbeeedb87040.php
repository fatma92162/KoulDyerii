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

/* admin_posts/form.html.twig */
class __TwigTemplate_1c12372210dcde91c61f29000bebdb8a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/form.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 3, $this->source); })()), "html", null, true);
        
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
    .form-control {
        border-radius: 12px;
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
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
    .current-image {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 15px;
        margin-top: 12px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 75
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 76
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>✏️ ";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 78, $this->source); })()), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "flashes", ["error"], "method", false, false, false, 84));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 85
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        yield "
    ";
        // line 88
        if ((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 88, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 89
            yield "        ";
            // line 90
            yield "        <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 90, $this->source); })()), "id", [], "any", false, false, false, 90)]), "html", null, true);
            yield "\" enctype=\"multipart/form-data\" novalidate>
            <div class=\"mb-3\">
                <label for=\"title\" class=\"form-label\">Titre *</label>
                <input type=\"text\" class=\"form-control ";
            // line 93
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 93)) {
                yield "is-invalid";
            }
            yield "\" 
                       id=\"title\" name=\"title\" value=\"";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "title", [], "any", true, true, false, 94)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 94, $this->source); })()), "title", [], "any", false, false, false, 94), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 94, $this->source); })()), "title", [], "any", false, false, false, 94))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 94, $this->source); })()), "title", [], "any", false, false, false, 94))), "html", null, true);
            yield "\" required>
                ";
            // line 95
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 95)) {
                // line 96
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 96, $this->source); })()), "title", [], "any", false, false, false, 96), "html", null, true);
                yield "</div>
                ";
            }
            // line 98
            yield "            </div>

            <div class=\"mb-3\">
                <label for=\"content\" class=\"form-label\">Contenu *</label>
                <textarea class=\"form-control ";
            // line 102
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 102)) {
                yield "is-invalid";
            }
            yield "\" 
                          id=\"content\" name=\"content\" rows=\"8\" required>";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 103)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 103, $this->source); })()), "content", [], "any", false, false, false, 103), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 103, $this->source); })()), "content", [], "any", false, false, false, 103))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 103, $this->source); })()), "content", [], "any", false, false, false, 103))), "html", null, true);
            yield "</textarea>
                ";
            // line 104
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 104)) {
                // line 105
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 105, $this->source); })()), "content", [], "any", false, false, false, 105), "html", null, true);
                yield "</div>
                ";
            } else {
                // line 107
                yield "                    <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                ";
            }
            // line 109
            yield "            </div>

            <div class=\"mb-3\">
                <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                <input type=\"file\" class=\"form-control ";
            // line 113
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 113)) {
                yield "is-invalid";
            }
            yield "\" 
                       id=\"image\" name=\"image\" accept=\"image/*\">
                ";
            // line 115
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 115)) {
                // line 116
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 116, $this->source); })()), "image", [], "any", false, false, false, 116), "html", null, true);
                yield "</div>
                ";
            }
            // line 118
            yield "                
                ";
            // line 119
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 119, $this->source); })()), "imagePath", [], "any", false, false, false, 119)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 120
                yield "                    <div class=\"current-image\">
                        <small class=\"text-muted d-block mb-2\">Image actuelle :</small>
                        <div class=\"d-flex flex-wrap align-items-center gap-3\">
                            <img src=\"";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 123, $this->source); })()), "imagePath", [], "any", false, false, false, 123), "html", null, true);
                yield "\" style=\"max-height: 100px; border-radius: 8px;\">
                            <div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\" value=\"1\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash-alt\"></i> Supprimer cette image
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            // line 135
            yield "                <small class=\"help-text\">Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale : 2 Mo</small>
            </div>

            <div class=\"d-flex justify-content-between\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> Enregistrer
                </button>
            </div>
        </form>
    ";
        } else {
            // line 145
            yield "        ";
            // line 146
            yield "        <form method=\"post\" action=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_create");
            yield "\" enctype=\"multipart/form-data\" novalidate>
            <div class=\"mb-3\">
                <label for=\"title\" class=\"form-label\">Titre *</label>
                <input type=\"text\" class=\"form-control ";
            // line 149
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 149)) {
                yield "is-invalid";
            }
            yield "\" 
                       id=\"title\" name=\"title\" value=\"";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "title", [], "any", true, true, false, 150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 150, $this->source); })()), "title", [], "any", false, false, false, 150), "")) : ("")), "html", null, true);
            yield "\" required>
                ";
            // line 151
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 151)) {
                // line 152
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 152, $this->source); })()), "title", [], "any", false, false, false, 152), "html", null, true);
                yield "</div>
                ";
            } else {
                // line 154
                yield "                    <small class=\"help-text\">Le titre doit contenir entre 3 et 100 caractères.</small>
                ";
            }
            // line 156
            yield "            </div>

            <div class=\"mb-3\">
                <label for=\"content\" class=\"form-label\">Contenu *</label>
                <textarea class=\"form-control ";
            // line 160
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 160)) {
                yield "is-invalid";
            }
            yield "\" 
                          id=\"content\" name=\"content\" rows=\"8\" required>";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 161)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 161, $this->source); })()), "content", [], "any", false, false, false, 161), "")) : ("")), "html", null, true);
            yield "</textarea>
                ";
            // line 162
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 162)) {
                // line 163
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 163, $this->source); })()), "content", [], "any", false, false, false, 163), "html", null, true);
                yield "</div>
                ";
            } else {
                // line 165
                yield "                    <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                ";
            }
            // line 167
            yield "            </div>

            <div class=\"mb-3\">
                <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                <input type=\"file\" class=\"form-control ";
            // line 171
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 171)) {
                yield "is-invalid";
            }
            yield "\" 
                       id=\"image\" name=\"image\" accept=\"image/*\">
                ";
            // line 173
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 173)) {
                // line 174
                yield "                    <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 174, $this->source); })()), "image", [], "any", false, false, false, 174), "html", null, true);
                yield "</div>
                ";
            }
            // line 176
            yield "                <small class=\"help-text\">Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale : 2 Mo</small>
            </div>

            <div class=\"d-flex justify-content-between\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> Publier
                </button>
            </div>
        </form>
    ";
        }
        // line 186
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
        return "admin_posts/form.html.twig";
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
        return array (  411 => 186,  399 => 176,  393 => 174,  391 => 173,  384 => 171,  378 => 167,  374 => 165,  368 => 163,  366 => 162,  362 => 161,  356 => 160,  350 => 156,  346 => 154,  340 => 152,  338 => 151,  334 => 150,  328 => 149,  321 => 146,  319 => 145,  307 => 135,  292 => 123,  287 => 120,  285 => 119,  282 => 118,  276 => 116,  274 => 115,  267 => 113,  261 => 109,  257 => 107,  251 => 105,  249 => 104,  245 => 103,  239 => 102,  233 => 98,  227 => 96,  225 => 95,  221 => 94,  215 => 93,  208 => 90,  206 => 89,  204 => 88,  201 => 87,  192 => 85,  188 => 84,  180 => 79,  176 => 78,  172 => 76,  162 => 75,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}{{ titre }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .form-control {
        border-radius: 12px;
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
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
    .current-image {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 15px;
        margin-top: 12px;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>✏️ {{ titre }}</h3>
        <a href=\"{{ path('app_admin_posts_index') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    {% if post %}
        {# Formulaire de modification #}
        <form method=\"post\" action=\"{{ path('app_admin_post_update', {id: post.id}) }}\" enctype=\"multipart/form-data\" novalidate>
            <div class=\"mb-3\">
                <label for=\"title\" class=\"form-label\">Titre *</label>
                <input type=\"text\" class=\"form-control {% if errors.title is defined %}is-invalid{% endif %}\" 
                       id=\"title\" name=\"title\" value=\"{{ formData.title|default(post.title) }}\" required>
                {% if errors.title is defined %}
                    <div class=\"invalid-feedback\">{{ errors.title }}</div>
                {% endif %}
            </div>

            <div class=\"mb-3\">
                <label for=\"content\" class=\"form-label\">Contenu *</label>
                <textarea class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\" 
                          id=\"content\" name=\"content\" rows=\"8\" required>{{ formData.content|default(post.content) }}</textarea>
                {% if errors.content is defined %}
                    <div class=\"invalid-feedback\">{{ errors.content }}</div>
                {% else %}
                    <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                {% endif %}
            </div>

            <div class=\"mb-3\">
                <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                <input type=\"file\" class=\"form-control {% if errors.image is defined %}is-invalid{% endif %}\" 
                       id=\"image\" name=\"image\" accept=\"image/*\">
                {% if errors.image is defined %}
                    <div class=\"invalid-feedback\">{{ errors.image }}</div>
                {% endif %}
                
                {% if post.imagePath %}
                    <div class=\"current-image\">
                        <small class=\"text-muted d-block mb-2\">Image actuelle :</small>
                        <div class=\"d-flex flex-wrap align-items-center gap-3\">
                            <img src=\"{{ post.imagePath }}\" style=\"max-height: 100px; border-radius: 8px;\">
                            <div>
                                <div class=\"form-check\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\" value=\"1\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash-alt\"></i> Supprimer cette image
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                {% endif %}
                <small class=\"help-text\">Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale : 2 Mo</small>
            </div>

            <div class=\"d-flex justify-content-between\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> Enregistrer
                </button>
            </div>
        </form>
    {% else %}
        {# Formulaire de création #}
        <form method=\"post\" action=\"{{ path('app_admin_post_create') }}\" enctype=\"multipart/form-data\" novalidate>
            <div class=\"mb-3\">
                <label for=\"title\" class=\"form-label\">Titre *</label>
                <input type=\"text\" class=\"form-control {% if errors.title is defined %}is-invalid{% endif %}\" 
                       id=\"title\" name=\"title\" value=\"{{ formData.title|default('') }}\" required>
                {% if errors.title is defined %}
                    <div class=\"invalid-feedback\">{{ errors.title }}</div>
                {% else %}
                    <small class=\"help-text\">Le titre doit contenir entre 3 et 100 caractères.</small>
                {% endif %}
            </div>

            <div class=\"mb-3\">
                <label for=\"content\" class=\"form-label\">Contenu *</label>
                <textarea class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\" 
                          id=\"content\" name=\"content\" rows=\"8\" required>{{ formData.content|default('') }}</textarea>
                {% if errors.content is defined %}
                    <div class=\"invalid-feedback\">{{ errors.content }}</div>
                {% else %}
                    <small class=\"help-text\">Le contenu doit contenir entre 10 et 5000 caractères.</small>
                {% endif %}
            </div>

            <div class=\"mb-3\">
                <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                <input type=\"file\" class=\"form-control {% if errors.image is defined %}is-invalid{% endif %}\" 
                       id=\"image\" name=\"image\" accept=\"image/*\">
                {% if errors.image is defined %}
                    <div class=\"invalid-feedback\">{{ errors.image }}</div>
                {% endif %}
                <small class=\"help-text\">Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale : 2 Mo</small>
            </div>

            <div class=\"d-flex justify-content-between\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"fas fa-save\"></i> Publier
                </button>
            </div>
        </form>
    {% endif %}
</div>
{% endblock %}", "admin_posts/form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\form.html.twig");
    }
}

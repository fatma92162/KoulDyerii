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

/* partenaire/modifier_plat.html.twig */
class __TwigTemplate_8673d7ab0aac40637e0f1b933a2fc265 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/modifier_plat.html.twig"));

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

        yield "Modifier le plat - Koul Dyeri";
        
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
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid #E8D5B7;
    }
    .form-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 25px 30px;
    }
    .form-body {
        padding: 30px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        font-weight: 600;
        color: #5C4033;
        margin-bottom: 8px;
        display: block;
    }
    .form-control, .form-select {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
    }
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }
    .form-control.is-valid, .form-select.is-valid {
        border-color: #28a745;
        background-color: #f0fff4;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }
    .help-text {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
        display: block;
    }
    .required-star {
        color: #dc3545;
    }
    .current-image {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #f0e6d6;
    }
    .btn-submit {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px;
        font-weight: 700;
        width: 100%;
        color: white;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 93
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 94
        yield "<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🍽️ Modifier le plat</h3>
                <p class=\"mb-0\">Modifiez les informations de votre plat</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" id=\"platForm\" novalidate>
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du plat <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "nom", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 109, $this->source); })()), "nom", [], "any", false, false, false, 109), "")) : ("")), "html", null, true);
        yield "\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        ";
        // line 113
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 113)) {
            // line 114
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 114, $this->source); })()), "nom", [], "any", false, false, false, 114), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 116
            yield "                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        ";
        }
        // line 118
        yield "                    </div>

                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"3\">";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "description", [], "any", true, true, false, 125)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 125, $this->source); })()), "description", [], "any", false, false, false, 125), "")) : ("")), "html", null, true);
        yield "</textarea>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "prix", [], "any", true, true, false, 135)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 135, $this->source); })()), "prix", [], "any", false, false, false, 135), "")) : ("")), "html", null, true);
        yield "\"
                               required
                               min=\"0.01\">
                        ";
        // line 138
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 138)) {
            // line 139
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 139, $this->source); })()), "prix", [], "any", false, false, false, 139), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 141
            yield "                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        ";
        }
        // line 143
        yield "                    </div>

                    <div class=\"form-group\">
                        <label for=\"ingredients\">Ingrédients</label>
                        <textarea id=\"ingredients\" 
                                  name=\"ingredients\" 
                                  class=\"form-control\" 
                                  rows=\"2\">";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "ingredients", [], "any", true, true, false, 150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 150, $this->source); })()), "ingredients", [], "any", false, false, false, 150), "")) : ("")), "html", null, true);
        yield "</textarea>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"categorie\">Catégorie</label>
                        <select id=\"categorie\" name=\"categorie\" class=\"form-select\">
                            <option value=\"\">Sélectionner</option>
                            <option value=\"entree\" ";
        // line 157
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 157, $this->source); })()), "categorie", [], "any", false, false, false, 157) == "entree")) {
            yield "selected";
        }
        yield ">Entrée</option>
                            <option value=\"plat\" ";
        // line 158
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 158, $this->source); })()), "categorie", [], "any", false, false, false, 158) == "plat")) {
            yield "selected";
        }
        yield ">Plat principal</option>
                            <option value=\"dessert\" ";
        // line 159
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 159, $this->source); })()), "categorie", [], "any", false, false, false, 159) == "dessert")) {
            yield "selected";
        }
        yield ">Dessert</option>
                            <option value=\"boisson\" ";
        // line 160
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 160, $this->source); })()), "categorie", [], "any", false, false, false, 160) == "boisson")) {
            yield "selected";
        }
        yield ">Boisson</option>
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"image\">Photo du plat</label>
                        <input type=\"file\" 
                               id=\"image\" 
                               name=\"image\" 
                               class=\"form-control\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        
                        ";
        // line 173
        if (((isset($context["plat"]) || array_key_exists("plat", $context) ? $context["plat"] : (function () { throw new RuntimeError('Variable "plat" does not exist.', 173, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["plat"]) || array_key_exists("plat", $context) ? $context["plat"] : (function () { throw new RuntimeError('Variable "plat" does not exist.', 173, $this->source); })()), "image", [], "any", false, false, false, 173))) {
            // line 174
            yield "                            <div class=\"mt-3\">
                                <label>Image actuelle :</label><br>
                                <img src=\"";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["plat"]) || array_key_exists("plat", $context) ? $context["plat"] : (function () { throw new RuntimeError('Variable "plat" does not exist.', 176, $this->source); })()), "image", [], "any", false, false, false, 176), "html", null, true);
            yield "\" class=\"current-image\" alt=\"Image actuelle\">
                                <div class=\"form-check mt-2\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\" value=\"1\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash\"></i> Supprimer l'image actuelle
                                    </label>
                                </div>
                            </div>
                        ";
        }
        // line 185
        yield "                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-save\"></i> Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('platForm');
    const nomInput = document.getElementById('nom');
    const prixInput = document.getElementById('prix');
    
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    if (prixInput) {
        prixInput.addEventListener('input', function() {
            const value = parseFloat(this.value);
            if (isNaN(value) || value <= 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix <= 0) {
            prixInput.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
        }
    });
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
        return "partenaire/modifier_plat.html.twig";
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
        return array (  339 => 185,  327 => 176,  323 => 174,  321 => 173,  303 => 160,  297 => 159,  291 => 158,  285 => 157,  275 => 150,  266 => 143,  262 => 141,  256 => 139,  254 => 138,  248 => 135,  235 => 125,  226 => 118,  222 => 116,  216 => 114,  214 => 113,  207 => 109,  190 => 94,  180 => 93,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Modifier le plat - Koul Dyeri{% endblock %}

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
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid #E8D5B7;
    }
    .form-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 25px 30px;
    }
    .form-body {
        padding: 30px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        font-weight: 600;
        color: #5C4033;
        margin-bottom: 8px;
        display: block;
    }
    .form-control, .form-select {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
    }
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }
    .form-control.is-valid, .form-select.is-valid {
        border-color: #28a745;
        background-color: #f0fff4;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }
    .help-text {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
        display: block;
    }
    .required-star {
        color: #dc3545;
    }
    .current-image {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #f0e6d6;
    }
    .btn-submit {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px;
        font-weight: 700;
        width: 100%;
        color: white;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🍽️ Modifier le plat</h3>
                <p class=\"mb-0\">Modifiez les informations de votre plat</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" id=\"platForm\" novalidate>
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du plat <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"{{ formData.nom|default('') }}\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        {% if errors.nom is defined %}
                            <div class=\"invalid-feedback\">{{ errors.nom }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        {% endif %}
                    </div>

                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"3\">{{ formData.description|default('') }}</textarea>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"{{ formData.prix|default('') }}\"
                               required
                               min=\"0.01\">
                        {% if errors.prix is defined %}
                            <div class=\"invalid-feedback\">{{ errors.prix }}</div>
                        {% else %}
                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        {% endif %}
                    </div>

                    <div class=\"form-group\">
                        <label for=\"ingredients\">Ingrédients</label>
                        <textarea id=\"ingredients\" 
                                  name=\"ingredients\" 
                                  class=\"form-control\" 
                                  rows=\"2\">{{ formData.ingredients|default('') }}</textarea>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"categorie\">Catégorie</label>
                        <select id=\"categorie\" name=\"categorie\" class=\"form-select\">
                            <option value=\"\">Sélectionner</option>
                            <option value=\"entree\" {% if formData.categorie == 'entree' %}selected{% endif %}>Entrée</option>
                            <option value=\"plat\" {% if formData.categorie == 'plat' %}selected{% endif %}>Plat principal</option>
                            <option value=\"dessert\" {% if formData.categorie == 'dessert' %}selected{% endif %}>Dessert</option>
                            <option value=\"boisson\" {% if formData.categorie == 'boisson' %}selected{% endif %}>Boisson</option>
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"image\">Photo du plat</label>
                        <input type=\"file\" 
                               id=\"image\" 
                               name=\"image\" 
                               class=\"form-control\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        
                        {% if plat and plat.image %}
                            <div class=\"mt-3\">
                                <label>Image actuelle :</label><br>
                                <img src=\"{{ plat.image }}\" class=\"current-image\" alt=\"Image actuelle\">
                                <div class=\"form-check mt-2\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\" value=\"1\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash\"></i> Supprimer l'image actuelle
                                    </label>
                                </div>
                            </div>
                        {% endif %}
                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-save\"></i> Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('platForm');
    const nomInput = document.getElementById('nom');
    const prixInput = document.getElementById('prix');
    
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    if (prixInput) {
        prixInput.addEventListener('input', function() {
            const value = parseFloat(this.value);
            if (isNaN(value) || value <= 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix <= 0) {
            prixInput.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
        }
    });
});
</script>
{% endblock %}", "partenaire/modifier_plat.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\modifier_plat.html.twig");
    }
}

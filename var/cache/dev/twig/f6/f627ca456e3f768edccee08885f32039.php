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

/* partenaire/ajouter_plat.html.twig */
class __TwigTemplate_7dd064904effabbacfaecaa08242f42a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/ajouter_plat.html.twig"));

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

        yield "Ajouter un plat - Koul Dyeri";
        
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
    .btn-submit {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 14px;
        font-weight: 700;
        width: 100%;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
    .image-preview {
        margin-top: 10px;
    }
    .image-preview img {
        max-width: 150px;
        border-radius: 10px;
        border: 2px solid #f0e6d6;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 95
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 96
        yield "<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🍽️ Ajouter un plat</h3>
                <p class=\"mb-0\">Partagez votre création culinaire</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" id=\"platForm\" novalidate>
                    
                    <!-- Nom du plat -->
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du plat <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "nom", [], "any", true, true, false, 113)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 113, $this->source); })()), "nom", [], "any", false, false, false, 113), "")) : ("")), "html", null, true);
        yield "\"
                               placeholder=\"Ex: Couscous royal\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        ";
        // line 118
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 118)) {
            // line 119
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 119, $this->source); })()), "nom", [], "any", false, false, false, 119), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 121
            yield "                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        ";
        }
        // line 123
        yield "                    </div>

                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"3\"
                                  minlength=\"10\"
                                  maxlength=\"500\">";
        // line 133
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "description", [], "any", true, true, false, 133)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 133, $this->source); })()), "description", [], "any", false, false, false, 133), "")) : ("")), "html", null, true);
        yield "</textarea>
                        <small class=\"help-text\">Décrivez votre plat (optionnel, min 10 caractères)</small>
                    </div>

                    <!-- Prix -->
                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "prix", [], "any", true, true, false, 145)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 145, $this->source); })()), "prix", [], "any", false, false, false, 145), "")) : ("")), "html", null, true);
        yield "\"
                               placeholder=\"0.00\"
                               required
                               min=\"0.01\">
                        ";
        // line 149
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 149)) {
            // line 150
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 150, $this->source); })()), "prix", [], "any", false, false, false, 150), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 152
            yield "                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        ";
        }
        // line 154
        yield "                    </div>

                    <!-- Ingrédients -->
                    <div class=\"form-group\">
                        <label for=\"ingredients\">Ingrédients</label>
                        <textarea id=\"ingredients\" 
                                  name=\"ingredients\" 
                                  class=\"form-control\" 
                                  rows=\"2\">";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "ingredients", [], "any", true, true, false, 162)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 162, $this->source); })()), "ingredients", [], "any", false, false, false, 162), "")) : ("")), "html", null, true);
        yield "</textarea>
                        <small class=\"help-text\">Liste des ingrédients (optionnel)</small>
                    </div>

                    <!-- Catégorie -->
                    <div class=\"form-group\">
                        <label for=\"categorie\">Catégorie</label>
                        <select id=\"categorie\" name=\"categorie\" class=\"form-select\">
                            <option value=\"\">Sélectionner</option>
                            <option value=\"entree\" ";
        // line 171
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "categorie", [], "any", true, true, false, 171) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 171, $this->source); })()), "categorie", [], "any", false, false, false, 171) == "entree"))) {
            yield "selected";
        }
        yield ">🍽️ Entrée</option>
                            <option value=\"plat\" ";
        // line 172
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "categorie", [], "any", true, true, false, 172) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 172, $this->source); })()), "categorie", [], "any", false, false, false, 172) == "plat"))) {
            yield "selected";
        }
        yield ">🍲 Plat principal</option>
                            <option value=\"dessert\" ";
        // line 173
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "categorie", [], "any", true, true, false, 173) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 173, $this->source); })()), "categorie", [], "any", false, false, false, 173) == "dessert"))) {
            yield "selected";
        }
        yield ">🍰 Dessert</option>
                            <option value=\"boisson\" ";
        // line 174
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "categorie", [], "any", true, true, false, 174) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 174, $this->source); })()), "categorie", [], "any", false, false, false, 174) == "boisson"))) {
            yield "selected";
        }
        yield ">🥤 Boisson</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div class=\"form-group\">
                        <label for=\"image\">Photo du plat</label>
                        <input type=\"file\" 
                               id=\"image\" 
                               name=\"image\" 
                               class=\"form-control\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        <div class=\"image-preview\" id=\"imagePreview\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-save\"></i> Ajouter le plat
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
    const descriptionInput = document.getElementById('description');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    
    // Validation du nom
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const helpText = this.parentElement.querySelector('.help-text');
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom du plat est obligatoire';
            } else if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom doit contenir au moins 3 caractères';
            } else if (value.length > 100) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
                if (helpText) helpText.style.color = '#28a745';
            }
        });
    }
    
    // Validation du prix
    if (prixInput) {
        prixInput.addEventListener('input', function() {
            const value = parseFloat(this.value);
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (isNaN(value) || value <= 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de la description
    if (descriptionInput) {
        descriptionInput.addEventListener('input', function() {
            const value = this.value.trim();
            const helpText = this.parentElement.querySelector('.help-text');
            
            if (value.length > 0 && value.length < 10) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else if (value.length >= 10) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (helpText) helpText.style.color = '#28a745';
            } else {
                this.classList.remove('is-invalid');
                this.classList.remove('is-valid');
            }
        });
    }
    
    // Prévisualisation de l'image
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.innerHTML = `<img src=\"\${event.target.result}\" alt=\"Aperçu\">`;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '';
            }
        });
    }
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            const errorDiv = nomInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le nom du plat est obligatoire';
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix <= 0) {
            prixInput.classList.add('is-invalid');
            const errorDiv = prixInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif';
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
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
        return "partenaire/ajouter_plat.html.twig";
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
        return array (  317 => 174,  311 => 173,  305 => 172,  299 => 171,  287 => 162,  277 => 154,  273 => 152,  267 => 150,  265 => 149,  258 => 145,  243 => 133,  231 => 123,  227 => 121,  221 => 119,  219 => 118,  211 => 113,  192 => 96,  182 => 95,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Ajouter un plat - Koul Dyeri{% endblock %}

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
    .btn-submit {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 14px;
        font-weight: 700;
        width: 100%;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139,0,0,0.3);
    }
    .image-preview {
        margin-top: 10px;
    }
    .image-preview img {
        max-width: 150px;
        border-radius: 10px;
        border: 2px solid #f0e6d6;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🍽️ Ajouter un plat</h3>
                <p class=\"mb-0\">Partagez votre création culinaire</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" id=\"platForm\" novalidate>
                    
                    <!-- Nom du plat -->
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du plat <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"{{ formData.nom|default('') }}\"
                               placeholder=\"Ex: Couscous royal\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        {% if errors.nom is defined %}
                            <div class=\"invalid-feedback\">{{ errors.nom }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        {% endif %}
                    </div>

                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"3\"
                                  minlength=\"10\"
                                  maxlength=\"500\">{{ formData.description|default('') }}</textarea>
                        <small class=\"help-text\">Décrivez votre plat (optionnel, min 10 caractères)</small>
                    </div>

                    <!-- Prix -->
                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"{{ formData.prix|default('') }}\"
                               placeholder=\"0.00\"
                               required
                               min=\"0.01\">
                        {% if errors.prix is defined %}
                            <div class=\"invalid-feedback\">{{ errors.prix }}</div>
                        {% else %}
                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        {% endif %}
                    </div>

                    <!-- Ingrédients -->
                    <div class=\"form-group\">
                        <label for=\"ingredients\">Ingrédients</label>
                        <textarea id=\"ingredients\" 
                                  name=\"ingredients\" 
                                  class=\"form-control\" 
                                  rows=\"2\">{{ formData.ingredients|default('') }}</textarea>
                        <small class=\"help-text\">Liste des ingrédients (optionnel)</small>
                    </div>

                    <!-- Catégorie -->
                    <div class=\"form-group\">
                        <label for=\"categorie\">Catégorie</label>
                        <select id=\"categorie\" name=\"categorie\" class=\"form-select\">
                            <option value=\"\">Sélectionner</option>
                            <option value=\"entree\" {% if formData.categorie is defined and formData.categorie == 'entree' %}selected{% endif %}>🍽️ Entrée</option>
                            <option value=\"plat\" {% if formData.categorie is defined and formData.categorie == 'plat' %}selected{% endif %}>🍲 Plat principal</option>
                            <option value=\"dessert\" {% if formData.categorie is defined and formData.categorie == 'dessert' %}selected{% endif %}>🍰 Dessert</option>
                            <option value=\"boisson\" {% if formData.categorie is defined and formData.categorie == 'boisson' %}selected{% endif %}>🥤 Boisson</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div class=\"form-group\">
                        <label for=\"image\">Photo du plat</label>
                        <input type=\"file\" 
                               id=\"image\" 
                               name=\"image\" 
                               class=\"form-control\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        <div class=\"image-preview\" id=\"imagePreview\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-save\"></i> Ajouter le plat
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
    const descriptionInput = document.getElementById('description');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    
    // Validation du nom
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const helpText = this.parentElement.querySelector('.help-text');
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom du plat est obligatoire';
            } else if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom doit contenir au moins 3 caractères';
            } else if (value.length > 100) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
                if (helpText) helpText.style.color = '#28a745';
            }
        });
    }
    
    // Validation du prix
    if (prixInput) {
        prixInput.addEventListener('input', function() {
            const value = parseFloat(this.value);
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (isNaN(value) || value <= 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de la description
    if (descriptionInput) {
        descriptionInput.addEventListener('input', function() {
            const value = this.value.trim();
            const helpText = this.parentElement.querySelector('.help-text');
            
            if (value.length > 0 && value.length < 10) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else if (value.length >= 10) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (helpText) helpText.style.color = '#28a745';
            } else {
                this.classList.remove('is-invalid');
                this.classList.remove('is-valid');
            }
        });
    }
    
    // Prévisualisation de l'image
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.innerHTML = `<img src=\"\${event.target.result}\" alt=\"Aperçu\">`;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '';
            }
        });
    }
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            const errorDiv = nomInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le nom du plat est obligatoire';
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix <= 0) {
            prixInput.classList.add('is-invalid');
            const errorDiv = prixInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif';
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
});
</script>
{% endblock %}", "partenaire/ajouter_plat.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\ajouter_plat.html.twig");
    }
}

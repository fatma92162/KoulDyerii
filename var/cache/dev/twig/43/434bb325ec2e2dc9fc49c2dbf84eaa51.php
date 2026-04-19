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

/* partenaire/devenir.html.twig */
class __TwigTemplate_1687658e3f94e816f393d436301461ec extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/devenir.html.twig"));

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

        yield "Devenir partenaire - Koul Dyeri";
        
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
        position: relative;
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
        background: #fefcf8;
    }
    .form-control:focus, .form-select:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
        background: white;
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
    .valid-feedback {
        color: #28a745;
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
    .file-input-wrapper {
        position: relative;
    }
    .file-input-wrapper input {
        padding: 10px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 102
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 103
        yield "<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🤝 Devenir partenaire</h3>
                <p class=\"mb-0\">Rejoignez notre réseau de partenaires</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" action=\"";
        // line 111
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire_submit");
        yield "\" enctype=\"multipart/form-data\" id=\"partenaireForm\" novalidate>
                    
                    <!-- Nom -->
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du restaurant/partenaire <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "nom", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 120, $this->source); })()), "nom", [], "any", false, false, false, 120), "")) : ("")), "html", null, true);
        yield "\"
                               placeholder=\"Ex: Restaurant La Médina\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        ";
        // line 125
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 125)) {
            // line 126
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 126, $this->source); })()), "nom", [], "any", false, false, false, 126), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 128
            yield "                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        ";
        }
        // line 130
        yield "                    </div>

                    <!-- Type -->
                    <div class=\"form-group\">
                        <label for=\"type\">Type <span class=\"required-star\">*</span></label>
                        <select id=\"type\" name=\"type\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner --</option>
                            <option value=\"restaurant\" ";
        // line 137
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "type", [], "any", true, true, false, 137) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 137, $this->source); })()), "type", [], "any", false, false, false, 137) == "restaurant"))) {
            yield "selected";
        }
        yield ">🍽️ Restaurant</option>
                            <option value=\"traiteur\" ";
        // line 138
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "type", [], "any", true, true, false, 138) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 138, $this->source); })()), "type", [], "any", false, false, false, 138) == "traiteur"))) {
            yield "selected";
        }
        yield ">🍱 Traiteur</option>
                            <option value=\"cafe\" ";
        // line 139
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "type", [], "any", true, true, false, 139) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 139, $this->source); })()), "type", [], "any", false, false, false, 139) == "cafe"))) {
            yield "selected";
        }
        yield ">☕ Café</option>
                            <option value=\"artisan\" ";
        // line 140
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "type", [], "any", true, true, false, 140) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 140, $this->source); })()), "type", [], "any", false, false, false, 140) == "artisan"))) {
            yield "selected";
        }
        yield ">👨‍🍳 Artisan culinaire</option>
                        </select>
                        ";
        // line 142
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "type", [], "any", true, true, false, 142)) {
            // line 143
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 143, $this->source); })()), "type", [], "any", false, false, false, 143), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 145
            yield "                            <small class=\"help-text\">Choisissez votre domaine d'activité</small>
                        ";
        }
        // line 147
        yield "                    </div>

                    <!-- Téléphone -->
                    <div class=\"form-group\">
                        <label for=\"telephone\">Téléphone <span class=\"required-star\">*</span></label>
                        <input type=\"tel\" 
                               id=\"telephone\" 
                               name=\"telephone\" 
                               class=\"form-control\" 
                               value=\"";
        // line 156
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "telephone", [], "any", true, true, false, 156)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 156, $this->source); })()), "telephone", [], "any", false, false, false, 156), "")) : ("")), "html", null, true);
        yield "\"
                               placeholder=\"Ex: 12345678\"
                               required
                               pattern=\"[0-9]{8}\"
                               maxlength=\"8\">
                        ";
        // line 161
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 161)) {
            // line 162
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 162, $this->source); })()), "telephone", [], "any", false, false, false, 162), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 164
            yield "                            <small class=\"help-text\">8 chiffres (ex: 12345678)</small>
                        ";
        }
        // line 166
        yield "                    </div>

                    <!-- Adresse -->
                    <div class=\"form-group\">
                        <label for=\"adresse\">Adresse <span class=\"required-star\">*</span></label>
                        <textarea id=\"adresse\" 
                                  name=\"adresse\" 
                                  class=\"form-control\" 
                                  rows=\"3\" 
                                  required
                                  minlength=\"5\"
                                  maxlength=\"500\">";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "adresse", [], "any", true, true, false, 177)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 177, $this->source); })()), "adresse", [], "any", false, false, false, 177), "")) : ("")), "html", null, true);
        yield "</textarea>
                        ";
        // line 178
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresse", [], "any", true, true, false, 178)) {
            // line 179
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 179, $this->source); })()), "adresse", [], "any", false, false, false, 179), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 181
            yield "                            <small class=\"help-text\">Entre 5 et 500 caractères</small>
                        ";
        }
        // line 183
        yield "                    </div>

                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"4\"
                                  minlength=\"10\"
                                  maxlength=\"1000\">";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "description", [], "any", true, true, false, 193)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 193, $this->source); })()), "description", [], "any", false, false, false, 193), "")) : ("")), "html", null, true);
        yield "</textarea>
                        <small class=\"help-text\">Présentez votre activité (minimum 10 caractères)</small>
                    </div>

                    <!-- Logo -->
                    <div class=\"form-group\">
                        <label for=\"logo\">Logo du restaurant</label>
                        <div class=\"file-input-wrapper\">
                            <input type=\"file\" 
                                   id=\"logo\" 
                                   name=\"logo\" 
                                   class=\"form-control\" 
                                   accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        </div>
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        <div id=\"imagePreview\" class=\"mt-2\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-paper-plane\"></i> Envoyer la demande
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('partenaireForm');
    const nomInput = document.getElementById('nom');
    const typeSelect = document.getElementById('type');
    const telephoneInput = document.getElementById('telephone');
    const adresseTextarea = document.getElementById('adresse');
    const descriptionTextarea = document.getElementById('description');
    const logoInput = document.getElementById('logo');
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
                if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire';
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
    
    // Validation du type
    if (typeSelect) {
        typeSelect.addEventListener('change', function() {
            if (this.value === '') {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation du téléphone
    if (telephoneInput) {
        telephoneInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const phoneRegex = /^[0-9]{8}\$/;
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le téléphone est obligatoire';
            } else if (!phoneRegex.test(value)) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le téléphone doit contenir 8 chiffres';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de l'adresse
    if (adresseTextarea) {
        adresseTextarea.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse est obligatoire';
            } else if (value.length < 5) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse doit contenir au moins 5 caractères';
            } else if (value.length > 500) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse ne peut pas dépasser 500 caractères';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de la description
    if (descriptionTextarea) {
        descriptionTextarea.addEventListener('input', function() {
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
    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.innerHTML = `<img src=\"\${event.target.result}\" style=\"max-width: 150px; border-radius: 10px; border: 2px solid #f0e6d6;\">`;
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
        
        // Valider nom
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            const errorDiv = nomInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire';
            hasError = true;
        } else if (nomInput.value.trim().length < 3) {
            nomInput.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider type
        if (!typeSelect.value) {
            typeSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider téléphone
        const phoneRegex = /^[0-9]{8}\$/;
        if (!telephoneInput.value.trim()) {
            telephoneInput.classList.add('is-invalid');
            const errorDiv = telephoneInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le téléphone est obligatoire';
            hasError = true;
        } else if (!phoneRegex.test(telephoneInput.value.trim())) {
            telephoneInput.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider adresse
        if (!adresseTextarea.value.trim()) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        } else if (adresseTextarea.value.trim().length < 5) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
            // Scroll vers le premier champ en erreur
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
        return "partenaire/devenir.html.twig";
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
        return array (  359 => 193,  347 => 183,  343 => 181,  337 => 179,  335 => 178,  331 => 177,  318 => 166,  314 => 164,  308 => 162,  306 => 161,  298 => 156,  287 => 147,  283 => 145,  277 => 143,  275 => 142,  268 => 140,  262 => 139,  256 => 138,  250 => 137,  241 => 130,  237 => 128,  231 => 126,  229 => 125,  221 => 120,  209 => 111,  199 => 103,  189 => 102,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Devenir partenaire - Koul Dyeri{% endblock %}

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
        position: relative;
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
        background: #fefcf8;
    }
    .form-control:focus, .form-select:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
        background: white;
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
    .valid-feedback {
        color: #28a745;
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
    .file-input-wrapper {
        position: relative;
    }
    .file-input-wrapper input {
        padding: 10px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>🤝 Devenir partenaire</h3>
                <p class=\"mb-0\">Rejoignez notre réseau de partenaires</p>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" action=\"{{ path('app_partenaire_submit') }}\" enctype=\"multipart/form-data\" id=\"partenaireForm\" novalidate>
                    
                    <!-- Nom -->
                    <div class=\"form-group\">
                        <label for=\"nom\">Nom du restaurant/partenaire <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               class=\"form-control\" 
                               value=\"{{ formData.nom|default('') }}\"
                               placeholder=\"Ex: Restaurant La Médina\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        {% if errors.nom is defined %}
                            <div class=\"invalid-feedback\">{{ errors.nom }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        {% endif %}
                    </div>

                    <!-- Type -->
                    <div class=\"form-group\">
                        <label for=\"type\">Type <span class=\"required-star\">*</span></label>
                        <select id=\"type\" name=\"type\" class=\"form-select\" required>
                            <option value=\"\">-- Sélectionner --</option>
                            <option value=\"restaurant\" {% if formData.type is defined and formData.type == 'restaurant' %}selected{% endif %}>🍽️ Restaurant</option>
                            <option value=\"traiteur\" {% if formData.type is defined and formData.type == 'traiteur' %}selected{% endif %}>🍱 Traiteur</option>
                            <option value=\"cafe\" {% if formData.type is defined and formData.type == 'cafe' %}selected{% endif %}>☕ Café</option>
                            <option value=\"artisan\" {% if formData.type is defined and formData.type == 'artisan' %}selected{% endif %}>👨‍🍳 Artisan culinaire</option>
                        </select>
                        {% if errors.type is defined %}
                            <div class=\"invalid-feedback\">{{ errors.type }}</div>
                        {% else %}
                            <small class=\"help-text\">Choisissez votre domaine d'activité</small>
                        {% endif %}
                    </div>

                    <!-- Téléphone -->
                    <div class=\"form-group\">
                        <label for=\"telephone\">Téléphone <span class=\"required-star\">*</span></label>
                        <input type=\"tel\" 
                               id=\"telephone\" 
                               name=\"telephone\" 
                               class=\"form-control\" 
                               value=\"{{ formData.telephone|default('') }}\"
                               placeholder=\"Ex: 12345678\"
                               required
                               pattern=\"[0-9]{8}\"
                               maxlength=\"8\">
                        {% if errors.telephone is defined %}
                            <div class=\"invalid-feedback\">{{ errors.telephone }}</div>
                        {% else %}
                            <small class=\"help-text\">8 chiffres (ex: 12345678)</small>
                        {% endif %}
                    </div>

                    <!-- Adresse -->
                    <div class=\"form-group\">
                        <label for=\"adresse\">Adresse <span class=\"required-star\">*</span></label>
                        <textarea id=\"adresse\" 
                                  name=\"adresse\" 
                                  class=\"form-control\" 
                                  rows=\"3\" 
                                  required
                                  minlength=\"5\"
                                  maxlength=\"500\">{{ formData.adresse|default('') }}</textarea>
                        {% if errors.adresse is defined %}
                            <div class=\"invalid-feedback\">{{ errors.adresse }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 5 et 500 caractères</small>
                        {% endif %}
                    </div>

                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description</label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"4\"
                                  minlength=\"10\"
                                  maxlength=\"1000\">{{ formData.description|default('') }}</textarea>
                        <small class=\"help-text\">Présentez votre activité (minimum 10 caractères)</small>
                    </div>

                    <!-- Logo -->
                    <div class=\"form-group\">
                        <label for=\"logo\">Logo du restaurant</label>
                        <div class=\"file-input-wrapper\">
                            <input type=\"file\" 
                                   id=\"logo\" 
                                   name=\"logo\" 
                                   class=\"form-control\" 
                                   accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        </div>
                        <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        <div id=\"imagePreview\" class=\"mt-2\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn-submit\">
                        <i class=\"fas fa-paper-plane\"></i> Envoyer la demande
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('partenaireForm');
    const nomInput = document.getElementById('nom');
    const typeSelect = document.getElementById('type');
    const telephoneInput = document.getElementById('telephone');
    const adresseTextarea = document.getElementById('adresse');
    const descriptionTextarea = document.getElementById('description');
    const logoInput = document.getElementById('logo');
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
                if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire';
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
    
    // Validation du type
    if (typeSelect) {
        typeSelect.addEventListener('change', function() {
            if (this.value === '') {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation du téléphone
    if (telephoneInput) {
        telephoneInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const phoneRegex = /^[0-9]{8}\$/;
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le téléphone est obligatoire';
            } else if (!phoneRegex.test(value)) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le téléphone doit contenir 8 chiffres';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de l'adresse
    if (adresseTextarea) {
        adresseTextarea.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (value.length === 0) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse est obligatoire';
            } else if (value.length < 5) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse doit contenir au moins 5 caractères';
            } else if (value.length > 500) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ L\\'adresse ne peut pas dépasser 500 caractères';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (errorDiv) errorDiv.textContent = '';
            }
        });
    }
    
    // Validation de la description
    if (descriptionTextarea) {
        descriptionTextarea.addEventListener('input', function() {
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
    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.innerHTML = `<img src=\"\${event.target.result}\" style=\"max-width: 150px; border-radius: 10px; border: 2px solid #f0e6d6;\">`;
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
        
        // Valider nom
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            const errorDiv = nomInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire';
            hasError = true;
        } else if (nomInput.value.trim().length < 3) {
            nomInput.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider type
        if (!typeSelect.value) {
            typeSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider téléphone
        const phoneRegex = /^[0-9]{8}\$/;
        if (!telephoneInput.value.trim()) {
            telephoneInput.classList.add('is-invalid');
            const errorDiv = telephoneInput.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '❌ Le téléphone est obligatoire';
            hasError = true;
        } else if (!phoneRegex.test(telephoneInput.value.trim())) {
            telephoneInput.classList.add('is-invalid');
            hasError = true;
        }
        
        // Valider adresse
        if (!adresseTextarea.value.trim()) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        } else if (adresseTextarea.value.trim().length < 5) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
            // Scroll vers le premier champ en erreur
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
});
</script>
{% endblock %}", "partenaire/devenir.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\partenaire\\devenir.html.twig");
    }
}

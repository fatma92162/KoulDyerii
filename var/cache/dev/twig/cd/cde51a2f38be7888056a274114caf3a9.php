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

/* admin_produits/form.html.twig */
class __TwigTemplate_ccbe6c00f6f3b50feb62313fea14ca5e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_produits/form.html.twig"));

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
    }
    .form-body {
        padding: 30px;
    }
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
    .form-control.is-valid {
        border-color: #28a745;
        background-color: #f0fff4;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }
    .valid-feedback {
        color: #28a745;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }
    .help-text {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
    }
    .current-image {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #f0e6d6;
    }
    .btn-primary {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
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
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 91
        yield "<div class=\"admin-card\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 95, $this->source); })()), "html", null, true);
        yield "</h3>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" 
                      action=\"";
        // line 99
        if (((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 99, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 99, $this->source); })()), "idProduit", [], "any", false, false, false, 99))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 99, $this->source); })()), "idProduit", [], "any", false, false, false, 99)]), "html", null, true);
        } else {
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_create");
        }
        yield "\" 
                      enctype=\"multipart/form-data\" 
                      novalidate
                      id=\"produitForm\">
                    
                    <!-- Champ Nom -->
                    <div class=\"mb-4\">
                        <label for=\"nom\" class=\"form-label\">Nom du produit <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" 
                               class=\"form-control ";
        // line 108
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 108)) {
            yield "is-invalid";
        }
        yield "\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               value=\"";
        // line 111
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "nom", [], "any", true, true, false, 111)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 111, $this->source); })()), "nom", [], "any", false, false, false, 111), "html", null, true);
        } elseif (((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 111, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 111, $this->source); })()), "nom", [], "any", false, false, false, 111))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 111, $this->source); })()), "nom", [], "any", false, false, false, 111), "html", null, true);
        }
        yield "\"
                               placeholder=\"Ex: Tajine tunisien\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        ";
        // line 116
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 116)) {
            // line 117
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 117, $this->source); })()), "nom", [], "any", false, false, false, 117), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 119
            yield "                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        ";
        }
        // line 121
        yield "                    </div>
                    
                    <!-- Champ Description -->
                    <div class=\"mb-4\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control ";
        // line 126
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "description", [], "any", true, true, false, 126)) {
            yield "is-invalid";
        }
        yield "\" 
                                  id=\"description\" 
                                  name=\"description\" 
                                  rows=\"5\"
                                  placeholder=\"Description détaillée du produit...\"
                                  minlength=\"10\">";
        // line 131
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "description", [], "any", true, true, false, 131)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 131, $this->source); })()), "description", [], "any", false, false, false, 131), "html", null, true);
        } elseif (((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 131, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 131, $this->source); })()), "description", [], "any", false, false, false, 131))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 131, $this->source); })()), "description", [], "any", false, false, false, 131), "html", null, true);
        }
        yield "</textarea>
                        ";
        // line 132
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "description", [], "any", true, true, false, 132)) {
            // line 133
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 133, $this->source); })()), "description", [], "any", false, false, false, 133), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 135
            yield "                            <small class=\"help-text\">Minimum 10 caractères (optionnel)</small>
                        ";
        }
        // line 137
        yield "                    </div>
                    
                    <!-- Champ Prix -->
                    <div class=\"mb-4\">
                        <label for=\"prix\" class=\"form-label\">Prix (€) <span class=\"text-danger\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               class=\"form-control ";
        // line 144
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 144)) {
            yield "is-invalid";
        }
        yield "\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               value=\"";
        // line 147
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "prix", [], "any", true, true, false, 147)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 147, $this->source); })()), "prix", [], "any", false, false, false, 147), "html", null, true);
        } elseif (((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 147, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 147, $this->source); })()), "prix", [], "any", false, false, false, 147))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 147, $this->source); })()), "prix", [], "any", false, false, false, 147), "html", null, true);
        }
        yield "\"
                               placeholder=\"0.00\"
                               required
                               min=\"0.01\">
                        ";
        // line 151
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 151)) {
            // line 152
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 152, $this->source); })()), "prix", [], "any", false, false, false, 152), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 154
            yield "                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        ";
        }
        // line 156
        yield "                    </div>
                    
                    <!-- Champ Photo -->
                    <div class=\"mb-4\">
                        <label for=\"photo\" class=\"form-label\">Photo du produit</label>
                        <input type=\"file\" 
                               class=\"form-control ";
        // line 162
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "photo", [], "any", true, true, false, 162)) {
            yield "is-invalid";
        }
        yield "\" 
                               id=\"photo\" 
                               name=\"photo\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        ";
        // line 166
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "photo", [], "any", true, true, false, 166)) {
            // line 167
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 167, $this->source); })()), "photo", [], "any", false, false, false, 167), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 169
            yield "                            <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        ";
        }
        // line 171
        yield "                        
                        ";
        // line 172
        if (((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 172, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 172, $this->source); })()), "photo", [], "any", false, false, false, 172))) {
            // line 173
            yield "                            <div class=\"mt-3\">
                                <label>Image actuelle :</label><br>
                                <img src=\"";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 175, $this->source); })()), "photo", [], "any", false, false, false, 175), "html", null, true);
            yield "\" class=\"current-image\" alt=\"Photo actuelle\">
                                <div class=\"form-check mt-2\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash\"></i> Supprimer l'image actuelle
                                    </label>
                                </div>
                            </div>
                        ";
        }
        // line 184
        yield "                    </div>
                    
                    <!-- Champ Disponible -->
                    <div class=\"mb-4\">
                        <div class=\"form-check form-switch\">
                            <input class=\"form-check-input\" type=\"checkbox\" name=\"disponible\" id=\"disponible\" 
                                   ";
        // line 190
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "disponible", [], "any", true, true, false, 190) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 190, $this->source); })()), "disponible", [], "any", false, false, false, 190)) || ((isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 190, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 190, $this->source); })()), "disponible", [], "any", false, false, false, 190)))) {
            yield "checked";
        }
        yield ">
                            <label class=\"form-check-label\" for=\"disponible\">
                                <i class=\"fas fa-check-circle text-success\"></i> Produit disponible
                            </label>
                        </div>
                    </div>
                    
                    <!-- Boutons -->
                    <div class=\"d-flex justify-content-between mt-5\">
                        <a href=\"";
        // line 199
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_produits_index");
        yield "\" class=\"btn btn-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fas fa-save\"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Validation en temps réel avec messages sous les champs
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('produitForm');
    const nomInput = document.getElementById('nom');
    const prixInput = document.getElementById('prix');
    const descriptionInput = document.getElementById('description');
    
    // Validation du nom
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const helpDiv = this.parentElement.querySelector('.help-text');
            
            if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom doit contenir au moins 3 caractères.';
            } else if (value.length > 100) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères.';
            } else if (value === '') {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire.';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (helpDiv) helpDiv.style.color = '#28a745';
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
                if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif.';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation de la description
    if (descriptionInput) {
        descriptionInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (value.length > 0 && value.length < 10) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ La description doit contenir au moins 10 caractères.';
            } else if (value.length >= 10) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.remove('is-valid');
            }
        });
    }
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
        return "admin_produits/form.html.twig";
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
        return array (  397 => 199,  383 => 190,  375 => 184,  363 => 175,  359 => 173,  357 => 172,  354 => 171,  350 => 169,  344 => 167,  342 => 166,  333 => 162,  325 => 156,  321 => 154,  315 => 152,  313 => 151,  302 => 147,  294 => 144,  285 => 137,  281 => 135,  275 => 133,  273 => 132,  265 => 131,  255 => 126,  248 => 121,  244 => 119,  238 => 117,  236 => 116,  224 => 111,  216 => 108,  200 => 99,  193 => 95,  187 => 91,  177 => 90,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}{{ titre }}{% endblock %}

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
    }
    .form-body {
        padding: 30px;
    }
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
    .form-control.is-valid {
        border-color: #28a745;
        background-color: #f0fff4;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }
    .valid-feedback {
        color: #28a745;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }
    .help-text {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
    }
    .current-image {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #f0e6d6;
    }
    .btn-primary {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
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
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>{{ titre }}</h3>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" 
                      action=\"{% if produit and produit.idProduit %}{{ path('app_admin_produits_update', {id: produit.idProduit}) }}{% else %}{{ path('app_admin_produits_create') }}{% endif %}\" 
                      enctype=\"multipart/form-data\" 
                      novalidate
                      id=\"produitForm\">
                    
                    <!-- Champ Nom -->
                    <div class=\"mb-4\">
                        <label for=\"nom\" class=\"form-label\">Nom du produit <span class=\"text-danger\">*</span></label>
                        <input type=\"text\" 
                               class=\"form-control {% if errors.nom is defined %}is-invalid{% endif %}\" 
                               id=\"nom\" 
                               name=\"nom\" 
                               value=\"{% if formData.nom is defined %}{{ formData.nom }}{% elseif produit and produit.nom %}{{ produit.nom }}{% endif %}\"
                               placeholder=\"Ex: Tajine tunisien\"
                               required
                               minlength=\"3\"
                               maxlength=\"100\">
                        {% if errors.nom is defined %}
                            <div class=\"invalid-feedback\">{{ errors.nom }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 3 et 100 caractères</small>
                        {% endif %}
                    </div>
                    
                    <!-- Champ Description -->
                    <div class=\"mb-4\">
                        <label for=\"description\" class=\"form-label\">Description</label>
                        <textarea class=\"form-control {% if errors.description is defined %}is-invalid{% endif %}\" 
                                  id=\"description\" 
                                  name=\"description\" 
                                  rows=\"5\"
                                  placeholder=\"Description détaillée du produit...\"
                                  minlength=\"10\">{% if formData.description is defined %}{{ formData.description }}{% elseif produit and produit.description %}{{ produit.description }}{% endif %}</textarea>
                        {% if errors.description is defined %}
                            <div class=\"invalid-feedback\">{{ errors.description }}</div>
                        {% else %}
                            <small class=\"help-text\">Minimum 10 caractères (optionnel)</small>
                        {% endif %}
                    </div>
                    
                    <!-- Champ Prix -->
                    <div class=\"mb-4\">
                        <label for=\"prix\" class=\"form-label\">Prix (€) <span class=\"text-danger\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               class=\"form-control {% if errors.prix is defined %}is-invalid{% endif %}\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               value=\"{% if formData.prix is defined %}{{ formData.prix }}{% elseif produit and produit.prix %}{{ produit.prix }}{% endif %}\"
                               placeholder=\"0.00\"
                               required
                               min=\"0.01\">
                        {% if errors.prix is defined %}
                            <div class=\"invalid-feedback\">{{ errors.prix }}</div>
                        {% else %}
                            <small class=\"help-text\">Prix en euros (minimum 0.01€)</small>
                        {% endif %}
                    </div>
                    
                    <!-- Champ Photo -->
                    <div class=\"mb-4\">
                        <label for=\"photo\" class=\"form-label\">Photo du produit</label>
                        <input type=\"file\" 
                               class=\"form-control {% if errors.photo is defined %}is-invalid{% endif %}\" 
                               id=\"photo\" 
                               name=\"photo\" 
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        {% if errors.photo is defined %}
                            <div class=\"invalid-feedback\">{{ errors.photo }}</div>
                        {% else %}
                            <small class=\"help-text\">Formats acceptés: JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                        {% endif %}
                        
                        {% if produit and produit.photo %}
                            <div class=\"mt-3\">
                                <label>Image actuelle :</label><br>
                                <img src=\"{{ produit.photo }}\" class=\"current-image\" alt=\"Photo actuelle\">
                                <div class=\"form-check mt-2\">
                                    <input class=\"form-check-input\" type=\"checkbox\" name=\"delete_image\" id=\"delete_image\">
                                    <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                        <i class=\"fas fa-trash\"></i> Supprimer l'image actuelle
                                    </label>
                                </div>
                            </div>
                        {% endif %}
                    </div>
                    
                    <!-- Champ Disponible -->
                    <div class=\"mb-4\">
                        <div class=\"form-check form-switch\">
                            <input class=\"form-check-input\" type=\"checkbox\" name=\"disponible\" id=\"disponible\" 
                                   {% if (formData.disponible is defined and formData.disponible) or (produit and produit.disponible) %}checked{% endif %}>
                            <label class=\"form-check-label\" for=\"disponible\">
                                <i class=\"fas fa-check-circle text-success\"></i> Produit disponible
                            </label>
                        </div>
                    </div>
                    
                    <!-- Boutons -->
                    <div class=\"d-flex justify-content-between mt-5\">
                        <a href=\"{{ path('app_admin_produits_index') }}\" class=\"btn btn-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fas fa-save\"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Validation en temps réel avec messages sous les champs
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('produitForm');
    const nomInput = document.getElementById('nom');
    const prixInput = document.getElementById('prix');
    const descriptionInput = document.getElementById('description');
    
    // Validation du nom
    if (nomInput) {
        nomInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            const helpDiv = this.parentElement.querySelector('.help-text');
            
            if (value.length < 3) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom doit contenir au moins 3 caractères.';
            } else if (value.length > 100) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères.';
            } else if (value === '') {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ Le nom est obligatoire.';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                if (helpDiv) helpDiv.style.color = '#28a745';
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
                if (errorDiv) errorDiv.textContent = '❌ Le prix doit être un nombre positif.';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation de la description
    if (descriptionInput) {
        descriptionInput.addEventListener('input', function() {
            const value = this.value.trim();
            const errorDiv = this.parentElement.querySelector('.invalid-feedback');
            
            if (value.length > 0 && value.length < 10) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
                if (errorDiv) errorDiv.textContent = '❌ La description doit contenir au moins 10 caractères.';
            } else if (value.length >= 10) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.remove('is-valid');
            }
        });
    }
});
</script>
{% endblock %}", "admin_produits/form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_produits\\form.html.twig");
    }
}

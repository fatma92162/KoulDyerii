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

/* admin_livraisons/livreur_form.html.twig */
class __TwigTemplate_d197616e2bec41fdbbba2d563863eb4d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_livraisons/livreur_form.html.twig"));

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
    
    .form-group .required-star {
        color: #dc3545;
    }
    
    .form-control {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
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
    
    .switch-container {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px 0;
    }
    
    .switch-label {
        font-weight: 600;
        color: #5C4033;
        margin: 0;
    }
    
    .switch-status {
        font-size: 14px;
        font-weight: 500;
    }
    
    .switch-status.disponible {
        color: #28a745;
    }
    
    .switch-status.indisponible {
        color: #dc3545;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 96
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 97
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 99, $this->source); })()), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 100
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreurs_liste");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"row\">
        <div class=\"col-md-6 mx-auto\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <form method=\"post\" 
                          action=\"";
        // line 110
        if ((($tmp = (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 110, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 110, $this->source); })()), "idLivreur", [], "any", false, false, false, 110)]), "html", null, true);
        } else {
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreur_create");
        }
        yield "\"
                          id=\"livreurForm\"
                          novalidate>
                        
                        <div class=\"form-group\">
                            <label for=\"nom\">Nom <span class=\"required-star\">*</span></label>
                            <input type=\"text\" 
                                   id=\"nom\" 
                                   name=\"nom\" 
                                   class=\"form-control\" 
                                   value=\"";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["livreur"] ?? null), "nom", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 120, $this->source); })()), "nom", [], "any", false, false, false, 120), "")) : ("")), "html", null, true);
        yield "\"
                                   placeholder=\"Ex: Ben Ali\"
                                   required
                                   minlength=\"2\"
                                   maxlength=\"100\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">Entre 2 et 100 caractères</small>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"prenom\">Prénom <span class=\"required-star\">*</span></label>
                            <input type=\"text\" 
                                   id=\"prenom\" 
                                   name=\"prenom\" 
                                   class=\"form-control\" 
                                   value=\"";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["livreur"] ?? null), "prenom", [], "any", true, true, false, 135)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 135, $this->source); })()), "prenom", [], "any", false, false, false, 135), "")) : ("")), "html", null, true);
        yield "\"
                                   placeholder=\"Ex: Mohamed\"
                                   required
                                   minlength=\"2\"
                                   maxlength=\"100\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">Entre 2 et 100 caractères</small>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"telephone\">Téléphone <span class=\"required-star\">*</span></label>
                            <input type=\"tel\" 
                                   id=\"telephone\" 
                                   name=\"telephone\" 
                                   class=\"form-control\" 
                                   value=\"";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["livreur"] ?? null), "telephone", [], "any", true, true, false, 150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 150, $this->source); })()), "telephone", [], "any", false, false, false, 150), "")) : ("")), "html", null, true);
        yield "\"
                                   placeholder=\"Ex: 12345678\"
                                   required
                                   pattern=\"[0-9]{8}\"
                                   maxlength=\"8\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">8 chiffres (ex: 12345678)</small>
                        </div>
                        
                        <!-- Disponibilité -->
                        <div class=\"form-group\">
                            <label>Statut de disponibilité</label>
                            <div class=\"switch-container\">
                                <div class=\"form-check form-switch\">
                                    <input class=\"form-check-input\" 
                                           type=\"checkbox\" 
                                           name=\"disponibilite\" 
                                           id=\"disponibilite\" 
                                           value=\"1\"
                                           ";
        // line 169
        if (((isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 169, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 169, $this->source); })()), "disponibilite", [], "any", false, false, false, 169))) {
            yield "checked";
        } elseif ((($tmp =  !(isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 169, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "checked";
        }
        yield ">
                                    <label class=\"form-check-label switch-label\" for=\"disponibilite\">
                                        <span id=\"statusText\" class=\"switch-status ";
        // line 171
        if (((isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 171, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 171, $this->source); })()), "disponibilite", [], "any", false, false, false, 171))) {
            yield "disponible";
        } elseif ((($tmp =  !(isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 171, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "disponible";
        } else {
            yield "indisponible";
        }
        yield "\">
                                            ";
        // line 172
        if (((isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 172, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 172, $this->source); })()), "disponibilite", [], "any", false, false, false, 172))) {
            yield "✅ Disponible
                                            ";
        } elseif ((($tmp =  !        // line 173
(isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 173, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "✅ Disponible
                                            ";
        } else {
            // line 174
            yield "❌ Indisponible
                                            ";
        }
        // line 176
        yield "                                        </span>
                                    </label>
                                </div>
                            </div>
                            <small class=\"help-text\">Décochez pour marquer le livreur comme indisponible</small>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer
                            </button>
                            <a href=\"";
        // line 187
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livreurs_liste");
        yield "\" class=\"btn btn-secondary\">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('livreurForm');
    const nomInput = document.getElementById('nom');
    const prenomInput = document.getElementById('prenom');
    const telephoneInput = document.getElementById('telephone');
    const disponibiliteCheckbox = document.getElementById('disponibilite');
    const statusText = document.getElementById('statusText');
    
    // Gestion de l'affichage du statut
    function updateStatusText() {
        if (disponibiliteCheckbox.checked) {
            statusText.innerHTML = '✅ Disponible';
            statusText.className = 'switch-status disponible';
        } else {
            statusText.innerHTML = '❌ Indisponible';
            statusText.className = 'switch-status indisponible';
        }
    }
    
    disponibiliteCheckbox.addEventListener('change', updateStatusText);
    
    // Validation du nom
    nomInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom est obligatoire';
        } else if (value.length < 2) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom doit contenir au moins 2 caractères';
        } else if (value.length > 100) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation du prénom
    prenomInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom est obligatoire';
        } else if (value.length < 2) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom doit contenir au moins 2 caractères';
        } else if (value.length > 100) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom ne peut pas dépasser 100 caractères';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation du téléphone
    telephoneInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        const phoneRegex = /^[0-9]{8}\$/;
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le téléphone est obligatoire';
        } else if (!phoneRegex.test(value)) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le téléphone doit contenir 8 chiffres';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            nomInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le nom est obligatoire';
            hasError = true;
        }
        
        if (!prenomInput.value.trim()) {
            prenomInput.classList.add('is-invalid');
            prenomInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le prénom est obligatoire';
            hasError = true;
        }
        
        const phoneRegex = /^[0-9]{8}\$/;
        if (!telephoneInput.value.trim()) {
            telephoneInput.classList.add('is-invalid');
            telephoneInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le téléphone est obligatoire';
            hasError = true;
        } else if (!phoneRegex.test(telephoneInput.value.trim())) {
            telephoneInput.classList.add('is-invalid');
            telephoneInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le téléphone doit contenir 8 chiffres';
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
        return "admin_livraisons/livreur_form.html.twig";
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
        return array (  334 => 187,  321 => 176,  317 => 174,  312 => 173,  308 => 172,  298 => 171,  289 => 169,  267 => 150,  249 => 135,  231 => 120,  214 => 110,  201 => 100,  197 => 99,  193 => 97,  183 => 96,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}{{ titre }}{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
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
    
    .form-group .required-star {
        color: #dc3545;
    }
    
    .form-control {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.15);
        outline: none;
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
    
    .switch-container {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px 0;
    }
    
    .switch-label {
        font-weight: 600;
        color: #5C4033;
        margin: 0;
    }
    
    .switch-status {
        font-size: 14px;
        font-weight: 500;
    }
    
    .switch-status.disponible {
        color: #28a745;
    }
    
    .switch-status.indisponible {
        color: #dc3545;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>{{ titre }}</h3>
        <a href=\"{{ path('app_admin_livreurs_liste') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"row\">
        <div class=\"col-md-6 mx-auto\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <form method=\"post\" 
                          action=\"{% if livreur %}{{ path('app_admin_livreur_update', {id: livreur.idLivreur}) }}{% else %}{{ path('app_admin_livreur_create') }}{% endif %}\"
                          id=\"livreurForm\"
                          novalidate>
                        
                        <div class=\"form-group\">
                            <label for=\"nom\">Nom <span class=\"required-star\">*</span></label>
                            <input type=\"text\" 
                                   id=\"nom\" 
                                   name=\"nom\" 
                                   class=\"form-control\" 
                                   value=\"{{ livreur.nom|default('') }}\"
                                   placeholder=\"Ex: Ben Ali\"
                                   required
                                   minlength=\"2\"
                                   maxlength=\"100\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">Entre 2 et 100 caractères</small>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"prenom\">Prénom <span class=\"required-star\">*</span></label>
                            <input type=\"text\" 
                                   id=\"prenom\" 
                                   name=\"prenom\" 
                                   class=\"form-control\" 
                                   value=\"{{ livreur.prenom|default('') }}\"
                                   placeholder=\"Ex: Mohamed\"
                                   required
                                   minlength=\"2\"
                                   maxlength=\"100\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">Entre 2 et 100 caractères</small>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"telephone\">Téléphone <span class=\"required-star\">*</span></label>
                            <input type=\"tel\" 
                                   id=\"telephone\" 
                                   name=\"telephone\" 
                                   class=\"form-control\" 
                                   value=\"{{ livreur.telephone|default('') }}\"
                                   placeholder=\"Ex: 12345678\"
                                   required
                                   pattern=\"[0-9]{8}\"
                                   maxlength=\"8\">
                            <div class=\"invalid-feedback\"></div>
                            <small class=\"help-text\">8 chiffres (ex: 12345678)</small>
                        </div>
                        
                        <!-- Disponibilité -->
                        <div class=\"form-group\">
                            <label>Statut de disponibilité</label>
                            <div class=\"switch-container\">
                                <div class=\"form-check form-switch\">
                                    <input class=\"form-check-input\" 
                                           type=\"checkbox\" 
                                           name=\"disponibilite\" 
                                           id=\"disponibilite\" 
                                           value=\"1\"
                                           {% if livreur and livreur.disponibilite %}checked{% elseif not livreur %}checked{% endif %}>
                                    <label class=\"form-check-label switch-label\" for=\"disponibilite\">
                                        <span id=\"statusText\" class=\"switch-status {% if livreur and livreur.disponibilite %}disponible{% elseif not livreur %}disponible{% else %}indisponible{% endif %}\">
                                            {% if livreur and livreur.disponibilite %}✅ Disponible
                                            {% elseif not livreur %}✅ Disponible
                                            {% else %}❌ Indisponible
                                            {% endif %}
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <small class=\"help-text\">Décochez pour marquer le livreur comme indisponible</small>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer
                            </button>
                            <a href=\"{{ path('app_admin_livreurs_liste') }}\" class=\"btn btn-secondary\">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('livreurForm');
    const nomInput = document.getElementById('nom');
    const prenomInput = document.getElementById('prenom');
    const telephoneInput = document.getElementById('telephone');
    const disponibiliteCheckbox = document.getElementById('disponibilite');
    const statusText = document.getElementById('statusText');
    
    // Gestion de l'affichage du statut
    function updateStatusText() {
        if (disponibiliteCheckbox.checked) {
            statusText.innerHTML = '✅ Disponible';
            statusText.className = 'switch-status disponible';
        } else {
            statusText.innerHTML = '❌ Indisponible';
            statusText.className = 'switch-status indisponible';
        }
    }
    
    disponibiliteCheckbox.addEventListener('change', updateStatusText);
    
    // Validation du nom
    nomInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom est obligatoire';
        } else if (value.length < 2) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom doit contenir au moins 2 caractères';
        } else if (value.length > 100) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le nom ne peut pas dépasser 100 caractères';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation du prénom
    prenomInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom est obligatoire';
        } else if (value.length < 2) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom doit contenir au moins 2 caractères';
        } else if (value.length > 100) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le prénom ne peut pas dépasser 100 caractères';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation du téléphone
    telephoneInput.addEventListener('input', function() {
        const value = this.value.trim();
        const errorDiv = this.parentElement.querySelector('.invalid-feedback');
        const phoneRegex = /^[0-9]{8}\$/;
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le téléphone est obligatoire';
        } else if (!phoneRegex.test(value)) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            errorDiv.textContent = '❌ Le téléphone doit contenir 8 chiffres';
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            errorDiv.textContent = '';
        }
    });
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!nomInput.value.trim()) {
            nomInput.classList.add('is-invalid');
            nomInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le nom est obligatoire';
            hasError = true;
        }
        
        if (!prenomInput.value.trim()) {
            prenomInput.classList.add('is-invalid');
            prenomInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le prénom est obligatoire';
            hasError = true;
        }
        
        const phoneRegex = /^[0-9]{8}\$/;
        if (!telephoneInput.value.trim()) {
            telephoneInput.classList.add('is-invalid');
            telephoneInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le téléphone est obligatoire';
            hasError = true;
        } else if (!phoneRegex.test(telephoneInput.value.trim())) {
            telephoneInput.classList.add('is-invalid');
            telephoneInput.parentElement.querySelector('.invalid-feedback').textContent = '❌ Le téléphone doit contenir 8 chiffres';
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
        }
    });
});
</script>
{% endblock %}", "admin_livraisons/livreur_form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_livraisons\\livreur_form.html.twig");
    }
}

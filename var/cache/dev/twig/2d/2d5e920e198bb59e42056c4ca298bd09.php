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

/* admin_formations/form.html.twig */
class __TwigTemplate_7bb4aded43b116da8a57e7736f106971 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_formations/form.html.twig"));

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
        transition: all 0.3s ease;
        width: 100%;
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
    
    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 97
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 98
        yield "<div class=\"admin-card\">
    <div class=\"form-container\">
        <div class=\"form-card\">
            <div class=\"form-header\">
                <h3>";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 102, $this->source); })()), "html", null, true);
        yield "</h3>
            </div>
            <div class=\"form-body\">
                <form method=\"post\" 
                      action=\"";
        // line 106
        if ((($tmp = (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 106, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 106, $this->source); })()), "idFormation", [], "any", false, false, false, 106)]), "html", null, true);
        } else {
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_create");
        }
        yield "\"
                      id=\"formationForm\"
                      novalidate>
                    
                    <!-- Titre -->
                    <div class=\"form-group\">
                        <label for=\"titre\">Titre de la formation <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"titre\" 
                               name=\"titre\" 
                               class=\"form-control\" 
                               value=\"";
        // line 117
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "titre", [], "any", true, true, false, 117)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 117, $this->source); })()), "titre", [], "any", false, false, false, 117), "html", null, true);
        } elseif ((($tmp = (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 117, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 117, $this->source); })()), "titre", [], "any", false, false, false, 117), "html", null, true);
        }
        yield "\"
                               placeholder=\"Ex: Cuisine tunisienne traditionnelle\"
                               required
                               minlength=\"5\"
                               maxlength=\"200\">
                        ";
        // line 122
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "titre", [], "any", true, true, false, 122)) {
            // line 123
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 123, $this->source); })()), "titre", [], "any", false, false, false, 123), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 125
            yield "                            <small class=\"help-text\">Entre 5 et 200 caractères</small>
                        ";
        }
        // line 127
        yield "                    </div>
                    
                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description <span class=\"required-star\">*</span></label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"5\"
                                  required
                                  minlength=\"20\">";
        // line 137
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "description", [], "any", true, true, false, 137)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 137, $this->source); })()), "description", [], "any", false, false, false, 137), "html", null, true);
        } elseif ((($tmp = (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 137, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 137, $this->source); })()), "description", [], "any", false, false, false, 137), "html", null, true);
        }
        yield "</textarea>
                        ";
        // line 138
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "description", [], "any", true, true, false, 138)) {
            // line 139
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 139, $this->source); })()), "description", [], "any", false, false, false, 139), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 141
            yield "                            <small class=\"help-text\">Minimum 20 caractères</small>
                        ";
        }
        // line 143
        yield "                    </div>
                    
                    <!-- Prix -->
                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"";
        // line 153
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "prix", [], "any", true, true, false, 153)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 153, $this->source); })()), "prix", [], "any", false, false, false, 153), "html", null, true);
        } elseif ((($tmp = (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 153, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 153, $this->source); })()), "prix", [], "any", false, false, false, 153), "html", null, true);
        }
        yield "\"
                               placeholder=\"0.00\"
                               required
                               min=\"0\">
                        ";
        // line 157
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 157)) {
            // line 158
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 158, $this->source); })()), "prix", [], "any", false, false, false, 158), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 160
            yield "                            <small class=\"help-text\">Prix en euros (gratuit = 0)</small>
                        ";
        }
        // line 162
        yield "                    </div>
                    
                    <!-- Statut -->
                    <div class=\"form-group\">
                        <label for=\"statut\">Statut</label>
                        <select id=\"statut\" name=\"statut\" class=\"form-select\">
                            <option value=\"en_cours\" ";
        // line 168
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut", [], "any", true, true, false, 168) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 168, $this->source); })()), "statut", [], "any", false, false, false, 168) == "en_cours")) || ((isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 168, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 168, $this->source); })()), "statut", [], "any", false, false, false, 168) == "en_cours")))) {
            yield "selected";
        }
        yield ">🟢 En cours</option>
                            <option value=\"termine\" ";
        // line 169
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut", [], "any", true, true, false, 169) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 169, $this->source); })()), "statut", [], "any", false, false, false, 169) == "termine")) || ((isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 169, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 169, $this->source); })()), "statut", [], "any", false, false, false, 169) == "termine")))) {
            yield "selected";
        }
        yield ">✅ Terminé</option>
                            <option value=\"annule\" ";
        // line 170
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut", [], "any", true, true, false, 170) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 170, $this->source); })()), "statut", [], "any", false, false, false, 170) == "annule")) || ((isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 170, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formation"]) || array_key_exists("formation", $context) ? $context["formation"] : (function () { throw new RuntimeError('Variable "formation" does not exist.', 170, $this->source); })()), "statut", [], "any", false, false, false, 170) == "annule")))) {
            yield "selected";
        }
        yield ">⚪ Annulé</option>
                        </select>
                    </div>
                    
                    <div class=\"d-flex justify-content-between mt-4\">
                        <a href=\"";
        // line 175
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_formations_index");
        yield "\" class=\"btn btn-secondary\">Annuler</a>
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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formationForm');
    const titreInput = document.getElementById('titre');
    const descriptionInput = document.getElementById('description');
    const prixInput = document.getElementById('prix');
    
    // Validation du titre
    titreInput.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 5) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length > 200) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation de la description
    descriptionInput.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 20) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation du prix
    prixInput.addEventListener('input', function() {
        const value = parseFloat(this.value);
        
        if (isNaN(value) || value < 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!titreInput.value.trim() || titreInput.value.trim().length < 5) {
            titreInput.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!descriptionInput.value.trim() || descriptionInput.value.trim().length < 20) {
            descriptionInput.classList.add('is-invalid');
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix < 0) {
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
        return "admin_formations/form.html.twig";
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
        return array (  346 => 175,  336 => 170,  330 => 169,  324 => 168,  316 => 162,  312 => 160,  306 => 158,  304 => 157,  293 => 153,  281 => 143,  277 => 141,  271 => 139,  269 => 138,  261 => 137,  249 => 127,  245 => 125,  239 => 123,  237 => 122,  225 => 117,  207 => 106,  200 => 102,  194 => 98,  184 => 97,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
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
        transition: all 0.3s ease;
        width: 100%;
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
    
    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
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
                      action=\"{% if formation %}{{ path('app_admin_formations_update', {id: formation.idFormation}) }}{% else %}{{ path('app_admin_formations_create') }}{% endif %}\"
                      id=\"formationForm\"
                      novalidate>
                    
                    <!-- Titre -->
                    <div class=\"form-group\">
                        <label for=\"titre\">Titre de la formation <span class=\"required-star\">*</span></label>
                        <input type=\"text\" 
                               id=\"titre\" 
                               name=\"titre\" 
                               class=\"form-control\" 
                               value=\"{% if formData.titre is defined %}{{ formData.titre }}{% elseif formation %}{{ formation.titre }}{% endif %}\"
                               placeholder=\"Ex: Cuisine tunisienne traditionnelle\"
                               required
                               minlength=\"5\"
                               maxlength=\"200\">
                        {% if errors.titre is defined %}
                            <div class=\"invalid-feedback\">{{ errors.titre }}</div>
                        {% else %}
                            <small class=\"help-text\">Entre 5 et 200 caractères</small>
                        {% endif %}
                    </div>
                    
                    <!-- Description -->
                    <div class=\"form-group\">
                        <label for=\"description\">Description <span class=\"required-star\">*</span></label>
                        <textarea id=\"description\" 
                                  name=\"description\" 
                                  class=\"form-control\" 
                                  rows=\"5\"
                                  required
                                  minlength=\"20\">{% if formData.description is defined %}{{ formData.description }}{% elseif formation %}{{ formation.description }}{% endif %}</textarea>
                        {% if errors.description is defined %}
                            <div class=\"invalid-feedback\">{{ errors.description }}</div>
                        {% else %}
                            <small class=\"help-text\">Minimum 20 caractères</small>
                        {% endif %}
                    </div>
                    
                    <!-- Prix -->
                    <div class=\"form-group\">
                        <label for=\"prix\">Prix (€) <span class=\"required-star\">*</span></label>
                        <input type=\"number\" 
                               step=\"0.01\" 
                               id=\"prix\" 
                               name=\"prix\" 
                               class=\"form-control\" 
                               value=\"{% if formData.prix is defined %}{{ formData.prix }}{% elseif formation %}{{ formation.prix }}{% endif %}\"
                               placeholder=\"0.00\"
                               required
                               min=\"0\">
                        {% if errors.prix is defined %}
                            <div class=\"invalid-feedback\">{{ errors.prix }}</div>
                        {% else %}
                            <small class=\"help-text\">Prix en euros (gratuit = 0)</small>
                        {% endif %}
                    </div>
                    
                    <!-- Statut -->
                    <div class=\"form-group\">
                        <label for=\"statut\">Statut</label>
                        <select id=\"statut\" name=\"statut\" class=\"form-select\">
                            <option value=\"en_cours\" {% if (formData.statut is defined and formData.statut == 'en_cours') or (formation and formation.statut == 'en_cours') %}selected{% endif %}>🟢 En cours</option>
                            <option value=\"termine\" {% if (formData.statut is defined and formData.statut == 'termine') or (formation and formation.statut == 'termine') %}selected{% endif %}>✅ Terminé</option>
                            <option value=\"annule\" {% if (formData.statut is defined and formData.statut == 'annule') or (formation and formation.statut == 'annule') %}selected{% endif %}>⚪ Annulé</option>
                        </select>
                    </div>
                    
                    <div class=\"d-flex justify-content-between mt-4\">
                        <a href=\"{{ path('app_admin_formations_index') }}\" class=\"btn btn-secondary\">Annuler</a>
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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formationForm');
    const titreInput = document.getElementById('titre');
    const descriptionInput = document.getElementById('description');
    const prixInput = document.getElementById('prix');
    
    // Validation du titre
    titreInput.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 5) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length > 200) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation de la description
    descriptionInput.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 20) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation du prix
    prixInput.addEventListener('input', function() {
        const value = parseFloat(this.value);
        
        if (isNaN(value) || value < 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation au submit
    form.addEventListener('submit', function(e) {
        let hasError = false;
        
        if (!titreInput.value.trim() || titreInput.value.trim().length < 5) {
            titreInput.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!descriptionInput.value.trim() || descriptionInput.value.trim().length < 20) {
            descriptionInput.classList.add('is-invalid');
            hasError = true;
        }
        
        const prix = parseFloat(prixInput.value);
        if (isNaN(prix) || prix < 0) {
            prixInput.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
        }
    });
});
</script>
{% endblock %}", "admin_formations/form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_formations\\form.html.twig");
    }
}

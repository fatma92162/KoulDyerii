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

/* admin_livraisons/livraison_form.html.twig */
class __TwigTemplate_c08eb1b8dd590bd6bd3693ad5fff3bf8 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_livraisons/livraison_form.html.twig"));

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
    
    .form-control, .form-select {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
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
    
    .form-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .form-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        padding: 20px 25px;
        color: white;
    }
    
    .form-body {
        padding: 25px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 80
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 81
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 83, $this->source); })()), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraisons_liste");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"row\">
        <div class=\"col-md-8 mx-auto\">
            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h4 class=\"mb-0\">
                        ";
        // line 94
        if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 94, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 95
            yield "                            <i class=\"fas fa-edit\"></i> Modifier la livraison
                        ";
        } else {
            // line 97
            yield "                            <i class=\"fas fa-plus\"></i> Nouvelle livraison
                        ";
        }
        // line 99
        yield "                    </h4>
                </div>
                <div class=\"form-body\">
                    <form method=\"post\" 
                          action=\"";
        // line 103
        if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 103, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 103, $this->source); })()), "idLivraison", [], "any", false, false, false, 103)]), "html", null, true);
        } else {
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraison_create");
        }
        yield "\"
                          id=\"livraisonForm\"
                          novalidate>
                        
                        <!-- Commande -->
                        <div class=\"form-group\">
                            <label for=\"id_commande\">Commande <span class=\"required-star\">*</span></label>
                            <select id=\"id_commande\" name=\"id_commande\" class=\"form-select\" ";
        // line 110
        if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 110, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "disabled";
        }
        yield ">
                                <option value=\"\">-- Sélectionner une commande --</option>
                                ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 112, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
            // line 113
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 113), "html", null, true);
            yield "\" 
                                    ";
            // line 114
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "id_commande", [], "any", true, true, false, 114) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 114, $this->source); })()), "id_commande", [], "any", false, false, false, 114) == CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 114)))) {
                yield "selected
                                    ";
            } elseif ((            // line 115
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 115, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 115, $this->source); })()), "idCommande", [], "any", false, false, false, 115) == CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 115)))) {
                yield "selected
                                    ";
            }
            // line 116
            yield ">
                                    Commande #";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "id", [], "any", false, false, false, 117), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "customerName", [], "any", false, false, false, 117), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "createdAt", [], "any", false, false, false, 117), "d/m/Y"), "html", null, true);
            yield "
                                </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commande'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        yield "                            </select>
                            ";
        // line 121
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "id_commande", [], "any", true, true, false, 121)) {
            // line 122
            yield "                                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 122, $this->source); })()), "id_commande", [], "any", false, false, false, 122), "html", null, true);
            yield "</div>
                            ";
        }
        // line 124
        yield "                            ";
        if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 124, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 125
            yield "                                <small class=\"help-text\">La commande ne peut pas être modifiée</small>
                            ";
        }
        // line 127
        yield "                        </div>
                        
                        <!-- Livreur -->
                        <div class=\"form-group\">
                            <label for=\"id_livreur\">Livreur <span class=\"required-star\">*</span></label>
                            <select id=\"id_livreur\" name=\"id_livreur\" class=\"form-select\" required>
                                <option value=\"\">-- Sélectionner un livreur --</option>
                                ";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livreurs"]) || array_key_exists("livreurs", $context) ? $context["livreurs"] : (function () { throw new RuntimeError('Variable "livreurs" does not exist.', 134, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["livreur"]) {
            // line 135
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 135), "html", null, true);
            yield "\" 
                                    ";
            // line 136
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "id_livreur", [], "any", true, true, false, 136) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 136, $this->source); })()), "id_livreur", [], "any", false, false, false, 136) == CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 136)))) {
                yield "selected
                                    ";
            } elseif ((            // line 137
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 137, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 137, $this->source); })()), "idLivreur", [], "any", false, false, false, 137) == CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "idLivreur", [], "any", false, false, false, 137)))) {
                yield "selected
                                    ";
            }
            // line 138
            yield ">
                                    ";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "prenom", [], "any", false, false, false, 139), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "nom", [], "any", false, false, false, 139), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "telephone", [], "any", false, false, false, 139), "html", null, true);
            yield " 
                                    ";
            // line 140
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livreur"], "disponibilite", [], "any", false, false, false, 140)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "(Disponible)";
            } else {
                yield "(Indisponible)";
            }
            // line 141
            yield "                                </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livreur'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        yield "                            </select>
                            ";
        // line 144
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "id_livreur", [], "any", true, true, false, 144)) {
            // line 145
            yield "                                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 145, $this->source); })()), "id_livreur", [], "any", false, false, false, 145), "html", null, true);
            yield "</div>
                            ";
        }
        // line 147
        yield "                        </div>
                        
                        <!-- Adresse -->
                        <div class=\"form-group\">
                            <label for=\"adresse\">Adresse de livraison <span class=\"required-star\">*</span></label>
                            <textarea id=\"adresse\" 
                                      name=\"adresse\" 
                                      class=\"form-control\" 
                                      rows=\"3\" 
                                      required
                                      minlength=\"5\"
                                      maxlength=\"500\">";
        // line 158
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "adresse", [], "any", true, true, false, 158)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 158, $this->source); })()), "adresse", [], "any", false, false, false, 158), "html", null, true);
        } elseif ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 158, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 158, $this->source); })()), "adresse", [], "any", false, false, false, 158), "html", null, true);
        }
        yield "</textarea>
                            ";
        // line 159
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresse", [], "any", true, true, false, 159)) {
            // line 160
            yield "                                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 160, $this->source); })()), "adresse", [], "any", false, false, false, 160), "html", null, true);
            yield "</div>
                            ";
        } else {
            // line 162
            yield "                                <small class=\"help-text\">Entre 5 et 500 caractères</small>
                            ";
        }
        // line 164
        yield "                        </div>
                        
                        <!-- Statut -->
                        <div class=\"form-group\">
                            <label for=\"statut_livraison\">Statut <span class=\"required-star\">*</span></label>
                            <select id=\"statut_livraison\" name=\"statut_livraison\" class=\"form-select\" required>
                                <option value=\"en_cours\" ";
        // line 170
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut_livraison", [], "any", true, true, false, 170) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 170, $this->source); })()), "statut_livraison", [], "any", false, false, false, 170) == "en_cours")) || ((isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 170, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 170, $this->source); })()), "statutLivraison", [], "any", false, false, false, 170) == "en_cours")))) {
            yield "selected";
        }
        yield ">
                                    🚚 En cours
                                </option>
                                <option value=\"livree\" ";
        // line 173
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut_livraison", [], "any", true, true, false, 173) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 173, $this->source); })()), "statut_livraison", [], "any", false, false, false, 173) == "livree")) || ((isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 173, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 173, $this->source); })()), "statutLivraison", [], "any", false, false, false, 173) == "livree")))) {
            yield "selected";
        }
        yield ">
                                    ✅ Livrée
                                </option>
                                <option value=\"annulee\" ";
        // line 176
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "statut_livraison", [], "any", true, true, false, 176) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 176, $this->source); })()), "statut_livraison", [], "any", false, false, false, 176) == "annulee")) || ((isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 176, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 176, $this->source); })()), "statutLivraison", [], "any", false, false, false, 176) == "annulee")))) {
            yield "selected";
        }
        yield ">
                                    ❌ Annulée
                                </option>
                            </select>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer
                            </button>
                            <a href=\"";
        // line 186
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_livraisons_liste");
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
    const form = document.getElementById('livraisonForm');
    const commandeSelect = document.getElementById('id_commande');
    const livreurSelect = document.getElementById('id_livreur');
    const adresseTextarea = document.getElementById('adresse');
    
    // Validation de la commande (si non désactivé)
    if (commandeSelect && !commandeSelect.disabled) {
        commandeSelect.addEventListener('change', function() {
            if (this.value === '') {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation du livreur
    livreurSelect.addEventListener('change', function() {
        if (this.value === '') {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation de l'adresse
    adresseTextarea.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 5) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length > 500) {
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
        
        if (commandeSelect && !commandeSelect.disabled && !commandeSelect.value) {
            commandeSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!livreurSelect.value) {
            livreurSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!adresseTextarea.value.trim()) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        } else if (adresseTextarea.value.trim().length < 5) {
            adresseTextarea.classList.add('is-invalid');
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
        return "admin_livraisons/livraison_form.html.twig";
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
        return array (  421 => 186,  406 => 176,  398 => 173,  390 => 170,  382 => 164,  378 => 162,  372 => 160,  370 => 159,  362 => 158,  349 => 147,  343 => 145,  341 => 144,  338 => 143,  331 => 141,  325 => 140,  317 => 139,  314 => 138,  309 => 137,  305 => 136,  300 => 135,  296 => 134,  287 => 127,  283 => 125,  280 => 124,  274 => 122,  272 => 121,  269 => 120,  256 => 117,  253 => 116,  248 => 115,  244 => 114,  239 => 113,  235 => 112,  228 => 110,  214 => 103,  208 => 99,  204 => 97,  200 => 95,  198 => 94,  185 => 84,  181 => 83,  177 => 81,  167 => 80,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
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
    
    .form-control, .form-select {
        border: 2px solid #E8D5B7;
        border-radius: 12px;
        padding: 12px 16px;
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
    
    .form-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .form-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        padding: 20px 25px;
        color: white;
    }
    
    .form-body {
        padding: 25px;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>{{ titre }}</h3>
        <a href=\"{{ path('app_admin_livraisons_liste') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"row\">
        <div class=\"col-md-8 mx-auto\">
            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h4 class=\"mb-0\">
                        {% if livraison %}
                            <i class=\"fas fa-edit\"></i> Modifier la livraison
                        {% else %}
                            <i class=\"fas fa-plus\"></i> Nouvelle livraison
                        {% endif %}
                    </h4>
                </div>
                <div class=\"form-body\">
                    <form method=\"post\" 
                          action=\"{% if livraison %}{{ path('app_admin_livraison_update', {id: livraison.idLivraison}) }}{% else %}{{ path('app_admin_livraison_create') }}{% endif %}\"
                          id=\"livraisonForm\"
                          novalidate>
                        
                        <!-- Commande -->
                        <div class=\"form-group\">
                            <label for=\"id_commande\">Commande <span class=\"required-star\">*</span></label>
                            <select id=\"id_commande\" name=\"id_commande\" class=\"form-select\" {% if livraison %}disabled{% endif %}>
                                <option value=\"\">-- Sélectionner une commande --</option>
                                {% for commande in commandes %}
                                <option value=\"{{ commande.id }}\" 
                                    {% if formData.id_commande is defined and formData.id_commande == commande.id %}selected
                                    {% elseif livraison and livraison.idCommande == commande.id %}selected
                                    {% endif %}>
                                    Commande #{{ commande.id }} - {{ commande.customerName }} - {{ commande.createdAt|date('d/m/Y') }}
                                </option>
                                {% endfor %}
                            </select>
                            {% if errors.id_commande is defined %}
                                <div class=\"invalid-feedback d-block\">{{ errors.id_commande }}</div>
                            {% endif %}
                            {% if livraison %}
                                <small class=\"help-text\">La commande ne peut pas être modifiée</small>
                            {% endif %}
                        </div>
                        
                        <!-- Livreur -->
                        <div class=\"form-group\">
                            <label for=\"id_livreur\">Livreur <span class=\"required-star\">*</span></label>
                            <select id=\"id_livreur\" name=\"id_livreur\" class=\"form-select\" required>
                                <option value=\"\">-- Sélectionner un livreur --</option>
                                {% for livreur in livreurs %}
                                <option value=\"{{ livreur.idLivreur }}\" 
                                    {% if formData.id_livreur is defined and formData.id_livreur == livreur.idLivreur %}selected
                                    {% elseif livraison and livraison.idLivreur == livreur.idLivreur %}selected
                                    {% endif %}>
                                    {{ livreur.prenom }} {{ livreur.nom }} - {{ livreur.telephone }} 
                                    {% if livreur.disponibilite %}(Disponible){% else %}(Indisponible){% endif %}
                                </option>
                                {% endfor %}
                            </select>
                            {% if errors.id_livreur is defined %}
                                <div class=\"invalid-feedback d-block\">{{ errors.id_livreur }}</div>
                            {% endif %}
                        </div>
                        
                        <!-- Adresse -->
                        <div class=\"form-group\">
                            <label for=\"adresse\">Adresse de livraison <span class=\"required-star\">*</span></label>
                            <textarea id=\"adresse\" 
                                      name=\"adresse\" 
                                      class=\"form-control\" 
                                      rows=\"3\" 
                                      required
                                      minlength=\"5\"
                                      maxlength=\"500\">{% if formData.adresse is defined %}{{ formData.adresse }}{% elseif livraison %}{{ livraison.adresse }}{% endif %}</textarea>
                            {% if errors.adresse is defined %}
                                <div class=\"invalid-feedback d-block\">{{ errors.adresse }}</div>
                            {% else %}
                                <small class=\"help-text\">Entre 5 et 500 caractères</small>
                            {% endif %}
                        </div>
                        
                        <!-- Statut -->
                        <div class=\"form-group\">
                            <label for=\"statut_livraison\">Statut <span class=\"required-star\">*</span></label>
                            <select id=\"statut_livraison\" name=\"statut_livraison\" class=\"form-select\" required>
                                <option value=\"en_cours\" {% if (formData.statut_livraison is defined and formData.statut_livraison == 'en_cours') or (livraison and livraison.statutLivraison == 'en_cours') %}selected{% endif %}>
                                    🚚 En cours
                                </option>
                                <option value=\"livree\" {% if (formData.statut_livraison is defined and formData.statut_livraison == 'livree') or (livraison and livraison.statutLivraison == 'livree') %}selected{% endif %}>
                                    ✅ Livrée
                                </option>
                                <option value=\"annulee\" {% if (formData.statut_livraison is defined and formData.statut_livraison == 'annulee') or (livraison and livraison.statutLivraison == 'annulee') %}selected{% endif %}>
                                    ❌ Annulée
                                </option>
                            </select>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> Enregistrer
                            </button>
                            <a href=\"{{ path('app_admin_livraisons_liste') }}\" class=\"btn btn-secondary\">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('livraisonForm');
    const commandeSelect = document.getElementById('id_commande');
    const livreurSelect = document.getElementById('id_livreur');
    const adresseTextarea = document.getElementById('adresse');
    
    // Validation de la commande (si non désactivé)
    if (commandeSelect && !commandeSelect.disabled) {
        commandeSelect.addEventListener('change', function() {
            if (this.value === '') {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    }
    
    // Validation du livreur
    livreurSelect.addEventListener('change', function() {
        if (this.value === '') {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation de l'adresse
    adresseTextarea.addEventListener('input', function() {
        const value = this.value.trim();
        
        if (value.length === 0) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length < 5) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (value.length > 500) {
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
        
        if (commandeSelect && !commandeSelect.disabled && !commandeSelect.value) {
            commandeSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!livreurSelect.value) {
            livreurSelect.classList.add('is-invalid');
            hasError = true;
        }
        
        if (!adresseTextarea.value.trim()) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        } else if (adresseTextarea.value.trim().length < 5) {
            adresseTextarea.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
        }
    });
});
</script>
{% endblock %}", "admin_livraisons/livraison_form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_livraisons\\livraison_form.html.twig");
    }
}

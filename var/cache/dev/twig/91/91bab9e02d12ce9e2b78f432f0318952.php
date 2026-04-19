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

/* utilisateur/form_admin.html.twig */
class __TwigTemplate_c6ccfb9e937352b2c188f605771a6e77 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/form_admin.html.twig"));

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
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 6
        yield "<div class=\"admin-card\">
    <h3>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 7, $this->source); })()), "html", null, true);
        yield "</h3>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "flashes", ["success"], "method", false, false, false, 9));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 10
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", ["error"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        yield "
    <form method=\"post\" enctype=\"multipart/form-data\" id=\"userForm\" novalidate
          action=\"";
        // line 17
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 17, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 17, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 17)]), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_create")));
        yield "\">

        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <label>Nom <span style=\"color:red\">*</span></label>
                <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control\"
                       value=\"";
        // line 23
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 23, $this->source); })()), "nom", [], "any", false, false, false, 23), "html", null, true)) : (""));
        yield "\">
                <div class=\"invalid-feedback\" id=\"err-nom\"></div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <label>Email <span style=\"color:red\">*</span></label>
                <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control\"
                       value=\"";
        // line 29
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 29, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 29, $this->source); })()), "email", [], "any", false, false, false, 29), "html", null, true)) : (""));
        yield "\">
                <div class=\"invalid-feedback\" id=\"err-email\"></div>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <label>Mot de passe ";
        // line 36
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 36, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("(laisser vide pour ne pas changer)") : ("*"));
        yield "</label>
                <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control\" placeholder=\"••••••••\">
                <div class=\"invalid-feedback\" id=\"err-motDePasse\"></div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <label>Confirmer le mot de passe</label>
                <input type=\"password\" name=\"confirm_password\" id=\"confirm_password\" class=\"form-control\" placeholder=\"••••••••\">
                <div class=\"invalid-feedback\" id=\"err-confirm\"></div>
            </div>
        </div>

        <div class=\"mb-3\">
            <label>Région <span style=\"color:red\">*</span></label>
            <select name=\"region\" id=\"region\" class=\"form-control\">
                <option value=\"\">Sélectionnez</option>
                ";
        // line 51
        $context["regions"] = ["Tunis", "Ariana", "Ben Arous", "Manouba", "Nabeul", "Zaghouan", "Bizerte", "Béja", "Jendouba", "Le Kef", "Siliana", "Sousse", "Monastir", "Mahdia", "Sfax", "Kairouan", "Kasserine", "Sidi Bouzid", "Gabès", "Médenine", "Tataouine", "Gafsa", "Tozeur", "Kébili"];
        // line 52
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["regions"]) || array_key_exists("regions", $context) ? $context["regions"] : (function () { throw new RuntimeError('Variable "regions" does not exist.', 52, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 53
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["r"], "html", null, true);
            yield "\" ";
            yield ((((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 53, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 53, $this->source); })()), "region", [], "any", false, false, false, 53) == $context["r"]))) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["r"], "html", null, true);
            yield "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        yield "            </select>
            <div class=\"invalid-feedback\" id=\"err-region\"></div>
        </div>

        <div class=\"mb-3\">
            <label>Date de naissance <span style=\"color:red\">*</span></label>
            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control\"
                   value=\"";
        // line 62
        yield ((((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 62, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 62, $this->source); })()), "dateNaissance", [], "any", false, false, false, 62))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 62, $this->source); })()), "dateNaissance", [], "any", false, false, false, 62), "Y-m-d"), "html", null, true)) : (""));
        yield "\">
            <div class=\"invalid-feedback\" id=\"err-date\"></div>
        </div>

        ";
        // line 67
        yield "        <div class=\"mb-3\">
            <label>Photo / Avatar</label>
            
            ";
        // line 71
        yield "            <div class=\"avatar-preview\" id=\"avatarPreviewContainer\" style=\"width: 100px; height: 100px; border-radius: 50%; overflow: hidden; margin-bottom: 15px;\">
                ";
        // line 72
        if (((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 72, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 72, $this->source); })()), "photo", [], "any", false, false, false, 72))) {
            // line 73
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 73, $this->source); })()), "photo", [], "any", false, false, false, 73), "html", null, true);
            yield "\" id=\"avatarPreviewImg\" style=\"width: 100%; height: 100%; object-fit: cover;\">
                ";
        } else {
            // line 75
            yield "                    <img src=\"https://ui-avatars.com/api/?name=";
            yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 75, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 75, $this->source); })()), "nom", [], "any", false, false, false, 75)), "html", null, true)) : ("User"));
            yield "&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\" id=\"avatarPreviewImg\" style=\"width: 100%; height: 100%;\">
                ";
        }
        // line 77
        yield "            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label class=\"small text-muted\">📁 Télécharger une photo</label>
                    <input type=\"file\" name=\"photo\" id=\"photo\" class=\"form-control\" accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                    <div class=\"invalid-feedback\" id=\"err-photo\"></div>
                    <div class=\"photo-preview\" id=\"photo-preview\" style=\"display: none; margin-top: 10px;\">
                        <img id=\"photo-thumb\" src=\"#\" style=\"width: 60px; height: 60px; border-radius: 50%; object-fit: cover;\">
                        <p id=\"photo-info\" style=\"font-size: 12px; margin-top: 5px;\"></p>
                    </div>
                    <small class=\"text-muted\">Formats acceptés : JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                </div>
                <div class=\"col-md-6\">
                    <label class=\"small text-muted\">🎨 Choisir un avatar</label>
                    <button type=\"button\" class=\"btn btn-outline-secondary w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                        🎨 Choisir un avatar
                    </button>
                </div>
            </div>
            <input type=\"hidden\" name=\"avatar_url\" id=\"avatarUrlInput\" value=\"";
        // line 97
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "photo", [], "any", true, true, false, 97) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 97, $this->source); })()), "photo", [], "any", false, false, false, 97)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 97, $this->source); })()), "photo", [], "any", false, false, false, 97), "html", null, true)) : (""));
        yield "\">
        </div>

        <button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>
        <a href=\"";
        // line 101
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_liste");
        yield "\" class=\"btn btn-secondary\">Annuler</a>
    </form>
</div>

";
        // line 106
        yield "<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Choisissez votre avatar</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\" id=\"avatar-list\">
                    <div class=\"text-center\">Chargement...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }
    .photo-preview img {
        border: 2px solid #28a745;
    }
</style>

<script>
const isEdit = ";
        // line 145
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 145, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
        yield ";

// Fonctions existantes de validation (inchangées)
function showError(fieldId, errId, message) {
    const field = document.getElementById(fieldId);
    const err   = document.getElementById(errId);
    if (field) field.classList.add('is-invalid');
    if (err)   err.textContent = message;
}

function clearError(fieldId, errId) {
    const field = document.getElementById(fieldId);
    const err   = document.getElementById(errId);
    if (field) field.classList.remove('is-invalid');
    if (err)   err.textContent = '';
}

function clearAllErrors() {
    ['nom','email','motDePasse','confirm_password','region','dateNaissance','photo'].forEach(id => {
        const field = document.getElementById(id);
        if (field) field.classList.remove('is-invalid');
    });
    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
}

function validateForm(e) {
    e.preventDefault();
    clearAllErrors();

    let valid = true;

    // Nom
    const nom = document.getElementById('nom').value.trim();
    if (!nom) {
        showError('nom', 'err-nom', 'Le nom est obligatoire.');
        valid = false;
    } else if (nom.length < 2) {
        showError('nom', 'err-nom', 'Le nom doit contenir au moins 2 caractères.');
        valid = false;
    } else if (!/^[a-zA-ZÀ-ÿ\\s\\-']+\$/.test(nom)) {
        showError('nom', 'err-nom', 'Le nom ne doit contenir que des lettres.');
        valid = false;
    }

    // Email
    const email = document.getElementById('email').value.trim();
    if (!email) {
        showError('email', 'err-email', 'L\\'email est obligatoire.');
        valid = false;
    } else if (!/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/.test(email)) {
        showError('email', 'err-email', 'L\\'email n\\'est pas valide (ex: nom@domaine.com).');
        valid = false;
    }

    // Mot de passe
    const mdp     = document.getElementById('motDePasse').value;
    const confirm = document.getElementById('confirm_password').value;

    if (!isEdit && !mdp) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe est obligatoire.');
        valid = false;
    } else if (mdp && mdp.length < 6) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe doit contenir au moins 6 caractères.');
        valid = false;
    } else if (mdp && !/(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)/.test(mdp)) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe doit contenir une majuscule, une minuscule et un chiffre.');
        valid = false;
    }

    if (mdp && mdp !== confirm) {
        showError('confirm_password', 'err-confirm', 'Les mots de passe ne correspondent pas.');
        valid = false;
    }

    // Région
    const region = document.getElementById('region').value;
    if (!region) {
        showError('region', 'err-region', 'Veuillez sélectionner une région.');
        valid = false;
    }

    // Date de naissance
    const date = document.getElementById('dateNaissance').value;
    if (!date) {
        showError('dateNaissance', 'err-date', 'La date de naissance est obligatoire.');
        valid = false;
    } else {
        const today    = new Date();
        const birthday = new Date(date);
        let age = today.getFullYear() - birthday.getFullYear();
        const m = today.getMonth() - birthday.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) age--;
        if (age < 13) {
            showError('dateNaissance', 'err-date', 'L\\'utilisateur doit avoir au moins 13 ans.');
            valid = false;
        } else if (age > 100) {
            showError('dateNaissance', 'err-date', 'La date de naissance n\\'est pas valide.');
            valid = false;
        }
    }

    // Photo / Avatar : on vérifie uniquement si un fichier est sélectionné
    const photo = document.getElementById('photo');
    if (photo.files.length > 0) {
        const file    = photo.files[0];
        const maxSize = 2 * 1024 * 1024;
        const allowed = ['image/jpeg','image/png','image/jpg','image/gif','image/webp'];
        if (!allowed.includes(file.type)) {
            showError('photo', 'err-photo', 'Format non accepté. Utilisez JPG, PNG, GIF ou WEBP.');
            valid = false;
        } else if (file.size > maxSize) {
            showError('photo', 'err-photo', 'La photo ne doit pas dépasser 2 Mo.');
            valid = false;
        }
    }

    if (valid) {
        document.getElementById('userForm').submit();
    }
}

document.getElementById('userForm').addEventListener('submit', validateForm);

// Nettoyage des erreurs à la saisie
document.getElementById('nom').addEventListener('input', () => clearError('nom', 'err-nom'));
document.getElementById('email').addEventListener('input', () => clearError('email', 'err-email'));
document.getElementById('motDePasse').addEventListener('input', () => clearError('motDePasse', 'err-motDePasse'));
document.getElementById('confirm_password').addEventListener('input', () => clearError('confirm_password', 'err-confirm'));
document.getElementById('region').addEventListener('change', () => clearError('region', 'err-region'));
document.getElementById('dateNaissance').addEventListener('change', () => clearError('dateNaissance', 'err-date'));
document.getElementById('photo').addEventListener('change', () => clearError('photo', 'err-photo'));

// ========== GESTION DES AVATARS (modale DiceBear) ==========
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreviewImg = document.getElementById('avatarPreviewImg');
    const avatarUrlInput = document.getElementById('avatarUrlInput');
    const photoField = document.getElementById('photo');
    const photoPreviewDiv = document.getElementById('photo-preview');
    const photoThumb = document.getElementById('photo-thumb');
    const photoInfo = document.getElementById('photo-info');

    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
        if (!avatarList) return;
        avatarList.innerHTML = '';
        styles.forEach(style => {
            for (let i = 0; i < 6; i++) {
                const seed = Math.random().toString(36).substring(7);
                const url = `https://api.dicebear.com/9.x/\${style}/svg?seed=\${seed}&size=80`;
                const col = document.createElement('div');
                col.className = 'col-2 mb-3 text-center';
                col.innerHTML = `<img src=\"\${url}\" style=\"width: 70px; height: 70px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;\" class=\"avatar-option\" data-url=\"\${url}\">`;
                avatarList.appendChild(col);
            }
        });
    }

    loadAvatars();

    // Sélection d'un avatar
    if (avatarList) {
        avatarList.addEventListener('click', (e) => {
            const img = e.target.closest('.avatar-option');
            if (img) {
                const url = img.getAttribute('data-url');
                // Mettre à jour l'aperçu principal
                if (avatarPreviewImg) avatarPreviewImg.src = url;
                // Stocker l'URL dans le champ caché
                avatarUrlInput.value = url;
                // Vider l'input file pour éviter la confusion
                if (photoField) photoField.value = '';
                // Cacher l'aperçu de la photo uploadée
                if (photoPreviewDiv) photoPreviewDiv.style.display = 'none';
                // Fermer la modale
                const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
                if (modal) modal.hide();
                // Nettoyer l'erreur éventuelle sur le champ photo
                clearError('photo', 'err-photo');
            }
        });
    }

    // Aperçu photo uploadée
    if (photoField) {
        photoField.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (photoThumb) photoThumb.src = e.target.result;
                    if (photoInfo) photoInfo.textContent = file.name + ' — ' + (file.size / 1024).toFixed(0) + ' Ko';
                    if (photoPreviewDiv) photoPreviewDiv.style.display = 'block';
                    // On efface l'avatar précédent (priorité à la photo)
                    avatarUrlInput.value = '';
                    if (avatarPreviewImg) avatarPreviewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                if (photoPreviewDiv) photoPreviewDiv.style.display = 'none';
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
        return "utilisateur/form_admin.html.twig";
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
        return array (  305 => 145,  264 => 106,  257 => 101,  250 => 97,  228 => 77,  222 => 75,  216 => 73,  214 => 72,  211 => 71,  206 => 67,  199 => 62,  190 => 55,  177 => 53,  172 => 52,  170 => 51,  152 => 36,  142 => 29,  133 => 23,  124 => 17,  120 => 15,  111 => 13,  106 => 12,  97 => 10,  93 => 9,  88 => 7,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}{{ titre }}{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <h3>{{ titre }}</h3>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <form method=\"post\" enctype=\"multipart/form-data\" id=\"userForm\" novalidate
          action=\"{{ utilisateur ? path('app_utilisateur_editer', {id: utilisateur.idUtilisateur}) : path('app_utilisateur_create') }}\">

        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <label>Nom <span style=\"color:red\">*</span></label>
                <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control\"
                       value=\"{{ utilisateur ? utilisateur.nom : '' }}\">
                <div class=\"invalid-feedback\" id=\"err-nom\"></div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <label>Email <span style=\"color:red\">*</span></label>
                <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control\"
                       value=\"{{ utilisateur ? utilisateur.email : '' }}\">
                <div class=\"invalid-feedback\" id=\"err-email\"></div>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <label>Mot de passe {{ utilisateur ? '(laisser vide pour ne pas changer)' : '*' }}</label>
                <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control\" placeholder=\"••••••••\">
                <div class=\"invalid-feedback\" id=\"err-motDePasse\"></div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <label>Confirmer le mot de passe</label>
                <input type=\"password\" name=\"confirm_password\" id=\"confirm_password\" class=\"form-control\" placeholder=\"••••••••\">
                <div class=\"invalid-feedback\" id=\"err-confirm\"></div>
            </div>
        </div>

        <div class=\"mb-3\">
            <label>Région <span style=\"color:red\">*</span></label>
            <select name=\"region\" id=\"region\" class=\"form-control\">
                <option value=\"\">Sélectionnez</option>
                {% set regions = ['Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan', 'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse', 'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid', 'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'] %}
                {% for r in regions %}
                    <option value=\"{{ r }}\" {{ utilisateur and utilisateur.region == r ? 'selected' : '' }}>{{ r }}</option>
                {% endfor %}
            </select>
            <div class=\"invalid-feedback\" id=\"err-region\"></div>
        </div>

        <div class=\"mb-3\">
            <label>Date de naissance <span style=\"color:red\">*</span></label>
            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control\"
                   value=\"{{ utilisateur and utilisateur.dateNaissance ? utilisateur.dateNaissance|date('Y-m-d') : '' }}\">
            <div class=\"invalid-feedback\" id=\"err-date\"></div>
        </div>

        {# ===== SECTION PHOTO / AVATAR (avec les deux options) ===== #}
        <div class=\"mb-3\">
            <label>Photo / Avatar</label>
            
            {# Aperçu commun #}
            <div class=\"avatar-preview\" id=\"avatarPreviewContainer\" style=\"width: 100px; height: 100px; border-radius: 50%; overflow: hidden; margin-bottom: 15px;\">
                {% if utilisateur and utilisateur.photo %}
                    <img src=\"{{ utilisateur.photo }}\" id=\"avatarPreviewImg\" style=\"width: 100%; height: 100%; object-fit: cover;\">
                {% else %}
                    <img src=\"https://ui-avatars.com/api/?name={{ utilisateur ? utilisateur.nom|url_encode : 'User' }}&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\" id=\"avatarPreviewImg\" style=\"width: 100%; height: 100%;\">
                {% endif %}
            </div>

            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label class=\"small text-muted\">📁 Télécharger une photo</label>
                    <input type=\"file\" name=\"photo\" id=\"photo\" class=\"form-control\" accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                    <div class=\"invalid-feedback\" id=\"err-photo\"></div>
                    <div class=\"photo-preview\" id=\"photo-preview\" style=\"display: none; margin-top: 10px;\">
                        <img id=\"photo-thumb\" src=\"#\" style=\"width: 60px; height: 60px; border-radius: 50%; object-fit: cover;\">
                        <p id=\"photo-info\" style=\"font-size: 12px; margin-top: 5px;\"></p>
                    </div>
                    <small class=\"text-muted\">Formats acceptés : JPG, PNG, GIF, WEBP (Max 2 Mo)</small>
                </div>
                <div class=\"col-md-6\">
                    <label class=\"small text-muted\">🎨 Choisir un avatar</label>
                    <button type=\"button\" class=\"btn btn-outline-secondary w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                        🎨 Choisir un avatar
                    </button>
                </div>
            </div>
            <input type=\"hidden\" name=\"avatar_url\" id=\"avatarUrlInput\" value=\"{{ utilisateur.photo ?? '' }}\">
        </div>

        <button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>
        <a href=\"{{ path('app_utilisateur_liste') }}\" class=\"btn btn-secondary\">Annuler</a>
    </form>
</div>

{# MODALE DE SÉLECTION D'AVATARS #}
<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Choisissez votre avatar</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\" id=\"avatar-list\">
                    <div class=\"text-center\">Chargement...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }
    .photo-preview img {
        border: 2px solid #28a745;
    }
</style>

<script>
const isEdit = {{ utilisateur ? 'true' : 'false' }};

// Fonctions existantes de validation (inchangées)
function showError(fieldId, errId, message) {
    const field = document.getElementById(fieldId);
    const err   = document.getElementById(errId);
    if (field) field.classList.add('is-invalid');
    if (err)   err.textContent = message;
}

function clearError(fieldId, errId) {
    const field = document.getElementById(fieldId);
    const err   = document.getElementById(errId);
    if (field) field.classList.remove('is-invalid');
    if (err)   err.textContent = '';
}

function clearAllErrors() {
    ['nom','email','motDePasse','confirm_password','region','dateNaissance','photo'].forEach(id => {
        const field = document.getElementById(id);
        if (field) field.classList.remove('is-invalid');
    });
    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
}

function validateForm(e) {
    e.preventDefault();
    clearAllErrors();

    let valid = true;

    // Nom
    const nom = document.getElementById('nom').value.trim();
    if (!nom) {
        showError('nom', 'err-nom', 'Le nom est obligatoire.');
        valid = false;
    } else if (nom.length < 2) {
        showError('nom', 'err-nom', 'Le nom doit contenir au moins 2 caractères.');
        valid = false;
    } else if (!/^[a-zA-ZÀ-ÿ\\s\\-']+\$/.test(nom)) {
        showError('nom', 'err-nom', 'Le nom ne doit contenir que des lettres.');
        valid = false;
    }

    // Email
    const email = document.getElementById('email').value.trim();
    if (!email) {
        showError('email', 'err-email', 'L\\'email est obligatoire.');
        valid = false;
    } else if (!/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/.test(email)) {
        showError('email', 'err-email', 'L\\'email n\\'est pas valide (ex: nom@domaine.com).');
        valid = false;
    }

    // Mot de passe
    const mdp     = document.getElementById('motDePasse').value;
    const confirm = document.getElementById('confirm_password').value;

    if (!isEdit && !mdp) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe est obligatoire.');
        valid = false;
    } else if (mdp && mdp.length < 6) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe doit contenir au moins 6 caractères.');
        valid = false;
    } else if (mdp && !/(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)/.test(mdp)) {
        showError('motDePasse', 'err-motDePasse', 'Le mot de passe doit contenir une majuscule, une minuscule et un chiffre.');
        valid = false;
    }

    if (mdp && mdp !== confirm) {
        showError('confirm_password', 'err-confirm', 'Les mots de passe ne correspondent pas.');
        valid = false;
    }

    // Région
    const region = document.getElementById('region').value;
    if (!region) {
        showError('region', 'err-region', 'Veuillez sélectionner une région.');
        valid = false;
    }

    // Date de naissance
    const date = document.getElementById('dateNaissance').value;
    if (!date) {
        showError('dateNaissance', 'err-date', 'La date de naissance est obligatoire.');
        valid = false;
    } else {
        const today    = new Date();
        const birthday = new Date(date);
        let age = today.getFullYear() - birthday.getFullYear();
        const m = today.getMonth() - birthday.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) age--;
        if (age < 13) {
            showError('dateNaissance', 'err-date', 'L\\'utilisateur doit avoir au moins 13 ans.');
            valid = false;
        } else if (age > 100) {
            showError('dateNaissance', 'err-date', 'La date de naissance n\\'est pas valide.');
            valid = false;
        }
    }

    // Photo / Avatar : on vérifie uniquement si un fichier est sélectionné
    const photo = document.getElementById('photo');
    if (photo.files.length > 0) {
        const file    = photo.files[0];
        const maxSize = 2 * 1024 * 1024;
        const allowed = ['image/jpeg','image/png','image/jpg','image/gif','image/webp'];
        if (!allowed.includes(file.type)) {
            showError('photo', 'err-photo', 'Format non accepté. Utilisez JPG, PNG, GIF ou WEBP.');
            valid = false;
        } else if (file.size > maxSize) {
            showError('photo', 'err-photo', 'La photo ne doit pas dépasser 2 Mo.');
            valid = false;
        }
    }

    if (valid) {
        document.getElementById('userForm').submit();
    }
}

document.getElementById('userForm').addEventListener('submit', validateForm);

// Nettoyage des erreurs à la saisie
document.getElementById('nom').addEventListener('input', () => clearError('nom', 'err-nom'));
document.getElementById('email').addEventListener('input', () => clearError('email', 'err-email'));
document.getElementById('motDePasse').addEventListener('input', () => clearError('motDePasse', 'err-motDePasse'));
document.getElementById('confirm_password').addEventListener('input', () => clearError('confirm_password', 'err-confirm'));
document.getElementById('region').addEventListener('change', () => clearError('region', 'err-region'));
document.getElementById('dateNaissance').addEventListener('change', () => clearError('dateNaissance', 'err-date'));
document.getElementById('photo').addEventListener('change', () => clearError('photo', 'err-photo'));

// ========== GESTION DES AVATARS (modale DiceBear) ==========
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreviewImg = document.getElementById('avatarPreviewImg');
    const avatarUrlInput = document.getElementById('avatarUrlInput');
    const photoField = document.getElementById('photo');
    const photoPreviewDiv = document.getElementById('photo-preview');
    const photoThumb = document.getElementById('photo-thumb');
    const photoInfo = document.getElementById('photo-info');

    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
        if (!avatarList) return;
        avatarList.innerHTML = '';
        styles.forEach(style => {
            for (let i = 0; i < 6; i++) {
                const seed = Math.random().toString(36).substring(7);
                const url = `https://api.dicebear.com/9.x/\${style}/svg?seed=\${seed}&size=80`;
                const col = document.createElement('div');
                col.className = 'col-2 mb-3 text-center';
                col.innerHTML = `<img src=\"\${url}\" style=\"width: 70px; height: 70px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;\" class=\"avatar-option\" data-url=\"\${url}\">`;
                avatarList.appendChild(col);
            }
        });
    }

    loadAvatars();

    // Sélection d'un avatar
    if (avatarList) {
        avatarList.addEventListener('click', (e) => {
            const img = e.target.closest('.avatar-option');
            if (img) {
                const url = img.getAttribute('data-url');
                // Mettre à jour l'aperçu principal
                if (avatarPreviewImg) avatarPreviewImg.src = url;
                // Stocker l'URL dans le champ caché
                avatarUrlInput.value = url;
                // Vider l'input file pour éviter la confusion
                if (photoField) photoField.value = '';
                // Cacher l'aperçu de la photo uploadée
                if (photoPreviewDiv) photoPreviewDiv.style.display = 'none';
                // Fermer la modale
                const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
                if (modal) modal.hide();
                // Nettoyer l'erreur éventuelle sur le champ photo
                clearError('photo', 'err-photo');
            }
        });
    }

    // Aperçu photo uploadée
    if (photoField) {
        photoField.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (photoThumb) photoThumb.src = e.target.result;
                    if (photoInfo) photoInfo.textContent = file.name + ' — ' + (file.size / 1024).toFixed(0) + ' Ko';
                    if (photoPreviewDiv) photoPreviewDiv.style.display = 'block';
                    // On efface l'avatar précédent (priorité à la photo)
                    avatarUrlInput.value = '';
                    if (avatarPreviewImg) avatarPreviewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                if (photoPreviewDiv) photoPreviewDiv.style.display = 'none';
            }
        });
    }
});
</script>
{% endblock %}", "utilisateur/form_admin.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\form_admin.html.twig");
    }
}

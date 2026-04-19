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

/* utilisateur/editer.html.twig */
class __TwigTemplate_daaccab798b2417c38eb147d26ab3246 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/editer.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Modifier mon profil";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<style>
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 34
        yield "<div class=\"container mt-5\">
    <div class=\"card\">
        <div class=\"card-header bg-primary text-white\">
            <h3>Modifier mon profil</h3>
        </div>
        <div class=\"card-body\">
            <form method=\"post\" action=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 40, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 40)]), "html", null, true);
        yield "\">
                <div class=\"mb-3\">
                    <label>Nom complet</label>
                    <input type=\"text\" name=\"nom\" class=\"form-control\" value=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 43, $this->source); })()), "nom", [], "any", false, false, false, 43), "html", null, true);
        yield "\" required>
                </div>
                <div class=\"mb-3\">
                    <label>Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" value=\"";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 47, $this->source); })()), "email", [], "any", false, false, false, 47), "html", null, true);
        yield "\" required>
                </div>

                ";
        // line 51
        yield "                <div class=\"mb-3\">
                    <label>Avatar</label>
                    <div class=\"d-flex align-items-center gap-3\">
                        <!-- Aperçu actuel -->
                        <div class=\"avatar-preview\" id=\"avatar-preview\">
                            ";
        // line 56
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 56, $this->source); })()), "photo", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 57
            yield "                                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 57, $this->source); })()), "photo", [], "any", false, false, false, 57), "html", null, true);
            yield "\">
                            ";
        } else {
            // line 59
            yield "                                <img src=\"https://ui-avatars.com/api/?name=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 59, $this->source); })()), "nom", [], "any", false, false, false, 59)), "html", null, true);
            yield "&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\">
                            ";
        }
        // line 61
        yield "                        </div>
                        <!-- Bouton qui ouvre la modale -->
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                            🎨 Choisir un avatar
                        </button>
                    </div>
                    <input type=\"hidden\" name=\"photo\" id=\"avatar-url\" value=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 67, $this->source); })()), "photo", [], "any", false, false, false, 67), "html", null, true);
        yield "\">
                    <small class=\"text-muted\">Cliquez sur le bouton pour choisir un avatar parmi notre galerie.</small>
                </div>

                <div class=\"mb-3\">
                    <label>Région / Gouvernorat</label>
                    <select name=\"region\" class=\"form-select\">
                        <option value=\"\">Sélectionnez</option>
                        ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["Tunis", "Ariana", "Ben Arous", "Manouba", "Nabeul", "Zaghouan", "Bizerte", "Béja", "Jendouba", "Le Kef", "Siliana", "Sousse", "Monastir", "Mahdia", "Sfax", "Kairouan", "Kasserine", "Sidi Bouzid", "Gabès", "Médenine", "Tataouine", "Gafsa", "Tozeur", "Kébili"]);
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            // line 76
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["region"], "html", null, true);
            yield "\" ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 76, $this->source); })()), "region", [], "any", false, false, false, 76) == $context["region"])) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["region"], "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['region'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        yield "                    </select>
                </div>
                <div class=\"mb-3\">
                    <label>Date de naissance</label>
                    <input type=\"date\" name=\"dateNaissance\" class=\"form-control\" value=\"";
        // line 82
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 82, $this->source); })()), "dateNaissance", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 82, $this->source); })()), "dateNaissance", [], "any", false, false, false, 82), "Y-m-d"), "html", null, true)) : (""));
        yield "\">
                </div>

                <button type=\"submit\" class=\"btn btn-success\">Enregistrer</button>
                <a href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
        yield "\" class=\"btn btn-secondary\">Annuler</a>
            </form>
        </div>
    </div>
</div>

";
        // line 93
        yield "<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Choisissez votre avatar</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\" id=\"avatar-list\">
                    <div class=\"text-center\">Chargement des avatars...</div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 110
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 111
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreview = document.getElementById('avatar-preview');
    const avatarUrlInput = document.getElementById('avatar-url');

    // Styles disponibles sur DiceBear (gratuit, sans clé)
    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
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
    avatarList.addEventListener('click', (e) => {
        const img = e.target.closest('.avatar-option');
        if (img) {
            const url = img.getAttribute('data-url');
            // Mise à jour de la prévisualisation
            avatarPreview.innerHTML = `<img src=\"\${url}\" style=\"width: 100%; height: 100%; object-fit: cover;\">`;
            // Mise à jour du champ caché
            avatarUrlInput.value = url;
            // Fermer la modale
            const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
            modal.hide();
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
        return "utilisateur/editer.html.twig";
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
        return array (  269 => 111,  259 => 110,  236 => 93,  227 => 86,  220 => 82,  214 => 78,  201 => 76,  197 => 75,  186 => 67,  178 => 61,  172 => 59,  166 => 57,  164 => 56,  157 => 51,  151 => 47,  144 => 43,  138 => 40,  130 => 34,  120 => 33,  87 => 7,  77 => 6,  60 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/utilisateur/editer.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Modifier mon profil{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container mt-5\">
    <div class=\"card\">
        <div class=\"card-header bg-primary text-white\">
            <h3>Modifier mon profil</h3>
        </div>
        <div class=\"card-body\">
            <form method=\"post\" action=\"{{ path('app_utilisateur_editer', {id: utilisateur.idUtilisateur}) }}\">
                <div class=\"mb-3\">
                    <label>Nom complet</label>
                    <input type=\"text\" name=\"nom\" class=\"form-control\" value=\"{{ utilisateur.nom }}\" required>
                </div>
                <div class=\"mb-3\">
                    <label>Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" value=\"{{ utilisateur.email }}\" required>
                </div>

                {# ===== SECTION AVATAR ===== #}
                <div class=\"mb-3\">
                    <label>Avatar</label>
                    <div class=\"d-flex align-items-center gap-3\">
                        <!-- Aperçu actuel -->
                        <div class=\"avatar-preview\" id=\"avatar-preview\">
                            {% if utilisateur.photo %}
                                <img src=\"{{ utilisateur.photo }}\">
                            {% else %}
                                <img src=\"https://ui-avatars.com/api/?name={{ utilisateur.nom|url_encode }}&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\">
                            {% endif %}
                        </div>
                        <!-- Bouton qui ouvre la modale -->
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                            🎨 Choisir un avatar
                        </button>
                    </div>
                    <input type=\"hidden\" name=\"photo\" id=\"avatar-url\" value=\"{{ utilisateur.photo }}\">
                    <small class=\"text-muted\">Cliquez sur le bouton pour choisir un avatar parmi notre galerie.</small>
                </div>

                <div class=\"mb-3\">
                    <label>Région / Gouvernorat</label>
                    <select name=\"region\" class=\"form-select\">
                        <option value=\"\">Sélectionnez</option>
                        {% for region in ['Tunis','Ariana','Ben Arous','Manouba','Nabeul','Zaghouan','Bizerte','Béja','Jendouba','Le Kef','Siliana','Sousse','Monastir','Mahdia','Sfax','Kairouan','Kasserine','Sidi Bouzid','Gabès','Médenine','Tataouine','Gafsa','Tozeur','Kébili'] %}
                            <option value=\"{{ region }}\" {{ utilisateur.region == region ? 'selected' }}>{{ region }}</option>
                        {% endfor %}
                    </select>
                </div>
                <div class=\"mb-3\">
                    <label>Date de naissance</label>
                    <input type=\"date\" name=\"dateNaissance\" class=\"form-control\" value=\"{{ utilisateur.dateNaissance ? utilisateur.dateNaissance|date('Y-m-d') : '' }}\">
                </div>

                <button type=\"submit\" class=\"btn btn-success\">Enregistrer</button>
                <a href=\"{{ path('app_mon_profil') }}\" class=\"btn btn-secondary\">Annuler</a>
            </form>
        </div>
    </div>
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
                    <div class=\"text-center\">Chargement des avatars...</div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreview = document.getElementById('avatar-preview');
    const avatarUrlInput = document.getElementById('avatar-url');

    // Styles disponibles sur DiceBear (gratuit, sans clé)
    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
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
    avatarList.addEventListener('click', (e) => {
        const img = e.target.closest('.avatar-option');
        if (img) {
            const url = img.getAttribute('data-url');
            // Mise à jour de la prévisualisation
            avatarPreview.innerHTML = `<img src=\"\${url}\" style=\"width: 100%; height: 100%; object-fit: cover;\">`;
            // Mise à jour du champ caché
            avatarUrlInput.value = url;
            // Fermer la modale
            const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
            modal.hide();
        }
    });
});
</script>
{% endblock %}", "utilisateur/editer.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\editer.html.twig");
    }
}

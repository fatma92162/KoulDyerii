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

/* admin_post/index.html.twig */
class __TwigTemplate_88fc9bac85f7a6637d4d87a4eff67c18 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_post/index.html.twig"));

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

        yield "Gestion des publications";
        
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
    .search-bar {
        background: white;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .search-bar .form-control,
    .search-bar .form-select {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
    }
    
    .search-bar .btn {
        border-radius: 10px;
        padding: 10px 25px;
    }
    
    .table th {
        white-space: nowrap;
    }
    
    .btn-group {
        gap: 5px;
    }
    
    .alert {
        padding: 12px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 55
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📝 Gestion des publications</h3>
        <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_new");
        yield "\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvelle publication
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class=\"search-bar\">
        <form method=\"get\" action=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"d-flex gap-2\">
            <div class=\"flex-grow-1\">
                <input type=\"text\" 
                       name=\"search\" 
                       class=\"form-control\" 
                       placeholder=\"🔍 Rechercher par titre, contenu ou auteur...\" 
                       value=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 71, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
            </div>
            <div>
                <select name=\"sort\" class=\"form-select\">
                    <option value=\"recent\" ";
        // line 75
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 75, $this->source); })()) == "recent")) ? ("selected") : (""));
        yield ">📅 Les plus récents</option>
                    <option value=\"oldest\" ";
        // line 76
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 76, $this->source); })()) == "oldest")) ? ("selected") : (""));
        yield ">📅 Les plus anciens</option>
                    <option value=\"popular\" ";
        // line 77
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 77, $this->source); })()) == "popular")) ? ("selected") : (""));
        yield ">🔥 Les plus populaires</option>
                    <option value=\"pinned\" ";
        // line 78
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 78, $this->source); })()) == "pinned")) ? ("selected") : (""));
        yield ">📌 Épinglés d'abord</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">
                <i class=\"fas fa-search\"></i> Chercher
            </button>
        </form>
    </div>

    ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "flashes", ["success"], "method", false, false, false, 87));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 88
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "flashes", ["error"], "method", false, false, false, 90));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 91
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        yield "
    <div class=\"table-responsive\">
        <table class=\"table table-striped table-bordered\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Auteur</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Commentaires</th>
                    <th>Épinglé</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 109
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 109, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 110
            yield "                <tr>
                    <td class=\"align-middle\">";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 111), "html", null, true);
            yield "</td>
                    <td class=\"align-middle\">
                        <div class=\"d-flex align-items-center gap-2\">
                            <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 32px; height: 32px;\">
                                ";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 115), "nom", [], "any", false, false, false, 115))), "html", null, true);
            yield "
                            </div>
                            ";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 117), "nom", [], "any", false, false, false, 117), "html", null, true);
            yield "
                        </div>
                    </td>
                    <td class=\"align-middle\">";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 120), 0, 40), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 120)) > 40)) {
                yield "...";
            }
            yield "</td>
                    <td class=\"align-middle\">";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 121), 0, 50), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 121)) > 50)) {
                yield "...";
            }
            yield "</td>
                    <td class=\"align-middle text-center\">
                        <span class=\"badge bg-info\">";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentaires", [], "any", false, false, false, 123)), "html", null, true);
            yield "</span>
                    </td>
                    <td class=\"align-middle\">
                        <form method=\"post\" action=\"";
            // line 126
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_pin", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 126)]), "html", null, true);
            yield "\" style=\"display: inline;\">
                            <button type=\"submit\" class=\"btn btn-sm ";
            // line 127
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 127)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "btn-warning";
            } else {
                yield "btn-outline-secondary";
            }
            yield "\">
                                <i class=\"fas fa-thumbtack\"></i> ";
            // line 128
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 128)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désépingler") : ("Épingler"));
            yield "
                            </button>
                        </form>
                    </td>
                    <td class=\"align-middle\">";
            // line 132
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 132), "d/m/Y H:i"), "html", null, true);
            yield "</td>
                    <td class=\"align-middle\">
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 135)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\" title=\"Voir\">
                                <i class=\"fas fa-eye\"></i>
                            </a>
                            <a href=\"";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 138)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 141)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Supprimer cette publication ?')\" style=\"display: inline;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "            </tbody>
        </table>
    </div>

    ";
        // line 154
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 154, $this->source); })()))) {
            // line 155
            yield "        <div class=\"text-center py-5\">
            <i class=\"fas fa-newspaper fa-3x text-muted mb-3\"></i>
            <p class=\"text-muted\">Aucune publication trouvée.</p>
            <a href=\"";
            // line 158
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_new");
            yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Créer la première publication
            </a>
        </div>
    ";
        }
        // line 163
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
        return "admin_post/index.html.twig";
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
        return array (  370 => 163,  362 => 158,  357 => 155,  355 => 154,  349 => 150,  334 => 141,  328 => 138,  322 => 135,  316 => 132,  309 => 128,  301 => 127,  297 => 126,  291 => 123,  283 => 121,  276 => 120,  270 => 117,  265 => 115,  258 => 111,  255 => 110,  251 => 109,  233 => 93,  224 => 91,  219 => 90,  210 => 88,  206 => 87,  194 => 78,  190 => 77,  186 => 76,  182 => 75,  175 => 71,  166 => 65,  156 => 58,  151 => 55,  141 => 54,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des publications{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .search-bar {
        background: white;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .search-bar .form-control,
    .search-bar .form-select {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
    }
    
    .search-bar .btn {
        border-radius: 10px;
        padding: 10px 25px;
    }
    
    .table th {
        white-space: nowrap;
    }
    
    .btn-group {
        gap: 5px;
    }
    
    .alert {
        padding: 12px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📝 Gestion des publications</h3>
        <a href=\"{{ path('app_post_new') }}\" class=\"btn btn-primary\">
            <i class=\"fas fa-plus\"></i> Nouvelle publication
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class=\"search-bar\">
        <form method=\"get\" action=\"{{ path('app_admin_posts_index') }}\" class=\"d-flex gap-2\">
            <div class=\"flex-grow-1\">
                <input type=\"text\" 
                       name=\"search\" 
                       class=\"form-control\" 
                       placeholder=\"🔍 Rechercher par titre, contenu ou auteur...\" 
                       value=\"{{ search|default('') }}\">
            </div>
            <div>
                <select name=\"sort\" class=\"form-select\">
                    <option value=\"recent\" {{ sort == 'recent' ? 'selected' : '' }}>📅 Les plus récents</option>
                    <option value=\"oldest\" {{ sort == 'oldest' ? 'selected' : '' }}>📅 Les plus anciens</option>
                    <option value=\"popular\" {{ sort == 'popular' ? 'selected' : '' }}>🔥 Les plus populaires</option>
                    <option value=\"pinned\" {{ sort == 'pinned' ? 'selected' : '' }}>📌 Épinglés d'abord</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">
                <i class=\"fas fa-search\"></i> Chercher
            </button>
        </form>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-bordered\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Auteur</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Commentaires</th>
                    <th>Épinglé</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for post in posts %}
                <tr>
                    <td class=\"align-middle\">{{ post.id }}</td>
                    <td class=\"align-middle\">
                        <div class=\"d-flex align-items-center gap-2\">
                            <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 32px; height: 32px;\">
                                {{ post.utilisateur.nom|first|upper }}
                            </div>
                            {{ post.utilisateur.nom }}
                        </div>
                    </td>
                    <td class=\"align-middle\">{{ post.title|slice(0, 40) }}{% if post.title|length > 40 %}...{% endif %}</td>
                    <td class=\"align-middle\">{{ post.content|slice(0, 50) }}{% if post.content|length > 50 %}...{% endif %}</td>
                    <td class=\"align-middle text-center\">
                        <span class=\"badge bg-info\">{{ post.commentaires|length }}</span>
                    </td>
                    <td class=\"align-middle\">
                        <form method=\"post\" action=\"{{ path('app_admin_post_pin', {id: post.id}) }}\" style=\"display: inline;\">
                            <button type=\"submit\" class=\"btn btn-sm {% if post.isPinned %}btn-warning{% else %}btn-outline-secondary{% endif %}\">
                                <i class=\"fas fa-thumbtack\"></i> {{ post.isPinned ? 'Désépingler' : 'Épingler' }}
                            </button>
                        </form>
                    </td>
                    <td class=\"align-middle\">{{ post.createdAt|date('d/m/Y H:i') }}</td>
                    <td class=\"align-middle\">
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"{{ path('app_admin_post_show', {id: post.id}) }}\" class=\"btn btn-sm btn-info\" title=\"Voir\">
                                <i class=\"fas fa-eye\"></i>
                            </a>
                            <a href=\"{{ path('app_admin_post_edit', {id: post.id}) }}\" class=\"btn btn-sm btn-warning\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"{{ path('app_admin_post_delete', {id: post.id}) }}\" onsubmit=\"return confirm('Supprimer cette publication ?')\" style=\"display: inline;\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>

    {% if posts is empty %}
        <div class=\"text-center py-5\">
            <i class=\"fas fa-newspaper fa-3x text-muted mb-3\"></i>
            <p class=\"text-muted\">Aucune publication trouvée.</p>
            <a href=\"{{ path('app_post_new') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Créer la première publication
            </a>
        </div>
    {% endif %}
</div>
{% endblock %}", "admin_post/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_post\\index.html.twig");
    }
}

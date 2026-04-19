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

/* admin_posts/stats.html.twig */
class __TwigTemplate_dcc41efcb3848010cc37f2c5528795db extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/stats.html.twig"));

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

        yield "Statistiques - Administration";
        
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
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<style>
    .stats-container {
        padding: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }
    .card-stats {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 20px;
        margin-bottom: 30px;
        transition: transform 0.2s;
    }
    .card-stats:hover {
        transform: translateY(-5px);
    }
    .stat-number {
        font-size: 42px;
        font-weight: 800;
        color: #FF6B6B;
    }
    .stat-label {
        color: #666;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .chart-container {
        margin-top: 20px;
        height: 350px;
    }
    .admin-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        padding: 30px 0;
        margin-bottom: 40px;
        border-radius: 0 0 30px 30px;
    }
    .btn-back {
        background: rgba(255,255,255,0.2);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
    }
    .btn-back:hover {
        background: rgba(255,255,255,0.3);
        color: white;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 62
        yield "<div class=\"admin-header\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <h1><i class=\"fas fa-chart-line\"></i> Statistiques avancées</h1>
            <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"btn-back\">
                <i class=\"fas fa-arrow-left\"></i> Retour à la gestion
            </a>
        </div>
        <p class=\"mb-0\">Analyse des performances de la plateforme</p>
    </div>
</div>

<div class=\"stats-container\">
    <div class=\"row g-4 mb-5\">
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPosts"]) || array_key_exists("totalPosts", $context) ? $context["totalPosts"] : (function () { throw new RuntimeError('Variable "totalPosts" does not exist.', 78, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Publications</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalComments"]) || array_key_exists("totalComments", $context) ? $context["totalComments"] : (function () { throw new RuntimeError('Variable "totalComments" does not exist.', 84, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Commentaires</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalLikes"]) || array_key_exists("totalLikes", $context) ? $context["totalLikes"] : (function () { throw new RuntimeError('Variable "totalLikes" does not exist.', 90, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Likes</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgComments"]) || array_key_exists("avgComments", $context) ? $context["avgComments"] : (function () { throw new RuntimeError('Variable "avgComments" does not exist.', 96, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Moy. commentaires/post</div>
                <div class=\"stat-number mt-2\">";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgLikes"]) || array_key_exists("avgLikes", $context) ? $context["avgLikes"] : (function () { throw new RuntimeError('Variable "avgLikes" does not exist.', 98, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Moy. likes/post</div>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        <!-- Évolution des publications -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-chart-line\"></i> Publications (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"postsChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Évolution des commentaires -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-comments\"></i> Commentaires (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"commentsChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Évolution des likes -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-heart\"></i> Likes (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"likesChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Top 5 utilisateurs les plus actifs -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-trophy\"></i> Top 5 utilisateurs actifs</h4>
                <div class=\"chart-container\">
                    <canvas id=\"topUsersChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Répartition épinglés vs non épinglés -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-thumbtack\"></i> Publications épinglées</h4>
                <div class=\"chart-container\">
                    <canvas id=\"pinnedChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Répartition avec/sans image -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-image\"></i> Publications avec image</h4>
                <div class=\"chart-container\">
                    <canvas id=\"imageChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Résumé rapide -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-chart-pie\"></i> Résumé</h4>
                <ul class=\"list-unstyled mt-3\">
                    <li><strong>📊 Taux d'engagement :</strong> ";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["totalComments"]) || array_key_exists("totalComments", $context) ? $context["totalComments"] : (function () { throw new RuntimeError('Variable "totalComments" does not exist.', 170, $this->source); })()) + (isset($context["totalLikes"]) || array_key_exists("totalLikes", $context) ? $context["totalLikes"] : (function () { throw new RuntimeError('Variable "totalLikes" does not exist.', 170, $this->source); })())), "html", null, true);
        yield " interactions</li>
                    <li><strong>📌 Épinglés :</strong> ";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pinnedPosts"]) || array_key_exists("pinnedPosts", $context) ? $context["pinnedPosts"] : (function () { throw new RuntimeError('Variable "pinnedPosts" does not exist.', 171, $this->source); })()), "html", null, true);
        yield " (";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((((isset($context["pinnedPosts"]) || array_key_exists("pinnedPosts", $context) ? $context["pinnedPosts"] : (function () { throw new RuntimeError('Variable "pinnedPosts" does not exist.', 171, $this->source); })()) / (isset($context["totalPosts"]) || array_key_exists("totalPosts", $context) ? $context["totalPosts"] : (function () { throw new RuntimeError('Variable "totalPosts" does not exist.', 171, $this->source); })())) * 100), 1), "html", null, true);
        yield "%)</li>
                    <li><strong>🖼️ Avec image :</strong> ";
        // line 172
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withImage"]) || array_key_exists("withImage", $context) ? $context["withImage"] : (function () { throw new RuntimeError('Variable "withImage" does not exist.', 172, $this->source); })()), "html", null, true);
        yield " (";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((((isset($context["withImage"]) || array_key_exists("withImage", $context) ? $context["withImage"] : (function () { throw new RuntimeError('Variable "withImage" does not exist.', 172, $this->source); })()) / (isset($context["totalPosts"]) || array_key_exists("totalPosts", $context) ? $context["totalPosts"] : (function () { throw new RuntimeError('Variable "totalPosts" does not exist.', 172, $this->source); })())) * 100), 1), "html", null, true);
        yield "%)</li>
                    <li><strong>💬 Commentaires par post :</strong> ";
        // line 173
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgComments"]) || array_key_exists("avgComments", $context) ? $context["avgComments"] : (function () { throw new RuntimeError('Variable "avgComments" does not exist.', 173, $this->source); })()), "html", null, true);
        yield "</li>
                    <li><strong>❤️ Likes par post :</strong> ";
        // line 174
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgLikes"]) || array_key_exists("avgLikes", $context) ? $context["avgLikes"] : (function () { throw new RuntimeError('Variable "avgLikes" does not exist.', 174, $this->source); })()), "html", null, true);
        yield "</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Évolution des publications
const ctxPosts = document.getElementById('postsChart').getContext('2d');
new Chart(ctxPosts, {
    type: 'line',
    data: {
        labels: ";
        // line 187
        yield (isset($context["postsDates"]) || array_key_exists("postsDates", $context) ? $context["postsDates"] : (function () { throw new RuntimeError('Variable "postsDates" does not exist.', 187, $this->source); })());
        yield ",
        datasets: [{
            label: 'Publications',
            data: ";
        // line 190
        yield (isset($context["postsCounts"]) || array_key_exists("postsCounts", $context) ? $context["postsCounts"] : (function () { throw new RuntimeError('Variable "postsCounts" does not exist.', 190, $this->source); })());
        yield ",
            borderColor: '#FF6B6B',
            backgroundColor: 'rgba(255, 107, 107, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Évolution des commentaires
const ctxComments = document.getElementById('commentsChart').getContext('2d');
new Chart(ctxComments, {
    type: 'line',
    data: {
        labels: ";
        // line 205
        yield (isset($context["commentsDates"]) || array_key_exists("commentsDates", $context) ? $context["commentsDates"] : (function () { throw new RuntimeError('Variable "commentsDates" does not exist.', 205, $this->source); })());
        yield ",
        datasets: [{
            label: 'Commentaires',
            data: ";
        // line 208
        yield (isset($context["commentsCounts"]) || array_key_exists("commentsCounts", $context) ? $context["commentsCounts"] : (function () { throw new RuntimeError('Variable "commentsCounts" does not exist.', 208, $this->source); })());
        yield ",
            borderColor: '#4CAF50',
            backgroundColor: 'rgba(76, 175, 80, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Évolution des likes
const ctxLikes = document.getElementById('likesChart').getContext('2d');
new Chart(ctxLikes, {
    type: 'line',
    data: {
        labels: ";
        // line 223
        yield (isset($context["likesDates"]) || array_key_exists("likesDates", $context) ? $context["likesDates"] : (function () { throw new RuntimeError('Variable "likesDates" does not exist.', 223, $this->source); })());
        yield ",
        datasets: [{
            label: 'Likes',
            data: ";
        // line 226
        yield (isset($context["likesCounts"]) || array_key_exists("likesCounts", $context) ? $context["likesCounts"] : (function () { throw new RuntimeError('Variable "likesCounts" does not exist.', 226, $this->source); })());
        yield ",
            borderColor: '#FFC107',
            backgroundColor: 'rgba(255, 193, 7, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Top 5 utilisateurs
const ctxUsers = document.getElementById('topUsersChart').getContext('2d');
new Chart(ctxUsers, {
    type: 'bar',
    data: {
        labels: ";
        // line 241
        yield (isset($context["topUsersNames"]) || array_key_exists("topUsersNames", $context) ? $context["topUsersNames"] : (function () { throw new RuntimeError('Variable "topUsersNames" does not exist.', 241, $this->source); })());
        yield ",
        datasets: [{
            label: \"Nombre d'actions (posts + commentaires)\",
            data: ";
        // line 244
        yield (isset($context["topUsersActivity"]) || array_key_exists("topUsersActivity", $context) ? $context["topUsersActivity"] : (function () { throw new RuntimeError('Variable "topUsersActivity" does not exist.', 244, $this->source); })());
        yield ",
            backgroundColor: '#8B0000',
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true, title: { display: true, text: 'Actions' } } }
    }
});

// Répartition épinglés
const ctxPinned = document.getElementById('pinnedChart').getContext('2d');
new Chart(ctxPinned, {
    type: 'doughnut',
    data: {
        labels: ['Épinglés', 'Non épinglés'],
        datasets: [{
            data: [";
        // line 263
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pinnedPosts"]) || array_key_exists("pinnedPosts", $context) ? $context["pinnedPosts"] : (function () { throw new RuntimeError('Variable "pinnedPosts" does not exist.', 263, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unpinnedPosts"]) || array_key_exists("unpinnedPosts", $context) ? $context["unpinnedPosts"] : (function () { throw new RuntimeError('Variable "unpinnedPosts" does not exist.', 263, $this->source); })()), "html", null, true);
        yield "],
            backgroundColor: ['#5bc0de', '#f0e6d6'],
            borderWidth: 0
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Répartition avec/sans image
const ctxImage = document.getElementById('imageChart').getContext('2d');
new Chart(ctxImage, {
    type: 'doughnut',
    data: {
        labels: ['Avec image', 'Sans image'],
        datasets: [{
            data: [";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withImage"]) || array_key_exists("withImage", $context) ? $context["withImage"] : (function () { throw new RuntimeError('Variable "withImage" does not exist.', 278, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withoutImage"]) || array_key_exists("withoutImage", $context) ? $context["withoutImage"] : (function () { throw new RuntimeError('Variable "withoutImage" does not exist.', 278, $this->source); })()), "html", null, true);
        yield "],
            backgroundColor: ['#FF8E53', '#f0e6d6'],
            borderWidth: 0
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
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
        return "admin_posts/stats.html.twig";
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
        return array (  442 => 278,  422 => 263,  400 => 244,  394 => 241,  376 => 226,  370 => 223,  352 => 208,  346 => 205,  328 => 190,  322 => 187,  306 => 174,  302 => 173,  296 => 172,  290 => 171,  286 => 170,  211 => 98,  206 => 96,  197 => 90,  188 => 84,  179 => 78,  164 => 66,  158 => 62,  148 => 61,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Statistiques - Administration{% endblock %}

{% block stylesheets %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<style>
    .stats-container {
        padding: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }
    .card-stats {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 20px;
        margin-bottom: 30px;
        transition: transform 0.2s;
    }
    .card-stats:hover {
        transform: translateY(-5px);
    }
    .stat-number {
        font-size: 42px;
        font-weight: 800;
        color: #FF6B6B;
    }
    .stat-label {
        color: #666;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .chart-container {
        margin-top: 20px;
        height: 350px;
    }
    .admin-header {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        padding: 30px 0;
        margin-bottom: 40px;
        border-radius: 0 0 30px 30px;
    }
    .btn-back {
        background: rgba(255,255,255,0.2);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
    }
    .btn-back:hover {
        background: rgba(255,255,255,0.3);
        color: white;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"admin-header\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <h1><i class=\"fas fa-chart-line\"></i> Statistiques avancées</h1>
            <a href=\"{{ path('app_admin_posts_index') }}\" class=\"btn-back\">
                <i class=\"fas fa-arrow-left\"></i> Retour à la gestion
            </a>
        </div>
        <p class=\"mb-0\">Analyse des performances de la plateforme</p>
    </div>
</div>

<div class=\"stats-container\">
    <div class=\"row g-4 mb-5\">
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">{{ totalPosts }}</div>
                <div class=\"stat-label\">Publications</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">{{ totalComments }}</div>
                <div class=\"stat-label\">Commentaires</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">{{ totalLikes }}</div>
                <div class=\"stat-label\">Likes</div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card-stats text-center\">
                <div class=\"stat-number\">{{ avgComments }}</div>
                <div class=\"stat-label\">Moy. commentaires/post</div>
                <div class=\"stat-number mt-2\">{{ avgLikes }}</div>
                <div class=\"stat-label\">Moy. likes/post</div>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        <!-- Évolution des publications -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-chart-line\"></i> Publications (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"postsChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Évolution des commentaires -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-comments\"></i> Commentaires (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"commentsChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Évolution des likes -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-heart\"></i> Likes (30 derniers jours)</h4>
                <div class=\"chart-container\">
                    <canvas id=\"likesChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Top 5 utilisateurs les plus actifs -->
        <div class=\"col-md-6\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-trophy\"></i> Top 5 utilisateurs actifs</h4>
                <div class=\"chart-container\">
                    <canvas id=\"topUsersChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Répartition épinglés vs non épinglés -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-thumbtack\"></i> Publications épinglées</h4>
                <div class=\"chart-container\">
                    <canvas id=\"pinnedChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Répartition avec/sans image -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-image\"></i> Publications avec image</h4>
                <div class=\"chart-container\">
                    <canvas id=\"imageChart\"></canvas>
                </div>
            </div>
        </div>

        <!-- Résumé rapide -->
        <div class=\"col-md-4\">
            <div class=\"card-stats\">
                <h4><i class=\"fas fa-chart-pie\"></i> Résumé</h4>
                <ul class=\"list-unstyled mt-3\">
                    <li><strong>📊 Taux d'engagement :</strong> {{ totalComments + totalLikes }} interactions</li>
                    <li><strong>📌 Épinglés :</strong> {{ pinnedPosts }} ({{ (pinnedPosts / totalPosts * 100)|round(1) }}%)</li>
                    <li><strong>🖼️ Avec image :</strong> {{ withImage }} ({{ (withImage / totalPosts * 100)|round(1) }}%)</li>
                    <li><strong>💬 Commentaires par post :</strong> {{ avgComments }}</li>
                    <li><strong>❤️ Likes par post :</strong> {{ avgLikes }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Évolution des publications
const ctxPosts = document.getElementById('postsChart').getContext('2d');
new Chart(ctxPosts, {
    type: 'line',
    data: {
        labels: {{ postsDates|raw }},
        datasets: [{
            label: 'Publications',
            data: {{ postsCounts|raw }},
            borderColor: '#FF6B6B',
            backgroundColor: 'rgba(255, 107, 107, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Évolution des commentaires
const ctxComments = document.getElementById('commentsChart').getContext('2d');
new Chart(ctxComments, {
    type: 'line',
    data: {
        labels: {{ commentsDates|raw }},
        datasets: [{
            label: 'Commentaires',
            data: {{ commentsCounts|raw }},
            borderColor: '#4CAF50',
            backgroundColor: 'rgba(76, 175, 80, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Évolution des likes
const ctxLikes = document.getElementById('likesChart').getContext('2d');
new Chart(ctxLikes, {
    type: 'line',
    data: {
        labels: {{ likesDates|raw }},
        datasets: [{
            label: 'Likes',
            data: {{ likesCounts|raw }},
            borderColor: '#FFC107',
            backgroundColor: 'rgba(255, 193, 7, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Top 5 utilisateurs
const ctxUsers = document.getElementById('topUsersChart').getContext('2d');
new Chart(ctxUsers, {
    type: 'bar',
    data: {
        labels: {{ topUsersNames|raw }},
        datasets: [{
            label: \"Nombre d'actions (posts + commentaires)\",
            data: {{ topUsersActivity|raw }},
            backgroundColor: '#8B0000',
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true, title: { display: true, text: 'Actions' } } }
    }
});

// Répartition épinglés
const ctxPinned = document.getElementById('pinnedChart').getContext('2d');
new Chart(ctxPinned, {
    type: 'doughnut',
    data: {
        labels: ['Épinglés', 'Non épinglés'],
        datasets: [{
            data: [{{ pinnedPosts }}, {{ unpinnedPosts }}],
            backgroundColor: ['#5bc0de', '#f0e6d6'],
            borderWidth: 0
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});

// Répartition avec/sans image
const ctxImage = document.getElementById('imageChart').getContext('2d');
new Chart(ctxImage, {
    type: 'doughnut',
    data: {
        labels: ['Avec image', 'Sans image'],
        datasets: [{
            data: [{{ withImage }}, {{ withoutImage }}],
            backgroundColor: ['#FF8E53', '#f0e6d6'],
            borderWidth: 0
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});
</script>
{% endblock %}", "admin_posts/stats.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\stats.html.twig");
    }
}

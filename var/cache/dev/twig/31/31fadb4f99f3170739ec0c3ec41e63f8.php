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

/* admin_parts/stats_modal_content.html.twig */
class __TwigTemplate_5193eaed9a48221326856fbd6208810f extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_parts/stats_modal_content.html.twig"));

        // line 1
        yield "<div>
    <h5 class=\"mb-3\">📊 Statistiques détaillées</h5>
    <div class=\"row g-3\">
        <div class=\"col-md-6\">
            <canvas id=\"modalPostsChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalCommentsChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalLikesChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalTopUsersChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalPinnedChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalImageChart\" style=\"height: 200px;\"></canvas>
        </div>
    </div>
    <div class=\"mt-3 text-muted small\">
        <i class=\"fas fa-chart-line\"></i> Évolution sur 30 jours &nbsp;|&nbsp;
        <i class=\"fas fa-trophy\"></i> Top 5 utilisateurs &nbsp;|&nbsp;
        <i class=\"fas fa-thumbtack\"></i> Répartition des épinglés &nbsp;|&nbsp;
        <i class=\"fas fa-image\"></i> Publications avec image
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Attendre un court instant pour que les canvas soient dans le DOM
setTimeout(() => {
    // Données injectées par Twig
    const postsDates = ";
        // line 36
        yield (isset($context["postsDates"]) || array_key_exists("postsDates", $context) ? $context["postsDates"] : (function () { throw new RuntimeError('Variable "postsDates" does not exist.', 36, $this->source); })());
        yield ";
    const postsCounts = ";
        // line 37
        yield (isset($context["postsCounts"]) || array_key_exists("postsCounts", $context) ? $context["postsCounts"] : (function () { throw new RuntimeError('Variable "postsCounts" does not exist.', 37, $this->source); })());
        yield ";
    const commentsDates = ";
        // line 38
        yield (isset($context["commentsDates"]) || array_key_exists("commentsDates", $context) ? $context["commentsDates"] : (function () { throw new RuntimeError('Variable "commentsDates" does not exist.', 38, $this->source); })());
        yield ";
    const commentsCounts = ";
        // line 39
        yield (isset($context["commentsCounts"]) || array_key_exists("commentsCounts", $context) ? $context["commentsCounts"] : (function () { throw new RuntimeError('Variable "commentsCounts" does not exist.', 39, $this->source); })());
        yield ";
    const likesDates = ";
        // line 40
        yield (isset($context["likesDates"]) || array_key_exists("likesDates", $context) ? $context["likesDates"] : (function () { throw new RuntimeError('Variable "likesDates" does not exist.', 40, $this->source); })());
        yield ";
    const likesCounts = ";
        // line 41
        yield (isset($context["likesCounts"]) || array_key_exists("likesCounts", $context) ? $context["likesCounts"] : (function () { throw new RuntimeError('Variable "likesCounts" does not exist.', 41, $this->source); })());
        yield ";
    const topUsersNames = ";
        // line 42
        yield (isset($context["topUsersNames"]) || array_key_exists("topUsersNames", $context) ? $context["topUsersNames"] : (function () { throw new RuntimeError('Variable "topUsersNames" does not exist.', 42, $this->source); })());
        yield ";
    const topUsersActivity = ";
        // line 43
        yield (isset($context["topUsersActivity"]) || array_key_exists("topUsersActivity", $context) ? $context["topUsersActivity"] : (function () { throw new RuntimeError('Variable "topUsersActivity" does not exist.', 43, $this->source); })());
        yield ";
    const pinnedPosts = ";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pinnedPosts"]) || array_key_exists("pinnedPosts", $context) ? $context["pinnedPosts"] : (function () { throw new RuntimeError('Variable "pinnedPosts" does not exist.', 44, $this->source); })()), "html", null, true);
        yield ";
    const unpinnedPosts = ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unpinnedPosts"]) || array_key_exists("unpinnedPosts", $context) ? $context["unpinnedPosts"] : (function () { throw new RuntimeError('Variable "unpinnedPosts" does not exist.', 45, $this->source); })()), "html", null, true);
        yield ";
    const withImage = ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withImage"]) || array_key_exists("withImage", $context) ? $context["withImage"] : (function () { throw new RuntimeError('Variable "withImage" does not exist.', 46, $this->source); })()), "html", null, true);
        yield ";
    const withoutImage = ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["withoutImage"]) || array_key_exists("withoutImage", $context) ? $context["withoutImage"] : (function () { throw new RuntimeError('Variable "withoutImage" does not exist.', 47, $this->source); })()), "html", null, true);
        yield ";

    new Chart(document.getElementById('modalPostsChart'), {
        type: 'line',
        data: { labels: postsDates, datasets: [{ label: 'Publications', data: postsCounts, borderColor: '#FF6B6B', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalCommentsChart'), {
        type: 'line',
        data: { labels: commentsDates, datasets: [{ label: 'Commentaires', data: commentsCounts, borderColor: '#4CAF50', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalLikesChart'), {
        type: 'line',
        data: { labels: likesDates, datasets: [{ label: 'Likes', data: likesCounts, borderColor: '#FFC107', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalTopUsersChart'), {
        type: 'bar',
        data: { labels: topUsersNames, datasets: [{ label: 'Actions (posts + commentaires)', data: topUsersActivity, backgroundColor: '#8B0000' }] },
        options: { responsive: true, maintainAspectRatio: true, scales: { y: { beginAtZero: true } } }
    });
    new Chart(document.getElementById('modalPinnedChart'), {
        type: 'doughnut',
        data: { labels: ['Épinglés', 'Non épinglés'], datasets: [{ data: [pinnedPosts, unpinnedPosts], backgroundColor: ['#5bc0de', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalImageChart'), {
        type: 'doughnut',
        data: { labels: ['Avec image', 'Sans image'], datasets: [{ data: [withImage, withoutImage], backgroundColor: ['#FF8E53', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
}, 100);
</script>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_parts/stats_modal_content.html.twig";
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
        return array (  126 => 47,  122 => 46,  118 => 45,  114 => 44,  110 => 43,  106 => 42,  102 => 41,  98 => 40,  94 => 39,  90 => 38,  86 => 37,  82 => 36,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div>
    <h5 class=\"mb-3\">📊 Statistiques détaillées</h5>
    <div class=\"row g-3\">
        <div class=\"col-md-6\">
            <canvas id=\"modalPostsChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalCommentsChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalLikesChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalTopUsersChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalPinnedChart\" style=\"height: 200px;\"></canvas>
        </div>
        <div class=\"col-md-6\">
            <canvas id=\"modalImageChart\" style=\"height: 200px;\"></canvas>
        </div>
    </div>
    <div class=\"mt-3 text-muted small\">
        <i class=\"fas fa-chart-line\"></i> Évolution sur 30 jours &nbsp;|&nbsp;
        <i class=\"fas fa-trophy\"></i> Top 5 utilisateurs &nbsp;|&nbsp;
        <i class=\"fas fa-thumbtack\"></i> Répartition des épinglés &nbsp;|&nbsp;
        <i class=\"fas fa-image\"></i> Publications avec image
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Attendre un court instant pour que les canvas soient dans le DOM
setTimeout(() => {
    // Données injectées par Twig
    const postsDates = {{ postsDates|raw }};
    const postsCounts = {{ postsCounts|raw }};
    const commentsDates = {{ commentsDates|raw }};
    const commentsCounts = {{ commentsCounts|raw }};
    const likesDates = {{ likesDates|raw }};
    const likesCounts = {{ likesCounts|raw }};
    const topUsersNames = {{ topUsersNames|raw }};
    const topUsersActivity = {{ topUsersActivity|raw }};
    const pinnedPosts = {{ pinnedPosts }};
    const unpinnedPosts = {{ unpinnedPosts }};
    const withImage = {{ withImage }};
    const withoutImage = {{ withoutImage }};

    new Chart(document.getElementById('modalPostsChart'), {
        type: 'line',
        data: { labels: postsDates, datasets: [{ label: 'Publications', data: postsCounts, borderColor: '#FF6B6B', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalCommentsChart'), {
        type: 'line',
        data: { labels: commentsDates, datasets: [{ label: 'Commentaires', data: commentsCounts, borderColor: '#4CAF50', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalLikesChart'), {
        type: 'line',
        data: { labels: likesDates, datasets: [{ label: 'Likes', data: likesCounts, borderColor: '#FFC107', tension: 0.3 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalTopUsersChart'), {
        type: 'bar',
        data: { labels: topUsersNames, datasets: [{ label: 'Actions (posts + commentaires)', data: topUsersActivity, backgroundColor: '#8B0000' }] },
        options: { responsive: true, maintainAspectRatio: true, scales: { y: { beginAtZero: true } } }
    });
    new Chart(document.getElementById('modalPinnedChart'), {
        type: 'doughnut',
        data: { labels: ['Épinglés', 'Non épinglés'], datasets: [{ data: [pinnedPosts, unpinnedPosts], backgroundColor: ['#5bc0de', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
    new Chart(document.getElementById('modalImageChart'), {
        type: 'doughnut',
        data: { labels: ['Avec image', 'Sans image'], datasets: [{ data: [withImage, withoutImage], backgroundColor: ['#FF8E53', '#f0e6d6'] }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
}, 100);
</script>", "admin_parts/stats_modal_content.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_parts\\stats_modal_content.html.twig");
    }
}

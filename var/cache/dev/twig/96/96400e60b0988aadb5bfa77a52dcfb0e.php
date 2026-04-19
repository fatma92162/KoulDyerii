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

/* admin/statistiques.html.twig */
class __TwigTemplate_8e7e26f739f13561c641f457e1aee88e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/statistiques.html.twig"));

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

        yield "Tableau de bord - Statistiques";
        
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
<link href=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\" rel=\"stylesheet\">
<style>
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF6B6B, #FF8E53);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .stat-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        color: #333;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .stat-percent {
        font-size: 14px;
        margin-top: 10px;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .percent-admin {
        background: #FF6B6B20;
        color: #FF6B6B;
    }
    
    .percent-client {
        background: #4CAF5020;
        color: #4CAF50;
    }
    
    .chart-container {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .chart-container:hover {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }
    
    .chart-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0e6d6;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .chart-title i {
        color: #FF6B6B;
        font-size: 22px;
    }
    
    .chart-wrapper {
        position: relative;
        height: 300px;
        margin: 20px 0;
    }
    
    canvas {
        max-height: 300px;
        width: 100%;
    }
    
    .stats-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
        justify-content: center;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #666;
    }
    
    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 3px;
    }
    
    .user-avatar-sm {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }
    
    .badge-role {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .badge-admin {
        background: #FF6B6B20;
        color: #FF6B6B;
    }
    
    .badge-user {
        background: #4CAF5020;
        color: #4CAF50;
    }
    
    .region-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s ease;
    }
    
    .region-item:hover {
        background: #fefcf8;
        transform: translateX(5px);
    }
    
    .region-name {
        font-weight: 500;
        color: #333;
    }
    
    .region-count {
        background: #FF6B6B;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .progress-bar-custom {
        height: 8px;
        background: #f0e6d6;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 8px;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #FF6B6B, #FF8E53);
        border-radius: 10px;
        transition: width 1s ease;
    }
    
    @media (max-width: 768px) {
        .chart-wrapper {
            height: 250px;
        }
        .stat-number {
            font-size: 28px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 218
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 219
        yield "<div class=\"container-fluid\">
    <h2 class=\"mb-4\">📊 Tableau de bord statistique</h2>
    
    <!-- Cartes statistiques -->
    <div class=\"row mb-4\">
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👥</div>
                <div class=\"stat-number\">";
        // line 227
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 227, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Total utilisateurs</div>
            </div>
        </div>
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👑</div>
                <div class=\"stat-number\">";
        // line 234
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalAdmins"]) || array_key_exists("totalAdmins", $context) ? $context["totalAdmins"] : (function () { throw new RuntimeError('Variable "totalAdmins" does not exist.', 234, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Administrateurs</div>
                <div class=\"stat-percent percent-admin\">";
        // line 236
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pourcentageAdmin"]) || array_key_exists("pourcentageAdmin", $context) ? $context["pourcentageAdmin"] : (function () { throw new RuntimeError('Variable "pourcentageAdmin" does not exist.', 236, $this->source); })()), "html", null, true);
        yield "%</div>
            </div>
        </div>
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👤</div>
                <div class=\"stat-number\">";
        // line 242
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalClients"]) || array_key_exists("totalClients", $context) ? $context["totalClients"] : (function () { throw new RuntimeError('Variable "totalClients" does not exist.', 242, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Clients</div>
                <div class=\"stat-percent percent-client\">";
        // line 244
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pourcentageClient"]) || array_key_exists("pourcentageClient", $context) ? $context["pourcentageClient"] : (function () { throw new RuntimeError('Variable "pourcentageClient" does not exist.', 244, $this->source); })()), "html", null, true);
        yield "%</div>
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <!-- Graphique Camembert - Répartition Admin/User -->
        <div class=\"col-md-6 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-pie\"></i>
                    <span>Répartition des rôles</span>
                </div>
                <div class=\"chart-wrapper\">
                    <canvas id=\"roleChart\" width=\"400\" height=\"300\"></canvas>
                </div>
                <div class=\"stats-legend\">
                    <div class=\"legend-item\">
                        <div class=\"legend-color\" style=\"background: #FF6B6B;\"></div>
                        <span>Administrateurs (";
        // line 263
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalAdmins"]) || array_key_exists("totalAdmins", $context) ? $context["totalAdmins"] : (function () { throw new RuntimeError('Variable "totalAdmins" does not exist.', 263, $this->source); })()), "html", null, true);
        yield ")</span>
                    </div>
                    <div class=\"legend-item\">
                        <div class=\"legend-color\" style=\"background: #4CAF50;\"></div>
                        <span>Clients (";
        // line 267
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalClients"]) || array_key_exists("totalClients", $context) ? $context["totalClients"] : (function () { throw new RuntimeError('Variable "totalClients" does not exist.', 267, $this->source); })()), "html", null, true);
        yield ")</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Graphique Barres - Top 10 Régions -->
        <div class=\"col-md-6 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-bar\"></i>
                    <span>Top 10 des régions</span>
                </div>
                <div class=\"chart-wrapper\">
                    <canvas id=\"regionChart\" width=\"400\" height=\"300\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <!-- Graphique Ligne - Évolution des inscriptions -->
        <div class=\"col-12 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-line\"></i>
                    <span>Évolution des inscriptions (6 derniers mois)</span>
                </div>
                <div class=\"chart-wrapper\" style=\"height: 350px;\">
                    <canvas id=\"evolutionChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Derniers utilisateurs inscrits -->
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-user-plus\"></i>
                    <span>Derniers utilisateurs inscrits</span>
                </div>
                <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Région</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 322
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["derniersUsers"]) || array_key_exists("derniersUsers", $context) ? $context["derniersUsers"] : (function () { throw new RuntimeError('Variable "derniersUsers" does not exist.', 322, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 323
            yield "                            <tr>
                                <td>";
            // line 324
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idUtilisateur", [], "any", false, false, false, 324), "html", null, true);
            yield "</td>
                                <td>
                                    <div class=\"d-flex align-items-center gap-2\">
                                        <div class=\"user-avatar-sm\">
                                            ";
            // line 328
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 328))), "html", null, true);
            yield "
                                        </div>
                                        ";
            // line 330
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 330), "html", null, true);
            yield "
                                    </div>
                                </td>
                                <td>";
            // line 333
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 333), "html", null, true);
            yield "</td>
                                <td>
                                    <span class=\"badge-role ";
            // line 335
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 335) == "admin")) ? ("badge-admin") : ("badge-user"));
            yield "\">
                                        ";
            // line 336
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 336) == "admin")) ? ("👑 Admin") : ("👤 User"));
            yield "
                                    </span>
                                </td>
                                <td>";
            // line 339
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "region", [], "any", false, false, false, 339)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "region", [], "any", false, false, false, 339), "html", null, true)) : ("-"));
            yield "</td>
                            </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 342
        yield "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bouton retour -->
    <div class=\"text-center mt-4\">
        <a href=\"";
        // line 351
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_liste");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste des utilisateurs
        </a>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Graphique Camembert - Répartition des rôles
        const ctxPie = document.getElementById('roleChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Administrateurs', 'Clients'],
                datasets: [{
                    data: [";
        // line 367
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalAdmins"]) || array_key_exists("totalAdmins", $context) ? $context["totalAdmins"] : (function () { throw new RuntimeError('Variable "totalAdmins" does not exist.', 367, $this->source); })()), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalClients"]) || array_key_exists("totalClients", $context) ? $context["totalClients"] : (function () { throw new RuntimeError('Variable "totalClients" does not exist.', 367, $this->source); })()), "html", null, true);
        yield "],
                    backgroundColor: ['#FF6B6B', '#4CAF50'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percent = Math.round((value / total) * 100);
                                return `\${label}: \${value} (\${percent}%)`;
                            }
                        }
                    }
                },
                cutout: '60%'
            }
        });
        
        // Préparer les données pour les régions
        const regionData = [
            ";
        // line 398
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["statsRegions"]) || array_key_exists("statsRegions", $context) ? $context["statsRegions"] : (function () { throw new RuntimeError('Variable "statsRegions" does not exist.', 398, $this->source); })()));
        foreach ($context['_seq'] as $context["region"] => $context["count"]) {
            // line 399
            yield "                { nom: '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["region"], "html", null, true);
            yield "', count: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
            yield " },
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['region'], $context['count'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 401
        yield "        ];
        
        // Trier par nombre décroissant et prendre top 10
        regionData.sort((a, b) => b.count - a.count);
        const topRegions = regionData.slice(0, 10);
        const regionsLabels = topRegions.map(r => r.nom);
        const regionsCounts = topRegions.map(r => r.count);
        
        // Graphique Barres - Top régions
        const ctxBar = document.getElementById('regionChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: regionsLabels,
                datasets: [{
                    label: 'Nombre d\\'utilisateurs',
                    data: regionsCounts,
                    backgroundColor: 'rgba(255, 107, 107, 0.7)',
                    borderRadius: 8,
                    barPercentage: 0.7,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Utilisateurs: \${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0e6d6'
                        },
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nombre d\\'utilisateurs'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            rotation: 45,
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
        
        // Graphique Ligne - Évolution des inscriptions
        const ctxLine = document.getElementById('evolutionChart').getContext('2d');
        const evolutionData = ";
        // line 469
        yield json_encode((isset($context["evolution"]) || array_key_exists("evolution", $context) ? $context["evolution"] : (function () { throw new RuntimeError('Variable "evolution" does not exist.', 469, $this->source); })()));
        yield ";
        const mois = evolutionData.map(item => item.mois);
        const inscriptions = evolutionData.map(item => item.inscriptions);
        
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: mois,
                datasets: [{
                    label: 'Inscriptions',
                    data: inscriptions,
                    borderColor: '#FF6B6B',
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#FF6B6B',
                    pointBorderColor: 'white',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Inscriptions: \${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0e6d6'
                        },
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nombre d\\'inscriptions'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Mois'
                        }
                    }
                }
            }
        });
        
        // Animation des barres de progression
        const progressBars = document.querySelectorAll('.progress-fill');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 200);
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
        return "admin/statistiques.html.twig";
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
        return array (  641 => 469,  571 => 401,  560 => 399,  556 => 398,  520 => 367,  501 => 351,  490 => 342,  481 => 339,  475 => 336,  471 => 335,  466 => 333,  460 => 330,  455 => 328,  448 => 324,  445 => 323,  441 => 322,  383 => 267,  376 => 263,  354 => 244,  349 => 242,  340 => 236,  335 => 234,  325 => 227,  315 => 219,  305 => 218,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Tableau de bord - Statistiques{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link href=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\" rel=\"stylesheet\">
<style>
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF6B6B, #FF8E53);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .stat-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        color: #333;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 14px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .stat-percent {
        font-size: 14px;
        margin-top: 10px;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .percent-admin {
        background: #FF6B6B20;
        color: #FF6B6B;
    }
    
    .percent-client {
        background: #4CAF5020;
        color: #4CAF50;
    }
    
    .chart-container {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .chart-container:hover {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }
    
    .chart-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0e6d6;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .chart-title i {
        color: #FF6B6B;
        font-size: 22px;
    }
    
    .chart-wrapper {
        position: relative;
        height: 300px;
        margin: 20px 0;
    }
    
    canvas {
        max-height: 300px;
        width: 100%;
    }
    
    .stats-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
        justify-content: center;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #666;
    }
    
    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 3px;
    }
    
    .user-avatar-sm {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }
    
    .badge-role {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .badge-admin {
        background: #FF6B6B20;
        color: #FF6B6B;
    }
    
    .badge-user {
        background: #4CAF5020;
        color: #4CAF50;
    }
    
    .region-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f0e6d6;
        transition: all 0.3s ease;
    }
    
    .region-item:hover {
        background: #fefcf8;
        transform: translateX(5px);
    }
    
    .region-name {
        font-weight: 500;
        color: #333;
    }
    
    .region-count {
        background: #FF6B6B;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .progress-bar-custom {
        height: 8px;
        background: #f0e6d6;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 8px;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #FF6B6B, #FF8E53);
        border-radius: 10px;
        transition: width 1s ease;
    }
    
    @media (max-width: 768px) {
        .chart-wrapper {
            height: 250px;
        }
        .stat-number {
            font-size: 28px;
        }
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"container-fluid\">
    <h2 class=\"mb-4\">📊 Tableau de bord statistique</h2>
    
    <!-- Cartes statistiques -->
    <div class=\"row mb-4\">
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👥</div>
                <div class=\"stat-number\">{{ totalUsers }}</div>
                <div class=\"stat-label\">Total utilisateurs</div>
            </div>
        </div>
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👑</div>
                <div class=\"stat-number\">{{ totalAdmins }}</div>
                <div class=\"stat-label\">Administrateurs</div>
                <div class=\"stat-percent percent-admin\">{{ pourcentageAdmin }}%</div>
            </div>
        </div>
        <div class=\"col-md-4 mb-3\">
            <div class=\"stat-card\">
                <div class=\"stat-icon\">👤</div>
                <div class=\"stat-number\">{{ totalClients }}</div>
                <div class=\"stat-label\">Clients</div>
                <div class=\"stat-percent percent-client\">{{ pourcentageClient }}%</div>
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <!-- Graphique Camembert - Répartition Admin/User -->
        <div class=\"col-md-6 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-pie\"></i>
                    <span>Répartition des rôles</span>
                </div>
                <div class=\"chart-wrapper\">
                    <canvas id=\"roleChart\" width=\"400\" height=\"300\"></canvas>
                </div>
                <div class=\"stats-legend\">
                    <div class=\"legend-item\">
                        <div class=\"legend-color\" style=\"background: #FF6B6B;\"></div>
                        <span>Administrateurs ({{ totalAdmins }})</span>
                    </div>
                    <div class=\"legend-item\">
                        <div class=\"legend-color\" style=\"background: #4CAF50;\"></div>
                        <span>Clients ({{ totalClients }})</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Graphique Barres - Top 10 Régions -->
        <div class=\"col-md-6 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-bar\"></i>
                    <span>Top 10 des régions</span>
                </div>
                <div class=\"chart-wrapper\">
                    <canvas id=\"regionChart\" width=\"400\" height=\"300\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <!-- Graphique Ligne - Évolution des inscriptions -->
        <div class=\"col-12 mb-4\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-chart-line\"></i>
                    <span>Évolution des inscriptions (6 derniers mois)</span>
                </div>
                <div class=\"chart-wrapper\" style=\"height: 350px;\">
                    <canvas id=\"evolutionChart\"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Derniers utilisateurs inscrits -->
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"chart-container\">
                <div class=\"chart-title\">
                    <i class=\"fas fa-user-plus\"></i>
                    <span>Derniers utilisateurs inscrits</span>
                </div>
                <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Région</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for user in derniersUsers %}
                            <tr>
                                <td>{{ user.idUtilisateur }}</td>
                                <td>
                                    <div class=\"d-flex align-items-center gap-2\">
                                        <div class=\"user-avatar-sm\">
                                            {{ user.nom|first|upper }}
                                        </div>
                                        {{ user.nom }}
                                    </div>
                                </td>
                                <td>{{ user.email }}</td>
                                <td>
                                    <span class=\"badge-role {{ user.role == 'admin' ? 'badge-admin' : 'badge-user' }}\">
                                        {{ user.role == 'admin' ? '👑 Admin' : '👤 User' }}
                                    </span>
                                </td>
                                <td>{{ user.region ?: '-' }}</td>
                            </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bouton retour -->
    <div class=\"text-center mt-4\">
        <a href=\"{{ path('app_utilisateur_liste') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour à la liste des utilisateurs
        </a>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Graphique Camembert - Répartition des rôles
        const ctxPie = document.getElementById('roleChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Administrateurs', 'Clients'],
                datasets: [{
                    data: [{{ totalAdmins }}, {{ totalClients }}],
                    backgroundColor: ['#FF6B6B', '#4CAF50'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percent = Math.round((value / total) * 100);
                                return `\${label}: \${value} (\${percent}%)`;
                            }
                        }
                    }
                },
                cutout: '60%'
            }
        });
        
        // Préparer les données pour les régions
        const regionData = [
            {% for region, count in statsRegions %}
                { nom: '{{ region }}', count: {{ count }} },
            {% endfor %}
        ];
        
        // Trier par nombre décroissant et prendre top 10
        regionData.sort((a, b) => b.count - a.count);
        const topRegions = regionData.slice(0, 10);
        const regionsLabels = topRegions.map(r => r.nom);
        const regionsCounts = topRegions.map(r => r.count);
        
        // Graphique Barres - Top régions
        const ctxBar = document.getElementById('regionChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: regionsLabels,
                datasets: [{
                    label: 'Nombre d\\'utilisateurs',
                    data: regionsCounts,
                    backgroundColor: 'rgba(255, 107, 107, 0.7)',
                    borderRadius: 8,
                    barPercentage: 0.7,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Utilisateurs: \${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0e6d6'
                        },
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nombre d\\'utilisateurs'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            rotation: 45,
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
        
        // Graphique Ligne - Évolution des inscriptions
        const ctxLine = document.getElementById('evolutionChart').getContext('2d');
        const evolutionData = {{ evolution|json_encode|raw }};
        const mois = evolutionData.map(item => item.mois);
        const inscriptions = evolutionData.map(item => item.inscriptions);
        
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: mois,
                datasets: [{
                    label: 'Inscriptions',
                    data: inscriptions,
                    borderColor: '#FF6B6B',
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#FF6B6B',
                    pointBorderColor: 'white',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Inscriptions: \${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0e6d6'
                        },
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nombre d\\'inscriptions'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Mois'
                        }
                    }
                }
            }
        });
        
        // Animation des barres de progression
        const progressBars = document.querySelectorAll('.progress-fill');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 200);
        });
    });
</script>
{% endblock %}", "admin/statistiques.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin\\statistiques.html.twig");
    }
}

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

/* utilisateur/export_pdf.html.twig */
class __TwigTemplate_c6e3d741896485c6faf236f5f77aadd5 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/export_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Liste des utilisateurs - Koul Dyeri</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 20px;
        }
        h1 {
            color: #D2691E;
            border-bottom: 2px solid #D2691E;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #FF6B6B;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .badge-admin {
            background: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            display: inline-block;
        }
        .badge-user {
            background: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            display: inline-block;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>📋 Liste des utilisateurs - Koul Dyeri</h1>
    <div class=\"info\">
        Généré le : ";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 66, $this->source); })()), "d/m/Y H:i:s"), "html", null, true);
        yield "<br>
        ";
        // line 67
        if ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 67, $this->source); })()), "search", [], "any", false, false, false, 67) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 67, $this->source); })()), "email", [], "any", false, false, false, 67)) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 67, $this->source); })()), "role", [], "any", false, false, false, 67)) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 67, $this->source); })()), "region", [], "any", false, false, false, 67))) {
            // line 68
            yield "            Filtres actifs :
            ";
            // line 69
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 69, $this->source); })()), "search", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "🔍 Nom/ID : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 69, $this->source); })()), "search", [], "any", false, false, false, 69), "html", null, true);
                yield " ";
            }
            // line 70
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 70, $this->source); })()), "email", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "📧 Email : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 70, $this->source); })()), "email", [], "any", false, false, false, 70), "html", null, true);
                yield " ";
            }
            // line 71
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 71, $this->source); })()), "role", [], "any", false, false, false, 71)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "👤 Rôle : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 71, $this->source); })()), "role", [], "any", false, false, false, 71), "html", null, true);
                yield " ";
            }
            // line 72
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 72, $this->source); })()), "region", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "📍 Région : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 72, $this->source); })()), "region", [], "any", false, false, false, 72), "html", null, true);
                yield " ";
            }
            // line 73
            yield "        ";
        } else {
            // line 74
            yield "            Aucun filtre
        ";
        }
        // line 76
        yield "        ";
        if ((($tmp = (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 76, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " - Tri : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 76, $this->source); })()), "html", null, true);
        }
        // line 77
        yield "    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Région</th>
                <th>Date naissance</th>
                <th>⭐ Points</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 93, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 94
            yield "            <tr>
                <td>";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 95), "html", null, true);
            yield "</td>
                <td>";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 96), "html", null, true);
            yield "</td>
                <td>";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 97), "html", null, true);
            yield "</td>
                <td>
                    ";
            // line 99
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 99) == "admin")) {
                // line 100
                yield "                        <span class=\"badge-admin\">Admin</span>
                    ";
            } else {
                // line 102
                yield "                        <span class=\"badge-user\">User</span>
                    ";
            }
            // line 104
            yield "                </td>
                <td>";
            // line 105
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 105)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 105), "html", null, true)) : ("-"));
            yield "</td>
                <td>";
            // line 106
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 106), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                <td>";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", true, true, false, 107)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", false, false, false, 107), 0)) : (0)), "html", null, true);
            yield "</td>
                <td>
                    ";
            // line 109
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isBanned", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 110
                yield "                        Banni
                    ";
            } else {
                // line 112
                yield "                        Actif
                    ";
            }
            // line 114
            yield "                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        yield "        </tbody>
    </table>
    <footer>
        Koul Dyeri - Programme de fidélité - ";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield "
    </footer>
</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "utilisateur/export_pdf.html.twig";
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
        return array (  248 => 120,  243 => 117,  235 => 114,  231 => 112,  227 => 110,  225 => 109,  220 => 107,  216 => 106,  212 => 105,  209 => 104,  205 => 102,  201 => 100,  199 => 99,  194 => 97,  190 => 96,  186 => 95,  183 => 94,  179 => 93,  161 => 77,  155 => 76,  151 => 74,  148 => 73,  141 => 72,  134 => 71,  127 => 70,  121 => 69,  118 => 68,  116 => 67,  112 => 66,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Liste des utilisateurs - Koul Dyeri</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 20px;
        }
        h1 {
            color: #D2691E;
            border-bottom: 2px solid #D2691E;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #FF6B6B;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .badge-admin {
            background: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            display: inline-block;
        }
        .badge-user {
            background: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            display: inline-block;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>📋 Liste des utilisateurs - Koul Dyeri</h1>
    <div class=\"info\">
        Généré le : {{ date|date('d/m/Y H:i:s') }}<br>
        {% if filters.search or filters.email or filters.role or filters.region %}
            Filtres actifs :
            {% if filters.search %}🔍 Nom/ID : {{ filters.search }} {% endif %}
            {% if filters.email %}📧 Email : {{ filters.email }} {% endif %}
            {% if filters.role %}👤 Rôle : {{ filters.role }} {% endif %}
            {% if filters.region %}📍 Région : {{ filters.region }} {% endif %}
        {% else %}
            Aucun filtre
        {% endif %}
        {% if sort %} - Tri : {{ sort }}{% endif %}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Région</th>
                <th>Date naissance</th>
                <th>⭐ Points</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            {% for u in utilisateurs %}
            <tr>
                <td>{{ u.idUtilisateur }}</td>
                <td>{{ u.nom }}</td>
                <td>{{ u.email }}</td>
                <td>
                    {% if u.role == 'admin' %}
                        <span class=\"badge-admin\">Admin</span>
                    {% else %}
                        <span class=\"badge-user\">User</span>
                    {% endif %}
                </td>
                <td>{{ u.region ?: '-' }}</td>
                <td>{{ u.dateNaissance ? u.dateNaissance|date('d/m/Y') : '-' }}</td>
                <td>{{ u.pointsFidelite|default(0) }}</td>
                <td>
                    {% if u.isBanned %}
                        Banni
                    {% else %}
                        Actif
                    {% endif %}
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    <footer>
        Koul Dyeri - Programme de fidélité - {{ 'now'|date('Y') }}
    </footer>
</body>
</html>", "utilisateur/export_pdf.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\export_pdf.html.twig");
    }
}

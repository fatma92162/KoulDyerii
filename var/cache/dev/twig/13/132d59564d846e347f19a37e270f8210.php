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

/* utilisateur/profil_admin.html.twig */
class __TwigTemplate_fba95bbf2876bff3ef0f674ec0c50921 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/profil_admin.html.twig"));

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

        yield "Mon Profil";
        
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
    <div style=\"text-align: center; padding: 30px 0 20px;\">
        <div style=\"width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);\">
            ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 9, $this->source); })()), "photo", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 10, $this->source); })()), "photo", [], "any", false, false, false, 10), "html", null, true);
            yield "\" alt=\"Photo\" style=\"width: 100%; height: 100%; object-fit: cover;\">
            ";
        } else {
            // line 12
            yield "                <span style=\"font-size: 60px;\">🍽️</span>
            ";
        }
        // line 14
        yield "        </div>
        <h2 style=\"font-size: 26px; font-weight: 700; color: #333;\">";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 15, $this->source); })()), "nom", [], "any", false, false, false, 15), "html", null, true);
        yield "</h2>
        <span style=\"display: inline-block; padding: 5px 15px; border-radius: 50px; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; font-size: 12px; font-weight: 600; text-transform: uppercase;\">
            👑 Administrateur
        </span>
    </div>

    <hr style=\"border-color: #f0e6d6; margin: 20px 0;\">

    <h3 style=\"font-size: 18px; font-weight: 700; color: #333; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 3px solid #FF6B6B; display: inline-block;\">
        📋 Informations personnelles
    </h3>

    <div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 20px;\">
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">ID utilisateur</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">#";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 30, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 30), "html", null, true);
        yield "</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">Nom complet</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 34, $this->source); })()), "nom", [], "any", false, false, false, 34), "html", null, true);
        yield "</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">Adresse email</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 38, $this->source); })()), "email", [], "any", false, false, false, 38), "html", null, true);
        yield "</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">📍 Région</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">";
        // line 42
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 42, $this->source); })()), "region", [], "any", false, false, false, 42)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 42, $this->source); })()), "region", [], "any", false, false, false, 42), "html", null, true)) : ("Non renseignée"));
        yield "</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">🎂 Date de naissance</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">";
        // line 46
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 46, $this->source); })()), "dateNaissance", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 46, $this->source); })()), "dateNaissance", [], "any", false, false, false, 46), "d/m/Y"), "html", null, true)) : ("Non renseignée"));
        yield "</div>
        </div>
    </div>

    <div style=\"display: flex; gap: 15px; justify-content: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #f0e6d6;\">
        <a href=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 51, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 51)]), "html", null, true);
        yield "\" 
           style=\"padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; display: inline-flex; align-items: center; gap: 10px;\">
            ✏️ Modifier mon profil
        </a>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "utilisateur/profil_admin.html.twig";
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
        return array (  159 => 51,  151 => 46,  144 => 42,  137 => 38,  130 => 34,  123 => 30,  105 => 15,  102 => 14,  98 => 12,  92 => 10,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Mon Profil{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div style=\"text-align: center; padding: 30px 0 20px;\">
        <div style=\"width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);\">
            {% if utilisateur.photo %}
                <img src=\"{{ utilisateur.photo }}\" alt=\"Photo\" style=\"width: 100%; height: 100%; object-fit: cover;\">
            {% else %}
                <span style=\"font-size: 60px;\">🍽️</span>
            {% endif %}
        </div>
        <h2 style=\"font-size: 26px; font-weight: 700; color: #333;\">{{ utilisateur.nom }}</h2>
        <span style=\"display: inline-block; padding: 5px 15px; border-radius: 50px; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; font-size: 12px; font-weight: 600; text-transform: uppercase;\">
            👑 Administrateur
        </span>
    </div>

    <hr style=\"border-color: #f0e6d6; margin: 20px 0;\">

    <h3 style=\"font-size: 18px; font-weight: 700; color: #333; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 3px solid #FF6B6B; display: inline-block;\">
        📋 Informations personnelles
    </h3>

    <div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 20px;\">
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">ID utilisateur</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">#{{ utilisateur.idUtilisateur }}</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">Nom complet</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">{{ utilisateur.nom }}</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">Adresse email</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">{{ utilisateur.email }}</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">📍 Région</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">{{ utilisateur.region ?: 'Non renseignée' }}</div>
        </div>
        <div style=\"background: #fefcf8; padding: 15px 20px; border-radius: 15px; border: 1px solid #f0e6d6;\">
            <div style=\"font-size: 12px; text-transform: uppercase; color: #FF6B6B; font-weight: 600; letter-spacing: 1px; margin-bottom: 8px;\">🎂 Date de naissance</div>
            <div style=\"font-size: 18px; font-weight: 500; color: #333;\">{{ utilisateur.dateNaissance ? utilisateur.dateNaissance|date('d/m/Y') : 'Non renseignée' }}</div>
        </div>
    </div>

    <div style=\"display: flex; gap: 15px; justify-content: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #f0e6d6;\">
        <a href=\"{{ path('app_utilisateur_editer', {id: utilisateur.idUtilisateur}) }}\" 
           style=\"padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; display: inline-flex; align-items: center; gap: 10px;\">
            ✏️ Modifier mon profil
        </a>
    </div>
</div>
{% endblock %}", "utilisateur/profil_admin.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\profil_admin.html.twig");
    }
}

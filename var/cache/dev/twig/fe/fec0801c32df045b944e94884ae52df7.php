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

/* message/Inbox.html.twig */
class __TwigTemplate_5c1000dfd5905d53850dd56bccca4cde extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/Inbox.html.twig"));

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

        yield "Mes messages";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container mt-4\" style=\"max-width: 800px;\">
    <h2 class=\"mb-4\">📬 Messagerie</h2>
    <div class=\"list-group\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["conversations"]) || array_key_exists("conversations", $context) ? $context["conversations"] : (function () { throw new RuntimeError('Variable "conversations" does not exist.', 9, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["conv"]) {
            // line 10
            yield "            ";
            $context["other"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["others"]) || array_key_exists("others", $context) ? $context["others"] : (function () { throw new RuntimeError('Variable "others" does not exist.', 10, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["conv"], "other_user_id", [], "any", false, false, false, 10), [], "array", false, false, false, 10);
            // line 11
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_messages_conversation", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["conv"], "other_user_id", [], "any", false, false, false, 11)]), "html", null, true);
            yield "\" class=\"list-group-item list-group-item-action d-flex justify-content-between align-items-center\">
                <div>
                    <strong>";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["other"]) || array_key_exists("other", $context) ? $context["other"] : (function () { throw new RuntimeError('Variable "other" does not exist.', 13, $this->source); })()), "nom", [], "any", false, false, false, 13), "html", null, true);
            yield "</strong>
                    <small class=\"text-muted d-block\">";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["conv"], "last_message_date", [], "any", false, false, false, 14), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                </div>
            </a>
        ";
            $context['_iterated'] = true;
        }
        // line 17
        if (!$context['_iterated']) {
            // line 18
            yield "            <div class=\"text-center py-5 text-muted\">Aucune conversation</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['conv'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        yield "    </div>
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
        return "message/Inbox.html.twig";
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
        return array (  125 => 20,  118 => 18,  116 => 17,  108 => 14,  104 => 13,  98 => 11,  95 => 10,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes messages{% endblock %}

{% block body %}
<div class=\"container mt-4\" style=\"max-width: 800px;\">
    <h2 class=\"mb-4\">📬 Messagerie</h2>
    <div class=\"list-group\">
        {% for conv in conversations %}
            {% set other = others[conv.other_user_id] %}
            <a href=\"{{ path('app_messages_conversation', {id: conv.other_user_id}) }}\" class=\"list-group-item list-group-item-action d-flex justify-content-between align-items-center\">
                <div>
                    <strong>{{ other.nom }}</strong>
                    <small class=\"text-muted d-block\">{{ conv.last_message_date|date('d/m/Y H:i') }}</small>
                </div>
            </a>
        {% else %}
            <div class=\"text-center py-5 text-muted\">Aucune conversation</div>
        {% endfor %}
    </div>
</div>
{% endblock %}", "message/Inbox.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\message\\Inbox.html.twig");
    }
}

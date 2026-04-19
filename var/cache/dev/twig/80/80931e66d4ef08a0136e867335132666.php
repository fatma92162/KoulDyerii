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

/* message/Conversation.html.twig */
class __TwigTemplate_69d1df7483380b442440d7a0533be9ac extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/Conversation.html.twig"));

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

        yield "Conversation avec ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["otherUser"]) || array_key_exists("otherUser", $context) ? $context["otherUser"] : (function () { throw new RuntimeError('Variable "otherUser" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
    <h2 class=\"mb-3\">💬 Conversation avec ";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["otherUser"]) || array_key_exists("otherUser", $context) ? $context["otherUser"] : (function () { throw new RuntimeError('Variable "otherUser" does not exist.', 7, $this->source); })()), "nom", [], "any", false, false, false, 7), "html", null, true);
        yield "</h2>
    <div class=\"card\">
        <div class=\"card-body\" style=\"height: 400px; overflow-y: auto;\" id=\"message-list\">
            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 10, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 11
            yield "                <div class=\"mb-3 ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "sender", [], "any", false, false, false, 11), "idUtilisateur", [], "any", false, false, false, 11) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11), "idUtilisateur", [], "any", false, false, false, 11))) {
                yield "text-end";
            }
            yield "\">
                    <div class=\"d-inline-block p-2 rounded ";
            // line 12
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "sender", [], "any", false, false, false, 12), "idUtilisateur", [], "any", false, false, false, 12) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "idUtilisateur", [], "any", false, false, false, 12))) {
                yield "bg-primary text-white";
            } else {
                yield "bg-light";
            }
            yield "\" style=\"max-width: 75%;\">
                        ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "content", [], "any", false, false, false, 13), "html", null, true);
            yield "
                    </div>
                    <div class=\"small text-muted mt-1\">";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "createdAt", [], "any", false, false, false, 15), "H:i, d/m/Y"), "html", null, true);
            yield "</div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "        </div>
        <div class=\"card-footer\">
            <form method=\"post\">
                <div class=\"input-group\">
                    <textarea name=\"content\" class=\"form-control\" rows=\"2\" placeholder=\"Écrivez votre message...\" required></textarea>
                    <button class=\"btn btn-primary\" type=\"submit\">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const msgList = document.getElementById('message-list');
        if (msgList) msgList.scrollTop = msgList.scrollHeight;
    </script>
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
        return "message/Conversation.html.twig";
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
        return array (  128 => 18,  119 => 15,  114 => 13,  106 => 12,  99 => 11,  95 => 10,  89 => 7,  86 => 6,  76 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Conversation avec {{ otherUser.nom }}{% endblock %}

{% block body %}
<div class=\"container mt-4\" style=\"max-width: 800px;\">
    <h2 class=\"mb-3\">💬 Conversation avec {{ otherUser.nom }}</h2>
    <div class=\"card\">
        <div class=\"card-body\" style=\"height: 400px; overflow-y: auto;\" id=\"message-list\">
            {% for msg in messages %}
                <div class=\"mb-3 {% if msg.sender.idUtilisateur == app.user.idUtilisateur %}text-end{% endif %}\">
                    <div class=\"d-inline-block p-2 rounded {% if msg.sender.idUtilisateur == app.user.idUtilisateur %}bg-primary text-white{% else %}bg-light{% endif %}\" style=\"max-width: 75%;\">
                        {{ msg.content }}
                    </div>
                    <div class=\"small text-muted mt-1\">{{ msg.createdAt|date('H:i, d/m/Y') }}</div>
                </div>
            {% endfor %}
        </div>
        <div class=\"card-footer\">
            <form method=\"post\">
                <div class=\"input-group\">
                    <textarea name=\"content\" class=\"form-control\" rows=\"2\" placeholder=\"Écrivez votre message...\" required></textarea>
                    <button class=\"btn btn-primary\" type=\"submit\">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const msgList = document.getElementById('message-list');
        if (msgList) msgList.scrollTop = msgList.scrollHeight;
    </script>
</div>
{% endblock %}", "message/Conversation.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\message\\Conversation.html.twig");
    }
}

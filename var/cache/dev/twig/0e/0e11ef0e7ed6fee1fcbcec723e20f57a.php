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

/* chat/index.html.twig */
class __TwigTemplate_b4c0450e5d88ef23edae8fa38b8634a6 extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "chat/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        yield "<div class=\"container mt-5\">
    <h2>🤖 Assistant Koul Dyeri</h2>
    <div id=\"chat-box\" class=\"border p-3 mb-3 bg-white rounded\" style=\"height: 400px; overflow-y: scroll;\">
        <div class=\"message bot mb-2 p-2 rounded bg-light\">
            <strong>Assistant</strong><br>
            Bonjour ! Posez-moi toutes vos questions sur les points, les récompenses ou votre compte. 😊
        </div>
    </div>
    <div class=\"input-group\">
        <input type=\"text\" id=\"user-input\" class=\"form-control\" placeholder=\"Votre question...\">
        <button id=\"send-btn\" class=\"btn btn-primary\">Envoyer</button>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chat-box');
    const input = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');

    function addMessage(text, isUser) {
        const div = document.createElement('div');
        div.className = message \${isUser ? 'user text-end ms-auto bg-primary text-white' : 'bot bg-light'} mb-2 p-2 rounded;
        div.style.maxWidth = '75%';
        div.innerHTML = <strong>\${isUser ? 'Moi' : 'Assistant'}</strong><br>\${text};
        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    async function sendMessage() {
        const message = input.value.trim();
        if (!message) return;

        addMessage(message, true);
        input.value = '';
        addMessage('...', false);

        try {
            const resp = await fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message })
            });

            const data = await resp.json();
            chatBox.lastChild.remove();

            addMessage(data.reply || data.error || 'Erreur technique', false);
        } catch (err) {
            chatBox.lastChild.remove();
            addMessage('Erreur technique', false);
        }
    }

    sendBtn.addEventListener('click', sendMessage);

    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
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
        return "chat/index.html.twig";
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
        return array (  67 => 5,  57 => 4,  40 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/chat/index.html.twig #}
{% extends 'base.html.twig' %}

{% block body %}
<div class=\"container mt-5\">
    <h2>🤖 Assistant Koul Dyeri</h2>
    <div id=\"chat-box\" class=\"border p-3 mb-3 bg-white rounded\" style=\"height: 400px; overflow-y: scroll;\">
        <div class=\"message bot mb-2 p-2 rounded bg-light\">
            <strong>Assistant</strong><br>
            Bonjour ! Posez-moi toutes vos questions sur les points, les récompenses ou votre compte. 😊
        </div>
    </div>
    <div class=\"input-group\">
        <input type=\"text\" id=\"user-input\" class=\"form-control\" placeholder=\"Votre question...\">
        <button id=\"send-btn\" class=\"btn btn-primary\">Envoyer</button>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chat-box');
    const input = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');

    function addMessage(text, isUser) {
        const div = document.createElement('div');
        div.className = message \${isUser ? 'user text-end ms-auto bg-primary text-white' : 'bot bg-light'} mb-2 p-2 rounded;
        div.style.maxWidth = '75%';
        div.innerHTML = <strong>\${isUser ? 'Moi' : 'Assistant'}</strong><br>\${text};
        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    async function sendMessage() {
        const message = input.value.trim();
        if (!message) return;

        addMessage(message, true);
        input.value = '';
        addMessage('...', false);

        try {
            const resp = await fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message })
            });

            const data = await resp.json();
            chatBox.lastChild.remove();

            addMessage(data.reply || data.error || 'Erreur technique', false);
        } catch (err) {
            chatBox.lastChild.remove();
            addMessage('Erreur technique', false);
        }
    }

    sendBtn.addEventListener('click', sendMessage);

    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
</script>
{% endblock %}", "chat/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\chat\\index.html.twig");
    }
}

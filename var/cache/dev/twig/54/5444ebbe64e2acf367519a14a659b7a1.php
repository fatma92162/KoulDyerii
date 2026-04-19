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

/* utilisateur/profil.html.twig */
class __TwigTemplate_cb0493f78f72b2b5f0c608b76c5a47af extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/profil.html.twig"));

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

        yield "Mon Profil | Koul Dyeri";
        
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
    /* ===== STYLE PROFESSIONNEL ROUGE BORDEAUX ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --beige-fonce: #E8D5B7;
        --gold: #D4AF37;
        --dark: #1a1a2e;
    }

    body {
        background: linear-gradient(135deg, var(--beige) 0%, var(--beige-fonce) 100%);
    }

    .profile-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    
    /* Cover photo */
    .cover-container {
        position: relative;
        margin-bottom: 80px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(139,0,0,0.15);
    }
    
    .cover-photo {
        width: 100%;
        height: 320px;
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        position: relative;
        overflow: hidden;
    }
    
    .cover-photo::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='rgba(255,255,255,0.05)' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        background-repeat: repeat;
        background-size: 40px;
    }
    
    .cover-edit {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 40px;
        color: white;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        z-index: 2;
    }
    
    .cover-edit:hover {
        background: rgba(0,0,0,0.8);
        color: var(--gold);
        transform: translateY(-2px);
    }
    
    /* Avatar */
    .avatar-container {
        position: absolute;
        bottom: -60px;
        left: 50px;
        z-index: 10;
    }
    
    .profile-avatar-main {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: white;
        padding: 5px;
        box-shadow: 0 10px 25px rgba(139,0,0,0.2);
        transition: all 0.3s;
        border: 2px solid var(--gold);
    }
    
    .profile-avatar-main:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 35px rgba(139,0,0,0.3);
    }
    
    .profile-avatar-main img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .avatar-edit {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid var(--gold);
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    
    .avatar-edit:hover {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--bordeaux-fonce), var(--bordeaux));
    }
    
    /* Info bar */
    .profile-info-bar {
        background: white;
        border-radius: 20px;
        padding: 25px 35px 25px 240px;
        margin-top: -25px;
        box-shadow: 0 5px 20px rgba(139,0,0,0.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        border-bottom: 3px solid var(--bordeaux);
    }
    
    .profile-name-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
        margin-bottom: 8px;
    }
    
    .profile-bio {
        color: #666;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .profile-bio span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .role-badge-modern {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .action-buttons-modern {
        display: flex;
        gap: 12px;
    }
    
    .btn-modern {
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    
    .btn-primary-modern {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }
    
    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.4);
        color: white;
    }
    
    .btn-outline-modern {
        background: #f0f2f5;
        color: var(--bordeaux);
    }
    
    .btn-outline-modern:hover {
        background: #e4e6eb;
        transform: translateY(-2px);
        color: var(--bordeaux-fonce);
    }
    
    /* Points widget */
    .points-widget {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        border-radius: 20px;
        padding: 25px;
        margin: 25px 0;
        color: white;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(139,0,0,0.3);
        position: relative;
        overflow: hidden;
    }
    
    .points-widget::before {
        content: '⭐';
        position: absolute;
        top: -30px;
        right: -30px;
        font-size: 120px;
        opacity: 0.08;
    }
    
    .points-widget:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(139,0,0,0.4);
    }
    
    .points-widget .points-value {
        font-size: 42px;
        font-weight: 800;
        color: var(--gold);
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .progress-modern {
        height: 8px;
        background: rgba(255,255,255,0.25);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .progress-modern .progress-bar {
        background: var(--gold);
        border-radius: 10px;
    }
    
    /* Posts section */
    .posts-section {
        margin-top: 30px;
    }
    
    .posts-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        background: white;
        padding: 15px 25px;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-left: 4px solid var(--bordeaux);
    }
    
    .posts-header h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .post-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s;
        border: 1px solid #f0e6d6;
    }
    
    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(139,0,0,0.1);
        border-color: var(--bordeaux-light);
    }
    
    .post-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .post-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(139,0,0,0.2);
    }
    
    .post-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .post-avatar span {
        color: white;
        font-weight: bold;
        font-size: 20px;
    }
    
    .post-info h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .post-info small {
        font-size: 12px;
        color: #888;
    }
    
    .post-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux-fonce);
        margin-bottom: 15px;
        line-height: 1.3;
    }
    
    .post-content {
        color: #4a5568;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .post-image {
        margin-bottom: 20px;
        border-radius: 16px;
        overflow: hidden;
    }
    
    .post-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .post-image:hover img {
        transform: scale(1.02);
    }
    
    .post-stats {
        display: flex;
        gap: 25px;
        padding-top: 15px;
        border-top: 1px solid #f0e6d6;
        color: #666;
        font-size: 14px;
    }
    
    .post-stats i {
        margin-right: 6px;
    }
    
    .post-stats .fa-heart {
        color: var(--bordeaux);
    }
    
    .no-posts {
        background: white;
        border-radius: 20px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .no-posts i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.3;
        margin-bottom: 20px;
    }
    
    .no-posts p {
        color: #666;
        font-size: 16px;
        margin-bottom: 20px;
    }
    
    /* Chatbot IA */
    .chat-widget {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }
    
    .chat-button {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        box-shadow: 0 4px 15px rgba(139,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        color: white;
        font-size: 26px;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(139,0,0,0.4); }
        70% { box-shadow: 0 0 0 15px rgba(139,0,0,0); }
        100% { box-shadow: 0 0 0 0 rgba(139,0,0,0); }
    }
    
    .chat-button:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 25px rgba(139,0,0,0.5);
    }
    
    .chat-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 380px;
        height: 550px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        display: none;
        flex-direction: column;
        overflow: hidden;
        animation: slideUp 0.3s ease;
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .chat-window.open { display: flex; }
    
    .chat-header {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chat-header-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .chat-avatar {
        width: 45px;
        height: 45px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    
    .chat-header-text h3 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }
    
    .chat-header-text p {
        font-size: 11px;
        margin: 0;
        opacity: 0.8;
    }
    
    .close-chat {
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .close-chat:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    
    .chat-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: #f8f9fc;
    }
    
    .message {
        max-width: 85%;
        padding: 10px 15px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.4;
        word-wrap: break-word;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .message.user {
        align-self: flex-end;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border-bottom-right-radius: 4px;
    }
    
    .message.bot {
        align-self: flex-start;
        background: white;
        color: #333;
        border: 1px solid #e9ecef;
        border-bottom-left-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .message.bot::before {
        content: \"🤖\";
        margin-right: 8px;
    }
    
    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 10px 15px;
        background: white;
        border-radius: 18px;
        width: fit-content;
        border: 1px solid #e9ecef;
    }
    
    .typing-indicator span {
        width: 8px;
        height: 8px;
        background: #adb5bd;
        border-radius: 50%;
        animation: typing 1.4s infinite;
    }
    
    .typing-indicator span:nth-child(1) { animation-delay: 0s; }
    .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
    .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
    
    @keyframes typing {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
        30% { transform: translateY(-6px); opacity: 1; }
    }
    
    .chat-input-container {
        display: flex;
        padding: 15px 20px;
        background: white;
        border-top: 1px solid #e9ecef;
        gap: 10px;
    }
    
    .chat-input-container input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #e9ecef;
        border-radius: 30px;
        outline: none;
        font-size: 14px;
        transition: all 0.3s;
        background: #f8f9fc;
    }
    
    .chat-input-container input:focus {
        border-color: var(--bordeaux);
        background: white;
        box-shadow: 0 0 0 3px rgba(139,0,0,0.1);
    }
    
    .chat-input-container button {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        border-radius: 30px;
        color: white;
        padding: 12px 20px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .chat-input-container button:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.4);
    }
    
    .suggestions {
        padding: 10px 15px;
        background: white;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .suggestion-chip {
        background: #f0f2f5;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        cursor: pointer;
        transition: all 0.2s;
        color: var(--bordeaux);
    }
    
    .suggestion-chip:hover {
        background: var(--bordeaux);
        color: white;
    }
    
    @media (max-width: 768px) {
        .cover-photo { height: 200px; }
        .avatar-container { left: 20px; bottom: -50px; }
        .profile-avatar-main { width: 100px; height: 100px; }
        .profile-info-bar { padding: 15px 20px 15px 130px; }
        .profile-name-section h1 { font-size: 22px; }
        .action-buttons-modern { flex-direction: column; width: 100%; }
        .btn-modern { justify-content: center; }
        .chat-window { width: 320px; height: 500px; right: 10px; bottom: 75px; }
        .chat-widget { bottom: 20px; right: 20px; }
        .chat-button { width: 55px; height: 55px; font-size: 24px; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 686
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 687
        yield "<div class=\"profile-wrapper\">
    
    
    <!-- Avatar -->
    <div class=\"avatar-container\">
        <div class=\"profile-avatar-main\">
            ";
        // line 693
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 693, $this->source); })()), "photo", [], "any", false, false, false, 693)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 694
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 694, $this->source); })()), "photo", [], "any", false, false, false, 694), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 694, $this->source); })()), "nom", [], "any", false, false, false, 694), "html", null, true);
            yield "\">
            ";
        } else {
            // line 696
            yield "                <img src=\"https://ui-avatars.com/api/?name=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 696, $this->source); })()), "nom", [], "any", false, false, false, 696)), "html", null, true);
            yield "&background=8B0000&color=fff&bold=true&length=2&rounded=true&size=160\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 696, $this->source); })()), "nom", [], "any", false, false, false, 696), "html", null, true);
            yield "\">
            ";
        }
        // line 698
        yield "        </div>
        <div class=\"avatar-edit\" onclick=\"alert('Fonctionnalité à venir')\">
            <i class=\"fas fa-camera\"></i>
        </div>
    </div>
    
    <!-- Info bar -->
    <div class=\"profile-info-bar\">
        <div class=\"profile-name-section\">
            <h1>";
        // line 707
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 707, $this->source); })()), "nom", [], "any", false, false, false, 707), "html", null, true);
        yield "</h1>
            <div class=\"profile-bio\">
                <span><i class=\"fas fa-calendar-alt\"></i> Membre depuis 2024</span>
                <span class=\"role-badge-modern\">
                    ";
        // line 711
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 711, $this->source); })()), "role", [], "any", false, false, false, 711) == "admin")) {
            yield "👑 Administrateur";
        } else {
            yield "👤 Utilisateur";
        }
        // line 712
        yield "                </span>
            </div>
        </div>
        <div class=\"action-buttons-modern\">
            <a href=\"";
        // line 716
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 716, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 716)]), "html", null, true);
        yield "\" class=\"btn-modern btn-primary-modern\">
                <i class=\"fas fa-edit\"></i> Modifier
            </a>
            <a href=\"";
        // line 719
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_historique_index");
        yield "\" class=\"btn-modern btn-outline-modern\">
                <i class=\"fas fa-history\"></i> Historique
            </a>
            <a href=\"";
        // line 722
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recompenses_index");
        yield "\" class=\"btn-modern btn-outline-modern\">
                <i class=\"fas fa-gift\"></i> Récompenses
            </a>
        </div>
    </div>
    
    <!-- Points widget -->
    <div class=\"points-widget\" onclick=\"showPointsModal()\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <div>
                <div style=\"font-size: 14px; opacity: 0.9;\">Mes points de fidélité</div>
                <div class=\"points-value\">";
        // line 733
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("points", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["points"]) || array_key_exists("points", $context) ? $context["points"] : (function () { throw new RuntimeError('Variable "points" does not exist.', 733, $this->source); })()), 0)) : (0)), "html", null, true);
        yield " pts</div>
            </div>
            <div>
                <i class=\"fas fa-star\" style=\"font-size: 48px; color: var(--gold);\"></i>
            </div>
        </div>
        <div class=\"progress-modern mt-3\">
            ";
        // line 740
        $context["nextLevel"] = 500;
        // line 741
        yield "            ";
        $context["progress"] = Twig\Extension\CoreExtension::round(((((array_key_exists("points", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["points"]) || array_key_exists("points", $context) ? $context["points"] : (function () { throw new RuntimeError('Variable "points" does not exist.', 741, $this->source); })()), 0)) : (0)) / (isset($context["nextLevel"]) || array_key_exists("nextLevel", $context) ? $context["nextLevel"] : (function () { throw new RuntimeError('Variable "nextLevel" does not exist.', 741, $this->source); })())) * 100));
        // line 742
        yield "            <div class=\"progress-bar\" style=\"width: ";
        yield ((((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 742, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 742, $this->source); })()), "html", null, true)));
        yield "%\"></div>
        </div>
        <small class=\"mt-2 d-block\" style=\"opacity: 0.9;\">
            ";
        // line 745
        $context["remaining"] = ((isset($context["nextLevel"]) || array_key_exists("nextLevel", $context) ? $context["nextLevel"] : (function () { throw new RuntimeError('Variable "nextLevel" does not exist.', 745, $this->source); })()) - ((array_key_exists("points", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["points"]) || array_key_exists("points", $context) ? $context["points"] : (function () { throw new RuntimeError('Variable "points" does not exist.', 745, $this->source); })()), 0)) : (0)));
        // line 746
        yield "            ";
        if (((isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 746, $this->source); })()) > 0)) {
            // line 747
            yield "                Plus que ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 747, $this->source); })()), "html", null, true);
            yield " points pour le niveau supérieur
            ";
        } else {
            // line 749
            yield "                🎉 Niveau maximum atteint !
            ";
        }
        // line 751
        yield "        </small>
    </div>
    
    <!-- Publications -->
    <div class=\"posts-section\">
        <div class=\"posts-header\">
            <h3><i class=\"fas fa-newspaper\"></i> Publications</h3>
            <a href=\"";
        // line 758
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" class=\"btn-modern btn-outline-modern\" style=\"padding: 6px 16px; font-size: 13px;\">
                Voir tout <i class=\"fas fa-arrow-right\"></i>
            </a>
        </div>
        
        ";
        // line 763
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 763, $this->source); })())) > 0)) {
            // line 764
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentPosts"]) || array_key_exists("recentPosts", $context) ? $context["recentPosts"] : (function () { throw new RuntimeError('Variable "recentPosts" does not exist.', 764, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 765
                yield "                <div class=\"post-card\">
                    <div class=\"post-header\">
                        <div class=\"post-avatar\">
                            ";
                // line 768
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 768, $this->source); })()), "photo", [], "any", false, false, false, 768)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 769
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 769, $this->source); })()), "photo", [], "any", false, false, false, 769), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 769, $this->source); })()), "nom", [], "any", false, false, false, 769), "html", null, true);
                    yield "\">
                            ";
                } else {
                    // line 771
                    yield "                                <span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 771, $this->source); })()), "nom", [], "any", false, false, false, 771))), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 773
                yield "                        </div>
                        <div class=\"post-info\">
                            <h4>";
                // line 775
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 775, $this->source); })()), "nom", [], "any", false, false, false, 775), "html", null, true);
                yield "</h4>
                            <small><i class=\"fas fa-clock\"></i> ";
                // line 776
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 776), "d/m/Y H:i"), "html", null, true);
                yield "</small>
                        </div>
                    </div>
                    <div class=\"post-title\">";
                // line 779
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 779), "html", null, true);
                yield "</div>
                    <div class=\"post-content\">";
                // line 780
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 780), 0, 300), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 780)) > 300)) {
                    yield "...";
                }
                yield "</div>
                    ";
                // line 781
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 781)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 782
                    yield "                        <div class=\"post-image\">
                            <img src=\"";
                    // line 783
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 783), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 783), "html", null, true);
                    yield "\">
                        </div>
                    ";
                }
                // line 786
                yield "                    <div class=\"post-stats\">
                        <span><i class=\"fas fa-heart\"></i> ";
                // line 787
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likesCount", [], "any", true, true, false, 787)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likesCount", [], "any", false, false, false, 787), 0)) : (0)), "html", null, true);
                yield " likes</span>
                        <span><i class=\"fas fa-comment\"></i> ";
                // line 788
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentsCount", [], "any", true, true, false, 788)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "commentsCount", [], "any", false, false, false, 788), 0)) : (0)), "html", null, true);
                yield " commentaires</span>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 792
            yield "        ";
        } else {
            // line 793
            yield "            <div class=\"no-posts\">
                <i class=\"fas fa-newspaper\"></i>
                <p>Aucune publication pour le moment</p>
                <a href=\"";
            // line 796
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_new");
            yield "\" class=\"btn-modern btn-primary-modern\">
                    <i class=\"fas fa-plus\"></i> Créer ma première publication
                </a>
            </div>
        ";
        }
        // line 801
        yield "    </div>
</div>

<!-- Modal points -->
<div class=\"modal fade\" id=\"pointsModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));\">
                <h5 class=\"modal-title text-white\"><i class=\"fas fa-star\"></i> Mes Points de Fidélité</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center\">
                <div class=\"mb-4\">
                    <i class=\"fas fa-gem\" style=\"font-size: 64px; color: var(--gold);\"></i>
                    <h2 class=\"mt-3\">";
        // line 815
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("points", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["points"]) || array_key_exists("points", $context) ? $context["points"] : (function () { throw new RuntimeError('Variable "points" does not exist.', 815, $this->source); })()), 0)) : (0)), "html", null, true);
        yield " <small class=\"text-muted\">points</small></h2>
                </div>
                <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle\"></i> Comment gagner des points ?
                </div>
                <div class=\"list-group mb-3\">
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-pen-alt text-primary\"></i> Publier un article</span>
                        <span class=\"badge bg-primary rounded-pill\">+10 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-comment text-success\"></i> Commenter une publication</span>
                        <span class=\"badge bg-success rounded-pill\">+5 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-heart text-danger\"></i> Recevoir un like</span>
                        <span class=\"badge bg-danger rounded-pill\">+2 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-thumbs-up text-info\"></i> Donner un like</span>
                        <span class=\"badge bg-info rounded-pill\">+1 point</span>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <a href=\"";
        // line 840
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recompenses_index");
        yield "\" class=\"btn btn-warning w-100\">
                    <i class=\"fas fa-gift\"></i> Voir les récompenses
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Chatbot IA -->
<div class=\"chat-widget\">
    <div class=\"chat-button\" id=\"chatButton\">
        <i class=\"fas fa-comment-dots\"></i>
    </div>
    <div class=\"chat-window\" id=\"chatWindow\">
        <div class=\"chat-header\">
            <div class=\"chat-header-info\">
                <div class=\"chat-avatar\"><i class=\"fas fa-robot\"></i></div>
                <div class=\"chat-header-text\">
                    <h3>Assistant Koul Dyeri</h3>
                    <p>En ligne • Réponse immédiate</p>
                </div>
            </div>
            <button class=\"close-chat\" id=\"closeChatBtn\"><i class=\"fas fa-times\"></i></button>
        </div>
        <div class=\"chat-messages\" id=\"chatMessages\">
            <div class=\"message bot\">
                Bonjour ";
        // line 866
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 866, $this->source); })()), "nom", [], "any", false, false, false, 866))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 866, $this->source); })()), "nom", [], "any", false, false, false, 866), 1, 10), "html", null, true);
        yield " ! 👋<br>
                Je suis votre assistant personnel. Posez-moi toutes vos questions sur les points, les récompenses ou votre compte. 😊
            </div>
        </div>
        <div class=\"suggestions\">
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Comment gagner des points ?')\">🏆 Gagner des points</span>
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Quelles sont les récompenses ?')\">🎁 Récompenses</span>
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Mon solde de points')\">💰 Mon solde</span>
        </div>
        <div class=\"chat-input-container\">
            <input type=\"text\" id=\"chatInput\" placeholder=\"Écrivez votre message...\">
            <button id=\"sendChatBtn\"><i class=\"fas fa-paper-plane\"></i> Envoyer</button>
        </div>
    </div>
</div>

<script>
function showPointsModal() {
    var myModal = new bootstrap.Modal(document.getElementById('pointsModal'));
    myModal.show();
}

// Chatbot
const chatButton = document.getElementById('chatButton');
const chatWindow = document.getElementById('chatWindow');
const closeChatBtn = document.getElementById('closeChatBtn');

chatButton.addEventListener('click', () => {
    chatWindow.classList.toggle('open');
});
closeChatBtn.addEventListener('click', () => {
    chatWindow.classList.remove('open');
});

const chatInput = document.getElementById('chatInput');
const sendBtn = document.getElementById('sendChatBtn');
const chatMessages = document.getElementById('chatMessages');

function setSuggestion(text) {
    chatInput.value = text;
    sendMessage();
}

function addMessage(text, isUser) {
    const msgDiv = document.createElement('div');
    msgDiv.className = `message \${isUser ? 'user' : 'bot'}`;
    msgDiv.innerHTML = text;
    chatMessages.appendChild(msgDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTypingIndicator() {
    const typingDiv = document.createElement('div');
    typingDiv.className = 'typing-indicator';
    typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = '<span></span><span></span><span></span>';
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function removeTypingIndicator() {
    const indicator = document.getElementById('typingIndicator');
    if (indicator) indicator.remove();
}

async function sendMessage() {
    const message = chatInput.value.trim();
    if (!message) return;
    addMessage(message, true);
    chatInput.value = '';
    showTypingIndicator();
    try {
        const response = await fetch('/api/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: message })
        });
        const data = await response.json();
        removeTypingIndicator();
        addMessage(data.reply || data.error || '⚠️ Désolé, je n\\'ai pas pu répondre.', false);
    } catch (err) {
        removeTypingIndicator();
        addMessage('❌ Erreur de connexion au serveur.', false);
    }
}

sendBtn.addEventListener('click', sendMessage);
chatInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
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
        return "utilisateur/profil.html.twig";
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
        return array (  1091 => 866,  1062 => 840,  1034 => 815,  1018 => 801,  1010 => 796,  1005 => 793,  1002 => 792,  992 => 788,  988 => 787,  985 => 786,  977 => 783,  974 => 782,  972 => 781,  965 => 780,  961 => 779,  955 => 776,  951 => 775,  947 => 773,  941 => 771,  933 => 769,  931 => 768,  926 => 765,  921 => 764,  919 => 763,  911 => 758,  902 => 751,  898 => 749,  892 => 747,  889 => 746,  887 => 745,  880 => 742,  877 => 741,  875 => 740,  865 => 733,  851 => 722,  845 => 719,  839 => 716,  833 => 712,  827 => 711,  820 => 707,  809 => 698,  801 => 696,  793 => 694,  791 => 693,  783 => 687,  773 => 686,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon Profil | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    /* ===== STYLE PROFESSIONNEL ROUGE BORDEAUX ===== */
    :root {
        --bordeaux: #8B0000;
        --bordeaux-clair: #A52A2A;
        --bordeaux-fonce: #5C0000;
        --bordeaux-light: #D32F2F;
        --beige: #FFF8F0;
        --beige-fonce: #E8D5B7;
        --gold: #D4AF37;
        --dark: #1a1a2e;
    }

    body {
        background: linear-gradient(135deg, var(--beige) 0%, var(--beige-fonce) 100%);
    }

    .profile-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    
    /* Cover photo */
    .cover-container {
        position: relative;
        margin-bottom: 80px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(139,0,0,0.15);
    }
    
    .cover-photo {
        width: 100%;
        height: 320px;
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        position: relative;
        overflow: hidden;
    }
    
    .cover-photo::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='rgba(255,255,255,0.05)' d='M50 0 L61.8 38.2 L100 38.2 L70.9 61.8 L82.8 100 L50 75 L17.2 100 L29.1 61.8 L0 38.2 L38.2 38.2 Z'/%3E%3C/svg%3E\");
        background-repeat: repeat;
        background-size: 40px;
    }
    
    .cover-edit {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 40px;
        color: white;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        z-index: 2;
    }
    
    .cover-edit:hover {
        background: rgba(0,0,0,0.8);
        color: var(--gold);
        transform: translateY(-2px);
    }
    
    /* Avatar */
    .avatar-container {
        position: absolute;
        bottom: -60px;
        left: 50px;
        z-index: 10;
    }
    
    .profile-avatar-main {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: white;
        padding: 5px;
        box-shadow: 0 10px 25px rgba(139,0,0,0.2);
        transition: all 0.3s;
        border: 2px solid var(--gold);
    }
    
    .profile-avatar-main:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 35px rgba(139,0,0,0.3);
    }
    
    .profile-avatar-main img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .avatar-edit {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid var(--gold);
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    
    .avatar-edit:hover {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--bordeaux-fonce), var(--bordeaux));
    }
    
    /* Info bar */
    .profile-info-bar {
        background: white;
        border-radius: 20px;
        padding: 25px 35px 25px 240px;
        margin-top: -25px;
        box-shadow: 0 5px 20px rgba(139,0,0,0.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        border-bottom: 3px solid var(--bordeaux);
    }
    
    .profile-name-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--bordeaux);
        margin-bottom: 8px;
    }
    
    .profile-bio {
        color: #666;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .profile-bio span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .role-badge-modern {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .action-buttons-modern {
        display: flex;
        gap: 12px;
    }
    
    .btn-modern {
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    
    .btn-primary-modern {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        box-shadow: 0 4px 12px rgba(139,0,0,0.3);
    }
    
    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139,0,0,0.4);
        color: white;
    }
    
    .btn-outline-modern {
        background: #f0f2f5;
        color: var(--bordeaux);
    }
    
    .btn-outline-modern:hover {
        background: #e4e6eb;
        transform: translateY(-2px);
        color: var(--bordeaux-fonce);
    }
    
    /* Points widget */
    .points-widget {
        background: linear-gradient(135deg, var(--bordeaux) 0%, var(--bordeaux-clair) 100%);
        border-radius: 20px;
        padding: 25px;
        margin: 25px 0;
        color: white;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(139,0,0,0.3);
        position: relative;
        overflow: hidden;
    }
    
    .points-widget::before {
        content: '⭐';
        position: absolute;
        top: -30px;
        right: -30px;
        font-size: 120px;
        opacity: 0.08;
    }
    
    .points-widget:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(139,0,0,0.4);
    }
    
    .points-widget .points-value {
        font-size: 42px;
        font-weight: 800;
        color: var(--gold);
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .progress-modern {
        height: 8px;
        background: rgba(255,255,255,0.25);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .progress-modern .progress-bar {
        background: var(--gold);
        border-radius: 10px;
    }
    
    /* Posts section */
    .posts-section {
        margin-top: 30px;
    }
    
    .posts-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        background: white;
        padding: 15px 25px;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-left: 4px solid var(--bordeaux);
    }
    
    .posts-header h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .post-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s;
        border: 1px solid #f0e6d6;
    }
    
    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(139,0,0,0.1);
        border-color: var(--bordeaux-light);
    }
    
    .post-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .post-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(139,0,0,0.2);
    }
    
    .post-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .post-avatar span {
        color: white;
        font-weight: bold;
        font-size: 20px;
    }
    
    .post-info h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--bordeaux);
        margin: 0;
    }
    
    .post-info small {
        font-size: 12px;
        color: #888;
    }
    
    .post-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--bordeaux-fonce);
        margin-bottom: 15px;
        line-height: 1.3;
    }
    
    .post-content {
        color: #4a5568;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .post-image {
        margin-bottom: 20px;
        border-radius: 16px;
        overflow: hidden;
    }
    
    .post-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .post-image:hover img {
        transform: scale(1.02);
    }
    
    .post-stats {
        display: flex;
        gap: 25px;
        padding-top: 15px;
        border-top: 1px solid #f0e6d6;
        color: #666;
        font-size: 14px;
    }
    
    .post-stats i {
        margin-right: 6px;
    }
    
    .post-stats .fa-heart {
        color: var(--bordeaux);
    }
    
    .no-posts {
        background: white;
        border-radius: 20px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .no-posts i {
        font-size: 70px;
        color: var(--bordeaux-light);
        opacity: 0.3;
        margin-bottom: 20px;
    }
    
    .no-posts p {
        color: #666;
        font-size: 16px;
        margin-bottom: 20px;
    }
    
    /* Chatbot IA */
    .chat-widget {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }
    
    .chat-button {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        box-shadow: 0 4px 15px rgba(139,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        color: white;
        font-size: 26px;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(139,0,0,0.4); }
        70% { box-shadow: 0 0 0 15px rgba(139,0,0,0); }
        100% { box-shadow: 0 0 0 0 rgba(139,0,0,0); }
    }
    
    .chat-button:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 25px rgba(139,0,0,0.5);
    }
    
    .chat-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 380px;
        height: 550px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        display: none;
        flex-direction: column;
        overflow: hidden;
        animation: slideUp 0.3s ease;
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .chat-window.open { display: flex; }
    
    .chat-header {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chat-header-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .chat-avatar {
        width: 45px;
        height: 45px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    
    .chat-header-text h3 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }
    
    .chat-header-text p {
        font-size: 11px;
        margin: 0;
        opacity: 0.8;
    }
    
    .close-chat {
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .close-chat:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    
    .chat-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: #f8f9fc;
    }
    
    .message {
        max-width: 85%;
        padding: 10px 15px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.4;
        word-wrap: break-word;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .message.user {
        align-self: flex-end;
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        color: white;
        border-bottom-right-radius: 4px;
    }
    
    .message.bot {
        align-self: flex-start;
        background: white;
        color: #333;
        border: 1px solid #e9ecef;
        border-bottom-left-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .message.bot::before {
        content: \"🤖\";
        margin-right: 8px;
    }
    
    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 10px 15px;
        background: white;
        border-radius: 18px;
        width: fit-content;
        border: 1px solid #e9ecef;
    }
    
    .typing-indicator span {
        width: 8px;
        height: 8px;
        background: #adb5bd;
        border-radius: 50%;
        animation: typing 1.4s infinite;
    }
    
    .typing-indicator span:nth-child(1) { animation-delay: 0s; }
    .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
    .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
    
    @keyframes typing {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
        30% { transform: translateY(-6px); opacity: 1; }
    }
    
    .chat-input-container {
        display: flex;
        padding: 15px 20px;
        background: white;
        border-top: 1px solid #e9ecef;
        gap: 10px;
    }
    
    .chat-input-container input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #e9ecef;
        border-radius: 30px;
        outline: none;
        font-size: 14px;
        transition: all 0.3s;
        background: #f8f9fc;
    }
    
    .chat-input-container input:focus {
        border-color: var(--bordeaux);
        background: white;
        box-shadow: 0 0 0 3px rgba(139,0,0,0.1);
    }
    
    .chat-input-container button {
        background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));
        border: none;
        border-radius: 30px;
        color: white;
        padding: 12px 20px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .chat-input-container button:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(139,0,0,0.4);
    }
    
    .suggestions {
        padding: 10px 15px;
        background: white;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .suggestion-chip {
        background: #f0f2f5;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        cursor: pointer;
        transition: all 0.2s;
        color: var(--bordeaux);
    }
    
    .suggestion-chip:hover {
        background: var(--bordeaux);
        color: white;
    }
    
    @media (max-width: 768px) {
        .cover-photo { height: 200px; }
        .avatar-container { left: 20px; bottom: -50px; }
        .profile-avatar-main { width: 100px; height: 100px; }
        .profile-info-bar { padding: 15px 20px 15px 130px; }
        .profile-name-section h1 { font-size: 22px; }
        .action-buttons-modern { flex-direction: column; width: 100%; }
        .btn-modern { justify-content: center; }
        .chat-window { width: 320px; height: 500px; right: 10px; bottom: 75px; }
        .chat-widget { bottom: 20px; right: 20px; }
        .chat-button { width: 55px; height: 55px; font-size: 24px; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"profile-wrapper\">
    
    
    <!-- Avatar -->
    <div class=\"avatar-container\">
        <div class=\"profile-avatar-main\">
            {% if utilisateur.photo %}
                <img src=\"{{ utilisateur.photo }}\" alt=\"{{ utilisateur.nom }}\">
            {% else %}
                <img src=\"https://ui-avatars.com/api/?name={{ utilisateur.nom|url_encode }}&background=8B0000&color=fff&bold=true&length=2&rounded=true&size=160\" alt=\"{{ utilisateur.nom }}\">
            {% endif %}
        </div>
        <div class=\"avatar-edit\" onclick=\"alert('Fonctionnalité à venir')\">
            <i class=\"fas fa-camera\"></i>
        </div>
    </div>
    
    <!-- Info bar -->
    <div class=\"profile-info-bar\">
        <div class=\"profile-name-section\">
            <h1>{{ utilisateur.nom }}</h1>
            <div class=\"profile-bio\">
                <span><i class=\"fas fa-calendar-alt\"></i> Membre depuis 2024</span>
                <span class=\"role-badge-modern\">
                    {% if utilisateur.role == 'admin' %}👑 Administrateur{% else %}👤 Utilisateur{% endif %}
                </span>
            </div>
        </div>
        <div class=\"action-buttons-modern\">
            <a href=\"{{ path('app_utilisateur_editer', {id: utilisateur.idUtilisateur}) }}\" class=\"btn-modern btn-primary-modern\">
                <i class=\"fas fa-edit\"></i> Modifier
            </a>
            <a href=\"{{ path('app_historique_index') }}\" class=\"btn-modern btn-outline-modern\">
                <i class=\"fas fa-history\"></i> Historique
            </a>
            <a href=\"{{ path('app_recompenses_index') }}\" class=\"btn-modern btn-outline-modern\">
                <i class=\"fas fa-gift\"></i> Récompenses
            </a>
        </div>
    </div>
    
    <!-- Points widget -->
    <div class=\"points-widget\" onclick=\"showPointsModal()\">
        <div class=\"d-flex justify-content-between align-items-center\">
            <div>
                <div style=\"font-size: 14px; opacity: 0.9;\">Mes points de fidélité</div>
                <div class=\"points-value\">{{ points|default(0) }} pts</div>
            </div>
            <div>
                <i class=\"fas fa-star\" style=\"font-size: 48px; color: var(--gold);\"></i>
            </div>
        </div>
        <div class=\"progress-modern mt-3\">
            {% set nextLevel = 500 %}
            {% set progress = (points|default(0) / nextLevel * 100)|round %}
            <div class=\"progress-bar\" style=\"width: {{ progress > 100 ? 100 : progress }}%\"></div>
        </div>
        <small class=\"mt-2 d-block\" style=\"opacity: 0.9;\">
            {% set remaining = nextLevel - points|default(0) %}
            {% if remaining > 0 %}
                Plus que {{ remaining }} points pour le niveau supérieur
            {% else %}
                🎉 Niveau maximum atteint !
            {% endif %}
        </small>
    </div>
    
    <!-- Publications -->
    <div class=\"posts-section\">
        <div class=\"posts-header\">
            <h3><i class=\"fas fa-newspaper\"></i> Publications</h3>
            <a href=\"{{ path('app_posts_index') }}\" class=\"btn-modern btn-outline-modern\" style=\"padding: 6px 16px; font-size: 13px;\">
                Voir tout <i class=\"fas fa-arrow-right\"></i>
            </a>
        </div>
        
        {% if recentPosts|length > 0 %}
            {% for post in recentPosts %}
                <div class=\"post-card\">
                    <div class=\"post-header\">
                        <div class=\"post-avatar\">
                            {% if utilisateur.photo %}
                                <img src=\"{{ utilisateur.photo }}\" alt=\"{{ utilisateur.nom }}\">
                            {% else %}
                                <span>{{ utilisateur.nom|first|upper }}</span>
                            {% endif %}
                        </div>
                        <div class=\"post-info\">
                            <h4>{{ utilisateur.nom }}</h4>
                            <small><i class=\"fas fa-clock\"></i> {{ post.createdAt|date('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                    <div class=\"post-title\">{{ post.title }}</div>
                    <div class=\"post-content\">{{ post.content|slice(0, 300) }}{% if post.content|length > 300 %}...{% endif %}</div>
                    {% if post.imagePath %}
                        <div class=\"post-image\">
                            <img src=\"{{ post.imagePath }}\" alt=\"{{ post.title }}\">
                        </div>
                    {% endif %}
                    <div class=\"post-stats\">
                        <span><i class=\"fas fa-heart\"></i> {{ post.likesCount|default(0) }} likes</span>
                        <span><i class=\"fas fa-comment\"></i> {{ post.commentsCount|default(0) }} commentaires</span>
                    </div>
                </div>
            {% endfor %}
        {% else %}
            <div class=\"no-posts\">
                <i class=\"fas fa-newspaper\"></i>
                <p>Aucune publication pour le moment</p>
                <a href=\"{{ path('app_post_new') }}\" class=\"btn-modern btn-primary-modern\">
                    <i class=\"fas fa-plus\"></i> Créer ma première publication
                </a>
            </div>
        {% endif %}
    </div>
</div>

<!-- Modal points -->
<div class=\"modal fade\" id=\"pointsModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, var(--bordeaux), var(--bordeaux-clair));\">
                <h5 class=\"modal-title text-white\"><i class=\"fas fa-star\"></i> Mes Points de Fidélité</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center\">
                <div class=\"mb-4\">
                    <i class=\"fas fa-gem\" style=\"font-size: 64px; color: var(--gold);\"></i>
                    <h2 class=\"mt-3\">{{ points|default(0) }} <small class=\"text-muted\">points</small></h2>
                </div>
                <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle\"></i> Comment gagner des points ?
                </div>
                <div class=\"list-group mb-3\">
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-pen-alt text-primary\"></i> Publier un article</span>
                        <span class=\"badge bg-primary rounded-pill\">+10 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-comment text-success\"></i> Commenter une publication</span>
                        <span class=\"badge bg-success rounded-pill\">+5 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-heart text-danger\"></i> Recevoir un like</span>
                        <span class=\"badge bg-danger rounded-pill\">+2 points</span>
                    </div>
                    <div class=\"list-group-item d-flex justify-content-between align-items-center\">
                        <span><i class=\"fas fa-thumbs-up text-info\"></i> Donner un like</span>
                        <span class=\"badge bg-info rounded-pill\">+1 point</span>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <a href=\"{{ path('app_recompenses_index') }}\" class=\"btn btn-warning w-100\">
                    <i class=\"fas fa-gift\"></i> Voir les récompenses
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Chatbot IA -->
<div class=\"chat-widget\">
    <div class=\"chat-button\" id=\"chatButton\">
        <i class=\"fas fa-comment-dots\"></i>
    </div>
    <div class=\"chat-window\" id=\"chatWindow\">
        <div class=\"chat-header\">
            <div class=\"chat-header-info\">
                <div class=\"chat-avatar\"><i class=\"fas fa-robot\"></i></div>
                <div class=\"chat-header-text\">
                    <h3>Assistant Koul Dyeri</h3>
                    <p>En ligne • Réponse immédiate</p>
                </div>
            </div>
            <button class=\"close-chat\" id=\"closeChatBtn\"><i class=\"fas fa-times\"></i></button>
        </div>
        <div class=\"chat-messages\" id=\"chatMessages\">
            <div class=\"message bot\">
                Bonjour {{ utilisateur.nom|first|upper }}{{ utilisateur.nom|slice(1, 10) }} ! 👋<br>
                Je suis votre assistant personnel. Posez-moi toutes vos questions sur les points, les récompenses ou votre compte. 😊
            </div>
        </div>
        <div class=\"suggestions\">
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Comment gagner des points ?')\">🏆 Gagner des points</span>
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Quelles sont les récompenses ?')\">🎁 Récompenses</span>
            <span class=\"suggestion-chip\" onclick=\"setSuggestion('Mon solde de points')\">💰 Mon solde</span>
        </div>
        <div class=\"chat-input-container\">
            <input type=\"text\" id=\"chatInput\" placeholder=\"Écrivez votre message...\">
            <button id=\"sendChatBtn\"><i class=\"fas fa-paper-plane\"></i> Envoyer</button>
        </div>
    </div>
</div>

<script>
function showPointsModal() {
    var myModal = new bootstrap.Modal(document.getElementById('pointsModal'));
    myModal.show();
}

// Chatbot
const chatButton = document.getElementById('chatButton');
const chatWindow = document.getElementById('chatWindow');
const closeChatBtn = document.getElementById('closeChatBtn');

chatButton.addEventListener('click', () => {
    chatWindow.classList.toggle('open');
});
closeChatBtn.addEventListener('click', () => {
    chatWindow.classList.remove('open');
});

const chatInput = document.getElementById('chatInput');
const sendBtn = document.getElementById('sendChatBtn');
const chatMessages = document.getElementById('chatMessages');

function setSuggestion(text) {
    chatInput.value = text;
    sendMessage();
}

function addMessage(text, isUser) {
    const msgDiv = document.createElement('div');
    msgDiv.className = `message \${isUser ? 'user' : 'bot'}`;
    msgDiv.innerHTML = text;
    chatMessages.appendChild(msgDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTypingIndicator() {
    const typingDiv = document.createElement('div');
    typingDiv.className = 'typing-indicator';
    typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = '<span></span><span></span><span></span>';
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function removeTypingIndicator() {
    const indicator = document.getElementById('typingIndicator');
    if (indicator) indicator.remove();
}

async function sendMessage() {
    const message = chatInput.value.trim();
    if (!message) return;
    addMessage(message, true);
    chatInput.value = '';
    showTypingIndicator();
    try {
        const response = await fetch('/api/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: message })
        });
        const data = await response.json();
        removeTypingIndicator();
        addMessage(data.reply || data.error || '⚠️ Désolé, je n\\'ai pas pu répondre.', false);
    } catch (err) {
        removeTypingIndicator();
        addMessage('❌ Erreur de connexion au serveur.', false);
    }
}

sendBtn.addEventListener('click', sendMessage);
chatInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
</script>
{% endblock %}", "utilisateur/profil.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\profil.html.twig");
    }
}

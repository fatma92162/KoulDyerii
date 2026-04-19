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

/* post/index.html.twig */
class __TwigTemplate_f1f4da8b4191c061482c46da9ffe4fb0 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/index.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("feed_title"), "html", null, true);
        yield " | Koul Dyeri";
        
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
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link href=\"https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&family=DM+Serif+Display&display=swap\" rel=\"stylesheet\">
<style>
    /* ===== RESET & BASE ===== */
    *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background: #f5f4f1;
        font-family: 'DM Sans', system-ui, sans-serif;
        color: #1a1a1a;
        -webkit-font-smoothing: antialiased;
    }

    /* ===== VARIABLES ===== */
    :root {
        --accent: #d94f3d;
        --accent-soft: #fdf1ef;
        --accent-border: #f2c4be;
        --pin: #2d6ef5;
        --pin-soft: #eef2ff;
        --pin-border: #c7d4fd;
        --green: #2a7d4f;
        --green-soft: #edf7f2;
        --amber: #b45309;
        --amber-soft: #fef8ed;
        --amber-border: #fcd896;
        --surface: #ffffff;
        --surface-2: #f9f8f6;
        --border: rgba(0,0,0,0.08);
        --border-md: rgba(0,0,0,0.13);
        --text-1: #111111;
        --text-2: #555555;
        --text-3: #999999;
        --radius-sm: 8px;
        --radius-md: 14px;
        --radius-lg: 20px;
        --radius-xl: 28px;
    }

    /* ===== LAYOUT ===== */
    .feed-wrap {
        max-width: 720px;
        margin: 0 auto;
        padding: 2rem 1.25rem 4rem;
    }

    /* ===== HEADER ===== */
    .feed-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.75rem;
    }

    .feed-header-left h1 {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 2rem;
        font-weight: 400;
        color: var(--text-1);
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .feed-header-left p {
        font-size: 13px;
        color: var(--text-3);
        margin-top: 2px;
    }

    /* BOUTON ROUGE MODIFIÉ ICI */
    .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 20px;
        background: var(--accent);  /* Couleur rouge/orangé */
        color: #fff;
        border: none;
        border-radius: 99px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: background .15s, transform .12s;
        white-space: nowrap;
    }

    .btn-new:hover {
        background: #b83f2f;  /* Rouge plus foncé au survol */
        transform: translateY(-1px);
        color: #fff;
    }

    .btn-new svg {
        flex-shrink: 0;
    }

    /* ===== SEARCH ===== */
    .search-bar {
        display: flex;
        gap: 8px;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .search-bar input,
    .search-bar select {
        padding: 10px 14px;
        border: 1px solid var(--border-md);
        border-radius: var(--radius-md);
        background: var(--surface);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        color: var(--text-1);
        outline: none;
        transition: border-color .15s;
    }

    .search-bar input {
        flex: 1;
        min-width: 0;
    }

    .search-bar select {
        flex: 0 0 148px;
    }

    .search-bar input:focus,
    .search-bar select:focus {
        border-color: var(--text-1);
    }

    .search-bar input::placeholder {
        color: var(--text-3);
    }

   .search-bar button {
    padding: 10px 20px;
    background: var(--accent);  /* rouge */
    color: #fff;
    border: none;
    border-radius: var(--radius-md);
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background .15s;
    white-space: nowrap;
}

.search-bar button:hover {
    background: #b83f2f;  /* rouge plus foncé au survol */
    opacity: 1;
}
    /* ===== STORIES ===== */
    .stories-wrap {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .stories-wrap::-webkit-scrollbar { display: none; }

    .stories-inner {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }

    .story-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        flex-shrink: 0;
        transition: transform .15s;
    }

    .story-item:hover {
        transform: translateY(-2px);
    }

    .story-ring {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        padding: 2.5px;
        background: conic-gradient(#f09433, #e6683c, #dc2743, #cc2366, #bc1888, #f09433);
    }

    .story-ring.add-ring {
        background: var(--border-md);
    }

    .story-avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--surface);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-size: 16px;
        font-weight: 500;
        color: var(--text-2);
    }

    .story-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-name {
        font-size: 11px;
        color: var(--text-2);
        max-width: 60px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* ===== STORY VIEWER ===== */
    .story-viewer-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.94);
        z-index: 3000;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .story-viewer-overlay.open {
        display: flex;
    }

    .story-viewer-inner {
        position: relative;
        max-width: 420px;
        width: 90%;
    }

    .story-viewer-inner img,
    .story-viewer-inner video {
        width: 100%;
        border-radius: var(--radius-lg);
    }

    .story-close-btn {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
    }

    .story-progress {
        width: 100%;
        height: 3px;
        background: rgba(255,255,255,.25);
        border-radius: 99px;
        margin-top: 10px;
        overflow: hidden;
    }

    .story-progress-fill {
        height: 100%;
        background: #fff;
        width: 0%;
        transition: width .1s linear;
    }

    .story-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,.15);
        border: none;
        color: #fff;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .15s;
    }

    .story-arrow:hover { background: rgba(255,255,255,.3); }
    .story-arrow.prev { left: -50px; }
    .story-arrow.next { right: -50px; }

    /* ===== ALERTS ===== */
    .alert {
        padding: 12px 16px;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        font-size: 13px;
        font-weight: 500;
    }

    .alert-success {
        background: #edf7f2;
        color: #1a5c36;
        border-left: 3px solid #2a7d4f;
    }

    .alert-danger {
        background: var(--accent-soft);
        color: #8b2119;
        border-left: 3px solid var(--accent);
    }

    /* ===== POST CARD ===== */
    .post-card {
        background: var(--surface);
        border-radius: var(--radius-xl);
        border: 1px solid var(--border);
        margin-bottom: 1rem;
        overflow: hidden;
        transition: border-color .15s, box-shadow .15s;
    }

    .post-card:hover {
        border-color: var(--border-md);
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .post-card.pinned {
        border-left: 3px solid var(--pin);
    }

    .post-body {
        padding: 1.375rem 1.625rem;
    }

    /* Author row */
    .author-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1rem;
    }

    .author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 600;
        flex-shrink: 0;
        overflow: hidden;
        background: #f0eee8;
        color: var(--text-2);
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .author-info strong {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-1);
        line-height: 1.3;
    }

    .author-info time {
        font-size: 12px;
        color: var(--text-3);
    }

    .pin-badge {
        margin-left: auto;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: var(--pin-soft);
        color: var(--pin);
        border: 1px solid var(--pin-border);
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 99px;
    }

    /* Dot menu */
    .dot-menu-wrap {
        position: relative;
        margin-left: auto;
    }

    .dot-menu-wrap.has-pin-badge {
        margin-left: 0;
    }

    .dot-trigger {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid var(--border);
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        color: var(--text-3);
        transition: background .12s;
        line-height: 1;
        letter-spacing: 1px;
        font-family: sans-serif;
    }

    .dot-trigger:hover { background: var(--surface-2); }

    .dot-drop {
        position: absolute;
        top: calc(100% + 5px);
        right: 0;
        background: var(--surface);
        border: 1px solid var(--border-md);
        border-radius: var(--radius-md);
        min-width: 140px;
        z-index: 200;
        display: none;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .dot-menu-wrap.open .dot-drop { display: block; }

    .dot-drop a,
    .dot-drop button {
        display: flex;
        align-items: center;
        gap: 8px;
        width: 100%;
        padding: 9px 14px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: var(--text-1);
        text-decoration: none;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        transition: background .1s;
    }

    .dot-drop a:hover,
    .dot-drop button:hover { background: var(--surface-2); }
    .dot-drop .drop-del { color: var(--accent); }

    /* Post content */
    .post-title {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 1.2rem;
        font-weight: 400;
        color: var(--text-1);
        margin-bottom: 6px;
        line-height: 1.35;
        letter-spacing: -0.01em;
    }

    .post-excerpt {
        font-size: 14px;
        color: var(--text-2);
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .post-excerpt strong { color: var(--text-1); font-weight: 600; }
    .post-excerpt em { font-style: italic; }

    .post-image {
        width: 100%;
        max-height: 360px;
        object-fit: cover;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        cursor: pointer;
        display: block;
        transition: opacity .15s;
        border: 1px solid var(--border);
    }

    .post-image:hover { opacity: .96; }

    /* ===== ACTIONS ===== */
    .post-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
        flex-wrap: wrap;
    }

    .act {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 12px;
        border-radius: 99px;
        border: 1px solid var(--border-md);
        background: transparent;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-2);
        text-decoration: none;
        cursor: pointer;
        transition: background .12s, border-color .12s, color .12s, transform .1s;
        white-space: nowrap;
    }

    .act:hover {
        background: var(--surface-2);
        border-color: var(--border-md);
        color: var(--text-1);
        transform: translateY(-1px);
    }

    .act.active-reaction {
        background: var(--accent-soft);
        border-color: var(--accent-border);
        color: var(--accent);
    }

    .act.act-comment:hover {
        background: #f0f4ff;
        border-color: #c7d4fd;
        color: var(--pin);
    }

    .act.act-pin { color: var(--pin); border-color: var(--pin-border); }
    .act.act-pin:hover, .act.act-pin.pin-on {
        background: var(--pin-soft);
        border-color: var(--pin);
        color: var(--pin);
    }

    .act.act-repost { color: var(--green); border-color: #b6dfc8; }
    .act.act-repost:hover {
        background: var(--green-soft);
        border-color: var(--green);
        color: var(--green);
    }

    .act.act-fav { color: var(--amber); border-color: var(--amber-border); }
    .act.act-fav:hover, .act.act-fav.fav-on {
        background: var(--amber-soft);
        border-color: var(--amber-border);
        color: var(--amber);
    }

    .act.act-read {
        margin-left: auto;
        border-color: transparent;
        color: var(--text-3);
    }

    .act.act-read:hover {
        background: none;
        color: var(--text-1);
        transform: none;
    }

    /* ===== BOUTON RÉSUMÉ (AJOUT) ===== */
    .btn-summarize {
        background: none;
        border: 1.5px solid var(--border-md);
        border-radius: 99px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        color: #6c5ce7;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-summarize:hover {
        border-color: #6c5ce7;
        color: #6c5ce7;
        background: rgba(108,92,231,0.1);
        transform: translateY(-1px);
    }

    /* Reaction popup */
    .reaction-wrap {
        position: relative;
        display: inline-block;
    }

    .reaction-popup {
        position: absolute;
        bottom: calc(100% + 7px);
        left: 0;
        background: var(--surface);
        border: 1px solid var(--border-md);
        border-radius: 99px;
        padding: 6px 10px;
        display: none;
        gap: 3px;
        z-index: 100;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .reaction-wrap:hover .reaction-popup,
    .reaction-popup:hover {
        display: flex;
    }

    .emo {
        font-size: 20px;
        cursor: pointer;
        padding: 2px 4px;
        border-radius: 50%;
        transition: transform .1s;
        line-height: 1;
    }

    .emo:hover { transform: scale(1.28); }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-xl);
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: .3;
    }

    .empty-state p {
        color: var(--text-3);
        font-size: 14px;
        margin-bottom: 1.25rem;
    }

    /* ===== LIGHTBOX ===== */
    .lightbox-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.92);
        z-index: 3000;
        display: none;
        align-items: center;
        justify-content: center;
        cursor: zoom-out;
    }

    .lightbox-overlay.open { display: flex; }

    .lightbox-overlay img {
        max-width: 90%;
        max-height: 90vh;
        border-radius: var(--radius-md);
        pointer-events: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 640px) {
        .feed-wrap { padding: 1.25rem 1rem 3rem; }
        .feed-header { flex-wrap: wrap; gap: .75rem; }
        .feed-header-left h1 { font-size: 1.6rem; }
        .search-bar { flex-direction: column; }
        .search-bar select { flex: 1; }
        .post-body { padding: 1.1rem 1.2rem; }
        .post-title { font-size: 1.05rem; }
        .story-arrow.prev { left: -10px; }
        .story-arrow.next { right: -10px; }
        .post-actions { gap: 4px; }
        .act, .btn-summarize { padding: 5px 10px; font-size: 11px; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 718
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 719
        yield "<div class=\"feed-wrap\">

    ";
        // line 722
        yield "    <div class=\"feed-header\">
        <div class=\"feed-header-left\">
            <h1>";
        // line 724
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("feed_title"), "html", null, true);
        yield "</h1>
            <p>";
        // line 725
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 725, $this->source); })())), "html", null, true);
        yield " publications</p>
        </div>
        <a href=\"";
        // line 727
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_new");
        yield "\" class=\"btn-new\">
            <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                <path d=\"M6 1v10M1 6h10\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\"/>
            </svg>
            ";
        // line 731
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("new_post"), "html", null, true);
        yield "
        </a>
    </div>

    ";
        // line 736
        yield "    <div class=\"search-bar\">
        <form method=\"get\" action=\"";
        // line 737
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" style=\"display:contents;\">
            <input type=\"text\"
                   name=\"search\"
                   placeholder=\"";
        // line 740
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("search_placeholder"), "html", null, true);
        yield "\"
                   value=\"";
        // line 741
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 741, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
            <select name=\"sort\">
                <option value=\"recent\"  ";
        // line 743
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 743, $this->source); })()) == "recent")) ? ("selected") : (""));
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sort_recent"), "html", null, true);
        yield "</option>
                <option value=\"oldest\"  ";
        // line 744
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 744, $this->source); })()) == "oldest")) ? ("selected") : (""));
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sort_oldest"), "html", null, true);
        yield "</option>
                <option value=\"popular\" ";
        // line 745
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 745, $this->source); })()) == "popular")) ? ("selected") : (""));
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sort_popular"), "html", null, true);
        yield "</option>
                <option value=\"pinned\"  ";
        // line 746
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 746, $this->source); })()) == "pinned")) ? ("selected") : (""));
        yield ">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sort_pinned"), "html", null, true);
        yield "</option>
            </select>
            <button type=\"submit\">
                <svg width=\"13\" height=\"13\" viewBox=\"0 0 13 13\" fill=\"none\" style=\"vertical-align:-2px;margin-right:4px\">
                    <circle cx=\"5.5\" cy=\"5.5\" r=\"4\" stroke=\"currentColor\" stroke-width=\"1.4\"/>
                    <path d=\"M9 9l2.5 2.5\" stroke=\"currentColor\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
                </svg>
                ";
        // line 753
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("search_button"), "html", null, true);
        yield "
            </button>
        </form>
    </div>

    ";
        // line 759
        yield "    ";
        if ((array_key_exists("stories", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["stories"]) || array_key_exists("stories", $context) ? $context["stories"] : (function () { throw new RuntimeError('Variable "stories" does not exist.', 759, $this->source); })())) > 0))) {
            // line 760
            yield "    <div class=\"stories-wrap\">
        <div class=\"stories-inner\">
            ";
            // line 762
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stories"]) || array_key_exists("stories", $context) ? $context["stories"] : (function () { throw new RuntimeError('Variable "stories" does not exist.', 762, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["story"]) {
                // line 763
                yield "            <div class=\"story-item\"
                 data-story-id=\"";
                // line 764
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["story"], "id", [], "any", false, false, false, 764), "html", null, true);
                yield "\"
                 data-media-type=\"";
                // line 765
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["story"], "mediaType", [], "any", false, false, false, 765), "html", null, true);
                yield "\"
                 data-media-url=\"";
                // line 766
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["story"], "mediaPath", [], "any", false, false, false, 766), "html", null, true);
                yield "\"
                 data-user-name=\"";
                // line 767
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["story"], "utilisateur", [], "any", false, false, false, 767), "nom", [], "any", false, false, false, 767), "html", null, true);
                yield "\">
                <div class=\"story-ring\">
                    <div class=\"story-avatar\">
                        ";
                // line 770
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["story"], "utilisateur", [], "any", false, false, false, 770), "photo", [], "any", false, false, false, 770)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 771
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["story"], "utilisateur", [], "any", false, false, false, 771), "photo", [], "any", false, false, false, 771), "html", null, true);
                    yield "\" alt=\"\">
                        ";
                } else {
                    // line 773
                    yield "                            ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["story"], "utilisateur", [], "any", false, false, false, 773), "nom", [], "any", false, false, false, 773))), "html", null, true);
                    yield "
                        ";
                }
                // line 775
                yield "                    </div>
                </div>
                <span class=\"story-name\">";
                // line 777
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["story"], "utilisateur", [], "any", false, false, false, 777), "nom", [], "any", false, false, false, 777), "html", null, true);
                yield "</span>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['story'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 780
            yield "
            ";
            // line 781
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 781, $this->source); })()), "user", [], "any", false, false, false, 781)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 782
                yield "            <div class=\"story-item\" onclick=\"location.href='";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_story_new");
                yield "'\">
                <div class=\"story-ring add-ring\">
                    <div class=\"story-avatar\">
                        <svg width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\">
                            <path d=\"M9 3v12M3 9h12\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"/>
                        </svg>
                    </div>
                </div>
                <span class=\"story-name\">Ajouter</span>
            </div>
            ";
            }
            // line 793
            yield "        </div>
    </div>
    ";
        }
        // line 796
        yield "
    ";
        // line 798
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 798, $this->source); })()), "flashes", ["success"], "method", false, false, false, 798));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 799
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 801
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 801, $this->source); })()), "flashes", ["error"], "method", false, false, false, 801));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 802
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 804
        yield "
    ";
        // line 806
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 806, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 807
            yield "    <article class=\"post-card ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 807)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "pinned";
            }
            yield "\" id=\"post-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 807), "html", null, true);
            yield "\">
        <div class=\"post-body\">

            ";
            // line 811
            yield "            <div class=\"author-row\">
                <div class=\"author-avatar\">
                    ";
            // line 813
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, true, false, 813), "photo", [], "any", true, true, false, 813) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 813), "photo", [], "any", false, false, false, 813))) {
                // line 814
                yield "                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 814), "photo", [], "any", false, false, false, 814), "html", null, true);
                yield "\" alt=\"\">
                    ";
            } else {
                // line 816
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 816), "nom", [], "any", false, false, false, 816))), "html", null, true);
                yield "
                    ";
            }
            // line 818
            yield "                </div>
                <div class=\"author-info\">
                    <strong>";
            // line 820
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 820), "nom", [], "any", false, false, false, 820), "html", null, true);
            yield "</strong>
                    <time>";
            // line 821
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 821), "d/m/Y à H:i"), "html", null, true);
            yield "</time>
                </div>

                ";
            // line 824
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 824)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 825
                yield "                    <div class=\"pin-badge\">
                        <svg width=\"10\" height=\"10\" viewBox=\"0 0 10 10\" fill=\"none\">
                            <path d=\"M5 1l1 2.5h2.5L6.5 5l.9 2.5L5 6 2.6 7.5l.9-2.5L1.5 3.5H4z\" fill=\"currentColor\"/>
                        </svg>
                        ";
                // line 829
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_pinned"), "html", null, true);
                yield "
                    </div>
                ";
            }
            // line 832
            yield "
                ";
            // line 833
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 833, $this->source); })()), "user", [], "any", false, false, false, 833) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "utilisateur", [], "any", false, false, false, 833), "idUtilisateur", [], "any", false, false, false, 833) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 833, $this->source); })()), "user", [], "any", false, false, false, 833), "idUtilisateur", [], "any", false, false, false, 833)) || ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 833), "role", [], "any", true, true, false, 833) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 833, $this->source); })()), "user", [], "any", false, false, false, 833), "role", [], "any", false, false, false, 833)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 833, $this->source); })()), "user", [], "any", false, false, false, 833), "role", [], "any", false, false, false, 833)) : ("")) == "admin")))) {
                // line 834
                yield "                <div class=\"dot-menu-wrap ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 834)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "has-pin-badge";
                }
                yield "\" id=\"menu-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 834), "html", null, true);
                yield "\">
                    <button class=\"dot-trigger\" onclick=\"toggleDotMenu('";
                // line 835
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 835), "html", null, true);
                yield "')\">···</button>
                    <div class=\"dot-drop\">
                        <a href=\"";
                // line 837
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 837)]), "html", null, true);
                yield "\">
                            <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                                <path d=\"M8.5 1.5l2 2L4 10H2V8L8.5 1.5z\" stroke=\"currentColor\" stroke-width=\"1.1\" stroke-linejoin=\"round\"/>
                            </svg>
                            ";
                // line 841
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_edit"), "html", null, true);
                yield "
                        </a>
                        <form method=\"post\" action=\"";
                // line 843
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 843)]), "html", null, true);
                yield "\"
                              onsubmit=\"return confirm('";
                // line 844
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_delete_confirm"), "html", null, true);
                yield "')\">
                            <button type=\"submit\" class=\"drop-del\">
                                <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                                    <path d=\"M2 3h8M5 3V2h2v1M4 3v6.5h4V3\" stroke=\"currentColor\" stroke-width=\"1.1\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                                </svg>
                                ";
                // line 849
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_delete"), "html", null, true);
                yield "
                            </button>
                        </form>
                    </div>
                </div>
                ";
            }
            // line 855
            yield "            </div>

            ";
            // line 858
            yield "            <div class=\"post-title\">";
            yield $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 858));
            yield "</div>
            <div class=\"post-excerpt markdown-content\"
                 data-markdown=\"";
            // line 860
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 860)), "html_attr");
            yield "\">
                ";
            // line 861
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 861)), 0, 250));
            yield "…
            </div>

            ";
            // line 865
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 865)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 866
                yield "                <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 866), "html", null, true);
                yield "\"
                     class=\"post-image\"
                     alt=\"Image du post\"
                     loading=\"lazy\"
                     onclick=\"openLightbox('";
                // line 870
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagePath", [], "any", false, false, false, 870), "html", null, true);
                yield "')\">
            ";
            }
            // line 872
            yield "
            ";
            // line 874
            yield "            <div class=\"post-actions\">

                ";
            // line 877
            yield "                <div class=\"reaction-wrap\">
                    <button class=\"act ";
            // line 878
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["userReactions"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 878), [], "array", true, true, false, 878) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["userReactions"]) || array_key_exists("userReactions", $context) ? $context["userReactions"] : (function () { throw new RuntimeError('Variable "userReactions" does not exist.', 878, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 878), [], "array", false, false, false, 878))) {
                yield "active-reaction";
            }
            yield "\"
                            id=\"r-btn-";
            // line 879
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 879), "html", null, true);
            yield "\">
                        ";
            // line 880
            $context["ur"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["userReactions"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 880), [], "array", true, true, false, 880)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["userReactions"]) || array_key_exists("userReactions", $context) ? $context["userReactions"] : (function () { throw new RuntimeError('Variable "userReactions" does not exist.', 880, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 880), [], "array", false, false, false, 880), null)) : (null));
            // line 881
            yield "                        ";
            if (((isset($context["ur"]) || array_key_exists("ur", $context) ? $context["ur"] : (function () { throw new RuntimeError('Variable "ur" does not exist.', 881, $this->source); })()) == "love")) {
                yield "❤️
                        ";
            } elseif ((            // line 882
(isset($context["ur"]) || array_key_exists("ur", $context) ? $context["ur"] : (function () { throw new RuntimeError('Variable "ur" does not exist.', 882, $this->source); })()) == "haha")) {
                yield "😂
                        ";
            } elseif ((            // line 883
(isset($context["ur"]) || array_key_exists("ur", $context) ? $context["ur"] : (function () { throw new RuntimeError('Variable "ur" does not exist.', 883, $this->source); })()) == "sad")) {
                yield "😢
                        ";
            } elseif ((            // line 884
(isset($context["ur"]) || array_key_exists("ur", $context) ? $context["ur"] : (function () { throw new RuntimeError('Variable "ur" does not exist.', 884, $this->source); })()) == "angry")) {
                yield "😠
                        ";
            } else {
                // line 885
                yield "👍";
            }
            // line 886
            yield "                        <span id=\"r-count-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 886), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 887
($context["reactionsCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 887), [], "array", false, true, false, 887), "like", [], "any", true, true, false, 887) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 887, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 887), [], "array", false, false, false, 887), "like", [], "any", false, false, false, 887)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 887, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 887), [], "array", false, false, false, 887), "like", [], "any", false, false, false, 887)) : (0)) + (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 888
($context["reactionsCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 888), [], "array", false, true, false, 888), "love", [], "any", true, true, false, 888) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 888, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 888), [], "array", false, false, false, 888), "love", [], "any", false, false, false, 888)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 888, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 888), [], "array", false, false, false, 888), "love", [], "any", false, false, false, 888)) : (0))) + (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 889
($context["reactionsCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 889), [], "array", false, true, false, 889), "haha", [], "any", true, true, false, 889) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 889, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 889), [], "array", false, false, false, 889), "haha", [], "any", false, false, false, 889)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 889, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 889), [], "array", false, false, false, 889), "haha", [], "any", false, false, false, 889)) : (0))) + (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 890
($context["reactionsCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 890), [], "array", false, true, false, 890), "sad", [], "any", true, true, false, 890) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 890, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 890), [], "array", false, false, false, 890), "sad", [], "any", false, false, false, 890)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 890, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 890), [], "array", false, false, false, 890), "sad", [], "any", false, false, false, 890)) : (0))) + (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 891
($context["reactionsCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 891), [], "array", false, true, false, 891), "angry", [], "any", true, true, false, 891) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 891, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 891), [], "array", false, false, false, 891), "angry", [], "any", false, false, false, 891)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 891, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 891), [], "array", false, false, false, 891), "angry", [], "any", false, false, false, 891)) : (0))), "html", null, true);
            // line 892
            yield "</span>
                    </button>
                    <div class=\"reaction-popup\">
                        <span class=\"emo\" onclick=\"sendReaction(";
            // line 895
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 895), "html", null, true);
            yield ", 'like')\">👍</span>
                        <span class=\"emo\" onclick=\"sendReaction(";
            // line 896
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 896), "html", null, true);
            yield ", 'love')\">❤️</span>
                        <span class=\"emo\" onclick=\"sendReaction(";
            // line 897
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 897), "html", null, true);
            yield ", 'haha')\">😂</span>
                        <span class=\"emo\" onclick=\"sendReaction(";
            // line 898
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 898), "html", null, true);
            yield ", 'sad')\">😢</span>
                        <span class=\"emo\" onclick=\"sendReaction(";
            // line 899
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 899), "html", null, true);
            yield ", 'angry')\">😠</span>
                    </div>
                </div>

                ";
            // line 904
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 904)]), "html", null, true);
            yield "\" class=\"act act-comment\">
                    <svg width=\"13\" height=\"13\" viewBox=\"0 0 13 13\" fill=\"none\">
                        <path d=\"M11 2H2v7h2.5l2 2 2-2H11V2z\" stroke=\"currentColor\" stroke-width=\"1.15\" stroke-linejoin=\"round\"/>
                    </svg>
                    ";
            // line 908
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_comment"), "html", null, true);
            yield "
                </a>

                ";
            // line 912
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 912, $this->source); })()), "user", [], "any", false, false, false, 912)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 913
                yield "                <button class=\"act act-pin ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 913)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "pin-on";
                }
                yield "\"
                        id=\"pin-";
                // line 914
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 914), "html", null, true);
                yield "\"
                        onclick=\"togglePin(";
                // line 915
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 915), "html", null, true);
                yield ")\">
                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                        <path d=\"M5 1l.8 2.4H8L6.1 5l.7 2.4L5 6l-1.8 1.4.7-2.4L2 3.4h2.2z\"
                              stroke=\"currentColor\"
                              fill=\"";
                // line 919
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 919)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "currentColor";
                } else {
                    yield "none";
                }
                yield "\"
                              stroke-width=\"1\"/>
                    </svg>
                    <span id=\"pin-lbl-";
                // line 922
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 922), "html", null, true);
                yield "\">";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "isPinned", [], "any", false, false, false, 922)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_unpin"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_pin"), "html", null, true)));
                yield "</span>
                </button>
                ";
            }
            // line 925
            yield "
                ";
            // line 927
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 927, $this->source); })()), "user", [], "any", false, false, false, 927)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 928
                yield "                <form method=\"post\"
                      action=\"";
                // line 929
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_repost", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 929)]), "html", null, true);
                yield "\"
                      onsubmit=\"return confirm('";
                // line 930
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("repost_confirm"), "html", null, true);
                yield "')\"
                      style=\"display:contents;\">
                    <button type=\"submit\" class=\"act act-repost\">
                        <svg width=\"13\" height=\"13\" viewBox=\"0 0 14 14\" fill=\"none\">
                            <path d=\"M3 5l-2 2 2 2M11 5l2 2-2 2M1 7h6a3 3 0 000-6H6M8 13H2a3 3 0 000-6H3\" stroke=\"currentColor\" stroke-width=\"1.15\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                        </svg>
                        ";
                // line 936
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_repost"), "html", null, true);
                yield "
                    </button>
                </form>
                ";
            }
            // line 940
            yield "
                ";
            // line 942
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 942, $this->source); })()), "user", [], "any", false, false, false, 942)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 943
                yield "                <button class=\"act act-fav ";
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 943), (isset($context["userFavoris"]) || array_key_exists("userFavoris", $context) ? $context["userFavoris"] : (function () { throw new RuntimeError('Variable "userFavoris" does not exist.', 943, $this->source); })()))) {
                    yield "fav-on";
                }
                yield "\"
                        id=\"fav-";
                // line 944
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 944), "html", null, true);
                yield "\"
                        onclick=\"toggleFavori(";
                // line 945
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 945), "html", null, true);
                yield ")\">
                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                        <path d=\"M6 1l1.2 3.6H11L8.1 6.9l1.1 3.6L6 8.5l-3.2 2 1.1-3.6L1 4.6h3.8z\"
                              stroke=\"currentColor\"
                              fill=\"";
                // line 949
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 949), (isset($context["userFavoris"]) || array_key_exists("userFavoris", $context) ? $context["userFavoris"] : (function () { throw new RuntimeError('Variable "userFavoris" does not exist.', 949, $this->source); })()))) {
                    yield "currentColor";
                } else {
                    yield "none";
                }
                yield "\"
                              stroke-width=\"1\"/>
                    </svg>
                    <span id=\"fav-lbl-";
                // line 952
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 952), "html", null, true);
                yield "\">";
                yield ((CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 952), (isset($context["userFavoris"]) || array_key_exists("userFavoris", $context) ? $context["userFavoris"] : (function () { throw new RuntimeError('Variable "userFavoris" does not exist.', 952, $this->source); })()))) ? ("Retirer") : ("Favori"));
                yield "</span>
                </button>
                ";
            }
            // line 955
            yield "
                ";
            // line 957
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 957)]), "html", null, true);
            yield "\" class=\"act act-read\">
                    ";
            // line 958
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("post_read_more"), "html", null, true);
            yield "
                    <svg width=\"11\" height=\"11\" viewBox=\"0 0 11 11\" fill=\"none\">
                        <path d=\"M2 5.5h7M6 2.5l3 3-3 3\" stroke=\"currentColor\" stroke-width=\"1.2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                </a>

                ";
            // line 965
            yield "                ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 965))) > 200)) {
                // line 966
                yield "                <button class=\"btn-summarize\"
                        data-content=\"";
                // line 967
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 967)), "html_attr");
                yield "\"
                        onclick=\"summarizePost(this)\">
                    <i class=\"fas fa-robot\"></i> Résumer
                </button>
                ";
            }
            // line 972
            yield "
            </div>
        </div>
    </article>

    ";
            $context['_iterated'] = true;
        }
        // line 977
        if (!$context['_iterated']) {
            // line 978
            yield "    <div class=\"empty-state\">
        <div class=\"empty-icon\">📰</div>
        <p>";
            // line 980
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("no_posts"), "html", null, true);
            yield "</p>
        <a href=\"";
            // line 981
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_new");
            yield "\" class=\"btn-new\" style=\"display:inline-flex;\">
            ";
            // line 982
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("be_first"), "html", null, true);
            yield "
        </a>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 986
        yield "
</div>

";
        // line 990
        yield "<div id=\"story-viewer\" class=\"story-viewer-overlay\">
    <div class=\"story-viewer-inner\">
        <button class=\"story-close-btn\" onclick=\"closeStoryViewer()\">×</button>
        <img id=\"sv-img\" src=\"\" alt=\"\" style=\"display:none;\">
        <video id=\"sv-video\" controls autoplay style=\"display:none;\"></video>
        <div class=\"story-progress\"><div class=\"story-progress-fill\" id=\"sv-fill\"></div></div>
        <button class=\"story-arrow prev\" onclick=\"prevStory()\">‹</button>
        <button class=\"story-arrow next\" onclick=\"nextStory()\">›</button>
    </div>
</div>

";
        // line 1002
        yield "<div id=\"lightbox\" class=\"lightbox-overlay\" onclick=\"closeLightbox()\">
    <img id=\"lb-img\" src=\"\" alt=\"\">
</div>

<script>
/* ===== MARKDOWN ===== */
function mdToHtml(text) {
    if (!text) return '';
    let h = text
        .replace(/\\*\\*(.*?)\\*\\*/g, '<strong>\$1</strong>')
        .replace(/\\*(.*?)\\*/g, '<em>\$1</em>');
    const lines = h.split('\\n');
    let inList = false, out = [];
    for (let line of lines) {
        if (line.trim().startsWith('- ')) {
            if (!inList) { out.push('<ul>'); inList = true; }
            out.push('<li>' + line.trim().slice(2) + '</li>');
        } else {
            if (inList) { out.push('</ul>'); inList = false; }
            out.push(line.trim() ? line : '<br>');
        }
    }
    if (inList) out.push('</ul>');
    return out.join('').replace(/\\n/g,'<br>').replace(/<\\/ul><br>/g,'</ul>').replace(/<br><ul>/g,'<ul>');
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.markdown-content').forEach(el => {
        const raw = el.dataset.markdown;
        if (!raw) return;
        let short = raw.length > 250 ? raw.slice(0, 250).replace(/\\*\\*[^*]*\$/, '').replace(/\\*[^*]*\$/, '') + '…' : raw;
        el.innerHTML = mdToHtml(short);
    });
    initStories();
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dot-menu-wrap')) {
            document.querySelectorAll('.dot-menu-wrap.open').forEach(m => m.classList.remove('open'));
        }
    });
});

/* ===== DOT MENU ===== */
function toggleDotMenu(id) {
    const el = document.getElementById('menu-' + id);
    const wasOpen = el.classList.contains('open');
    document.querySelectorAll('.dot-menu-wrap.open').forEach(m => m.classList.remove('open'));
    if (!wasOpen) el.classList.add('open');
}

/* ===== REACTIONS ===== */
function sendReaction(postId, type) {
    fetch('/posts/' + postId + '/react', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: type })
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) return;
        const total = (data.counts.like||0) + (data.counts.love||0) + (data.counts.haha||0) + (data.counts.sad||0) + (data.counts.angry||0);
        const countEl = document.getElementById('r-count-' + postId);
        if (countEl) countEl.textContent = total;
        const btn = document.getElementById('r-btn-' + postId);
        if (btn) {
            const emoMap = { like:'👍', love:'❤️', haha:'😂', sad:'😢', angry:'😠' };
            const emoji = emoMap[data.userReaction] || '👍';
            btn.childNodes[0].textContent = emoji;
            btn.classList.toggle('active-reaction', !!data.userReaction);
        }
    })
    .catch(console.error);
}

/* ===== PIN ===== */
function togglePin(postId) {
    fetch('/posts/' + postId + '/pin', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) location.reload();
        else alert(data.message || 'Erreur');
    })
    .catch(() => alert('Erreur de connexion'));
}

/* ===== FAVORIS ===== */
function toggleFavori(postId) {
    fetch('/posts/' + postId + '/favori', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) location.reload();
        else alert(data.message || 'Erreur');
    })
    .catch(() => alert('Erreur de connexion'));
}

/* ===== LIGHTBOX ===== */
function openLightbox(src) {
    document.getElementById('lb-img').src = src;
    document.getElementById('lightbox').classList.add('open');
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
}

/* ===== STORIES ===== */
let storiesList = [], storyIdx = 0, storyTimer = null;

function initStories() {
    storiesList = [];
    document.querySelectorAll('.story-item[data-story-id]').forEach(el => {
        storiesList.push({
            id: el.dataset.storyId,
            type: el.dataset.mediaType,
            url: el.dataset.mediaUrl,
            name: el.dataset.userName || ''
        });
        el.addEventListener('click', function () {
            storyIdx = storiesList.findIndex(s => s.id == this.dataset.storyId);
            if (storyIdx !== -1) openStory(storyIdx);
        });
    });
}

function openStory(idx) {
    if (idx < 0 || idx >= storiesList.length) return;
    const s = storiesList[idx];
    const img = document.getElementById('sv-img');
    const video = document.getElementById('sv-video');
    if (s.type === 'image') {
        img.src = s.url; img.style.display = 'block';
        video.style.display = 'none'; video.pause();
        startStoryTimer(5000);
    } else {
        img.style.display = 'none';
        video.src = s.url; video.style.display = 'block';
        video.load(); video.play();
        video.onloadedmetadata = () => startStoryTimer(video.duration * 1000);
    }
    document.getElementById('story-viewer').classList.add('open');
}

function startStoryTimer(dur) {
    if (storyTimer) clearInterval(storyTimer);
    const fill = document.getElementById('sv-fill');
    fill.style.width = '0%';
    const t0 = Date.now();
    storyTimer = setInterval(() => {
        const pct = Math.min(((Date.now() - t0) / dur) * 100, 100);
        fill.style.width = pct + '%';
        if (pct >= 100) { clearInterval(storyTimer); nextStory(); }
    }, 100);
}

function nextStory() {
    if (storyIdx + 1 < storiesList.length) { storyIdx++; openStory(storyIdx); }
    else closeStoryViewer();
}

function prevStory() {
    if (storyIdx > 0) { storyIdx--; openStory(storyIdx); }
}

function closeStoryViewer() {
    document.getElementById('story-viewer').classList.remove('open');
    if (storyTimer) clearInterval(storyTimer);
    const video = document.getElementById('sv-video');
    video.pause(); video.src = '';
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { closeLightbox(); closeStoryViewer(); }
    if (e.key === 'ArrowRight') nextStory();
    if (e.key === 'ArrowLeft') prevStory();
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
        return "post/index.html.twig";
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
        return array (  1459 => 1002,  1446 => 990,  1441 => 986,  1431 => 982,  1427 => 981,  1423 => 980,  1419 => 978,  1417 => 977,  1408 => 972,  1400 => 967,  1397 => 966,  1394 => 965,  1385 => 958,  1380 => 957,  1377 => 955,  1369 => 952,  1359 => 949,  1352 => 945,  1348 => 944,  1341 => 943,  1338 => 942,  1335 => 940,  1328 => 936,  1319 => 930,  1315 => 929,  1312 => 928,  1309 => 927,  1306 => 925,  1298 => 922,  1288 => 919,  1281 => 915,  1277 => 914,  1270 => 913,  1267 => 912,  1261 => 908,  1253 => 904,  1246 => 899,  1242 => 898,  1238 => 897,  1234 => 896,  1230 => 895,  1225 => 892,  1223 => 891,  1222 => 890,  1221 => 889,  1220 => 888,  1219 => 887,  1215 => 886,  1212 => 885,  1207 => 884,  1203 => 883,  1199 => 882,  1194 => 881,  1192 => 880,  1188 => 879,  1182 => 878,  1179 => 877,  1175 => 874,  1172 => 872,  1167 => 870,  1159 => 866,  1156 => 865,  1150 => 861,  1146 => 860,  1140 => 858,  1136 => 855,  1127 => 849,  1119 => 844,  1115 => 843,  1110 => 841,  1103 => 837,  1098 => 835,  1089 => 834,  1087 => 833,  1084 => 832,  1078 => 829,  1072 => 825,  1070 => 824,  1064 => 821,  1060 => 820,  1056 => 818,  1050 => 816,  1044 => 814,  1042 => 813,  1038 => 811,  1027 => 807,  1021 => 806,  1018 => 804,  1009 => 802,  1004 => 801,  995 => 799,  990 => 798,  987 => 796,  982 => 793,  967 => 782,  965 => 781,  962 => 780,  953 => 777,  949 => 775,  943 => 773,  937 => 771,  935 => 770,  929 => 767,  925 => 766,  921 => 765,  917 => 764,  914 => 763,  910 => 762,  906 => 760,  903 => 759,  895 => 753,  883 => 746,  877 => 745,  871 => 744,  865 => 743,  860 => 741,  856 => 740,  850 => 737,  847 => 736,  840 => 731,  833 => 727,  828 => 725,  824 => 724,  820 => 722,  816 => 719,  806 => 718,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ 'feed_title'|trans }} | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link href=\"https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&family=DM+Serif+Display&display=swap\" rel=\"stylesheet\">
<style>
    /* ===== RESET & BASE ===== */
    *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background: #f5f4f1;
        font-family: 'DM Sans', system-ui, sans-serif;
        color: #1a1a1a;
        -webkit-font-smoothing: antialiased;
    }

    /* ===== VARIABLES ===== */
    :root {
        --accent: #d94f3d;
        --accent-soft: #fdf1ef;
        --accent-border: #f2c4be;
        --pin: #2d6ef5;
        --pin-soft: #eef2ff;
        --pin-border: #c7d4fd;
        --green: #2a7d4f;
        --green-soft: #edf7f2;
        --amber: #b45309;
        --amber-soft: #fef8ed;
        --amber-border: #fcd896;
        --surface: #ffffff;
        --surface-2: #f9f8f6;
        --border: rgba(0,0,0,0.08);
        --border-md: rgba(0,0,0,0.13);
        --text-1: #111111;
        --text-2: #555555;
        --text-3: #999999;
        --radius-sm: 8px;
        --radius-md: 14px;
        --radius-lg: 20px;
        --radius-xl: 28px;
    }

    /* ===== LAYOUT ===== */
    .feed-wrap {
        max-width: 720px;
        margin: 0 auto;
        padding: 2rem 1.25rem 4rem;
    }

    /* ===== HEADER ===== */
    .feed-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.75rem;
    }

    .feed-header-left h1 {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 2rem;
        font-weight: 400;
        color: var(--text-1);
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .feed-header-left p {
        font-size: 13px;
        color: var(--text-3);
        margin-top: 2px;
    }

    /* BOUTON ROUGE MODIFIÉ ICI */
    .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 20px;
        background: var(--accent);  /* Couleur rouge/orangé */
        color: #fff;
        border: none;
        border-radius: 99px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: background .15s, transform .12s;
        white-space: nowrap;
    }

    .btn-new:hover {
        background: #b83f2f;  /* Rouge plus foncé au survol */
        transform: translateY(-1px);
        color: #fff;
    }

    .btn-new svg {
        flex-shrink: 0;
    }

    /* ===== SEARCH ===== */
    .search-bar {
        display: flex;
        gap: 8px;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .search-bar input,
    .search-bar select {
        padding: 10px 14px;
        border: 1px solid var(--border-md);
        border-radius: var(--radius-md);
        background: var(--surface);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        color: var(--text-1);
        outline: none;
        transition: border-color .15s;
    }

    .search-bar input {
        flex: 1;
        min-width: 0;
    }

    .search-bar select {
        flex: 0 0 148px;
    }

    .search-bar input:focus,
    .search-bar select:focus {
        border-color: var(--text-1);
    }

    .search-bar input::placeholder {
        color: var(--text-3);
    }

   .search-bar button {
    padding: 10px 20px;
    background: var(--accent);  /* rouge */
    color: #fff;
    border: none;
    border-radius: var(--radius-md);
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background .15s;
    white-space: nowrap;
}

.search-bar button:hover {
    background: #b83f2f;  /* rouge plus foncé au survol */
    opacity: 1;
}
    /* ===== STORIES ===== */
    .stories-wrap {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .stories-wrap::-webkit-scrollbar { display: none; }

    .stories-inner {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }

    .story-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        flex-shrink: 0;
        transition: transform .15s;
    }

    .story-item:hover {
        transform: translateY(-2px);
    }

    .story-ring {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        padding: 2.5px;
        background: conic-gradient(#f09433, #e6683c, #dc2743, #cc2366, #bc1888, #f09433);
    }

    .story-ring.add-ring {
        background: var(--border-md);
    }

    .story-avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--surface);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-size: 16px;
        font-weight: 500;
        color: var(--text-2);
    }

    .story-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-name {
        font-size: 11px;
        color: var(--text-2);
        max-width: 60px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* ===== STORY VIEWER ===== */
    .story-viewer-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.94);
        z-index: 3000;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .story-viewer-overlay.open {
        display: flex;
    }

    .story-viewer-inner {
        position: relative;
        max-width: 420px;
        width: 90%;
    }

    .story-viewer-inner img,
    .story-viewer-inner video {
        width: 100%;
        border-radius: var(--radius-lg);
    }

    .story-close-btn {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
    }

    .story-progress {
        width: 100%;
        height: 3px;
        background: rgba(255,255,255,.25);
        border-radius: 99px;
        margin-top: 10px;
        overflow: hidden;
    }

    .story-progress-fill {
        height: 100%;
        background: #fff;
        width: 0%;
        transition: width .1s linear;
    }

    .story-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,.15);
        border: none;
        color: #fff;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .15s;
    }

    .story-arrow:hover { background: rgba(255,255,255,.3); }
    .story-arrow.prev { left: -50px; }
    .story-arrow.next { right: -50px; }

    /* ===== ALERTS ===== */
    .alert {
        padding: 12px 16px;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        font-size: 13px;
        font-weight: 500;
    }

    .alert-success {
        background: #edf7f2;
        color: #1a5c36;
        border-left: 3px solid #2a7d4f;
    }

    .alert-danger {
        background: var(--accent-soft);
        color: #8b2119;
        border-left: 3px solid var(--accent);
    }

    /* ===== POST CARD ===== */
    .post-card {
        background: var(--surface);
        border-radius: var(--radius-xl);
        border: 1px solid var(--border);
        margin-bottom: 1rem;
        overflow: hidden;
        transition: border-color .15s, box-shadow .15s;
    }

    .post-card:hover {
        border-color: var(--border-md);
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .post-card.pinned {
        border-left: 3px solid var(--pin);
    }

    .post-body {
        padding: 1.375rem 1.625rem;
    }

    /* Author row */
    .author-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1rem;
    }

    .author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 600;
        flex-shrink: 0;
        overflow: hidden;
        background: #f0eee8;
        color: var(--text-2);
    }

    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .author-info strong {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-1);
        line-height: 1.3;
    }

    .author-info time {
        font-size: 12px;
        color: var(--text-3);
    }

    .pin-badge {
        margin-left: auto;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: var(--pin-soft);
        color: var(--pin);
        border: 1px solid var(--pin-border);
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 99px;
    }

    /* Dot menu */
    .dot-menu-wrap {
        position: relative;
        margin-left: auto;
    }

    .dot-menu-wrap.has-pin-badge {
        margin-left: 0;
    }

    .dot-trigger {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid var(--border);
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        color: var(--text-3);
        transition: background .12s;
        line-height: 1;
        letter-spacing: 1px;
        font-family: sans-serif;
    }

    .dot-trigger:hover { background: var(--surface-2); }

    .dot-drop {
        position: absolute;
        top: calc(100% + 5px);
        right: 0;
        background: var(--surface);
        border: 1px solid var(--border-md);
        border-radius: var(--radius-md);
        min-width: 140px;
        z-index: 200;
        display: none;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .dot-menu-wrap.open .dot-drop { display: block; }

    .dot-drop a,
    .dot-drop button {
        display: flex;
        align-items: center;
        gap: 8px;
        width: 100%;
        padding: 9px 14px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: var(--text-1);
        text-decoration: none;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        transition: background .1s;
    }

    .dot-drop a:hover,
    .dot-drop button:hover { background: var(--surface-2); }
    .dot-drop .drop-del { color: var(--accent); }

    /* Post content */
    .post-title {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 1.2rem;
        font-weight: 400;
        color: var(--text-1);
        margin-bottom: 6px;
        line-height: 1.35;
        letter-spacing: -0.01em;
    }

    .post-excerpt {
        font-size: 14px;
        color: var(--text-2);
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .post-excerpt strong { color: var(--text-1); font-weight: 600; }
    .post-excerpt em { font-style: italic; }

    .post-image {
        width: 100%;
        max-height: 360px;
        object-fit: cover;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        cursor: pointer;
        display: block;
        transition: opacity .15s;
        border: 1px solid var(--border);
    }

    .post-image:hover { opacity: .96; }

    /* ===== ACTIONS ===== */
    .post-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
        flex-wrap: wrap;
    }

    .act {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 12px;
        border-radius: 99px;
        border: 1px solid var(--border-md);
        background: transparent;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-2);
        text-decoration: none;
        cursor: pointer;
        transition: background .12s, border-color .12s, color .12s, transform .1s;
        white-space: nowrap;
    }

    .act:hover {
        background: var(--surface-2);
        border-color: var(--border-md);
        color: var(--text-1);
        transform: translateY(-1px);
    }

    .act.active-reaction {
        background: var(--accent-soft);
        border-color: var(--accent-border);
        color: var(--accent);
    }

    .act.act-comment:hover {
        background: #f0f4ff;
        border-color: #c7d4fd;
        color: var(--pin);
    }

    .act.act-pin { color: var(--pin); border-color: var(--pin-border); }
    .act.act-pin:hover, .act.act-pin.pin-on {
        background: var(--pin-soft);
        border-color: var(--pin);
        color: var(--pin);
    }

    .act.act-repost { color: var(--green); border-color: #b6dfc8; }
    .act.act-repost:hover {
        background: var(--green-soft);
        border-color: var(--green);
        color: var(--green);
    }

    .act.act-fav { color: var(--amber); border-color: var(--amber-border); }
    .act.act-fav:hover, .act.act-fav.fav-on {
        background: var(--amber-soft);
        border-color: var(--amber-border);
        color: var(--amber);
    }

    .act.act-read {
        margin-left: auto;
        border-color: transparent;
        color: var(--text-3);
    }

    .act.act-read:hover {
        background: none;
        color: var(--text-1);
        transform: none;
    }

    /* ===== BOUTON RÉSUMÉ (AJOUT) ===== */
    .btn-summarize {
        background: none;
        border: 1.5px solid var(--border-md);
        border-radius: 99px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        color: #6c5ce7;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-summarize:hover {
        border-color: #6c5ce7;
        color: #6c5ce7;
        background: rgba(108,92,231,0.1);
        transform: translateY(-1px);
    }

    /* Reaction popup */
    .reaction-wrap {
        position: relative;
        display: inline-block;
    }

    .reaction-popup {
        position: absolute;
        bottom: calc(100% + 7px);
        left: 0;
        background: var(--surface);
        border: 1px solid var(--border-md);
        border-radius: 99px;
        padding: 6px 10px;
        display: none;
        gap: 3px;
        z-index: 100;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .reaction-wrap:hover .reaction-popup,
    .reaction-popup:hover {
        display: flex;
    }

    .emo {
        font-size: 20px;
        cursor: pointer;
        padding: 2px 4px;
        border-radius: 50%;
        transition: transform .1s;
        line-height: 1;
    }

    .emo:hover { transform: scale(1.28); }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-xl);
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: .3;
    }

    .empty-state p {
        color: var(--text-3);
        font-size: 14px;
        margin-bottom: 1.25rem;
    }

    /* ===== LIGHTBOX ===== */
    .lightbox-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.92);
        z-index: 3000;
        display: none;
        align-items: center;
        justify-content: center;
        cursor: zoom-out;
    }

    .lightbox-overlay.open { display: flex; }

    .lightbox-overlay img {
        max-width: 90%;
        max-height: 90vh;
        border-radius: var(--radius-md);
        pointer-events: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 640px) {
        .feed-wrap { padding: 1.25rem 1rem 3rem; }
        .feed-header { flex-wrap: wrap; gap: .75rem; }
        .feed-header-left h1 { font-size: 1.6rem; }
        .search-bar { flex-direction: column; }
        .search-bar select { flex: 1; }
        .post-body { padding: 1.1rem 1.2rem; }
        .post-title { font-size: 1.05rem; }
        .story-arrow.prev { left: -10px; }
        .story-arrow.next { right: -10px; }
        .post-actions { gap: 4px; }
        .act, .btn-summarize { padding: 5px 10px; font-size: 11px; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"feed-wrap\">

    {# ===== HEADER ===== #}
    <div class=\"feed-header\">
        <div class=\"feed-header-left\">
            <h1>{{ 'feed_title'|trans }}</h1>
            <p>{{ posts|length }} publications</p>
        </div>
        <a href=\"{{ path('app_post_new') }}\" class=\"btn-new\">
            <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                <path d=\"M6 1v10M1 6h10\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\"/>
            </svg>
            {{ 'new_post'|trans }}
        </a>
    </div>

    {# ===== SEARCH ===== #}
    <div class=\"search-bar\">
        <form method=\"get\" action=\"{{ path('app_posts_index') }}\" style=\"display:contents;\">
            <input type=\"text\"
                   name=\"search\"
                   placeholder=\"{{ 'search_placeholder'|trans }}\"
                   value=\"{{ search|default('') }}\">
            <select name=\"sort\">
                <option value=\"recent\"  {{ sort == 'recent'  ? 'selected' : '' }}>{{ 'sort_recent'|trans }}</option>
                <option value=\"oldest\"  {{ sort == 'oldest'  ? 'selected' : '' }}>{{ 'sort_oldest'|trans }}</option>
                <option value=\"popular\" {{ sort == 'popular' ? 'selected' : '' }}>{{ 'sort_popular'|trans }}</option>
                <option value=\"pinned\"  {{ sort == 'pinned'  ? 'selected' : '' }}>{{ 'sort_pinned'|trans }}</option>
            </select>
            <button type=\"submit\">
                <svg width=\"13\" height=\"13\" viewBox=\"0 0 13 13\" fill=\"none\" style=\"vertical-align:-2px;margin-right:4px\">
                    <circle cx=\"5.5\" cy=\"5.5\" r=\"4\" stroke=\"currentColor\" stroke-width=\"1.4\"/>
                    <path d=\"M9 9l2.5 2.5\" stroke=\"currentColor\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
                </svg>
                {{ 'search_button'|trans }}
            </button>
        </form>
    </div>

    {# ===== STORIES ===== #}
    {% if stories is defined and stories|length > 0 %}
    <div class=\"stories-wrap\">
        <div class=\"stories-inner\">
            {% for story in stories %}
            <div class=\"story-item\"
                 data-story-id=\"{{ story.id }}\"
                 data-media-type=\"{{ story.mediaType }}\"
                 data-media-url=\"{{ story.mediaPath }}\"
                 data-user-name=\"{{ story.utilisateur.nom }}\">
                <div class=\"story-ring\">
                    <div class=\"story-avatar\">
                        {% if story.utilisateur.photo %}
                            <img src=\"{{ story.utilisateur.photo }}\" alt=\"\">
                        {% else %}
                            {{ story.utilisateur.nom|first|upper }}
                        {% endif %}
                    </div>
                </div>
                <span class=\"story-name\">{{ story.utilisateur.nom }}</span>
            </div>
            {% endfor %}

            {% if app.user %}
            <div class=\"story-item\" onclick=\"location.href='{{ path('app_story_new') }}'\">
                <div class=\"story-ring add-ring\">
                    <div class=\"story-avatar\">
                        <svg width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\">
                            <path d=\"M9 3v12M3 9h12\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"/>
                        </svg>
                    </div>
                </div>
                <span class=\"story-name\">Ajouter</span>
            </div>
            {% endif %}
        </div>
    </div>
    {% endif %}

    {# ===== FLASH MESSAGES ===== #}
    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ msg }}</div>
    {% endfor %}
    {% for msg in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ msg }}</div>
    {% endfor %}

    {# ===== POSTS ===== #}
    {% for post in posts %}
    <article class=\"post-card {% if post.isPinned %}pinned{% endif %}\" id=\"post-{{ post.id }}\">
        <div class=\"post-body\">

            {# Author row #}
            <div class=\"author-row\">
                <div class=\"author-avatar\">
                    {% if post.utilisateur.photo is defined and post.utilisateur.photo %}
                        <img src=\"{{ post.utilisateur.photo }}\" alt=\"\">
                    {% else %}
                        {{ post.utilisateur.nom|first|upper }}
                    {% endif %}
                </div>
                <div class=\"author-info\">
                    <strong>{{ post.utilisateur.nom }}</strong>
                    <time>{{ post.createdAt|date('d/m/Y à H:i') }}</time>
                </div>

                {% if post.isPinned %}
                    <div class=\"pin-badge\">
                        <svg width=\"10\" height=\"10\" viewBox=\"0 0 10 10\" fill=\"none\">
                            <path d=\"M5 1l1 2.5h2.5L6.5 5l.9 2.5L5 6 2.6 7.5l.9-2.5L1.5 3.5H4z\" fill=\"currentColor\"/>
                        </svg>
                        {{ 'post_pinned'|trans }}
                    </div>
                {% endif %}

                {% if app.user and (post.utilisateur.idUtilisateur == app.user.idUtilisateur or (app.user.role ?? '') == 'admin') %}
                <div class=\"dot-menu-wrap {% if post.isPinned %}has-pin-badge{% endif %}\" id=\"menu-{{ post.id }}\">
                    <button class=\"dot-trigger\" onclick=\"toggleDotMenu('{{ post.id }}')\">···</button>
                    <div class=\"dot-drop\">
                        <a href=\"{{ path('app_post_edit', {id: post.id}) }}\">
                            <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                                <path d=\"M8.5 1.5l2 2L4 10H2V8L8.5 1.5z\" stroke=\"currentColor\" stroke-width=\"1.1\" stroke-linejoin=\"round\"/>
                            </svg>
                            {{ 'post_edit'|trans }}
                        </a>
                        <form method=\"post\" action=\"{{ path('app_post_delete', {id: post.id}) }}\"
                              onsubmit=\"return confirm('{{ 'post_delete_confirm'|trans }}')\">
                            <button type=\"submit\" class=\"drop-del\">
                                <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                                    <path d=\"M2 3h8M5 3V2h2v1M4 3v6.5h4V3\" stroke=\"currentColor\" stroke-width=\"1.1\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                                </svg>
                                {{ 'post_delete'|trans }}
                            </button>
                        </form>
                    </div>
                </div>
                {% endif %}
            </div>

            {# Title & excerpt #}
            <div class=\"post-title\">{{ post.title|censor }}</div>
            <div class=\"post-excerpt markdown-content\"
                 data-markdown=\"{{ post.content|censor|escape('html_attr') }}\">
                {{ post.content|censor|slice(0, 250)|escape }}…
            </div>

            {# Image #}
            {% if post.imagePath %}
                <img src=\"{{ post.imagePath }}\"
                     class=\"post-image\"
                     alt=\"Image du post\"
                     loading=\"lazy\"
                     onclick=\"openLightbox('{{ post.imagePath }}')\">
            {% endif %}

            {# Actions #}
            <div class=\"post-actions\">

                {# Reactions #}
                <div class=\"reaction-wrap\">
                    <button class=\"act {% if userReactions[post.id] is defined and userReactions[post.id] %}active-reaction{% endif %}\"
                            id=\"r-btn-{{ post.id }}\">
                        {% set ur = userReactions[post.id]|default(null) %}
                        {% if ur == 'love' %}❤️
                        {% elseif ur == 'haha' %}😂
                        {% elseif ur == 'sad' %}😢
                        {% elseif ur == 'angry' %}😠
                        {% else %}👍{% endif %}
                        <span id=\"r-count-{{ post.id }}\">{{
                            (reactionsCount[post.id].like ?? 0) +
                            (reactionsCount[post.id].love ?? 0) +
                            (reactionsCount[post.id].haha ?? 0) +
                            (reactionsCount[post.id].sad ?? 0) +
                            (reactionsCount[post.id].angry ?? 0)
                        }}</span>
                    </button>
                    <div class=\"reaction-popup\">
                        <span class=\"emo\" onclick=\"sendReaction({{ post.id }}, 'like')\">👍</span>
                        <span class=\"emo\" onclick=\"sendReaction({{ post.id }}, 'love')\">❤️</span>
                        <span class=\"emo\" onclick=\"sendReaction({{ post.id }}, 'haha')\">😂</span>
                        <span class=\"emo\" onclick=\"sendReaction({{ post.id }}, 'sad')\">😢</span>
                        <span class=\"emo\" onclick=\"sendReaction({{ post.id }}, 'angry')\">😠</span>
                    </div>
                </div>

                {# Comment #}
                <a href=\"{{ path('app_post_show', {id: post.id}) }}\" class=\"act act-comment\">
                    <svg width=\"13\" height=\"13\" viewBox=\"0 0 13 13\" fill=\"none\">
                        <path d=\"M11 2H2v7h2.5l2 2 2-2H11V2z\" stroke=\"currentColor\" stroke-width=\"1.15\" stroke-linejoin=\"round\"/>
                    </svg>
                    {{ 'post_comment'|trans }}
                </a>

                {# Pin #}
                {% if app.user %}
                <button class=\"act act-pin {% if post.isPinned %}pin-on{% endif %}\"
                        id=\"pin-{{ post.id }}\"
                        onclick=\"togglePin({{ post.id }})\">
                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                        <path d=\"M5 1l.8 2.4H8L6.1 5l.7 2.4L5 6l-1.8 1.4.7-2.4L2 3.4h2.2z\"
                              stroke=\"currentColor\"
                              fill=\"{% if post.isPinned %}currentColor{% else %}none{% endif %}\"
                              stroke-width=\"1\"/>
                    </svg>
                    <span id=\"pin-lbl-{{ post.id }}\">{{ post.isPinned ? 'post_unpin'|trans : 'post_pin'|trans }}</span>
                </button>
                {% endif %}

                {# Repost #}
                {% if app.user %}
                <form method=\"post\"
                      action=\"{{ path('app_post_repost', {id: post.id}) }}\"
                      onsubmit=\"return confirm('{{ 'repost_confirm'|trans }}')\"
                      style=\"display:contents;\">
                    <button type=\"submit\" class=\"act act-repost\">
                        <svg width=\"13\" height=\"13\" viewBox=\"0 0 14 14\" fill=\"none\">
                            <path d=\"M3 5l-2 2 2 2M11 5l2 2-2 2M1 7h6a3 3 0 000-6H6M8 13H2a3 3 0 000-6H3\" stroke=\"currentColor\" stroke-width=\"1.15\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                        </svg>
                        {{ 'post_repost'|trans }}
                    </button>
                </form>
                {% endif %}

                {# Favori #}
                {% if app.user %}
                <button class=\"act act-fav {% if post.id in userFavoris %}fav-on{% endif %}\"
                        id=\"fav-{{ post.id }}\"
                        onclick=\"toggleFavori({{ post.id }})\">
                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\" fill=\"none\">
                        <path d=\"M6 1l1.2 3.6H11L8.1 6.9l1.1 3.6L6 8.5l-3.2 2 1.1-3.6L1 4.6h3.8z\"
                              stroke=\"currentColor\"
                              fill=\"{% if post.id in userFavoris %}currentColor{% else %}none{% endif %}\"
                              stroke-width=\"1\"/>
                    </svg>
                    <span id=\"fav-lbl-{{ post.id }}\">{{ post.id in userFavoris ? 'Retirer' : 'Favori' }}</span>
                </button>
                {% endif %}

                {# Read more #}
                <a href=\"{{ path('app_post_show', {id: post.id}) }}\" class=\"act act-read\">
                    {{ 'post_read_more'|trans }}
                    <svg width=\"11\" height=\"11\" viewBox=\"0 0 11 11\" fill=\"none\">
                        <path d=\"M2 5.5h7M6 2.5l3 3-3 3\" stroke=\"currentColor\" stroke-width=\"1.2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                </a>

                {# ===== BOUTON RÉSUMÉ (AJOUT) ===== #}
                {% if post.content|censor|length > 200 %}
                <button class=\"btn-summarize\"
                        data-content=\"{{ post.content|censor|escape('html_attr') }}\"
                        onclick=\"summarizePost(this)\">
                    <i class=\"fas fa-robot\"></i> Résumer
                </button>
                {% endif %}

            </div>
        </div>
    </article>

    {% else %}
    <div class=\"empty-state\">
        <div class=\"empty-icon\">📰</div>
        <p>{{ 'no_posts'|trans }}</p>
        <a href=\"{{ path('app_post_new') }}\" class=\"btn-new\" style=\"display:inline-flex;\">
            {{ 'be_first'|trans }}
        </a>
    </div>
    {% endfor %}

</div>

{# ===== STORY VIEWER ===== #}
<div id=\"story-viewer\" class=\"story-viewer-overlay\">
    <div class=\"story-viewer-inner\">
        <button class=\"story-close-btn\" onclick=\"closeStoryViewer()\">×</button>
        <img id=\"sv-img\" src=\"\" alt=\"\" style=\"display:none;\">
        <video id=\"sv-video\" controls autoplay style=\"display:none;\"></video>
        <div class=\"story-progress\"><div class=\"story-progress-fill\" id=\"sv-fill\"></div></div>
        <button class=\"story-arrow prev\" onclick=\"prevStory()\">‹</button>
        <button class=\"story-arrow next\" onclick=\"nextStory()\">›</button>
    </div>
</div>

{# ===== LIGHTBOX ===== #}
<div id=\"lightbox\" class=\"lightbox-overlay\" onclick=\"closeLightbox()\">
    <img id=\"lb-img\" src=\"\" alt=\"\">
</div>

<script>
/* ===== MARKDOWN ===== */
function mdToHtml(text) {
    if (!text) return '';
    let h = text
        .replace(/\\*\\*(.*?)\\*\\*/g, '<strong>\$1</strong>')
        .replace(/\\*(.*?)\\*/g, '<em>\$1</em>');
    const lines = h.split('\\n');
    let inList = false, out = [];
    for (let line of lines) {
        if (line.trim().startsWith('- ')) {
            if (!inList) { out.push('<ul>'); inList = true; }
            out.push('<li>' + line.trim().slice(2) + '</li>');
        } else {
            if (inList) { out.push('</ul>'); inList = false; }
            out.push(line.trim() ? line : '<br>');
        }
    }
    if (inList) out.push('</ul>');
    return out.join('').replace(/\\n/g,'<br>').replace(/<\\/ul><br>/g,'</ul>').replace(/<br><ul>/g,'<ul>');
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.markdown-content').forEach(el => {
        const raw = el.dataset.markdown;
        if (!raw) return;
        let short = raw.length > 250 ? raw.slice(0, 250).replace(/\\*\\*[^*]*\$/, '').replace(/\\*[^*]*\$/, '') + '…' : raw;
        el.innerHTML = mdToHtml(short);
    });
    initStories();
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dot-menu-wrap')) {
            document.querySelectorAll('.dot-menu-wrap.open').forEach(m => m.classList.remove('open'));
        }
    });
});

/* ===== DOT MENU ===== */
function toggleDotMenu(id) {
    const el = document.getElementById('menu-' + id);
    const wasOpen = el.classList.contains('open');
    document.querySelectorAll('.dot-menu-wrap.open').forEach(m => m.classList.remove('open'));
    if (!wasOpen) el.classList.add('open');
}

/* ===== REACTIONS ===== */
function sendReaction(postId, type) {
    fetch('/posts/' + postId + '/react', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: type })
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) return;
        const total = (data.counts.like||0) + (data.counts.love||0) + (data.counts.haha||0) + (data.counts.sad||0) + (data.counts.angry||0);
        const countEl = document.getElementById('r-count-' + postId);
        if (countEl) countEl.textContent = total;
        const btn = document.getElementById('r-btn-' + postId);
        if (btn) {
            const emoMap = { like:'👍', love:'❤️', haha:'😂', sad:'😢', angry:'😠' };
            const emoji = emoMap[data.userReaction] || '👍';
            btn.childNodes[0].textContent = emoji;
            btn.classList.toggle('active-reaction', !!data.userReaction);
        }
    })
    .catch(console.error);
}

/* ===== PIN ===== */
function togglePin(postId) {
    fetch('/posts/' + postId + '/pin', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) location.reload();
        else alert(data.message || 'Erreur');
    })
    .catch(() => alert('Erreur de connexion'));
}

/* ===== FAVORIS ===== */
function toggleFavori(postId) {
    fetch('/posts/' + postId + '/favori', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) location.reload();
        else alert(data.message || 'Erreur');
    })
    .catch(() => alert('Erreur de connexion'));
}

/* ===== LIGHTBOX ===== */
function openLightbox(src) {
    document.getElementById('lb-img').src = src;
    document.getElementById('lightbox').classList.add('open');
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
}

/* ===== STORIES ===== */
let storiesList = [], storyIdx = 0, storyTimer = null;

function initStories() {
    storiesList = [];
    document.querySelectorAll('.story-item[data-story-id]').forEach(el => {
        storiesList.push({
            id: el.dataset.storyId,
            type: el.dataset.mediaType,
            url: el.dataset.mediaUrl,
            name: el.dataset.userName || ''
        });
        el.addEventListener('click', function () {
            storyIdx = storiesList.findIndex(s => s.id == this.dataset.storyId);
            if (storyIdx !== -1) openStory(storyIdx);
        });
    });
}

function openStory(idx) {
    if (idx < 0 || idx >= storiesList.length) return;
    const s = storiesList[idx];
    const img = document.getElementById('sv-img');
    const video = document.getElementById('sv-video');
    if (s.type === 'image') {
        img.src = s.url; img.style.display = 'block';
        video.style.display = 'none'; video.pause();
        startStoryTimer(5000);
    } else {
        img.style.display = 'none';
        video.src = s.url; video.style.display = 'block';
        video.load(); video.play();
        video.onloadedmetadata = () => startStoryTimer(video.duration * 1000);
    }
    document.getElementById('story-viewer').classList.add('open');
}

function startStoryTimer(dur) {
    if (storyTimer) clearInterval(storyTimer);
    const fill = document.getElementById('sv-fill');
    fill.style.width = '0%';
    const t0 = Date.now();
    storyTimer = setInterval(() => {
        const pct = Math.min(((Date.now() - t0) / dur) * 100, 100);
        fill.style.width = pct + '%';
        if (pct >= 100) { clearInterval(storyTimer); nextStory(); }
    }, 100);
}

function nextStory() {
    if (storyIdx + 1 < storiesList.length) { storyIdx++; openStory(storyIdx); }
    else closeStoryViewer();
}

function prevStory() {
    if (storyIdx > 0) { storyIdx--; openStory(storyIdx); }
}

function closeStoryViewer() {
    document.getElementById('story-viewer').classList.remove('open');
    if (storyTimer) clearInterval(storyTimer);
    const video = document.getElementById('sv-video');
    video.pause(); video.src = '';
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { closeLightbox(); closeStoryViewer(); }
    if (e.key === 'ArrowRight') nextStory();
    if (e.key === 'ArrowLeft') prevStory();
});
</script>
{% endblock %}", "post/index.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\post\\index.html.twig");
    }
}

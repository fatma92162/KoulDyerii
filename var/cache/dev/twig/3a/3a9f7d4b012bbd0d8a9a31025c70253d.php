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

/* post/show.html.twig */
class __TwigTemplate_cd813e7b3194e8ad74623bb444182199 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/show.html.twig"));

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

        yield $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3));
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
<link href=\"https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">

<style>
/* ============================================================
   KOUL DYERI — POST DETAIL  |  Editorial Culinary Theme
   ============================================================ */

:root {
    --saffron:     #E8A040;
    --saffron-dim: rgba(232,160,64,.12);
    --ember:       #C04A2A;
    --cream:       #FAF7F2;
    --ink:         #1A1612;
    --slate:       #5A5450;
    --mist:        #E9E4DC;
    --white:       #FFFFFF;
    --pin-blue:    #2E86AB;
    --pin-blue-dim:rgba(46,134,171,.12);
    --success:     #2D7D46;
    --danger:      #C04A2A;

    --r-sm:  12px;
    --r-md:  20px;
    --r-lg:  28px;
    --r-xl:  40px;

    --shadow-feather: 0 2px 12px rgba(26,22,18,.06);
    --shadow-float:   0 8px 32px rgba(26,22,18,.10);
    --shadow-lift:    0 20px 56px rgba(26,22,18,.15);

    --font-display: 'Playfair Display', Georgia, serif;
    --font-body:    'DM Sans', sans-serif;

    --transition: .22s cubic-bezier(.4,0,.2,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: var(--cream);
    font-family: var(--font-body);
    color: var(--ink);
    -webkit-font-smoothing: antialiased;
}

/* ── Page wrapper ─────────────────────────────────────────── */
.pd-wrapper {
    max-width: 860px;
    margin: 0 auto;
    padding: 36px 24px 80px;
}

/* ── Back link ────────────────────────────────────────────── */
.pd-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .82rem;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: var(--slate);
    text-decoration: none;
    padding: 8px 18px 8px 12px;
    border-radius: var(--r-xl);
    border: 1.5px solid var(--mist);
    background: var(--white);
    transition: var(--transition);
    margin-bottom: 28px;
}
.pd-back:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
    transform: translateX(-3px);
}

/* ── Flash messages ──────────────────────────────────────── */
.pd-flash {
    border-radius: var(--r-md);
    padding: 14px 20px;
    margin-bottom: 20px;
    font-size: .9rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: fadeSlideDown .35s ease;
}
.pd-flash.success { background: #E8F5ED; color: var(--success); }
.pd-flash.danger  { background: #FBECEA; color: var(--danger);  }

@keyframes fadeSlideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Post card ────────────────────────────────────────────── */
.post-card {
    background: var(--white);
    border-radius: var(--r-lg);
    box-shadow: var(--shadow-float);
    overflow: hidden;
    border: 1px solid rgba(26,22,18,.05);
    animation: cardReveal .45s ease both;
}

@keyframes cardReveal {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}

.post-card.pinned {
    border-top: 4px solid var(--pin-blue);
}

/* ── Pin badge ────────────────────────────────────────────── */
.pin-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--pin-blue);
    color: var(--white);
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 0 0 var(--r-sm) var(--r-sm);
    position: absolute;
    top: 0;
    right: 28px;
}

/* ── Post header ─────────────────────────────────────────── */
.post-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 28px 20px;
    border-bottom: 1px solid var(--mist);
    position: relative;
    flex-wrap: wrap;
    gap: 16px;
}

.author-block {
    display: flex;
    align-items: center;
    gap: 14px;
}

.author-avatar {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--saffron) 0%, var(--ember) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(232,160,64,.35);
}
.author-avatar img { width: 100%; height: 100%; object-fit: cover; }
.author-avatar span { color: var(--white); font-weight: 700; font-size: 20px; }

.author-name {
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 1rem;
    color: var(--ink);
}
.post-meta {
    font-size: .75rem;
    color: var(--slate);
    margin-top: 2px;
}

/* ── Header controls ─────────────────────────────────────── */
.header-controls {
    display: flex;
    gap: 10px;
    align-items: center;
}

.btn-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 600;
    padding: 8px 18px;
    border-radius: var(--r-xl);
    border: 1.5px solid var(--mist);
    background: var(--white);
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    color: var(--slate);
    white-space: nowrap;
}
.btn-pill:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}
.btn-pill.pinned {
    border-color: var(--pin-blue);
    background: var(--pin-blue);
    color: var(--white);
}
.btn-pill.pinned:hover {
    background: #256f90;
    border-color: #256f90;
}

.btn-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1.5px solid var(--mist);
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    color: var(--slate);
    font-size: .9rem;
}
.btn-icon:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}

/* ── Dropdown actions ────────────────────────────────────── */
.dropdown-menu {
    border-radius: var(--r-sm);
    border: 1px solid var(--mist);
    box-shadow: var(--shadow-float);
    padding: 6px;
    min-width: 160px;
}
.dropdown-item {
    border-radius: 8px;
    font-size: .88rem;
    padding: 9px 14px;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 9px;
}
.dropdown-item:hover { background: var(--cream); }

/* ── Post body ───────────────────────────────────────────── */
.post-content {
    padding: 32px 28px 20px;
}

.post-title {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.25;
    margin-bottom: 20px;
}

.post-body {
    font-size: 1.02rem;
    line-height: 1.8;
    color: var(--slate);
    font-weight: 300;
}
.post-body strong { font-weight: 600; color: var(--ink); }
.post-body em     { font-style: italic; font-family: var(--font-display); }
.post-body ul     { margin: 14px 0; padding-left: 22px; }
.post-body li     { margin: 6px 0; }

/* ── Media ───────────────────────────────────────────────── */
.post-image {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    border-radius: var(--r-md);
    margin-top: 24px;
    cursor: zoom-in;
    transition: opacity var(--transition), transform var(--transition);
    display: block;
}
.post-image:hover { opacity: .96; transform: scale(1.005); }

.post-gif {
    text-align: center;
    margin-top: 24px;
}
.post-gif img {
    max-height: 300px;
    max-width: 100%;
    border-radius: var(--r-md);
    box-shadow: var(--shadow-feather);
}

/* ── Hashtags ────────────────────────────────────────────── */
.hashtag-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 22px;
}
.hashtag-pill {
    font-size: .78rem;
    font-weight: 600;
    letter-spacing: .04em;
    color: var(--pin-blue);
    background: var(--pin-blue-dim);
    border: 1px solid transparent;
    padding: 5px 14px;
    border-radius: var(--r-xl);
    text-decoration: none;
    transition: var(--transition);
}
.hashtag-pill:hover {
    background: var(--pin-blue);
    color: var(--white);
}

/* ── Reaction bar ─────────────────────────────────────────── */
.post-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 18px 28px 22px;
    border-top: 1px solid var(--mist);
    align-items: center;
}

/* Reaction dropdown */
.reaction-wrap { position: relative; display: inline-block; }

.btn-react {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-react:hover, .btn-react.active {
    border-color: var(--saffron);
    color: var(--ember);
    background: var(--saffron-dim);
}

.reaction-palette {
    position: absolute;
    bottom: calc(100% + 10px);
    left: 0;
    display: none;
    gap: 4px;
    align-items: center;
    background: var(--white);
    border-radius: var(--r-xl);
    padding: 8px 12px;
    box-shadow: var(--shadow-float);
    border: 1px solid var(--mist);
    z-index: 200;
    animation: paletteIn .18s ease;
}
.reaction-palette.open { display: flex; }

@keyframes paletteIn {
    from { opacity: 0; transform: translateY(6px) scale(.95); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

.r-emoji {
    font-size: 1.5rem;
    padding: 4px 7px;
    border-radius: 50%;
    cursor: pointer;
    transition: transform .15s, background .15s;
    line-height: 1;
}
.r-emoji:hover { transform: scale(1.3); background: var(--cream); }

/* Favourite */
.btn-fav {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: #C9A227;
    background: #FFF9EC;
    border: 1.5px solid #EDD98A;
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-fav:hover, .btn-fav.active {
    background: #C9A227;
    border-color: #C9A227;
    color: var(--white);
}

/* Signal / Contact */
.btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--white);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
}
.btn-ghost:hover             { border-color: var(--slate); background: var(--cream); }
.btn-ghost.danger:hover      { border-color: var(--danger); color: var(--danger); background: #FBECEA; }
.btn-ghost.contact:hover     { border-color: var(--pin-blue); color: var(--pin-blue); background: var(--pin-blue-dim); }

/* ===== BOUTON RÉSUMÉ ===== */
.btn-summarize {
    background: none;
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    font-size: .88rem;
    font-weight: 600;
    color: #6c5ce7;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-summarize:hover {
    border-color: #6c5ce7;
    color: #6c5ce7;
    background: rgba(108,92,231,0.1);
    transform: translateY(-1px);
}

/* ===== STYLES DICTÉE VOCALE ===== */
.microphone-btn {
    background: var(--white);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 16px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: var(--transition);
    color: var(--slate);
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.microphone-btn:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}
.microphone-btn.recording {
    background-color: #e74c3c;
    border-color: #e74c3c;
    color: white;
    animation: pulse 1.2s infinite;
}
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
    100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
}

/* ── Comments section ─────────────────────────────────────── */
.comments-section {
    margin-top: 44px;
}

.section-header {
    display: flex;
    align-items: baseline;
    gap: 12px;
    margin-bottom: 28px;
    padding-bottom: 14px;
    border-bottom: 2px solid var(--mist);
}
.section-title {
    font-family: var(--font-display);
    font-size: 1.45rem;
    font-weight: 600;
    color: var(--ink);
}
.comment-count-badge {
    background: var(--saffron-dim);
    color: var(--saffron);
    font-size: .75rem;
    font-weight: 700;
    padding: 3px 11px;
    border-radius: var(--r-xl);
    border: 1px solid rgba(232,160,64,.25);
}

/* ── Comment card ─────────────────────────────────────────── */
.comment-card {
    background: var(--white);
    border-radius: var(--r-md);
    border: 1px solid var(--mist);
    margin-bottom: 16px;
    transition: var(--transition);
    animation: cardReveal .35s ease both;
}
.comment-card:hover {
    border-color: var(--saffron);
    box-shadow: var(--shadow-feather);
    transform: translateX(3px);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 18px 8px;
}
.comment-author-block {
    display: flex;
    align-items: center;
    gap: 11px;
}
.c-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--saffron), var(--ember));
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}
.c-avatar img  { width: 100%; height: 100%; object-fit: cover; }
.c-avatar span { color: var(--white); font-weight: 700; font-size: 15px; }
.c-name        { font-weight: 600; font-size: .9rem; color: var(--ink); }
.c-date        { font-size: .7rem; color: var(--slate); margin-top: 1px; }

.c-actions { display: flex; gap: 6px; align-items: center; }
.btn-c-edit   { background: none; border: none; color: #C9A227; cursor: pointer; font-size: .85rem; padding: 4px 6px; border-radius: 6px; transition: var(--transition); text-decoration: none; }
.btn-c-delete { background: none; border: none; color: var(--danger); cursor: pointer; font-size: .85rem; padding: 4px 6px; border-radius: 6px; transition: var(--transition); }
.btn-c-edit:hover, .btn-c-delete:hover { background: var(--cream); }

.comment-body {
    padding: 4px 18px 14px;
    font-size: .92rem;
    line-height: 1.65;
    color: var(--slate);
}
.comment-gif { margin-top: 10px; }
.comment-gif img { max-height: 140px; border-radius: var(--r-sm); }

.comment-foot {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 18px 14px;
    border-top: 1px solid var(--mist);
}
.btn-c-like {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--slate);
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 12px;
    border-radius: var(--r-xl);
    transition: var(--transition);
}
.btn-c-like:hover, .btn-c-like.reacted {
    background: rgba(200,60,60,.08);
    color: #C83C3C;
}
.btn-c-reply {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--pin-blue);
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 12px;
    border-radius: var(--r-xl);
    transition: var(--transition);
}
.btn-c-reply:hover { background: var(--pin-blue-dim); }

/* ── Reply indent ────────────────────────────────────────── */
.replies-wrap { margin-left: 40px; margin-top: 8px; }
.reply-form-wrap {
    margin: 8px 0 14px 40px;
    background: var(--cream);
    border-radius: var(--r-md);
    padding: 14px;
    border: 1px solid var(--mist);
    display: none;
    animation: fadeSlideDown .2s ease;
}

/* ── Empty state ─────────────────────────────────────────── */
.empty-comments {
    text-align: center;
    padding: 52px 20px;
    background: var(--white);
    border-radius: var(--r-lg);
    border: 1.5px dashed var(--mist);
    color: var(--slate);
}
.empty-comments .ic { font-size: 2.8rem; opacity: .4; display: block; margin-bottom: 12px; }
.empty-comments p   { font-size: .95rem; }

/* ── Comment form card ───────────────────────────────────── */
.comment-form-card {
    background: var(--white);
    border-radius: var(--r-lg);
    padding: 28px;
    margin-top: 32px;
    box-shadow: var(--shadow-feather);
    border: 1px solid var(--mist);
}
.comment-form-card .cf-title {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 18px;
}

/* ── Form controls ───────────────────────────────────────── */
.form-control {
    font-family: var(--font-body);
    font-size: .93rem;
    color: var(--ink);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-sm);
    padding: 12px 16px;
    width: 100%;
    resize: vertical;
    transition: var(--transition);
    outline: none;
}
.form-control:focus {
    border-color: var(--saffron);
    background: var(--white);
    box-shadow: 0 0 0 3px var(--saffron-dim);
}
.form-control.is-invalid { border-color: var(--danger); }
.invalid-feedback { font-size: .8rem; color: var(--danger); margin-top: 5px; }
.field-hint        { font-size: .78rem; color: var(--slate); margin-top: 6px; }

/* ── Buttons ─────────────────────────────────────────────── */
.btn-primary-kd {
    font-family: var(--font-body);
    font-size: .9rem;
    font-weight: 600;
    color: var(--white);
    background: linear-gradient(135deg, var(--saffron) 0%, var(--ember) 100%);
    border: none;
    border-radius: var(--r-xl);
    padding: 11px 28px;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px rgba(232,160,64,.3);
}
.btn-primary-kd:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(232,160,64,.4);
}

.btn-secondary-sm {
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 8px 18px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-secondary-sm:hover { border-color: var(--slate); background: var(--mist); }

.btn-gif-pick {
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 500;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 8px 18px;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 7px;
}
.btn-gif-pick:hover { border-color: var(--saffron); color: var(--saffron); background: var(--saffron-dim); }

/* ── GIF modal ───────────────────────────────────────────── */
.gif-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(26,22,18,.6);
    backdrop-filter: blur(6px);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}
.gif-modal.open { display: flex; animation: fadeSlideDown .2s ease; }

.gif-modal-inner {
    background: var(--white);
    border-radius: var(--r-lg);
    padding: 28px;
    width: min(540px, 92vw);
    max-height: 80vh;
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-lift);
}
.gif-modal-inner h5 {
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 16px;
}
.gif-search-input {
    font-family: var(--font-body);
    width: 100%;
    padding: 11px 16px;
    border-radius: var(--r-sm);
    border: 1.5px solid var(--mist);
    font-size: .92rem;
    outline: none;
    background: var(--cream);
    transition: var(--transition);
    margin-bottom: 16px;
}
.gif-search-input:focus { border-color: var(--saffron); background: var(--white); box-shadow: 0 0 0 3px var(--saffron-dim); }

.gif-results {
    flex: 1;
    overflow-y: auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
}
.gif-results::-webkit-scrollbar { width: 5px; }
.gif-results::-webkit-scrollbar-track { background: var(--cream); border-radius: 10px; }
.gif-results::-webkit-scrollbar-thumb { background: var(--mist); border-radius: 10px; }

.gif-item img {
    width: 100%;
    aspect-ratio: 1;
    object-fit: cover;
    border-radius: var(--r-sm);
    cursor: pointer;
    transition: var(--transition);
    border: 2px solid transparent;
}
.gif-item img:hover { transform: scale(1.04); border-color: var(--saffron); }

.gif-preview-row {
    display: none;
    align-items: center;
    gap: 12px;
    margin-top: 12px;
}
.gif-preview-row.show { display: flex; }
.gif-preview-thumb {
    height: 64px;
    border-radius: var(--r-sm);
    object-fit: cover;
}
.btn-remove-gif {
    background: none;
    border: none;
    color: var(--danger);
    font-size: .8rem;
    cursor: pointer;
    font-weight: 600;
}

/* ── Login prompt ─────────────────────────────────────────── */
.login-prompt {
    background: var(--white);
    border-radius: var(--r-md);
    padding: 20px 24px;
    margin-top: 24px;
    border: 1px dashed var(--mist);
    text-align: center;
    font-size: .92rem;
    color: var(--slate);
}
.login-prompt a { color: var(--saffron); font-weight: 600; text-decoration: none; }
.login-prompt a:hover { text-decoration: underline; }

/* ── Scrollbar global ─────────────────────────────────────── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--cream); }
::-webkit-scrollbar-thumb { background: var(--mist); border-radius: 10px; }

/* ── Responsive ──────────────────────────────────────────── */
@media (max-width: 640px) {
    .pd-wrapper   { padding: 20px 16px 60px; }
    .post-header  { flex-direction: column; align-items: flex-start; }
    .post-title   { font-size: 1.5rem; }
    .replies-wrap, .reply-form-wrap { margin-left: 16px; }
    .gif-results  { grid-template-columns: repeat(2, 1fr); }
    .btn-summarize { padding: 6px 14px; font-size: .8rem; }
    .microphone-btn { padding: 6px 12px; font-size: .9rem; }
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 856
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 857
        yield "<div class=\"pd-wrapper\">

    <!-- Back -->
    <a href=\"";
        // line 860
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" class=\"pd-back\">
        <i class=\"fas fa-arrow-left\"></i> Fil d'actualité
    </a>

    <!-- Flash messages -->
    ";
        // line 865
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 865, $this->source); })()), "flashes", ["success"], "method", false, false, false, 865));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 866
            yield "        <div class=\"pd-flash success\"><i class=\"fas fa-check-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 868
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 868, $this->source); })()), "flashes", ["error"], "method", false, false, false, 868));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 869
            yield "        <div class=\"pd-flash danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 871
        yield "
    <!-- ═══════════ POST CARD ═══════════ -->
    <div class=\"post-card ";
        // line 873
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 873, $this->source); })()), "isPinned", [], "any", false, false, false, 873)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "pinned";
        }
        yield " position-relative\">

        ";
        // line 875
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 875, $this->source); })()), "isPinned", [], "any", false, false, false, 875)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 876
            yield "            <div class=\"pin-badge\"><i class=\"fas fa-thumbtack\"></i> Épinglé</div>
        ";
        }
        // line 878
        yield "
        <!-- Header -->
        <div class=\"post-header\">
            <div class=\"author-block\">
                <div class=\"author-avatar\">
                    ";
        // line 883
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "utilisateur", [], "any", false, true, false, 883), "photo", [], "any", true, true, false, 883) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 883, $this->source); })()), "utilisateur", [], "any", false, false, false, 883), "photo", [], "any", false, false, false, 883))) {
            // line 884
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 884, $this->source); })()), "utilisateur", [], "any", false, false, false, 884), "photo", [], "any", false, false, false, 884), "html", null, true);
            yield "\" alt=\"\">
                    ";
        } else {
            // line 886
            yield "                        <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 886, $this->source); })()), "utilisateur", [], "any", false, false, false, 886), "nom", [], "any", false, false, false, 886))), "html", null, true);
            yield "</span>
                    ";
        }
        // line 888
        yield "                </div>
                <div>
                    <div class=\"author-name\">";
        // line 890
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 890, $this->source); })()), "utilisateur", [], "any", false, false, false, 890), "nom", [], "any", false, false, false, 890), "html", null, true);
        yield "</div>
                    <div class=\"post-meta\">";
        // line 891
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 891, $this->source); })()), "createdAt", [], "any", false, false, false, 891), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
                </div>
            </div>

            <div class=\"header-controls\">
                ";
        // line 896
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 896, $this->source); })()), "user", [], "any", false, false, false, 896)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 897
            yield "                    <button class=\"btn-pill ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 897, $this->source); })()), "isPinned", [], "any", false, false, false, 897)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "pinned";
            }
            yield "\"
                            onclick=\"togglePin(";
            // line 898
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 898, $this->source); })()), "id", [], "any", false, false, false, 898), "html", null, true);
            yield ")\"
                            id=\"pin-btn-";
            // line 899
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 899, $this->source); })()), "id", [], "any", false, false, false, 899), "html", null, true);
            yield "\">
                        <i class=\"fas fa-thumbtack\"></i>
                        <span id=\"pin-text-";
            // line 901
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 901, $this->source); })()), "id", [], "any", false, false, false, 901), "html", null, true);
            yield "\">";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 901, $this->source); })()), "isPinned", [], "any", false, false, false, 901)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Désépingler") : ("Épingler"));
            yield "</span>
                    </button>
                ";
        }
        // line 904
        yield "
                ";
        // line 905
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 905, $this->source); })()), "user", [], "any", false, false, false, 905) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 905, $this->source); })()), "utilisateur", [], "any", false, false, false, 905), "idUtilisateur", [], "any", false, false, false, 905) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 905, $this->source); })()), "user", [], "any", false, false, false, 905), "idUtilisateur", [], "any", false, false, false, 905)) || ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 905), "role", [], "any", true, true, false, 905) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 905, $this->source); })()), "user", [], "any", false, false, false, 905), "role", [], "any", false, false, false, 905)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 905, $this->source); })()), "user", [], "any", false, false, false, 905), "role", [], "any", false, false, false, 905)) : ("")) == "admin")))) {
            // line 906
            yield "                    <div class=\"dropdown\">
                        <button class=\"btn-icon\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            <i class=\"fas fa-ellipsis-v\"></i>
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            <li>
                                <a class=\"dropdown-item\" href=\"";
            // line 912
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 912, $this->source); })()), "id", [], "any", false, false, false, 912)]), "html", null, true);
            yield "\">
                                    <i class=\"fas fa-edit\" style=\"color:#C9A227\"></i> Modifier
                                </a>
                            </li>
                            <li>
                                <form method=\"post\" action=\"";
            // line 917
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 917, $this->source); })()), "id", [], "any", false, false, false, 917)]), "html", null, true);
            yield "\"
                                      onsubmit=\"return confirm('Supprimer cette publication ?')\">
                                    <button type=\"submit\" class=\"dropdown-item text-danger w-100 border-0 bg-transparent\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                ";
        }
        // line 927
        yield "            </div>
        </div>

        <!-- Content -->
        <div class=\"post-content\">
            <h1 class=\"post-title\">";
        // line 932
        yield $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 932, $this->source); })()), "title", [], "any", false, false, false, 932));
        yield "</h1>
            <div class=\"post-body\">
                ";
        // line 934
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 934, $this->source); })()), "content", [], "any", false, false, false, 934)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 935
            yield "                    ";
            yield Twig\Extension\CoreExtension::nl2br(Twig\Extension\CoreExtension::striptags($this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 935, $this->source); })()), "content", [], "any", false, false, false, 935)), "<strong><em><ul><li><br><p>"));
            yield "
                ";
        } else {
            // line 937
            yield "                    <p style=\"color:var(--slate);font-style:italic\">Aucun contenu</p>
                ";
        }
        // line 939
        yield "            </div>

            ";
        // line 941
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 941, $this->source); })()), "hashtags", [], "any", false, false, false, 941)) > 0)) {
            // line 942
            yield "                <div class=\"hashtag-row\">
                    ";
            // line 943
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 943, $this->source); })()), "hashtags", [], "any", false, false, false, 943));
            foreach ($context['_seq'] as $context["_key"] => $context["hashtag"]) {
                // line 944
                yield "                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_hashtag", ["name" => CoreExtension::getAttribute($this->env, $this->source, $context["hashtag"], "name", [], "any", false, false, false, 944)]), "html", null, true);
                yield "\" class=\"hashtag-pill\">
                            #";
                // line 945
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["hashtag"], "name", [], "any", false, false, false, 945), "html", null, true);
                yield "
                        </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['hashtag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 948
            yield "                </div>
            ";
        }
        // line 950
        yield "
            ";
        // line 951
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 951, $this->source); })()), "gifUrl", [], "any", false, false, false, 951)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 952
            yield "                <div class=\"post-gif\">
                    <img src=\"";
            // line 953
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 953, $this->source); })()), "gifUrl", [], "any", false, false, false, 953), "html", null, true);
            yield "\" alt=\"GIF\" class=\"img-fluid\">
                </div>
            ";
        }
        // line 956
        yield "
            ";
        // line 957
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 957, $this->source); })()), "imagePath", [], "any", false, false, false, 957)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 958
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 958, $this->source); })()), "imagePath", [], "any", false, false, false, 958), "html", null, true);
            yield "\" class=\"post-image\" alt=\"Image du post\"
                     onclick=\"this.requestFullscreen()\">
            ";
        }
        // line 961
        yield "        </div>

        <!-- Actions -->
        <div class=\"post-actions\">

            <!-- Reactions -->
            <div class=\"reaction-wrap\" id=\"rw-";
        // line 967
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 967, $this->source); })()), "id", [], "any", false, false, false, 967), "html", null, true);
        yield "\">
                <button class=\"btn-react\" id=\"reaction-btn-";
        // line 968
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 968, $this->source); })()), "id", [], "any", false, false, false, 968), "html", null, true);
        yield "\"
                        onclick=\"togglePalette(";
        // line 969
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 969, $this->source); })()), "id", [], "any", false, false, false, 969), "html", null, true);
        yield ")\">
                    ";
        // line 970
        $context["total"] = ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 970, $this->source); })()), "like", [], "any", false, false, false, 970) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 970, $this->source); })()), "love", [], "any", false, false, false, 970)) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 970, $this->source); })()), "haha", [], "any", false, false, false, 970)) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 970, $this->source); })()), "sad", [], "any", false, false, false, 970)) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["reactionsCount"]) || array_key_exists("reactionsCount", $context) ? $context["reactionsCount"] : (function () { throw new RuntimeError('Variable "reactionsCount" does not exist.', 970, $this->source); })()), "angry", [], "any", false, false, false, 970));
        // line 971
        yield "                    ";
        if (((isset($context["userReaction"]) || array_key_exists("userReaction", $context) ? $context["userReaction"] : (function () { throw new RuntimeError('Variable "userReaction" does not exist.', 971, $this->source); })()) == "love")) {
            yield "❤️
                    ";
        } elseif ((        // line 972
(isset($context["userReaction"]) || array_key_exists("userReaction", $context) ? $context["userReaction"] : (function () { throw new RuntimeError('Variable "userReaction" does not exist.', 972, $this->source); })()) == "haha")) {
            yield "😂
                    ";
        } elseif ((        // line 973
(isset($context["userReaction"]) || array_key_exists("userReaction", $context) ? $context["userReaction"] : (function () { throw new RuntimeError('Variable "userReaction" does not exist.', 973, $this->source); })()) == "sad")) {
            yield "😢
                    ";
        } elseif ((        // line 974
(isset($context["userReaction"]) || array_key_exists("userReaction", $context) ? $context["userReaction"] : (function () { throw new RuntimeError('Variable "userReaction" does not exist.', 974, $this->source); })()) == "angry")) {
            yield "😠
                    ";
        } else {
            // line 975
            yield "👍";
        }
        // line 976
        yield "                    <span id=\"reaction-total-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 976, $this->source); })()), "id", [], "any", false, false, false, 976), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 976, $this->source); })()), "html", null, true);
        yield "</span>
                </button>
                <div class=\"reaction-palette\" id=\"reaction-palette-";
        // line 978
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 978, $this->source); })()), "id", [], "any", false, false, false, 978), "html", null, true);
        yield "\">
                    <span class=\"r-emoji\" onclick=\"sendReaction(";
        // line 979
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 979, $this->source); })()), "id", [], "any", false, false, false, 979), "html", null, true);
        yield ", 'like')\">👍</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction(";
        // line 980
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 980, $this->source); })()), "id", [], "any", false, false, false, 980), "html", null, true);
        yield ", 'love')\">❤️</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction(";
        // line 981
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 981, $this->source); })()), "id", [], "any", false, false, false, 981), "html", null, true);
        yield ", 'haha')\">😂</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction(";
        // line 982
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 982, $this->source); })()), "id", [], "any", false, false, false, 982), "html", null, true);
        yield ", 'sad')\">😢</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction(";
        // line 983
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 983, $this->source); })()), "id", [], "any", false, false, false, 983), "html", null, true);
        yield ", 'angry')\">😠</span>
                </div>
            </div>

            ";
        // line 987
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 987, $this->source); })()), "user", [], "any", false, false, false, 987)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 988
            yield "                <button class=\"btn-fav ";
            if ((($tmp = (isset($context["isFavori"]) || array_key_exists("isFavori", $context) ? $context["isFavori"] : (function () { throw new RuntimeError('Variable "isFavori" does not exist.', 988, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "active";
            }
            yield "\"
                        onclick=\"toggleFavori(";
            // line 989
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 989, $this->source); })()), "id", [], "any", false, false, false, 989), "html", null, true);
            yield ")\"
                        id=\"favori-btn-";
            // line 990
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 990, $this->source); })()), "id", [], "any", false, false, false, 990), "html", null, true);
            yield "\">
                    <i class=\"fas fa-star\"></i>
                    <span id=\"favori-text-";
            // line 992
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 992, $this->source); })()), "id", [], "any", false, false, false, 992), "html", null, true);
            yield "\">";
            yield (((($tmp = (isset($context["isFavori"]) || array_key_exists("isFavori", $context) ? $context["isFavori"] : (function () { throw new RuntimeError('Variable "isFavori" does not exist.', 992, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Retirer des favoris") : ("Favoris"));
            yield "</span>
                </button>
            ";
        }
        // line 995
        yield "
            ";
        // line 996
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 996, $this->source); })()), "user", [], "any", false, false, false, 996) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 996, $this->source); })()), "user", [], "any", false, false, false, 996), "idUtilisateur", [], "any", false, false, false, 996) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 996, $this->source); })()), "utilisateur", [], "any", false, false, false, 996), "idUtilisateur", [], "any", false, false, false, 996)))) {
            // line 997
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_messages_conversation", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 997, $this->source); })()), "utilisateur", [], "any", false, false, false, 997), "idUtilisateur", [], "any", false, false, false, 997)]), "html", null, true);
            yield "\"
                   class=\"btn-ghost contact\">
                    <i class=\"fas fa-envelope\"></i> Contacter
                </a>
                <button class=\"btn-ghost danger\" onclick=\"signalPost(";
            // line 1001
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 1001, $this->source); })()), "id", [], "any", false, false, false, 1001), "html", null, true);
            yield ")\">
                    <i class=\"fas fa-flag\"></i> Signaler
                </button>
            ";
        }
        // line 1005
        yield "
            ";
        // line 1007
        yield "            ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), $this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 1007, $this->source); })()), "content", [], "any", false, false, false, 1007))) > 200)) {
            // line 1008
            yield "                <button class=\"btn-summarize\"
                        data-content=\"";
            // line 1009
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 1009, $this->source); })()), "content", [], "any", false, false, false, 1009)), "html_attr");
            yield "\"
                        onclick=\"summarizePost(this)\">
                    <i class=\"fas fa-robot\"></i> Résumer
                </button>
            ";
        }
        // line 1014
        yield "
        </div>
    </div>
    <!-- /POST CARD -->


    <!-- ═══════════ COMMENTS ═══════════ -->
    <div class=\"comments-section\">
        <div class=\"section-header\">
            <h3 class=\"section-title\">Commentaires</h3>
            <span class=\"comment-count-badge\">";
        // line 1024
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 1024, $this->source); })()), function ($__c__) use ($context, $macros) { $context["c"] = $__c__; return (null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 1024, $this->source); })()), "parent", [], "any", false, false, false, 1024)); })), "html", null, true);
        yield "</span>
        </div>

        ";
        // line 1027
        $macros["cm"] = $this;
        // line 1028
        yield "
        ";
        // line 1111
        yield "
        ";
        // line 1112
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 1112, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["commentaire"]) {
            // line 1113
            yield "            ";
            if ((null === CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "parent", [], "any", false, false, false, 1113))) {
                // line 1114
                yield "                ";
                yield $macros["cm"]->getTemplateForMacro("macro_renderComment", $context, 1114, $this->getSourceContext())->macro_renderComment(...[$context["commentaire"], (isset($context["userLikedComments"]) || array_key_exists("userLikedComments", $context) ? $context["userLikedComments"] : (function () { throw new RuntimeError('Variable "userLikedComments" does not exist.', 1114, $this->source); })()), (isset($context["commentLikesCount"]) || array_key_exists("commentLikesCount", $context) ? $context["commentLikesCount"] : (function () { throw new RuntimeError('Variable "commentLikesCount" does not exist.', 1114, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 1114, $this->source); })()), "id", [], "any", false, false, false, 1114)]);
                yield "
            ";
            }
            // line 1116
            yield "        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 1117
            yield "            <div class=\"empty-comments\">
                <span class=\"ic\">💬</span>
                <p>Soyez le premier à commenter cette publication !</p>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commentaire'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1122
        yield "

        <!-- Comment form avec DICTÉE VOCALE (remplace l'upload audio) -->
        ";
        // line 1125
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1125, $this->source); })()), "user", [], "any", false, false, false, 1125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 1126
            yield "            <div class=\"comment-form-card\">
                <div class=\"cf-title\">Laisser un commentaire</div>

                <form method=\"post\" action=\"";
            // line 1129
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_comment", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 1129, $this->source); })()), "id", [], "any", false, false, false, 1129)]), "html", null, true);
            yield "\" novalidate>
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Votre commentaire</label>
                        <div class=\"d-flex gap-2 align-items-start\">
                            <textarea name=\"content\"
                                      id=\"commentContent\"
                                      class=\"form-control ";
            // line 1135
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 1135)) {
                yield "is-invalid";
            }
            yield "\"
                                      rows=\"4\"
                                      placeholder=\"Partagez votre avis sur cette recette…\"
                                      required>";
            // line 1138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 1138)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 1138, $this->source); })()), "content", [], "any", false, false, false, 1138), "")) : ("")), "html", null, true);
            yield "</textarea>
                            <button type=\"button\" id=\"dictateBtn\" class=\"microphone-btn\" title=\"Dicter\">
                                <i class=\"fas fa-microphone\"></i>
                            </button>
                        </div>
                        ";
            // line 1143
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 1143)) {
                // line 1144
                yield "                            <div class=\"invalid-feedback\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 1144, $this->source); })()), "content", [], "any", false, false, false, 1144), "html", null, true);
                yield "</div>
                        ";
            } else {
                // line 1146
                yield "                            <p class=\"field-hint\">Entre 2 et 1 000 caractères. Cliquez sur le micro pour dicter votre texte.</p>
                        ";
            }
            // line 1148
            yield "                    </div>

                    <input type=\"hidden\" name=\"gif_url\" id=\"gif_url\" value=\"";
            // line 1150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "gif_url", [], "any", true, true, false, 1150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 1150, $this->source); })()), "gif_url", [], "any", false, false, false, 1150), "")) : ("")), "html", null, true);
            yield "\">

                    <div class=\"d-flex align-items-center gap-3 flex-wrap\">
                        <button type=\"button\" class=\"btn-gif-pick\" id=\"openGifBtn\">
                            <i class=\"fas fa-grin-tears\"></i> Ajouter un GIF
                        </button>

                        <div class=\"gif-preview-row\" id=\"gifPreviewRow\">
                            <img id=\"gifPreviewImg\" src=\"\" alt=\"GIF\" class=\"gif-preview-thumb\">
                            <button type=\"button\" class=\"btn-remove-gif\" id=\"removeGifBtn\">
                                <i class=\"fas fa-times-circle\"></i> Retirer
                            </button>
                        </div>
                    </div>

                    <button type=\"submit\" class=\"btn-primary-kd mt-4\">
                        <i class=\"fas fa-paper-plane\"></i> Publier le commentaire
                    </button>
                </form>
            </div>

        ";
        } else {
            // line 1172
            yield "            <div class=\"login-prompt\">
                <i class=\"fas fa-lock\" style=\"margin-right:6px;opacity:.5\"></i>
                <a href=\"";
            // line 1174
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">Connectez-vous</a> pour pouvoir commenter.
            </div>
        ";
        }
        // line 1177
        yield "
    </div>
    <!-- /COMMENTS -->

</div>

<!-- GIF Modal -->
<div class=\"gif-modal\" id=\"gifModal\">
    <div class=\"gif-modal-inner\">
        <h5><i class=\"fas fa-film\" style=\"color:var(--saffron);margin-right:8px\"></i>Choisir un GIF</h5>
        <input type=\"text\" id=\"gifSearch\" class=\"gif-search-input\" placeholder=\"Rechercher : rigolade, chat, bravo…\">
        <div id=\"gifResults\" class=\"gif-results\">
            <p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">
                Saisissez un mot clé…
            </p>
        </div>
    </div>
</div>


<script>
/* ═══════ REACTIONS ═══════ */
function togglePalette(id) {
    const p = document.getElementById('reaction-palette-' + id);
    p.classList.toggle('open');
}
function sendReaction(postId, type) {
    fetch(`/posts/\${postId}/react`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type })
    })
    .then(r => r.json())
    .then(d => {
        if (!d.success) return;
        const total = d.counts.like + d.counts.love + d.counts.haha + d.counts.sad + d.counts.angry;
        const span = document.getElementById('reaction-total-' + postId);
        if (span) span.textContent = total;
        const btn = document.getElementById('reaction-btn-' + postId);
        if (btn) {
            const map = { love:'❤️', haha:'😂', sad:'😢', angry:'😠' };
            const emoji = map[d.userReaction] || '👍';
            btn.innerHTML = `\${emoji} <span id=\"reaction-total-\${postId}\">\${total}</span>`;
        }
        document.getElementById('reaction-palette-' + postId)?.classList.remove('open');
    });
}

/* ═══════ FAVOURITES ═══════ */
function toggleFavori(id) {
    fetch(`/posts/\${id}/favori`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => { if (d.success) location.reload(); else alert(d.message || 'Erreur'); });
}

/* ═══════ COMMENT LIKE ═══════ */
function toggleCommentLike(id) {
    fetch(`/posts/comment/\${id}/like`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: 'like' })
    })
    .then(r => r.json())
    .then(d => {
        if (!d.success) return;
        const cnt = document.getElementById('comment-like-count-' + id);
        const btn = document.getElementById('comment-like-btn-' + id);
        if (cnt) cnt.textContent = d.count;
        if (btn) btn.classList.toggle('reacted', !!d.liked);
    });
}

/* ═══════ PIN ═══════ */
function togglePin(id) {
    fetch(`/posts/\${id}/pin`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => { if (d.success) location.reload(); else alert(d.message || 'Erreur'); });
}

/* ═══════ REPLY FORMS ═══════ */
function showReply(id) {
    const el = document.getElementById('reply-form-' + id);
    if (el) { el.style.display = 'block'; el.querySelector('textarea')?.focus(); }
}
function hideReply(id) {
    const el = document.getElementById('reply-form-' + id);
    if (el) el.style.display = 'none';
}

/* ═══════ SIGNAL ═══════ */
function signalPost(id) {
    if (!confirm('Signaler cette publication ?')) return;
    fetch(`/posts/\${id}/signal`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => {
        alert(d.message);
        if (d.success && d.deleted) location.href = \"";
        // line 1282
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\";
    });
}

/* ═══════ GIF PICKER ═══════ */
const GIPHY_KEY = 'zG36o0wRo5KYA5d6RkTYynPz1HuEIRpc';
const gifModal     = document.getElementById('gifModal');
const gifSearch    = document.getElementById('gifSearch');
const gifResults   = document.getElementById('gifResults');
const gifUrlInput  = document.getElementById('gif_url');
const gifPreviewRow = document.getElementById('gifPreviewRow');
const gifPreviewImg = document.getElementById('gifPreviewImg');
let gifTimer;

document.getElementById('openGifBtn')?.addEventListener('click', () => {
    gifModal.classList.add('open');
    gifSearch.focus();
});
gifModal?.addEventListener('click', e => {
    if (e.target === gifModal) gifModal.classList.remove('open');
});
gifSearch?.addEventListener('input', function () {
    clearTimeout(gifTimer);
    const q = this.value.trim();
    if (q.length < 2) { gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">Saisissez au moins 2 caractères…</p>'; return; }
    gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">Recherche…</p>';
    gifTimer = setTimeout(() => {
        fetch(`https://api.giphy.com/v1/gifs/search?api_key=\${GIPHY_KEY}&q=\${encodeURIComponent(q)}&limit=12&rating=g&lang=fr`)
            .then(r => r.json())
            .then(data => {
                if (!data.data.length) { gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate)\">Aucun résultat</p>'; return; }
                gifResults.innerHTML = '';
                data.data.forEach(g => {
                    const d = document.createElement('div');
                    d.className = 'gif-item';
                    const img = document.createElement('img');
                    img.src = g.images.fixed_height_small.url;
                    img.dataset.url = g.images.original.url;
                    img.addEventListener('click', () => {
                        gifUrlInput.value = img.dataset.url;
                        gifPreviewImg.src = img.src;
                        gifPreviewRow.classList.add('show');
                        gifModal.classList.remove('open');
                        gifSearch.value = '';
                        gifResults.innerHTML = '';
                    });
                    d.appendChild(img);
                    gifResults.appendChild(d);
                });
            });
    }, 380);
});
document.getElementById('removeGifBtn')?.addEventListener('click', () => {
    gifUrlInput.value = '';
    gifPreviewImg.src = '';
    gifPreviewRow.classList.remove('show');
});
if (gifUrlInput?.value) {
    gifPreviewImg.src = gifUrlInput.value;
    gifPreviewRow.classList.add('show');
}

/* ═══════ DICTÉE VOCALE (SPEECH-TO-TEXT) ═══════ */
const dictateBtn = document.getElementById('dictateBtn');
const commentTextarea = document.getElementById('commentContent');
let recognition = null;
let isListening = false;

if (dictateBtn && commentTextarea) {
    if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        recognition = new SpeechRecognition();
        recognition.lang = 'fr-FR';
        recognition.interimResults = true;
        recognition.continuous = false;

        dictateBtn.addEventListener('click', () => {
            if (isListening) {
                recognition.stop();
                return;
            }
            recognition.start();
            dictateBtn.classList.add('recording');
            dictateBtn.innerHTML = '<i class=\"fas fa-stop-circle\"></i>';
            isListening = true;
        });

        recognition.onresult = (event) => {
            let transcript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                transcript += event.results[i][0].transcript;
            }
            const currentText = commentTextarea.value;
            commentTextarea.value = currentText + (currentText ? ' ' : '') + transcript;
        };

        recognition.onerror = (event) => {
            console.error('Erreur de reconnaissance:', event.error);
            alert('Erreur de dictée. Vérifiez votre microphone et réessayez.');
            stopDictation();
        };

        recognition.onend = () => {
            stopDictation();
        };

        function stopDictation() {
            isListening = false;
            dictateBtn.classList.remove('recording');
            dictateBtn.innerHTML = '<i class=\"fas fa-microphone\"></i>';
        }
    } else {
        dictateBtn.style.display = 'none';
        console.warn('La reconnaissance vocale n\\'est pas supportée par ce navigateur.');
    }
}

/* ═══════ Close reaction palette on outside click ═══════ */
document.addEventListener('click', e => {
    if (!e.target.closest('.reaction-wrap')) {
        document.querySelectorAll('.reaction-palette').forEach(p => p.classList.remove('open'));
    }
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 1029
    public function macro_renderComment($commentaire = null, $userLikedComments = null, $commentLikesCount = null, $postId = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "commentaire" => $commentaire,
            "userLikedComments" => $userLikedComments,
            "commentLikesCount" => $commentLikesCount,
            "postId" => $postId,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "renderComment"));

            // line 1030
            yield "            <div class=\"comment-card\" id=\"comment-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1030, $this->source); })()), "id", [], "any", false, false, false, 1030), "html", null, true);
            yield "\">

                <div class=\"comment-header\">
                    <div class=\"comment-author-block\">
                        <div class=\"c-avatar\">
                            ";
            // line 1035
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["commentaire"] ?? null), "utilisateur", [], "any", false, true, false, 1035), "photo", [], "any", true, true, false, 1035) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1035, $this->source); })()), "utilisateur", [], "any", false, false, false, 1035), "photo", [], "any", false, false, false, 1035))) {
                // line 1036
                yield "                                <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1036, $this->source); })()), "utilisateur", [], "any", false, false, false, 1036), "photo", [], "any", false, false, false, 1036), "html", null, true);
                yield "\" alt=\"\">
                            ";
            } else {
                // line 1038
                yield "                                <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1038, $this->source); })()), "utilisateur", [], "any", false, false, false, 1038), "nom", [], "any", false, false, false, 1038))), "html", null, true);
                yield "</span>
                            ";
            }
            // line 1040
            yield "                        </div>
                        <div>
                            <div class=\"c-name\">";
            // line 1042
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1042, $this->source); })()), "utilisateur", [], "any", false, false, false, 1042), "nom", [], "any", false, false, false, 1042), "html", null, true);
            yield "</div>
                            <div class=\"c-date\">";
            // line 1043
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1043, $this->source); })()), "createdAt", [], "any", false, false, false, 1043), "d/m/Y à H:i"), "html", null, true);
            yield "</div>
                        </div>
                    </div>

                    ";
            // line 1047
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1047, $this->source); })()), "user", [], "any", false, false, false, 1047) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1047, $this->source); })()), "utilisateur", [], "any", false, false, false, 1047), "idUtilisateur", [], "any", false, false, false, 1047) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1047, $this->source); })()), "user", [], "any", false, false, false, 1047), "idUtilisateur", [], "any", false, false, false, 1047)) || ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 1047), "role", [], "any", true, true, false, 1047) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1047, $this->source); })()), "user", [], "any", false, false, false, 1047), "role", [], "any", false, false, false, 1047)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1047, $this->source); })()), "user", [], "any", false, false, false, 1047), "role", [], "any", false, false, false, 1047)) : ("")) == "admin")))) {
                // line 1048
                yield "                        <div class=\"c-actions\">
                            <a href=\"";
                // line 1049
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_comment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1049, $this->source); })()), "id", [], "any", false, false, false, 1049)]), "html", null, true);
                yield "\"
                               class=\"btn-c-edit\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"";
                // line 1053
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_comment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1053, $this->source); })()), "id", [], "any", false, false, false, 1053)]), "html", null, true);
                yield "\"
                                  onsubmit=\"return confirm('Supprimer ce commentaire ?')\"
                                  style=\"display:inline\">
                                <button type=\"submit\" class=\"btn-c-delete\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    ";
            }
            // line 1062
            yield "                </div>

                <div class=\"comment-body\">
                    ";
            // line 1065
            yield Twig\Extension\CoreExtension::nl2br(Twig\Extension\CoreExtension::striptags($this->extensions['App\Twig\CensorshipExtension']->censorText(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1065, $this->source); })()), "content", [], "any", false, false, false, 1065)), "<strong><em><br>"));
            yield "
                    ";
            // line 1066
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1066, $this->source); })()), "gifUrl", [], "any", false, false, false, 1066)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1067
                yield "                        <div class=\"comment-gif\">
                            <img src=\"";
                // line 1068
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1068, $this->source); })()), "gifUrl", [], "any", false, false, false, 1068), "html", null, true);
                yield "\" alt=\"GIF\" style=\"max-height:130px;border-radius:10px;\">
                        </div>
                    ";
            }
            // line 1071
            yield "                </div>

                <div class=\"comment-foot\">
                    <button class=\"btn-c-like ";
            // line 1074
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["userLikedComments"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1074, $this->source); })()), "id", [], "any", false, false, false, 1074), [], "array", true, true, false, 1074) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["userLikedComments"]) || array_key_exists("userLikedComments", $context) ? $context["userLikedComments"] : (function () { throw new RuntimeError('Variable "userLikedComments" does not exist.', 1074, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1074, $this->source); })()), "id", [], "any", false, false, false, 1074), [], "array", false, false, false, 1074))) {
                yield "reacted";
            }
            yield "\"
                            onclick=\"toggleCommentLike(";
            // line 1075
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1075, $this->source); })()), "id", [], "any", false, false, false, 1075), "html", null, true);
            yield ")\"
                            id=\"comment-like-btn-";
            // line 1076
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1076, $this->source); })()), "id", [], "any", false, false, false, 1076), "html", null, true);
            yield "\">
                        <i class=\"fas fa-heart\"></i>
                        <span id=\"comment-like-count-";
            // line 1078
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1078, $this->source); })()), "id", [], "any", false, false, false, 1078), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["commentLikesCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1078, $this->source); })()), "id", [], "any", false, false, false, 1078), [], "array", true, true, false, 1078)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentLikesCount"]) || array_key_exists("commentLikesCount", $context) ? $context["commentLikesCount"] : (function () { throw new RuntimeError('Variable "commentLikesCount" does not exist.', 1078, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1078, $this->source); })()), "id", [], "any", false, false, false, 1078), [], "array", false, false, false, 1078), 0)) : (0)), "html", null, true);
            yield "</span>
                    </button>
                    ";
            // line 1080
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1080, $this->source); })()), "user", [], "any", false, false, false, 1080)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1081
                yield "                        <button class=\"btn-c-reply\" onclick=\"showReply(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1081, $this->source); })()), "id", [], "any", false, false, false, 1081), "html", null, true);
                yield ")\">
                            <i class=\"fas fa-reply\"></i> Répondre
                        </button>
                    ";
            }
            // line 1085
            yield "                </div>

                <!-- Reply form -->
                <div id=\"reply-form-";
            // line 1088
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1088, $this->source); })()), "id", [], "any", false, false, false, 1088), "html", null, true);
            yield "\" class=\"reply-form-wrap\">
                    <form method=\"post\" action=\"";
            // line 1089
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_comment", ["id" => (isset($context["postId"]) || array_key_exists("postId", $context) ? $context["postId"] : (function () { throw new RuntimeError('Variable "postId" does not exist.', 1089, $this->source); })())]), "html", null, true);
            yield "\" enctype=\"multipart/form-data\">
                        <input type=\"hidden\" name=\"parent_id\" value=\"";
            // line 1090
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1090, $this->source); })()), "id", [], "any", false, false, false, 1090), "html", null, true);
            yield "\">
                        <textarea name=\"content\" rows=\"2\" class=\"form-control\"
                                  placeholder=\"Écrivez votre réponse…\" required></textarea>
                        <div class=\"mt-2 d-flex gap-2\">
                            <button type=\"button\" class=\"btn-secondary-sm\"
                                    onclick=\"hideReply(";
            // line 1095
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1095, $this->source); })()), "id", [], "any", false, false, false, 1095), "html", null, true);
            yield ")\">Annuler</button>
                            <button type=\"submit\" class=\"btn-primary-kd\" style=\"padding:8px 20px;font-size:.82rem\">Répondre</button>
                        </div>
                    </form>
                </div>

                ";
            // line 1101
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["commentaire"] ?? null), "replies", [], "any", true, true, false, 1101) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1101, $this->source); })()), "replies", [], "any", false, false, false, 1101)) > 0))) {
                // line 1102
                yield "                    <div class=\"replies-wrap\">
                        ";
                // line 1103
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 1103, $this->source); })()), "replies", [], "any", false, false, false, 1103));
                foreach ($context['_seq'] as $context["_key"] => $context["reply"]) {
                    // line 1104
                    yield "                            ";
                    yield $this->getTemplateForMacro("macro_renderComment", $context, 1104, $this->getSourceContext())->macro_renderComment(...[$context["reply"], (isset($context["userLikedComments"]) || array_key_exists("userLikedComments", $context) ? $context["userLikedComments"] : (function () { throw new RuntimeError('Variable "userLikedComments" does not exist.', 1104, $this->source); })()), (isset($context["commentLikesCount"]) || array_key_exists("commentLikesCount", $context) ? $context["commentLikesCount"] : (function () { throw new RuntimeError('Variable "commentLikesCount" does not exist.', 1104, $this->source); })()), (isset($context["postId"]) || array_key_exists("postId", $context) ? $context["postId"] : (function () { throw new RuntimeError('Variable "postId" does not exist.', 1104, $this->source); })())]);
                    yield "
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['reply'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1106
                yield "                    </div>
                ";
            }
            // line 1108
            yield "
            </div>
        ";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "post/show.html.twig";
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
        return array (  1902 => 1108,  1898 => 1106,  1889 => 1104,  1885 => 1103,  1882 => 1102,  1880 => 1101,  1871 => 1095,  1863 => 1090,  1859 => 1089,  1855 => 1088,  1850 => 1085,  1842 => 1081,  1840 => 1080,  1833 => 1078,  1828 => 1076,  1824 => 1075,  1818 => 1074,  1813 => 1071,  1807 => 1068,  1804 => 1067,  1802 => 1066,  1798 => 1065,  1793 => 1062,  1781 => 1053,  1774 => 1049,  1771 => 1048,  1769 => 1047,  1762 => 1043,  1758 => 1042,  1754 => 1040,  1748 => 1038,  1742 => 1036,  1740 => 1035,  1731 => 1030,  1713 => 1029,  1580 => 1282,  1473 => 1177,  1467 => 1174,  1463 => 1172,  1438 => 1150,  1434 => 1148,  1430 => 1146,  1424 => 1144,  1422 => 1143,  1414 => 1138,  1406 => 1135,  1397 => 1129,  1392 => 1126,  1390 => 1125,  1385 => 1122,  1375 => 1117,  1370 => 1116,  1364 => 1114,  1361 => 1113,  1356 => 1112,  1353 => 1111,  1350 => 1028,  1348 => 1027,  1342 => 1024,  1330 => 1014,  1322 => 1009,  1319 => 1008,  1316 => 1007,  1313 => 1005,  1306 => 1001,  1298 => 997,  1296 => 996,  1293 => 995,  1285 => 992,  1280 => 990,  1276 => 989,  1269 => 988,  1267 => 987,  1260 => 983,  1256 => 982,  1252 => 981,  1248 => 980,  1244 => 979,  1240 => 978,  1232 => 976,  1229 => 975,  1224 => 974,  1220 => 973,  1216 => 972,  1211 => 971,  1209 => 970,  1205 => 969,  1201 => 968,  1197 => 967,  1189 => 961,  1182 => 958,  1180 => 957,  1177 => 956,  1171 => 953,  1168 => 952,  1166 => 951,  1163 => 950,  1159 => 948,  1150 => 945,  1145 => 944,  1141 => 943,  1138 => 942,  1136 => 941,  1132 => 939,  1128 => 937,  1122 => 935,  1120 => 934,  1115 => 932,  1108 => 927,  1095 => 917,  1087 => 912,  1079 => 906,  1077 => 905,  1074 => 904,  1066 => 901,  1061 => 899,  1057 => 898,  1050 => 897,  1048 => 896,  1040 => 891,  1036 => 890,  1032 => 888,  1026 => 886,  1020 => 884,  1018 => 883,  1011 => 878,  1007 => 876,  1005 => 875,  998 => 873,  994 => 871,  985 => 869,  980 => 868,  971 => 866,  967 => 865,  959 => 860,  954 => 857,  944 => 856,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ post.title|censor }} | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link href=\"https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">

<style>
/* ============================================================
   KOUL DYERI — POST DETAIL  |  Editorial Culinary Theme
   ============================================================ */

:root {
    --saffron:     #E8A040;
    --saffron-dim: rgba(232,160,64,.12);
    --ember:       #C04A2A;
    --cream:       #FAF7F2;
    --ink:         #1A1612;
    --slate:       #5A5450;
    --mist:        #E9E4DC;
    --white:       #FFFFFF;
    --pin-blue:    #2E86AB;
    --pin-blue-dim:rgba(46,134,171,.12);
    --success:     #2D7D46;
    --danger:      #C04A2A;

    --r-sm:  12px;
    --r-md:  20px;
    --r-lg:  28px;
    --r-xl:  40px;

    --shadow-feather: 0 2px 12px rgba(26,22,18,.06);
    --shadow-float:   0 8px 32px rgba(26,22,18,.10);
    --shadow-lift:    0 20px 56px rgba(26,22,18,.15);

    --font-display: 'Playfair Display', Georgia, serif;
    --font-body:    'DM Sans', sans-serif;

    --transition: .22s cubic-bezier(.4,0,.2,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: var(--cream);
    font-family: var(--font-body);
    color: var(--ink);
    -webkit-font-smoothing: antialiased;
}

/* ── Page wrapper ─────────────────────────────────────────── */
.pd-wrapper {
    max-width: 860px;
    margin: 0 auto;
    padding: 36px 24px 80px;
}

/* ── Back link ────────────────────────────────────────────── */
.pd-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .82rem;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: var(--slate);
    text-decoration: none;
    padding: 8px 18px 8px 12px;
    border-radius: var(--r-xl);
    border: 1.5px solid var(--mist);
    background: var(--white);
    transition: var(--transition);
    margin-bottom: 28px;
}
.pd-back:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
    transform: translateX(-3px);
}

/* ── Flash messages ──────────────────────────────────────── */
.pd-flash {
    border-radius: var(--r-md);
    padding: 14px 20px;
    margin-bottom: 20px;
    font-size: .9rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: fadeSlideDown .35s ease;
}
.pd-flash.success { background: #E8F5ED; color: var(--success); }
.pd-flash.danger  { background: #FBECEA; color: var(--danger);  }

@keyframes fadeSlideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Post card ────────────────────────────────────────────── */
.post-card {
    background: var(--white);
    border-radius: var(--r-lg);
    box-shadow: var(--shadow-float);
    overflow: hidden;
    border: 1px solid rgba(26,22,18,.05);
    animation: cardReveal .45s ease both;
}

@keyframes cardReveal {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}

.post-card.pinned {
    border-top: 4px solid var(--pin-blue);
}

/* ── Pin badge ────────────────────────────────────────────── */
.pin-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--pin-blue);
    color: var(--white);
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 0 0 var(--r-sm) var(--r-sm);
    position: absolute;
    top: 0;
    right: 28px;
}

/* ── Post header ─────────────────────────────────────────── */
.post-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 28px 20px;
    border-bottom: 1px solid var(--mist);
    position: relative;
    flex-wrap: wrap;
    gap: 16px;
}

.author-block {
    display: flex;
    align-items: center;
    gap: 14px;
}

.author-avatar {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--saffron) 0%, var(--ember) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(232,160,64,.35);
}
.author-avatar img { width: 100%; height: 100%; object-fit: cover; }
.author-avatar span { color: var(--white); font-weight: 700; font-size: 20px; }

.author-name {
    font-family: var(--font-body);
    font-weight: 600;
    font-size: 1rem;
    color: var(--ink);
}
.post-meta {
    font-size: .75rem;
    color: var(--slate);
    margin-top: 2px;
}

/* ── Header controls ─────────────────────────────────────── */
.header-controls {
    display: flex;
    gap: 10px;
    align-items: center;
}

.btn-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 600;
    padding: 8px 18px;
    border-radius: var(--r-xl);
    border: 1.5px solid var(--mist);
    background: var(--white);
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    color: var(--slate);
    white-space: nowrap;
}
.btn-pill:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}
.btn-pill.pinned {
    border-color: var(--pin-blue);
    background: var(--pin-blue);
    color: var(--white);
}
.btn-pill.pinned:hover {
    background: #256f90;
    border-color: #256f90;
}

.btn-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1.5px solid var(--mist);
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    color: var(--slate);
    font-size: .9rem;
}
.btn-icon:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}

/* ── Dropdown actions ────────────────────────────────────── */
.dropdown-menu {
    border-radius: var(--r-sm);
    border: 1px solid var(--mist);
    box-shadow: var(--shadow-float);
    padding: 6px;
    min-width: 160px;
}
.dropdown-item {
    border-radius: 8px;
    font-size: .88rem;
    padding: 9px 14px;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 9px;
}
.dropdown-item:hover { background: var(--cream); }

/* ── Post body ───────────────────────────────────────────── */
.post-content {
    padding: 32px 28px 20px;
}

.post-title {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.25;
    margin-bottom: 20px;
}

.post-body {
    font-size: 1.02rem;
    line-height: 1.8;
    color: var(--slate);
    font-weight: 300;
}
.post-body strong { font-weight: 600; color: var(--ink); }
.post-body em     { font-style: italic; font-family: var(--font-display); }
.post-body ul     { margin: 14px 0; padding-left: 22px; }
.post-body li     { margin: 6px 0; }

/* ── Media ───────────────────────────────────────────────── */
.post-image {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    border-radius: var(--r-md);
    margin-top: 24px;
    cursor: zoom-in;
    transition: opacity var(--transition), transform var(--transition);
    display: block;
}
.post-image:hover { opacity: .96; transform: scale(1.005); }

.post-gif {
    text-align: center;
    margin-top: 24px;
}
.post-gif img {
    max-height: 300px;
    max-width: 100%;
    border-radius: var(--r-md);
    box-shadow: var(--shadow-feather);
}

/* ── Hashtags ────────────────────────────────────────────── */
.hashtag-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 22px;
}
.hashtag-pill {
    font-size: .78rem;
    font-weight: 600;
    letter-spacing: .04em;
    color: var(--pin-blue);
    background: var(--pin-blue-dim);
    border: 1px solid transparent;
    padding: 5px 14px;
    border-radius: var(--r-xl);
    text-decoration: none;
    transition: var(--transition);
}
.hashtag-pill:hover {
    background: var(--pin-blue);
    color: var(--white);
}

/* ── Reaction bar ─────────────────────────────────────────── */
.post-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 18px 28px 22px;
    border-top: 1px solid var(--mist);
    align-items: center;
}

/* Reaction dropdown */
.reaction-wrap { position: relative; display: inline-block; }

.btn-react {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-react:hover, .btn-react.active {
    border-color: var(--saffron);
    color: var(--ember);
    background: var(--saffron-dim);
}

.reaction-palette {
    position: absolute;
    bottom: calc(100% + 10px);
    left: 0;
    display: none;
    gap: 4px;
    align-items: center;
    background: var(--white);
    border-radius: var(--r-xl);
    padding: 8px 12px;
    box-shadow: var(--shadow-float);
    border: 1px solid var(--mist);
    z-index: 200;
    animation: paletteIn .18s ease;
}
.reaction-palette.open { display: flex; }

@keyframes paletteIn {
    from { opacity: 0; transform: translateY(6px) scale(.95); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

.r-emoji {
    font-size: 1.5rem;
    padding: 4px 7px;
    border-radius: 50%;
    cursor: pointer;
    transition: transform .15s, background .15s;
    line-height: 1;
}
.r-emoji:hover { transform: scale(1.3); background: var(--cream); }

/* Favourite */
.btn-fav {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: #C9A227;
    background: #FFF9EC;
    border: 1.5px solid #EDD98A;
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-fav:hover, .btn-fav.active {
    background: #C9A227;
    border-color: #C9A227;
    color: var(--white);
}

/* Signal / Contact */
.btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--white);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
}
.btn-ghost:hover             { border-color: var(--slate); background: var(--cream); }
.btn-ghost.danger:hover      { border-color: var(--danger); color: var(--danger); background: #FBECEA; }
.btn-ghost.contact:hover     { border-color: var(--pin-blue); color: var(--pin-blue); background: var(--pin-blue-dim); }

/* ===== BOUTON RÉSUMÉ ===== */
.btn-summarize {
    background: none;
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 20px;
    font-size: .88rem;
    font-weight: 600;
    color: #6c5ce7;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-summarize:hover {
    border-color: #6c5ce7;
    color: #6c5ce7;
    background: rgba(108,92,231,0.1);
    transform: translateY(-1px);
}

/* ===== STYLES DICTÉE VOCALE ===== */
.microphone-btn {
    background: var(--white);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 9px 16px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: var(--transition);
    color: var(--slate);
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.microphone-btn:hover {
    border-color: var(--saffron);
    color: var(--saffron);
    background: var(--saffron-dim);
}
.microphone-btn.recording {
    background-color: #e74c3c;
    border-color: #e74c3c;
    color: white;
    animation: pulse 1.2s infinite;
}
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
    100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
}

/* ── Comments section ─────────────────────────────────────── */
.comments-section {
    margin-top: 44px;
}

.section-header {
    display: flex;
    align-items: baseline;
    gap: 12px;
    margin-bottom: 28px;
    padding-bottom: 14px;
    border-bottom: 2px solid var(--mist);
}
.section-title {
    font-family: var(--font-display);
    font-size: 1.45rem;
    font-weight: 600;
    color: var(--ink);
}
.comment-count-badge {
    background: var(--saffron-dim);
    color: var(--saffron);
    font-size: .75rem;
    font-weight: 700;
    padding: 3px 11px;
    border-radius: var(--r-xl);
    border: 1px solid rgba(232,160,64,.25);
}

/* ── Comment card ─────────────────────────────────────────── */
.comment-card {
    background: var(--white);
    border-radius: var(--r-md);
    border: 1px solid var(--mist);
    margin-bottom: 16px;
    transition: var(--transition);
    animation: cardReveal .35s ease both;
}
.comment-card:hover {
    border-color: var(--saffron);
    box-shadow: var(--shadow-feather);
    transform: translateX(3px);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 18px 8px;
}
.comment-author-block {
    display: flex;
    align-items: center;
    gap: 11px;
}
.c-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--saffron), var(--ember));
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}
.c-avatar img  { width: 100%; height: 100%; object-fit: cover; }
.c-avatar span { color: var(--white); font-weight: 700; font-size: 15px; }
.c-name        { font-weight: 600; font-size: .9rem; color: var(--ink); }
.c-date        { font-size: .7rem; color: var(--slate); margin-top: 1px; }

.c-actions { display: flex; gap: 6px; align-items: center; }
.btn-c-edit   { background: none; border: none; color: #C9A227; cursor: pointer; font-size: .85rem; padding: 4px 6px; border-radius: 6px; transition: var(--transition); text-decoration: none; }
.btn-c-delete { background: none; border: none; color: var(--danger); cursor: pointer; font-size: .85rem; padding: 4px 6px; border-radius: 6px; transition: var(--transition); }
.btn-c-edit:hover, .btn-c-delete:hover { background: var(--cream); }

.comment-body {
    padding: 4px 18px 14px;
    font-size: .92rem;
    line-height: 1.65;
    color: var(--slate);
}
.comment-gif { margin-top: 10px; }
.comment-gif img { max-height: 140px; border-radius: var(--r-sm); }

.comment-foot {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 18px 14px;
    border-top: 1px solid var(--mist);
}
.btn-c-like {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--slate);
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 12px;
    border-radius: var(--r-xl);
    transition: var(--transition);
}
.btn-c-like:hover, .btn-c-like.reacted {
    background: rgba(200,60,60,.08);
    color: #C83C3C;
}
.btn-c-reply {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--pin-blue);
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 12px;
    border-radius: var(--r-xl);
    transition: var(--transition);
}
.btn-c-reply:hover { background: var(--pin-blue-dim); }

/* ── Reply indent ────────────────────────────────────────── */
.replies-wrap { margin-left: 40px; margin-top: 8px; }
.reply-form-wrap {
    margin: 8px 0 14px 40px;
    background: var(--cream);
    border-radius: var(--r-md);
    padding: 14px;
    border: 1px solid var(--mist);
    display: none;
    animation: fadeSlideDown .2s ease;
}

/* ── Empty state ─────────────────────────────────────────── */
.empty-comments {
    text-align: center;
    padding: 52px 20px;
    background: var(--white);
    border-radius: var(--r-lg);
    border: 1.5px dashed var(--mist);
    color: var(--slate);
}
.empty-comments .ic { font-size: 2.8rem; opacity: .4; display: block; margin-bottom: 12px; }
.empty-comments p   { font-size: .95rem; }

/* ── Comment form card ───────────────────────────────────── */
.comment-form-card {
    background: var(--white);
    border-radius: var(--r-lg);
    padding: 28px;
    margin-top: 32px;
    box-shadow: var(--shadow-feather);
    border: 1px solid var(--mist);
}
.comment-form-card .cf-title {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 18px;
}

/* ── Form controls ───────────────────────────────────────── */
.form-control {
    font-family: var(--font-body);
    font-size: .93rem;
    color: var(--ink);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-sm);
    padding: 12px 16px;
    width: 100%;
    resize: vertical;
    transition: var(--transition);
    outline: none;
}
.form-control:focus {
    border-color: var(--saffron);
    background: var(--white);
    box-shadow: 0 0 0 3px var(--saffron-dim);
}
.form-control.is-invalid { border-color: var(--danger); }
.invalid-feedback { font-size: .8rem; color: var(--danger); margin-top: 5px; }
.field-hint        { font-size: .78rem; color: var(--slate); margin-top: 6px; }

/* ── Buttons ─────────────────────────────────────────────── */
.btn-primary-kd {
    font-family: var(--font-body);
    font-size: .9rem;
    font-weight: 600;
    color: var(--white);
    background: linear-gradient(135deg, var(--saffron) 0%, var(--ember) 100%);
    border: none;
    border-radius: var(--r-xl);
    padding: 11px 28px;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px rgba(232,160,64,.3);
}
.btn-primary-kd:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(232,160,64,.4);
}

.btn-secondary-sm {
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 600;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 8px 18px;
    cursor: pointer;
    transition: var(--transition);
}
.btn-secondary-sm:hover { border-color: var(--slate); background: var(--mist); }

.btn-gif-pick {
    font-family: var(--font-body);
    font-size: .82rem;
    font-weight: 500;
    color: var(--slate);
    background: var(--cream);
    border: 1.5px solid var(--mist);
    border-radius: var(--r-xl);
    padding: 8px 18px;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 7px;
}
.btn-gif-pick:hover { border-color: var(--saffron); color: var(--saffron); background: var(--saffron-dim); }

/* ── GIF modal ───────────────────────────────────────────── */
.gif-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(26,22,18,.6);
    backdrop-filter: blur(6px);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}
.gif-modal.open { display: flex; animation: fadeSlideDown .2s ease; }

.gif-modal-inner {
    background: var(--white);
    border-radius: var(--r-lg);
    padding: 28px;
    width: min(540px, 92vw);
    max-height: 80vh;
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-lift);
}
.gif-modal-inner h5 {
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 16px;
}
.gif-search-input {
    font-family: var(--font-body);
    width: 100%;
    padding: 11px 16px;
    border-radius: var(--r-sm);
    border: 1.5px solid var(--mist);
    font-size: .92rem;
    outline: none;
    background: var(--cream);
    transition: var(--transition);
    margin-bottom: 16px;
}
.gif-search-input:focus { border-color: var(--saffron); background: var(--white); box-shadow: 0 0 0 3px var(--saffron-dim); }

.gif-results {
    flex: 1;
    overflow-y: auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
}
.gif-results::-webkit-scrollbar { width: 5px; }
.gif-results::-webkit-scrollbar-track { background: var(--cream); border-radius: 10px; }
.gif-results::-webkit-scrollbar-thumb { background: var(--mist); border-radius: 10px; }

.gif-item img {
    width: 100%;
    aspect-ratio: 1;
    object-fit: cover;
    border-radius: var(--r-sm);
    cursor: pointer;
    transition: var(--transition);
    border: 2px solid transparent;
}
.gif-item img:hover { transform: scale(1.04); border-color: var(--saffron); }

.gif-preview-row {
    display: none;
    align-items: center;
    gap: 12px;
    margin-top: 12px;
}
.gif-preview-row.show { display: flex; }
.gif-preview-thumb {
    height: 64px;
    border-radius: var(--r-sm);
    object-fit: cover;
}
.btn-remove-gif {
    background: none;
    border: none;
    color: var(--danger);
    font-size: .8rem;
    cursor: pointer;
    font-weight: 600;
}

/* ── Login prompt ─────────────────────────────────────────── */
.login-prompt {
    background: var(--white);
    border-radius: var(--r-md);
    padding: 20px 24px;
    margin-top: 24px;
    border: 1px dashed var(--mist);
    text-align: center;
    font-size: .92rem;
    color: var(--slate);
}
.login-prompt a { color: var(--saffron); font-weight: 600; text-decoration: none; }
.login-prompt a:hover { text-decoration: underline; }

/* ── Scrollbar global ─────────────────────────────────────── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--cream); }
::-webkit-scrollbar-thumb { background: var(--mist); border-radius: 10px; }

/* ── Responsive ──────────────────────────────────────────── */
@media (max-width: 640px) {
    .pd-wrapper   { padding: 20px 16px 60px; }
    .post-header  { flex-direction: column; align-items: flex-start; }
    .post-title   { font-size: 1.5rem; }
    .replies-wrap, .reply-form-wrap { margin-left: 16px; }
    .gif-results  { grid-template-columns: repeat(2, 1fr); }
    .btn-summarize { padding: 6px 14px; font-size: .8rem; }
    .microphone-btn { padding: 6px 12px; font-size: .9rem; }
}
</style>
{% endblock %}

{% block body %}
<div class=\"pd-wrapper\">

    <!-- Back -->
    <a href=\"{{ path('app_posts_index') }}\" class=\"pd-back\">
        <i class=\"fas fa-arrow-left\"></i> Fil d'actualité
    </a>

    <!-- Flash messages -->
    {% for msg in app.flashes('success') %}
        <div class=\"pd-flash success\"><i class=\"fas fa-check-circle\"></i> {{ msg }}</div>
    {% endfor %}
    {% for msg in app.flashes('error') %}
        <div class=\"pd-flash danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ msg }}</div>
    {% endfor %}

    <!-- ═══════════ POST CARD ═══════════ -->
    <div class=\"post-card {% if post.isPinned %}pinned{% endif %} position-relative\">

        {% if post.isPinned %}
            <div class=\"pin-badge\"><i class=\"fas fa-thumbtack\"></i> Épinglé</div>
        {% endif %}

        <!-- Header -->
        <div class=\"post-header\">
            <div class=\"author-block\">
                <div class=\"author-avatar\">
                    {% if post.utilisateur.photo is defined and post.utilisateur.photo %}
                        <img src=\"{{ post.utilisateur.photo }}\" alt=\"\">
                    {% else %}
                        <span>{{ post.utilisateur.nom|first|upper }}</span>
                    {% endif %}
                </div>
                <div>
                    <div class=\"author-name\">{{ post.utilisateur.nom }}</div>
                    <div class=\"post-meta\">{{ post.createdAt|date('d/m/Y à H:i') }}</div>
                </div>
            </div>

            <div class=\"header-controls\">
                {% if app.user %}
                    <button class=\"btn-pill {% if post.isPinned %}pinned{% endif %}\"
                            onclick=\"togglePin({{ post.id }})\"
                            id=\"pin-btn-{{ post.id }}\">
                        <i class=\"fas fa-thumbtack\"></i>
                        <span id=\"pin-text-{{ post.id }}\">{{ post.isPinned ? 'Désépingler' : 'Épingler' }}</span>
                    </button>
                {% endif %}

                {% if app.user and (post.utilisateur.idUtilisateur == app.user.idUtilisateur or (app.user.role ?? '') == 'admin') %}
                    <div class=\"dropdown\">
                        <button class=\"btn-icon\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            <i class=\"fas fa-ellipsis-v\"></i>
                        </button>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            <li>
                                <a class=\"dropdown-item\" href=\"{{ path('app_post_edit', {id: post.id}) }}\">
                                    <i class=\"fas fa-edit\" style=\"color:#C9A227\"></i> Modifier
                                </a>
                            </li>
                            <li>
                                <form method=\"post\" action=\"{{ path('app_post_delete', {id: post.id}) }}\"
                                      onsubmit=\"return confirm('Supprimer cette publication ?')\">
                                    <button type=\"submit\" class=\"dropdown-item text-danger w-100 border-0 bg-transparent\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                {% endif %}
            </div>
        </div>

        <!-- Content -->
        <div class=\"post-content\">
            <h1 class=\"post-title\">{{ post.title|censor }}</h1>
            <div class=\"post-body\">
                {% if post.content %}
                    {{ post.content|censor|striptags('<strong><em><ul><li><br><p>')|raw|nl2br }}
                {% else %}
                    <p style=\"color:var(--slate);font-style:italic\">Aucun contenu</p>
                {% endif %}
            </div>

            {% if post.hashtags|length > 0 %}
                <div class=\"hashtag-row\">
                    {% for hashtag in post.hashtags %}
                        <a href=\"{{ path('app_posts_hashtag', {name: hashtag.name}) }}\" class=\"hashtag-pill\">
                            #{{ hashtag.name }}
                        </a>
                    {% endfor %}
                </div>
            {% endif %}

            {% if post.gifUrl %}
                <div class=\"post-gif\">
                    <img src=\"{{ post.gifUrl }}\" alt=\"GIF\" class=\"img-fluid\">
                </div>
            {% endif %}

            {% if post.imagePath %}
                <img src=\"{{ post.imagePath }}\" class=\"post-image\" alt=\"Image du post\"
                     onclick=\"this.requestFullscreen()\">
            {% endif %}
        </div>

        <!-- Actions -->
        <div class=\"post-actions\">

            <!-- Reactions -->
            <div class=\"reaction-wrap\" id=\"rw-{{ post.id }}\">
                <button class=\"btn-react\" id=\"reaction-btn-{{ post.id }}\"
                        onclick=\"togglePalette({{ post.id }})\">
                    {% set total = reactionsCount.like + reactionsCount.love + reactionsCount.haha + reactionsCount.sad + reactionsCount.angry %}
                    {% if userReaction == 'love' %}❤️
                    {% elseif userReaction == 'haha' %}😂
                    {% elseif userReaction == 'sad' %}😢
                    {% elseif userReaction == 'angry' %}😠
                    {% else %}👍{% endif %}
                    <span id=\"reaction-total-{{ post.id }}\">{{ total }}</span>
                </button>
                <div class=\"reaction-palette\" id=\"reaction-palette-{{ post.id }}\">
                    <span class=\"r-emoji\" onclick=\"sendReaction({{ post.id }}, 'like')\">👍</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction({{ post.id }}, 'love')\">❤️</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction({{ post.id }}, 'haha')\">😂</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction({{ post.id }}, 'sad')\">😢</span>
                    <span class=\"r-emoji\" onclick=\"sendReaction({{ post.id }}, 'angry')\">😠</span>
                </div>
            </div>

            {% if app.user %}
                <button class=\"btn-fav {% if isFavori %}active{% endif %}\"
                        onclick=\"toggleFavori({{ post.id }})\"
                        id=\"favori-btn-{{ post.id }}\">
                    <i class=\"fas fa-star\"></i>
                    <span id=\"favori-text-{{ post.id }}\">{{ isFavori ? 'Retirer des favoris' : 'Favoris' }}</span>
                </button>
            {% endif %}

            {% if app.user and app.user.idUtilisateur != post.utilisateur.idUtilisateur %}
                <a href=\"{{ path('app_messages_conversation', {id: post.utilisateur.idUtilisateur}) }}\"
                   class=\"btn-ghost contact\">
                    <i class=\"fas fa-envelope\"></i> Contacter
                </a>
                <button class=\"btn-ghost danger\" onclick=\"signalPost({{ post.id }})\">
                    <i class=\"fas fa-flag\"></i> Signaler
                </button>
            {% endif %}

            {# ===== BOUTON RÉSUMÉ ===== #}
            {% if post.content|censor|length > 200 %}
                <button class=\"btn-summarize\"
                        data-content=\"{{ post.content|censor|escape('html_attr') }}\"
                        onclick=\"summarizePost(this)\">
                    <i class=\"fas fa-robot\"></i> Résumer
                </button>
            {% endif %}

        </div>
    </div>
    <!-- /POST CARD -->


    <!-- ═══════════ COMMENTS ═══════════ -->
    <div class=\"comments-section\">
        <div class=\"section-header\">
            <h3 class=\"section-title\">Commentaires</h3>
            <span class=\"comment-count-badge\">{{ commentaires|filter(c => c.parent is null)|length }}</span>
        </div>

        {% import _self as cm %}

        {% macro renderComment(commentaire, userLikedComments, commentLikesCount, postId) %}
            <div class=\"comment-card\" id=\"comment-{{ commentaire.id }}\">

                <div class=\"comment-header\">
                    <div class=\"comment-author-block\">
                        <div class=\"c-avatar\">
                            {% if commentaire.utilisateur.photo is defined and commentaire.utilisateur.photo %}
                                <img src=\"{{ commentaire.utilisateur.photo }}\" alt=\"\">
                            {% else %}
                                <span>{{ commentaire.utilisateur.nom|first|upper }}</span>
                            {% endif %}
                        </div>
                        <div>
                            <div class=\"c-name\">{{ commentaire.utilisateur.nom }}</div>
                            <div class=\"c-date\">{{ commentaire.createdAt|date('d/m/Y à H:i') }}</div>
                        </div>
                    </div>

                    {% if app.user and (commentaire.utilisateur.idUtilisateur == app.user.idUtilisateur or (app.user.role ?? '') == 'admin') %}
                        <div class=\"c-actions\">
                            <a href=\"{{ path('app_comment_edit', {id: commentaire.id}) }}\"
                               class=\"btn-c-edit\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"{{ path('app_comment_delete', {id: commentaire.id}) }}\"
                                  onsubmit=\"return confirm('Supprimer ce commentaire ?')\"
                                  style=\"display:inline\">
                                <button type=\"submit\" class=\"btn-c-delete\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    {% endif %}
                </div>

                <div class=\"comment-body\">
                    {{ commentaire.content|censor|striptags('<strong><em><br>')|raw|nl2br }}
                    {% if commentaire.gifUrl %}
                        <div class=\"comment-gif\">
                            <img src=\"{{ commentaire.gifUrl }}\" alt=\"GIF\" style=\"max-height:130px;border-radius:10px;\">
                        </div>
                    {% endif %}
                </div>

                <div class=\"comment-foot\">
                    <button class=\"btn-c-like {% if userLikedComments[commentaire.id] is defined and userLikedComments[commentaire.id] %}reacted{% endif %}\"
                            onclick=\"toggleCommentLike({{ commentaire.id }})\"
                            id=\"comment-like-btn-{{ commentaire.id }}\">
                        <i class=\"fas fa-heart\"></i>
                        <span id=\"comment-like-count-{{ commentaire.id }}\">{{ commentLikesCount[commentaire.id]|default(0) }}</span>
                    </button>
                    {% if app.user %}
                        <button class=\"btn-c-reply\" onclick=\"showReply({{ commentaire.id }})\">
                            <i class=\"fas fa-reply\"></i> Répondre
                        </button>
                    {% endif %}
                </div>

                <!-- Reply form -->
                <div id=\"reply-form-{{ commentaire.id }}\" class=\"reply-form-wrap\">
                    <form method=\"post\" action=\"{{ path('app_post_comment', {id: postId}) }}\" enctype=\"multipart/form-data\">
                        <input type=\"hidden\" name=\"parent_id\" value=\"{{ commentaire.id }}\">
                        <textarea name=\"content\" rows=\"2\" class=\"form-control\"
                                  placeholder=\"Écrivez votre réponse…\" required></textarea>
                        <div class=\"mt-2 d-flex gap-2\">
                            <button type=\"button\" class=\"btn-secondary-sm\"
                                    onclick=\"hideReply({{ commentaire.id }})\">Annuler</button>
                            <button type=\"submit\" class=\"btn-primary-kd\" style=\"padding:8px 20px;font-size:.82rem\">Répondre</button>
                        </div>
                    </form>
                </div>

                {% if commentaire.replies is defined and commentaire.replies|length > 0 %}
                    <div class=\"replies-wrap\">
                        {% for reply in commentaire.replies %}
                            {{ _self.renderComment(reply, userLikedComments, commentLikesCount, postId) }}
                        {% endfor %}
                    </div>
                {% endif %}

            </div>
        {% endmacro %}

        {% for commentaire in commentaires %}
            {% if commentaire.parent is null %}
                {{ cm.renderComment(commentaire, userLikedComments, commentLikesCount, post.id) }}
            {% endif %}
        {% else %}
            <div class=\"empty-comments\">
                <span class=\"ic\">💬</span>
                <p>Soyez le premier à commenter cette publication !</p>
            </div>
        {% endfor %}


        <!-- Comment form avec DICTÉE VOCALE (remplace l'upload audio) -->
        {% if app.user %}
            <div class=\"comment-form-card\">
                <div class=\"cf-title\">Laisser un commentaire</div>

                <form method=\"post\" action=\"{{ path('app_post_comment', {id: post.id}) }}\" novalidate>
                    <div class=\"mb-3\">
                        <label class=\"form-label\">Votre commentaire</label>
                        <div class=\"d-flex gap-2 align-items-start\">
                            <textarea name=\"content\"
                                      id=\"commentContent\"
                                      class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\"
                                      rows=\"4\"
                                      placeholder=\"Partagez votre avis sur cette recette…\"
                                      required>{{ formData.content|default('') }}</textarea>
                            <button type=\"button\" id=\"dictateBtn\" class=\"microphone-btn\" title=\"Dicter\">
                                <i class=\"fas fa-microphone\"></i>
                            </button>
                        </div>
                        {% if errors.content is defined %}
                            <div class=\"invalid-feedback\">{{ errors.content }}</div>
                        {% else %}
                            <p class=\"field-hint\">Entre 2 et 1 000 caractères. Cliquez sur le micro pour dicter votre texte.</p>
                        {% endif %}
                    </div>

                    <input type=\"hidden\" name=\"gif_url\" id=\"gif_url\" value=\"{{ formData.gif_url|default('') }}\">

                    <div class=\"d-flex align-items-center gap-3 flex-wrap\">
                        <button type=\"button\" class=\"btn-gif-pick\" id=\"openGifBtn\">
                            <i class=\"fas fa-grin-tears\"></i> Ajouter un GIF
                        </button>

                        <div class=\"gif-preview-row\" id=\"gifPreviewRow\">
                            <img id=\"gifPreviewImg\" src=\"\" alt=\"GIF\" class=\"gif-preview-thumb\">
                            <button type=\"button\" class=\"btn-remove-gif\" id=\"removeGifBtn\">
                                <i class=\"fas fa-times-circle\"></i> Retirer
                            </button>
                        </div>
                    </div>

                    <button type=\"submit\" class=\"btn-primary-kd mt-4\">
                        <i class=\"fas fa-paper-plane\"></i> Publier le commentaire
                    </button>
                </form>
            </div>

        {% else %}
            <div class=\"login-prompt\">
                <i class=\"fas fa-lock\" style=\"margin-right:6px;opacity:.5\"></i>
                <a href=\"{{ path('app_login') }}\">Connectez-vous</a> pour pouvoir commenter.
            </div>
        {% endif %}

    </div>
    <!-- /COMMENTS -->

</div>

<!-- GIF Modal -->
<div class=\"gif-modal\" id=\"gifModal\">
    <div class=\"gif-modal-inner\">
        <h5><i class=\"fas fa-film\" style=\"color:var(--saffron);margin-right:8px\"></i>Choisir un GIF</h5>
        <input type=\"text\" id=\"gifSearch\" class=\"gif-search-input\" placeholder=\"Rechercher : rigolade, chat, bravo…\">
        <div id=\"gifResults\" class=\"gif-results\">
            <p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">
                Saisissez un mot clé…
            </p>
        </div>
    </div>
</div>


<script>
/* ═══════ REACTIONS ═══════ */
function togglePalette(id) {
    const p = document.getElementById('reaction-palette-' + id);
    p.classList.toggle('open');
}
function sendReaction(postId, type) {
    fetch(`/posts/\${postId}/react`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type })
    })
    .then(r => r.json())
    .then(d => {
        if (!d.success) return;
        const total = d.counts.like + d.counts.love + d.counts.haha + d.counts.sad + d.counts.angry;
        const span = document.getElementById('reaction-total-' + postId);
        if (span) span.textContent = total;
        const btn = document.getElementById('reaction-btn-' + postId);
        if (btn) {
            const map = { love:'❤️', haha:'😂', sad:'😢', angry:'😠' };
            const emoji = map[d.userReaction] || '👍';
            btn.innerHTML = `\${emoji} <span id=\"reaction-total-\${postId}\">\${total}</span>`;
        }
        document.getElementById('reaction-palette-' + postId)?.classList.remove('open');
    });
}

/* ═══════ FAVOURITES ═══════ */
function toggleFavori(id) {
    fetch(`/posts/\${id}/favori`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => { if (d.success) location.reload(); else alert(d.message || 'Erreur'); });
}

/* ═══════ COMMENT LIKE ═══════ */
function toggleCommentLike(id) {
    fetch(`/posts/comment/\${id}/like`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ type: 'like' })
    })
    .then(r => r.json())
    .then(d => {
        if (!d.success) return;
        const cnt = document.getElementById('comment-like-count-' + id);
        const btn = document.getElementById('comment-like-btn-' + id);
        if (cnt) cnt.textContent = d.count;
        if (btn) btn.classList.toggle('reacted', !!d.liked);
    });
}

/* ═══════ PIN ═══════ */
function togglePin(id) {
    fetch(`/posts/\${id}/pin`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => { if (d.success) location.reload(); else alert(d.message || 'Erreur'); });
}

/* ═══════ REPLY FORMS ═══════ */
function showReply(id) {
    const el = document.getElementById('reply-form-' + id);
    if (el) { el.style.display = 'block'; el.querySelector('textarea')?.focus(); }
}
function hideReply(id) {
    const el = document.getElementById('reply-form-' + id);
    if (el) el.style.display = 'none';
}

/* ═══════ SIGNAL ═══════ */
function signalPost(id) {
    if (!confirm('Signaler cette publication ?')) return;
    fetch(`/posts/\${id}/signal`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(d => {
        alert(d.message);
        if (d.success && d.deleted) location.href = \"{{ path('app_posts_index') }}\";
    });
}

/* ═══════ GIF PICKER ═══════ */
const GIPHY_KEY = 'zG36o0wRo5KYA5d6RkTYynPz1HuEIRpc';
const gifModal     = document.getElementById('gifModal');
const gifSearch    = document.getElementById('gifSearch');
const gifResults   = document.getElementById('gifResults');
const gifUrlInput  = document.getElementById('gif_url');
const gifPreviewRow = document.getElementById('gifPreviewRow');
const gifPreviewImg = document.getElementById('gifPreviewImg');
let gifTimer;

document.getElementById('openGifBtn')?.addEventListener('click', () => {
    gifModal.classList.add('open');
    gifSearch.focus();
});
gifModal?.addEventListener('click', e => {
    if (e.target === gifModal) gifModal.classList.remove('open');
});
gifSearch?.addEventListener('input', function () {
    clearTimeout(gifTimer);
    const q = this.value.trim();
    if (q.length < 2) { gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">Saisissez au moins 2 caractères…</p>'; return; }
    gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate);font-size:.88rem;padding:20px 0\">Recherche…</p>';
    gifTimer = setTimeout(() => {
        fetch(`https://api.giphy.com/v1/gifs/search?api_key=\${GIPHY_KEY}&q=\${encodeURIComponent(q)}&limit=12&rating=g&lang=fr`)
            .then(r => r.json())
            .then(data => {
                if (!data.data.length) { gifResults.innerHTML = '<p style=\"grid-column:1/-1;text-align:center;color:var(--slate)\">Aucun résultat</p>'; return; }
                gifResults.innerHTML = '';
                data.data.forEach(g => {
                    const d = document.createElement('div');
                    d.className = 'gif-item';
                    const img = document.createElement('img');
                    img.src = g.images.fixed_height_small.url;
                    img.dataset.url = g.images.original.url;
                    img.addEventListener('click', () => {
                        gifUrlInput.value = img.dataset.url;
                        gifPreviewImg.src = img.src;
                        gifPreviewRow.classList.add('show');
                        gifModal.classList.remove('open');
                        gifSearch.value = '';
                        gifResults.innerHTML = '';
                    });
                    d.appendChild(img);
                    gifResults.appendChild(d);
                });
            });
    }, 380);
});
document.getElementById('removeGifBtn')?.addEventListener('click', () => {
    gifUrlInput.value = '';
    gifPreviewImg.src = '';
    gifPreviewRow.classList.remove('show');
});
if (gifUrlInput?.value) {
    gifPreviewImg.src = gifUrlInput.value;
    gifPreviewRow.classList.add('show');
}

/* ═══════ DICTÉE VOCALE (SPEECH-TO-TEXT) ═══════ */
const dictateBtn = document.getElementById('dictateBtn');
const commentTextarea = document.getElementById('commentContent');
let recognition = null;
let isListening = false;

if (dictateBtn && commentTextarea) {
    if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        recognition = new SpeechRecognition();
        recognition.lang = 'fr-FR';
        recognition.interimResults = true;
        recognition.continuous = false;

        dictateBtn.addEventListener('click', () => {
            if (isListening) {
                recognition.stop();
                return;
            }
            recognition.start();
            dictateBtn.classList.add('recording');
            dictateBtn.innerHTML = '<i class=\"fas fa-stop-circle\"></i>';
            isListening = true;
        });

        recognition.onresult = (event) => {
            let transcript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                transcript += event.results[i][0].transcript;
            }
            const currentText = commentTextarea.value;
            commentTextarea.value = currentText + (currentText ? ' ' : '') + transcript;
        };

        recognition.onerror = (event) => {
            console.error('Erreur de reconnaissance:', event.error);
            alert('Erreur de dictée. Vérifiez votre microphone et réessayez.');
            stopDictation();
        };

        recognition.onend = () => {
            stopDictation();
        };

        function stopDictation() {
            isListening = false;
            dictateBtn.classList.remove('recording');
            dictateBtn.innerHTML = '<i class=\"fas fa-microphone\"></i>';
        }
    } else {
        dictateBtn.style.display = 'none';
        console.warn('La reconnaissance vocale n\\'est pas supportée par ce navigateur.');
    }
}

/* ═══════ Close reaction palette on outside click ═══════ */
document.addEventListener('click', e => {
    if (!e.target.closest('.reaction-wrap')) {
        document.querySelectorAll('.reaction-palette').forEach(p => p.classList.remove('open'));
    }
});
</script>
{% endblock %}", "post/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\post\\show.html.twig");
    }
}

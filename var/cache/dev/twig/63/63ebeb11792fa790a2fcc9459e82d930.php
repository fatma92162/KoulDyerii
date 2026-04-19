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

/* post/form.html.twig */
class __TwigTemplate_31ad36123316b589fe62fcea763e8d13 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/form.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 3, $this->source); })()), "html", null, true);
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
<style>
    .form-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        color: white;
        padding: 25px 30px;
    }

    .form-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .form-body {
        padding: 30px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #FF6B6B;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .current-image {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 15px;
        margin-top: 12px;
    }

    .current-image img {
        max-height: 130px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .btn-primary {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255,107,107,0.4);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
    }

    .help-text {
        font-size: 13.5px;
        color: #888;
        margin-top: 8px;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* Styles pour l'éditeur de texte */
    .editor-toolbar {
        background: #f8f9fa;
        border: 2px solid #f0e6d6;
        border-radius: 12px 12px 0 0;
        padding: 10px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 0;
    }
    .editor-toolbar button {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s;
    }
    .editor-toolbar button:hover {
        background: #FF6B6B;
        color: white;
        border-color: #FF6B6B;
    }
    .editor-toolbar button i {
        margin-right: 5px;
    }
    .content-editor {
        border: 2px solid #f0e6d6;
        border-top: none;
        border-radius: 0 0 12px 12px;
        padding: 16px;
        min-height: 200px;
        font-size: 15px;
        line-height: 1.6;
        width: 100%;
        font-family: inherit;
        resize: vertical;
    }
    .content-editor:focus {
        outline: none;
        border-color: #FF6B6B;
    }
    
    /* Styles pour l'aperçu en direct */
    .preview-panel {
        margin-top: 15px;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        overflow: hidden;
    }
    .preview-header {
        background: #f8f9fa;
        padding: 10px 15px;
        border-bottom: 1px solid #f0e6d6;
        font-weight: 600;
        color: #555;
        font-size: 14px;
    }
    .preview-content {
        padding: 15px;
        background: #fafafa;
        min-height: 120px;
        max-height: 250px;
        overflow-y: auto;
        font-size: 14px;
        line-height: 1.6;
    }
    .preview-content strong {
        font-weight: 700;
        color: #333;
    }
    .preview-content em {
        font-style: italic;
        color: #555;
    }
    .preview-content ul {
        margin: 8px 0;
        padding-left: 20px;
    }
    .preview-content li {
        margin: 3px 0;
    }
    .preview-content p {
        margin: 0 0 10px 0;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 214
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 215
        yield "<div class=\"container mt-5 form-container\">
    <div class=\"row\">
        <div class=\"col-12\">

            <a href=\"";
        // line 219
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" class=\"btn btn-outline-secondary mb-4\">
                <i class=\"fas fa-arrow-left\"></i> Retour au fil d'actualité
            </a>

            ";
        // line 224
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 224, $this->source); })()), "flashes", ["success"], "method", false, false, false, 224));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 225
            yield "                <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 227
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 227, $this->source); })()), "flashes", ["error"], "method", false, false, false, 227));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 228
            yield "                <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 230
        yield "
            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h3>";
        // line 233
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 233, $this->source); })()), "html", null, true);
        yield "</h3>
                </div>

                <div class=\"form-body\">
                    ";
        // line 237
        if ((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 237, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 238
            yield "                        <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 238, $this->source); })()), "id", [], "any", false, false, false, 238)]), "html", null, true);
            yield "\" enctype=\"multipart/form-data\" novalidate>
                    ";
        } else {
            // line 240
            yield "                        <form method=\"post\" action=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_create");
            yield "\" enctype=\"multipart/form-data\" novalidate>
                    ";
        }
        // line 242
        yield "
                        <div class=\"mb-4\">
                            <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" 
                                   class=\"form-control ";
        // line 246
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 246)) {
            yield "is-invalid";
        }
        yield "\" 
                                   id=\"title\" 
                                   name=\"title\" 
                                   value=\"";
        // line 249
        yield (((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 249, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 249, $this->source); })()), "title", [], "any", false, false, false, 249), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "title", [], "any", true, true, false, 249)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 249, $this->source); })()), "title", [], "any", false, false, false, 249), "")) : ("")), "html", null, true)));
        yield "\" 
                                   placeholder=\"Donnez un titre clair à votre publication\">
                            ";
        // line 251
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 251)) {
            // line 252
            yield "                                <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 252, $this->source); })()), "title", [], "any", false, false, false, 252), "html", null, true);
            yield "</div>
                            ";
        }
        // line 254
        yield "                        </div>

                        <div class=\"mb-4\">
                            <label for=\"content\" class=\"form-label\">Contenu <span class=\"text-danger\">*</span></label>
                            
                            <!-- Barre d'outils d'édition -->
                            <div class=\"editor-toolbar\">
                                <button type=\"button\" onclick=\"formatText('bold')\" title=\"Gras\">
                                    <i class=\"fas fa-bold\"></i> Gras
                                </button>
                                <button type=\"button\" onclick=\"formatText('italic')\" title=\"Italique\">
                                    <i class=\"fas fa-italic\"></i> Italique
                                </button>
                                <button type=\"button\" onclick=\"formatText('list')\" title=\"Liste à puces\">
                                    <i class=\"fas fa-list-ul\"></i> Liste
                                </button>
                            </div>
                            
                            <!-- Zone d'édition du contenu -->
                            <textarea class=\"content-editor ";
        // line 273
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 273)) {
            yield "is-invalid";
        }
        yield "\" 
                                      id=\"content\" 
                                      name=\"content\" 
                                      rows=\"8\" 
                                      placeholder=\"Que voulez-vous partager aujourd'hui ?\"
                                      onkeyup=\"updatePreview()\"
                                      oninput=\"updatePreview()\">";
        // line 279
        yield (((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 279, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 279, $this->source); })()), "content", [], "any", false, false, false, 279), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 279)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 279, $this->source); })()), "content", [], "any", false, false, false, 279), "")) : ("")), "html", null, true)));
        yield "</textarea>
                            
                            ";
        // line 281
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 281)) {
            // line 282
            yield "                                <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 282, $this->source); })()), "content", [], "any", false, false, false, 282), "html", null, true);
            yield "</div>
                            ";
        }
        // line 284
        yield "                            
                            <small class=\"help-text\">
                                <i class=\"fas fa-info-circle\"></i> Utilisez les boutons ci-dessus pour formater votre texte (Gras, Italique, Liste)
                            </small>
                        </div>

                        <!-- Aperçu en direct -->
                        <div class=\"preview-panel\">
                            <div class=\"preview-header\">
                                <i class=\"fas fa-eye\"></i> Aperçu du résultat
                            </div>
                            <div class=\"preview-content\" id=\"preview\">
                                ";
        // line 296
        yield (((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 296, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 296, $this->source); })()), "content", [], "any", false, false, false, 296)) : ("Le texte formaté apparaîtra ici..."));
        yield "
                            </div>
                        </div>

                        <div class=\"mb-4 mt-4\">
                            <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                            <input type=\"file\" 
                                   class=\"form-control ";
        // line 303
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 303)) {
            yield "is-invalid";
        }
        yield "\" 
                                   id=\"image\" 
                                   name=\"image\" 
                                   accept=\"image/jpeg,image/png,image/gif,image/webp\">
                            ";
        // line 307
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "image", [], "any", true, true, false, 307)) {
            // line 308
            yield "                                <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 308, $this->source); })()), "image", [], "any", false, false, false, 308), "html", null, true);
            yield "</div>
                            ";
        }
        // line 310
        yield "
                            ";
        // line 311
        if (((isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 311, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 311, $this->source); })()), "imagePath", [], "any", false, false, false, 311))) {
            // line 312
            yield "                                <div class=\"current-image\">
                                    <small class=\"text-muted d-block mb-2\">Image actuelle :</small>
                                    <div class=\"d-flex flex-wrap align-items-center gap-3\">
                                        <img src=\"";
            // line 315
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 315, $this->source); })()), "imagePath", [], "any", false, false, false, 315), "html", null, true);
            yield "\" 
                                             alt=\"Image actuelle\" 
                                             class=\"img-fluid\">
                                        <div>
                                            <div class=\"form-check\">
                                                <input class=\"form-check-input\" 
                                                       type=\"checkbox\" 
                                                       name=\"delete_image\" 
                                                       id=\"delete_image\" 
                                                       value=\"1\">
                                                <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                                    <i class=\"fas fa-trash-alt\"></i> Supprimer cette image
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
        }
        // line 333
        yield "
                            <small class=\"help-text\">
                                Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale recommandée : 2 Mo
                            </small>
                        </div>

                        <div class=\"d-flex justify-content-between align-items-center mt-5\">
                            <a href=\"";
        // line 340
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_posts_index");
        yield "\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> 
                                ";
        // line 345
        yield (((($tmp = (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 345, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Enregistrer les modifications") : ("Publier la publication"));
        yield "
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Fonctions pour formater le texte
    function formatText(type) {
        const textarea = document.getElementById('content');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selectedText = textarea.value.substring(start, end);
        let formattedText = '';
        
        switch(type) {
            case 'bold':
                formattedText = selectedText ? '**' + selectedText + '**' : '**texte en gras**';
                break;
            case 'italic':
                formattedText = selectedText ? '*' + selectedText + '*' : '*texte en italique*';
                break;
            case 'list':
                if (selectedText) {
                    const lines = selectedText.split('\\n');
                    formattedText = lines.map(line => '- ' + line).join('\\n');
                } else {
                    formattedText = '\\n- Élément 1\\n- Élément 2\\n- Élément 3';
                }
                break;
            default:
                return;
        }
        
        textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
        textarea.selectionStart = start + formattedText.length;
        textarea.selectionEnd = start + formattedText.length;
        updatePreview();
        textarea.focus();
    }
    
    // Fonction de conversion markdown -> HTML (corrigée)
    function markdownToHtml(text) {
        if (!text) return '';
        let html = text;
        
        // 1. Gras **texte**
        html = html.replace(/\\*\\*(.*?)\\*\\*/g, '<strong>\$1</strong>');
        // 2. Italique *texte* (ne pas capturer les **)
        html = html.replace(/\\*(?!\\*)(.*?)\\*(?!\\*)/g, '<em>\$1</em>');
        
        // 3. Gérer les listes à puces : lignes commençant par \"- \"
        const lines = html.split('\\n');
        let inList = false;
        const result = [];
        for (let line of lines) {
            if (line.trim().match(/^- /)) {
                if (!inList) {
                    result.push('<ul>');
                    inList = true;
                }
                const item = line.trim().replace(/^- /, '');
                result.push('<li>' + item + '</li>');
            } else {
                if (inList) {
                    result.push('</ul>');
                    inList = false;
                }
                if (line.trim() !== '') {
                    result.push(line);
                } else {
                    result.push('<br>');
                }
            }
        }
        if (inList) result.push('</ul>');
        html = result.join('');
        
        // 4. Remplacer les retours à la ligne restants par <br>
        html = html.replace(/\\n/g, '<br>');
        // Nettoyer les br inutiles dans les listes
        html = html.replace(/<\\/li><br><li>/g, '</li><li>');
        html = html.replace(/<\\/ul><br>/g, '</ul>');
        html = html.replace(/<br><ul>/g, '<ul>');
        
        return html;
    }
    
    // Mettre à jour l'aperçu en direct
    function updatePreview() {
        const content = document.getElementById('content').value;
        const previewDiv = document.getElementById('preview');
        if (!previewDiv) return;
        
        const html = markdownToHtml(content);
        if (html.trim() === '' || html === '<br>') {
            previewDiv.innerHTML = '<em class=\"text-muted\">Le texte formaté apparaîtra ici...</em>';
        } else {
            previewDiv.innerHTML = html;
        }
    }
    
    // Initialiser l'aperçu au chargement
    document.addEventListener('DOMContentLoaded', function() {
        updatePreview();
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
        return "post/form.html.twig";
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
        return array (  540 => 345,  532 => 340,  523 => 333,  502 => 315,  497 => 312,  495 => 311,  492 => 310,  486 => 308,  484 => 307,  475 => 303,  465 => 296,  451 => 284,  445 => 282,  443 => 281,  438 => 279,  427 => 273,  406 => 254,  400 => 252,  398 => 251,  393 => 249,  385 => 246,  379 => 242,  373 => 240,  367 => 238,  365 => 237,  358 => 233,  353 => 230,  344 => 228,  339 => 227,  330 => 225,  325 => 224,  318 => 219,  312 => 215,  302 => 214,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ titre }} | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .form-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        color: white;
        padding: 25px 30px;
    }

    .form-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .form-body {
        padding: 30px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #f0e6d6;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #FF6B6B;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff0f0;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .current-image {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 15px;
        margin-top: 12px;
    }

    .current-image img {
        max-height: 130px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .btn-primary {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255,107,107,0.4);
    }

    .btn-secondary {
        border-radius: 50px;
        padding: 12px 32px;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
    }

    .help-text {
        font-size: 13.5px;
        color: #888;
        margin-top: 8px;
    }

    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* Styles pour l'éditeur de texte */
    .editor-toolbar {
        background: #f8f9fa;
        border: 2px solid #f0e6d6;
        border-radius: 12px 12px 0 0;
        padding: 10px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 0;
    }
    .editor-toolbar button {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s;
    }
    .editor-toolbar button:hover {
        background: #FF6B6B;
        color: white;
        border-color: #FF6B6B;
    }
    .editor-toolbar button i {
        margin-right: 5px;
    }
    .content-editor {
        border: 2px solid #f0e6d6;
        border-top: none;
        border-radius: 0 0 12px 12px;
        padding: 16px;
        min-height: 200px;
        font-size: 15px;
        line-height: 1.6;
        width: 100%;
        font-family: inherit;
        resize: vertical;
    }
    .content-editor:focus {
        outline: none;
        border-color: #FF6B6B;
    }
    
    /* Styles pour l'aperçu en direct */
    .preview-panel {
        margin-top: 15px;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        overflow: hidden;
    }
    .preview-header {
        background: #f8f9fa;
        padding: 10px 15px;
        border-bottom: 1px solid #f0e6d6;
        font-weight: 600;
        color: #555;
        font-size: 14px;
    }
    .preview-content {
        padding: 15px;
        background: #fafafa;
        min-height: 120px;
        max-height: 250px;
        overflow-y: auto;
        font-size: 14px;
        line-height: 1.6;
    }
    .preview-content strong {
        font-weight: 700;
        color: #333;
    }
    .preview-content em {
        font-style: italic;
        color: #555;
    }
    .preview-content ul {
        margin: 8px 0;
        padding-left: 20px;
    }
    .preview-content li {
        margin: 3px 0;
    }
    .preview-content p {
        margin: 0 0 10px 0;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"container mt-5 form-container\">
    <div class=\"row\">
        <div class=\"col-12\">

            <a href=\"{{ path('app_posts_index') }}\" class=\"btn btn-outline-secondary mb-4\">
                <i class=\"fas fa-arrow-left\"></i> Retour au fil d'actualité
            </a>

            {# Affichage des messages flash #}
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success\">{{ message }}</div>
            {% endfor %}
            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger\">{{ message }}</div>
            {% endfor %}

            <div class=\"form-card\">
                <div class=\"form-header\">
                    <h3>{{ titre }}</h3>
                </div>

                <div class=\"form-body\">
                    {% if post %}
                        <form method=\"post\" action=\"{{ path('app_post_update', {id: post.id}) }}\" enctype=\"multipart/form-data\" novalidate>
                    {% else %}
                        <form method=\"post\" action=\"{{ path('app_post_create') }}\" enctype=\"multipart/form-data\" novalidate>
                    {% endif %}

                        <div class=\"mb-4\">
                            <label for=\"title\" class=\"form-label\">Titre <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" 
                                   class=\"form-control {% if errors.title is defined %}is-invalid{% endif %}\" 
                                   id=\"title\" 
                                   name=\"title\" 
                                   value=\"{{ post ? post.title : formData.title|default('') }}\" 
                                   placeholder=\"Donnez un titre clair à votre publication\">
                            {% if errors.title is defined %}
                                <div class=\"invalid-feedback\">{{ errors.title }}</div>
                            {% endif %}
                        </div>

                        <div class=\"mb-4\">
                            <label for=\"content\" class=\"form-label\">Contenu <span class=\"text-danger\">*</span></label>
                            
                            <!-- Barre d'outils d'édition -->
                            <div class=\"editor-toolbar\">
                                <button type=\"button\" onclick=\"formatText('bold')\" title=\"Gras\">
                                    <i class=\"fas fa-bold\"></i> Gras
                                </button>
                                <button type=\"button\" onclick=\"formatText('italic')\" title=\"Italique\">
                                    <i class=\"fas fa-italic\"></i> Italique
                                </button>
                                <button type=\"button\" onclick=\"formatText('list')\" title=\"Liste à puces\">
                                    <i class=\"fas fa-list-ul\"></i> Liste
                                </button>
                            </div>
                            
                            <!-- Zone d'édition du contenu -->
                            <textarea class=\"content-editor {% if errors.content is defined %}is-invalid{% endif %}\" 
                                      id=\"content\" 
                                      name=\"content\" 
                                      rows=\"8\" 
                                      placeholder=\"Que voulez-vous partager aujourd'hui ?\"
                                      onkeyup=\"updatePreview()\"
                                      oninput=\"updatePreview()\">{{ post ? post.content : formData.content|default('') }}</textarea>
                            
                            {% if errors.content is defined %}
                                <div class=\"invalid-feedback\">{{ errors.content }}</div>
                            {% endif %}
                            
                            <small class=\"help-text\">
                                <i class=\"fas fa-info-circle\"></i> Utilisez les boutons ci-dessus pour formater votre texte (Gras, Italique, Liste)
                            </small>
                        </div>

                        <!-- Aperçu en direct -->
                        <div class=\"preview-panel\">
                            <div class=\"preview-header\">
                                <i class=\"fas fa-eye\"></i> Aperçu du résultat
                            </div>
                            <div class=\"preview-content\" id=\"preview\">
                                {{ post ? post.content|raw : 'Le texte formaté apparaîtra ici...'|raw }}
                            </div>
                        </div>

                        <div class=\"mb-4 mt-4\">
                            <label for=\"image\" class=\"form-label\">Image (optionnel)</label>
                            <input type=\"file\" 
                                   class=\"form-control {% if errors.image is defined %}is-invalid{% endif %}\" 
                                   id=\"image\" 
                                   name=\"image\" 
                                   accept=\"image/jpeg,image/png,image/gif,image/webp\">
                            {% if errors.image is defined %}
                                <div class=\"invalid-feedback\">{{ errors.image }}</div>
                            {% endif %}

                            {% if post and post.imagePath %}
                                <div class=\"current-image\">
                                    <small class=\"text-muted d-block mb-2\">Image actuelle :</small>
                                    <div class=\"d-flex flex-wrap align-items-center gap-3\">
                                        <img src=\"{{ post.imagePath }}\" 
                                             alt=\"Image actuelle\" 
                                             class=\"img-fluid\">
                                        <div>
                                            <div class=\"form-check\">
                                                <input class=\"form-check-input\" 
                                                       type=\"checkbox\" 
                                                       name=\"delete_image\" 
                                                       id=\"delete_image\" 
                                                       value=\"1\">
                                                <label class=\"form-check-label text-danger\" for=\"delete_image\">
                                                    <i class=\"fas fa-trash-alt\"></i> Supprimer cette image
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {% endif %}

                            <small class=\"help-text\">
                                Formats acceptés : JPG, PNG, GIF, WebP — Taille maximale recommandée : 2 Mo
                            </small>
                        </div>

                        <div class=\"d-flex justify-content-between align-items-center mt-5\">
                            <a href=\"{{ path('app_posts_index') }}\" class=\"btn btn-secondary\">
                                <i class=\"fas fa-times\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"fas fa-save\"></i> 
                                {{ post ? 'Enregistrer les modifications' : 'Publier la publication' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Fonctions pour formater le texte
    function formatText(type) {
        const textarea = document.getElementById('content');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selectedText = textarea.value.substring(start, end);
        let formattedText = '';
        
        switch(type) {
            case 'bold':
                formattedText = selectedText ? '**' + selectedText + '**' : '**texte en gras**';
                break;
            case 'italic':
                formattedText = selectedText ? '*' + selectedText + '*' : '*texte en italique*';
                break;
            case 'list':
                if (selectedText) {
                    const lines = selectedText.split('\\n');
                    formattedText = lines.map(line => '- ' + line).join('\\n');
                } else {
                    formattedText = '\\n- Élément 1\\n- Élément 2\\n- Élément 3';
                }
                break;
            default:
                return;
        }
        
        textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
        textarea.selectionStart = start + formattedText.length;
        textarea.selectionEnd = start + formattedText.length;
        updatePreview();
        textarea.focus();
    }
    
    // Fonction de conversion markdown -> HTML (corrigée)
    function markdownToHtml(text) {
        if (!text) return '';
        let html = text;
        
        // 1. Gras **texte**
        html = html.replace(/\\*\\*(.*?)\\*\\*/g, '<strong>\$1</strong>');
        // 2. Italique *texte* (ne pas capturer les **)
        html = html.replace(/\\*(?!\\*)(.*?)\\*(?!\\*)/g, '<em>\$1</em>');
        
        // 3. Gérer les listes à puces : lignes commençant par \"- \"
        const lines = html.split('\\n');
        let inList = false;
        const result = [];
        for (let line of lines) {
            if (line.trim().match(/^- /)) {
                if (!inList) {
                    result.push('<ul>');
                    inList = true;
                }
                const item = line.trim().replace(/^- /, '');
                result.push('<li>' + item + '</li>');
            } else {
                if (inList) {
                    result.push('</ul>');
                    inList = false;
                }
                if (line.trim() !== '') {
                    result.push(line);
                } else {
                    result.push('<br>');
                }
            }
        }
        if (inList) result.push('</ul>');
        html = result.join('');
        
        // 4. Remplacer les retours à la ligne restants par <br>
        html = html.replace(/\\n/g, '<br>');
        // Nettoyer les br inutiles dans les listes
        html = html.replace(/<\\/li><br><li>/g, '</li><li>');
        html = html.replace(/<\\/ul><br>/g, '</ul>');
        html = html.replace(/<br><ul>/g, '<ul>');
        
        return html;
    }
    
    // Mettre à jour l'aperçu en direct
    function updatePreview() {
        const content = document.getElementById('content').value;
        const previewDiv = document.getElementById('preview');
        if (!previewDiv) return;
        
        const html = markdownToHtml(content);
        if (html.trim() === '' || html === '<br>') {
            previewDiv.innerHTML = '<em class=\"text-muted\">Le texte formaté apparaîtra ici...</em>';
        } else {
            previewDiv.innerHTML = html;
        }
    }
    
    // Initialiser l'aperçu au chargement
    document.addEventListener('DOMContentLoaded', function() {
        updatePreview();
    });
</script>
{% endblock %}", "post/form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\post\\form.html.twig");
    }
}

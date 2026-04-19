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

/* admin_posts/show.html.twig */
class __TwigTemplate_d573cd23f20c01dce46f093c6a245f1f extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_posts/show.html.twig"));

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

        yield "Détail de la publication";
        
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
    .comment-card {
        transition: all 0.2s ease;
    }
    .comment-card:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .btn-edit-comment {
        background: none;
        border: none;
        color: #f0ad4e;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.2s ease;
    }
    .btn-edit-comment:hover {
        background: #fff8f0;
        color: #ec971f;
    }
    .btn-delete-comment {
        background: none;
        border: none;
        color: #d9534f;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.2s ease;
    }
    .btn-delete-comment:hover {
        background: #fff0f0;
        color: #c9302c;
    }
    .comment-actions {
        display: flex;
        gap: 5px;
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
    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    /* ✅ Styles pour les boutons like */
    .btn-like, .btn-comment-like {
        background: none;
        border: 2px solid #f0e6d6;
        border-radius: 50px;
        padding: 5px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #999;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .btn-like:hover, .btn-comment-like:hover {
        border-color: #FF6B6B;
        color: #FF6B6B;
        background: #fff0f0;
    }
    .btn-like.reacted, .btn-comment-like.reacted {
        border-color: #FF6B6B;
        color: #FF6B6B;
        background: #fff0f0;
    }
    .post-like {
        margin-top: 15px;
        padding-top: 10px;
        border-top: 1px solid #f0e6d6;
    }
    .comment-like {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #f0e6d6;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 109
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 110
        yield "<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📄 ";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 112, $this->source); })()), "title", [], "any", false, false, false, 112), "html", null, true);
        yield "</h3>
        <a href=\"";
        // line 113
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_posts_index");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <!-- Affichage du post -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 40px; height: 40px;\">
                    ";
        // line 123
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 123, $this->source); })()), "utilisateur", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 124
            yield "                        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 124, $this->source); })()), "utilisateur", [], "any", false, false, false, 124), "nom", [], "any", false, false, false, 124))), "html", null, true);
            yield "
                    ";
        } else {
            // line 126
            yield "                        ?
                    ";
        }
        // line 128
        yield "                </div>
                <div>
                    <strong>";
        // line 130
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 130, $this->source); })()), "utilisateur", [], "any", false, false, false, 130)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 130, $this->source); })()), "utilisateur", [], "any", false, false, false, 130), "nom", [], "any", false, false, false, 130), "html", null, true);
        } else {
            yield "Utilisateur inconnu";
        }
        yield "</strong><br>
                    <small class=\"text-muted\">";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 131, $this->source); })()), "createdAt", [], "any", false, false, false, 131), "d/m/Y à H:i"), "html", null, true);
        yield "</small>
                </div>
                
                <!-- Bouton pour ajouter un commentaire -->
                <div class=\"ms-auto\">
                    <button type=\"button\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"collapse\" data-bs-target=\"#addCommentForm\">
                        <i class=\"fas fa-plus\"></i> Ajouter un commentaire
                    </button>
                </div>
            </div>
            
            <p>";
        // line 142
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 142, $this->source); })()), "content", [], "any", false, false, false, 142), "html", null, true));
        yield "</p>
            
            ";
        // line 144
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 144, $this->source); })()), "imagePath", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 145
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 145, $this->source); })()), "imagePath", [], "any", false, false, false, 145), "html", null, true);
            yield "\" class=\"img-fluid rounded mt-2\" style=\"max-height: 400px;\">
            ";
        }
        // line 147
        yield "            
            <!-- ✅ Bouton Like pour le post -->
            <div class=\"post-like\">
                <button class=\"btn-like ";
        // line 150
        if ((($tmp = (isset($context["userLikedPost"]) || array_key_exists("userLikedPost", $context) ? $context["userLikedPost"] : (function () { throw new RuntimeError('Variable "userLikedPost" does not exist.', 150, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "reacted";
        }
        yield "\" 
                        onclick=\"togglePostLike(";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 151, $this->source); })()), "id", [], "any", false, false, false, 151), "html", null, true);
        yield ")\"
                        id=\"post-like-btn-";
        // line 152
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 152, $this->source); })()), "id", [], "any", false, false, false, 152), "html", null, true);
        yield "\">
                    <i class=\"fas fa-heart\"></i>
                    <span id=\"post-like-count-";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 154, $this->source); })()), "id", [], "any", false, false, false, 154), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("postLikesCount", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["postLikesCount"]) || array_key_exists("postLikesCount", $context) ? $context["postLikesCount"] : (function () { throw new RuntimeError('Variable "postLikesCount" does not exist.', 154, $this->source); })()), 0)) : (0)), "html", null, true);
        yield "</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Formulaire pour ajouter un commentaire avec validation -->
    <div class=\"collapse mb-4 ";
        // line 161
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 161)) {
            yield "show";
        }
        yield "\" id=\"addCommentForm\">
        <div class=\"card\">
            <div class=\"card-body\">
                <h5>Ajouter un commentaire</h5>
                
                ";
        // line 166
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 166, $this->source); })()), "flashes", ["error"], "method", false, false, false, 166));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 167
            yield "                    <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 169
        yield "                
                <form method=\"post\" action=\"";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_post_comment", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 170, $this->source); })()), "id", [], "any", false, false, false, 170)]), "html", null, true);
        yield "\" novalidate>
                    <div class=\"mb-3\">
                        <textarea name=\"content\" 
                                  class=\"form-control ";
        // line 173
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 173)) {
            yield "is-invalid";
        }
        yield "\" 
                                  rows=\"3\" 
                                  placeholder=\"Votre commentaire...\">";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "content", [], "any", true, true, false, 175)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 175, $this->source); })()), "content", [], "any", false, false, false, 175), "")) : ("")), "html", null, true);
        yield "</textarea>
                        ";
        // line 176
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 176)) {
            // line 177
            yield "                            <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 177, $this->source); })()), "content", [], "any", false, false, false, 177), "html", null, true);
            yield "</div>
                        ";
        } else {
            // line 179
            yield "                            <small class=\"text-muted\">Le commentaire doit contenir entre 2 et 1000 caractères.</small>
                        ";
        }
        // line 181
        yield "                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Publier le commentaire</button>
                </form>
            </div>
        </div>
    </div>

    <h4 class=\"mb-3\">💬 Commentaires (";
        // line 188
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 188, $this->source); })())), "html", null, true);
        yield ")</h4>

    ";
        // line 190
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 190, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["commentaire"]) {
            // line 191
            yield "        <div class=\"card mb-2 comment-card\">
            <div class=\"card-body\">
                <div class=\"d-flex justify-content-between align-items-start\">
                    <div class=\"flex-grow-1\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 30px; height: 30px; font-size: 14px;\">
                                ";
            // line 197
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "utilisateur", [], "any", false, false, false, 197), "nom", [], "any", false, false, false, 197))), "html", null, true);
            yield "
                            </div>
                            <div>
                                <strong>";
            // line 200
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "utilisateur", [], "any", false, false, false, 200), "nom", [], "any", false, false, false, 200), "html", null, true);
            yield "</strong>
                                <small class=\"text-muted ms-2\">";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "createdAt", [], "any", false, false, false, 201), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                            </div>
                        </div>
                        <p class=\"mb-0\">";
            // line 204
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "content", [], "any", false, false, false, 204), "html", null, true));
            yield "</p>
                        
                        <!-- ✅ Bouton Like pour le commentaire -->
                        <div class=\"comment-like\">
                            <button class=\"btn-comment-like ";
            // line 208
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["userLikedComments"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 208), [], "array", true, true, false, 208) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["userLikedComments"]) || array_key_exists("userLikedComments", $context) ? $context["userLikedComments"] : (function () { throw new RuntimeError('Variable "userLikedComments" does not exist.', 208, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 208), [], "array", false, false, false, 208))) {
                yield "reacted";
            }
            yield "\" 
                                    onclick=\"toggleCommentLike(";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 209), "html", null, true);
            yield ")\"
                                    id=\"comment-like-btn-";
            // line 210
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 210), "html", null, true);
            yield "\">
                                <i class=\"fas fa-heart\"></i>
                                <span id=\"comment-like-count-";
            // line 212
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 212), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["commentLikesCount"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 212), [], "array", true, true, false, 212)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentLikesCount"]) || array_key_exists("commentLikesCount", $context) ? $context["commentLikesCount"] : (function () { throw new RuntimeError('Variable "commentLikesCount" does not exist.', 212, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 212), [], "array", false, false, false, 212), 0)) : (0)), "html", null, true);
            yield "</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Actions : Modifier/Supprimer UNIQUEMENT pour ses propres commentaires -->
                    ";
            // line 218
            if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 218, $this->source); })()), "user", [], "any", false, false, false, 218) && CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "utilisateur", [], "any", false, false, false, 218)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "utilisateur", [], "any", false, false, false, 218), "idUtilisateur", [], "any", false, false, false, 218) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 218, $this->source); })()), "user", [], "any", false, false, false, 218), "idUtilisateur", [], "any", false, false, false, 218)))) {
                // line 219
                yield "                        <div class=\"comment-actions ms-2\">
                            <a href=\"";
                // line 220
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 220)]), "html", null, true);
                yield "\" class=\"btn-edit-comment\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"";
                // line 223
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "id", [], "any", false, false, false, 223)]), "html", null, true);
                yield "\" 
                                  onsubmit=\"return confirm('Supprimer ce commentaire ?')\" style=\"display: inline;\">
                                <button type=\"submit\" class=\"btn-delete-comment\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    ";
            }
            // line 231
            yield "                </div>
            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        // line 234
        if (!$context['_iterated']) {
            // line 235
            yield "        <div class=\"text-center py-4 text-muted\">
            <i class=\"fas fa-comment-dots fa-2x mb-2\"></i>
            <p>Aucun commentaire pour cette publication.</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['commentaire'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 240
        yield "</div>

<script>
// ✅ Fonction pour liker/unliker un post
function togglePostLike(postId) {
    fetch(`/admin/posts/\${postId}/like`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'like' })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const countEl = document.getElementById('post-like-count-' + postId);
            const btn = document.getElementById('post-like-btn-' + postId);
            
            if (countEl) countEl.textContent = data.count;
            if (btn) {
                if (data.liked) {
                    btn.classList.add('reacted');
                } else {
                    btn.classList.remove('reacted');
                }
            }
        }
    })
    .catch(err => console.error('Erreur like post:', err));
}

// ✅ Fonction pour liker/unliker un commentaire
function toggleCommentLike(commentId) {
    fetch(`/admin/posts/comment/\${commentId}/like`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'like' })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const countEl = document.getElementById('comment-like-count-' + commentId);
            const btn = document.getElementById('comment-like-btn-' + commentId);
            
            if (countEl) countEl.textContent = data.count;
            if (btn) {
                if (data.liked) {
                    btn.classList.add('reacted');
                } else {
                    btn.classList.remove('reacted');
                }
            }
        }
    })
    .catch(err => console.error('Erreur like commentaire:', err));
}
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
        return "admin_posts/show.html.twig";
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
        return array (  482 => 240,  472 => 235,  470 => 234,  463 => 231,  452 => 223,  446 => 220,  443 => 219,  441 => 218,  430 => 212,  425 => 210,  421 => 209,  415 => 208,  408 => 204,  402 => 201,  398 => 200,  392 => 197,  384 => 191,  379 => 190,  374 => 188,  365 => 181,  361 => 179,  355 => 177,  353 => 176,  349 => 175,  342 => 173,  336 => 170,  333 => 169,  324 => 167,  320 => 166,  310 => 161,  298 => 154,  293 => 152,  289 => 151,  283 => 150,  278 => 147,  272 => 145,  270 => 144,  265 => 142,  251 => 131,  243 => 130,  239 => 128,  235 => 126,  229 => 124,  227 => 123,  214 => 113,  210 => 112,  206 => 110,  196 => 109,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Détail de la publication{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .comment-card {
        transition: all 0.2s ease;
    }
    .comment-card:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .btn-edit-comment {
        background: none;
        border: none;
        color: #f0ad4e;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.2s ease;
    }
    .btn-edit-comment:hover {
        background: #fff8f0;
        color: #ec971f;
    }
    .btn-delete-comment {
        background: none;
        border: none;
        color: #d9534f;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.2s ease;
    }
    .btn-delete-comment:hover {
        background: #fff0f0;
        color: #c9302c;
    }
    .comment-actions {
        display: flex;
        gap: 5px;
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
    .alert {
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    /* ✅ Styles pour les boutons like */
    .btn-like, .btn-comment-like {
        background: none;
        border: 2px solid #f0e6d6;
        border-radius: 50px;
        padding: 5px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #999;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .btn-like:hover, .btn-comment-like:hover {
        border-color: #FF6B6B;
        color: #FF6B6B;
        background: #fff0f0;
    }
    .btn-like.reacted, .btn-comment-like.reacted {
        border-color: #FF6B6B;
        color: #FF6B6B;
        background: #fff0f0;
    }
    .post-like {
        margin-top: 15px;
        padding-top: 10px;
        border-top: 1px solid #f0e6d6;
    }
    .comment-like {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #f0e6d6;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>📄 {{ post.title }}</h3>
        <a href=\"{{ path('app_admin_posts_index') }}\" class=\"btn btn-secondary\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <!-- Affichage du post -->
    <div class=\"card mb-4\">
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 40px; height: 40px;\">
                    {% if post.utilisateur %}
                        {{ post.utilisateur.nom|first|upper }}
                    {% else %}
                        ?
                    {% endif %}
                </div>
                <div>
                    <strong>{% if post.utilisateur %}{{ post.utilisateur.nom }}{% else %}Utilisateur inconnu{% endif %}</strong><br>
                    <small class=\"text-muted\">{{ post.createdAt|date('d/m/Y à H:i') }}</small>
                </div>
                
                <!-- Bouton pour ajouter un commentaire -->
                <div class=\"ms-auto\">
                    <button type=\"button\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"collapse\" data-bs-target=\"#addCommentForm\">
                        <i class=\"fas fa-plus\"></i> Ajouter un commentaire
                    </button>
                </div>
            </div>
            
            <p>{{ post.content|nl2br }}</p>
            
            {% if post.imagePath %}
                <img src=\"{{ post.imagePath }}\" class=\"img-fluid rounded mt-2\" style=\"max-height: 400px;\">
            {% endif %}
            
            <!-- ✅ Bouton Like pour le post -->
            <div class=\"post-like\">
                <button class=\"btn-like {% if userLikedPost %}reacted{% endif %}\" 
                        onclick=\"togglePostLike({{ post.id }})\"
                        id=\"post-like-btn-{{ post.id }}\">
                    <i class=\"fas fa-heart\"></i>
                    <span id=\"post-like-count-{{ post.id }}\">{{ postLikesCount|default(0) }}</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Formulaire pour ajouter un commentaire avec validation -->
    <div class=\"collapse mb-4 {% if errors.content is defined %}show{% endif %}\" id=\"addCommentForm\">
        <div class=\"card\">
            <div class=\"card-body\">
                <h5>Ajouter un commentaire</h5>
                
                {% for message in app.flashes('error') %}
                    <div class=\"alert alert-danger\">{{ message }}</div>
                {% endfor %}
                
                <form method=\"post\" action=\"{{ path('app_admin_post_comment', {id: post.id}) }}\" novalidate>
                    <div class=\"mb-3\">
                        <textarea name=\"content\" 
                                  class=\"form-control {% if errors.content is defined %}is-invalid{% endif %}\" 
                                  rows=\"3\" 
                                  placeholder=\"Votre commentaire...\">{{ formData.content|default('') }}</textarea>
                        {% if errors.content is defined %}
                            <div class=\"invalid-feedback\">{{ errors.content }}</div>
                        {% else %}
                            <small class=\"text-muted\">Le commentaire doit contenir entre 2 et 1000 caractères.</small>
                        {% endif %}
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Publier le commentaire</button>
                </form>
            </div>
        </div>
    </div>

    <h4 class=\"mb-3\">💬 Commentaires ({{ commentaires|length }})</h4>

    {% for commentaire in commentaires %}
        <div class=\"card mb-2 comment-card\">
            <div class=\"card-body\">
                <div class=\"d-flex justify-content-between align-items-start\">
                    <div class=\"flex-grow-1\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 30px; height: 30px; font-size: 14px;\">
                                {{ commentaire.utilisateur.nom|first|upper }}
                            </div>
                            <div>
                                <strong>{{ commentaire.utilisateur.nom }}</strong>
                                <small class=\"text-muted ms-2\">{{ commentaire.createdAt|date('d/m/Y H:i') }}</small>
                            </div>
                        </div>
                        <p class=\"mb-0\">{{ commentaire.content|nl2br }}</p>
                        
                        <!-- ✅ Bouton Like pour le commentaire -->
                        <div class=\"comment-like\">
                            <button class=\"btn-comment-like {% if userLikedComments[commentaire.id] is defined and userLikedComments[commentaire.id] %}reacted{% endif %}\" 
                                    onclick=\"toggleCommentLike({{ commentaire.id }})\"
                                    id=\"comment-like-btn-{{ commentaire.id }}\">
                                <i class=\"fas fa-heart\"></i>
                                <span id=\"comment-like-count-{{ commentaire.id }}\">{{ commentLikesCount[commentaire.id]|default(0) }}</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Actions : Modifier/Supprimer UNIQUEMENT pour ses propres commentaires -->
                    {% if app.user and commentaire.utilisateur and commentaire.utilisateur.idUtilisateur == app.user.idUtilisateur %}
                        <div class=\"comment-actions ms-2\">
                            <a href=\"{{ path('app_admin_comment_edit', {id: commentaire.id}) }}\" class=\"btn-edit-comment\" title=\"Modifier\">
                                <i class=\"fas fa-edit\"></i>
                            </a>
                            <form method=\"post\" action=\"{{ path('app_admin_comment_delete', {id: commentaire.id}) }}\" 
                                  onsubmit=\"return confirm('Supprimer ce commentaire ?')\" style=\"display: inline;\">
                                <button type=\"submit\" class=\"btn-delete-comment\" title=\"Supprimer\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    {% else %}
        <div class=\"text-center py-4 text-muted\">
            <i class=\"fas fa-comment-dots fa-2x mb-2\"></i>
            <p>Aucun commentaire pour cette publication.</p>
        </div>
    {% endfor %}
</div>

<script>
// ✅ Fonction pour liker/unliker un post
function togglePostLike(postId) {
    fetch(`/admin/posts/\${postId}/like`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'like' })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const countEl = document.getElementById('post-like-count-' + postId);
            const btn = document.getElementById('post-like-btn-' + postId);
            
            if (countEl) countEl.textContent = data.count;
            if (btn) {
                if (data.liked) {
                    btn.classList.add('reacted');
                } else {
                    btn.classList.remove('reacted');
                }
            }
        }
    })
    .catch(err => console.error('Erreur like post:', err));
}

// ✅ Fonction pour liker/unliker un commentaire
function toggleCommentLike(commentId) {
    fetch(`/admin/posts/comment/\${commentId}/like`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'like' })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const countEl = document.getElementById('comment-like-count-' + commentId);
            const btn = document.getElementById('comment-like-btn-' + commentId);
            
            if (countEl) countEl.textContent = data.count;
            if (btn) {
                if (data.liked) {
                    btn.classList.add('reacted');
                } else {
                    btn.classList.remove('reacted');
                }
            }
        }
    })
    .catch(err => console.error('Erreur like commentaire:', err));
}
</script>
{% endblock %}", "admin_posts/show.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_posts\\show.html.twig");
    }
}

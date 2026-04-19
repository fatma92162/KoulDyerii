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

/* utilisateur/form.html.twig */
class __TwigTemplate_b71ea297a8a52466295aa0768f5e12b9 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/form.html.twig"));

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
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .form-card {
        background: white;
        border-radius: 40px;
        padding: 40px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 0.7s ease-out;
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0e6d6;
    }

    .form-header h2 {
        font-size: 28px;
        font-weight: 700;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 5px;
    }

    .form-header p {
        color: #666;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group label .required {
        color: #FF6B6B;
        margin-left: 3px;
    }

    .input-group {
        position: relative;
    }

    .input-group .icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        font-size: 14px;
        background: #fefcf8;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-select {
        cursor: pointer;
        appearance: none;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #FF6B6B;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15);
    }

    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #28a745;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2328a745' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
    }

    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #FF6B6B;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23FF6B6B' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='8' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'%3E%3C/line%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.12);
    }

    .field-message {
        font-size: 12px;
        margin-top: 6px;
        padding-left: 4px;
        min-height: 18px;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }

    .field-message.error {
        color: #FF6B6B;
    }

    .field-message.success {
        color: #28a745;
    }

    .field-message.hidden {
        visibility: hidden;
    }

    .password-strength {
        margin-top: 8px;
    }

    .strength-bar {
        height: 4px;
        border-radius: 2px;
        background: #f0e6d6;
        overflow: hidden;
        margin-bottom: 5px;
    }

    .strength-fill {
        height: 100%;
        border-radius: 2px;
        transition: width 0.3s ease, background 0.3s ease;
        width: 0%;
    }

    .strength-text {
        font-size: 11px;
        color: #999;
    }

    .toggle-pw {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #aaa;
        padding: 0;
        line-height: 1;
    }

    .toggle-pw:hover {
        color: #FF6B6B;
    }

    .char-counter {
        font-size: 11px;
        color: #bbb;
        text-align: right;
        margin-top: 4px;
    }

    .char-counter.warn {
        color: #FF6B6B;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 15px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
    }

    .btn-submit:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .btn-cancel {
        width: 100%;
        padding: 12px;
        background: transparent;
        color: #666;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-cancel:hover {
        background: #f0e6d6;
        color: #333;
    }

    .row {
        display: flex;
        gap: 15px;
    }

    .col {
        flex: 1;
    }

    .alert {
        padding: 12px 15px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 13px;
        animation: shake 0.5s ease;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #fff0f0;
        color: #FF6B6B;
        border: 1px solid #ffd4d4;
    }

    /* Aperçu photo/avatar */
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
        margin-bottom: 15px;
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }

    .photo-preview {
        margin-top: 10px;
        display: none;
    }

    .photo-preview img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #FF6B6B;
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }

    .photo-preview p {
        font-size: 11px;
        color: #999;
        margin-top: 5px;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @media (max-width: 600px) {
        .row { flex-direction: column; gap: 0; }
        .form-card { padding: 30px 25px; }
        .form-header h2 { font-size: 24px; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 339
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 340
        yield "<div class=\"form-container\">
    <div class=\"form-card\">
        <div class=\"form-header\">
            <h2>";
        // line 343
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 343, $this->source); })()), "html", null, true);
        yield "</h2>
            <p>Veuillez remplir les informations ci-dessous</p>
        </div>

        ";
        // line 347
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 347, $this->source); })()), "flashes", ["success"], "method", false, false, false, 347));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 348
            yield "            <div class=\"alert alert-success\">✅ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 350
        yield "
        ";
        // line 351
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 351, $this->source); })()), "flashes", ["error"], "method", false, false, false, 351));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 352
            yield "            <div class=\"alert alert-danger\">❌ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 354
        yield "
        ";
        // line 355
        if ((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 355, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 356
            yield "            <form id=\"profileForm\" method=\"post\" action=\"/utilisateur/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 356, $this->source); })()), "idUtilisateur", [], "any", false, false, false, 356), "html", null, true);
            yield "/update\" enctype=\"multipart/form-data\" novalidate>
        ";
        } else {
            // line 358
            yield "            <form id=\"profileForm\" method=\"post\" action=\"/utilisateur/create\" enctype=\"multipart/form-data\" novalidate>
        ";
        }
        // line 360
        yield "
            ";
        // line 362
        yield "            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"nom\">👤 NOM <span class=\"required\">*</span></label>
                        <div class=\"input-group\">
                            <span class=\"icon\">👤</span>
                            <input type=\"text\"
                                   id=\"nom\"
                                   name=\"nom\"
                                   class=\"form-control\"
                                   value=\"";
        // line 372
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 372, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 372, $this->source); })()), "nom", [], "any", false, false, false, 372), "html", null, true)) : (""));
        yield "\"
                                   placeholder=\"Votre nom complet\"
                                   maxlength=\"80\"
                                   autocomplete=\"name\">
                        </div>
                        <div id=\"nom-msg\" class=\"field-message hidden\"></div>
                        <div class=\"char-counter\" id=\"nom-counter\">0 / 80</div>
                    </div>
                </div>
            </div>

            ";
        // line 384
        yield "            <div class=\"form-group\">
                <label for=\"email\">📧 EMAIL <span class=\"required\">*</span></label>
                <div class=\"input-group\">
                    <span class=\"icon\">✉️</span>
                    <input type=\"email\"
                           id=\"email\"
                           name=\"email\"
                           class=\"form-control\"
                           value=\"";
        // line 392
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 392, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 392, $this->source); })()), "email", [], "any", false, false, false, 392), "html", null, true)) : (""));
        yield "\"
                           placeholder=\"exemple@email.com\"
                           autocomplete=\"email\">
                </div>
                <div id=\"email-msg\" class=\"field-message hidden\"></div>
            </div>

            ";
        // line 400
        yield "            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"motDePasse\">
                            🔒 MOT DE PASSE
                            ";
        // line 405
        if ((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 405, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 406
            yield "                                <small style=\"font-weight:400;text-transform:none;color:#999\">(laisser vide pour ne pas changer)</small>
                            ";
        } else {
            // line 408
            yield "                                <span class=\"required\">*</span>
                            ";
        }
        // line 410
        yield "                        </label>
                        <div class=\"input-group\">
                            <span class=\"icon\">🔐</span>
                            <input type=\"password\"
                                   id=\"motDePasse\"
                                   name=\"motDePasse\"
                                   class=\"form-control\"
                                   placeholder=\"••••••••\"
                                   style=\"padding-right: 45px;\"
                                   autocomplete=\"new-password\">
                            <button type=\"button\" class=\"toggle-pw\" onclick=\"togglePassword('motDePasse', this)\" title=\"Afficher / Masquer\">👁️</button>
                        </div>
                        <div class=\"password-strength\" id=\"pw-strength\" style=\"display:none\">
                            <div class=\"strength-bar\"><div class=\"strength-fill\" id=\"pw-fill\"></div></div>
                            <span class=\"strength-text\" id=\"pw-text\"></span>
                        </div>
                        <div id=\"mdp-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"confirm_password\">🔒 CONFIRMER</label>
                        <div class=\"input-group\">
                            <span class=\"icon\">🔐</span>
                            <input type=\"password\"
                                   id=\"confirm_password\"
                                   name=\"confirm_password\"
                                   class=\"form-control\"
                                   placeholder=\"••••••••\"
                                   style=\"padding-right: 45px;\"
                                   autocomplete=\"new-password\">
                            <button type=\"button\" class=\"toggle-pw\" onclick=\"togglePassword('confirm_password', this)\" title=\"Afficher / Masquer\">👁️</button>
                        </div>
                        <div id=\"confirm-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>
            </div>

            ";
        // line 450
        yield "            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"region\">📍 GOUVERNORAT</label>
                        <div class=\"input-group\">
                            <span class=\"icon\">📍</span>
                            <select id=\"region\" name=\"region\" class=\"form-select\">
                                <option value=\"\">Sélectionnez votre gouvernorat</option>
                                ";
        // line 458
        $context["gouvernorats"] = ["Tunis", "Ariana", "Ben Arous", "Manouba", "Nabeul", "Zaghouan", "Bizerte", "Béja", "Jendouba", "Le Kef", "Siliana", "Sousse", "Monastir", "Mahdia", "Sfax", "Kairouan", "Kasserine", "Sidi Bouzid", "Gabès", "Médenine", "Tataouine", "Gafsa", "Tozeur", "Kébili"];
        // line 459
        yield "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["gouvernorats"]) || array_key_exists("gouvernorats", $context) ? $context["gouvernorats"] : (function () { throw new RuntimeError('Variable "gouvernorats" does not exist.', 459, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["gov"]) {
            // line 460
            yield "                                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["gov"], "html", null, true);
            yield "\" ";
            if (((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 460, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 460, $this->source); })()), "region", [], "any", false, false, false, 460) == $context["gov"]))) {
                yield "selected";
            }
            yield ">
                                        ";
            // line 461
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["gov"], "html", null, true);
            yield "
                                    </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['gov'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 464
        yield "                            </select>
                        </div>
                        <div id=\"region-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>
            </div>

            ";
        // line 472
        yield "            <div class=\"form-group\">
                <label for=\"dateNaissance\">🎂 DATE DE NAISSANCE</label>
                <div class=\"input-group\">
                    <span class=\"icon\">🎂</span>
                    <input type=\"date\"
                           id=\"dateNaissance\"
                           name=\"dateNaissance\"
                           class=\"form-control\"
                           value=\"";
        // line 480
        yield ((((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 480, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 480, $this->source); })()), "dateNaissance", [], "any", false, false, false, 480))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 480, $this->source); })()), "dateNaissance", [], "any", false, false, false, 480), "Y-m-d"), "html", null, true)) : (""));
        yield "\"
                           max=\"";
        // line 481
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "\">
                </div>
                <div id=\"date-msg\" class=\"field-message hidden\"></div>
            </div>

            ";
        // line 487
        yield "            <div class=\"form-group\">
                <label>🖼️ PHOTO DE PROFIL / AVATAR</label>
                
                ";
        // line 491
        yield "                <div class=\"avatar-preview\" id=\"avatarPreviewContainer\">
                    ";
        // line 492
        if (((isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 492, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 492, $this->source); })()), "photo", [], "any", false, false, false, 492))) {
            // line 493
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 493, $this->source); })()), "photo", [], "any", false, false, false, 493), "html", null, true);
            yield "\" id=\"avatarPreviewImg\">
                    ";
        } else {
            // line 495
            yield "                        <img src=\"https://ui-avatars.com/api/?name=";
            yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 495, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 495, $this->source); })()), "nom", [], "any", false, false, false, 495)), "html", null, true)) : ("User"));
            yield "&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\" id=\"avatarPreviewImg\">
                    ";
        }
        // line 497
        yield "                </div>

                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <label class=\"small text-muted\">📁 Télécharger une photo</label>
                        <input type=\"file\"
                               id=\"photo\"
                               name=\"photo\"
                               class=\"form-control\"
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <div id=\"photo-msg\" class=\"field-message hidden\"></div>
                        <div class=\"photo-preview\" id=\"photo-preview\">
                            <img id=\"photo-thumb\" src=\"#\" alt=\"Aperçu\">
                            <p id=\"photo-info\"></p>
                        </div>
                        <small style=\"color:#aaa;font-size:12px;display:block\">Formats : JPG, PNG, GIF, WEBP — Max 2 Mo</small>
                    </div>
                    <div class=\"col-md-6\">
                        <label class=\"small text-muted\">🎨 Choisir un avatar</label>
                        <button type=\"button\" class=\"btn btn-outline-secondary w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                            🎨 Choisir un avatar
                        </button>
                    </div>
                </div>
                <input type=\"hidden\" name=\"avatar_url\" id=\"avatarUrlInput\" value=\"";
        // line 521
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "photo", [], "any", true, true, false, 521) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 521, $this->source); })()), "photo", [], "any", false, false, false, 521)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 521, $this->source); })()), "photo", [], "any", false, false, false, 521), "html", null, true)) : (""));
        yield "\">
            </div>

            <button type=\"submit\" class=\"btn-submit\" id=\"submitBtn\">
                ✨ ENREGISTRER ✨
            </button>

            <a href=\"";
        // line 528
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn-cancel\">
                ⬅️ ANNULER
            </a>

        </form>
    </div>
</div>

";
        // line 537
        yield "<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Choisissez votre avatar</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\" id=\"avatar-list\">
                    <div class=\"text-center\">Chargement...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* =========================================================
   UTILITAIRES (validation, etc.)
   ========================================================= */
const isEdit = ";
        // line 557
        yield (((($tmp = (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 557, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
        yield ";

function showMsg(id, type, text) {
    const el = document.getElementById(id);
    if (!el) return;
    el.className = 'field-message ' + type;
    el.innerHTML = (type === 'error' ? '⚠️ ' : '✅ ') + text;
}

function clearMsg(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.className = 'field-message hidden';
    el.innerHTML = '';
}

function setValid(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-invalid');
    el.classList.add('is-valid');
}

function setInvalid(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-valid');
    el.classList.add('is-invalid');
}

function resetState(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-valid', 'is-invalid');
}

/* Afficher / masquer mot de passe */
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = '🙈';
    } else {
        input.type = 'password';
        btn.textContent = '👁️';
    }
}

/* =========================================================
   VALIDATION NOM
   ========================================================= */
const nomInput = document.getElementById('nom');
const nomCounter = document.getElementById('nom-counter');

function validateNom() {
    const val = nomInput.value.trim();
    const len = nomInput.value.length;
    nomCounter.textContent = len + ' / 80';
    nomCounter.classList.toggle('warn', len > 70);

    if (val.length === 0) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom est obligatoire.');
        return false;
    }
    if (val.length < 2) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom doit contenir au moins 2 caractères.');
        return false;
    }
    if (!/^[a-zA-ZÀ-ÿ\\s'\\-]+\$/.test(val)) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom ne doit contenir que des lettres, espaces ou tirets.');
        return false;
    }
    setValid('nom');
    showMsg('nom-msg', 'success', 'Nom valide.');
    return true;
}

nomInput.addEventListener('input', () => {
    nomCounter.textContent = nomInput.value.length + ' / 80';
    if (nomInput.value.length > 0) validateNom();
    else { resetState('nom'); clearMsg('nom-msg'); }
});
nomInput.addEventListener('blur', validateNom);

/* =========================================================
   VALIDATION EMAIL
   ========================================================= */
const emailInput = document.getElementById('email');

function validateEmail() {
    const val = emailInput.value.trim();
    const regex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]{2,}\$/;

    if (val.length === 0) {
        setInvalid('email');
        showMsg('email-msg', 'error', 'L\\'adresse email est obligatoire.');
        return false;
    }
    if (!regex.test(val)) {
        setInvalid('email');
        showMsg('email-msg', 'error', 'Format invalide. Exemple : utilisateur@domaine.tn');
        return false;
    }
    setValid('email');
    showMsg('email-msg', 'success', 'Adresse email valide.');
    return true;
}

emailInput.addEventListener('input', () => {
    if (emailInput.value.length > 0) validateEmail();
    else { resetState('email'); clearMsg('email-msg'); }
});
emailInput.addEventListener('blur', validateEmail);

/* =========================================================
   VALIDATION MOT DE PASSE + FORCE
   ========================================================= */
const mdpInput    = document.getElementById('motDePasse');
const pwStrength  = document.getElementById('pw-strength');
const pwFill      = document.getElementById('pw-fill');
const pwText      = document.getElementById('pw-text');

function getPasswordStrength(pw) {
    let score = 0;
    if (pw.length >= 8)  score++;
    if (pw.length >= 12) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    return score;
}

function validatePassword() {
    const val = mdpInput.value;

    if (isEdit && val.length === 0) {
        resetState('motDePasse');
        clearMsg('mdp-msg');
        pwStrength.style.display = 'none';
        return true;
    }

    if (val.length === 0) {
        setInvalid('motDePasse');
        showMsg('mdp-msg', 'error', 'Le mot de passe est obligatoire.');
        pwStrength.style.display = 'none';
        return false;
    }

    pwStrength.style.display = 'block';
    const score = getPasswordStrength(val);
    const levels = [
        { pct: '20%', color: '#FF6B6B', label: 'Très faible' },
        { pct: '40%', color: '#FF8E53', label: 'Faible' },
        { pct: '60%', color: '#FFD700', label: 'Moyen' },
        { pct: '80%', color: '#90EE90', label: 'Fort' },
        { pct: '100%', color: '#28a745', label: 'Très fort' },
    ];
    const lvl = levels[Math.min(score - 1, 4)] || levels[0];
    pwFill.style.width    = lvl.pct;
    pwFill.style.background = lvl.color;
    pwText.textContent    = lvl.label;
    pwText.style.color    = lvl.color;

    if (val.length < 8) {
        setInvalid('motDePasse');
        showMsg('mdp-msg', 'error', 'Le mot de passe doit contenir au moins 8 caractères.');
        return false;
    }

    setValid('motDePasse');
    showMsg('mdp-msg', 'success', 'Mot de passe accepté.');
    if (confirmInput.value.length > 0) validateConfirm();
    return true;
}

mdpInput.addEventListener('input', validatePassword);
mdpInput.addEventListener('blur', validatePassword);

/* =========================================================
   VALIDATION CONFIRMATION
   ========================================================= */
const confirmInput = document.getElementById('confirm_password');

function validateConfirm() {
    const pw      = mdpInput.value;
    const confirm = confirmInput.value;

    if (isEdit && pw.length === 0 && confirm.length === 0) {
        resetState('confirm_password');
        clearMsg('confirm-msg');
        return true;
    }

    if (confirm.length === 0) {
        if (pw.length > 0) {
            setInvalid('confirm_password');
            showMsg('confirm-msg', 'error', 'Veuillez confirmer votre mot de passe.');
            return false;
        }
        resetState('confirm_password');
        clearMsg('confirm-msg');
        return true;
    }

    if (pw !== confirm) {
        setInvalid('confirm_password');
        showMsg('confirm-msg', 'error', 'Les mots de passe ne correspondent pas.');
        return false;
    }

    setValid('confirm_password');
    showMsg('confirm-msg', 'success', 'Les mots de passe correspondent.');
    return true;
}

confirmInput.addEventListener('input', validateConfirm);
confirmInput.addEventListener('blur', validateConfirm);

/* =========================================================
   VALIDATION DATE DE NAISSANCE
   ========================================================= */
const dateInput = document.getElementById('dateNaissance');

function validateDate() {
    const val = dateInput.value;
    if (val === '') {
        resetState('dateNaissance');
        clearMsg('date-msg');
        return true;
    }

    const birth    = new Date(val);
    const today    = new Date();
    const minDate  = new Date('1900-01-01');

    if (birth > today) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'La date de naissance ne peut pas être dans le futur.');
        return false;
    }
    if (birth < minDate) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'Date invalide (avant 1900).');
        return false;
    }

    let age = today.getFullYear() - birth.getFullYear();
    const m = today.getMonth() - birth.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;

    if (age < 13) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'Vous devez avoir au moins 13 ans pour vous inscrire.');
        return false;
    }

    setValid('dateNaissance');
    showMsg('date-msg', 'success', 'Âge : ' + age + ' ans.');
    return true;
}

dateInput.addEventListener('change', validateDate);
dateInput.addEventListener('blur', validateDate);

/* =========================================================
   VALIDATION PHOTO (upload)
   ========================================================= */
const photoInput   = document.getElementById('photo');
const photoPreview = document.getElementById('photo-preview');
const photoThumb   = document.getElementById('photo-thumb');
const photoInfo    = document.getElementById('photo-info');

const ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
const MAX_SIZE_MB   = 2;
const MAX_SIZE_BYTES = MAX_SIZE_MB * 1024 * 1024;

function validatePhoto() {
    const file = photoInput.files[0];
    const avatarUrl = document.getElementById('avatarUrlInput').value;

    if (!file && !avatarUrl) {
        resetState('photo');
        clearMsg('photo-msg');
        photoPreview.style.display = 'none';
        return true; // pas d'erreur, car avatar peut être choisi
    }

    if (file) {
        if (!ALLOWED_TYPES.includes(file.type)) {
            setInvalid('photo');
            showMsg('photo-msg', 'error', 'Format non accepté. Utilisez JPG, PNG, GIF ou WEBP.');
            photoPreview.style.display = 'none';
            return false;
        }
        if (file.size > MAX_SIZE_BYTES) {
            setInvalid('photo');
            const sizeMb = (file.size / 1024 / 1024).toFixed(2);
            showMsg('photo-msg', 'error', 'Fichier trop lourd (' + sizeMb + ' Mo). Maximum : 2 Mo.');
            photoPreview.style.display = 'none';
            return false;
        }
        const reader = new FileReader();
        reader.onload = (e) => {
            photoThumb.src = e.target.result;
            photoInfo.textContent = file.name + ' — ' + (file.size / 1024).toFixed(0) + ' Ko';
            photoPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
        setValid('photo');
        showMsg('photo-msg', 'success', 'Photo valide.');
        return true;
    }
    // Pas de fichier, mais avatar déjà renseigné (c'est ok)
    setValid('photo');
    showMsg('photo-msg', 'success', 'Avatar sélectionné.');
    return true;
}

photoInput.addEventListener('change', validatePhoto);

/* =========================================================
   GESTION DES AVATARS (modale)
   ========================================================= */
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreviewImg = document.getElementById('avatarPreviewImg');
    const avatarUrlInput = document.getElementById('avatarUrlInput');
    const photoField = document.getElementById('photo');

    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
        avatarList.innerHTML = '';
        styles.forEach(style => {
            for (let i = 0; i < 6; i++) {
                const seed = Math.random().toString(36).substring(7);
                const url = `https://api.dicebear.com/9.x/\${style}/svg?seed=\${seed}&size=80`;
                const col = document.createElement('div');
                col.className = 'col-2 mb-3 text-center';
                col.innerHTML = `<img src=\"\${url}\" style=\"width: 70px; height: 70px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;\" class=\"avatar-option\" data-url=\"\${url}\">`;
                avatarList.appendChild(col);
            }
        });
    }

    loadAvatars();

    avatarList.addEventListener('click', (e) => {
        const img = e.target.closest('.avatar-option');
        if (img) {
            const url = img.getAttribute('data-url');
            // Mettre à jour l'aperçu
            avatarPreviewImg.src = url;
            // Stocker l'URL dans le champ caché
            avatarUrlInput.value = url;
            // Vider l'input file (priorité à l'avatar si les deux sont fournis)
            if (photoField) photoField.value = '';
            // Cacher l'aperçu de la photo uploadée
            if (photoPreview) photoPreview.style.display = 'none';
            // Fermer la modale
            const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
            modal.hide();
            // Mettre à jour la validation de la photo
            validatePhoto();
        }
    });
});

/* =========================================================
   SOUMISSION DU FORMULAIRE
   ========================================================= */
document.getElementById('profileForm').addEventListener('submit', function (e) {
    const nomOk     = validateNom();
    const emailOk   = validateEmail();
    const mdpOk     = validatePassword();
    const confirmOk = validateConfirm();
    const dateOk    = validateDate();
    const photoOk   = validatePhoto();

    if (!nomOk || !emailOk || !mdpOk || !confirmOk || !dateOk || !photoOk) {
        e.preventDefault();
        const firstError = document.querySelector('.is-invalid');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstError.focus();
        }
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
        return "utilisateur/form.html.twig";
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
        return array (  757 => 557,  735 => 537,  724 => 528,  714 => 521,  688 => 497,  682 => 495,  676 => 493,  674 => 492,  671 => 491,  666 => 487,  658 => 481,  654 => 480,  644 => 472,  635 => 464,  626 => 461,  617 => 460,  612 => 459,  610 => 458,  600 => 450,  559 => 410,  555 => 408,  551 => 406,  549 => 405,  542 => 400,  532 => 392,  522 => 384,  508 => 372,  496 => 362,  493 => 360,  489 => 358,  483 => 356,  481 => 355,  478 => 354,  469 => 352,  465 => 351,  462 => 350,  453 => 348,  449 => 347,  442 => 343,  437 => 340,  427 => 339,  87 => 6,  77 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ titre }} | Koul Dyeri{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .form-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .form-card {
        background: white;
        border-radius: 40px;
        padding: 40px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 0.7s ease-out;
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0e6d6;
    }

    .form-header h2 {
        font-size: 28px;
        font-weight: 700;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 5px;
    }

    .form-header p {
        color: #666;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group label .required {
        color: #FF6B6B;
        margin-left: 3px;
    }

    .input-group {
        position: relative;
    }

    .input-group .icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        font-size: 14px;
        background: #fefcf8;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-select {
        cursor: pointer;
        appearance: none;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #FF6B6B;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15);
    }

    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #28a745;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2328a745' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
    }

    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #FF6B6B;
        background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23FF6B6B' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='8' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'%3E%3C/line%3E%3C/svg%3E\");
        background-repeat: no-repeat;
        background-position: right 15px center;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.12);
    }

    .field-message {
        font-size: 12px;
        margin-top: 6px;
        padding-left: 4px;
        min-height: 18px;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }

    .field-message.error {
        color: #FF6B6B;
    }

    .field-message.success {
        color: #28a745;
    }

    .field-message.hidden {
        visibility: hidden;
    }

    .password-strength {
        margin-top: 8px;
    }

    .strength-bar {
        height: 4px;
        border-radius: 2px;
        background: #f0e6d6;
        overflow: hidden;
        margin-bottom: 5px;
    }

    .strength-fill {
        height: 100%;
        border-radius: 2px;
        transition: width 0.3s ease, background 0.3s ease;
        width: 0%;
    }

    .strength-text {
        font-size: 11px;
        color: #999;
    }

    .toggle-pw {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #aaa;
        padding: 0;
        line-height: 1;
    }

    .toggle-pw:hover {
        color: #FF6B6B;
    }

    .char-counter {
        font-size: 11px;
        color: #bbb;
        text-align: right;
        margin-top: 4px;
    }

    .char-counter.warn {
        color: #FF6B6B;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 15px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
    }

    .btn-submit:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .btn-cancel {
        width: 100%;
        padding: 12px;
        background: transparent;
        color: #666;
        border: 2px solid #f0e6d6;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-cancel:hover {
        background: #f0e6d6;
        color: #333;
    }

    .row {
        display: flex;
        gap: 15px;
    }

    .col {
        flex: 1;
    }

    .alert {
        padding: 12px 15px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 13px;
        animation: shake 0.5s ease;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #fff0f0;
        color: #FF6B6B;
        border: 1px solid #ffd4d4;
    }

    /* Aperçu photo/avatar */
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #f0e6d6;
        background: #f8f9fa;
        margin-bottom: 15px;
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-option {
        transition: transform 0.2s, border 0.2s;
        cursor: pointer;
    }
    .avatar-option:hover {
        transform: scale(1.1);
        border-color: #FF6B6B !important;
    }

    .photo-preview {
        margin-top: 10px;
        display: none;
    }

    .photo-preview img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #FF6B6B;
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }

    .photo-preview p {
        font-size: 11px;
        color: #999;
        margin-top: 5px;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @media (max-width: 600px) {
        .row { flex-direction: column; gap: 0; }
        .form-card { padding: 30px 25px; }
        .form-header h2 { font-size: 24px; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"form-container\">
    <div class=\"form-card\">
        <div class=\"form-header\">
            <h2>{{ titre }}</h2>
            <p>Veuillez remplir les informations ci-dessous</p>
        </div>

        {% for message in app.flashes('success') %}
            <div class=\"alert alert-success\">✅ {{ message }}</div>
        {% endfor %}

        {% for message in app.flashes('error') %}
            <div class=\"alert alert-danger\">❌ {{ message }}</div>
        {% endfor %}

        {% if utilisateur %}
            <form id=\"profileForm\" method=\"post\" action=\"/utilisateur/{{ utilisateur.idUtilisateur }}/update\" enctype=\"multipart/form-data\" novalidate>
        {% else %}
            <form id=\"profileForm\" method=\"post\" action=\"/utilisateur/create\" enctype=\"multipart/form-data\" novalidate>
        {% endif %}

            {# ── NOM ── #}
            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"nom\">👤 NOM <span class=\"required\">*</span></label>
                        <div class=\"input-group\">
                            <span class=\"icon\">👤</span>
                            <input type=\"text\"
                                   id=\"nom\"
                                   name=\"nom\"
                                   class=\"form-control\"
                                   value=\"{{ utilisateur ? utilisateur.nom : '' }}\"
                                   placeholder=\"Votre nom complet\"
                                   maxlength=\"80\"
                                   autocomplete=\"name\">
                        </div>
                        <div id=\"nom-msg\" class=\"field-message hidden\"></div>
                        <div class=\"char-counter\" id=\"nom-counter\">0 / 80</div>
                    </div>
                </div>
            </div>

            {# ── EMAIL ── #}
            <div class=\"form-group\">
                <label for=\"email\">📧 EMAIL <span class=\"required\">*</span></label>
                <div class=\"input-group\">
                    <span class=\"icon\">✉️</span>
                    <input type=\"email\"
                           id=\"email\"
                           name=\"email\"
                           class=\"form-control\"
                           value=\"{{ utilisateur ? utilisateur.email : '' }}\"
                           placeholder=\"exemple@email.com\"
                           autocomplete=\"email\">
                </div>
                <div id=\"email-msg\" class=\"field-message hidden\"></div>
            </div>

            {# ── MOT DE PASSE ── #}
            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"motDePasse\">
                            🔒 MOT DE PASSE
                            {% if utilisateur %}
                                <small style=\"font-weight:400;text-transform:none;color:#999\">(laisser vide pour ne pas changer)</small>
                            {% else %}
                                <span class=\"required\">*</span>
                            {% endif %}
                        </label>
                        <div class=\"input-group\">
                            <span class=\"icon\">🔐</span>
                            <input type=\"password\"
                                   id=\"motDePasse\"
                                   name=\"motDePasse\"
                                   class=\"form-control\"
                                   placeholder=\"••••••••\"
                                   style=\"padding-right: 45px;\"
                                   autocomplete=\"new-password\">
                            <button type=\"button\" class=\"toggle-pw\" onclick=\"togglePassword('motDePasse', this)\" title=\"Afficher / Masquer\">👁️</button>
                        </div>
                        <div class=\"password-strength\" id=\"pw-strength\" style=\"display:none\">
                            <div class=\"strength-bar\"><div class=\"strength-fill\" id=\"pw-fill\"></div></div>
                            <span class=\"strength-text\" id=\"pw-text\"></span>
                        </div>
                        <div id=\"mdp-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"confirm_password\">🔒 CONFIRMER</label>
                        <div class=\"input-group\">
                            <span class=\"icon\">🔐</span>
                            <input type=\"password\"
                                   id=\"confirm_password\"
                                   name=\"confirm_password\"
                                   class=\"form-control\"
                                   placeholder=\"••••••••\"
                                   style=\"padding-right: 45px;\"
                                   autocomplete=\"new-password\">
                            <button type=\"button\" class=\"toggle-pw\" onclick=\"togglePassword('confirm_password', this)\" title=\"Afficher / Masquer\">👁️</button>
                        </div>
                        <div id=\"confirm-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>
            </div>

            {# ── GOUVERNORAT ── #}
            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label for=\"region\">📍 GOUVERNORAT</label>
                        <div class=\"input-group\">
                            <span class=\"icon\">📍</span>
                            <select id=\"region\" name=\"region\" class=\"form-select\">
                                <option value=\"\">Sélectionnez votre gouvernorat</option>
                                {% set gouvernorats = ['Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan', 'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse', 'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid', 'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'] %}
                                {% for gov in gouvernorats %}
                                    <option value=\"{{ gov }}\" {% if utilisateur and utilisateur.region == gov %}selected{% endif %}>
                                        {{ gov }}
                                    </option>
                                {% endfor %}
                            </select>
                        </div>
                        <div id=\"region-msg\" class=\"field-message hidden\"></div>
                    </div>
                </div>
            </div>

            {# ── DATE DE NAISSANCE ── #}
            <div class=\"form-group\">
                <label for=\"dateNaissance\">🎂 DATE DE NAISSANCE</label>
                <div class=\"input-group\">
                    <span class=\"icon\">🎂</span>
                    <input type=\"date\"
                           id=\"dateNaissance\"
                           name=\"dateNaissance\"
                           class=\"form-control\"
                           value=\"{{ utilisateur and utilisateur.dateNaissance ? utilisateur.dateNaissance|date('Y-m-d') : '' }}\"
                           max=\"{{ 'now'|date('Y-m-d') }}\">
                </div>
                <div id=\"date-msg\" class=\"field-message hidden\"></div>
            </div>

            {# ── PHOTO DE PROFIL / AVATAR (les deux options) ── #}
            <div class=\"form-group\">
                <label>🖼️ PHOTO DE PROFIL / AVATAR</label>
                
                {# Aperçu commun #}
                <div class=\"avatar-preview\" id=\"avatarPreviewContainer\">
                    {% if utilisateur and utilisateur.photo %}
                        <img src=\"{{ utilisateur.photo }}\" id=\"avatarPreviewImg\">
                    {% else %}
                        <img src=\"https://ui-avatars.com/api/?name={{ utilisateur ? utilisateur.nom|url_encode : 'User' }}&background=FF6B6B&color=fff&bold=true&length=2&rounded=true\" id=\"avatarPreviewImg\">
                    {% endif %}
                </div>

                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <label class=\"small text-muted\">📁 Télécharger une photo</label>
                        <input type=\"file\"
                               id=\"photo\"
                               name=\"photo\"
                               class=\"form-control\"
                               accept=\"image/jpeg,image/png,image/jpg,image/gif,image/webp\">
                        <div id=\"photo-msg\" class=\"field-message hidden\"></div>
                        <div class=\"photo-preview\" id=\"photo-preview\">
                            <img id=\"photo-thumb\" src=\"#\" alt=\"Aperçu\">
                            <p id=\"photo-info\"></p>
                        </div>
                        <small style=\"color:#aaa;font-size:12px;display:block\">Formats : JPG, PNG, GIF, WEBP — Max 2 Mo</small>
                    </div>
                    <div class=\"col-md-6\">
                        <label class=\"small text-muted\">🎨 Choisir un avatar</label>
                        <button type=\"button\" class=\"btn btn-outline-secondary w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#avatarModal\">
                            🎨 Choisir un avatar
                        </button>
                    </div>
                </div>
                <input type=\"hidden\" name=\"avatar_url\" id=\"avatarUrlInput\" value=\"{{ utilisateur.photo ?? '' }}\">
            </div>

            <button type=\"submit\" class=\"btn-submit\" id=\"submitBtn\">
                ✨ ENREGISTRER ✨
            </button>

            <a href=\"{{ path('app_home') }}\" class=\"btn-cancel\">
                ⬅️ ANNULER
            </a>

        </form>
    </div>
</div>

{# MODALE DE SÉLECTION D'AVATARS #}
<div class=\"modal fade\" id=\"avatarModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Choisissez votre avatar</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\" id=\"avatar-list\">
                    <div class=\"text-center\">Chargement...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* =========================================================
   UTILITAIRES (validation, etc.)
   ========================================================= */
const isEdit = {{ utilisateur ? 'true' : 'false' }};

function showMsg(id, type, text) {
    const el = document.getElementById(id);
    if (!el) return;
    el.className = 'field-message ' + type;
    el.innerHTML = (type === 'error' ? '⚠️ ' : '✅ ') + text;
}

function clearMsg(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.className = 'field-message hidden';
    el.innerHTML = '';
}

function setValid(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-invalid');
    el.classList.add('is-valid');
}

function setInvalid(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-valid');
    el.classList.add('is-invalid');
}

function resetState(inputId) {
    const el = document.getElementById(inputId);
    if (!el) return;
    el.classList.remove('is-valid', 'is-invalid');
}

/* Afficher / masquer mot de passe */
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = '🙈';
    } else {
        input.type = 'password';
        btn.textContent = '👁️';
    }
}

/* =========================================================
   VALIDATION NOM
   ========================================================= */
const nomInput = document.getElementById('nom');
const nomCounter = document.getElementById('nom-counter');

function validateNom() {
    const val = nomInput.value.trim();
    const len = nomInput.value.length;
    nomCounter.textContent = len + ' / 80';
    nomCounter.classList.toggle('warn', len > 70);

    if (val.length === 0) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom est obligatoire.');
        return false;
    }
    if (val.length < 2) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom doit contenir au moins 2 caractères.');
        return false;
    }
    if (!/^[a-zA-ZÀ-ÿ\\s'\\-]+\$/.test(val)) {
        setInvalid('nom');
        showMsg('nom-msg', 'error', 'Le nom ne doit contenir que des lettres, espaces ou tirets.');
        return false;
    }
    setValid('nom');
    showMsg('nom-msg', 'success', 'Nom valide.');
    return true;
}

nomInput.addEventListener('input', () => {
    nomCounter.textContent = nomInput.value.length + ' / 80';
    if (nomInput.value.length > 0) validateNom();
    else { resetState('nom'); clearMsg('nom-msg'); }
});
nomInput.addEventListener('blur', validateNom);

/* =========================================================
   VALIDATION EMAIL
   ========================================================= */
const emailInput = document.getElementById('email');

function validateEmail() {
    const val = emailInput.value.trim();
    const regex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]{2,}\$/;

    if (val.length === 0) {
        setInvalid('email');
        showMsg('email-msg', 'error', 'L\\'adresse email est obligatoire.');
        return false;
    }
    if (!regex.test(val)) {
        setInvalid('email');
        showMsg('email-msg', 'error', 'Format invalide. Exemple : utilisateur@domaine.tn');
        return false;
    }
    setValid('email');
    showMsg('email-msg', 'success', 'Adresse email valide.');
    return true;
}

emailInput.addEventListener('input', () => {
    if (emailInput.value.length > 0) validateEmail();
    else { resetState('email'); clearMsg('email-msg'); }
});
emailInput.addEventListener('blur', validateEmail);

/* =========================================================
   VALIDATION MOT DE PASSE + FORCE
   ========================================================= */
const mdpInput    = document.getElementById('motDePasse');
const pwStrength  = document.getElementById('pw-strength');
const pwFill      = document.getElementById('pw-fill');
const pwText      = document.getElementById('pw-text');

function getPasswordStrength(pw) {
    let score = 0;
    if (pw.length >= 8)  score++;
    if (pw.length >= 12) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    return score;
}

function validatePassword() {
    const val = mdpInput.value;

    if (isEdit && val.length === 0) {
        resetState('motDePasse');
        clearMsg('mdp-msg');
        pwStrength.style.display = 'none';
        return true;
    }

    if (val.length === 0) {
        setInvalid('motDePasse');
        showMsg('mdp-msg', 'error', 'Le mot de passe est obligatoire.');
        pwStrength.style.display = 'none';
        return false;
    }

    pwStrength.style.display = 'block';
    const score = getPasswordStrength(val);
    const levels = [
        { pct: '20%', color: '#FF6B6B', label: 'Très faible' },
        { pct: '40%', color: '#FF8E53', label: 'Faible' },
        { pct: '60%', color: '#FFD700', label: 'Moyen' },
        { pct: '80%', color: '#90EE90', label: 'Fort' },
        { pct: '100%', color: '#28a745', label: 'Très fort' },
    ];
    const lvl = levels[Math.min(score - 1, 4)] || levels[0];
    pwFill.style.width    = lvl.pct;
    pwFill.style.background = lvl.color;
    pwText.textContent    = lvl.label;
    pwText.style.color    = lvl.color;

    if (val.length < 8) {
        setInvalid('motDePasse');
        showMsg('mdp-msg', 'error', 'Le mot de passe doit contenir au moins 8 caractères.');
        return false;
    }

    setValid('motDePasse');
    showMsg('mdp-msg', 'success', 'Mot de passe accepté.');
    if (confirmInput.value.length > 0) validateConfirm();
    return true;
}

mdpInput.addEventListener('input', validatePassword);
mdpInput.addEventListener('blur', validatePassword);

/* =========================================================
   VALIDATION CONFIRMATION
   ========================================================= */
const confirmInput = document.getElementById('confirm_password');

function validateConfirm() {
    const pw      = mdpInput.value;
    const confirm = confirmInput.value;

    if (isEdit && pw.length === 0 && confirm.length === 0) {
        resetState('confirm_password');
        clearMsg('confirm-msg');
        return true;
    }

    if (confirm.length === 0) {
        if (pw.length > 0) {
            setInvalid('confirm_password');
            showMsg('confirm-msg', 'error', 'Veuillez confirmer votre mot de passe.');
            return false;
        }
        resetState('confirm_password');
        clearMsg('confirm-msg');
        return true;
    }

    if (pw !== confirm) {
        setInvalid('confirm_password');
        showMsg('confirm-msg', 'error', 'Les mots de passe ne correspondent pas.');
        return false;
    }

    setValid('confirm_password');
    showMsg('confirm-msg', 'success', 'Les mots de passe correspondent.');
    return true;
}

confirmInput.addEventListener('input', validateConfirm);
confirmInput.addEventListener('blur', validateConfirm);

/* =========================================================
   VALIDATION DATE DE NAISSANCE
   ========================================================= */
const dateInput = document.getElementById('dateNaissance');

function validateDate() {
    const val = dateInput.value;
    if (val === '') {
        resetState('dateNaissance');
        clearMsg('date-msg');
        return true;
    }

    const birth    = new Date(val);
    const today    = new Date();
    const minDate  = new Date('1900-01-01');

    if (birth > today) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'La date de naissance ne peut pas être dans le futur.');
        return false;
    }
    if (birth < minDate) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'Date invalide (avant 1900).');
        return false;
    }

    let age = today.getFullYear() - birth.getFullYear();
    const m = today.getMonth() - birth.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;

    if (age < 13) {
        setInvalid('dateNaissance');
        showMsg('date-msg', 'error', 'Vous devez avoir au moins 13 ans pour vous inscrire.');
        return false;
    }

    setValid('dateNaissance');
    showMsg('date-msg', 'success', 'Âge : ' + age + ' ans.');
    return true;
}

dateInput.addEventListener('change', validateDate);
dateInput.addEventListener('blur', validateDate);

/* =========================================================
   VALIDATION PHOTO (upload)
   ========================================================= */
const photoInput   = document.getElementById('photo');
const photoPreview = document.getElementById('photo-preview');
const photoThumb   = document.getElementById('photo-thumb');
const photoInfo    = document.getElementById('photo-info');

const ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
const MAX_SIZE_MB   = 2;
const MAX_SIZE_BYTES = MAX_SIZE_MB * 1024 * 1024;

function validatePhoto() {
    const file = photoInput.files[0];
    const avatarUrl = document.getElementById('avatarUrlInput').value;

    if (!file && !avatarUrl) {
        resetState('photo');
        clearMsg('photo-msg');
        photoPreview.style.display = 'none';
        return true; // pas d'erreur, car avatar peut être choisi
    }

    if (file) {
        if (!ALLOWED_TYPES.includes(file.type)) {
            setInvalid('photo');
            showMsg('photo-msg', 'error', 'Format non accepté. Utilisez JPG, PNG, GIF ou WEBP.');
            photoPreview.style.display = 'none';
            return false;
        }
        if (file.size > MAX_SIZE_BYTES) {
            setInvalid('photo');
            const sizeMb = (file.size / 1024 / 1024).toFixed(2);
            showMsg('photo-msg', 'error', 'Fichier trop lourd (' + sizeMb + ' Mo). Maximum : 2 Mo.');
            photoPreview.style.display = 'none';
            return false;
        }
        const reader = new FileReader();
        reader.onload = (e) => {
            photoThumb.src = e.target.result;
            photoInfo.textContent = file.name + ' — ' + (file.size / 1024).toFixed(0) + ' Ko';
            photoPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
        setValid('photo');
        showMsg('photo-msg', 'success', 'Photo valide.');
        return true;
    }
    // Pas de fichier, mais avatar déjà renseigné (c'est ok)
    setValid('photo');
    showMsg('photo-msg', 'success', 'Avatar sélectionné.');
    return true;
}

photoInput.addEventListener('change', validatePhoto);

/* =========================================================
   GESTION DES AVATARS (modale)
   ========================================================= */
document.addEventListener('DOMContentLoaded', function() {
    const avatarList = document.getElementById('avatar-list');
    const avatarPreviewImg = document.getElementById('avatarPreviewImg');
    const avatarUrlInput = document.getElementById('avatarUrlInput');
    const photoField = document.getElementById('photo');

    const styles = ['adventurer', 'avataaars', 'bottts', 'identicon', 'micah', 'open-peeps', 'pixel-art'];

    function loadAvatars() {
        avatarList.innerHTML = '';
        styles.forEach(style => {
            for (let i = 0; i < 6; i++) {
                const seed = Math.random().toString(36).substring(7);
                const url = `https://api.dicebear.com/9.x/\${style}/svg?seed=\${seed}&size=80`;
                const col = document.createElement('div');
                col.className = 'col-2 mb-3 text-center';
                col.innerHTML = `<img src=\"\${url}\" style=\"width: 70px; height: 70px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;\" class=\"avatar-option\" data-url=\"\${url}\">`;
                avatarList.appendChild(col);
            }
        });
    }

    loadAvatars();

    avatarList.addEventListener('click', (e) => {
        const img = e.target.closest('.avatar-option');
        if (img) {
            const url = img.getAttribute('data-url');
            // Mettre à jour l'aperçu
            avatarPreviewImg.src = url;
            // Stocker l'URL dans le champ caché
            avatarUrlInput.value = url;
            // Vider l'input file (priorité à l'avatar si les deux sont fournis)
            if (photoField) photoField.value = '';
            // Cacher l'aperçu de la photo uploadée
            if (photoPreview) photoPreview.style.display = 'none';
            // Fermer la modale
            const modal = bootstrap.Modal.getInstance(document.getElementById('avatarModal'));
            modal.hide();
            // Mettre à jour la validation de la photo
            validatePhoto();
        }
    });
});

/* =========================================================
   SOUMISSION DU FORMULAIRE
   ========================================================= */
document.getElementById('profileForm').addEventListener('submit', function (e) {
    const nomOk     = validateNom();
    const emailOk   = validateEmail();
    const mdpOk     = validatePassword();
    const confirmOk = validateConfirm();
    const dateOk    = validateDate();
    const photoOk   = validatePhoto();

    if (!nomOk || !emailOk || !mdpOk || !confirmOk || !dateOk || !photoOk) {
        e.preventDefault();
        const firstError = document.querySelector('.is-invalid');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstError.focus();
        }
    }
});
</script>
{% endblock %}", "utilisateur/form.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\form.html.twig");
    }
}

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

/* utilisateur/index_admin.html.twig */
class __TwigTemplate_18b614a738bd95d01b640ea0ea57ae36 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/index_admin.html.twig"));

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

        yield "Gestion des utilisateurs";
        
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
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>👥 Gestion des utilisateurs</h3>
        <div>
            <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_export_pdf");
        yield "\" id=\"exportPdfBtn\" class=\"btn btn-success me-2\">
                <i class=\"fas fa-file-pdf\"></i> Exporter PDF
            </a>
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_nouveau");
        yield "\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter un utilisateur
            </a>
        </div>
    </div>

    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "flashes", ["success"], "method", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 20
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        yield "
    <!-- Filtres avec chatbot -->
    <div style=\"background: #fefcf8; border-radius: 15px; padding: 20px; margin-bottom: 20px; border: 1px solid #f0e6d6;\">
        <div class=\"row g-3 align-items-end\">
            <div class=\"col-md-3\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🔍 Recherche (ID ou Nom)</label>
                <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"ID ou nom...\">
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">📧 Email</label>
                <input type=\"text\" id=\"searchEmail\" class=\"form-control\" placeholder=\"Email...\">
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">👤 Rôle</label>
                <select id=\"filterRole\" class=\"form-control\">
                    <option value=\"\">Tous</option>
                    <option value=\"admin\">Admin</option>
                    <option value=\"user\">User</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">📍 Région</label>
                <select id=\"filterRegion\" class=\"form-control\">
                    <option value=\"\">Toutes</option>
                    ";
        // line 46
        $context["regions"] = ["Tunis", "Ariana", "Ben Arous", "Manouba", "Nabeul", "Zaghouan", "Bizerte", "Béja", "Jendouba", "Le Kef", "Siliana", "Sousse", "Monastir", "Mahdia", "Sfax", "Kairouan", "Kasserine", "Sidi Bouzid", "Gabès", "Médenine", "Tataouine", "Gafsa", "Tozeur", "Kébili"];
        // line 47
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["regions"]) || array_key_exists("regions", $context) ? $context["regions"] : (function () { throw new RuntimeError('Variable "regions" does not exist.', 47, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 48
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["r"], "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["r"], "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "                </select>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🔃 Trier par</label>
                <select id=\"sortBy\" class=\"form-control\">
                    <option value=\"\">-- Trier --</option>
                    <option value=\"id-asc\">ID ↑</option>
                    <option value=\"id-desc\">ID ↓</option>
                    <option value=\"nom-asc\">Nom A→Z</option>
                    <option value=\"nom-desc\">Nom Z→A</option>
                    <option value=\"role-asc\">Rôle A→Z</option>
                    <option value=\"region-asc\">Région A→Z</option>
                    <option value=\"points-asc\">Points ↑</option>
                    <option value=\"points-desc\">Points ↓</option>
                </select>
            </div>
            <div class=\"col-md-1\">
                <button onclick=\"resetFilters()\" class=\"btn btn-secondary w-100\">↺</button>
            </div>
        </div>

        ";
        // line 72
        yield "        <div class=\"row mt-3\">
            <div class=\"col-md-10\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🤖 Assistant IA (langage naturel)</label>
                <div class=\"input-group\">
                    <input type=\"text\" id=\"chatSearchInput\" class=\"form-control\" placeholder=\"Ex: 'admins de Tunis', 'utilisateurs actifs avec plus de 50 points', 'trier par points décroissant'\">
                    <button class=\"btn btn-primary\" type=\"button\" id=\"chatSearchBtn\">
                        <i class=\"fas fa-robot\"></i> Chercher
                    </button>
                </div>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">&nbsp;</label>
                <button class=\"btn btn-outline-secondary w-100\" id=\"clearChatBtn\">
                    <i class=\"fas fa-eraser\"></i> Effacer
                </button>
            </div>
        </div>
        <div class=\"mt-2\">
            <small id=\"resultCount\" style=\"color: #666;\"></small>
        </div>
    </div>

    <!-- Tableau -->
    <div class=\"table-responsive\" style=\"border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.02);\">
        <table class=\"table table-hover align-middle mb-0\" id=\"usersTable\" style=\"border-collapse: separate; border-spacing: 0; width: 100%;\">
            <thead style=\"background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; border: none;\">
                <tr>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('id')\">ID <span id=\"sort-id\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('nom')\">Nom <span id=\"sort-nom\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Email</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('role')\">Rôle <span id=\"sort-role\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('region')\">Région <span id=\"sort-region\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Date naissance</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('points')\">⭐ Points <span id=\"sort-points\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Statut</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Actions</th>
                </tr>
            </thead>
            <tbody id=\"usersBody\">
                ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 111, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 112
            yield "                <tr
                    data-id=\"";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 113), "html", null, true);
            yield "\"
                    data-nom=\"";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 114)), "html", null, true);
            yield "\"
                    data-email=\"";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 115)), "html", null, true);
            yield "\"
                    data-role=\"";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 116), "html", null, true);
            yield "\"
                    data-region=\"";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 117)), "html", null, true);
            yield "\"
                    data-points=\"";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", true, true, false, 118)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", false, false, false, 118), 0)) : (0)), "html", null, true);
            yield "\"
                    data-banned=\"";
            // line 119
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isBanned", [], "any", false, false, false, 119)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
            yield "\"
                    data-ban-until=\"";
            // line 120
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "bannedUntil", [], "any", false, false, false, 120)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "bannedUntil", [], "any", false, false, false, 120), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "\"
                    style=\"transition: all 0.2s; border-bottom: 1px solid #f0e6d6;\"
                >
                    <td><span class=\"fw-bold text-primary\">";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 123), "html", null, true);
            yield "</span></td>
                    <td>";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 124), "html", null, true);
            yield "</td>
                    <td>";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 125), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 127
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 127) == "admin")) {
                // line 128
                yield "                            <span class=\"badge\" style=\"background: linear-gradient(135deg, #dc3545, #b02a37); padding: 6px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">👑 Admin</span>
                        ";
            } else {
                // line 130
                yield "                            <span class=\"badge\" style=\"background: linear-gradient(135deg, #28a745, #1e7e34); padding: 6px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">👤 User</span>
                        ";
            }
            // line 132
            yield "                    </td>
                    <td>
                        ";
            // line 134
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 134)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 135
                yield "                            <span style=\"background: #f0e6d6; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem;\">📍 ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "region", [], "any", false, false, false, 135), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 137
                yield "                            <span class=\"text-muted\">-</span>
                        ";
            }
            // line 139
            yield "                    </td>
                    <td>";
            // line 140
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 140)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "dateNaissance", [], "any", false, false, false, 140), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                    <td>
                        <span class=\"badge\" style=\"background: #f0ad4e; color: #2c3e50; padding: 6px 12px; border-radius: 30px; font-weight: 700;\">
                            ⭐ ";
            // line 143
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", true, true, false, 143)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "pointsFidelite", [], "any", false, false, false, 143), 0)) : (0)), "html", null, true);
            yield "
                        </span>
                    </td>
                    <td>
                        ";
            // line 147
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isBanned", [], "any", false, false, false, 147)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 148
                yield "                            <span class=\"badge\" style=\"background: #6c757d; padding: 6px 12px; border-radius: 30px;\">
                                🚫 Banni";
                // line 149
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "bannedUntil", [], "any", false, false, false, 149) && ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "bannedUntil", [], "any", false, false, false, 149), "Y") < 3000))) {
                    yield " (jusqu'au ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "bannedUntil", [], "any", false, false, false, 149), "d/m/Y H:i"), "html", null, true);
                    yield ")";
                }
                // line 150
                yield "                            </span>
                        ";
            } else {
                // line 152
                yield "                            <span class=\"badge\" style=\"background: #28a745; padding: 6px 12px; border-radius: 30px;\">✅ Actif</span>
                        ";
            }
            // line 154
            yield "                    </td>
                    <td>
                        <div class=\"d-flex gap-2\">
                            <a href=\"";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 157)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-outline-warning rounded-pill\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            ";
            // line 160
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 160) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 160, $this->source); })()), "user", [], "any", false, false, false, 160), "idUtilisateur", [], "any", false, false, false, 160))) {
                // line 161
                yield "                                <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 161)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-inline\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-outline-danger rounded-pill\" onclick=\"return confirm('Supprimer ";
                // line 162
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 162), "html", null, true);
                yield " ?')\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            ";
            }
            // line 167
            yield "                            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isBanned", [], "any", false, false, false, 167)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 168
                yield "                                <button type=\"button\" class=\"btn btn-sm btn-outline-success rounded-pill\" onclick=\"unbanUser(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 168), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 168), "js"), "html", null, true);
                yield "')\">
                                    <i class=\"fas fa-check-circle\"></i> Débannir
                                </button>
                            ";
            } else {
                // line 172
                yield "                                <button type=\"button\" class=\"btn btn-sm btn-outline-secondary rounded-pill\" onclick=\"openBanModal(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "idUtilisateur", [], "any", false, false, false, 172), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 172), "js"), "html", null, true);
                yield "')\">
                                    <i class=\"fas fa-gavel\"></i> Bannir
                                </button>
                            ";
            }
            // line 176
            yield "                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        yield "            </tbody>
        </table>
        <div id=\"noResults\" style=\"display:none; text-align:center; padding: 40px; color: #999;\">
            😕 Aucun utilisateur trouvé
        </div>
    </div>

    <!-- Pagination -->
    <div class=\"d-flex justify-content-between align-items-center mt-4\">
        <div>
            <span class=\"text-muted\" style=\"font-size: 0.85rem;\">Affichage de <span id=\"pageStart\">0</span> à <span id=\"pageEnd\">0</span> sur <span id=\"totalFiltered\">0</span> utilisateur(s)</span>
        </div>
        <div>
            <button class=\"btn btn-sm btn-outline-primary rounded-pill\" id=\"prevPageBtn\" disabled>« Précédent</button>
            <span class=\"mx-2 fw-semibold\">Page <span id=\"currentPage\">1</span> / <span id=\"totalPages\">1</span></span>
            <button class=\"btn btn-sm btn-outline-primary rounded-pill\" id=\"nextPageBtn\" disabled>Suivant »</button>
        </div>
    </div>
</div>

<!-- Modal de bannissement (inchangée) -->
<div class=\"modal fade\" id=\"banModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">🚫 Bannir un utilisateur</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <p>Utilisateur : <strong id=\"banUserName\"></strong></p>
                <div class=\"mb-3\">
                    <label>Durée du bannissement</label>
                    <select id=\"banDuration\" class=\"form-select\">
                        <option value=\"1day\">1 jour</option>
                        <option value=\"2days\">2 jours</option>
                        <option value=\"1week\">1 semaine</option>
                        <option value=\"infinite\">♾️ Infini</option>
                        <option value=\"custom\">Personnalisé</option>
                    </select>
                </div>
                <div class=\"mb-3\" id=\"customDateDiv\" style=\"display:none;\">
                    <label>Date de fin (format YYYY-MM-DD HH:MM)</label>
                    <input type=\"datetime-local\" id=\"customBanDate\" class=\"form-control\">
                </div>
                <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle\"></i> L'utilisateur ne pourra pas se connecter jusqu'à la date indiquée.
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <button type=\"button\" class=\"btn btn-danger\" onclick=\"confirmBan()\">Confirmer le bannissement</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== MODALE VIDÉO D'AIDE (YouTube) ========== -->
<div class=\"modal fade\" id=\"helpVideoModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">
                    <i class=\"fas fa-play-circle text-danger\"></i> Vidéo d'aide - Administration
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"ratio ratio-16x9\">
                    <iframe src=\"https://www.youtube.com/embed/OEZ06hJZ8ao?autoplay=0&rel=0\" 
                            title=\"Vidéo d'aide\"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== WIDGET D'ASSISTANCE CONTEXTUELLE ========== -->
<div class=\"help-widget\" id=\"helpWidget\">
    <div class=\"help-bubble\" id=\"helpBubble\">
        <i class=\"fas fa-question\"></i>
    </div>
    <div class=\"help-panel\" id=\"helpPanel\">
        <div class=\"help-header\">
            <i class=\"fas fa-robot\"></i> Assistant Admin
            <button class=\"help-close\" id=\"helpCloseBtn\">&times;</button>
        </div>
        <div class=\"help-content\">
            <p>Que souhaitez-vous faire ?</p>
            <div class=\"help-suggestions\" id=\"helpSuggestions\">
                <button class=\"help-suggestion\" data-action=\"profil\">
                    <i class=\"fas fa-user-edit\"></i> Modifier mon profil
                </button>
                <button class=\"help-suggestion\" data-action=\"ban\">
                    <i class=\"fas fa-gavel\"></i> Bannir un utilisateur
                </button>
                <button class=\"help-suggestion\" data-action=\"search\">
                    <i class=\"fas fa-search\"></i> Recherche avancée
                </button>
                <button class=\"help-suggestion\" data-action=\"stats\">
                    <i class=\"fas fa-chart-line\"></i> Statistiques
                </button>
                <button class=\"help-suggestion\" data-action=\"export\">
                    <i class=\"fas fa-file-pdf\"></i> Exporter la liste
                </button>
                <button class=\"help-suggestion\" data-action=\"help\">
                    <i class=\"fas fa-question-circle\"></i> Aide / Documentation
                </button>
            </div>
        </div>
        <div class=\"help-footer\">
            <small>Suggestions basées sur la page actuelle</small>
        </div>
    </div>
</div>

<style>
    /* Widget d'assistance */
    .help-widget {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .help-bubble {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        animation: bounce 1s ease infinite;
    }
    .help-bubble:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }
    .help-bubble i {
        font-size: 28px;
        color: white;
        transition: transform 0.2s;
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .help-panel {
        position: absolute;
        bottom: 70px;
        right: 0;
        width: 320px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px) scale(0.95);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        background: rgba(255,255,255,0.98);
        border: 1px solid rgba(255,107,107,0.3);
    }
    .help-panel.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
    }
    .help-header {
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
    }
    .help-header i {
        margin-right: 8px;
    }
    .help-close {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        line-height: 1;
        transition: transform 0.2s;
    }
    .help-close:hover {
        transform: scale(1.2);
    }
    .help-content {
        padding: 20px;
    }
    .help-content p {
        margin: 0 0 12px 0;
        color: #555;
        font-size: 14px;
        font-weight: 500;
    }
    .help-suggestions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .help-suggestion {
        background: #f8f9fa;
        border: 1px solid #f0e6d6;
        border-radius: 50px;
        padding: 10px 15px;
        text-align: left;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .help-suggestion i {
        width: 24px;
        color: #FF6B6B;
        font-size: 16px;
    }
    .help-suggestion:hover {
        background: linear-gradient(135deg, #FFF0F0, #FFF5F0);
        border-color: #FF6B6B;
        transform: translateX(5px);
    }
    .help-footer {
        background: #fefcf8;
        padding: 10px 20px;
        text-align: center;
        font-size: 11px;
        color: #999;
        border-top: 1px solid #f0e6d6;
    }
</style>

<script>
// ========== PAGINATION (identique) ==========
let currentPage = 1;
const rowsPerPage = 10;
let filteredRows = [];
let totalPages = 1;

function updatePagination() {
    const total = filteredRows.length;
    totalPages = Math.ceil(total / rowsPerPage);
    if (currentPage > totalPages) currentPage = totalPages || 1;
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    document.querySelectorAll('#usersBody tr').forEach(row => row.style.display = 'none');
    for (let i = start; i < end && i < total; i++) {
        filteredRows[i].style.display = '';
    }
    document.getElementById('pageStart').textContent = total === 0 ? 0 : start + 1;
    document.getElementById('pageEnd').textContent = Math.min(end, total);
    document.getElementById('totalFiltered').textContent = total;
    document.getElementById('currentPage').textContent = currentPage;
    document.getElementById('totalPages').textContent = totalPages || 1;
    document.getElementById('prevPageBtn').disabled = currentPage <= 1;
    document.getElementById('nextPageBtn').disabled = currentPage >= totalPages;
}

function goToPrevPage() {
    if (currentPage > 1) { currentPage--; updatePagination(); }
}

function goToNextPage() {
    if (currentPage < totalPages) { currentPage++; updatePagination(); }
}

// ========== FILTRES ET TRI ==========
let sortDirections = { id: 'asc', nom: 'asc', role: 'asc', region: 'asc', points: 'asc' };

function applyFilters() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const email  = document.getElementById('searchEmail').value.toLowerCase();
    const role   = document.getElementById('filterRole').value;
    const region = document.getElementById('filterRegion').value.toLowerCase();
    const rows   = Array.from(document.querySelectorAll('#usersBody tr'));

    filteredRows = rows.filter(row => {
        const id        = row.dataset.id;
        const nom       = row.dataset.nom;
        const rowEmail  = row.dataset.email;
        const rowRole   = row.dataset.role;
        const rowRegion = row.dataset.region;
        const matchSearch = !search || id.includes(search) || nom.includes(search);
        const matchEmail  = !email  || rowEmail.includes(email);
        const matchRole   = !role   || rowRole === role;
        const matchRegion = !region || rowRegion.includes(region);
        return matchSearch && matchEmail && matchRole && matchRegion;
    });

    document.getElementById('resultCount').textContent = filteredRows.length + ' utilisateur(s) trouvé(s)';
    document.getElementById('noResults').style.display = filteredRows.length === 0 ? 'block' : 'none';
    currentPage = 1;
    updatePagination();
}

function sortTable(col) {
    const tbody = document.getElementById('usersBody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const dir = sortDirections[col] === 'asc' ? 1 : -1;
    rows.sort((a, b) => {
        let valA = a.dataset[col] || '';
        let valB = b.dataset[col] || '';
        if (col === 'id' || col === 'points') return (parseInt(valA) - parseInt(valB)) * dir;
        return valA.localeCompare(valB) * dir;
    });
    rows.forEach(row => tbody.appendChild(row));
    sortDirections[col] = sortDirections[col] === 'asc' ? 'desc' : 'asc';
    document.getElementById('sort-' + col).textContent = dir === 1 ? '↑' : '↓';
    applyFilters();
}

function resetFilters() {
    document.getElementById('searchInput').value  = '';
    document.getElementById('searchEmail').value  = '';
    document.getElementById('filterRole').value   = '';
    document.getElementById('filterRegion').value = '';
    document.getElementById('sortBy').value       = '';
    sortDirections = { id: 'asc', nom: 'asc', role: 'asc', region: 'asc', points: 'asc' };
    ['id','nom','role','region','points'].forEach(c => {
        const el = document.getElementById('sort-' + c);
        if (el) el.textContent = '↕';
    });
    applyFilters();
}

// ========== EXPORT PDF ==========
document.getElementById('exportPdfBtn').addEventListener('click', function(e) {
    e.preventDefault();
    const search = document.getElementById('searchInput').value;
    const email = document.getElementById('searchEmail').value;
    const role = document.getElementById('filterRole').value;
    const region = document.getElementById('filterRegion').value;
    const sort = document.getElementById('sortBy').value;
    let url = \"";
        // line 530
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_export_pdf");
        yield "?search=\" + encodeURIComponent(search) +
              \"&email=\" + encodeURIComponent(email) +
              \"&role=\" + encodeURIComponent(role) +
              \"&region=\" + encodeURIComponent(region) +
              \"&sort=\" + encodeURIComponent(sort);
    window.open(url, '_blank');
});

// ========== CHATBOT SEARCH ==========
document.getElementById('chatSearchBtn').addEventListener('click', function() {
    const query = document.getElementById('chatSearchInput').value.trim();
    if (!query) return;

    fetch(\"";
        // line 543
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_chat_search");
        yield "\", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: query })
    })
    .then(response => response.json())
    .then(data => {
        if (data.filters) {
            const f = data.filters;
            if (f.search !== undefined) document.getElementById('searchInput').value = f.search;
            if (f.email !== undefined) document.getElementById('searchEmail').value = f.email;
            if (f.role !== undefined) document.getElementById('filterRole').value = f.role;
            if (f.region !== undefined) document.getElementById('filterRegion').value = f.region;
            if (f.sort !== undefined) document.getElementById('sortBy').value = f.sort;
            applyFilters();
            if (f.sort) {
                const [col, dir] = f.sort.split('-');
                sortDirections[col] = dir === 'asc' ? 'desc' : 'asc';
                sortTable(col);
            }
        }
    })
    .catch(error => console.error('Erreur chatbot:', error));
});

document.getElementById('clearChatBtn').addEventListener('click', function() {
    document.getElementById('chatSearchInput').value = '';
});

// ========== BANNISSEMENT ==========
let currentBanUserId = null;
let currentBanUserName = '';

function openBanModal(userId, userName) {
    currentBanUserId = userId;
    currentBanUserName = userName;
    document.getElementById('banUserName').innerText = userName;
    const banModal = new bootstrap.Modal(document.getElementById('banModal'));
    banModal.show();
}

document.getElementById('banDuration').addEventListener('change', function() {
    document.getElementById('customDateDiv').style.display = this.value === 'custom' ? 'block' : 'none';
});

function computeBanDate(duration, customDate = null) {
    if (duration === 'custom' && customDate) return customDate;
    const now = new Date();
    switch(duration) {
        case '1day': now.setDate(now.getDate() + 1); break;
        case '2days': now.setDate(now.getDate() + 2); break;
        case '1week': now.setDate(now.getDate() + 7); break;
        case 'infinite': return '2999-12-31 23:59:59';
        default: return null;
    }
    return now.toISOString().slice(0, 19).replace('T', ' ');
}

function confirmBan() {
    const duration = document.getElementById('banDuration').value;
    let banUntil = null;
    if (duration === 'custom') {
        const customDate = document.getElementById('customBanDate').value;
        if (!customDate) { alert('Veuillez choisir une date de fin.'); return; }
        banUntil = customDate.replace('T', ' ') + ':00';
    } else {
        banUntil = computeBanDate(duration);
    }
    fetch('/utilisateur/' + currentBanUserId + '/ban', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ banned_until: banUntil })
    })
    .then(response => response.json())
    .then(data => { if (data.success) location.reload(); else alert('Erreur : ' + data.message); })
    .catch(error => { console.error(error); alert('Une erreur est survenue.'); });
}

function unbanUser(userId, userName) {
    if (confirm(`Débannir \${userName} ? L'utilisateur pourra à nouveau se connecter.`)) {
        fetch('/utilisateur/' + userId + '/ban', {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
            body: JSON.stringify({ banned_until: null })
        })
        .then(response => response.json())
        .then(data => { if (data.success) location.reload(); else alert('Erreur : ' + data.message); })
        .catch(error => { console.error(error); alert('Une erreur est survenue.'); });
    }
}

// ========== WIDGET D'ASSISTANCE ==========
document.getElementById('helpBubble').addEventListener('click', function() {
    document.getElementById('helpPanel').classList.toggle('show');
});
document.getElementById('helpCloseBtn').addEventListener('click', function() {
    document.getElementById('helpPanel').classList.remove('show');
});
document.addEventListener('click', function(event) {
    const widget = document.querySelector('.help-widget');
    if (!widget.contains(event.target)) {
        document.getElementById('helpPanel').classList.remove('show');
    }
});

document.querySelectorAll('.help-suggestion').forEach(btn => {
    btn.addEventListener('click', function() {
        const action = this.dataset.action;
        document.getElementById('helpPanel').classList.remove('show');
        switch(action) {
            case 'profil':
                window.location.href = \"";
        // line 654
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mon_profil");
        yield "\";
                break;
            case 'ban':
                const firstUser = document.querySelector('#usersBody tr');
                if (firstUser) {
                    const userId = firstUser.dataset.id;
                    const userName = firstUser.querySelector('td:nth-child(2)').innerText;
                    openBanModal(userId, userName);
                } else {
                    alert('Aucun utilisateur trouvé.');
                }
                break;
            case 'search':
                document.getElementById('searchInput').focus();
                break;
            case 'stats':
                window.location.href = \"/admin/statistiques\";
                break;
            case 'export':
                document.getElementById('exportPdfBtn').click();
                break;
            case 'help':
                const videoModal = new bootstrap.Modal(document.getElementById('helpVideoModal'));
                videoModal.show();
                break;
        }
    });
});

// ========== ÉVÉNEMENTS EXISTANTS ==========
document.getElementById('sortBy').addEventListener('change', function() {
    const val = this.value;
    if (!val) return;
    const [col, dir] = val.split('-');
    sortDirections[col] = dir === 'asc' ? 'desc' : 'asc';
    sortTable(col);
});
document.getElementById('searchInput').addEventListener('input', applyFilters);
document.getElementById('searchEmail').addEventListener('input', applyFilters);
document.getElementById('filterRole').addEventListener('change', applyFilters);
document.getElementById('filterRegion').addEventListener('change', applyFilters);
document.getElementById('prevPageBtn').addEventListener('click', goToPrevPage);
document.getElementById('nextPageBtn').addEventListener('click', goToNextPage);

// Initialisation
applyFilters();
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
        return "utilisateur/index_admin.html.twig";
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
        return array (  882 => 654,  768 => 543,  752 => 530,  400 => 180,  391 => 176,  381 => 172,  371 => 168,  368 => 167,  360 => 162,  355 => 161,  353 => 160,  347 => 157,  342 => 154,  338 => 152,  334 => 150,  328 => 149,  325 => 148,  323 => 147,  316 => 143,  310 => 140,  307 => 139,  303 => 137,  297 => 135,  295 => 134,  291 => 132,  287 => 130,  283 => 128,  281 => 127,  276 => 125,  272 => 124,  268 => 123,  262 => 120,  258 => 119,  254 => 118,  250 => 117,  246 => 116,  242 => 115,  238 => 114,  234 => 113,  231 => 112,  227 => 111,  186 => 72,  163 => 50,  152 => 48,  147 => 47,  145 => 46,  119 => 22,  110 => 20,  106 => 19,  97 => 13,  91 => 10,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Gestion des utilisateurs{% endblock %}

{% block admin_content %}
<div class=\"admin-card\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h3>👥 Gestion des utilisateurs</h3>
        <div>
            <a href=\"{{ path('app_utilisateur_export_pdf') }}\" id=\"exportPdfBtn\" class=\"btn btn-success me-2\">
                <i class=\"fas fa-file-pdf\"></i> Exporter PDF
            </a>
            <a href=\"{{ path('app_utilisateur_nouveau') }}\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> Ajouter un utilisateur
            </a>
        </div>
    </div>

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}

    <!-- Filtres avec chatbot -->
    <div style=\"background: #fefcf8; border-radius: 15px; padding: 20px; margin-bottom: 20px; border: 1px solid #f0e6d6;\">
        <div class=\"row g-3 align-items-end\">
            <div class=\"col-md-3\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🔍 Recherche (ID ou Nom)</label>
                <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"ID ou nom...\">
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">📧 Email</label>
                <input type=\"text\" id=\"searchEmail\" class=\"form-control\" placeholder=\"Email...\">
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">👤 Rôle</label>
                <select id=\"filterRole\" class=\"form-control\">
                    <option value=\"\">Tous</option>
                    <option value=\"admin\">Admin</option>
                    <option value=\"user\">User</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">📍 Région</label>
                <select id=\"filterRegion\" class=\"form-control\">
                    <option value=\"\">Toutes</option>
                    {% set regions = ['Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan', 'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse', 'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid', 'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'] %}
                    {% for r in regions %}
                        <option value=\"{{ r }}\">{{ r }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🔃 Trier par</label>
                <select id=\"sortBy\" class=\"form-control\">
                    <option value=\"\">-- Trier --</option>
                    <option value=\"id-asc\">ID ↑</option>
                    <option value=\"id-desc\">ID ↓</option>
                    <option value=\"nom-asc\">Nom A→Z</option>
                    <option value=\"nom-desc\">Nom Z→A</option>
                    <option value=\"role-asc\">Rôle A→Z</option>
                    <option value=\"region-asc\">Région A→Z</option>
                    <option value=\"points-asc\">Points ↑</option>
                    <option value=\"points-desc\">Points ↓</option>
                </select>
            </div>
            <div class=\"col-md-1\">
                <button onclick=\"resetFilters()\" class=\"btn btn-secondary w-100\">↺</button>
            </div>
        </div>

        {# Ligne chatbot #}
        <div class=\"row mt-3\">
            <div class=\"col-md-10\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">🤖 Assistant IA (langage naturel)</label>
                <div class=\"input-group\">
                    <input type=\"text\" id=\"chatSearchInput\" class=\"form-control\" placeholder=\"Ex: 'admins de Tunis', 'utilisateurs actifs avec plus de 50 points', 'trier par points décroissant'\">
                    <button class=\"btn btn-primary\" type=\"button\" id=\"chatSearchBtn\">
                        <i class=\"fas fa-robot\"></i> Chercher
                    </button>
                </div>
            </div>
            <div class=\"col-md-2\">
                <label style=\"font-size: 12px; font-weight: 600; color: #FF6B6B; text-transform: uppercase;\">&nbsp;</label>
                <button class=\"btn btn-outline-secondary w-100\" id=\"clearChatBtn\">
                    <i class=\"fas fa-eraser\"></i> Effacer
                </button>
            </div>
        </div>
        <div class=\"mt-2\">
            <small id=\"resultCount\" style=\"color: #666;\"></small>
        </div>
    </div>

    <!-- Tableau -->
    <div class=\"table-responsive\" style=\"border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.02);\">
        <table class=\"table table-hover align-middle mb-0\" id=\"usersTable\" style=\"border-collapse: separate; border-spacing: 0; width: 100%;\">
            <thead style=\"background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); color: white; border: none;\">
                <tr>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('id')\">ID <span id=\"sort-id\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('nom')\">Nom <span id=\"sort-nom\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Email</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('role')\">Rôle <span id=\"sort-role\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('region')\">Région <span id=\"sort-region\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Date naissance</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: pointer;\" onclick=\"sortTable('points')\">⭐ Points <span id=\"sort-points\" style=\"margin-left: 5px;\">↕</span></th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Statut</th>
                    <th style=\"padding: 18px 12px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;\">Actions</th>
                </tr>
            </thead>
            <tbody id=\"usersBody\">
                {% for u in utilisateurs %}
                <tr
                    data-id=\"{{ u.idUtilisateur }}\"
                    data-nom=\"{{ u.nom|lower }}\"
                    data-email=\"{{ u.email|lower }}\"
                    data-role=\"{{ u.role }}\"
                    data-region=\"{{ u.region|lower }}\"
                    data-points=\"{{ u.pointsFidelite|default(0) }}\"
                    data-banned=\"{{ u.isBanned ? 'true' : 'false' }}\"
                    data-ban-until=\"{{ u.bannedUntil ? u.bannedUntil|date('Y-m-d H:i:s') : '' }}\"
                    style=\"transition: all 0.2s; border-bottom: 1px solid #f0e6d6;\"
                >
                    <td><span class=\"fw-bold text-primary\">{{ u.idUtilisateur }}</span></td>
                    <td>{{ u.nom }}</td>
                    <td>{{ u.email }}</td>
                    <td>
                        {% if u.role == 'admin' %}
                            <span class=\"badge\" style=\"background: linear-gradient(135deg, #dc3545, #b02a37); padding: 6px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">👑 Admin</span>
                        {% else %}
                            <span class=\"badge\" style=\"background: linear-gradient(135deg, #28a745, #1e7e34); padding: 6px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">👤 User</span>
                        {% endif %}
                    </td>
                    <td>
                        {% if u.region %}
                            <span style=\"background: #f0e6d6; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem;\">📍 {{ u.region }}</span>
                        {% else %}
                            <span class=\"text-muted\">-</span>
                        {% endif %}
                    </td>
                    <td>{{ u.dateNaissance ? u.dateNaissance|date('d/m/Y') : '-' }}</td>
                    <td>
                        <span class=\"badge\" style=\"background: #f0ad4e; color: #2c3e50; padding: 6px 12px; border-radius: 30px; font-weight: 700;\">
                            ⭐ {{ u.pointsFidelite|default(0) }}
                        </span>
                    </td>
                    <td>
                        {% if u.isBanned %}
                            <span class=\"badge\" style=\"background: #6c757d; padding: 6px 12px; border-radius: 30px;\">
                                🚫 Banni{% if u.bannedUntil and u.bannedUntil|date('Y') < 3000 %} (jusqu'au {{ u.bannedUntil|date('d/m/Y H:i') }}){% endif %}
                            </span>
                        {% else %}
                            <span class=\"badge\" style=\"background: #28a745; padding: 6px 12px; border-radius: 30px;\">✅ Actif</span>
                        {% endif %}
                    </td>
                    <td>
                        <div class=\"d-flex gap-2\">
                            <a href=\"{{ path('app_utilisateur_editer', {id: u.idUtilisateur}) }}\" class=\"btn btn-sm btn-outline-warning rounded-pill\">
                                <i class=\"fas fa-edit\"></i> Modifier
                            </a>
                            {% if u.idUtilisateur != app.user.idUtilisateur %}
                                <form action=\"{{ path('app_utilisateur_delete', {id: u.idUtilisateur}) }}\" method=\"post\" class=\"d-inline\">
                                    <button type=\"submit\" class=\"btn btn-sm btn-outline-danger rounded-pill\" onclick=\"return confirm('Supprimer {{ u.nom }} ?')\">
                                        <i class=\"fas fa-trash\"></i> Supprimer
                                    </button>
                                </form>
                            {% endif %}
                            {% if u.isBanned %}
                                <button type=\"button\" class=\"btn btn-sm btn-outline-success rounded-pill\" onclick=\"unbanUser({{ u.idUtilisateur }}, '{{ u.nom|escape('js') }}')\">
                                    <i class=\"fas fa-check-circle\"></i> Débannir
                                </button>
                            {% else %}
                                <button type=\"button\" class=\"btn btn-sm btn-outline-secondary rounded-pill\" onclick=\"openBanModal({{ u.idUtilisateur }}, '{{ u.nom|escape('js') }}')\">
                                    <i class=\"fas fa-gavel\"></i> Bannir
                                </button>
                            {% endif %}
                        </div>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <div id=\"noResults\" style=\"display:none; text-align:center; padding: 40px; color: #999;\">
            😕 Aucun utilisateur trouvé
        </div>
    </div>

    <!-- Pagination -->
    <div class=\"d-flex justify-content-between align-items-center mt-4\">
        <div>
            <span class=\"text-muted\" style=\"font-size: 0.85rem;\">Affichage de <span id=\"pageStart\">0</span> à <span id=\"pageEnd\">0</span> sur <span id=\"totalFiltered\">0</span> utilisateur(s)</span>
        </div>
        <div>
            <button class=\"btn btn-sm btn-outline-primary rounded-pill\" id=\"prevPageBtn\" disabled>« Précédent</button>
            <span class=\"mx-2 fw-semibold\">Page <span id=\"currentPage\">1</span> / <span id=\"totalPages\">1</span></span>
            <button class=\"btn btn-sm btn-outline-primary rounded-pill\" id=\"nextPageBtn\" disabled>Suivant »</button>
        </div>
    </div>
</div>

<!-- Modal de bannissement (inchangée) -->
<div class=\"modal fade\" id=\"banModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">🚫 Bannir un utilisateur</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <p>Utilisateur : <strong id=\"banUserName\"></strong></p>
                <div class=\"mb-3\">
                    <label>Durée du bannissement</label>
                    <select id=\"banDuration\" class=\"form-select\">
                        <option value=\"1day\">1 jour</option>
                        <option value=\"2days\">2 jours</option>
                        <option value=\"1week\">1 semaine</option>
                        <option value=\"infinite\">♾️ Infini</option>
                        <option value=\"custom\">Personnalisé</option>
                    </select>
                </div>
                <div class=\"mb-3\" id=\"customDateDiv\" style=\"display:none;\">
                    <label>Date de fin (format YYYY-MM-DD HH:MM)</label>
                    <input type=\"datetime-local\" id=\"customBanDate\" class=\"form-control\">
                </div>
                <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle\"></i> L'utilisateur ne pourra pas se connecter jusqu'à la date indiquée.
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                <button type=\"button\" class=\"btn btn-danger\" onclick=\"confirmBan()\">Confirmer le bannissement</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== MODALE VIDÉO D'AIDE (YouTube) ========== -->
<div class=\"modal fade\" id=\"helpVideoModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">
                    <i class=\"fas fa-play-circle text-danger\"></i> Vidéo d'aide - Administration
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"ratio ratio-16x9\">
                    <iframe src=\"https://www.youtube.com/embed/OEZ06hJZ8ao?autoplay=0&rel=0\" 
                            title=\"Vidéo d'aide\"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== WIDGET D'ASSISTANCE CONTEXTUELLE ========== -->
<div class=\"help-widget\" id=\"helpWidget\">
    <div class=\"help-bubble\" id=\"helpBubble\">
        <i class=\"fas fa-question\"></i>
    </div>
    <div class=\"help-panel\" id=\"helpPanel\">
        <div class=\"help-header\">
            <i class=\"fas fa-robot\"></i> Assistant Admin
            <button class=\"help-close\" id=\"helpCloseBtn\">&times;</button>
        </div>
        <div class=\"help-content\">
            <p>Que souhaitez-vous faire ?</p>
            <div class=\"help-suggestions\" id=\"helpSuggestions\">
                <button class=\"help-suggestion\" data-action=\"profil\">
                    <i class=\"fas fa-user-edit\"></i> Modifier mon profil
                </button>
                <button class=\"help-suggestion\" data-action=\"ban\">
                    <i class=\"fas fa-gavel\"></i> Bannir un utilisateur
                </button>
                <button class=\"help-suggestion\" data-action=\"search\">
                    <i class=\"fas fa-search\"></i> Recherche avancée
                </button>
                <button class=\"help-suggestion\" data-action=\"stats\">
                    <i class=\"fas fa-chart-line\"></i> Statistiques
                </button>
                <button class=\"help-suggestion\" data-action=\"export\">
                    <i class=\"fas fa-file-pdf\"></i> Exporter la liste
                </button>
                <button class=\"help-suggestion\" data-action=\"help\">
                    <i class=\"fas fa-question-circle\"></i> Aide / Documentation
                </button>
            </div>
        </div>
        <div class=\"help-footer\">
            <small>Suggestions basées sur la page actuelle</small>
        </div>
    </div>
</div>

<style>
    /* Widget d'assistance */
    .help-widget {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .help-bubble {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        animation: bounce 1s ease infinite;
    }
    .help-bubble:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }
    .help-bubble i {
        font-size: 28px;
        color: white;
        transition: transform 0.2s;
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .help-panel {
        position: absolute;
        bottom: 70px;
        right: 0;
        width: 320px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px) scale(0.95);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        background: rgba(255,255,255,0.98);
        border: 1px solid rgba(255,107,107,0.3);
    }
    .help-panel.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
    }
    .help-header {
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
    }
    .help-header i {
        margin-right: 8px;
    }
    .help-close {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        line-height: 1;
        transition: transform 0.2s;
    }
    .help-close:hover {
        transform: scale(1.2);
    }
    .help-content {
        padding: 20px;
    }
    .help-content p {
        margin: 0 0 12px 0;
        color: #555;
        font-size: 14px;
        font-weight: 500;
    }
    .help-suggestions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .help-suggestion {
        background: #f8f9fa;
        border: 1px solid #f0e6d6;
        border-radius: 50px;
        padding: 10px 15px;
        text-align: left;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .help-suggestion i {
        width: 24px;
        color: #FF6B6B;
        font-size: 16px;
    }
    .help-suggestion:hover {
        background: linear-gradient(135deg, #FFF0F0, #FFF5F0);
        border-color: #FF6B6B;
        transform: translateX(5px);
    }
    .help-footer {
        background: #fefcf8;
        padding: 10px 20px;
        text-align: center;
        font-size: 11px;
        color: #999;
        border-top: 1px solid #f0e6d6;
    }
</style>

<script>
// ========== PAGINATION (identique) ==========
let currentPage = 1;
const rowsPerPage = 10;
let filteredRows = [];
let totalPages = 1;

function updatePagination() {
    const total = filteredRows.length;
    totalPages = Math.ceil(total / rowsPerPage);
    if (currentPage > totalPages) currentPage = totalPages || 1;
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    document.querySelectorAll('#usersBody tr').forEach(row => row.style.display = 'none');
    for (let i = start; i < end && i < total; i++) {
        filteredRows[i].style.display = '';
    }
    document.getElementById('pageStart').textContent = total === 0 ? 0 : start + 1;
    document.getElementById('pageEnd').textContent = Math.min(end, total);
    document.getElementById('totalFiltered').textContent = total;
    document.getElementById('currentPage').textContent = currentPage;
    document.getElementById('totalPages').textContent = totalPages || 1;
    document.getElementById('prevPageBtn').disabled = currentPage <= 1;
    document.getElementById('nextPageBtn').disabled = currentPage >= totalPages;
}

function goToPrevPage() {
    if (currentPage > 1) { currentPage--; updatePagination(); }
}

function goToNextPage() {
    if (currentPage < totalPages) { currentPage++; updatePagination(); }
}

// ========== FILTRES ET TRI ==========
let sortDirections = { id: 'asc', nom: 'asc', role: 'asc', region: 'asc', points: 'asc' };

function applyFilters() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const email  = document.getElementById('searchEmail').value.toLowerCase();
    const role   = document.getElementById('filterRole').value;
    const region = document.getElementById('filterRegion').value.toLowerCase();
    const rows   = Array.from(document.querySelectorAll('#usersBody tr'));

    filteredRows = rows.filter(row => {
        const id        = row.dataset.id;
        const nom       = row.dataset.nom;
        const rowEmail  = row.dataset.email;
        const rowRole   = row.dataset.role;
        const rowRegion = row.dataset.region;
        const matchSearch = !search || id.includes(search) || nom.includes(search);
        const matchEmail  = !email  || rowEmail.includes(email);
        const matchRole   = !role   || rowRole === role;
        const matchRegion = !region || rowRegion.includes(region);
        return matchSearch && matchEmail && matchRole && matchRegion;
    });

    document.getElementById('resultCount').textContent = filteredRows.length + ' utilisateur(s) trouvé(s)';
    document.getElementById('noResults').style.display = filteredRows.length === 0 ? 'block' : 'none';
    currentPage = 1;
    updatePagination();
}

function sortTable(col) {
    const tbody = document.getElementById('usersBody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const dir = sortDirections[col] === 'asc' ? 1 : -1;
    rows.sort((a, b) => {
        let valA = a.dataset[col] || '';
        let valB = b.dataset[col] || '';
        if (col === 'id' || col === 'points') return (parseInt(valA) - parseInt(valB)) * dir;
        return valA.localeCompare(valB) * dir;
    });
    rows.forEach(row => tbody.appendChild(row));
    sortDirections[col] = sortDirections[col] === 'asc' ? 'desc' : 'asc';
    document.getElementById('sort-' + col).textContent = dir === 1 ? '↑' : '↓';
    applyFilters();
}

function resetFilters() {
    document.getElementById('searchInput').value  = '';
    document.getElementById('searchEmail').value  = '';
    document.getElementById('filterRole').value   = '';
    document.getElementById('filterRegion').value = '';
    document.getElementById('sortBy').value       = '';
    sortDirections = { id: 'asc', nom: 'asc', role: 'asc', region: 'asc', points: 'asc' };
    ['id','nom','role','region','points'].forEach(c => {
        const el = document.getElementById('sort-' + c);
        if (el) el.textContent = '↕';
    });
    applyFilters();
}

// ========== EXPORT PDF ==========
document.getElementById('exportPdfBtn').addEventListener('click', function(e) {
    e.preventDefault();
    const search = document.getElementById('searchInput').value;
    const email = document.getElementById('searchEmail').value;
    const role = document.getElementById('filterRole').value;
    const region = document.getElementById('filterRegion').value;
    const sort = document.getElementById('sortBy').value;
    let url = \"{{ path('app_utilisateur_export_pdf') }}?search=\" + encodeURIComponent(search) +
              \"&email=\" + encodeURIComponent(email) +
              \"&role=\" + encodeURIComponent(role) +
              \"&region=\" + encodeURIComponent(region) +
              \"&sort=\" + encodeURIComponent(sort);
    window.open(url, '_blank');
});

// ========== CHATBOT SEARCH ==========
document.getElementById('chatSearchBtn').addEventListener('click', function() {
    const query = document.getElementById('chatSearchInput').value.trim();
    if (!query) return;

    fetch(\"{{ path('app_utilisateur_chat_search') }}\", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: query })
    })
    .then(response => response.json())
    .then(data => {
        if (data.filters) {
            const f = data.filters;
            if (f.search !== undefined) document.getElementById('searchInput').value = f.search;
            if (f.email !== undefined) document.getElementById('searchEmail').value = f.email;
            if (f.role !== undefined) document.getElementById('filterRole').value = f.role;
            if (f.region !== undefined) document.getElementById('filterRegion').value = f.region;
            if (f.sort !== undefined) document.getElementById('sortBy').value = f.sort;
            applyFilters();
            if (f.sort) {
                const [col, dir] = f.sort.split('-');
                sortDirections[col] = dir === 'asc' ? 'desc' : 'asc';
                sortTable(col);
            }
        }
    })
    .catch(error => console.error('Erreur chatbot:', error));
});

document.getElementById('clearChatBtn').addEventListener('click', function() {
    document.getElementById('chatSearchInput').value = '';
});

// ========== BANNISSEMENT ==========
let currentBanUserId = null;
let currentBanUserName = '';

function openBanModal(userId, userName) {
    currentBanUserId = userId;
    currentBanUserName = userName;
    document.getElementById('banUserName').innerText = userName;
    const banModal = new bootstrap.Modal(document.getElementById('banModal'));
    banModal.show();
}

document.getElementById('banDuration').addEventListener('change', function() {
    document.getElementById('customDateDiv').style.display = this.value === 'custom' ? 'block' : 'none';
});

function computeBanDate(duration, customDate = null) {
    if (duration === 'custom' && customDate) return customDate;
    const now = new Date();
    switch(duration) {
        case '1day': now.setDate(now.getDate() + 1); break;
        case '2days': now.setDate(now.getDate() + 2); break;
        case '1week': now.setDate(now.getDate() + 7); break;
        case 'infinite': return '2999-12-31 23:59:59';
        default: return null;
    }
    return now.toISOString().slice(0, 19).replace('T', ' ');
}

function confirmBan() {
    const duration = document.getElementById('banDuration').value;
    let banUntil = null;
    if (duration === 'custom') {
        const customDate = document.getElementById('customBanDate').value;
        if (!customDate) { alert('Veuillez choisir une date de fin.'); return; }
        banUntil = customDate.replace('T', ' ') + ':00';
    } else {
        banUntil = computeBanDate(duration);
    }
    fetch('/utilisateur/' + currentBanUserId + '/ban', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
        body: JSON.stringify({ banned_until: banUntil })
    })
    .then(response => response.json())
    .then(data => { if (data.success) location.reload(); else alert('Erreur : ' + data.message); })
    .catch(error => { console.error(error); alert('Une erreur est survenue.'); });
}

function unbanUser(userId, userName) {
    if (confirm(`Débannir \${userName} ? L'utilisateur pourra à nouveau se connecter.`)) {
        fetch('/utilisateur/' + userId + '/ban', {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
            body: JSON.stringify({ banned_until: null })
        })
        .then(response => response.json())
        .then(data => { if (data.success) location.reload(); else alert('Erreur : ' + data.message); })
        .catch(error => { console.error(error); alert('Une erreur est survenue.'); });
    }
}

// ========== WIDGET D'ASSISTANCE ==========
document.getElementById('helpBubble').addEventListener('click', function() {
    document.getElementById('helpPanel').classList.toggle('show');
});
document.getElementById('helpCloseBtn').addEventListener('click', function() {
    document.getElementById('helpPanel').classList.remove('show');
});
document.addEventListener('click', function(event) {
    const widget = document.querySelector('.help-widget');
    if (!widget.contains(event.target)) {
        document.getElementById('helpPanel').classList.remove('show');
    }
});

document.querySelectorAll('.help-suggestion').forEach(btn => {
    btn.addEventListener('click', function() {
        const action = this.dataset.action;
        document.getElementById('helpPanel').classList.remove('show');
        switch(action) {
            case 'profil':
                window.location.href = \"{{ path('app_mon_profil') }}\";
                break;
            case 'ban':
                const firstUser = document.querySelector('#usersBody tr');
                if (firstUser) {
                    const userId = firstUser.dataset.id;
                    const userName = firstUser.querySelector('td:nth-child(2)').innerText;
                    openBanModal(userId, userName);
                } else {
                    alert('Aucun utilisateur trouvé.');
                }
                break;
            case 'search':
                document.getElementById('searchInput').focus();
                break;
            case 'stats':
                window.location.href = \"/admin/statistiques\";
                break;
            case 'export':
                document.getElementById('exportPdfBtn').click();
                break;
            case 'help':
                const videoModal = new bootstrap.Modal(document.getElementById('helpVideoModal'));
                videoModal.show();
                break;
        }
    });
});

// ========== ÉVÉNEMENTS EXISTANTS ==========
document.getElementById('sortBy').addEventListener('change', function() {
    const val = this.value;
    if (!val) return;
    const [col, dir] = val.split('-');
    sortDirections[col] = dir === 'asc' ? 'desc' : 'asc';
    sortTable(col);
});
document.getElementById('searchInput').addEventListener('input', applyFilters);
document.getElementById('searchEmail').addEventListener('input', applyFilters);
document.getElementById('filterRole').addEventListener('change', applyFilters);
document.getElementById('filterRegion').addEventListener('change', applyFilters);
document.getElementById('prevPageBtn').addEventListener('click', goToPrevPage);
document.getElementById('nextPageBtn').addEventListener('click', goToNextPage);

// Initialisation
applyFilters();
</script>
{% endblock %}", "utilisateur/index_admin.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\utilisateur\\index_admin.html.twig");
    }
}

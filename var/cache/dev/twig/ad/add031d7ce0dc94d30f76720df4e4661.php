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

/* admin_commandes/calculator.html.twig */
class __TwigTemplate_4dd70552f131d4622fd56d75603dadb3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_commandes/calculator.html.twig"));

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

        yield "Calculator";
        
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
    .calculator-page {
        color: #2c1a1d;
    }

    .calculator-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .calculator-title {
        font-size: 30px;
        font-weight: 800;
        color: #8B0000;
    }

    .back-btn {
        background: #f5ebe5;
        color: #8B0000;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 700;
        text-decoration: none;
    }

    .back-btn:hover {
        color: #8B0000;
        background: #efe0d8;
    }

    .calculator-card {
        background: #ffffff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 22px;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.04);
    }

    .calculator-card-header {
        padding: 18px 20px;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        font-size: 18px;
        font-weight: 800;
    }

    .calculator-card-body {
        padding: 20px;
        background: #fffdfb;
    }

    .form-label {
        color: #5c2b31;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control {
        background: #ffffff;
        border: 1px solid #dcc7bf;
        color: #2c1a1d;
        border-radius: 12px;
        min-height: 48px;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #A52A2A;
        box-shadow: 0 0 0 0.2rem rgba(165, 42, 42, 0.12);
    }

    .calc-btn {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 20px;
        font-weight: 800;
        min-width: 180px;
    }

    .calc-btn:hover {
        color: white;
        opacity: 0.95;
    }

    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }

    .result-box {
        background: #fff7f2;
        border: 1px dashed #c88d82;
        border-radius: 16px;
        padding: 18px;
        text-align: center;
    }

    .result-label {
        display: block;
        font-size: 15px;
        color: #6b4a4a;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .result-value {
        font-size: 30px;
        font-weight: 900;
        color: #8B0000;
    }

    .break-even-box {
        margin-top: 22px;
        text-align: center;
        background: #fff;
        border: 1px solid #ead9d2;
        border-radius: 16px;
        padding: 16px;
        font-size: 20px;
        font-weight: 800;
        color: #2c1a1d;
    }

    .break-even-box span {
        color: #1f8a46;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 145
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 146
        yield "<div class=\"calculator-page\">
    <div class=\"calculator-header\">
        <div class=\"calculator-title\">📊 Calculator</div>
        <a href=\"";
        // line 149
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_commandes_index");
        yield "\" class=\"back-btn\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"calculator-card\">
        <div class=\"calculator-card-header\">Paramètres</div>
        <div class=\"calculator-card-body\">
            <div class=\"row g-4\">
                <div class=\"col-md-4\">
                    <label class=\"form-label\">Delivery Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"deliveryCost\" value=\"7.7\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Return Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"returnCost\" value=\"3.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Fulfillment Cost (per confirmed)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"fulfillmentCost\" value=\"0.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Product Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"productCost\" value=\"26\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Lead Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"leadCost\" value=\"2.7\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Total Selling Price</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"sellingPrice\" value=\"59\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Confirmation Rate (%)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"confirmationRate\" value=\"70.8\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Delivery Rate (%)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"deliveryRate\" value=\"63.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Total Leads Received</label>
                    <input type=\"number\" step=\"1\" class=\"form-control\" id=\"totalLeads\" value=\"100\">
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <button type=\"button\" class=\"btn calc-btn\" onclick=\"calculateResults()\">
                    <i class=\"fas fa-calculator\"></i> Calculate
                </button>
            </div>
        </div>
    </div>

    <div class=\"calculator-card\">
        <div class=\"calculator-card-header\">Résultats</div>
        <div class=\"calculator-card-body\">
            <div class=\"results-grid\">
                <div class=\"result-box\">
                    <span class=\"result-label\">Confirmed Leads</span>
                    <div class=\"result-value\" id=\"confirmedLeads\">70.80</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Delivered Leads</span>
                    <div class=\"result-value\" id=\"deliveredLeads\">44.75</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Profit Per Unit</span>
                    <div class=\"result-value\" id=\"profitPerUnit\">17.09</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Total Profit</span>
                    <div class=\"result-value\" id=\"totalProfit\">764.53</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Lead Cost Per Delivered</span>
                    <div class=\"result-value\" id=\"leadCostPerDelivered\">6.03</div>
                </div>
            </div>

            <div class=\"break-even-box\">
                Break-Even Lead Cost: <span id=\"breakEvenLeadCost\">10.35</span> TND
            </div>
        </div>
    </div>
</div>

<script>
function n(id) {
    return parseFloat(document.getElementById(id).value) || 0;
}

function setText(id, value) {
    document.getElementById(id).textContent = value;
}

function calculateResults() {
    const deliveryCost = n('deliveryCost');
    const returnCost = n('returnCost');
    const fulfillmentCost = n('fulfillmentCost');
    const productCost = n('productCost');
    const leadCost = n('leadCost');
    const sellingPrice = n('sellingPrice');
    const confirmationRate = n('confirmationRate') / 100;
    const deliveryRate = n('deliveryRate') / 100;
    const totalLeads = n('totalLeads');

    const confirmedLeads = totalLeads * confirmationRate;
    const deliveredLeads = confirmedLeads * deliveryRate;
    const returnedLeads = confirmedLeads - deliveredLeads;

    const revenue = deliveredLeads * sellingPrice;
    const productExpense = confirmedLeads * productCost;
    const deliveryExpense = deliveredLeads * deliveryCost;
    const returnExpense = returnedLeads * returnCost;
    const fulfillmentExpense = confirmedLeads * fulfillmentCost;
    const leadExpense = totalLeads * leadCost;

    const totalProfit = revenue - productExpense - deliveryExpense - returnExpense - fulfillmentExpense - leadExpense;
    const profitPerUnit = deliveredLeads > 0 ? totalProfit / deliveredLeads : 0;
    const leadCostPerDelivered = deliveredLeads > 0 ? leadExpense / deliveredLeads : 0;

    const breakEvenLeadCost = totalLeads > 0
        ? (
            revenue
            - productExpense
            - deliveryExpense
            - returnExpense
            - fulfillmentExpense
          ) / totalLeads
        : 0;

    setText('confirmedLeads', confirmedLeads.toFixed(2));
    setText('deliveredLeads', deliveredLeads.toFixed(2));
    setText('profitPerUnit', profitPerUnit.toFixed(2));
    setText('totalProfit', totalProfit.toFixed(2));
    setText('leadCostPerDelivered', leadCostPerDelivered.toFixed(2));
    setText('breakEvenLeadCost', breakEvenLeadCost.toFixed(2));
}

document.addEventListener('DOMContentLoaded', calculateResults);
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
        return "admin_commandes/calculator.html.twig";
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
        return array (  247 => 149,  242 => 146,  232 => 145,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_admin.html.twig' %}

{% block admin_title %}Calculator{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .calculator-page {
        color: #2c1a1d;
    }

    .calculator-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .calculator-title {
        font-size: 30px;
        font-weight: 800;
        color: #8B0000;
    }

    .back-btn {
        background: #f5ebe5;
        color: #8B0000;
        border: 1px solid #dcc7bf;
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 700;
        text-decoration: none;
    }

    .back-btn:hover {
        color: #8B0000;
        background: #efe0d8;
    }

    .calculator-card {
        background: #ffffff;
        border: 1px solid #ead9d2;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 22px;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.04);
    }

    .calculator-card-header {
        padding: 18px 20px;
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        font-size: 18px;
        font-weight: 800;
    }

    .calculator-card-body {
        padding: 20px;
        background: #fffdfb;
    }

    .form-label {
        color: #5c2b31;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control {
        background: #ffffff;
        border: 1px solid #dcc7bf;
        color: #2c1a1d;
        border-radius: 12px;
        min-height: 48px;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #A52A2A;
        box-shadow: 0 0 0 0.2rem rgba(165, 42, 42, 0.12);
    }

    .calc-btn {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%);
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 20px;
        font-weight: 800;
        min-width: 180px;
    }

    .calc-btn:hover {
        color: white;
        opacity: 0.95;
    }

    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }

    .result-box {
        background: #fff7f2;
        border: 1px dashed #c88d82;
        border-radius: 16px;
        padding: 18px;
        text-align: center;
    }

    .result-label {
        display: block;
        font-size: 15px;
        color: #6b4a4a;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .result-value {
        font-size: 30px;
        font-weight: 900;
        color: #8B0000;
    }

    .break-even-box {
        margin-top: 22px;
        text-align: center;
        background: #fff;
        border: 1px solid #ead9d2;
        border-radius: 16px;
        padding: 16px;
        font-size: 20px;
        font-weight: 800;
        color: #2c1a1d;
    }

    .break-even-box span {
        color: #1f8a46;
    }
</style>
{% endblock %}

{% block admin_content %}
<div class=\"calculator-page\">
    <div class=\"calculator-header\">
        <div class=\"calculator-title\">📊 Calculator</div>
        <a href=\"{{ path('app_admin_commandes_index') }}\" class=\"back-btn\">
            <i class=\"fas fa-arrow-left\"></i> Retour
        </a>
    </div>

    <div class=\"calculator-card\">
        <div class=\"calculator-card-header\">Paramètres</div>
        <div class=\"calculator-card-body\">
            <div class=\"row g-4\">
                <div class=\"col-md-4\">
                    <label class=\"form-label\">Delivery Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"deliveryCost\" value=\"7.7\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Return Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"returnCost\" value=\"3.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Fulfillment Cost (per confirmed)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"fulfillmentCost\" value=\"0.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Product Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"productCost\" value=\"26\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Lead Cost</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"leadCost\" value=\"2.7\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Total Selling Price</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"sellingPrice\" value=\"59\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Confirmation Rate (%)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"confirmationRate\" value=\"70.8\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Delivery Rate (%)</label>
                    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"deliveryRate\" value=\"63.2\">
                </div>

                <div class=\"col-md-4\">
                    <label class=\"form-label\">Total Leads Received</label>
                    <input type=\"number\" step=\"1\" class=\"form-control\" id=\"totalLeads\" value=\"100\">
                </div>
            </div>

            <div class=\"text-center mt-4\">
                <button type=\"button\" class=\"btn calc-btn\" onclick=\"calculateResults()\">
                    <i class=\"fas fa-calculator\"></i> Calculate
                </button>
            </div>
        </div>
    </div>

    <div class=\"calculator-card\">
        <div class=\"calculator-card-header\">Résultats</div>
        <div class=\"calculator-card-body\">
            <div class=\"results-grid\">
                <div class=\"result-box\">
                    <span class=\"result-label\">Confirmed Leads</span>
                    <div class=\"result-value\" id=\"confirmedLeads\">70.80</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Delivered Leads</span>
                    <div class=\"result-value\" id=\"deliveredLeads\">44.75</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Profit Per Unit</span>
                    <div class=\"result-value\" id=\"profitPerUnit\">17.09</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Total Profit</span>
                    <div class=\"result-value\" id=\"totalProfit\">764.53</div>
                </div>

                <div class=\"result-box\">
                    <span class=\"result-label\">Lead Cost Per Delivered</span>
                    <div class=\"result-value\" id=\"leadCostPerDelivered\">6.03</div>
                </div>
            </div>

            <div class=\"break-even-box\">
                Break-Even Lead Cost: <span id=\"breakEvenLeadCost\">10.35</span> TND
            </div>
        </div>
    </div>
</div>

<script>
function n(id) {
    return parseFloat(document.getElementById(id).value) || 0;
}

function setText(id, value) {
    document.getElementById(id).textContent = value;
}

function calculateResults() {
    const deliveryCost = n('deliveryCost');
    const returnCost = n('returnCost');
    const fulfillmentCost = n('fulfillmentCost');
    const productCost = n('productCost');
    const leadCost = n('leadCost');
    const sellingPrice = n('sellingPrice');
    const confirmationRate = n('confirmationRate') / 100;
    const deliveryRate = n('deliveryRate') / 100;
    const totalLeads = n('totalLeads');

    const confirmedLeads = totalLeads * confirmationRate;
    const deliveredLeads = confirmedLeads * deliveryRate;
    const returnedLeads = confirmedLeads - deliveredLeads;

    const revenue = deliveredLeads * sellingPrice;
    const productExpense = confirmedLeads * productCost;
    const deliveryExpense = deliveredLeads * deliveryCost;
    const returnExpense = returnedLeads * returnCost;
    const fulfillmentExpense = confirmedLeads * fulfillmentCost;
    const leadExpense = totalLeads * leadCost;

    const totalProfit = revenue - productExpense - deliveryExpense - returnExpense - fulfillmentExpense - leadExpense;
    const profitPerUnit = deliveredLeads > 0 ? totalProfit / deliveredLeads : 0;
    const leadCostPerDelivered = deliveredLeads > 0 ? leadExpense / deliveredLeads : 0;

    const breakEvenLeadCost = totalLeads > 0
        ? (
            revenue
            - productExpense
            - deliveryExpense
            - returnExpense
            - fulfillmentExpense
          ) / totalLeads
        : 0;

    setText('confirmedLeads', confirmedLeads.toFixed(2));
    setText('deliveredLeads', deliveredLeads.toFixed(2));
    setText('profitPerUnit', profitPerUnit.toFixed(2));
    setText('totalProfit', totalProfit.toFixed(2));
    setText('leadCostPerDelivered', leadCostPerDelivered.toFixed(2));
    setText('breakEvenLeadCost', breakEvenLeadCost.toFixed(2));
}

document.addEventListener('DOMContentLoaded', calculateResults);
</script>
{% endblock %}", "admin_commandes/calculator.html.twig", "C:\\Users\\benot\\Desktop\\ReverseEngineering 2 (2)\\ReverseEngineering\\templates\\admin_commandes\\calculator.html.twig");
    }
}

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

/* pages/admin/rules/index.html.twig */
class __TwigTemplate_36e9d15f5da19b813f1423cc765c18e4 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 32
        yield "
";
        // line 33
        yield Twig\Extension\CoreExtension::include($this->env, $context, "pages/admin/rules/backup_header.html.twig");
        yield "

<div class=\"row\">
    <div class=\"col-12 col-lg-6\">
        <ul class=\"process-chart\">
            <li class=\"align-items-center d-flex justify-content-center my-4 pb-6 fs-1 fw-bold\">
                <i class=\"ti ti-cloud-download me-1\"></i>
                <span>";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Inventory rules"), "html", null, true);
        yield "</span>
            </li>

            <li class=\"entry-point\">
                <span class=\"icon-stack fa-2x\">
                    <i class=\"ti ti-circle-dashed\"></i>
                    <i class=\"ti ti-robot sm-size\"></i>
                </span>
                <span>";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Agent sends an inventory file"), "html", null, true);
        yield "</span>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("RuleDefineItemtype"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleDefineItemtype"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Transform itemtypes"), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Override the asset to another custom definition (like Servers)"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("RuleImportEntity"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleImportEntity"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Rules for assigning an item to an entity"), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Set an entity with some criteria (by its tag for example)"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("RuleLocation"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleLocation"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Location rules"), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Apply a location by checking common criteria"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("RuleImportAsset"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleImportAsset"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Rules for import and link equipments"), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Match data with an existing asset, create a new asset, or deny the import"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/front/dictionnary.php"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleDictionnaryDropdownCollection"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_n("Dictionary", "Dictionaries", Session::getPluralNumber()), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Normalize sub-data (like softwares, OS and models)"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"step\">
                <a class=\"btn flex-column\" href=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("RuleAsset"), "html", null, true);
        yield "\">
                    <div class=\"d-flex align-items-center\">
                        <i class=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeIcon("RuleAsset"), "html", null, true);
        yield "\"></i>
                        <span>";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Business rules for assets"), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"text-muted\">
                        ";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Alter asset fields based on their data"), "html", null, true);
        yield "
                    </div>
                </a>
            </li>

            <li class=\"end\">
                <i class=\"ti ti-circle-check me-1 fa-2x\"></i>
                <span>";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The asset is created or updated in GLPI"), "html", null, true);
        yield "</span>
            </li>
        </ul>
    </div>

    <div class=\"col-12 col-lg-6\">
        ";
        // line 131
        yield from $this->load("pages/admin/rules/collections_list.html.twig", 131)->unwrap()->yield(CoreExtension::toArray(["rules_group" =>         // line 132
($context["rules_group"] ?? null)]));
        // line 134
        yield "    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/rules/index.html.twig";
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
        return array (  230 => 134,  228 => 132,  227 => 131,  218 => 125,  208 => 118,  202 => 115,  198 => 114,  193 => 112,  184 => 106,  178 => 103,  174 => 102,  169 => 100,  160 => 94,  154 => 91,  150 => 90,  145 => 88,  136 => 82,  130 => 79,  126 => 78,  121 => 76,  112 => 70,  106 => 67,  102 => 66,  97 => 64,  88 => 58,  82 => 55,  78 => 54,  73 => 52,  66 => 48,  55 => 40,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/rules/index.html.twig", "/var/www/glpi/templates/pages/admin/rules/index.html.twig");
    }
}

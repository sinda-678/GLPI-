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

/* pages/admin/profile/assistance_simple.html.twig */
class __TwigTemplate_903b77f558b25dc3191bba7d091a6960 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "pages/admin/profile/base_tab.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 34)->unwrap();
        // line 36
        $context["is_root_entity_active"] = Session::haveAccessToEntity(0);
        // line 33
        $this->parent = $this->load("pages/admin/profile/base_tab.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "    ";
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 39, $this->getSourceContext())->macro_smallTitle(...[__("ITIL Templates")]);
        yield "
    ";
        // line 40
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 40, $this->getSourceContext())->macro_dropdownField(...["TicketTemplate", "tickettemplates_id", (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 40)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["tickettemplates_id"] ?? null) : null), __("Default ticket template"), ["full_width" => true, "condition" => Twig\Extension\CoreExtension::merge(["entity" => 0], (((($tmp = Session::isMultiEntitiesMode()) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (["is_recursive" => 1]) : ([]))), "addicon" =>         // line 43
($context["is_root_entity_active"] ?? null)]]);
        // line 44
        yield "

    ";
        // line 46
        yield $this->getTemplateForMacro("macro_displayRightsMatrix", $context, 46, $this->getSourceContext())->macro_displayRightsMatrix(...[($context["item"] ?? null), "helpdesk", "tracking", "general", __("Assistance")]);
        yield "

    ";
        // line 48
        if (($this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("use_notifications") == "0")) {
            // line 49
            yield "        ";
            $context["activation_msg"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 50
                yield "            <span class=\"alert alert-warning\">
                ";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Notifications must be enabled to activate mentions."), "html", null, true);
                yield "
            </span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 54
            yield "        ";
            yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 54, $this->getSourceContext())->macro_htmlField(...["use_mentions", ($context["activation_msg"] ?? null), __("Mentions configuration"), ["full_width" => true]]);
            yield "
    ";
        } else {
            // line 56
            yield "        ";
            $context["user_mention_helper"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 57
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Enables or disables the ability to mention users within the application."), "html", null, true);
                yield "
            ";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((__("Disabled") . ": ") . __("User mentions are disabled for this profile.")), "html", null, true);
                yield "
            ";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((__("Full") . ": ") . __("Displays all users. Mentioned users will be added as observers if they are not already actors.")), "html", null, true);
                yield "
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 61
            yield "        ";
            yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 61, $this->getSourceContext())->macro_dropdownArrayField(...["use_mentions", (($_v1 = CoreExtension::getAttribute($this->env, $this->source,             // line 63
($context["item"] ?? null), "fields", [], "any", false, false, false, 63)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["use_mentions"] ?? null) : null), [Twig\Extension\CoreExtension::constant("Glpi\\RichText\\UserMention::USER_MENTION_DISABLED") => __("Disabled"), Twig\Extension\CoreExtension::constant("Glpi\\RichText\\UserMention::USER_MENTION_FULL") => __("Full")], __("Mentions configuration"), ["helper" =>             // line 69
($context["user_mention_helper"] ?? null)]]);
            // line 70
            yield "
    ";
        }
        // line 72
        yield "
    ";
        // line 73
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 73, $this->getSourceContext())->macro_smallTitle(...[__("Association")]);
        yield "
    ";
        // line 74
        yield $macros["fields"]->getTemplateForMacro("macro_checkboxField", $context, 74, $this->getSourceContext())->macro_checkboxField(...["_show_group_hardware", (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 74)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["show_group_hardware"] ?? null) : null), __("See hardware of my groups"), ["full_width" => true]]);
        // line 76
        yield "

    ";
        // line 78
        $context["helpdesk_hardware_field"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 79
            yield "        ";
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Profile::getLinearRightChoice", [$this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Profile::getHelpdeskHardwareTypes", [true]), ["field" => "helpdesk_hardware", "value" => (($_v3 = CoreExtension::getAttribute($this->env, $this->source,             // line 83
($context["item"] ?? null), "fields", [], "any", false, false, false, 83)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["helpdesk_hardware"] ?? null) : null)]]);
            // line 86
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 87
        yield "    ";
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 87, $this->getSourceContext())->macro_htmlField(...["helpdesk_hardware", ($context["helpdesk_hardware_field"] ?? null), __("Link with items for the creation of tickets"), ["full_width" => true]]);
        // line 89
        yield "

    ";
        // line 91
        $context["associable_types_field"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 92
            yield "        ";
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Profile::dropdownHelpdeskItemtypes", [["values" => (($_v4 = CoreExtension::getAttribute($this->env, $this->source,             // line 93
($context["item"] ?? null), "fields", [], "any", false, false, false, 93)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["helpdesk_item_type"] ?? null) : null)]]);
            // line 95
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 96
        yield "    ";
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 96, $this->getSourceContext())->macro_htmlField(...["helpdesk_item_type", ($context["associable_types_field"] ?? null), __("Associable items to tickets, changes and problems"), ["full_width" => true]]);
        // line 98
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/profile/assistance_simple.html.twig";
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
        return array (  171 => 98,  168 => 96,  164 => 95,  162 => 93,  160 => 92,  158 => 91,  154 => 89,  151 => 87,  147 => 86,  145 => 83,  143 => 79,  141 => 78,  137 => 76,  135 => 74,  131 => 73,  128 => 72,  124 => 70,  122 => 69,  121 => 63,  119 => 61,  113 => 59,  109 => 58,  104 => 57,  101 => 56,  95 => 54,  88 => 51,  85 => 50,  82 => 49,  80 => 48,  75 => 46,  71 => 44,  69 => 43,  68 => 40,  63 => 39,  56 => 38,  51 => 33,  49 => 36,  47 => 34,  40 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/profile/assistance_simple.html.twig", "/var/www/glpi/templates/pages/admin/profile/assistance_simple.html.twig");
    }
}

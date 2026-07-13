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

/* pages/admin/entity/survey_config.html.twig */
class __TwigTemplate_de81ee0d6b6b539f6ed3040486a5a075 extends Template
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
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 33)->unwrap();
        // line 34
        yield "
";
        // line 35
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownNumberField", $context, 35, $this->getSourceContext())->macro_dropdownNumberField(...[("inquest_delay" . ($context["config_suffix"] ?? null)), ($context["inquest_delay"] ?? null), __("Create survey after"), ["full_width" => true, "min" => 1, "max" => 90, "unit" => "day", "toadd" => [__("As soon as possible")]]]);
        // line 43
        yield "

";
        // line 45
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownNumberField", $context, 45, $this->getSourceContext())->macro_dropdownNumberField(...[("inquest_rate" . ($context["config_suffix"] ?? null)), ($context["inquest_rate"] ?? null), __("Rate to trigger survey"), ["full_width" => true, "min" => 10, "max" => 100, "step" => 10, "unit" => "%", "toadd" => [__("Disabled")]]]);
        // line 54
        yield "

";
        // line 56
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownNumberField", $context, 56, $this->getSourceContext())->macro_dropdownNumberField(...[("inquest_duration" . ($context["config_suffix"] ?? null)), ($context["inquest_duration"] ?? null), __("Duration of survey"), ["full_width" => true, "min" => 1, "max" => Twig\Extension\CoreExtension::constant("Entity::MAX_INQUEST_DURATION_DAYS"), "unit" => "day", "toadd" => [__("Unspecified")]]]);
        // line 64
        yield "

";
        // line 66
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownNumberField", $context, 66, $this->getSourceContext())->macro_dropdownNumberField(...[("inquest_max_rate" . ($context["config_suffix"] ?? null)), ($context["inquest_max_rate"] ?? null), __("Max rate"), ["full_width" => true, "min" => 1, "max" => 10]]);
        // line 70
        yield "

";
        // line 72
        yield $macros["fields"]->getTemplateForMacro("macro_numberField", $context, 72, $this->getSourceContext())->macro_numberField(...[("inquest_default_rate" . ($context["config_suffix"] ?? null)), ($context["inquest_default_rate"] ?? null), __("Default rate"), ["full_width" => true, "min" => 1, "max" => 10]]);
        // line 76
        yield "

";
        // line 78
        yield $macros["fields"]->getTemplateForMacro("macro_numberField", $context, 78, $this->getSourceContext())->macro_numberField(...[("inquest_mandatory_comment" . ($context["config_suffix"] ?? null)), ($context["inquest_mandatory_comment"] ?? null), __("Comment required if score is <= to"), ["full_width" => true, "min" => 0, "max" => 10, "toadd" => [__("Disabled")]]]);
        // line 85
        yield "

";
        // line 87
        yield $macros["fields"]->getTemplateForMacro("macro_datetimeField", $context, 87, $this->getSourceContext())->macro_datetimeField(...[("max_closedate" . ($context["config_suffix"] ?? null)), ($context["max_closedate"] ?? null), Twig\Extension\CoreExtension::sprintf(__("For %s closed after"), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName(($context["itemtype"] ?? null), Session::getPluralNumber())), ["full_width" => true, "maybeempty" => true, "timestep" => 1]]);
        // line 91
        yield "

";
        // line 93
        $context["tag_prefix"] = Twig\Extension\CoreExtension::upper($this->env->getCharset(), ($context["itemtype"] ?? null));
        // line 94
        $context["ticket_only_tags"] = " [REQUESTTYPE_ID] [REQUESTTYPE_NAME] [TICKETTYPE_NAME] [TICKETTYPE_ID] [SLA_TTO_ID] [SLA_TTO_NAME] [SLA_TTR_ID] [SLA_TTR_NAME] [SLALEVEL_ID] [SLALEVEL_NAME]";
        // line 95
        $context["tags"] = (Twig\Extension\CoreExtension::join([(("[" .         // line 96
($context["tag_prefix"] ?? null)) . "_ID]"), (("[" . ($context["tag_prefix"] ?? null)) . "_NAME]"), (("[" . ($context["tag_prefix"] ?? null)) . "_CREATEDATE]"), (("[" . ($context["tag_prefix"] ?? null)) . "_SOLVEDATE]"), (("[" .         // line 97
($context["tag_prefix"] ?? null)) . "_PRIORITY]"), (("[" . ($context["tag_prefix"] ?? null)) . "_PRIORITYNAME]"), "[ITILCATEGORY_ID]", "[ITILCATEGORY_NAME]", "[SOLUTIONTYPE_ID]", "[SOLUTIONTYPE_NAME]"], " ") . (((        // line 99
($context["itemtype"] ?? null) == "Ticket")) ? (($context["ticket_only_tags"] ?? null)) : ("")));
        // line 100
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 100, $this->getSourceContext())->macro_htmlField(...["", $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["tags"] ?? null)), __("Valid tags"), ["full_width" => true, "add_field_class" => "valid_tags"]]);
        // line 103
        yield "
";
        // line 104
        yield $macros["fields"]->getTemplateForMacro("macro_textField", $context, 104, $this->getSourceContext())->macro_textField(...[("inquest_URL" . ($context["config_suffix"] ?? null)), ($context["inquest_URL"] ?? null), __("URL"), ["full_width" => true, "maxlength" => 255]]);
        // line 107
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/entity/survey_config.html.twig";
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
        return array (  108 => 107,  106 => 104,  103 => 103,  101 => 100,  99 => 99,  98 => 97,  97 => 96,  96 => 95,  94 => 94,  92 => 93,  88 => 91,  86 => 87,  82 => 85,  80 => 78,  76 => 76,  74 => 72,  70 => 70,  68 => 66,  64 => 64,  62 => 56,  58 => 54,  56 => 45,  52 => 43,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/entity/survey_config.html.twig", "/var/www/glpi/templates/pages/admin/entity/survey_config.html.twig");
    }
}

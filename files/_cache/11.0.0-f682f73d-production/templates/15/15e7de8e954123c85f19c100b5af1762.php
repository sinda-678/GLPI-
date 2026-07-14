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

/* pages/tools/reminder.html.twig */
class __TwigTemplate_c41639092270e3be882cf4ba6c877445 extends Template
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
            'form_fields' => [$this, 'block_form_fields'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "generic_show_form.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 34)->unwrap();
        // line 35
        $macros["inputs"] = $this->macros["inputs"] = $this->load("components/form/basic_inputs_macros.html.twig", 35)->unwrap();
        // line 33
        $this->parent = $this->load("generic_show_form.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "    ";
        if ((($tmp =  !($context["id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "        ";
            yield $macros["inputs"]->getTemplateForMacro("macro_hidden", $context, 39, $this->getSourceContext())->macro_hidden(...["users_id", (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 39)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["users_id"] ?? null) : null)]);
            yield "
    ";
        }
        // line 41
        yield "    ";
        if ((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "from_planning_edit_ajax", [], "array", true, true, false, 41) &&  !(null === (($_v1 = ($context["params"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["from_planning_edit_ajax"] ?? null) : null)))) ? ((($_v2 = ($context["params"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["from_planning_edit_ajax"] ?? null) : null)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "        ";
            yield $macros["inputs"]->getTemplateForMacro("macro_hidden", $context, 42, $this->getSourceContext())->macro_hidden(...["from_planning_edit_ajax", 1]);
            yield "
    ";
        }
        // line 44
        yield "
    ";
        // line 45
        yield $macros["fields"]->getTemplateForMacro("macro_textField", $context, 45, $this->getSourceContext())->macro_textField(...["name", (($_v3 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 45)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["name"] ?? null) : null), __("Title"), ["full_width" => true]]);
        // line 47
        yield "

    ";
        // line 49
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "from_planning_ajax", [], "array", true, true, false, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 50
            yield "        ";
            $context["visibility_fields"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 51
                yield "            ";
                yield $macros["fields"]->getTemplateForMacro("macro_datetimeField", $context, 51, $this->getSourceContext())->macro_datetimeField(...["begin_view_date", (($_v4 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 51)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["begin_view_date"] ?? null) : null), __("Begin"), ["clearable" => true, "readonly" =>  !(($_v5 =                 // line 53
($context["params"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["canedit"] ?? null) : null), "mb" => "", "is_horizontal" => false]]);
                // line 56
                yield "
            ";
                // line 57
                yield $macros["fields"]->getTemplateForMacro("macro_datetimeField", $context, 57, $this->getSourceContext())->macro_datetimeField(...["end_view_date", (($_v6 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 57)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["end_view_date"] ?? null) : null), __("End"), ["clearable" => true, "readonly" =>  !(($_v7 =                 // line 59
($context["params"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["canedit"] ?? null) : null), "mb" => "", "is_horizontal" => false]]);
                // line 62
                yield "
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 64
            yield "        ";
            yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 64, $this->getSourceContext())->macro_htmlField(...["", ($context["visibility_fields"] ?? null), __("Visibility"), ["full_width" => true, "wrapper_class" => "d-flex"]]);
            // line 67
            yield "
    ";
        }
        // line 69
        yield "
    ";
        // line 70
        $context["state_dropdown"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 71
            yield "        ";
            if ((($tmp = (($_v8 = ($context["params"] ?? null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["canedit"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 72
                yield "            ";
                $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Planning::dropdownState", ["state", (($_v9 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 72)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["state"] ?? null) : null)]);
                // line 73
                yield "        ";
            } else {
                // line 74
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Planning::getState", [(($_v10 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 74)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["state"] ?? null) : null)]), "html", null, true);
                yield "
        ";
            }
            // line 76
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 77
        yield "    ";
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 77, $this->getSourceContext())->macro_htmlField(...["", ($context["state_dropdown"] ?? null), __("Status"), ["full_width" => true]]);
        // line 79
        yield "

    ";
        // line 81
        $context["calendar_field"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 82
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "from_planning_ajax", [], "array", true, true, false, 82)) {
                // line 83
                yield "            ";
                yield $macros["inputs"]->getTemplateForMacro("macro_hidden", $context, 83, $this->getSourceContext())->macro_hidden(...["plan[begin]", (($_v11 = ($context["params"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["begin"] ?? null) : null)]);
                yield "
            ";
                // line 84
                yield $macros["inputs"]->getTemplateForMacro("macro_hidden", $context, 84, $this->getSourceContext())->macro_hidden(...["plan[end]", (($_v12 = ($context["params"] ?? null)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["end"] ?? null) : null)]);
                yield "
            ";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf(__("From %1\$s to %2\$s"), $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v13 = ($context["params"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["begin"] ?? null) : null)), $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v14 = ($context["params"] ?? null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["end"] ?? null) : null))), "html", null, true);
                yield "
        ";
            } else {
                // line 87
                yield "            ";
                if ((($tmp = (($_v15 = ($context["params"] ?? null)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["canedit"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 88
                    yield "                ";
                    $context["ajax_params"] = ["action" => "add_event_classic_form", "form" => "remind", "users_id" => (($_v16 = CoreExtension::getAttribute($this->env, $this->source,                     // line 91
($context["item"] ?? null), "fields", [], "any", false, false, false, 91)) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["users_id"] ?? null) : null), "itemtype" => CoreExtension::getAttribute($this->env, $this->source,                     // line 92
($context["item"] ?? null), "getType", [], "method", false, false, false, 92), "items_id" => CoreExtension::getAttribute($this->env, $this->source,                     // line 93
($context["item"] ?? null), "getID", [], "method", false, false, false, 93)];
                    // line 95
                    yield "                ";
                    if ((($context["id"] ?? null) && (($_v17 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 95)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["is_planned"] ?? null) : null))) {
                        // line 96
                        yield "                    ";
                        $context["ajax_params"] = Twig\Extension\CoreExtension::merge(($context["ajax_params"] ?? null), ["begin" => (($_v18 = CoreExtension::getAttribute($this->env, $this->source,                         // line 97
($context["item"] ?? null), "fields", [], "any", false, false, false, 97)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18["begin"] ?? null) : null), "end" => (($_v19 = CoreExtension::getAttribute($this->env, $this->source,                         // line 98
($context["item"] ?? null), "fields", [], "any", false, false, false, 98)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19["end"] ?? null) : null)]);
                        // line 100
                        yield "                ";
                    }
                    // line 101
                    yield "                <script>
                    function showPlan";
                    // line 102
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                    yield "() {
                        \$('#plan";
                    // line 103
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                    yield "').hide();
                        ";
                    // line 104
                    $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Ajax::updateItemJsCode", [("viewplan" . ($context["rand"] ?? null)), ($this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("root_doc") . "/ajax/planning.php"), ($context["ajax_params"] ?? null)]);
                    // line 105
                    yield "                    }
                </script>
            ";
                }
                // line 108
                yield "            ";
                if (( !($context["id"] ?? null) ||  !(($_v20 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 108)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20["is_planned"] ?? null) : null))) {
                    // line 109
                    yield "                ";
                    if (((Session::haveRight("planning", Twig\Extension\CoreExtension::constant("Planning::READMY")) || Session::haveRight("planning", Twig\Extension\CoreExtension::constant("Planning::READGROUP"))) || Session::haveRight("planning", Twig\Extension\CoreExtension::constant("Planning::READALL")))) {
                        // line 110
                        yield "                    <button id=\"plan";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                        yield "\" class=\"btn btn-primary\" type=\"button\" onclick=\"showPlan";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                        yield "()\">
                        ";
                        // line 111
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add to schedule"), "html", null, true);
                        yield "
                    </button>
                ";
                    }
                    // line 114
                    yield "            ";
                } else {
                    // line 115
                    yield "                ";
                    if ((($tmp = (($_v21 = ($context["params"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21["canedit"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 116
                        yield "                    <div id=\"plan";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                        yield " cursor-pointer\" onclick=\"showPlan";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                        yield "()\" role=\"button\">
                        <span class=\"fw-bold text-decoration-none text-success\">
                ";
                    }
                    // line 119
                    yield "                ";
                    if (( !Twig\Extension\CoreExtension::testEmpty((($_v22 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 119)) && is_array($_v22) || $_v22 instanceof ArrayAccess ? ($_v22["begin"] ?? null) : null)) ||  !Twig\Extension\CoreExtension::testEmpty((($_v23 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 119)) && is_array($_v23) || $_v23 instanceof ArrayAccess ? ($_v23["end"] ?? null) : null)))) {
                        // line 120
                        yield "                    ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf(__("From %1\$s to %2\$s"), $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v24 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 120)) && is_array($_v24) || $_v24 instanceof ArrayAccess ? ($_v24["begin"] ?? null) : null)), $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v25 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 120)) && is_array($_v25) || $_v25 instanceof ArrayAccess ? ($_v25["end"] ?? null) : null))), "html", null, true);
                        yield "
                    ";
                        // line 121
                        $context["reminder"] = (((($tmp = ($context["active_recall"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("PlanningRecall::getForItem", ["Reminder", ($context["id"] ?? null)])) : (null));
                        // line 122
                        yield "                    ";
                        $context["reminder_before"] = (((($tmp =  !(null === ($context["reminder"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDuration((($_v26 = CoreExtension::getAttribute($this->env, $this->source, ($context["reminder"] ?? null), "fields", [], "any", false, false, false, 122)) && is_array($_v26) || $_v26 instanceof ArrayAccess ? ($_v26["before_time"] ?? null) : null), false)) : (""));
                        // line 123
                        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["reminder_before"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 124
                            yield "(";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf(__("Reminder %1\$s"), ($context["reminder_before"] ?? null)), "html", null, true);
                            yield ")";
                        }
                    } else {
                        // line 127
                        yield "                    ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Not planned"), "html", null, true);
                        yield "
                ";
                    }
                    // line 129
                    yield "                ";
                    if ((($tmp = (($_v27 = ($context["params"] ?? null)) && is_array($_v27) || $_v27 instanceof ArrayAccess ? ($_v27["canedit"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 130
                        yield "                        </span>
                    </div>
                ";
                    }
                    // line 133
                    yield "            ";
                }
                // line 134
                yield "            ";
                if ((($tmp = (($_v28 = ($context["params"] ?? null)) && is_array($_v28) || $_v28 instanceof ArrayAccess ? ($_v28["canedit"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 135
                    yield "                <div id=\"viewplan";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
                    yield "\"></div>
            ";
                }
                // line 137
                yield "        ";
            }
            // line 138
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 139
        yield "    ";
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 139, $this->getSourceContext())->macro_htmlField(...["", ($context["calendar_field"] ?? null), _n("Calendar", "Calendars", 1), ["full_width" => true]]);
        // line 141
        yield "

    ";
        // line 143
        yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 143, $this->getSourceContext())->macro_textareaField(...["text", $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml((($_v29 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 143)) && is_array($_v29) || $_v29 instanceof ArrayAccess ? ($_v29["text"] ?? null) : null)), __("Description"), ["full_width" => true, "enable_richtext" => true, "enable_fileupload" => true]]);
        // line 147
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/tools/reminder.html.twig";
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
        return array (  302 => 147,  300 => 143,  296 => 141,  293 => 139,  289 => 138,  286 => 137,  280 => 135,  277 => 134,  274 => 133,  269 => 130,  266 => 129,  260 => 127,  254 => 124,  252 => 123,  249 => 122,  247 => 121,  242 => 120,  239 => 119,  230 => 116,  227 => 115,  224 => 114,  218 => 111,  211 => 110,  208 => 109,  205 => 108,  200 => 105,  198 => 104,  194 => 103,  190 => 102,  187 => 101,  184 => 100,  182 => 98,  181 => 97,  179 => 96,  176 => 95,  174 => 93,  173 => 92,  172 => 91,  170 => 88,  167 => 87,  162 => 85,  158 => 84,  153 => 83,  150 => 82,  148 => 81,  144 => 79,  141 => 77,  137 => 76,  131 => 74,  128 => 73,  125 => 72,  122 => 71,  120 => 70,  117 => 69,  113 => 67,  110 => 64,  105 => 62,  103 => 59,  102 => 57,  99 => 56,  97 => 53,  95 => 51,  92 => 50,  90 => 49,  86 => 47,  84 => 45,  81 => 44,  75 => 42,  72 => 41,  66 => 39,  63 => 38,  56 => 37,  51 => 33,  49 => 35,  47 => 34,  40 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/tools/reminder.html.twig", "/var/www/glpi/templates/pages/tools/reminder.html.twig");
    }
}

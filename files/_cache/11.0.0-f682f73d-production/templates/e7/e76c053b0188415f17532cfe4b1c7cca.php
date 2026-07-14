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

/* pages/admin/entity/assets.html.twig */
class __TwigTemplate_2930734073e65b9d51e866ce0d0a95d8 extends Template
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
            'more_fields' => [$this, 'block_more_fields'],
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
        $context["params"] = (((array_key_exists("params", $context) &&  !(null === $context["params"]))) ? ($context["params"]) : ([]));
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
        yield "   ";
        yield from $this->unwrap()->yieldBlock('more_fields', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_more_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_largeTitle", $context, 39, $this->getSourceContext())->macro_largeTitle(...[__("Autofill dates for financial and administrative information")]);
        yield "
      ";
        // line 40
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 40, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_buy_date", (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 40)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["autofill_buy_date"] ?? null) : null), ($context["status_options"] ?? null), __("Date of purchase"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 41
($context["inheritance_labels"] ?? null), "autofill_buy_date", [], "array", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default((($_v1 = ($context["inheritance_labels"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["autofill_buy_date"] ?? null) : null), null)) : (null))]]);
        // line 42
        yield "
      ";
        // line 44
        yield "      ";
        $context["status_options"] = (($context["status_options"] ?? null) + [Twig\Extension\CoreExtension::constant("Infocom::COPY_BUY_DATE") => __("Copy the date of purchase")]);
        // line 47
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 47, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_order_date", (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 47)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["autofill_order_date"] ?? null) : null), ($context["status_options"] ?? null), __("Order date"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 48
($context["inheritance_labels"] ?? null), "autofill_order_date", [], "array", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default((($_v3 = ($context["inheritance_labels"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["autofill_order_date"] ?? null) : null), null)) : (null))]]);
        // line 49
        yield "
      ";
        // line 50
        $context["status_options"] = (($context["status_options"] ?? null) + [Twig\Extension\CoreExtension::constant("Infocom::COPY_ORDER_DATE") => __("Copy the order date")]);
        // line 53
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 53, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_delivery_date", (($_v4 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 53)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["autofill_delivery_date"] ?? null) : null), ($context["status_options"] ?? null), __("Delivery date"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 54
($context["inheritance_labels"] ?? null), "autofill_delivery_date", [], "array", true, true, false, 54)) ? (Twig\Extension\CoreExtension::default((($_v5 = ($context["inheritance_labels"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["autofill_delivery_date"] ?? null) : null), null)) : (null))]]);
        // line 55
        yield "
      ";
        // line 56
        $context["status_options"] = (($context["status_options"] ?? null) + [Twig\Extension\CoreExtension::constant("Infocom::COPY_DELIVERY_DATE") => __("Copy the delivery date")]);
        // line 59
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 59, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_use_date", (($_v6 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 59)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["autofill_use_date"] ?? null) : null), ($context["status_options"] ?? null), __("Startup date"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 60
($context["inheritance_labels"] ?? null), "autofill_use_date", [], "array", true, true, false, 60)) ? (Twig\Extension\CoreExtension::default((($_v7 = ($context["inheritance_labels"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["autofill_use_date"] ?? null) : null), null)) : (null))]]);
        // line 61
        yield "
      ";
        // line 62
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 62, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_warranty_date", (($_v8 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 62)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["autofill_warranty_date"] ?? null) : null), ($context["warranty_options"] ?? null), __("Start date of warranty"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 63
($context["inheritance_labels"] ?? null), "autofill_warranty_date", [], "array", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default((($_v9 = ($context["inheritance_labels"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["autofill_warranty_date"] ?? null) : null), null)) : (null))]]);
        // line 64
        yield "
      ";
        // line 65
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 65, $this->getSourceContext())->macro_dropdownArrayField(...["autofill_decommission_date", (($_v10 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 65)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["autofill_decommission_date"] ?? null) : null), ($context["decom_options"] ?? null), __("Decommission date"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 66
($context["inheritance_labels"] ?? null), "autofill_decommission_date", [], "array", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default((($_v11 = ($context["inheritance_labels"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["autofill_decommission_date"] ?? null) : null), null)) : (null))]]);
        // line 67
        yield "

      ";
        // line 69
        yield $macros["fields"]->getTemplateForMacro("macro_largeTitle", $context, 69, $this->getSourceContext())->macro_largeTitle(...[$this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Software")]);
        yield "
      ";
        // line 70
        $context["to_add"] = [Twig\Extension\CoreExtension::constant("Entity::CONFIG_NEVER") => __("No change of entity")];
        // line 73
        yield "      ";
        if (((($_v12 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 73)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["id"] ?? null) : null) > 0)) {
            // line 74
            yield "         ";
            $context["to_add"] = (($context["to_add"] ?? null) + [Twig\Extension\CoreExtension::constant("Entity::CONFIG_PARENT") => __("Inheritance of the parent entity")]);
            // line 77
            yield "      ";
        }
        // line 78
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 78, $this->getSourceContext())->macro_dropdownField(...["Entity", "entities_id_software", (($_v13 = CoreExtension::getAttribute($this->env, $this->source,         // line 81
($context["item"] ?? null), "fields", [], "any", false, false, false, 81)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["entities_id_software"] ?? null) : null), __("Entity for software creation"), ["toadd" =>         // line 84
($context["to_add"] ?? null), "entity" =>         // line 85
($context["entities"] ?? null), "comments" => false, "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 87
($context["inheritance_labels"] ?? null), "entities_id_software", [], "array", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default((($_v14 = ($context["inheritance_labels"] ?? null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["entities_id_software"] ?? null) : null), null)) : (null))]]);
        // line 89
        yield "

      ";
        // line 91
        yield $macros["fields"]->getTemplateForMacro("macro_largeTitle", $context, 91, $this->getSourceContext())->macro_largeTitle(...[__("Transfer")]);
        yield "
      ";
        // line 92
        $context["to_add"] = [Twig\Extension\CoreExtension::constant("Entity::CONFIG_NEVER") => __("No automatic transfer")];
        // line 95
        yield "      ";
        if (((($_v15 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 95)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["id"] ?? null) : null) > 0)) {
            // line 96
            yield "         ";
            $context["to_add"] = (($context["to_add"] ?? null) + [Twig\Extension\CoreExtension::constant("Entity::CONFIG_PARENT") => __("Inheritance of the parent entity")]);
            // line 99
            yield "      ";
        }
        // line 100
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 100, $this->getSourceContext())->macro_dropdownField(...["Transfer", "transfers_id", (($_v16 = CoreExtension::getAttribute($this->env, $this->source,         // line 103
($context["item"] ?? null), "fields", [], "any", false, false, false, 103)) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["transfers_id"] ?? null) : null), __("Model for automatic entity transfer on inventories"), ["toadd" =>         // line 106
($context["to_add"] ?? null), "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 107
($context["inheritance_labels"] ?? null), "transfers_id", [], "array", true, true, false, 107)) ? (Twig\Extension\CoreExtension::default((($_v17 = ($context["inheritance_labels"] ?? null)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["transfers_id"] ?? null) : null), null)) : (null)), "display_emptychoice" => false]]);
        // line 110
        yield "

      ";
        // line 112
        yield $macros["fields"]->getTemplateForMacro("macro_largeTitle", $context, 112, $this->getSourceContext())->macro_largeTitle(...[__("Automatic inventory")]);
        yield "
      ";
        // line 113
        yield $macros["fields"]->getTemplateForMacro("macro_textField", $context, 113, $this->getSourceContext())->macro_textField(...["agent_base_url", (($_v18 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 113)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18["agent_base_url"] ?? null) : null), __("Agent base URL"), ["add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,         // line 114
($context["inheritance_labels"] ?? null), "agent_base_url", [], "array", true, true, false, 114)) ? (Twig\Extension\CoreExtension::default((($_v19 = ($context["inheritance_labels"] ?? null)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19["agent_base_url"] ?? null) : null), null)) : (null))]]);
        // line 115
        yield "

      ";
        // line 117
        yield $macros["fields"]->getTemplateForMacro("macro_largeTitle", $context, 117, $this->getSourceContext())->macro_largeTitle(...[__("Automatically update of the elements related to the computers")]);
        yield "
      ";
        // line 118
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 118, $this->getSourceContext())->macro_smallTitle(...[__("Unit management")]);
        yield "
      ";
        // line 119
        $context["matrix_columns"] = ["contact" => __("Alternate username"), "user" => $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("User", 1), "group" => $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Group", 1), "location" => $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Location", 1), "status" => __("Status")];
        // line 126
        yield "      ";
        $context["connect_opts"] = [__("Do not copy"), __("Copy")];
        // line 130
        yield "      ";
        $context["disconnect_opts"] = [__("Do not delete"), __("Delete")];
        // line 134
        yield "      ";
        if (((($_v20 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 134)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20["id"] ?? null) : null) > 0)) {
            // line 135
            yield "         ";
            $context["connect_opts"] = (($context["connect_opts"] ?? null) + [Twig\Extension\CoreExtension::constant("Entity::CONFIG_PARENT") => __("Inheritance of the parent entity")]);
            // line 138
            yield "         ";
            $context["disconnect_opts"] = (($context["disconnect_opts"] ?? null) + [Twig\Extension\CoreExtension::constant("Entity::CONFIG_PARENT") => __("Inheritance of the parent entity")]);
            // line 141
            yield "      ";
        }
        // line 142
        yield "
      <table class=\"table table-borderless table-sm\">
         <thead>
            <tr>
               <th></th>
               ";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["matrix_columns"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 148
            yield "                  <th>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["col"], "html", null, true);
            yield "</th>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['col'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "            </tr>
         </thead>
         <tbody>
            <tr>
               <td>";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("When connecting or updating the relevant field"), "html", null, true);
        yield "</td>
               ";
        // line 155
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["matrix_columns"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["col"]) {
            // line 156
            yield "                  <td>
                     ";
            // line 157
            if (($context["k"] == "status")) {
                // line 158
                yield "                        ";
                $context["dropdown"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 159
                    yield "                           ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("State::dropdownBehaviour", ["state_autoupdate_mode", __("Copy computer status"), (($_v21 = CoreExtension::getAttribute($this->env, $this->source,                     // line 162
($context["item"] ?? null), "fields", [], "any", false, false, false, 162)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21["state_autoupdate_mode"] ?? null) : null), ((($_v22 = CoreExtension::getAttribute($this->env, $this->source,                     // line 163
($context["item"] ?? null), "fields", [], "any", false, false, false, 163)) && is_array($_v22) || $_v22 instanceof ArrayAccess ? ($_v22["id"] ?? null) : null) > 0)]), "html", null, true);
                    // line 164
                    yield "
                        ";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 166
                yield "                        ";
                yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 166, $this->getSourceContext())->macro_htmlField(...["state_autoupdate_mode", ($context["dropdown"] ?? null), "", ["no_label" => true, "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 168
($context["inheritance_labels"] ?? null), "state_autoupdate_mode", [], "array", true, true, false, 168)) ? (Twig\Extension\CoreExtension::default((($_v23 = ($context["inheritance_labels"] ?? null)) && is_array($_v23) || $_v23 instanceof ArrayAccess ? ($_v23["state_autoupdate_mode"] ?? null) : null), null)) : (null)), "full_width" => true, "wrapper_class" => ""]]);
                // line 171
                yield "
                     ";
            } else {
                // line 173
                yield "                        ";
                $context["field_name"] = (("is_" . $context["k"]) . "_autoupdate");
                // line 174
                yield "                        ";
                yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 174, $this->getSourceContext())->macro_dropdownArrayField(...[($context["field_name"] ?? null), (($_v24 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 174)) && is_array($_v24) || $_v24 instanceof ArrayAccess ? ($_v24[($context["field_name"] ?? null)] ?? null) : null), ($context["connect_opts"] ?? null), "", ["no_label" => true, "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 176
($context["inheritance_labels"] ?? null), ($context["field_name"] ?? null), [], "array", true, true, false, 176)) ? (Twig\Extension\CoreExtension::default((($_v25 = ($context["inheritance_labels"] ?? null)) && is_array($_v25) || $_v25 instanceof ArrayAccess ? ($_v25[($context["field_name"] ?? null)] ?? null) : null), null)) : (null)), "full_width" => true]]);
                // line 178
                yield "
                     ";
            }
            // line 180
            yield "                  </td>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['k'], $context['col'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        yield "            </tr>
            <tr>
               <td>";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("When disconnecting"), "html", null, true);
        yield "</td>
               ";
        // line 185
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["matrix_columns"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["col"]) {
            // line 186
            yield "                  <td>
                     ";
            // line 187
            if (($context["k"] == "status")) {
                // line 188
                yield "                        ";
                $context["dropdown"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 189
                    yield "                           ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("State::dropdownBehaviour", ["state_autoclean_mode", __("Clear status"), (($_v26 = CoreExtension::getAttribute($this->env, $this->source,                     // line 192
($context["item"] ?? null), "fields", [], "any", false, false, false, 192)) && is_array($_v26) || $_v26 instanceof ArrayAccess ? ($_v26["state_autoclean_mode"] ?? null) : null), ((($_v27 = CoreExtension::getAttribute($this->env, $this->source,                     // line 193
($context["item"] ?? null), "fields", [], "any", false, false, false, 193)) && is_array($_v27) || $_v27 instanceof ArrayAccess ? ($_v27["id"] ?? null) : null) > 0)]), "html", null, true);
                    // line 194
                    yield "
                        ";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 196
                yield "                        ";
                yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 196, $this->getSourceContext())->macro_htmlField(...["state_autoclean_mode", ($context["dropdown"] ?? null), "", ["no_label" => true, "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 198
($context["inheritance_labels"] ?? null), "state_autoclean_mode", [], "array", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default((($_v28 = ($context["inheritance_labels"] ?? null)) && is_array($_v28) || $_v28 instanceof ArrayAccess ? ($_v28["state_autoclean_mode"] ?? null) : null), null)) : (null)), "full_width" => true, "wrapper_class" => ""]]);
                // line 201
                yield "
                     ";
            } else {
                // line 203
                yield "                        ";
                $context["field_name"] = (("is_" . $context["k"]) . "_autoclean");
                // line 204
                yield "                        ";
                yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 204, $this->getSourceContext())->macro_dropdownArrayField(...[($context["field_name"] ?? null), (($_v29 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 204)) && is_array($_v29) || $_v29 instanceof ArrayAccess ? ($_v29[($context["field_name"] ?? null)] ?? null) : null), ($context["disconnect_opts"] ?? null), "", ["no_label" => true, "add_field_html" => ((CoreExtension::getAttribute($this->env, $this->source,                 // line 206
($context["inheritance_labels"] ?? null), ($context["field_name"] ?? null), [], "array", true, true, false, 206)) ? (Twig\Extension\CoreExtension::default((($_v30 = ($context["inheritance_labels"] ?? null)) && is_array($_v30) || $_v30 instanceof ArrayAccess ? ($_v30[($context["field_name"] ?? null)] ?? null) : null), null)) : (null)), "full_width" => true]]);
                // line 208
                yield "
                     ";
            }
            // line 210
            yield "                  </td>
               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['k'], $context['col'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 212
        yield "            </tr>
         </tbody>
      </table>

   ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/entity/assets.html.twig";
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
        return array (  352 => 212,  345 => 210,  341 => 208,  339 => 206,  337 => 204,  334 => 203,  330 => 201,  328 => 198,  326 => 196,  321 => 194,  319 => 193,  318 => 192,  316 => 189,  313 => 188,  311 => 187,  308 => 186,  304 => 185,  300 => 184,  296 => 182,  289 => 180,  285 => 178,  283 => 176,  281 => 174,  278 => 173,  274 => 171,  272 => 168,  270 => 166,  265 => 164,  263 => 163,  262 => 162,  260 => 159,  257 => 158,  255 => 157,  252 => 156,  248 => 155,  244 => 154,  238 => 150,  229 => 148,  225 => 147,  218 => 142,  215 => 141,  212 => 138,  209 => 135,  206 => 134,  203 => 130,  200 => 126,  198 => 119,  194 => 118,  190 => 117,  186 => 115,  184 => 114,  183 => 113,  179 => 112,  175 => 110,  173 => 107,  172 => 106,  171 => 103,  169 => 100,  166 => 99,  163 => 96,  160 => 95,  158 => 92,  154 => 91,  150 => 89,  148 => 87,  147 => 85,  146 => 84,  145 => 81,  143 => 78,  140 => 77,  137 => 74,  134 => 73,  132 => 70,  128 => 69,  124 => 67,  122 => 66,  121 => 65,  118 => 64,  116 => 63,  115 => 62,  112 => 61,  110 => 60,  108 => 59,  106 => 56,  103 => 55,  101 => 54,  99 => 53,  97 => 50,  94 => 49,  92 => 48,  90 => 47,  87 => 44,  84 => 42,  82 => 41,  81 => 40,  76 => 39,  64 => 38,  57 => 37,  52 => 33,  50 => 35,  48 => 34,  41 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/entity/assets.html.twig", "/var/www/glpi/templates/pages/admin/entity/assets.html.twig");
    }
}

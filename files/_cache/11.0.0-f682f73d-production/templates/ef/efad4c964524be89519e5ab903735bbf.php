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

/* components/itilobject/timeline/form_validation.html.twig */
class __TwigTemplate_9490eb7bfdd13d81fc845665066e5ca4 extends Template
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
            'timeline_card' => [$this, 'block_timeline_card'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "components/itilobject/timeline/form_timeline_item.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 34)->unwrap();
        // line 36
        $context["params"] = ((array_key_exists("params", $context)) ? (Twig\Extension\CoreExtension::default(($context["params"] ?? null), [])) : ([]));
        // line 33
        $this->parent = $this->load("components/itilobject/timeline/form_timeline_item.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_timeline_card(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "   ";
        if ((($context["form_mode"] ?? null) == "view")) {
            // line 40
            yield "      ";
            // line 41
            yield "      <div class=\"read-only-content w-100\">
         ";
            // line 42
            yield (($_v0 = ($context["entry_i"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["content"] ?? null) : null);
            yield "

         ";
            // line 44
            if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), (((CoreExtension::getAttribute($this->env, $this->source, ($context["entry_i"] ?? null), "comment_submission", [], "array", true, true, false, 44) &&  !(null === (($_v1 = ($context["entry_i"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["comment_submission"] ?? null) : null)))) ? ((($_v2 = ($context["entry_i"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["comment_submission"] ?? null) : null)) : ("")))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 45
                yield "            <div class='alert alert-info mt-2'>
                <div class='d-flex'>
                    <div><i class='ti ti-quote me-2'></i></div>
                    <div class=\"rich_text_container\">
                        ";
                // line 49
                yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getEnhancedHtml((($_v3 = ($context["entry_i"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["comment_submission"] ?? null) : null), ["user_mentions" => true, "images_gallery" => true]);
                // line 52
                yield "
                    </div>
                </div>
            </div>
         ";
            }
            // line 57
            yield "         ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["entry_i"] ?? null), "comment_validation", [], "array", true, true, false, 57) && Twig\Extension\CoreExtension::length($this->env->getCharset(), (($_v4 = ($context["entry_i"] ?? null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["comment_validation"] ?? null) : null)))) {
                // line 58
                yield "            <div class='alert alert-info mt-2'>
                <div class='d-flex'>
                    <div><i class='ti ti-quote me-2'></i></div>
                    <div class=\"rich_text_container\">
                        ";
                // line 62
                yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getEnhancedHtml((($_v5 = ($context["entry_i"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["comment_validation"] ?? null) : null), ["user_mentions" => true, "images_gallery" => true]);
                // line 65
                yield "
                    </div>
                </div>
            </div>
         ";
            }
            // line 70
            yield "
         ";
            // line 71
            if ((($tmp = (((CoreExtension::getAttribute($this->env, $this->source, ($context["entry_i"] ?? null), "can_answer", [], "array", true, true, false, 71) &&  !(null === (($_v6 = ($context["entry_i"] ?? null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["can_answer"] ?? null) : null)))) ? ((($_v7 = ($context["entry_i"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["can_answer"] ?? null) : null)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 72
                yield "            <hr class=\"my-2\" />
            <form id=\"validationanswers_id_";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v8 = ($context["entry_i"] ?? null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["id"] ?? null) : null), "html", null, true);
                yield "\"
                  action=\"";
                // line 74
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath((($_v9 = ($context["entry"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["type"] ?? null) : null)), "html", null, true);
                yield "\" method=\"post\" data-submit-once>

               <input type=\"hidden\" name=\"id\" value=\"";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v10 = ($context["entry_i"] ?? null)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["id"] ?? null) : null), "html", null, true);
                yield "\" />
               <input type=\"hidden\" name=\"users_id_validate\" value=\"";
                // line 77
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v11 = ($context["entry_i"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["users_id_validate"] ?? null) : null), "html", null, true);
                yield "\" />
               <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
                yield "\" />
               ";
                // line 79
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(Twig\Extension\CoreExtension::constant("Glpi\\Plugin\\Hooks::PRE_ITEM_FORM"), ["item" => ($context["subitem"] ?? null), "options" => ($context["params"] ?? null)]), "html", null, true);
                yield "

               <div class=\"mb-3 comment-part\">
                  ";
                // line 82
                yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 82, $this->getSourceContext())->macro_textareaField(...["comment_validation", "", _n("Comment", "Comments", 1), ["full_width" => true, "enable_richtext" => true, "is_horizontal" => false, "enable_fileupload" => false, "mention_options" =>                 // line 91
($context["mention_options"] ?? null), "entities_id" => (($_v12 = CoreExtension::getAttribute($this->env, $this->source,                 // line 92
($context["item"] ?? null), "fields", [], "any", false, false, false, 92)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["entities_id"] ?? null) : null), "rand" =>                 // line 93
($context["rand"] ?? null)]]);
                // line 95
                yield "

                  ";
                // line 97
                yield $macros["fields"]->getTemplateForMacro("macro_fileField", $context, 97, $this->getSourceContext())->macro_fileField(...["filename", null, "", ["multiple" => true, "full_width" => true, "no_label" => true]]);
                // line 106
                yield "
               </div>

               <div class=\"validation-footer\">
                  <button type=\"submit\" class=\"btn btn-outline-green\" name=\"approval_action\" value=\"approve\">
                     <i class=\"ti ti-thumb-up\"></i>
                     <span class=\"validation-label\">";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Approve"), "html", null, true);
                yield "</span>
                  </button>
                  <button type=\"submit\" class=\"btn btn-outline-red\" name=\"approval_action\" value=\"refuse\">
                     <i class=\"ti ti-thumb-down\"></i>
                     <span class=\"validation-label\">";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Refuse"), "html", null, true);
                yield "</span>
                  </button>
               </div>
            </form>
         ";
            }
            // line 121
            yield "      </div>
   ";
        } elseif ((        // line 122
($context["form_mode"] ?? null) == "answer")) {
            // line 123
            yield "      ";
            // line 124
            yield "      <form name=\"asset_form\" style=\"width: 100%;\" class=\"d-flex flex-column\" method=\"post\"
            action=\"";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "getFormURL", [], "method", false, false, false, 125), "html", null, true);
            yield "\" enctype=\"multipart/form-data\" data-track-changes=\"true\" data-submit-once>

         <input type=\"hidden\" name=\"id\" value=\"";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v13 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 127)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["id"] ?? null) : null), "html", null, true);
            yield "\" />
         <input type=\"hidden\" name=\"users_id_validate\" value=\"";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v14 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 128)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["users_id_validate"] ?? null) : null), "html", null, true);
            yield "\" />
         <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 129
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\" />

         ";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(Twig\Extension\CoreExtension::constant("Glpi\\Plugin\\Hooks::PRE_ITEM_FORM"), ["item" => ($context["subitem"] ?? null), "options" => ($context["params"] ?? null)]), "html", null, true);
            yield "

         <div class=\"mb-3 comment-part\">
            ";
            // line 134
            yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 134, $this->getSourceContext())->macro_textareaField(...["comment_validation", (($_v15 = CoreExtension::getAttribute($this->env, $this->source,             // line 136
($context["subitem"] ?? null), "fields", [], "any", false, false, false, 136)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["comment_validation"] ?? null) : null), _n("Comment", "Comments", 1), ["full_width" => true, "enable_richtext" => true, "is_horizontal" => false, "enable_fileupload" => false, "mention_options" =>             // line 143
($context["mention_options"] ?? null), "entities_id" => (($_v16 = CoreExtension::getAttribute($this->env, $this->source,             // line 144
($context["item"] ?? null), "fields", [], "any", false, false, false, 144)) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["entities_id"] ?? null) : null), "rand" =>             // line 145
($context["rand"] ?? null)]]);
            // line 147
            yield "

            ";
            // line 149
            yield $macros["fields"]->getTemplateForMacro("macro_fileField", $context, 149, $this->getSourceContext())->macro_fileField(...["filename", null, "", ["multiple" => true, "full_width" => true, "no_label" => true]]);
            // line 158
            yield "
         </div>

         <div class=\"validation-footer\">
            <button type=\"submit\" class=\"btn btn-outline-green\" name=\"approval_action\" value=\"approve\">
               <i class=\"ti ti-thumb-up\"></i>
               <span class=\"validation-label\">";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Approve"), "html", null, true);
            yield "</span>
            </button>
            <button type=\"submit\" class=\"btn btn-outline-red\" name=\"approval_action\" value=\"refuse\">
               <i class=\"ti ti-thumb-down\"></i>
               <span class=\"validation-label\">";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Refuse"), "html", null, true);
            yield "</span>
            </button>
         </div>
      </form>
   ";
        } else {
            // line 173
            yield "        ";
            // line 174
            yield "        <form name=\"asset_form\" style=\"width: 100%;\" class=\"d-flex flex-column\" method=\"post\"
              action=\"";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "getFormURL", [], "method", false, false, false, 175), "html", null, true);
            yield "\" enctype=\"multipart/form-data\" data-track-changes=\"true\" data-submit-once>
            <input type=\"hidden\" name=\"itemtype\" value=\"";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 176), "html", null, true);
            yield "\" />
            <input type=\"hidden\" name=\"";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getForeignKeyField", [], "method", false, false, false, 177), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v17 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 177)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["id"] ?? null) : null), "html", null, true);
            yield "\" />

            <div class=\"card-body\">
                ";
            // line 180
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "isNewItem", [], "method", false, false, false, 180)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 181
                yield "                    ";
                // line 182
                yield "                    ";
                yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 182, $this->getSourceContext())->macro_dropdownField(...["ITILValidationTemplate", "itilvalidationtemplates_id", "", _n("Template", "Templates", 1), ["full_width" => true, "on_change" => (("itilvalidationtemplate_update" .                 // line 189
($context["rand"] ?? null)) . "(this.value);"), "entity" => (($_v18 = CoreExtension::getAttribute($this->env, $this->source,                 // line 190
($context["item"] ?? null), "fields", [], "any", false, false, false, 190)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18["entities_id"] ?? null) : null), "rand" =>                 // line 191
($context["rand"] ?? null)]]);
                // line 193
                yield "

                    ";
                // line 196
                yield "                    ";
                yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 196, $this->getSourceContext())->macro_dropdownField(...["ValidationStep", "_validationsteps_id", ((                // line 199
array_key_exists("_validationsteps_id", $context)) ? (Twig\Extension\CoreExtension::default(($context["_validationsteps_id"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call(["ValidationStep", "getDefault"]), "getID", [], "method", false, false, false, 199))) : (CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call(["ValidationStep", "getDefault"]), "getID", [], "method", false, false, false, 199))), _n("Approval step", "Approval step", 1), ["full_width" => true, "rand" =>                 // line 203
($context["rand"] ?? null), "required" => true, "display_emptychoice" => false]]);
                // line 207
                yield "
                ";
            } else {
                // line 209
                yield "                    ";
                yield $macros["fields"]->getTemplateForMacro("macro_readOnlyField", $context, 209, $this->getSourceContext())->macro_readOnlyField(...["", $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName("ValidationStep", (($_v19 = CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItem(CoreExtension::getAttribute($this->env, $this->source,                 // line 213
($context["item"] ?? null), "getValidationStepClassName", [], "method", false, false, false, 213), (($_v20 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 213)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20["itils_validationsteps_id"] ?? null) : null)), "fields", [], "any", false, false, false, 213)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19["validationsteps_id"] ?? null) : null)), _n("Approval step", "Approval step", 1), ["full_width" => true]]);
                // line 219
                yield "
                ";
            }
            // line 221
            yield "
                ";
            // line 223
            yield "                ";
            yield $macros["fields"]->getTemplateForMacro("macro_readOnlyField", $context, 223, $this->getSourceContext())->macro_readOnlyField(...["approval_requester", CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Glpi\Application\View\Extension\SessionExtension']->getCurrentUser(), "getFriendlyName", [], "method", false, false, false, 225), _n("Requester", "Requesters", 1), ["full_width" => true, "rand" =>             // line 229
($context["rand"] ?? null)]]);
            // line 231
            yield "

                ";
            // line 234
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "isNewItem", [], "method", false, false, false, 234)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 235
                yield "                    ";
                $context["validation_right"] = "validate";
                // line 236
                yield "                    ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 236) == "Ticket")) {
                    // line 237
                    yield "                        ";
                    if (((($_v21 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 237)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21["type"] ?? null) : null) == Twig\Extension\CoreExtension::constant("Ticket::INCIDENT_TYPE"))) {
                        // line 238
                        yield "                            ";
                        $context["validation_right"] = "validate_incident";
                        // line 239
                        yield "                        ";
                    } elseif (((($_v22 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 239)) && is_array($_v22) || $_v22 instanceof ArrayAccess ? ($_v22["type"] ?? null) : null) == Twig\Extension\CoreExtension::constant("Ticket::DEMAND_TYPE"))) {
                        // line 240
                        yield "                            ";
                        $context["validation_right"] = "validate_request";
                        // line 241
                        yield "                        ";
                    }
                    // line 242
                    yield "                    ";
                }
                // line 243
                yield "                    ";
                yield $macros["fields"]->getTemplateForMacro("macro_field", $context, 243, $this->getSourceContext())->macro_field(...["_add_validation", CoreExtension::getAttribute($this->env, $this->source,                 // line 245
($context["subitem"] ?? null), "dropdownValidator", [["parents_id" => (($_v23 = CoreExtension::getAttribute($this->env, $this->source,                 // line 246
($context["item"] ?? null), "fields", [], "any", false, false, false, 246)) && is_array($_v23) || $_v23 instanceof ArrayAccess ? ($_v23["id"] ?? null) : null), "entity" => (($_v24 = CoreExtension::getAttribute($this->env, $this->source,                 // line 247
($context["item"] ?? null), "fields", [], "any", false, false, false, 247)) && is_array($_v24) || $_v24 instanceof ArrayAccess ? ($_v24["entities_id"] ?? null) : null), "itemtype_target" => (($_v25 = CoreExtension::getAttribute($this->env, $this->source,                 // line 248
($context["subitem"] ?? null), "fields", [], "any", false, false, false, 248)) && is_array($_v25) || $_v25 instanceof ArrayAccess ? ($_v25["itemtype_target"] ?? null) : null), "items_id_target" => (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 249
($context["subitem"] ?? null), "fields", [], "any", false, true, false, 249), "items_id_target", [], "array", true, true, false, 249) &&  !(null === (($_v26 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 249)) && is_array($_v26) || $_v26 instanceof ArrayAccess ? ($_v26["items_id_target"] ?? null) : null)))) ? ((($_v27 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 249)) && is_array($_v27) || $_v27 instanceof ArrayAccess ? ($_v27["items_id_target"] ?? null) : null)) : ("")), "right" =>                 // line 250
($context["validation_right"] ?? null), "display" => false, "rand" =>                 // line 252
($context["rand"] ?? null)]], "method", false, false, false, 245), __("Approver"), ["full_width" => true]]);
                // line 258
                yield "
                ";
            } else {
                // line 260
                yield "                    ";
                yield $macros["fields"]->getTemplateForMacro("macro_readOnlyField", $context, 260, $this->getSourceContext())->macro_readOnlyField(...["", $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName((($_v28 = CoreExtension::getAttribute($this->env, $this->source,                 // line 262
($context["subitem"] ?? null), "fields", [], "any", false, false, false, 262)) && is_array($_v28) || $_v28 instanceof ArrayAccess ? ($_v28["itemtype_target"] ?? null) : null), (($_v29 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 262)) && is_array($_v29) || $_v29 instanceof ArrayAccess ? ($_v29["items_id_target"] ?? null) : null)), __("Approver"), ["full_width" => true]]);
                // line 267
                yield "
                ";
            }
            // line 269
            yield "
                ";
            // line 271
            yield "                ";
            yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 271, $this->getSourceContext())->macro_textareaField(...["comment_submission", (($_v30 = CoreExtension::getAttribute($this->env, $this->source,             // line 273
($context["subitem"] ?? null), "fields", [], "any", false, false, false, 273)) && is_array($_v30) || $_v30 instanceof ArrayAccess ? ($_v30["comment_submission"] ?? null) : null), _n("Comment", "Comments", 1), ["full_width" => true, "enable_richtext" => true, "enable_fileupload" => false, "mention_options" =>             // line 279
($context["mention_options"] ?? null), "entities_id" => (($_v31 = CoreExtension::getAttribute($this->env, $this->source,             // line 280
($context["item"] ?? null), "fields", [], "any", false, false, false, 280)) && is_array($_v31) || $_v31 instanceof ArrayAccess ? ($_v31["entities_id"] ?? null) : null), "rand" =>             // line 281
($context["rand"] ?? null), "disabled" =>  !(CoreExtension::getAttribute($this->env, $this->source,             // line 282
($context["subitem"] ?? null), "isNewItem", [], "method", false, false, false, 282) || ((($_v32 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 282)) && is_array($_v32) || $_v32 instanceof ArrayAccess ? ($_v32["status"] ?? null) : null) == Twig\Extension\CoreExtension::constant("CommonITILValidation::WAITING")))]]);
            // line 284
            yield "

                ";
            // line 286
            yield $macros["fields"]->getTemplateForMacro("macro_fileField", $context, 286, $this->getSourceContext())->macro_fileField(...["filename", null, "", ["multiple" => true, "full_width" => true]]);
            // line 294
            yield "
            </div>

            ";
            // line 297
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(Twig\Extension\CoreExtension::constant("Glpi\\Plugin\\Hooks::POST_ITEM_FORM"), ["item" => ($context["subitem"] ?? null), "options" => ($context["params"] ?? null)]), "html", null, true);
            yield "

            <div class=\"d-flex justify-content-center card-footer\">
                ";
            // line 300
            if (((($_v33 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 300)) && is_array($_v33) || $_v33 instanceof ArrayAccess ? ($_v33["id"] ?? null) : null) <= 0)) {
                // line 301
                yield "                    <button class=\"btn btn-primary me-2\" type=\"submit\" name=\"add\">
                        <i class=\"ti ti-plus\"></i>
                        <span>";
                // line 303
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Add"), "html", null, true);
                yield "</span>
                    </button>
                ";
            } else {
                // line 306
                yield "                    <input type=\"hidden\" name=\"id\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v34 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 306)) && is_array($_v34) || $_v34 instanceof ArrayAccess ? ($_v34["id"] ?? null) : null), "html", null, true);
                yield "\" />
                    <button class=\"btn btn-primary me-2\" type=\"submit\" name=\"update\">
                        <i class=\"ti ti-device-floppy\"></i>
                        <span>";
                // line 309
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Save"), "html", null, true);
                yield "</span>
                    </button>

                    ";
                // line 312
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "can", [(($_v35 = CoreExtension::getAttribute($this->env, $this->source, ($context["subitem"] ?? null), "fields", [], "any", false, false, false, 312)) && is_array($_v35) || $_v35 instanceof ArrayAccess ? ($_v35["id"] ?? null) : null), Twig\Extension\CoreExtension::constant("PURGE")], "method", false, false, false, 312)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 313
                    yield "                        <button class=\"btn btn-outline-danger me-2\" type=\"submit\" name=\"purge\"
                                onclick=\"return confirm('";
                    // line 314
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Confirm the final deletion?"), "html", null, true);
                    yield "');\">
                            <i class=\"ti ti-trash\"></i>
                            <span>";
                    // line 316
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Delete permanently"), "html", null, true);
                    yield "</span>
                        </button>
                    ";
                }
                // line 319
                yield "                ";
            }
            // line 320
            yield "            </div>

            <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 322
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\" />
        </form>

      ";
            // line 325
            if ((($tmp = (((array_key_exists("scroll", $context) &&  !(null === $context["scroll"]))) ? ($context["scroll"]) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 326
                yield "         <script type=\"text/javascript\">
            window.scrollTo(0,document.body.scrollHeight);
         </script>
      ";
            }
            // line 330
            yield "
      <script type=\"text/javascript\">
         // --- fill form with template data
         function itilvalidationtemplate_update";
            // line 333
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "(value) {
            \$.ajax({
               url: '";
            // line 335
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/itilvalidation.php"), "html", null, true);
            yield "',
               type: 'POST',
               data: {
                  validationtemplates_id: value,
                  items_id: '";
            // line 339
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v36 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 339)) && is_array($_v36) || $_v36 instanceof ArrayAccess ? ($_v36["id"] ?? null) : null), "html", null, true);
            yield "',
                  itemtype: '";
            // line 340
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 340), "html", null, true);
            yield "'
               }
            }).done(function (data) {
               if (data.content !== undefined) {
                  // set textarea content
                  setRichTextEditorContent(\"comment_submission_";
            // line 345
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\", data.content);
               }

               // Validator field
               if (data.validatortype !== undefined) {
                  // set validator type
                  \$(\"#dropdown__validatortype_";
            // line 351
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").trigger('setValue', data.validatortype);

                  if (data.groups_id !== undefined && data.groups_id !== null) {
                     waitForElement(\"#dropdown_groups_id";
            // line 354
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").then((elm) => {
                        // set groups_id
                        \$(\"#dropdown_groups_id";
            // line 356
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").ready(function() {
                           \$(\"#dropdown_groups_id";
            // line 357
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").trigger('setValue', data.groups_id);
                        });

                        waitForElement(\"#dropdown_items_id_target";
            // line 360
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").then((elm) => {
                           // set items_id_target
                           \$(\"#dropdown_items_id_target";
            // line 362
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").ready(function() {
                              \$(\"#dropdown_items_id_target";
            // line 363
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").trigger('setValue', data.items_id_target);
                           });
                        });
                     });
                  } else if (data.items_id_target !== undefined) {
                     new Promise((resolve) => {
                        // if dropdown_items_id_target exists, wait for it to be removed
                        // is required because the dropdown is removed and recreated when the setValue is triggered
                        if (\$(\"#dropdown_items_id_target";
            // line 371
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").length > 0) {
                           \$(\"#dropdown_items_id_target";
            // line 372
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").on('remove', function() {
                              resolve();
                           });
                        } else {
                           resolve();
                        }
                     }).then(() => {
                        waitForElement(\"#dropdown_items_id_target";
            // line 379
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").then((elm) => {
                           // set items_id_target
                           \$(\"#dropdown_items_id_target";
            // line 381
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").ready(function() {
                              \$(\"#dropdown_items_id_target";
            // line 382
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").trigger('setValue', data.items_id_target);
                           });
                        });
                     });
                  }
               }

               // Validation step field
               if( data.validationsteps_id !== undefined && data.validationsteps_id !== 0) {
                  \$(\"#dropdown__validationsteps_id";
            // line 391
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").trigger('setValue', data.validationsteps_id);
               }

            });
         }
      </script>
   ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/itilobject/timeline/form_validation.html.twig";
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
        return array (  565 => 391,  553 => 382,  549 => 381,  544 => 379,  534 => 372,  530 => 371,  519 => 363,  515 => 362,  510 => 360,  504 => 357,  500 => 356,  495 => 354,  489 => 351,  480 => 345,  472 => 340,  468 => 339,  461 => 335,  456 => 333,  451 => 330,  445 => 326,  443 => 325,  437 => 322,  433 => 320,  430 => 319,  424 => 316,  419 => 314,  416 => 313,  414 => 312,  408 => 309,  401 => 306,  395 => 303,  391 => 301,  389 => 300,  383 => 297,  378 => 294,  376 => 286,  372 => 284,  370 => 282,  369 => 281,  368 => 280,  367 => 279,  366 => 273,  364 => 271,  361 => 269,  357 => 267,  355 => 262,  353 => 260,  349 => 258,  347 => 252,  346 => 250,  345 => 249,  344 => 248,  343 => 247,  342 => 246,  341 => 245,  339 => 243,  336 => 242,  333 => 241,  330 => 240,  327 => 239,  324 => 238,  321 => 237,  318 => 236,  315 => 235,  312 => 234,  308 => 231,  306 => 229,  304 => 223,  301 => 221,  297 => 219,  295 => 213,  293 => 209,  289 => 207,  287 => 203,  286 => 199,  284 => 196,  280 => 193,  278 => 191,  277 => 190,  276 => 189,  274 => 182,  272 => 181,  270 => 180,  262 => 177,  258 => 176,  254 => 175,  251 => 174,  249 => 173,  241 => 168,  234 => 164,  226 => 158,  224 => 149,  220 => 147,  218 => 145,  217 => 144,  216 => 143,  215 => 136,  214 => 134,  208 => 131,  203 => 129,  199 => 128,  195 => 127,  190 => 125,  187 => 124,  185 => 123,  183 => 122,  180 => 121,  172 => 116,  165 => 112,  157 => 106,  155 => 97,  151 => 95,  149 => 93,  148 => 92,  147 => 91,  146 => 82,  140 => 79,  136 => 78,  132 => 77,  128 => 76,  123 => 74,  119 => 73,  116 => 72,  114 => 71,  111 => 70,  104 => 65,  102 => 62,  96 => 58,  93 => 57,  86 => 52,  84 => 49,  78 => 45,  76 => 44,  71 => 42,  68 => 41,  66 => 40,  63 => 39,  56 => 38,  51 => 33,  49 => 36,  47 => 34,  40 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/itilobject/timeline/form_validation.html.twig", "/var/www/glpi/templates/components/itilobject/timeline/form_validation.html.twig");
    }
}

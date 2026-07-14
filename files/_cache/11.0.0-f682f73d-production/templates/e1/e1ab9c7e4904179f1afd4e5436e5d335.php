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

/* components/notepad/form.html.twig */
class __TwigTemplate_379af6151059ea5c854fa60ecc4e0858 extends Template
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
        $context["fields_options"] = ["full_width" => true, "is_horizontal" => false];
        // line 39
        yield "
<div class=\"firstbloc\">
    <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#new-note-form\">
        <i class=\"ti ti-link\"></i>
        <span>";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Add a note"), "html", null, true);
        yield "</span>
    </button>
</div>

<div class=\"my-3\">
    <div id=\"new-note-form\" class=\"modal fade\">
        <div class=\"modal-dialog modal-xl\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h3 class=\"modal-title\">
                        <i class=\"ti ti-notes\"></i>
                        ";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add a note"), "html", null, true);
        yield "
                    </h3>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>

                <form action=\"";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["url"] ?? null), "html", null, true);
        yield "\" method=\"post\" autocomplete=\"off\" data-submit-once>
                    <div class=\"modal-body\">
                        <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
        yield "\" />
                        <input type=\"hidden\" name=\"itemtype\" value=\"";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["itemtype"] ?? null), "html", null, true);
        yield "\" />
                        <input type=\"hidden\" name=\"items_id\" value=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["items_id"] ?? null), "html", null, true);
        yield "\" />
                        ";
        // line 64
        yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 64, $this->getSourceContext())->macro_textareaField(...["content", "", __("Content"), Twig\Extension\CoreExtension::merge(        // line 68
($context["fields_options"] ?? null), ["enable_richtext" => true, "enable_fileupload" => true])]);
        // line 72
        yield "

                        ";
        // line 74
        if ((($context["itemtype"] ?? null) == "Entity")) {
            // line 75
            yield "                            ";
            yield $macros["fields"]->getTemplateForMacro("macro_sliderField", $context, 75, $this->getSourceContext())->macro_sliderField(...["visible_from_ticket", false, __("Visible on tickets"),             // line 79
($context["fields_options"] ?? null)]);
            // line 80
            yield "
                        ";
        }
        // line 82
        yield "                    </div>

                    <div class=\"modal-footer\">
                        <button type=\"submit\" value=\"Add\" name=\"add\" class=\"btn btn-primary\">
                            <span>";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add"), "html", null, true);
        yield "</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class=\"accordion\">
    ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["notes"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
            // line 97
            yield "        ";
            $context["id"] = (("note" . (($_v0 = $context["note"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["id"] ?? null) : null)) . ($context["rand"] ?? null));
            // line 98
            yield "        <div class=\"accordion-item\">
            <div class=\"accordion-header\">
                <button class=\"accordion-button collapsed d-flex align-self-center\" type=\"button\"
                        data-bs-toggle=\"collapse\" data-bs-target=\"#";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\"
                        aria-expanded=\"false\" aria-controls=\"";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\">
                    <i class=\"ti ti-notes\"></i>
                    ";
            // line 104
            $context["title"] = ((("#" . (($_v1 = $context["note"]) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["id"] ?? null) : null)) . " - ") . $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v2 = $context["note"]) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["date_creation"] ?? null) : null)));
            // line 105
            yield "                    ";
            if (((($_v3 = $context["note"]) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["date_mod"] ?? null) : null) != (($_v4 = $context["note"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["date_creation"] ?? null) : null))) {
                // line 106
                yield "                        ";
                $context["title"] = (((($context["title"] ?? null) . " (") . Twig\Extension\CoreExtension::sprintf(__("Last update on %s"), $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($_v5 = $context["note"]) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["date_mod"] ?? null) : null)))) . ")");
                // line 107
                yield "                    ";
            }
            // line 108
            yield "                    <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
            yield "</span>
                </button>
            </div>

            <div id=\"";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\" class=\"accordion-collapse collapse\">
                <div class=\"accordion-body pt-0\">
                    <form action=\"";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["url"] ?? null), "html", null, true);
            yield "\" method=\"post\" autocomplete=\"off\" data-submit-once>
                        <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\" />
                        <input type=\"hidden\" name=\"id\" value=\"";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = $context["note"]) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["id"] ?? null) : null), "html", null, true);
            yield "\" />
                        <div class=\"d-flex justify-content-between mb-2\">
                            <span class=\"d-inline-flex creator\">
                                ";
            // line 119
            yield Twig\Extension\CoreExtension::include($this->env, $context, "components/itilobject/timeline/timeline_item_header_badges.html.twig", ["users_id" => (($_v7 =             // line 120
$context["note"]) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["users_id"] ?? null) : null), "date_creation" => (($_v8 =             // line 121
$context["note"]) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["date_creation"] ?? null) : null), "date_mod" => (($_v9 =             // line 122
$context["note"]) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["date_mod"] ?? null) : null), "users_id_editor" => (($_v10 =             // line 123
$context["note"]) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["users_id_lastupdater"] ?? null) : null), "anchor" => (("Notepad" . "_") . (($_v11 =             // line 124
$context["note"]) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["id"] ?? null) : null)), "user_object" => null], false);
            // line 126
            yield "
                            </span>

                            <span>
                                <button class=\"btn btn-sm btn-ghost-danger delete-note\" name=\"purge\" type=\"submit\" value=\"1\"
                                        onclick=\"return confirm('";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Confirm the final deletion?"), "html", null, true);
            yield "');\"
                                        data-id=\"";
            // line 132
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\">
                                    <i class=\"ti ti-trash\"></i>
                                    <span>";
            // line 134
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Delete"), "html", null, true);
            yield "</span>
                                </button>

                                <button class=\"btn btn-sm btn-ghost-secondary edit-note\" type=\"button\"
                                        data-id=\"";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\"
                                        data-bs-toggle=\"modal\" data-bs-target=\"#edit-";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\">
                                    <i class=\"ti ti-edit\"></i>
                                    <span>";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Edit"), "html", null, true);
            yield "</span>
                                </button>
                            </span>
                        </div>

                        <div class=\"rich_text_container\" id=\"contentread";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\">
                            ";
            // line 147
            yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml((($_v12 = $context["note"]) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["content"] ?? null) : null));
            yield "
                        </div>

                        ";
            // line 150
            yield Twig\Extension\CoreExtension::include($this->env, $context, "components/itilobject/timeline/sub_documents.html.twig", ["item" => $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItem((($_v13 =             // line 151
$context["note"]) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["itemtype"] ?? null) : null), (($_v14 = $context["note"]) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["items_id"] ?? null) : null)), "entry" =>             // line 152
$context["note"]]);
            // line 153
            yield "

                    </form>

                    <div id=\"edit-";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\" class=\"modal fade\">
                        <div class=\"modal-dialog modal-xl\">
                            <div class=\"modal-content\">
                                <form action=\"";
            // line 160
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["url"] ?? null), "html", null, true);
            yield "\" method=\"post\" autocomplete=\"off\" data-submit-once>
                                    <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\" />
                                    <input type=\"hidden\" name=\"id\" value=\"";
            // line 162
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v15 = $context["note"]) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["id"] ?? null) : null), "html", null, true);
            yield "\" />

                                    <div class=\"modal-header\">
                                        <h3 class=\"modal-title\">
                                            <i class=\"ti ti-notes\"></i>
                                            ";
            // line 167
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Edit a note"), "html", null, true);
            yield "
                                        </h3>
                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                                    </div>

                                    <div class=\"modal-body\">
                                        ";
            // line 173
            yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 173, $this->getSourceContext())->macro_textareaField(...["content", (($_v16 =             // line 175
$context["note"]) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["content"] ?? null) : null), __("Content"), Twig\Extension\CoreExtension::merge(            // line 177
($context["fields_options"] ?? null), ["enable_richtext" => true, "enable_fileupload" => true])]);
            // line 181
            yield "
                                        <br>

                                        ";
            // line 184
            if ((($context["itemtype"] ?? null) == "Entity")) {
                // line 185
                yield "                                            ";
                yield $macros["fields"]->getTemplateForMacro("macro_sliderField", $context, 185, $this->getSourceContext())->macro_sliderField(...["visible_from_ticket", (($_v17 =                 // line 187
$context["note"]) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["visible_from_ticket"] ?? null) : null), __("Visible on tickets"),                 // line 189
($context["fields_options"] ?? null)]);
                // line 190
                yield "
                                        ";
            }
            // line 192
            yield "                                    </div>

                                    <div class=\"modal-footer\">
                                        <button class=\"btn btn-outline-danger\" type=\"submit\" name=\"purge\" value=\"1\"
                                                onclick=\"return confirm('";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Confirm the final deletion?"), "html", null, true);
            yield "');\"
                                                data-bs-toggle=\"tooltip\" data-bs-position=\"top\"
                                                title=\"";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Delete permanently"), "html", null, true);
            yield "\">
                                            <i class=\"ti ti-trash\"></i>
                                        </button>

                                        <button type=\"submit\" value=\"Update\" name=\"update\" class=\"btn btn-primary\">
                                            <i class=\"ti ti-device-floppy\"></i>
                                            <span>";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Update"), "html", null, true);
            yield "</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        yield "</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/notepad/form.html.twig";
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
        return array (  368 => 215,  343 => 204,  334 => 198,  329 => 196,  323 => 192,  319 => 190,  317 => 189,  316 => 187,  314 => 185,  312 => 184,  307 => 181,  305 => 177,  304 => 175,  303 => 173,  294 => 167,  286 => 162,  282 => 161,  278 => 160,  272 => 157,  266 => 153,  264 => 152,  263 => 151,  262 => 150,  256 => 147,  252 => 146,  244 => 141,  239 => 139,  235 => 138,  228 => 134,  223 => 132,  219 => 131,  212 => 126,  210 => 124,  209 => 123,  208 => 122,  207 => 121,  206 => 120,  205 => 119,  199 => 116,  195 => 115,  191 => 114,  186 => 112,  178 => 108,  175 => 107,  172 => 106,  169 => 105,  167 => 104,  162 => 102,  158 => 101,  153 => 98,  150 => 97,  133 => 96,  120 => 86,  114 => 82,  110 => 80,  108 => 79,  106 => 75,  104 => 74,  100 => 72,  98 => 68,  97 => 64,  93 => 63,  89 => 62,  85 => 61,  80 => 59,  72 => 54,  58 => 43,  52 => 39,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/notepad/form.html.twig", "/var/www/glpi/templates/components/notepad/form.html.twig");
    }
}

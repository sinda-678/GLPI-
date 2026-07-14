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

/* components/checkbox_matrix.html.twig */
class __TwigTemplate_3167ab1f52d60c1a35c81807a5974a0e extends Template
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
<div class=\"mb-4 table-responsive\">
   <table class=\"table table-hover card-table\">
      <thead>
         ";
        // line 36
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["title"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "         <tr class=\"border-top\">
            <th colspan=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["number_columns"] ?? null), "html", null, true);
            yield "\">
               <span class=\"fs-4\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
            yield "</span>
            </th>
         </tr>
         ";
        }
        // line 43
        yield "         <tr>
            <th>";
        // line 44
        yield (($_v0 = ($context["param"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["first_cell"] ?? null) : null);
        yield "</th>
            ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
        foreach ($context['_seq'] as $context["col_name"] => $context["column"]) {
            // line 46
            yield "               ";
            $context["col_id"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [((("col_label_" . $context["col_name"]) . "_") . (($_v1 = ($context["param"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["rand"] ?? null) : null))]);
            // line 47
            yield "               <th id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["col_id"] ?? null), "html", null, true);
            yield "\">
                  ";
            // line 48
            if ((($tmp =  !is_iterable($context["column"])) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 49
                yield "                     ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["column"], "html", null, true);
                yield "
                  ";
            } else {
                // line 51
                yield "                     ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "short", [], "array", true, true, false, 51) && CoreExtension::getAttribute($this->env, $this->source, $context["column"], "long", [], "array", true, true, false, 51))) {
                    // line 52
                    yield "                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v2 = $context["column"]) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["short"] ?? null) : null), "html", null, true);
                    yield "
                        ";
                    // line 53
                    $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::showToolTip", [(($_v3 = $context["column"]) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["long"] ?? null) : null), ["applyto" => ($context["col_id"] ?? null)]]);
                    // line 54
                    yield "                     ";
                } else {
                    // line 55
                    yield "                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = $context["column"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["label"] ?? null) : null), "html", null, true);
                    yield "
                     ";
                }
                // line 57
                yield "                  ";
            }
            // line 58
            yield "               </th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['col_name'], $context['column'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        yield "
            ";
        // line 61
        if ((($tmp = (($_v5 = ($context["param"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["row_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 62
            yield "               ";
            $context["col_id"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [("col_of_table_" . (($_v6 = ($context["param"] ?? null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["rand"] ?? null) : null))]);
            // line 63
            yield "               <th id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["col_id"] ?? null), "html", null, true);
            yield "\">
                  ";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Select/unselect all"), "html", null, true);
            yield "
               </th>
            ";
        }
        // line 67
        yield "         </tr>
      </thead>
      <tbody>
         ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["row_name"] => $context["row"]) {
            // line 71
            yield "            <tr>
               ";
            // line 72
            if ((($tmp =  !is_iterable($context["row"])) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 73
                yield "                  <td colspan=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["number_columns"] ?? null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["row"], "html", null, true);
                yield "</td>
               ";
            } else {
                // line 75
                yield "                  ";
                $context["row_id"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [((("row_label_" . $context["row_name"]) . "_") . (($_v7 = ($context["param"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["rand"] ?? null) : null))]);
                // line 76
                yield "                  <td class=\"";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "class", [], "array", true, true, false, 76) &&  !(null === (($_v8 = $context["row"]) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["class"] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v9 = $context["row"]) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["class"] ?? null) : null), "html", null, true)) : (""));
                yield "\" id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["row_id"] ?? null), "html", null, true);
                yield "\">
                     ";
                // line 77
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "label", [], "array", true, true, false, 77) &&  !(null === (($_v10 = $context["row"]) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["label"] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v11 = $context["row"]) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["label"] ?? null) : null), "html", null, true)) : ("&nbsp;"));
                yield "
                  </td>

                  ";
                // line 80
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
                foreach ($context['_seq'] as $context["col_name"] => $context["column"]) {
                    // line 81
                    yield "                     ";
                    $context["content"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "columns", [], "array", false, true, false, 81), $context["col_name"], [], "array", true, true, false, 81) &&  !(null === (($_v12 = (($_v13 = $context["row"]) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["columns"] ?? null) : null)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12[$context["col_name"]] ?? null) : null)))) ? ((($_v14 = (($_v15 = $context["row"]) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["columns"] ?? null) : null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14[$context["col_name"]] ?? null) : null)) : (false));
                    // line 82
                    yield "                     <td>
                        ";
                    // line 83
                    if ((is_iterable(($context["content"] ?? null)) && CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "checked", [], "array", true, true, false, 83))) {
                        // line 84
                        yield "                           ";
                        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "readonly", [], "array", true, true, false, 84)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 85
                            yield "                              ";
                            $context["content"] = Twig\Extension\CoreExtension::merge(($context["content"] ?? null), ["readonly" => false]);
                            // line 86
                            yield "                           ";
                        }
                        // line 87
                        yield "                           ";
                        $context["content"] = Twig\Extension\CoreExtension::merge(($context["content"] ?? null), ["name" => (((                        // line 88
$context["row_name"] . "[") . $context["col_name"]) . "]"), "id" => $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [((((("cb_" .                         // line 89
$context["row_name"]) . "_") . $context["col_name"]) . "_") . (($_v16 = ($context["param"] ?? null)) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["rand"] ?? null) : null))])]);
                        // line 91
                        yield "                           ";
                        $context["massive_tags"] = [];
                        // line 92
                        yield "                           ";
                        if ((($tmp = (($_v17 = ($context["param"] ?? null)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["row_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 93
                            yield "                              ";
                            $context["massive_tags"] = Twig\Extension\CoreExtension::merge(($context["massive_tags"] ?? null), [((("row_" .                             // line 94
$context["row_name"]) . "_") . (($_v18 = ($context["param"] ?? null)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18["rand"] ?? null) : null))]);
                            // line 96
                            yield "                           ";
                        }
                        // line 97
                        yield "                           ";
                        if ((($tmp = (($_v19 = ($context["param"] ?? null)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19["col_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 98
                            yield "                              ";
                            $context["massive_tags"] = Twig\Extension\CoreExtension::merge(($context["massive_tags"] ?? null), [((("col_" .                             // line 99
$context["col_name"]) . "_") . (($_v20 = ($context["param"] ?? null)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20["rand"] ?? null) : null))]);
                            // line 101
                            yield "                           ";
                        }
                        // line 102
                        yield "                           ";
                        if (((($_v21 = ($context["param"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21["row_check_all"] ?? null) : null) && (($_v22 = ($context["param"] ?? null)) && is_array($_v22) || $_v22 instanceof ArrayAccess ? ($_v22["col_check_all"] ?? null) : null))) {
                            // line 103
                            yield "                              ";
                            $context["massive_tags"] = Twig\Extension\CoreExtension::merge(($context["massive_tags"] ?? null), [("table_" . (($_v23 =                             // line 104
($context["param"] ?? null)) && is_array($_v23) || $_v23 instanceof ArrayAccess ? ($_v23["rand"] ?? null) : null))]);
                            // line 106
                            yield "                           ";
                        }
                        // line 107
                        yield "                           ";
                        $context["content"] = Twig\Extension\CoreExtension::merge(($context["content"] ?? null), ["massive_tags" =>                         // line 108
($context["massive_tags"] ?? null)]);
                        // line 110
                        yield "                           ";
                        $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::showCheckbox", [($context["content"] ?? null)]);
                        // line 111
                        yield "
                        ";
                    } else {
                        // line 113
                        yield "                           ";
                        if ((($tmp =  !is_iterable(($context["content"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 114
                            yield "                              ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["content"] ?? null), "html", null, true);
                            yield "
                           ";
                        }
                        // line 116
                        yield "                        ";
                    }
                    // line 117
                    yield "                     </td>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['col_name'], $context['column'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 119
                yield "
                  ";
                // line 120
                if ((($tmp = (($_v24 = ($context["param"] ?? null)) && is_array($_v24) || $_v24 instanceof ArrayAccess ? ($_v24["row_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 121
                    yield "                     <td>
                        ";
                    // line 122
                    $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::showCheckbox", [["title" => __("Check/uncheck all"), "criterion" => ["tag_for_massive" => ((("row_" .                     // line 125
$context["row_name"]) . "_") . (($_v25 = ($context["param"] ?? null)) && is_array($_v25) || $_v25 instanceof ArrayAccess ? ($_v25["rand"] ?? null) : null))], "massive_tags" => ("table_" . (($_v26 =                     // line 127
($context["param"] ?? null)) && is_array($_v26) || $_v26 instanceof ArrayAccess ? ($_v26["rand"] ?? null) : null)), "id" => $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [((("cb_checkall_row_" .                     // line 128
$context["row_name"]) . "_") . (($_v27 = ($context["param"] ?? null)) && is_array($_v27) || $_v27 instanceof ArrayAccess ? ($_v27["rand"] ?? null) : null))]), "checked" => ((($_v28 = (($_v29 =                     // line 129
($context["nb_cb_per_row"] ?? null)) && is_array($_v29) || $_v29 instanceof ArrayAccess ? ($_v29[$context["row_name"]] ?? null) : null)) && is_array($_v28) || $_v28 instanceof ArrayAccess ? ($_v28["checked"] ?? null) : null) >= (($_v30 = (($_v31 = ($context["nb_cb_per_row"] ?? null)) && is_array($_v31) || $_v31 instanceof ArrayAccess ? ($_v31[$context["row_name"]] ?? null) : null)) && is_array($_v30) || $_v30 instanceof ArrayAccess ? ($_v30["total"] ?? null) : null))]]);
                    // line 131
                    yield "                     </td>
                  ";
                }
                // line 133
                yield "               ";
            }
            // line 134
            yield "            </tr>
         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['row_name'], $context['row'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 136
        yield "
         ";
        // line 137
        if ((($tmp = (($_v32 = ($context["param"] ?? null)) && is_array($_v32) || $_v32 instanceof ArrayAccess ? ($_v32["col_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 138
            yield "            <tr>
               <td>";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Select/unselect all"), "html", null, true);
            yield "</td>
               ";
            // line 140
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
            foreach ($context['_seq'] as $context["col_name"] => $context["column"]) {
                // line 141
                yield "                  <td>
                     ";
                // line 142
                if (((($_v33 = (($_v34 = ($context["nb_cb_per_col"] ?? null)) && is_array($_v34) || $_v34 instanceof ArrayAccess ? ($_v34[$context["col_name"]] ?? null) : null)) && is_array($_v33) || $_v33 instanceof ArrayAccess ? ($_v33["total"] ?? null) : null) >= 2)) {
                    // line 143
                    yield "                        ";
                    $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::showCheckbox", [["title" => __("Check/uncheck all"), "criterion" => ["tag_for_massive" => ((("col_" .                     // line 146
$context["col_name"]) . "_") . (($_v35 = ($context["param"] ?? null)) && is_array($_v35) || $_v35 instanceof ArrayAccess ? ($_v35["rand"] ?? null) : null))], "massive_tags" => ("table_" . (($_v36 =                     // line 148
($context["param"] ?? null)) && is_array($_v36) || $_v36 instanceof ArrayAccess ? ($_v36["rand"] ?? null) : null)), "id" => $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [(("cb_checkall_col_" .                     // line 149
$context["col_name"]) . (($_v37 = ($context["param"] ?? null)) && is_array($_v37) || $_v37 instanceof ArrayAccess ? ($_v37["rand"] ?? null) : null))]), "checked" => ((($_v38 = (($_v39 =                     // line 150
($context["nb_cb_per_col"] ?? null)) && is_array($_v39) || $_v39 instanceof ArrayAccess ? ($_v39[$context["col_name"]] ?? null) : null)) && is_array($_v38) || $_v38 instanceof ArrayAccess ? ($_v38["checked"] ?? null) : null) >= (($_v40 = (($_v41 = ($context["nb_cb_per_col"] ?? null)) && is_array($_v41) || $_v41 instanceof ArrayAccess ? ($_v41[$context["col_name"]] ?? null) : null)) && is_array($_v40) || $_v40 instanceof ArrayAccess ? ($_v40["total"] ?? null) : null))]]);
                    // line 152
                    yield "                     ";
                }
                // line 153
                yield "                  </td>
               ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['col_name'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            yield "
               ";
            // line 156
            if ((($tmp = (($_v42 = ($context["param"] ?? null)) && is_array($_v42) || $_v42 instanceof ArrayAccess ? ($_v42["row_check_all"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 157
                yield "                  <td>
                     ";
                // line 158
                $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::showCheckbox", [["title" => __("Check/uncheck all"), "criterion" => ["tag_for_massive" => ("table_" . (($_v43 =                 // line 161
($context["param"] ?? null)) && is_array($_v43) || $_v43 instanceof ArrayAccess ? ($_v43["rand"] ?? null) : null))], "massive_tags" => "", "id" => $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::cleanId", [("cb_checkall_table_" . (($_v44 =                 // line 164
($context["param"] ?? null)) && is_array($_v44) || $_v44 instanceof ArrayAccess ? ($_v44["rand"] ?? null) : null))])]]);
                // line 166
                yield "                  </td>
               ";
            }
            // line 168
            yield "            </tr>
         ";
        }
        // line 170
        yield "      </tbody>
   </table>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/checkbox_matrix.html.twig";
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
        return array (  352 => 170,  348 => 168,  344 => 166,  342 => 164,  341 => 161,  340 => 158,  337 => 157,  335 => 156,  332 => 155,  325 => 153,  322 => 152,  320 => 150,  319 => 149,  318 => 148,  317 => 146,  315 => 143,  313 => 142,  310 => 141,  306 => 140,  302 => 139,  299 => 138,  297 => 137,  294 => 136,  287 => 134,  284 => 133,  280 => 131,  278 => 129,  277 => 128,  276 => 127,  275 => 125,  274 => 122,  271 => 121,  269 => 120,  266 => 119,  259 => 117,  256 => 116,  250 => 114,  247 => 113,  243 => 111,  240 => 110,  238 => 108,  236 => 107,  233 => 106,  231 => 104,  229 => 103,  226 => 102,  223 => 101,  221 => 99,  219 => 98,  216 => 97,  213 => 96,  211 => 94,  209 => 93,  206 => 92,  203 => 91,  201 => 89,  200 => 88,  198 => 87,  195 => 86,  192 => 85,  189 => 84,  187 => 83,  184 => 82,  181 => 81,  177 => 80,  171 => 77,  164 => 76,  161 => 75,  153 => 73,  151 => 72,  148 => 71,  144 => 70,  139 => 67,  133 => 64,  128 => 63,  125 => 62,  123 => 61,  120 => 60,  113 => 58,  110 => 57,  104 => 55,  101 => 54,  99 => 53,  94 => 52,  91 => 51,  85 => 49,  83 => 48,  78 => 47,  75 => 46,  71 => 45,  67 => 44,  64 => 43,  57 => 39,  53 => 38,  50 => 37,  48 => 36,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/checkbox_matrix.html.twig", "/var/www/glpi/templates/components/checkbox_matrix.html.twig");
    }
}

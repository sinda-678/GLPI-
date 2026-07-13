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

/* components/form/basic_inputs_macros.html.twig */
class __TwigTemplate_845e98b6ad73528ea854b9c310502757 extends Template
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
        // line 118
        yield "

";
        // line 133
        yield "

";
        // line 151
        yield "

";
        // line 181
        yield "

";
        // line 186
        yield "

";
        // line 191
        yield "

";
        // line 208
        yield "

";
        // line 213
        yield "

";
        // line 301
        yield "

";
        // line 308
        yield "

";
        // line 408
        yield "

";
        // line 432
        yield "

";
        // line 455
        yield "

";
        // line 460
        yield "
";
        yield from [];
    }

    // line 33
    public function macro_input($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 34
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["id" => null, "type" => "text", "input_addclass" => "", "additional_attributes" => [], "readonly" => false, "disabled" => false, "multiple" => false, "required" => false, "maxlength" => null, "is_disclosable" => false, "is_copyable" => false, "clearable" => false],             // line 47
($context["options"] ?? null));
            // line 48
            yield "
    ";
            // line 49
            if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, true, false, 49), "isMandatoryField", [($context["name"] ?? null)], "method", true, true, false, 49)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, false, false, 49), "isMandatoryField", [($context["name"] ?? null)], "method", false, false, false, 49), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 50
                yield "        ";
                $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["required" => true]);
                // line 51
                yield "    ";
            }
            // line 52
            yield "
    ";
            // line 53
            if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, true, false, 53), "isReadonlyField", [($context["name"] ?? null)], "method", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, false, false, 53), "isReadonlyField", [($context["name"] ?? null)], "method", false, false, false, 53), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                yield "        ";
                $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["readonly" => true]);
                // line 55
                yield "    ";
            }
            // line 56
            yield "
   ";
            // line 57
            if (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "is_disclosable", [], "any", false, false, false, 57) || CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "is_copyable", [], "any", false, false, false, 57)) && (null === CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 57)))) {
                // line 58
                yield "      ";
                $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["id" => ((Html::sanitizeDomId(                // line 59
($context["name"] ?? null)) . "_") . Twig\Extension\CoreExtension::random($this->env->getCharset()))]);
                // line 61
                yield "   ";
            }
            // line 62
            yield "
    ";
            // line 63
            $context["input"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 64
                yield "        <input type=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "type", [], "any", false, false, false, 64), "html", null, true);
                yield "\" ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 64) != null)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("id=" . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 64)), "html", null, true)) : (""));
                yield "
               class=\"form-control ";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "input_addclass", [], "any", false, false, false, 65), "html", null, true);
                yield "\"
               name=\"";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
                yield "\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["value"] ?? null), "html", null, true);
                yield "\"
            ";
                // line 67
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "additional_attributes", [], "any", false, false, false, 67));
                foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                    // line 68
                    yield "               ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attr"], "html", null, true);
                    yield "=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                    yield "\"
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                yield "               ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "maxlength", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("maxlength=" . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "maxlength", [], "any", false, false, false, 70)), "html", null, true)) : (""));
                yield "
               ";
                // line 71
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 71)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
                yield "
               ";
                // line 72
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "disabled", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
                yield "
               ";
                // line 73
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "multiple", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("multiple") : (""));
                yield " ";
                // line 74
                yield "               ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
                yield "
               ";
                // line 75
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "pattern", [], "any", true, true, false, 75)) {
                    yield "pattern=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "pattern", [], "any", false, false, false, 75), "html", null, true);
                    yield "\"";
                }
                // line 76
                yield "               ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "min", [], "any", true, true, false, 76)) {
                    yield "min=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "min", [], "any", false, false, false, 76), "html", null, true);
                    yield "\"";
                }
                // line 77
                yield "               ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "max", [], "any", true, true, false, 77)) {
                    yield "max=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "max", [], "any", false, false, false, 77), "html", null, true);
                    yield "\"";
                }
                // line 78
                yield "               ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "step", [], "any", true, true, false, 78)) {
                    yield "step=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "step", [], "any", false, false, false, 78), "html", null, true);
                    yield "\"";
                }
                yield " />
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 80
            yield "
    ";
            // line 81
            $context["more_html"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 82
                yield "        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "is_disclosable", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 83
                    yield "            <div class=\"btn btn-outline-secondary\"
                 onmousedown=\"showDisclosablePasswordField('";
                    // line 84
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 84), "html", null, true);
                    yield "')\"
                 onmouseup=\"hideDisclosablePasswordField('";
                    // line 85
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 85), "html", null, true);
                    yield "')\"
                 onmouseout=\"hideDisclosablePasswordField('";
                    // line 86
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 86), "html", null, true);
                    yield "')\">
                <i class=\"ti ti-eye disclose\"></i>
            </div>
        ";
                }
                // line 90
                yield "
        ";
                // line 91
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "is_copyable", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 92
                    yield "            <div class=\"btn btn-outline-secondary\" onclick=\"copyDisclosablePasswordFieldToClipboard('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 92), "html", null, true);
                    yield "')\">
                <i class=\"ti ti-clipboard-copy disclose\"></i>
            </div>
        ";
                }
                // line 96
                yield "    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 97
            yield "
    ";
            // line 98
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::trim(($context["more_html"] ?? null))) > 0)) {
                // line 99
                yield "        ";
                $context["input"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 100
                    yield "            <div class=\"btn-group btn-group-sm d-flex\">
                ";
                    // line 101
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["input"] ?? null), "html", null, true);
                    yield "
                ";
                    // line 102
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["more_html"] ?? null), "html", null, true);
                    yield "
            </div>
        ";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 105
                yield "    ";
            }
            // line 106
            yield "
    ";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["input"] ?? null), "html", null, true);
            yield "

    ";
            // line 109
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "clearable", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 110
                yield "        <span class=\"d-inline-flex\">
            <input type=\"checkbox\" name=\"_blank_";
                // line 111
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
                yield "\" id=\"_blank_";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
                yield "\" class=\"ms-1\">
            <label for=\"_blank_";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
                yield "\" class=\"ms-1\">
                ";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Clear"), "html", null, true);
                yield "
            </label>
        </span>
    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 120
    public function macro_text($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 121
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["copyable" => false],             // line 123
($context["options"] ?? null));
            // line 124
            yield "
    ";
            // line 125
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "copyable", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 126
                yield "        <div class=\"copy_to_clipboard_wrapper\">
    ";
            }
            // line 128
            yield "    ";
            yield $this->getTemplateForMacro("macro_input", $context, 128, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "text"])]);
            yield "
    ";
            // line 129
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "copyable", [], "any", false, false, false, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 130
                yield "        </div>
    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 135
    public function macro_number($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 136
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["step" => 1],             // line 138
($context["options"] ?? null));
            // line 139
            yield "
    ";
            // line 140
            if ((($context["value"] ?? null) == "")) {
                // line 141
                yield "        ";
                $context["value"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "min", [], "any", true, true, false, 141)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "min", [], "any", false, false, false, 141)) : (0));
                // line 142
                yield "    ";
            }
            // line 143
            yield "
    ";
            // line 144
            if (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "step", [], "any", false, false, false, 144) != "any") && (Twig\Extension\CoreExtension::round(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "step", [], "any", false, false, false, 144), 0, "floor") != CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "step", [], "any", false, false, false, 144)))) {
                // line 145
                yield "        ";
                // line 146
                yield "        ";
                $context["value"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::formatNumber", [($context["value"] ?? null), true]);
                // line 147
                yield "    ";
            }
            // line 148
            yield "
    ";
            // line 149
            yield $this->getTemplateForMacro("macro_input", $context, 149, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "number"])]);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 153
    public function macro_color($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 154
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["id" => ((            // line 155
($context["name"] ?? null) . "_") . (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rand", [], "any", true, true, false, 155) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rand", [], "any", false, false, false, 155)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rand", [], "any", false, false, false, 155)) : (Twig\Extension\CoreExtension::random($this->env->getCharset()))))],             // line 156
($context["options"] ?? null));
            // line 157
            yield "
    ";
            // line 158
            yield $this->getTemplateForMacro("macro_input", $context, 158, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "text", "input_addclass" => "rounded-0"])]);
            // line 161
            yield "
    <script>
        \$(function () {
            \$(\"#";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 164), "html", null, true);
            yield "\").spectrum({
                showInput: true,
                preferredFormat: \"hex\",
                type: \"text\",
                cancelText: \"";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Cancel"), "html", null, true);
            yield "\",
                chooseText: \"";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Validate"), "html", null, true);
            yield "\",
                change: function (color) {
                    if (color !== null && color.getAlpha() !== 1) {
                        let hex = color.toHexString();
                        hex += (\"0\" + Math.round(parseFloat(color.getAlpha()) * 255).toString(16)).slice(-2);
                        this.value = hex;
                    }
                }
            });
        });
    </script>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 183
    public function macro_password($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 184
            yield "    ";
            yield $this->getTemplateForMacro("macro_input", $context, 184, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "password"])]);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 188
    public function macro_email($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 189
            yield "    ";
            yield $this->getTemplateForMacro("macro_input", $context, 189, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "email"])]);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 193
    public function macro_file($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 194
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["simple" => false],             // line 196
($context["options"] ?? null));
            // line 197
            yield "
    ";
            // line 198
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "simple", [], "any", false, false, false, 198)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 199
                yield "        ";
                yield $this->getTemplateForMacro("macro_input", $context, 199, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "file"])]);
                yield "
    ";
            } else {
                // line 201
                yield "        ";
                $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::file", [Twig\Extension\CoreExtension::merge(                // line 202
($context["options"] ?? null), ["name" =>                 // line 203
($context["name"] ?? null)])]);
                // line 206
                yield "    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 210
    public function macro_hidden($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 211
            yield "    ";
            yield $this->getTemplateForMacro("macro_input", $context, 211, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "hidden"])]);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 215
    public function macro_date($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 216
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["rand" => Twig\Extension\CoreExtension::random($this->env->getCharset()), "enableTime" => false, "checkIsExpired" => false, "clearable" => false, "input_addclass" => "", "readonly" => false, "maybeempty" => false],             // line 224
($context["options"] ?? null));
            // line 225
            yield "
    ";
            // line 226
            $context["options"] = Twig\Extension\CoreExtension::merge(["id" => ((Html::sanitizeDomId(            // line 227
($context["name"] ?? null)) . "_") . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rand", [], "any", false, false, false, 227))],             // line 228
($context["options"] ?? null));
            // line 229
            yield "
    ";
            // line 230
            if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, true, false, 230), "isReadonlyField", [($context["name"] ?? null)], "method", true, true, false, 230)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, false, false, 230), "isReadonlyField", [($context["name"] ?? null)], "method", false, false, false, 230), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 231
                yield "        ";
                $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["readonly" => true]);
                // line 232
                yield "    ";
            }
            // line 233
            yield "
    ";
            // line 234
            if ((($context["value"] ?? null) == "NULL")) {
                // line 235
                yield "      ";
                $context["value"] = null;
                // line 236
                yield "   ";
            }
            // line 237
            yield "
    ";
            // line 238
            $context["final_expiration_class"] = "";
            // line 239
            yield "    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "checkIsExpired", [], "any", false, false, false, 239)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 240
                yield "        ";
                if (($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["value"] ?? null), "Y-m-d H:i:s") < $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d H:i:s"))) {
                    // line 241
                    yield "            ";
                    $context["final_expiration_class"] = " warn";
                    // line 242
                    yield "        ";
                }
                // line 243
                yield "    ";
            } else {
                // line 244
                yield "        ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "expiration_class", [], "any", true, true, false, 244)) {
                    // line 245
                    yield "            ";
                    $context["final_expiration_class"] = (" " . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "expiration_class", [], "any", false, false, false, 245));
                    // line 246
                    yield "        ";
                } else {
                    // line 247
                    yield "            ";
                    $context["final_expiration_class"] = "";
                    // line 248
                    yield "        ";
                }
                // line 249
                yield "    ";
            }
            // line 250
            yield "
    <div class=\"btn-group flex-grow-1 flatpickr d-flex\" id=\"";
            // line 251
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 251), "html", null, true);
            yield "\">
        ";
            // line 252
            yield $this->getTemplateForMacro("macro_input", $context, 252, $this->getSourceContext())->macro_input(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["type" => "text", "id" => (CoreExtension::getAttribute($this->env, $this->source,             // line 254
($context["options"] ?? null), "id", [], "any", false, false, false, 254) . "_input"), "additional_attributes" => ["data-input" => ""], "input_addclass" => (CoreExtension::getAttribute($this->env, $this->source,             // line 256
($context["options"] ?? null), "input_addclass", [], "any", false, false, false, 256) . ($context["final_expiration_class"] ?? null)), "clearable" => false])]);
            // line 258
            yield "

        ";
            // line 260
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 260)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 261
                yield "            ";
                $context["calendar_icon"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enableTime", [], "any", false, false, false, 261)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("ti ti-calendar-time") : ("ti ti-calendar"));
                // line 262
                yield "            <button type=\"button\" class=\"btn btn-outline-secondary btn-sm\" data-toggle title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Show date picker"), "html", null, true);
                yield "\">
                <i class=\"";
                // line 263
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["calendar_icon"] ?? null), "html", null, true);
                yield "\"></i>
            </button>
            ";
                // line 266
                yield "            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "clearable", [], "any", false, false, false, 266) || CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "maybeempty", [], "any", false, false, false, 266))) {
                    // line 267
                    yield "                <button type=\"button\" class=\"btn btn-outline-secondary btn-sm\" data-toggle data-clear title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Clear"), "html", null, true);
                    yield "\">
                    <i class=\"ti ti-circle-x\"></i>
                </button>
            ";
                }
                // line 271
                yield "        ";
            }
            // line 272
            yield "    </div>

    ";
            // line 274
            $context["locale"] = $this->extensions['Glpi\Application\View\Extension\I18nExtension']->getCurrentLocale();
            // line 275
            yield "    ";
            $context["date_format"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enableTime", [], "any", false, false, false, 275)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Y-m-d H:i:S") : ("Y-m-d"));
            // line 276
            yield "    ";
            $context["alt_format"] = ($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Toolbox::getDateFormat", ["js"]) . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enableTime", [], "any", false, false, false, 276)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" H:i:S") : ("")));
            // line 277
            yield "    <script>
        \$(function() {
            \$(\"#";
            // line 279
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 279), "html", null, true);
            yield "\").flatpickr({
                wrap: true,
                altInput: true,
                dateFormat: '";
            // line 282
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["date_format"] ?? null), "html", null, true);
            yield "',
                altFormat: '";
            // line 283
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["alt_format"] ?? null), "html", null, true);
            yield "',
                enableTime: ";
            // line 284
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enableTime", [], "any", false, false, false, 284)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
            yield ",
                enableSeconds: ";
            // line 285
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enableTime", [], "any", false, false, false, 285)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
            yield ",
                weekNumbers: true,
                time_24hr: true,
                allowInput: ";
            // line 288
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 288)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("false") : ("true"));
            yield ",
                clickOpens: ";
            // line 289
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 289)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("false") : ("true"));
            yield ",
                locale: getFlatPickerLocale(\"";
            // line 290
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = ($context["locale"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["language"] ?? null) : null), "html", null, true);
            yield "\", \"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = ($context["locale"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["region"] ?? null) : null), "html", null, true);
            yield "\"),
                onClose(dates, currentdatestring, picker) {
                    picker.setDate(picker.altInput.value, true, picker.config.altFormat)
                },
                plugins: [
                    CustomFlatpickrButtons()
                ]
            });
        });
    </script>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 303
    public function macro_datetime($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 304
            yield "    ";
            yield $this->getTemplateForMacro("macro_date", $context, 304, $this->getSourceContext())->macro_date(...[($context["name"] ?? null), ($context["value"] ?? null), Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["enableTime" => true])]);
            // line 306
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 310
    public function macro_textarea($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 311
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["rand" => Twig\Extension\CoreExtension::random($this->env->getCharset()), "rows" => 3, "enable_richtext" => false, "enable_images" => true, "mention_options" => ["enabled" => (CoreExtension::getAttribute($this->env, $this->source,             // line 317
($context["options"] ?? null), "enable_mentions", [], "any", true, true, false, 317) && CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enable_mentions", [], "any", false, false, false, 317)), "full" => true, "users" => []], "entities_id" => $this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactive_entity"), "readonly" => false, "disabled" => false, "required" => false, "add_body_classes" => [], "toolbar" => true, "toolbar_location" => "top", "init" => true, "init_on_demand" => false, "placeholder" => "", "enable_form_tags" => false, "form_tags_form_id" => null, "aria_label" => "", "statusbar" => true, "content_style" => "", "input_addclass" => "", "additional_attributes" => []],             // line 338
($context["options"] ?? null));
            // line 339
            yield "
    ";
            // line 340
            if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, true, false, 340), "isMandatoryField", [($context["name"] ?? null)], "method", true, true, false, 340)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, false, false, 340), "isMandatoryField", [($context["name"] ?? null)], "method", false, false, false, 340), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 341
                yield "        ";
                $context["options"] = Twig\Extension\CoreExtension::merge(["required" => true], ($context["options"] ?? null));
                // line 342
                yield "    ";
            }
            // line 343
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(($context["options"] ?? null), ["id" => (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source,             // line 344
($context["options"] ?? null), "id", [], "any", false, false, false, 344)) > 0)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 344)) : (((($context["name"] ?? null) . "_") . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rand", [], "any", false, false, false, 344))))]);
            // line 346
            yield "
    ";
            // line 348
            yield "    <textarea class=\"form-control ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "input_addclass", [], "any", false, false, false, 348), "html", null, true);
            yield "\"
            id=\"";
            // line 349
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 349), "html", null, true);
            yield "\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "\" rows=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "rows", [], "any", false, false, false, 349), "html", null, true);
            yield "\"
            style=\"width: 100%;\"
            ";
            // line 351
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "additional_attributes", [], "any", false, false, false, 351));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                // line 352
                yield "               ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attr"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\"
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 354
            yield "            ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "aria_label", [], "any", false, false, false, 354))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 355
                yield "                aria-label=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "aria_label", [], "any", false, false, false, 355), "html", null, true);
                yield "\"
            ";
            }
            // line 357
            yield "            ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "placeholder", [], "any", false, false, false, 357))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 358
                yield "                placeholder=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "placeholder", [], "any", false, false, false, 358), "html", null, true);
                yield "\"
            ";
            }
            // line 360
            yield "            ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "disabled", [], "any", false, false, false, 360)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
            yield "
            ";
            // line 361
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 361)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
            yield "
            ";
            // line 362
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", false, false, false, 362)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
            yield ">";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enable_richtext", [], "any", false, false, false, 362)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml(($context["value"] ?? null)))) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["value"] ?? null), "html", null, true)));
            yield "</textarea>

    ";
            // line 364
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enable_richtext", [], "any", false, false, false, 364)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 365
                yield "        ";
                $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Html::initEditorSystem", [CoreExtension::getAttribute($this->env, $this->source,                 // line 366
($context["options"] ?? null), "id", [], "any", false, false, false, 366), CoreExtension::getAttribute($this->env, $this->source,                 // line 367
($context["options"] ?? null), "rand", [], "any", false, false, false, 367), true, ((CoreExtension::getAttribute($this->env, $this->source,                 // line 369
($context["options"] ?? null), "disabled", [], "any", true, true, false, 369)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "disabled", [], "any", false, false, false, 369), false)) : (false)), CoreExtension::getAttribute($this->env, $this->source,                 // line 370
($context["options"] ?? null), "enable_images", [], "any", false, false, false, 370), ((CoreExtension::getAttribute($this->env, $this->source,                 // line 371
($context["options"] ?? null), "editor_height", [], "any", true, true, false, 371)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "editor_height", [], "any", false, false, false, 371), 150)) : (150)), CoreExtension::getAttribute($this->env, $this->source,                 // line 372
($context["options"] ?? null), "add_body_classes", [], "any", false, false, false, 372), CoreExtension::getAttribute($this->env, $this->source,                 // line 373
($context["options"] ?? null), "toolbar_location", [], "any", false, false, false, 373), CoreExtension::getAttribute($this->env, $this->source,                 // line 374
($context["options"] ?? null), "init", [], "any", false, false, false, 374), CoreExtension::getAttribute($this->env, $this->source,                 // line 375
($context["options"] ?? null), "placeholder", [], "any", false, false, false, 375), CoreExtension::getAttribute($this->env, $this->source,                 // line 376
($context["options"] ?? null), "toolbar", [], "any", false, false, false, 376), CoreExtension::getAttribute($this->env, $this->source,                 // line 377
($context["options"] ?? null), "statusbar", [], "any", false, false, false, 377), CoreExtension::getAttribute($this->env, $this->source,                 // line 378
($context["options"] ?? null), "content_style", [], "any", false, false, false, 378), CoreExtension::getAttribute($this->env, $this->source,                 // line 379
($context["options"] ?? null), "init_on_demand", [], "any", false, false, false, 379)]);
                // line 381
                yield "   ";
            }
            // line 382
            yield "   ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "enable_form_tags", [], "any", false, false, false, 382)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 383
                yield "        <script>
            \$(function() {
                const form_tags = new GLPI.RichText.FormTags(
                    tinymce.get('";
                // line 386
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 386), "html", null, true);
                yield "'),
                    ";
                // line 387
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "form_tags_form_id", [], "any", false, false, false, 387), "html", null, true);
                yield ",
                );
                form_tags.register();
            });
        </script>
    ";
            }
            // line 393
            yield "
    ";
            // line 394
            if ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "mention_options", [], "any", false, true, false, 394), "enabled", [], "any", true, true, false, 394)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "mention_options", [], "any", false, false, false, 394), "enabled", [], "any", false, false, false, 394), false)) : (false)) && $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("use_notifications"))) {
                // line 395
                yield "        <script>
            \$(function() {
                const user_mention = new GLPI.RichText.UserMention(
                    tinymce.get('";
                // line 398
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 398), "html", null, true);
                yield "'),
                    ";
                // line 399
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "entities_id", [], "any", false, false, false, 399), "html", null, true);
                yield ",
                    '";
                // line 400
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewIDORToken("User", ["right" => "all", "entity_restrict" => CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "entities_id", [], "any", false, false, false, 400)]), "html", null, true);
                yield "',
                    ";
                // line 401
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "mention_options", [], "any", false, false, false, 401));
                yield "
                );
                user_mention.register();
            });
        </script>
    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 410
    public function macro_checkbox($name = null, $value = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 411
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["id" => null, "input_addclass" => "", "readonly" => false, "disabled" => false, "required" => false, "additional_attributes" => []],             // line 418
($context["options"] ?? null));
            // line 419
            yield "
    <input type=\"hidden\"   name=\"";
            // line 420
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "\" value=\"0\" />
    <input type=\"checkbox\" name=\"";
            // line 421
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "\" value=\"1\"
           class=\"form-check-input ";
            // line 422
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "input_addclass", [], "any", false, false, false, 422), "html", null, true);
            yield "\"
           ";
            // line 423
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 423) != null)) ? ((("id=\"" . $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "id", [], "any", false, false, false, 423))) . "\"")) : (""));
            yield "
           ";
            // line 424
            yield (((($context["value"] ?? null) == 1)) ? ("checked") : (""));
            yield "
           ";
            // line 425
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "readonly", [], "any", false, false, false, 425)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
            yield "
           ";
            // line 426
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", false, false, false, 426)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
            yield "
           ";
            // line 427
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "disabled", [], "any", false, false, false, 427)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
            yield "
            ";
            // line 428
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "additional_attributes", [], "any", false, false, false, 428));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                // line 429
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attr"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\"
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 430
            yield "/>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 434
    public function macro_button($name = null, $label = "", $type = "button", $value = "", $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "label" => $label,
            "type" => $type,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 435
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["type" => "submit", "class" => "btn btn-primary", "icon" => "", "icon_title" => "", "additional_attributes" => []],             // line 441
($context["options"] ?? null));
            // line 442
            yield "
    <button class=\"";
            // line 443
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "class", [], "any", false, false, false, 443), "html", null, true);
            yield "\" type=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["type"] ?? null), "html", null, true);
            yield "\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["value"] ?? null), "html", null, true);
            yield "\"
        ";
            // line 444
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "additional_attributes", [], "any", false, false, false, 444));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                // line 445
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attr"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\"
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 446
            yield ">
        ";
            // line 447
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "icon", [], "any", false, false, false, 447))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 448
                yield "            <i class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "icon", [], "any", false, false, false, 448), "html", null, true);
                yield "\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "icon_title", [], "any", false, false, false, 448), "html", null, true);
                yield "\"></i>
        ";
            }
            // line 450
            yield "        ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["label"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 451
                yield "            <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label"] ?? null), "html", null, true);
                yield "</span>
        ";
            }
            // line 453
            yield "    </button>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 457
    public function macro_submit($name = null, $label = "", $value = "", $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "name" => $name,
            "label" => $label,
            "value" => $value,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 458
            yield "    ";
            yield $this->getTemplateForMacro("macro_button", $context, 458, $this->getSourceContext())->macro_button(...[($context["name"] ?? null), ($context["label"] ?? null), "submit", ($context["value"] ?? null), ($context["options"] ?? null)]);
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 461
    public function macro_label($label = null, $id = null, $options = [], $class = "form-label", ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "label" => $label,
            "id" => $id,
            "options" => $options,
            "class" => $class,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 462
            yield "    ";
            $context["options"] = Twig\Extension\CoreExtension::merge(["locked" => false, "locked_value" => null, "tpl_mark" => null, "helper" => false],             // line 467
($context["options"] ?? null));
            // line 468
            yield "
    ";
            // line 469
            $context["required_mark"] = "";
            // line 470
            yield "    ";
            if (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "name", [], "any", true, true, false, 470) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, true, false, 470), "isMandatoryField", [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "name", [], "any", false, false, false, 470)], "method", true, true, false, 470)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "fields_template", [], "any", false, false, false, 470), "isMandatoryField", [CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "name", [], "any", false, false, false, 470)], "method", false, false, false, 470), false)) : (false))) || (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", true, true, false, 470) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", false, false, false, 470)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "required", [], "any", false, false, false, 470)) : (false)))) {
                // line 471
                yield "        ";
                $context["required_mark"] = "<span class=\"required\">*</span>";
                // line 472
                yield "    ";
            }
            // line 473
            yield "
    ";
            // line 474
            $context["helper"] = "";
            // line 475
            yield "    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "helper", [], "any", false, false, false, 475)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 476
                yield "        ";
                // line 477
                yield "        ";
                // line 478
                yield "        ";
                $context["helper_safe_text"] = Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "helper", [], "any", false, false, false, 478)));
                // line 479
                yield "        ";
                $context["helper"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 480
                    yield "        <span class=\"form-help\"
              data-bs-toggle=\"popover\"
              data-bs-placement=\"top\"
              data-bs-html=\"true\"
              data-bs-content=\"";
                    // line 484
                    yield ($context["helper_safe_text"] ?? null);
                    yield "\">
            ?
        </span>
        ";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 488
                yield "    ";
            }
            // line 489
            yield "
    ";
            // line 490
            $context["locked_mark"] = "";
            // line 491
            yield "    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "locked", [], "any", false, false, false, 491)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 492
                yield "        ";
                $context["locked_mark"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 493
                    yield "        ";
                    $context["locked_title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Field will not be updated from inventory"), "html", null, true);
                        yield from [];
                    })())) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 494
                    yield "        ";
                    if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "locked_value", [], "any", false, false, false, 494))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 495
                        yield "            ";
                        $context["locked_title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["locked_title"] ?? null), "html", null, true);
                            yield "
            -
            ";
                            // line 497
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((__("Last inventory value was:") . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "locked_value", [], "any", false, false, false, 497)), "html", null, true);
                            yield from [];
                        })())) ? '' : new Markup($tmp, $this->env->getCharset());
                        // line 498
                        yield "        ";
                    }
                    // line 499
                    yield "        <i class=\"ti ti-lock\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["locked_title"] ?? null), "html", null, true);
                    yield "\" data-bs-toggle=\"tooltip\"></i>
        ";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 501
                yield "    ";
            }
            // line 502
            yield "
    <label class=\"";
            // line 503
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
            yield "\" for=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "\">
        ";
            // line 504
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label"] ?? null), "html", null, true);
            yield "
        ";
            // line 505
            yield ($context["locked_mark"] ?? null);
            yield "
        ";
            // line 506
            yield ($context["required_mark"] ?? null);
            yield "
        ";
            // line 507
            yield ($context["helper"] ?? null);
            yield "
        ";
            // line 508
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "tpl_mark", [], "any", false, false, false, 508))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 509
                yield "            ";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "tpl_mark", [], "any", false, false, false, 509);
                yield "
        ";
            }
            // line 511
            yield "    </label>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/form/basic_inputs_macros.html.twig";
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
        return array (  1327 => 511,  1321 => 509,  1319 => 508,  1315 => 507,  1311 => 506,  1307 => 505,  1303 => 504,  1297 => 503,  1294 => 502,  1291 => 501,  1284 => 499,  1281 => 498,  1277 => 497,  1270 => 495,  1267 => 494,  1261 => 493,  1258 => 492,  1255 => 491,  1253 => 490,  1250 => 489,  1247 => 488,  1239 => 484,  1233 => 480,  1230 => 479,  1227 => 478,  1225 => 477,  1223 => 476,  1220 => 475,  1218 => 474,  1215 => 473,  1212 => 472,  1209 => 471,  1206 => 470,  1204 => 469,  1201 => 468,  1199 => 467,  1197 => 462,  1182 => 461,  1173 => 458,  1158 => 457,  1151 => 453,  1145 => 451,  1142 => 450,  1134 => 448,  1132 => 447,  1129 => 446,  1118 => 445,  1114 => 444,  1104 => 443,  1101 => 442,  1099 => 441,  1097 => 435,  1081 => 434,  1074 => 430,  1063 => 429,  1059 => 428,  1055 => 427,  1051 => 426,  1047 => 425,  1043 => 424,  1039 => 423,  1035 => 422,  1031 => 421,  1027 => 420,  1024 => 419,  1022 => 418,  1020 => 411,  1006 => 410,  993 => 401,  989 => 400,  985 => 399,  981 => 398,  976 => 395,  974 => 394,  971 => 393,  962 => 387,  958 => 386,  953 => 383,  950 => 382,  947 => 381,  945 => 379,  944 => 378,  943 => 377,  942 => 376,  941 => 375,  940 => 374,  939 => 373,  938 => 372,  937 => 371,  936 => 370,  935 => 369,  934 => 367,  933 => 366,  931 => 365,  929 => 364,  922 => 362,  918 => 361,  913 => 360,  907 => 358,  904 => 357,  898 => 355,  895 => 354,  884 => 352,  880 => 351,  871 => 349,  866 => 348,  863 => 346,  861 => 344,  859 => 343,  856 => 342,  853 => 341,  851 => 340,  848 => 339,  846 => 338,  845 => 317,  843 => 311,  829 => 310,  822 => 306,  819 => 304,  805 => 303,  786 => 290,  782 => 289,  778 => 288,  772 => 285,  768 => 284,  764 => 283,  760 => 282,  754 => 279,  750 => 277,  747 => 276,  744 => 275,  742 => 274,  738 => 272,  735 => 271,  727 => 267,  724 => 266,  719 => 263,  714 => 262,  711 => 261,  709 => 260,  705 => 258,  703 => 256,  702 => 254,  701 => 252,  697 => 251,  694 => 250,  691 => 249,  688 => 248,  685 => 247,  682 => 246,  679 => 245,  676 => 244,  673 => 243,  670 => 242,  667 => 241,  664 => 240,  661 => 239,  659 => 238,  656 => 237,  653 => 236,  650 => 235,  648 => 234,  645 => 233,  642 => 232,  639 => 231,  637 => 230,  634 => 229,  632 => 228,  631 => 227,  630 => 226,  627 => 225,  625 => 224,  623 => 216,  609 => 215,  600 => 211,  586 => 210,  579 => 206,  577 => 203,  576 => 202,  574 => 201,  568 => 199,  566 => 198,  563 => 197,  561 => 196,  559 => 194,  545 => 193,  536 => 189,  522 => 188,  513 => 184,  499 => 183,  481 => 169,  477 => 168,  470 => 164,  465 => 161,  463 => 158,  460 => 157,  458 => 156,  457 => 155,  455 => 154,  441 => 153,  433 => 149,  430 => 148,  427 => 147,  424 => 146,  422 => 145,  420 => 144,  417 => 143,  414 => 142,  411 => 141,  409 => 140,  406 => 139,  404 => 138,  402 => 136,  388 => 135,  380 => 130,  378 => 129,  373 => 128,  369 => 126,  367 => 125,  364 => 124,  362 => 123,  360 => 121,  346 => 120,  335 => 113,  331 => 112,  325 => 111,  322 => 110,  320 => 109,  315 => 107,  312 => 106,  309 => 105,  302 => 102,  298 => 101,  295 => 100,  292 => 99,  290 => 98,  287 => 97,  283 => 96,  275 => 92,  273 => 91,  270 => 90,  263 => 86,  259 => 85,  255 => 84,  252 => 83,  249 => 82,  247 => 81,  244 => 80,  233 => 78,  226 => 77,  219 => 76,  213 => 75,  208 => 74,  205 => 73,  201 => 72,  197 => 71,  192 => 70,  181 => 68,  177 => 67,  171 => 66,  167 => 65,  160 => 64,  158 => 63,  155 => 62,  152 => 61,  150 => 59,  148 => 58,  146 => 57,  143 => 56,  140 => 55,  137 => 54,  135 => 53,  132 => 52,  129 => 51,  126 => 50,  124 => 49,  121 => 48,  119 => 47,  117 => 34,  103 => 33,  97 => 460,  93 => 455,  89 => 432,  85 => 408,  81 => 308,  77 => 301,  73 => 213,  69 => 208,  65 => 191,  61 => 186,  57 => 181,  53 => 151,  49 => 133,  45 => 118,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/form/basic_inputs_macros.html.twig", "/var/www/glpi/templates/components/form/basic_inputs_macros.html.twig");
    }
}

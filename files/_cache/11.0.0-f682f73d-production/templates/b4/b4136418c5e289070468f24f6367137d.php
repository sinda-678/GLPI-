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

/* pages/admin/profile/base_tab.html.twig */
class __TwigTemplate_cc227464012e2c1beb08b94770ebe0cd extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 32
        yield "
";
        // line 33
        $macros["inputs"] = $this->macros["inputs"] = $this->load("components/form/basic_inputs_macros.html.twig", 33)->unwrap();
        // line 34
        yield "
";
        // line 35
        $context["show_legend"] = ((array_key_exists("show_legend", $context)) ? (Twig\Extension\CoreExtension::default(($context["show_legend"] ?? null), false)) : (false));
        // line 36
        $context["can_edit"] = ((Session::haveRight("profile", Twig\Extension\CoreExtension::constant("CREATE")) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("UPDATE"))) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("PURGE")));
        // line 37
        yield "
";
        // line 47
        yield "
";
        // line 57
        yield "
<div class=\"asset\">
    ";
        // line 59
        if ((($tmp = ($context["can_edit"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 60
            yield "        <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("Profile"), "html", null, true);
            yield "\" data-track-changes=\"true\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getID", [], "method", false, false, false, 61), "html", null, true);
            yield "\">
            <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\">
    ";
        }
        // line 64
        yield "            <div>
                <div class=\"card-body p-0\">
                    ";
        // line 66
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 67
        yield "                    ";
        if ((($tmp = ($context["show_legend"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 68
            yield "                        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "pages/admin/profile/legend.html.twig");
            yield "
                    ";
        }
        // line 70
        yield "                </div>
    ";
        // line 71
        if ((($tmp = ($context["can_edit"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 72
            yield "                <div class=\"card-body mx-n2 border-top d-flex flex-row-reverse align-items-start flex-wrap\">
                    ";
            // line 73
            yield $macros["inputs"]->getTemplateForMacro("macro_submit", $context, 73, $this->getSourceContext())->macro_submit(...["update", _x("button", "Save"), 1, ["class" => "btn btn-primary", "icon" => "ti ti-device-floppy"]]);
            // line 76
            yield "
                </div>
    ";
        }
        // line 79
        yield "            </div>
    ";
        // line 80
        if ((($tmp = ($context["can_edit"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 81
            yield "        </form>
    ";
        }
        // line 83
        yield "</div>
";
        yield from [];
    }

    // line 66
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 38
    public function macro_displayRightsMatrix($item = null, $interface = null, $form = null, $group = null, $title = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "item" => $item,
            "interface" => $interface,
            "form" => $form,
            "group" => $group,
            "title" => $title,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 39
            yield "    ";
            CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "displayRightsChoiceMatrix", [$this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Profile::getRightsForForm", [            // line 40
($context["interface"] ?? null), ($context["form"] ?? null), ($context["group"] ?? null)]), ["canedit" => ((Session::haveRight("profile", Twig\Extension\CoreExtension::constant("CREATE")) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("UPDATE"))) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("PURGE"))), "title" =>             // line 43
($context["title"] ?? null)]], "method", false, false, false, 39);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 48
    public function macro_displayLifecycleMatrix($item = null, $title = null, $html_field = null, $db_field = null, $statuses = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "item" => $item,
            "title" => $title,
            "html_field" => $html_field,
            "db_field" => $db_field,
            "statuses" => $statuses,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 49
            yield "    ";
            CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "displayLifeCycleMatrix", [            // line 50
($context["title"] ?? null),             // line 51
($context["html_field"] ?? null),             // line 52
($context["db_field"] ?? null),             // line 53
($context["statuses"] ?? null), ((Session::haveRight("profile", Twig\Extension\CoreExtension::constant("CREATE")) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("UPDATE"))) || Session::haveRight("profile", Twig\Extension\CoreExtension::constant("PURGE")))], "method", false, false, false, 49);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/profile/base_tab.html.twig";
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
        return array (  182 => 53,  181 => 52,  180 => 51,  179 => 50,  177 => 49,  161 => 48,  155 => 43,  154 => 40,  152 => 39,  136 => 38,  126 => 66,  120 => 83,  116 => 81,  114 => 80,  111 => 79,  106 => 76,  104 => 73,  101 => 72,  99 => 71,  96 => 70,  90 => 68,  87 => 67,  85 => 66,  81 => 64,  76 => 62,  72 => 61,  67 => 60,  65 => 59,  61 => 57,  58 => 47,  55 => 37,  53 => 36,  51 => 35,  48 => 34,  46 => 33,  43 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/profile/base_tab.html.twig", "/var/www/glpi/templates/pages/admin/profile/base_tab.html.twig");
    }
}

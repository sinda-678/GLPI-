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

/* __string_template__f83dd2345e3abe36952654049a1d2a15 */
class __TwigTemplate_e5f33c5aa6f45d1955120b42b7f5089e extends Template
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
        // line 1
        yield "                ";
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 1)->unwrap();
        // line 2
        yield "                <div class=\"mb-3\">
                    <form method=\"post\" action=\"";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("Cartridge"), "html", null, true);
        yield "\"/>
                        <div class=\"d-flex row\">
                            ";
        // line 5
        yield $macros["fields"]->getTemplateForMacro("macro_numberField", $context, 5, $this->getSourceContext())->macro_numberField(...["to_add", 1, null, ["min" => 1, "max" => 100, "field_class" => "col-4"]]);
        // line 9
        yield "
                            ";
        // line 10
        $context["btn"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 11
            yield "                                <button type=\"submit\" name=\"add\" class=\"btn btn-primary\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["add_label"] ?? null), "html", null, true);
            yield "</button>
                                <input type=\"hidden\" name=\"cartridgeitems_id\" value=\"";
            // line 12
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cartridgeitems_id"] ?? null), "html", null, true);
            yield "\">
                                <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\">
                            ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 15
        yield "                            ";
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 15, $this->getSourceContext())->macro_htmlField(...["", ($context["btn"] ?? null), null, ["no_label" => true, "field_class" => "col-4", "mb" => "mb-2"]]);
        // line 19
        yield "
                        </div>
                    </form>
                </div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__f83dd2345e3abe36952654049a1d2a15";
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
        return array (  78 => 19,  75 => 15,  69 => 13,  65 => 12,  60 => 11,  58 => 10,  55 => 9,  53 => 5,  48 => 3,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__f83dd2345e3abe36952654049a1d2a15", "");
    }
}

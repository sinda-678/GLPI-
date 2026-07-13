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

/* __string_template__330b818b9b48f710ae7eeaf31db72556 */
class __TwigTemplate_9b48f0adc3fac6488c13dd61d4bfcdd4 extends Template
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
        yield "        ";
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 1)->unwrap();
        // line 2
        yield "
        ";
        // line 3
        $context["actors_dropdown"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Glpi\\Form\\Dropdown\\FormActorsDropdown::show", [CoreExtension::getAttribute($this->env, $this->source,         // line 4
($context["question"] ?? null), "getEndUserInputName", [], "method", false, false, false, 4),         // line 5
($context["value"] ?? null), ["form_id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 7
($context["question"] ?? null), "getForm", [], "method", false, false, false, 7), "getId", [], "method", false, false, false, 7), "multiple" =>         // line 8
($context["is_multiple_actors"] ?? null), "allowed_types" =>         // line 9
($context["allowed_types"] ?? null), "aria_label" =>         // line 10
($context["aria_label"] ?? null), "mb" => ""]]);
        // line 14
        yield "
        ";
        // line 15
        yield $macros["fields"]->getTemplateForMacro("macro_htmlField", $context, 15, $this->getSourceContext())->macro_htmlField(...[CoreExtension::getAttribute($this->env, $this->source,         // line 16
($context["question"] ?? null), "getEndUserInputName", [], "method", false, false, false, 16),         // line 17
($context["actors_dropdown"] ?? null), "", ["no_label" => true, "wrapper_class" => "", "mb" => "", "field_class" => Twig\Extension\CoreExtension::join(["col-12", "col-sm-6"], " ")]]);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__330b818b9b48f710ae7eeaf31db72556";
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
        return array (  61 => 17,  60 => 16,  59 => 15,  56 => 14,  54 => 10,  53 => 9,  52 => 8,  51 => 7,  50 => 5,  49 => 4,  48 => 3,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__330b818b9b48f710ae7eeaf31db72556", "");
    }
}

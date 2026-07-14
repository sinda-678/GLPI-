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

/* __string_template__9ba2bc0efd34c4b54aec89dd4dec0235 */
class __TwigTemplate_76acd58367990e435d2c9e1e27fc76da extends Template
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
        yield "            ";
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 1)->unwrap();
        // line 2
        yield "            <div class=\"card mb-3\">
                <div class=\"card-header\">
                    <div class=\"card-title\">";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</div>
                </div>
                <div class=\"card-body\">
                    ";
        // line 7
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 7, $this->getSourceContext())->macro_dropdownArrayField(...["statmenu", ($context["selected"] ?? null), ($context["values"] ?? null), null, ["no_label" => true, "on_change" => "window.location=this.options[this.selectedIndex].value"]]);
        // line 10
        yield "
                </div>
            </div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__9ba2bc0efd34c4b54aec89dd4dec0235";
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
        return array (  57 => 10,  55 => 7,  49 => 4,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__9ba2bc0efd34c4b54aec89dd4dec0235", "");
    }
}

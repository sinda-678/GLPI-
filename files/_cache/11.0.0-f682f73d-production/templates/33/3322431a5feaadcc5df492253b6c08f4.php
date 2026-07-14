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

/* pages/assets/cartridgeitem.html.twig */
class __TwigTemplate_c8fe16d1a30514d8aeeac189ec54a2d3 extends Template
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
    public function block_more_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "    ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "isField", ["stock_target"], "method", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "        ";
            yield $macros["fields"]->getTemplateForMacro("macro_numberField", $context, 39, $this->getSourceContext())->macro_numberField(...["stock_target", (($_v0 = CoreExtension::getAttribute($this->env, $this->source,             // line 41
($context["item"] ?? null), "fields", [], "any", false, false, false, 41)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["stock_target"] ?? null) : null), _x("quantity", "Stock target"), Twig\Extension\CoreExtension::merge(            // line 43
($context["field_options"] ?? null), ["min" => 0, "step" => 1])]);
            // line 47
            yield "
    ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/assets/cartridgeitem.html.twig";
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
        return array (  71 => 47,  69 => 43,  68 => 41,  66 => 39,  63 => 38,  56 => 37,  51 => 33,  49 => 35,  47 => 34,  40 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/assets/cartridgeitem.html.twig", "/var/www/glpi/templates/pages/assets/cartridgeitem.html.twig");
    }
}

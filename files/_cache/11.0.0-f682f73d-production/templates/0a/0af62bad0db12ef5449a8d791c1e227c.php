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

/* components/search/query_builder/criteria_group.html.twig */
class __TwigTemplate_16a485cab9f5ba6a8e2f0d5077c9d132 extends Template
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
<div class=\"list-group-item p-2 border-0 normalcriteria ";
        // line 35
        yield (((($context["num"] ?? null) == 0)) ? ("headerRow") : (""));
        yield "\" id=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["row_id"] ?? null), "html", null, true);
        yield "\">
   <div class=\"row g-1\">
      <div class=\"col-auto\">
         <button class=\"btn btn-sm btn-icon btn-ghost-secondary remove-search-criteria\" type=\"button\" data-rowid=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["row_id"] ?? null), "html", null, true);
        yield "\"
                 data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Delete a rule"), "html", null, true);
        yield "\">
            <i class=\"ti ti-square-rounded-minus\" alt=\"-\"></i>
         </button>
      </div>
      <div class=\"col-auto\">
         ";
        // line 44
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 44, $this->getSourceContext())->macro_dropdownArrayField(...[(((("criteria" . ($context["prefix"] ?? null)) . "[") . ($context["num"] ?? null)) . "][link]"), (((CoreExtension::getAttribute($this->env, $this->source, ($context["criteria"] ?? null), "link", [], "array", true, true, false, 44) &&  !(null === (($_v0 = ($context["criteria"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["link"] ?? null) : null)))) ? ((($_v1 = ($context["criteria"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["link"] ?? null) : null)) : ("")), $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("\\Glpi\\Search\\SearchEngine::getLogicalOperators"), "", ["full_width" => true, "input_class" => "col-12", "mb" => "mb-0", "no_label" => true]]);
        // line 49
        yield "
      </div>
      <div class=\"col-auto\">
         ";
        // line 52
        $context["parents_num"] = Twig\Extension\CoreExtension::merge(((array_key_exists("parents_num", $context)) ? (Twig\Extension\CoreExtension::default(($context["parents_num"] ?? null), [])) : ([])), [($context["num"] ?? null)]);
        // line 53
        yield "         ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Glpi\\Search\\Input\\QueryBuilder::showGenericSearch", [($context["itemtype"] ?? null), ["mainform" => false, "prefix_crit" => (((        // line 55
($context["prefix"] ?? null) . "[") . ($context["num"] ?? null)) . "][criteria]"), "parents_num" =>         // line 56
($context["parents_num"] ?? null), "criteria" => (($_v2 =         // line 57
($context["criteria"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["criteria"] ?? null) : null)]]), "html", null, true);
        // line 58
        yield "
      </div>
   </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/search/query_builder/criteria_group.html.twig";
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
        return array (  85 => 58,  83 => 57,  82 => 56,  81 => 55,  79 => 53,  77 => 52,  72 => 49,  70 => 44,  62 => 39,  58 => 38,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/search/query_builder/criteria_group.html.twig", "/var/www/glpi/templates/components/search/query_builder/criteria_group.html.twig");
    }
}

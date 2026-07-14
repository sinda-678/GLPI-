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

/* pages/admin/rules/engine_summary.html.twig */
class __TwigTemplate_2dd0b4acd61718c7737674267de24846 extends Template
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
<div class=\"alert alert-info\">
   ";
        // line 34
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collection"] ?? null), "stop_on_first_match", [], "any", false, false, false, 34)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "      <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The engine will stop after the first matched rule."), "html", null, true);
            yield "</span>
   ";
        } else {
            // line 37
            yield "      <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The engine will run all matching rules."), "html", null, true);
            yield "</span>
   ";
        }
        // line 39
        yield "   <br>
   ";
        // line 40
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collection"] ?? null), "use_output_rule_process_as_next_input", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "      <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The engine passes the result of each rule to the next matching rule."), "html", null, true);
            yield "</span>
      <br>
   ";
        }
        // line 44
        yield "   ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collection"] ?? null), "isRuleUseConditions", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "      <span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The rules are conditional based on a type of action."), "html", null, true);
            yield "</span>
   ";
        }
        // line 47
        yield "</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/rules/engine_summary.html.twig";
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
        return array (  81 => 47,  75 => 45,  72 => 44,  65 => 41,  63 => 40,  60 => 39,  54 => 37,  48 => 35,  46 => 34,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/rules/engine_summary.html.twig", "/var/www/glpi/templates/pages/admin/rules/engine_summary.html.twig");
    }
}

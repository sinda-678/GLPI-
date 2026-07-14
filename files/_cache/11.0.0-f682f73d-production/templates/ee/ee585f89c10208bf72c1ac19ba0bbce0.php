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

/* components/search/status_area.html.twig */
class __TwigTemplate_24bd0a37e83047ea2b4e80cc5b931a4b extends Template
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
<div class=\"status-area\">
    <span class=\"alert alert-warning p-1 m-0\">
        <i class=\"ti ti-alert-triangle me-2\"></i>
        <span>";
        // line 36
        yield ($context["status_message"] ?? null);
        yield "</span>
    ";
        // line 37
        if (array_key_exists("extra_message", $context)) {
            // line 38
            yield "        <span class=\"form-help\" data-bs-toggle=\"popover\" data-bs-placement=\"bottom\" data-bs-html=\"true\" data-bs-content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["extra_message"] ?? null), "html", null, true);
            yield "\">
            ?
        </span>
    ";
        }
        // line 42
        yield "    </span>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/search/status_area.html.twig";
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
        return array (  62 => 42,  54 => 38,  52 => 37,  48 => 36,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/search/status_area.html.twig", "/var/www/glpi/templates/components/search/status_area.html.twig");
    }
}

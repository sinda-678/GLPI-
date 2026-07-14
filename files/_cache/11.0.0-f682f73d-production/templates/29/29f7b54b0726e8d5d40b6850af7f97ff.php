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

/* __string_template__cddf0edff707f9ffc3f183e913faebfb */
class __TwigTemplate_991f8031a44b2028c3213ddffe4972f4 extends Template
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
        yield "        <div class=\"d-flex justify-content-center\">
            <div class=\"alert alert-success\">
                <div class=\"alert-title\">";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</div>
                <div>";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["message"] ?? null), "html", null, true);
        yield "</div>
                <div class=\"d-flex flex-row-reverse mt-3\">
                    <a href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/logout.php"), "html", null, true);
        yield "?noAUTO=1\" role=\"button\" class=\"btn btn-primary\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["btn_label"] ?? null), "html", null, true);
        yield "</a>
                </div>
            </div>
        </div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__cddf0edff707f9ffc3f183e913faebfb";
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
        return array (  55 => 6,  50 => 4,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__cddf0edff707f9ffc3f183e913faebfb", "");
    }
}

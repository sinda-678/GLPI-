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

/* __string_template__d1450b53073d76e5e687b45226787013 */
class __TwigTemplate_a8a92a39484e45628806036ff432e26c extends Template
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
        yield "                <div id='viewcost";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "_";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
        yield "'></div>
                <script>
                    function viewAddCost";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "_";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
        yield " (btn) {
                        // Hide the triggering button
                        \$(btn).hide();
                        ";
        // line 6
        $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Ajax::updateItemJsCode", [((("viewcost" .         // line 7
($context["id"] ?? null)) . "_") . ($context["rand"] ?? null)), ($this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("root_doc") . "/ajax/viewsubitem.php"), ["type" =>         // line 10
($context["type"] ?? null), "parenttype" =>         // line 11
($context["parenttype"] ?? null),  (string)        // line 12
($context["items_id"] ?? null) => ($context["id"] ?? null), "id" =>  -1]]);
        // line 16
        yield "                    }
                </script>
                ";
        // line 18
        if ((($tmp = ($context["cancreate"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "                    <div class=\"text-center mt-1 mb-3\">
                        <button type=\"button\" class=\"btn btn-primary\" onclick=\"viewAddCost";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "_";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "(this);\">
                            ";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["add_new_label"] ?? null), "html", null, true);
            yield "
                        </button>
                    </div>
                ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__d1450b53073d76e5e687b45226787013";
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
        return array (  79 => 21,  73 => 20,  70 => 19,  68 => 18,  64 => 16,  62 => 12,  61 => 11,  60 => 10,  59 => 7,  58 => 6,  50 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__d1450b53073d76e5e687b45226787013", "");
    }
}

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

/* __string_template__0863470ef5150ebfc3f64eca7562ef69 */
class __TwigTemplate_5353224c704649ac603f675cf2ad008b extends Template
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
        yield "                    <table class=\"table table-sm table-borderless ";
        yield (((($tmp = ($context["highlight"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("table-danger") : (""));
        yield "\">
                        <tr>
                            <td>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = (($_v1 = ($context["counts"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["total"] ?? null) : null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["label"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td>";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v2 = (($_v3 = ($context["counts"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["total"] ?? null) : null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["value"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td class=\"fw-bold\">";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = (($_v5 = ($context["counts"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["new"] ?? null) : null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["label"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td class=\"fw-bold\">";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = (($_v7 = ($context["counts"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["new"] ?? null) : null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["value"] ?? null) : null), "html", null, true);
        yield "</td>
                        </tr>
                        <tr>
                            <td>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v8 = (($_v9 = ($context["counts"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["used"] ?? null) : null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["label"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v10 = (($_v11 = ($context["counts"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["used"] ?? null) : null)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["value"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v12 = (($_v13 = ($context["counts"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["worn"] ?? null) : null)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["label"] ?? null) : null), "html", null, true);
        yield "</td>
                            <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v14 = (($_v15 = ($context["counts"] ?? null)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["worn"] ?? null) : null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["value"] ?? null) : null), "html", null, true);
        yield "</td>
                        </tr>
                    </table>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__0863470ef5150ebfc3f64eca7562ef69";
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
        return array (  78 => 12,  74 => 11,  70 => 10,  66 => 9,  60 => 6,  56 => 5,  52 => 4,  48 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__0863470ef5150ebfc3f64eca7562ef69", "");
    }
}

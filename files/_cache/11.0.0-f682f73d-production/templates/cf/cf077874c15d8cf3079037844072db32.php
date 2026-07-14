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

/* pages/assistance/stats/global_form.html.twig */
class __TwigTemplate_482821371acdb5d9753d4e6f1fc90904 extends Template
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
<form method=\"get\" name=\"form\" action=\"stat.global.php\">
    <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
        yield "\" />
    <input type=\"hidden\" name=\"itemtype\" value=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["itemtype"] ?? null), "html", null, true);
        yield "\">

    <div class=\"card mx-auto\" style=\"width: 845px;\">
        <div class=\"card-body\">

            <div class=\"d-flex align-items-center\">
                <div class=\"flex-grow-1\">
                    ";
        // line 44
        yield $macros["fields"]->getTemplateForMacro("macro_dateField", $context, 44, $this->getSourceContext())->macro_dateField(...["date1",         // line 46
($context["date1"] ?? null), __("Start date")]);
        // line 48
        yield "

                    ";
        // line 50
        yield $macros["fields"]->getTemplateForMacro("macro_dateField", $context, 50, $this->getSourceContext())->macro_dateField(...["date2",         // line 52
($context["date2"] ?? null), __("End date")]);
        // line 54
        yield "
                </div>

                <input type=\"submit\" class=\"btn btn-primary\"
                       value=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Display report"), "html", null, true);
        yield "\">
            </div>
        </div>
    </div>
</form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/assistance/stats/global_form.html.twig";
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
        return array (  81 => 58,  75 => 54,  73 => 52,  72 => 50,  68 => 48,  66 => 46,  65 => 44,  55 => 37,  51 => 36,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/assistance/stats/global_form.html.twig", "/var/www/glpi/templates/pages/assistance/stats/global_form.html.twig");
    }
}

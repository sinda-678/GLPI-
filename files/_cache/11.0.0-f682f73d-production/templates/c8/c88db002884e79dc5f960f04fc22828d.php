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

/* pages/admin/plugins/list_suspend_banner.html.twig */
class __TwigTemplate_ab27786bbd22d8f97b8907dbe17b5c25 extends Template
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
        if ((($tmp = ($context["execution_suspended"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "    <div class=\"alert alert-warning\" role=\"alert\">
        ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The execution of the plugins is suspended."), "html", null, true);
            yield "
        <form class=\"d-inline\" action=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("Plugin"), "html", null, true);
            yield "\" method=\"POST\">
            <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\">
            <button type=\"submit\" name=\"action\" value=\"resume_all_execution\" class=\"btn btn-sm btn-primary me-1\">
                <i class=\"ti ti-player-play-filled\"></i>
                ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Resume execution of all active plugins"), "html", null, true);
            yield "
            </button>
        </form>
    </div>
";
        } else {
            // line 45
            yield "    <div class=\"text-end mb-3\">
        <form class=\"d-inline\" action=\"";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("Plugin"), "html", null, true);
            yield "\" method=\"POST\">
            <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
            yield "\">
            <button type=\"submit\" name=\"action\" value=\"suspend_all_execution\" class=\"btn btn-primary me-1\">
                <i class=\"ti ti-player-pause-filled\"></i>
                ";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Suspend execution of all plugins"), "html", null, true);
            yield "
            </button>
        </form>
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
        return "pages/admin/plugins/list_suspend_banner.html.twig";
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
        return array (  85 => 50,  79 => 47,  75 => 46,  72 => 45,  64 => 40,  58 => 37,  54 => 36,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/plugins/list_suspend_banner.html.twig", "/var/www/glpi/templates/pages/admin/plugins/list_suspend_banner.html.twig");
    }
}

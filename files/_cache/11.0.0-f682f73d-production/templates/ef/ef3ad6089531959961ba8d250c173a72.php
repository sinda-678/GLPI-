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

/* updatepassword.html.twig */
class __TwigTemplate_95191b791d33e3264b08efab2801b10c extends Template
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
        $context["target"] = $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/updatepassword.php");
        // line 34
        $context["title"] = __("Password update");
        // line 35
        $context["type"] = "update";
        // line 36
        yield "
<div class=\"container-tight py-6\" style=\"max-width: 40rem\">
    <div class=\"card card-md main-content-card\">
        <div class=\"card-body\">
            ";
        // line 40
        yield Twig\Extension\CoreExtension::include($this->env, $context, "password_form.html.twig");
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
        return "updatepassword.html.twig";
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
        return array (  57 => 40,  51 => 36,  49 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "updatepassword.html.twig", "/var/www/glpi/templates/updatepassword.html.twig");
    }
}

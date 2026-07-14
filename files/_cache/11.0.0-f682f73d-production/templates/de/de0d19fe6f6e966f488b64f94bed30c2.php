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

/* pages/admin/helpdesk_home_config.html.twig */
class __TwigTemplate_b691d7345ac1596cd6f737eeb76963a8 extends Template
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
        $context["container_id"] = ("glpi-helpdesk-config-container-" . Twig\Extension\CoreExtension::random($this->env->getCharset()));
        // line 34
        $context["header_id"] = ("config-tiles-header-" . Twig\Extension\CoreExtension::random($this->env->getCharset()));
        // line 35
        yield "
<div id=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["container_id"] ?? null), "html", null, true);
        yield "\">
    <div data-glpi-helpdesk-config-default-view>
        <section
            class=\"container-xl ms-0 mt-2\"
            aria-labelledby=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["header_id"] ?? null), "html", null, true);
        yield "\"
        >
            ";
        // line 42
        if ((($tmp =  !(null === ($context["info_text"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 43
            yield "                <div
                    class=\"alert alert-info d-flex align-items-center mb-3\"
                    role=\"alert\"
                >
                    <i class=\"ti ti-info-circle me-2\"></i>
                    ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["info_text"] ?? null), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 51
        yield "
            <h1 id=\"";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["header_id"] ?? null), "html", null, true);
        yield "\" class=\"fs-2 mb-2\">
                ";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Home tiles configuration"), "html", null, true);
        yield "
            </h1>

            <div class=\"row ms-n2 me-n2 mb-3\" data-glpi-helpdesk-config-tiles>
                ";
        // line 58
        yield "                ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "pages/admin/helpdesk_home_config_tiles.html.twig", ["tiles_manager" =>         // line 59
($context["tiles_manager"] ?? null), "tiles" =>         // line 60
($context["tiles"] ?? null), "editable" =>         // line 61
($context["editable"] ?? null)], false);
        // line 62
        yield "
            </div>

            ";
        // line 65
        if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "                <div class=\"d-flex mb-3\" data-glpi-helpdesk-config-actions>
                    <button
                        class=\"btn btn-primary ms-2 w-auto d-flex align-items-center ms-auto\"
                        data-glpi-helpdesk-config-reorder-action-save
                    >
                        <i class=\"ti ti-device-floppy me-1\"></i>
                        <span>";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Save tiles order"), "html", null, true);
            yield "<span>
                    </button>
                </div>

                <div
                    class=\"offcanvas offcanvas-end\"
                    tabindex=\"-1\"
                    id=\"tile-form-offcanvas\"
                    aria-labelledby=\"tile-form-offcanvas-label\"
                >
                    <div class=\"offcanvas-header\">
                        <h3
                            id=\"tile-form-offcanvas-label\"
                            class=\"offcanvas-title\"
                            data-glpi-helpdesk-config-tile-form-title
                        ></h3>
                        <button
                            type=\"button\"
                            class=\"btn-close text-reset\"
                            data-bs-dismiss=\"offcanvas\"
                            aria-label=\"";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Close"), "html", null, true);
            yield "\"
                        ></button>
                    </div>
                    <div
                        class=\"offcanvas-body d-flex\"
                        data-glpi-helpdesk-config-tile-form-loading
                    >
                        <span
                            class=\"spinner-border me-auto ms-auto mt-5 mb-5\"
                            role=\"status\"
                        ></span>
                    </div>
                    <div
                        class=\"offcanvas-body d-none\"
                        data-glpi-helpdesk-config-tile-form
                    ></div>
                </div>
            ";
        }
        // line 110
        yield "        </section>
    </div>
</div>

";
        // line 114
        if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 115
            yield "    ";
            // line 116
            yield "    <script defer type=\"module\">
        (async () => {
            const module = await import(
                \"/js/modules/Helpdesk/HelpdeskConfigController.js\"
            );
            new module.GlpiHelpdeskConfigController(
                document.getElementById(\"";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["container_id"] ?? null), "html", null, true);
            yield "\"),
                \"";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["itemtype_item"] ?? null), "js"), "html", null, true);
            yield "\",
                ";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["items_id_item"] ?? null), "html", null, true);
            yield ",
            );
        })();
    </script>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/helpdesk_home_config.html.twig";
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
        return array (  184 => 124,  180 => 123,  176 => 122,  168 => 116,  166 => 115,  164 => 114,  158 => 110,  137 => 92,  114 => 72,  106 => 66,  104 => 65,  99 => 62,  97 => 61,  96 => 60,  95 => 59,  93 => 58,  86 => 53,  82 => 52,  79 => 51,  73 => 48,  66 => 43,  64 => 42,  59 => 40,  52 => 36,  49 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/helpdesk_home_config.html.twig", "/var/www/glpi/templates/pages/admin/helpdesk_home_config.html.twig");
    }
}

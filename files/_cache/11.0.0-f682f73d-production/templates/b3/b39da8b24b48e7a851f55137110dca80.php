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

/* pages/admin/helpdesk_home_config_tiles.html.twig */
class __TwigTemplate_f767ceed53da29fba03ffb8580dddd04 extends Template
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
        $context["editable"] = ((array_key_exists("editable", $context)) ? (Twig\Extension\CoreExtension::default(($context["editable"] ?? null), false)) : (false));
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tiles"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["tile"]) {
            // line 35
            yield "    <section
        class=\"col-12 col-lg-6 col-xl-4 d-flex-soft\"
        aria-label=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tile"], "getTitle", [], "method", false, false, false, 37), "html", null, true);
            yield "\"
        ";
            // line 38
            if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 39
                yield "            data-glpi-draggable-item
            data-glpi-helpdesk-config-tile-container
            data-glpi-helpdesk-config-action-show-edit-form
            data-bs-toggle=\"offcanvas\"
            data-bs-target=\"#tile-form-offcanvas\"
        ";
            }
            // line 45
            yield "    >
        <div
            ";
            // line 47
            if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 48
                yield "                ";
                $context["item_tile_id"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["tiles_manager"] ?? null), "getItemTileForTile", [$context["tile"]], "method", false, false, false, 48), "getID", [], "method", false, false, false, 48);
                // line 49
                yield "                data-glpi-helpdesk-config-tile
                data-glpi-helpdesk-config-tile-id=\"";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tile"], "getDatabaseId", [], "method", false, false, false, 50), "html", null, true);
                yield "\"
                data-glpi-helpdesk-config-tile-itemtype=\"";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(get_class($context["tile"]), "html", null, true);
                yield "\"
                data-glpi-helpdesk-config-item-tile-id=\"";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["item_tile_id"] ?? null), "html", null, true);
                yield "\"
                data-glpi-helpdesk-config-tile-sortable
            ";
            }
            // line 55
            yield "            class=\"card rounded my-2 flex-grow-1 ";
            yield (((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("cursor-pointer") : (""));
            yield "\"
        >
            <section class=\"card-body\">
                <div class=\"d-flex\">
                    <div class=\"aspect-ratio-1\">
                        ";
            // line 60
            yield $this->extensions['Glpi\Application\View\Extension\IllustrationExtension']->renderIllustration(CoreExtension::getAttribute($this->env, $this->source, $context["tile"], "getIllustration", [], "method", false, false, false, 60), 70);
            yield "
                    </div>
                    <div class=\"ms-4 w-100\">
                        <div class=\"d-flex w-100\">
                            <h2 class=\"card-title mb-2 text-break\">
                                ";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tile"], "getTitle", [], "method", false, false, false, 65), "html", null, true);
            yield "
                            </h2>

                            ";
            // line 68
            if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 69
                yield "                                <i
                                    class=\"ti ti-grip-horizontal cursor-grab ms-auto opacity-50\"
                                    data-glpi-helpdesk-config-tile-handle
                                    draggable=\"true\"
                                ></i>
                            ";
            }
            // line 75
            yield "                        </div>
                        <div class=\"text-secondary remove-last-tinymce-margin\">
                            ";
            // line 77
            yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml(CoreExtension::getAttribute($this->env, $this->source, $context["tile"], "getDescription", [], "method", false, false, false, 77));
            yield "
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
";
            $context['_iterated'] = true;
        }
        // line 84
        if (!$context['_iterated']) {
            // line 85
            yield "    ";
            // line 87
            yield "    ";
            if ((($tmp =  !($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 88
                yield "        <span class=\"text-muted\">
            ";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("There are no tiles defined for this item."), "html", null, true);
                yield "
        </span>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tile'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        yield "
";
        // line 94
        if ((($tmp = ($context["editable"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 95
            yield "    <div
        role=\"button\"
        aria-label=\"";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add tile"), "html", null, true);
            yield "\"
        data-bs-toggle=\"offcanvas\"
        data-bs-target=\"#tile-form-offcanvas\"
        data-glpi-helpdesk-config-action-new-tile
        class=\"col-12 col-lg-6 col-xl-4 d-flex-soft opacity-80 cursor-pointer opacity-100-hover min-height-110\"
    >
        <div class=\"card rounded my-2 flex-grow-1 border-dashed\">
            <div class=\"card-body d-flex justify-content-center\">
                <div class=\"d-flex align-items-center\">
                    <i class=\"ti ti-plus me-1\"></i>
                    <span class=\"fs-3\">";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add tile"), "html", null, true);
            yield "</span>
                </div>
            </div>
        </div>
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
        return "pages/admin/helpdesk_home_config_tiles.html.twig";
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
        return array (  187 => 107,  174 => 97,  170 => 95,  168 => 94,  165 => 93,  155 => 89,  152 => 88,  149 => 87,  147 => 85,  145 => 84,  133 => 77,  129 => 75,  121 => 69,  119 => 68,  113 => 65,  105 => 60,  96 => 55,  90 => 52,  86 => 51,  82 => 50,  79 => 49,  76 => 48,  74 => 47,  70 => 45,  62 => 39,  60 => 38,  56 => 37,  52 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/helpdesk_home_config_tiles.html.twig", "/var/www/glpi/templates/pages/admin/helpdesk_home_config_tiles.html.twig");
    }
}

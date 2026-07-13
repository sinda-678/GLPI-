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

/* components/helpdesk_forms/service_catalog_items.html.twig */
class __TwigTemplate_77ae77caae658d43808268d63c790f0c extends Template
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
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            yield "    ";
            if ($this->extensions['Glpi\Application\View\Extension\PhpExtension']->isInstanceOf($context["item"], "Glpi\\Form\\ServiceCatalog\\ServiceCatalogLeafInterface")) {
                // line 35
                yield "        ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "components/helpdesk_forms/service_catalog_item.html.twig", ["item" =>                 // line 37
$context["item"]], false);
                // line 39
                yield "
    ";
            }
            // line 41
            yield "    ";
            if ($this->extensions['Glpi\Application\View\Extension\PhpExtension']->isInstanceOf($context["item"], "Glpi\\Form\\ServiceCatalog\\ServiceCatalogCompositeInterface")) {
                // line 42
                yield "        ";
                if ((($tmp = ($context["expand_categories"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 43
                    yield "            <div class=\"col-12 d-flex\">
                ";
                    // line 44
                    $context["unique_dom_id"] = ("service-catalog-tree-" . Twig\Extension\CoreExtension::random($this->env->getCharset()));
                    // line 45
                    yield "                <section
                    class=\"card mx-1 my-2 flex-grow-1\"
                    aria-labelledby=\"";
                    // line 47
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["unique_dom_id"] ?? null), "html", null, true);
                    yield "\"
                >
                    <div class=\"card-body\">
                        <div class=\"card-title mb-0 d-flex align-items-center w-100\">
                            <h2 id=\"";
                    // line 51
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["unique_dom_id"] ?? null), "html", null, true);
                    yield "\" class=\"mb-0 fs-2\">
                                ";
                    // line 52
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "getServiceCatalogItemTitle", [], "method", false, false, false, 52), "html", null, true);
                    yield "
                            </h2>
                            <div class=\"card-subtitle ms-2 remove-last-tinymce-margin\">
                                ";
                    // line 55
                    yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "getServiceCatalogItemDescription", [], "method", false, false, false, 55));
                    yield "
                            </div>
                        </div>
                    </div>
                    <div class=\"card-body p-0\">
                        <div class=\"row g-0\">
                            ";
                    // line 61
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "getChildren", [], "method", false, false, false, 61));
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 62
                        yield "                                ";
                        yield Twig\Extension\CoreExtension::include($this->env, $context, "components/helpdesk_forms/service_catalog_nested_item.html.twig", ["child" =>                         // line 64
$context["child"]], false);
                        // line 66
                        yield "
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 68
                    yield "                        </div>
                    </div>
                </section>
            </div>
        ";
                } else {
                    // line 73
                    yield "            ";
                    yield Twig\Extension\CoreExtension::include($this->env, $context, "components/helpdesk_forms/service_catalog_item.html.twig", ["item" =>                     // line 75
$context["item"]], false);
                    // line 77
                    yield "
        ";
                }
                // line 79
                yield "    ";
            }
            $context['_iterated'] = true;
        }
        // line 80
        if (!$context['_iterated']) {
            // line 81
            yield "    ";
            if ((($tmp = ($context["is_default_search"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 82
                yield "        ";
                // line 83
                yield "        ";
                $context["empty_title"] = __("There are no forms available");
                // line 84
                yield "        ";
                $context["empty_subtitle"] = __("Please try again later.");
                // line 85
                yield "    ";
            } else {
                // line 86
                yield "        ";
                // line 87
                yield "        ";
                $context["empty_title"] = __("No forms found");
                // line 88
                yield "        ";
                $context["empty_subtitle"] = __("Try different keywords or filters.");
                // line 89
                yield "    ";
            }
            // line 90
            yield "    <div class=\"empty\">
        <p class=\"empty-title\">";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["empty_title"] ?? null), "html", null, true);
            yield "</p>
        <p class=\"empty-subtitle text-secondary\">
            ";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["empty_subtitle"] ?? null), "html", null, true);
            yield "
        </p>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        yield "
";
        // line 99
        if ((($context["total"] ?? null) > ($context["items_per_page"] ?? null))) {
            // line 100
            yield "    ";
            $context["total_pages"] = Twig\Extension\CoreExtension::round((((($context["total"] ?? null) + ($context["items_per_page"] ?? null)) - 1) / ($context["items_per_page"] ?? null)), 0, "floor");
            // line 101
            yield "    ";
            $context["adjacents"] = 2;
            // line 102
            yield "    ";
            $context["skip_adjacents"] = false;
            // line 103
            yield "
    <nav aria-label=\"";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Service catalog pages"), "html", null, true);
            yield "\">
        <ul class=\"pagination justify-content-center mt-4\">
            ";
            // line 107
            yield "            <li class=\"page-item ";
            yield (((($context["current_page"] ?? null) <= 1)) ? ("disabled") : (""));
            yield "\">
                <a
                    class=\"page-link d-flex justify-content-center\"
                    href=\"?";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => 1]), "html", null, true);
            yield "\"
                    data-children-url-parameters=\"";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => 1]), "html", null, true);
            yield "\"
                    data-pagination-item
                    aria-label=\"";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("First page"), "html", null, true);
            yield "\"
                    ";
            // line 114
            yield (((($context["current_page"] ?? null) <= 1)) ? ("aria-disabled=\"true\"") : (""));
            yield "
                >
                    <i class=\"ti ti-chevrons-left\"></i>
                </a>
            </li>
            <li class=\"page-item ";
            // line 119
            yield (((($context["current_page"] ?? null) <= 1)) ? ("disabled") : (""));
            yield "\">
                <a
                    class=\"page-link d-flex justify-content-center\"
                    href=\"?";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => (($context["current_page"] ?? null) - 1)]), "html", null, true);
            yield "\"
                    data-children-url-parameters=\"";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => (($context["current_page"] ?? null) - 1)]), "html", null, true);
            yield "\"
                    data-pagination-item
                    aria-label=\"";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Previous page"), "html", null, true);
            yield "\"
                    ";
            // line 126
            yield (((($context["current_page"] ?? null) <= 1)) ? ("aria-disabled=\"true\"") : (""));
            yield "
                >
                    <i class=\"ti ti-chevron-left\"></i>
                </a>
            </li>

            ";
            // line 133
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 134
                yield "                ";
                if ((((($context["current_page"] ?? null) - ($context["adjacents"] ?? null)) <= $context["page"]) && ((($context["current_page"] ?? null) + ($context["adjacents"] ?? null)) >= $context["page"]))) {
                    // line 135
                    yield "                    <li class=\"d-none d-sm-block page-item ";
                    yield ((($context["page"] == ($context["current_page"] ?? null))) ? ("active selected") : (""));
                    yield "\">
                        <a
                            class=\"page-link d-flex justify-content-center\"
                            href=\"?";
                    // line 138
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => $context["page"]]), "html", null, true);
                    yield "\"
                            data-children-url-parameters=\"";
                    // line 139
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => $context["page"]]), "html", null, true);
                    yield "\"
                            data-pagination-item
                        >
                            ";
                    // line 142
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                    yield "
                        </a>
                    </li>
                    ";
                    // line 145
                    if (((($context["current_page"] ?? null) + ($context["adjacents"] ?? null)) == $context["page"])) {
                        // line 146
                        yield "                        ";
                        $context["skip_adjacents"] = false;
                        // line 147
                        yield "                    ";
                    }
                    // line 148
                    yield "                ";
                } elseif ((($context["skip_adjacents"] ?? null) == false)) {
                    // line 149
                    yield "                    ";
                    $context["skip_adjacents"] = true;
                    // line 150
                    yield "                    <li class=\"d-none d-sm-block page-item disabled\">
                        <a class=\"page-link\" href=\"#\" aria-disabled=\"true\">...</a>
                    </li>
                ";
                }
                // line 154
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            yield "
            ";
            // line 157
            yield "            <li class=\"page-item ";
            yield (((($context["current_page"] ?? null) >= ($context["total_pages"] ?? null))) ? ("disabled") : (""));
            yield "\">
                <a
                    class=\"page-link d-flex justify-content-center\"
                    href=\"?";
            // line 160
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => (($context["current_page"] ?? null) + 1)]), "html", null, true);
            yield "\"
                    data-children-url-parameters=\"";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => (($context["current_page"] ?? null) + 1)]), "html", null, true);
            yield "\"
                    data-pagination-item
                    aria-label=\"";
            // line 163
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Next page"), "html", null, true);
            yield "\"
                    ";
            // line 164
            yield (((($context["current_page"] ?? null) >= ($context["total_pages"] ?? null))) ? ("aria-disabled=\"true\"") : (""));
            yield "
                >
                    <i class=\"ti ti-chevron-right\"></i>
                </a>
            </li>
            <li class=\"page-item ";
            // line 169
            yield (((($context["current_page"] ?? null) >= ($context["total_pages"] ?? null))) ? ("disabled") : (""));
            yield "\">
                <a
                    class=\"page-link d-flex justify-content-center\"
                    href=\"?";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => ($context["total_pages"] ?? null)]), "html", null, true);
            yield "\"
                    data-children-url-parameters=\"";
            // line 173
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(["category" => ($context["category_id"] ?? null), "filter" => ($context["filter"] ?? null), "page" => ($context["total_pages"] ?? null)]), "html", null, true);
            yield "\"
                    data-pagination-item
                    aria-label=\"";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Last page"), "html", null, true);
            yield "\"
                    ";
            // line 176
            yield (((($context["current_page"] ?? null) >= ($context["total_pages"] ?? null))) ? ("aria-disabled=\"true\"") : (""));
            yield "
                >
                    <i class=\"ti ti-chevrons-right\"></i>
                </a>
            </li>
        </ul>
    </nav>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/helpdesk_forms/service_catalog_items.html.twig";
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
        return array (  367 => 176,  363 => 175,  358 => 173,  354 => 172,  348 => 169,  340 => 164,  336 => 163,  331 => 161,  327 => 160,  320 => 157,  317 => 155,  311 => 154,  305 => 150,  302 => 149,  299 => 148,  296 => 147,  293 => 146,  291 => 145,  285 => 142,  279 => 139,  275 => 138,  268 => 135,  265 => 134,  260 => 133,  251 => 126,  247 => 125,  242 => 123,  238 => 122,  232 => 119,  224 => 114,  220 => 113,  215 => 111,  211 => 110,  204 => 107,  199 => 104,  196 => 103,  193 => 102,  190 => 101,  187 => 100,  185 => 99,  182 => 97,  172 => 93,  167 => 91,  164 => 90,  161 => 89,  158 => 88,  155 => 87,  153 => 86,  150 => 85,  147 => 84,  144 => 83,  142 => 82,  139 => 81,  137 => 80,  132 => 79,  128 => 77,  126 => 75,  124 => 73,  117 => 68,  110 => 66,  108 => 64,  106 => 62,  102 => 61,  93 => 55,  87 => 52,  83 => 51,  76 => 47,  72 => 45,  70 => 44,  67 => 43,  64 => 42,  61 => 41,  57 => 39,  55 => 37,  53 => 35,  50 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/helpdesk_forms/service_catalog_items.html.twig", "/var/www/glpi/templates/components/helpdesk_forms/service_catalog_items.html.twig");
    }
}

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

/* layout/parts/saved_searches_list.html.twig */
class __TwigTemplate_f9622c927f9573d4a636865efdd07891 extends Template
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
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["saved_searches"] ?? null)) == 0)) {
            // line 34
            yield "   <div class=\"alert alert-info\" role=\"alert\">
      ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You have not recorded any saved searches yet"), "html", null, true);
            yield "
   </div>
";
        }
        // line 38
        yield "
<div class='sortable-savedsearches'>
";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["saved_searches"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["search"]) {
            // line 41
            yield "   <div class=\"savedsearches-item grip-savedsearch list-group-item search-line d-flex align-items-center pe-1 ";
            yield (((($context["active"] ?? null) == (($_v0 = $context["search"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["id"] ?? null) : null))) ? ("active") : (""));
            yield "\"
         data-id=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = $context["search"]) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["id"] ?? null) : null), "html", null, true);
            yield "\">
      ";
            // line 43
            if ((($tmp =  !(($_v2 = $context["search"]) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["_error"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "          <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath("SavedSearch"), "html", null, true);
                yield "?action=load&amp;id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v3 = $context["search"]) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["id"] ?? null) : null), "html", null, true);
                yield "\"
             class=\"d-block saved-searches-link text-truncate\">
             ";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = $context["search"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["name"] ?? null) : null), "html", null, true);
                yield "
          </a>
      ";
            } else {
                // line 49
                yield "          <span class=\"d-block text-truncate\">
              ";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v5 = $context["search"]) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["name"] ?? null) : null), "html", null, true);
                yield "
          </span>
      ";
            }
            // line 53
            yield "      <div class=\"";
            yield ((((($_v6 = $context["search"]) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["is_default"] ?? null) : null) > 0)) ? ("") : ("list-group-item-actions"));
            yield " ms-auto default-ctrl\">
          ";
            // line 54
            if ((($tmp =  !(($_v7 = $context["search"]) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["_error"] ?? null) : null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                yield "             <i class=\"ti ";
                yield ((((($_v8 = $context["search"]) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["is_default"] ?? null) : null) > 0)) ? ("ti-star-filled") : ("ti-star"));
                yield " fs-5 mark-default me-1\"
                title=\"";
                // line 56
                yield ((((($_v9 = $context["search"]) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["is_default"] ?? null) : null) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Default search"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("mark as default"), "html", null, true)));
                yield "\"
                data-bs-toggle=\"tooltip\" data-bs-placement=\"right\"
                role=\"button\"></i>
          ";
            }
            // line 60
            yield "      </div>
      <div class=\"d-flex flex-nowrap align-items-center\">
         ";
            // line 62
            if (((($_v10 = $context["search"]) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["is_private"] ?? null) : null) == 1)) {
                // line 63
                yield "         <i class=\"ti ti-lock fs-5 text-muted me-1\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("private"), "html", null, true);
                yield "\"
            data-bs-toggle=\"tooltip\" data-bs-placement=\"right\"></i>
         ";
            }
            // line 66
            yield "         <span class=\"badge bg-secondary text-secondary-fg\">
            ";
            // line 67
            yield (($_v11 = $context["search"]) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["count"] ?? null) : null);
            yield "
         </span>
      </div>
   </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['search'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        yield "</div>

<script type=\"text/javascript\">
\$(function() {
   sortable('.sortable-savedsearches', {
      placeholder: '<div class=\"sortable-placeholder\">&nbsp;</div>',
   })
   \$('.sortable-savedsearches').on('sortupdate', function(e) {
      var _ids = \$('.savedsearches-item').map(function(idx, ele) {
         return \$(ele).data('id');
      }).get();

      \$.post(CFG_GLPI['root_doc']+'/ajax/savedsearch.php', {
         'action': 'reorder',
         'ids': _ids,
      });

      displayAjaxMessageAfterRedirect();
   });
});
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layout/parts/saved_searches_list.html.twig";
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
        return array (  144 => 72,  133 => 67,  130 => 66,  123 => 63,  121 => 62,  117 => 60,  110 => 56,  105 => 55,  103 => 54,  98 => 53,  92 => 50,  89 => 49,  83 => 46,  75 => 44,  73 => 43,  69 => 42,  64 => 41,  60 => 40,  56 => 38,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "layout/parts/saved_searches_list.html.twig", "/var/www/glpi/templates/layout/parts/saved_searches_list.html.twig");
    }
}

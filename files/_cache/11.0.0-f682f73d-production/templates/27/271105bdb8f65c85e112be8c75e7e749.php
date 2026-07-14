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

/* components/form/link_existing_or_new.html.twig */
class __TwigTemplate_6b495fac43f93eb1c19b54e824402250 extends Template
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
";
        // line 35
        $context["rand"] = ((array_key_exists("rand", $context)) ? (Twig\Extension\CoreExtension::default(($context["rand"] ?? null), Twig\Extension\CoreExtension::random($this->env->getCharset()))) : (Twig\Extension\CoreExtension::random($this->env->getCharset())));
        // line 36
        yield "<div class=\"firstbloc\">
   <form id=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["link_itemtype"] ?? null)) . "_form") . ($context["rand"] ?? null)), "html", null, true);
        yield "\" name=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["link_itemtype"] ?? null)) . "_form") . ($context["rand"] ?? null)), "html", null, true);
        yield "\" method=\"post\" action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath(($context["link_itemtype"] ?? null)), "html", null, true);
        yield "\">
      ";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["form_label"] ?? null), "html", null, true);
        yield "
      ";
        // line 39
        yield $macros["fields"]->getTemplateForMacro("macro_hiddenField", $context, 39, $this->getSourceContext())->macro_hiddenField(...[$this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeForeignKey(($context["source_itemtype"] ?? null)), ($context["source_items_id"] ?? null)]);
        yield "
      ";
        // line 40
        $context["primary_dropdown_itemtype"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["dropdown_options"] ?? null), "itemtype", [], "array", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default((($_v0 = ($context["dropdown_options"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["itemtype"] ?? null) : null), ($context["target_itemtype"] ?? null))) : (($context["target_itemtype"] ?? null)));
        // line 41
        yield "      <div class=\"d-flex\">
         ";
        // line 42
        if ((array_key_exists("link_types", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["link_types"] ?? null)))) {
            // line 43
            yield "            <div class=\"col-auto\">
               ";
            // line 44
            yield $macros["fields"]->getTemplateForMacro("macro_dropdownArrayField", $context, 44, $this->getSourceContext())->macro_dropdownArrayField(...["link", Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["link_types"] ?? null)), ($context["link_types"] ?? null), "", ["no_label" => true, "field_class" => ""]]);
            // line 47
            yield "
            </div>
         ";
        }
        // line 50
        yield "         <div class=\"col-auto\">
            ";
        // line 51
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 51, $this->getSourceContext())->macro_dropdownField(...[($context["primary_dropdown_itemtype"] ?? null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeForeignKey(($context["primary_dropdown_itemtype"] ?? null)), "", "", Twig\Extension\CoreExtension::merge(["no_label" => true, "field_class" => "", "rand" =>         // line 54
($context["rand"] ?? null)],         // line 55
($context["dropdown_options"] ?? null))]);
        yield "
            ";
        // line 56
        if (array_key_exists("ajax_dropdown", $context)) {
            // line 57
            yield "               ";
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Ajax::updateItemOnSelectEvent", [(($_v1 =             // line 58
($context["ajax_dropdown"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["toobserve"] ?? null) : null), (($_v2 = (($_v3 =             // line 59
($context["ajax_dropdown"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["toupdate"] ?? null) : null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["id"] ?? null) : null), (($_v4 =             // line 60
($context["ajax_dropdown"] ?? null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["url"] ?? null) : null), (($_v5 =             // line 61
($context["ajax_dropdown"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["params"] ?? null) : null)]);
            // line 63
            yield "            ";
        }
        // line 64
        yield "            ";
        if (array_key_exists("ajax_dropdown", $context)) {
            // line 65
            yield "               <span id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = (($_v7 = ($context["ajax_dropdown"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["toupdate"] ?? null) : null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["id"] ?? null) : null), "html", null, true);
            yield "\">
                  ";
            // line 66
            yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 66, $this->getSourceContext())->macro_dropdownField(...[(($_v8 = (($_v9 = ($context["ajax_dropdown"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["toupdate"] ?? null) : null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["itemtype"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeForeignKey((($_v10 = (($_v11 = ($context["ajax_dropdown"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["toupdate"] ?? null) : null)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["itemtype"] ?? null) : null)), "", "", Twig\Extension\CoreExtension::merge(["no_label" => true, "field_class" => "", "rand" =>             // line 69
($context["rand"] ?? null)], (($_v12 = (($_v13 =             // line 70
($context["ajax_dropdown"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["toupdate"] ?? null) : null)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["params"] ?? null) : null))]);
            yield "
               </span>
            ";
        }
        // line 73
        yield "         </div>
         <div class=\"col-auto\">
            <button class=\"btn btn-primary ms-1\" type=\"submit\" name=\"add\">
               <i class=\"ti ti-link\"></i>
               <span>";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("button", "Add"), "html", null, true);
        yield "</span>
            </button>
         </div>
         <div class=\"col-auto ms-4\">
            ";
        // line 81
        if ((($tmp = ($context["create_link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 82
            yield "               ";
            $context["target_form_path"] = (((($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath(($context["target_itemtype"] ?? null)) . "?_") . $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeForeignKey(($context["source_itemtype"] ?? null))) . "=") . ($context["source_items_id"] ?? null));
            // line 83
            yield "               ";
            $context["create_url"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["create_link"] ?? null), "url", [], "array", true, true, false, 83)) ? ((($_v14 = ($context["create_link"] ?? null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["url"] ?? null) : null)) : (($context["target_form_path"] ?? null)));
            // line 84
            yield "               <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["create_url"] ?? null), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                  <i class=\"ti ti-plus\"></i>
                  <span>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["button_label"] ?? null), "html", null, true);
            yield "</span>
               </a>
            ";
        }
        // line 89
        yield "         </div>
      </div>
      ";
        // line 91
        yield $macros["fields"]->getTemplateForMacro("macro_hiddenField", $context, 91, $this->getSourceContext())->macro_hiddenField(...["_glpi_csrf_token", Session::getNewCSRFToken()]);
        yield "
   </form>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/form/link_existing_or_new.html.twig";
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
        return array (  162 => 91,  158 => 89,  152 => 86,  146 => 84,  143 => 83,  140 => 82,  138 => 81,  131 => 77,  125 => 73,  119 => 70,  118 => 69,  117 => 66,  112 => 65,  109 => 64,  106 => 63,  104 => 61,  103 => 60,  102 => 59,  101 => 58,  99 => 57,  97 => 56,  93 => 55,  92 => 54,  91 => 51,  88 => 50,  83 => 47,  81 => 44,  78 => 43,  76 => 42,  73 => 41,  71 => 40,  67 => 39,  63 => 38,  55 => 37,  52 => 36,  50 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/form/link_existing_or_new.html.twig", "/var/www/glpi/templates/components/form/link_existing_or_new.html.twig");
    }
}

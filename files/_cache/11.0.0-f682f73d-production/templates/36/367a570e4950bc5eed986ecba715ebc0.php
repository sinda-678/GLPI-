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

/* pages/admin/group.html.twig */
class __TwigTemplate_da46f394bb3613c0d4767e9a4a46c340 extends Template
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

        $this->blocks = [
            'form_fields' => [$this, 'block_form_fields'],
            'more_fields' => [$this, 'block_more_fields'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "generic_show_form.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->load("components/form/fields_macros.html.twig", 34)->unwrap();
        // line 35
        $context["params"] = (((array_key_exists("params", $context) &&  !(null === $context["params"]))) ? ($context["params"]) : ([]));
        // line 36
        $context["rand_field"] = ((array_key_exists("rand", $context)) ? (Twig\Extension\CoreExtension::default(($context["rand"] ?? null), Twig\Extension\CoreExtension::random($this->env->getCharset()))) : (Twig\Extension\CoreExtension::random($this->env->getCharset())));
        // line 33
        $this->parent = $this->load("generic_show_form.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "   ";
        yield from $this->unwrap()->yieldBlock('more_fields', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_more_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 40
        yield "      ";
        yield $macros["fields"]->getTemplateForMacro("macro_textField", $context, 40, $this->getSourceContext())->macro_textField(...["name", (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 40)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["name"] ?? null) : null), __("Name")]);
        yield "
      ";
        // line 41
        yield $macros["fields"]->getTemplateForMacro("macro_textareaField", $context, 41, $this->getSourceContext())->macro_textareaField(...["comment", (($_v1 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 41)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["comment"] ?? null) : null), __("Comments")]);
        yield "

      ";
        // line 43
        yield $macros["fields"]->getTemplateForMacro("macro_textField", $context, 43, $this->getSourceContext())->macro_textField(...["code", (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 43)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["code"] ?? null) : null), __("Code")]);
        yield "
      ";
        // line 44
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownField", $context, 44, $this->getSourceContext())->macro_dropdownField(...["Group", "groups_id", (($_v3 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 44)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["groups_id"] ?? null) : null), __("As child of"), ["entity" => (($_v4 = CoreExtension::getAttribute($this->env, $this->source,         // line 45
($context["item"] ?? null), "fields", [], "any", false, false, false, 45)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["entities_id"] ?? null) : null), "used" => ((((($_v5 = CoreExtension::getAttribute($this->env, $this->source,         // line 46
($context["item"] ?? null), "fields", [], "any", false, false, false, 46)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["id"] ?? null) : null) > 0)) ? ($this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("getSonsOf", [CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getTable", [], "method", false, false, false, 46), (($_v6 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 46)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["id"] ?? null) : null)])) : ([]))]]);
        // line 47
        yield "

      ";
        // line 49
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 49, $this->getSourceContext())->macro_dropdownYesNo(...["recursive_membership", (($_v7 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 49)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["recursive_membership"] ?? null) : null), __("Recursive membership"), ["helper" => __("If enabled, members of this group will also become implicit members of its children groups")]]);
        // line 51
        yield "

      ";
        // line 53
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 53, $this->getSourceContext())->macro_smallTitle(...[__("Visible in a ticket")]);
        yield "
      ";
        // line 54
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 54, $this->getSourceContext())->macro_dropdownYesNo(...["is_requester", (($_v8 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 54)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["is_requester"] ?? null) : null), _n("Requester", "Requesters", 1)]);
        yield "
      ";
        // line 55
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 55, $this->getSourceContext())->macro_dropdownYesNo(...["is_watcher", (($_v9 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 55)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["is_watcher"] ?? null) : null), _n("Observer", "Observers", 1)]);
        yield "
      ";
        // line 56
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 56, $this->getSourceContext())->macro_dropdownYesNo(...["is_assign", (($_v10 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 56)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["is_assign"] ?? null) : null), __("Assigned to")]);
        yield "
      ";
        // line 57
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 57, $this->getSourceContext())->macro_dropdownYesNo(...["is_task", (($_v11 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 57)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["is_task"] ?? null) : null), _n("Task", "Tasks", 1)]);
        yield "
      ";
        // line 58
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 58, $this->getSourceContext())->macro_dropdownYesNo(...["is_notify", (($_v12 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 58)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["is_notify"] ?? null) : null), __("Can be notified")]);
        yield "

      ";
        // line 60
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 60, $this->getSourceContext())->macro_smallTitle(...[__("Visible in a project")]);
        yield "
      ";
        // line 61
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 61, $this->getSourceContext())->macro_dropdownYesNo(...["is_manager", (($_v13 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 61)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["is_manager"] ?? null) : null), __("Can be manager")]);
        yield "

      ";
        // line 63
        yield $macros["fields"]->getTemplateForMacro("macro_smallTitle", $context, 63, $this->getSourceContext())->macro_smallTitle(...[__("Can contain")]);
        yield "
      ";
        // line 64
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 64, $this->getSourceContext())->macro_dropdownYesNo(...["is_itemgroup", (($_v14 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 64)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["is_itemgroup"] ?? null) : null), _n("Item", "Items", Session::getPluralNumber())]);
        yield "
      ";
        // line 65
        yield $macros["fields"]->getTemplateForMacro("macro_dropdownYesNo", $context, 65, $this->getSourceContext())->macro_dropdownYesNo(...["is_usergroup", (($_v15 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 65)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["is_usergroup"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("User", Session::getPluralNumber())]);
        yield "
   ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/admin/group.html.twig";
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
        return array (  148 => 65,  144 => 64,  140 => 63,  135 => 61,  131 => 60,  126 => 58,  122 => 57,  118 => 56,  114 => 55,  110 => 54,  106 => 53,  102 => 51,  100 => 49,  96 => 47,  94 => 46,  93 => 45,  92 => 44,  88 => 43,  83 => 41,  78 => 40,  66 => 39,  59 => 38,  54 => 33,  52 => 36,  50 => 35,  48 => 34,  41 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/admin/group.html.twig", "/var/www/glpi/templates/pages/admin/group.html.twig");
    }
}

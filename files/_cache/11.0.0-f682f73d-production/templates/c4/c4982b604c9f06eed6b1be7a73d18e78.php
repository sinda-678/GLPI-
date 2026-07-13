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

/* components/itilobject/actors/field.html.twig */
class __TwigTemplate_0d61201a575c62d953029d7092b45aec extends Template
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
        $context["load_actors"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "load_actors", [], "array", true, true, false, 33) &&  !(null === (($_v0 = ($context["params"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["load_actors"] ?? null) : null)))) ? ((($_v1 = ($context["params"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1["load_actors"] ?? null) : null)) : (true));
        // line 34
        $context["actors"] = (((($tmp = ($context["load_actors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getActorsForType", [($context["actortypeint"] ?? null), ($context["params"] ?? null)], "method", false, false, false, 34)) : ([]));
        // line 35
        yield "
";
        // line 36
        $context["required"] = false;
        // line 37
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isMandatoryField", [("_users_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 37) || CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isMandatoryField", [("_groups_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 37)) || ((($context["actortype"] ?? null) == "assign") && CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isMandatoryField", [("_suppliers_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 37)))) {
            // line 38
            yield "   ";
            $context["required"] = true;
        }
        // line 40
        yield "
";
        // line 41
        $context["is_actor_hidden"] = false;
        // line 42
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_users_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 42) && CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_groups_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 42)) && ((($context["actortype"] ?? null) != "assign") || CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_suppliers_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 42)))) {
            // line 43
            yield "   ";
            $context["is_actor_hidden"] = true;
        }
        // line 45
        yield "
";
        // line 46
        $context["onchange"] = "";
        // line 47
        $context["allow_auto_submit"] = (((array_key_exists("allow_auto_submit", $context) &&  !(null === $context["allow_auto_submit"]))) ? ($context["allow_auto_submit"]) : (true));
        // line 48
        if (((($context["allow_auto_submit"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 48)) && (($context["actortype"] ?? null) == "requester"))) {
            // line 49
            yield "   ";
            $context["onchange"] = "e.target.form.submit();";
        }
        // line 51
        yield "
";
        // line 52
        if ((($tmp =  !($context["is_actor_hidden"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "   <select class=\"form-select\" multiple=\"true\" id=\"actor_";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\" data-actor-type=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "html", null, true);
            yield "\"
        ";
            // line 54
            yield (((($tmp = ($context["required"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("required") : (""));
            yield ">
   ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["actors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["actor"]) {
                // line 56
                yield "      ";
                $context["unique_id"] = ((("user_opt_" . ($context["actortype"] ?? null)) . CoreExtension::getAttribute($this->env, $this->source, $context["actor"], "itemtype", [], "any", false, false, false, 56)) . CoreExtension::getAttribute($this->env, $this->source, $context["actor"], "items_id", [], "any", false, false, false, 56));
                // line 57
                yield "      ";
                $context["actor_use_notification"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["actor"], "use_notification", [], "array", true, true, false, 57) &&  !(null === (($_v2 = $context["actor"]) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["use_notification"] ?? null) : null)))) ? ((($_v3 = $context["actor"]) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["use_notification"] ?? null) : null)) : (false));
                // line 58
                yield "      <option selected=\"true\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((($_v4 = $context["actor"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["itemtype"] ?? null) : null) . "_") . (($_v5 = $context["actor"]) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["items_id"] ?? null) : null)), "html", null, true);
                yield "\"
            data-itemtype=\"";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = $context["actor"]) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["itemtype"] ?? null) : null), "html", null, true);
                yield "\" data-items-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v7 = $context["actor"]) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7["items_id"] ?? null) : null), "html", null, true);
                yield "\"
            data-use-notification=\"";
                // line 60
                yield (((($tmp = ($context["actor_use_notification"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (1) : (0));
                yield "\"
            data-default-email=\"";
                // line 61
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["actor"], "default_email", [], "array", true, true, false, 61) &&  !(null === (($_v8 = $context["actor"]) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["default_email"] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v9 = $context["actor"]) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9["default_email"] ?? null) : null), "html", null, true)) : (""));
                yield "\"
            data-alternative-email=\"";
                // line 62
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["actor"], "alternative_email", [], "array", true, true, false, 62) &&  !(null === (($_v10 = $context["actor"]) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["alternative_email"] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v11 = $context["actor"]) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11["alternative_email"] ?? null) : null), "html", null, true)) : (""));
                yield "\"
            ";
                // line 63
                if (((((($_v12 = $context["actor"]) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12["itemtype"] ?? null) : null) == "User") && CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_users_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 63)) || (((($_v13 = $context["actor"]) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13["itemtype"] ?? null) : null) == "Group") && CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_groups_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 63)))) {
                    // line 64
                    yield "               disabled=\"disabled\" style=\"display: none;\"
            ";
                }
                // line 66
                yield "            data-text=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v14 = $context["actor"]) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14["text"] ?? null) : null), "html", null, true);
                yield "\" data-title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v15 = $context["actor"]) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15["title"] ?? null) : null), "html", null, true);
                yield "\" data-glpi-popover-source=\"content";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["unique_id"] ?? null), "html", null, true);
                yield "\">
         ";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v16 = $context["actor"]) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16["title"] ?? null) : null), "html", null, true);
                yield "
      </option>
   ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['actor'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "   </select>

   ";
            // line 72
            if ((( !CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 72) &&  !(((CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "template_preview", [], "array", true, true, false, 72) &&  !(null === (($_v17 = ($context["params"] ?? null)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17["template_preview"] ?? null) : null)))) ? ((($_v18 = ($context["params"] ?? null)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18["template_preview"] ?? null) : null)) : (false))) && ($context["canassigntome"] ?? null))) {
                // line 73
                yield "      ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "components/itilobject/actors/assign_to_me.html.twig");
                yield "
   ";
            }
            // line 75
            yield "
    ";
            // line 85
            yield "    ";
            $context["safe_item_fields"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 85), function ($__value__, $__key__) use ($context, $macros) { $context["value"] = $__value__; $context["key"] = $__key__; return (($context["key"] ?? null) != "content"); });
            // line 86
            yield "    <script type=\"module\" defer>
        const actorytype = '";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "';

        // function to display an option in the list or the selected input
        function genericTemplate(option = {}, is_selection = false) {
            const element   = \$(option.element);
            const itemtype  = element.data('itemtype') ?? option.itemtype;
            const items_id  = element.data('items-id') ?? option.items_id;
            let text        = _.escape(element.data('text') ?? option.text ?? '');
            const title     = _.escape(element.data('title') ?? option.title ?? '');
            const use_notif = element.data('use-notification') ?? option.use_notification ?? 1;
            const alt_email = element.data('alternative-email') ?? option.alternative_email ?? '';

            let icon = \"\";
            let fk   = \"\";
            switch (itemtype) {
                case \"User\":
                    if (items_id == 0) {
                        text = alt_email;
                        icon = `<i class=\"ti ti-mail mx-1\" title=\"";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Direct email"), "html"), "js"), "html", null, true);
            yield "\"></i>`;
                    } else {
                        icon = `<i class=\"ti ti-user mx-1\" title=\"";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("User"), "html"), "js"), "html", null, true);
            yield "\"></i>`;
                    }
                    if (\"";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"assign\") {
                        fk = \"users_id_assign\";
                    } else if (\"";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"requester\") {
                        fk = \"users_id_requester\";
                    } else if (\"";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"observer\") {
                        fk = \"users_id_observer\";
                    }
                    break;
                case \"Group\":
                    icon = `<i class=\"ti ti-users mx-1\" title=\"";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Group"), "html"), "js"), "html", null, true);
            yield "\"></i>`;
                    if (\"";
            // line 119
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"assign\") {
                        fk = \"groups_id_assign\";
                    } else if (\"";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"requester\") {
                        fk = \"groups_id_requester\";
                    } else if (\"";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"observer\") {
                        fk = \"groups_id_observer\";
                    }
                    break;
                case \"Supplier\":
                    icon = `<i class=\"ti ti-package mx-1\" title=\"";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Supplier"), "html"), "js"), "html", null, true);
            yield "\"></i>`;
                    fk   = \"suppliers_id_assign\";
                    break;
            }

            let actions = \"\";
            ";
            // line 134
            if ((($tmp = ($context["canupdate"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 135
                yield "            if (['User', 'Supplier', 'Email'].includes(itemtype)
                && is_selection) {
                const icon_class = use_notif ? \"ti-bell-filled\" : \"ti-bell\";
                actions = `
                    <button class=\"btn btn-sm btn-ghost-secondary edit-notify-user\"
                              data-bs-toggle=\"tooltip\" data-bs-placement=\"top\"
                              title=\"";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Email followup"), "html"), "js"), "html", null, true);
                yield "\"
                              type=\"button\">
                        <i class=\"ti \${icon_class} notify-icon\"></i>
                    </button>`;
            }
            ";
            }
            // line 147
            yield "
            // manage specific display for tree data (like groups)
            let indent = \"\";
            if (!is_selection && \"level\" in option && option.level > 1) {
                for (let index = 1; index < option.level; index++) {
                    indent = \"&nbsp;&nbsp;&nbsp;\"+indent;
                }
                indent = indent+\"&raquo;\";
            }

            // prepare html for option element
            text = (is_selection && itemtype == \"Group\") ? title : text;
            const option_text    = `<span class=\"actor_text\">\${text}</span>`;
            const option_element = \$(`<span class=\"actor_entry\" data-itemtype=\"\${_.escape(itemtype)}\" data-items-id=\"\${_.escape(items_id)}\" data-actortype=\"\${_.escape(actorytype)}\">\${indent}\${icon}\${option_text}\${actions}</span>`);

            if (is_selection && itemtype == \"User\") {
                const unique_id = \"user_opt_\" + actor_select.attr('data-actor-type') + \"User\" + items_id;
                \$.ajax({
                    url: '";
            // line 165
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/comments.php"), "html", null, true);
            yield "',
                    type: 'POST',
                    data: {
                        'itemtype': 'User',
                        'value': items_id,
                    }
                }).then((result) => {
                    ";
            // line 173
            yield "                    if (result) {
                        actor_select.parent().append('<' + `div id=\"content\${_.escape(unique_id)}\" style=\"display: none;\">` + result + '<' + '/div>');
                        option_element.attr('data-glpi-popover-source', `content\${unique_id}`);
                    }
                });
            }

            if (is_selection && itemtype == \"Group\") {
                const unique_id = \"group_opt_\" + actor_select.attr('data-actor-type') + \"Group\" + items_id;
                \$.ajax({
                    url: '";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/comments.php"), "html", null, true);
            yield "',
                    type: 'POST',
                    data: {
                        'itemtype': 'Group',
                        'value': items_id,
                    }
                }).then((result) => {
                    ";
            // line 191
            yield "                    if (result) {
                        actor_select.parent().append('<' + `div id=\"content\${_.escape(unique_id)}\" style=\"display: none;\">` + result + '<' + '/div>');
                        option_element.attr('data-glpi-popover-source', `content\${unique_id}`);
                    }
                });
            }

            if (is_selection && itemtype == \"Supplier\") {
                const unique_id = \"supplier_opt_\" + actor_select.attr('data-actor-type') + \"Supplier\" + items_id;
                \$.ajax({
                    url: '";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/comments.php"), "html", null, true);
            yield "',
                    type: 'POST',
                    data: {
                        'itemtype': 'Supplier',
                        'value': items_id,
                    }
                }).then((result) => {
                    ";
            // line 209
            yield "                    if (result) {
                        actor_select.parent().append('<' + `div id=\"content\${_.escape(unique_id)}\" style=\"display: none;\">` + result + '<' + '/div>');
                        option_element.attr('data-glpi-popover-source', `content\${unique_id}`);
                    }
                });
            }

            // manage ticket information (number of assigned ticket for an actor)
            if (is_selection && itemtype != \"Email\") {
                let label = '';
                if (\"";
            // line 219
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"assign\") {
                    label = \"";
            // line 220
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Number of tickets already assigned"), "js"), "html", null, true);
            yield "\";
                } else if (\"";
            // line 221
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "js"), "html", null, true);
            yield "\" == \"requester\") {
                    label = \"";
            // line 222
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Number of tickets as requester"), "js"), "html", null, true);
            yield "\";
                }
                const existing_element = \$(`
                    <span class=\"assign_infos ms-1\" title=\"\${_.escape(label)}\"
                        data-bs-toggle=\"tooltip\" data-bs-placement=\"top\"
                        data-id=\"\${_.escape(items_id)}\" data-fk=\"\${_.escape(fk)}\">
                        <span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>
                    </span>
                `);
                option_element.append(existing_element);

                \$.get(\"";
            // line 233
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/actorinformation.php"), "html", null, true);
            yield "\", {
                    [fk]: items_id,
                    only_number: true,
                }).done((number) => {
                    ";
            // line 238
            yield "                    const badge = number.length > 0 ? `<span class=\"badge bg-secondary-lt\">\${number}</span>` : '';
                    existing_element.html(badge);
                });
            }

            return option_element;
        }

        const select2_width = \"";
            // line 246
            yield (((($tmp = ($context["canassigntome"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("calc(100% - 30px)") : ("100%"));
            yield "\";

        const actor_select = \$(\"#actor_";
            // line 248
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\");
        actor_select.select2({
            tags: true,
            width: select2_width,
            tokenSeparators: [',', ' '],
            containerCssClass: 'actor-field',
            templateSelection: (option) => genericTemplate(option, true),
            templateResult: (option) => genericTemplate(option, false),
            disabled: ";
            // line 256
            yield (((($tmp = ($context["canupdate"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("false") : ("true"));
            yield ",
            createTag: (params) => {
                const term = \$.trim(params.term);

                if (term === '') {
                    return null;
                }

                // Don't offset to create a tag if it's not an email
                if (!new RegExp(/^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,63}\$/).test(term)) {
                    // Return null to disable tag creation
                    return null;
                }

                return {
                    id: term,
                    text: term,
                    itemtype: \"User\",
                    items_id: 0,
                    use_notification: 1,
                    alternative_email: term,
                }
            },
            ajax: {
                url: '";
            // line 280
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/ajax/actors.php"), "html", null, true);
            yield "',
                datatype: 'json',
                type: 'POST',
                delay:250,
                data: (params) => {
                    const is_new_item = ";
            // line 285
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 285)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
            yield ";
                    return {
                        action: 'getActors',
                        actortype: actorytype,
                        users_right: '";
            // line 289
            yield (((array_key_exists("users_right", $context) &&  !(null === $context["users_right"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["users_right"], "html", null, true)) : ("all"));
            yield "',
                        entity_restrict: (window.actors.requester.length === 0 && is_new_item) ? -1 : ";
            // line 290
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entities_id"] ?? null), "html", null, true);
            yield ",
                        searchText: params.term,
                        _idor_token: '";
            // line 292
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewIDORToken(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 292), ["users_right" => (((array_key_exists("users_right", $context) &&  !(null === $context["users_right"]))) ? ($context["users_right"]) : ("all"))]), "html", null, true);
            yield "',
                        itiltemplate_class: '";
            // line 293
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "getType", [], "method", false, false, false, 293), "html", null, true);
            yield "',
                        itiltemplates_id: ";
            // line 294
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "fields", [], "any", false, true, false, 294), "id", [], "array", true, true, false, 294) &&  !(null === (($_v19 = CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "fields", [], "any", false, false, false, 294)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19["id"] ?? null) : null)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v20 = CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "fields", [], "any", false, false, false, 294)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20["id"] ?? null) : null), "html", null, true)) : (0));
            yield ",
                        itemtype: '";
            // line 295
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 295), "html", null, true);
            yield "',
                        items_id: ";
            // line 296
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 296)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape( -1, "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v21 = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 296)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21["id"] ?? null) : null), "html", null, true)));
            yield ",
                        item: ";
            // line 297
            yield json_encode(($context["safe_item_fields"] ?? null));
            yield ",
                        returned_itemtypes: ";
            // line 298
            yield json_encode((((array_key_exists("returned_itemtypes", $context) &&  !(null === $context["returned_itemtypes"]))) ? ($context["returned_itemtypes"]) : (["User", "Group", "Supplier"])));
            yield ",
                        page: params.page || 1
                    };
                },
            }
        }).on('select2:open', () => {
            // Close popovers
            \$('.popover').popover('hide');
        });

        actor_select.parent().popover({
            selector: '[data-glpi-popover-source]',
            container: actor_select.parent(),
            html: true,
            sanitize: false,
            trigger: 'hover',
            delay: {
                hide: 300
            },
            content: (el) => {
                // Close other popovers
                \$('.popover').popover('hide');
                return \$('#' + \$(el).attr('data-glpi-popover-source')).html();
            }
        }).on('hide.bs.popover', () => {
            // prevent closing popover when user card is hover
            if (\$('.user-info-card:hover').length > 0) {
                return false;
            }
            // prevent closing popover when group card is hover
            if (\$('.group-info-card:hover').length > 0) {
                return false;
            }
            // prevent closing popover when group card is hover
            if (\$('.supplier-info-card:hover').length > 0) {
                return false;
            }
        });

        // when the mouse leave the user card in the popover, close it
        \$(document).on('mouseleave', '.user-info-card', () => {
            setTimeout(() => {
                \$('.popover').popover('hide');
            }, 300);
        });

        // when the mouse leave the group card in the popover, close it
        \$(document).on('mouseleave', '.group-info-card', () => {
            setTimeout(() => {
                \$('.popover').popover('hide');
            }, 300);
        });

        // when the mouse leave the supplier card in the popover, close it
        \$(document).on('mouseleave', '.supplier-info-card', () => {
            setTimeout(() => {
                \$('.popover').popover('hide');
            }, 300);
        });

        // manage actors change
        function updateActors() {
            const data = \$(\"#actor_";
            // line 360
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").select2('data');

            const new_actors = [];
            data.forEach((selection) => {
                const element = \$(selection.element);

                let itemtype  = selection.itemtype ?? element.data('itemtype');
                const items_id  = selection.items_id ?? element.data('items-id');
                let use_notif = selection.use_notification  ?? element.data('use-notification')  ?? false;
                const def_email = selection.default_email ?? element.data('default-email') ?? '';
                let alt_email = selection.alternative_email ?? element.data('alternative-email') ?? '';

                if (itemtype == \"Email\") {
                    itemtype  = \"User\";
                    use_notif = true;
                    alt_email = selection.id;
                }

                new_actors.push({
                    itemtype: itemtype,
                    items_id: items_id,
                    use_notification: use_notif,
                    default_email: def_email,
                    alternative_email: alt_email,
                });
            });

            window.actors[actorytype] = new_actors;

            saveActorsToDom();
        }

        \$(\"#actor_";
            // line 392
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").on('select2:select', (e) => {
            updateActors();
            ";
            // line 394
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["onchange"] ?? null), "html", null, true);
            yield "
        });
        \$(\"#actor_";
            // line 396
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield "\").on('select2:unselect', (e) => {
            updateActors();
            ";
            // line 398
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["onchange"] ?? null), "html", null, true);
            yield "
        });

        // intercept event for edit notification button
        document.addEventListener('click', event => {
            if (event.target.closest(\"#actor_";
            // line 403
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield " + .select2 .edit-notify-user\")) {
                return openNotifyModal(event);
            }
            // if a click on assign info is detected prevent opening of select2
            if (event.target.closest(\"#actor_";
            // line 407
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield " + .select2 .assign_infos\")) {
                event.stopPropagation();
            }
        }, {capture: true})
        document.addEventListener('keydown', event => {
            if (event.target.closest(\"#actor_";
            // line 412
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rand"] ?? null), "html", null, true);
            yield " + .select2 .edit-notify-user\")
                && event.key == \"Enter\") {
                return openNotifyModal(event);
            }
        }, {capture: true})

        ";
            // line 418
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_users_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 418)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 419
                yield "        \$(\".actor_entry[data-itemtype=\\\"User\\\"][data-actortype=\\\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "html", null, true);
                yield "\\\"]\").parent().css(\"display\", \"none\");
        ";
            }
            // line 421
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["itiltemplate"] ?? null), "isHiddenField", [("_groups_id_" . ($context["actortype"] ?? null))], "method", false, false, false, 421)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 422
                yield "        \$(\".actor_entry[data-itemtype=\\\"Group\\\"][data-actortype=\\\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["actortype"] ?? null), "html", null, true);
                yield "\\\"]\").parent().css(\"display\", \"none\");
        ";
            }
            // line 424
            yield "    </script>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/itilobject/actors/field.html.twig";
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
        return array (  661 => 424,  655 => 422,  652 => 421,  646 => 419,  644 => 418,  635 => 412,  627 => 407,  620 => 403,  612 => 398,  607 => 396,  602 => 394,  597 => 392,  562 => 360,  497 => 298,  493 => 297,  489 => 296,  485 => 295,  481 => 294,  477 => 293,  473 => 292,  468 => 290,  464 => 289,  457 => 285,  449 => 280,  422 => 256,  411 => 248,  406 => 246,  396 => 238,  389 => 233,  375 => 222,  371 => 221,  367 => 220,  363 => 219,  351 => 209,  341 => 201,  329 => 191,  319 => 183,  307 => 173,  297 => 165,  277 => 147,  268 => 141,  260 => 135,  258 => 134,  249 => 128,  241 => 123,  236 => 121,  231 => 119,  227 => 118,  219 => 113,  214 => 111,  209 => 109,  204 => 107,  199 => 105,  178 => 87,  175 => 86,  172 => 85,  169 => 75,  163 => 73,  161 => 72,  157 => 70,  148 => 67,  139 => 66,  135 => 64,  133 => 63,  129 => 62,  125 => 61,  121 => 60,  115 => 59,  110 => 58,  107 => 57,  104 => 56,  100 => 55,  96 => 54,  89 => 53,  87 => 52,  84 => 51,  80 => 49,  78 => 48,  76 => 47,  74 => 46,  71 => 45,  67 => 43,  65 => 42,  63 => 41,  60 => 40,  56 => 38,  54 => 37,  52 => 36,  49 => 35,  47 => 34,  45 => 33,  42 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/itilobject/actors/field.html.twig", "/var/www/glpi/templates/components/itilobject/actors/field.html.twig");
    }
}

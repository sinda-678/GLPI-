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

/* __string_template__8b805d230a18e54e3836a7203c270771 */
class __TwigTemplate_94014ae1d78e096410812f69a9fa85f1 extends Template
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
        // line 1
        yield "            <div class=\"d-flex justify-content-center\">
                ";
        // line 2
        if ((($tmp = ($context["can_reset"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 3
            yield "                    <button type=\"button\" class=\"btn btn-ghost-danger mx-1\" data-bs-toggle=\"modal\" data-bs-target=\"#reset_rules\">
                        ";
            // line 4
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["reset_label"] ?? null), "html", null, true);
            yield "
                    </button>

                    ";
            // line 7
            $context["reset_btn"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "                        <a class=\"btn btn-danger w-100\" role=\"button\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath(($context["rule_class"] ?? null)), "html", null, true);
                yield "?reinit=true&amp;subtype=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["rule_class"] ?? null)), "html", null, true);
                yield "\">
                            ";
                // line 9
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["reset_label"] ?? null), "html", null, true);
                yield "
                        </a>
                    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 12
            yield "
                    ";
            // line 13
            yield Twig\Extension\CoreExtension::include($this->env, $context, "components/danger_modal.html.twig", ["modal_id" => "reset_rules", "confirm_btn" =>             // line 15
($context["reset_btn"] ?? null), "content" =>             // line 16
($context["reset_warning"] ?? null)]);
            // line 17
            yield "
                ";
        }
        // line 19
        yield "                <button type=\"button\" class=\"btn btn-primary mx-1\" data-bs-toggle=\"modal\" data-bs-target=\"#allruletest\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["test_label"] ?? null), "html", null, true);
        yield "</button>
                ";
        // line 20
        $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Ajax::createIframeModalWindow", ["allruletest", ($context["test_url"] ?? null), ["title" => ($context["test_label"] ?? null)]]);
        // line 21
        yield "                ";
        if ((($tmp = ($context["can_replay"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "                    <a class=\"btn btn-primary mx-1\" role=\"button\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeSearchPath(($context["rule_class"] ?? null)), "html", null, true);
            yield "?replay_rule=replay_rule\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["replay_label"] ?? null), "html", null, true);
            yield "</a>
                ";
        }
        // line 24
        yield "            </div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__8b805d230a18e54e3836a7203c270771";
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
        return array (  101 => 24,  93 => 22,  90 => 21,  88 => 20,  83 => 19,  79 => 17,  77 => 16,  76 => 15,  75 => 13,  72 => 12,  65 => 9,  58 => 8,  56 => 7,  50 => 4,  47 => 3,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__8b805d230a18e54e3836a7203c270771", "");
    }
}

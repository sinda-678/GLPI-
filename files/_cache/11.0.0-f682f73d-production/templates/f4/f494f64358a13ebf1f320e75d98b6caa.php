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

/* components/itilobject/itiltemplate.html.twig */
class __TwigTemplate_0d9fee0ca26be81342c1461ae2378563 extends Template
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
            'more_fields' => [$this, 'block_more_fields'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "dropdown_form.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("dropdown_form.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_more_fields(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 36
        yield "   ";
        if ((array_key_exists("affected_item_count", $context) && (($context["affected_item_count"] ?? null) > 0))) {
            // line 37
            yield "      <script>
          (function() {
              const save_button = \$('button[name=\"update\"]');
              const delete_button = \$('button[name=\"delete\"]');
              const confirm_message = '";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This template affects one or more items, are you sure you want to perform this action?"), "html", null, true);
            yield "';

              if (save_button.length > 0) {
                  save_button.on('click', function() {
                      //Ask for confirmation
                      return confirm(confirm_message);
                  });
              }
              if (delete_button.length > 0) {
                  delete_button.on('click', function() {
                      //Ask for confirmation
                      return confirm(confirm_message);
                  });
              }
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
        return "components/itilobject/itiltemplate.html.twig";
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
        return array (  67 => 41,  61 => 37,  58 => 36,  51 => 35,  40 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "components/itilobject/itiltemplate.html.twig", "/var/www/glpi/templates/components/itilobject/itiltemplate.html.twig");
    }
}

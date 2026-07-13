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

/* pages/login.html.twig */
class __TwigTemplate_b5ad243fbba65bedc4dcbf0c8eafed39 extends Template
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
            'content_block' => [$this, 'block_content_block'],
            'footer_block' => [$this, 'block_footer_block'],
            'javascript_block' => [$this, 'block_javascript_block'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 33
        return "layout/page_card_notlogged.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layout/page_card_notlogged.html.twig", 33);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 36
        yield "    <form action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/login.php"), "html", null, true);
        yield "\" method=\"post\" autocomplete=\"off\" data-submit-once>
        <input type=\"hidden\" name=\"noAUTO\" value=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["noAuto"] ?? null), "html", null, true);
        yield "\"/>
        <input type=\"hidden\" name=\"redirect\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["redirect"] ?? null), "html", null, true);
        yield "\"/>
        <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Session::getNewCSRFToken(), "html", null, true);
        yield "\"/>
        ";
        // line 40
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["text_login"] ?? null)) > 0)) {
            // line 41
            yield "            <div class=\"rich_text_container text-center\">
                ";
            // line 42
            yield $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getSafeHtml(($context["text_login"] ?? null));
            yield "
            </div>
        ";
        }
        // line 45
        yield "        <div class=\"row justify-content-center\">
            <div class=\"col-md-5\">
                <div class=\"card-header mb-4\">
                    <h2 class=\"mx-auto\">";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Login to your account"), "html", null, true);
        yield "</h2>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\" for=\"login_name\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Login"), "html", null, true);
        yield "</label>
                    <input type=\"text\" class=\"form-control\" id=\"login_name\" name=\"login_name\" placeholder=\"\" tabindex=\"1\"/>
                </div>
                <div class=\"mb-4\">
                    <div class=\"d-flex\">
                        <label class=\"form-label\" for=\"login_password\">
                            ";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Password"), "html", null, true);
        yield "
                        </label>

                        ";
        // line 60
        if ((($tmp = ($context["show_lost_password"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 61
            yield "                            <span class=\"ms-auto form-label-description forgot_password\">
                                <a href=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/lostpassword.php?lostpassword=1"), "html", null, true);
            yield "\">
                                    ";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Forgotten password?"), "html", null, true);
            yield "
                                </a>
                            </span>
                        ";
        }
        // line 67
        yield "                    </div>
                    <input type=\"password\" class=\"form-control\" id=\"login_password\" name=\"login_password\" placeholder=\"\" autocomplete=\"off\" tabindex=\"2\"/>
                </div>

                ";
        // line 71
        if ((($tmp = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("login_remember_time")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 72
            yield "                    <div class=\"mb-2\">
                        <label class=\"form-check\" for=\"login_remember\">
                            <input type=\"checkbox\" class=\"form-check-input\" id=\"login_remember\" name=\"login_remember\" ";
            // line 74
            yield (((($tmp = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("login_remember_default")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
            yield "/>
                            <span class=\"form-check-label\">";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Remember me"), "html", null, true);
            yield "</span>
                        </label>
                    </div>
                ";
        }
        // line 79
        yield "
                <div class=\"form-footer\">
                    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary w-100\" tabindex=\"3\">
                        ";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Sign in"), "html", null, true);
        yield "
                    </button>
                </div>
            </div>

            ";
        // line 87
        if ((($tmp = ($context["right_panel"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 88
            yield "                <div class=\"col-auto px-2 text-center\">
                    ";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(Twig\Extension\CoreExtension::constant("Glpi\\Plugin\\Hooks::DISPLAY_LOGIN")), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 92
        yield "        </div>
        ";
        // line 93
        if ((($tmp = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("use_public_faq")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 94
            yield "             <div class=\"text-center mt-4 border-top pt-3\">
                 <a class=\"btn btn-outline-secondary mt-4\" href=\"";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/helpdesk.faq.php"), "html", null, true);
            yield "\">
                     <i class=\"ti ti-help\"></i>&nbsp;
                     ";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("FAQ"), "html", null, true);
            yield "
                 </a>
             </div>
        ";
        }
        // line 101
        yield "     </form>
";
        yield from [];
    }

    // line 104
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 105
        yield "    ";
        if ((($tmp = ($context["must_call_cron"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 106
            yield "        <div style=\"background-image: url('";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("/front/cron.php"), "html", null, true);
            yield "');\"></div>
    ";
        }
        yield from [];
    }

    // line 110
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascript_block(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 111
        yield "    <script type=\"text/javascript\">
        \$(function () {
            \$('#login_name').focus();
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
        return "pages/login.html.twig";
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
        return array (  229 => 111,  222 => 110,  213 => 106,  210 => 105,  203 => 104,  197 => 101,  190 => 97,  185 => 95,  182 => 94,  180 => 93,  177 => 92,  171 => 89,  168 => 88,  166 => 87,  158 => 82,  153 => 79,  146 => 75,  142 => 74,  138 => 72,  136 => 71,  130 => 67,  123 => 63,  119 => 62,  116 => 61,  114 => 60,  108 => 57,  99 => 51,  93 => 48,  88 => 45,  82 => 42,  79 => 41,  77 => 40,  73 => 39,  69 => 38,  65 => 37,  60 => 36,  53 => 35,  42 => 33,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/login.html.twig", "/var/www/glpi/templates/pages/login.html.twig");
    }
}

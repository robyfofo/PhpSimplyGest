<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login.tpl.php */
class __TwigTemplate_dd98dde85a2f788085e8cdac5b3544527ca8a09fb2ed70d71ee6decec659f3c2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!-- admin/site-core/login.tpl.php v.1.0.0. 15/03/2019 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 6
        echo twig_capitalize_string_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["Lang"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["inserisci username e password"] ?? null) : null));
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"no-applicationForm\" class=\"form-signin\" role=\"form\" action=\"";
        // line 9
        echo ($context["URLSITE"] ?? null);
        echo "login\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Username\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 19
        echo twig_capitalize_string_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["Lang"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["loggati"] ?? null) : null));
        echo "\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<p>Attenzione! Versione in continuo sviluppo.<br>
Per accedere: utente: <b>user</b>; password: <b>user</b></p>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "login.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 19,  50 => 9,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- admin/site-core/login.tpl.php v.1.0.0. 15/03/2019 -->
<div class=\"row\">
\t<div class=\"col-md-4 col-md-offset-4\">
\t\t<div class=\"login-panel panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">{{ Lang['inserisci username e password']|capitalize }}</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form id=\"no-applicationForm\" class=\"form-signin\" role=\"form\" action=\"{{ URLSITE }}login\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Username\" name=\"username\" type=\"text\" autocomplete=\"off\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<input required class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\" autocomplete=\"off\">
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t\t<!-- Change this to a button or input when using this as a form -->
\t\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"check\" />
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" value=\"{{ Lang['loggati']|capitalize }}\" class=\"btn btn-lg btn-success btn-block\">
\t\t\t\t\t</fieldset>
\t\t\t\t</form>\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t<p>Attenzione! Versione in continuo sviluppo.<br>
Per accedere: utente: <b>user</b>; password: <b>user</b></p>
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "login.tpl.php", "/var/www/html/phprojekt.altervista.org/frameworkAPP120/applications/core/templates/default/login.tpl.php");
    }
}

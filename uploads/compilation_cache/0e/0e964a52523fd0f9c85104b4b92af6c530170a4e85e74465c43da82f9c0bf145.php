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

/* login.html */
class __TwigTemplate_6ec9b127b1cac5fe07b85d54223a819b5f52ff42e0c56b2fbb0f0f9700df8f54 extends Template
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
        echo "<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang=\"";
        // line 3
        echo (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["Lang"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["user"] ?? null) : null);
        echo "\">
\t<head>
\t
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "metaTitlePage", [], "any", false, false, false, 6), "html_attr");
        echo "</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "metaDescriptionPage", [], "any", false, false, false, 10), "html_attr");
        echo "\">
\t\t<meta name=\"keyword\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "metaKeywordsPage", [], "any", false, false, false, 11), "html_attr");
        echo "\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Core CSS - Include with every page -->
\t\t<link href=\"";
        // line 15
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 15);
        echo "/bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"";
        // line 17
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 17);
        echo "/bower_components/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 19
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 19);
        echo "/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"";
        // line 21
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 21);
        echo "/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"";
        // line 24
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 24);
        echo "/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t
\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"";
        // line 34
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 34);
        echo "/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t";
        // line 38
        if (twig_test_iterable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "css", [], "any", false, false, false, 38))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "css", [], "any", false, false, false, 39));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 40
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "\t\t";
        }
        // line 43
        echo "
\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '";
        // line 46
        echo ($context["URLSITE"] ?? null);
        echo "';
\t\t\tsitePath = '";
        // line 47
        echo ($context["PATHSITE"] ?? null);
        echo "';\t\t\t
\t\t\tsiteTemplateUrl = '";
        // line 48
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 48);
        echo "/';
\t\t\tsiteTemplatePath = '";
        // line 49
        echo ($context["PATHSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 49);
        echo "/';\t\t\t
\t\t\tsiteDocumentPath = '";
        // line 50
        echo ($context["PATHDOCUMENT"] ?? null);
        echo "';\t\t
\t\t\tvar cur_lang = \"";
        // line 51
        echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["Lang"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["user"] ?? null) : null);
        echo "\";
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '";
        // line 53
        echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["Lang"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["Sei sicuro?"] ?? null) : null), "js");
        echo "';\t
\t\t\t";
        // line 54
        if ((twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "defaultJavascript", [], "any", true, true, false, 54) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "defaultJavascript", [], "any", false, false, false, 54), ""))) {
            // line 55
            echo "\t\t\t\t";
            echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "defaultJavascript", [], "any", false, false, false, 55);
            echo "  \t
\t\t\t";
        }
        // line 57
        echo "\t\t</script>

\t</head>
\t
\t<body>

\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">";
        // line 66
        echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "globalSettings", [], "any", false, false, false, 66)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["site name"] ?? null) : null);
        echo "  <small>";
        echo (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "globalSettings", [], "any", false, false, false, 66)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["code version"] ?? null) : null);
        echo "</small></a>
\t\t\t</div>

\t\t\t";
        // line 69
        if ((twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "systemMessages", [], "any", true, true, false, 69) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "systemMessages", [], "any", false, false, false, 69), ""))) {
            // line 70
            echo "\t\t\t\t";
            echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "systemMessages", [], "any", false, false, false, 70);
            echo "
\t\t\t";
        }
        // line 72
        echo "\t\t\t
\t\t\t";
        // line 73
        echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateApp", [], "any", false, false, false, 73));
        echo "

\t\t</div>
    
\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t";
        // line 79
        if ((twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "patchdatapicker", [], "any", true, true, false, 79) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "patchdatapicker", [], "any", false, false, false, 79), 0))) {
            // line 80
            echo "\t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 80);
            echo "/plugins/jquery/jquery-1.10.2.js\"></script>
\t\t";
        } else {
            // line 82
            echo " \t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 82);
            echo "/bower_components/jquery/dist/jquery.min.js\"></script>
 \t\t";
        }
        // line 84
        echo " \t\t
  \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"";
        // line 86
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 86);
        echo "/bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"";
        // line 88
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 88);
        echo "/bower_components/metisMenu/dist/metisMenu.min.js\"></script>

\t\t<script src=\"";
        // line 90
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 90);
        echo "/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 91
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 91);
        echo "/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>

\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"";
        // line 94
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 94);
        echo "/js/sb-admin-2.js\"></script>
\t\t
\t\t
\t\t";
        // line 97
        if (twig_test_iterable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "jscript", [], "any", false, false, false, 97))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "jscript", [], "any", false, false, false, 98));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 99
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "\t\t";
        }
        // line 102
        echo "\t\t
\t\t";
        // line 103
        if (twig_test_iterable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "jscriptLast", [], "any", false, false, false, 103))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "jscriptLast", [], "any", false, false, false, 104));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 105
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "\t\t";
        }
        // line 108
        echo "

\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"";
        // line 111
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "templateUser", [], "any", false, false, false, 111);
        echo "/js/default.js\"></script>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 111,  324 => 108,  321 => 107,  312 => 105,  308 => 104,  304 => 103,  301 => 102,  298 => 101,  289 => 99,  285 => 98,  281 => 97,  273 => 94,  265 => 91,  259 => 90,  252 => 88,  245 => 86,  241 => 84,  233 => 82,  225 => 80,  223 => 79,  214 => 73,  211 => 72,  205 => 70,  203 => 69,  195 => 66,  184 => 57,  178 => 55,  176 => 54,  172 => 53,  167 => 51,  163 => 50,  157 => 49,  151 => 48,  147 => 47,  143 => 46,  138 => 43,  135 => 42,  126 => 40,  122 => 39,  118 => 38,  109 => 34,  94 => 24,  86 => 21,  79 => 19,  72 => 17,  65 => 15,  58 => 11,  54 => 10,  47 => 6,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang=\"{{ Lang['user'] }}\">
\t<head>
\t
\t\t<title>{{ App.metaTitlePage|e('html_attr') }}</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"{{ App.metaDescriptionPage|e('html_attr') }}\">
\t\t<meta name=\"keyword\" content=\"{{ App.metaKeywordsPage|e('html_attr') }}\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Core CSS - Include with every page -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t
\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t{% if App.css is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.css %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}

\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '{{ URLSITE }}';
\t\t\tsitePath = '{{ PATHSITE }}';\t\t\t
\t\t\tsiteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
\t\t\tsiteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';\t\t\t
\t\t\tsiteDocumentPath = '{{ PATHDOCUMENT }}';\t\t
\t\t\tvar cur_lang = \"{{ Lang['user'] }}\";
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '{{ Lang['Sei sicuro?']|e('js') }}';\t
\t\t\t{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
\t\t\t\t{{ App.defaultJavascript|raw }}  \t
\t\t\t{% endif %}
\t\t</script>

\t</head>
\t
\t<body>

\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
\t\t\t</div>

\t\t\t{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
\t\t\t\t{{ App.systemMessages|raw }}
\t\t\t{% endif %}
\t\t\t
\t\t\t{{ include(App.templateApp) }}

\t\t</div>
    
\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t{% if App.patchdatapicker is defined and App.patchdatapicker > 0 %}
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery/jquery-1.10.2.js\"></script>
\t\t{% else %}
 \t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/jquery/dist/jquery.min.js\"></script>
 \t\t{% endif %}
 \t\t
  \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.js\"></script>

\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>

\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/sb-admin-2.js\"></script>
\t\t
\t\t
\t\t{% if App.jscript is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.jscript %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}
\t\t
\t\t{% if App.jscriptLast is iterable %}\t\t\t\t\t\t\t
\t\t\t{% for key,value in App.jscriptLast %}
\t\t\t\t{{ value|raw }}
\t\t\t{% endfor %}
\t\t{% endif %}


\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/default.js\"></script>
\t</body>
</html>", "login.html", "/var/www/html/phprojekt.altervista.org/frameworkAPP120/templates/default/login.html");
    }
}

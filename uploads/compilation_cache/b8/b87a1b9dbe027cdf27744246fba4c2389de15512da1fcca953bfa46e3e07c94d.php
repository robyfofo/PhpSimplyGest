<?php

/* @base/login.tpl.php */
class __TwigTemplate_40d146d00314dae8064641dd96438df676c8d7be66f734da4169831ef8a4c7eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang=\"";
        // line 3
        echo $this->getAttribute(($context["Lang"] ?? null), "user", array(), "array");
        echo "\">
\t<head>
\t
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaTitlePage", array()), "html_attr");
        echo "</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaDescriptionPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"keyword\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaKeywordsPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Bootstrap Core CSS -->
\t\t<link href=\"";
        // line 15
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

\t\t<!-- MetisMenu CSS -->
\t\t<link href=\"";
        // line 18
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">

\t\t<!-- Timeline CSS -->
\t\t<link href=\"";
        // line 21
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/timeline.css\" rel=\"stylesheet\">

\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 24
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/sb-admin-2.css\" rel=\"stylesheet\">

\t\t<!-- Custom Fonts -->
\t\t<link href=\"";
        // line 27
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
\t\t
\t\t<!-- Other Plugin CSS - Dashboard -->
\t\t<link href=\"";
        // line 30
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/prettyPhoto/css/prettyPhoto.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 31
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrapValidator/bootstrapValidator.min.css\" rel=\"stylesheet\">

\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"";
        // line 41
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t";
        // line 45
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "css", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "css", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 47
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "\t\t";
        }
        // line 50
        echo "
\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '";
        // line 53
        echo ($context["URLSITE"] ?? null);
        echo "';
\t\t\tsitePath = '";
        // line 54
        echo ($context["PATHSITE"] ?? null);
        echo "';\t\t\t
\t\t\tsiteUrlAdmin = '";
        // line 55
        echo ($context["URLSITE"] ?? null);
        echo "';\t\t
\t\t\tsiteTemplateUrl = '";
        // line 56
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/';
\t\t\tsiteTemplatePath = '";
        // line 57
        echo ($context["PATHSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/';\t\t\t
\t\t\tsiteDocumentPath = '";
        // line 58
        echo ($context["PATHDOCUMENT"] ?? null);
        echo "';\t\t\t
\t\t\t";
        // line 59
        if (($this->getAttribute(($context["App"] ?? null), "defaultJavascript", array(), "any", true, true) && ($this->getAttribute(($context["App"] ?? null), "defaultJavascript", array()) != ""))) {
            // line 60
            echo "\t\t\t\t";
            echo $this->getAttribute(($context["App"] ?? null), "defaultJavascript", array());
            echo "  \t
\t\t\t";
        }
        // line 62
        echo "\t\t</script>

\t</head>
\t
\t<body>

\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">";
        // line 71
        echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "globalSettings", array()), "site name", array(), "array");
        echo "  <small>";
        echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "globalSettings", array()), "code version", array(), "array");
        echo "</small></a>
\t\t\t</div>

\t\t\t";
        // line 74
        if (($this->getAttribute(($context["App"] ?? null), "systemMessages", array(), "any", true, true) && ($this->getAttribute(($context["App"] ?? null), "systemMessages", array()) != ""))) {
            // line 75
            echo "\t\t\t\t";
            echo $this->getAttribute(($context["App"] ?? null), "systemMessages", array());
            echo "
\t\t\t";
        }
        // line 77
        echo "\t\t\t
\t\t\t";
        // line 78
        echo twig_include($this->env, $context, $this->getAttribute(($context["App"] ?? null), "templateApp", array()));
        echo "

\t\t</div>
    
\t\t<!-- jQuery -->
\t\t<script src=\"";
        // line 83
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/jquery/jquery.min.js\"></script>

\t\t<!-- Bootstrap Core JavaScript -->
\t\t<script src=\"";
        // line 86
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrap/js/bootstrap.min.js\"></script>
\t\t
\t\t<!-- Metis Menu Plugin JavaScript -->
\t\t<script src=\"";
        // line 89
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/metisMenu/metisMenu.min.js\"></script>
\t\t<script src=\"";
        // line 90
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrapValidator/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 91
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t
\t\t";
        // line 93
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "jscript", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 94
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "jscript", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 95
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "\t\t";
        }
        // line 98
        echo "\t\t
\t\t";
        // line 99
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "jscriptLast", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 100
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "jscriptLast", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 101
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "\t\t";
        }
        // line 104
        echo "

\t\t<!-- Custom Theme JavaScript -->
\t\t<script src=\"";
        // line 107
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/js/sb-admin-2.js\"></script>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "@base/login.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  299 => 107,  294 => 104,  291 => 103,  282 => 101,  278 => 100,  274 => 99,  271 => 98,  268 => 97,  259 => 95,  255 => 94,  251 => 93,  244 => 91,  238 => 90,  232 => 89,  224 => 86,  216 => 83,  208 => 78,  205 => 77,  199 => 75,  197 => 74,  189 => 71,  178 => 62,  172 => 60,  170 => 59,  166 => 58,  160 => 57,  154 => 56,  150 => 55,  146 => 54,  142 => 53,  137 => 50,  134 => 49,  125 => 47,  121 => 46,  117 => 45,  108 => 41,  93 => 31,  87 => 30,  79 => 27,  71 => 24,  63 => 21,  55 => 18,  47 => 15,  40 => 11,  36 => 10,  29 => 6,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
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

\t\t<!-- Bootstrap Core CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

\t\t<!-- MetisMenu CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">

\t\t<!-- Timeline CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/timeline.css\" rel=\"stylesheet\">

\t\t<!-- Custom CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/sb-admin-2.css\" rel=\"stylesheet\">

\t\t<!-- Custom Fonts -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
\t\t
\t\t<!-- Other Plugin CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/prettyPhoto/css/prettyPhoto.css\" rel=\"stylesheet\">
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.css\" rel=\"stylesheet\">

\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t\t
\t\t<!-- Custom CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/default.css\" rel=\"stylesheet\">

    
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
\t\t\tsiteUrlAdmin = '{{ URLSITE }}';\t\t
\t\t\tsiteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
\t\t\tsiteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';\t\t\t
\t\t\tsiteDocumentPath = '{{ PATHDOCUMENT }}';\t\t\t
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
    
\t\t<!-- jQuery -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/jquery/jquery.min.js\"></script>

\t\t<!-- Bootstrap Core JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/js/bootstrap.min.js\"></script>
\t\t
\t\t<!-- Metis Menu Plugin JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.js\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/language/it_IT.js\"></script>
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


\t\t<!-- Custom Theme JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/js/sb-admin-2.js\"></script>
\t</body>
</html>
", "@base/login.tpl.php", "/var/www/html/phprojekt.altervista.org/myprojects/templates/default/login.tpl.php");
    }
}

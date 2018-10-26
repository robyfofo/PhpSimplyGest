<?php

/* @base/site.tpl.php */
class __TwigTemplate_f7917c154e1320b708c126594e8f82dff57c5d18aba980bb01b6d27d25700060 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "user", array(), "array");
        echo "\">
\t<head>
\t
\t\t<title>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaTitlePage", array()), "html_attr");
        echo "</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaDescriptionPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"keyword\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["App"] ?? null), "metaKeywordsPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Bootstrap Core CSS -->
\t\t<link href=\"";
        // line 14
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

\t\t<!-- MetisMenu CSS -->
\t\t<link href=\"";
        // line 17
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">

\t\t<!-- Timeline CSS -->
\t\t<link href=\"";
        // line 20
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/timeline.css\" rel=\"stylesheet\">

\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 23
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/sb-admin-2.css\" rel=\"stylesheet\">

\t\t<!-- Custom Fonts -->
\t\t<link href=\"";
        // line 26
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
\t\t
\t\t<!-- Other Plugin CSS - Dashboard -->
\t\t<link href=\"";
        // line 29
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/prettyPhoto/css/prettyPhoto.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 30
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
        // line 40
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t";
        // line 44
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "css", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "css", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 46
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "\t\t";
        }
        // line 49
        echo "
\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '";
        // line 52
        echo ($context["URLSITE"] ?? null);
        echo "';
\t\t\tsitePath = '";
        // line 53
        echo ($context["PATHSITE"] ?? null);
        echo "';\t\t\t
\t\t\tsiteUrlAdmin = '";
        // line 54
        echo ($context["URLSITE"] ?? null);
        echo "';\t\t
\t\t\tsiteTemplateUrl = '";
        // line 55
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/';
\t\t\tsiteTemplatePath = '";
        // line 56
        echo ($context["PATHSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/';\t\t\t
\t\t\tsiteDocumentPath = '";
        // line 57
        echo ($context["PATHDOCUMENT"] ?? null);
        echo "';\t\t
\t\t\t
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "Sei sicuro?", array(), "array"), "js");
        echo "';\t
\t\t\t";
        // line 61
        if (($this->getAttribute(($context["App"] ?? null), "defaultJavascript", array(), "any", true, true) && ($this->getAttribute(($context["App"] ?? null), "defaultJavascript", array()) != ""))) {
            // line 62
            echo "\t\t\t\t";
            echo $this->getAttribute(($context["App"] ?? null), "defaultJavascript", array());
            echo "  \t
\t\t\t";
        }
        // line 64
        echo "\t\t</script>

\t</head>

\t<body>

\t\t<div id=\"wrapper\">

\t\t\t<!-- Navigation -->
\t\t\t<nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom:0;\">
\t\t\t\t<div class=\"navbar-header\">
\t\t\t\t\t<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
\t\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<a class=\"navbar-brand\" href=\"#\">";
        // line 81
        echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "globalSettings", array()), "site name", array(), "array");
        echo "  <small>";
        echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "globalSettings", array()), "code version", array(), "array");
        echo "</small></a>
\t\t\t\t</div>
\t\t\t\t<!-- /.navbar-header -->

\t\t\t\t<ul class=\"nav navbar-top-links navbar-right\">
\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"fa fa-user fa-fw\"></i> ";
        // line 88
        if ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "name", array(), "any", true, true)) {
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "name", array());
        }
        echo " ";
        if ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "surname", array(), "any", true, true)) {
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "surname", array());
        }
        echo " (";
        if ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "labelRole", array(), "any", true, true)) {
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "labelRole", array());
        }
        echo ") <i class=\"fa fa-caret-down\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-user\">
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 91
        echo ($context["URLSITE"] ?? null);
        echo "profile/NULL/";
        if ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "id", array(), "any", true, true)) {
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "id", array());
        }
        echo "\"><i class=\"fa fa-user fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "profilo", array(), "array"));
        echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 92
        echo ($context["URLSITE"] ?? null);
        echo "password/NULL/";
        if ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "id", array(), "any", true, true)) {
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "id", array());
        }
        echo "\"><i class=\"fa fa-gear fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "password", array(), "array"));
        echo "</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 94
        echo ($context["URLSITE"] ?? null);
        echo "logout\"><i class=\"fa fa-sign-out fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "logout", array(), "array"));
        echo "</a></li>
 \t\t\t\t\t\t</ul>
\t\t\t\t\t\t<!-- /.dropdown-user -->
\t\t\t\t\t</li>
\t\t\t\t\t<!-- /.dropdown -->
\t\t\t\t</ul>
\t\t\t\t<!-- /.navbar-top-links -->

\t\t\t\t<div class=\"navbar-default sidebar\" role=\"navigation\">
\t\t\t\t\t<div class=\"sidebar-nav navbar-collapse\">
\t\t\t\t\t\t<ul class=\"nav\" id=\"side-menu\">
\t\t\t\t\t\t\t";
        // line 105
        if (($this->getAttribute(($context["App"] ?? null), "rightMenu", array(), "any", true, true) && ($this->getAttribute(($context["App"] ?? null), "rightMenu", array()) != ""))) {
            // line 106
            echo "\t\t\t\t\t\t\t\t";
            echo $this->getAttribute(($context["App"] ?? null), "rightMenu", array());
            echo "
\t\t\t\t\t\t\t";
        }
        // line 107
        echo "  
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<!-- /.sidebar-collapse -->
\t\t\t\t</div>
\t\t\t\t<!-- /.navbar-static-side -->
\t\t\t</nav>

\t\t\t<div id=\"page-wrapper\">
\t\t\t\t<div class=\"row\">
                <div class=\"col-md-8\">
\t\t\t\t\t\t<h1 class=\"page-header\">
\t\t\t\t\t\t\t";
        // line 119
        echo $this->getAttribute(($context["App"] ?? null), "pageTitle", array());
        if (($this->getAttribute($this->getAttribute(($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1)) {
            echo "<small class=\"appCodeVersion\">";
            echo $this->getAttribute(($context["App"] ?? null), "codeVersion", array());
            echo "</small>";
        }
        echo "&nbsp;<small>";
        echo $this->getAttribute(($context["App"] ?? null), "pageSubTitle", array());
        echo "</small>               
\t\t\t\t\t\t</h1>
                </div>
                <div class=\"col-md-4 text-right\">                                
                \t";
        // line 123
        if (($this->getAttribute($this->getAttribute(($context["App"] ?? null), "params", array(), "any", false, true), "help", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "params", array()), "help", array()) != ""))) {
            // line 124
            echo "\t\t\t\t\t\t\t<button class=\"btn btn-info btn-circle btn-help-module\" type=\"button\" data-target=\"#helpModal\" data-toggle=\"modal\"><i class=\"fa fa-info\"></i></button>
\t\t\t\t\t\t";
        }
        // line 126
        echo "                </div>
            </div>
            <!-- /.row -->

\t\t\t\t";
        // line 130
        if (($this->getAttribute(($context["App"] ?? null), "systemMessages", array(), "any", true, true) && ($this->getAttribute(($context["App"] ?? null), "systemMessages", array()) != ""))) {
            // line 131
            echo "\t\t\t\t\t";
            echo $this->getAttribute(($context["App"] ?? null), "systemMessages", array());
            echo "
\t\t\t\t";
        }
        // line 133
        echo "
\t\t\t\t
\t\t\t\t";
        // line 135
        echo twig_include($this->env, $context, $this->getAttribute(($context["App"] ?? null), "templateApp", array()));
        echo "
           
\t\t\t</div>
\t\t\t<!-- /#page-wrapper -->

\t\t</div>
\t\t<!-- /#wrapper -->
\t\t
\t\t";
        // line 143
        if (($this->getAttribute($this->getAttribute(($context["App"] ?? null), "params", array(), "any", false, true), "help", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["App"] ?? null), "params", array()), "help", array()) != ""))) {
            // line 144
            echo "\t\t<div class=\"modal fade\" id=\"helpModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t  \t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t  \t\t\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\">";
            // line 149
            echo twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "aiuto", array(), "array"));
            echo "</h4>
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t";
            // line 152
            echo $this->getAttribute($this->getAttribute(($context["App"] ?? null), "params", array()), "help", array());
            echo "
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-footer\">
\t  \t\t\t\t\t<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">";
            // line 155
            echo twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["App"] ?? null), "lang", array()), "chiudi", array(), "array"));
            echo "</button>
\t \t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.modal-content -->
\t\t\t</div>
\t  \t\t<!-- /.modal-dialog -->
\t\t</div>
\t\t";
        }
        // line 163
        echo "
\t\t<!-- jQuery -->
\t\t<script src=\"";
        // line 165
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/jquery/jquery.min.js\"></script>

\t\t<!-- Bootstrap Core JavaScript -->
\t\t<script src=\"";
        // line 168
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrap/js/bootstrap.min.js\"></script>

\t\t<!-- Metis Menu Plugin JavaScript -->
\t\t<script src=\"";
        // line 171
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/metisMenu/metisMenu.min.js\"></script>


\t\t<!-- Other JavaScript -->\t
\t\t<script src=\"";
        // line 175
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootbox/bootbox.min.js\" type=\"text/javascript\"></script>\t
\t\t<script src=\"";
        // line 176
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/prettyPhoto/js/jquery.prettyPhoto.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 177
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrapValidator/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 178
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t<script src=\"";
        // line 179
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo $this->getAttribute(($context["App"] ?? null), "templateUser", array());
        echo "/assets/plugins/tinymce/tinymce.min.js\" type=\"text/javascript\"></script>
\t\t
\t\t
\t\t";
        // line 182
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "jscript", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 183
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "jscript", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 184
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 186
            echo "\t\t";
        }
        // line 187
        echo "\t\t
\t\t";
        // line 188
        if (twig_test_iterable($this->getAttribute(($context["App"] ?? null), "jscriptLast", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 189
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["App"] ?? null), "jscriptLast", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 190
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 192
            echo "\t\t";
        }
        // line 193
        echo "

\t\t<!-- Custom Theme JavaScript -->
\t\t<script src=\"";
        // line 196
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
        return "@base/site.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  479 => 196,  474 => 193,  471 => 192,  462 => 190,  458 => 189,  454 => 188,  451 => 187,  448 => 186,  439 => 184,  435 => 183,  431 => 182,  423 => 179,  417 => 178,  411 => 177,  405 => 176,  399 => 175,  390 => 171,  382 => 168,  374 => 165,  370 => 163,  359 => 155,  353 => 152,  347 => 149,  340 => 144,  338 => 143,  327 => 135,  323 => 133,  317 => 131,  315 => 130,  309 => 126,  305 => 124,  303 => 123,  289 => 119,  275 => 107,  269 => 106,  267 => 105,  251 => 94,  240 => 92,  230 => 91,  214 => 88,  202 => 81,  183 => 64,  177 => 62,  175 => 61,  171 => 60,  165 => 57,  159 => 56,  153 => 55,  149 => 54,  145 => 53,  141 => 52,  136 => 49,  133 => 48,  124 => 46,  120 => 45,  116 => 44,  107 => 40,  92 => 30,  86 => 29,  78 => 26,  70 => 23,  62 => 20,  54 => 17,  46 => 14,  39 => 10,  35 => 9,  28 => 5,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"{{ App.lang['user'] }}\">
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
\t\t\tsiteDocumentPath = '{{ PATHDOCUMENT }}';\t\t
\t\t\t
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '{{ App.lang['Sei sicuro?']|e('js') }}';\t
\t\t\t{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
\t\t\t\t{{ App.defaultJavascript|raw }}  \t
\t\t\t{% endif %}
\t\t</script>

\t</head>

\t<body>

\t\t<div id=\"wrapper\">

\t\t\t<!-- Navigation -->
\t\t\t<nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom:0;\">
\t\t\t\t<div class=\"navbar-header\">
\t\t\t\t\t<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
\t\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<a class=\"navbar-brand\" href=\"#\">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
\t\t\t\t</div>
\t\t\t\t<!-- /.navbar-header -->

\t\t\t\t<ul class=\"nav navbar-top-links navbar-right\">
\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"fa fa-user fa-fw\"></i> {% if App.userLoggedData.name is defined %}{{ App.userLoggedData.name }}{% endif %} {% if App.userLoggedData.surname is defined %}{{ App.userLoggedData.surname }}{% endif %} ({% if App.userLoggedData.labelRole is defined %}{{ App.userLoggedData.labelRole }}{% endif %}) <i class=\"fa fa-caret-down\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-user\">
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}profile/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}\"><i class=\"fa fa-user fa-fw\"></i> {{ App.lang['profilo']|capitalize }}</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}password/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}\"><i class=\"fa fa-gear fa-fw\"></i> {{ App.lang['password']|capitalize }}</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}logout\"><i class=\"fa fa-sign-out fa-fw\"></i> {{ App.lang['logout']|capitalize }}</a></li>
 \t\t\t\t\t\t</ul>
\t\t\t\t\t\t<!-- /.dropdown-user -->
\t\t\t\t\t</li>
\t\t\t\t\t<!-- /.dropdown -->
\t\t\t\t</ul>
\t\t\t\t<!-- /.navbar-top-links -->

\t\t\t\t<div class=\"navbar-default sidebar\" role=\"navigation\">
\t\t\t\t\t<div class=\"sidebar-nav navbar-collapse\">
\t\t\t\t\t\t<ul class=\"nav\" id=\"side-menu\">
\t\t\t\t\t\t\t{% if (App.rightMenu is defined) and (App.rightMenu != '') %}
\t\t\t\t\t\t\t\t{{ App.rightMenu|raw }}
\t\t\t\t\t\t\t{% endif %}  
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<!-- /.sidebar-collapse -->
\t\t\t\t</div>
\t\t\t\t<!-- /.navbar-static-side -->
\t\t\t</nav>

\t\t\t<div id=\"page-wrapper\">
\t\t\t\t<div class=\"row\">
                <div class=\"col-md-8\">
\t\t\t\t\t\t<h1 class=\"page-header\">
\t\t\t\t\t\t\t{{ App.pageTitle }}{% if App.userLoggedData.is_root is same as(1) %}<small class=\"appCodeVersion\">{{ App.codeVersion }}</small>{% endif %}&nbsp;<small>{{ App.pageSubTitle }}</small>               
\t\t\t\t\t\t</h1>
                </div>
                <div class=\"col-md-4 text-right\">                                
                \t{% if (App.params.help is defined) and (App.params.help != '') %}
\t\t\t\t\t\t\t<button class=\"btn btn-info btn-circle btn-help-module\" type=\"button\" data-target=\"#helpModal\" data-toggle=\"modal\"><i class=\"fa fa-info\"></i></button>
\t\t\t\t\t\t{% endif %}
                </div>
            </div>
            <!-- /.row -->

\t\t\t\t{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
\t\t\t\t\t{{ App.systemMessages|raw }}
\t\t\t\t{% endif %}

\t\t\t\t
\t\t\t\t{{ include(App.templateApp) }}
           
\t\t\t</div>
\t\t\t<!-- /#page-wrapper -->

\t\t</div>
\t\t<!-- /#wrapper -->
\t\t
\t\t{% if (App.params.help is defined) and (App.params.help != '') %}
\t\t<div class=\"modal fade\" id=\"helpModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t  \t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t  \t\t\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\">{{ App.lang['aiuto']|capitalize }}</h4>
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t{{ App.params.help|raw }}
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-footer\">
\t  \t\t\t\t\t<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">{{ App.lang['chiudi']|capitalize }}</button>
\t \t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.modal-content -->
\t\t\t</div>
\t  \t\t<!-- /.modal-dialog -->
\t\t</div>
\t\t{% endif %}

\t\t<!-- jQuery -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/jquery/jquery.min.js\"></script>

\t\t<!-- Bootstrap Core JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/js/bootstrap.min.js\"></script>

\t\t<!-- Metis Menu Plugin JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.js\"></script>


\t\t<!-- Other JavaScript -->\t
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootbox/bootbox.min.js\" type=\"text/javascript\"></script>\t
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/prettyPhoto/js/jquery.prettyPhoto.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/tinymce/tinymce.min.js\" type=\"text/javascript\"></script>
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


\t\t<!-- Custom Theme JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/assets/js/sb-admin-2.js\"></script>
\t</body>
</html>
", "@base/site.tpl.php", "/var/www/html/phprojekt.altervista.org/myprojects/templates/default/site.tpl.php");
    }
}

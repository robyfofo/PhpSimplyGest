<?php

/* @base/site.tpl.php */
class __TwigTemplate_df78f885aea523b21e0a9cb44ea1ec4bd8f4b358ba0479262729ae300ff560cb extends Twig_Template
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
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "user", array(), "array");
        echo "\">
\t<head>
\t
\t\t<title>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaTitlePage", array()), "html_attr");
        echo "</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaDescriptionPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"keyword\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "metaKeywordsPage", array()), "html_attr");
        echo "\">
\t\t<meta name=\"author\" content=\"Roberto Mantovani\">

\t\t<!-- Core CSS - Include with every page -->
\t\t<link href=\"";
        // line 14
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"";
        // line 16
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/vendor/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 18
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Morris Charts CSS -->
\t\t<link href=\"";
        // line 20
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/vendor/morrisjs/morris.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"";
        // line 22
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"";
        // line 25
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 26
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootstrapValidator/css/bootstrapValidator.min.css\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 27
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/jquery.formvalidation/css/formValidation.min.css\" rel=\"stylesheet\">
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
        // line 37
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/css/default.css\" rel=\"stylesheet\">

    
\t\t<!-- CSS for Page -->
\t\t";
        // line 41
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "css", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "css", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 43
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "\t\t";
        }
        // line 46
        echo "
\t\t<!-- default vars useful for javascript -->
\t\t<script language=\"javascript\">
\t\t\tsiteUrl = '";
        // line 49
        echo ($context["URLSITE"] ?? null);
        echo "';
\t\t\tsitePath = '";
        // line 50
        echo ($context["PATHSITE"] ?? null);
        echo "';\t\t\t
\t\t\tsiteTemplateUrl = '";
        // line 51
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/';
\t\t\tsiteTemplatePath = '";
        // line 52
        echo ($context["PATHSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/';\t\t\t
\t\t\tsiteDocumentPath = '";
        // line 53
        echo ($context["PATHDOCUMENT"] ?? null);
        echo "';\t\t
\t\t\tvar cur_lang = \"";
        // line 54
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "user", array(), "array");
        echo "\";
\t\t\tvar messages = new Array();
\t\t\tmessages['Sei sicuro?'] = '";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "Sei sicuro?", array(), "array"), "js");
        echo "';\t
\t\t\t";
        // line 57
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array()) != ""))) {
            // line 58
            echo "\t\t\t\t";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "defaultJavascript", array());
            echo "  \t
\t\t\t";
        }
        // line 60
        echo "\t\t</script>

\t\t";
        // line 62
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPTop", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPTop", array()) != ""))) {
            echo "\t\t\t
\t\t\t";
            // line 63
            echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPTop", array()));
            echo "
\t\t";
        }
        // line 65
        echo "
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
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "globalSettings", array()), "site name", array(), "array");
        echo "  <small>";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "globalSettings", array()), "code version", array(), "array");
        echo "</small></a>
\t\t\t\t</div>
\t\t\t\t<!-- /.navbar-header -->

\t\t\t\t<ul class=\"nav navbar-top-links navbar-right\">
\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"fa fa-user fa-fw\"></i> ";
        // line 88
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "name", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "name", array());
        }
        echo " ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "surname", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "surname", array());
        }
        echo " <i class=\"fa fa-caret-down\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-user\">
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 91
        echo ($context["URLSITE"] ?? null);
        echo "profile/NULL/";
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "id", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "id", array());
        }
        echo "\"><i class=\"fa fa-user fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "profilo", array(), "array"));
        echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 92
        echo ($context["URLSITE"] ?? null);
        echo "password/NULL/";
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "id", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "id", array());
        }
        echo "\"><i class=\"fa fa-gear fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "password", array(), "array"));
        echo "</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 94
        echo ($context["URLSITE"] ?? null);
        echo "logout\"><i class=\"fa fa-sign-out fa-fw\"></i> ";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "logout", array(), "array"));
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
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "rightMenu", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "rightMenu", array()) != ""))) {
            // line 106
            echo "\t\t\t\t\t\t\t\t";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "rightMenu", array());
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
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pageTitle", array());
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1)) {
            echo "<small class=\"appCodeVersion\">";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "codeVersion", array());
            echo "</small>";
        }
        echo "&nbsp;<small>";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pageSubTitle", array());
        echo "</small>               
\t\t\t\t\t\t</h1>
                </div>
                <div class=\"col-md-4 text-right\">                                
                \t";
        // line 123
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help", array()) != ""))) {
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
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array()) != ""))) {
            // line 131
            echo "\t\t\t\t\t";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "systemMessages", array());
            echo "
\t\t\t\t";
        }
        // line 133
        echo "
\t\t\t\t
\t\t\t\t";
        // line 135
        echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateApp", array()));
        echo "
           
\t\t\t</div>
\t\t\t<!-- /#page-wrapper -->

\t\t</div>
\t\t<!-- /#wrapper -->
\t\t
\t\t";
        // line 143
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help", array()) != ""))) {
            // line 144
            echo "\t\t<div class=\"modal fade\" id=\"helpModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t  \t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t  \t\t\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\">";
            // line 149
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "aiuto", array(), "array"));
            echo "</h4>
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t";
            // line 152
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help", array());
            echo "
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-footer\">
\t  \t\t\t\t\t<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">";
            // line 155
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "chiudi", array(), "array"));
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
\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t";
        // line 166
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "patchdatapicker", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "patchdatapicker", array()) > 0))) {
            // line 167
            echo "\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/vendor/jquery/jquery-1.10.2.js\"></script>
\t\t";
        } else {
            // line 169
            echo " \t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/vendor/jquery/jquery.min.js\"></script>
 \t\t";
        }
        // line 171
        echo "
 \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"";
        // line 173
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "//vendor/bootstrap/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"";
        // line 175
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/vendor/metisMenu/metisMenu.min.js\"></script>

\t\t<script src=\"";
        // line 177
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 178
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 179
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/bootstrapValidator/js/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 180
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/jquery.formvalidation/js/formValidation.min.js\" type=\"text/javascript\"></script>\t
\t\t";
        // line 181
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lang", array()), "user", array(), "array") == "it")) {
            // line 182
            echo "\t\t\t<script src=\"";
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t\t<script src=\"";
            // line 183
            echo ($context["URLSITE"] ?? null);
            echo "templates/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
            echo "/plugins/jquery.formvalidation/language/it_IT.js\"></script>\t\t
\t\t";
        }
        // line 185
        echo "\t\t<script src=\"";
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/plugins/tinymce/tinymce.min.js\" type=\"text/javascript\"></script>
\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"";
        // line 187
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/js/sb-admin-2.js\"></script>\t
\t\t
\t\t";
        // line 189
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscript", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 190
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscript", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 191
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 193
            echo "\t\t";
        }
        // line 194
        echo "\t\t
\t\t";
        // line 195
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscriptLast", array()))) {
            echo "\t\t\t\t\t\t\t
\t\t\t";
            // line 196
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "jscriptLast", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 197
                echo "\t\t\t\t";
                echo $context["value"];
                echo "
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 199
            echo "\t\t";
        }
        // line 200
        echo "\t\t
\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"";
        // line 202
        echo ($context["URLSITE"] ?? null);
        echo "templates/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "templateUser", array());
        echo "/js/default.js\"></script>
\t\t
\t\t";
        // line 204
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPBottom", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPBottom", array()) != ""))) {
            echo "\t\t\t
\t\t\t";
            // line 205
            echo twig_include($this->env, $context, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "includeJscriptPHPBottom", array()));
            echo "
\t\t";
        }
        // line 207
        echo "
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
        return array (  538 => 207,  533 => 205,  529 => 204,  522 => 202,  518 => 200,  515 => 199,  506 => 197,  502 => 196,  498 => 195,  495 => 194,  492 => 193,  483 => 191,  479 => 190,  475 => 189,  468 => 187,  460 => 185,  453 => 183,  446 => 182,  444 => 181,  438 => 180,  432 => 179,  426 => 178,  420 => 177,  413 => 175,  406 => 173,  402 => 171,  394 => 169,  386 => 167,  384 => 166,  379 => 163,  368 => 155,  362 => 152,  356 => 149,  349 => 144,  347 => 143,  336 => 135,  332 => 133,  326 => 131,  324 => 130,  318 => 126,  314 => 124,  312 => 123,  298 => 119,  284 => 107,  278 => 106,  276 => 105,  260 => 94,  249 => 92,  239 => 91,  227 => 88,  215 => 81,  197 => 65,  192 => 63,  188 => 62,  184 => 60,  178 => 58,  176 => 57,  172 => 56,  167 => 54,  163 => 53,  157 => 52,  151 => 51,  147 => 50,  143 => 49,  138 => 46,  135 => 45,  126 => 43,  122 => 42,  118 => 41,  109 => 37,  94 => 27,  88 => 26,  82 => 25,  74 => 22,  67 => 20,  60 => 18,  53 => 16,  46 => 14,  39 => 10,  35 => 9,  28 => 5,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
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
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<!-- MetisMenu CSS -->
    \t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/css/sb-admin-2.css\" rel=\"stylesheet\">
\t\t<!-- Morris Charts CSS -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/morrisjs/morris.css\" rel=\"stylesheet\">
\t\t<!-- Custom Fonts -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">

\t\t<!-- OTHER Plugin CSS - Dashboard -->
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/css/lightbox.min.css\" rel=\"stylesheet\">
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/css/bootstrapValidator.min.css\" rel=\"stylesheet\">
\t\t<link href=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/css/formValidation.min.css\" rel=\"stylesheet\">
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

\t\t{% if App.includeJscriptPHPTop is defined and App.includeJscriptPHPTop != '' %}\t\t\t
\t\t\t{{ include(App.includeJscriptPHPTop|raw) }}
\t\t{% endif %}

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
\t\t\t\t\t\t\t<i class=\"fa fa-user fa-fw\"></i> {% if App.userLoggedData.name is defined %}{{ App.userLoggedData.name }}{% endif %} {% if App.userLoggedData.surname is defined %}{{ App.userLoggedData.surname }}{% endif %} <i class=\"fa fa-caret-down\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-user\">
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}profile/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}\"><i class=\"fa fa-user fa-fw\"></i> {{ Lang['profilo']|capitalize }}</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}password/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}\"><i class=\"fa fa-gear fa-fw\"></i> {{ Lang['password']|capitalize }}</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}logout\"><i class=\"fa fa-sign-out fa-fw\"></i> {{ Lang['logout']|capitalize }}</a></li>
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
\t  \t\t\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\">{{ Lang['aiuto']|capitalize }}</h4>
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t{{ App.params.help|raw }}
\t \t\t\t\t</div>
\t \t\t\t\t<div class=\"modal-footer\">
\t  \t\t\t\t\t<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">{{ Lang['chiudi']|capitalize }}</button>
\t \t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.modal-content -->
\t\t\t</div>
\t  \t\t<!-- /.modal-dialog -->
\t\t</div>
\t\t{% endif %}

\t\t<!-- Core Scripts - Include with every page -->
\t\t<!-- jQuery -->
\t\t{% if App.patchdatapicker is defined and App.patchdatapicker > 0 %}
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/jquery/jquery-1.10.2.js\"></script>
\t\t{% else %}
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/jquery/jquery.min.js\"></script>
 \t\t{% endif %}

 \t\t<!-- Bootstrap Core JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}//vendor/bootstrap/js/bootstrap.min.js\"></script>
 \t\t<!-- Metis Menu Plugin JavaScript -->
 \t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/vendor/metisMenu/metisMenu.min.js\"></script>

\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootbox/js/bootbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/js/lightbox.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/js/bootstrapValidator.min.js\" type=\"text/javascript\"></script>
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/js/formValidation.min.js\" type=\"text/javascript\"></script>\t
\t\t{% if App.lang['user'] == 'it' %}
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/language/it_IT.js\"></script>
\t\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/language/it_IT.js\"></script>\t\t
\t\t{% endif %}
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/plugins/tinymce/tinymce.min.js\" type=\"text/javascript\"></script>
\t\t<!-- SB Admin Scripts - Include with every page -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/sb-admin-2.js\"></script>\t
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
\t\t
\t\t<!-- Default Custom Theme JavaScript -->
\t\t<script src=\"{{ URLSITE }}templates/{{ App.templateUser }}/js/default.js\"></script>
\t\t
\t\t{% if App.includeJscriptPHPBottom is defined and App.includeJscriptPHPBottom != '' %}\t\t\t
\t\t\t{{ include(App.includeJscriptPHPBottom|raw) }}
\t\t{% endif %}

\t</body>
</html>
", "@base/site.tpl.php", "/var/www/html/phpsimplygest/templates/default/site.tpl.php");
    }
}

<?php

/* home/templates/default/list.tpl.php */
class __TwigTemplate_d5fc52873650ec7f0b6bfa79e436a13f05990a1299e25acc864d9a3e01dbb3f1 extends Twig_Template
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
        echo "<!-- \tadmin/site-home/list.tpl.php v.3.0.0. 04/03/2017 -->

<div class=\"row\">
\t<div class=\"col-lg-4 new\">
\t\t<h5>";
        // line 5
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "ultimo accesso", array(), "array"));
        echo ": ";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "lastLoginLang", array());
        echo "</h5>
 \t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t";
        // line 8
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help_small", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help_small", array());
        }
        echo " 
\t</div>
\t<div class=\"col-md-1\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<div class=\"row\">
\t";
        // line 15
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "homeBlocks", array()))) {
            // line 16
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "homeBlocks", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 17
                echo "\t\t\t";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "items", array(), "array") > 0)) {
                    // line 18
                    echo "\t\t\t\t<div class=\"col-lg-3 col-md-6\">
\t\t\t\t\t<div class=\"panel ";
                    // line 19
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "class", array(), "array");
                    echo "\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-xs-3\">
\t\t\t\t\t\t\t\t\t<i class=\"fa ";
                    // line 23
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "icon panel", array(), "array");
                    echo " fa-4x\"></i>
\t\t\t\t\t\t\t\t\t";
                    // line 24
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "sex suffix", array(), "array");
                    echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-xs-9 text-right\">
\t\t\t\t\t\t\t\t\t<div class=\"huge\">";
                    // line 27
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "items", array(), "array");
                    echo "</div>
\t\t\t\t\t\t\t\t\t<div>";
                    // line 28
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "label", array(), "array");
                    echo "</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<a href=\"";
                    // line 32
                    echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "url item", array(), "array"), "string", array(), "array");
                    echo "\">
\t\t\t\t\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t\t\t\t<span class=\"pull-left\">";
                    // line 34
                    echo twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "vedi dettagli", array(), "array"));
                    echo "</span>
\t\t\t\t\t\t\t\t<span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                }
                // line 42
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "\t";
        }
        // line 44
        echo "</div>

<div class=\"row\">
\t<div class=\"col-lg-12\">
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
 \t\t\t\t<i class=\"fa fa-bar-chart-o fa-fw\"></i> ";
        // line 50
        echo twig_title_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "bilancio ultimi 12 mesi", array(), "array"));
        echo "
\t\t\t</div>
\t\t\t<!-- /.panel-heading -->
\t\t\t<div class=\"panel-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t<div id=\"sales-chart\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.row -->
\t\t\t</div>
\t\t\t<!-- /.panel-body -->
\t\t</div>
\t\t<!-- /.panel -->
\t</div>
</div>

<div class=\"row\">
\t";
        // line 68
        if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "homeTables", array()))) {
            // line 69
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "homeTables", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 70
                echo "\t\t\t";
                if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "itemdata", array(), "array"))) {
                    // line 71
                    echo "\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<i class=\"fa ";
                    // line 74
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "icon panel", array(), "array");
                    echo " fa-fw\"></i> ";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "label", array(), "array");
                    echo "                           
\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t<!-- /.panel-heading -->
\t\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t\t\t\t<table class=\"table table-bordered table-hover table-striped listDataHome\">
\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th><small>Data<small></th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th><small>ID</small></th>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 86
                    if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "fields", array(), "array"))) {
                        // line 87
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "fields", array(), "array"));
                        foreach ($context['_seq'] as $context["keyF"] => $context["valueF"]) {
                            // line 88
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 89
                            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["valueF"], "label", array(), "array");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['keyF'], $context['valueF'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 92
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    echo "\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 96
                    if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "itemdata", array(), "array"))) {
                        // line 97
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "itemdata", array(), "array"));
                        foreach ($context['_seq'] as $context["keyItemData"] => $context["valueItemData"]) {
                            // line 98
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"data\" style=\"width:60px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 100
                            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["valueItemData"], "datacreated", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"id\" style=\"width:40px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 103
                            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["valueItemData"], "id", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 105
                            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "fields", array(), "array"))) {
                                // line 106
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "fields", array(), "array"));
                                foreach ($context['_seq'] as $context["keyF"] => $context["valueF"]) {
                                    // line 107
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
                                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["valueF"], "class", array(), "array");
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 108
                                    ob_start();
                                    echo $context["keyF"];
                                    $context["method"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                                    // line 109
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["valueItemData"], ($context["method"] ?? null));
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['keyF'], $context['valueF'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 112
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['keyItemData'], $context['valueItemData'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 115
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    echo "\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</tbody>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<!-- /.table-responsive -->
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!-- /.row -->
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- /.panel-body -->\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                }
                // line 128
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "\t";
        }
        // line 130
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "home/templates/default/list.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 130,  280 => 129,  274 => 128,  257 => 115,  247 => 112,  237 => 109,  233 => 108,  228 => 107,  223 => 106,  221 => 105,  216 => 103,  210 => 100,  206 => 98,  201 => 97,  199 => 96,  191 => 92,  182 => 89,  179 => 88,  174 => 87,  172 => 86,  155 => 74,  150 => 71,  147 => 70,  142 => 69,  140 => 68,  119 => 50,  111 => 44,  108 => 43,  102 => 42,  91 => 34,  86 => 32,  79 => 28,  75 => 27,  69 => 24,  65 => 23,  58 => 19,  55 => 18,  52 => 17,  47 => 16,  45 => 15,  33 => 8,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- \tadmin/site-home/list.tpl.php v.3.0.0. 04/03/2017 -->

<div class=\"row\">
\t<div class=\"col-lg-4 new\">
\t\t<h5>{{ Lang['ultimo accesso']|capitalize }}: {{ App.lastLoginLang }}</h5>
 \t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %} 
\t</div>
\t<div class=\"col-md-1\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<div class=\"row\">
\t{% if App.homeBlocks is iterable %}
\t\t{% for key,value in App.homeBlocks %}
\t\t\t{% if value['items'] > 0 %}
\t\t\t\t<div class=\"col-lg-3 col-md-6\">
\t\t\t\t\t<div class=\"panel {{ value['class'] }}\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-xs-3\">
\t\t\t\t\t\t\t\t\t<i class=\"fa {{ value['icon panel'] }} fa-4x\"></i>
\t\t\t\t\t\t\t\t\t{{ value['sex suffix'] }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-xs-9 text-right\">
\t\t\t\t\t\t\t\t\t<div class=\"huge\">{{ value['items'] }}</div>
\t\t\t\t\t\t\t\t\t<div>{{ value['label'] }}</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<a href=\"{{ value['url item']['string'] }}\">
\t\t\t\t\t\t\t<div class=\"panel-footer\">
\t\t\t\t\t\t\t\t<span class=\"pull-left\">{{ Lang['vedi dettagli']|title }}</span>
\t\t\t\t\t\t\t\t<span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t{% endif %}
\t\t{% endfor %}
\t{% endif %}
</div>

<div class=\"row\">
\t<div class=\"col-lg-12\">
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
 \t\t\t\t<i class=\"fa fa-bar-chart-o fa-fw\"></i> {{ Lang['bilancio ultimi 12 mesi']|title }}
\t\t\t</div>
\t\t\t<!-- /.panel-heading -->
\t\t\t<div class=\"panel-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t<div id=\"sales-chart\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.row -->
\t\t\t</div>
\t\t\t<!-- /.panel-body -->
\t\t</div>
\t\t<!-- /.panel -->
\t</div>
</div>

<div class=\"row\">
\t{% if App.homeTables is iterable %}
\t\t{% for key,value in App.homeTables %}
\t\t\t{% if value['itemdata'] is iterable %}
\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<i class=\"fa {{ value['icon panel'] }} fa-fw\"></i> {{ value['label'] }}                           
\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t<!-- /.panel-heading -->
\t\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t\t\t\t<table class=\"table table-bordered table-hover table-striped listDataHome\">
\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th><small>Data<small></th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th><small>ID</small></th>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% if value['fields'] is iterable %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for keyF,valueF in value['fields'] %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ valueF['label'] }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t{% if value['itemdata'] is iterable %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% for keyItemData,valueItemData in value['itemdata'] %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"data\" style=\"width:60px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ valueItemData.datacreated|raw }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"id\" style=\"width:40px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ valueItemData.id }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if value['fields'] is iterable %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for keyF,valueF in value['fields'] %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"{{ valueF['class'] }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set method %}{{ keyF }}{% endset %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ attribute(valueItemData, method)|raw }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</tbody>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<!-- /.table-responsive -->
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!-- /.row -->
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- /.panel-body -->\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t{% endif %}
\t\t{% endfor %}
\t{% endif %}
</div>", "home/templates/default/list.tpl.php", "/var/www/html/phpsimplygest/application/home/templates/default/list.tpl.php");
    }
}

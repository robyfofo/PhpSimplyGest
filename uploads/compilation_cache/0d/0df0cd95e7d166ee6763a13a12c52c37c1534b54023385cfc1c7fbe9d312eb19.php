<?php

/* third-party/templates/default/listItem.tpl.php */
class __TwigTemplate_dfe632692df64c0bde9cfb0954572d586ac99173a6f396a64a23bca70ece07c7 extends Twig_Template
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
        echo "<!-- customers/listItem.tpl.php v.1.0.0. 02/11/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"";
        // line 4
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/newItem\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci nuova voce", array(), "array"));
        echo "\" class=\"btn btn-primary\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nuova voce", array(), "array"));
        echo "</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t";
        // line 7
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help_small", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help_small", array());
        }
        // line 8
        echo "\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<form role=\"form\" action=\"";
        // line 13
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
\t<div class=\"row\">
\t\t<div class=\"col-md-12\">\t\t\t
\t\t\t<div class=\"form-inline\" role=\"grid\">\t\t\t\t\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<select class=\"form-control input-sm\" name=\"itemsforpage\" onchange=\"this.form.submit();\" >
\t\t\t\t\t\t\t\t\t<option value=\"5\"";
        // line 22
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 5)) {
            echo " selected=\"selected\"";
        }
        echo ">5</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\"";
        // line 23
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 10)) {
            echo " selected=\"selected\"";
        }
        echo ">10</option>
\t\t\t\t\t\t\t\t\t<option value=\"25\"";
        // line 24
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 25)) {
            echo " selected=\"selected\"";
        }
        echo ">25</option>
\t\t\t\t\t\t\t\t\t<option value=\"50\"";
        // line 25
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 50)) {
            echo " selected=\"selected\"";
        }
        echo ">50</option>
\t\t\t\t\t\t\t\t\t<option value=\"100\"";
        // line 26
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "itemsForPage", array()) == 100)) {
            echo " selected=\"selected\"";
        }
        echo ">100</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t";
        // line 28
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "voci per pagina", array(), "array"));
        echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group pull-right\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t";
        // line 35
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cerca", array(), "array"));
        echo ":
\t\t\t\t\t\t\t\t<input name=\"searchFromTable\" value=\"";
        // line 36
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["MySessionVars"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "sessionName", array()), array(), "array"), "srcTab", array(), "array");
        echo "\" class=\"form-control input-sm\" type=\"search\" onchange=\"this.form.submit();\">
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t<div class=\"table-responsive\">\t\t\t\t
\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t";
        // line 45
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
            echo "\t
\t\t\t\t\t\t\t\t\t<th class=\"id\">ID</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        }
        // line 47
        echo "\t
\t\t\t\t\t\t\t\t<th>";
        // line 48
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "categoria", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 49
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "tipo", array(), "array"));
        echo "</th>\t
\t\t\t\t\t\t\t\t<th>";
        // line 50
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "ragione_sociale", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 51
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "email", array(), "array"));
        echo "</th>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>\t\t\t\t
\t\t\t\t\t\t\t";
        // line 56
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) > 0))) {
            // line 57
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 58
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t";
                // line 59
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<td class=\"id\">";
                    // line 60
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 61
                echo "\t
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 62
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "category", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 63
                echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "types", array()), twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id_type", array()), array(), "array"), "title", array()));
                echo "</td>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 64
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "ragione_sociale", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 65
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "email", array());
                echo "</td>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 67
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("disactive") : ("active"));
                echo "Item/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "disattiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce", array(), "array"))))) : (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "attiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce", array(), "array"))))));
                echo "\"><i class=\"fa fa-";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("unlock") : ("lock"));
                echo "\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 68
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/modifyItem/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "modifica %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce", array(), "array"))));
                echo "\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"";
                // line 69
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/deleteItem/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cancella %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce", array(), "array"))));
                echo "\"><i class=\"fa fa-cut\"> </i></a>

\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "\t\t\t\t\t\t\t";
        } else {
            // line 75
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t";
            // line 76
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                echo "<td></td>";
            }
            // line 77
            echo "\t\t\t\t\t\t\t\t\t<td colspan=\"6\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nessuna voce trovata!", array(), "array"));
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        // line 80
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<!-- /.table-responsive -->\t\t\t\t\t
\t\t\t\t";
        // line 84
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()) > 0)) {
            // line 85
            echo "\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_info\" id=\"dataTables_info\" role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
\t\t\t\t\t\t\t";
            // line 88
            echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "mostra da %START% a %END% di %ITEM% elementi", array(), "array"), array("%START%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "firstPartItem", array()), "%END%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "lastPartItem", array()), "%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()))));
            echo "
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 95
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemPrevious", array());
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "precedente", array(), "array"));
            echo "</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 97
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()))) {
                // line 98
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItem/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 101
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"";
            // line 102
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "\">";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 103
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()))) {
                // line 104
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 105
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItem/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 107
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next";
            // line 108
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array()) >= twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "totalpage", array()))) {
                echo " disabled";
            }
            echo "\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 109
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItem/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemNext", array());
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "prossima", array(), "array"));
            echo "</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 116
        echo "\t\t\t</div>\t
\t\t\t<!-- /.form-inline wrapper -->
\t\t</div>
\t\t<!-- /.col-md-12 -->
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "third-party/templates/default/listItem.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 116,  339 => 109,  333 => 108,  328 => 107,  314 => 105,  309 => 104,  307 => 103,  298 => 102,  293 => 101,  279 => 99,  274 => 98,  272 => 97,  262 => 95,  252 => 88,  247 => 85,  245 => 84,  239 => 80,  232 => 77,  228 => 76,  225 => 75,  222 => 74,  206 => 69,  197 => 68,  184 => 67,  179 => 65,  175 => 64,  171 => 63,  167 => 62,  164 => 61,  159 => 60,  155 => 59,  152 => 58,  147 => 57,  145 => 56,  137 => 51,  133 => 50,  129 => 49,  125 => 48,  122 => 47,  116 => 45,  104 => 36,  100 => 35,  90 => 28,  83 => 26,  77 => 25,  71 => 24,  65 => 23,  59 => 22,  46 => 13,  39 => 8,  35 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- customers/listItem.tpl.php v.1.0.0. 02/11/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/newItem\" title=\"{{ Lang['inserisci nuova voce']|capitalize }}\" class=\"btn btn-primary\">{{ Lang['nuova voce']|capitalize }}</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<form role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}\" method=\"post\" enctype=\"multipart/form-data\">
\t<div class=\"row\">
\t\t<div class=\"col-md-12\">\t\t\t
\t\t\t<div class=\"form-inline\" role=\"grid\">\t\t\t\t\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<select class=\"form-control input-sm\" name=\"itemsforpage\" onchange=\"this.form.submit();\" >
\t\t\t\t\t\t\t\t\t<option value=\"5\"{% if App.itemsForPage == 5 %} selected=\"selected\"{% endif %}>5</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\"{% if App.itemsForPage == 10 %} selected=\"selected\"{% endif %}>10</option>
\t\t\t\t\t\t\t\t\t<option value=\"25\"{% if App.itemsForPage == 25 %} selected=\"selected\"{% endif %}>25</option>
\t\t\t\t\t\t\t\t\t<option value=\"50\"{% if App.itemsForPage == 50 %} selected=\"selected\"{% endif %}>50</option>
\t\t\t\t\t\t\t\t\t<option value=\"100\"{% if App.itemsForPage == 100 %} selected=\"selected\"{% endif %}>100</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t{{ Lang['voci per pagina']|capitalize }}
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group pull-right\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t{{ Lang['cerca']|capitalize }}:
\t\t\t\t\t\t\t\t<input name=\"searchFromTable\" value=\"{{ MySessionVars[App.sessionName]['srcTab'] }}\" class=\"form-control input-sm\" type=\"search\" onchange=\"this.form.submit();\">
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t<div class=\"table-responsive\">\t\t\t\t
\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}\t
\t\t\t\t\t\t\t\t\t<th class=\"id\">ID</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endif %}\t
\t\t\t\t\t\t\t\t<th>{{ Lang['categoria']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['tipo']|capitalize }}</th>\t
\t\t\t\t\t\t\t\t<th>{{ Lang['ragione_sociale']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['email']|capitalize }}</th>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>\t\t\t\t
\t\t\t\t\t\t\t{% if App.items is iterable and App.items|length > 0 %}
\t\t\t\t\t\t\t\t{% for key,value in App.items %}
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}\t
\t\t\t\t\t\t\t\t\t\t\t<td class=\"id\">{{ value.id }}</td>
\t\t\t\t\t\t\t\t\t\t{% endif %}\t
\t\t\t\t\t\t\t\t\t\t<td>{{ value.category }}</td>
\t\t\t\t\t\t\t\t\t\t<td>{{ App.types[value.id_type].title|capitalize }}</td>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td>{{ value.ragione_sociale }}</td>
\t\t\t\t\t\t\t\t\t\t<td>{{ value.email }}</td>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Item/{{ value.id  }}\" title=\"{{ value.active == 1 ? Lang['disattiva %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize : Lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}\"><i class=\"fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/modifyItem/{{ value.id }}\" title=\"{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/deleteItem/{{ value.id }}\" title=\"{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}\"><i class=\"fa fa-cut\"> </i></a>

\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
\t\t\t\t\t\t\t\t\t<td colspan=\"6\">{{ Lang['nessuna voce trovata!']|capitalize }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<!-- /.table-responsive -->\t\t\t\t\t
\t\t\t\t{% if App.pagination.itemsTotal > 0 %}
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_info\" id=\"dataTables_info\" role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
\t\t\t\t\t\t\t{{ Lang['mostra da %START% a %END% di %ITEM% elementi']|replace({'%START%': App.pagination.firstPartItem, '%END%': App.pagination.lastPartItem,'%ITEM%': App.pagination.itemsTotal})|capitalize }}
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemPrevious }}\">{{ Lang['precedente']|capitalize }}</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pagePrevious is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pagePrevious %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.page }}\">{{ App.pagination.page }}</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pageNext is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pageNext %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next{% if App.pagination.page >= App.pagination.totalpage %} disabled{% endif %}\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemNext }}\">{{ Lang['prossima']|capitalize }}</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t</div>\t
\t\t\t<!-- /.form-inline wrapper -->
\t\t</div>
\t\t<!-- /.col-md-12 -->
\t</div>
</form>", "third-party/templates/default/listItem.tpl.php", "/var/www/html/phpsimplygest/application/third-party/templates/default/listItem.tpl.php");
    }
}

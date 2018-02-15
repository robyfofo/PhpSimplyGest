<?php

/* invoices/templates/default/listItep.tpl.php */
class __TwigTemplate_00d81c632c14a8afb21e9848f31db862e93fae9925fa3b1b1019d9f02647e90f extends Twig_Template
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
        echo "<!-- invoices/listItep.tpl.php v.1.0.0. 07/02/2018 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"";
        // line 4
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/newItep\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci nuova voce-p", array(), "array"));
        echo "\" class=\"btn btn-primary\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nuova voce-p", array(), "array"));
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
        echo "/listItep\" method=\"post\" enctype=\"multipart/form-data\">
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
        // line 48
        echo "\t\t\t\t\t\t\t\t<th>";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "data", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 49
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "data scadenza", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 50
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cliente", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 51
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "numero", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 52
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "totale", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>\t\t\t\t
\t\t\t\t\t\t\t";
        // line 58
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) > 0))) {
            // line 59
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 60
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t";
                // line 61
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<td class=\"id\">";
                    // line 62
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 63
                echo "\t
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 64
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "dateinslocal", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 65
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "datescalocal", array());
                echo "</td>\t
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 66
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "customer", array());
                echo "</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 67
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "number", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 68
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "totalLabel", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 70
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("disactive") : ("active"));
                echo "Itep/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "disattiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce-p", array(), "array"))))) : (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "attiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce-u", array(), "array"))))));
                echo "\"><i class=\"fa fa-";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("unlock") : ("lock"));
                echo "\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 71
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/modifyItep/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "modifica %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce-p", array(), "array"))));
                echo "\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"";
                // line 72
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/deleteItep/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cancella %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la voce-p", array(), "array"))));
                echo "\"><i class=\"fa fa-cut\"> </i></a>
\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>\t
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "\t\t\t\t\t\t\t";
        } else {
            // line 77
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t";
            // line 78
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                echo "<td></td>";
            }
            // line 79
            echo "\t\t\t\t\t\t\t\t\t<td colspan=\"6\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nessuna voce trovata!", array(), "array"));
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        // line 82
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<!-- /.table-responsive -->\t\t\t\t\t
\t\t\t\t";
        // line 86
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()) > 0)) {
            // line 87
            echo "\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_info\" id=\"dataTables_info\" role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
\t\t\t\t\t\t\t";
            // line 90
            echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "mostra da %START% a %END% di %ITEM% elementi", array(), "array"), array("%START%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "firstPartItep", array()), "%END%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "lastPartItep", array()), "%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemsTotal", array()))));
            echo "
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 97
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItep/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "itemPrevious", array());
            echo "\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "precedente", array(), "array"));
            echo "</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 99
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()))) {
                // line 100
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pagePrevious", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 101
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItep/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"";
            // line 104
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItep/";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "\">";
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array());
            echo "</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 105
            if (twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()))) {
                // line 106
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "pageNext", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 107
                    echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo ($context["URLSITE"] ?? null);
                    echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                    echo "/pageItep/";
                    echo $context["value"];
                    echo "\">";
                    echo $context["value"];
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 109
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next";
            // line 110
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "page", array()) >= twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "pagination", array()), "totalpage", array()))) {
                echo " disabled";
            }
            echo "\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 111
            echo ($context["URLSITE"] ?? null);
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
            echo "/pageItep/";
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
        // line 118
        echo "\t\t\t</div>\t
\t\t\t<!-- /.form-inline wrapper -->
\t\t</div>
\t\t<!-- /.col-md-12 -->
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "invoices/templates/default/listItep.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  360 => 118,  345 => 111,  339 => 110,  334 => 109,  320 => 107,  315 => 106,  313 => 105,  304 => 104,  299 => 103,  285 => 101,  280 => 100,  278 => 99,  268 => 97,  258 => 90,  253 => 87,  251 => 86,  245 => 82,  238 => 79,  234 => 78,  231 => 77,  228 => 76,  213 => 72,  204 => 71,  191 => 70,  186 => 68,  182 => 67,  178 => 66,  174 => 65,  170 => 64,  167 => 63,  162 => 62,  158 => 61,  155 => 60,  150 => 59,  148 => 58,  139 => 52,  135 => 51,  131 => 50,  127 => 49,  122 => 48,  116 => 45,  104 => 36,  100 => 35,  90 => 28,  83 => 26,  77 => 25,  71 => 24,  65 => 23,  59 => 22,  46 => 13,  39 => 8,  35 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- invoices/listItep.tpl.php v.1.0.0. 07/02/2018 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/newItep\" title=\"{{ Lang['inserisci nuova voce-p']|capitalize }}\" class=\"btn btn-primary\">{{ Lang['nuova voce-p']|capitalize }}</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<form role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/listItep\" method=\"post\" enctype=\"multipart/form-data\">
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
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t<th>{{ Lang['data']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['data scadenza']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['cliente']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['numero']|capitalize }}</th>
\t\t\t\t\t\t\t\t<th>{{ Lang['totale']|capitalize }}</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
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
\t\t\t\t\t\t\t\t\t\t<td>{{ value.dateinslocal }}</td>
\t\t\t\t\t\t\t\t\t\t<td>{{ value.datescalocal }}</td>\t
\t\t\t\t\t\t\t\t\t\t<td>{{ value.customer }}</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td>{{ value.number }}</td>
\t\t\t\t\t\t\t\t\t\t<td>{{ value.totalLabel }}</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Itep/{{ value.id  }}\" title=\"{{ value.active == 1 ? Lang['disattiva %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize : Lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la voce-u']})|capitalize }}\"><i class=\"fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/modifyItep/{{ value.id }}\" title=\"{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize }}\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/deleteItep/{{ value.id }}\" title=\"{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize }}\"><i class=\"fa fa-cut\"> </i></a>
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
\t\t\t\t\t\t\t{{ Lang['mostra da %START% a %END% di %ITEM% elementi']|replace({'%START%': App.pagination.firstPartItep, '%END%': App.pagination.lastPartItep,'%ITEM%': App.pagination.itemsTotal})|capitalize }}
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables_paginate\">
\t\t\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t\t\t<li class=\"paginate_button previous<?php if (\$this->App->pagination->page == 1) echo ' disabled'; ?>\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItep/{{ App.pagination.itemPrevious }}\">{{ Lang['precedente']|capitalize }}</a>
\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pagePrevious is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pagePrevious %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItep/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItep/{{ App.pagination.page }}\">{{ App.pagination.page }}</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if App.pagination.pageNext is iterable %}
\t\t\t\t\t\t\t\t\t{%  for key,value in App.pagination.pageNext %}
\t\t\t\t\t\t\t\t\t\t<li><a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItep/{{ value }}\">{{ value }}</a></li>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"paginate_button next{% if App.pagination.page >= App.pagination.totalpage %} disabled{% endif %}\">
\t\t\t\t\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/pageItep/{{ App.pagination.itemNext }}\">{{ Lang['prossima']|capitalize }}</a>
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
</form>", "invoices/templates/default/listItep.tpl.php", "/var/www/html/phpsimplygest/application/invoices/templates/default/listItep.tpl.php");
    }
}

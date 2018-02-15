<?php

/* third-party/templates/default/listScat.tpl.php */
class __TwigTemplate_e8595399d808d3bcf418c962f02a94aceaca20dbfccc51ae2eb1a75a93b6e7dc extends Twig_Template
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
        echo "<!-- customers/listScat.tpl.php v.1.0.0. 22/11/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
\t\t<a href=\"";
        // line 4
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/newScat\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci nuova categoria", array(), "array"));
        echo "\" class=\"btn btn-primary\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nuova categoria", array(), "array"));
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
<div class=\"row\">
\t<div class=\"col-md-12\">\t\t\t
\t\t<div class=\"table-responsive\">\t\t\t\t\t\t\t\t\t
\t\t\t<table class=\"table table-striped table-bordered table-hover listData tree\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t";
        // line 20
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) == 1)) {
            // line 21
            echo "\t\t\t\t\t\t\t<th><small>ID</small></th>\t\t\t\t\t\t
\t\t\t\t\t\t";
        }
        // line 23
        echo "\t\t\t\t\t\t<th>";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "titolo", array(), "array"));
        echo "</th>
\t\t\t\t\t\t<th>";
        // line 24
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "clienti", array(), "array"));
        echo "</th>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<th></th>\t\t\t\t\t\t
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 29
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array())) > 0))) {
            // line 30
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "items", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 31
                echo "\t\t\t\t\t\t\t<tr class=\"treegrid-";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "parent", array()) > 0)) {
                    echo " treegrid-parent-";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "parent", array());
                }
                echo "\">
\t\t\t\t\t\t\t\t<td class=\"tree-simbol\"></td>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                // line 33
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t\t<td class=\"id\">";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                    echo "-";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "parent", array());
                    echo "</td>
\t\t\t\t\t\t\t\t";
                }
                // line 35
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"page-title\" style=\"white-space: nowrap;\">";
                // line 36
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "levelString", array());
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "title", array());
                echo "</td>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 38
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/listItem/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "clienti associati", array(), "array"));
                echo "\"><i class=\"fa fa-users\"> </i></a>(";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "items", array());
                echo ")\t\t\t 
\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 41
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("disactive") : ("active"));
                echo "Scat/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "disattiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la categoria", array(), "array"))))) : (twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "attiva %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la categoria", array(), "array"))))));
                echo "\"><i class=\"fa fa-";
                echo (((twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "active", array()) == 1)) ? ("unlock") : ("lock"));
                echo "\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"";
                // line 42
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/modifyScat/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "modifica %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la categoria", array(), "array"))));
                echo "\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"";
                // line 43
                echo ($context["URLSITE"] ?? null);
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
                echo "/deleteScat/";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\" title=\"";
                echo twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cancella %ITEM%", array(), "array"), array("%ITEM%" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "la categoria", array(), "array"))));
                echo "\"><i class=\"fa fa-cut\"> </i></a>
\t\t\t\t\t\t\t\t</td>
     \t\t\t\t\t\t</tr> 
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "\t\t\t\t\t";
        } else {
            // line 48
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t";
            // line 50
            if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
                echo "<td></td>";
            }
            // line 51
            echo "\t\t\t\t\t\t\t<td colspan=\"3\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nessuna voce trovata!", array(), "array"));
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 54
        echo "\t\t\t\t</tbody>       
\t\t\t</table>\t\t\t\t
\t\t</div>
\t\t<!-- /.table-responsive -->
\t</div>
\t<!-- /.col-md-12 -->
</div>
<!-- /.row -->";
    }

    public function getTemplateName()
    {
        return "third-party/templates/default/listScat.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 54,  169 => 51,  165 => 50,  161 => 48,  158 => 47,  143 => 43,  134 => 42,  121 => 41,  108 => 38,  102 => 36,  99 => 35,  91 => 34,  89 => 33,  79 => 31,  74 => 30,  72 => 29,  64 => 24,  59 => 23,  55 => 21,  53 => 20,  39 => 8,  35 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- customers/listScat.tpl.php v.1.0.0. 22/11/2017 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/newScat\" title=\"{{ Lang['inserisci nuova categoria']|capitalize }}\" class=\"btn btn-primary\">{{ Lang['nuova categoria']|capitalize }}</a>
\t</div>
\t<div class=\"col-md-7 help-small-list\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
\t</div>
\t<div class=\"col-md-2\">
\t</div>
</div>
<hr class=\"divider-top-module\">
<div class=\"row\">
\t<div class=\"col-md-12\">\t\t\t
\t\t<div class=\"table-responsive\">\t\t\t\t\t\t\t\t\t
\t\t\t<table class=\"table table-striped table-bordered table-hover listData tree\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t{% if App.userLoggedData.is_root == 1 %}
\t\t\t\t\t\t\t<th><small>ID</small></th>\t\t\t\t\t\t
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t<th>{{ Lang['titolo']|capitalize }}</th>
\t\t\t\t\t\t<th>{{ Lang['clienti']|capitalize }}</th>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<th></th>\t\t\t\t\t\t
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t{% if App.items is iterable and App.items|length > 0 %}
\t\t\t\t\t\t{% for key,value in App.items %}
\t\t\t\t\t\t\t<tr class=\"treegrid-{{ value.id }}{% if value.parent > 0 %} treegrid-parent-{{ value.parent }}{% endif %}\">
\t\t\t\t\t\t\t\t<td class=\"tree-simbol\"></td>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
\t\t\t\t\t\t\t\t\t<td class=\"id\">{{ value.id }}-{{ value.parent }}</td>
\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"page-title\" style=\"white-space: nowrap;\">{{ value.levelString }}{{ value.title }}</td>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/listItem/{{ value.id }}\" title=\"{{ Lang['clienti associati']|capitalize }}\"><i class=\"fa fa-users\"> </i></a>({{ value.items }})\t\t\t 
\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"actions\">
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Scat/{{ value.id  }}\" title=\"{{ value.active == 1 ? Lang['disattiva %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize : Lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}\"><i class=\"fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}\"> </i></a>\t\t\t 
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/modifyScat/{{ value.id }}\" title=\"{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}\"><i class=\"fa fa-edit\"> </i></a>
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-circle confirm\" href=\"{{ URLSITE }}{{ CoreRequest.action }}/deleteScat/{{ value.id }}\" title=\"{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}\"><i class=\"fa fa-cut\"> </i></a>
\t\t\t\t\t\t\t\t</td>
     \t\t\t\t\t\t</tr> 
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
\t\t\t\t\t\t\t<td colspan=\"3\">{{ Lang['nessuna voce trovata!']|capitalize }}</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endif %}
\t\t\t\t</tbody>       
\t\t\t</table>\t\t\t\t
\t\t</div>
\t\t<!-- /.table-responsive -->
\t</div>
\t<!-- /.col-md-12 -->
</div>
<!-- /.row -->", "third-party/templates/default/listScat.tpl.php", "/var/www/html/phpsimplygest/application/third-party/templates/default/listScat.tpl.php");
    }
}

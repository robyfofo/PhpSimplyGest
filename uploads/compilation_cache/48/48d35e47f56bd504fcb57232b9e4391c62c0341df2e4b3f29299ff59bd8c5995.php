<?php

/* invoices/templates/default/formItep.tpl.php */
class __TwigTemplate_ab68fa5f112fdf88212463a7015e98b5743250ab712cac82ac7cead5784ee7a5 extends Twig_Template
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
        echo "<!-- invoices/formItep.tpl.php 09/02/2018 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t</div>
\t<div class=\"col-md-7 help-small-form\">
\t\t";
        // line 6
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array(), "any", false, true), "help_small", array(), "any", true, true)) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "params", array()), "help_small", array());
        }
        // line 7
        echo "\t</div>
\t<div class=\"col-md-2 help\">
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-lg-12\">\t\t
\t\t<!-- Nav tabs -->
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"\"><a href=\"#datibase-tab\" data-toggle=\"tab\">";
        // line 15
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "dati base", array(), "array"));
        echo " <i class=\"fa\"></i></a></li>
\t\t\t<li class=\"active\"><a href=\"#articles-tab\" data-toggle=\"tab\">";
        // line 16
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "articoli associati", array(), "array"));
        echo " <i class=\"fa\"></i></a></li>
\t\t\t<li class=\"\"><a href=\"#options-tab\" data-toggle=\"tab\">";
        // line 17
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "opzioni", array(), "array"));
        echo " <i class=\"fa\"></i></a></li>
\t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"";
        // line 19
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/";
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "methodForm", array());
        echo "\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<!-- Tab panes -->
\t\t\t<div class=\"tab-content\">\t\t
\t\t\t\t<div class=\"tab-pane\" id=\"datibase-tab\">\t\t\t
\t\t\t\t\t<fieldset class=\"form-group\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"dateinsID\" class=\"col-md-2 control-label\">";
        // line 25
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "data", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-5 input-group date\" id=\"dateinsDPID\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"dateins\" class=\"form-control\" placeholder=\"";
        // line 27
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci una data", array(), "array"));
        echo "\" id=\"dateinsID\" value=\"\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\">
\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar\"></span>
\t\t\t               </span>\t\t    \t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"datescaID\" class=\"col-md-2 control-label\">";
        // line 34
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "data scadenza", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-5 input-group date\" id=\"datescaDPID\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"datesca\" class=\"form-control\" placeholder=\"";
        // line 36
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci una data di scadenza", array(), "array"));
        echo "\" id=\"datescaID\" value=\"\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\">
\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar\"></span>
\t\t\t               </span>\t\t    \t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-2 control-label\">";
        // line 44
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "cliente", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<select name=\"id_customer\" id=\"id_customerID\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t";
        // line 47
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "customers", array())) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "customers", array())) > 0))) {
            // line 48
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "customers", array()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 49
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array());
                echo "\"";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id_customer", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "id", array()))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["value"], "ragione_sociale", array());
                echo "</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "\t\t\t\t\t\t\t\t\t";
        }
        // line 52
        echo "\t\t\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t    \t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"numberID\" class=\"col-md-2 control-label\">";
        // line 57
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "numero", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"number\" class=\"form-control\" id=\"numberID\" placeholder=\"";
        // line 59
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci un numero", array(), "array"));
        echo "\" value=\"";
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "number", array());
        echo "\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t</div>

<!-- sezione movimenti -->
\t\t\t\t<div class=\"tab-pane active\" id=\"articles-tab\">
\t\t\t\t
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\" data-whatever=\"@mdo\" data-art=\"0\" title=\"";
        // line 71
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci un nuovo articolo", array(), "array"));
        echo "\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "nuovo articolo", array(), "array"));
        echo "</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<hr class=\"divider\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">\t
\t\t\t\t\t\t\t<div class=\"table-responsive\">\t\t\t\t
\t\t\t\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 81
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array(), "any", false, true), "is_root", array(), "any", true, true) && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "userLoggedData", array()), "is_root", array()) === 1))) {
            echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"id\">ID</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 84
        echo "\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "contenuto", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">";
        // line 85
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "prezzo unitario", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">";
        // line 86
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "iva", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">";
        // line 87
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "imponibile", array(), "array"));
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">";
        // line 88
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "prezzo totale", array(), "array"));
        echo "</th>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t<tbody id=\"listarticlesID\">\t\t\t\t
\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceArtTotalID\" class=\"col-md-9 control-label\">";
        // line 100
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "totale articoli", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceArtTotalID\">€ 0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceTaxTotaID\" class=\"col-md-9 control-label\">";
        // line 108
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "imposte", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceTaxTotalID\">€ 0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceTotalID\" class=\"col-md-9 control-label\">";
        // line 116
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "totale", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceTotalID\">0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t</div>
<!-- /sezione movimenti -->

<!-- sezione opzioni --> 
\t\t\t\t<div class=\"tab-pane\" id=\"options-tab\">
\t\t\t\t\t<fieldset class=\"form-group\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"activeID\" class=\"col-md-2 control-label\">";
        // line 129
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "attiva", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"active\" id=\"activeID\"";
        // line 133
        if ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "active", array()) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " value=\"1\">
\t\t\t\t\t\t\t\t\t</label>
        \t\t\t\t\t\t</div>
      \t\t\t\t\t</div>
\t\t\t\t  \t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t</div>
<!-- /sezione opzioni -->\t\t 
\t\t\t</div>
\t\t\t<!--/Tab panes -->\t\t\t
\t\t\t<hr>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-offset-2 col-md-7\">
\t\t\t\t\t<input type=\"hidden\" name=\"type\" id=\"typeID\" value=\"";
        // line 146
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "type", array());
        echo "\">
\t\t\t\t\t<input type=\"hidden\" name=\"id\" id=\"idID\" value=\"";
        // line 147
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "id", array());
        echo "\">
\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"";
        // line 148
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "methodForm", array());
        echo "\">
\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">";
        // line 149
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "invia", array(), "array"));
        echo "</button>
\t\t\t\t\t";
        // line 150
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "id", array()) > 0)) {
            // line 151
            echo "\t\t\t\t\t\t<button type=\"submit\" name=\"applyForm\" value=\"apply\" class=\"btn btn-primary\">";
            echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "applica", array(), "array"));
            echo "</button>
\t\t\t\t\t";
        }
        // line 153
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">\t\t\t\t
\t\t\t\t\t<a href=\"";
        // line 155
        echo ($context["URLSITE"] ?? null);
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["CoreRequest"] ?? null), "action", array());
        echo "/listItep\" title=\"";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "torna alla lista", array(), "array"));
        echo "\" class=\"btn btn-success\">";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "indietro", array(), "array"));
        echo "</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>

<!-- Default bootstrap modal example -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\"></h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<form id=\"articleFormID\" class=\"form-inline\" role=\"form\" action=\"#\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t<div class=\"row\">\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-md-12\" style=\"margin-bottom:20px;\">
\t\t\t\t\t\t\t\t<textarea required name=\"contentArt\" class=\"form-control form-content\" id=\"contentArtID\" rows=\"3\">";
        // line 175
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "inserisci testo articolo", array(), "array"));
        echo "</textarea>
\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row text-center\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label for=\"priceArtID\">";
        // line 180
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "prezzo", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-amount\" name=\"priceArt\" id=\"priceArtID\" value=\"0.00\">
\t\t\t\t\t\t\t\t<label for=\"taxArtID\">";
        // line 182
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "tassa", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-tax\" name=\"taxArt\" id=\"taxArtID\" value=\"0\">
\t\t\t\t\t\t\t\t<label for=\"totalArtID\">";
        // line 184
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "totale", array(), "array"));
        echo "</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-amount\" name=\"totalArt\" id=\"totalArtID\" value=\"0.00\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row modalaction\">\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-md-12 text-center\">\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"idArt\" id=\"idArtID\" value=\"\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id_invoice\" id=\"id_invoiceID\" value=\"";
        // line 191
        echo twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "item", array()), "id", array());
        echo "\">
\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" id=\"submitFormID\" value=\"submit\" class=\"btn btn-primary btn-sm \">";
        // line 192
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "aggiungi", array(), "array"));
        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "invoices/templates/default/formItep.tpl.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  360 => 192,  356 => 191,  346 => 184,  341 => 182,  336 => 180,  328 => 175,  300 => 155,  296 => 153,  290 => 151,  288 => 150,  284 => 149,  280 => 148,  276 => 147,  272 => 146,  254 => 133,  247 => 129,  231 => 116,  220 => 108,  209 => 100,  194 => 88,  190 => 87,  186 => 86,  182 => 85,  177 => 84,  171 => 81,  156 => 71,  139 => 59,  134 => 57,  127 => 52,  124 => 51,  109 => 49,  104 => 48,  102 => 47,  96 => 44,  85 => 36,  80 => 34,  70 => 27,  65 => 25,  53 => 19,  48 => 17,  44 => 16,  40 => 15,  30 => 7,  26 => 6,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- invoices/formItep.tpl.php 09/02/2018 -->
<div class=\"row\">
\t<div class=\"col-md-3 new\">
 \t</div>
\t<div class=\"col-md-7 help-small-form\">
\t\t{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
\t</div>
\t<div class=\"col-md-2 help\">
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-lg-12\">\t\t
\t\t<!-- Nav tabs -->
\t\t<ul class=\"nav nav-tabs\">
\t\t\t<li class=\"\"><a href=\"#datibase-tab\" data-toggle=\"tab\">{{ Lang['dati base']|capitalize }} <i class=\"fa\"></i></a></li>
\t\t\t<li class=\"active\"><a href=\"#articles-tab\" data-toggle=\"tab\">{{ Lang['articoli associati']|capitalize }} <i class=\"fa\"></i></a></li>
\t\t\t<li class=\"\"><a href=\"#options-tab\" data-toggle=\"tab\">{{ Lang['opzioni']|capitalize }} <i class=\"fa\"></i></a></li>
\t\t</ul>
\t\t<form id=\"applicationForm\" class=\"form-horizontal\" role=\"form\" action=\"{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}\"  enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<!-- Tab panes -->
\t\t\t<div class=\"tab-content\">\t\t
\t\t\t\t<div class=\"tab-pane\" id=\"datibase-tab\">\t\t\t
\t\t\t\t\t<fieldset class=\"form-group\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"dateinsID\" class=\"col-md-2 control-label\">{{ Lang['data']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-5 input-group date\" id=\"dateinsDPID\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"dateins\" class=\"form-control\" placeholder=\"{{ Lang['inserisci una data']|capitalize }}\" id=\"dateinsID\" value=\"\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\">
\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar\"></span>
\t\t\t               </span>\t\t    \t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"datescaID\" class=\"col-md-2 control-label\">{{ Lang['data scadenza']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-5 input-group date\" id=\"datescaDPID\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"datesca\" class=\"form-control\" placeholder=\"{{ Lang['inserisci una data di scadenza']|capitalize }}\" id=\"datescaID\" value=\"\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\">
\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-calendar\"></span>
\t\t\t               </span>\t\t    \t
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"nameID\" class=\"col-md-2 control-label\">{{ Lang['cliente']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<select name=\"id_customer\" id=\"id_customerID\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t{% if App.customers is iterable and App.customers|length > 0 %}
\t\t\t\t\t\t\t\t\t\t{% for key,value in App.customers %}
\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ value.id }}\"{% if App.item.id_customer == value.id %} selected=\"selected\"{% endif %}>{{ value.ragione_sociale }}</option>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t</select>\t\t\t\t\t\t\t\t    \t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"numberID\" class=\"col-md-2 control-label\">{{ Lang['numero']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<input required type=\"text\" name=\"number\" class=\"form-control\" id=\"numberID\" placeholder=\"{{ Lang['inserisci un numero']|capitalize }}\" value=\"{{ App.item.number }}\">
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t</div>

<!-- sezione movimenti -->
\t\t\t\t<div class=\"tab-pane active\" id=\"articles-tab\">
\t\t\t\t
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\" data-whatever=\"@mdo\" data-art=\"0\" title=\"{{ Lang['inserisci un nuovo articolo']|capitalize }}\">{{ Lang['nuovo articolo']|capitalize }}</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<hr class=\"divider\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">\t
\t\t\t\t\t\t\t<div class=\"table-responsive\">\t\t\t\t
\t\t\t\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover listData\">
\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}\t
\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"id\">ID</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">{{ Lang['contenuto']|capitalize }}</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">{{ Lang['prezzo unitario']|capitalize }}</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">{{ Lang['iva']|capitalize }}</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">{{ Lang['imponibile']|capitalize }}</th>
\t\t\t\t\t\t\t\t\t\t\t<th class=\"text-center\">{{ Lang['prezzo totale']|capitalize }}</th>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t<tbody id=\"listarticlesID\">\t\t\t\t
\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceArtTotalID\" class=\"col-md-9 control-label\">{{ Lang['totale articoli']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceArtTotalID\">€ 0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceTaxTotaID\" class=\"col-md-9 control-label\">{{ Lang['imposte']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceTaxTotalID\">€ 0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"invoiceTotalID\" class=\"col-md-9 control-label\">{{ Lang['totale']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-2 text-right\">
\t\t\t\t\t\t\t\t<span id=\"invoiceTotalID\">0,00</span>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t</div>
<!-- /sezione movimenti -->

<!-- sezione opzioni --> 
\t\t\t\t<div class=\"tab-pane\" id=\"options-tab\">
\t\t\t\t\t<fieldset class=\"form-group\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"activeID\" class=\"col-md-2 control-label\">{{ Lang['attiva']|capitalize }}</label>
\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"active\" id=\"activeID\"{% if App.item.active == 1 %} checked=\"checked\"{% endif %} value=\"1\">
\t\t\t\t\t\t\t\t\t</label>
        \t\t\t\t\t\t</div>
      \t\t\t\t\t</div>
\t\t\t\t  \t\t</div>
\t\t\t\t\t</fieldset>\t\t\t\t\t
\t\t\t\t</div>
<!-- /sezione opzioni -->\t\t 
\t\t\t</div>
\t\t\t<!--/Tab panes -->\t\t\t
\t\t\t<hr>
\t\t\t<div class=\"form-group\">
\t\t\t\t<div class=\"col-md-offset-2 col-md-7\">
\t\t\t\t\t<input type=\"hidden\" name=\"type\" id=\"typeID\" value=\"{{ App.type }}\">
\t\t\t\t\t<input type=\"hidden\" name=\"id\" id=\"idID\" value=\"{{ App.id }}\">
\t\t\t\t\t<input type=\"hidden\" name=\"method\" value=\"{{ App.methodForm }}\">
\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" value=\"submit\" class=\"btn btn-primary\">{{ Lang['invia']|capitalize }}</button>
\t\t\t\t\t{% if App.id > 0 %}
\t\t\t\t\t\t<button type=\"submit\" name=\"applyForm\" value=\"apply\" class=\"btn btn-primary\">{{ Lang['applica']|capitalize }}</button>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-2\">\t\t\t\t
\t\t\t\t\t<a href=\"{{ URLSITE }}{{ CoreRequest.action }}/listItep\" title=\"{{ Lang['torna alla lista']|capitalize }}\" class=\"btn btn-success\">{{ Lang['indietro']|capitalize }}</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>

<!-- Default bootstrap modal example -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\"></h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<form id=\"articleFormID\" class=\"form-inline\" role=\"form\" action=\"#\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t<div class=\"row\">\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-md-12\" style=\"margin-bottom:20px;\">
\t\t\t\t\t\t\t\t<textarea required name=\"contentArt\" class=\"form-control form-content\" id=\"contentArtID\" rows=\"3\">{{ Lang['inserisci testo articolo']|capitalize }}</textarea>
\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row text-center\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label for=\"priceArtID\">{{ Lang['prezzo']|capitalize }}</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-amount\" name=\"priceArt\" id=\"priceArtID\" value=\"0.00\">
\t\t\t\t\t\t\t\t<label for=\"taxArtID\">{{ Lang['tassa']|capitalize }}</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-tax\" name=\"taxArt\" id=\"taxArtID\" value=\"0\">
\t\t\t\t\t\t\t\t<label for=\"totalArtID\">{{ Lang['totale']|capitalize }}</label>
\t\t\t\t\t\t\t\t<input required type=\"text\" class=\"form-control form-amount\" name=\"totalArt\" id=\"totalArtID\" value=\"0.00\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row modalaction\">\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-md-12 text-center\">\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"idArt\" id=\"idArtID\" value=\"\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id_invoice\" id=\"id_invoiceID\" value=\"{{ App.item.id }}\">
\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submitForm\" id=\"submitFormID\" value=\"submit\" class=\"btn btn-primary btn-sm \">{{ Lang['aggiungi']|capitalize }}</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "invoices/templates/default/formItep.tpl.php", "/var/www/html/phpsimplygest/application/invoices/templates/default/formItep.tpl.php");
    }
}

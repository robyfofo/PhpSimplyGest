<?php

/* home/templates/default/js/chartsdata.js.php */
class __TwigTemplate_e1c0807b0ddaa3eba3d60cb6bd07a4b55f345e766dce03d847f1c0c86ba3806e extends Twig_Template
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
        echo "<!-- home/chartsdata.js.php v.1.0.0. 14/02/2018 -->
<script language=\"javascript\">
\$(function() {

    Morris.Bar({
        element: 'sales-chart',
        data: [";
        // line 7
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["App"] ?? null), "chartsdata", array());
        echo "],
        xkey: 'y',
        ykeys: ['v', 'a'],
        labels: ['";
        // line 10
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "vendite", array(), "array"));
        echo "','";
        echo twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["Lang"] ?? null), "acquisti", array(), "array"));
        echo "'],
        barColors: ['#337ab7', '#d9534f'],
        hideHover: 'auto',
        resize: true
    });
    
});
</script>";
    }

    public function getTemplateName()
    {
        return "home/templates/default/js/chartsdata.js.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 10,  27 => 7,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- home/chartsdata.js.php v.1.0.0. 14/02/2018 -->
<script language=\"javascript\">
\$(function() {

    Morris.Bar({
        element: 'sales-chart',
        data: [{{ App.chartsdata }}],
        xkey: 'y',
        ykeys: ['v', 'a'],
        labels: ['{{ Lang['vendite']|capitalize }}','{{ Lang['acquisti']|capitalize }}'],
        barColors: ['#337ab7', '#d9534f'],
        hideHover: 'auto',
        resize: true
    });
    
});
</script>", "home/templates/default/js/chartsdata.js.php", "/var/www/html/phpsimplygest/application/home/templates/default/js/chartsdata.js.php");
    }
}

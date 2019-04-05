<!-- home/chartsdata.js.php v.1.0.0. 14/02/2018 -->
<script language="javascript">
$(function() {

    Morris.Bar({
        element: 'sales-chart',
        data: [{{ App.chartsdata }}],
        xkey: 'y',
        ykeys: ['v','a','u'],
        labels: ['{{ Lang['vendite']|capitalize }}','{{ Lang['acquisti']|capitalize }}','{{ Lang['utile']|capitalize }}'],
        barColors: ['#428bca', '#d9534f','#5cb85c'],
        hideHover: 'auto',
        resize: true
    });
    
    Morris.Bar({
        element: 'fiscaleannoprecedente-chart',
        data: [{{ App.ricaviannoprecedentechartsdata }}],
        xkey: 'y',
        ykeys: ['r','ril','rin','t','u'],
        labels: [
        	'Ricavi',
        	'Imponibile lordo {{ App.coefficienteRedditivita|number_format(2, '.', ',') }}% CFR',
        	'Imponibile netto {{ App.impostaInps|number_format(2, '.', ',') }}% INPS',       	
        	'{{ Lang['tasse']|capitalize }}',
        	'{{ Lang['utile']|capitalize }}'
        	],
        barColors: ['#428bca','#f0ad4e','#5cb85c','#d9534f','#5cb85c'],
        hideHover: 'auto',
        
        resize: true
    });
    
    Morris.Bar({
        element: 'fiscaleannocorrente-chart',
        data: [{{ App.ricaviannocorrentechartsdata }}],
        xkey: 'y',
        ykeys: ['r','ril','rin','t','u'],
        labels: [
        	'Ricavi',
        	'Imponibile lordo {{ App.coefficienteRedditivita|number_format(2, '.', ',') }}% CFR',
        	'Imponibile netto {{ App.impostaInps|number_format(2, '.', ',') }}% INPS',       	
        	'{{ Lang['tasse']|capitalize }}',
        	'{{ Lang['utile']|capitalize }}'
        	],
        barColors: ['#428bca','#f0ad4e','#5cb85c','#d9534f','#5cb85c'],
        hideHover: 'auto',
        resize: true
    });
    
});
</script>
<!-- home/chartsdata.js.php v.1.0.0. 14/02/2018 -->
<script language="javascript">
$(function() {

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
</script>
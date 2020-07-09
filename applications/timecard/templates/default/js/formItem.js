/* timecard/items.js v.1.2.0. 10/12/2019 */

$(document).ready(function() {

	$('.timedelconfirm').click(function(e) {
		e.preventDefault(e);
		var location = $(this).attr('href');
		bootbox.confirm("Sei sicuro?",function(confirmed) {
			if (confirmed) {
				window.location.replace(location);
			}
		});
	});
	
	$('#dataDPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultdata,
		format: 'L',
		icons: {
			time: 'fas fa-clock',
       		date: 'fas fa-calendar',
       		up: 'fas fa-chevron-up',
       		down: 'fas fa-chevron-down',
       		previous: 'fas fa-chevron-left',
       		next: 'fas fa-chevron-right',
       		today: 'fas fa-check',
       		clear: 'fas fa-trash',
      		close: 'fas fa-times'
     	}
	});
		
	$('#data1DPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultdata1,
		format: 'L',
		icons: {
			time: 'fas fa-clock',
       		date: 'fas fa-calendar',
       		up: 'fas fa-chevron-up',
       		down: 'fas fa-chevron-down',
       		previous: 'fas fa-chevron-left',
       		next: 'fas fa-chevron-right',
       		today: 'fas fa-check',
       		clear: 'fas fa-trash',
      		close: 'fas fa-times'
     	}
	});
		
	$('#appdataDPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultappdata,
		format: 'L',
		icons: {
			time: 'fas fa-clock',
       		date: 'fas fa-calendar',
       		up: 'fas fa-chevron-up',
       		down: 'fas fa-chevron-down',
       		previous: 'fas fa-chevron-left',
       		next: 'fas fa-chevron-right',
       		today: 'fas fa-check',
       		clear: 'fas fa-trash',
      		close: 'fas fa-times'
     	}
	});
	
	$('#startTimeID').datetimepicker({
		format: 'LT',
		locale: user_lang,
		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,	
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		icons: {
			time: 'fas fa-clock',
    		date: 'fas fa-calendar',
    		up: 'fas fa-chevron-up',
    		down: 'fas fa-chevron-down',
    		previous: 'fas fa-chevron-left',
    		next: 'fas fa-chevron-right',
    		today: 'fas fa-check',
    		clear: 'fas fa-trash',
   		close: 'fas fa-times'
     	}
	});

	
	
	
	$('#endTimeID').datetimepicker({
		locale: user_lang,
		format: 'LT',
 		defaultDate:  moment(defaultTimeEnd, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		icons: {
			time: 'fas fa-clock',
    		date: 'fas fa-calendar',
    		up: 'fas fa-chevron-up',
    		down: 'fas fa-chevron-down',
    		previous: 'fas fa-chevron-left',
    		next: 'fas fa-chevron-right',
    		today: 'fas fa-check',
    		clear: 'fas fa-trash',
   		close: 'fas fa-times'
     	}
	});

	$("#startTimeID").on("dp.change", function (e) {
		var d = new Date(e.date);
		d.setHours(d.getHours()+1);
		moment.locale(cur_lang);
		t = moment(d).format("LT");
		$('#endTimeID').val(t);
	});	

	$('#starttime1ID').datetimepicker({
		locale: user_lang,
		format: 'LT',
 		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		icons: {
			time: 'fas fa-clock',
    		date: 'fas fa-calendar',
    		up: 'fas fa-chevron-up',
    		down: 'fas fa-chevron-down',
    		previous: 'fas fa-chevron-left',
    		next: 'fas fa-chevron-right',
    		today: 'fas fa-check',
    		clear: 'fas fa-trash',
   		close: 'fas fa-times'
     	}
		
	});

 	$('.tooltip-proj').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
	});

		
});
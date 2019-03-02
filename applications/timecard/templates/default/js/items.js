/* timecard/items.js v.1.0.0. 08/07/2018 */

$(document).ready(function() {

	$('.timedelconfirm').click(function(e) {
		e.preventDefault(e);
		var location = $(this).attr('href');
		bootbox.confirm("Sei sicuro?",function(confirmed) {
			if(confirmed) {
				window.location.replace(location);
				}
			});
	    });
	
	$('#dataDPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultdata,
		format: 'L'
		});
		
	$('#data1DPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultdata1,
		format: 'L'
		});
		
	$('#appdataDPID').datetimepicker({
		locale: user_lang,
		defaultDate: defaultappdata,
		format: 'L',
		});
		
	$('#startTimeID').datetimepicker({
		locale: user_lang,
		format: 'LT',
 		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null,
		});
	$('#endTimeID').datetimepicker({
		locale: user_lang,
		format: 'LT',
 		defaultDate:  moment(defaultTimeEnd, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null
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
		timeZone: null,
		});
		
 	$('.tooltip-proj').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
		});

		
	});
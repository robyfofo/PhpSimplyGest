/* admin/timecard/items.js v.3.0.0. 20/10/2016 */

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
		locale: cur_lang,
		defaultDate: defaultdata,
		format: 'L'
		});
		
	$('#data1DPID').datetimepicker({
		locale: cur_lang,
		defaultDate: defaultdata1,
		format: 'L'
		});
		
	$('#appdataDPID').datetimepicker({
		locale: cur_lang,
		defaultDate: defaultappdata,
		format: 'L',
		});
		
	$('#startTimeID').datetimepicker({
		//format:'LT',
		locale: cur_lang,
		format: 'LT',
 		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null,
		});
	$('#endTimeID').datetimepicker({
		locale: cur_lang,
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
		console.log(d);
		t = moment(d).format("LT");
		console.log(t);
		$('#endTimeID').val(t);
		});	

	$('#starttime1ID').datetimepicker({
		//format:'LT',
		locale: cur_lang,
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
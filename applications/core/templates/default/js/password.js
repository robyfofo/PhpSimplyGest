/* core/profile.js v.1.0.0. 04/07/2018 */

$(document).ready(function() {		

	});
	
/* controllo password */	
$('#passwordCKID').change(function() {
	var pass = $('#passwordID').val();
	var passCK = $('#passwordCKID').val();
	if (pass !== passCK) {
		bootbox.alert(messages['Le due password non corrispondono!']);
		}
	});
		
$('.submittheform').click(function () {
	$('input:invalid').each(function () {
		// Find the tab-pane that this element is inside, and get the id
		var $closest = $(this).closest('.tab-pane');
		var id = $closest.attr('id');
		// Find the link that corresponds to the pane and have it show
		$('.nav a[href="#' + id + '"]').tab('show');
		// Only want to do it once
		return false;
		});
	});
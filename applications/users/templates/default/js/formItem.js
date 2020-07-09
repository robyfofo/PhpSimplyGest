/* admin/users/items.js v.1.2.0. 17/12/2019 */
$(document).ready(function() {	

   /* controllo ajax username */
	$('#usernameID').change(function(){
		var username = $('#usernameID').val();
		var id = $('#idID').val();
		$.ajax({
			url: siteUrl+'users/checkUserAjaxItem/',
			type: "POST",
			data: 'username='+username+'&id='+id,
			success: function(result) {
				var mess = result;
				$('#usernameMessageID').html(mess);
				}				
			});
		});
		
	/* controllo ajax username */
	$('#emailID').change(function(){
		var email = $('#emailID').val();
		var id = $('#idID').val();
		$.ajax({
			url: siteUrl+'users/checkEmailAjaxItem/',
			type: "POST",
			data: 'email='+email+'&id='+id,
			success: function(result) {
				var mess = result;
				$('#emailMessageID').html(mess);
				}				
			});
		});
		
	/* controllo password */	
	$('#passwordCFID').change(function(){
		var pass = $('#passwordID').val();
		var passCF = $('#passwordCFID').val();
		if(pass !== passCF) {
			bootbox.alert(messages['Le due password non corrispondono!']);
			}
		});	
		
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
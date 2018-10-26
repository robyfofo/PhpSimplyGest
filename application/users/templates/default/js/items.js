/* admin/users/items.js v.1.0.0. 16/02/2017 */
$(document).ready(function() {	

   /* controllo ajax username */
	$('#usernameID').change(function(){
		var username = $('#usernameID').val();
		var id = $('#idID').val();
		$.ajax({
			url: siteUrlAdmin+'users/checkUserAjaxItem/',
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
			url: siteUrlAdmin+'users/checkEmailAjaxItem/',
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
		
	$('#applicationForm')
		.bootstrapValidator({
			excluded: [':disabled'],
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
				}
			})
		.on('status.field.bv', function(e, data) {
			var $form = $(e.target),
			validator = data.bv,
			$tabPane  = data.element.parents('.tab-pane'),
			tabId     = $tabPane.attr('id');
	
			if (tabId) {
				var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');
				// Add custom class to tab containing the field
				if (data.status == validator.STATUS_INVALID) {
					$icon.removeClass('fa-check').addClass('fa-times');
					} else if (data.status == validator.STATUS_VALID) {
						var isValidTab = validator.isValidContainer($tabPane);
						$icon.removeClass('fa-check fa-times')
						.addClass(isValidTab ? 'fa-check' : 'fa-times');
						}
				}
			});
	});
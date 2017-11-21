$(document).ready(function() {
	
	$('#dateinsDPID').datetimepicker({
		locale: cur_lang,
		defaultDate: defDateins,
		format: 'L'
		});

	$('#datescaDPID').datetimepicker({
		locale: cur_lang,
		defaultDate: defDatesca,
		format: 'L'
		});
	
	getMovimenti();
	
	$("#myModal").on("show.bs.modal", function(e) {
  		var modal = $(this);
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
		var id = link.data('mov') // Extract info from data-* attributes
		modal.find('.modal-title').text(messages['aggiungi movimento']);
		if (id > 0) modal.find('.modal-title').text(messages['modifica movimento']);	
		});

	$("#deleteMovID").on('click',function(e) {
		alert('click');
		});
		
 $('form[data-async]').on('submit', function(event) {
	 	var $form = $(this);
	 	var $mov = $($form.attr('data-mov'));
		$action = siteUrl+module+'/insertItem';
		if ($mov > 0) $action = siteUrl+module+'/updateItem';
		console.log($action);
		$form.attr('action', $action);
		});
	
	$("#movimentoFormID").on('submit', function(event) {
		alert('invio form');
		var $form = $(this);
		var $target = $($form.attr('data-target'));
		console.log($target);
		var $mov = $($form.attr('data-mov'));
		$action = siteUrl+module+'/insertItem';
		if ($mov > 0) $action = siteUrl+module+'/updateItem';
		console.log($action);
		alert($action);
		$.ajax({
			type: "POST",
			url: $target,
         data: $form.serialize(),
         dataType: 'html'
         })
			.done(function(html) {					
				//$('#myModal').modal('hide');
				if (html > 0) {
					var dialog = bootbox.alert({
    					message: messages['Errore! Movimento NON inserito!'],
    					backdrop: true	
						});
					} else {
						var dialog = bootbox.alert({
    						message: messages['movimento inserito o modificato!'],	
    						backdrop: true
							});
						}
				getMovimenti();
				})
			.fail(function() {
 			 		alert("Ajax failed to fetch data")
				})
			});
	
	
	}); // end document
	
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
	
	
function getMovimenti() {	
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/listItem',
		type: "POST",
		data: {'id_invoice':idinvoice},
		dataType: 'html'
		})
		.done(function(html) {
			$('#listamovimentiID').html(html);
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch data")
			})
	}
	
function deleteMov(id) {
	bootbox.confirm(messages['Sei sicuro?'],function(confirmed) {
		if (confirmed) {
			$.ajax({
				url: siteUrl+module+'/deleteItem',
				type: "POST",
				data: {'id':id},
				dataType: 'html'
			})
			.done(function(html) {
				$('#myModal').modal('hide');
				if (html > 0) {
					var dialog = bootbox.alert({
    					message: messages['Errore! Movimento NON cancellato!'],
    					backdrop: true	
						});
					} else {
						var dialog = bootbox.alert({
    						message: messages['movimento cancellato!'],	
    						backdrop: true
							});
						}
				getMovimenti();
			})
  			.fail(function() {
				alert("Ajax failed to fetch data")
				})	        
			} else {
				$('#myModal').modal('hide');
				}
		})
	
	}
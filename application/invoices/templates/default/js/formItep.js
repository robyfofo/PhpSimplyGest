/* invoices/formItep.js v.1.0.0. 29/11/2017 */
var requestSent = false;
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
	
	$('#myModal').on('show.bs.modal', function (event) {  
	  	var button = $(event.relatedTarget) // Button that triggered the modal
	  	var recipient = button.data('whatever') // Extract info from data-* attributes
	  	var mov = button.data('mov');	  	
	  	var modal = $(this)
	 	modal.find('.modal-title').text(messages['aggiungi movimento']);
	 	$('#content_movID').val('');
		$('#quantity_movID').val('');
		$('#price_unity_movID').val('');
		$('#tax_movID').val('');
		$('#price_total_movID').val('');
		$('#price_tax_movID').val('');										
		$('#id_movID').val('0');
	 	if (mov > 0) {
			$.ajax({
				url: siteUrl+module+'/getAjaxItem',
				type: "POST",
				data: {'id':mov},
				dataType: 'json'
				})
				.done(function(data) {		
				$('#content_movID').val(data.content);
				$('#quantity_movID').val(data.quantity);
				$('#price_unity_movID').val(data.price_unity);
				$('#tax_movID').val(data.tax);
				$('#price_total_movID').val(data.price_total);
				$('#price_tax_movID').val(data.price_tax);										
				$('#id_movID').val(data.id);
				modal.find('.modal-title').text(messages['modifica movimento']+' '+mov);
	  			})
	  			.fail(function() {
	 			alert("Ajax failed to fetch data mov")
				}) 		
	 		} else {
	 			$('#deleteMovID').hide();
	 			}	 
	 	
		}); // end function
	
	$("#movimentoFormID").one('submit', function(event) {
		event.preventDefault();
		
 if(!requestSent) {
 		requestSent = true;
		var $form = $(this);
		var $mov = $('#id_movID').val();
		var $target = siteUrl+module+'/insertItem';
	 	if ($mov > 0) $target = siteUrl+module+'/updateItem';
		$.ajax({
			type: "POST",
			url: $target,
	      data: $form.serialize(),
	      dataType: 'html',
	      timeout:3000 //3 second timeout
		})
		.done(function(html) {	
			requestSent = false;				
			/*
			if (html > 0) {
				var dialog = bootbox.alert({
	 					message: messages['Errore! Movimento NON inserito o modificato!'],
	 					backdrop: true	
					});
				} else {
					var dialog = bootbox.alert({
	 						message: messages['movimento inserito o modificato'],	
	 						backdrop: true
						});
					}
			*/
			
			$('#myModal').modal('hide');
			getMovimenti();
			
		})
		.fail(function() {
			alert("Ajax failed to fetch item data")
		})
}
		}); // end function
		
	$('#deleteMovID').one('click',function(event) {
		var $mov = $('#id_movID').val();
		bootbox.confirm(messages['Sei sicuro?'],function($confirmed) {
			if ($confirmed) {
				$.ajax({
					url: siteUrl+module+'/deleteItem',
					type: "POST",
					data: {'id':$mov},
					dataType: 'html',
					timeout:3000 //3 second timeout
				})
				.done(function(html) {
					getMovimenti();
					$('#myModal').modal('hide');
					return false;
					/*
					if (html > 0) {
						/*
						var dialog = bootbox.alert({
	    					message: messages['Errore! Movimento NON cancellato!'],
	    					backdrop: true	
							});
						} else {
							var dialog = bootbox.alert({
	    						message: messages['movimento cancellato'],	    						
	    						backdrop: true
								});
							}
						*/				
				})
	  			.fail(function() {
					alert("Ajax failed to fetch delete data")
					})	
				} else {
					
					}
			});
		}); // end function
		
	$('#quantity_movID').on('change',function(event) {
		 refreshValues();
		}); // end function
		
	$('#price_unity_movID').on('change',function(event) {
		 refreshValues();
		}); // end function
		
	$('#tax_movID').on('change',function(event) {
		 refreshValuesTax();
		}); // end function
	
	}); // end document
	
function getMovimenti() {
var requestSent = false;
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/listAjaxItem',
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'html'
		})
		.done(function(html) {
			$('#listamovimentiID').html(html);
			getTotalsMovimenti();
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch data")
			})
	} // end function
	
function getTotalsMovimenti() {	
	var idinvoice = $('#idID').val();
	console.log('id_invoice '+idinvoice);
	$.ajax({
		url: siteUrl+module+'/getAjaxTotalItem',
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'json'
		})
		.done(function($resdata) {		
			$invoiceMovTotal = parseFloat($resdata.invoiceMovTotal);
			$invoiceTaxTotal = parseFloat($resdata.invoiceTaxTotal);
			$invoiceTotal = parseFloat($resdata.invoiceTotal);			
			$('#invoice_mov_totalID').val($invoiceMovTotal.toFixed(2));
			$('#invoice_tax_totalID').val($invoiceTaxTotal.toFixed(2));
			$('#invoice_totalID').val($invoiceTotal.toFixed(2));
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch total data")
			})
	} // end function
	
function refreshValues() {	
	$qty = parseInt($('#quantity_movID').val());
	$priceUnity = parseFloat($('#price_unity_movID').val());
	$priceTotal = $priceUnity * $qty;	
	$tax = parseInt($('#tax_movID').val());
	$priceTax = ($priceTotal * $tax) / 100;	
	$('#price_unity_movID').val($priceUnity.toFixed(2));
	$('#price_total_movID').val($priceTotal.toFixed(2));
	$('#price_tax_movID').val($priceTax.toFixed(2));
	} // end function
	
function refreshValuesTax() {	
	$tax = parseInt($('#tax_movID').val());
	$priceTax = ($priceTotal * $tax) / 100;
	$('#price_tax_movID').val($priceTax.toFixed(2));
	}; // end function

	
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
	}); // end function
	
$('#movimentoFormID')
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
	}); // end function

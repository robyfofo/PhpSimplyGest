/* invoices/formItes.js v.1.0.0. 09/02/2018 */
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
	
	getArticles();	
	
	$('#myModal').on('show.bs.modal', function (event) {  
	  	var button = $(event.relatedTarget) // Button that triggered the modal
	  	var recipient = button.data('whatever') // Extract info from data-* attributes
	  	var $art = button.data('art');
	  	var modal = $(this)
	 	modal.find('.modal-title').text(messages['inserisci articolo']);
	 	$('#contentArtID').val(messages['inserisci testo articolo']);
		$('#quantityArtID').val('');
		$('#priceUnityArtID').val('');
		$('#taxArtID').val('');
		$('#priceTotalArtID').val('');
		$('#priceTaxArtID').val('');										
		$('#idArtID').val('0');
		$('#totalArtID').val('');		
	 	if ($art > 0) {
			$.ajax({
				url: siteUrl+module+'/getAjaxItas',
				async: "true",
				cache: "false",
				type: "POST",
				data: {'id':$art},
				dataType: 'json'
				})
			.done(function(data) {	
				$('#contentArtID').val(data.content);
				$('#quantityArtID').val(data.quantity);
				$('#priceUnityArtID').val(data.price_unity);
				$('#taxArtID').val(data.tax);
				$('#priceTotalArtID').val(data.price_total);
				$('#priceTaxArtID').val(data.price_tax);	
				var $totalArt = parseFloat(data.price_total) + parseFloat(data.price_tax);	
				$('#totalArtID').val($totalArt.toFixed(2).replace('.',','));										
				$('#idArtID').val(data.id);
				modal.find('.modal-title').text(messages['modifica articolo']+' '+$art);
				modal.find('#submitFormID').text(messages['modifica']);
  				})
  			.fail(function() {
 				alert("Ajax failed to fetch data article for module");
				}) 		
	 		}
		}); // end function
	
	$("#articleFormID").one('submit', function(event) {
		if (!requestSent) {
			requestSent = true;
			var $form = $(this);
			var $art = $('#idArtID').val();
			var $target = siteUrl+module+'/insertItas';
		 	if ($art > 0) $target = siteUrl+module+'/updateItas';
			$.ajax({
				type: "POST",
				url: $target,
				async: "true",
				cache: "false",
		      data: $form.serialize(),
		      dataType: 'html'
				})
			.done(function(html) {			
				$('#myModal').modal('hide');
				getArticles();	
				requestSent = true;			
				})
			.fail(function() {
				alert("Ajax failed to insert/update article data");
				})
			}
		}); // end function


	$('#priceUnityArtID').on('change',function(event) {
		 refreshValues();
		}); // end function
	$('#quantityArtID').on('change',function(event) {
		 refreshValues();
		}); // end function		
	$('#taxArtID').on('change',function(event) {
		 refreshValuesTax();
		}); // end function
		
		
	$('#priceUnityArtID').on('click focusin', function() {
		this.value = '';
		});			
	$('#quantityArtID').on('click focusin', function() {
		this.value = '';
		});		
	$('#taxArtID').on('click focusin', function() {
		this.value = '';
		});
	
	}); // end document
	
function deleteArticle() {
	$('.deleteart').on('click',function() {
		var $art = $(this).data("art");
		bootbox.confirm(messages['Sei sicuro?'],function($confirmed) {
			if ($confirmed) {
				$.ajax({
						url: siteUrl+module+'/deleteItas',
						async: "true",
						cache: "false",
						type: "POST",
						data: {'id':$art},
						dataType: 'html'
						})
					.done(function(html) {
						getArticles();
						$('#myModal').modal('hide');
						return false;
						})
	  				.fail(function() {
						alert("Ajax failed to delete article data");
						})	
				}
			});
			
		}); // end function
	} // end function
	
function getArticles() {
	var requestSent = false;
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/listAjaxItas',
		async: "true",
		cache: "false",
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'html'
		})
		.done(function(html) {
			$('#listarticlesID').html(html);
			getTotalsArticles();
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch list of articles data");
			})
	} // end function
	
function getTotalsArticles() {	
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/getAjaxTotalItas',
		async: "true",
		cache: "false",
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'json'
		})
		.done(function($resdata) {		
			$invoiceArtTotal = parseFloat($resdata.invoiceArtTotal);
			$invoiceTaxTotal = parseFloat($resdata.invoiceTaxTotal);
			$invoiceRivalsa = parseFloat($resdata.invoiceRivalsa);
			$invoiceTotal = parseFloat($resdata.invoiceTotal);	
			$('#invoiceArtTotalID').html('€ '+$invoiceArtTotal.toFixed(2).replace('.',','));
			$('#invoiceTaxTotalID').html('€ '+$invoiceTaxTotal.toFixed(2).replace('.',','));
			$('#invoiceRivalsaID').html('€ '+$invoiceRivalsa.toFixed(2).replace('.',','));
			$('#invoiceTotalID').html('€ '+$invoiceTotal.toFixed(2).replace('.',','));
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch total articles data");
			})
	} // end function
	
function refreshValues() {	
	$priceUnityArt = parseFloat($('#priceUnityArtID').val());
	$qtyArt = parseInt($('#quantityArtID').val());
	$priceTotalArt = $priceUnityArt * $qtyArt;	
	$taxArt = parseInt($('#taxArtID').val());
	$priceTaxArt = ($priceTotalArt * $taxArt) / 100;
	$totalArt = $priceTotalArt + $priceTaxArt;	
	$('#priceUnityArtID').val($priceUnityArt.toFixed(2));
	$('#priceTotalArtID').val($priceTotalArt.toFixed(2));
	$('#priceTaxArtID').val($priceTaxArt.toFixed(2));
	$('#totalArtID').val($totalArt.toFixed(2));
	} // end function
	
function refreshValuesTax() {	
	$priceTotalArt = parseInt($('#priceTotalArtID').val());
	$taxArt = parseInt($('#taxArtID').val());
	$priceTaxArt = ($priceTotalArt * $taxArt) / 100;
	$totalArt = $priceTotalArt + $priceTaxArt;
	$('#priceTaxArtID').val($priceTaxArt.toFixed(2));
	$('#totalArtID').val($totalArt.toFixed(2));
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
	
$('#articleFormID')
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

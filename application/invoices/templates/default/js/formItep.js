/* invoices/formItep.js v.1.0.0. 09/02/2018 */
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
		$('#priceArtID').val('0.00');
		$('#taxArtID').val(defTax);
		$('#totalArtID').val('0.00');									
		$('#idArtID').val('0');
	 	if ($art > 0) {
			$.ajax({
				url: siteUrl+module+'/getAjaxItap',
				type: "POST",
				data: {'id':$art},
				dataType: 'json'
				})
			.done(function(data) {		
				$('#contentArtID').val(data.content);
				$('#priceArtID').val(data.price_unity);
				$('#taxArtID').val(data.tax);
				$('#totalArtID').val(data.price_total);								
				$('#idArtID').val(data.id);
				modal.find('.modal-title').text(messages['modifica articolo']+' '+$art);
				modal.find('#submitFormID').text(messages['modifica']);
				requestSent = false;
	  			})
	  		.fail(function() {
	 			alert("Ajax failed to fetch data article for module");
				}) 		
	 		}
		}); // end function
	
	$("#articleFormID").one('submit', function(event) {	
		if (requestSent == false) {
			requestSent = true;
			var $form = $(this);
			var $art = $('#idArtID').val();
			var $target = siteUrl+module+'/insertItap';
			if ($art > 0) $target = siteUrl+module+'/updateItap';
			$.ajax({
				type: "POST",
				url: $target,
				data: $form.serialize(),
				dataType: 'html'
				})
			.done(function(html) {
				$('#myModal').modal('hide');
				getArticles();
				requestSent = false;		
				})
			.fail(function() {
				alert("Ajax failed to insert/update article data");
				})
			}
		}); // end function
		
	$('#totalArtID').on('change',function(event) {
		 refreshValuesTax();
		}); // end function
		
	$('#priceArtID').on('change',function(event) {
		 refreshValues();
		}); // end function
		
	$('#taxArtID').on('change',function(event) {
		 refreshValues();
		}); // end function
		
	$('#totalArtID').on('click focusin', function() {
		this.value = '';
		});
		
	$('#priceArtID').on('click focusin', function() {
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
						url: siteUrl+module+'/deleteItap',
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
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/listAjaxItap',
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'html'
		})
		.done(function(html) {
			$('#listarticlesID').html(html);
			getTotalsArticles();
			deleteArticle();
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch list of articles data");
			})
	} // end function
setTimeout(getArticles, 2000);
	
function getTotalsArticles() {	
	var idinvoice = $('#idID').val();
	$.ajax({
		url: siteUrl+module+'/getAjaxTotalItap',
		type: "POST",
		data: {'id':idinvoice},
		dataType: 'json'
		})
		.done(function($resdata) {		
			$invoiceArtTotal = parseFloat($resdata.invoiceArtTotal);
			$invoiceTaxTotal = parseFloat($resdata.invoiceTaxTotal);
			$invoiceTotal = parseFloat($resdata.invoiceTotal);			
			$('#invoiceArtTotalID').html($invoiceArtTotal.toFixed(2));
			$('#invoiceTaxTotalID').html($invoiceTaxTotal.toFixed(2));
			$('#invoiceTotalID').html($invoiceTotal.toFixed(2));
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch total articles data");
			})
	} // end function
	
function refreshValues() {	
	$price = parseFloat($('#priceArtID').val());	
	$tax = parseInt($('#taxArtID').val());
	$priceTax = ($price * $tax) / 100;	
	$total = $price + $priceTax;
	$('#priceArtID').val($price.toFixed(2));
	$('#taxArtID').val($tax);
	$('#totalArtID').val($total.toFixed(2));
	} // end function
	
function refreshValuesTax() {	
	$total = parseFloat($('#totalArtID').val());	
	$tax = parseInt($('#taxArtID').val());
	$taxfactor = 100 + $tax;
	$price = ($total * 100) / $taxfactor;	
	$('#priceArtID').val($price.toFixed(2));
	$('#taxArtID').val($tax);
	$('#totalArtID').val($total.toFixed(2));
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
	
$('#articleFormID').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

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

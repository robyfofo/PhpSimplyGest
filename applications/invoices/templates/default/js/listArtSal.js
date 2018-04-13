/* invoices/listArtSal.js v.1.0.0. 09/04/2018 */

$('#price_unityID').on('keyup',function(event) {
	refreshValuesFromPrice();
	}); // end function
	
$('#quantityID').on('keyup',function(event) {
	refreshValuesFromQuantity();
	}); // end function

$('#totalID').on('keyup',function(event) {
	refreshValuesTax();
	}); // end function
	

	
$('#taxID').on('keyup',function(event) {
	refreshValuesFromTax();
	}); // end function
	
$('#price_unityID').on('change',function(event) {
	$price_unity = $('#price_unityID').val();
	$price_unity = parseFloat($price_unity);
	
	$('#price_unityID').val($price_unity.toFixed(2));
	}); // end function

function refreshValuesFromPrice() {	
	$price_unity = $('#price_unityID').val();
	$quantity = $('#quantityID').val();
	$tax = $('#taxID').val();
	if ($price_unity == 'NaN') $price_unity = '0.00';
	if ($quantity == 'NaN') $quantity = '1';
	if ($tax == 'NaN') $tax ='0';
	$price_unity = parseFloat($price_unity);
	$tax = parseInt($tax);
	$quantity = parseInt($quantity);	
	$price_total = $price_unity * $quantity;
	$price_tax = ($price_total * $tax) / 100;
	$total = $price_total + $price_tax;
	
	$('#price_totalID').val($price_total.toFixed(2));
	$('#price_taxID').val($price_tax.toFixed(2));
	$('#totalID').val($total.toFixed(2));
	} // end func
	
function refreshValuesFromQuantity() {	
	$price_unity = $('#price_unityID').val();
	$quantity = $('#quantityID').val();
	$tax = $('#taxID').val();
	if ($price_unity == 'NaN') $price_unity = '0.00';
	if ($quantity == 'NaN') $quantity = '1';
	if ($tax == 'NaN') $tax ='0';
	$price_unity = parseFloat($price_unity);
	$tax = parseInt($tax);
	$quantity = parseInt($quantity);
	$price_total = $price_unity * $quantity;
	$price_tax = ($price_total * $tax) / 100;	
	$total = $price_total + $price_tax;
	$('#price_totalID').val($price_total.toFixed(2));
	$('#price_taxID').val($price_tax.toFixed(2));
	$('#totalID').val($total.toFixed(2));
	} // end func
	
function refreshValuesFromTax() {
	$price_total = $('#price_totalID').val();
	if ($price_total == 'NaN') $price_total = '0.00';
	$price_total = parseFloat($price_total);	
	
	$tax = $('#taxID').val();
	if ($tax == 'NaN') $tax = '0';
	$tax = parseInt($tax);
		
	$price_tax = ($price_total * $tax) / 100;
	$total = parseFloat($price_total + $price_tax);
	
	$('#price_taxID').val($price_tax.toFixed(2));
	$('#totalID').val($total.toFixed(2));
	} // end function
	
$('.modifyArtSal').on('click',function(event) {
		var $id = $(this).data("id");	
		//alert($id);
		if ($id > 0) {
			$.ajax({
				url: siteUrl+CoreRequestAction+'/getArticleAjaxArtSal',
				async: "true",
				cache: "false",
				type: "POST",
				data: {'id':$id},
				dataType: 'json'
				})
			.done(function(data) {	
				$('#id_articleID').val($id);
				$('#contentID').val(data.content);
				$('#quantityID').val(data.quantity);
				$('#price_unityID').val(data.price_unity);
				$('#taxID').val(data.tax);
				$('#price_totalID').val(data.price_total);
				$('#price_taxID').val(data.price_tax);	
				var $total = parseFloat(data.price_total) + parseFloat(data.price_tax);	
				$('#totalID').val($total.toFixed(2).replace('.',','));										
				
				var $url = siteUrl+CoreRequestAction+'/updateArtSal';
				$('#articleFormID').prop('action',$url);
				$('#articlePanelID').prop('class','panel panel-warning');
				$('#articlePanelTitleID').html(messages['modifica articolo']);
				$('#submitFormID').html(messages['modifica']);
				$('#submitFormID').prop('class','btn btn-warning btn-sm');
				})
			.fail(function() {
				alert("Ajax failed to fetch data article for module");
				})
	 		}		
		}); // end function
		
$('#resetFormID').on('click',function(event) {
	$('#id_articleID').val(0);
	var $url = siteUrl+CoreRequestAction+'/insertArtSal';
	$('#articleFormID').prop('action',$url);
	$('#articlePanelID').prop('class','panel panel-primary');
	$('#articlePanelTitleID').html(messages['inserisci articolo']);
	$('#submitFormID').html(messages['aggiungi']);
	$('#submitFormID').prop('class','btn btn-primary btn-sm');
	}); // end function
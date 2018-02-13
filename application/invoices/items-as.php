<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items-as.php v.1.0.0. 08/02/2018
*/

switch(Core::$request->method) {
	case 'deleteItas':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['itas'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				}
			}
		echo Core::$resultOp->error;	
		die();
	break;
	
	case 'insertItas':	
		if ($_POST) {
			$new_post['id'] = $_POST['idArt'];
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['contentArt'];
			$new_post['price_unity'] = $_POST['priceUnityArt'];
			$new_post['price_tax'] = $_POST['priceTaxArt'];
			$new_post['price_total'] = $_POST['priceTotalArt'];
			$new_post['quantity'] = $_POST['quantityArt'];
			$new_post['tax'] = $_POST['taxArt'];
			$new_post = $Module->calculateArt($new_post);
			$_POST = array();	
			$_POST = $new_post;	
			Form::parsePostByFields($App->params->fields['itas'],$_lang,array());				
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['itas'],$App->params->tables['itas']);
				} else {
					Core::$resultOp->error = 1;
					}	
			} else {
				Core::$resultOp->error = 1;
				}			
		echo Core::$resultOp->error;
		if (Core::$resultOp->error== 1) echo Core::$resultOp->message;
		die();
	break;
	
	case 'updateItas':
		if (isset($_POST)) {	
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['contentArt'];
			$new_post['price_unity'] = $_POST['priceUnityArt'];
			$new_post['price_tax'] = $_POST['priceTaxArt'];
			$new_post['price_total'] = $_POST['priceTotalArt'];
			$new_post['quantity'] = $_POST['quantityArt'];
			$new_post['tax'] = $_POST['taxArt'];
			$new_post['id'] = $_POST['idArt'];
			$new_post['active'] = 1;
			$new_post = $Module->calculateArt($new_post);
			$_POST = array();	
			$_POST = $new_post;
			Form::parsePostByFields($App->params->fields['itas'],$_lang,array());	
			if (Core::$resultOp->error == 0) {
				Sql::updateRawlyPost($App->params->fields['itas'],$App->params->tables['itas'],'id',$new_post['id']);	
				} else {
					Core::$resultOp->error = 1;
					}
			} else {
				Core::$resultOp->error = 1;
				}
		echo Core::$resultOp->error;
		if (Core::$resultOp->error== 1) echo Core::$resultOp->message;
		die();
	break;
	
	case 'getAjaxItas':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['itas'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;
	
	case 'getAjaxTotalItas':
		$obj = new stdClass;
		$invoice = new stdClass;
		$values = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			/* preleva dati fattura */
			Sql::initQuery($App->params->tables['ites'],array('*'),array($App->id),'id = ?');
			$invoice = Sql::getRecord();
			if (Core::$resultOp->error == 1) break;
			/* calcola totali */
			Sql::initQuery($App->params->tables['itas'],array('SUM(price_total) AS total','SUM(price_tax) AS total_tax'),array($id),' id_invoice = ? ');
			$obj = Sql::getRecord();
			if (Core::$resultOp->error == 1) break;
			$totalArticles = 0;
			if (isset($obj->total)) {
				$totalArticles = (float)$obj->total;
				}
			$totalTaxArticles = 0;
			if (isset($obj->total_tax)) {
				$totalTaxArticles  = (float)$obj->total_tax;
				}
			/* calcola tassa aggiuntiva */
			$invoiceTotalTax = 0;
			if ($invoice->tax > 0) $invoiceTotalTax = ($totalArticles * $invoice->tax) / 100;						
			/* calcola rivalsa */
			$invoiceTotalRivalsa = 0;
			if ($invoice->rivalsa > 0) $invoiceTotalRivalsa = ($totalArticles * $invoice->rivalsa) / 100;	
			
			
			$values->invoiceArtTotal = (float)$totalArticles;
			$values->invoiceTaxTotal = (float)$totalTaxArticles + $invoiceTotalTax;
			$values->invoiceRivalsa = (float)$invoiceTotalRivalsa;
			$values->invoiceTotal = (float)$totalArticles + $totalTaxArticles + $invoiceTotalTax + $invoiceTotalRivalsa;
			
			$json = json_encode($values);
			echo $json;
		
			}
		
		die();	
	break;
	
	case 'listAjaxItas':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		$App->items = new stdClass;
		$qryFields[] = '*';
		$qryFieldsValues = array($id,$App->userLoggedData->id);
		$qryFieldsValuesClause = array();
		$clause = 'id_invoice = ? AND id_owner = ?';
		Sql::initQuery($App->params->tables['itas'],$qryFields,$qryFieldsValues,$clause);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();	
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$value->customer = '';
				$arr[] = $value;
				}
			}
		$App->items = $arr;
		$App->templateApp = 'listItas.tpl.php';
		$renderTpl = false;
		$renderAjax = true;
	break;
	}
?>
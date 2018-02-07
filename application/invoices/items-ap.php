<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items-ap.php v.1.0.0. 06/02/2018
*/

switch(Core::$request->method) {
	case 'deleteItap':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['itap'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				}
			}
		echo Core::$resultOp->error;	
		die();
	break;
	
	case 'insertItap':
		//Core::setDebugMode(1);
		if ($_POST) {
			$new_post['id'] = $_POST['idArt'];
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['contentArt'];			
			$new_post['price_unity'] = $_POST['priceArt'];
			$new_post['tax'] = $_POST['taxArt'];
			$new_post['price_total'] = $_POST['totalArt'];			
			$new_post['price_tax'] = ($new_post['price_unity'] * $new_post['tax']) / 100;			
			$new_post['quantity'] = 1;
			$new_post['active'] = 1;
			$_POST = array();	
			$_POST = $new_post;	
			Form::parsePostByFields($App->params->fields['itap'],$_lang,array());				
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['itap'],$App->params->tables['itap']);
				} else {
					Core::$resultOp->error = 1;
					}	
			} else {
				Core::$resultOp->error = 1;
				}			
		echo Core::$resultOp->error;
		//if (Core::$resultOp->error== 1) echo Core::$resultOp->message;
		die();
	break;
	
	case 'updateItap':
		if (isset($_POST)) {	
			$new_post['id'] = $_POST['idArt'];
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['contentArt'];			
			$new_post['price_unity'] = $_POST['priceArt'];
			$new_post['tax'] = $_POST['taxArt'];
			$new_post['price_total'] = $_POST['totalArt'];			
			$new_post['price_tax'] = ($new_post['price_unity'] * $new_post['tax']) / 100;			
			$new_post['quantity'] = 1;
			$new_post['active'] = 1;
			$_POST = array();	
			$_POST = $new_post;
			Form::parsePostByFields($App->params->fields['itap'],$_lang,array());	
			if (Core::$resultOp->error == 0) {
				Sql::updateRawlyPost($App->params->fields['itap'],$App->params->tables['itap'],'id',$new_post['id']);	
				} else {
					Core::$resultOp->error = 1;
					}
			} else {
				Core::$resultOp->error = 1;
				}
		echo Core::$resultOp->error;
		//if (Core::$resultOp->error== 1) echo Core::$resultOp->message;
		die();
	break;
	
	case 'getAjaxItap':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['itap'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;
	
	case 'getAjaxTotalItap':
		$obj = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		//echo 'id: '.$id;
		$values = new stdClass;
		$values->invoiceArtTotal = '0.00';
		$values->invoiceTaxTotal = '0.00';
		$values->invoiceTotal = '0.00';
		$rivalsaInps = 4;
		
		if ($id > 0) {
			Sql::initQuery($App->params->tables['itap'],array('*'),array($id),'id_invoice = ?');
			$obj = Sql::getRecords();
			if (is_array($obj) && count($obj) > 0) {
				foreach ($obj AS $key=>$value) {
					$values->invoiceArtTotal = $values->invoiceArtTotal + ($value->price_unity * $value->quantity);
					$values->invoiceTaxTotal = $values->invoiceTaxTotal + $value->price_tax;
				}
			}
			$values->invoiceTotal = (float)$values->invoiceArtTotal + $values->invoiceTaxTotal;
			}	
		$json = json_encode($values);
		echo $json;
		die();	
	break;
	
	case 'listAjaxItap':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		$App->items = new stdClass;
		$qryFields[] = '*';
		$qryFieldsValues = array($id,$App->userLoggedData->id);
		$qryFieldsValuesClause = array();
		$clause = 'id_invoice = ? AND id_owner = ?';
		Sql::initQuery($App->params->tables['itap'],$qryFields,$qryFieldsValues,$clause);
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
		$App->templateApp = 'listItap.tpl.php';
		$renderTpl = false;
		$renderAjax = true;
	break;
	}
?>
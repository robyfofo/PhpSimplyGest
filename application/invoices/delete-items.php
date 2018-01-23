<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items.php v.1.0.0. 09/11/2017
*/

switch(Core::$request->method) {
	case 'deleteItem':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				}
			}
		echo Core::$resultOp->error;	
		die();
	break;
	
	case 'insertItem':
	
		if ($_POST) {
			$new_post['id'] = $_POST['id_mov'];
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['content_mov'];
			$new_post['price_unity'] = $_POST['price_unity_mov'];
			$new_post['price_tax'] = $_POST['price_tax_mov'];
			$new_post['price_total'] = $_POST['price_total_mov'];
			$new_post['quantity'] = $_POST['quantity_mov'];
			$new_post['tax'] = $_POST['tax_mov'];
			$new_post = $Module->calculateMov($new_post);
			$_POST = array();	
			$_POST = $new_post;	
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());				
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
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
	
	case 'updateItem':
		if (isset($_POST)) {	
			$new_post['id_invoice'] = $_POST['id_invoice'];			
			$new_post['content'] = $_POST['content_mov'];
			$new_post['price_unity'] = $_POST['price_unity_mov'];
			$new_post['price_tax'] = $_POST['price_tax_mov'];
			$new_post['price_total'] = $_POST['price_total_mov'];
			$new_post['quantity'] = $_POST['quantity_mov'];
			$new_post['tax'] = $_POST['tax_mov'];
			$new_post['id'] = $_POST['id_mov'];
			$new_post['active'] = 1;
			$new_post = $Module->calculateMov($new_post);
			$_POST = array();	
			$_POST = $new_post;
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());	
			if (Core::$resultOp->error == 0) {
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$new_post['id']);	
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
	
	case 'getAjaxItem':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['item'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;
	
	case 'getAjaxTotalItem':
		$obj = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		//echo 'id: '.$id;
		$values = new stdClass;
		$values->invoiceMovTotal = '0.00';
		$values->invoiceTaxTotal = '0.00';
		$values->invoiceRivalsa = '0.00';
		$values->invoiceTotal = '0.00';
		$rivalsaInps = 4;
		
		if ($id > 0) {
			Sql::initQuery($App->params->tables['item'],array('*'),array($id),'id_invoice = ?');
			$obj = Sql::getRecords();
			if (is_array($obj) && count($obj) > 0) {
				foreach ($obj AS $key=>$value) {
					$values->invoiceMovTotal = $values->invoiceMovTotal + $value->price_total;
					$values->invoiceTaxTotal = $values->invoiceTaxTotal + $value->price_tax;
				}
			}
			$values->invoiceRivalsa = ($values->invoiceMovTotal * $rivalsaInps) / 100;
			$values->invoiceTotal = (float)$values->invoiceMovTotal + $values->invoiceTaxTotal;
			$values->invoiceTotal = (float)$values->invoiceMovTotal + $values->invoiceRivalsa;
			}	
		$json = json_encode($values);
		echo $json;
		die();	
	break;
	
	case 'listAjaxItem':
		$id = (isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : 0);
		$App->items = new stdClass;
		$qryFields[] = '*';
		$qryFieldsValues = array($id,$App->userLoggedData->id);
		$qryFieldsValuesClause = array();
		$clause = 'id_invoice = ? AND id_owner = ?';
		Sql::initQuery($App->params->tables['item'],$qryFields,$qryFieldsValues,$clause);
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
		$App->templateApp = 'listItem.tpl.php';
		$renderTpl = false;
		$renderAjax = true;
	break;
	}
?>
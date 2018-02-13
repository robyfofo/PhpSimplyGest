<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items-s.php v.1.0.0. 12/02/2018
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->type = 0;

/* GESTIONE CUSTOMERS */
$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1 AND (id_type = 2 OR id_type = 3)');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('surname ASC, name ASC');
$App->customers = Sql::getRecords();

switch(Core::$request->method) {
	case 'activeItes':
	case 'disactiveItes':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['ites'],$App->id,array('labelA'=>$_lang['voce attivata'],'labelD'=>$_lang['voce disattivata']));
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItes':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['ites'],array('id'),array($App->id),'id = ?');
			//Sql::deleteRecord();
			if(Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItes':			
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItes':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['ites'],$_lang,array());			
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['ites'],$App->params->tables['ites']);
					if (Core::$resultOp->error == 0) {							   						   							   				
		   			}
		   		} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array());
	break;

	case 'modifyItes':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItes':
		if ($_POST) {	
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['ites'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {						
					Sql::updateRawlyPost($App->params->fields['ites'],$App->params->tables['ites'],'id',$App->id);
					if (Core::$resultOp->error == 0) {																
						}
					} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}										
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array());		
	break;

	case 'pageItes':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messageItes':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;

	case 'listItes':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->item = new stdClass;	
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->item->rivalsa = $App->company->rivalsa;
		$App->item->tax = 0;			
		$App->item->active = 1;
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['ites']);
		$App->templateApp = 'formItes.tpl.php';
		$App->methodForm = 'insertItes';	
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItes.css" rel="stylesheet">';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItes.js"></script>';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		$App->item->dateins = $App->nowDate;
		Sql::initQuery($App->params->tables['ites'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['ites']);
		$App->templateApp = 'formItes.tpl.php';
		$App->methodForm = 'updateItes';	
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItes.css" rel="stylesheet">';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItes.js"></script>';
	break;

	case 'list':
		$App->items = new stdClass;	
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->subcategories = new stdClass();
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		$qryFields[] = '*';
		$qryFieldsValues = array($App->type,$App->userLoggedData->id);
		$qryFieldsValuesClause = array();
		$clause = 'type = ? AND id_owner = ?';
		$and = " AND ";
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['ites'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .=  $and.'('.$sessClause.')';
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['ites'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);	
		Sql::setOrder('dateins DESC,datesca DESC');	
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();	
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$value->customer = '';
				if ($value->id_customer > 0 && isset($App->customers[$value->id_customer]->name)) $value->customer = $App->customers[$value->id_customer]->ragione_sociale;
				//$field = 'title_'.$_lang['user'];
				//if (isset($value->$field)) $value->title = $value->$field;
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$value->dateinslocal = $data->format($_lang['data format']);
				$data = DateTime::createFromFormat('Y-m-d',$value->datesca);
				$value->datescalocal = $data->format($_lang['data format']);
				
				/* calcola totali */
				Sql::initQuery($App->params->tables['itas'],array('SUM(price_total) AS total','SUM(price_tax) AS total_tax'),array($value->id),' id_invoice = ? ');
				$obj1 = Sql::getRecord();
				$value->total = (float)0.00;
				if (isset($obj1->total)) {
					$value->total = (float)$obj1->total;
					}
				$value->total_tax_articles = (float)0.00;
				if (isset($obj1->total_tax)) {
					$value->total_tax_articles = (float)$obj1->total_tax;
					}
					
				
				/* calcola tassa aggiuntiva */
				$invoiceTotalTax = 0;
				if ($value->tax > 0) $invoiceTotalTax = ($value->total * $value->tax) / 100;
								
				/* calcola rivalsa */
				$invoiceTotalRivalsa = 0;
				if ($value->rivalsa > 0) $invoiceTotalRivalsa = ($value->total * $value->rivalsa) / 100;	
					
				
				$value->totalLabel = '€ '.number_format($value->total,2,',','.');
				$value->totalTaxesLabel = '€ '.number_format($value->total_tax_articles + $invoiceTotalTax + $invoiceTotalRivalsa,2,',','.');
				$value->totalInvoiceLabel = '€ '.number_format($value->total + $invoiceTotalTax + $invoiceTotalRivalsa,2,',','.');
				$arr[] = $value;
				
				
				
				}
			}
		$App->items = $arr;
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listItes.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItes.js"></script>';	
		
	break;
	
	default:
	break;
	}	
?>
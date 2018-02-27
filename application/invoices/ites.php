<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items-s.php v.1.0.0. 24/02/2018
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

	case 'listAjaxItes':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$orderFields = array('id','dateins','datesca','customer','number','note','total','total_tax','total_invoice');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		

		/* search */
		/* aggiunge campi join */
		
		$App->params->fields['itas']['cus.ragione_sociale'] = array('searchTable'=>true,'type'=>'varchar');
		//$App->params->fields['itap']['ite.total'] = array('searchTable'=>true,'type'=>'float');
		$where = 'ite.id_owner';
		$and = ' AND ';
		$fieldsValue = array($App->userLoggedData->id);
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['itas'],'');
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
					}
				if (is_array($fv) && count($fv) > 0) $fieldsValue = array_merge($fieldsValue,$fv);
				
				}
			}
		/* end search */

		$table = $App->params->tables['ites']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['cust']." AS cus  ON (ite.id_customer = cus.id)";
		$table .= " LEFT JOIN ".$App->params->tables['itas']." AS art  ON (ite.id = art.id_invoice)";		
		$fields[] = 'ite.*';
		$fields[] = "cus.ragione_sociale AS customer";
		$fields[] = "SUM(art.price_total) AS total,SUM(art.price_tax) AS total_tax";
		$fields[] = "SUM(art.price_total) + ((SUM(art.price_total) * ite.tax) / 100) + ((SUM(art.price_total) * ite.rivalsa) / 100) AS total_invoice";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array('groupby'=>'ite.id'));
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				/* crea la colonna actions */
				$value->active = 1;
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'Items/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fa fa-'.($value->active == 1 ? 'unlock' : 'lock').'"> </i></a><a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyItes/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItes/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$data1 = DateTime::createFromFormat('Y-m-d',$value->datesca);

					
				
				/* calcola tassa aggiuntiva */
				$invoiceTotalTax = 0;
				if ($value->tax > 0) $invoiceTotalTax = ($value->total * $value->tax) / 100;
								
				/* calcola rivalsa */
				$invoiceTotalRivalsa = 0;
				if ($value->rivalsa > 0) $invoiceTotalRivalsa = ($value->total * $value->rivalsa) / 100;	
					
				
				$value->totalLabel = '€ '.number_format($value->total,2,',','.');
				$value->totalTaxesLabel = '€ '.number_format($value->total_tax + $invoiceTotalTax + $invoiceTotalRivalsa,2,',','.');
				$value->totalInvoiceLabel = '€ '.number_format($value->total + $invoiceTotalTax + $invoiceTotalRivalsa,2,',','.');
				$value->totalInvoiceLabel = '€ '.number_format($value->total_invoice,2,',','.');
								
				$tablefields = array(
					'id'=>$value->id,
					'number'=>$value->number,
					'dateinslocal'=>$data->format($_lang['data format']),
					'datescalocal'=>$data1->format($_lang['data format']),
					'customer'=>$value->customer,
					'note'=>$value->note,
					'total'=>$value->totalLabel,
					'totaltaxes'=>$value->totalTaxesLabel,
					'totalinvoice'=>$value->totalInvoiceLabel,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$totalRows = Sql::getTotalsItems();
		$App->items = $arr;
		$json = array();
		$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = $totalRows;
		$json['recordsFiltered'] = $totalRows;
		$json['data'] = $App->items;	
		echo json_encode($json);
		die();
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
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listItes.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItes.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
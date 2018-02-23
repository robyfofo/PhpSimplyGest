<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/items.php v.1.0.0. 09/02/2018
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->type = 1;

/* GESTIONE CUSTOMERS */
$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1 AND (id_type = 1 OR id_type = 2)');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('surname ASC, name ASC');
$App->customers = Sql::getRecords();		

switch(Core::$request->method) {
	case 'activeItep':
	case 'disactiveItep':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['itep'],$App->id,array('labelA'=>$_lang['voce-p attivata'],'labelD'=>$_lang['voce-p disattivata']));
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItep':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['itep'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if(Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['voce-p cancellata']).'!';
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItep':			
		$App->pageSubTitle = $_lang['inserisci voce-p'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItep':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['itep'],$_lang,array());			
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['itep'],$App->params->tables['itep']);
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

	case 'modifyItep':				
		$App->pageSubTitle = $_lang['modifica voce-p'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItep':
		if ($_POST) {	
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['itep'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {						
					Sql::updateRawlyPost($App->params->fields['itep'],$App->params->tables['itep'],'id',$App->id);
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

	case 'pageItep':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messageItep':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;

	case 'listItep':
		$App->viewMethod = 'list';		
	break;
	
	case 'listAjaxItep':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$orderFields = array('id','dateins','datesca','customer','number','total');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		

		/* search */
		/* aggiunge campi join */
		
		$App->params->fields['itap']['cus.ragione_sociale'] = array('searchTable'=>true,'type'=>'varchar');
		//$App->params->fields['itap']['ite.total'] = array('searchTable'=>true,'type'=>'float');
		$where = 'ite.id_owner';
		$and = ' AND ';
		$fieldsValue = array($App->userLoggedData->id);
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['itap'],'');
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
					}
				if (is_array($fv) && count($fv) > 0) $fieldsValue = array_merge($fieldsValue,$fv);
				
				}
			}
		/* end search */

		$table = $App->params->tables['itep']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['cust']." AS cus  ON (ite.id_customer = cus.id)";
		$table .= " LEFT JOIN ".$App->params->tables['itap']." AS art  ON (ite.id = art.id_invoice)";		
		$fields[] = 'ite.*';
		$fields[] = "cus.ragione_sociale AS customer";
		$fields[] = "SUM(art.price_total) AS total";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array('groupby'=>'ite.id'));
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				/* crea la colonna actions */
				$value->active = 1;
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'Item/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fa fa-'.($value->active == 1 ? 'unlock' : 'lock').'"> </i></a><a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyItem/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItem/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$data1 = DateTime::createFromFormat('Y-m-d',$value->datesca);
								
				$tablefields = array(
					'id'=>$value->id,
					'number'=>$value->number,
					'dateinslocal'=>$data->format($_lang['data format']),
					'datescalocal'=>$data1->format($_lang['data format']),
					'customer'=>$value->customer,
					'total'=>'€ '.$value->total,
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
		$App->item->active = 1;
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['itep']);
		$App->templateApp = 'formItep.tpl.php';
		$App->methodForm = 'insertItep';
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItep.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItep.js"></script>';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		$App->item->dateins = $App->nowDate;
		Sql::initQuery($App->params->tables['itep'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['itep']);
		$App->templateApp = 'formItep.tpl.php';
		$App->methodForm = 'updateItep';	
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItep.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItep.js"></script>';
	break;

	case 'list':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->pageSubTitle = $_lang['lista delle voci-p'];
		$App->templateApp = 'listItep.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItep.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
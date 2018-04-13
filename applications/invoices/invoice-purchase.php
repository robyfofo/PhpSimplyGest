<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/invoice-purchase.php v.1.0.0. 12/04/2018
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
	case 'activeInvPur':
	case 'disactiveInvPur':
		Sql::manageFieldActive(substr(Core::$request->method,0,-6),$App->params->tables['InvPur'],$App->id,array('labelA'=>$_lang['voce-p attivata'],'labelD'=>$_lang['voce-p disattivata']));
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteInvPur':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['InvPur'],array('id'),array($App->id),'id = ?');
			//Sql::deleteRecord();
			if(Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['voce-p cancellata']).'!';
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newInvPur':			
		$App->pageSubTitle = $_lang['inserisci voce-p'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertInvPur':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['InvPur'],$_lang,array());			
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['InvPur'],$App->params->tables['InvPur']);
					if (Core::$resultOp->error == 0) {							   						   							   				
		   			}
		   		} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array('label inserted'=>$_lang['voce-p inserita'],'label insert'=>$_lang['inserisci voce-p']));
	break;

	case 'modifyInvPur':				
		$App->pageSubTitle = $_lang['modifica voce-p'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateInvPur':
		if ($_POST) {	
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['InvPur'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {						
					Sql::updateRawlyPost($App->params->fields['InvPur'],$App->params->tables['InvPur'],'id',$App->id);
					if (Core::$resultOp->error == 0) {																
						}
					} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}										
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array('label modified'=>$_lang['voce-p modificata'],'label modify'=>$_lang['modifica voce-p'],'label insert'=>$_lang['inserisci voce-p']));		
	break;

	case 'messageInvPur':
		Core::$resultOp->error = $App->id;
		if (isset(Core::$request->params[0])) Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;
	
	case 'listAjaxInvPur':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$order = array();
		$orderFields = array('id','dateins','datesca','customer','number','total');	
		/* default da sessione */
		if (isset($_MY_SESSION_VARS[$App->sessionName]['order']) && $_MY_SESSION_VARS[$App->sessionName]['order'] != '') {
			$order[] = $_MY_SESSION_VARS[$App->sessionName]['order'];
			}
		
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {	
			$order = array();	
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			/* salva in sessione */
			if (is_array($order) && count($order) > 0) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'order',implode(',',$order));
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

		$table = $App->params->tables['InvPur']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['cust']." AS cus  ON (ite.id_customer = cus.id)";
		$table .= " LEFT JOIN ".$App->params->tables['ArtPur']." AS art  ON (ite.id = art.id_invoice)";		
		$fields[] = 'ite.*';
		$fields[] = "cus.ragione_sociale AS customer";
		$fields[] = "SUM(art.price_total) AS total";
		$fields[] = "SUM(art.price_tax) AS total_tax";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array('groupby'=>'ite.id'));
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				/* crea la colonna actions */
				$articles = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/listArtPur/'.$value->id.'" title="'.ucfirst($_lang['gestisci']).' '.$_lang['articoli'].'"><i class="fa fa-tags"> </i></a>';
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'InvPur/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce-p'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fa fa-'.($value->active == 1 ? 'unlock' : 'lock').'"> </i></a><a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyInvPur/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce-p'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteInvPur/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce-p'].'"><i class="fa fa-cut"> </i></a>';
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$data1 = DateTime::createFromFormat('Y-m-d',$value->datesca);
						
				$value->totalLabel = '€ '.number_format($value->total + $value->total_tax,2,',','.');
						
				$tablefields = array(
					'id'=>$value->id,
					'number'=>$value->number,
					'dateinslocal'=>$data->format($_lang['data format']),
					'datescalocal'=>$data1->format($_lang['data format']),
					'customer'=>$value->customer,
					'total'=>$value->totalLabel,
					'articles'=>$articles,
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
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['InvPur']);
		$App->templateApp = 'formInvPur.tpl.php';
		$App->methodForm = 'insertInvPur';
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formInvPur.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formInvPur.js"></script>';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		$App->item->dateins = $App->nowDate;
		Sql::initQuery($App->params->tables['InvPur'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['itep']);
		
		$App->item_articles = new stdClass;
		$qryFields = array("*");
		$qryFieldsValues = array($App->id);
		$clause = 'id_invoice = ?';
		Sql::initQuery($App->params->tables['ArtPur'],$qryFields,$qryFieldsValues,$clause);
		Sql::setResultPaged(false);
		Sql::setOrder('id ASC');
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();	
		/* sistemo dati */	
		$tot_price_total = 0;
		$tot_price_tax = 0;
		$tot_total = 0;
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$value->total = $value->price_total + $value->price_tax;
				$value->price_unity_label = '€ '.number_format($value->price_unity,2,',','.');
				$value->price_total_label = '€ '.number_format($value->price_total,2,',','.');
				$value->price_tax_label = '€ '.number_format($value->price_tax,2,',','.');
				$value->total_label = '€ '.number_format($value->total,2,',','.');
				
				$tot_price_total += $value->price_total;
				$tot_price_tax += $value->price_tax;
				$tot_total += $value->total;
		
				$arr[] = $value;
				}
			}
		$App->item_articles = $arr;
		
		$App->item->art_tot_price_total_label = '€ '.number_format($tot_price_total,2,',','.');
		$App->item->art_tot_price_tax_label = '€ '.number_format($tot_price_tax,2,',','.');
		$App->item->art_tot_total_label = '€ '.number_format($tot_total,2,',','.');

		$App->templateApp = 'formInvPur.tpl.php';
		$App->methodForm = 'updateInvPur';	
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formInvPur.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formInvPur.js"></script>';
	break;

	case 'list':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->pageSubTitle = $_lang['lista delle voci-p'];
		$App->templateApp = 'listInvPur.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listInvPur.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * timecard/pitems.php v.1.0.0. 24/07/2018
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


switch(Core::$request->method) {
	case 'activePite':
	case 'disactivePite':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['pite'],$App->id,$opt=array('labelA'=>$_lang['voce'].' '.$_lang['attivata'],'labelD'=>$_lang['voce'].' '.$_lang['disattivata']));
		$App->viewMethod = 'list';
	break;
	
	case 'deletePite':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['pite'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% cancellata'])).'!';
					}
				
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newPite':
		$App->pageSubTitle =preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%']);
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertPite':
		if ($_POST) {
			if (Core::$resultOp->error == 0) {				
				/* parsa i post in base ai campi */
				Form::parsePostByFields($App->params->fields['pite'],$_lang,array());
				if (Core::$resultOp->error == 0) {						
					/* controlla l'intervallo */
					$datatimeisoini = $App->nowDate .' '.$_POST['starttime'];
					$datatimeisoend = $App->nowDate .' '.$_POST['endtime'];				
					DateFormat::checkDateTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,'>');
					if (Core::$resultOp->error == 0) {
						$dteStart = new DateTime($datatimeisoini);
						$dteEnd   = new DateTime($datatimeisoend); 
						$dteDiff  = $dteStart->diff($dteEnd);
						$_POST['worktime'] = $dteDiff->format("%H:%I");
						} else {
      					Core::$resultOp->message = $_lang['La ora inizio deve essere prima della ora fine!'];	 
							}					
					if (Core::$resultOp->error == 0) {
						Sql::insertRawlyPost($App->params->fields['pite'],$App->params->tables['pite']);
						if (Core::$resultOp->error == 0) {
		   				}			   			
		   			}			   		
					}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,array('label inserted'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% inserita']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));				
	break;

	case 'modifyPite':				
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']);
		$App->viewMethod = 'formMod';
	break;
	
	case 'updatePite':
		if ($_POST) {			
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['pite'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				/* controlla l'intervallo */
				$datatimeisoini = $App->nowDate .' '.$_POST['starttime'];
				$datatimeisoend = $App->nowDate .' '.$_POST['endtime'];				
				DateFormat::checkDateTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,'>');
				if (Core::$resultOp->error == 0) {						
					$dteStart = new DateTime($datatimeisoini);
					$dteEnd   = new DateTime($datatimeisoend); 
					$dteDiff  = $dteStart->diff($dteEnd);
					$_POST['worktime'] = $dteDiff->format("%H:%I");
					} else {
      				Core::$resultOp->message = $_lang['La ora inizio deve essere prima della ora fine!'];	 
						}
				if (Core::$resultOp->error == 0) {		
					Sql::updateRawlyPost($App->params->fields['pite'],$App->params->tables['pite'],'id',$App->id);
					if(Core::$resultOp->error == 0) {
				   	}				   					
					}			
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,array('label done'=>$_lang['modifiche effettuate'],'label modified'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% modificata']),'label modify'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));	
	break;	
		
	case 'pagePite':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messagePite':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;
	
	case 'listAjaxPite':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);
		
		/* limit */		
		$limit = '';
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	
			
		/* orders */
		$orderFields = array('id','title','content','starttime','endtime','worktime');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		
			
		/* search */
		/* aggiunge campi join */
		$where = 'id_user = ?';
		$and = ' AND ';
		$fieldsValue = array($App->userLoggedData->id);
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['item'],'');
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
					}
				if (is_array($fv) && count($fv) > 0) $fieldsValue = array_merge($fieldsValue,$fv);
				
				}
			}
		/* end search */
		
		$table = $App->params->tables['pite']." AS ite";
		$fields[] = "*";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'Pite/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fa fa-'.($value->active == 1 ? 'unlock' : 'lock').'"> </i></a><a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyPite/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deletePite/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$tablefields = array(
					'id'=>$value->id,
					'title'=>$value->title,
					'content'=>$value->content,
					'starttime'=>$value->starttime,
					'endtime'=>$value->endtime,
					'worktime'=>$value->worktime,
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

	case 'listPite':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i');	
		
		$App->item = new stdClass;
		$App->item->active = 1;
		$App->item->id_contact = 0;
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['pite']);
		$App->templateApp = 'formPite.tpl.php';
		$App->methodForm = 'insertPite';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formPite.js"></script>';
	break;
	
	case 'formMod':
		if ($App->id) {		
			$App->item = new stdClass;
			Sql::initQuery($App->params->tables['pite'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();		
			if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['pite']);
			
			$App->timeIniTimecard = $App->item->starttime;
			$App->timeEndTimecard = $App->item->endtime;
	
			$App->templateApp = 'formPite.tpl.php';
			$App->methodForm = 'updatePite';	
			$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formPite.js"></script>';
			} else {
				ToolsStrings::redirect(URL_SITE.'error/404');
				}
	break;

	case 'list':
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i');	
				
		$App->items = new stdClass;			
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);				
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['pite'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .= $sessClause;
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['pite'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci custom'];
		$App->templateApp = 'listPite.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listPite.js"></script>';
	break;	
	
	default:
	break;
	}	
?>
<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * projects/items.php v.1.0.0. 28/09/2018
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->id_cat = 0;

/* GESTIONE CUSTOMERS */
$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1 AND (id_type = 2 OR id_type = 3)');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('ragione_sociale ASC');
$App->customers = Sql::getRecords();

switch(Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,$opt=array('labelA'=>$_lang['voce'].' '.$_lang['attivato'],'labelD'=>$_lang['voce'].' '.$_lang['disattivato']));
		$App->viewMethod = 'list';
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				/* cancella le timecard con il progetto associato */
				Sql::initQuery($App->params->tables['time'],array('id'),array($App->id),'id_project = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					/* cancella i todo con il progetto associato */
					Sql::initQuery($App->params->tables['todo'],array('id'),array($App->id),'id_project = ?');
					Sql::deleteRecord();
					if (Core::$resultOp->error == 0) {
						Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% cancellato'])).'!';
						}						
					}	
				}		
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'currentItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
			Sql::updateRecord();
			if (Core::$resultOp->error == 0) {
				Sql::initQuery($App->params->tables['item'],array('current'),array('1',$App->id),'id = ?');
				Sql::updateRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['voce corrente']).'!';		
					}
				}
			}
		$App->viewMethod = 'list';	
	break;
	
	case 'timecardItem':
		if ($App->id > 0) {
			Sql::switchFieldOnOff($App->params->tables['item'],'timecard','id',$App->id,array('labelOn'=>ucfirst(preg_replace('/%ITEM%/',$_lang['timecard'],$_lang['%ITEM% attivata'])).'!','labelOff'=>ucfirst(preg_replace('/%ITEM%/',$_lang['timecard'],$_lang['%ITEM% disattivata'])).'!'));
			}		
		$App->viewMethod = 'list';	
	break;
	
	case 'newItem':
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%']);
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				/* se current uguale 1 azzerra tutti gli altri */
				if ($_POST['current'] == 1) {
					Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
					Sql::updateRecord();
					}						
				if (Core::$resultOp->error == 0) {
					Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
					if (Core::$resultOp->error == 0) {
			   		}			   		
			   	}
			   	
				}				
			} else {
				Core::$resultOp->error = 1;
				}
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,array('label inserted'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% inserito']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));				
	break;

	case 'modifyItem':				
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']);
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {	
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				/* se current uguale 1 azzerra tutti gli altri */
				if ($_POST['current'] == 1) {
					Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
					Sql::updateRecord();
					}						
				if (Core::$resultOp->error == 0) {
					Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
					if(Core::$resultOp->error == 0) {
				   	}					
					}					
				}
			} else {	
				Core::$resultOp->error = 1;
				}	
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,array('label done'=>$_lang['modifiche effettuate'],'label modified'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% modificato']),'label modify'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));	
	break;
	
	case 'pageItem':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messageItem':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;
	
	case 'listAjaxItem':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);
		
		/* limit */		
		$limit = '';
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	
			
		/* orders */
		$orderFields = array('id','title','status','completato');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		
			
		/* SEARCH QUERY */
			
		$where = '';
		$and = '';
		$fieldsValue = array();
				
		/* permissions query */
		list($permClause,$fieldsValuesPermClause) = Permissions::getSqlQueryItemPermissionForUser($App->userLoggedData);
		if (isset($permClause) && $permClause != '') {
			$where .= $and.'('.$permClause.')';
			$and = ' AND ';
			}
		if (is_array($fieldsValuesPermClause) && count($fieldsValuesPermClause) > 0) {
			$fieldsValue = array_merge($fieldsValue,$fieldsValuesPermClause);	
			}
		/* end permissions items */
		
<<<<<<< HEAD
		$filtering = false;		
=======
		
		
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				/* field query */				
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['item'],'');
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
<<<<<<< HEAD
					if (is_array($fv) && count($fv) > 0) {
						$fieldsValue = array_merge($fieldsValue,$fv);
						$filtering = true;
						}
=======
					if (is_array($fv) && count($fv) > 0) $fieldsValue = array_merge($fieldsValue,$fv);
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
					}
								
				/* field array query */
				$fields = array('item.status');
				list($w,$fv) = Sql::getClauseVarsFromArray($_REQUEST['search']['value'],$fields,array());
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
<<<<<<< HEAD
					if (is_array($fv) && count($fv) > 0) {
						$fieldsValue = array_merge($fieldsValue,$fv);
						$filtering = true;
						}
=======
					if (is_array($fv) && count($fv) > 0) $fieldsValue = array_merge($fieldsValue,$fv);
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
					}
				
				}
			}
		/* END SEARCH QUERY */
		
		//echo $where;
		//print_r($fieldsValue);
		
<<<<<<< HEAD
		/* conta tutti i records */
		$recordsTotal = Sql::countRecordQry($App->params->tables['item'],'id','',array());
=======
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
		
		$table = $App->params->tables['item']." AS item";
		$fields[] = "item.*";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'Item/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fa fa-'.($value->active == 1 ? 'unlock' : 'lock').'"> </i></a><a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyItem/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItem/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$timecards = '<button type="button" href="'.URL_SITE.Core::$request->action.'/getTimecardsProjectAjax/'.$value->id.'" data-remote="false" data-target="#myModal" data-toggle="modal" title="'.ucfirst($_lang['mostra tempo lavorato al progetto']).'" class="btn btn-default btn-circle"><i class="fa fa-clock-o"> </i></button>';											
				$options = '<a class="btn '.($value->timecard == 1 ? 'btn-info' : 'btn-warning').' btn-circle" href="'.URL_SITE.Core::$request->action.'/timecardItem/'.$value->id.'" title="'.($value->timecard == 1 ? ucfirst($_lang['non associa timecard']) : ucfirst($_lang['associa timecard'])).'"><i class="fa fa-'.($value->timecard == 1 ? 'clock-o' : 'ban').'"> </i></a>&nbsp;<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/currentItem/'.$value->id.'" title="'.($value->current == 1 ? ucfirst($_lang['imposta come non corrente']) : ucfirst($_lang['imposta come corrente'])).'"><i class="fa fa-'.($value->current == 1 ? 'star' : 'star-o').'"> </i></a>';

				$tablefields = array(
					'id'=>$value->id,
					'title'=>$value->title,
					'status'=>'(<small>'.$value->status.'</small>) '.ucfirst(isset($_lang[$App->params->status[$value->status]]) ? $_lang[$App->params->status[$value->status]] : $App->params->status[$value->status]),
					'completato'=>$value->completato.' %',
					'times'=>$timecards,
					'opts'=>$options,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$App->items = $arr;
		$recordsFiltered = $recordsTotal;
		if ($filtering == true) $recordsFiltered = count($App->items);
		$json = array();
		//$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = $recordsTotal;
		$json['recordsFiltered'] = $recordsFiltered;	
		$json['data'] = $App->items;	
		echo json_encode($json);
		die();
	break;

	case 'listItem':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->read_write_access = 2;
		$App->item = new stdClass;		
		$App->item->active = 1;
		$App->item->id_contact = 0;
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;
	
	case 'formMod':
		$App->read_write_access = Permissions::checkReadWriteAccessOfItem($App->params->tables['item'],$App->id,$App->userLoggedData); // 0 = no access; 1 = read; 2 = read write; 
		if ($App->id) {
			$App->item_todo = new stdClass;
			/* preleva i todo del progetto */
			Sql::initQuery($App->params->tables['todo'],array('*'),array($App->id),'active = 1 AND id_project = ?');
			$obj = Sql::getRecords();
			/* sistemo dati */		
			$arr = array();
			if (is_array($obj) && count($obj) > 0) {
				foreach ($obj AS $key=>$value) {
					$s = $App->params->statusTodo[$value->status];
					$value->statusLabel = (isset($_lang[$App->params->statusTodo[$value->status]]) ? $_lang[$App->params->statusTodo[$value->status]] : $App->params->statusTodo[$value->status]);
					$arr[] = $value;
					}
				}
			$App->item_todo = $arr;
			$App->item = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();	
			if (isset($App->item->id) && $App->item->id > 0) {
				if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
				$App->templateApp = 'formItem.tpl.php';
				$App->methodForm = 'updateItem';
				$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
				} else {
					ToolsStrings::redirect(URL_SITE.'error/404');
					}
			} else {
				ToolsStrings::redirect(URL_SITE.'error/404');
				}
	break;

	case 'list':
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['voci'],$_lang['lista dei %ITEMS%']);
		$App->templateApp = 'listItem.tpl.php';			
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItem.js"></script>';	
	break;	
	
	default:
	break;
	}	
?>
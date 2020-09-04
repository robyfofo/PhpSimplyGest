<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * todo/items.php v.1.2.0. 21/12/2019
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->id_cat = 0;


switch(Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,array('label'=>$_lang['voce'],'attivata'=>$_lang['attivato'],'disattivata'=>$_lang['disattivato']));
		$_SESSION['message'] = '0|'.Core::$resultOp->message;
		ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listItem');	
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% cancellato'])).'!';
					}
				
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItem':
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%']);
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {
			if (!isset($_POST['id_owner'])) $_POST['id_owner'] = $App->userLoggedData->id;
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
				if (Core::$resultOp->error == 0) {
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
			if (!isset($_POST['id_owner'])) $_POST['id_owner'] = $App->userLoggedData->id;
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {				
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				if(Core::$resultOp->error == 0) {
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
		//print_r($App->params->status);
		
		/* limit */		
		$limit = '';
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
		}				
		/* end limit */	
			
		/* orders */
		$orderFields = array('id','title','project','status');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
			}
		}
		/* end orders */		
		
		/* SEARCH QUERY */			
		$whereAll = '';
		$andAll = '';
		$fieldsValueAll = array();
		$where = '';
		$and = '';
		$fieldsValue = array();
		
		/* permissions query */
		list($permClause,$fieldsValuesPermClause) = Permissions::getSqlQueryItemPermissionForUser($App->userLoggedData,array('fieldprefix'=>'i.','onlyuser'=>false));
		if (isset($permClause) && $permClause != '') {
			$whereAll .= $andAll.'('.$permClause.')';
			$andAll = ' AND ';
			$where .= $and.'('.$permClause.')';
			$and = ' AND ';
		}
		if (is_array($fieldsValuesPermClause) && count($fieldsValuesPermClause) > 0) {
			$fieldsValueAll = array_merge($fieldsValueAll,$fieldsValuesPermClause);
			$fieldsValue = array_merge($fieldsValue,$fieldsValuesPermClause);	
		}
		/* end permissions items */


		/* SEARCH QUERY */
		/* aggiunge campi join */
		$whereFields = array(
			'project'=>array('field'=>'p.title','type'=>'datafield'),
			'status'=>array('field'=>'i.status','type'=>'datalabelint'));
						$wf = array();
		$wfv = array();
		$fieldsValue = array($App->userLoggedData->id);
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['item'],'',array('tableAlias'=>'i'));
				//list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['item'],''); 
				if ($w != '') {
					$wf[] = $w;
					$wfv = $fv;
				}
									
				/* aggiungi query join */				
				if (is_array($whereFields) && count($whereFields) > 0) {	
					$wf1 = array();
					$wfv1 = array();
					$valueFV = array();
					$valueF = '';
					foreach ($whereFields AS $keyqw=>$valueqw) {	
						
						switch($valueqw['type']) {							
							case 'datalabelint':
								$keys = preg_grep( '/'.$_REQUEST['search']['value'].'/', $App->params->status );
								//print_r($keys);
								if (is_array($keys) && count($keys) > 0) {
									$f = array();
									$fv = array();
									foreach ($keys AS $keyk=>$valuek) {
										$f[] = $valueqw['field'].' = ?';
										$fv[] = $keyk;
									}								
								}							
								if (is_array($f) && count($f) > 0) $valueF .= ' OR '.implode(' OR ',$f);
								if (is_array($fv) && count($fv) > 0) $valueFV = array_merge($valueFV,$fv);						
							break;
							
							default;			 					
								$valueF  .= ' OR '.$valueqw['field'].' LIKE ?';
								$fv = array('%a'.$_REQUEST['search']['value'].'%');
								$valueFV = array_merge($valueFV,$fv);							
							break;							
						}						
						
					}
						
					$wf1[] = $valueF;
					$wfv1 = $valueFV;
						
					if (is_array($wf1) && count($wf1) > 0) $wf = array_merge($wf,$wf1);
					if (is_array($wfv1) && count($wfv1) > 0) $wfv = array_merge($wfv,$wfv1);
				}
					

				/* aggiunge query ricerca */				
				if (is_array($wf) && count($wf) > 0) {	
					$where .= $and."(".implode('',$wf).")";
					$and = ' AND ';
					}
				/* aggiunge i valori ricerca */
				if (is_array($wfv) && count($wfv) > 0) $fieldsValue = array_merge($fieldsValue,$wfv);				
				}				
			}
		/* end search */	
		//echo $where;
		//print_r($fieldsValue);
				
		$table = $App->params->tables['item']." AS i LEFT JOIN ".$App->params->tables['prog']." AS p ON (i.id_project = p.id)";
		$fields[] = "i.*";
		$fields[] = 'p.title AS project';
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$actions = '<a class="btn btn-default btn-sm" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 1 ? 'disactive' : 'active').'Item/'.$value->id.'" title="'.($value->active == 1 ? ucfirst($_lang['disattiva']).' '.$_lang['la voce'] : ucfirst($_lang['attiva']).' '.$_lang['la voce']).'"><i class="fas fa-'.($value->active == 1 ? 'unlock' : 'lock').'"></i></a><a class="btn btn-default btn-sm" href="'.URL_SITE.Core::$request->action.'/modifyItem/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="far fa-edit"></i></a><a class="btn btn-default btn-sm confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItem/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="far fa-trash-alt"></i></a>';
				$tablefields = array(
					'id'=>$value->id,
					'project'=>$value->project,
					'title'=>$value->title,
					'statuslabel'=>(isset($_lang[$App->params->status[$value->status]]) ? $_lang[$App->params->status[$value->status]] : $App->params->status[$value->status]),
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$totalRows = Sql::getTotalsItems();
		$App->items = $arr;
		//print_r($App->items);
		$json = array();
		//$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = $totalRows;
		$json['recordsFiltered'] = $totalRows;
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
		$App->item = new stdClass;		
		$App->item->active = 1;
		if (isset($App->currentProject->id)) $App->item->id_project = $App->currentProject->id;
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.html';
		$App->methodForm = 'insertItem';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';	
	break;
	
	case 'formMod':
		if ($App->id) {
			$App->item = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();		
			if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
			$App->templateApp = 'formItem.html';
			$App->methodForm = 'updateItem';
			$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';	
		} else {
			ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listItem');
		}	
	break;

	case 'list':
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['voci'],$_lang['lista dei %ITEMS%']);
		$App->templateApp = 'listItems.html';			
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItems.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
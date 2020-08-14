<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * thirdparty/items.php v.1.2.0. 13/08/2020
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
if (isset($_POST['categories_id']) && isset($_MY_SESSION_VARS[$App->sessionName]['categories_id']) && $_MY_SESSION_VARS[$App->sessionName]['categories_id'] != $_POST['categories_id']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'categories_id',$_POST['categories_id']);

/* preleva i tipi */
Sql::initQuery($App->params->tables['type'],array('*'),array(),'active = 1','');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
$App->types = Sql::getRecords();


switch(Core::$request->method) {
	case 'getItemAjaxItem';
		if ($App->id > 0) {
			$obj = $Module->getUserdataAjax($App->id);
			 if (isset($obj->id)) echo json_encode($obj);			
		}
		die();
	break;
	
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
			// parsa i post in base ai campi
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
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;		   					
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {							
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				if (Core::$resultOp->error == 0) {																
					}
				}										
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,array('label done'=>$_lang['modifiche effettuate'],'label modified'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% modificato']),'label modify'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));	
	break;
	
	case 'checkUserAjaxItem':
		$count = $Module->checkUsernameAjax($_POST['id'],$_POST['username']);
		if ($count > 0) {
			echo '<span style="color:red;">'.ucfirst(preg_replace('/%USERNAME%/',$_POST['username'],$_lang['username <strong>%USERNAME%</strong> risulta già presente nel nostro database'])).'!</span>';
			} else {
				echo '<span style="color:green;">'.ucfirst(preg_replace('/%USERNAME%/',$_POST['username'],$_lang['username <strong>%USERNAME%</strong> è libero'])).'!</span>';
				}
		$renderTpl = false;
		die();
	break;
	
	case 'checkEmailAjaxItem':
		$count = $Module->checkEmailAjax($_POST['id'],$_POST['email']);
		if($count > 0) {
			echo '<span style="color:red;">'.ucfirst(preg_replace('/%EMAIL%/',$_POST['email'],$_lang['indirizzo <strong>%EMAIL%</strong> risulta già presente nel nostro database'])).'!</span>';
			} else {
				echo '<span style="color:green;">'.ucfirst(preg_replace('/%EMAIL%/',$_POST['email'],$_lang['indirizzo <strong>%EMAIL%</strong> è libero'])).'!</span>';
				}
		$renderTpl = false;
		die();
	break;

	case 'renderAvatarDBItem':
		list($img,$imgInfo) = $Module->renderAvatarData($App->id);
		echo $img;
		$renderTpl = false;
		die();
	break;

	case 'pageItem':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'listAjaxItem':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);
		
		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	
			
		/* orders */
		$orderFields = array('id','type','ragione_sociale','email');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		
			
		/* search */
		/* aggiunge campi join */
		$App->params->fields['item']['t.title'] = array('searchTable'=>true,'type'=>'int');
		$App->params->fields['item']['sca.title'] = array('searchTable'=>true,'type'=>'varchar');
		$where = '';
		$and = '';
		$fieldsValue = array();
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
		
		$table = $App->params->tables['item']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['type']." AS t ON (ite.id_type = t.id)";
		$table .= " LEFT JOIN ".$App->params->tables['cate']." AS cate ON (ite.categories_id = cate.id)";
		$fields[] = "ite.*";
		$fields[] = "t.title AS type";
		$fields[] = "cate.title AS category";
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();

		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$actions = '<a class="btn btn-default btn-sm" href="'.URL_SITE.Core::$request->action.'/'.($value->active == 0 ? 'active' : 'disactive').'Item/'.$value->id.'" title="'.($value->active == 0 ? ucfirst($_lang['attiva']).' '.$_lang['la voce'] : ucfirst($_lang['disattiva']).' '.$_lang['la voce']).'"><i class="fas fa-'.($value->active == 1 ? 'unlock' : 'lock').'"></i></a><a class="btn btn-default btn-sm" href="'.URL_SITE.Core::$request->action.'/modifyItem/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="far fa-edit"></i></a><a class="btn btn-default btn-sm confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItem/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-trash-alt"></i></a>';
				$tablefields = array(
					'id'=>$value->id,
					'category'=>$value->category,
					'type'=>$value->id_type.' - '.$value->type,
					'ragione_sociale'=>$value->ragione_sociale,
					'email'=>$value->email,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$totalRows = count($arr);
		$App->items = $arr;
		$json = array();
		$json['draw'] = intval($_REQUEST['draw']);
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
		
		// select per categories
		$App->categories = new stdClass();		
		$opt = array(
		'tableCat'			=>	$App->params->tables['cate'],
		'tableItems'		=> $App->params->tables['item'],
		'lang'				=> $_lang['user']
		);
		$App->categories = Subcategories::getObjFromSubCategories($opt);
					
		$App->item->active = 1;
		$App->item->stampa_quantita = 1;
		$App->item->stampa_unita = 1;

		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.html';
		$App->methodForm = 'insertItem';	
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;
	
	case 'formMod':
		if ($App->id) {
			$App->item = new stdClass;
		
			// select per categories */
			$App->categories = new stdClass();		
			$opt = array(
			'tableCat'			=>	$App->params->tables['cate'],
			'tableItems'		=> $App->params->tables['item'],
			'lang'				=> $_lang['user']
			);
			$App->categories = Subcategories::getObjFromSubCategories($opt);

			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();
			if (isset($App->item->id) && $App->item->id > 0) {
				if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
				$App->templateApp = 'formItem.html';
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
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['voci'],$_lang['lista delle %ITEMS%']);
		$App->templateApp = 'listItems.html';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItems.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
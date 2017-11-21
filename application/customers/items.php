<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * customers/items.php v.1.0.0. 02/11/2017
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
if (isset($_POST['id_cat']) && isset($_MY_SESSION_VARS[$App->sessionName]['id_cat']) && $_MY_SESSION_VARS[$App->sessionName]['id_cat'] != $_POST['id_cat']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_cat',$_POST['id_cat']);

switch(Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,$_lang);
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if(Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItem':			
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {	
	   	/* cerca i campi richiesti */
			Form::checkRequirePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {					
				/* parsa i post in base ai campi */
				Form::parsePostByFields($App->params->fields['item'],$_lang,array());					
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
					if (Core::$resultOp->error == 0) {							   						   							   				
		   			}
					}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array());
	break;

	case 'modifyItem':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;		   		
			/* cerca i campi richiesti */
			Form::checkRequirePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {							
				/* parsa i post in base ai campi */ 	
				Form::parsePostByFields($App->params->fields['item'],$_lang,array());
				if (Core::$resultOp->error == 0) {							
					Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
					if (Core::$resultOp->error == 0) {																
						}
					}
				}										
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array());		
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

	case 'messageItem':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
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
		$App->subcategories = new stdClass();
		/* select per subcategories */
		$opt = array('tableCat'=>$App->params->tables['scat'],'type'=>0,'multilanguage'=>0,'ordering'=>0,'languages'=>$globalSettings['languages'],'lang'=>$_lang['user']);
		$App->subcategories = Categories::getObjFromSubCategories($opt);				
		$App->item->active = 1;
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		$App->subcategories = new stdClass();		
		/* select per subcategories */
		$opt = array('tableCat'=>$App->params->tables['scat'],'type'=>0,'multilanguage'=>0,'ordering'=>0,'hideId'=>1,'hideSons'=>1,'rifId'=>'id','rifIdValue'=>$App->id,'lang'=>$_lang['user']);
		$App->subcategories = Categories::getObjFromSubCategories($opt);				
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;

	case 'list':
		$App->item = new stdClass;	
		$App->subcategories = new stdClass();
		/* select per subcategories */
		$opt = array('tableCat'=>$App->params->tables['scat'],'type'=>0,'multilanguage'=>0,'ordering'=>0,'languages'=>$globalSettings['languages'],'lang'=>$_lang['user']);
		$App->subcategories = Categories::getObjFromSubCategories($opt);									
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		$qryFields = array('ite.*','sca.title AS category');
		
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		$and = "";
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['item'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .=  $and.'('.$sessClause.')';
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['item']." AS ite LEFT JOIN ".$App->params->tables['scat']." AS sca ON (ite.id_cat = sca.id)",$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listItem.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItem.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
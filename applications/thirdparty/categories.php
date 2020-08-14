<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * thirdparty/subcategories.php v.1.2.0. 13/08/2020
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

switch(Core::$request->method) {
	
	case 'activeCate':
	case 'disactiveCate':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['cate'],$App->id,$opt=array('labelA'=>$_lang['categoria'].' '.$_lang['attivata'],'labelD'=>$_lang['categoria'].' '.$_lang['disattivata']));
		$App->viewMethod = 'list';
	break;

	case 'deleteCate':		
		if ($App->id > 0) {
			$delete = true;
			/* controlla se ha figli */
			if (Sql::countRecordQry($App->params->tables['cate'],'id','parent = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 1;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora figli associati!'];
				$delete = false;	
				}
			
			/* controlla se ha associati */
			if (Sql::countRecordQry($App->params->tables['item'],'id','id_cat = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 1;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora voci associate!'];
				$delete = false;	
				}
			
			
			
			if ($delete == true && Core::$resultOp->error == 0) {	
				Sql::initQuery($App->params->tables['cate'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['%ITEM% cancellata'])).'!';
					}
				}				
			}		
		$App->viewMethod = 'list';	
	break;

	case 'newCate':
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['inserisci %ITEM%']);
		$App->viewMethod = 'formNew';
	break;
	
	case 'insertCate':
		if ($_POST) {
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['cate'],$_lang,array());
			if (Core::$resultOp->error == 0) {	
				Sql::insertRawlyPost($App->params->fields['cate'],$App->params->tables['cate']);
				$App->id = Sql::getLastInsertedIdVar();
				if (Core::$resultOp->error == 0) {
					$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	
					}
				}				
			} else {					
				Core::$resultOp->error = 1;
				}				
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,array('label inserted'=>preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['%ITEM% inserita']),'label insert'=>preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['inserisci %ITEM%'])));				
	break;
	
	case 'modifyCate':	
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['modifica %ITEM%']);
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateCate':
		if ($_POST) {
			$App->itemOld = new stdClass;			
			/* preleva dati vecchio */
			Sql::initQuery($App->params->tables['cate'],array('*'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			if (Core::$resultOp->error == 0) {	
				/* parsa i post in base ai campi */ 	
				Form::parsePostByFields($App->params->fields['cate'],$_lang,array());
				if (Core::$resultOp->error == 0) {	
					Sql::updateRawlyPost($App->params->fields['cate'],$App->params->tables['cate'],'id',$App->id);
					if (Core::$resultOp->error == 0) {				
						/* sistema i parent se ne è stata selezionato uno diverso */
						//if ($_POST['parent'] != $_POST['bk_parent']) $Module->manageParentField();											
						}
					}
				}	
			} else {					
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,array('label done'=>$_lang['modifiche effettuate'],'label modified'=>preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['%ITEM% modificata']),'label modify'=>preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['modifica %ITEM%']),'label insert'=>preg_replace('/%ITEM%/',$_lang['categoria'],$_lang['inserisci %ITEM%'])));	
	break;
	
	case 'pageCate':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listCate');
	break;

	case 'messageCate':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;

	case 'listCate':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}

/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->item = new stdClass();
		$App->item->parent = 0;
		$App->item->active = 1;
		$App->item->filenameRequired = false;

		// select per parent
		$App->categories = new stdClass();		
		$opt = array(
		'tableCat'			=>	$App->params->tables['cate'],
		'tableItems'		=> $App->params->tables['item'],
		'lang'				=> $_lang['user']
		);
		$App->categories = Subcategories::getObjFromSubCategories($opt);
				
		if ($Module->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['cate']);
		$App->templateApp = 'formCategory.html';
		$App->methodForm = 'insertCate';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formCategory.js"></script>';

	break;
	
	case 'formMod':	
		$App->item = new stdClass();
				
		// select per parent
		$App->categories = new stdClass();		
		$opt = array(
		'tableCat'			=>	$App->params->tables['cate'],
		'tableItems'		=> $App->params->tables['item'],
		'lang'				=> $_lang['user'],
		'hideId'				=> 1,
		'rifIdValue'		=>	$App->id			
		);
		$App->categories = Subcategories::getObjFromSubCategories($opt);

		Sql::initQuery($App->params->tables['cate'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['cate']);
		$App->templateApp = 'formCategory.html';
		$App->methodForm = 'updateCate';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formCategory.js"></script>';
	break;
	
	case 'list':
	default:
		//Core::setDebugMode(1);
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 10);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		
		$App->renderSub = 1;
		
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			
			$qryFields = array('cat.*');
			$qryFields[] = "(SELECT COUNT(ite.id) FROM ".$App->params->tables['item']." AS ite WHERE ite.categories_id = cat.id) AS items";	
			$qryFieldsValues = array();
			$qryFieldsValuesClause = array();
			$clause = '';
			$and = '';			
			
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['cate'],'');
	
			if (isset($sessClause) && $sessClause != '') $clause .= $and.'('.$sessClause.')';
			if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
				$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
			Sql::initQuery($App->params->tables['cate']." AS cat",$qryFields,$qryFieldsValues,$clause);		
			Sql::setItemsForPage($App->itemsForPage);	
			Sql::setPage($App->page);		
			Sql::setResultPaged(true);
			Sql::setOrder('title '.$App->params->orderTypes['cate']);
			if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
			$App->items = $obj;
			
		} else {
			
			$opt = array('tableItems'=>$App->params->tables['item'],'lang'=>$_lang['user'],'levelString'=>'<i class="fas fa-chevron-right"></i>&nbsp;');
			Subcategories::listMainData($App->params->tables['cate'],$globalSettings['languages'],$opt);
			$App->items = Subcategories::getMainData();
			
			$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.css" rel="stylesheet">';
			$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.cookie/jquery.cookie.js"></script>';
			$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.min.js"></script>';
			//$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.bootstrap4.js"></script>';			
			
		}
		//print_r($App->items);
		
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->paginationTitle = ucfirst($_lang['mostra da %START% a %END% di %ITEM% elementi']);
		$App->paginationTitle = preg_replace('/%START%/',$App->pagination->firstPartItem,$App->paginationTitle);
		$App->paginationTitle = preg_replace('/%END%/',$App->pagination->lastPartItem,$App->paginationTitle);
		$App->paginationTitle = preg_replace('/%ITEM%/',$App->pagination->itemsTotal,$App->paginationTitle);
		
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['categorie'],$_lang['lista delle %ITEMS%']);
		$App->templateApp = 'listCategories.html';
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/listCategories.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listCategories.js" type="text/javascript"></script>';		
	break;
}
?>

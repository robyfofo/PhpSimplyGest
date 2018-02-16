<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * third-party/subcategories.php v.1.0.0. 16/02/2018
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

switch(Core::$request->method) {
	
	case 'activeScat':
	case 'disactiveScat':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['scat'],$App->id,array('labelA'=>$_lang['categoria attivata'],'labelD'=>$_lang['categoria disattivata']));
		$App->viewMethod = 'list';
	break;

	case 'deleteScat':		
		if ($App->id > 0) {
			$delete = true;
			/* controlla se ha figli */
			if (Sql::countRecordQry($App->params->tables['scat'],'id','parent = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 2;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora figli associati!'];
				$delete = false;	
				}
			
			/* controlla se ha associati */
			if (Sql::countRecordQry($App->params->tables['item'],'id','id_cat = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 2;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora voci associate!'];
				$delete = false;	
				}
			
			
			
			if ($delete == true && Core::$resultOp->error == 0) {	
				Sql::initQuery($App->params->tables['scat'],array('id'),array($App->id),'id = ?');
				//Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['categoria cancellata']).'!';		
					}
				}				
			}		
		$App->viewMethod = 'list';	
	break;

	case 'newScat':
		$App->pageSubTitle = $_lang['inserisci categoria'];
		$App->viewMethod = 'formNew';
	break;
	
	case 'insertScat':
		if ($_POST) {
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['scat'],$_lang,array());
			if (Core::$resultOp->error == 0) {	
				Sql::insertRawlyPost($App->params->fields['scat'],$App->params->tables['scat']);
				$App->id = Sql::getLastInsertedIdVar();
				if (Core::$resultOp->error == 0) {
					$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	
					}
				}				
			} else {					
				Core::$resultOp->error = 1;
				}				
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array('label inserted'=>$_lang['categoria inserita'],'label insert'=>$_lang['inserisci categoria']));
	break;
	
	case 'modifyScat':	
		$App->pageSubTitle = $_lang['modifica categoria'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateScat':
		if ($_POST) {
			$App->itemOld = new stdClass;			
			/* preleva dati vecchio */
			Sql::initQuery($App->params->tables['scat'],array('*'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			if (Core::$resultOp->error == 0) {	
				/* parsa i post in base ai campi */ 	
				Form::parsePostByFields($App->params->fields['scat'],$_lang,array());
				if (Core::$resultOp->error == 0) {	
					Sql::updateRawlyPost($App->params->fields['scat'],$App->params->tables['scat'],'id',$App->id);
					if (Core::$resultOp->error == 0) {				
						/* sistema i parent se ne è stata selezionato uno diverso */
						//if ($_POST['parent'] != $_POST['bk_parent']) $Module->manageParentField();											
						}
					}
				}	
			} else {					
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array('label modified'=>$_lang['categoria modificata'],'label modify'=>$_lang['modifica categoria'],'label insert'=>$_lang['inserisci categoria']));	   		
	break;
	
	case 'pageScat':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,Core::$request->action,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messageScat':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;

	case 'listScat':
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
		$App->parents = new stdClass();		
		$App->item->parent = 0;
		$App->item->active = 1;
		$App->item->filenameRequired = false;
		/* select per parent */
		$opt = array('tableCat'=>$App->params->tables['scat'],'type'=>0,'multilanguage'=>0,'ordering'=>0,'languages'=>$globalSettings['languages'],'lang'=>$_lang['user']);
		$App->parents = Categories::getObjFromSubCategories($opt);				
		if ($Module->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['scat']);
		$App->templateApp = 'formScat.tpl.php';
		$App->methodForm = 'insertScat';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formScat.js" type="text/javascript"></script>';

	break;
	
	case 'formMod':	
		$App->item = new stdClass();
		$App->parents = new stdClass();
		/* select per parent */
		$opt = array('tableCat'=>$App->params->tables['scat'],'type'=>0,'multilanguage'=>0,'ordering'=>0,'hideId'=>1,'hideSons'=>1,'rifId'=>'id','rifIdValue'=>$App->id,'lang'=>$_lang['user']);
		$App->parents = Categories::getObjFromSubCategories($opt);		
		Sql::initQuery($App->params->tables['scat'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['scat']);
		$App->templateApp = 'formScat.tpl.php';
		$App->methodForm = 'updateScat';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formScat.js" type="text/javascript"></script>';
	break;
	
	case 'list':
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 10);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		Sql::setItemsForPage($App->itemsForPage);		
		$opt = array('lang'=>$_lang['user'],'tableItems'=>$App->params->tables['item']);
		$Module->listMainData($App->params->fields['scat'],$App->page,$App->itemsForPage,$globalSettings['languages'],$opt);
		$App->items = $Module->getMainData();
		//print_r($App->items);
		$App->pagination = $Module->getPagination();	
		$App->pageSubTitle = $_lang['lista delle categorie'];
		$App->templateApp = 'listScat.tpl.php';
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.css" rel="stylesheet">';
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/listScat.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.cookie/jquery.cookie.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/jquery.treegrid/jquery.treegrid.bootstrap3.js" type="text/javascript"></script>';		
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/listScat.js" type="text/javascript"></script>';		
	default:
	break;
	}
?>

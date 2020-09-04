<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * company/items.php v.1.0.0. 22/11/2017
*/

$App->id = 1;
switch(Core::$request->method) {
	case 'updateItem':
		if ($_POST) {					
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());
			if (Core::$resultOp->error == 0) {							
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				if ( Core::$resultOp->error > 0 ) { ToolsStrings::redirect(URL_SITE.'error/db'); die(); }
				$_SESSION['message'] = '0|'.ucfirst(preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% modificati']));
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/editItem');
				die();				
			} else {
				$_SESSION['message'] = '1|'.implode('<br>', Core::$resultOp->messages);
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/editItem');
				die();
			}										
		} else {
			ToolsStrings::redirect(URL_SITE.'error/404'); die();
		}			
	break;
	default;	
		$App->item = new stdClass;			
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->methodForm = 'updateItem';	
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voci'],$_lang['modifica %ITEM%']);
		$App->viewMethod = 'form';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'form':		
		$App->templateApp = 'formItem.html';		
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;

	default:
	break;
	}	
?>
<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * customers/index.php v.1.0.0. 03/11/2017
*/

//Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/class.module.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
	
switch(substr(Core::$request->method,-4,4)) {
	case 'Scat':
		$App->sessionName .= '-scat';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>'','parent'=>0));
		$Module = new Module(Core::$request->action,$App->params->tables['scat']);
		include_once(PATH.'application/'.Core::$request->action."/subcategories.php");	
	break;		
	default:
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>'','id_cat'=>0));
		$Module = new Module(Core::$request->action,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/items.php");	
	break;
	}
?>
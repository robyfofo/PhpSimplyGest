<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/index.php v.1.0.0. 09/11/2017
*/

//Core::setDebugMode(1);

include_once(PATH.$App->pathApplication.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.$App->pathApplication.Core::$request->action."/config.inc.php");
include_once(PATH.$App->pathApplication.Core::$request->action."/class.module.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
	
switch(substr(Core::$request->method,-4,4)) {
	case 'spdf':
	case 'ppdf':
		$App->sessionName .= '-pdf';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		$Module = new Module(Core::$request->action,'');
		if (file_exists(PATH.'application/'.Core::$request->action."/pdf.php")) include_once(PATH.'application/'.Core::$request->action."/pdf.php");
	break;		
	case 'Ites':
		$App->sessionName .= '-vendite';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		if (isset($App->params->tables['ites'])) $Module = new Module(Core::$request->action,$App->params->tables['ites']);
		if (file_exists(PATH.'application/'.Core::$request->action."/items-s.php")) include_once(PATH.'application/'.Core::$request->action."/items-s.php");
		$App->defaultJavascript = "messages['aggiungi movimento'] = '".addslashes(ucfirst($_lang['aggiungi movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['aggiungi movimento'] = '".addslashes(ucfirst($_lang['aggiungi movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica movimento'] = '".addslashes(ucfirst($_lang['modifica movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['movimento cancellato'] = '".addslashes(ucfirst($_lang['movimento cancellato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Movimento NON cancellato!'] = '".addslashes($_lang['Errore! Movimento NON cancellato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "messages['movimento inserito o modificato'] = '".addslashes(ucfirst($_lang['movimento inserito o modificato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Movimento NON inserito o modificato!'] = '".addslashes($_lang['Errore! Movimento NON inserito o modificato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "var defDateins = '".$App->item->dateins."';".PHP_EOL;
		$App->defaultJavascript .= "var defDatesca = '".$App->item->datesca."';";
		$App->defaultJavascript .= "var module = '".Core::$request->action."';";
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';			
	break;		

	case 'Itep':
		$App->sessionName .= '-acquisti';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		if (isset($App->params->tables['itep'])) $Module = new Module(Core::$request->action,$App->params->tables['itep']);
		if (file_exists(PATH.'application/'.Core::$request->action."/items-p.php")) include_once(PATH.'application/'.Core::$request->action."/items-p.php");
		$App->defaultJavascript = "messages['aggiungi movimento'] = '".addslashes(ucfirst($_lang['aggiungi movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['aggiungi movimento'] = '".addslashes(ucfirst($_lang['aggiungi movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica movimento'] = '".addslashes(ucfirst($_lang['modifica movimento']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['movimento cancellato'] = '".addslashes(ucfirst($_lang['movimento cancellato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Movimento NON cancellato!'] = '".addslashes($_lang['Errore! Movimento NON cancellato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "messages['movimento inserito o modificato'] = '".addslashes(ucfirst($_lang['movimento inserito o modificato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Movimento NON inserito o modificato!'] = '".addslashes($_lang['Errore! Movimento NON inserito o modificato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "var defDateins = '".$App->item->dateins."';".PHP_EOL;
		$App->defaultJavascript .= "var defDatesca = '".$App->item->datesca."';";
		$App->defaultJavascript .= "var module = '".Core::$request->action."';";
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';			
	break;		
	default:
		/* Item */
		$App->sessionName .= '-movimenti';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>'','id_owner'=>''));
		if (isset($App->params->tables['item'])) $Module = new Module(Core::$request->action,$App->params->tables['item']);
		if (file_exists(PATH.'application/'.Core::$request->action."/items.php")) include_once(PATH.'application/'.Core::$request->action."/items.php");
	break;
	}
?>
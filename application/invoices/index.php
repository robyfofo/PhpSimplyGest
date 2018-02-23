<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/index.php v.1.0.0. 20/02/2018
*/

//Core::setDebugMode(1);

include_once(PATH.$App->pathApplication.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.$App->pathApplication.Core::$request->action."/config.inc.php");
include_once(PATH.$App->pathApplication.Core::$request->action."/class.module.php");
$App->includeJscriptPHPTop = Core::$request->action."/templates/".$App->templateUser."/js/script.js.php";

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
	
$App->patchdatapicker = 1;

/* preleva company */
Sql::initQuery($App->params->tables['comp'],array('*'),array(),'id = 1');
$App->company = Sql::getRecord();
if (Core::$resultOp->error > 0) die('Error read company');

switch(substr(Core::$request->method,-4,4)) {
	case 'spdf':
	case 'ppdf':
		$App->sessionName .= '-pdf';
		if (!isset($_MY_SESSION_VARS[$App->sessionName]['page'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		$Module = new Module(Core::$request->action,'');
		if (file_exists(PATH.'application/'.Core::$request->action."/pdf.php")) include_once(PATH.'application/'.Core::$request->action."/pdf.php");
	break;	
	case 'Itap':
		/* Item */
		$App->sessionName .= '-artacquisti';
		if (!isset($_MY_SESSION_VARS[$App->sessionName]['page'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>'','id_owner'=>''));
		if (isset($App->params->tables['itap'])) $Module = new Module(Core::$request->action,$App->params->tables['itap']);
		if (file_exists(PATH.$App->pathApplication.Core::$request->action."/items-ap.php")) include_once(PATH.$App->pathApplication.Core::$request->action."/items-ap.php");		
	break;
	case 'Itas':
		/* Item */
		$App->sessionName .= '-artvendite';
		if (!isset($_MY_SESSION_VARS[$App->sessionName]['page'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>'','id_owner'=>''));
		if (isset($App->params->tables['itas'])) $Module = new Module(Core::$request->action,$App->params->tables['itas']);
		if (file_exists(PATH.$App->pathApplication.Core::$request->action."/items-as.php")) include_once(PATH.'application/'.Core::$request->action."/items-as.php");		
	break;	
	case 'Ites':
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';			
		$App->sessionName .= '-vendite';
		if (!isset($_MY_SESSION_VARS[$App->sessionName]['page'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		if (isset($App->params->tables['ites'])) $Module = new Module(Core::$request->action,$App->params->tables['ites']);
		if (file_exists(PATH.$App->pathApplication.Core::$request->action."/items-s.php")) include_once(PATH.'application/'.Core::$request->action."/items-s.php");
		$App->defaultJavascript = "messages['inserisci articolo'] = '".addslashes(ucfirst($_lang['inserisci articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['inserisci testo articolo'] = '".addslashes(ucfirst($_lang['inserisci testo articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica articolo'] = '".addslashes(ucfirst($_lang['modifica articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica'] = '".addslashes(ucfirst($_lang['modifica']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['articolo cancellato'] = '".addslashes(ucfirst($_lang['articolo cancellato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Articolo NON cancellato!'] = '".addslashes($_lang['Errore! Articolo NON cancellato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "messages['movimento inserito o modificato'] = '".addslashes(ucfirst($_lang['articolo inserito o modificato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Articolo NON inserito o modificato!'] = '".addslashes($_lang['Errore! Articolo NON inserito o modificato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "var defDateins = '".$App->item->dateins."';".PHP_EOL;
		$App->defaultJavascript .= "var defDatesca = '".$App->item->datesca."';";
		$App->defaultJavascript .= "var module = '".Core::$request->action."';";
	break;		

	case 'Itep':
	default:
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';			
		$App->sessionName .= '-acquisti';
		if (!isset($_MY_SESSION_VARS[$App->sessionName]['page'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10','srcTab'=>''));
		if (isset($App->params->tables['itep'])) $Module = new Module(Core::$request->action,$App->params->tables['itep']);
		if (file_exists(PATH.$App->pathApplication.Core::$request->action."/items-p.php")) include_once(PATH.'application/'.Core::$request->action."/items-p.php");
		$App->defaultJavascript = "messages['inserisci articolo'] = '".addslashes(ucfirst($_lang['inserisci articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['inserisci testo articolo'] = '".addslashes(ucfirst($_lang['inserisci testo articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica articolo'] = '".addslashes(ucfirst($_lang['modifica articolo']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['modifica'] = '".addslashes(ucfirst($_lang['modifica']))."';".PHP_EOL;
		$App->defaultJavascript .= "messages['articolo cancellato'] = '".addslashes(ucfirst($_lang['articolo cancellato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Articolo NON cancellato!'] = '".addslashes($_lang['Errore! Articolo NON cancellato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "messages['articolo inserito o modificato'] = '".addslashes(ucfirst($_lang['articolo inserito o modificato']))."!';".PHP_EOL;
		$App->defaultJavascript .= "messages['Errore! Articolo NON inserito o modificato!'] = '".addslashes($_lang['Errore! Articolo NON inserito o modificato!'])."';".PHP_EOL;
		$App->defaultJavascript .= "var defDateins = '".$App->item->dateins."';".PHP_EOL;
		$App->defaultJavascript .= "var defDatesca = '".$App->item->datesca."';";
		$App->defaultJavascript .= "var module = '".Core::$request->action."';";
		$App->defaultJavascript .= "var defTax = '".$App->company->iva."';";
		
		/* aggiorna config con dati company */
		$App->params->fields['itep']['rivalsa']['defValue'] = $App->company->rivalsa;	
	break;
	}
?>
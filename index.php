<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/index.php v.1.0.0. 06/11/2018
*/

ini_set('display_errors',1);

define('PATH','');
define('MAXPATH', str_replace("includes","",dirname(__FILE__)).'');
if(!ini_get('date.timezone')) date_default_timezone_set('GMT');
setlocale(LC_TIME, 'ita', 'it_IT');

include_once(PATH."include/configuration.inc.php");

//Load composer's autoloader
require 'classes/vendor/autoload.php';

include_once(PATH."classes/class.Config.php");
include_once(PATH."classes/class.Core.php");
include_once(PATH."classes/class.Sessions.php");
include_once(PATH."classes/class.Permissions.php");
include_once(PATH."classes/class.ToolsStrings.php");
include_once(PATH."classes/class.SanitizeStrings.php");
include_once(PATH."classes/class.htmLawed.php");
include_once(PATH."classes/class.ToolsUpload.php");
include_once(PATH."classes/class.Sql.php");
include_once(PATH."classes/class.Utilities.php");
include_once(PATH."classes/class.DateFormat.php");
include_once(PATH."classes/class.Categories.php");
include_once(PATH."classes/class.Form.php");
include_once(PATH."classes/class.Mails.php");

$Config = new Config();
Config::setGlobalSettings($globalSettings);
$Core = new Core();

//Sql::setDebugMode(1);

/* avvio sessione */
$my_session = new my_session(SESSIONS_TIME, SESSIONS_GC_TIME,SESSIONS_COOKIE_NAME);
$my_session->my_session_start();
$_MY_SESSION_VARS = array();
$_MY_SESSION_VARS = $my_session->my_session_read();

/* variabili globali */
$App = new stdClass;
define('DB_TABLE_PREFIX',Sql::getTablePrefix());
$App->templateBase = 'site.tpl.php';
$renderTpl = true;
$renderAjax = false;
$App->templateApp = '';

$App->pathApplications = 'applications/';
$App->pathApplicationsCore = 'applications/core/';

$App->mySessionVars = $_MY_SESSION_VARS;
$App->globalSettings = $globalSettings;

$App->breadcrumb = '';
$App->metaTitlePage = SITE_NAME.' v.'.CODE_VERSION;
$App->metaDescriptionPage = $globalSettings['meta tags page']['description'];
$App->metaKeywordsPage = $globalSettings['meta tags page']['keyword'];

/* date sito */
setlocale(LC_TIME, 'ita', 'it_IT');
$App->nowDate = date('Y-m-d');
$App->nowDateTime = date('Y-m-d H:i:s');
$App->nowTime = date('H:i:s');
$App->nowDateIta = date('d/m/Y');
$App->nowDateTimeIta = date('d/m/Y H:i:s');
$App->nowTimeIta = date('H:i:s');

$App->userLoggedData = new stdClass();
/* carica dati utente loggato */	
if (isset($_MY_SESSION_VARS['idUser'])) {	
	Sql::initQuery(DB_TABLE_PREFIX.'users',array('*'),array($_MY_SESSION_VARS['idUser']),'active = 1 AND id = ?','');
	$App->userLoggedData = Sql::getRecord();
	$App->userLoggedData->is_root = intval($App->userLoggedData->is_root);
	}

$App->coreModule = false;
$App->modulesCore = array('login','logout','account','password','profile','nopassword','nousername','error');

/* gestisce la richiesta http parametri get */
$globalSettings['requestoption']['othermodules'] = array_merge(array(),$App->modulesCore);
$globalSettings['requestoption']['defaultaction'] = 'home';
if (isset($App->userLoggedData->is_root) && $App->userLoggedData->is_root == 1) $globalSettings['requestoption']['permissionroot'] = true;
Core::getRequest($globalSettings['requestoption']);
//print_r(Core::$request);

if (!isset($_MY_SESSION_VARS['idUser'])){
	if (Core::$request->action != "nopassword" && Core::$request->action != "nousername") Core::$request->action = 'login';
	}

/* LIVELLI UTENTE */
/* carica i livelli */
$App->user_levels = Permissions::getUserLevels();
if (Core::$resultOp->error == 1) die('Errore db livello utenti!');
if (isset($App->userLoggedData->id_level)) {
	$App->userLoggedData->labelRole = Permissions::getUserLevelLabel($App->user_levels,$App->userLoggedData->id_level,$App->userLoggedData->is_root);
	}
/* LIVELLI UTENTE */

/* gestione template */
$App->templateUser = $globalSettings['requestoption']['defaulttemplate'];

/* elenco delle tabelle nel db */
$App->tablesOfDatabase = Sql::getTablesDatabase($globalSettings['database'][DATABASE]['name']);

/* carica i dati dei moduli */
foreach($globalSettings['module sections'] AS $key=>$value) {
	Sql::initQuery(DB_TABLE_PREFIX.'modules',array('*'),array($key),'active = 1 AND section = ?','ordering ASC');
	$App->modules[$key] = Sql::getRecords();
	if (Core::$resultOp->error == 1) die('Errore db livello utenti!');
	}

/* carica i moduli disponibili per l'utente corrente */
$App->user_modules_active = array();
$App->user_first_module_active = 'home';
if(isset($App->userLoggedData->id_level) && $App->userLoggedData->id_level > 0) {
	$obj = new stdClass();
	Sql::initQuery(DB_TABLE_PREFIX.'levels',array('*'),array($App->userLoggedData->id_level),'active = 1 AND id = ?');
	$obj = Sql::getRecord();	
	$App->user_modules_active = explode(',', $obj->modules);	
	$App->user_first_module_active = $App->user_modules_active[0];
	}
/* integra con i core */
$App->user_modules_active = array_merge($App->user_modules_active, $App->modulesCore);


/* LINGUA */
if ($globalSettings['default language'] != '') {
	if (file_exists(PATH."lang/".$globalSettings['default language'].".inc.php")) {
		include_once(PATH."lang/".$globalSettings['default language'].".inc.php");
		} else {
			include_once(PATH."lang/it.inc.php");
			}
	} else {
		include_once(PATH."lang/it.inc.php");
		}
/* LINGUA */
	
/* INDIRIZZAMENTO */
$pathApplications = $App->pathApplications;
$action = Core::$request->action;
$index = '/index.php';

if (in_array(Core::$request->action,$App->modulesCore) == true) {
	$App->coreModule = true;
	$pathApplications = $App->pathApplicationsCore;
	$action = '';
	$index = Core::$request->action.'.php';
	}
	
/*
echo '<br>$pathApplications: '.$pathApplications;
echo '<br>$action: '.$action;
echo '<br>$index: '.$index;
*/


if (file_exists(PATH."iniapp.php")) include_once(PATH."iniapp.php");

if (file_exists(PATH.$pathApplications.$action.$index)) {
	include_once(PATH.$pathApplications.$action.$index);
	} else {
		Core::$request->action =$App->user_first_module_active;
		include_once(PATH.$pathApplications.$App->user_first_module_active."/index.php");
		}
/* INDIRIZZAMENTO */

if (file_exists(PATH."endapp.php")) include_once(PATH."endapp.php");

if ($App->coreModule == true) {
	$pathtemplateApp = PATH.$pathApplications .= "templates/".$App->templateUser."/";
	} else {
		if ($App->templateApp != '') $App->templateApp = Core::$request->action."/templates/".$App->templateUser."/".$App->templateApp;
		}

$pathtemplateBase = PATH."templates/".$App->templateUser;
$pathtemplateApp = PATH.$pathApplications;

/* genera il template */
if ($renderTpl == true && $App->templateApp != '') {
	
	$arrayVars = array(
		'App'=>$App,
		'Lang'=>$_lang,
		'URLSITE'=>URL_SITE,
		'PATHSITE'=>URL_SITE,
		'UPLOADDIR'=>UPLOAD_DIR,
		'CoreRequest'=>Core::$request,
		'CoreResultOp'=>Core::$resultOp,
		'MySessionVars'=>$_MY_SESSION_VARS,
		'GlobalSettings'=>$globalSettings
		);
	$loader = new Twig_Loader_Filesystem($pathtemplateApp);	
	$loader->addPath($pathtemplateBase,'base');
	$twig = new Twig_Environment($loader, array(
		'autoescape'=>false,
		'debug' => true
		));
	$twig->addExtension(new Twig_Extension_Debug());
	$template = $twig->loadTemplate('@base/'.$App->templateBase);	
	echo $template->render($arrayVars);
	} else { if ($renderAjax != true) echo 'No templateApp found!';}
	
if ($renderAjax == true){
	if (file_exists($pathApplications.$App->templateApp)) {
		include_once($pathApplications.$App->templateApp);	
		}
	}
//print_r($_MY_SESSION_VARS);
?>
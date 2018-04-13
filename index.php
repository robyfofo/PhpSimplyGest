<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/index.php v.1.0.0. 27/02/2018
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
$my_session = new my_session(SESSIONS_TIME, SESSIONS_GC_TIME,AD_SESSIONS_COOKIE_NAME);
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
$App->metaDescriptionPage = 'Gestione proggetti personali e i tempi lavorativi ad assi associati';
$App->metaKeywordsPage = 'progetti, progetto, tempo, lavoro, timecard, note, dafare, preventivo, preventivi, contatti, calendario, ora, inizio, fine';

/* date sito */
setlocale(LC_TIME, 'ita', 'it_IT');
$App->nowDate = date('Y-m-d');
$App->nowDateTime = date('Y-m-d H:i:s');
$App->nowTime = date('H:i:s');
$App->nowDateIta = date('d/m/Y');
$App->nowDateTimeIta = date('d/m/Y H:i:s');
$App->nowTimeIta = date('H:i:s');

$App->coreModule = false;
$App->modulesCore = array('login','logout','account','password','profile','nopassword','nousername');

/* gestisce la richiesta http parametri get */
$globalSettings['requestoption']['othemodules'] = array_merge(array('site-users'),$App->modulesCore);
Core::getRequest($globalSettings['requestoption']);

//print_r(Core::$request);

/* UTENTE */
$App->userLoggedData = new stdClass();

if (!isset($_MY_SESSION_VARS['idUser'])){
	if (Core::$request->action != "nopassword" && Core::$request->action != "nousername") Core::$request->action = 'login';
	} else {
		/* carica dati utente loggato */		
		Sql::initQuery(DB_TABLE_PREFIX.'users',array('*'),array($_MY_SESSION_VARS['idUser']),'active = 1 AND id = ?','');
		$App->userLoggedData = Sql::getRecord();
		$App->userLoggedData->is_root = intval($App->userLoggedData->is_root);
		}	
/* UTENTE */

/* gestione template */
$App->templateUser = Core::$request->templateUser;

/* carica i dati dei moduli */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('*'),array(),'active = 1','ordering ASC');
$App->site_modules = Sql::getRecords();
if (Core::$resultOp->error == 1) die('Errore db moduli!');
$App->first_module_active = 'home';


/* LINGUA */
/* carica la lingua del sito */

if ($globalSettings['defaul language'] != '') {
	if (file_exists(PATH."lang/".$globalSettings['defaul language'].".inc.php")) {
		include_once(PATH."lang/".$globalSettings['defaul language'].".inc.php");
		} else {
			include_once(PATH."lang/it.inc.php");
			}
	} else {
		include_once(PATH."lang/it.inc.php");
		}
/* LINGUA */

/* crea il menu */
$App->rightMenu = '';
$x1 = 0;
foreach($App->site_modules AS $module) {
	$codemenu = $module->code_menu;
	$codemenu = preg_replace('/%URLSITE%/',URL_SITE,$codemenu);
	$codemenu = preg_replace('/%LABEL%/',$module->label,$codemenu);
	$codemenu = preg_replace('/%NAME%/',$module->name,$codemenu);												
	/* se active */
	if (Core::$request->action == $module->name) {
		$codemenu = preg_replace('/%LICLASS%/','active',$codemenu);
		} else {
			$codemenu = preg_replace('/%LICLASS%/','',$codemenu);										
			}
		$App->rightMenu .= $codemenu; 
		$x1++;								
	}			
	

	
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

if (file_exists(PATH.$pathApplications.$action.$index)) {
	include_once(PATH.$pathApplications.$action.$index);
	} else {
		Core::$request->action = $App->first_module_active;
		include_once(PATH.$pathApplications.$App->first_module_active."/index.php");
		}
/* INDIRIZZAMENTO */

/* DIV MESSAGGI SISTEMA */
$App->systemMessages = '';
$appErrors = Utilities::getMessagesCore(Core::$resultOp);
list($show,$error,$type,$content) = $appErrors;
if ($show == true) {
	$App->systemMessages .= '<div class="row"><div id="systemMessageID" class="alert';
	if ($error == 2) $App->systemMessages .= ' alert-warning';
	if ($error == 1) $App->systemMessages .= ' alert-danger';
	if ($error == 0) $App->systemMessages .= ' alert-success';
	$App->systemMessages .= '">'.$content.'</div></div>';
	}
/* DIV MESSAGGI SISTEMA */

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
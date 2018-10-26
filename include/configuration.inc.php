<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * include/configuration.inc.php v.2.0.0. 01/03/2018
*/

/* specifiche altervista */
//$_SERVER['DOCUMENT_ROOT'] = "/membri/phprojekt/";

$servermode = 'locale'; /* insert locale or remote */

$http = 'http://';
if (isset($_SERVER['HTTPS'])) $http = 'https://';

/* SERVER */
$globalSettings['site name'] = "MyProjects";
$globalSettings['code version'] = '1.0.0.';
$globalSettings['folder site'] = 'phprojekt.altervista.org/myprojects/';
$globalSettings['site host'] = '192.168.1.10/';
$globalSettings['server timezone'] = '';

/* DATABASE */
$database = 'remoto';
if ($servermode == 'locale') $database = 'locale'; /* insert your local ip address o localhost for locale testing */
$globalSettings['database'] = array(
	'locale'=>array('user'=>'root','password'=>'fofofofo','host'=>'localhost','name'=>'phprojekt.altervista','tableprefix'=>'tmc_'),
	'remoto'=>array('user'=>'phprojekt','password'=>'robyfofo','host'=>'localhost','name'=>'my_phprojekt','tableprefix'=>'tmc_')
	);

/* COOKIES */
$cookies = 'myprojectsaltervistaID';
if ($servermode == 'locale') $cookies = 'locMyprojectsaltervistaID'; 

/* MAIL */
$globalSettings['default mail'] = 'robymant66@vodafone.it';
$globalSettings['dafault mail label'] = 'Myprojects';
$globalSettings['send mail for debug'] = 1;
$globalSettings['mail for debug'] = 'me@robertomantovani.vr.it';
/* configurazioni server */
$globalSettings['use php mail class'] = 2; /* Use class for email managemant: 0 = no class; 1 = PHP7 Swiftmailer class; 2 = php5.x PHPMAILER class */
/* if use php class */
$globalSettings['mail server'] = 'SMTP'; /* values = 'SMTP' or 'SENDMAIL' */
$globalSettings['sendmail path'] = '/usr/sbin/sendmail -t -i';
$globalSettings['SMTP server'] = 'localhost';
$globalSettings['SMTP port'] = 25;
$globalSettings['SMTP username'] = '';
$globalSettings['SMTP password'] = '';

/* CHIAVE HASH */
$globalSettings['app code key'] = '123456789';

/* LINGUA */
$globalSettings['defaul language'] = 'en'; /* default language */

/* APP */

$globalSettings['site owner'] = 'Roberto Mantovani';
$globalSettings['copyright'] = '&copy; 2017 Roberto Mantovani';
$globalSettings['meta title'] = 'MyProjects';
$globalSettings['meta description'] = 'Myprojects - gestione progetti personali e il tempo lavoro ad essi associato';
$globalSettings['meta keywords'] = 'php, mysql, ammministrazione, sezione, amministrativa, sito, gestione, progetti, timecard, tempo, lavoro';

$globalSettings['type pages'] = array('default'=>'Default','label'=>'Etichetta','url'=>'URL','module'=>'Link a modulo');
$globalSettings['link targets'] = array('_self','_blank','_parent','_top');
$globalSettings['status to do'] = array('n.d.','visto','in lavorazione','sospeso','cancellato','rifiutato','finito');
$globalSettings['status project'] = array('n.d.','preventivato','in lavorazione','sospeso','cancellato','rifiutato','finito');

/* DA NON MODIFICARE */

/* impostationi Request url */
$globalSettings['requestoption'] = array('templateuser'=>array('default'),'managechangeaction'=>0,'defaultaction'=>'');
$globalSettings['module sections'] = array('Gestione Utenti','Moduli Generali Sito','Moduli Personalizzati Sito','Moduli E-Commerce','Impostazioni Sito','Root');
$globalSettings['languages'] = array('it','en');

define('SITE_NAME', $globalSettings['site name']);
define('CODE_VERSION',$globalSettings['code version']);
define('FOLDER_SITE',$globalSettings['folder site']);
define('SITE_HOST', $globalSettings['site host']);
define('TIMEZONE',$globalSettings['server timezone']);

define('DATABASE',$database);

/* HTTP/S */
$http = 'http://';
if (isset($_SERVER['HTTPS'])) $http = 'https://';
define('URL_SITE', $http.SITE_HOST.FOLDER_SITE);
define('URL_SITE_APPLICATION', $http.SITE_HOST.FOLDER_SITE.'application/');
define('TMP_DIR', $http.SITE_HOST.FOLDER_SITE.'tmp/');
define('PATH_DOCUMENT', $_SERVER['DOCUMENT_ROOT'].'/');
define('PATH_SITE', $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER_SITE);
/* PATHS */
define('UPLOAD_DIR', $http.SITE_HOST.FOLDER_SITE.'uploads/');
define('PATH_UPLOAD_DIR', PATH_SITE.'uploads/');

/* SESSIONS */
define('SESSIONS_TABLE_NAME',$globalSettings['database'][$database]['tableprefix'].'sessions');
define('SESSIONS_TIME',86400*10);
define('SESSIONS_GC_TIME',2592000);

/* COOKIES */
define('SESSIONS_COOKIE_NAME',$cookies);
define('AD_SESSIONS_COOKIE_NAME','ad_'.$cookies);
define('DATA_SESSIONS_COOKIE_NAME','data_'.$cookies); 

define('APP_CODE_KEY',$globalSettings['app code key']);

define('SITE_OWNER',$globalSettings['site owner']);
define('COPYRIGHT',$globalSettings['copyright']);
define('META_TITLE', $globalSettings['meta title']);
define('META_DESCRIPTION',$globalSettings['meta description']);
define('META_KEYWORD',$globalSettings['meta keywords']);
?>
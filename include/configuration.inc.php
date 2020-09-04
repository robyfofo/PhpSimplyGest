<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/include/configuration.inc.php v.1.3.0. 24/08/2020
*/

/* specifiche altervista */
//$_SERVER['DOCUMENT_ROOT'] = "/membri/phprojekt/";

$servermode = 'locale'; /* insert locale or remote */

$http = 'http://';
if (isset($_SERVER['HTTPS'])) $http = 'https://';

/* SERVER */
$globalSettings['site name'] = "PhpSimplyGest";
$globalSettings['code version'] = '1.3.0.';
$globalSettings['folder site'] = 'phprojekt.altervista.org/phpsimplygest130/';
$globalSettings['site host'] = '192.168.1.10/';
$globalSettings['server timezone'] = '';

/* DATABASE */
$database = 'remote';
if ($servermode == 'locale') $database = 'locale';
$globalSettings['database'] = array(
	'locale'=>array('user'=>'root','password'=>'fofofofo','host'=>'localhost','name'=>'phprojekt.altervista_phpsimplygest130','tableprefix'=>'psg130_'),
	'remote'=>array('user'=>'phprojekt','password'=>'robyfofo','host'=>'localhost','name'=>'phprojekt.altervista','tableprefix'=>'psg_')
);

$cookies = 'phpsimplygest130ID';
if ($servermode == 'locale') $cookies = 'loc'.$cookies;

/* MAIL */
$globalSettings['default email'] = 'robymant66@vodafone.it';
$globalSettings['default email label'] = 'PhpSimplyGest';
$globalSettings['send email debug'] = 1;
$globalSettings['email debug'] = 'me@robertomantovani.vr.it';
/* configurazioni server */
$globalSettings['use php mail class'] = 2; /* Use class for email managemant: 0 = no class; 1 = PHP7 Swiftmailer class; 2 = php5.x PHPMAILER class */
/* if use php class */
$globalSettings['mail server'] = 'SMTP'; /* values = 'SMTP' or 'SENDMAIL' */
$globalSettings['sendmail path'] = '/usr/sbin/sendmail -t -i';
$globalSettings['SMTP server'] = 'localhost';
$globalSettings['SMTP port'] = 25;
$globalSettings['SMTP username'] = '';
$globalSettings['SMTP password'] = '';

/* GESTIONE TEMA INTERFACCIA */
$globalSettings['default template'] = 'defaul';

/* CHIAVE HASH */
$globalSettings['site code key'] = '123456789';

/* LANGUAGE */
$globalSettings['default language'] = 'it';
$globalSettings['languages'] = array('it','en');

/* UPLOAD */
$globalSettings['image type available'] = array('JPG','PNG','GIF');
$globalSettings['file type available'] = array('DOC','PDF','SQL');

/* APP */
$globalSettings['site owner'] = 'Roberto Mantovani';
$globalSettings['copyright'] = '&copy; 2017 Roberto Mantovani';
$globalSettings['meta tags page'] = array(
	'title ini'=>'',
	'title end'=>'PhpSimplyGest',
	'title separator'=>' | ',
	'description'=>'PhpSimplyGest - semplice gestionale per lavoratori a regime forfettario',
	'keyword'=>'php, mysql, ammministrazione, sezione, amministrativa, sito, gestione, progetti, timecard, tempo, lavoro, modulare'
);

/* DA NON MODIFICARE */

$globalSettings['status to do'] = array('n.d.','visto','in lavorazione','sospeso','cancellato','rifiutato','finito');
$globalSettings['status project'] = array('n.d.','preventivato','in lavorazione','sospeso','cancellato','rifiutato','finito');
$globalSettings['article type'] = array('0'=>'def acquisto e vendita','1'=>'def acquisto','2'=>'def vendita');

/* impostationi Request url */
$globalSettings['requestoption'] = array(
	'defaulttemplate'=>'default',
	'templatesforusers'=>array('default'),
	'managechangeaction'=>0,
	'defaultaction'=>'home',
	'blankaction'=>'home',
	'othermodules' => array()
	);

$globalSettings['module sections'] = array('Moduli Applicativo','Impostazioni','Root');
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
define('DATA_SESSIONS_COOKIE_NAME','data_'.$cookies);

define('SITE_CODE_KEY',$globalSettings['site code key']);

define('SITE_OWNER',$globalSettings['site owner']);
define('COPYRIGHT',$globalSettings['copyright']);
?>

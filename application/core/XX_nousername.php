<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * core/nousername.php v.1.0.1. 02/03/2018
*/

//Core::setDebugMode(1);

$App->pageTitle = $_lang['nousername core - title'];
$App->pageSubTitle = $_lang['nousername core - subtitle'];
$App->templateApp = Core::$request->action.'.tpl.php';
$App->item = new stdClass;
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
$App->templateBase = 'login.tpl.php';

if (isset($_POST['submit'])) {
	if ($_POST['email'] == "") {
			Core::$resultOp->error = 1;
			Core::$resultOp->message = $_lang['Devi inserire un indirizzo email!'];
			} else {
				$email = SanitizeStrings::stripMagic(strip_tags($_POST['email']));
				Core::$resultOp->error = 0;
				}
			
	if (Core::$resultOp->error == 0) {	
		/* legge username dalla email */	
		/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
		Sql::initQuery(DB_TABLE_PREFIX.'users',array('id','username'),array($email),"email = ? AND active = 1");
		$App->item = Sql::getRecord();
		if(Core::$resultOp->error == 0) {		
			if (Sql::getFoundRows() > 0) {
				/* crea l'email */
				$subject = $_lang['nousername core - soggetto email'];
				$subject = preg_replace('/%SITENAME%/',SITE_NAME,$subject);																
				$content = $_lang['nousername core - contenuto email'];
				$content = preg_replace('/%SITENAME%/',SITE_NAME,$content);												
				$content = preg_replace('/%EMAIL%/',$email,$content);												
				$content = preg_replace('/%USERNAME%/',$App->item->username,$content);	
				$text_content = Html2Text\Html2Text::convert($content); // aggiungi il messaggio in formato text										
				//echo $subject;
				//echo $content;		
				$address = $email;
				$opt = array();
				$opt['sendDebug'] = $globalSettings['send mail for debug'];
				$opt['sendDebugEmail'] = $globalSettings['mail for debug'];
				$opt['fromEmail'] = $globalSettings['default mail'];
				$opt['fromLabel'] = $globalSettings['dafault mail label'];
				Mails::sendMail($address,$subject,$content,$text_content,$opt);										
				if (Core::$resultOp->error == 0) {					
					Core::$resultOp->message = $_lang['nousername core - conferma invio email'];
					} else {
						Core::$resultOp->message = $_lang['nousername core - errore invio email'];
						}					
				} else {	
					Core::$resultOp->error = 1;
					Core::$resultOp->message = $_lang['nousername core - errore controllo indirizzo email'];
					}
			}			
		}
	}
//$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationCore.'/templates/'.$App->templateUser.'/js/nousername.js" type="text/javascript"></script>';
?>
<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/nopassword.php v.1.0.0. 28/09/2017
*/

Core::setDebugMode(1);

$App->pageTitle = $_lang['nopassword core - title'];
$App->pageSubTitle = $_lang['nopassword core - subtitle'];
$App->templateApp = Core::$request->action.'.tpl.php';
$App->item = new stdClass;
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

$App->templateBase = 'login.tpl.php';

if (isset($_POST['submit'])) {
	
	if ($_POST['username'] == "") {
		Core::$resultOp->error = 1;
		Core::$resultOp->message = $_lang['Devi inserire un nome utente!'];
		} else {
			$username = SanitizeStrings::stripMagic(strip_tags($_POST['username']));
			}

	if (Core::$resultOp->error == 0) {	
		/* legge username dalla email */
		/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
		Sql::initQuery(DB_TABLE_PREFIX.'users',array('id','username','email'),array($username),"username = ? AND active = 1");
		$App->item = Sql::getRecord();		
		if(Core::$resultOp->error == 0) {
			if (Sql::getFoundRows() > 0) {
				/* crea la nuova password */	
				$passw = ToolsStrings::setNewPassword('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890',8);
				$criptPassw = password_hash($passw, PASSWORD_DEFAULT);			
				/* aggiorno la password nel db */						
				/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
				Sql::initQuery(Sql::getTablePrefix().'users',array('password'),array($criptPassw,$App->item->id),"id = ?");
				Sql::updateRecord();
				if (Core::$resultOp->error == 0) {	
					$subject = $_lang['nopassword core - soggetto email'];
					$subject = preg_replace('/%SITENAME%/',SITE_NAME,$subject);																
					$content = $_lang['nopassword core - contenuto email'];
					$content = preg_replace('/%SITENAME%/',SITE_NAME,$content);												
					$content = preg_replace('/%EMAIL%/',$App->item->email,$content);												
					$content = preg_replace('/%PASSWORD%/',$passw,$content);
					$content = preg_replace('/%USERNAME%/',$App->item->username,$content);
					$text_content = Html2Text\Html2Text::convert($content); // aggiungi il messaggio in formato text	
					//echo $subject;
					//echo $content;			
					$address = $App->item->email;			
					Mails::sendMail($address,$subject,$content,$text_content,array('fromEmail'=>SITE_EMAIL,'fromLabel'=>SITE_EMAIL_LABEL));								
					if (Core::$resultOp->error == 0) {					
						Core::$resultOp->message = $_lang['nopassword core - conferma invio email'];
						} else {
							Core::$resultOp->message = $_lang['nopassword core - errore invio email'];
							}		
					} else { 
						Core::$resultOp->message = $_lang['nopassword core - errore database'];		
						}
										
				}	else {	
					Core::$resultOp->error = 1;
					Core::$resultOp->message = $_lang['nopassword core - errore controllo nome utente'];
					}
			}
		}	
	}
//$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationsCore.'/templates/'.$App->templateUser.'/js/nopassword.js" type="text/javascript"></script>';
?>
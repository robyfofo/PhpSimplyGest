<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * core/login.php v.1.0.0. 13/07/2016
*/

/* variabili ambiente */
$App->pageTitle = ucfirst($_lang['loggati']);
$App->pageSubTitle = ucfirst($_lang['loggati']);
$App->templateApp = Core::$request->action.'.tpl.php';
$App->templateBase = 'login.tpl.php';
$App->coreModule = true;
switch(Core::$request->method) {
	case 'check':
		if (isset($_POST['submit'])) {
			if ($_POST['username'] == "") {
				Core::$resultOp->error = 1;
				Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['nome utente'],$_lang['Devi inserire un %ITEM%!']));
				} else {
					$username = SanitizeStrings::stripMagic(strip_tags($_POST['username']));
					}
			
			if ($_POST['password'] == "") {
				Core::$resultOp->error = 1;
				Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['password'],$_lang['Devi inserire una %ITEM%!']));
				} else { 
					$password = SanitizeStrings::stripMagic(strip_tags($_POST['password']));
					}
			
			if (Core::$resultOp->error == 0) {					
								
				/* guardo se esiste l' username */	
				$App->item = new stdClass;					
				/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
				Sql::initQuery(DB_TABLE_PREFIX.'users',array('id','username','password','is_root','template'),array(),"username = '".$username."' AND active = 1");
				$App->item = Sql::getRecord();			
				if (Core::$resultOp->error == 0) {
					if (Sql::getFoundRows() > 0) {
						$templateUser = $App->item->template;
						if ($templateUser == '') $templateUser = TEMPLATE_DEFAULT;
						if (password_verify($password,$App->item->password)) {
							$userSess = array();
							$userSess['id'] = $App->item->id;							
							$now = date('Y-m-d H:i:s');
							$lastLogin = $now;
							/* controllo se esiste il cookie altrimenti lo creo */
							if (!isset($_COOKIE[DATA_SESSIONS_COOKIE_NAME])) {
								setcookie(DATA_SESSIONS_COOKIE_NAME, $now, time() + (86400 * 30), "/"); // 86400 = 1 day
								} else {
									$lastLogin = $_COOKIE[DATA_SESSIONS_COOKIE_NAME];
									//setcookie(DATA_SESSIONS_COOKIE_NAME, $now, 1577833200, "/");
									}		
							$my_session->my_session_register('lastLogin',$lastLogin);
							$my_session->my_session_register('idUser',$App->item->id);
							$_MY_SESSION_VARS = array();					
							$_MY_SESSION_VARS = $my_session->my_session_read();			
							ToolsStrings::redirect(URL_SITE."home");
							die();						
							} else {
								Core::$resultOp->error = 1;
								Core::$resultOp->messages[] = $_lang['I dati di accesso sono errati!'];
								}
					
						} else {
							Core::$resultOp->error = 1;
							Core::$resultOp->messages[] = $_lang['I dati di accesso sono errati!'];
							}		
					} else  { 
						Core::$resultOp->error = 1;
         			Core::$resultOp->message = $_lang['Errore accesso db!'];         			
         			}	
				
		 		} else  {
		 			Core::$resultOp->error = 1;
         		Core::$resultOp->message = $_lang['Accesso negato!'];        		
         		}	
         				
			} else  {
				Core::$resultOp->error = 1;
				Core::$resultOp->message = 'Accesso negato!';
				}
	break;	
	
	default:
	break;	
	}
$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationsCore.'/templates/'.$App->templateUser.'/js/login.js" type="text/javascript"></script>';
?>
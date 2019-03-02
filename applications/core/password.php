<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * core/password.php v.1.0.0. 04/07/2018
*/

/* variabili ambiente */
$App->codeVersion = ' 1.0.0.';
$App->pageTitle = ucfirst(preg_replace('/%ITEM%/',$_lang['password'],$_lang['modifica %ITEM%']));
$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['password'],$_lang['modifica la tua %ITEM%']);
$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> '.$_lang['password'].'</li>';
$App->templateApp = Core::$request->action.'.tpl.php';
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
$App->coreModule = true;

switch(Core::$request->method) {
	default:
		if ($App->id > 0) {			
			if ($_POST) {
				$password = (isset($_POST['password']) && $_POST['password'] != "") ? SanitizeStrings::stripMagic($_POST['password']) : '';
				$passwordCK = (isset($_POST['passwordCK']) && $_POST['passwordCK'] != "") ? SanitizeStrings::stripMagic($_POST['passwordCK']) : '';
				if ($password != '') {
					if ($password === $passwordCK) {
						$password = password_hash($password, PASSWORD_DEFAULT);
						} else {
							Core::$resultOp->error = 1;
							Core::$resultOp->message = $_lang['Le due password non corrispondono!'];
							}				
					} else {
						Core::$resultOp->error = 1;
						Core::$resultOp->message = preg_replace('/%ITEM%/',$_lang['password'],$_lang['inserisci %ITEM%']);			
						}
					
				if (Core::$resultOp->error == 0) {	
					/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
					Sql::initQuery(DB_TABLE_PREFIX.'users',array('password'),array($password,$App->id),"id = ?");	
					//Sql::updateRecord();
					if (Core::$resultOp->error == 0) {
						Core::$resultOp->message = $_lang['Password modificata correttamente! Sarà effettiva al prossimo login.'];
						}							         	
					}			
				}	
	
			/* recupera i dati memorizzati */
			$App->item = new stdClass;	
			/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
			Sql::initQuery(Sql::getTablePrefix().'users',array('username','password'),array($App->id),"id = ?");	
			$App->item = Sql::getRecord();
			} else {
				ToolsStrings::redirect(URL_SITE."home");
				die();						
				}
	break;	
	}
	
$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationsCore.'/templates/'.$App->templateUser.'/js/password.js" type="text/javascript"></script>';
<<<<<<< HEAD
=======
$App->defaultJavascript = "messages['Le due password non corrispondono!'] = '".addslashes($_lang['Le due password non corrispondono!'])."';";
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
?>

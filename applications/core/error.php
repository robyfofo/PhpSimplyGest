<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * core/error.php v.1.0.0. 25/07/2016
*/

/* variabili ambiente */
$App->pageTitle = $_lang['Errore!'];
$App->pageSubTitle = $_lang['Errore!'];
$App->templateApp = Core::$request->action.'.tpl.php';
$App->templateBase = 'error.tpl.php';
$App->coreModule = true;
switch(Core::$request->method) {
	case 'module':
		$module = (isset(Core::$request->param) ? Core::$request->param : '');
		$content = (isset(Core::$request->params[0]) ? Core::$request->params[0] : '');
		
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = preg_replace('/%MODULE%/',$module,$_lang['Errore nel modulo %MODULE%!']);
		$App->error_content = $content;
		$App->error_returnbutton = '<a href="'.URL_SITE.'" class="btn btn-primary">'.ucfirst($_lang['home']).'</a>';
	break;
	case '404':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Access Error!'];
		$App->error_content = $_lang['testo errore accesso'];
		$App->error_returnbutton = '<a href="'.URL_SITE.'" class="btn btn-primary">'.ucfirst($_lang['home']).'</a>';
	break;

	case 'access':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Access Error!'];
		$App->error_content = $_lang['testo errore accesso'];
		$App->error_returnbutton = '<a href="'.URL_SITE.'" class="btn btn-primary">'.ucfirst($_lang['home']).'</a>';
	break;
	
	default:
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Internal Server Error!'];
		$App->error_content = $_lang['testo errore generico'];
		$App->error_returnbutton = '<a href="'.URL_SITE.'" class="btn btn-primary">'.ucfirst($_lang['home']).'</a>';
	break;
	}
?>
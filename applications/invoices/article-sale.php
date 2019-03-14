<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/article-sale.php v.1.0.0. 14/03/2019
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
if (isset($_POST['id_invoice']) && isset($_MY_SESSION_VARS[$App->sessionName]['id_invoice']) && $_MY_SESSION_VARS[$App->sessionName]['id_invoice'] != $_POST['id_invoice']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_invoice',$_POST['id_invoice']);

if (Core::$request->method == 'listArtSal' && $App->id > 0) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_invoice',$App->id);

/* gestione sessione -> id_invoice */	
$App->id_invoice = (isset($_MY_SESSION_VARS[$App->sessionName]['id_invoice']) ? $_MY_SESSION_VARS[$App->sessionName]['id_invoice'] : 0);

/* preleva dati invoice */
Sql::initQuery($App->params->tables['InvSal'],array('*'),array($App->id_invoice),'id = ?');
$App->invoice = Sql::getRecord();
if (Core::$resultOp->error == 0) {
	if (!isset($App->invoice->id) || (isset($App->invoice->id) && $App->invoice->id == 0)) {
		ToolsStrings::redirect(URL_SITE.Core::$request->action.'/messageInvSal/2/'.urlencode($_lang['Fattura non trovata!']));
		die();
		}
	} else {
		ToolsStrings::redirect(URL_SITE.Core::$request->action.'/messageInvSal/2/'.urlencode($_lang['Errore lettura dati fattura!']));
		die();
		}

switch(Core::$request->method) {
	case 'activeArtSal':
	case 'disactiveArtSal':
		Sql::manageFieldActive(substr(Core::$request->method,0,-6),$App->params->tables['ArtSal'],$App->id,array('labelA'=>$_lang['articolo attivato'],'labelD'=>$_lang['articolo disattivato']));
		$App->viewMethod = 'list';		
	break;

	case 'deleteArtSal':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['ArtSal'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['articolo cancellato']).'!';
				}
			}
		$App->viewMethod = 'list';
	break;
	
	case 'insertArtSal':		
		if (isset($_POST)) {	
			$_POST['id'] = $_POST['id_article'];
			$_POST['active'] = 1;
			$_POST = $Module->calculateArt($_POST);
			Form::parsePostByFields($App->params->fields['ArtSal'],$_lang,array());	
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['ArtSal'],$App->params->tables['ArtSal']);
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['articolo inserito']).'!';
					}
				} else {
					Core::$resultOp->error = 1;
					}
			} else {
				Core::$resultOp->error = 1;
				}
		$App->viewMethod = 'list';	
	break;
	
	case 'updateArtSal':	
		if (isset($_POST)) {	
			$_POST['id'] = $_POST['id_article'];
			$_POST = $Module->calculateArt($_POST);
			Form::parsePostByFields($App->params->fields['ArtSal'],$_lang,array());	
			if (Core::$resultOp->error == 0) {
				Sql::updateRawlyPost($App->params->fields['ArtSal'],$App->params->tables['ArtSal'],'id',$_POST['id_article']);	
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['articolo modificato']).'!';
					}
				} else {
					Core::$resultOp->error = 1;
					}
			} else {
				Core::$resultOp->error = 1;
				}
		$App->viewMethod = 'list';	
	break;
	
/*  AJAX */

	case 'getArticleAjaxArtSal':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['ArtSal'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;

/* END AJAX */
	
	case 'messageItem':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}
	
/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	
	default:
	case 'list':
		$App->items = new stdClass;
		$App->item = new stdClass;							
		$qryFields = array("*");
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		$and = '';

		if ($App->id_invoice > 0) {
			$clause .= "id_invoice = ?";
			$qryFieldsValues[] = $App->id_invoice;
			$and = ' AND ';
			}
			
		Sql::initQuery($App->params->tables['ArtSal'],$qryFields,$qryFieldsValues,$clause);
		Sql::setResultPaged(false);
		Sql::setOrder('id ASC');
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();	
		/* sistemo dati */	
		$tot_price_total = 0;
		$tot_price_tax = 0;
		$tot_total = 0;
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$value->total = $value->price_total + $value->price_tax;
				$value->price_unity_label = '€ '.number_format($value->price_unity,2,',','.');
				$value->price_total_label = '€ '.number_format($value->price_total,2,',','.');
				$value->price_tax_label = '€ '.number_format($value->price_tax,2,',','.');
				$value->total_label = '€ '.number_format($value->total,2,',','.');
				
				$tot_price_total += $value->price_total;
				$tot_price_tax += $value->price_tax;
				$tot_total += $value->total;
		
				$arr[] = $value;
				}
			}
		$App->items = $arr;
		
		$App->tot_price_total_label = '€ '.number_format($tot_price_total,2,',','.');
		$App->tot_price_tax_label = '€ '.number_format($tot_price_tax,2,',','.');
		$App->tot_total_label = '€ '.number_format($tot_total,2,',','.');
		
		$App->pageSubTitle = $_lang['lista degli articoli vendite'];
		$App->templateApp = 'listArtSal.tpl.php';
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/listArtSal.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listArtSal.js" type="text/javascript"></script>';
	break;
	}
?>
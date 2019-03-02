<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/invoice-purchase.php v.1.0.0. 11/09/2018
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->type = 1;

/* GESTIONE CUSTOMERS */
$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1 AND (id_type = 1 OR id_type = 2)');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('surname ASC, name ASC');
$App->customers = Sql::getRecords();		

switch(Core::$request->method) {
	
	/* ARTICLES */
	case 'deleteArtInvPur':
		if ($App->id > 0) {
			$id_art = (isset(Core::$request->params[0]) ? intval(Core::$request->params[0]) : 0);
			if ($id_art > 0) {
				Sql::initQuery($App->params->tables['ArtPur'],array('id'),array($id_art),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['articolo'],$_lang['%ITEM% cancellato'])).'!';
					}
				}
			}
		$App->viewMethod = 'formMod';
		$App->tabActive = 2;
	break;		
	/* END ARTICLES */
	
	case 'deleteInvPur':
		if ($App->id > 0) {
			$delete = true;
			/* controlla se ha figli */
			if (Sql::countRecordQry($App->params->tables['ArtPur'],'id','id_invoice = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 2;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora figli associati!'];
				$delete = false;	
				}
			if ($delete == true && Core::$resultOp->error == 0) {
				Sql::initQuery($App->params->tables['InvPur'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['voce-p cancellata']).'!';
					}
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newInvPur':			
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce-p'],$_lang['inserisci %ITEM%']);
		$App->viewMethod = 'formNew';	
		$App->tabActive = 1;
	break;
	
	case 'insertInvPur':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['InvPur'],$_lang,array());			
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDateFormatIniEndInterval($_POST['dateins'],$_POST['datesca'],'Y-m-d','>');
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['InvPur'],$App->params->tables['InvPur']);
					if (Core::$resultOp->error == 0) {							   						   							   				
		   			}
		   		} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,array('label inserted'=>preg_replace('/%ITEM%/',$_lang['voce-p'],$_lang['%ITEM% inserito']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce-p'],$_lang['inserisci %ITEM%'])));				
		$App->tabActive = 1;	
	break;

	case 'modifyInvPur':				
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce-p'],$_lang['modifica %ITEM%']);
		$App->viewMethod = 'formMod';
		$App->tabActive = 2;
	break;
	
	case 'updateInvPur':
		if ($_POST) {
			if (isset($_POST['submitArtForm']) &&  $_POST['submitArtForm'] == 'submitArt') {
				
				$_POST['id_invoice'] = $_POST['id'];
				$_POST['active'] = 1;
				$_POST['content'] = $_POST['art_content'];
				$_POST['price_unity'] = $_POST['art_price_unity'];
				$_POST['price_tax'] = 0;
				$_POST['price_total'] = $_POST['art_price_total'];
				$_POST['quantity'] = $_POST['art_quantity'];
				$_POST['tax'] = $_POST['art_tax'];
				
				if ($_POST['quantity'] > 0 && $_POST['price_unity'] > 0) {			
					$_POST = $Module->calculateArt($_POST);	
									
					if (isset($_POST['artFormMode']) &&  $_POST['artFormMode'] == 'ins') {
						Form::parsePostByFields($App->params->fields['ArtPur'],$_lang,array());	
						if (Core::$resultOp->error == 0) {
							Sql::insertRawlyPost($App->params->fields['ArtPur'],$App->params->tables['ArtPur']);
							if (Core::$resultOp->error == 0) {
								Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['articolo'],$_lang['%ITEM% inserito'])).'!';
								$App->tabActive = 2;
								}
							} else {
								Core::$resultOp->error = 1;
								}					
						}
						
				
					if (isset($_POST['artFormMode']) &&  $_POST['artFormMode'] == 'mod') {
						$id_art = (isset($_POST['id_article']) ? intval($_POST['id_article']) : 0);
						Form::parsePostByFields($App->params->fields['ArtPur'],$_lang,array());	
						if (Core::$resultOp->error == 0) {
							Sql::updateRawlyPost($App->params->fields['ArtPur'],$App->params->tables['ArtPur'],'id',$id_art);	
							if (Core::$resultOp->error == 0) {
								Core::$resultOp->message = ucfirst(preg_replace('/%ITEM%/',$_lang['articolo'],$_lang['%ITEM% modificato'])).'!';
								$App->tabActive = 2;
								}
							} else {
								Core::$resultOp->error = 1;
								}
						}
					}
						
				} else {
					
					/* form invoice */				
					/* parsa i post in base ai campi */ 	
					Form::parsePostByFields($App->params->fields['InvPur'],$_lang,array());
					if (Core::$resultOp->error == 0) {
						DateFormat::checkDateFormatIniEndInterval($_POST['dateins'],$_POST['datesca'],'Y-m-d','>');
						if (Core::$resultOp->error == 0) {						
							Sql::updateRawlyPost($App->params->fields['InvPur'],$App->params->tables['InvPur'],'id',$App->id);
							if (Core::$resultOp->error == 0) {
								$App->tabActive = 1;																
								}
							} else {
								Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
								}
						}															
					/* end form invoice */	
					}
					
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,array('label done'=>$_lang['modifiche effettuate'],'label modified'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% modificato']),'label modify'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['modifica %ITEM%']),'label insert'=>preg_replace('/%ITEM%/',$_lang['voce'],$_lang['inserisci %ITEM%'])));			
	break;
	
/*  AJAX */

	case 'getArticleAjaxInvPur':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['ArtPur'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;

/* END AJAX */

	case 'messageInvPur':
		Core::$resultOp->error = $App->id;
		if (isset(Core::$request->params[0])) Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;
	
	case 'listAjaxInvPur':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$order = array();
		$orderFields = array('id','dateins','datesca','customer','number','total');	
		/* default da sessione */
		if (isset($_MY_SESSION_VARS[$App->sessionName]['order']) && $_MY_SESSION_VARS[$App->sessionName]['order'] != '') {
			$order[] = $_MY_SESSION_VARS[$App->sessionName]['order'];
			}
		
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {	
			$order = array();	
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			/* salva in sessione */
			if (is_array($order) && count($order) > 0) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'order',implode(',',$order));
			}
		/* end orders */

		/* search */
		/* aggiunge campi join */
		$App->params->fields['InvPur']['cus.ragione_sociale'] = array('searchTable'=>true,'type'=>'varchar');
		$where = '';
		$and = '';
		$fieldsValue = array();
		$filtering = false;
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['InvPur'],'');
				if ($w != '') {
					$where .= $and."(".$w.")";
					$and = ' AND ';
					}
				if (is_array($fv) && count($fv) > 0) {
					$fieldsValue = array_merge($fieldsValue,$fv);
					$filtering = true;
					}				
				}
			}
		//print_r($fieldsValue);
		/* end search */
		
		
		//echo $where;
		////print_r($fieldsValue);

		$table = $App->params->tables['InvPur']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['cust']." AS cus  ON (ite.id_customer = cus.id)";
		$table .= " LEFT JOIN ".$App->params->tables['ArtPur']." AS art  ON (ite.id = art.id_invoice)";		
		$fields[] = 'ite.*';
		$fields[] = "cus.ragione_sociale AS customer";
		$fields[] = "SUM(art.price_total) AS total";
		$fields[] = "SUM(art.price_tax) AS total_tax";
		
		/* conta tutti i records */
		$recordsTotal = Sql::countRecordQry($App->params->tables['InvPur'],'id','',array());
		$recordsFiltered = $recordsTotal;
				
		if ($filtering == true) {
			Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),'',array('groupby'=>'ite.id'));
			$obj = Sql::getRecords();
			$recordsFiltered = count($obj);

		}
							
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array('groupby'=>'ite.id'));
		$obj = Sql::getRecords();
		
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				/* crea la colonna actions */
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyInvPur/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce-p'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteInvPur/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce-p'].'"><i class="fa fa-cut"> </i></a>';
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$data1 = DateTime::createFromFormat('Y-m-d',$value->datesca);						
				$value->totalLabel = '€ '.number_format($value->total + $value->total_tax,2,',','.');				
						
				$tablefields = array(
					'id'=>$value->id,
					'number'=>$value->number,
					'dateinslocal'=>$data->format($_lang['data format']),
					'datescalocal'=>$data1->format($_lang['data format']).$scadenza,
					'customer'=>$value->customer,
					'total'=>$value->totalLabel,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$App->items = $arr;

		$json = array();
		$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = intval($recordsTotal);
		$json['recordsFiltered'] = intval($recordsFiltered);		
		$json['data'] = $App->items;	
		echo json_encode($json);
		die();
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->item = new stdClass;	
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;		
		$App->item->active = 1;
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['InvPur']);
		$App->templateApp = 'formInvPur.tpl.php';
		$App->methodForm = 'insertInvPur';
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formInvPur.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formInvPur.js"></script>';
	break;
	
	case 'formMod':
		if ($App->id > 0) {
			
			$App->item = new stdClass;
			$App->item->dateins = $App->nowDate;
			Sql::initQuery($App->params->tables['InvPur'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();
			if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['InvPur']);
			
			$App->item_articles = new stdClass;
			$qryFields = array("*");
			$qryFieldsValues = array($App->id);
			$clause = 'id_invoice = ?';
			Sql::initQuery($App->params->tables['ArtPur'],$qryFields,$qryFieldsValues,$clause);
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
			$App->item_articles = $arr;	
			$App->item->art_tot_price_total_label = '€ '.number_format($tot_price_total,2,',','.');
			$App->item->art_tot_price_tax_label = '€ '.number_format($tot_price_tax,2,',','.');
			$App->item->art_tot_total_label = '€ '.number_format($tot_total,2,',','.');
			/* calcola tassa aggiuntiva */
			$App->item->invoiceTotalTax = 0;
			/* calcola rivalsa */
			$App->item->invoiceTotalRivalsa = 0;
			$App->item->invoiceTotal = (float)$tot_price_total + $tot_price_tax + $App->item->invoiceTotalTax + $App->item->invoiceTotalRivalsa;	
			$App->item->invoiceTotalTax_label = '€ '.number_format($App->item->invoiceTotalTax,2,',','.');
			$App->item->invoiceTotalRivalsa_label = '€ '.number_format($App->item->invoiceTotalRivalsa,2,',','.');
			$App->item->invoiceTotal_label = '€ '.number_format($App->item->invoiceTotal,2,',','.');

			$App->templateApp = 'formInvPur.tpl.php';
			$App->methodForm = 'updateInvPur';	
			$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formInvPur.css" rel="stylesheet">';
			$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formInvPur.js"></script>';
			
			} else {
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listInvPur');
				die();
				}		
	break;

	case 'list':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['voci-p'],$_lang['lista delle %ITEMS%']);
		$App->templateApp = 'listInvPur.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listInvPur.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
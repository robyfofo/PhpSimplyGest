<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * estimates/items.php v.1.0.0. 04/06/2018
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

/* GESTIONE CUSTOMERS */
$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1 AND (id_type = 1 OR id_type = 2)');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('surname ASC, name ASC');
$App->customers = Sql::getRecords();		

switch(Core::$request->method) {
	
	/* ARTICLES */
	case 'deleteArtItem':
		if ($App->id > 0) {
			$id_art = (isset(Core::$request->params[0]) ? intval(Core::$request->params[0]) : 0);
			if ($id_art > 0) {
				Sql::initQuery($App->params->tables['arts'],array('id'),array($id_art),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['articolo cancellato']).'!';
					}
				}
			}
		$App->viewMethod = 'formMod';
		$App->tabActive = 2;
	break;		
	
	/* END ARTICLES */

	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-6),$App->params->tables['item'],$App->id,array('labelA'=>$_lang['voce attivata'],'labelD'=>$_lang['voce disattivata']));
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			$delete = true;
			/* controlla se ha figli */
			if (Sql::countRecordQry($App->params->tables['arts'],'id','id_estimate = ?',array($App->id)) > 0) {
				Core::$resultOp->error = 2;
				Core::$resultOp->message = $_lang['Errore! Ci sono ancora figli associati!'];
				$delete = false;	
				}
			
			if ($delete == true && Core::$resultOp->error == 0) {	
				Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if(Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';
					}
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItem':			
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
		$App->tabActive = 1;
	break;
	
	case 'insertItem':
		if ($_POST) {
			/* parsa i post in base ai campi */
			Form::parsePostByFields($App->params->fields['item'],$_lang,array());			
			if (Core::$resultOp->error == 0) {
				DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
				if (Core::$resultOp->error == 0) {									
					Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
					if (Core::$resultOp->error == 0) {							   						   							   				
		   			}
		   		} else {
						Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
						}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array());
	break;
	
	case 'modifyItem':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
		$App->tabActive = 2;
	break;
	
	case 'updateItem':
		if ($_POST) {	
			if (isset($_POST['submitArtForm']) &&  $_POST['submitArtForm'] == 'submitArt') {
				
				$_POST['id_estimate'] = $_POST['id'];
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
						Form::parsePostByFields($App->params->fields['arts'],$_lang,array());	
						if (Core::$resultOp->error == 0) {
							Sql::insertRawlyPost($App->params->fields['arts'],$App->params->tables['arts']);
							if (Core::$resultOp->error == 0) {
								Core::$resultOp->message = ucfirst($_lang['articolo inserito']).'!';
								}
							} else {
								Core::$resultOp->error = 1;
								}					
						}
				
					if (isset($_POST['artFormMode']) &&  $_POST['artFormMode'] == 'mod') {
						$id_art = (isset($_POST['id_article']) ? intval($_POST['id_article']) : 0);
						Form::parsePostByFields($App->params->fields['arts'],$_lang,array());	
						if (Core::$resultOp->error == 0) {
							Sql::updateRawlyPost($App->params->fields['arts'],$App->params->tables['arts'],'id',$id_art);	
							if (Core::$resultOp->error == 0) {
								Core::$resultOp->message = ucfirst($_lang['articolo modificato']).'!';
								}
							} else {
								Core::$resultOp->error = 1;
								}
						}
				
					}
		
				} else {
					/* form estimates */
					/* parsa i post in base ai campi */ 
					Form::parsePostByFields($App->params->fields['item'],$_lang,array());
					if (Core::$resultOp->error == 0) {
						DateFormat::checkDataIsoIniEndInterval($_POST['dateins'],$_POST['datesca'],'>');
						if (Core::$resultOp->error == 0) {						
							Sql::updateRawlyFields($App->params->fields['item'],$App->params->tables['item'],$_POST,array('clause'=>'id = ?','clauseVals'=>array($App->id)));
							if (Core::$resultOp->error == 0) {																
								}
							} else {
								Core::$resultOp->message = $_lang['Intervallo tra le due date è errato!'];	 
								}
			
						}
					/* end form estimates */	
					}	
														
			} else {
				Core::$resultOp->error = 1;
				}	
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array('modviewmethod'=>'formMod'));
		
		$App->tabActive = 2;	
	break;
	
/*  AJAX */

	case 'getArticleAjaxItem':
		$App->item = new stdClass;
		$id = (isset($_POST['id']) ? intval($_POST['id']) : 0);
		if ($id > 0) {
			Sql::initQuery($App->params->tables['arts'],array('*'),array($id),'id = ?');
			$App->item = Sql::getRecord();
			$json = json_encode($App->item);
			echo $json;
			}	
		die();	
	break;

/* END AJAX */


	case 'messageItem':
		Core::$resultOp->error = $App->id;
		if (isset(Core::$request->params[0])) Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;

	case 'listAjaxItem':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$order = array();
		$orderFields = array('id','dateins','datesca','customer','total');	
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
		//$App->params->fields['item']['cus.ragione_sociale'] = array('searchTable'=>true,'type'=>'varchar');
		//$App->params->fields['itap']['ite.total'] = array('searchTable'=>true,'type'=>'float');
		$where = 'ite.id_owner = ?';
		$and = ' AND ';
		$fieldsValue = array($App->userLoggedData->id);
		$filtering = false;
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['item'],'');
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

		$table = $App->params->tables['item']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['arts']." AS art  ON (ite.id = art.id_estimate)";		
		$fields[] = 'ite.*';
		$fields[] = "SUM(art.price_total) AS total";
		$fields[] = "SUM(art.price_tax) AS total_tax";
		
		/* conta tutti i records */
		$recordsTotal = Sql::countRecordQry($App->params->tables['item'],'id','',array());
			
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array('groupby'=>'ite.id'));
		$obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$pdf = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/estimateExpPdf/'.$value->id.'" title="'.ucfirst($_lang['esporta in pdf']).' '.$_lang['la voce'].'" target="_blank"><i class="fa fa-print"> </i></a>';
				$actions = '<a class="btn btn-default btn-circle" href="'.URL_SITE.Core::$request->action.'/modifyItem/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce'].'"><i class="fa fa-edit"> </i></a><a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteItem/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$data = DateTime::createFromFormat('Y-m-d',$value->dateins);
				$data1 = DateTime::createFromFormat('Y-m-d',$value->datesca);						
				$value->totalLabel = '€ '.number_format($value->total + $value->total_tax,2,',','.');						
				$tablefields = array(
					'id'=>$value->id,
					'note'=>$value->note,
					'dateinslocal'=>$data->format($_lang['data format']),
					'datescalocal'=>$data1->format($_lang['data format']),
					'customer'=>$value->customer,
					'total'=>$value->totalLabel,
					'pdf'=>$pdf,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$App->items = $arr;
		$recordsFiltered = $recordsTotal;
		if ($filtering == true) $recordsFiltered = count($App->items);
		$json = array();
		$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = $recordsTotal;
		$json['recordsFiltered'] = $recordsFiltered;	
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
		$App->item->rivalsa = $App->company->rivalsa;
		$App->item->tax = 0;			
		$App->item->active = 1;
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';	
		$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItem.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
	break;
	
	case 'formMod':
		if ($App->id > 0) {
			$App->item = new stdClass;
			$App->item->dateins = $App->nowDate;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->item = Sql::getRecord();
			if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
			$App->item_articles = new stdClass;
			$qryFields = array("*");
			$qryFieldsValues = array($App->id);
			$clause = 'id_estimate = ?';
			Sql::initQuery($App->params->tables['arts'],$qryFields,$qryFieldsValues,$clause);
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
			if ($App->item->tax > 0) $App->item->invoiceTotalTax = ($tot_price_total * $App->item->tax) / 100;		
			/* calcola rivalsa */
			$App->item->invoiceTotalRivalsa = 0;
			if ($App->item->rivalsa > 0) $App->item->invoiceTotalRivalsa = ($tot_price_total * $App->item->rivalsa) / 100;
			$App->item->invoiceTotal = (float)$tot_price_total + $tot_price_tax + $App->item->invoiceTotalTax + $App->item->invoiceTotalRivalsa;	
			$App->item->invoiceTotalTax_label = '€ '.number_format($App->item->invoiceTotalTax,2,',','.');
			$App->item->invoiceTotalRivalsa_label = '€ '.number_format($App->item->invoiceTotalRivalsa,2,',','.');
			$App->item->invoiceTotal_label = '€ '.number_format($App->item->invoiceTotal,2,',','.');

			$App->templateApp = 'formItem.tpl.php';
			$App->methodForm = 'updateItem';
			$App->css[] = '<link href="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/css/formItem.css" rel="stylesheet">';
			$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formItem.js"></script>';
			} else {
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listItem');
				die();
				}		
	break;

	case 'list':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->datesca = $App->nowDate;
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listItem.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listItem.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
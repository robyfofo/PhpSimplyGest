<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * bilanciofamiliare/entries.php v.1.2.0. 16/12/2019
*/

if (isset($_POST['itemsforpage']) && isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) && $_MY_SESSION_VARS[$App->sessionName]['ifp'] != $_POST['itemsforpage']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable']) && isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != $_POST['searchFromTable']) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


switch(Core::$request->method) {
	
	case 'modifyEntr':
		if ( $App->id ) {
			$App->item = new stdClass;
			Sql::initQuery ( $App->params->tables['items'],array('*'),array($App->id),'id = ?' );
			$App->item = Sql::getRecord();
			if ( Core::$resultOp->error > 0 ) { ToolsStrings::redirect(URL_SITE.'error/db'); die(); }
			if (isset($App->item->id) && $App->item->id > 0) {
				$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce-e'],$_lang['modifica %ITEM%']);
				$App->methodForm = 'updateEntr';
				$App->viewMethod = 'form';											
			} else {
				ToolsStrings::redirect(URL_SITE.'error/404'); die();
			}						
		} else {
			ToolsStrings::redirect(URL_SITE.'error/404'); die();
		}
	break;
	
	case 'updateEntr':
		//Core::setDebugMode(1);
		if ($_POST) {
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['items'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				Sql::updateRawlyPost($App->params->fields['items'],$App->params->tables['items'],'id',$App->id);
				if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db');die(); }	
				$_SESSION['message'] = '0|'.ucfirst(preg_replace('/%ITEM%/',$_lang['voce-e'],$_lang['%ITEM% modificata']));
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listEntr');
				die();				
			} else {
				$_SESSION['message'] = '1|'.implode('<br>', Core::$resultOp->messages);
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/newEntr');
				die();
			}
		} else {
			ToolsStrings::redirect(URL_SITE.'error/404');
			die();
		}
	break;

	
	case 'newEntr':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->item->active = 1;
		
		$App->pageSubTitle = preg_replace('/%ITEM%/',$_lang['voce-e'],$_lang['inserisci %ITEM%']);
		$App->methodForm = 'insertEntr';
		$App->viewMethod = 'form';		
	break;

	case 'insertEntr':
		//Core::setDebugMode(1);
		if ($_POST) {
			/* parsa i post in base ai campi */ 	
			Form::parsePostByFields($App->params->fields['items'],$_lang,array());
			if (Core::$resultOp->error == 0) {
				Sql::insertRawlyPost($App->params->fields['items'],$App->params->tables['items']);
				if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db');die(); }				
				$_SESSION['message'] = '0|'.ucfirst(preg_replace('/%ITEM%/',$_lang['voce-e'],$_lang['%ITEM% inserita']));
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listEntr');
				die();				
			} else {
				$_SESSION['message'] = '1|'.implode('<br>', Core::$resultOp->messages);
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/newEntr');
				die();
			}
		} else {
			ToolsStrings::redirect(URL_SITE.'error/404');
			die();
		}
	break;
	
	case 'listAjaxEntr':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);

		/* limit */		
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	

		/* orders */
		$orderFields = array('dateins','amount','description');
		$order = array();
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
		$where = 'type = 1';
		$and = ' AND ';
		$fieldsValue = array();
		
		/* permissions query */
		list($permClause,$fieldsValuesPermClause) = Permissions::getSqlQueryItemPermissionForUser($App->userLoggedData,array('onlyuser'=>true));
		if (isset($permClause) && $permClause != '') {
			$where .= $and.'('.$permClause.')';
			$and = ' AND ';
		}
		if (is_array($fieldsValuesPermClause) && count($fieldsValuesPermClause) > 0) {
			$fieldsValue = array_merge($fieldsValue,$fieldsValuesPermClause);	
		}
		/* end permissions items */

		
		/* aggiunge campi join */
		//$App->params->fields['InvSal']['cus.ragione_sociale'] = array('searchTable'=>true,'type'=>'varchar');
		//$App->params->fields['itap']['ite.total'] = array('searchTable'=>true,'type'=>'float');
		
		
		$filtering = false;
		if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && count($_REQUEST['search']) > 0) {		
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '') {
				list($w,$fv) = Sql::getClauseVarsFromAppSession($_REQUEST['search']['value'],$App->params->fields['items'],'');
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
		/* end search */

		$table = $App->params->tables['items'];
		$fields[] = '*';
	
		/* conta tutti i records */
		$recordsTotal = Sql::countRecordQry($App->params->tables['items'],'id','type = 1',array());
		$recordsFiltered = $recordsTotal;

		if ($filtering == true) {
			Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),'',array());
			$obj = Sql::getRecords();
			$recordsFiltered = count($obj);

		}
		
		// trova il totale 
		Sql::initQuery($table,array('SUM(amount) AS totale'),$fieldsValue,$where,'','',array());
		$objTot = Sql::getRecord();
		$totentry = 0;
		if (isset($objTot->totale)) $totentry = $objTot->totale;

		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit,array());
		$obj = Sql::getRecords();
		//print_r($obj);
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				/* crea la colonna actions */
				$actions = '<a class="btn btn-default btn-sm" href="'.URL_SITE.Core::$request->action.'/modifyEntr/'.$value->id.'" title="'.ucfirst($_lang['modifica']).' '.$_lang['la voce-e'].'"><i class="far fa-edit"></i></a><a class="btn btn-default btn-sm confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteEntr/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce-e'].'"><i class="fas fa-trash-alt"></i></a>';						
				if ( $value->type == 1) {
					$entry = $value->amount;
				}
				
				$tablefields = array(
					'dateinslocal'			=> DateFormat::convertDateFormats($value->dateins,'Y-m-d',$_lang['data format'],$App->nowDate),
					'entry'					=> ($entry != '' ? '€ '.number_format($entry,2,',','.') : ''),
					'description'			=> $value->description,
					'actions'				=> $actions
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
		
		$json['totali_entrate'] = '€ '.number_format($totentry,2,',','.');
		echo json_encode($json);
		die();
	break;
	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	
	case 'form':
		$App->templateApp = 'formEntry.html';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/formEntry.js"></script>';	
	break;
	case 'list':
		$App->item = new stdClass;		
		$App->item->dateins = $App->nowDate;
		$App->pageSubTitle = preg_replace('/%ITEMS%/',$_lang['voci-e'],$_lang['lista delle %ITEMS%']);
		$App->templateApp = 'listEntries.html';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listEntries.js"></script>';	
	break;
	
	default:
	break;
	}	
?>
<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * timecard/aitems.php v.1.0.0. 03/03/2019
*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
		
if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


switch(Core::$request->method) {
	
	case 'exportXlsAite';
		//Core::setDebugMode(1);
		/* orders */
		$order = array();	
		$order[] = 'datains DESC';
		$order[] = 'starttime DESC';
		$order[] = 'project DESC';
		
		$orderFields = array('ite.id','ite.id_user','ite.id_project','ite.content','ite.datains','ite.starttime','ite.endtime','ite.worktime');
		
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
			
		
		/* end orders */		
		
		/* search */
		$where = '';
		$and = '';
		$fieldsValue = array();
		
		/* aggiunge campi join */	
		$App->params->fields['item']['pro.title'] = array('searchTable'=>true,'type'=>'varchar');
		$App->params->fields['item']['usr.username'] = array('searchTable'=>true,'type'=>'float');
		
		/* permissions query */
		/* se non è root visualizza le timecard proprie */
		if ($App->userLoggedData->is_root == 0) {
			$where .= $and."ite.id_user = ?";
			$and = ' AND ';
			$fieldsValue[] = $App->userLoggedData->id;
		}
		/* end permissions items */
		
		
		$_REQUEST['search'] = array();
		if (Core::$request->param != '') $_REQUEST['search']['value'] = Core::$request->param;	
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
		/* end search */
		
		$table = $App->params->tables['item']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['prog']." AS pro  ON (ite.id_project = pro.id)";
		$table .= " LEFT JOIN ".$App->params->tables['user']." AS usr  ON (ite.id_user = usr.id)";
		$fields[] = "ite.*";
		$fields[] = "pro.title AS project";
		$fields[] = "usr.username AS username";
		
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),'');
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		
		//print_r($obj);
		//die();
		
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$data[] = array
				(
				'Data'			=> $value->datains,
				'Contenuto'		=> $value->content,
				'Inizio'			=> $value->starttime,
				'Fine'			=> $value->endtime,
				'Progetto'   	=> $value->project
				);
			}				
		}
		
		if (count($data) == 0) ToolsStrings::redirect(URL_SITE.'error/404');
		
		// Create new Spreadsheet object
		$spreadSheet = new Spreadsheet();
		$workSheet = $spreadSheet->getActiveSheet();
		// Create new Spreadsheet object	
		$workSheet->fromArray(array_keys($data[0]), NULL, 'A1');
		$workSheet->fromArray($data,NULL,'A2');
		foreach (range('A','I') as $col) {
			$workSheet->getColumnDimension($col)->setAutoSize(true); 
			}
		
		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="timecards.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		
		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0
		
		$writer = IOFactory::createWriter($spreadSheet, 'Xls');
		$writer->save('php://output');
		die();
	break;
	
	case 'deleteAite':
		if ($App->id > 0) 
		{
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) 
			{
				$_SESSION['message'] = '0|'.ucfirst(preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% cancellato'])).'!';
				ToolsStrings::redirect(URL_SITE.Core::$request->action.'/listAite');
			}
			else 
			{
				ToolsStrings::redirect(URL_SITE.'error');
			}	
		}	
		else 
		{
			ToolsStrings::redirect(URL_SITE.'error/404');
		}	
		die();
	break;
			
	case 'listAjaxAite':
		//Core::setDebugMode(1);
		//print_r($_REQUEST);
		
		/* limit */		
		$limit = '';
		if (isset($_REQUEST['start']) && $_REQUEST['length'] != '-1') {
			$limit = " LIMIT ".$_REQUEST['length']." OFFSET ".$_REQUEST['start'];
			}				
		/* end limit */	
			
		/* orders */
		$orderFields = array('ite.id','ite.id_user','ite.id_project','ite.content','ite.datains','ite.starttime','ite.endtime','ite.worktime');
		$order = array();	
		if (isset($_REQUEST['order']) && is_array($_REQUEST['order']) && count($_REQUEST['order']) > 0) {		
			foreach ($_REQUEST['order'] AS $key=>$value)	{				
				$order[] = $orderFields[$value['column']].' '.$value['dir'];
				}
			}
		/* end orders */		
			
		/* search */
		$where = '';
		$and = '';
		$fieldsValue = array();
		
		/* aggiunge campi join */	
		$App->params->fields['item']['pro.title'] = array('searchTable'=>true,'type'=>'varchar');
		$App->params->fields['item']['usr.username'] = array('searchTable'=>true,'type'=>'float');
		
		/* permissions query */
		/* se non è root visualizza le timecard proprie */
		if ($App->userLoggedData->is_root == 0)
		{
		$where .= $and."ite.id_user = ?";
		$and = ' AND ';
		$fieldsValue[] = $App->userLoggedData->id;
		}
		/* end permissions items */
		
		
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
		/* end search */
		
		//echo  $where;
		//print_r($fieldsValue);
		
		$table = $App->params->tables['item']." AS ite";
		$table .= " LEFT JOIN ".$App->params->tables['prog']." AS pro  ON (ite.id_project = pro.id)";
		$table .= " LEFT JOIN ".$App->params->tables['user']." AS usr  ON (ite.id_user = usr.id)";
		$fields[] = "ite.*";
		$fields[] = "pro.title AS project";
		$fields[] = "usr.username AS username";
		
		/* conta tutti i records */
		$recordsTotal = Sql::countRecordQry($App->params->tables['item'],'id','',array());
		$recordsFiltered = $recordsTotal;
		
		if ($filtering == true) 
		{
			Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),'',array());
			$obj = Sql::getRecords();
			$recordsFiltered = count($obj);
		}


		//Core::setDebugMode(1);
		Sql::initQuery($table,$fields,$fieldsValue,$where,implode(', ', $order),$limit);
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		/* sistemo dati */	
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$actions = '<a class="btn btn-default btn-circle confirmdelete" href="'.URL_SITE.Core::$request->action.'/deleteAite/'.$value->id.'" title="'.ucfirst($_lang['cancella']).' '.$_lang['la voce'].'"><i class="fa fa-cut"> </i></a>';
				$tablefields = array(
					'id'=>$value->id,
					'id_user'=>$value->username,
					'project'=>$value->project,
					'content'=>$value->content,
					'datains'=>DateFormat::convertDateFormats($value->datains,'Y-m-d',$_lang['data format'],$App->nowDate),
					'starttime'=>$value->starttime,
					'endtime'=>$value->endtime,
					'worktime'=>$value->worktime,
					'actions'=>$actions
					);
				$arr[] = $tablefields;
				}
			}
		$totalRows = Sql::getTotalsItems();
		$App->items = $arr;
		$json = array();
		$json['draw'] = intval($_REQUEST['draw']);
		$json['recordsTotal'] = intval($recordsTotal);
		$json['recordsFiltered'] = intval($recordsFiltered);		
		$json['data'] = $App->items;	
		echo json_encode($json);
		die();
	break;

	case 'listPite':
	default;	
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i');
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {

	case 'list':				
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listAite.tpl.php';
		$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplications.Core::$request->action.'/templates/'.$App->templateUser.'/js/listAite.js"></script>';
	break;	
	
	default:
	break;
	}	
?>
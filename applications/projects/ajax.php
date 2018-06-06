<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/projects/ajax.php v.3.0.0. 30/01/2017
*/

switch(Core::$request->method) {
	case 'getTimecardsProjectAjax':	
		$idproject = intval(Core::$request->param);
		if ($idproject > 0) {
			
			$date = DateTime::createFromFormat('Y-m-d',$App->nowDate);
			$monthyear = $date->format('Y-m');
			$date->modify('-1 month');
			$premonthyear = $date->format('Y-m');
			
			$totalltime = array();
			$totmonthtime = array();
			$totpremonthtime = array();
			
			/*  preleva tutte le timecard */
			$objalltime = new stdClass;
			Sql::initQuery($App->params->tables['time'],array('*'),array($idproject),'id_project = ?');
			Sql::setOrder('datains ASC');
			$objalltime = Sql::getRecords();				
			if (is_array($objalltime) && count($objalltime) > 0) {
				foreach ($objalltime AS $valuealltime) {
					$totalltime[] = $valuealltime->worktime;			
					}
				}
				
			/*  preleva tutte le timecard del mese corrente*/	
			$datarifini = $monthyear.'-01';
			$datarifend = $monthyear.'-31';			
			$objmonthtime = new stdClass;
			$where = "id_project = ? AND (datains >= '".$datarifini."' AND datains <= '".$datarifend."')";
			Sql::initQuery($App->params->tables['time'],array('*'),array($idproject),$where,'');
			Sql::setOrder('datains ASC');
			$objmonthtime = Sql::getRecords();				
			if (is_array($objmonthtime) && count($objmonthtime) > 0) {
				foreach ($objmonthtime AS $valuemonthtime) {
					$totmonthtime[] = $valuemonthtime->worktime;			
					}
				}				

			/*  preleva tutte le timecard del mese precedente */				
			$datarifini = $premonthyear.'-01';
			$datarifend = $premonthyear.'-31';			
			$objpremonthtime = new stdClass;
			$where = "id_project = ? AND (datains >= '".$datarifini."' AND datains <= '".$datarifend."')";
			Sql::initQuery($App->params->tables['time'],array('*'),array($idproject),$where,'');
			Sql::setOrder('datains ASC');
			$objpremonthtime = Sql::getRecords();				
			if (is_array($objpremonthtime) && count($objpremonthtime) > 0) {
				foreach ($objpremonthtime AS $valuepremonthtime) {
					$totpremonthtime[] = $valuepremonthtime->worktime;			
					}
				}				
						
			$valuetotalltime = DateFormat::sum_the_time($totalltime);
			$valuetotmonthtime = DateFormat::sum_the_time($totmonthtime);
			$valuetotpremonthtime = DateFormat::sum_the_time($totpremonthtime);
			$output = '<table class="table table-striped table-condensed"><tbody><tr><td>'.ucfirst($_lang['tempo lavorato totale']).':</td><td class="text-right">'.$valuetotalltime.'</td></tr><tr><td><strong>'.ucfirst($_lang['tempo lavorato mese corrente']).':</strong></td><td class="text-right"><strong>'.$valuetotmonthtime.'</strong></td></tr><tr><td>'.ucfirst($_lang['tempo lavorato mese precedente']).':</td><td class="text-right">'.$valuetotpremonthtime.'</td></tr></tbody></table>';
			echo $output;
			}
		die();	
	break;
	
	}
?>

<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.DateFormat.php v.1.0.1. 06/06/2017
*/

class DateFormat extends Core  {
	private static $dataVars = array();
	private static $timeVars = array();
	private static $year = 2000;
	private static $month = 1;
	private static $day = 1;
	private static $hours = 0;
	private static $minutes = 0;
	private static $seconds = 0;
	
	public function __construct() {	
		parent::__construct();
		}
		
	public static function sum_the_time($times) {
  		//$times = array($time1, $time2);
  		$seconds = 0;
  		foreach ($times as $time) {
			list($hour,$minute,$second) = explode(':', $time);
			$seconds += $hour*3600;
			$seconds += $minute*60;
			$seconds += $second;
  			}
		$hours = floor($seconds/3600);
		$seconds -= $hours*3600;
		$minutes  = floor($seconds/60);
		$seconds -= $minutes*60;
  		// return "{$hours}:{$minutes}:{$seconds}";
		return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
		}
		
	public static function getSumOfTimeArray($array) {
		$sum = strtotime('00:00:00');
		$sum2 = 0;
		if (is_array($array) && count($array) > 0) {
			foreach ($array AS $value) {
				$sum1 = strtotime($value) - $sum;
        		$sum2 = $sum2 + $sum1;
				}
			}
		$sum3 = $sum + $sum2;
		return date("H:i:s",$sum3);
		}
		
	public static function checkDataIsoIniEndInterval($dateisoini,$dateisoend,$compare='>') {
		$res = true;		
		try {
	  		$dataini = DateTime::createFromFormat('Y-m-d',$dateisoini);
	  		try {
	  			$dataend = DateTime::createFromFormat('Y-m-d',$dateisoend);	  			
	  			/* check */
	  			switch ($compare) {
	  				default:
	  					if ($dataini->getTimestamp() > $dataend->getTimestamp()) {
	  						Core::$resultOp->error = 1;
	  						$res = false;
	  						}
	  				break;
	  				}	  			 
	  		} catch (Exception $e) {}	
		} catch (Exception $e) {}
		return $res;
		}
		
	public static function checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$compare='>') {
		$res = true;		
		try {
	  		$dataini = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeisoini);
	  		try {
	  			$dataend = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeisoend);	  			
	  			/* check */
	  			switch ($compare) {
	  				default:
	  					if ($dataini->getTimestamp() > $dataend->getTimestamp()) {
	  						Core::$resultOp->error = 1;
	  						$res = false;
	  						}
	  				break;
	  				}	  			 
	  		} catch (Exception $e) {}	
		} catch (Exception $e) {}
		return $res;
		}
		
	public static function convertDataFromDatepickerToIso($data,$format,$defaultdata) {
		/* controlla default data se iso */
		if (self::checkDataIso($defaultdata) == false) $defaultdata = date('Y-m-d');
		if ($format == '') $format = 'd/m/Y';
		$res = self::checkDataFromDatepicker($data,$format);
		if ($res == true) {
			/* converto in iso */
			$d = DateTime::createFromFormat($format,$data);
			$errors = DateTime::getLastErrors();
			$dataIso = ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? $d->format('Y-m-d')  : $defaultdata;			
			} else {
				$dataIso = $defaultdata;
				}	
		return $dataIso;
		}
		
	public static function convertTimeFromDatepickerToIso($time,$format,$defaultime) {
		/* controlla default time se iso */
		if (self::checkTimeIso($defaultime) == false) $defaulttime = date('H:i:s');
		if ($format == '') $format = 'H:i';
		$res = self::checkTimeFromDatepicker($time,$format);
		if ($res == true) {
			/* converto in iso */
			$d = DateTime::createFromFormat($format,$time);
			$errors = DateTime::getLastErrors();
			$timeIso = ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? $d->format('H:i:s')  : $defaultdata;			
			} else {
				$timeIso = $defaultime;
				}
		return $timeIso;
		}
		
	public static function checkDataFromDatepicker($data,$format) {
		if ($format == '') $format = 'd/m/Y';
    	$date = DateTime::createFromFormat($format,$data);
      $errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;	
		}
		
	public static function checkDataTimeFromDatepicker($data,$format) {
		if ($format == '') $format = 'd/m/Y H:i:s';
    	$date = DateTime::createFromFormat($format,$data);
      $errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;	
		}
		
	public static function checkTimeFromDatepicker($time,$format) {
		if ($format == '') $format = 'H:i:s';
    	$time = DateTime::createFromFormat($format,$time);
      $errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;	
		}

		
	public static function checkDataIso($dataiso) {
	  	$date = DateTime::createFromFormat('Y-m-d',$dataiso);
	  	$errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;
		}
		
	public static function checkDataTimeIso($datatimeiso) {
	  	$date = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeiso);
	  	$errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;
		}


	public static function checkTimeIso($timeiso) {
	  	$date = DateTime::createFromFormat('H:i:s',$timeiso);
	  	$errors = DateTime::getLastErrors();
		return ($errors['warning_count'] == 0 && $errors['error_count'] == 0) ? true : false;
		}

	public static function getDataIsoFormatString($dataIso='',$format='',$langMonts,$langDays,$opt) {
		if ($dataIso != '') self::explodeDataIso($dataIso);
		$s = '';
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}

	public static function getDataTimeIsoFormatString($datatimeIso='',$format='',$langMonts,$langDays,$opt) {
		if ($datatimeIso != '') self::explodeDataTimeIso($datatimeIso);
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}

	public static function explodeDataIso($data) {
		self::$dataVars = explode('-',$data);
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		}
		
	public static function explodeDataTimeIso($datatime) {
		$d = explode(' ',$datatime);
		list($data,$time) = $d;
		self::$dataVars = explode('-',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		self::$hours = self::$timeVars[0];
		self::$minutes = self::$timeVars[1];	
		self::$seconds = self::$timeVars[2];
		}

	public static function getDataString($format='',$langMonts,$langDays) {
		$s = '';
		$month = intval(self::$month);
		$day = intval(self::$day);

		$format = preg_replace('/%DAY%/',self::$day,$format);
		$format = preg_replace('/%STRINGMONTH%/',ucfirst($langMonts[$month]),$format);
		$format = preg_replace('/%STRINGDATADAY%/',self::getDayOfDate($langDays,array()),$format);
		$format = preg_replace('/%MONTH%/',self::$month,$format);
		$format = preg_replace('/%YEAR%/',self::$year,$format);
		$format = preg_replace('/%HH%/',self::$hours,$format);
		$format = preg_replace('/%II%/',self::$minutes,$format);
		$s = $format;
		
		switch ($format) {
			case 'dd StringMonth YYYY':
				$s = self::$day. ' '.ucfirst($langMonts[$month]).' '.self::$year;
			break;
			
			case 'StringDay StringMonth YYYY':
				$s = self::$day. ' '.ucfirst($langMonts[$month]).' '.self::$year;
			break;
			
			case 'StringMonth dd, YYYY':
				$s = ucfirst($langMonts[$month]).' '.self::$day. ', '.self::$year;
			break;
			
			case 'StringMonth':
				$s = ucfirst($langMonts[$month]);
			break;
			
			case 'dd/mm/YYYY':
			/* dd/mm/YYYY */
				$s = self::$day.'/'.self::$month.'/'.self::$year;
			break;
			
			case 'hh:mm':
			/* dd/mm/YYYY */
				$s = self::$hours.':'.self::$minutes;
			break;
						
			case 'YYYY-mm-dd':
				$s = self::$year.'-'.self::$month.'-'.self::$day;
			break;
			
			case 'dd':
				$s = self::$day;
			break;

			}
		return $s;		
		}
		
	public static function getDayOfDate($langDays,$opt) {
		$optDef = array();	
		$opt = array_merge($optDef,$opt);
		$dt = self::$year.'-'.self::$month.'-'.self::$day;
		$date = DateTime::createFromFormat('Y-m-d',$dt);
		$errors = DateTime::getLastErrors();
		if ($errors['error_count'] > 0 && $errors['warning_count']) { 
			return 'n.d.';		
			} else {
				$d = intval($date->format('N'));	
				$ds = $langDays[$d];
				return $ds;
				}
	
		}

	}
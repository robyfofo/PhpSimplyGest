<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.DateFormat.php v.1.0.0. 10/11/2017
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
		
	public static function getDataFromDatepicker($data,$nowdataiso) {
		try {
    		$date = DateTime::createFromFormat('d/m/Y',$data);
    		$data = $date->format('Y-m-d'); 		
		} catch (Exception $e) {
			$data = $nowdataiso;
		}
		return $data;
		}

	public static function checkDataTimeFromDatepicker($datatime,$nowdatatimeiso) {
		try {
    		$date = DateTime::createFromFormat('d/m/Y H:i',$datatime);
    		$datatime = $date->format('Y-m-d H:i:s'); 		
		} catch (Exception $e) {
			$datatime = $nowdatatimeiso;
		}
		return $datatime;
		}

	public static function checkDataFromDatepicker($data,$format) {
		if ($format == '') $format = 'd/m/Y';
		try {
    		$date = DateTime::createFromFormat($format,$data);
    		return true;
		} catch (Exception $e) {
			return false;
		}
		return false;
		}		
		
	public static function checkConvertDataFromDatepicker($data,$nowdataiso) {
		try {
    		$date = DateTime::createFromFormat('d/m/Y',$data);
    		$data = $date->format('Y-m-d'); 		
		} catch (Exception $e) {
			$data = $nowdataiso;
		}
		return $data;
		}
		
	public static function convertDataFromDatepicker($data,$formatFrom,$formatTo) {
		if ($formatFrom == '') $formatFrom = 'd/m/Y';
		if ($formatTo == '') $formatTo = 'Y-m-d';
		try {
    		$date = DateTime::createFromFormat($formatFrom,$data);
    		$data = $date->format($formatTo); 		
		} catch (Exception $e) {
			$data = date('Y-m-d');
		}
		return $data;
		}		
		
	public static function checkDataIso($dataiso) {
		try {
	  		$date = DateTime::createFromFormat('Y-m-d',$dataiso);
	  		return true;
		} catch (Exception $e) {
			self::$resultOp->error = 1;
			return false;
		}
		return false;
		}
		
	public static function checkConvertDataIso($dataiso,$nowdataiso) {
		if ($nowdataiso == '') $nowdataiso = $nowdataiso;
		if ($dataiso == '0000-00-00') $dataiso = $nowdataiso;
		try {
	  		$date = DateTime::createFromFormat('Y-m-d',$dataiso);		
		} catch (Exception $e) {
			$dataiso = $nowdataiso;
		}
		return $dataiso;
		}


	public static function checkConvertDataTimeIso($datatimeiso,$nowdatatimeiso) {
		if ($nowdatatimeiso == '') $nowdatatimeiso = $nowdatatimeiso;
		if ($datatimeiso == '0000-00-00 00:00:00') $datatimeiso = $nowdatatimeiso;
		try {
	  		$date = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeiso);		
		} catch (Exception $e) {
			$datatimeiso = $nowdatatimeiso;
		}
		return $datatimeiso;
		}
		
	public static function checkDataTimeIso($datatimeiso) {
		$date = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeiso);
		$errors = DateTime::getLastErrors();
		if ($errors['warning_count'] == 0 && $errors['error_count'] == 0) {
 	  		return true;
			} else {
				self::$resultOp->error = 1;
				return false;
				}
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
		
	public static function explodeDataIso($data) {
		self::$dataVars = explode('-',$data);
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		}


	public static function convertDatatimeFromISOtoITA($value,$format='') {
		$d = explode(' ',$value);
		list($data,$time) = $d;
		self::$dataVars = explode('-',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];
		$str =  self::$day.'/'.self::$month.'/'.self::$year;	
		if ($time != '') $str .= ' '.$time;
		return $str;	
		}
		
	public static function convertDatatimeFromITAtoISO($value) {
		$d = explode(' ',$value);
		list($data,$time) = $d;
		self::$dataVars = explode('/',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[0];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[2];
		$str = self::$year.'-'.self::$month.'-'.self::$day;
		if ($time != '') $str .= ' '.$time;
		return $str;
		}
		
	public static function convertDataFromISOtoITA($value,$format='') {
		self::$dataVars = explode('-',$value);
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		return self::$day.'/'.self::$month.'/'.self::$year;	
		}
		
	public static function convertDataFromITAtoISO($value) {
		self::$dataVars = explode('/',$value);
		self::$day = self::$dataVars[0];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[2];	
		return self::$year.'-'.self::$month.'-'.self::$day;
		}


	public static function getDataIsoFormatString($dataIso='',$format='',$langMonts,$langDays) {
		if ($dataIso != '') self::explodeDataIso($dataIso);
		$s = '';
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}

	public static function getDataTimeIsoFormatString($datatimeIso='',$format='',$langMonts,$langDays,$opz) {
		if ($datatimeIso != '') self::explodeDataTimeIso($datatimeIso);
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}
		
	public static function getTimeFormatStringFromDataTimeIso($datatimeIso='',$format='') {
		if ($datatimeIso != '') self::explodeDataTimeIso($datatimeIso);
		$s = self::getTimeString($format);
		return $s;
		}


	public static function getTimeString($format) {
		if ($format == '') $format = 'HH:MM:SS';
		$s = '';
		switch ($format) {
			case 'HH:MM:SS':
					$s = self::$hours.':'.self::$minutes.':'.self::$seconds;
			break;
			}
		
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

			}
		return $s;		
		}

	public static function getDay() {	
		return self::$day;		
		}
		
	public static function getMonth() {	
		return self::$month;		
		}
		
	public static function getMonthStrings($arrayMonths,$params='') {	
		$maxchar = (isset($params['maxchar']) ? $params['maxchar'] : '');
		$str = $arrayMonths[intval(self::$month)];
		if ($maxchar != '') {
			$str = ToolsStrings::getStringFromTotChar($str,$maxchar);
			$str = rtrim($str,'.');
			}

		return $str;		
		}
		
	public static function getYear() {	
		return self::$year;		
		}
		
	public static function getDayOfDate($langDays,$opz) {
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);
		$dt = self::$year.'-'.self::$month.'-'.self::$day;
		$date = DateTime::createFromFormat('Y-m-d',$dt);
		$errors = DateTime::getLastErrors();
		if ($errors['error_count'] > 0 && $errors['warning_count']) { 
			return 'n.d.';		
			} else {
				$d = intval($date->format('m'));	
				$ds = $langDays[$d];
				return $ds;
				}
	
		}

	}
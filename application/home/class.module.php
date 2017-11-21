<?php
/**
* Framework siti html-PHP-Mysql
* PHP Version 7
* @author Roberto Mantovani (<me@robertomantovani.vr.it>
* @copyright 2009 Roberto Mantovani
* @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
* app/site-home/lass.module.php v.1.0.0. 07/02/2017
*/

class Module {
	private $action;
	public $error;
	public $message;
	public $messages;
	
	public function __construct($action,$table) 	{
		$this->action = $action;
		$this->appTable = $table;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();	
		}
		
	public function getScatBlockUrl($arr,$lastLogin) {
		/* preleva i dati del lla prima voce */
		$whereclause = (isset($arr['whereclause']) && $arr['whereclause'] != '' ? $arr['whereclause'] : '');		
		$where = 'created > ?';
		if ($whereclause != '') $where .= ' AND '.$whereclause;	
		Sql::initQuery($arr['table'],array('*'),array($lastLogin),$where,'','',false);		
		$itemData = Sql::getRecord();		
		$str = $arr['url item']['string'];
		$opz = $arr['url item']['opz'];
		$str = preg_replace('/{{URLSITEADMIN}}/',URL_SITE,$str);	
		/* aggoinge parametri */
		if (isset($opz) && is_array($opz) && count($opz) > 0) {
			$str.= '/';
			foreach ($opz As $key=>$value) {
				switch($key) {
					case 'fieldScatRif':
						if (isset($itemData->$value)) $str.= $itemData->$value;
					break;
					}
				}
			rtrim($str,'/');
			}
			
		return $str;
		}
	
			
	public function getScatUrl($itemData,$arr) {
		//print_r($itemData);
		$str = $arr['string'];
		$opz = $arr['opz'];
		$str = preg_replace('/{{URLSITEADMIN}}/',URL_SITE,$str);	
		/* aggoinge parametri */
		if (isset($opz) && is_array($opz) && count($opz) > 0) {
			$str.= '/';
			foreach ($opz As $key=>$value) {
				switch($key) {
					case 'fieldScatRif':
						if (isset($itemData->$value)) $str.= $itemData->$value;
					break;
					}
				}
			rtrim($str,'/');
			}
			
		return $str;
		}
	}
?>
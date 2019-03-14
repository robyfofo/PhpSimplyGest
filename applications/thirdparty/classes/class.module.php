<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * third-party/module.class.php v.1.0.0. 27/03/2018
*/

class Module {
	private $action;
	private $mainData;
	private $pagination;
	public $error;
	public $message;
	public $messages;
	public $errorType;

	public function __construct($action,$table) 	{
		$this->action = $action;
		$this->table = $table;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();
		}
		
	public function getUserdataAjax($id) {
		$obj = new stdClass;	
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */		
			Sql::initQuery($this->table,array('*'),array($id),'id = ?');	
			$obj = Sql::getRecord();			
			}
		return $obj;
	}
		
	public function listMainData($fields,$page,$itemsForPage,$languages,$opt=array()) {
		$optDef = array('lang'=>'it','type'=>0,'multilanguage'=>0,'tableItems'=>'','levelString'=>'<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-chevron-right "></i></button>&nbsp;');	
		$opt = array_merge($optDef,$opt);	
		$qry = "SELECT c.id AS id,
		c.parent AS parent,c.title,c.active AS active,
		(SELECT COUNT(id) FROM ".$this->table." AS s WHERE s.parent = c.id)  AS sons,
		(SELECT COUNT(id) FROM ".$opt['tableItems']." AS ite WHERE ite.id_cat = c.id)  AS items,";
		$qry .= "(SELECT p.title FROM ".$this->table." AS p WHERE c.parent = p.id)  AS titleparent";
		$qry .= " FROM ".$this->table." AS c
		WHERE c.parent = :parent";
		Sql::resetListDataVar();
		$this->mainData = Sql::getListParentData($qry,array(),0,$opt);
		}
		
	public function getMainData(){
		return $this->mainData;
		}	

	public function getPagination(){
		return $this->pagination;
		}		
	}
?>
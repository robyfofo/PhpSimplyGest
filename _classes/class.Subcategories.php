<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * classes/class.Subcategories.php v.1.2.0. 13/08/2020
*/

class Subcategories extends Core {	
	private static $mainData;
	public static $output = '';
	private static $treeLevel = 0;
	
	private static $dbTable = '';
	private static $dbTablePro = '';
	private static $langUser = 'it';
	private static $optGetNumProductds = 0;
	private static $optSqlOptions = '';
	private static $optImageFolder = 'warehouse/categories/';
	
	public function __construct(){
		parent::__construct();
	}
		
		
		
	/* SQL QUERIES */
		
	public static function getObjFromSubCategories($opt) {	
	    $optDef = array('tableCat'=>DB_TABLE_PREFIX.'warehouse_categories','tableItem'=>DB_TABLE_PREFIX.'warehouse_products','lang'=>'it','ordering'=>'title ASC','initParent'=>0);
		$opt = array_merge($optDef,$opt);
			
		$tableCat = (isset($opt['tableCat']) && $opt['tableCat'] != '' ? $opt['tableCat'] : '');
		$tableItem = (isset($opt['tableItem']) && $opt['tableItem'] != '' ? $opt['tableItem'] : '');
		$initParent = (isset($opt['initParent']) && $opt['initParent'] != '' ? $opt['initParent'] : 0);	
		$imageField = (isset($opt['imageField']) && $opt['imageField'] != '' ? $opt['imageField'] : false);
		$countItems = (isset($opt['countItems']) && $opt['countItems'] != '' ? $opt['countItems'] : false);
		$ordering = (isset($opt['ordering']) && $opt['ordering'] != '' ? $opt['ordering'] : 'ordering ASC');
		$languages = self::$globalSettings['languages'];
		
		$hideId = (isset($option['hideId']) ? $option['hideId'] : 0);
		$hideSons = (isset($option['hideSons']) ? ['hideSons'] : 0);
		
		$qry = "SELECT c.id AS id,c.parent AS parent, c.title AS title,";
		if ($imageField == true) $qry .= "c.filename AS filename,c.org_filename AS org_filename,";
		$qry .= "c.active AS active,";
		if ( $countItems == true) $qry .= "(SELECT COUNT(i.id) FROM ".$tableItem." AS i WHERE i.categories_id = c.id) AS items,";		
		$qry .= '(SELECT p.title FROM '.$tableCat.' AS p WHERE c.parent = p.id)  AS titleparent,';		
		$qry .= "(SELECT COUNT(id) FROM ".$tableCat." AS s WHERE s.parent = c.id)  AS sons";	
		$qry .= " FROM ".$tableCat." AS c
		WHERE c.parent = :parent 
		ORDER BY ".$ordering;
		
		//echo $qry;//die('fatto');
			
		$obj = '';
		Sql::resetListTreeData();
		Sql::resetListDataVar();
		Sql::setListTreeData($qry,$initParent,$opt);		
		$obj = Sql::getListTreeData();
		return $obj;		
		}
				
	public static function getCategoryDetails($id,$table,$opz) {
		$obj =  new stdClass;
		$actived = (isset($opz['actived']) ? $opz['actived'] : true);							
		/* prende la categoria indicata */
		$clause = 'id = ?';
		if ($actived == true) $clause .= ' AND active = 1';
		Sql::initQuery($table,array('*'),array($id),$clause);
		$obj = Sql::getRecord();	
		$obj = self::addCustomFields($obj);	
		return $obj;
	}
		
	public static function listMainData($table,$languages,$opt) {
		$optDef = array('tableItems'=>'','tableFiles'=>'','lang'=>'it','ordering'=>'ASC');	
		$opt = array_merge($optDef,$opt);
		$qry = "SELECT c.id AS id,c.parent AS parent, c.title,c.active AS active";
		if ($opt['tableItems'] != '') $qry .= ', (SELECT COUNT(i.id) FROM '.$opt['tableItems'].' AS i WHERE i.categories_id = c.id) AS items';
		if ($opt['tableFiles'] != '') $qry .= ', (SELECT COUNT(f.id) FROM '.$opt['tableFiles'].' AS f WHERE f.categories_id = c.id) AS files';
		
		/* prende il nome del parent */
		foreach($languages AS $lang) {
			$qry .= ", (SELECT p.title FROM ".$table." AS p WHERE c.parent = p.id)  AS titleparent";
		}
		$qry .= " FROM ".$table." AS c
		WHERE c.parent = :parent 
		ORDER BY c.title ".$opt['ordering'];	
		
		// query per il count dei soli parent = 0
		$opt['qryCountParentZero'] = "SELECT id FROM ".$table." WHERE parent = 0";
		$opt['orgQry'] = $qry; // preserva la query senza il limit

		//echo $qry;
		Sql::resetListTreeData();
		Sql::resetListDataVar();
		Sql::setListTreeData($qry,0,$opt);				
		self::$mainData = Sql::getListTreeData();
		//print_r(self::$mainData);
	}	
		
	public static function setTreeLevel($value) {
		self::$treeLevel = $value;
    }
		
	public static function setDbTable($value) {
	    self::$dbTable = $value;
	}
	
	public static function setDbTablePro($value) {
	    self::$dbTablePro = $value;
	}
	
	public static function setLangUser($value) {
	    self::$langUser = $value;
	}
	
	public static function setOptGetNumProductds($value) {
	    self::$optGetNumProductds = $value;
	}
	
	public static function setOptSqlOptions($value) {
	    self::$optSqlOptions = $value;
	}
	
	public static function setOptImageFolder($value) {
	    self::$optImageFolder = $value;
	}
	
	public static function getMainData() {
		return self::$mainData;
    }
    
    public static function addCustomFields($obj) {	
 		return $obj;	
	}
		
}
?>

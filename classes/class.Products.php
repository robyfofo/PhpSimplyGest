<?php
use Twig\Node\PrintNode;

/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	admin/classes/class.Products.php v.4.5.1. 15/07/2020
*/

class Products extends Core {
	
	private static $dbTable = '';
	private static $dbTableCat = '';
	private static $langUser = 'it';
	private static $optSqlOptions = '';
	private static $optImageFolder = 'warehouse/products/';
	private static $optQryClause = '';
	private static $optQryFieldsValues = '';
	private static $optGetCategoryOwner;

	public function __construct() 	{
		parent::__construct();
	}
	
	public static function getProductDetails($id){	
		$f = array('*');
		$fv = array($id,intval($id));
		Sql::initQuery(self::$dbTable,$f,$fv,'alias = ? OR id = ?' );
		$obj = Sql::getRecord();	
		if (Core::$resultOp->error > 0) {	ToolsStrings::redirect(URL_SITE.'error/db'); die(); }	
		$obj = self::addProductFields($obj);
		//print_r($obj);die();
		return $obj;	
	}

	public static function getProductsList($id) {
		$obj = array();
		$f = array('*');		
		$fv = array();			
		if (is_array(self::$optQryFieldsValues) && count(self::$optQryFieldsValues) > 0) {
			$fv = array_merge($fv,self::$optQryFieldsValues);
		}		
		$clause = 'active = 1';
		if (intval($id > 0)) {
			$fv[] = intval($id);
			$clause .= ' AND categories_id = ?'; 
		}
		if (self::$optQryClause != '') $clause .= ' AND '.self::$optQryClause;		
		Sql::initQueryBasic(self::$dbTable,$f,$fv,$clause);
		$pdoObject = Sql::getPdoObjRecords();	
		if (Core::$resultOp->error > 0) {	ToolsStrings::redirect(URL_SITE.'error/db'); die(); }
		while ($row = $pdoObject->fetch()) {
			$row = self::addProductFields($row);	
			if (self::$optGetCategoryOwner == true) $row->category = self::addCategoryOwnerFields($row->categories_id);			
			$obj[] = $row;
		}
		//print_r($obj);die();
		return $obj;	
	}
	
	public static function addProductFields($proobject){		
		$field = 'title_'.self::$langUser;	
		$proobject->title_locale = $proobject->$field;
		$proobject->title =  Multilanguage::getLocaleObjectValue($proobject,'title_',self::$langUser,array());
		$proobject->title_seo = Multilanguage::getLocaleObjectValue($proobject,'title_seo_',self::$langUser,array());
		$proobject->summary = Multilanguage::getLocaleObjectValue($proobject,'summary_',self::$langUser,array());
		$proobject->summary_nop = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $proobject->summary);
		$proobject->content = Multilanguage::getLocaleObjectValue($proobject,'content_',self::$langUser,array());
		$proobject->content_nop = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $proobject->content);
		$proobject->meta_title =  Multilanguage::getLocaleObjectValue($proobject,'meta_title_',self::$langUser,array());	
		$proobject->meta_description =  Multilanguage::getLocaleObjectValue($proobject,'meta_description_',self::$langUser,array());
		$proobject->meta_keyword = Multilanguage::getLocaleObjectValue($proobject,'meta_keyword_',self::$langUser,array());
		$proobject->url = URL_SITE.'products/dt/'.$proobject->id.'/'.SanitizeStrings::urlslug($proobject->title,array('deliliter'=>'-'));	
		$proobject->image_url = UPLOAD_DIR.self::$optImageFolder.$proobject->filename;	
		
		$proobject->price_tax = ($proobject->price_unity * $proobject->tax) / 100;
		$proobject->price_total = $proobject->price_unity + $proobject->price_tax;
		
		$proobject->valuta_price_unity = number_format(floatval($proobject->price_unity), 2, '.', '');
		$proobject->valuta_tax = number_format(floatval($proobject->tax), 2, '.', '');
		$proobject->valuta_price_tax = number_format(floatval($proobject->price_tax), 2, '.', '');
		$proobject->valuta_price_total = number_format(floatval($proobject->price_total), 2, '.', '');
				
		return $proobject;	
	}
	
	public static function addCategoryOwnerFields($id) {
		Subcategories::setLangUser(self::$langUser);
		$obj = Subcategories::getCategoryDetails($id,self::$dbTableCat,array('findOne'=>true));
		return $obj;
	}

	
	public static function setDbTable($value) {
		self::$dbTable = $value;
	}
	
	public static function setDbTableCat($value) {
		self::$dbTableCat = $value;
	}
	
	public static function setLangUser($value) {
		self::$langUser = $value;
	}
	
	public static function setOptSqlOptions($value) {
		self::$optSqlOptions = $value;
	}

	public static function setOptImageFolder($value) {
		self::$optImageFolder = $value;
	}
	
	public static function setOptQryClause($value) {
		self::$optQryClause = $value;
	}
	
	public static function setOptQryFieldsValues($value) {
		self::$optQryFieldsValues = $value;
	}
	
	public static function setOptGetCategoryOwner($value) {
		self::$optGetCategoryOwner = $value;
	}

}
?>
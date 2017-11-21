<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	admin/classes/class.Utilities.php v.1.0.0. 06/03/2017
*/
class Utilities extends Core {	
	static $totalpage = 0;
	static $treeResult = '';
	static $level = 0;
	private static $pagination;
	private static $arrayTitle = array(); /* gestione titoli parent sub categorie */

	public function __construct(){
		parent::__construct();
		}
					
	public static function getMessagesCore($obj) {
		$show = false;
		$error = 0;
		$type = 0;
		$content = '';				
		if (isset($obj->error)) $error = $obj->error;
		if (isset($obj->type)) $type = $obj->type;
		if (isset($obj->message) && $obj->message != '') $obj->messages[] = $obj->message;	
		/* content */	
			
		if (isset($obj->messages) && is_array($obj->messages) && count($obj->messages) > 0) {		
			$content .= implode('<br>',$obj->messages);	
			$show = true;
			}
		return array($show,$error,$type,$content);
		}

	public static function getPagination($page=1,$itemsTotal=1,$itemsForPage=1){	
		self::$pagination = new StdClass;				
		$arr = '';
		$loop_previous = 2;
		$loop_next = 2;
		$totalpage = 1;
		$previous = 1;
		$next = 1;
		$pagePrevious = array();
		$pageNext = array();
		$firstPartItem = 1;
		$lastPartItem = 1;

		if ($itemsForPage > 0) $totalpage = ceil($itemsTotal/$itemsForPage);	
		if ($page > $totalpage) $page = 1;	
		if ($itemsTotal >= $itemsForPage) {
			$previous = ($page > 1 ? $page - 1 : $page);
			if ($page == $totalpage) {
				$next = $page;
				} else if ($page < $totalpage) {
					$next = $page + 1;								
					}			
			if ($page < $loop_previous) {
				$loop_previous = 1;
				} else if ($page == $loop_previous) {
					$loop_previous = $page - $loop_previous + 1;
					} else if ($page > $loop_previous) {
						$loop_previous = $page - $loop_previous;
						}
			for ($i = $loop_previous; $i < $page; $i++) {
				$pagePrevious[] = $i;
				}
	
			$pgleft = $totalpage - $page;
				
			if ($pgleft < $loop_next) {
				$loop_next = $page + $pgleft;
				}
			if ($pgleft == $loop_next) {
				$loop_next = $page + $pgleft;
				}
			if ($pgleft > $loop_next) {
				$loop_next = $page + $loop_next;
				}
			for ($i = $page +1; $i < $loop_next + 1; $i++) {
				$pageNext[] = $i;				
				}
			
			$firstPartItem = ($page * $itemsForPage + 1) - $itemsForPage;
			$lastPartItem  = ($page * $itemsForPage);			
			if ($lastPartItem > $itemsTotal) $lastPartItem  = $itemsTotal;	
			
			}
			
		self::$pagination->totalpage = $totalpage;
		self::$pagination->itemPrevious = $previous;
		self::$pagination->itemNext = $next;
		self::$pagination->pagePrevious = $pagePrevious;
		self::$pagination->pageNext = $pageNext;
		self::$pagination->itemsTotal = $itemsTotal;
		self::$pagination->itemsForPage = $itemsForPage;
		self::$pagination->firstPartItem = $firstPartItem;
		self::$pagination->lastPartItem = $lastPartItem;
		self::$pagination->page = $page;
		return self::$pagination;		
		}
	
	public static function formatObjWithPagination($obj,$itemsForPage,$firstPartItem){
		/* crea l'array in base alla paginazione */
		$objTemp = '';
		$p1 = 0;
		for($p=0;$p<=$itemsForPage-1;$p++) {
			$key = $firstPartItem + $p - 1;
			if (isset($obj->$key)) {
				$objTemp->$key = new stdClass;
				$objTemp->$key = $obj->$key;
				$p1++;
				}
			}
		return $objTemp;
		}	
		
	public static function formatArrayWithPagination($obj,$itemsForPage,$firstPartItem){
		/* crea l'array in base alla paginazione */
		$objTemp = '';
		$p1 = 0;
		for($p=0;$p<=$itemsForPage-1;$p++) {
			$key = $firstPartItem + $p - 1;
			if (isset($obj[$key])) {
				$objTemp[$key] = new stdClass;
				$objTemp[$key] = $obj[$key];
				$p1++;
				}
			}
		return $objTemp;
		}	


	public static function decreaseFieldOrdering($id,$_lang,$opz='') {
		$table = (isset($opz['table']) && $opz['table'] != '' ? $opz['table'] : '');  
      $orderingType = (isset($opz['orderingType']) && $opz['orderingType'] != '' ? $opz['orderingType'] : 'DESC');		
		$parent = (isset($opz['parent']) && $opz['parent'] != '' ? $opz['parent'] : false);  
      $idFieldRif = (isset($opz['idFieldRif']) && $opz['idFieldRif'] != '' ? $opz['idFieldRif'] : 'id');
      $orderingFieldRif = (isset($opz['orderingFieldRif']) && $opz['orderingFieldRif'] != '' ? $opz['orderingFieldRif'] : 'ordering');
      $parentValue = (isset($opz['parentValue']) && $opz['parentValue'] != '' ? $opz['parentValue'] : 0);
      $parentField = (isset($opz['parentField']) && $opz['parentField'] != '' ? $opz['parentField'] : 'parent');
      /* recupera l'orinamento */
      /* imposta i campi di riferimento */
      $field = array('ordering');
      if ($parent == true) {
      	 $field = array($parentField,'ordering');
      	}
      /* prende l'ordinamento memorizzato */
      Sql::initQuery($table,$field,array($id),$idFieldRif.' = ?');
		$itemData = Sql::getRecord();
		if (self::$resultOp->type == 0) {
			/* controlla che si siano valori inferiori */
			/* imposta i campi di riferimento */
			$where = 'ordering < ?';
      	$fieldsValues = array($itemData->ordering);
      	if ($parent == true) {
      		$fieldsValues = array($itemData->ordering,$itemData->$parentField);
      		$where .= ' AND '.$parentField.' = ?';
      		}
      	$count = Sql::initQuery($table,array($id),$fieldsValues,$where);
      	if (self::$resultOp->type == 0) {
				$count = Sql::countRecord();				
				if ($count > 0) {	
					$where = 'ordering = ?';
      			$fieldsValues = array($itemData->ordering-1);
      			if ($parent == true) {
      				$fieldsValues = array($itemData->ordering-1,$itemData->$parentField);
      				$where .= ' AND '.$parentField.' = ?';
      				}
	      		/* controlla se c'e un ordine inferiore */					
					$count = Sql::initQuery($table,array($id),$fieldsValues,$where);
					$count = Sql::countRecord();					
					if (self::$resultOp->type == 0) {
						if ($count > 0) {	
							$where = $orderingFieldRif.' = ?';
	      				$fieldsValues = array($itemData->ordering,$itemData->ordering-1);
	      				if ($parent == true) {
	      					$fieldsValues = array($itemData->ordering,$itemData->ordering-1,$itemData->$parentField);
	      					$where .= ' AND '.$parentField.' = ?';
	      					}      		
							Sql::initQuery($table,array($orderingFieldRif),$fieldsValues,$where);
							Sql::updateRecord();							
							}
							$where = $idFieldRif.' = ?';
	      				$fieldsValues = array($itemData->ordering-1,$id);
	      				if ($parent == true) {
	      					$fieldsValues = array($itemData->ordering-1,$id,$itemData->$parentField);
	      					$where .= ' AND '.$parentField.' = ?';
	      					}      		
							Sql::initQuery($table,array($orderingFieldRif),$fieldsValues,$where);
							Sql::updateRecord();
							if (self::$resultOp->type == 0) {
								self::$resultOp->message =  ($orderingType == 'DESC' ? preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% spostata giu']).'!' : preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% spostata su']).'!');
								self::$resultOp->message = ucfirst(self::$resultOp->message);								
								} else {
									self::$resultOp->type == 1;
									self::$resultOp->message = $_lang['Non è possibile diminuire ordinamento!'];
									}			
      				} else {
							self::$resultOp->type == 1;
							self::$resultOp->message = $_lang['Non è possibile diminuire ordinamento!'];
							}
      			} else {
						self::$resultOp->type == 1;
						self::$resultOp->message = $_lang['Non è possibile diminuire ordinamento!'];
						}
			
				} else {
					self::$resultOp->type == 1;
					self::$resultOp->message = $_lang['Non è possibile diminuire ordinamento!'];
					}		 
			} else {
				self::$resultOp->type == 1;
				self::$resultOp->message = $_lang['Non è possibile diminuire ordinamento!'];
				}			
		}

	public static function increaseFieldOrdering($id,$_lang,$opz='') {
		$table = (isset($opz['table']) && $opz['table'] != '' ? $opz['table'] : '');  
      $orderingType = (isset($opz['orderingType']) && $opz['orderingType'] != '' ? $opz['orderingType'] : 'DESC');		
		$parent = (isset($opz['parent']) && $opz['parent'] != '' ? $opz['parent'] : false);  
      $idFieldRif = (isset($opz['idFieldRif']) && $opz['idFieldRif'] != '' ? $opz['idFieldRif'] : 'id');
      $orderingFieldRif = (isset($opz['orderingFieldRif']) && $opz['orderingFieldRif'] != '' ? $opz['orderingFieldRif'] : 'ordering');
      $parentValue = (isset($opz['parentValue']) && $opz['parentValue'] != '' ? $opz['parentValue'] : 0);
      $parentField = (isset($opz['parentField']) && $opz['parentField'] != '' ? $opz['parentField'] : 'parent');
      /* recupera l'orinamento */
      /* imposta i campi di riferimento */
      $field = array('ordering');
      if ($parent == true) {
      	 $field = array($parentField,'ordering');
      	}
      /* prende l'ordinamento memorizzato */
      Sql::initQuery($table,$field,array($id),$idFieldRif.' = ?');
		$itemData = Sql::getRecord();
		if (self::$resultOp->type == 0) {			
			/* controlla che si siano valori superiori */
			/* imposta i campi di riferimento */
			$where = 'ordering > ?';
      	$fieldsValues = array($itemData->ordering);
      	if ($parent == true) {
      		$fieldsValues = array($itemData->ordering,$itemData->$parentField);
      		$where .= ' AND '.$parentField.' = ?';
      		}
      	$count = Sql::initQuery($table,array($id),$fieldsValues,$where);
      	if (self::$resultOp->type == 0) {
				$count = Sql::countRecord();				
				if ($count > 0) {	
					/* controlla se c'e un ordine superiore */
					$where = 'ordering = ?';
      			$fieldsValues = array($itemData->ordering+1);
      			if ($parent == true) {
      				$fieldsValues = array($itemData->ordering+1,$itemData->$parentField);
      				$where .= ' AND '.$parentField.' = ?';
      				}
	      		/* controlla se c'e un ordine superiore */					
					$count = Sql::initQuery($table,array($id),$fieldsValues,$where);
					$count = Sql::countRecord();					
					if (self::$resultOp->type == 0) {
						if ($count > 0) {	
							$where = $orderingFieldRif.' = ?';
	      				$fieldsValues = array($itemData->ordering,$itemData->ordering+1);
	      				if ($parent == true) {
	      					$fieldsValues = array($itemData->ordering,$itemData->ordering+1,$itemData->$parentField);
	      					$where .= ' AND '.$parentField.' = ?';
	      					}      		
							Sql::initQuery($table,array($orderingFieldRif),$fieldsValues,$where);
							Sql::updateRecord();							
							}
							$where = $idFieldRif.' = ?';
	      				$fieldsValues = array($itemData->ordering+1,$id);
	      				if ($parent == true) {
	      					$fieldsValues = array($itemData->ordering+1,$id,$itemData->$parentField);
	      					$where .= ' AND '.$parentField.' = ?';
	      					}      		
							Sql::initQuery($table,array($orderingFieldRif),$fieldsValues,$where);
							Sql::updateRecord();
							if (self::$resultOp->type == 0) {  
								self::$resultOp->message = ($orderingType == 'DESC' ? preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% spostata su']).'!' : preg_replace('/%ITEM%/',$_lang['voce'],$_lang['%ITEM% spostata giu']).'!');
								self::$resultOp->message = ucfirst(self::$resultOp->message);
								} else {
									self::$resultOp->type == 1;
									self::$resultOp->message = $_lang['Non è possibile aumentare ordinamento!'];
									}											
      				} else {
							self::$resultOp->type == 1;
							self::$resultOp->message = $_lang['Non è possibile aumentare ordinamento!'];
							}
      			} else {
						self::$resultOp->type == 1;
						self::$resultOp->message = $_lang['Non è possibile aumentare ordinamento!'];
						}
			
				} else {
					self::$resultOp->type == 1;
					self::$resultOp->message = $_lang['Non è possibile aumentare ordinamento!'];
					}		 
			} else {
				self::$resultOp->type == 1;
				self::$resultOp->message = $_lang['Non è possibile aumentare ordinamento!'];
				}			
		}
		
	public static function setItemDataObjWithPost($obj,$fields) {
		if (is_array($fields) && count($fields) > 0) {
			foreach($fields AS $key=>$value) {
				if (isset($_POST[$key])) $obj->$key = $_POST[$key];
				}
			}
		return $obj;
		}
	
	/* VOCI AD ALBERO */     
	
	public static function filterListDataObj($mainData,$fieldsSearch,$search) {  
		$obj = new stdclass();
		$arr = array();		
		if (is_array($mainData)) {
			foreach ($mainData AS $key => $value) {
				$copy = false;				
				if (is_array($fieldsSearch)) {
					foreach ($fieldsSearch AS $key1 => $value1) {
						if (isset($value->$key1)) {
							if (strripos($value->$key1,$search) !== false) $copy = true;
							}				
						}
					}							
				if ($copy == true) $arr[] = $value;
				}		
			}	
  		return $arr;
		}

	public static function filterListDataArray($mainData,$fieldsSearch,$search) { 
		$obj = new stdclass();
		$arr = array();		
		if (is_array($mainData)) {
			foreach ($mainData AS $key => $value) {
				$copy = false;				
				if (is_array($fieldsSearch)) {
					foreach ($fieldsSearch AS $key1 => $value1) {
						if (isset($value->$key1)) {
							if (strripos($value->$key1,$search) !== false) {
								$copy = true;
								}							
							}
						}
					}							
				if ($copy == true) $arr[] = $value;
				}		
			}	
  		return $arr;
		}

	public static function generatePagesTreeUlList($obj,$parent,$opz,$activePage=1) {
		$has_children = false;
		$classMainUl = (isset($opz['classMainUl']) && $opz['classMainUl'] != '' ? $opz['classMainUl'] : '');  
      $classSubUl = (isset($opz['classSubUl']) && $opz['classSubUl'] != '' ? $opz['classSubUl'] : ''); 
		$ulclass = '';		
		
		$classMainLi = (isset($opz['classMainLi']) && $opz['classMainLi'] != '' ? $opz['classMainLi'] : '');  
      $classSubLiParent = (isset($opz['classSubLiParent']) && $opz['classSubLiParent'] != '' ? $opz['classSubLiParent'] : ''); 
      $classSubLi = (isset($opz['classSubLi']) && $opz['classSubLi'] != '' ? $opz['classSubLi'] : ''); 
      $classDefLi = (isset($opz['classDefLi']) && $opz['classDefLi'] != '' ? $opz['classDefLi'] : '');     
      $classLi = $classDefLi;  	
		
		$classMainAref = (isset($opz['classMainAref']) && $opz['classMainAref'] != '' ? $opz['classMainAref'] : '');  
		$classSubArefParent = (isset($opz['classSubArefParent']) && $opz['classSubArefParent'] != '' ? $opz['classSubArefParent'] : ''); 
      $classSubAref = (isset($opz['classSubAref']) && $opz['classSubAref'] != '' ? $opz['classSubAref'] : ''); 
		$classAref = $classSubAref;		
		
		$aRefSuffixStringMain = (isset($opz['aRefSuffixStringMain']) && $opz['aRefSuffixStringMain'] != '' ? $opz['aRefSuffixStringMain'] : ''); 
      $aRefSuffixStringSubParent = (isset($opz['aRefSuffixStringSubParent']) && $opz['aRefSuffixStringSubParent'] != '' ? $opz['aRefSuffixStringSubParent'] : '');  
      $aRefSuffixStringSub = (isset($opz['aRefSuffixStringSub']) && $opz['aRefSuffixStringSub'] != '' ? $opz['aRefSuffixStringSub'] : '');
		$aRefSuffixString =  $aRefSuffixStringSub; 
		
		$titlePrefixStringMain = (isset($opz['titlePrefixStringMain']) && $opz['titleSuffixStringMain'] != '' ? $opz['titlePrefixStringMain'] : ''); 
      $titlePrefixStringSubParent = (isset($opz['titlePrefixStringSubParent']) && $opz['titlePrefixStringSubParent'] != '' ? $opz['titlePrefixStringSubParent'] : '');  
      $titlePrefixStringSub = (isset($opz['titlePrefixStringSub']) && $opz['titlePrefixStringSub'] != '' ? $opz['titlePrefixStringSub'] : '');
		$titlePrefixString =  $titlePrefixStringSub;       
		
		$titleSuffixStringMain = (isset($opz['titleSuffixStringMain']) && $opz['titleSuffixStringMain'] != '' ? $opz['titleSuffixStringMain'] : ''); 
      $titleSuffixStringSubParent = (isset($opz['titleSuffixStringSubParent']) && $opz['titleSuffixStringSubParent'] != '' ? $opz['titleSuffixStringSubParent'] : '');  
      $titleSuffixStringSub = (isset($opz['titleSuffixStringSub']) && $opz['titleSuffixStringSub'] != '' ? $opz['titleSuffixStringSub'] : '');
		$titleSuffixString =  $titleSuffixStringSub;  
		
		$showId = (isset($opz['showId']) && $opz['showId'] != '' ? $opz['showId'] : false);
		
		$titleField = (isset($opz['titleField']) && $opz['titleField'] != '' ? $opz['titleField'] : '');     

		$langSuffix = (isset($opz['langSuffix']) && $opz['langSuffix'] != '' ? $opz['langSuffix'] : 'it');
		$valueUrlDefault = (isset($opz['valueUrlDefault']) && $opz['valueUrlDefault'] != '' ? $opz['valueUrlDefault'] : '');
		$valueUrlEmpty = (isset($opz['valueUrlEmpty']) && $opz['valueUrlEmpty'] != '' ? $opz['valueUrlEmpty'] : '');
			
		if(is_array($obj) && count($obj) > 0) {
		foreach($obj AS $key=>$value) {	
			
			if (intval($value->parent) == $parent) { 
			    
				if ($has_children === false) {
            	/* Switch the flag, start the list wrapper, increase the level count */         
            	$has_children = true; 
					/* mostra id */
           		$strShowHrefId = '';
           		$strShowLiId = '';
           		$strShowUlId = '';
	           	if ($showId == true) {
	           		$strShowHrefId = ' id="APage'.$value->id.'ID"';
	           		$strShowLiId = ' id="liPage'.$value->id.'ID"';
	           		$strShowUlId = ' id="UlPage'.$value->id.'ID"';  
	           		}	            
	            if (self::$level == 0) $ulclass = $classMainUl;
					if (self::$level > 0) $ulclass = $classSubUl;
            	if(self::$level > $opz['MainUl']) self::$treeResult .= '<ul'.$strShowUlId.' class="'.$ulclass.'">'."\n";  
          		}
          		      
					$fieldTitle = 'title_';
          		$fieldTitleSeo = 'title_seo_';
          		$fieldTitleMeta = 'title_meta_'; 
          		        		
          		if ($titleField != '')  $fieldTitle = rtrim($titleField,'_').'_'.$langSuffix; 
          		
          		/* gestione multilingua */  
          		$valueTitle = Multilanguage::getLocaleObjectValue($value,$fieldTitle,$langSuffix,array());
          		$valueTitleSeo = Multilanguage::getLocaleObjectValue($value,$fieldTitleSeo,$langSuffix,array());
          		$valueTitleMeta = Multilanguage::getLocaleObjectValue($value,$fieldTitleMeta,$langSuffix,array());
        		       	

          		if(self::$level == 0) $classLi = $classMainLi; 
          		if(self::$level == 0 && $value->sons == 0) $classLi = $classSubLi; 
         		if(self::$level > 0 && $value->sons > 0) $classLi = $classSubLiParent;
         		if(self::$level > 0 && $value->sons == 0) $classLi = $classDefLi;       		
         		/* active page */
         		if(self::$level == 0 && $value->alias == $activePage) $classLi .= ' active';					
					if(self::$level == 0) $classAref = $classMainAref; 
          		if(self::$level == 0 && $value->sons == 0) $classAref = $classSubAref; 
         		if(self::$level > 0 && $value->sons > 0) $classAref = $classSubArefParent;					
					if(self::$level == 0) $aRefSuffixString = $aRefSuffixStringMain; 
          		if(self::$level == 0 && $value->sons == 0) $aRefSuffixString = $aRefSuffixStringSub; 
         		if(self::$level > 0 && $value->sons > 0) $aRefSuffixString = $aRefSuffixStringSubParent;         		
					if(self::$level == 0) $titlePrefixString = $titlePrefixStringMain; 
          		if(self::$level == 0 && $value->sons == 0) $titlePrefixString = $titlePrefixStringSub; 
         		if(self::$level > 0 && $value->sons > 0) $titlePrefixString = $titlePrefixStringSubParent;
         		if(self::$level > 0 && $value->sons == 0) $titlePrefixString = $titlePrefixStringSub;
         		if(self::$level == 0) $titleSuffixString = $titleSuffixStringMain; 
          		if(self::$level == 0 && $value->sons == 0) $titleSuffixString = $titleSuffixStringSub; 
         		if(self::$level > 0 && $value->sons > 0) $titleSuffixString = $titleSuffixStringSubParent;
         		if(self::$level > 0 && $value->sons == 0) $titleSuffixString = $titlePrefixStringSub;
					
					/* crea l'url */					
					switch($value->type) {
						case 'label':
							$target = '';
							$hrefValue = $valueUrlEmpty;
							$pagesModule = '';							
						break;
						case 'module':
							$target = '';
							$hrefValue = URL_SITE.$value->url;
							$pagesModule = '';
						break;			
						case 'url':
							$target = $value->target;
							$hrefValue = $value->url;							
							$pagesModule = '';
						break;						
						default:
							$target = '';
							$pagesModule = (isset($opz['pagesModule']) && $opz['pagesModule'] != '' ? $opz['pagesModule'] :  URL_SITE.'page/');
					 		$hrefValue = $valueUrlDefault;			      
			     			$hrefValue = $pagesModule.$hrefValue;
						break;
              		}
              		
              	$hrefValue = str_replace('{{URLSITE}}',URL_SITE,$hrefValue);	
              	$hrefValue = preg_replace('/{{ID}}/',$value->id,$hrefValue);
	      		$hrefValue = preg_replace('/{{SEO}}/',$valueTitleSeo,$hrefValue);
	      		$hrefValue = preg_replace('/{{SEOCLEAN}}/', SanitizeStrings::urlslug($valueTitleSeo,array()),$hrefValue);
	      		$hrefValue = preg_replace('/{{SEOENCODE}}/', urlencode($valueTitleSeo),$hrefValue);
	      		$hrefValue = preg_replace('/{{TITLE}}/', urlencode($valueTitleSeo),$hrefValue); 
             		              
					self::$treeResult .= '<li'.$strShowLiId.' class="'.$classLi.'">'."\n";					
					self::$treeResult .= '<a'.$strShowHrefId.' class="'.$classAref.'" href="'.$hrefValue.'"';
					if($target != '') self::$treeResult .= ' target="'.$target.'"';
					self::$treeResult .= $aRefSuffixString.'>'."\n"; 
					self::$treeResult .= $titlePrefixString.$valueTitle.$titleSuffixString."\n";  			
					self::$treeResult .= '</a>'."\n";
					$id = intval($value->id);
					self::$level++;	
					self::generatePagesTreeUlList($obj,$id,$opz); 
					self::$level--;										
					self::$treeResult .= '</li>'."\n";
	 				}	 		
		 		}
		 	}
			if ($has_children === true && self::$level > $opz['MainUl']) self::$treeResult .= '</ul>'."\n";
		}
		
	public static function getTitleParent($obj,$id,$field,$opz='') {
		$output = '';
		self::$arrayTitle = '';
		self::getTitleParentSub($obj,$id,$field,$opz);
		if (is_array(self::$arrayTitle)) {
			$c = count(self::$arrayTitle);
			unset(self::$arrayTitle[0]);
         krsort(self::$arrayTitle);
         $output = implode('->', self::$arrayTitle);
         }
		if ($output != '') $output .= '->';
		return $output;		
		}
		
	public static function getTitleParentSub($obj,$id,$field,$opz) {	
		if ($id > 0) {
			foreach ($obj AS $key => $value) {				
				if ($id == $value->id) {
					$key = $value->parent;
					self::$arrayTitle[] = $value->$field;
					self::getTitleParentSub($obj,$key,$field,$opz);
					break;
					}	
				}
			}
		}

	public static function resetTreeResult() {
		self::$treeResult = '';
		}
	
	public static function getTreeResult() {
		return self::$treeResult;
		}

	}
?>

<?php
/**
* Framework siti html-PHP-Mysql
* PHP Version 7
* @author Roberto Mantovani (<me@robertomantovani.vr.it>
* @copyright 2009 Roberto Mantovani
* @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
* app/site-home/index.php v.1.0.0. 22/02/2017
*/

//Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.'application/'.Core::$request->action."/class.module.php");

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('help_small','help'),array('site-home'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && isset($obj)) $App->params = $obj;

$tablesDb = Sql::getTablesDatabase($globalSettings['database'][DATABASE]['name']);

/* variabili ambiente */
$App->codeVersion = ' 1.0.0.';
$App->pageTitle = $_lang['pagetitle'];
$App->pageSubTitle = $_lang['pagesubtitle'];
$Module = new Module('','home');
$App->Module = $Module;

$App->breadcrumb .= '<li class="active"><i class="icon-home"></i> Home</li>';
//Core::setDebugMode(1);
$App->countPanel = array();
$today = $App->nowDateTime;
$App->lastLogin = (isset($_MY_SESSION_VARS['lastLogin']) ? $_MY_SESSION_VARS['lastLogin'] : $today);
//$App->lastLogin = '2015-01-01 00:00:00';
$App->lastLoginLang = DateFormat::getDataTimeIsoFormatString($App->lastLogin,$_lang['data time format string'],$_lang['months'],$_lang['months'],array());

$App->templateApp = 'list.tpl.php';
$numCountPanel = 0;
switch(Core::$request->method) {
	default;	
		$App->moduleHome = array();
		$App->homeBlocks = array();
		$App->homeTables = array();	
		/* 
		colori disponibili
		.panel-primary (blue)
		.panel-default (grigio)
		.panel-success (verde)
		.panel-info (turchese)
		.panel-warning
		.panel-danger
		.panel-green 
		.panel-red 
		.panel-yellow
		*/		 
		$App->panels = array(
			'info'=>array('panel-primary','panel-default','panel-info','panel-green','panel-red','panel-yellow'),
			'alert'=>array('panel-warning'),
			'danger'=>array('panel-danger'),
			'success'=>array('panel-success')	
		);		
		$App->panelsInfo = count($App->panels['info']);
		$App->panelsAlert = count($App->panels['alert']);
		$App->panelsDanger = count($App->panels['danger']);
		$App->panelsSuccess = count($App->panels['success']);
		
		/* prendo i dati per moduli base */
		if (file_exists(PATH."application/site-home/custom.php")) include_once(PATH."application/site-home/base.php");
	
		/* prendo i dati per moduli custom */
		if (file_exists(PATH."application/site-home/custom.php")) include_once(PATH."application/site-home/custom.php");
			
	break;	
}

//print_r($App->homeBlocks);

/* sistemo i dati */
$arr = array();
if (is_array($App->homeBlocks) && count($App->homeBlocks) > 0) {
	$panelsinfo = 0;
	$panelsalert = 0;
	$panelsdanger = 0;
	$panelssuccess = 0;
	
	foreach ($App->homeBlocks AS $key => $value) {
		$module = (isset($value['module']) && $value['module'] != '' ? $value['module'] : $key);
		$whereclause = (isset($value['whereclause']) && $value['whereclause'] != '' ? $value['whereclause'] : '');
		$value['class'] = (isset($value['class']) ? $value['class'] :'');
		$value['type'] = (isset($value['type']) ? $value['type'] :'');
		
		$where = 'created > ?';
		if ($whereclause != '') $where .= ' AND '.$whereclause;	
		Sql::initQuery($value['table'],array('id'),array($App->lastLogin),$where,'','',false);		
		$items = Sql::countRecord();
		$value['items'] =  $items;
	
		
		if ($value['class'] == '') {
			switch($value['type']) {
				case 'alert':
					$value['class'] = $App->panels['alert'][$panelsalert];
					$panelsalert = $panelsalert + 1;
					if ($panelsalert > ($App->panelsAlert - 1)) $panelsalert = 0;
				break;					
				case 'danger':
					$value['class'] = $App->panels['danger'][$panelsdanger];
					$panelsalert = $panelsdanger + 1;
					if ($panelsdanger > ($App->panelsDanger - 1)) $panelsdanger = 0;
				break;
				case 'success':
					$value['class'] = $App->panels['success'][$panelssuccess];
					$panelssuccess = $panelssuccess + 1;
					if ($panelssuccess > ($App->panelsSuccess - 1)) $panelssuccess = 0;
				break;
										
				default:
				case 'info':
					$value['class'] = $App->panels['info'][$panelsinfo];
					$panelsinfo = $panelsinfo + 1;
					if ($panelsinfo > ($App->panelsInfo - 1)) $panelsinfo = 0;
				break;				
				}
			
			/* aggiungi url */
			if (isset($value['url']) && $value['url'] == true) {
				$value['url'] = $Module->getItemBlockUrl($value,$App->lastLogin);
				} else {
					$value['url'] = URL_SITE.$module;
					}							
			}
		$arr[] = $value;
		}
	}
$App->homeBlocks = $arr;					

/* sistemo i dati */
$arr = array();
if (is_array($App->homeTables) && count($App->homeTables) > 0) {
	foreach ($App->homeTables AS $key => $value) {	
		/* aggiunge i campi */
		Sql::initQuery($value['table'],array('*'),array(),'','created DESC',' LIMIT 5 OFFSET 0','',false);
		$value['itemdata'] = Sql::getRecords();

		/* sistemo i dati */
		$arr1 = array();
		if (is_array($value['itemdata']) && count($value['itemdata']) > 0) {
			foreach ($value['itemdata'] AS $key1 => $value1) {
				/* data */
				$data = DateTime::createFromFormat('Y-m-d H:i:s',$value1->created);				
				$value1->datacreated = '<a href="'.URL_SITE.$key.'" title="'.ucfirst($_lang['creata il']).' '.$data->format('d/m/Y').' '.$data->format('H:i:s').'"><i class="fa fa-clock-o" aria-hidden="true"> </i></a>';
				/* genera url */
				$value1->url = URL_SITE.$key;				
				if (is_array($value['fields']) && count($value['fields']) > 0) {
					foreach ($value['fields'] AS $keyF => $valueF) {
						/* creo output del del campo */	
						$str = '';						
						if ($keyF != '') {
							//echo $keyF;
							$type = (isset($value['fields'][$keyF]['type']) && $value['fields'][$keyF]['type'] != '' ? $value['fields'][$keyF]['type'] : '');
							switch($type) {									
								case 'text':
									if (isset($value1->$keyF)) $output = strip_tags($value1->$keyF);
								break;
								case 'image':																
									$path = (isset($value['fields'][$keyF]['path']) ? $value['fields'][$keyF]['path'] :  UPLOAD_DIR.'/');	
									$pathdef = (isset($value['fields'][$keyF]['path def']) ? $value['fields'][$keyF]['path def'] :  '');	
									if ($pathdef == '')	$pathdef = $path;																																
									if ($value1->$keyF != ''){
										$output = '<a class="" href="'.$path.$value1->$keyF.'" rel="prettyPhoto[]" title="'.ucfirst($_lang['immagine zoom']).'"><img class="img-thumbnail"  src="'.$path.$value1->$keyF.'" alt=""></a>';
										} else {
											$output = '<img class="img-thumbnail"  src="'.$pathdef.$value1->$keyF.'default/image.png" alt="'.ucfirst($_lang['immagine di default']).'">';
											}
								break;							
								case 'imagefolder':		
									$folderField = (isset($value['fields'][$keyF]['folderField']) ? $value['fields'][$keyF]['folderField'] : 'folder_name');														
									$path = (isset($value['fields'][$keyF]['path']) ? $value['fields'][$keyF]['path'] :  UPLOAD_DIR.'/');
									$path =	$path.$value1->$folderField;																		
									if ($value1->$keyF != ''){
										$output = '<a class="" href="'.$path.$value1->$keyF.'" rel="prettyPhoto[]" title="'.ucfist($_lang['immagine zoom']).'"><img class="img-thumbnail"  src="'.$path.$value1->$keyF.'" alt=""></a>';
										}
								break;																
								case 'file':															
									if ($value1->$keyF != ''){
										$u = $Module->getItemUrl($value1,$value['fields'][$keyF]['url item']);
										$output = '<a class="" href="'.$u.'" title="'.ucfirst($_lang['scarica il file']).'">'.$value1->$keyF.'</a>';
										}
								break;

								
								default:
									$output = $value1->$keyF;
								break;
								
								}
								
							/* aggiungi url */
							if (isset($value['fields'][$keyF]['url']) && $value['fields'][$keyF]['url'] == true) {
								if (isset($value['fields'][$keyF]['url item']) && is_array($value['fields'][$keyF]['url item']) && count($value['fields'][$keyF]['url item']) > 0) {
									$u = $Module->getItemUrl($value1,$value['fields'][$keyF]['url item']);
									$output = '<a href="'.$u.'" title="'.ucfirst($_lang['vai alla lista']).'">'.$output.'</a>';								
									} else {
										$output = '<a href="'.URL_SITE.$key.'" title="'.ucfirst($_lang['vai alla lista']).'">'.$output.'</a>';										
										}							
								}							
							$value1->$keyF = $output;							
							}							
						}
					}				
				$arr1[] = $value1;
				}
			}		
		$value['itemdata'] =  $arr1;		
		$value['icon panel'] = (isset($value['icon panel']) ? $value['icon panel'] : 'fa-newspaper-o');
		$arr[] = $value;
		}
	}
$App->homeTables = $arr;					


$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js//module.js"></script>';
?>

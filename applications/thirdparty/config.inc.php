<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * third-party/config.inc.php v.1.0.0. 06/06/2018
*/

$App->params = new stdClass();
$App->params->label = "Soggetti Terzi"; 
/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('thirdparty'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && isset($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = $App->params->label;
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.$App->params->label.'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();

/* ITEMS */
$App->params->tables['item']  = DB_TABLE_PREFIX.'thirdparty';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_cat'=>array('label'=>'ID Categoria','required'=>true,'type'=>'int'),
	'id_type'=>array('label'=>'Tipo','required'=>false,'type'=>'int','defValue'=>0,'validate'=>'int'),
	'ragione_sociale'=>array('label'=>'Ragione Sociale','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'name'=>array('label'=>'Nome','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'surname'=>array('label'=>'Cognome','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'street'=>array('label'=>'Via','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'city'=>array('label'=>'Città','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'zip_code'=>array('label'=>'C.A.P.','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'province'=>array('label'=>'Provincia','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'state'=>array('label'=>'Stato','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'telephone'=>array('label'=>'Telefono','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'email'=>array('label'=>'Email','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'mobile'=>array('label'=>'Cellulare','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'fax'=>array('label'=>'Fax','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'partita_iva'=>array('label'=>'Partita IVA','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'codice_fiscale'=>array('label'=>'Codice Fiscale','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>1,'validate'=>'int')
	);	
	
/* SUBCATEGORIES */
$App->params->tables['scat']  = DB_TABLE_PREFIX.'thirdparty_subcategories';
$App->params->fields['scat']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'parent'=>array('label'=>'Parent','required'=>false,'type'=>'int','defValue'=>0,'validate'=>'int'),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'title'=>array('label'=>'Titolo','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>1,'validate'=>'int')
	);	
	
/* TYPES */
$App->params->tables['type']  = DB_TABLE_PREFIX.'thirdparty_types';


?>
<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * third-party/config.inc.php v.1.2.0. 12/08/2020
*/

$App->params = new stdClass();
$App->params->label = ucfirst($_lang['soggetti terzi']); 
/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('third-party'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.2.0.';
$App->params->pageTitle = $App->params->label;
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.$App->params->label.'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersTypes = array();

/* ITEMS */
$App->params->tables['item']  = DB_TABLE_PREFIX.'thirdparty';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'int|8','autoinc'=>true,'nodb'=>true,'primary'=>true),
	'users_id'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>false,'type'=>'int|8','defValue'=>$App->userLoggedData->id),
	'categories_id'=>array('label'=>'ID '.$_lang['categoria'],'required'=>true,'type'=>'int|8'),
	'id_type'=>array('label'=>$_lang['tipo'],'required'=>false,'type'=>'int','defValue'=>0,'validate'=>'int|1'),
	'ragione_sociale'=>array('label'=>$_lang['ragione sociale'],'searchTable'=>true,'required'=>true,'type'=>'varchar|255'),
	'name'=>array('label'=>$_lang['nome'],'searchTable'=>true,'required'=>false,'type'=>'varchar|50'),
	'surname'=>array('label'=>$_lang['cognome'],'searchTable'=>true,'required'=>false,'type'=>'varchar|50'),
	'street'=>array('label'=>$_lang['via'],'searchTable'=>false,'required'=>false,'type'=>'varchar|100'),
	'city'=>array('label'=>$_lang['città'],'searchTable'=>false,'required'=>false,'type'=>'varchar|100'),
	'zip_code'=>array('label'=>$_lang['cap'],'searchTable'=>false,'required'=>false,'type'=>'varchar|10'),
	'province'=>array('label'=>$_lang['provincia'],'searchTable'=>false,'required'=>false,'type'=>'varchar|100'),
	'state'=>array('label'=>$_lang['stato'],'searchTable'=>false,'required'=>false,'type'=>'varchar|100'),
	'telephone'=>array('label'=>$_lang['telefono'],'searchTable'=>false,'required'=>false,'type'=>'varchar|20'),
	'email'=>array('label'=>$_lang['email'],'searchTable'=>true,'required'=>false,'type'=>'varchar|255'),
	'mobile'=>array('label'=>$_lang['cellulare'],'searchTable'=>true,'required'=>false,'type'=>'varchar|20'),
	'fax'=>array('label'=>$_lang['fax'],'searchTable'=>true,'required'=>false,'type'=>'varchar|20'),
	'partita_iva'=>array('label'=>$_lang['partita IVA'],'searchTable'=>false,'required'=>false,'type'=>'varchar|50'),
	'codice_fiscale'=>array('label'=>$_lang['codice fiscale'],'searchTable'=>false,'required'=>false,'type'=>'varchar|50'),
	'pec'=>array('label'=>'PEC','searchTable'=>true,'required'=>false,'type'=>'varchar|255'),
	'sid'=>array('label'=>'SID','searchTable'=>true,'required'=>false,'type'=>'varchar|50'),
	
	'stampa_quantita'=>array('label'=>'Stampa quantità','searchTable'=>false,'required'=>false,'type'=>'int|1','defValue'=>'0','validate'=>'int'),
	'stampa_unita'=>array('label'=>'Stampa unità','searchTable'=>false,'required'=>false,'type'=>'int|1','defValue'=>'0','validate'=>'int'),

	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>$_lang['attiva'],'required'=>false,'type'=>'int|1','defValue'=>0,'validate'=>'int')
	);	
	
/* SUBCATEGORIES */
$App->params->orderTypes['cate'] = 'DESC';
$App->params->tables['cate']  = DB_TABLE_PREFIX.'thirdparty_categories';
$App->params->fields['cate']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'int|8','autoinc'=>true,'nodb'=>true,'primary'=>true),
	'users_id'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>false,'type'=>'int|8','defValue'=>$App->userLoggedData->id),
	'parent'=>array('label'=>'Parent','required'=>false,'type'=>'int','defValue'=>0,'validate'=>'int'),
	'title'=>array('label'=>$_lang['titolo'],'searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>$_lang['attiva'],'required'=>false,'type'=>'int|1','defValue'=>0,'validate'=>'int')
	);	
	
/* TYPES */
$App->params->tables['type']  = DB_TABLE_PREFIX.'thirdparty_types';
?>
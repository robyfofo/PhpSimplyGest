<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/config.inc.php v.1.0.0. 16/01/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('invoices'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && isset($obj) && count((array)$obj) > 1) $App->params = $obj;
if (!isset($App->params->label) || (isset($App->params->label) && $App->params->label == '')) die('Error reading module settings!');

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = $App->params->label;
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.$App->params->label.'</li>';

$App->params->defaultTax = '0';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();

/* INVOICES PURCHASE type = 1 */
$App->params->tables['itep']  = DB_TABLE_PREFIX.'invoices_purchases';
$App->params->fields['itep']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_customer'=>array('label'=>$_lang['cliente'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>'0','validate'=>'int'),
	'dateins'=>array('label'=>$_lang['data'],'searchTable'=>false,'required'=>true,'type'=>'date','defValue'=>$App->nowDate,'validate'=>'datepicker'),
	'datesca'=>array('label'=>$_lang['data scadenza'],'searchTable'=>false,'required'=>true,'type'=>'date','defValue'=>$App->nowDate,'validate'=>'datepicker'),
	'number'=>array('label'=>$_lang['numero'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>''),
	'type'=>array('label'=>$_lang['tipo'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>'0','validate'=>'int'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datetimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>'0','validate'=>'int')
	);
	
/* INVOICES SALES type = 1 */
$App->params->tables['ites']  = DB_TABLE_PREFIX.'invoices_sales';
$App->params->fields['ites']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_customer'=>array('label'=>$_lang['cliente'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>'0','validate'=>'int'),
	'dateins'=>array('label'=>$_lang['data'],'searchTable'=>false,'required'=>true,'type'=>'date','defValue'=>$App->nowDate,'validate'=>'datepicker'),
	'datesca'=>array('label'=>$_lang['data scadenza'],'searchTable'=>false,'required'=>true,'type'=>'date','defValue'=>$App->nowDate,'validate'=>'datepicker'),
	'number'=>array('label'=>$_lang['numero'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>''),
	'description'=>array('label'=>$_lang['descrizione'],'searchTable'=>true,'required'=>false,'type'=>'varchar','defValue'=>''),
	'type'=>array('label'=>$_lang['tipo'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>'0','validate'=>'int'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datetimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>'0','validate'=>'int')
	);
	
/* INVOICES PURCHASE ARTICLES */
$App->params->tables['item']  = DB_TABLE_PREFIX.'invoices_articles';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_invoice'=>array('label'=>$_lang['voce'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>'0','validate'=>'int'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>false,'required'=>true,'type'=>'text','defValue'=>''),
	'price_unity'=>array('label'=>$_lang['prezzo unitario'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'price_tax'=>array('label'=>$_lang['imponibile'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'price_total'=>array('label'=>$_lang['prezzo totale'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'quantity'=>array('label'=>$_lang['quantità'],'searchTable'=>true,'required'=>true,'type'=>'int','defValue'=>'22','validate'=>'int'),	
	'tax'=>array('label'=>$_lang['tassa'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>'22'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datetimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>'0','validate'=>'int')
	);
	
/* INVOICES SALES ARTICLES */
$App->params->tables['item']  = DB_TABLE_PREFIX.'invoices_sales_articles';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_invoice'=>array('label'=>$_lang['voce'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>'0','validate'=>'int'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>false,'required'=>true,'type'=>'text','defValue'=>''),
	'price_unity'=>array('label'=>$_lang['prezzo unitario'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'price_tax'=>array('label'=>$_lang['imponibile'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'price_total'=>array('label'=>$_lang['prezzo totale'],'searchTable'=>true,'required'=>true,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'quantity'=>array('label'=>$_lang['quantità'],'searchTable'=>true,'required'=>true,'type'=>'int','defValue'=>'22','validate'=>'int'),	
	'tax'=>array('label'=>$_lang['tassa'],'searchTable'=>true,'required'=>true,'type'=>'varchar','defValue'=>'22'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datetimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>'0','validate'=>'int')
	);
/* THIRDPARTY */
$App->params->tables['cust']  = DB_TABLE_PREFIX.'thirdparty';
$App->params->fields['cust']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_cat'=>array('label'=>'ID Categoria','required'=>true,'type'=>'int'),
	'name'=>array('label'=>'Nome','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'surname'=>array('label'=>'Cognome','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'street'=>array('label'=>'Via','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'city'=>array('label'=>'Città','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'zip_code'=>array('label'=>'C.A.P.','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'province'=>array('label'=>'Provincia','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'state'=>array('label'=>'Stato','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'telephone'=>array('label'=>'Telefono','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'email'=>array('label'=>'Email','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'mobile'=>array('label'=>'Cellulare','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'fax'=>array('label'=>'Fax','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>1,'validate'=>'int')
	);

/* COMPANY */
$App->params->tables['comp']  = DB_TABLE_PREFIX.'company';
?>
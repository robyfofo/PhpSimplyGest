<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * contacts/config.inc.php v.1.0.0. 28/02/2018
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('help_small','help'),array('contacts'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = ucfirst($_lang['contatti']);
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.ucfirst($_lang['contatti']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */

$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'contacts';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'name'=>array('label'=>$_lang['nome'],'searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'surname'=>array('label'=>$_lang['cognome'],'searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'street'=>array('label'=>'Via','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'zip_code'=>array('label'=>'CAP','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'city'=>array('label'=>'Città','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'country'=>array('label'=>'Provincia','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'state'=>array('label'=>'Stato','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'telephone'=>array('label'=>'Telefono','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'mobile'=>array('label'=>'Mobile','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'fax'=>array('label'=>'Fax','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'email'=>array('label'=>'Email','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'codice_fiscale'=>array('label'=>'Codice Fiscale','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'partita_iva'=>array('label'=>'Partita IVA','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'access_read'=>array('label'=>$_lang['accesso lettura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'access_write'=>array('label'=>$_lang['accesso scrittura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>0,'validate'=>'int')
	);
?>
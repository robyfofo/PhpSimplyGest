<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/users/config.inc.php v.1.0.0. 13/02/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('help_small','help'),array('users'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && isset($obj)) $App->params = $obj;

$App->params->subcategories = 0;
$App->params->categories = 0;
$App->params->item_images = 0;
$App->params->item_files = 0;
$App->params->item_tags = 0;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = ucfirst($_lang['utenti']);
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.ucfirst($_lang['utenti']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */
$App->params->labels['item'] = array('item'=>'utente','itemSex'=>'o','items'=>'utenti','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->tables['item']  = DB_TABLE_PREFIX.'users';
$App->params->fields['item']  = array(
'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'username'=>array('label'=>'Username','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'password'=>array('label'=>'Password','searchTable'=>false,'required'=>false,'type'=>'password'),
	'name'=>array('label'=>'Nome','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'surname'=>array('label'=>'Cognome','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'street'=>array('label'=>'Via','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'city'=>array('label'=>'Città','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'zip_code'=>array('label'=>'C.A.P.','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'province'=>array('label'=>'Provincia','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'state'=>array('label'=>'Stato','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'telephone'=>array('label'=>'Telefono','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'email'=>array('label'=>'Email','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'mobile'=>array('label'=>'Cellulare','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'fax'=>array('label'=>'Fax','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'skype'=>array('label'=>'Skype','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'template'=>array('label'=>'Template','searchTable'=>true,'type'=>'varchar'),
	'avatar'=>array('label'=>'Avatar','searchTable'=>false,'type'=>'blob'),
	'avatar_info'=>array('label'=>'Avatar Info','searchTable'=>false,'type'=>'varchar'),
	'id_level'=>array('label'=>'Livello','searchTable'=>false,'type'=>'ind'),
	'is_root'=>array('label'=>'Root','searchTable'=>false,'type'=>'varchar','defValue'=>0),
	'hash'=>array('label'=>'Hash','searchTable'=>false,'type'=>'varchar'),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);	
?>
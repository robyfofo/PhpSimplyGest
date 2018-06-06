<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * projects/config.inc.php v.1.0.0. 28/02/2018
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('help_small','help'),array('projects'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = ucfirst($_lang['progetti']);
$App->params->breadcrumb = '<li class="active"><i class="icon-projects"></i> '.ucfirst($_lang['progetti']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->tables['cont'] = DB_TABLE_PREFIX.'contacts';
$App->params->tables['time'] = DB_TABLE_PREFIX.'timecard';
$App->params->tables['todo'] = DB_TABLE_PREFIX.'todo';

$App->params->status = $globalSettings['status project'];
$App->params->statusTodo = $globalSettings['status to do'];

/* ITEMS */
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'projects';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'id_contact'=>array('label'=>$_lang['contatto'],'searchTable'=>false,'required'=>false,'type'=>'int','defValue'=>0),
	'title'=>array('label'=>$_lang['titolo'],'searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>true,'required'=>false,'type'=>'text'),
	'current'=>array('label'=>$_lang['selezionato'],'searchTable'=>false,'required'=>false,'type'=>'int','defValue'=>0),
	'timecard'=>array('label'=>$_lang['timecard'],'searchTable'=>false,'required'=>false,'type'=>'int','defValue'=>0),
	'status'=>array('label'=>$_lang['status'],'searchTable'=>true,'required'=>false,'type'=>'int','defValue'=>1),
	'costo_orario'=>array('label'=>$_lang['costo orario'],'searchTable'=>true,'required'=>false,'type'=>'float','defValue'=>'0.00','validate'=>'float'),
	'completato'=>array('label'=>$_lang['completato'],'searchTable'=>true,'required'=>false,'type'=>'int','defValue'=>0,'validate'=>'minmax','valuesRif'=>array('min'=>0,'max'=>100)),
	'access_read'=>array('label'=>$_lang['accesso lettura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'access_write'=>array('label'=>$_lang['accesso scrittura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>$_lang['attiva'],'required'=>false,'type'=>'int','defValue'=>1)
	);

/* THIRDPARTY */
$App->params->tables['cust']  = DB_TABLE_PREFIX.'thirdparty';
?>
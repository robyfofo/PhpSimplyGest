<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/config.inc.php v.1.0.0. 02/03/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('help_small','help'),array('timecard'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = ucfirst($_lang['timecard']);
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.ucfirst($_lang['timecard']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->tables['prog'] = DB_TABLE_PREFIX.'projects';
$App->params->tables['item'] = DB_TABLE_PREFIX.'timecard';

$App->params->labels['item'] = array('item'=>'timecard','itemSex'=>'a','items'=>'timecard','itemsSex'=>'e','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');

/* PITE */
$App->params->labels['pite'] = array('item'=>'tempo','itemSex'=>'o','items'=>'tempi','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['pite'] = 'DESC';
$App->params->tables['pite'] = DB_TABLE_PREFIX.'timecard_predefinite';
$App->params->fields['pite'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_owner'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int','defValue'=>$App->userLoggedData->id),
	'title'=>array('label'=>$_lang['titolo'],'searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>true,'required'=>false,'type'=>'text'),
	'starttime'=>array('label'=>$_lang['ora inizio'],'searchTable'=>false,'required'=>false,'type'=>'time','validate'=>'timeofcal'),
	'endtime'=>array('label'=>$_lang['ora fine'],'searchTable'=>false,'required'=>false,'type'=>'time','validate'=>'timeofcal'),
	'worktime'=>array('label'=>$_lang['ore lavoro'],'searchTable'=>false,'required'=>false,'type'=>'time','defValue'=>'00:00:00','validate'=>'time'),
	'access_read'=>array('label'=>$_lang['accesso lettura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'access_write'=>array('label'=>$_lang['accesso scrittura'],'searchTable'=>true,'required'=>false,'type'=>'text','defValue'=>'none'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>0)
	);

?>
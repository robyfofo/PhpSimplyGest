<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * modules/config.inc.php v.1.0.0. 03/08/2018
*/

$App->params = new stdClass();
$App->params->label = ucfirst($_lang['moduli']);
/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('modules'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = $App->params->label;
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> '.$App->params->label.'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();

$App->params->ordersType['item'] = 'ASC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'modules';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'int|8','autoinc'=>true,'nodb'=>true,'primary'=>true),
	'name'=>array('label'=>$_lang['nome'],'searchTable'=>true,'required'=>true,'type'=>'varchar|255'),
	'label'=>array('label'=>$_lang['etichetta'],'searchTable'=>true,'type'=>'varchar|255'),
	'alias'=>array('label'=>$_lang['alias'],'searchTable'=>true,'type'=>'varchar|255'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>true,'type'=>'text'),
	'code_menu'=>array('label'=>$_lang['codice'],'searchTable'=>true,'type'=>'text'),
	'ordering'=>array('label'=>$_lang['ordine'],'searchTable'=>false,'type'=>'int|8','validate'=>'ordering'),
	'section'=>array('label'=>$_lang['sezione'],'searchTable'=>false,'type'=>'int|1'),
	'help_small'=>array('label'=>$_lang['aiuto breve'],'searchTable'=>false,'type'=>'text'),
	'help'=>array('label'=>$_lang['aiuto'],'searchTable'=>false,'type'=>'longtext'),
	'active'=>array('label'=>$_lang['attiva'],'required'=>false,'type'=>'int|1','defValue'=>0)
	);
?>
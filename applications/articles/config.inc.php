<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * articles/config.inc.php v.1.0.0. 02/08/2018
*/

$App->params = new stdClass();
$App->params->label = ucfirst($_lang['articoli']);
/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('articles'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = $App->params->label;
$App->params->breadcrumb = '<li class="active"><i class="icon-projects"></i> '.ucfirst($_lang['articoli']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();

$App->params->type = $globalSettings['article type'];
if (isset($_lang['article type'])) $App->params->type = $_lang['article type'];

/* ITEMS */
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'articles';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'int|8','autoinc'=>true,'nodb'=>true,'primary'=>true),
	'id_user'=>array('label'=>$_lang['proprietario'],'searchTable'=>false,'required'=>true,'type'=>'int|8','defValue'=>$App->userLoggedData->id),
	'type'=>array('label'=>$_lang['tipo'],'searchTable'=>true,'required'=>false,'type'=>'int|1','defValue'=>'0','validate'=>'int'),
	'content'=>array('label'=>$_lang['contenuto'],'searchTable'=>true,'required'=>true,'type'=>'text','defValue'=>''),
	'price_unity'=>array('label'=>$_lang['prezzo unitario'],'searchTable'=>true,'required'=>true,'type'=>'float|10,2','defValue'=>'0.00','validate'=>'float'),
	'tax'=>array('label'=>$_lang['tassa'],'searchTable'=>true,'required'=>true,'type'=>'int|2','defValue'=>'22'),
	'created'=>array('label'=>$_lang['creazione'],'searchTable'=>false,'required'=>false,'type'=>'datatime','defValue'=>$App->nowDateTime,'validate'=>'datatimeiso'),
	'active'=>array('label'=>$_lang['attiva'],'required'=>false,'type'=>'int|1','defValue'=>0,'validate'=>'int')
	);
?>
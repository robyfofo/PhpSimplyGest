<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * company/config.inc.php v.1.0.0. 02/11/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'modules',array('label','help_small','help'),array('company'),'name = ?');
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
$App->params->tables['item']  = DB_TABLE_PREFIX.'company';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'ragione_sociale'=>array('label'=>'Ragione Sociale','searchTable'=>true,'required'=>true,'type'=>'varchar'),
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
	
	'partita_iva'=>array('label'=>'Partita IVA','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'codice_fiscale'=>array('label'=>'Codice Fiscale','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	
	'gestione_iva'=>array('label'=>'Gestione IVA','searchTable'=>false,'required'=>false,'type'=>'int'),
	'text_noiva'=>array('label'=>'Testo per no iva','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'gestione_rivalsa'=>array('label'=>'Rivalsa','searchTable'=>false,'required'=>false,'type'=>'int'),
	'rivalsa'=>array('label'=>'Rivalsa','searchTable'=>true,'required'=>false,'type'=>'int'),
	'text_rivalsa'=>array('label'=>'Testo per rivalsa','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	
	'banca'=>array('label'=>'Banca','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'intestatario'=>array('label'=>'Intestatario','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'iban'=>array('label'=>'IBAN','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'bic_swift'=>array('label'=>'BIC/SWIFT','searchTable'=>false,'required'=>true,'type'=>'varchar')
	);
?>
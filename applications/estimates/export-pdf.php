<?php
/*
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * estimate/export-pdf.php v.1.3.0. 08/09/2020
*/

ini_set('display_errors',1);
//print_r(Core::$request);
//Core::setDebugMode(1);

use Dompdf\Dompdf;
use Dompdf\Options;

switch(Core::$request->method) {

	case 'estimateExpPdf':

		$App->item = new stdClass;
		$App->item_articoli = new stdClass;
		$App->customer = new stdClass;
		$id_estimate = intval(Core::$request->param);

		if ($id_estimate > 0) {

			// preleva estimate
			Sql::initQuery($App->params->tables['item'],array('*'),array($id_estimate),'id = ?');
			$App->item = Sql::getRecord();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			if (!isset($App->item->id) || (isset($App->item->id) && $App->item->id < 1)) { ToolsStrings::redirect(URL_SITE.'error/404'); }

			// preleva articoli
			Sql::initQuery($App->params->tables['arts'],array('*'),array($id_estimate),'estimates_id = ?');
			$App->item_articoli = Sql::getRecords();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			//print_r($App->item_articoli);die();

			// preleva customer
			Sql::initQuery($App->params->tables['cust'],array('*'),array($App->item->thirdparty_id),'id = ?');
			$App->item_customer = Sql::getRecord();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			//print_r($App->item_customer);die();

			// totali
			$articlesTotal = 0;
			$articlesTaxTotal = 0;
		

			$html = '<html>
			<head>
			
			<style>
			<!--
			body {
				padding-right: 20px;
				padding-left: 20px;
				font-size: 16px;
				font-family: "Helvetica";
			}

			div.content {
				padding: 20px;
				margin-bottom:20px;
				width: 100%;
				clear: both;
			}
			div.company {
				width: 39%;
				float: right;
				text-align: right;
				padding-right: 10px;

			}

			div.customer {
				width: 59%;
				float: left;
			}

			div.note {
				padding-top: 40px;
				font-size: 18px;
			}

			div.data {
				width: 49%;
				float: left;
			}

			div.scadenza {
				width: 49%;
				float: right;
			}

			div.notepagamento {
				margin-top: 50px;
			}


			div.pagamento {
				width: 49%;
				float: left;
				text-align: center;
			}

			div.firma {
				width: 49%;
				float: right;
				text-align: center;
			}

			div.firma > i{
				font-size: 80%;
			}

			h1 {
				font-size: 20px;
			}

			h2 {
				font-size: 18px;
			}

			h3 {
				font-size: 17px;
				text-align: center;
			}

			table {
				border: 1px solid #000;
				padding: 10px;
				clear: both;
			}

			table td {
				padding: 5px 10px 5px 10px;
			}
			
			table {
				width: 90%;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}

			caption {
				font-size: 19px;
				font-weight: bold;
				margin-top: 20px;
				margin-bottom: 10px;
			}


			.td-totale {
				max-width: 120px;
				width: 120px;
				text-align: right;
			}

			.td-tot-totale {
				max-width: 120px;
				width: 120px;
				text-align: right;
				font-size: 19px;
				font-weight: bold;
				padding-top: 40px;
			}



			-->
			</style>
			
			</head>
			<body>';

			$html  .= '<div class="content">';

			// azienda
			$html  .= '<div class="company">';
			$html  .= '<h2>'.$App->company->ragione_sociale.'</h2>';
			$html  .= $App->company->street.' - '.$App->company->zip_code.' - '.$App->company->city.' ('.$App->company->province.')<br />';
			$html  .= $_lang['P. IVA'].' '.$App->company->partita_iva.' - '.$_lang['C. Fiscale'].' '.$App->company->codice_fiscale.'<br />';
			$html  .= '</div>';

			// cliente
			$html  .= '<div class="customer">';
			$html  .=  '<h1>'.ucfirst($_lang['destinatario']).'</h1>';
			if ($App->item->thirdparty_id > 0) {	
				$html  .=  '<strong>'.$_lang['P.IVA'].'</strong> '.$App->item_customer->partita_iva.'<br />';
				$html  .=  '<strong>'.$_lang['C.F.'].'</strong> '.$App->item_customer->codice_fiscale.'<br />';
				$html  .=  '<strong>'.$App->item_customer->ragione_sociale.'</strong><br />';
				$html  .=  '<strong>'.strtoupper($_lang['email']).'</strong> '.$App->item_customer->email.'<br />';
				$html  .=  $App->item_customer->street.'<br />';
				$html  .=   $App->item_customer->zip_code.' '.$App->item_customer->city.' ('.$App->item_customer->province.')<br />';
			} else {
				$html  .=   $App->item->customer;
			}
			$html  .= '</div>';

			$html  .= '</div>';

			// note
			$html  .= '<div class="content note">';
			$html  .= $App->item->note;
			$html  .= '</div>';	

			// date
			$html  .= '<div class="content">
				<div class="data">
					<strong>'.strtoupper($_lang['voce']).'</strong> '.$_lang['del'].' <strong>'.DateFormat::convertDateFormats($App->item->dateins,'Y-m-d',$_lang['data format'],$App->nowDate).'</strong>
				</div>
				<div class="scadenza">
					<strong>'.strtoupper($_lang['scadenza']).'</strong>: '.DateFormat::convertDateFormats($App->item->datesca,'Y-m-d',$_lang['data format'],$App->nowDate).
				'</div>
				</div>';

			// contenuto
			if ($App->item->content != '') {
				$html .= '<div class="content">'.$App->item->content.'</div>';
			}
			
			// articoli
			$articlesTotal = 0;
			$articlesTaxTotal = 0;
			$z = 0;

			// articolo
			if (is_array($App->item_articoli) && count($App->item_articoli) > 0) {
				$html .= '<div class="content"><h3>'.ucfirst($_lang['elenco lavorazioni da fare']).'</h3>';
				$html .= '<table>';
				//<caption>'.ucfirst($_lang['elenco lavorazioni da fare']).'</caption>
				$html .= '<thead><tr><th>'.ucfirst($_lang['contenuto']).'</th><th class="th-totale">'.ucfirst($_lang['totale']).'</th></thead><tbody>';
				foreach ($App->item_articoli AS $key=>$value) {

					$articleTotal = (float)$value->price_total + $value->price_tax;

					// aggiunge tassa aggiuntiva
					$articleAddTax = 0;
					if ($App->item->tax > 0) {					
						$articleAddTax = ( $value->price_total * $App->item->tax ) / 100;
					} 

					// aggiunge rivalsa
					$articleRivalsa = '0';
					if ($App->item->rivalsa > 0) {
						$articleRivalsa = ($value->price_total * $App->item->rivalsa) / 100;
					}

					$articleTotal = (float)$articleTotal + $articleAddTax + $articleRivalsa;

					$articlesTotal = (float)$articlesTotal + $articleTotal;

					$html .= '<td>'.$value->content.'</td>';
					$html .= '<td class="td-totale">'.'€ '.number_format($articleTotal,2,',','.').'</td>';
				}
				$html .= '</tbody>';
			}

			$html .= '<tfoot>';
			$html .=  '<td colspan=2" class="td-tot-totale">€ '.number_format($articlesTotal,2,',','.').'</td>';
			$html .= '</tfoot></table></div>';
			


			// note pagamento e firma

			$html  .= '<div class="content notepagamento">
				<div class="pagamento">
					<strong>'.ucfirst($_lang['pagamento']).':</b> '.$_lang['tipo pagamento'].'</strong>
				</div>
				<div class="firma">
					<strong>'.mb_strtoupper($_lang['accetto preventivo'],'utf-8').'</strong>
					<br /><br /><i>'.$_lang['firma cliente'].'</i>
				</div>
				</div>';			

			$html .= '</body></html>';
			

			//die($html);

			// instantiate and use the dompdf class
			$options = new Options();
			$options->setIsHtml5ParserEnabled(true);

			$dompdf = new Dompdf($options);
			$dompdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portait');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$filename = ucfirst($_lang['voce']).'-'.$App->item->dateins.".pdf";
			$dompdf->stream($filename);
		}

	break;

	case '__estimateExpPdf':
		$App->item = new stdClass;
		$App->item_articoli = new stdClass;
		$App->customer = new stdClass;
		$id_estimate = intval(Core::$request->param);

		$headerpdf = array();
		$notepdf = array();
		$articolipdf = array();
		$totalipdf = array();

		if ($id_estimate > 0) {

			// preleva estimate
			Sql::initQuery($App->params->tables['item'],array('*'),array($id_estimate),'id = ?');
			$App->item = Sql::getRecord();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			if (!isset($App->item->id) || (isset($App->item->id) && $App->item->id < 1)) { ToolsStrings::redirect(URL_SITE.'error/404'); }

			// preleva articoli
			Sql::initQuery($App->params->tables['arts'],array('*'),array($id_estimate),'estimates_id = ?');
			$App->item_articoli = Sql::getRecords();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			//print_r($App->item_articoli);die();

			// preleva customer
			Sql::initQuery($App->params->tables['cust'],array('*'),array($App->item->thirdparty_id),'id = ?');
			$App->item_customer = Sql::getRecord();
			if (Core::$resultOp->error > 0) { ToolsStrings::redirect(URL_SITE.'error/db'); }
			//print_r($App->item_customer);die();

			$App->company->gestione_iva = 0;
			$App->company->gestione_rivalsa = 1;

			// totali
			$articlesTotal = 0;
			$articlesTaxTotal = 0;
			$z = 0;

			// calcola inponibile
			if (is_array($App->item_articoli) && count($App->item_articoli) > 0) {
				foreach ($App->item_articoli AS $key=>$value) {
					$articlesTotal = (float)$articlesTotal + $value->price_total;
					$articlesTaxTotal = (float)$articlesTaxTotal + $value->price_tax;
					// dati pdf
					// se iva
					if ($App->company->gestione_iva == 1) {
						$articolipdf[$z]['tax'] = $value->tax.'% ';
						$articolipdf[$z]['importotax'] = '€ '.number_format($value->price_tax,2,',','.').' ';
					}
					$articolipdf[$z]['descrizione'] = $value->content;
					$articolipdf[$z]['quantità'] = $value->quantity;
					$articolipdf[$z]['prezzounitario'] = '€ '.number_format($value->price_unity,2,',','.').' ';
					$articolipdf[$z]['importo'] = '€ '.number_format($value->price_unity * $value->quantity,2,',','.').' ';
					$z++;
				}
			}

			// calcola tassa aggiuntiva
			$invoiceTotalTax = '0.00';
			if ($App->item->tax > 0) $invoiceTotalTax = ($articlesTotal * $App->item->tax) / 100;

			// calcola rivalsa
			$invoiceTotalRivalsa = '0.00';
			if ($App->item->rivalsa > 0) $invoiceTotalRivalsa = ($articlesTotal * $App->item->rivalsa) / 100;

			$invoiceTotal = (float)$articlesTotal + $articlesTaxTotal + $invoiceTotalTax + $invoiceTotalRivalsa;

			// INIZIO PDF

			// Initialize a ROS PDF class object using DIN-A4, with background color gray
			$pdf = new Cezpdf('a4','portrait','color',array(255,255,255));
			// Set pdf Bleedbox
			$pdf->ezSetMargins("50","50","70","70");
			// Use one of the pdf core fonts
			$mainFont = 'Helvetica';
			// Select the font
			$pdf->selectFont($mainFont);
			// Define the font size
			$size=12;
			// Modified to use the local file if it can
			$pdf->openHere('Fit');

			$datacreator = array (
				'Title'=>ucfirst($_lang['voce']).' '.$App->item->dateins,
				'Author'=>SITE_OWNER,
				'Subject'=>ucfirst($_lang['voce']).' '.$App->item->dateins,
				'Creator'=>SITE_NAME,
				'Producer'=>URL_SITE
				);
			$pdf->addInfo($datacreator);

			// HEADER
			$pdf->ezSetY(750);
			$colsheadpdf = array('titolo'=>'');
			$headpdf[0]['titolo'] = $App->company->ragione_sociale;
			$headpdf[1]['titolo'] = $App->company->street.' - '.$App->company->zip_code.' - '.$App->company->city.' ('.$App->company->province.')';
			$headpdf[2]['titolo'] = $_lang['P. IVA'].' '.$App->company->partita_iva.' - '.$_lang['C. Fiscale'].' '.$App->company->codice_fiscale;
			$headpdf[4]['titolo'] = $App->item->note;
			$y = $pdf->ezTable($headpdf,$colsheadpdf,'',array(
				'showHeadings'								=> 0,
				'gridlines'									=> EZ_GRIDLINE_DEFAULT,
				'showLines'									=> 0,
				'fontSize'									=> 10,
				'shaded'									=> 0,
				'rowGap'									=> 2,
				'colGap'									=> 20,
				'xPos'										=> 270,
				'xOrientation'								=> 'right',
				'cols'										=> array(
					'titolo'								=> array(
						'showLines'							=>1
					),
					'testo'									=>array(
						'showLines'							=>0
					)
				)
				)
			);

			$pdf->setColor('0.8','0.8','0.8');
			$pdf->setStrokeColor('0.8','0.8','0.8');
			$pdf->setLineStyle(1);
			$pdf->line(30,$y-10,560,$y-10);
			// FINE HEADER

			// CUSTOMER
			$pdf->ezSetDy(-20);
			if ($App->item->thirdparty_id > 0) {
				$tablecols = array('titolo'=>'','testo'=>'Cliente');
				$tabledata = array();
				$tabledata[0]['titolo'] = '<strong>'.$_lang['P.IVA'].'</strong> '.$App->item_customer->partita_iva;
				$tabledata[0]['testo'] = ucfirst($_lang['destinatario']);
				$tabledata[1]['titolo'] = '<strong>'.$_lang['C.F.'].'</strong> '.$App->item_customer->codice_fiscale;
				$tabledata[1]['testo'] = '<strong>'.$App->item_customer->ragione_sociale.'</strong>';
				$tabledata[2]['titolo'] = '<strong>'.strtoupper($_lang['email']).'</strong> '.$App->item_customer->email;
				$tabledata[2]['testo'] = $App->item_customer->street;
				$tabledata[3]['titolo'] = '';
				$tabledata[3]['testo'] = $App->item_customer->zip_code.' '.$App->item_customer->city.' ('.$App->item_customer->province.')';
			} else {
				$tablecols = array('testo'=>'Cliente');
				$tabledata[0]['testo'] = $App->item->customer;
			}
			$col = $pdf->ezTable($tabledata,$tablecols,'',array(
				'showHeadings'							=> 0,
				'gridlines'								=> EZ_GRIDLINE_DEFAULT,
				'showLines'								=> 0,
				'fontSize'								=> 11,
				'width'									=> 500,
				'shaded'								=> 0,
				'rowGap'								=> 2,
				'colGap' 								=> 2,
			 	'lineCol'								=> array(0.7,0.7,0.7),
				'cols'									=> array(
					'titolo'							=> array(),
					'testo'								=> array(
						'showLines' 					=> 0
					)
				)
				)
			 );
			// FINE CUSTOMER

			// DATA
			$pdf->ezSetDy(-10);
			$colspdf = array('col1'=>'Colonna 1','col2'=>'Colonna 2');
			$datapdf = array();
			$datapdf[0]['col1'] = '<strong>'.strtoupper($_lang['voce']).'</strong> '.$_lang['del'].' <strong>'.DateFormat::convertDateFormats($App->item->dateins,'Y-m-d',$_lang['data format'],$App->nowDate).'</strong>';
			$datapdf[0]['col2'] = '<strong>'.strtoupper($_lang['scadenza']).'</strong>: '.DateFormat::convertDateFormats($App->item->datesca,'Y-m-d',$_lang['data format'],$App->nowDate);
			$opt = array(
				'showHeadings'=>0,
				'gridlines'=>EZ_GRIDLINE_DEFAULT,
				'fontSize'=>9,
				'shaded'=>0,
				'width'=>500,
				'showLines' =>1,
				'lineCol'=>array(0.7,0.7,0.7),
			);
			$pdf->ezTable($datapdf, $colspdf,'',$opt);
			// FINE DATA

			// CONTENUTI 
			/*
			if ($App->item->content != '') {

				//$pdf->addText(150,150,10,$App->item->content);

				$App->item->contentstrip_tags($App->item->content,'<p>');

				$contents = explode(

				)
				$pdf->setColor (0,0,0);
				$pdf->addText(150,450,10,strip_tags($App->item->content));
			}
			*/

			// ARTICOLI
			$pdf->ezSetDy(-10);

			$colsArticolipdf['descrizione'] = '<b>'.ucfirst($_lang['descrizione']).'</b>';
			$colsArticolipdf['quantità'] = '<b>'.ucfirst($_lang['quantità']).'</b>';
			$colsArticolipdf['prezzounitario'] = '<b>'.ucwords($_lang['prezzo unità']).'</b>';
			$colsArticolipdf['importo'] = '<b>'.ucwords($_lang['importo']).'</b>';
			// se iva
			if ($App->company->gestione_iva == 1) {
				$colsArticolipdf['tax'] = '<b>'.ucwords($_lang['iva']).'</b>';
			}
			$opt = array( 'showHeadings' => 1, 'gridlines'=> EZ_GRIDLINE_DEFAULT,'fontSize'=>10,'width'=>500,'shaded'=>0,'rowGap' =>5,'colGap'=>7,'showLines'=>1,'lineCol'=>array(0.7,0.7,0.7),'cols'=> array('quantità'=>array('width'=>90,'justification'=>'center'),'prezzounitario'=>array('width'=>90,'justification' =>'right'),'importo'=>array('width'=>80,'justification' =>'right' )));
			if ($App->company->gestione_iva = 1) {
				$opt['cols']['tax'] = array('width'=>30);
			}
			$col = $pdf->ezTable($articolipdf, $colsArticolipdf,'',$opt);
			// FINE ARTICOLI

			//TOTALI
			$pdf->ezSetDy(-10);
			$colspdf = array('col1'=>'colonna1','col2'=>'colonna2');
			$datapdf = array();
			$z = 0;
			$datapdf[$z]['col1'] = strtoupper('totale netto');
			$datapdf[$z]['col2'] = '€ '.number_format($articlesTotal,2,',','.');
			if ($App->item->tax > 0) {
				$z++;
				$datapdf[$z]['col1'] = strtoupper($_lang['tassa aggiuntiva']);
				$datapdf[$z]['col2'] = '€ '.number_format($invoiceTotalTax,2,',','.');
				$z++;
			}
			if ($App->item->rivalsa > 0) {
				$z++;
				$datapdf[$z]['col1'] = $App->company->text_rivalsa;
				$datapdf[$z]['col2'] = '€ '.number_format($invoiceTotalRivalsa,2,',','.');
				$z++;
			}
			$datapdf[$z]['col1'] = '<strong>'.strtoupper($_lang['totale'].' '.$_lang['voce']).'</strong>';
			$datapdf[$z]['col2'] = '€ <strong>'.number_format($invoiceTotal,2,',','.').'</strong>';

			$opt = array(
				'showHeadings'			=> 0,
				'gridlines'				=> EZ_GRIDLINE_DEFAULT,
				'fontSize'				=> 10,
				'width'					=> 500,
				'shaded'     			=> 0,
				'rowGap'				=> 2,
				'colGap' 				=> 10,
				'showLines' 			=> 0,
				'lineCol'				=> array(0.7,0.7,0.7),
				'cols'					=> array(
					'col1'				=> array(
						'justification' =>'right'
					),
					'col2'				=> array(
						'width'			=>110,
						'justification'	=>'right'
					)
				)
			);
			$y = $pdf->ezTable($datapdf, $colspdf,'',$opt);
			// FINE TOTALI

			// NOTE PAGAMENTO
			if ($y > 240) $y = 240;
			$pdf->ezSetY($y);

			$y = $pdf->addText(70,$y,10,"<b>".ucfirst($_lang['pagamento']).":</b> ".$_lang['tipo pagamento'],0);
			// FINE NOTE PAGAMENTO

			// FIRMA
			$pdf->ezSetDy(-10);
			$colspdf = array(
				'col1'					=> mb_strtoupper($_lang['accetto preventivo'],'utf-8')
			);
			$datapdf = array();
			$datapdf[]['col1'] = $_lang['firma cliente'];
			$datapdf[]['col1'] = ' ';
			$datapdf[]['col1'] = ' ';
			$datapdf[]['col1'] = ' ';
			$datapdf[]['col1'] = ' ';
			$datapdf[]['col1'] = ' ';
			$datapdf[]['col1'] = ' ';
			$opt = array (
				'showHeadings'			=> 1,
				'gridlines'				=> EZ_GRIDLINE_DEFAULT,
				'fontSize'				=> 9,
				'shaded'				=> 0,
				'width'					=> 250,
				'showLines' 			=> 1,
				'xOrientation'			=> 'right',
				'lineCol'				=> array(0.7,0.7,0.7),
				'cols'					=> array(
					'col1'				=> array(
						'justification' =>'center'
					),

				)
			);
			$pdf->ezTable($datapdf, $colspdf,'',$opt);
			// FINE FIRMA

			// Output the pdf as stream, but uncompress
			$namefile = ucfirst($_lang['voce']).'-'.$App->item->dateins.".pdf";
			$applicationtype = "application/pdf";
			//header("Content-type: $applicationtype");
			//header("Content-Disposition: attachment; filename=".basename($namefile).";");
			$pdf->ezStream(array('compress'=>0,'download'=>0,'Content-Disposition'=>$namefile));

		}
	break;
}
die();
?>

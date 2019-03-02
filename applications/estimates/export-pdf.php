<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * estimate/export-pdf.php v.1.0.0. 04/06/2018
*/
ini_set('display_errors',0);
//print_r(Core::$request);
//Core::setDebugMode(1);

switch(Core::$request->method) {

	case 'estimateExpPdf':
		$App->item = new stdClass;
		$App->item_articoli = new stdClass;
		$App->customer = new stdClass;
		$id_invoice = intval(Core::$request->param);
		
		$headerpdf = array();
		$notepdf = array();
		$articolipdf = array();
		$totalipdf = array();
		
		if ($id_invoice > 0) {
			
			

				/* preleva invoice */
				Sql::initQuery($App->params->tables['item'],array('*'),array($id_invoice),'id = ?');
				$App->item = Sql::getRecord();
				if (Core::$resultOp->error == 0) {
					
					/* preleva articoli */
					Sql::initQuery($App->params->tables['arts'],array('*'),array($id_invoice),'id_estimate = ?');
					$App->item_articoli = Sql::getRecords();
					if (Core::$resultOp->error == 0) {
						
						/* preleva customer */
						Sql::initQuery($App->params->tables['cust'],array('*'),array($App->item->id_customer),'id = ?');
						$App->item_customer = Sql::getRecord();
						if (Core::$resultOp->error == 0) {							
							/* settings */	
							$App->company->gestione_iva = 0;
							$App->company->gestione_rivalsa = 1;
							
													
							/* totali */
							$articlesTotal = 0;
							$articlesTaxTotal = 0;																			
							$z = 0;							
							/* calcola inponibile */
							if (is_array($App->item_articoli) && count($App->item_articoli) > 0) {
								foreach ($App->item_articoli AS $key=>$value) {
									$articlesTotal = (float)$articlesTotal + $value->price_total;
									$articlesTaxTotal = (float)$articlesTaxTotal + $value->price_tax;									
									/* dati pdf */
									/* se iva */
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
								
								/* calcola tassa aggiuntiva */
								$invoiceTotalTax = '0.00';
								if ($App->item->tax > 0) $invoiceTotalTax = ($articlesTotal * $App->item->tax) / 100;
								
								/* calcola rivalsa */
								$invoiceTotalRivalsa = '0.00';
								if ($App->item->rivalsa > 0) $invoiceTotalRivalsa = ($articlesTotal * $App->item->rivalsa) / 100;
								
								$invoiceTotal = (float)$articlesTotal + $articlesTaxTotal + $invoiceTotalTax + $invoiceTotalRivalsa;
								
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
								
								/* HEADER */
								$pdf->ezSetY(750);
								$colsheadpdf = array('titolo'=>''); 
								$headpdf[0]['titolo'] = $App->company->ragione_sociale;
								$headpdf[1]['titolo'] = $App->company->street.' - '.$App->company->zip_code.' - '.$App->company->city.' ('.$App->company->province.')';
								$headpdf[2]['titolo'] = $_lang['P. IVA'].' '.$App->company->partita_iva.' - '.$_lang['C. Fiscale'].' '.$App->company->codice_fiscale;
								$headpdf[4]['titolo'] = $App->item->note;
								$y = $pdf->ezTable($headpdf,$colsheadpdf,'',array('showHeadings'=> 0,'gridlines'=>EZ_GRIDLINE_DEFAULT,'showLines'=>0,'fontSize'=>10,'shaded'=>0,'rowGap'=>2,'colGap'=>20,'xPos'=>270,'xOrientation'=>'right','cols'=>array('titolo'=>array('showLines'=>1),'testo'=>array('showLines'=>0))));
								
								$pdf->setColor('0.8','0.8','0.8');
								$pdf->setStrokeColor('0.8','0.8','0.8');
								$pdf->setLineStyle(1);
								$pdf->line(30,$y-10,560,$y-10);
								/* FINE HEADER */
								
								/* CUSTOMER */
								$pdf->ezSetDy(-20);
								if ($App->item->id_customer > 0) {
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
								
								
								$col = $pdf->ezTable($tabledata,$tablecols,'',array('showHeadings'=>0,'gridlines'=>EZ_GRIDLINE_DEFAULT,'showLines'=>0,'fontSize'=>11,'width'=>500,'shaded'=>0,'rowGap' => 2, 'colGap' => 2, 'lineCol'=>array(0.7,0.7,0.7), 'cols'=> array( 'titolo'=>array( ), 'testo'=>array( 'showLines' => 0 ), ) ) );
								/* FINE CUSTOMER */
								
								/* DATA */
								$pdf->ezSetDy(-10);
								$colspdf = array('col1'=>'Colonna 1','col2'=>'Colonna 2'); 
								
								$datapdf = array();
								$datapdf[0]['col1'] = '<strong>'.strtoupper($_lang['voce']).'</strong> '.$_lang['del'].' <strong>'.DateFormat::convertDataIsoToDataformat($App->item->dateins,$_lang['data format']).'</strong>';
								$datapdf[0]['col2'] = '<strong>'.strtoupper($_lang['scadenza']).'</strong>: '.DateFormat::convertDataIsoToDataformat($App->item->datesca,$_lang['data format']);
								
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
								/* FINE DATA */
								
								/* ARTICOLI */
								
								$pdf->ezSetDy(-10);
				
								$colsArticolipdf['descrizione'] = '<b>'.ucfirst($_lang['descrizione']).'</b>';
								$colsArticolipdf['quantità'] = '<b>'.ucfirst($_lang['quantità']).'</b>';
								$colsArticolipdf['prezzounitario'] = '<b>'.ucwords($_lang['prezzo unità']).'</b>';
								$colsArticolipdf['importo'] = '<b>'.ucwords($_lang['importo']).'</b>';
								/* se iva */
								if ($App->company->gestione_iva == 1) {
									$colsArticolipdf['tax'] = '<b>'.ucwords($_lang['iva']).'</b>';
									}
								$opt = array( 'showHeadings' => 1, 'gridlines'=> EZ_GRIDLINE_DEFAULT,'fontSize'=>10,'width'=>500,'shaded'=>0,'rowGap' =>5,'colGap'=>7,'showLines'=>1,'lineCol'=>array(0.7,0.7,0.7),'cols'=> array('quantità'=>array('width'=>90,'justification'=>'center'),'prezzounitario'=>array('width'=>90,'justification' =>'right'),'importo'=>array('width'=>80,'justification' =>'right' )));							
								if ($App->company->gestione_iva = 1) {
									$opt['cols']['tax'] = array('width'=>30);
									}
								$col = $pdf->ezTable($articolipdf, $colsArticolipdf,'',$opt);
								/* FINE ARTICOLI */							
								
								
								
								
								/* TOTALI */
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
									'showHeadings'=>0,
									'gridlines'=>EZ_GRIDLINE_DEFAULT,
									'fontSize'=>10,
									'width'=>500,
									'shaded'=>0,
									'rowGap'=>2,
									'colGap' =>10,
									'showLines' =>0,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=>array('col1'=>array('justification' =>'right'),'col2'=>array('width'=>110,'justification'=>'right')));
								$y = $pdf->ezTable($datapdf, $colspdf,'',$opt);
								/* FINE TOTALI */
								
								
								/* NOTE PAGAMENTO */
								if ($y > 240) $y = 240;	
								$pdf->ezSetY($y);
													
								$y = $pdf->addText(70,$y,10,"<b>".ucfirst($_lang['pagamento']).":</b> <i>assegno</i>/<i>bonifico</i>/<i>contanti</i>",0); 
								/* FINE NOTE PAGAMENTO */
								
								
								/* FIRMA */
								$pdf->ezSetDy(-10);
								$colspdf = array('col1'=>'Dati e firma della persona/impresa incaricata del preventivo','col2'=>'ACCETTO IL PREVENTIVO.Nome, cognome e firma del cliente'); 
								
								$datapdf = array();
								$datapdf[]['col1'] = '';
								$datapdf[]['col2'] = '';
								$datapdf[]['col1'] = '';
								$datapdf[]['col2'] = '';
								$opt = array(
									'showHeadings'=>1,
									'gridlines'=>EZ_GRIDLINE_DEFAULT,
									'fontSize'=>9,
									'shaded'=>0,
									'width'=>500,
									
									);
								$pdf->ezTable($datapdf, $colspdf,'',$opt);
								/* FINE FIRMA */
								/*
								


.

*/
								
								// Output the pdf as stream, but uncompress														
								$namefile = ucfirst($_lang['voce']).'-'.$App->item->dateins.".pdf";
								$applicationtype = "application/pdf";   
								header("Content-type: $applicationtype");
								header("Content-Disposition: attachment; filename=".basename($namefile).";");
								$pdf->ezStream(array('compress'=>0,'download'=>0,'Content-Disposition'=>$namefile));	
							}
						}			
					}
					
			}	
	break;
	}
die();
?>
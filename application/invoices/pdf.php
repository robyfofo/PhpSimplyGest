<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * invoices/pdf.php v.1.0.0. 30/11/2017
*/
//print_r(Core::$request);

switch(Core::$request->method) {
	case 'invoicespdf':
		$App->invoice = new stdClass;
		$App->invoice_articoli = new stdClass;
		$App->customer = new stdClass;
		$id_invoice = intval(Core::$request->param);
		
		$headerpdf = array();
		$notepdf = array();
		$articolipdf = array();
		$totalipdf = array();
		
		if ($id_invoice > 0) {
			
			/* preleva company */
			Sql::initQuery($App->params->tables['comp'],array('*'),array(),'id = 1');
			$App->company = Sql::getRecord();
			if (Core::$resultOp->error == 0) {

				/* preleva invoice */
				Sql::initQuery($App->params->tables['ites'],array('*'),array($id_invoice),'id = ?');
				$App->invoice = Sql::getRecord();
				if (Core::$resultOp->error == 0) {
					
					/* preleva articoli */
					Sql::initQuery($App->params->tables['item'],array('*'),array($id_invoice),'id_invoice = ?');
					$App->invoice_articoli = Sql::getRecords();
					if (Core::$resultOp->error == 0) {
						
						/* preleva customer */
						Sql::initQuery($App->params->tables['cust'],array('*'),array($App->invoice->id_customer),'id = ?');
						$App->invoice_customer = Sql::getRecord();
						if (Core::$resultOp->error == 0) {
					
							/*
							print_r($App->invoice);
							print_r($App->invoice_articoli);
							print_r($App->invoice_customer);
							*/
							
							/* totali */
							$invoiceImponibile = 0;
							$rivalsaInps = 4;
							$invoiceTotal = 0;
							$invoiceMovTotal = 0;
							$invoiceTaxTotal = 0;
							
							$z = 0;
							
							/* calcola inponibile */
							if (is_array($App->invoice_articoli) && count($App->invoice_articoli) > 0) {
								foreach ($App->invoice_articoli AS $key=>$value) {
									$invoiceMovTotal = (float)$invoiceMovTotal + $value->price_total;
									$invoiceTaxTotal = (float)$invoiceTaxTotal + $value->price_tax;
									
									/* dati pdf */
									$articolipdf[$z]['descrizione'] = $value->content;
									$articolipdf[$z]['quantità'] = $value->quantity;
									$articolipdf[$z]['prezzounitario'] = '€ '.number_format($value->price_unity,2,',','.').' ';
									$articolipdf[$z]['importo'] = '€ '.number_format($value->price_unity * $value->quantity,2,',','.').' ';
									
									 
									}
								}
								$invoiceImponibile = (float)$invoiceMovTotal + $invoiceTaxTotal;
								$invoiceRivalsa = (float)($invoiceImponibile * $rivalsaInps) / 100;
								$invoiceTotal = (float)$invoiceImponibile + $invoiceRivalsa;
								
								/*							
								echo '<br>Imponibile: '.$invoiceImponibile;
								echo '<br>rivalsa: '.$invoiceRivalsa;
								echo '<br>totale: '.$invoiceTotal;
								*/
							
							
								/* STAMPA */
								
	
								$nomefile = "Stampa_fatture_entrate.pdf";
								$tipo_applicazione = "application/pdf";   
								header("Content-type: $tipo_applicazione");
								header("Content-Disposition: attachment; filename=".basename($nomefile).";");
								
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
								
								/* HEADER */
								$pdf->ezSetY(750);
								$colsheadpdf = array('titolo'=>''); 
								$headpdf[0]['titolo'] = $App->company->ragione_sociale;
								$headpdf[1]['titolo'] = $App->company->street.' - '.$App->company->zip_code.' - '.$App->company->city.' ('.$App->company->province.')';
								$headpdf[2]['titolo'] = $_lang['P. IVA'].' '.$App->company->partita_iva.' - '.$_lang['C. Fiscale'].' '.$App->company->codice_fiscale;
								$headpdf[3]['titolo'] = '<strong>'.strtoupper($_lang['fattura']).'</strong> '.$_lang['nr.'].' <b>'.$App->invoice->number.'</b> '.$_lang['del'].' <b>'.DateFormat::convertDataIsoToDataformat($App->invoice->dateins,$_lang['data format']).'</b>';								
								$headpdf[4]['titolo'] = $App->invoice->note;
								$col = $pdf->ezTable($headpdf, $colsheadpdf,'',array(
									'showHeadings' => 0,
									'gridlines'=> EZ_GRIDLINE,
									'showLines' => 0,
									'fontSize' => 10,
								 	'shaded'=> 0,
								 	'rowGap' => 2,
									'colGap' => 20,
									'xPos'=>'570',
									'xOrientation'=>-'right',
								 	'cols'=> array(
								 		'titolo'=>array(
											),
								 		'testo'=>array(
											'showLines' => 0
											),
								 		)
									)
								);
								$pdf->setColor('0.8','0.8','0.8');
								$pdf->setStrokeColor('0.8','0.8','0.8');
								$pdf->setLineStyle(1);
								$pdf->line(30,$col-10,560,$col-10);
								
								$pdf->ezSetDy(-20);
								$tablecols = array('titolo'=>'','testo'=>'Cliente'); 
								$tabledata = array();
								$tabledata[0]['titolo'] = '<strong>'.$_lang['P.IVA'].'</strong> '.$App->invoice_customer->partita_iva;
								$tabledata[0]['testo'] = ucfirst($_lang['destinatario']);
								$tabledata[1]['titolo'] = '<strong>'.$_lang['C.F.'].'</strong> '.$App->invoice_customer->codice_fiscale;
								$tabledata[1]['testo'] = '<strong>'.$App->invoice_customer->ragione_sociale.'</strong>';
								$tabledata[2]['titolo'] = '<strong>'.strtoupper($_lang['email']).'</strong> '.$App->invoice_customer->email;
								$tabledata[2]['testo'] = $App->invoice_customer->street;
								$tabledata[3]['titolo'] = '';
								$tabledata[3]['testo'] = $App->invoice_customer->zip_code.' '.$App->invoice_customer->city.' ('.$App->invoice_customer->province.')';
								
								
								$col = $pdf->ezTable($tabledata,$tablecols,'',array(
									'showHeadings' => 0,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'showLines' => 0,
									'fontSize' => 11,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 2,
									'colGap' => 2,
									'lineCol'=>array(0.7,0.7,0.7),
								 	'cols'=> array(
								 		'titolo'=>array(
											),
								 		'testo'=>array(
											'showLines' => 0
											),
								 		)
									)
								);
								/* FINE HEADER */
								
								/* ARTICOLI */
								$pdf->setColor('0.8','0.8','0.8');
								$pdf->setStrokeColor('0.8','0.8','0.8');
								$pdf->setLineStyle(1);
								$pdf->line(30,$col-10,560,$col-10);
								$pdf->ezSetDy(-30);
								$colsArticolipdf = array
								(
									'descrizione'=>'<b>'.ucfirst($_lang['descrizione']).'</b>',
									'quantità'=>'<b>'.ucfirst($_lang['quantità']).'</b>',
									'prezzounitario'=>'<b>'.ucwords($_lang['prezzo unità']).'</b>',
									'importo'=>'<b>'.ucwords($_lang['importo']).'</b>',
								); 
								$col = $pdf->ezTable($articolipdf, $colsArticolipdf,'',array(
									'showHeadings' => 1,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'fontSize' => 10,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 5,
									'colGap' => 7,
									'showLines' => 1,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=> array(
								 		'quantità'=>array(
								 			'width'=>90,
								 			'justification' => 'center'
											),
										'prezzounitario'=>array(
								 			'width'=>90,
											'justification' => 'right'
											),
								 		'importo'=>array(
								 			'width'=>80,
											'justification' => 'right'
											)
										)
									)
								);
								/* FINE ARTICOLI */							
								
								/* NOTE */
								$pdf->ezSetY(310);
								$pdf->setColor('0.8','0.8','0.8');
								$pdf->setStrokeColor('0.8','0.8','0.8');
								$pdf->setLineStyle(1);
								$pdf->line(30,310,560,310);
								$pdf->ezSetDy(-10);
								$colspdf = array('titolo'=>strtoupper($_lang['modalità pagamento']),'testo'=>strtoupper($_lang['scadenze'])); 
								$datapdf[1]['titolo'] = '<b>Bonifico Bancario</b>';
								$datapdf[1]['testo'] = '<b>'.DateFormat::convertDataIsoToDataformat($App->invoice->datesca,$_lang['data format']).'</b>';
								$datapdf[2]['titolo'] = 'IBAN: <b>'.$App->company->iban.'</b>';
								$datapdf[2]['testo'] = '';
								$datapdf[3]['titolo'] = $App->company->intestatario;
								$datapdf[3]['testo'] = '';
								
								$pdf->ezTable($datapdf, $colspdf,'',array(
									'showHeadings' => 1,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'fontSize' => 9,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 3,
									'colGap' => 10,
									'showLines' => 1,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=> array(
								 		'quantità'=>array(
								 			'width'=>60,
								 			'justification' => 'center'
											),
										'prezzounitario'=>array(
								 			'width'=>80,
											'justification' => 'right'
											),
								 		'importo'=>array(
								 			'width'=>130,
											'justification' => 'right'
											)
										)
									)
								);
								/* FINE NOTE */	
								
								/* NOTE */
								$pdf->ezSetDy(-10);
								$cols = array('riepilogo'=>strtoupper($_lang['riepilogo iva']),'importo'=>strtoupper($_lang['importo lordo']),'imposte'=>strtoupper($_lang['imposte'])); 
								$data[0]['riepilogo'] = 'Operazione effettuata ai sensi dell’art. 1, commi da 54 a 89 della Legge n. 190/2014 – Regime forfettario';
								$data[0]['importo'] = '€ '.number_format($invoiceImponibile,2,',','.');
								$data[0]['imposte'] = '€ 0,00';
								
								$pdf->ezTable($data, $cols,'',array(
									'showHeadings' => 1,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'fontSize' => 9,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 3,
									'colGap' => 10,
									'showLines' => 1,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=> array(
										'imposte'=>array(
								 			'justification' => 'right'
											),
										'importo'=>array(
								 			'justification' => 'right'
											),
										)
									)
								);
								/* FINE NOTE */			
								
								/* TOTALI */
								$pdf->ezSetDy(-10);
								$colsTotalipdf = array('titolo'=>'titolo','testo'=>'testo'); 
								$totalipdf[0]['titolo'] = strtoupper($_lang['totale onorario']);
								$totalipdf[0]['testo'] = '€ '.number_format($invoiceImponibile,2,',','.');
								$totalipdf[1]['titolo'] = 'RIVALSA INPS 4%';
								$totalipdf[1]['testo'] = '€ '.number_format($invoiceRivalsa,2,',','.');
								$pdf->ezTable($totalipdf, $colsTotalipdf,'',array(
									'showHeadings' => 0,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'fontSize' => 10,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 2,
									'colGap' => 10,
									'showLines' => 0,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=> array(
								 		'titolo'=>array(
								 			'justification' => 'right'
											),
								 		'testo'=>array(
								 			'width'=>110,
											'justification' => 'right'
											)
										)
									)
								);
								/* FINE TOTALI */
								
								/* TOTALI */
								$pdf->ezSetDy(-5);
								$cols = array('titolo'=>'titolo','testo'=>'testo'); 
								$data[0]['titolo'] = '<strong>'.strtoupper($_lang['totale']).'</strong>';
								$data[0]['testo'] = '€ <strong>'.number_format($invoiceTotal,2,',','.').'</strong>';
								$pdf->ezTable($data, $cols,'',array(
									'showHeadings' => 0,
									'gridlines'=> EZ_GRIDLINE_DEFAULT,
									'fontSize' => 12,
								 	'width'=>500,
								 	'shaded'=> 0,
								 	'rowGap' => 5,
									'colGap' => 10,
									'showLines' => 0,
									'lineCol'=>array(0.7,0.7,0.7),
									'cols'=> array(
								 		'titolo'=>array(
								 			'justification' => 'right'
											),
								 		'testo'=>array(
								 			'width'=>110,
											'justification' => 'right'
											)
										)
									)
								);
								/* FINE TOTALI */
								
								// Output the pdf as stream, but uncompress
								$pdf->ezStream(array('compress'=>0));						
								
								
								
							
							
							}
						}			
					}
				}	
			}	
	break;
	}
die();
?>
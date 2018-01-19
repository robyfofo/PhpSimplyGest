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

$App->icustomers = new stdClass;	
Sql::initQuery($App->params->tables['cust'],array('*'),array(),'active = 1');
Sql::setOptions(array('fieldTokeyObj'=>'id'));
Sql::setOrder('surname ASC, name ASC');
$App->customers = Sql::getRecords();		

$invoiceType = (isset(Core::$request->params[0]) && Core::$request->params[0] != '' ? intval(Core::$request->params[0]) : 0);
switch(Core::$request->method) {
	case 'invoicePpdf':
		$table = $App->params->tables['ites'];
		if ($invoiceType == 1) $table = $App->params->tables['itep'];
		/* carica dati invoice */
		$App->item = new stdClass;
		Sql::initQuery($table,array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 0 && isset($App->item->id) && $App->item->id > 0) {
			//print_r($App->item);
			
			
			
			
			


// controlla i diritti di accesso
if (!isset($_MY_SESSION_VARS['loggato'])) header("Location: ".SITE_URL_ADMIN."login.php");
if (!isset($moduli[$modulo])) header("Location: ".SITE_URL_ADMIN."index.php");
$livello_utente = $_MY_SESSION_VARS['livello'];
if (!strstr($moduli[$modulo]['accesso'],$livello_utente)) header("Location: ".SITE_URL_ADMIN."index.php");

$dati = array();

// colonne tabella
$sql_ana = "SELECT id,azienda,nome,cognome FROM mige_anagrafica WHERE tipoana = 0 OR tipoana = 1 ORDER BY azienda ASC, nome ASC";
$result_ana = $db->query($sql_ana) or die('Errore lettura anagrafiche!');	
if ($db->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {	
	while ($row_ana = $result_ana->fetch(PDO::FETCH_ASSOC)) {
		if ($row_ana['azienda'] != '') {
			$array_anagrafica[$row_ana['id']] = $row_ana['azienda'];
			} else {
				$array_anagrafica[$row_ana['id']] = $row_ana['nome'].', '.$row_ana['cognome'];
				}
		}	
	}


$campo['numero'] = array('label' => 'Numero','ordinamento' => true,'campodb_ordinamento' => 'f.numero','ricerca'=> true,'dbFieldSearch' => 'f.numero','inTable' => true);		
$campo['numerorif'] = array('label' => 'Numero Rif','ordinamento' => true,'campodb_ordinamento' => 'f.numerorif','ricerca'=> true,'dbFieldSearch' => 'f.numerorif','inTable' => true);		
$campo['datains'] = array('label' => 'Inserita','ordinamento' => true,'campodb_ordinamento' => 'f.datains','ricerca'=> true,'dbFieldSearch' => 'f.datains','inTable' => true);		
$campo['datapagamento'] = array('label' => 'Pagata','ordinamento' => true,'campodb_ordinamento' => 'f.datapagamento','ricerca'=> true,'dbFieldSearch' => 'f.datapagamento','inTable' => true);		
$campo['descrizione'] = array('label' => 'Descrizione','ordinamento' => true,'campodb_ordinamento' => 'f.descrizione','ricerca'=> true,'dbFieldSearch' => 'f.descrizione','inTable' => true);		
$campo['anagrafica'] = array('label' => 'Anagrafica','ordinamento' => true,'campodb_ordinamento' => 'f.id_ana','ricerca'=> true,'dbFieldSearch' => 'f.id_ana','inTable' => true);		
$campo['importo'] = array('label' => 'Importo','ordinamento' => true,'campodb_ordinamento' => 'f.importo','ricerca'=> true,'dbFieldSearch' => 'f.importo','inTable' => true);		
$campo['deducibile'] = array('label' => 'Deducibile','ordinamento' => true,'campodb_ordinamento' => 'f.deducibile','ricerca'=> true,'dbFieldSearch' => 'f.deducibile','inTable' => true);		

$query = "SELECT f.id AS id,
					f.id_ana AS id_ana,
					f.numero AS numero,
					f.datains AS datains,
					DATE_FORMAT(f.datains, '%d/%m/%Y') AS datainsita,
					f.datapagamento AS datapagamento,
					DATE_FORMAT(f.datapagamento, '%d/%m/%Y') AS datapagamentoita,
					f.descrizione AS descrizione,
					f.importo AS importo,
					f.archiviata AS archiviata,
					f.numerorif AS numerorif,
					a.azienda AS a_azienda,
					a.piva AS a_piva,
					a.cfiscale AS a_cfiscale,
					f.deducibile AS deducibile,
					a.nome AS a_nome,
					a.cognome AS a_cognome,
					a.via AS a_via,
					a.cap AS a_cap,
					a.citta AS a_citta,
					a.provincia AS a_provincia,
					a.telefono AS a_telefono,
					a.fax AS a_fax,
					a.mobile AS a_mobile,
					a.skype AS a_skype,
					a.email AS a_email,
					a.url AS a_url 
					FROM mige_fatture as f 
					LEFT JOIN mige_anagrafica as a ON (f.id_ana = a.id)";

$query .= " WHERE f.tipo = 'U' AND f.archiviata = '0'";

$SqlExtendQuery = new SqlExtendQuery(); 
// aggiungo la sezione ricerca
if (isset($_MY_SESSION_VARS[$modulo]['filtersArray']) && is_array($_MY_SESSION_VARS[$modulo]['filtersArray'])) $query .= ' AND '.$SqlExtendQuery->addSqlSearchClause($_MY_SESSION_VARS[$modulo]['filtersArray']);
// aggiungo sezione ordinamento
if (isset($_MY_SESSION_VARS[$modulo]['ordinamento']) && is_array($_MY_SESSION_VARS[$modulo]['ordinamento'])) $query .= ' ORDER BY '.$SqlExtendQuery->addSqlOrderClause($campo,$_MY_SESSION_VARS[$modulo]['ordinamento']);


$result = $db->query($query) or die('Errore lettura lista records!');	
	if ($db->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {
   	$nomefile = "Minimogest_stampa_fatture_uscite.pdf";
		$tipo_applicazione = "application/pdf";   
		if (isset($_GET['tipo']) && $_GET['tipo'] == "html") {
			$nomefile = "Minimogest_stampa_fatture_uscite.html";
			$tipo_applicazione = "text/html";        
			}
		header("Content-type: $tipo_applicazione");
		header("Content-Disposition: attachment; filename=".basename($nomefile).";");
   	
		$label_dati = array('numero' => '<strong>Numero</strong>','numerorif' => '<strong>Nr. Riferiemnto</strong>','datains' => '<strong>Inserita</strong>','datapagamento' => '<strong>Pagata</strong>','descrizione' => '<strong>Descrizione</strong>','anagrafica' => '<strong>Anagrafica</strong>','importo' => '<strong>Importo</strong>','deducibile' => '<strong>Deducibile</strong>');
	
		$z = 0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
			$dati[$z]['numero'] = $row['numero'];
			$dati[$z]['numerorif'] = $row['numerorif'];
			$dati[$z]['datains'] = $row['datainsita'];
			$dati[$z]['datapagamento'] = $row['datapagamentoita'];
			$dati[$z]['descrizione'] = $row['descrizione'];
			if ($row['a_azienda']!="") {
				$dati[$z]['anagrafica'] = $row['a_azienda'];
				} else {
					$dati[$z]['anagrafica'] = $row['a_nome'].", ".$row['a_cognome'];
					}           
			$dati[$z]['importo'] = number_format($row['importo'],2,',','.');
			$dati[$z]['deducibile'] = (isset($settings['deducibile'][$row['deducibile']]) ? $settings['deducibile'][$row['deducibile']] : '');
			$z++;  
			}   
	}
   
   
// visualizza i dati

if (is_array($dati) && count($dati) > 0) {
	$dati = array_pulisci($dati);

	if (isset($_GET['tipo']) && $_GET['tipo'] == "html") {
		echo '<html><head></head><body style="background-color:white;">';
		echo '<table style="width:95%; margin:10px auto; border:1px solid black; border-collapse: collapse; padding:2px;">';    
		echo '<caption style="font-size:110%; font-weight:bold;">Minimogest - Fatture Uscite</caption>';
		echo "<thead><tr>\n"; 
		foreach ($label_dati as $key=>$value) {      
			echo '<th>'.$value.'</th>';      
			}      
		echo '</tr></thead>';
		echo '<tbody>'."\n";
		foreach ($dati AS $key=>$value) {      
			echo '<tr>';            
			foreach ($value as $kvalue=>$vvalue) {      
				echo '<td style="border: thin dotted; vertical-align:top; padding:4px;';
				if ($kvalue == "importo") echo ' text-align:right;';
				echo '">'; 
					if ($kvalue == "descrizione") {
						echo nl2br($vvalue); 
						} else { 
							echo $vvalue; 
							}           				           
				echo '</td>';      
				}            
			echo '</tr>';      
			}      
		echo '</tbody>'."\n";     
		echo '</table>';
		echo '</body></html>';
	   }
   
   // se tipo = PDF
	if (isset($_GET['tipo']) && $_GET['tipo'] == "pdf") {
		recursive_array_replace('<strong>','<b>',$label_dati);
   	recursive_array_replace('</strong>','</b>',$label_dati);
   	$label_dati = array_pulisci($label_dati);	
		$pdf = new Cezpdf('a4','portrait');
		$pdf->selectFont('classi/pdf/fonts/Helvetica.afm', array('encoding' => 'WinAnsiEncoding','differences' => $pdf_diff_encoding));
		$pdf->ezSetMargins("25","50","50","50");
		$pdf->ezTable($dati,$label_dati,"Minimogest - Fatture Uscite",array('showHeadings' => 1,'shaded' => 1,'showLines' => 1,'colGrap' => "5",'rowGap' => "5",'xPos' => 'center','titleFontSize' => 9,'fontSize' => 8,'cols' => array('importo' => array('justification' => 'right'))));
		$pdf->ezStream(); 
		}
} // fine if array

			
// Initialize a ROS PDF class object using DIN-A4, with background color gray
//$pdf = new Cezpdf('a4','portrait','color',array(0.8,0.8,0.8));
// Set pdf Bleedbox
//$pdf->ezSetMargins(20,20,20,20);
// Use one of the pdf core fonts
//$mainFont = 'Times-Roman';
// Select the font
//$pdf->selectFont($mainFont);
// Define the font size
//$//size=12;
// Modified to use the local file if it can
//$pdf->openHere('Fit');

// Output some colored text by using text directives and justify it to the right of the document
//$pdf->ezText("PDF with some <c:color:1,0,0>blue</c:color> <c:color:0,1,0>red</c:color> and <c:color:0,0,1>green</c:color> colours", $size, array('justification'=>'right'));
// Output the pdf as stream, but uncompress
//$pdf->ezStream(array('compress'=>0));
		
			};		
		die();
	break;
	default:
	break;
	}	
?>
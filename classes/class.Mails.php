<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * classes/class.Mails.php v.1.0.0. 28/09/2017
*/

class Mails extends Core {

	public function __construct() 	{
		parent::__construct();					
		}
		
	public static function sendMail($address,$subject,$content,$text_content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');	
		$opz = array_merge($opzDef,$opz);
		if (self::$globalSettings['use php mail class'] == 1) {
			self::sendMailClass($address,$subject,$content,$text_content,$opz);
			} else {
				self::sendMailPHP($address,$subject,$content,$text_content,$opz);
				}
		
		}		
	
	public static function sendMailClass($address,$subject,$content,$text_content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');
		$opz = array_merge($opzDef,$opz);	
		$transport = '';
		switch (self::$globalSettings['mail server']) {
			case 'SMTP':
				$transport = new Swift_SmtpTransport(self::$globalSettings['SMTP server'], self::$globalSettings['SMTP port']);
				if (isset(self::$globalSettings['SMTP username']) && self::$globalSettings['SMTP username'] != '') $transport->setUsername(self::$globalSettings['SMTP username']);
				if (isset(self::$globalSettings['SMTP password']) && self::$globalSettings['SMTP password'] != '') $transport->setPassword(self::$globalSettings['SMTP password']);
			break;
			
			default:
				$transport = new Swift_SendmailTransport(self::$globalSettings['sendmail path']);
			break;
			}

		try {
			$mailer = new Swift_Mailer($transport);
			// Create a message
			$message = (new Swift_Message($subject))
	  			->setFrom([$opz['fromEmail']=>$opz['fromLabel']])
	  			->setTo([$address])
	  			->setBody($content, 'text/html')
				->addPart($text_content, 'text/plain');
	  		;
			// Send the message
			try {
				$mailer->send($message);
				} catch (\Swift_TransportException $e) {
					Core::$resultOp->error = 1;
					//echo $e->getMessage();
					}       
	    	} catch (Swift_TransportException $e) {
	        	//return $e->getMessage();
	        	Core::$resultOp->error = 1;
	    	} catch (Exception $e) {
	      	//return $e->getMessage();
	      	Core::$resultOp->error = 1;
	    		}
		}
		
	public static function sendMailPHP($address,$subject,$content,$text_content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');	
		$opz = array_merge($opzDef,$opz);	
		$mail_boundary = "=_NextPart_" . md5(uniqid(time()));	
		$headers = "From: ".$opz['fromLabel']." <".$opz['fromEmail'].">\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/alternative;\n\tboundary=\"$mail_boundary\"\n";
		$headers .= "X-Mailer: PHP " . phpversion();
		// Costruisci il corpo del messaggio da inviare
		$msg = "This is a multi-part message in MIME format.\n\n";
		$msg .= "--$mail_boundary\n";
		$msg .= "Content-Type: text/plain; charset=\"UTF-8\"\n";
		$msg .= "Content-Transfer-Encoding: 8bit\n\n";
		$msg .= $text_content; // aggiungi il messaggio in formato text
 
		$msg .= "\n--$mail_boundary\n";
		$msg .= "Content-Type: text/html; charset=\"UTF-8\"\n";
		$msg .= "Content-Transfer-Encoding: 8bit\n\n";
		$msg .= $content;  // aggiungi il messaggio in formato HTML
 
		// Boundary di terminazione multipart/alternative
		$msg .= "\n--$mail_boundary--\n";
 		$sender = $opz['fromEmail'];
		// Imposta il Return-Path (funziona solo su hosting Windows)
		ini_set("sendmail_from", $sender); 
		// Invia il messaggio, il quinto parametro "-f$sender" imposta il Return-Path su hosting Linux
		$result = mail($address,$subject,$msg,$headers, "-f$sender");		
		if (!$result) {   
    		//echo "Error";
    		Core::$resultOp->error = 1;  
			} else {
    			//echo "Success";
    			Core::$resultOp->error = 0;
				}
	}
				
	public static function parseMailContent($post,$content,$opz=array()) {
		$opzDef = array('customFields'=>array(),'customFieldsValue'=>array());	
		$opz = array_merge($opzDef,$opz);
		$content = preg_replace('/{{SITENAME}}/',SITE_NAME,$content);
		if (isset($post['urlconfirm'])) $content = preg_replace('/{{URLCONFIRM}}/',$post['urlconfirm'],$content);
		if (isset($post['hash'])) $content = preg_replace('/{{HASH}}/',$post['hash'],$content);
		if (isset($post['username'])) $content = preg_replace('/{{USERNAME}}/',$post['username'],$content);
		if (isset($post['name'])) $content = preg_replace('/{{NAME}}/',$post['name'],$content);
		if (isset($post['surname'])) $content = preg_replace('/{{SURNAME}}/',$post['surname'],$content);
		if (isset($post['email'])) $content = preg_replace('/{{EMAIL}}/',$post['email'],$content);
		if (isset($post['subject'])) $content = preg_replace('/{{SUBJECT}}/',$post['subject'],$content);	
		if (isset($post['message'])) $content = preg_replace('/{{MESSAGE}}/',$post['message'],$content);	
		if (
			(is_array($opz['customFields']) && count($opz['customFields'])) 
			&& (is_array($opz['customFieldsValue']) && count($opz['customFieldsValue'])) 
			&& (count($opz['customFields']) == count($opz['customFieldsValue']))
			) {			
			foreach ($opz['customFields'] AS $key=>$value) {
				$content = preg_replace('/'.$opz['customFields'][$key].'/',$opz['customFieldsValue'][$key],$content);
				}
			}
		return $content;
		}	

	}
?>
<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.Sessions.php v.2.6.3. 02/08/2016
*/

class my_session {
   var $my_session_id; // l'id di sessione
   var $session_time; // la durata della sessione
   var $session_gc_time; // il tempo per la garbage collection
   var $table_name = SESSIONS_TABLE_NAME; //'sitodemo509_sessions'; // il tempo per la garbage collection
   var $cookie_name = SESSIONS_COOKIE_NAME; // il tempo per la garbage collection
 
   //il costruttore della classe, inizializza le variabili
   public function __construct($session_time, $session_gc_time,$cookie_name_def='') { 
   	if ($cookie_name_def != '') $this->cookie_name = $cookie_name_def;
      $this->my_session_id = (!isset($_COOKIE[$this->cookie_name]))
      ? md5(uniqid(microtime()))
      : $_COOKIE[$this->cookie_name];
      $this->session_time = $session_time;
      $this->session_gc_time = $session_gc_time;
      }

   // avvia o aggiorna la sessione
   public function my_session_start() {
   	//echo '<br>cookie name '.$this->cookie_name;
   	$pdoCore = Sql::getInstanceDb();
      $cookie_expire = ($this->session_time > 0) ? (time() + $this->session_time) : 0;
      if(!isset($_COOKIE[$this->cookie_name])) {
      	//echo '<br>il cookie non esiste... lo creo';
         setcookie($this->cookie_name, $this->my_session_id, $cookie_expire,'/','');
         $sql = "INSERT INTO ".$this->table_name." VALUES('".$this->my_session_id."', '', " .time(). ")";
         $result = $pdoCore->query($sql) or die('Errore db linea 36!');
         } else {
         	//echo '<br> il cookie esiste';
            if($this->session_time > 0)
            setcookie($this->cookie_name, $this->my_session_id, $cookie_expire,'/','');
            }
      }

   /*   registra la variabili di sessione specificata nel database */
   public function my_session_register($name, $value) {   
      $_MY_SESSION = array();
      $sql = "SELECT session_vars FROM ".$this->table_name." WHERE sessid = '{$this->my_session_id}'";
      $pdoCore = Sql::getInstanceDb();
      $result = $pdoCore->query($sql) or die('Errore db linea 48!');
      if ($pdoCore->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {
         $row = $result->fetch(PDO::FETCH_ASSOC);              		
       	$_MY_SESSION = unserialize($row['session_vars']); 
       	$_MY_SESSION[$name] = $value;
       	
       	Sql::initQuery($this->table_name,array('session_vars'),array(serialize($_MY_SESSION),$this->my_session_id),'sessid = ?');
       	Sql::updateRecord();
       	/* $sql_a = "UPDATE ".$this->table_name." SET session_vars = '" . serialize($_MY_SESSION) . "' WHERE sessid = '{$this->my_session_id}'";
         $result_a = $pdoCore->dbh->query($sql_a) or die('Errore db linea 55!');
         */
         } else {
            $_MY_SESSION[$name] = $value;
            $sql_b = "UPDATE ".$this->table_name." SET session_vars = '" . serialize($_MY_SESSION) . "' WHERE sessid = '{$this->my_session_id}'";
   			$result_b = $pdoCore->query($sql_b) or die('Errore db linea 59!');
            }
      }
      
    public function my_session_unsetVar($name) {   
      $_MY_SESSION = array();
      $sql = "SELECT session_vars FROM ".$this->table_name." WHERE sessid = '{$this->my_session_id}'";
      $pdoCore = Sql::getInstanceDb();
      $result = $pdoCore->query($sql) or die('Errore db linea 48!');
      if ($pdoCore->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {
         $row = $result->fetch(PDO::FETCH_ASSOC);              		
       	$_MY_SESSION = unserialize($row['session_vars']); 
       	unset($_MY_SESSION[$name]);
       	$sql_a = "UPDATE ".$this->table_name." SET session_vars = '" . serialize($_MY_SESSION) . "' WHERE sessid = '{$this->my_session_id}'";
         $result_a = $pdoCore->query($sql_a) or die('Errore db linea 55!');
         } else {
            $_MY_SESSION[$name] = '';
            $sql_b = "UPDATE ".$this->table_name." SET session_vars = '" . serialize($_MY_SESSION) . "' WHERE sessid = '{$this->my_session_id}'";
   			$result_b = $pdoCore->query($sql_b) or die('Errore db linea 59!');
            }
      }


   /*   legge e restituisce le variabili di sessione (o la singola variabile specificata */
   public function my_session_read($key = '') {
      $sql = "SELECT session_vars FROM ".$this->table_name." WHERE sessid = '{$this->my_session_id}'";  
      $pdoCore = Sql::getInstanceDb();
      $result = $pdoCore->query($sql) or die('Errore db linea 70!');
      if ($pdoCore->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {
      	$row = $result->fetch(PDO::FETCH_ASSOC); 
         $row['session_vars'] = stripslashes($row['session_vars']);
         $session_vars = unserialize($row['session_vars']);
         return (isset($key) && $key) ? $session_vars[$key] : $session_vars;        
         }     
      }

   /*   distrugge la sessione, rimuovendo i relativi dati (non cancella il cookie) */
   public function my_session_destroy() {
   	$pdoCore = Sql::getInstanceDb();
      $sql = "UPDATE ".$this->table_name." SET session_vars = '' WHERE sessid = '{$this->my_session_id}'";
      $result = $pdoCore->query($sql) or die('Errore db linea 84!');
      }

   // procedura di garbage collection
   public function my_session_gc() {
      $pdoCore = Sql::getInstanceDb();
      $sql = "DELETE FROM ".$this->table_name." WHERE session_date < " . (time() - $this->session_gc_time);
      $result = $pdoCore->query($sql) or die('Errore db linea 92!');
      setcookie($this->cookie_name);
   }
   
  	public function addSessionsModuleVars($sessionsVars,$app,$sessionsDef) {
		$refresh = false;
		// se non esiste la sessione la crea di fdefault
		if (!isset($sessionsVars[$app])) {
			$sessionsVars[$app] = array();
			$refresh = true;
			}
		// controlla se sono settati i parametri di defautl
		if (is_array($sessionsDef) && count($sessionsDef) > 0) {
			foreach ($sessionsDef AS $key=>$value) {
				if (!isset($sessionsVars[$app][$key])) {
					$sessionsVars[$app][$key] = $value;
					$refresh = true;
					}				
  				}  
  			} 
		
		if ($refresh == true) {		
		   $this->my_session_register($app,$sessionsVars[$app]);	
			$sessionsVars = array();
			$sessionsVars = $this->my_session_read();
			}
  		return $sessionsVars;  	
  		}   
  		
  	public function addSessionsModuleSingleVar($sessionsVars,$app,$key,$var) {
		$sessionsVars[$app][$key] = $var;		
		$this->my_session_register($app,$sessionsVars[$app]);	
		$sessionsVars = array();
		$sessionsVars = $this->my_session_read();
  		return $sessionsVars;  			
  		}	  
  	}	
  // end class
?>
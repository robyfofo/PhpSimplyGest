<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/core/class.module.php v.1.0.0. 03/07/2018
*/

class Module {
	public $error;
	public $message;
	public $messages;
	public $errorType;
	
	public function __construct() {
		$this->error = 0;	
		$this->message = '';
		$this->messages = array();
		}
	
	public function getAvatarData($id,$_lang) {
		$this->message ='';
		$this->messages = array();
		$this->error = 0;
		$avatar = '';
		$avatar_info = '';
		if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > 0) {			
         if ($_FILES['avatar']['error'] == 0 ) {
            $array_avatarInfo = array();
            $max_size = 80000;
            $result = @is_uploaded_file($_FILES['avatar']['tmp_name']);
            if (!$result) {
               $this->message = $_lang['Impossibile eseguire upload! Se è presente è stato mantenuto il file precedente!'];
               $this->error = 0;
               $this->errorType = 2;
               } else {
                  $size = $_FILES['avatar']['size'];
                  if ($size > $max_size) {
                    	$this->message = $_lang['Il file indicato è troppo grande! Il file deve avere la dimensione massima di %MAZSIZE% KByte! Se esisteva è stato mantenuto il file precedente.'];
           				$this->message = preg_replace('/%MAZSIZE%/', intval($max_size /1024), $this->message);
           				$this->error = 0;
           				$this->errorType = 2;
           				$App = new stdClass;
			         	$App->oldItem = new stdClass;		
							Sql::initQuery(Sql::getTablePrefix().'users',array('avatar','avatar_info'),array($id),'id = ?');	
							$App->oldItem = Sql::getRecord();
							$avatar = $App->oldItem->avatar;
							$avatar_info = $App->oldItem->avatar_info;
                     } else {
                     	$array_avatarInfo['type'] = $_FILES['avatar']['type'];
                  		$array_avatarInfo['nome'] = $_FILES['avatar']['name'];
                  		$array_avatarInfo['size'] = $_FILES['avatar']['size'];
                  		$avatar = @file_get_contents($_FILES['avatar']['tmp_name']);
                 			$avatar_info = serialize($array_avatarInfo);
                 			}                  
                  }
             }	else {
             	$this->message = $_lang['Impossibile eseguire upload: problemi accesso immagine! Se è presente è stato mantenuto il file precedente!'];
               $this->error = 1;
             	}	            
         } else {
         	if ($id > 0) {
	         	//$this->message = "Impossibile eseguire l'upload: problemi accesso immagine! Se è presente è stato mantenuto il file precedente! ";
	            //$this->error = 0;
	            //$this->errorType = 2;
	         	$App = new stdClass;	
	         	$App->oldItem = new stdClass;		
					Sql::initQuery(DB_TABLE_PREFIX.'users',array('avatar','avatar_info'),array($id),'id = ?');	
					$App->oldItem = Sql::getRecord();
					$avatar = $App->oldItem->avatar;
					$avatar_info = $App->oldItem->avatar_info;
					}
				}
		return array($avatar,$avatar_info);
		}

		
	public function getUserTemplatesArray() {		
		$arr = array();
		if ($handle = opendir('templates/')){
			while ($file = readdir($handle)) {
				if (is_dir('templates/'.$file)) {
					if ($file != "." && $file != "..") $arr[] = $file;
		  			}
				}
			}
		closedir($handle);	
		return $arr;		
		}

	}
?>

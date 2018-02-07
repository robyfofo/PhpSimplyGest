<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/module.class.php v.3.0.0. 04/11/2016
*/

class Module {
	public $error;
	public $message;
	public $messages;
	
	public function __construct() {
		$this->error = 0;	
		$this->message = '';
		$this->messages = array();
		}
	
	public function getAvatarData($id) {
		$this->error = 0;
		$avatar = '';
		$info = '';
		if (intval($id) > 0) {
			$this->itemData = new stdClass;		
			Sql::initQuery(Sql::getTablePrefix().'users',array('avatar','avatar_info'),array($id),"id = ?");
			$this->itemData = Sql::getRecord();
			if(Core::$resultOp->error == 0) {
				$avatar = $this->itemData->avatar;
				$info = $this->itemData->avatar_info;
				}
			
			}
		if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > 0) {
         if ($_FILES['avatar']['error'] == 0 ) {
            $array_avatarInfo = array();
            $max_size = 200000;
            $result = @is_uploaded_file($_FILES['avatar']['tmp_name']);
            if (!$result) {
               $this->message = 'Impossibile eseguire l\'upload! ';
               $this->error = 1;
               } else {
                  $size = $_FILES['avatar']['size'];
                  if ($size > $max_size) {
                     Core::$resultOp->message = 'Il file indicato è troppo grande! Se esisteva è stato mantenuto il file precedente. ';
           				Core::$resultOp->error = 1;
                     } else {
                     	$array_avatarInfo['type'] = $_FILES['avatar']['type'];
                  		$array_avatarInfo['nome'] = $_FILES['avatar']['name'];
                  		$array_avatarInfo['size'] = $_FILES['avatar']['size'];
                  		$avatar = @file_get_contents($_FILES['avatar']['tmp_name']);
                 			$info = serialize($array_avatarInfo);
                 			}                  
                  }
             }		            
         } else {
         
         }
		
		return array($avatar,$info);
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

<?php
/**
 * Framework App PHP-MySQL
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/classes/class.Permissions.php v.1.0.0. 02/07/2018
*/

class Permissions extends Core {
	
	public function __construct() {
		parent::__construct();
		}
	
	public static function getUserLevels(){		
		Sql::initQuery(Sql::getTablePrefix().'levels',array('*'),array(),'active = 1','title ASC');
		//Sql::setOptions(array('fieldTokeyObj'=>'id'));
		$obj1 = Sql::getRecords();
		$obj2[0] = (object)array('id'=>0,'title'=>'Anonimo','modules'=>'','active'=>1);
		$obj = array_merge($obj2,$obj1);
		return $obj;		
		}
		
	public static function getUserLevelLabel($user_levels,$id_level,$is_root=0) {
		$s = '';
		if($is_root == 1) {
			$s = 'Root';
			} else {
				//$s .= $id_level;
				if (is_array($user_levels) && count($user_levels) > 0) {
					foreach($user_levels AS $value) {
						if ($value->id == $id_level) {
							$s = $value->title;
							break;
							}
						}
					}
				}
		return $s;
		}
		
	public static function checkAccessUserModule($moduleName,$userLoggedData,$userModulesActive) {
		//print_r($userModulesActive);
		if (isset($userLoggedData->is_root) && $userLoggedData->is_root === 1) {
			return true;
			} else {
				/* se è un modulo cre da l'accsso comunque */
				 if (in_array($moduleName,$userModulesActive)) {
				 	return true;
					} else {
						return false;
						}				 	
				}
			}

	public static function getSqlQueryItemPermissionForUser($userLoggedData) {
		$clause = '';
		$clauseValues = array();
		
		/* permissionfor user owner only */
		$clause = 'id_user = ?';
		$clauseValues[] = $userLoggedData->id;
		
		/* add item public - access_type 0 */
		$clause .= ' OR access_type = 0';
	
		/* se root azzerra tutto */
		if (isset($userLoggedData->is_root) && intval($userLoggedData->is_root) === 1) {
			$clause = '';
			$clauseValues = array();
			}
		return array($clause,$clauseValues);
		}
		
	public static function  checkReadWriteAccessOfItem($table,$id,$userLoggedData) {
		//print_r($userLoggedData);
		$access = 0;
		/* get item data */
		if ($id > 0) {
			$item = new stdClass;
			Sql::initQuery($table,array('id,id_user,access_type'),array($id),'id = ?');
			$item = Sql::getRecord();
			if (isset($item->id) && $item->id > 0) {

				/* if is ownwer read write */
				if ($userLoggedData->id === $item->id_user) {
					$access = 2;
					}
				
				/* if is not ownwer but item is public read */
				if ($userLoggedData->id <> $item->id_user && $item->access_type == 0) {
					$access = 1;
					}
			
				/* se root set read write */
				if (isset($userLoggedData->is_root) && intval($userLoggedData->is_root) === 1) {
					$access = 2;
					}
				}
			}
		/* if access = 0 go to error */
		if ($access == 0) ToolsStrings::redirect(URL_SITE.'error/access');
		return $access;
		}		
	public static function seePermissions() {
		echo '<pre>'.print_r(self::$permissions).'</pre>';
		}
	
	public static function seePermissionsLevel($level) {
		echo '<pre>'.print_r(self::$permissions[$level]).'</pre>';
		}
		
	}
?>
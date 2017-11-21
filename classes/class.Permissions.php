<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.Permissions.php v.3.0.0. 20/10/2016
*/

class Permissions extends Core {
	
	public function __construct() {
		parent::__construct();
		}
	
	public static function getUserLevels(){		
		Sql::initQuery(Sql::getTablePrefix().'site_levels',array('*'),array(),'active = 1','title_it ASC');
		//Sql::setOptions(array('fieldTokeyObj'=>'id'));
		$obj1 = Sql::getRecords();
		$obj2[0] = (object)array('id'=>0,'title_it'=>'Anonimo','modules'=>'','active'=>1);
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
							$s = $value->title_it;
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
		
	public static function seePermissions() {
		echo '<pre>'.print_r(self::$permissions).'</pre>';
		}
	
	public static function seePermissionsLevel($level) {
		echo '<pre>'.print_r(self::$permissions[$level]).'</pre>';
		}
		
	}
?>
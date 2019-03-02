<<<<<<< HEAD
<?php
/* DIV MESSAGGI SISTEMA */

if (isset($_MY_SESSION_VARS['message']) && $_MY_SESSION_VARS['message'] != '') {
	$mess = explode('|',$_MY_SESSION_VARS['message']);
	$_MY_SESSION_VARS = $my_session->my_session_unsetVar('message');
	}
if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
	$mess = explode('|',$_SESSION['message']);
	unset($_SESSION['message']);
	}
if (isset($mess[0])) Core::$resultOp->error = $mess[0];
if (isset($mess[1])) Core::$resultOp->message =$mess[1];
	
$App->systemMessages = '';
$appErrors = Utilities::getMessagesCore(Core::$resultOp);
list($show,$error,$type,$content) = $appErrors;
if ($error > 0 && $type == 0) $type = $error;
if ($show == true) {
	$App->systemMessages .= '<div class="row"><div class="col-md-12"><div id="systemMessageID" class="alert';
	if ($type == 2) $App->systemMessages .= ' alert-warning';
	if ($type == 1) $App->systemMessages .= ' alert-danger';
	if ($type == 0) $App->systemMessages .= ' alert-success';
	$App->systemMessages .= '">'.$content.'</div></div></div>';
	}
/* DIV MESSAGGI SISTEMA */
	
/* crea il menu */
$App->rightCodeMenu = '';
foreach($App->modules AS $sectionKey=>$sectionModules) {
	$x1 = 0;
	foreach($sectionModules AS $module) {
		if (Permissions::checkAccessUserModule($module->name,$App->userLoggedData,$App->user_modules_active,$App->modulesCore) === true) {
			if ($module->code_menu != '') {
				$menu = json_decode($module->code_menu);
				$havesubmenu = 0;
				if (isset($menu->submenus) && count($menu->submenus)) $havesubmenu = 1;
				$class = '';
				if (isset( $App->breadcrumb[1]['name']) && $App->breadcrumb[1]['name'] == $module->name) $class = ' class="active"'; 
				$li = '<li'.$class.'>';
				$codemenu = $li.PHP_EOL;
				$codemenu .= '<a href="'.URL_SITE.$menu->name.'">'.$menu->icon.' <span class="nav-label">'.$menu->label.'</span>'.($havesubmenu == 1 ? '<span class="fa arrow"></span>' : '').'</a>';
			
				/* aggiunge submenu 1 */
				if (isset($menu->submenus) && is_array($menu->submenus) && count($menu->submenus) > 0) {
					$codemenu .= '<ul class="nav nav-second-level">';
					foreach ($menu->submenus AS $submenu) {
						$havesubmenu1 = 0;
						if (isset($submenu->submenus) && count($submenu->submenus)) $havesubmenu1 = 1;
						$class = '';
						if (isset( $App->breadcrumb[2]['name']) && $App->breadcrumb[2]['name'] == $submenu->name) $class = ' class="active"'; 
						$li = '<li'.$class.'>';		
						$codemenu .= $li.PHP_EOL;
						$url = URL_SITE;
						if (isset($submenu->action)) $url .= $submenu->action.'/';
						$codemenu .= '<a href="'.$url.$submenu->name.'">'.$submenu->label.'</span>'.($havesubmenu1 == 1 ? '<span class="fa arrow"></span>' : '').'</a>'.PHP_EOL;
						
						if (isset($submenu->submenus) && is_array($submenu->submenus) && count($submenu->submenus) > 0) {
							$codemenu .= '<ul class="nav nav-third-level">'.PHP_EOL;
							foreach ($submenu->submenus AS $submenu1) {
								$class = '';
								if (isset( $App->breadcrumb[3]['name']) && $App->breadcrumb[3]['name'] == $submenu1->name) $class = ' class="active"'; 
								$li = '<li'.$class.'>'.PHP_EOL;
								$codemenu .= $li.PHP_EOL;
								$url = '';
								if ($submenu1->action != '') {
									$url = URL_SITE.$submenu1->action.'/'.$submenu1->name;						
									}
								$codemenu .= '<a href="'.$url.'">'.$submenu1->label.'</a>'.PHP_EOL;
								$codemenu .= '</li>'.PHP_EOL;	
								}
							$codemenu .= '</ul>'.PHP_EOL;
							}
						$codemenu .= '</li>'.PHP_EOL;		
						}
					$codemenu .= '</ul>'.PHP_EOL;
					}
				/* fine aggiunge submenu 1 */
	
				$codemenu .= '</li>'.PHP_EOL;	
				$codemenu = preg_replace('/%LABEL%/',$module->label,$codemenu);
				$codemenu = preg_replace('/%NAME%/',$module->name,$codemenu);	
				$App->rightCodeMenu .= $codemenu;			
				$x1++;								
				}
			}			
		}
	if ($x1 > 0) $App->rightCodeMenu .= '';			
	}
=======
<?php
/* DIV MESSAGGI SISTEMA */
$App->systemMessages = '';
$appErrors = Utilities::getMessagesCore(Core::$resultOp);
list($show,$error,$type,$content) = $appErrors;
if ($error > 0 && $type == 0) $type = $error;
if ($show == true) {
	$App->systemMessages .= '<div class="row"><div class="col-md-12"><div id="systemMessageID" class="alert';
	if ($type == 2) $App->systemMessages .= ' alert-warning';
	if ($type == 1) $App->systemMessages .= ' alert-danger';
	if ($type == 0) $App->systemMessages .= ' alert-success';
	$App->systemMessages .= '">'.$content.'</div></div></div>';
	}
/* DIV MESSAGGI SISTEMA */
	
/* crea il menu */
$App->rightCodeMenu = '';
foreach($App->modules AS $sectionKey=>$sectionModules) {
	$x1 = 0;
	foreach($sectionModules AS $module) {
		if (Permissions::checkAccessUserModule($module->name,$App->userLoggedData,$App->user_modules_active,$App->modulesCore) === true) {
			if ($module->code_menu != '') {
				$menu = json_decode($module->code_menu);
				$havesubmenu = 0;
				if (isset($menu->submenus) && count($menu->submenus)) $havesubmenu = 1;
				$class = '';
				if (isset( $App->breadcrumb[1]['name']) && $App->breadcrumb[1]['name'] == $module->name) $class = ' class="active"'; 
				$li = '<li'.$class.'>';
				$codemenu = $li.PHP_EOL;
				$icon = (isset($menu->icon) ? $menu->icon : '');
				$name = (isset($menu->name) ? $menu->name : '');
				$label = (isset($menu->label) ? $menu->label : '');
				$codemenu .= '<a href="'.URL_SITE.$name.'">'.$icon.' <span class="nav-label">'.$label.'</span>'.($havesubmenu == 1 ? '<span class="fa arrow"></span>' : '').'</a>';
			
				/* aggiunge submenu 1 */
				if (isset($menu->submenus) && is_array($menu->submenus) && count($menu->submenus) > 0) {
					$codemenu .= '<ul class="nav nav-second-level">';
					foreach ($menu->submenus AS $submenu) {
						$havesubmenu1 = 0;
						if (isset($submenu->submenus) && count($submenu->submenus)) $havesubmenu1 = 1;
						$class = '';
						if (isset( $App->breadcrumb[2]['name']) && $App->breadcrumb[2]['name'] == $submenu->name) $class = ' class="active"'; 
						$li = '<li'.$class.'>';		
						$codemenu .= $li.PHP_EOL;
						$url = URL_SITE;
						if (isset($submenu->action)) $url .= $submenu->action.'/';
						$codemenu .= '<a href="'.$url.$submenu->name.'">'.$submenu->label.'</span>'.($havesubmenu1 == 1 ? '<span class="fa arrow"></span>' : '').'</a>'.PHP_EOL;
						
						if (isset($submenu->submenus) && is_array($submenu->submenus) && count($submenu->submenus) > 0) {
							$codemenu .= '<ul class="nav nav-third-level">'.PHP_EOL;
							foreach ($submenu->submenus AS $submenu1) {
								$class = '';
								if (isset( $App->breadcrumb[3]['name']) && $App->breadcrumb[3]['name'] == $submenu1->name) $class = ' class="active"'; 
								$li = '<li'.$class.'>'.PHP_EOL;
								$codemenu .= $li.PHP_EOL;
								$url = '';
								if ($submenu1->action != '') {
									$url = URL_SITE.$submenu1->action.'/'.$submenu1->name;						
									}
								$codemenu .= '<a href="'.$url.'">'.$submenu1->label.'</a>'.PHP_EOL;
								$codemenu .= '</li>'.PHP_EOL;	
								}
							$codemenu .= '</ul>'.PHP_EOL;
							}
						$codemenu .= '</li>'.PHP_EOL;		
						}
					$codemenu .= '</ul>'.PHP_EOL;
					}
				/* fine aggiunge submenu 1 */
	
				$codemenu .= '</li>'.PHP_EOL;	
				$codemenu = preg_replace('/%LABEL%/',$module->label,$codemenu);
				$codemenu = preg_replace('/%NAME%/',$module->name,$codemenu);	
				$App->rightCodeMenu .= $codemenu;			
				$x1++;								
				}
			}			
		}
	if ($x1 > 0) $App->rightCodeMenu .= '';			
	}
>>>>>>> 9b7a2d240ced5cf983e9b60dd3bd7b65ab67fb69
?>
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
				$class = ' class="nav-item"';
				if (isset( $App->breadcrumb[1]['name']) && $App->breadcrumb[1]['name'] == $module->name) $class = ' class="nav-item active"'; 

				$li = '<li'.$class.'>';
				$codemenu = $li.PHP_EOL;
				
				$label = '';
				if (isset($menu->label)) $label = $menu->label;
				if (isset($_lang[$label])) $label = $_lang[$label];
				
				$moduleName = (isset($menu->name) ? $menu->name : '');
				$moduleIcon = (isset($menu->icon) ? $menu->icon : '');
				$moduleAction = (isset($menu->action) ? $menu->action : '');
				
				$hrefclass = 'nav-link';	
				$hrefdata = '';		
				if (isset($menu->submenus) && is_array($menu->submenus) && count($menu->submenus) > 0) {
					$hrefclass = 'nav-link collapsed';
					$hrefdata = ' data-toggle="collapse" data-target="#collapse'.$moduleName.'" aria-expanded="true" aria-controls="collapse'.$moduleName.'"';
				}										
				$codemenu .= '<a class="'.$hrefclass.'"'.$hrefdata.' href="'.URL_SITE.$moduleName.'">'.$moduleIcon.' <span>'.$label.'</span>'.($havesubmenu == 1 ? '<span class="fa arrow"></span>' : '').'</a>';
			
			
/* aggiunge submenu 1 */
				if (isset($menu->submenus) && is_array($menu->submenus) && count($menu->submenus) > 0) {
					
					$divclass = 'collapse abcde';
//echo '#'.$moduleAction.'#';
//echo '#'.Core::$request->action.'#';
					if ($moduleAction == Core::$request->action) $divclass .= 'collapse 12345 show';
					
					
					$codemenu .= '<div id="collapse'.$moduleName.'" class="'.$divclass.'" aria-labelledby="heading'.$moduleName.'" data-parent="#accordionSidebar"><div class="bg-white py-2 collapse-inner rounded">';
					foreach ($menu->submenus AS $submenu) {
						$havesubmenu1 = 0;
						if (isset($submenu->submenus) && count($submenu->submenus)) $havesubmenu1 = 1;
						$class = '';
						if (isset( $App->breadcrumb[2]['name']) && $App->breadcrumb[2]['name'] == $submenu->name) $class = ' class="active"'; 						
						$subauth = 0;
						if (isset($submenu->auth) && $submenu->auth == "1") $subauth = 1; 						
						if ($subauth == 0) {
							$url = URL_SITE;							
							$label = $submenu->label;
							if (isset($_lang[$label])) $label = $_lang[$label];								
							$submoduleName = (isset($submenu->name) ? $submenu->name : '');
							$submoduleIcon = (isset($submenu->icon) ? $submenu->icon : '');
							
							if (isset($submenu->action) && $submenu->action != '') $url .= $submenu->action.'/';	
							$hrefclass = 'collapse-item';	
							$hrefdata = '';	
							$codemenu .= '<a class="'.$hrefclass.'" href="'.$url.$submoduleName.'">'.$submoduleIcon.' '.$label.($havesubmenu1 == 1 ? '<span class="fa arrow"></span>' : '').'</a>'.PHP_EOL;			
							
							}	
						}
					$codemenu .= '</div></div>'.PHP_EOL;
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
?>
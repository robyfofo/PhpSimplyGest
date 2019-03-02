<?php
/* users */
if (in_array(DB_TABLE_PREFIX.'users',$App->tablesOfDatabase) && file_exists(PATH.$App->pathApplications."users/index.php") && Permissions::checkAccessUserModule('users',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['users'] = array(
		'table'=>DB_TABLE_PREFIX.'users',
		'sqloption'=>array('clause'=>'is_root = 0','iduser'=>0),
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['utenti']),
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'users',
			'opz'=>array()
			)
		);		

	$App->homeTables['users'] = array(
		'table'=>DB_TABLE_PREFIX.'users',
		'sqloption'=>array('clause'=>'is_root = 0','iduser'=>0),
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['ultimi utenti']),
		'fields'=>array(
			'username'=>array(
				'multilanguage'=>0,
				'type'=>'varchar',
				'label'=>ucfirst($_lang['nome utente']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'users',
					'opz'=>array(
						)
					)
				),
			'avatar'=>array(
				'multilanguage'=>0,
				'type'=>'avatar',
				'label'=>ucfirst($_lang['avatar']),
				'url'=>false,
				)
			
			)
		);

	}
?>
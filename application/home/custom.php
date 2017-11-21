<?php
/* Projects */
if (in_array(DB_TABLE_PREFIX.'projects',$tablesDb) && file_exists(PATH."application/projects/index.php") && Permissions::checkAccessUserModule('projects',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['projects'] = array(
		'table'=>DB_TABLE_PREFIX.'projects',
		'icon panel'=>'fa-cog',
		'label'=>ucfirst($_lang['progetti']),
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'projects',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['projects'] = array(
		'table'=>DB_TABLE_PREFIX.'projects',
		'icon panel'=>'fa-cog',
		'label'=>ucfirst($_lang['ultimi progetti']),
		'fields'=>array(
			'title'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['titolo']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'projects',
					'opz'=>array(
						)
					)
				)
			)
		);
	}
	
/* Todo */
if (in_array(DB_TABLE_PREFIX.'todo',$tablesDb) && file_exists(PATH."application/todo/index.php") && Permissions::checkAccessUserModule('todo',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['projects'] = array(
		'table'=>DB_TABLE_PREFIX.'todo',
		'icon panel'=>'fa-cog',
		'label'=>'Da fare',
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'Todo',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['todo'] = array(
		'table'=>DB_TABLE_PREFIX.'todo',
		'icon panel'=>'fa-cog',
		'label'=>'Ultimi da fare',
		'fields'=>array(
			'title'=>array(
				'type'=>'varchar',
				'label'=>'Titolo',
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'Todo',
					'opz'=>array(
						)
					)
				)
			)
		);	
	}
	
/* Timecard */
/*
if (in_array(DB_TABLE_PREFIX.'timecard',$tablesDb) && file_exists(PATH."application/timecard/index.php") && Permissions::checkAccessUserModule('timecard',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['timecard'] = array(
		'table'=>DB_TABLE_PREFIX.'timecard',
		'icon panel'=>'fa-clock-o',
		'label'=>'Timecard',
		'sex suffix'=>'e',
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>'{{URL_SITE}}timecard',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['timecard'] = array(
		'table'=>DB_TABLE_PREFIX.'timecard',
		'icon panel'=>'fa-clock-o',
		'label'=>'Ultime timecard',
		'fields'=>array(
			'content'=>array(
				'type'=>'varchar',
				'label'=>'Contenuto',
				'url'=>true,
				'url item'=>array(
					'string'=>'{{URL_SITE}}timecard',
					'opz'=>array(
						)
					)
				),
			'worktime'=>array(
				'type'=>'varchar',
				'label'=>'Tempo',
				'url'=>false
				)
			)
		);	
	}
*/	
/* Contacts */
if (in_array(DB_TABLE_PREFIX.'contacts',$tablesDb) && file_exists(PATH."application/contacts/index.php") && Permissions::checkAccessUserModule('contacts',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['contacts'] = array(
		'table'=>DB_TABLE_PREFIX.'contacts',
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['contatti']),
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'contacts',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['contacts'] = array(
		'table'=>DB_TABLE_PREFIX.'contacts',
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['ultimi contatti']),
		'fields'=>array(
			'name'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['nome']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'contacts',
					'opz'=>array(
						)
					)
				),
			'surname'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['cognome']),
				'url'=>false
				)
			)
		);
		
	}
?>
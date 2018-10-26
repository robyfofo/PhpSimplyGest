<?php
/* Timecard */

if (in_array(DB_TABLE_PREFIX.'timecard',$tablesDb) && file_exists(PATH."application/timecard/index.php") && Permissions::checkAccessUserModule('timecard',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {

	$App->homeBlocks['timecard'] = array(
		'table'=>DB_TABLE_PREFIX.'timecard',
		'where'=>'datains > ?',
		'datafields'=>array($App->lastLogin),
		'icon panel'=>'fa-clock-o',
		'label'=>ucfirst($_lang['timecard']),
		'sex suffix'=>ucfirst($_lang['nuove']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'timecard',
			'opz'=>array()
			)
		);	

	$App->homeTables['timecard'] = array(
		'table'=>DB_TABLE_PREFIX.'timecard',
		'sqloption'=> array(
			'order'=>"datains DESC",
			'fieldcreated'=>'datains',
			'datecreateformat'=>'date'
			),
		'icon panel'=>'fa-clock-o',
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['timecard'],
		'fields'=>array(
			'content'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['contenuto']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'timecard',
					'opz'=>array(
						)
					)
				),
			'worktime'=>array(
				'type'=>ucfirst($_lang['tempo']),
				'label'=>'Tempo',
				'url'=>false
				)
			)
		);	

	}
	
/* Todo */
if (in_array(DB_TABLE_PREFIX.'todo',$tablesDb) && file_exists(PATH."application/todo/index.php") && Permissions::checkAccessUserModule('todo',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['todo'] = array(
		'table'=>DB_TABLE_PREFIX.'todo',
		'icon panel'=>'fa-bookmark-o',
		'label'=>ucfirst($_lang['da fare']),
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'todo',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['todo'] = array(
		'table'=>DB_TABLE_PREFIX.'todo',
		'icon panel'=>'fa-bookmark-o',
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['da fare'],
		'fields'=>array(
			'title'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['titolo']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'todo',
					'opz'=>array(
						)
					)
				)
			)
		);	
	}
	
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
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['progetti'],
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
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['contatti'],
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
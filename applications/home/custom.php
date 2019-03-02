<?php
if (in_array(DB_TABLE_PREFIX.'timecard',$tablesDb) && file_exists(PATH.$App->pathApplications."timecard/index.php")) {

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
/* Thirdparty */
if (in_array(DB_TABLE_PREFIX.'thirdparty',$tablesDb) && file_exists(PATH.$App->pathApplications."third-party/index.php") == true) {
	$App->homeBlocks['thirdparty'] = array(
		'table'=>DB_TABLE_PREFIX.'thirdparty',
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['terze parti']),
		'sex suffix'=>ucfirst($_lang['nuove']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'third-party/listItem',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['contacts'] = array(
		'table'=>DB_TABLE_PREFIX.'thirdparty',
		'icon panel'=>'fa-users',
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['terze parti'],
		'fields'=>array(
			'ragione_sociale'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['ragione sociale']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'third-party/listItem',
					'opz'=>array(
						)
					)
				)
			)
		);	
	}
	
/* Projects */
if (in_array(DB_TABLE_PREFIX.'projects',$tablesDb) && file_exists(PATH.$App->pathApplications."projects/index.php") == true) {
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
		'label'=>ucfirst($_lang['ultimi']).' '.$_lang['progetti'],
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
if (in_array(DB_TABLE_PREFIX.'todo',$tablesDb) && file_exists(PATH.$App->pathApplications."todo/index.php")  == true) {
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
		'label'=>ucfirst($_lang['ultimi']).' '.$_lang['da fare'],
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
	
/* Invoices sales */
if (in_array(DB_TABLE_PREFIX.'invoices_sales',$tablesDb) && file_exists(PATH.$App->pathApplications."invoices/index.php") == true) {
	$App->homeBlocks['invoices_sales'] = array(
		'table'=>DB_TABLE_PREFIX.'invoices_sales',
		'icon panel'=>'fa-wpforms',
		'label'=>ucfirst($_lang['fatture vendite']),
		'sex suffix'=>ucfirst($_lang['nuove']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'invoices/listItes',
			'opz'=>array()
			)
		);	
		
	$fields[] = "i.id,i.number,i.tax,i.rivalsa,i.created AS created";
	$fields[] = "(SELECT SUM(a.price_total) FROM ".DB_TABLE_PREFIX."invoices_sales_articles AS a WHERE i.id = a.id_invoice) AS total";
	$formula = 'SUM(a.price_total)';
	$formula = 'SUM(a.price_total) + ((SUM(a.price_total) * i.tax) / 100) + ((SUM(a.price_total) * i.rivalsa) / 100)';
	$fields[] = "(SELECT ".$formula." FROM ".DB_TABLE_PREFIX."invoices_sales_articles AS a WHERE i.id = a.id_invoice) AS onorario";	
	$App->homeTables['invoices_sales'] = array(
		'table'=>DB_TABLE_PREFIX.'invoices_sales AS i',
		'sqloption'=> array(
			'fields'=>implode(',',$fields),
			'order'=>"created DESC"
			),
		'icon panel'=>'fa-wpforms',
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['fatture vendite'],
		'fields'=>array(
			'number'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['numero']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'invoices/listItes',
					'opz'=>array(
						)
					)
				),
			'total'=>array(
				'type'=>'amount',
				'label'=>ucfirst($_lang['importo']),
				'class'=>'text-right',
				'url'=>false,
				'url item'=>array()
				),
			'onorario'=>array(
				'type'=>'amount',
				'label'=>ucfirst($_lang['totale']),
				'class'=>'text-right',
				'url'=>false,
				'url item'=>array()
				)
			)
		);	
	}
	
/* Invoices purchases */
if (in_array(DB_TABLE_PREFIX.'invoices_purchases',$tablesDb) && file_exists(PATH.$App->pathApplications."invoices/index.php") == true) {
	$App->homeBlocks['invoices_purchases'] = array(
		'table'=>DB_TABLE_PREFIX.'invoices_purchases',
		'icon panel'=>'fa-wpforms',
		'label'=>ucfirst($_lang['fatture acquisti']),
		'sex suffix'=>ucfirst($_lang['nuove']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'invoices/listItep',
			'opz'=>array()
			)
		);	
	
	$fields = array();
	$fields[] = "i.*";
	$fields[] = "(SELECT SUM(a.price_total) + SUM(a.price_tax) FROM ".DB_TABLE_PREFIX."invoices_purchases_articles AS a WHERE i.id = a.id_invoice) AS total ";	
	$App->homeTables['invoices_purchases'] = array(
		'table'=>DB_TABLE_PREFIX.'invoices_purchases AS i',
		'sqloption'=> array(
			'fields'=>implode(',',$fields),
			'order'=>"created DESC"
			),
		'icon panel'=>'fa-wpforms',
		'label'=>ucfirst($_lang['ultime']).' '.$_lang['fatture acquisti'],
		'fields'=>array(
			'number'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['numero']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'invoices/listItep',
					'opz'=>array(
						)
					)
				),
			'total'=>array(
				'type'=>'amount',
				'label'=>ucfirst($_lang['totale']),
				'class'=>'text-right',
				'url'=>false,
				'url item'=>array()
				)
			)
		);	
	}
	
/* Estimates  */
if (in_array(DB_TABLE_PREFIX.'estimates',$tablesDb) && file_exists(PATH.$App->pathApplications."estimates/index.php") == true) {
	$App->homeBlocks['estimates'] = array(
		'table'=>DB_TABLE_PREFIX.'estimates',
		'icon panel'=>'fa-bullseye',
		'label'=>ucfirst($_lang['preventivi']),
		'sex suffix'=>ucfirst($_lang['nuovi']),
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>URL_SITE.'invoices/listItem',
			'opz'=>array()
			)
		);
	
	$fields = array();
	$fields[] = "i.*";
	$fields[] = "(SELECT SUM(a.price_total) + SUM(a.price_tax) FROM ".DB_TABLE_PREFIX."estimates_articles AS a WHERE i.id = a.id_estimate) AS total ";	
	$App->homeTables['estimates'] = array(
		'table'=>DB_TABLE_PREFIX.'estimates AS i',
		'sqloption'=> array(
			'fields'=>implode(',',$fields),
			'order'=>"created DESC"
			),
		'icon panel'=>'fa-bullseye',
		'label'=>ucfirst($_lang['ultimi']).' '.$_lang['preventivi'],
		'fields'=>array(
			'note'=>array(
				'type'=>'varchar',
				'label'=>ucfirst($_lang['nota']),
				'url'=>true,
				'url item'=>array(
					'string'=>URL_SITE.'estimates/listItem',
					'opz'=>array(
						)
					)
				),
			'total'=>array(
				'type'=>'amount',
				'label'=>ucfirst($_lang['totale']),
				'class'=>'text-right',
				'url'=>false,
				'url item'=>array()
				)
			)
		);	
	}
?>
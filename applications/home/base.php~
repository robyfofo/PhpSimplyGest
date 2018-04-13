<?php
/* Thirdparty */
if (in_array(DB_TABLE_PREFIX.'thirdparty',$tablesDb) && file_exists(PATH.$App->pathApplication."third-party/index.php") == true) {
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
	
/* Invoices sales */
if (in_array(DB_TABLE_PREFIX.'invoices_sales',$tablesDb) && file_exists(PATH.$App->pathApplication."invoices/index.php") == true) {
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
if (in_array(DB_TABLE_PREFIX.'invoices_purchases',$tablesDb) && file_exists(PATH.$App->pathApplication."invoices/index.php") == true) {
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
		
	$App->homeTables['invoices_purchases'] = array(
		'table'=>DB_TABLE_PREFIX.'invoices_purchases AS i',
		'sqloption'=> array(
			'fields'=>"i.id,i.number,i.created AS created,(SELECT SUM(a.price_total) FROM ".DB_TABLE_PREFIX."invoices_purchases_articles AS a WHERE i.id = a.id_invoice) AS total",
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
?>
<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang="{{ Lang['user'] }}">
	<head>
	
		<title>{{ App.metaTitlePage|e('html_attr') }}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="{{ App.metaDescriptionPage|e('html_attr') }}">
		<meta name="keyword" content="{{ App.metaKeywordsPage|e('html_attr') }}">
		<meta name="author" content="Roberto Mantovani">

		<!-- Core CSS - Include with every page -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
    	<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/css/sb-admin-2.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- OTHER Plugin CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/css/lightbox.min.css" rel="stylesheet">
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/css/bootstrapValidator.min.css" rel="stylesheet">
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/css/formValidation.min.css" rel="stylesheet">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Custom CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/css/default.css" rel="stylesheet">

    
		<!-- CSS for Page -->
		{% if App.css is iterable %}							
			{% for key,value in App.css %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}

		<!-- default vars useful for javascript -->
		<script language="javascript">
			siteUrl = '{{ URLSITE }}';
			sitePath = '{{ PATHSITE }}';			
			siteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
			siteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';			
			siteDocumentPath = '{{ PATHDOCUMENT }}';		
			var cur_lang = "{{ Lang['user'] }}";
			var messages = new Array();
			messages['Sei sicuro?'] = '{{ Lang['Sei sicuro?']|e('js') }}';	
			{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
				{{ App.defaultJavascript|raw }}  	
			{% endif %}
		</script>

	</head>
	
	<body>

		<div class="container">
		
			<div class="row">
				<a class="navbar-brand" href="#">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
			</div>

			{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
				{{ App.systemMessages|raw }}
			{% endif %}
			
			{{ include(App.templateApp) }}

		</div>
    
		<!-- Core Scripts - Include with every page -->
		<!-- jQuery -->
		{% if App.patchdatapicker is defined and App.patchdatapicker > 0 %}
			<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery/jquery-1.10.2.js"></script>
		{% else %}
 			<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/jquery/dist/jquery.min.js"></script>
 		{% endif %}
 		
  		<!-- Bootstrap Core JavaScript -->
 		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 		<!-- Metis Menu Plugin JavaScript -->
 		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootbox/js/bootbox.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/js/lightbox.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/js/formValidation.min.js" type="text/javascript"></script>	
		{% if App.lang['user'] == 'it' %}
			<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootstrapValidator/language/it_IT.js"></script>
			<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/jquery.formvalidation/language/it_IT.js"></script>		
		{% endif %}
		<!-- SB Admin Scripts - Include with every page -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/js/sb-admin-2.js"></script>
		
		
		{% if App.jscript is iterable %}							
			{% for key,value in App.jscript %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}
		
		{% if App.jscriptLast is iterable %}							
			{% for key,value in App.jscriptLast %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}


		<!-- Default Custom Theme JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/js/default.js"></script>
	</body>
</html>
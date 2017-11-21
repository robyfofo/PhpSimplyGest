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

		<!-- Bootstrap Core CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Timeline CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/timeline.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Other Plugin CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/prettyPhoto/css/prettyPhoto.css" rel="stylesheet">
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Custom CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/default.css" rel="stylesheet">

    
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
			siteUrlAdmin = '{{ URLSITE }}';		
			siteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
			siteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';			
			siteDocumentPath = '{{ PATHDOCUMENT }}';			
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
    
		<!-- jQuery -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Metis Menu Plugin JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.js"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/language/it_IT.js"></script>
		
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


		<!-- Custom Theme JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/js/sb-admin-2.js"></script>
	</body>
</html>

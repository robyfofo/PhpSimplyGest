<!DOCTYPE html>
<html lang="{{ Lang['user'] }}">
	<head>
	
		<title>{{ App.metaTitlePage|e('html_attr') }}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="{{ App.metaDescriptionPage|e('html_attr') }}">
		<meta name="keyword" content="{{ App.metaKeywordsPage|e('html_attr') }}">
		<meta name="author" content="roberto" >

		<!-- Core CSS - Include with every page -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
    	<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<!-- DataTables CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    	
		<!-- Custom CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/css/sb-admin-2.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- OTHER Plugin CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/css/lightbox.min.css" rel="stylesheet">
		
		
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
			var siteUrl = '{{ URLSITE }}';
			var sitePath = '{{ PATHSITE }}';			
			var siteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
			var siteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';			
			var siteDocumentPath = '{{ PATHDOCUMENT }}';	
			var CoreRequestAction = '{{ CoreRequest.action }}';			
			var user_lang = "{{ Lang['user'] }}";
			var messages = new Array();
			messages['Sei sicuro?'] = '{{ Lang['Sei sicuro?']|e('js') }}';	
			{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
				{{ App.defaultJavascript|raw }}  	
			{% endif %}
		</script>

		{% if App.includeJscriptPHPTop is defined and App.includeJscriptPHPTop != '' %}			
			{{ include(App.includeJscriptPHPTop|raw) }}
		{% endif %}
		
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88049854-1"></script>
	<script>
 			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'UA-88049854-1');
	</script>

	</head>

	<body>

		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i> {% if App.userLoggedData.name is defined %}{{ App.userLoggedData.name }}{% endif %} {% if App.userLoggedData.surname is defined %}{{ App.userLoggedData.surname }}{% endif %} <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
								<li><a href="{{ URLSITE }}profile/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}"><i class="fa fa-user fa-fw"></i> {{ Lang['profilo']|capitalize }}</a></li>
								<li><a href="{{ URLSITE }}password/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}"><i class="fa fa-gear fa-fw"></i> {{ Lang['password']|capitalize }}</a></li>
								<li class="divider"></li>
								<li><a href="{{ URLSITE }}logout"><i class="fa fa-sign-out fa-fw"></i> {{ Lang['logout']|capitalize }}</a></li>
 						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<!-- code menu -->
							{% if App.rightCodeMenu is defined and App.rightCodeMenu != '' %}
								{{ App.rightCodeMenu|raw }}
							{% endif %}  
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">
				<div class="row">
                <div class="col-md-8">
						<h1 class="page-header">
							{{ App.pageTitle }}{% if App.userLoggedData.is_root is same as(1) %}<small class="appCodeVersion">{{ App.codeVersion }}</small>{% endif %}&nbsp;<small>{{ App.pageSubTitle }}</small>               
						</h1>
                </div>
                <div class="col-md-4 text-right">                                
                	{% if (App.params.help is defined) and (App.params.help != '') %}
							<button class="btn btn-info btn-circle btn-help-module" type="button" data-target="#helpModal" data-toggle="modal"><i class="fa fa-info"></i></button>
						{% endif %}
                </div>
            </div>
            <!-- /.row -->

				{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
					{{ App.systemMessages|raw }}
				{% endif %}

				
				{{ include(App.templateApp) }}
           
			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->
		
		{% if (App.params.help is defined) and (App.params.help != '') %}
		<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  					<h4 class="modal-title" id="myModalLabel">{{ Lang['aiuto']|capitalize }}</h4>
	 				</div>
	 				<div class="modal-body">
						{{ App.params.help|raw }}
	 				</div>
	 				<div class="modal-footer">
	  					<button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang['chiudi']|capitalize }}</button>
	 				</div>
				</div>
				<!-- /.modal-content -->
			</div>
	  		<!-- /.modal-dialog -->
		</div>
		{% endif %}

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
 		<!-- DataTables JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/bootbox/js/bootbox.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/plugins/lightbox/js/lightbox.min.js" type="text/javascript"></script>
		

		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/tinymce/tinymce.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/bower_components/tinymce/config/tinymce.config.js" type="text/javascript"></script>

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
		
		{% if App.includeJscriptPHPBottom is defined and App.includeJscriptPHPBottom != '' %}			
			{{ include(App.includeJscriptPHPBottom|raw) }}
		{% endif %}

	</body>
</html>
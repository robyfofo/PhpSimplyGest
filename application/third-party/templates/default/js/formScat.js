/* admin/site-pages/formScat.js.php v.4.0.0. 04/08/2017 */
$(document).ready(function() {

	pprefresh();
	
	/* prende i dati del template corrente */
	getTemplateDetalis();	
	
	$('#applicationForm')
	.bootstrapValidator({
		excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
			}
		})
	.on('status.field.bv', function(e, data) {
		var $form     = $(e.target),
		validator = data.bv,
		$tabPane  = data.element.parents('.tab-pane'),
		tabId     = $tabPane.attr('id');
		if (tabId) {
			var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');
			// Add custom class to tab containing the field
			if (data.status == validator.STATUS_INVALID) {
				$icon.removeClass('fa-check').addClass('fa-times');
				} else if (data.status == validator.STATUS_VALID) {
					var isValidTab = validator.isValidContainer($tabPane);
					$icon.removeClass('fa-check fa-times')
					.addClass(isValidTab ? 'fa-check' : 'fa-times');
					}
			}
		});
			
	});
	
function getTemplateDetalis() {
	var id_template = $('#id_templateID').val();	
	var id_pagina = $('#id_paginaID').val();	
	console.log('id pagina = '+id_pagina);
	console.log('id template = '+id_template);
	$.ajax({
		url: siteUrlAdmin+moduleName+'/getTemplateDataAjax',
		type: "POST",
		data: {'id':id_template,'id_pagina':id_pagina},
		dataType: 'json'
		})
		.done(function(data) {			
			/* genera la tab template */  		
    		getTemplateFormTab(data.id,data.title,data.content,data.filename,data.id_pagina);
  			})
  		.fail(function() {
 			alert("Ajax failed to fetch data")
		})
	}
	
function getTemplateFormTab(id,title,content,filename,idpagina) {	
	$.ajax({
		url: siteUrlAdmin+moduleName+'/getTemplateFormTabAjax',
		type: "POST",
		data: {'id':id,'title':title,'content':content,'filename':filename,'id_pagina':idpagina,},
		dataType: 'html'
		})
		.done(function(html) {
			$('#template-tab').html(html);
			pprefresh();
			reloadTemplateFormTab();
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch data")
			})
	}
	
function reloadTemplateFormTab() {
	$('#id_templateID').change(function(){
		var id = $('#id_templateID').val();
		getTemplateDetalis();
		});		
	
	}	
	


$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});

tinymce.init({
	selector: ".editorHTML",
	theme: "modern",
	height: 300,
	language: cur_lang,
	relative_urls: false,
	remove_script_host: false,
	convert_urls: true,
	document_base_url: siteUrl,
	filemanager_title:"Responsive Filemanager",
	external_filemanager_path: siteUrl+"/filemanager/",
	external_plugins: { "filemanager" : siteUrl+"/filemanager/plugin.min.js"},
	image_advtab: true,
	plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   ],
	toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",   
	style_formats: [],
	content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
	});
	
function pprefresh(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		show_title: false    
		});
	}
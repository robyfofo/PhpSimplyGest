<!-- levels/formItem.tpl.php v.1.0.0. 13/07/2018 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}

	<div class="col-md-2 help">
	</div>
</div>
<div class="row">
	<div class="col-md-12">		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|title }}</a></li>
			<li class=""><a href="#modules-tab" data-toggle="tab">{{ Lang['moduli disponibili']|capitalize }}</a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }}</a></li>
		</ul>	
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="datibase-tab">			
					<fieldset>
						<div class="form-group">
							<label for="title_itID" class="col-md-2 control-label">{{ Lang['titolo']|capitalize }}</label>
							<div class="col-md-3">
								<input required="required" type="text" class="form-control" name="title" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['titolo']})|capitalize }}" id="titleID" value="{{ App.item.title|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['titolo']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
					</fieldset>
				</div>
	<!-- sezione moduli --> 
				<div class="tab-pane" id="modules-tab">			 
					<fieldset>
						{% for key1,value1 in App.modules %}
							{% for key,value in value1 %}									
								<div class="form-group">
									<label class="col-md-2 control-label">{{ value.label }}</label>
									<div class="col-md-1">
										<input type="checkbox" name="modules[{{ module.name }}]"{% if value.name in App.item.modules %} checked="checked"{% endif %} value="{{ value.name|e('html') }}">
						    		</div>
									<div class="col-md-5">
										{{ value.content }}
						    		</div>
								</div>							
							{% endfor %}
						{% endfor %}
					</fieldset>
				</div>
	<!-- sezione moduli -->	  
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">				
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">{{ Lang['attiva']|capitalize }}</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID"{% if App.item.active == 1 %} checked="checked"{% endif %} value="1">
				    		</div>
				  		</div>
					</fieldset>
				</div>
	<!-- sezione opzioni -->			 
			</div>
			<!--/Tab panes -->			
			<hr>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7 actionsform">
					<input type="hidden" name="created" id="createdID" value="{{ App.item.created }}">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary submittheform">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary submittheform">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-3 actionsform">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItem" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
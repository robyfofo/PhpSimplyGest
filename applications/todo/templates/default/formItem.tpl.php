<!-- admin/todo/formItem.tpl.php v.1.0.0. 22/02/2017 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2 help">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">		
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|title }} <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" action="{{ URLSITE}}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
		
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="titleID" class="col-md-2 control-label">{{ Lang['titolo']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="title" placeholder="{{ Lang['inserisci un titolo']|capitalize }}" id="titleID" value="{{ App.item.title }}">
							</div>
						</div>
						<div class="form-group">
							<label for="contentID" class="col-md-2 control-label">{{ Lang['contenuto']|capitalize }}</label>
							<div class="col-md-8">
								<textarea name="content" class="form-control editorHTML" id="contentID" rows="5">{{ App.item.content }}</textarea>
							</div>
						</div>
					</fieldset>					
				</div>
<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset class="form-group">
						<div class="form-group">						
							<label for="id_projectID" class="col-md-2 control-label">{{ Lang['progetto']|capitalize }}</label>
							<div class="col-md-7">
								<select name="id_project" class="selectpicker" data-live-search="true" title="{{ Lang['seleziona un progetto']|capitalize }}">
									{% if App.progetti is iterable %}
										{% for value in App.progetti %}
											<option value="{{ value.id }}"{% if (App.item.id_project is defined) and (App.item.id_project == value.id)  %} selected="selected" {% endif %}>{{ value.title }}</option>														
										{% endfor %}
									{% endif %}		
								</select>										
					    	</div>
						</div>		
						<div class="form-group">
							<label for="statusID" class="col-md-2 control-label">{{ Lang['status']|capitalize }}</label>
							<div class="col-md-7">
								<select name="status" class="selectpicker" data-live-search="true" title="{{ Lang['seleziona uno status']|capitalize }}">
									{% if App.params.status is iterable %}
										{% for key,value in App.params.status %}	
											<option value="{{ key }}"{% if key == App.item.status %} selected="selected"{% endif %}>{{ (Lang[value] is defined and Lang[value] != '') ? Lang[value]|capitalize : value|capitalize }}</option>														
										{% endfor %}
									{% endif %}		
								</select>		
					    	</div>
						</div>				
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">{{ Lang['attiva']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="active" id="activeID"{% if App.item.active == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
      					</div>
    					</div>
					</fieldset>
				</div>
<!-- sezione opzioni -->
			</div>
<!--/Tab panes -->			
			<hr>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="created" id="createdID" value="{{ App.item.created }}">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-2">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItem" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
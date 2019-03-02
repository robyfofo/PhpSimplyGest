<!-- projects/formItem.tpl.php v.1.0.0. 08/08/2018 -->
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
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|title }}</a></li>
			<li><a href="#todo-tab" data-toggle="tab">{{ Lang['da fare']|capitalize }}</a></li>
			<li><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }}</a></li>
			<li><a href="#permissions-tab" data-toggle="tab">{{ Lang['accesso']|capitalize }}</a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="titleID" class="col-md-2 control-label">{{ Lang['titolo']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" class="form-control" name="title" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['titolo']})|capitalize }}" id="titleID" value="{{ App.item.title|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['titolo']}) }}')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label for="contentID" class="col-md-2 control-label">{{ Lang['contenuto']|capitalize }}</label>
							<div class="col-md-8">
								<textarea name="content" class="form-control editorHTML" id="contentID" rows="5">{{ App.item.content }}</textarea>
							</div>
						</div>			
						<div class="form-group">
							<label for="costo_orarioID" class="col-md-2 control-label">{{ Lang['costo orario']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="costo_orario" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['costo orario']})|capitalize }}" id="costo_orarioID" value="{{ App.item.costo_orario|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="statusID" class="col-md-2 control-label">{{ Lang['status']|capitalize }}</label>
							<div class="col-md-7">
								<select name="status" class="selectpicker" data-live-search="true" title="{{ Lang['seleziona uno %ITEM%']|replace({'%ITEM%': Lang['status']})|capitalize }}">
									{% if App.params.status is iterable %}
										{% for key,value in App.params.status %}	
											<option value="{{ key }}"{% if key == App.item.status %} selected="selected"{% endif %}>{{ (Lang[value] is defined and Lang[value] != '') ? Lang[value]|capitalize|e('html') : value|capitalize|e('html') }}</option>														
										{% endfor %}
									{% endif %}		
								</select>		
					    	</div>
						</div>
						<div class="form-group">
							<label for="completatoID" class="col-md-2 control-label">{{ Lang['completato']|capitalize }} (0-100%)</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="completato" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['percentuale di completamento']})|capitalize }}" id="completatoID" value="{{ App.item.completato|e('html') }}">
							</div>
						</div>
					</fieldset>				
				</div>

<!-- sezione todo --> 
				<div class="tab-pane" id="todo-tab">

					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>{{ Lang['titolo']|capitalize }}</th>
									<th>{{ Lang['status']|capitalize }}</th>
									<th>{{ Lang['contenuto']|capitalize }}</th>							
								</tr>
							</thead>
							<tbody>				
								{% if App.item_todo is iterable and App.item_todo|length > 0 %}
									{% for key,value in App.item_todo %}
										<tr>										
											<td>{{ value.title }}</td>
											<td>{{ value.statusLabel|capitalize }}</td>
											<td>{{ value.content|raw }}</td>
											</tr>	
									{% endfor %}
								{% endif %}
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
						
				</div>
<!-- fine sezione todo --> 

<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="contactID" class="col-md-2 control-label">{{ Lang['contatto']|capitalize }}</label>
							<div class="col-md-7">
								<select name="id_contact" class="selectpicker form-control" data-live-search="true" title="{{ Lang['seleziona un %ITEM%']|replace({'%ITEM%': Lang['contatto']})|capitalize }}">
									<option value="0">
									{% if App.customers is iterable %}
										{% for key,value in App.customers %}	
											<option value="{{ key }}"{% if key == App.item.id_contact %} selected="selected"{% endif %}>{{ value.ragione_sociale|e('html') }}</option>														
										{% endfor %}
									{% endif %}		
								</select>										
					    	</div>
						</div>			  		
				  		<div class="form-group">
							<label for="timecardID" class="col-md-2 control-label">{{ Lang['timecard']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="timecard" id="timecardID"{% if App.item.timecard == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
      					</div>
    					</div>
				  		<div class="form-group">
							<label for="currentID" class="col-md-2 control-label">{{ Lang['selezionato']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="current" id="currentID"{% if App.item.current == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
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
<!-- tab permissions -->
				<div class="tab-pane" id="permissions-tab">	
					<fieldset>	
						<!-- /* set type */ -->
						<div class="form-group form-inline">	
							<label for="access_type_public" class="col-md-3">{{ Lang['pubblico']|capitalize }}</label>
							<input{% if App.item.access_type == 0 %} checked="checked"{% endif %} value="0" id="access_type_public" name="access_type" type="radio"> 
						</div>
						<div class="form-group form-inline">	
							<label for="access_type_private" class="col-md-3">{{ Lang['privato']|capitalize }}</label>
							<input{% if App.item.access_type == 1 %} checked="checked"{% endif %} value="1" id="access_type_private" name="access_type" type="radio"> 
						</div>
						<div class="form-group form-inline">	
							<label for="access_type_users" class="col-md-3">{{ Lang['utenti']|capitalize }}</label>
							<input{% if App.item.access_type == 2 %} checked="checked"{% endif %} value="2" id="access_type_users" name="access_type" type="radio"> 
						</div>
					</fieldset>	
				</div>
<!-- fine tab permissions -->

			</div>
<!--/Tab panes -->	
			<hr>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7 actionsform">
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
<!-- modules/form.tpl.php v.1.0.0. 03/08/2018 -->
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
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }}</a></li>
			<li><a href="#smallhelp-tab" data-toggle="tab">{{ Lang['aiuto breve modulo']|capitalize }}</a></li>
			<li><a href="#help-tab" data-toggle="tab">{{ Lang['aiuto modulo']|capitalize }}</a></li>
		</ul>		
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-3">
								<input required="required" type="text" name="name" class="form-control" id="nameID" placeholder="{{ Lang['inserisci il %ITEM%']|replace({'%ITEM%': Lang['nome modulo']})|capitalize }}" value="{{ App.item.name|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['nome modulo']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
						
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['etichetta']|capitalize }}</label>
							<div class="col-md-3">
								<input required="required" type="text" name="label" class="form-control" id="labelID" placeholder="{{ Lang['inserisci la etichetta del modulo']|capitalize }}" value="{{ App.item.label|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire il campo %FIELD%!']|replace({'%FIELD%': Lang['etichetta']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
						
						<div class="form-group">
							<label for="aliasID" class="col-md-2 control-label">{{ Lang['alias']|capitalize }}<br><small>{{ Lang['nome della pagina php che gestisce il modulo nel sito']|capitalize }}</small></label>
							<div class="col-md-3">
								<input type="text" name="alias" class="form-control" id="aliasID" placeholder="{{ Lang['inserisci il alias del modulo']|capitalize }}" value="{{ App.item.alias|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">{{ Lang['sezione']|capitalize }}</label>	
							<div class="col-md-7">	
								<select class="form-control input-md" name="section">					
								{% if App.sections is iterable and App.sections|length > 0 %}
									{% for key,value in App.sections %}					
										<option value="{{ key }}"{% if App.item.section is defined and App.item.section == key %} selected="selected"{% endif %}>{{ value|e('html') }}</option>														
									{% endfor %}
								{% endif %}
								</select>	
							</div>												
						</div>									


						<div class="form-group">
							<label for="content" class="col-md-2 control-label">{{ Lang['contenuto']|capitalize }}</label>
							<div class="col-md-7">
								<textarea name="content" class="form-control" id="contentID" rows="4">{{ App.item.content }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="code_menuID" class="col-md-2 control-label">{{ Lang['codice menu']|capitalize }}</label>
							<div class="col-md-6">
								<textarea name="code_menu" class="form-control" id="code_menuID" rows="4">{{ App.item.code_menu|raw }}</textarea>
							</div>
						</div>

										
					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}			
						<div class="form-group">
							<label for="orderingID" class="col-md-2 control-label">{{ Lang['ordine']|capitalize }}</label>
							<div class="col-md-1">
								<input type="text" name="ordering" placeholder="Inserisci un ordine" class="form-control" id="orderingID" value="{{ App.item.ordering }}">
					    	</div>
						</div>					
					{% else %}
						<input type="hidden" name="ordering" value="{{ App.item.ordering }}">		
					{% endif %}
					<!-- fine se root -->		
				
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
	<!-- sezione datibase -->	  
				<div class="tab-pane" id="smallhelp-tab">
					<div class="form-group">
						<div class="col-md-12">
							<p>{{ Lang['Questo è il contenuto BREVE del aiuto del modulo'] }}</p>
						</div>
						<div class="col-md-12">
							<textarea name="help_small" class="form-control" id="help_smallID" rows="4">{{ App.item.help_small }}</textarea>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="help-tab">
					<div class="form-group">
						<div class="col-md-12">
						<p>{{ Lang['Questo è il contenuto COMPLETO del aiuto del modulo'] }}</p>
						</div>
						<div class="col-md-12">
							<textarea name="help" class="form-control editorHTML" id="helpID" rows="4" cols="40">{{ App.item.help }}</textarea>
						</div>
					</div>
				</div>
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
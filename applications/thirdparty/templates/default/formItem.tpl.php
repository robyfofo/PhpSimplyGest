<!-- thirdparty/formItem.tpl.php v.1.0.0. 26/07/2018 -->
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
	<div class="col-lg-12">
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">		
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#anagrafica-tab" data-toggle="tab">{{ Lang['anagrafica']|capitalize }} <i class="fa"></i></a></li>
				<li class=""><a href="#contacts-tab" data-toggle="tab">{{ Lang['contatti']|capitalize }} <i class="fa"></i></a></li>
				<li class=""><a href="#fiscale-tab" data-toggle="tab">{{ Lang['fiscale']|capitalize }} <i class="fa"></i></a></li>
				<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="anagrafica-tab">			
					<fieldset>
						<div class="form-group">
							<label for="ragione_socialeID" class="col-md-2 control-label">{{ Lang['ragione sociale']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" name="ragione_sociale" class="form-control" id="ragione_socialeID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['ragione sociale']})|capitalize }}" value="{{ App.item.ragione_sociale|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['ragione sociale']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" id="nameID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['nome']})|capitalize }}" value="{{ App.item.name|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ Lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['cognome']})|capitalize }}" value="{{ App.item.surname|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ Lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['via']})|capitalize }}" value="{{ App.item.street|e('html') }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ Lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['città']})|capitalize }}" value="{{ App.item.city|e('html') }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ Lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['cap']})|capitalize }}" value="{{ App.item.zip_code|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['provincia']})|capitalize }}" value="{{ App.item.province|e('html') }}">
					    	</div>
						</div>
						<div class="form-group form-inline">
							<label for="provinceID" class="col-md-2 text-right">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['stato']})|capitalize }}" value="{{ App.item.state|e('html') }}">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane" id="contacts-tab">			
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ Lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input type="email" name="email" class="form-control" id="emailID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['indirizzo email']})|capitalize }}"  value="{{ App.item.email|e('html') }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
						<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ Lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['numero di telefono']})|capitalize }}"  value="{{ App.item.telephone|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ Lang['cellulare']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['numero di cellulare']})|capitalize }}"  value="{{ App.item.mobile|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ Lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['numero di fax']})|capitalize }}"  value="{{ App.item.fax|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione fiscale --> 
				<div class="tab-pane" id="fiscale-tab">			
					<fieldset>
						<div class="form-group">
							<label for="partita_ivaID" class="col-md-2 control-label">{{ Lang['partita IVA']|capitalize }}</label>
							<div class="col-md-3">
								<input type="partita_iva" name="partita_iva" class="form-control" id="partita_ivaID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['partita IVA']})|capitalize }}"  value="{{ App.item.partita_iva|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="codice_fiscaleID" class="col-md-2 control-label">{{ Lang['codice fiscale']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="codice_fiscale" class="form-control" id="codice_fiscaleID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['codice fiscale']})|capitalize }}"  value="{{ App.item.codice_fiscale|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="pecID" class="col-md-2 control-label">PEC</label>
							<div class="col-md-3">
								<input type="text" name="pec" class="form-control" id="pecID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': 'PEC'})|capitalize }}"  value="{{ App.item.pec|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="sidID" class="col-md-2 control-label">SID</label>
							<div class="col-md-3">
								<input type="text" name="sid" class="form-control" id="sidID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': 'SID'})|capitalize }}"  value="{{ App.item.sid|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione fiscale -->
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="id_catID" class="col-md-2 control-label">{{ Lang['categoria']|capitalize }}</label>
							<div class="col-md-7">							
								<select name="id_cat" id="id_catID" class="form-control">
									{% if App.subcategories is iterable and App.subcategories|length > 0 %}
										{% for key,value in App.subcategories %}
											<option value="{{ value.id }}"{% if App.item.id_cat == value.id %} selected="selected"{% endif %}>{{ value.levelString }}{{ value.title|e('html') }}</option>														
										{% endfor %}
									{% endif %}
								</select>									
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="typeID" class="col-md-2 control-label">{{ Lang['tipo']|capitalize }}</label>
							<div class="col-md-7">							
								<select class="form-control input-md" name="id_type" id="id_typeID">						
									{% if App.types is iterable and App.types|length > 0 %}									
										{% for key,value in App.types %}
											<option value="{{ key }}"{% if App.item.id_type == key %} selected="selected"{% endif %}>{{ value.title|capitalize }}</option>
										{% endfor %}
									{% endif %}		
								</select>									
					    	</div>
						</div>
						<hr>					
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

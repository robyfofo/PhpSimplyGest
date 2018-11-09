<!-- users/formItem.tpl.php v.1.0.0. 16/07/2018 -->
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
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="{% if App.formTabActive == 1 %}active{% endif %}"><a href="#login-tab" data-toggle="tab">{{ Lang['accesso']|capitalize }}</a></li>
			<li class="{% if App.formTabActive == 2 %}active{% endif %}"><a href="#anagrafica-tab" data-toggle="tab">{{ Lang['anagrafica']|capitalize }}</a></li>
			<li class="{% if App.formTabActive == 3 %}active{% endif %}"><a href="#contacts-tab" data-toggle="tab">{{ Lang['contatti']|capitalize }}</a></li>
			<li class="{% if App.formTabActive == 4 %}active{% endif %}"><a href="#images-tab" data-toggle="tab">{{ Lang['immagini']|capitalize }}</a></li>
			<li class="{% if App.formTabActive == 5 %}active{% endif %}"><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }}</a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane{% if App.formTabActive == 1 %} active{% endif %}" id="login-tab">
					<fieldset>
						<div class="form-group">
							<label for="usernameID" class="col-md-2 control-label">{{ Lang['nome utente']|capitalize }}</label>
							<div class="col-md-3">
								<input required="required" type="text" name="username" class="form-control" id="usernameID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['nome utente']})|capitalize }}" value="{{ App.item.username|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['nome utente']}) }}')" oninput="setCustomValidity('')">
					    	</div>
					    	<div class="col-md-6" id="usernameMessageID"></div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="levelID" class="col-md-2 control-label">{{ Lang['livello']|capitalize }}</label>
							<div class="col-md-7">
								{% if App.user_levels is defined  %}
								<select name="id_level" class="form-control">	
									{% for value in App.user_levels  %}
										<option value="{{ value.id }}"{% if App.item.id_level is defined and App.item.id_level == value.id  %} selected="selected"{% endif %}>{{ value.title|e('html') }}</option>								
									{% endfor %}
								</select>
								{% endif %}				
					    	</div>
						</div>
					</fieldset>			 	
					<fieldset>
						<div class="form-group">
							<label for="passwordID" class="col-md-2 control-label">{{ Lang['password']|capitalize }}</label>
							<div class="col-md-2">
								<input{% if App.id == 0 %} required="required"{% endif %} type="password" name="password" class="form-control" id="passwordID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['password']})|capitalize }}" value="" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['password']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
						<div class="form-group">
							<label for="passwordCFID" class="col-md-2 control-label">{{ Lang['password di controllo']|capitalize }}</label>
							<div class="col-md-2">
								<input{% if App.id == 0 %} required="required"{% endif %} type="password" name="passwordCF" class="form-control" id="passwordCFID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['password di controllo']})|capitalize }}" value="" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['password di controllo']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ Lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input required="required" type="email" name="email" class="form-control" id="emailID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['indirizzo email']})|capitalize }}"  value="{{ App.item.email|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['indirizzo email valido']}) }}')" oninput="setCustomValidity('')">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
					</fieldset>
				</div>		
				<div class="tab-pane{% if App.formTabActive == 2 %} active{% endif %}" id="anagrafica-tab">			
					<fieldset>
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
					</fieldset>					
					<fieldset>
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
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['c.a.p.']})|capitalize }}" value="{{ App.item.zip_code|e('html') }}">
					    	</div>
￼

						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['provincia']})|capitalize }}" value="{{ App.item.province|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['stato']})|capitalize }}" value="{{ App.item.state|e('html') }}">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane{% if App.formTabActive == 3 %} active{% endif %}" id="contacts-tab">			
					<fieldset>						
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
						<div class="form-group">
							<label for="skypeID" class="col-md-2 control-label">{{ Lang['skype']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['nome utente skype']})|capitalize }}"  value="{{ App.item.skype|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione immagini -->		  
				<div class="tab-pane{% if App.formTabActive == 4 %} active{% endif %}" id="images-tab">
					<fieldset>
						<div class="form-group">
							<label for="avatarID" class="col-md-2 control-label">{{ Lang['avatar']|capitalize }}</label>
							<div class="col-md-3">				
￼

								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								{% if App.item.avatar is defined and App.item.avatar != '' %}
									<img src="{{ URLSITE }}{{ CoreRequest.action }}/renderAvatarDBItem/{{ App.item.id }}" alt="{{ App.item.username|e('html') }}" style="max-height:70px;">
				            {% endif %}				
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione immagini -->	
	<!-- sezione opzioni --> 
				<div class="tab-pane{% if App.formTabActive == 5 %} active{% endif %}" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="templateID" class="col-md-2 control-label">{{ Lang['template']|capitalize }}</label>
							<div class="col-md-7">
								{% if App.templatesAvaiable is iterable  %}
								<select name="template" class="form-control">
									{% for key,value in App.templatesAvaiable  %}
										<option value="{{ value }}"{% if App.item.template is defined and App.item.template == value %} selected="selected"{% endif %}>{{ value|e('html') }}</option>								
									{% endfor %}
								</select>
								{% endif %}				
					    	</div>
						</div>	
					</fieldset>				
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
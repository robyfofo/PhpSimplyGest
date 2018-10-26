<!-- site-users/formItem.tpl.php v.1.0.0. 17/10/2017 -->
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
			<li class="{% if App.formTabActive == 1 %}active{% endif %}"><a href="#login-tab" data-toggle="tab">{{ App.lang['accesso']|capitalize }} <i class="fa"></i></a></li>
			<li class="{% if App.formTabActive == 2 %}active{% endif %}"><a href="#anagrafica-tab" data-toggle="tab">{{ App.lang['anagrafica']|capitalize }} <i class="fa"></i></a></li>
			<li class="{% if App.formTabActive == 3 %}active{% endif %}"><a href="#contacts-tab" data-toggle="tab">{{ App.lang['contatti']|capitalize }} <i class="fa"></i></a></li>
			<li class="{% if App.formTabActive == 4 %}active{% endif %}"><a href="#images-tab" data-toggle="tab">{{ App.lang['immagini']|capitalize }} <i class="fa"></i></a></li>
			<li class="{% if App.formTabActive == 5 %}active{% endif %}"><a href="#options-tab" data-toggle="tab">{{ App.lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane{% if App.formTabActive == 1 %} active{% endif %}" id="login-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="usernameID" class="col-md-2 control-label">{{ App.lang['nome utente']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="text" name="username" class="form-control" id="usernameID" placeholder="{{ App.lang['inserisci un nome utente']|capitalize }}" value="{{ App.item.username }}">
					    	</div>
					    	<div class="col-md-6" id="usernameMessageID"></div>
						</div>
						<hr>
						<div class="form-group">
							<label for="levelID" class="col-md-2 control-label">{{ App.lang['livello']|capitalize }}</label>
							<div class="col-md-7">
								{% if App.user_levels is defined  %}
								<select name="id_level" class="form-control">	
									{% for value in App.user_levels  %}
										<option value="{{ value.id }}"{% if App.item.id_level is defined and App.item.id_level == value.id  %} selected="selected"{% endif %}>{{ value.title_it }}</option>								
									{% endfor %}
								</select>
								{% endif %}				
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="passwordID" class="col-md-2 control-label">{{ App.lang['password']|capitalize }}</label>
							<div class="col-md-2">
								<input type="password" name="password" class="form-control" id="passwordID" placeholder="{{ App.lang['inserisci una password']|capitalize }}" value="">
					    	</div>
						</div>
						<div class="form-group">
							<label for="passwordCFID" class="col-md-2 control-label">{{ App.lang['password di controllo']|capitalize }}</label>
							<div class="col-md-2">
								<input type="password" name="passwordCF" class="form-control" id="passwordCFID" placeholder="{{ App.lang['inserisci una password di controllo']|capitalize }}" value="">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ App.lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="email" name="email" class="form-control" id="emailID" placeholder="{{ App.lang['inserisci un indirizzo email']|capitalize }}"  value="{{ App.item.email }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
					</fieldset>
				</div>		
				<div class="tab-pane{% if App.formTabActive == 2 %} active{% endif %}" id="anagrafica-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ App.lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" id="nameID" placeholder="{{ App.lang['inserisci un nome']|capitalize }}" value="{{ App.item.name }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ App.lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="{{ App.lang['inserisci un cognome']|capitalize }}" value="{{ App.item.surname }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ App.lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="{{ App.lang['inserisci un indirizzo']|capitalize }}" value="{{ App.item.street }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ App.lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="{{ App.lang['inserisci una città']|capitalize }}" value="{{ App.item.city }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ App.lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ App.lang['inserisci un cap']|capitalize }}" value="{{ App.item.zip_code }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ App.lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ App.lang['inserisci una provincia']|capitalize }}" value="{{ App.item.province }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ App.lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ App.lang['inserisci uno stato']|capitalize }}" value="{{ App.item.state }}">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane{% if App.formTabActive == 3 %} active{% endif %}" id="contacts-tab">			
					<fieldset class="form-group">
							<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ App.lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="{{ App.lang['inserisci un numero di telefono']|capitalize }}"  value="{{ App.item.telephone }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ App.lang['cellulare']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="{{ App.lang['inserisci un numero di cellulare']|capitalize }}"  value="{{ App.item.mobile }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ App.lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="{{ App.lang['inserisci un numero di fax']|capitalize }}"  value="{{ App.item.fax }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-2 control-label">{{ App.lang['skype']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="{{ App.lang['inserisci un username skype']|capitalize }}"  value="{{ App.item.skype }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione immagini -->		  
				<div class="tab-pane{% if App.formTabActive == 4 %} active{% endif %}" id="images-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="avatarID" class="col-md-2 control-label">{{ App.lang['avatar']|capitalize }}</label>
							<div class="col-md-3">				
								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								{% if App.item.avatar is defined and App.item.avatar != '' %}
									<img src="{{ URLSITE }}site-users/renderAvatarDBItem/{{ App.item.id }}" alt="" style="max-height:70px;">
				            {% endif %}				
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione immagini -->	
	<!-- sezione opzioni --> 
				<div class="tab-pane{% if App.formTabActive == 5 %} active{% endif %}" id="options-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="templateID" class="col-md-2 control-label">{{ App.lang['template']|capitalize }}</label>
							<div class="col-md-7">
								{% if App.templatesAvaiable is iterable  %}
								<select name="template" class="form-control">
									{% for key,value in App.templatesAvaiable  %}
										<option value="{{ value }}"{% if App.item.template is defined and App.item.template == value %} selected="selected"{% endif %}>{{ value }}</option>								
									{% endfor %}
								</select>
								{% endif %}				
					    	</div>
						</div>	
						<hr>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">{{ App.lang['attiva']|capitalize }}</label>
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
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ App.lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ App.lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-2">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItem" title="{{ App.lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ App.lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
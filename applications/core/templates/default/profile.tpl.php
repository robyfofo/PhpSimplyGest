<!-- core/profile.tpl.php v.1.0.0. 05/07/2018 -->
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}profile/NULL"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione dati base --> 	
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-3 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" id="nameID" placeholder="{{ Lang['inserisci un nome'] }}" value="{{ App.item.name|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-3 control-label">{{ Lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="{{ Lang['inserisci un cognome'] }}" value="{{ App.item.surname|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="streetID" class="col-md-3 control-label">{{ Lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="{{ Lang['inserisci un indirizzo'] }}" value="{{ App.item.street|e('html') }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-3 control-label">{{ Lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="{{ Lang['inserisci una città'] }}" value="{{ App.item.city|e('html') }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-3 control-label">{{ Lang['cap']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ Lang['inserisci un cap'] }}" value="{{ App.item.zip_code|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-3 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ Lang['inserisci una provincia'] }}" value="{{ App.item.province|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-3 control-label">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ Lang['inserisci uno stato'] }}" value="{{ App.item.state|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="emailID" class="col-md-3 control-label">{{ Lang['email']|capitalize }}</label>
							<div class="col-md-7">
								<input type="email" name="email" class="form-control" id="emailID" placeholder="{{ Lang['inserisci un indirizzo email'] }}"  value="{{ App.item.email|e('html') }}">
					    	</div>
						</div>
							<div class="form-group">
							<label for="telephoneID" class="col-md-3 control-label">{{ Lang['telefono']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="{{ Lang['inserisci un numero di telefono'] }}"  value="{{ App.item.telephone|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-3 control-label">{{ Lang['cellulare']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="{{ Lang['inserisci un numero di cellulare'] }}"  value="{{ App.item.mobile|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-3 control-label">{{ Lang['fax']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="{{ Lang['inserisci un numero di fax'] }}"  value="{{ App.item.fax|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-3 control-label">{{ Lang['skype']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="{{ Lang['inserisci un username skype'] }}"  value="{{ App.item.skype|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="avatarID" class="col-md-3 control-label">{{ Lang['avatar']|capitalize }}</label>
							<div class="col-md-3">				
								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								{% if App.item.avatar is defined and App.item.avatar != '' %}								
									<img src="{{ URLSITE }}profile/renderAvatarDB/{{ App.id }}" alt="" style="max-height: 110px;">					
				            {% endif %}
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="templateID" class="col-md-3 control-label">{{ Lang['template']|capitalize }}</label>
							<div class="col-md-7">
								{% if App.templatesAvaiable is iterable %}
								<select name="template" class="form-control">
									{% for key,value in App.templatesAvaiable %}
										<option value="{{ value }}"{% if App.item.template is defined and App.item.template == value %} selected="selected" {% endif %}>{{ value|e('html') }}</option>													
									{% endfor %}
								</select>
								{% endif %}			
					    	</div>
						</div>	
					</fieldset>
				</div>
<!-- sezione dati base -->					
			</div>
<!--/Tab panes -->			
			<hr>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-9">
				<input type="hidden" name="id" value="{{ App.id }}">
				<input type="hidden" name="method" value="update">
				<button type="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
				</div>
			</div>
		</form>
	</div>
</div>
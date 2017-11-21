<!-- customers/formItem.tpl.php v.1.0.0. 02/11/2017 -->
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
			<li class="active"><a href="#anagrafica-tab" data-toggle="tab">{{ Lang['anagrafica']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#contacts-tab" data-toggle="tab">{{ Lang['contatti']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="anagrafica-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" name="name" class="form-control" id="nameID" placeholder="{{ Lang['inserisci un nome']|capitalize }}" value="{{ App.item.name }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ Lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="{{ Lang['inserisci un cognome']|capitalize }}" value="{{ App.item.surname }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ Lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="{{ Lang['inserisci un indirizzo']|capitalize }}" value="{{ App.item.street }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ Lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="{{ Lang['inserisci una città']|capitalize }}" value="{{ App.item.city }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ Lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ Lang['inserisci un cap']|capitalize }}" value="{{ App.item.zip_code }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ Lang['inserisci una provincia']|capitalize }}" value="{{ App.item.province }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ Lang['inserisci uno stato']|capitalize }}" value="{{ App.item.state }}">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane" id="contacts-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ Lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input type="email" name="email" class="form-control" id="emailID" placeholder="{{ Lang['inserisci un indirizzo email']|capitalize }}"  value="{{ App.item.email }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
						<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ Lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="{{ Lang['inserisci un numero di telefono']|capitalize }}"  value="{{ App.item.telephone }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ Lang['cellulare']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="{{ Lang['inserisci un numero di cellulare']|capitalize }}"  value="{{ App.item.mobile }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ Lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="{{ Lang['inserisci un numero di fax']|capitalize }}"  value="{{ App.item.fax }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-2 control-label">{{ Lang['skype']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="{{ Lang['inserisci un username skype']|capitalize }}"  value="{{ App.item.skype }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="id_catID" class="col-md-2 control-label">{{ Lang['categoria']|capitalize }}</label>
							<div class="col-md-7">							
								<select name="id_cat" id="id_catID" class="form-control">
									<option value="0"></option>
									{% if App.subcategories is iterable and App.subcategories|length > 0 %}
										{% for key,value in App.subcategories %}
											<option value="{{ value.id }}"{% if App.item.parent == value.id %} selected="selected"{% endif %}>{{ value.levelString }}{{ value.title }}</option>														
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
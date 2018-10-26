<!-- contacts/formItem.tpl.php v.1.0.0. 28/02/2018 -->
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
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ App.lang['dati base']|title }} <i class="fa"></i></a></li>
			<li><a href="#contacts-tab" data-toggle="tab">{{ App.lang['contatti']|capitalize }} <i class="fa"></i></a></li>
			<li><a href="#fiscale-tab" data-toggle="tab">{{ App.lang['fiscale']|capitalize }} <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">{{ App.lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ App.lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="name" placeholder="{{ App.lang['inserisci un nome']|capitalize }}" id="nameID" value="{{ App.item.name|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ App.lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="surname" placeholder="{{ App.lang['inserisci un cognome']|capitalize }}" id="surnameID" value="{{ App.item.surname|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ App.lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="street" placeholder="{{ App.lang['inserisci un indirizzo']|capitalize }}" id="streetID" value="{{ App.item.street|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ App.lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="city" placeholder="{{ App.lang['inserisci una città']|capitalize }}" id="cityID" value="{{ App.item.city|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ App.lang['cap']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="zip_code" placeholder="{{ App.lang['inserisci un cap']|capitalize }}" id="zip_codeID" value="{{ App.item.zip_code|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="countryID" class="col-md-2 control-label">{{ App.lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="country" placeholder="{{ App.lang['inserisci una provincia']|capitalize }}" id="countryID" value="{{ App.item.country|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="stateID" class="col-md-2 control-label">{{ App.lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="state" placeholder="{{ App.lang['inserisci uno stato']|capitalize }}" id="stateID" value="{{ App.item.state|e('html') }}">
							</div>
						</div>
					</fieldset>				
				</div>
<!-- sezione contatti --> 
				<div class="tab-pane" id="contacts-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ App.lang['telefono']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="telephone" placeholder="{{ App.lang['inserisci un numero di telefono']|capitalize }}" id="telephoneID" value="{{ App.item.telephone|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ App.lang['cellulare']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="mobile" placeholder="{{ App.lang['inserisci un numero di cellulare']|capitalize }}" id="mobileID" value="{{ App.item.mobile|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="faxID" class="col-md-2 control-label">{{ App.lang['fax']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="fax" placeholder="{{ App.lang['inserisci un numero di fax']|capitalize }}" id="faxID" value="{{ App.item.fax|e('html') }}">
							</div>
						</div>
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ App.lang['email']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="email" placeholder="{{ App.lang['inserisci un indirizzo email']|capitalize }}" id="emailID" value="{{ App.item.email|e('html') }}">
							</div>
						</div>
					</fieldset>
				</div>
<!-- sezione contatti -->
<!-- sezione fiscale --> 
				<div class="tab-pane" id="fiscale-tab">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="codice_fiscaleID" class="col-md-2 control-label">{{ App.lang['codice fiscale']|title }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="codice_fiscale" placeholder="{{ App.lang['inserisci un codice fiscale']|capitalize }}" id="codice_fiscaleID" value="{{ App.item.codice_fiscale|e('html') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="partita_ivaID" class="col-md-2 control-label">{{ App.lang['partita IVA']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="partita_iva" placeholder="{{ App.lang['inserisci una partita IVA']|capitalize }}" id="partita_ivaID" value="{{ App.item.partita_iva|e('html') }}">
							</div>
						</div>
					</fieldset>					
				</div>
<!-- sezione fiscale -->

<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">		
					<fieldset class="form-group">
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
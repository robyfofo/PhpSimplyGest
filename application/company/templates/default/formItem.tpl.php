<!-- company/formItem.tpl.php v.1.0.0. 18/01/2018 -->
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
			<li class=""><a href="#fiscale-tab" data-toggle="tab">{{ Lang['fiscale']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#fatturazione-tab" data-toggle="tab">{{ Lang['fatturazione']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#banca-tab" data-toggle="tab">{{ Lang['banca']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="anagrafica-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="ragione_socialeID" class="col-md-2 control-label">{{ Lang['ragione sociale']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" name="ragione_sociale" class="form-control" id="ragione_socialeID" placeholder="{{ Lang['inserisci una ragione sociale']|capitalize }}" value="{{ App.item.ragione_sociale|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" name="name" class="form-control" id="nameID" placeholder="{{ Lang['inserisci un nome']|capitalize }}" value="{{ App.item.name|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ Lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="{{ Lang['inserisci un cognome']|capitalize }}" value="{{ App.item.surname|e('html') }}">
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ Lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="{{ Lang['inserisci un indirizzo']|capitalize }}" value="{{ App.item.street|e('html') }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ Lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="{{ Lang['inserisci una città']|capitalize }}" value="{{ App.item.city|e('html') }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ Lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="{{ Lang['inserisci un cap']|capitalize }}" value="{{ App.item.zip_code|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="{{ Lang['inserisci una provincia']|capitalize }}" value="{{ App.item.province|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="{{ Lang['inserisci uno stato']|capitalize }}" value="{{ App.item.state|e('html') }}">
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
								<input type="email" name="email" class="form-control" id="emailID" placeholder="{{ Lang['inserisci un indirizzo email']|capitalize }}"  value="{{ App.item.email|e('html') }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
						<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ Lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="{{ Lang['inserisci un numero di telefono']|capitalize }}"  value="{{ App.item.telephone|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ Lang['cellulare']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="{{ Lang['inserisci un numero di cellulare']|capitalize }}"  value="{{ App.item.mobile|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="faxID" class="col-md-2 control-label">{{ Lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="{{ Lang['inserisci un numero di fax']|capitalize }}"  value="{{ App.item.fax|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione fiscale --> 
				<div class="tab-pane" id="fiscale-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="partita_ivaID" class="col-md-2 control-label">{{ Lang['partita IVA']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="partita_iva" class="form-control" id="partita_ivaID" placeholder="{{ Lang['inserisci una partita IVA']|capitalize }}"  value="{{ App.item.partita_iva|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="codice_fiscaleID" class="col-md-2 control-label">{{ Lang['codice fiscale']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="codice_fiscale" class="form-control" id="codice_fiscaleID" placeholder="{{ Lang['inserisci un codice fiscale']|capitalize }}"  value="{{ App.item.codice_fiscale|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione fiscale -->
	<!-- sezione fatture --> 
				<div class="tab-pane" id="fatturazione-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="gestione_ivaID" class="col-md-2 control-label">{{ Lang['gestione iva']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="gestione_iva" id="gestione_ivaID"{% if App.item.gestione_iva == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
      					</div>
				  		</div>
				  		<div class="form-group">
							<label for="ivaID" class="col-md-2 control-label">{{ Lang['iva']|capitalize }} %</label>
							<div class="col-md-3">
								<input type="text" name="iva" class="form-control" id="ivaID" placeholder="{{ Lang['inserisci una iva']|capitalize }}"  value="{{ App.item.iva|e('html') }}">
					    	</div>
						</div>
				  		<div class="form-group">
							<label for="text_noivaID" class="col-md-2 control-label">{{ Lang['testo no iva']|capitalize }}</label>
							<div class="col-md-7">
								<textarea name="text_noiva" class="form-control" id="text_noivaID" rows="3">{{ App.item.text_noiva|e('html') }}</textarea>
					    	</div>
						</div>
				  		<hr>
				  		<div class="form-group">
							<label for="gestione_rivalsaID" class="col-md-2 control-label">{{ Lang['gestione rivalsa']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="gestione_rivalsa" id="gestione_rivalsaID"{% if App.item.gestione_rivalsa == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
      					</div>
				  		</div>											
				  		<div class="form-group">
							<label for="text_rivalsaID" class="col-md-2 control-label">{{ Lang['testo rivalsa']|capitalize }}</label>
							<div class="col-md-7">
								<textarea name="text_rivalsa" class="form-control" id="text_rivalsaID" rows="3">{{ App.item.text_rivalsa|e('html') }}</textarea>
					    	</div>
						</div>
						<div class="form-group">
							<label for="rivalsaID" class="col-md-2 control-label">{{ Lang['rivalsa']|capitalize }} %</label>
							<div class="col-md-3">
								<input type="text" name="rivalsa" class="form-control" id="rivalsaID" placeholder="{{ Lang['inserisci una rivalsa']|capitalize }}"  value="{{ App.item.rivalsa|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione fatture -->
	<!-- sezione banca --> 
				<div class="tab-pane" id="banca-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="bancaID" class="col-md-2 control-label">{{ Lang['banca']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="text" name="banca" class="form-control" id="bancaID" placeholder="{{ Lang['inserisci una banca']|capitalize }}"  value="{{ App.item.banca|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="intestatarioID" class="col-md-2 control-label">{{ Lang['intestatario']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="text" name="intestatario" class="form-control" id="intestatarioID" placeholder="{{ Lang['inserisci un intestatario']|capitalize }}"  value="{{ App.item.intestatario|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="ibanID" class="col-md-2 control-label">{{ Lang['iban']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="text" name="iban" class="form-control" id="ibanID" placeholder="{{ Lang['inserisci un iban']|capitalize }}"  value="{{ App.item.iban|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="bic_swiftID" class="col-md-2 control-label">{{ Lang['bic swift']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="bic_swift" class="form-control" id="bic_swiftID" placeholder="{{ Lang['inserisci un bic swift']|capitalize }}"  value="{{ App.item.bic_swift|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione banca -->
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset class="form-group">
						
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
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
			</div>
		</form>
	</div>
</div>
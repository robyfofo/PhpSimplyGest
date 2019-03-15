<!-- invoices/formInvSel.tpl.php v.1.0.0. 13/03/2019 -->
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
			<li class="{% if App.tabActive == 1 %}active{% endif %}"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }} <i class="fa"></i></a></li>
			{% if App.id > 0 %}<li class="{% if App.tabActive == 2 %}active{% endif %}"><a href="#articles-tab" data-toggle="tab">{{ Lang['articoli']|capitalize }} <i class="fa"></i></a></li>{% endif %}
			<li class=""><a href="#anagrafica-tab" data-toggle="tab">{{ Lang['anagrafica']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane{% if App.tabActive == 1 %} active{% endif %}" id="datibase-tab">			
					<fieldset>
						<div class="form-group">
							<label for="dateinsID" class="col-md-2 control-label">{{ Lang['data']|capitalize }}</label>
							<div class="col-md-5 col-xs-5 input-group date" id="dateinsDPID">
								<input required="required" type="text" name="dateins" class="form-control" placeholder="{{ Lang['inserisci una data']|capitalize }}" id="dateinsID" value="">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
			               </span>		    	
					    	</div>
						</div>
						<div class="form-group">
							<label for="datescaID" class="col-md-2 control-label">{{ Lang['data scadenza']|capitalize }}</label>
							<div class="col-md-5 col-xs-5 input-group date" id="datescaDPID">
								<input required="required" type="text" name="datesca" class="form-control" placeholder="{{ Lang['inserisci una data di scadenza']|capitalize }}" id="datescaID" value="">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
			               </span>		    	
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="numberID" class="col-md-2 control-label">{{ Lang['numero']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" name="number" class="form-control" id="numberID" placeholder="{{ Lang['inserisci un numero']|capitalize }}" value="{{ App.item.number|e('html') }}">
					    	</div>
						</div>						
						<div class="form-group">
							<label for="noteID" class="col-md-2 control-label">{{ Lang['Note (visibili in fattura)']|capitalize }}</label>
							<div class="col-md-7">
								<textarea name="note" class="form-control" id="noteID" rows="3">{{ App.item.note|e('html') }}</textarea>
					    	</div>
						</div>	
					</fieldset>					
				</div>
				
<!-- sezione articles -->
				{% if App.id > 0 %}
				<div class="tab-pane{% if App.tabActive == 2 %} active{% endif %}" id="articles-tab">

					{% if App.item_articles is iterable and App.item_articles|length > 0 %}				
						<table class="table table-striped table-bordered table-hover listData">
							<thead>
								<tr>
									<th class="text-center">{{ Lang['contenuto']|capitalize }}</th>
									<th class="text-center">{{ Lang['prezzo unitario']|capitalize }}</th>
									<th class="text-center">{{ Lang['quantità']|capitalize }}</th>
									<th class="text-center">{{ Lang['prezzo totale']|capitalize }}</th>	
									<th class="text-center">{{ Lang['iva']|capitalize }}</th>
									<th class="text-center">{{ Lang['imponibile']|capitalize }}</th>
									<th class="text-center">{{ Lang['totale']|capitalize }}</th>									
									<th></th					
								</tr>
							</thead>
							<tbody>				
								{% if App.item_articles is iterable and App.item_articles|length > 0 %}
									{% for key,value in App.item_articles %}
										<tr>
											<td>{{ value.content }}</td>
											<td class="text-right">{{ value.price_unity_label }}</td>
											<td class="text-center">{{ value.quantity }}</td>
											<td class="text-right">{{ value.price_total_label }}</td>
											<td class="text-center">{{ value.tax }}</td>								
											<td class="text-right">{{ value.price_tax_label }}</td>								
											<td class="text-right">{{ value.total_label }}</td>
											<td class="actions">
												<a class="btn btn-default btn-circle modifyArtInvSal" data-id="{{ value.id }}" href="javascript:void(0);" title="{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['articolo']})|capitalize }}"><i class="fa fa-edit"> </i></a>
												<a class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteArtInvSal/{{ App.id }}/{{ value.id }}" title="{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['articolo']})|capitalize }}"><i class="fa fa-cut"> </i></a>
											</td>					
										</tr>	
									{% endfor %}
								{% endif %}
							</tbody>
							<tfoot>
								<tr>
									<td class="text-right" colspan="3">{{ Lang['totali']|capitalize }}</td>
									<td class="text-right">{{ App.item.art_tot_price_total_label }}</td>
									<td></td>								
									<td class="text-right">{{ App.item.art_tot_price_tax_label }}</td>								
									<td class="text-right">{{ App.item.art_tot_total_label }}</td>
									<td></td>
								</tr>
								{% if App.item.tax > 0 %}
								<tr>						
									<td class="text-right" colspan="6">{{ Lang['tassa aggiuntiva']|capitalize }}</td>								
									<td class="text-right"><big><b>{{ App.item.invoiceTotalTax_label }}</b></big></td>
									<td></td>
								</tr>		
								{% endif %}
								{% if App.item.rivalsa > 0 %}
								<tr>						
									<td class="text-right" colspan="6">{{ App.company.text_rivalsa }}</td>								
									<td class="text-right"><big><b>{{ App.item.invoiceTotalRivalsa_label }}</b></big></td>
									<td></td>
								</tr>		
								{% endif %}
								<tr>
									<td class="text-right" colspan="6">{{ Lang['totale']|capitalize}}</td>								
									<td class="text-right"><big><b>{{ App.item.invoiceTotal_label }}</b></big></td>
									<td></td>
								</tr>																
							</tfoot>
						</table>
					{% endif %}

					<div class="row">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
							<div class="panel panel-info" id="articlePanelID">
					  			<div class="panel-heading" id="articlePanelHeadingID">
					    			<h3 class="panel-title" id="articlePanelTitleID">{{ Lang['aggiungi articolo']|capitalize }}</h3>
					  			</div>
					  			<div class="panel-body form-inline">
										<div class="row">	
											<div class="col-xs-12">
												<textarea required name="art_content" id="art_contentID" class="form-control form-content"  rows="3">{{ Lang['inserisci testo articolo']|capitalize }}</textarea>						
											</div>
										</div>
										<div class="row">	
					  						<div class="form-group">
					    						<label for="price_unityID">{{ Lang['prezzo']|capitalize }}</label>
					    						<input type="text" class="form-control form-amount" name="art_price_unity" id="art_price_unityID" value="0.00">
					  						</div>
					  						<div class="form-group">
					    						<label for="quantityID">{{ Lang['q.tà']|capitalize }}</label>
					    						<input type="text" class="form-control form-tax" name="art_quantity" id="art_quantityID" value="1">
					  						</div>
					  						<div class="form-group">
												<label for="price_totalID">{{ Lang['totale']|capitalize }}</label>
												<input readonly="readonly" type="text" class="form-control form-amount" name="art_price_total" id="art_price_totalID" value="0.00">	
											</div>
											<div class="form-group">
												<label for="taxID">{{ Lang['tassa']|capitalize }}</label>
												<input type="text" class="form-control form-tax" name="art_tax" id="art_taxID" value="0">
											</div>
											<div class="form-group">
												<label for="totalID">{{ Lang['totale']|capitalize }}</label>
												<input readonly="readonly" type="text" class="form-control form-amount" name="art_total" id="art_totalID" value="0.00">
											</div>
										</div>
					
										<div class="row modalaction">					
											<div class="col-md-12 text-center">							
												<input type="hidden" name="id_article" id="id_articleID" value="0">
												<input type="hidden" name="artFormMode" id="artFormModeID" value="ins">
												<button type="submit" name="submitArtForm" id="submitArtFormID" value="submitArt" class="btn btn-info btn-sm">{{ Lang['aggiungi']|capitalize }} {{ Lang['articolo'] }}</button>
												<button type="button" name="resetArtForm" id="resetArtFormID" value="reset" class="pull-right btn btn-warning btn-sm">{{ Lang['resetta']|capitalize }} {{ Lang['articolo'] }}</button>
											</div>
										</div>
									
					  			</div>
							</div>
						</div>
						<!-- /.col-md-12 -->
					</div>	
					
				</div>	
				{% endif %}		
<!-- /sezione movimenti -->

<!-- /sezione articles -->	
				<div class="tab-pane" id="anagrafica-tab">			
					<fieldset>					
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['cliente']|capitalize }}</label>
							<div class="col-md-7">
								<select name="id_customer" id="id_customerID" class="form-control">
									<option value =""></option>
									{% if App.customers is iterable and App.customers|length > 0 %}
										{% for key,value in App.customers %}
											<option value="{{ value.id }}"{% if App.item.id_customer == value.id %} selected="selected"{% endif %}>{{ value.ragione_sociale|e('html') }}</option>														
										{% endfor %}
									{% endif %}
								</select>								    	
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="customer_ragione_socialeID" class="col-md-2 control-label">{{ Lang['ragione sociale']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" name="customer_ragione_sociale" class="form-control" id="customer_ragione_socialeID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['ragione sociale']})|capitalize }}" value="{{ App.item.customer_ragione_sociale|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['ragione sociale']}) }}')" oninput="setCustomValidity('')">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_nameID" class="col-md-2 control-label">{{ Lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_name" class="form-control" id="customer_nameID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['nome']})|capitalize }}" value="{{ App.item.customer_name|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_surnameID" class="col-md-2 control-label">{{ Lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_surname" class="form-control" id="customer_surnameID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['cognome']})|capitalize }}" value="{{ App.item.customer_surname|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_streetID" class="col-md-2 control-label">{{ Lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_street" class="form-control" id="customer_streetID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['via']})|capitalize }}" value="{{ App.item.customer_street|e('html') }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="customer_cityID" class="col-md-2 control-label">{{ Lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_city" class="form-control" id="customer_cityID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['città']})|capitalize }}" value="{{ App.item.customer_city|e('html') }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="customer_zip_codeID" class="col-md-2 control-label">{{ Lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="customer_zip_code" class="form-control" id="customer_zip_codeID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['cap']})|capitalize }}" value="{{ App.item.customer_zip_code|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_provinceID" class="col-md-2 control-label">{{ Lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_province" class="form-control" id="customer_provinceID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['provincia']})|capitalize }}" value="{{ App.item.customer_province|e('html') }}">
					    	</div>
						</div>
						<div class="form-group form-inline">
							<label for="customer_stateID" class="col-md-2 text-right">{{ Lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="customer_state" class="form-control" id="customer_stateID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['stato']})|capitalize }}" value="{{ App.item.customer_state|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="ecustomer_mailID" class="col-md-2 control-label">{{ Lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input type="email" name="customer_email" class="form-control" id="customer_emailID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['indirizzo email']})|capitalize }}"  value="{{ App.item.customer_email|e('html') }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
						<div class="form-group">
							<label for="customer_telephoneID" class="col-md-2 control-label">{{ Lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="customer_telephone" class="form-control" id="customer_telephoneID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['numero di telefono']})|capitalize }}"  value="{{ App.item.customer_telephone|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_faxID" class="col-md-2 control-label">{{ Lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="customer_fax" class="form-control" id="customer_faxID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['numero di fax']})|capitalize }}"  value="{{ App.item.customer_fax|e('html') }}">
					    	</div>
						</div>
				
						<div class="form-group">
							<label for="customer_partita_ivaID" class="col-md-2 control-label">{{ Lang['partita IVA']|capitalize }}</label>
							<div class="col-md-5">
								<input required="required" type="customer_partita_iva" name="customer_partita_iva" class="form-control" id="customer_partita_ivaID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['partita IVA']})|capitalize }}"  value="{{ App.item.customer_partita_iva|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_codice_fiscaleID" class="col-md-2 control-label">{{ Lang['codice fiscale']|capitalize }}</label>
							<div class="col-md-5">
								<input required="required" type="text" name="customer_codice_fiscale" class="form-control" id="customer_codice_fiscaleID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['codice fiscale']})|capitalize }}"  value="{{ App.item.customer_codice_fiscale|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_pecID" class="col-md-2 control-label">PEC</label>
							<div class="col-md-5">
								<input required="required" type="text" name="customer_pec" class="form-control" id="customer_pecID" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': 'PEC'})|capitalize }}"  value="{{ App.item.customer_pec|e('html') }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="customer_sidID" class="col-md-2 control-label">SID</label>
							<div class="col-md-5">
								<input required="required" type="text" name="customer_sid" class="form-control" id="customer_sidID" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': 'SID'})|capitalize }}"  value="{{ App.item.customer_sid|e('html') }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione fiscale -->

<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="rivalsaID" class="col-md-2 control-label">{{ Lang['rivalsa']|capitalize }} %</label>
							<div class="col-md-3">
								<input type="text" name="rivalsa" class="form-control" id="rivalsaID" value="{{ App.item.rivalsa|e('html') }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="ivaID" class="col-md-2 control-label">{{ Lang['tassa aggiuntiva']|capitalize }} %</label>
							<div class="col-md-3">
								<input type="text" name="iva" class="form-control" id="ivaID" placeholder="{{ Lang['inserisci una tassa aggiuntiva']|capitalize }}"  value="{{ App.item.tax|e('html') }}">
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
<!-- /sezione opzioni -->		 
			</div>
			<!--/Tab panes -->			
			<hr>
			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7 col-xs-6 col-xs-offset-0 actionsform">
					<input type="hidden" name="type" id="typeID" value="{{ App.type }}">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary submittheform">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary submittheform">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-3 col-xs-6 actionsform">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listInvSal" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
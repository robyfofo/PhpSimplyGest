<!-- invoices/formInvSel.tpl.php v.1.0.0. 09/04/2018 -->
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
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#articles-tab" data-toggle="tab">{{ Lang['articoli']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="datibase-tab">			
					<fieldset class="form-group">
						<div class="form-group">
							<label for="dateinsID" class="col-md-2 control-label">{{ Lang['data']|capitalize }}</label>
							<div class="col-md-5 input-group date" id="dateinsDPID">
								<input required type="text" name="dateins" class="form-control" placeholder="{{ Lang['inserisci una data']|capitalize }}" id="dateinsID" value="">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
			               </span>		    	
					    	</div>
						</div>
						<div class="form-group">
							<label for="datescaID" class="col-md-2 control-label">{{ Lang['data scadenza']|capitalize }}</label>
							<div class="col-md-5 input-group date" id="datescaDPID">
								<input required type="text" name="datesca" class="form-control" placeholder="{{ Lang['inserisci una data di scadenza']|capitalize }}" id="datescaID" value="">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
			               </span>		    	
					    	</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ Lang['cliente']|capitalize }}</label>
							<div class="col-md-7">
								<select name="id_customer" id="id_customerID" class="form-control">
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
							<label for="numberID" class="col-md-2 control-label">{{ Lang['numero']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" name="number" class="form-control" id="numberID" placeholder="{{ Lang['inserisci un numero']|capitalize }}" value="{{ App.item.number|e('html') }}">
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
				<div class="tab-pane" id="articles-tab">

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
					</tr>
					{% if App.item.tax > 0 %}
					<tr>						
						<td class="text-right" colspan="6">{{ Lang['tassa aggiuntiva']|capitalize }}</td>								
						<td class="text-right"><big><b>{{ App.item.invoiceTotalTax_label }}</b></big></td>
					</tr>		
					{% endif %}
					{% if App.item.rivalsa > 0 %}
					<tr>						
						<td class="text-right" colspan="6">{{ App.company.text_rivalsa }}</td>								
						<td class="text-right"><big><b>{{ App.item.invoiceTotalRivalsa_label }}</b></big></td>
					</tr>		
					{% endif %}
					<tr>
						<td class="text-right" colspan="6">{{ Lang['totale']|capitalize}}</td>								
						<td class="text-right"><big><b>{{ App.item.invoiceTotal_label }}</b></big></td>
					</tr>									
				
				</tfoot>
			</table>
{% endif %}
				</div>
<!-- /sezione articles -->	
<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset class="form-group">
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
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="type" id="typeID" value="{{ App.type }}">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-2">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listInvSal" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
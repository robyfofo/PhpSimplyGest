<!-- invoices/formItes.tpl.php v.1.0.0. 29/11/2017 -->
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
			<li class=""><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }} <i class="fa"></i></a></li>
			<li class="active"><a href="#articles-tab" data-toggle="tab">{{ Lang['articoli']|capitalize }} <i class="fa"></i></a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane" id="datibase-tab">			
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
											<option value="{{ value.id }}"{% if App.item.id_customer == value.id %} selected="selected"{% endif %}>{{ value.name }}, {{ value.surname|e('html') }}</option>														
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

<!-- sezione movimenti -->
				<div class="tab-pane active" id="articles-tab">
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo" data-mov="0" title="{{ Lang['inserisci nuovo articolo']|capitalize }}">{{ Lang['nuovo articolo']|capitalize }}</button>
						</div>
					</div>
					<hr class="divider">
					<div class="row">
						<div class="col-md-12">	
							<div class="table-responsive">				
								<table class="table table-striped table-bordered table-hover listData">
									<thead>
										<tr>
											{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
												<th class="id">ID</th>								
											{% endif %}
											<th>{{ Lang['contenuto']|capitalize }}</th>
											<th>{{ Lang['quantità']|capitalize }}</th>
											<th>{{ Lang['prezzo unitario']|capitalize }}</th>
											<th>{{ Lang['iva']|capitalize }}</th>
											<th>{{ Lang['imponibile']|capitalize }}</th>
											<th>{{ Lang['prezzo totale']|capitalize }}</th>										
											<th></th>
										</tr>
									</thead>
									<tbody id="listamovimentiID">				
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="form-group">
							<label for="invoive_mov_totalID" class="col-md-9 control-label">{{ Lang['imponibile']|capitalize }}</label>
							<div class="col-md-2 text-right">
								<span id="invoice_mov_totalID">€ 0,00</span>
					    	</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="invoive_total_taxID" class="col-md-9 control-label">{{ Lang['imposte']|capitalize }}</label>
							<div class="col-md-2 text-right">
								<span id="invoice_tax_totalID">€ 0,00</span>
					    	</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="invoive_rivalsaID" class="col-md-9 control-label">{{ Lang['rivalsa']|capitalize }} INPS 4%</label>
							<div class="col-md-2 text-right">
								<span id="invoice_rivalsaID">€ 0,00</span>
					    	</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="invoive_totalID" class="col-md-9 control-label">{{ Lang['totale']|capitalize }}</label>
							<div class="col-md-2 text-right">
								<span id="invoice_totalID">0,00</span>
					    	</div>
						</div>
					</div>
						
				</div>
<!-- /sezione movimenti -->

<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset class="form-group">
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
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItes" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"></h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form id="articoloFormID" class="form-horizontal" role="form" action="#" enctype="multipart/form-data">
						<div class="row">
							
							<div class="form-group form-group-sm">
								<div class="col-md-8">
									<textarea required name="content_mov" class="form-control" id="content_movID" rows="3">{{ Lang['inserisci testo articolo']|capitalize }}</textarea>
								</div>
								
								<div class="col-md-4">
								</div>
							</div>	
						
						</div>
						<div class="row">
							<div class="form-group form-group-sm">
								<label for="price_unity_movID" class="col-xs-2 control-label">{{ Lang['prezzo']|capitalize }}</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="price_unity_mov" id="price_unity_movID" value="0.00">
						  		</div>
						  		
						  		<label for="quantity_movID" class="col-xs-2 control-label">{{ Lang['q.tà']|capitalize }}</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="quantity_mov" id="quantity_movID" value="1">
								</div>
								
								<label for="tax_movID" class="col-xs-2 control-label">{{ Lang['tassa']|capitalize }}</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="tax_mov" id="tax_movID" value="{{ App.params.defaultTax }}">
								</div>
								
								<label for="price_total_movID" class="col-xs-2 control-label">{{ Lang['totale']|capitalize }}</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="price_total_mov" id="price_total_movID" value="0.00">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group form-group-sm">	
								<div class="col-md-8">							
									<input type="hidden" name="id_mov" id="id_movID" value="">
									<input type="hidden" name="id_invoice" id="id_invoiceID" value="{{ App.item.id }}">
									<button type="submit" name="submitForm" value="submit" class="btn btn-primary btn-sm ">{{ Lang['aggiungi']|capitalize }}</button>
								</div>					
							</div>	
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</div>
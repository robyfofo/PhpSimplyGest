<!-- invoices/formItemu.tpl.php v.1.0.0. 02/11/2017 -->
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
			<li class="active"><a href="#items-tab" data-toggle="tab">{{ Lang['movimenti associati']|capitalize }} <i class="fa"></i></a></li>
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
											<option value="{{ value.id }}"{% if App.item.id_customer == value.id %} selected="selected"{% endif %}>{{ value.name }}, {{ value.surname }}</option>														
										{% endfor %}
									{% endif %}
								</select>								    	
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="numberID" class="col-md-2 control-label">{{ Lang['numero']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" name="number" class="form-control" id="numberID" placeholder="{{ Lang['inserisci un numero']|capitalize }}" value="{{ App.item.number }}">
					    	</div>
						</div>
	
					</fieldset>					
				</div>

<!-- sezione movimenti -->
				<div class="tab-pane active" id="items-tab">
				
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo" data-mov="0" title="{{ Lang['aggiungi movimento']|capitalize }}">{{ Lang['aggiungi movimento']|capitalize }}</button>
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
							<label for="invoive_mov_totalID" class="col-md-9 control-label">{{ Lang['totale movimenti']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="invoice_mov_total" class="form-control text-right" id="invoice_mov_totalID" value="aa">
					    	</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="invoive_total_taxID" class="col-md-9 control-label">{{ Lang['imponibile']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="invoice_tax_total" class="form-control text-right" id="invoice_tax_totalID" value="bb">
					    	</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="invoive_totalID" class="col-md-9 control-label">{{ Lang['totale']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="invoice_total" class="form-control text-right" id="invoice_totalID" value="cc">
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
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItep" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
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

			<div class="row">
				<div class="col-md-12"> 
		      	<form id="movimentoFormID" class="form-horizontal" role="form" action="#" enctype="multipart/form-data" method="post">
						<div class="row">
							<fieldset class="form-group">
								<div class="form-group">
									<label for="content_movID" class="col-md-2 control-label">{{ Lang['contenuto']|capitalize }} INLINE</label>
									<div class="col-md-8">
										<textarea required name="content_mov" class="form-control" id="content_movID" rows="5"></textarea>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<label for="quantity_movID" class="col-md-2 control-label">{{ Lang['quantità']|capitalize }}</label>
									<div class="col-md-8">
										<input required  type="text" name="quantity_mov" id="quantity_movID" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="price_unity_movID" class="col-md-2 control-label">{{ Lang['prezzo unitario']|capitalize }}</label>
									<div class="col-md-8">
										<input required  type="text" name="price_unity_mov" id="price_unity_movID" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="tax_movID" class="col-md-2 control-label">{{ Lang['tassa']|capitalize }}</label>
									<div class="col-md-8">
										<input required  type="text" name="tax_mov" id="tax_movID" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="price_total_movID" class="col-md-2 control-label">{{ Lang['prezzo totale']|capitalize }}</label>
									<div class="col-md-8">
										<input required  type="text" name="price_total_mov" id="price_total_movID" value="">
									</div>
								</div>
								<input type="text" name="price_tax_mov" id="price_tax_movID" value="">											
							</fieldset>	
							<hr>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-7">
									id mod: <input type="text" name="id_mov" id="id_movID" value="">
									id invoice<input type="text" name="id_invoice" id="id_invoiceID" value="{{ App.item.id }}">
									<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
								</div>
								<div class="col-md-2">
									<button type="button" id="deleteMovID" href="#" title="{{ Lang['cancella']|capitalize }}" class="btn btn-danger">{{ Lang['cancella']|capitalize }}</button>
								</div>
							</div>
						</div>	
		       	</form>
		      </div>
		    </div>
          	
      </div>
    </div>
  </div>
</div>
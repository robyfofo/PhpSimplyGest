<!-- invoices/listArtPur.tpl.php v.1.0.0. 13/04/2018 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-list">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2">
		<a href="{{ URLSITE }}{{ CoreRequest.action }}/listInvPur" title="{{ Lang['vai alla lista delle voci-p']|capitalize }}" class="btn btn-primary">{{ Lang['lista voci-p']|capitalize }}</a>
	</div>
</div>
<hr class="divider-top-module">
<div class="row well well-sm">	
	<div class="col-md-4"> 
		{{ Lang['voce']|capitalize }}: <b>{{ App.invoice.number }}</b>
	</div>
	<div class="col-md-2 text-right"> 
		{{ Lang['data']|capitalize }}: <br>{{ Lang['scadenza']|capitalize }}: 
	</div>
	<div class="col-md-2"> 
		<b>{{ App.invoice.dateins }}</b><br><b>{{ App.invoice.datesca }}</b>
	</div>
	<div class="col-md-4"> 
		{{ App.invoice_thirdparty[App.invoice.id_customer].ragione_sociale }}
	</div>
</div>
<hr class="divider-top-module">
<hr class="divider-top-module">
<div class="row">
	<div class="col-md-12">
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover listData">
				<thead>
					<tr>
						{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
							<th class="id">ID</th>								
						{% endif %}
						<th class="text-center">{{ Lang['contenuto']|capitalize }}</th>
						<th class="text-center">{{ Lang['prezzo unitario']|capitalize }}</th>
						<th class="text-center">{{ Lang['quantità']|capitalize }}</th>
						<th class="text-center">{{ Lang['prezzo totale']|capitalize }}</th>	
						<th class="text-center">{{ Lang['iva']|capitalize }}</th>
						<th class="text-center">{{ Lang['imponibile']|capitalize }}</th>
						<th class="text-center">{{ Lang['totale']|capitalize }}</th>								
						<th></th>
					</tr>
				</thead>
				<tbody>				
					{% if App.items is iterable and App.items|length > 0 %}
						{% for key,value in App.items %}
							<tr>
								{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
									<td>{{ value.id }}</td>
								{% endif %}
								<td>{{ value.content }}</td>
								<td class="text-right">{{ value.price_unity_label }}</td>
								<td class="text-center">{{ value.quantity }}</td>
								<td class="text-right">{{ value.price_total_label }}</td>
								<td class="text-center">{{ value.tax }}</td>								
								<td class="text-right">{{ value.price_tax_label }}</td>								
								<td class="text-right">{{ value.total_label }}</td>
								<td class="actions">
									<a class="btn btn-default btn-circle" href="{{ URLSITE}}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}ArtPur/{{ value.id  }}" title="{{ value.active == 1 ? App.lang['disattiva %ITEM%']|replace({'%ITEM%': App.lang['la voce-p']})|capitalize : App.lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize }}"><i class="fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}"> </i></a>			 
									<a class="btn btn-default btn-circle modifyArtPur" data-id="{{ value.id }}" href="javascript:void(0);" title="{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize }}"><i class="fa fa-edit"> </i></a>
									<a class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteArtPur/{{ value.id }}" title="{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la voce-p']})|capitalize }}"><i class="fa fa-cut"> </i></a>
								</td>							
							</tr>	
						{% endfor %}
					{% else %}
						<tr>
							{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
							<td colspan="6">{{ Lang['nessuna voce trovata!']|capitalize }}</td>
						</tr>
					{% endif %}
				</tbody>
				<tfoot>
					<tr>
					{% set colspan = 3 %}
					{% if App.userLoggedData.is_root is defined and App.userLoggedData.is_root is same as(1) %}
						{% set colspan = 4 %}
					{% endif %}
					
					<td class="text-right" colspan="{{ colspan }}">{{ Lang['totali']|capitalize }}</td>
					<td class="text-right"><b>{{ App.tot_price_total_label }}</b></td>
					<td></td>								
					<td class="text-right"><b>{{ App.tot_price_tax_label }}</b></td>								
					<td class="text-right"><b>{{ App.tot_total_label }}</b></td>
					<td></td>
					</tr>							
				
				</tfoot>
			</table>
		</div>
		<!-- /.table-responsive -->							
		
	</div>
	<!-- /.col-md-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
	
		<div class="panel panel-info" id="articlePanelID">
  			<div class="panel-heading" id="articlePanelHeadingID">
    			<h3 class="panel-title" id="articlePanelTitleID">{{ Lang['inserisci articolo']|capitalize }}</h3>
  			</div>
  			<div class="panel-body">
    		
				<form class="form-inline" id="articleFormID" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/insertArtPur" enctype="multipart/form-data" method="POST">
					<div class="row">	
						<div class="col-xs-12">
							
								<textarea required name="content" class="form-control form-content" id="contentID" rows="3">{{ Lang['inserisci testo articolo']|capitalize }}</textarea>						
													
						</div>
					</div>
					
					<div class="row">	
  						<div class="form-group">
    						<label for="price_unityID">{{ Lang['prezzo']|capitalize }}</label>
    						<input required type="text" class="form-control form-amount" name="price_unity" id="price_unityID" value="0.00">
  						</div>
  						<div class="form-group">
    						<label for="quantityID">{{ Lang['q.tà']|capitalize }}</label>
    						<input required type="text" class="form-control form-tax" name="quantity" id="quantityID" value="1">
  						</div>
  						<div class="form-group">
							<label for="price_totalID">{{ Lang['totale']|capitalize }}</label>
							<input readonly="readonly" type="text" class="form-control form-amount" name="price_total" id="price_totalID" value="0.00">	
						</div>
						<div class="form-group">
							<label for="taxID">{{ Lang['tassa']|capitalize }}</label>
							<input required type="text" class="form-control form-tax" name="tax" id="taxID" value="0">
						</div>
						<div class="form-group">
							<label for="totalID">{{ Lang['totale']|capitalize }}</label>
							<input readonly="readonly" type="text" class="form-control form-amount" name="total" id="totalID" value="0.00">
						</div>
					</div>
					<div class="row modalaction">					
						<div class="col-md-12 text-center">							
							<input type="hidden" name="id_article" id="id_articleID" value="">
							<input type="hidden" name="id_invoice" id="id_invoiceID" value="{{ App.id_invoice }}">
							<button type="submit" name="submitForm" id="submitFormID" value="submit" class="btn btn-primary btn-sm">{{ Lang['aggiungi']|capitalize }}</button>
							<button type="reset" name="resetForm" id="resetFormID" value="reset" class="pull-right btn btn-info btn-sm">{{ Lang['resetta']|capitalize }}</button>
						</div>
					</div>
				</form>
  			</div>
		</div>
	</div>
	<!-- /.col-md-12 -->
</div>				
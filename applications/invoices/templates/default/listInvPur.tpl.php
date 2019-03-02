<!-- invoices/listInvPur.tpl.php v.1.0.0. 12/04/2018 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newInvPur" title="{{ Lang['inserisci nuova voce-p']|capitalize }}" class="btn btn-primary">{{ Lang['nuova voce-p']|capitalize }}</a>
	</div>
	<div class="col-md-7 help-small-list">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<div class="row">
	<div class="col-md-12">
		<table id="listDataID" class="table table-striped table-bordered table-hover listData">
			<thead>
				<tr>
					<th>ID</th>
					<th>{{ Lang['data']|capitalize }}</th>
					<th>{{ Lang['scadenza']|capitalize }}</th>
					<th>{{ Lang['cliente']|capitalize }}</th>
					<th>{{ Lang['numero']|capitalize }}</th>
					<th>{{ Lang['totale']|capitalize }}</th>
					<th>{{ Lang['articoli abbreviato']|capitalize }}</th>
					<th></th>					
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
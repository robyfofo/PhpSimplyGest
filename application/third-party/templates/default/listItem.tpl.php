<!-- third-party/listItem.tpl.php v.1.0.0. 19/02/2018 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newItem" title="{{ Lang['inserisci nuova voce']|capitalize }}" class="btn btn-primary">{{ Lang['nuova voce']|capitalize }}</a>
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
					{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
						<th>ID</th>
					{% endif %}	
					<th>{{ Lang['categoria']|capitalize }}</th>
					<th>{{ Lang['tipo']|capitalize }}</th>
					<th>{{ Lang['ragione sociale']|capitalize }}</th>
					<th>{{ Lang['email']|capitalize }}</th>
					<th></th>					
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>

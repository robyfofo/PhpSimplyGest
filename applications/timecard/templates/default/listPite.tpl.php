<!-- admin/timecard/listPite.tpl.php v.1.0.0. 06/06/2018 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newPite" title="{{ Lang['inserisci nuova voce']|capitalize }}" class="btn btn-primary">{{ Lang['nuova voce']|capitalize }}</a>
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
					<th>{{ Lang['titolo']|capitalize }}</th>
					<th>{{ Lang['contenuto']|capitalize }}</th>
					<th>{{ Lang['ora inizio']|capitalize }}</th>
					<th>{{ Lang['ora fine']|capitalize }}</th>
					<th>{{ Lang['ore lavoro']|capitalize }}</th>
					<th></th>			
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- admin/timecard/listPite.tpl.php v.1.0.0. 02/03/2018 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newPite" title="{{ App.lang['inserisci nuova voce']|capitalize }}" class="btn btn-primary">{{ App.lang['nuova voce']|capitalize }}</a>
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
					<th>{{ App.lang['titolo']|capitalize }}</th>
					<th>{{ App.lang['contenuto']|capitalize }}</th>
					<th>{{ App.lang['ora inizio']|capitalize }}</th>
					<th>{{ App.lang['ora fine']|capitalize }}</th>
					<th>{{ App.lang['ore lavoro']|capitalize }}</th>
					<th></th>			
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
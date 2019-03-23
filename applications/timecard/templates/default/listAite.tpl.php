<!-- timecard/listAite.tpl.php v.1.0.0. 02/03/2019 -->
<div class="row">
	<div class="col-md-3 new">
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
					<th>ID {{ Lang['utente']|capitalize }}</th>
					<th>{{ Lang['progetto']|capitalize }}</th>
					<th>{{ Lang['contenuto']|capitalize }}</th>
					<th>{{ Lang['data']|capitalize }}</th>
					<th>{{ Lang['ora inizio']|capitalize }}</th>
					<th>{{ Lang['ora fine']|capitalize }}</th>
					<th>{{ Lang['ore lavoro']|capitalize }}</th>
					<th class="text-right">
						<a class="export" href="#" title="{{ Lang['esporta in xls']|capitalize }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
					</th>		
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
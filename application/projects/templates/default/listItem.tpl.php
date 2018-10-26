<!-- projects/listItem.tpl.php v.1.0.0. 28/02/2017 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newItem" title="{{ App.lang['inserisci nuova voce']|capitalize }}" class="btn btn-primary">{{ App.lang['nuova voce']|capitalize }}</a>
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
					<th>{{ App.lang['status']|capitalize }}</th>
					<th>{{ App.lang['completato - abb']|capitalize }}</th>
					<th>{{ App.lang['tempo']|capitalize }}</th>
					<th>{{ App.lang['opzioni']|capitalize }}</th>
					<th></th>			
				</tr>
			</thead>
			<tbody>				
				
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ App.lang['tempo lavorato al progetto']|capitalize }}</h4>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ App.lang['chiudi']|capitalize }}</button>
      </div>
    </div>
  </div>
</div>
<!-- customers/listScat.tpl.php v.1.0.0. 22/11/2017 -->
<div class="row">
	<div class="col-md-3 new">
		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newScat" title="{{ Lang['inserisci nuova categoria']|capitalize }}" class="btn btn-primary">{{ Lang['nuova categoria']|capitalize }}</a>
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
		<div class="table-responsive">									
			<table class="table table-striped table-bordered table-hover listData tree">
				<thead>
					<tr>
						<th></th>
						{% if App.userLoggedData.is_root == 1 %}
							<th><small>ID</small></th>						
						{% endif %}
						<th>{{ Lang['titolo']|capitalize }}</th>
						<th>{{ Lang['clienti']|capitalize }}</th>									
						<th></th>						
					</tr>
				</thead>
				<tbody>
					{% if App.items is iterable and App.items|length > 0 %}
						{% for key,value in App.items %}
							<tr class="treegrid-{{ value.id }}{% if value.parent > 0 %} treegrid-parent-{{ value.parent }}{% endif %}">
								<td class="tree-simbol"></td>								
								{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
									<td class="id">{{ value.id }}-{{ value.parent }}</td>
								{% endif %}								
								<td class="page-title" style="white-space: nowrap;">{{ value.levelString }}{{ value.title }}</td>
								<td>
									<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/listItem/{{ value.id }}" title="{{ Lang['clienti associati']|capitalize }}"><i class="fa fa-users"> </i></a>({{ value.items }})			 
								</td>																							
								<td class="actions">
									<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Scat/{{ value.id  }}" title="{{ value.active == 1 ? Lang['disattiva %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize : Lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}"><i class="fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}"> </i></a>			 
									<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/modifyScat/{{ value.id }}" title="{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}"><i class="fa fa-edit"> </i></a>
									<a class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteScat/{{ value.id }}" title="{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la categoria']})|capitalize }}"><i class="fa fa-cut"> </i></a>
								</td>
     						</tr> 
						{% endfor %}
					{% else %}
						<tr>
							<td></td>
							{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
							<td colspan="3">{{ Lang['nessuna voce trovata!']|capitalize }}</td>
						</tr>
					{% endif %}
				</tbody>       
			</table>				
		</div>
		<!-- /.table-responsive -->
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- /.row -->
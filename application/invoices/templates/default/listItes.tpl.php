<!-- invoices/listItes.tpl.php v.1.0.0. 07/02/2018 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="{{ URLSITE }}{{ CoreRequest.action }}/newItes" title="{{ Lang['inserisci nuova voce']|capitalize }}" class="btn btn-primary">{{ Lang['nuova voce']|capitalize }}</a>
	</div>
	<div class="col-md-7 help-small-list">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<form role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/listItes" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">			
			<div class="form-inline" role="grid">								
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>
								<select class="form-control input-sm" name="itemsforpage" onchange="this.form.submit();" >
									<option value="5"{% if App.itemsForPage == 5 %} selected="selected"{% endif %}>5</option>
									<option value="10"{% if App.itemsForPage == 10 %} selected="selected"{% endif %}>10</option>
									<option value="25"{% if App.itemsForPage == 25 %} selected="selected"{% endif %}>25</option>
									<option value="50"{% if App.itemsForPage == 50 %} selected="selected"{% endif %}>50</option>
									<option value="100"{% if App.itemsForPage == 100 %} selected="selected"{% endif %}>100</option>
								</select>
								{{ Lang['voci per pagina']|capitalize }}
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group pull-right">
							<label>
								{{ Lang['cerca']|capitalize }}:
								<input name="searchFromTable" value="{{ MySessionVars[App.sessionName]['srcTab'] }}" class="form-control input-sm" type="search" onchange="this.form.submit();">
							</label>
						</div>
					</div>
				</div>				
				<div class="table-responsive">				
					<table class="table table-striped table-bordered table-hover listData">
						<thead>
							<tr>
								{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
									<th class="id">ID</th>								
								{% endif %}
								<th>{{ Lang['data']|capitalize }}</th>
								<th>{{ Lang['data scadenza']|capitalize }}</th>
								<th>{{ Lang['cliente']|capitalize }}</th>
								<th>{{ Lang['numero']|capitalize }}</th>	
								<th>{{ Lang['note']|capitalize }}</th>
								<th>{{ Lang['totale']|capitalize }}</th>
								<th></th>									
								<th></th>
							</tr>
						</thead>
						<tbody>				
							{% if App.items is iterable and App.items|length > 0 %}
								{% for key,value in App.items %}
									<tr>
										{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
											<td class="id">{{ value.id }}</td>
										{% endif %}	
										<td>{{ value.dateinslocal }}</td>
										<td>{{ value.datescalocal }}</td>	
										<td>{{ value.customer }}</td>							
										<td>{{ value.number }}</td>
										<td>{{ value.note }}</td>
										<td>{{ value.totalLabel }}</td>
										<td class="actions">
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/invoicespdf/{{ value.id  }}" title="{{ Lang['stampa']|capitalize }} {{ Lang['la voce-p'] }}" target="_blank"><i class="fa fa-print"> </i></a>			 
										</td>																																
										<td class="actions">
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Ites/{{ value.id  }}" title="{{ value.active == 1 ? Lang['disattiva %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize : Lang['attiva %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}"><i class="fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}"> </i></a>			 
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/modifyItes/{{ value.id }}" title="{{ Lang['modifica %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}"><i class="fa fa-edit"> </i></a>
											<a class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteItes/{{ value.id }}" title="{{ Lang['cancella %ITEM%']|replace({'%ITEM%': Lang['la voce']})|capitalize }}"><i class="fa fa-cut"> </i></a>
										</td>							
									</tr>	
								{% endfor %}
							{% else %}
								<tr>
									{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
									<td colspan="7">{{ Lang['nessuna voce trovata!']|capitalize }}</td>
								</tr>
							{% endif %}
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->					
				{% if App.pagination.itemsTotal > 0 %}
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_info" id="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">
							{{ Lang['mostra da %START% a %END% di %ITEM% elementi']|replace({'%START%': App.pagination.firstPartItes, '%END%': App.pagination.lastPartItes,'%ITEM%': App.pagination.itemsTotal})|capitalize }}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="dataTables_paginate paging_simple_numbers" id="dataTables_paginate">
							<ul class="pagination">
								<li class="paginate_button previous<?php if ($this->App->pagination->page == 1) echo ' disabled'; ?>">
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItes/{{ App.pagination.itemPrevious }}">{{ Lang['precedente']|capitalize }}</a>
								</li>								
								{% if App.pagination.pagePrevious is iterable %}
									{%  for key,value in App.pagination.pagePrevious %}
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItes/{{ value }}">{{ value }}</a></li>
									{% endfor %}
								{% endif %}									
								<li class="active"><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItes/{{ App.pagination.page }}">{{ App.pagination.page }}</a></li>									
								{% if App.pagination.pageNext is iterable %}
									{%  for key,value in App.pagination.pageNext %}
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItes/{{ value }}">{{ value }}</a></li>
									{% endfor %}
								{% endif %}								
								<li class="paginate_button next{% if App.pagination.page >= App.pagination.totalpage %} disabled{% endif %}">
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItes/{{ App.pagination.itemNext }}">{{ Lang['prossima']|capitalize }}</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				{% endif %}
			</div>	
			<!-- /.form-inline wrapper -->
		</div>
		<!-- /.col-md-12 -->
	</div>
</form>
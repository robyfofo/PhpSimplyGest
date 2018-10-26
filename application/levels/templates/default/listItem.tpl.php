<!-- admin/site-levels/list.tpl.php v.1.0.0. 28/02/2017 -->
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
<form role="form" action="{{ URLSITE }}{{ CoreRequest.action }}" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">			
			<div class="form-inline" role="grid">								
				<div class="row">
					<div class="col-md-6">							
						<div class="form-group">
							<label>
								<select class="form-control input-md" name="itemsforpage" onchange="this.form.submit();" >
									<option value="5"{% if App.itemsForPage == 5 %} selected="selected"{% endif %}>5</option>
									<option value="10"{% if App.itemsForPage == 10 %} selected="selected"{% endif %}>10</option>
									<option value="25"{% if App.itemsForPage == 25 %} selected="selected"{% endif %}>25</option>
									<option value="50"{% if App.itemsForPage == 50 %} selected="selected"{% endif %}>50</option>
									<option value="100"{% if App.itemsForPage == 100 %} selected="selected"{% endif %}>100</option>
								</select>
								{{ App.lang['voci per pagina']|capitalize }}
							</label>
						</div>			
					</div>
					<div class="col-md-6">
						<div class="form-group pull-right">
							<label>
								{{ App.lang['cerca']|capitalize }}:
								<input name="searchFromTable" value="{{ MySessionVars[App.sessionName]['srcTab'] }}" class="form-control input-md" type="search" onchange="this.form.submit();">
							</label>
						</div>
					</div>
				</div>
				<div class="table-responsive">				
					<table class="table table-striped table-bordered table-hover listData">
						<thead>
							<tr>
								{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
									<th>ID</th>								
								{% endif %}
								<th>{{ App.lang['titolo']|capitalize }}</th>
								<th>{{ App.lang['moduli attivi']|capitalize }}</th>												
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
										<td>{{ value.title_it }}</td>									
										<td>{{ value.modules }}</td>																								
										<td class="actions">
											
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/{{ value.active == 1 ? 'disactive' : 'active' }}Item/{{ value.id  }}" title="{{ value.active == 1 ? App.lang['disattiva %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize : App.lang['attiva %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}"><i class="fa fa-{{ value.active == 1 ? 'unlock' : 'lock' }}"> </i></a>			 
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/modifyItem/{{ value.id }}" title="{{ App.lang['modifica %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}"><i class="fa fa-edit"> </i></a>
											<a class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteItem/{{ value.id }}" title="{{ App.lang['cancella %ITEM%']|replace({'%ITEM%': App.lang['la voce']})|capitalize }}"><i class="fa fa-cut"> </i></a>

										</td>							
									</tr>	
								{% endfor %}
							{% else %}
								<tr>
									{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{% endif %}
									<td colspan="3">{{ App.lang['nessuna voce trovata!']|capitalize }}</td>
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
							{{ App.lang['mostra da %START% a %END% di %ITEM% elementi']|replace({'%START%': App.pagination.firstPartItem, '%END%': App.pagination.lastPartItem,'%ITEM%': App.pagination.itemsTotal})|capitalize }}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="dataTables_paginate paging_simple_numbers" id="dataTables_paginate">
							<ul class="pagination">
								<li class="paginate_button previous<?php if ($this->App->pagination->page == 1) echo ' disabled'; ?>">
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemPrevious }}">{{ App.lang['precedente']|capitalize }}</a>
								</li>								
								{% if App.pagination.pagePrevious is iterable %}
									{%  for key,value in App.pagination.pagePrevious %}
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}">{{ value }}</a></li>
									{% endfor %}
								{% endif %}									
								<li class="active"><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.page }}">{{ App.pagination.page }}</a></li>									
								{% if App.pagination.pageNext is iterable %}
									{%  for key,value in App.pagination.pageNext %}
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ value }}">{{ value }}</a></li>
									{% endfor %}
								{% endif %}								
								<li class="paginate_button next{% if App.pagination.page >= App.pagination.totalpage %} disabled{% endif %}">
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/pageItem/{{ App.pagination.itemNext }}">{{ App.lang['prossima']|capitalize }}</a>
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
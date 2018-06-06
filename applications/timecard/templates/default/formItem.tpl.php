<!-- admin/timecard/formItem.tpl.php v.1.0.1. 06/06/2018 -->

<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2 help">
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-xs-12" style="padding-bottom:30px;">
		<form id="applicationForm" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/modappData"  enctype="multipart/form-data" method="post">	
			<div class="form-group has-feedback">
				<div class="col-md-4">
					<input type="text" name="appdata" id="appdataDPID" class="form-control" placeholder="{{ Lang['inserisci una data globale']|capitalize }}" value="">
					<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">{{ Lang['invia']|capitalize }}</button>
				</div>
			</div>	
		</form>
		<form id="applicationForm1" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/modappProj"  enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="col-md-8">		
					<select name="id_project" id="id_projectID" class="selectpicker form-control" data-live-search="true" title="{{ Lang['seleziona un progetto']|capitalize }}">
						<option value="0"{% if MySessionVars[App.sessionName]['id_project'] == 0 %} selected="selected"{% endif %}>{{ Lang['tutti']|capitalize }}</option>
						{% if App.allprogetti is iterable %}
							{% for value in App.allprogetti %}		
								<option value="{{ value.id }}"{% if value.id == MySessionVars[App.sessionName]['id_project'] %} selected="selected" {% endif %}>{{ value.title }}</option>														
							{% endfor %}
						{% endif %}		
					</select>										
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">{{ Lang['invia']|capitalize }}</button>
				</div>
			</div>
		</form>
		<hr>
		<div class="timecards" id="accordion">
		{% if App.dates_month is iterable %}
			{% for key,day in App.dates_month %}

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="changedata" href="{{ URLSITE }}{{ CoreRequest.action }}/setappData/{{ day['value'] }}" title="{{ Lang['vai a questa data']|capitalize }}"><span class="glyphicon glyphicon-calendar"></span></a>
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ loop.index }}">
							{{ day['label'] }}&nbsp;-&nbsp;{{ day['nameday']|capitalize }}{% if day['value'] == MySessionVars['app']['data-timecard'] %}&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-circle"></span>{% endif %}
							</a>
 						
 						{% if App.timecards_total[day['value']] > 0  %}<span class="pull-right">{{ App.timecards_total[day['value']]|slice(0, 5) }}</span>{% endif %}
 						</h4>
					</div>
					<div id="collapse{{ loop.index }}" class="panel-collapse collapse{% if day['value'] == MySessionVars['app']['data-timecard'] %} in{% else %} out{% endif %}">
						<div class="panel-body{% if day['value'] == MySessionVars['app']['data-timecard'] %} current{% endif %}">
							{% if App.timecards[day['value']]['timecards'] is iterable and App.timecards[day['value']]['timecards']|length > 0  %}
								<table class="table table-condensed table-bordered subtimecards tooltip-proj">
									<tbody>
										{% for day in App.timecards[day['value']]['timecards'] %}
											<tr>																						
												<td data-toggle="tooltip" data-placement="top" title="{{ day.project }}">{{ day.project }}</td>
												<td data-toggle="tooltip" data-placement="top" title="{{ day.content }}">{{ day.content }}</td>
												{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}	
													<td style="width:55px;">IOw: {{ day.id_owner }}</td>
												{% endif %}
												<td class="hours">{{ day.starttime|slice(0, 5) }}-{{ day.endtime|slice(0, 5) }}</td>
												<td class="tothours text-right">
													<a class="" href="{{ URLSITE }}{{ CoreRequest.action }}/modifyTime/{{ day.id }}" title="{{ Lang['modifica']|capitalize }}">{{ day.worktime|slice(0, 5) }}</a>
												</td>
											</tr>
										{% endfor %}										
										<tr class="">
											{% set colspan = "3" %}	
											{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}{% set colspan = "4" %}{% endif %}												
											<td colspan="{{ colspan }}">&nbsp;</td>
											<td class="hours text-right success">{{ App.timecards_total[day['value']]|slice(0, 5) }}</td>
										</tr>
									</tbody>
								</table>
							{% endif %}
 						</div>
					</div>
				</div>					
					
			{% endfor %}		
		{% endif %}
			<div class="ore-totali">
				<div class="pull-right">{{ Lang['tempo totale']|capitalize }}:&nbsp;<span class="value">{{ App.timecards_total_time|slice(0, 5) }}</span></div>
			</div>
		</div>
		
	</div>
	
	<div class="col-md-6 col-xs-12">
		<form id="applicationForm2" method="post" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
				<div class="form-group has-feedback">
					<label for="dataID" class="col-md-3 control-label">{{ Lang['data']|capitalize }}</label>
					<div class="col-md-4">
						<input type="text" name="data" id="dataDPID" class="form-control" placeholder="{{ Lang['inserisci una data']|capitalize }}" value="">
						<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="progettoID" class="col-md-3 control-label">{{ Lang['progetto']|capitalize }}</label>
					<div class="col-md-8">
						<select name="progetto" class="selectpicker form-control" data-live-search="true" title="{{ Lang['seleziona un progetto']|capitalize }}">
							{% if App.progetti is iterable %}
								{% for value in App.progetti %}
									<option value="{{ value.id }}"{% if (App.item.id_project is defined) and (App.item.id_project == value.id)  %} selected="selected" {% endif %}>{{ value.title }}</option>														
								{% endfor %}
							{% endif %}		form-horizontal form-daydata bg-info
						</select>										
			    	</div>
				</div>				
				<div class="form-group has-feedback">
					<label for="startTimeID" class="col-md-3 control-label">{{ Lang['inizio']|capitalize }}</label>
					<div class="col-md-4">
						<input type="text" name="startTime" id="startTimeID" class="form-control" placeholder="{{ Lang['inserisci ora inizio']|capitalize }}" value="">	
						<span class="glyphicon glyphicon-time form-control-feedback"></span>
			    	</div>
				</div>
				<div class="form-group has-feedback">
					<label for="endTimeID" class="col-md-3 control-label">{{ Lang['fine']|capitalize }}</label>
					<div class="col-md-4">
						<input type="text" name="endTime" id="endTimeID" class="form-control" placeholder="{{ Lang['inserisci ora fine']|capitalize }}"value="">	
						<span class="glyphicon glyphicon-time form-control-feedback"></span>
			    	</div>
				</div>		
				<div class="form-group">
					<label for="contentID" class="col-md-3 control-label">{{ Lang['contenuto']|capitalize }}</label>
					<div class="col-md-8">
						<textarea name="content" class="form-control" id="contentID" rows="5">{{ App.item.content }}</textarea>
					</div>
				</div>	
			<div class="form-group">
				{% if (App.methodForm == 'updateTime' and App.item.id is defined and App.item.id > 0) %}
					<div class="col-md-6 text-center">
						<input type="hidden" name="id" value="{{ App.item.id }}">					
						<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['modifica']|capitalize }}</button>
					</div>
					<div class="col-md-6 text-right">
						<button class="btn btn-danger timedelconfirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteTime/{{ App.item.id }}" title="{{ Lang['cancella']|capitalize }}">{{ Lang['cancella']|capitalize }}</a>
					</div>
				{% else %}
				<div class="col-md-12 text-center">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
				</div>
				{% endif %}					
			</div>
		</form>

		<hr class="divider-top-module">
		
		<div class="row">
			<div class="col-md-8"><big><strong>{{ Lang['inserisci una timecard predefinita']|capitalize }}</strong></big>
			</div>
			<div class="col-md-4">
		 		<a class="btn btn-primary" href="{{ URLSITE }}{{ CoreRequest.action }}/listPite" title="{{ Lang['gestisci le timecard predefinite']|capitalize }}">{{ Lang['gestisci']|capitalize }}</a>
			</div>
		</div>
		
		<hr class="divider-top-module">

		<form id="applicationForm4" method="post" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm1 }}"  enctype="multipart/form-data" method="post">
				<div class="form-group has-feedback">
					<label for="dataID" class="col-md-3 control-label">{{ Lang['data']|capitalize }}</label>
					<div class="col-md-4">	
						<input type="text" name="data1" id="data1DPID" class="form-control" placeholder="{{ Lang['inserisci una data']|capitalize }}" value="">
						<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="project1ID" class="col-md-3 control-label">{{ Lang['progetto']|capitalize }}</label>
					<div class="col-md-8">
						<select name="project1" class="selectpicker form-control" data-live-search="true" title="{{ Lang['seleziona un progetto']|capitalize }}">
							{% if App.progetti is iterable %}
								{% for value in App.progetti %}	
									<option value="{{ value.id }}"{% if App.currentProject.id == value.id %} selected="selected" {% endif %}>{{ value.title }}</option>														
								{% endfor %}
							{% endif %}		
						</select>
			    	</div>
				</div>
				<div class="form-group has-feedback">
					<label for="starttime1ID" class="col-md-3 control-label">{{ Lang['inizio']|capitalize }}</label>
					<div class="col-md-4">
						<input type="text" name="starttime1" id="starttime1ID" class="form-control" placeholder="{{ Lang['inserisci ora inizio']|capitalize }} "value="">	
						<span class="glyphicon glyphicon-time form-control-feedback"></span>				
			    	</div>
				</div>
		  		<div class="form-group">
					<label for="activeID" class="col-md-3 control-label">{{ Lang['usa questo inizio']|capitalize }}</label>
					<div class="col-md-7">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="usedata" id="usedataID" value="1">
							</label>
  						</div>
					</div>
 				</div>
				<div class="form-group">
					<label for="timecardID" class="col-md-3 control-label">{{ Lang['timecard']|capitalize }}</label>
					<div class="col-md-8">
						<select name="timecard" id="timecardID" class="selectpicker form-control" data-live-search="true" title="{{ Lang['seleziona una timecard']|capitalize }}">
							{% if App.allpreftimecard is iterable %}
								{% for value in App.allpreftimecard %}	
									<option value="{{ value.id }}">{{ value.title }} ({{ value.worktime }} {{ Lang['hours'] }})</option>														
								{% endfor %}
							{% endif %}		
						</select>										
			    	</div>
				</div>
			<div class="form-group text-center">
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>			
			</div>
		</form>
	</div>
</div>
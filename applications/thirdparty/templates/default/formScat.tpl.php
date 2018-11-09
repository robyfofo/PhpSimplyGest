<!-- thirdparty/formScat.tpl.php v.1.0.0. 05/07/2018 -->
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
	<div class="col-md-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|title }} <i class="fa"></i></a></li>
		</ul>
		<!--/Nav tabs -->	
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset>
						<div class="form-group">
							<label for="title_{{ lang }}ID" class="col-md-2 control-label">{{ Lang['titolo']|capitalize }} {{ lang }}</label>
							<div class="col-md-7">
								<input required="required" type="text" class="form-control" name="title" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['titolo']})|capitalize }}" id="titleID" value="{{ App.item.title|e('html') }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['titolo']}) }}')" oninput="setCustomValidity('')">
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="parentID" class="col-md-2 control-label">{{ Lang['genitore']|capitalize }}</label>
							<div class="col-md-7">							
								<select name="parent" id="parentID" class="form-control">
									<option value="0"></option>
									{% if App.parents is iterable %}
										{% for key,value in App.parents %}
											<option value="{{ value.id }}"{% if App.item.parent == value.id %} selected="selected"{% endif %}>{{ value.levelString }}{{ value.title|e('html') }}</option>														
										{% endfor %}
									{% endif %}
								</select>									
					    	</div>
						</div>
						<hr>
				  		<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">{{ Lang['attiva']|capitalize }}</label>
							<div class="col-md-7">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="active" id="activeID"{% if App.item.active == 1 %} checked="checked"{% endif %} value="1">
									</label>
        						</div>
      					</div>
    					</div>
    				</fieldset>
				</div>
<!--/sezione opzioni -->
			</div>
			<!--/Tab panes -->			
			<hr>			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7 actionsform">
			    	<input type="hidden" name="bk_parent" value="{{ App.item.parent }}">		      
			      <input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary submittheform">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
	 			<div class="col-md-3 actionsform">
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listScat" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
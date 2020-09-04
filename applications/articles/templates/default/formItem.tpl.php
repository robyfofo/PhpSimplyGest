<!-- articles/formItem.tpl.php v.1.0.0. 03/08/2018 -->
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
		<ul class="nav nav-tabs">		
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|title }} <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">{{ Lang['opzioni']|capitalize }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group form-inline">
							<label for="contentID" class="col-md-2 control-label">{{ Lang['contenuto']|capitalize }}</label>
							<div class="col-md-8">
								<textarea name="content" class="form-control" id="contentID" rows="3">{{ App.item.content }}</textarea>
							</div>
						</div>			
						<div class="form-group form-inline">
							<label for="price_unityID" class="col-md-2 control-label">{{ Lang['costo orario']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" class="form-control" name="price_unity" id="price_unityID" value="{{ App.item.price_unity|e('html') }}" placeholder="{{ Lang['inserisci un %ITEM%']|replace({'%ITEM%': Lang['prezzo unità']})|capitalize }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['prezzo unità']}) }}')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group form-inline">
							<label for="taxID" class="col-md-2 control-label">{{ Lang['tassa']|capitalize }}</label>
							<div class="col-md-7">
								<input required="required" type="text" class="form-control" name="tax" id="taxID" value="{{ App.item.tax|e('html') }}" placeholder="{{ Lang['inserisci una %ITEM%']|replace({'%ITEM%': Lang['tassa']})|capitalize }}" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['tassa']}) }}')" oninput="setCustomValidity('')">
							</div>
						</div>
						
						<div class="form-group">
							<label for="typeID" class="col-md-2 control-label">{{ Lang['tipo']|capitalize }}</label>
							<div class="col-md-7">
								<select name="type" id="typeID" class="form-control" title="{{ Lang['seleziona un %ITEM%']|replace({'%ITEM%': Lang['tipo']})|capitalize }}">
									{% if GlobalSettings['article type'] is iterable %}
										{% for key,value in GlobalSettings['article type'] %}	
											<option value="{{ key }}"{% if key == App.item.type %} selected="selected"{% endif %}>{{ (Lang['article type'][key] is defined and Lang['article type'][key] != '') ? Lang['article type'][key]|capitalize|e('html') : value|capitalize|e('html') }}</option>														
										{% endfor %}
									{% endif %}		
								</select>		
					    	</div>
						</div>

					</fieldset>				
				</div>
				
<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>  		
				  		<div class="form-group form-inline">
							<label for="activeID" class="col-md-2">{{ Lang['attiva']|capitalize }}</label>
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
<!-- sezione opzioni -->
			</div>
<!--/Tab panes -->	
			<hr>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7 actionsform">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary submittheform">{{ Lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary submittheform">{{ Lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-3 actionsform">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItem" title="{{ Lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ Lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>
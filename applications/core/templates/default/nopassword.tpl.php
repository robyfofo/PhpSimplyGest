<!-- core/nopasssword.tpl.php v.1.0.0. 08/08/2018 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ Lang['nopassword core - intro'] }}</h3>
			</div>
			<div class="panel-body">
				<form id="applicationForm" class="form-signin" role="form" action="{{ URLSITE }}nopassword" method="post" autocomplete="off">
					<fieldset>
						<div class="form-group">
							<input required="required" class="form-control" placeholder="{{ Lang['nome utente']|capitalize }}" name="username" type="text" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['nome utente']}) }}')" oninput="setCustomValidity('')">
						</div>							
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="{{ Lang['invia']|capitalize }} {{ Lang['email']}}" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
					<p>{{ Lang['nopassword core - testo']|raw }}</p>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<p>{{ Lang['torna alla pagina']|capitalize }} <a href="{{ URLSITE }}" title="{{ Lang['torna alla pagina %ITEM%']|replace({'%ITEM%': 'login'})|capitalize }}">{{ Lang['loggati']|capitalize }}</a></p>
			</div>			
		</div>
	</div>
</div>
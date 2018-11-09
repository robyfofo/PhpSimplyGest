<!-- core/login.tpl.php v.1.0.0. 04/07/2018 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ Lang['inserisci username e password']|capitalize }}</h3>
			</div>
			<div class="panel-body">
				<form id="no-applicationForm" class="form-signin" role="form" action="{{ URLSITE }}login" method="post" autocomplete="off">
					<fieldset>
						<div class="form-group">
							<input required="required" class="form-control" placeholder="{{ Lang['username']|capitalize }}" name="username" type="text" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire un %ITEM%!']|replace({'%ITEM%': Lang['nome utente']}) }}')" oninput="setCustomValidity('')">
						</div>
						<div class="form-group">
							<input required="required" class="form-control" placeholder="{{ Lang['password']|capitalize }}" name="password" type="password" value="" oninvalid="this.setCustomValidity('{{ Lang['Devi inserire una %ITEM%!']|replace({'%ITEM%': Lang['password']}) }}')" oninput="setCustomValidity('')">
						</div>						
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="{{ Lang['loggati']|capitalize }}" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
				<p>Attenzione! Versione in continuo sviluppo.<br>Per accedere: utente: <b>user</b>; password: <b>user</b></p>
				<p>
					<a href="{{ URLSITE }}nousername" title="{{ Lang['clicca per recuperare lo username']|capitalize }}">{{ Lang['username']|capitalize }}</a> o <a href="{{ URLSITE }}nopassword" title="{{ Lang['clicca per recuperare la password']|capitalize }}">{{ Lang['password']|capitalize }}</a> {{ Lang['dimenticati'] }}
				</p>
			</div>
		</div>
	</div>
</div>

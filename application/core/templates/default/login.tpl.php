<!-- admin/site-core/login.tpl.php v.1.0.0. 14/02/2017 -->
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
							<input required class="form-control" placeholder="Username" name="username" type="text" autocomplete="off">
						</div>
						<div class="form-group">
							<input required class="form-control" placeholder="Password" name="password" type="password" value="" autocomplete="off">
						</div>						
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="{{ Lang['loggati']|capitalize }}" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
			<p>Attenzione! Versione in continuo sviluppo.<br>
Per accedere: utente: <b>user</b>; password: <b>user</b></p>
			</div>
		</div>
	</div>
</div>
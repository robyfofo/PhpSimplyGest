<!-- site-core/password.tpl.php v.1.0.0. 17/10/2017 -->

<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ Lang['dati base']|capitalize }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}password/NULL"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione dati base --> 	
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset class="form-group">
						<div class="form-group">
							<label for="nameID" class="col-md-3 control-label">{{ Lang['username']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="username" class="form-control" id="usernameID" placeholder="{{ Lang['inserisci un username']|capitalize }}" value="{{ App.item.username }}" readonly>
					    	</div>
						</div>
						<hr>		
						<div class="form-group">
							<label for="passwordID" class="col-md-3 control-label">{{ Lang['password']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="password" required name="password" class="form-control" id="passwordID" placeholder="{{ Lang['inserisci una password']|capitalize }}"  value="">
					    	</div>
						</div>				
						<div class="form-group">
							<label for="passwordCKID" class="col-md-3 control-label">{{ Lang['password di controllo']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="password" required name="passwordCK" class="form-control" id="passwordCKID" placeholder="{{ Lang['inserisci una password di controllo']|capitalize }}"  value="">
					    	</div>
						</div>
					</fieldset>
				</div>
<!-- sezione dati base -->					
			</div>
<!--/Tab panes -->			
		  <div class="form-group">
		    <div class="col-md-offset-3 col-md-9">
		    	<input type="hidden" name="id" value="{{ App.id }}">
		    	<input type="hidden" name="method" value="update">
		      <button type="submit" class="btn btn-primary">{{ Lang['invia']|capitalize }}</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
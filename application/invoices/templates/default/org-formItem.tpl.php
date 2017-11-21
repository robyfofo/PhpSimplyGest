<!-- invoices/formItem.tpl.php v.1.0.0. 02/11/2017 -->
      	<form id="movimentoFormID" class="form-horizontal" role="form" action="<?php echo $App->formAction; ?>"  enctype="multipart/form-data" method="post">
				<div class="row">
					<fieldset class="form-group">
						<div class="form-group">
							<label for="content_movID" class="col-md-2 control-label"><?php echo ucfirst($_lang['contenuto']); ?></label>
							<div class="col-md-8">
								<textarea required name="content_mov" class="form-control" id="content_movID" rows="5"><?php if (isset($App->item->content)) echo SanitizeStrings::cleanForFormInput($App->item->content); ?></textarea>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="quantity_movID" class="col-md-2 control-label"><?php echo ucfirst($_lang['quantità']); ?></label>
							<div class="col-md-8">
								<input required  type="text" name="quantity_mov" id="quantity_movID" value="<?php if (isset($App->item->quantity)) echo SanitizeStrings::cleanForFormInput($App->item->quantity); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="price_unity_movID" class="col-md-2 control-label"><?php echo ucfirst($_lang['prezzo unitario']); ?></label>
							<div class="col-md-8">
								<input required  type="text" name="price_unity_mov" id="price_unity_movID" value="<?php if (isset($App->item->price_unity)) echo SanitizeStrings::cleanForFormInput($App->item->price_unity); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="tax_movID" class="col-md-2 control-label"><?php echo ucfirst($_lang['tassa']); ?></label>
							<div class="col-md-8">
								<input required  type="text" name="tax_mov" id="tax_movID" value="<?php if (isset($App->item->tax)) echo SanitizeStrings::cleanForFormInput($App->item->tax); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="price_total_movID" class="col-md-2 control-label"><?php echo ucfirst($_lang['prezzo totale']); ?></label>
							<div class="col-md-8">
								<input required  type="text" name="price_total_mov" id="price_total_movID" value="<?php if (isset($App->item->price_total)) echo SanitizeStrings::cleanForFormInput($App->item->price_total); ?>">
							</div>
						</div>
						<input type="hidden" name="price_tax_mov" id="price_tax_movID" value="<?php if (isset($App->item->price_tax)) echo SanitizeStrings::cleanForFormInput($App->item->price_tax); ?>">											
					</fieldset>	
					<hr>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-7">
							<input type="hidden" name="id_mov" id="id_modID" value="<?php echo $App->item->id; ?>">
							<input type="hidden" name="id_invoice" id="id_invoiceID" value="<?php echo $App->item->id_invoice; ?>">
							<button type="submit" name="submitForm" value="submit" class="btn btn-primary"><?php echo ucfirst($_lang['invia']); ?></button>
						</div>
						<div class="col-md-2">
							<?php if ($App->item->id > 0): ?>
							<button type="button" id="deleteMovID" href="#" title="<?php echo ucfirst($_lang['cancella']); ?>" class="btn btn-danger"><?php echo ucfirst($_lang['cancella']); ?></button>
							<?php endif; ?>
						</div>
					</div>
				</div>	
       	</form>
      </div>
    </div>
  </div>
</div>
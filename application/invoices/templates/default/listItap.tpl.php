<!-- invoices/listItap.tpl.php v.1.0.0. 31/01/2018 -->	
<?php if (is_array($App->items) && count($App->items) > 0): ?>
	<?php foreach ($App->items AS $key=>$value): ?>	
		<tr>
			<?php if (isset($App->userLoggedData->is_root) && $App->userLoggedData->is_root === 1): ?>	
				<td class="id"><?php echo $value->id; ?></td>
			<?php endif; ?>
			<td><?php echo $value->content; ?></td>
			<td class="text-right"><?php echo $value->price_unity; ?></td>	
			<td class="text-center"><?php echo $value->tax; ?></td>	
			<td class="text-right"><?php echo $value->price_tax; ?></td>								
			<td class="text-right"><?php echo $value->price_total; ?></td>
			<td class="actions">
				<button type="button" class="btn btn-default btn-circle" data-toggle="modal" data-target="#myModal" data-whatever="@mdo" data-art="<?php echo $value->id; ?>" title="<?php echo ucfirst($_lang['modifica']) .' '.$_lang['articolo']; ?>"><i class="fa fa-edit"> </i></button>			
			</td>												
		</tr>	
	<?php endforeach; ?>
<?php endif; ?>	
						
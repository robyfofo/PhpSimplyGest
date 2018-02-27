<!-- invoices/listItap.tpl.php v.1.0.0. 09/02/2018 -->	
<?php if (is_array($App->items) && count($App->items) > 0): ?>
	<?php foreach ($App->items AS $key=>$value): ?>	
		<tr>	
			<td class="id"><?php echo $value->id; ?></td>
			<td><?php echo $value->content; ?></td>
			<td class="text-right"><?php echo  number_format($value->price_unity,2,',','.'); ?></td>	
			<td class="text-center"><?php echo $value->tax; ?></td>	
			<td class="text-right"><?php echo  number_format($value->price_tax,2,',','.'); ?></td>								
			<td class="text-right"><?php echo  number_format($value->price_total,2,',','.'); ?></td>
			<td class="actions">
				<button type="button" class="btn btn-default btn-circle" data-toggle="modal" data-target="#myModal" data-whatever="@mdo" data-art="<?php echo $value->id; ?>" title="<?php echo ucfirst($_lang['modifica']) .' '.$_lang['articolo']; ?>"><i class="fa fa-edit"> </i></button>			
				<a class="deleteart btn btn-default btn-circle" data-art="<?php echo $value->id; ?>" href="#" title="<?php echo ucfirst($_lang['cancella']) .' '.$_lang['articolo']; ?>"><i class="fa fa-cut"> </i></a>
			</td>												
		</tr>	
	<?php endforeach; ?>
<?php endif; ?>
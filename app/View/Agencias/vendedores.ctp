<?php 
foreach($vendedores as $v){ 
	if($v['User']['id'] > 0){		
?>
	<tr>
		<td>
            <a href="/index.php/users/users/pre_edit?user_id=<?php echo $v['User']['id'];?>"><i class="fa-icon-user"></i> <?php echo $v['User']['nombre'];?> <?php echo $v['User']['apellido'];?></a><br>
			<small><i class="fa-icon-phone"></i> <?php echo $v['User']['telefono'];?></small>
		</td>
		<td class="center"><small><i class="fa-icon-calendar"></i> <?php echo $v['User']['created'];?></small></td>
			<td class="center">
				<?php if($v['User']['active']){ ?>
					<button type="button" user_id="<?php echo $v['User']['id'];?>" active="0" class="btn btn-danger btn-mini change-user-status"><i class="fa-icon-off"></i></button>
				<?php }else{ ?>
					<button type="button" user_id="<?php echo $v['User']['id'];?>" active="1" class="btn btn-success btn-mini change-user-status"><i class="fa-icon-magic"></i></button>	
				<?php } ?>
<button type="button" user_id="<?php echo $v['User']['id'];?>" class="btn btn-success btn-mini change-user-pass"><i class="fa-icon-key"></i></button>						
<button type="button" user_type="vendedor" user_id="<?php echo $v['User']['id'];?>" class="btn btn-danger btn-mini delete-user"><i class="fa fa-trash-o"></i></button>
			</td>
			<td class="center">
				<?php if($v['User']['active']){ ?>
					<span class="label label-success">Activo</span>
					<?php }else{ ?>
					<span class="label label-error">Inactivo</span>	
					<?php } ?>	
			</td>                                       
	</tr>
<?php } } ?>       
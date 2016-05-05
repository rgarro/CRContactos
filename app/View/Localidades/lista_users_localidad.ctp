<div class="row">
<div class="span3">
	<h3><?php echo $localidad['Localidade']['nombre'];?></h3>
<form class="well form-horizontal" id="vendedoresLocalidadesForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="localidade_id" value="<?php echo $localidad['Localidade']['id'];?>"/>
<fieldset>
<ul style="list-style-type: none;" class="dashboard-list">
	<?php 
	$i = 0;
	foreach($vendedores as $u){ 
	//print_r($u);	
		?>
		<li>
			<input type="checkbox" name="user[<?php echo $i;?>]" value="<?php echo $u['Vendedore']['id'];?>" <?php if(in_array($u['Vendedore']['id'], $vendedores_ids)){ ?>checked="checked"<?php } ?>/>	
			<?php echo $u['User']['username'];?>
		</li>			
	<?php 
	$i++;
	} 
	?>	
</ul>
</fieldset>
</form>	
<?php	
//print_r($localidad);
//print_r($vendedores);	
?>
</div>
</div>	
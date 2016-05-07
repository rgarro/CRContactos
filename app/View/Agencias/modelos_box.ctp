<div class="box-content">
<ul class="dashboard-list">
	<?php	 
	foreach($marcas as $m){ 
		?>
	<li id="li<?php echo $m['Marca']['id'];?>"> 
	<center>
<span class="badge">	
		<?php echo $this->Html->image("{$m['Marca']['logo_file']}/{$m['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>	
		 <b><?php echo $m['Marca']['nombre'];?></b></br>
		 <a href="http://crcontactos.com/index.php/puertas/formb?agencia_id=<?php echo $this->Session->read("agencia_id");?>&marca_id=<?php echo $m['Marca']['id'];?>" target="_blank" class="btn btn-mini"><i class="fa-icon-share"></i> Form Contacto</a><br> 
<a href="http://crcontactos.com/index.php/puertas/form?agencia_id=<?php echo $this->Session->read("agencia_id");?>&marca_id=<?php echo $m['Marca']['id'];?>" target="_blank" class="btn btn-mini"><i class="fa-icon-picture"></i> Form Contacto</a> 
				

<?php 
if(count($m['Marca']['Modelo'])){
?>
<ul class="dashboard-list">
<?php foreach($m['Marca']['Modelo'] as $mo){ 
	?>
<li>
	<span class="badge badge-inverse">
<?php if(count($mo['ModeloPic'])){ 
	?>

<?php echo $this->Html->image("{$mo['ModeloPic'][0]['pic_file']}/{$mo['ModeloPic'][0]['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"40px"));?>

<?php }else{ ?>	
	<img id="previewModelPic" src="/img/motosil1.png" width="40" class='img-polaroid'/>	
<?php } ?>
<br>
	<i class="fa-icon-cog"></i> <?php echo $mo['modelo'];?></span></li>


<?php } ?>	
</ul>	
<?php } ?>	
</span>
	</center>
	</li>	
	<?php } ?>	
	
</ul>	
</div>
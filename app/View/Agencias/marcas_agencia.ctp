<div class="box-content">
<ul class="dashboard-list">
	<?php	 
	foreach($marcas as $m){ 
		?>
	<li id="li<?php echo $m['Marca']['id'];?>"> 
	<center>	
		<?php echo $this->Html->image("{$m['Marca']['logo_file']}/{$m['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>	
		 <b><?php echo $m['Marca']['nombre'];?></b> 
		<button lid='li<?php echo $m['Marca']['id'];?>' mid="<?php echo $m['MarcaAgencia']['id']?>" type='button' class='btn btn-danger btn-mini quitarMarcaAgencia'><i class='fa-icon-off'></i></button>
<?php 
if(count($m['agmodels'])){
?>
<ul class="dashboard-list">
<?php foreach($m['agmodels'] as $mo){ 
	?>
<li>
	<span class="badge">
<?php if(count($mo['pics'])){ 
	?>

<?php echo $this->Html->image("{$mo['pics'][0]['ModeloPic']['pic_file']}/{$mo['pics'][0]['ModeloPic']['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"40px"));?>

<?php }else{ ?>	
	<img id="previewModelPic" src="/img/motosil1.png" width="40" class='img-polaroid'/>	
<?php } ?>
<br>
	<i class="fa-icon-cog"></i> <?php echo $mo['m']['modelo'];?></span></li>


<?php } ?>	
</ul>	
<?php } ?>	
	</center>
	</li>	
	<?php } ?>	
	
</ul>	
</div>
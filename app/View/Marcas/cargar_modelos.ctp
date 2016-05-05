<div class="span4">
	<?php foreach($modelos as $m){ ?>
	<span id="mid<?php echo $m['Modelo']['id'];?>" style="margin-bottom: 3px;" class="badge"><center>
<?php
if(count($m['ModeloPic'])){
?>		
<?php echo $this->Html->image("{$m['ModeloPic'][0]['pic_file']}/{$m['ModeloPic'][0]['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"63px"));?>
<br>
<?php
}else{
?>
		<img src="/img/motosil1.png" width="63" class="img-polaroid" /><br>
<?php } ?>		
		<i class='fa fa-motorcycle'></i> <?php echo $m['Modelo']['modelo'];?><br>
		<i class='fa fa-tag'></i> <?php echo $m['Modelo']['tipo'];?><br>
		<i class='fa fa-cubes'></i> <?php echo $m['Modelo']['cilindraje'];?> cc<br>
		<span class="badge badge-inverse">
			<button type="button" type="button" modelo_id="<?php echo $m['Modelo']['id'];?>" class="btn  btn-mini abremodelofotos"><i class="fa-icon-camera"></i></button>
<button type="button" type="button" modelo_id="<?php echo $m['Modelo']['id'];?>" class="btn  btn-mini edit-modelo-btn"><i class="fa fa-keyboard-o"></i></button>			
			<button lid="mid<?php echo $m['Modelo']['id'];?>" modelo_id="<?php echo $m['Modelo']['id'];?>" type="button" class="btn btn-danger btn-mini borramodelobtn"><i class="fa-icon-off"></i></button>
		</span>
	</center></span>
	<?php } ?>
</div>
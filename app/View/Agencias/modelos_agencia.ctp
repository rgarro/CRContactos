<div class="row">
	<div class="span5">
		<?php 
		foreach($modelos_agencia as $modelo){ 
			?>
			<span id="sp<?php echo $modelo['ModeloAgencia']['id'];?>" class="badge badge-warning" style="margin-bottom: 5px;"><h5>
				<center>
<?php if($modelo['Modelo']['ModeloPic']){?>
<?php echo $this->Html->image("{$modelo['Modelo']['ModeloPic'][0]['pic_file']}/{$modelo['Modelo']['ModeloPic']['0']['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"60px"));?>
<?php } else {?>
<img id="previewModelPic" src="/img/motosil1.png" width="60" class='img-polaroid'/>	
<?php } ?>		

				
				<br>
			<?php echo $this->Html->image("{$modelo['Modelo']['Marca']['logo_file']}/{$modelo['Modelo']['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>
			 <i class="icon-cog"></i> <?php echo h($modelo['Modelo']['modelo']); ?>  
			 <button type="button" lid="sp<?php echo $modelo['ModeloAgencia']['id'];?>" maid="<?php echo $modelo['ModeloAgencia']['id'];?>" class="btn btn-danger btn-mini removermodeloagencia"><i class="fa-icon-off"></i></button>
			</center></h5></span> 
		<?php } ?>	
	</div>
</div>	
<div class="row">
	<div class="span5"> 
		<?php 
		//print_r($modelos_agencia);
		foreach($notificaciones as $modelo){ ?>
			<span id="sp<?php echo $modelo['Notificacione']['id'];?>" class="badge badge-warning" style="margin-bottom: 5px;"><h5>
			<?php echo $this->Html->image("{$modelo['Agencia']['logo_file']}/{$modelo['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-polaroid","width"=>"50px"));?>
			 <br><i class="icon-envelope"></i> <?php echo h($modelo['Notificacione']['email']); ?>  
			 <button type="button" lid="sp<?php echo $modelo['Notificacione']['id'];?>" nid="<?php echo $modelo['Notificacione']['id'];?>" class="btn btn-danger btn-mini removernotificacionagencia"><i class="fa-icon-off"></i></button>
			</h5></span> 
		<?php } ?>	
	</div>
</div>
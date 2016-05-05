

<div class="eventos form">
<?php 
echo $this->Form->create('Modelo', array(
										'type' => 'file',
										'inputDefaults' => array(
											'div' => 'control-group',
											'label' => array(
												'class' => 'control-label'
												),
											'wrapInput' => 'controls'
											),
										'class' => 'well form-horizontal'
									)); ?>
	<fieldset>
		<legend><i class="fa fa-motorcycle"></i> Modificar Modelo</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo',array("options"=>$nombre_tipos));
		echo $this->Form->input('cilindraje');
		echo $this->Form->input('modelo');
	?>
	</fieldset>
	
<?php echo $this->Form->end(array("class"=>"btn btn-warning btn-mini","label"=>' Actualizar')); ?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$(Marcas.opt.editModeloForm).on("submit",function(e){			
			var frm = $(Marcas.opt.editModeloForm);	
			var data = frm.serializeHash();
			Marcas.editModelo(data.data);
			return false;
		});
		
	});
</script>
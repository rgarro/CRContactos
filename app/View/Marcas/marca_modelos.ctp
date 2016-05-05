<div class="box-content">
<h3><?php echo $this->Html->image("{$marca['Marca']['logo_file']}/{$marca['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?> <i class="fa-icon-cog"></i> <?php echo $marca['Marca']['nombre'];?></h3>	
<div class="row">
<div id="modelosContainer" class="span3">

</div>
</div>
<br>	
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
										'class' => 'well form-horizontal',
										'url'=>array("controller"=>"marcas","action"=>"agregar_modelo")
									)); ?>
	<fieldset>
		<legend><i class="fa-icon-plus"></i> Agregar</legend>
	<?php
		echo $this->Form->input('marca_id',array("type"=>"hidden","value"=>$marca['Marca']['id']));
		echo $this->Form->input('tipo',array("options"=>$nombre_tipos));
		echo $this->Form->input('cilindraje');
		echo $this->Form->input('modelo');
	?>
	</fieldset>
	
<?php echo $this->Form->end(array("class"=>"btn btn-success btn-mini","label"=>' Crear')); ?>
</div>
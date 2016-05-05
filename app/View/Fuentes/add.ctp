<div class="fuentes form">
<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-star"></i><span class="break"></span> Agregar Fuente</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Fuente', array('type' => 'file',
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
		<legend> Agregar Fuente</legend>
	<?php
	echo $this->Form->input('agencia_id', array('type'=>'hidden','value' => $this->Session->read("agencia_id")));
		echo $this->Form->input('texto');
	?>
	</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Guadar")); ?>
</div>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link('Lista', "#/Fuentes/"); ?></li>
	</ul>
</div>

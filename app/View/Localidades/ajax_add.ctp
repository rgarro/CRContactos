<div class="localidades form">
<?php echo $this->Form->create('Localidade', array('type' => 'file',
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
		<legend><i class="fa-icon-edit"></i> Información</legend>
	<?php
		echo $this->Form->input('agencia_id',array('type'=>'hidden','value'=>$this->Session->read('agencia_id')));
		echo $this->Form->input('nombre');
		echo $this->Form->input('direccion');
		echo $this->Form->input('calles');
		echo $this->Form->input('canton');
		echo $this->Form->input('distrito');
		echo $this->Form->input('provincia',array('options' =>array('Alajuela'=>'Alajuela', 'Heredia'=>'Heredia','Cartago'=>'Cartago','SanJose'=>'SanJose','Puntarenas'=>'Puntarenas','Guanacaste'=>'Guanacaste','Limon'=>'Limon')));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

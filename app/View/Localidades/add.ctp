<div class="localidades form">
<?php echo $this->Form->create('Localidade'); ?>
	<fieldset>
		<legend><?php echo __('Add Localidade'); ?></legend>
	<?php
		echo $this->Form->input('agencia_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('direccion');
		echo $this->Form->input('calles');
		echo $this->Form->input('canton');
		echo $this->Form->input('distrito');
		echo $this->Form->input('provincia',array('options' =>array('Alajuela'=>'Alajuela', 'Heredia'=>'Heredia','Cartago'=>'Cartago','SanJose'=>'SanJose','Puntarenas'=>'Puntarenas','Guanacaste'=>'Guanacaste','Limon'=>'Limon')));
		echo $this->Form->input('lat');
		echo $this->Form->input('lon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Localidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
	</ul>
</div>

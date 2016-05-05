<div class="acos form">
<?php echo $this->Form->create('Aco', array('type' => 'file',
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
		<legend><?php echo __('infofieldset'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('model');
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('alias');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('Aro');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ".__('Delete'), array('action' => 'delete', $this->Form->value('Aco.id')), array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Aco.id'))); ?></li>
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> ".'Crear Recurso', array('action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
		<li><?php echo $this->Html->link("<i class='fa-icon-book'></i> ".__('Lista de Recursos'), array('controller' => 'acos', 'action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> ".__('Crear Recurso Padre'), array('controller' => 'acos', 'action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
	</ul>
</div>

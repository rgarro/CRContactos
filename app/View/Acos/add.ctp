<div class="acos form">
<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-th"></i><span class="break"></span>Crear Recurso</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
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
</div>
<div class="actions">
	<ul>
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

<div class="groups form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-th"></i><span class="break"></span> Editar Grupo</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Group', array('type' => 'file',
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
		echo $this->Form->input('name',array('label'=>'nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	
	<ul>

		<li><?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ".__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), array('type' => 'button',
    'class' => 'btn btn-danger btn-small',
    'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link("<i class='icon-home'></i> Grupos", "#/Grupos/",array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
	</ul>
</div>

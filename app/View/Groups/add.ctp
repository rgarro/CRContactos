<div class="groups form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-th"></i><span class="break"></span>Crear Grupo</h2>
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
		echo $this->Form->input('name',array('label'=>'nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	<ul>

<li><?php echo $this->Html->link("<i class='icon-th'></i> Grupos", "#/Grupos/",array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>

		
	</ul>
</div>

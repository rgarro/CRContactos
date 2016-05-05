<div class="modelos form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-star"></i><span class="break"></span> <?php echo __('Add Marca'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Modelo', array('type' => 'file',
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
		<legend><?php echo __('Add Modelo'); ?></legend>
	<?php
		echo $this->Form->input('marca_id');
		echo $this->Form->input('modelo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link("<i class='fa-icon-tasks'></i> Lista Modelos", array('action' => 'index'),array('type' => 'button','class' => 'btn btn-primary btn-small','escape' => false)); ?></li>
	</ul>
</div>

<div class="users form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-signin"></i><span class="break"></span><?php echo __d('users', 'Reset your password'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php
	echo $this->Form->create($model, array(
		'url' => array(
			'action' => 'reset_password',
			$token), 
				'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
));
	echo $this->Form->input('new_password', array(
		'label' => __d('users', 'New Password'),
		'type' => 'password'));
	echo $this->Form->input('confirm_password', array(
		'label' => __d('users', 'Confirm'),
		'type' => 'password'));
	echo $this->Form->submit(__d('users', 'Submit'));
	echo $this->Form->end();
?>
</div>
</div>
<?php echo $this->element('Users.Users/sidebar'); ?>
<?php
/**
 * Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-question-sign"></i><span class="break"></span><?php echo __d('users', 'Reset your password'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<p><i class="fa-icon-envelope"></i> <?php echo __d('users', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p>
<?php
	echo $this->Form->create($model, array(
		'url' => array(
			'admin' => false,
			'action' => 'reset_password'),
				'action' => 'login',
				'id' => 'LoginForm',
				'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
));
	echo $this->Form->input('email', array(
		'label' => __d('users', 'Your Email')));
	echo $this->Form->submit(__d('users', 'Submit'));
	echo $this->Form->end();
?>
</div>
</div>
<?php echo $this->element('Users.Users/sidebar'); ?>
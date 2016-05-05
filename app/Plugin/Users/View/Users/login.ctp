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
<div class="users index">
		<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-signin"></i><span class="break"></span><?php echo __d('users', 'Login'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<?php echo $this->Session->flash('auth', array('params' => array('class' => 'alert-error'))); ?>
	<fieldset>
		<?php
			echo $this->Form->create($model, array(
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
				'label' => __d('users', 'Email')));
			echo $this->Form->input('password',  array(
				'label' => __d('users', 'Password')));

			echo '<p>' . $this->Form->input('remember_me', array('type' => 'checkbox', 'label' =>  __d('users', 'Remember Me'),
		'afterInput' => $this->Form->submit('Sign in', array(
			'class' => 'btn'
		)))) . '</p>';
			echo '<p><i class="fa-icon-lock"></i> ' . $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password')) . '</p>';

			echo $this->Form->hidden('User.return_to', array(
				'value' => $return_to));
			echo $this->Form->end(array('class'=>'btn btn-success','label'=>'Entrar'));
		?>
	</fieldset>
</div>
</div>
<?php //echo $this->element('Users.Users/sidebar'); ?>

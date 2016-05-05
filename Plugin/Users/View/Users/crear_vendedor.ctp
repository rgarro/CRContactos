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
						<h2><i class="fa-icon-plus"></i><span class="break"></span> Crear Vendedor para <?php echo $this->Session->read('agencia_nombre');?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<fieldset>
		<?php
			echo $this->Form->create($model, array(
				'action' => 'crear_administrador',
				//'id' => 'LoginForm',
				'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
));
			echo $this->Form->input('username', array(
				'label' => __d('users', 'Username')));
			echo $this->Form->input('email', array(
				'label' => __d('users', 'E-mail (used as login)'),
				'error' => array('isValid' => __d('users', 'Must be a valid email address'),
				'isUnique' => __d('users', 'An account with that email already exists'))));
			echo $this->Form->input('password', array(
				'label' => __d('users', 'Password'),
				'type' => 'password'));
			echo $this->Form->input('temppassword', array(
				'label' => __d('users', 'Password (confirm)'),
				'type' => 'password'));
			//$tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos', 'plugin' => null));
			//echo $this->Form->input('tos', array(
				//'label' => __d('users', 'I have read and agreed to ') . $tosLink));
			echo $this->Form->end(__d('users', 'Submit'));
		?>
	</fieldset>
</div>
</div>
<div class="actions">
<ul>
<li><?php echo $this->Html->link("<i class='fa-icon-home'></i> Agencia", array('plugin' => null,'controller'=>'agencias','action' => 'view', $_SESSION['agencia_id']),array('type' => 'button',
    'class' => 'btn btn-primary btn-small',
    'escape' => false)); ?> </li>
</ul>		
</div>
<?php //echo $this->element('Users.Users/sidebar'); ?>

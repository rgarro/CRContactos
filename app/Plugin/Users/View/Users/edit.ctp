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
	<?php //echo $this->Form->create($model); ?>
		<fieldset>
			<legend><?php echo __d('users', 'Edit User'); ?></legend>
			<p>
				<?php //echo $this->Html->link(__d('users', 'Change your password'), array('action' => 'change_password')); ?>
<a class="btn" href="/index.php/users/users/change_password"><i class="fa-icon-key"></i> Cambiar mi Contraseña</a>			
			</p>
            <p>
                <a class="btn" href="/index.php/users/users/edit_my_data"><i class="fa-icon-user"></i> Cambiar mis Datos</a>
            </p>
            <p>
                <a class="btn" href="/index.php/users/users/logout"><i class="fa-icon-off"></i> Cerrar Sesión</a>
            </p>
		</fieldset>
	<?php //echo $this->Form->end(__d('users', 'Submit')); ?>
</div>
<?php //echo $this->element('Users.Users/sidebar'); ?>
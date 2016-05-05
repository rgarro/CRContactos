<div class="actions">
	<ul>
		<?php if (!$this->Session->read('Auth.User.id')) : ?>
			<li><?php echo $this->Html->link("<i class='fa-icon-signin'></i> <span class='hidden-tablet'>".__d('users', 'Login').'</span>', array('plugin' => 'users', 'controller' => 'users', 'action' => 'login'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
				<?php if (!empty($allowRegistration) && $allowRegistration) : ?>
		<!--	<li><i class="fa-icon-edit"></i> <?php echo $this->Html->link(__d('users', 'Register an account'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'add')); ?></li> -->
		<?php endif; ?>
		<?php else : ?>
			<li><?php echo $this->Html->link("<i class='fa-icon-signout'></i> <span class='hidden-tablet'>".__d('users', 'Logout').'<span>', array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'),array('type' => 'button',
    'class' => 'btn btn-inverse btn-small',
    'escape' => false)); ?>
			<li><?php echo $this->Html->link("<i class='fa-icon-cog'></i> <span class='hidden-tablet'>".__d('users', 'My Account').'</span>', array('plugin' => 'users', 'controller' => 'users', 'action' => 'edit'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?>
			<li><?php echo $this->Html->link("<i class='fa-icon-lock'></i> <span class='hidden-tablet'>".__d('users', 'Change password').'</span>', array('plugin' => 'users', 'controller' => 'users', 'action' => 'change_password'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?>
		<?php endif ?>
	</ul>
</div>
<div class="administradores view">
<h2><?php echo __('Administradore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($administradore['Administradore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($administradore['User']['id'], array('controller' => 'users', 'action' => 'view', $administradore['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($administradore['Agencia']['nombre'], array('controller' => 'agencias', 'action' => 'view', $administradore['Agencia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Administradore'), array('action' => 'edit', $administradore['Administradore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Administradore'), array('action' => 'delete', $administradore['Administradore']['id']), array(), __('Are you sure you want to delete # %s?', $administradore['Administradore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Administradores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administradore'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
	</ul>
</div>

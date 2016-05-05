<div class="administradores form">
<?php echo $this->Form->create('Administradore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Administradore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('agencia_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Administradore.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Administradore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Administradores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
	</ul>
</div>

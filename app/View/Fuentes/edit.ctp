<div class="fuentes form">
<?php echo $this->Form->create('Fuente'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fuente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('texto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fuente.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Fuente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fuentes'), array('action' => 'index')); ?></li>
	</ul>
</div>

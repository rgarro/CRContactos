<div class="fuentes view">
<h2><?php echo __('Fuente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fuente['Fuente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($fuente['Fuente']['texto']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fuente'), array('action' => 'edit', $fuente['Fuente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fuente'), array('action' => 'delete', $fuente['Fuente']['id']), array(), __('Are you sure you want to delete # %s?', $fuente['Fuente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fuentes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fuente'), array('action' => 'add')); ?> </li>
	</ul>
</div>

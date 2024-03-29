<div class="administradores index">
	<h2><?php echo __('Administradores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('agencia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($administradores as $administradore): ?>
	<tr>
		<td><?php echo h($administradore['Administradore']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($administradore['User']['id'], array('controller' => 'users', 'action' => 'view', $administradore['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($administradore['Agencia']['nombre'], array('controller' => 'agencias', 'action' => 'view', $administradore['Agencia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $administradore['Administradore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $administradore['Administradore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $administradore['Administradore']['id']), array(), __('Are you sure you want to delete # %s?', $administradore['Administradore']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Administradore'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
	</ul>
</div>

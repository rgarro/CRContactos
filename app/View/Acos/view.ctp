<div class="acos view">
<h2><?php echo __('Aco'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Aco'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aco['ParentAco']['id'], array('controller' => 'acos', 'action' => 'view', $aco['ParentAco']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aco'), array('action' => 'edit', $aco['Aco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aco'), array('action' => 'delete', $aco['Aco']['id']), array(), __('Are you sure you want to delete # %s?', $aco['Aco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aco'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acos'), array('controller' => 'acos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aros'), array('controller' => 'aros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Acos'); ?></h3>
	<?php if (!empty($aco['ChildAco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aco['ChildAco'] as $childAco): ?>
		<tr>
			<td><?php echo $childAco['id']; ?></td>
			<td><?php echo $childAco['parent_id']; ?></td>
			<td><?php echo $childAco['model']; ?></td>
			<td><?php echo $childAco['foreign_key']; ?></td>
			<td><?php echo $childAco['alias']; ?></td>
			<td><?php echo $childAco['lft']; ?></td>
			<td><?php echo $childAco['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'acos', 'action' => 'view', $childAco['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'acos', 'action' => 'edit', $childAco['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'acos', 'action' => 'delete', $childAco['id']), array(), __('Are you sure you want to delete # %s?', $childAco['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Aros'); ?></h3>
	<?php if (!empty($aco['Aro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aco['Aro'] as $aro): ?>
		<tr>
			<td><?php echo $aro['id']; ?></td>
			<td><?php echo $aro['parent_id']; ?></td>
			<td><?php echo $aro['model']; ?></td>
			<td><?php echo $aro['foreign_key']; ?></td>
			<td><?php echo $aro['alias']; ?></td>
			<td><?php echo $aro['lft']; ?></td>
			<td><?php echo $aro['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aros', 'action' => 'view', $aro['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aros', 'action' => 'edit', $aro['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aros', 'action' => 'delete', $aro['id']), array(), __('Are you sure you want to delete # %s?', $aro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

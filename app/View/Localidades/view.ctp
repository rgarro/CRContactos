<div class="localidades view">
<h2><?php echo __('Localidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($localidade['Agencia']['nombre'], array('controller' => 'agencias', 'action' => 'view', $localidade['Agencia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calles'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['calles']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canton'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['canton']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distrito'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['distrito']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lon'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['lon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Localidade'), array('action' => 'edit', $localidade['Localidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Localidade'), array('action' => 'delete', $localidade['Localidade']['id']), array(), __('Are you sure you want to delete # %s?', $localidade['Localidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Localidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="modelos view">
<h2><?php echo __('Modelo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($modelo['Marca']['id'], array('controller' => 'marcas', 'action' => 'view', $modelo['Marca']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['modelo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Modelo'), array('action' => 'edit', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Modelo'), array('action' => 'delete', $modelo['Modelo']['id']), array(), __('Are you sure you want to delete # %s?', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modelos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modelo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Marcas'), array('controller' => 'marcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Marca'), array('controller' => 'marcas', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="acos index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-tasks"></i><span class="break"></span> Recursos</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('foreign_key'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th class="actions">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($acos as $aco): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($aco['ParentAco']['id'], array('controller' => 'acos', 'action' => 'view', $aco['ParentAco']['id'])); ?>
		</td>
		<td><?php echo h($aco['Aco']['model']); ?>&nbsp;</td>
		<td><?php echo h($aco['Aco']['foreign_key']); ?>&nbsp;</td>
		<td><?php echo h($aco['Aco']['alias']); ?>&nbsp;</td>
		<td><?php echo h($aco['Aco']['lft']); ?>&nbsp;</td>
		<td><?php echo h($aco['Aco']['rght']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link("<i class='fa-icon-search'></i> ", array('action' => 'view', $group['Group']['id']),array('type' => 'button','class' => 'btn btn-primary btn-small ','escape' => false)); ?>
			<?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ", array('action' => 'edit', $aco['Aco']['id']),array('type' => 'button',
    'class' => 'btn btn-success btn-small ',
    'escape' => false)); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ", array('action' => 'delete', $aco['Aco']['id']),array('type' => 'button',
    'class' => 'btn btn-danger btn-small ',
    'escape' => false), __('Are you sure you want to delete # %s?', $aco['Aco']['id'])); ?>
			
			
				</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> ".'Crear Recurso', array('action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
		<li><?php echo $this->Html->link("<i class='fa-icon-book'></i> ".__('Lista de Recursos'), array('controller' => 'acos', 'action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> ".__('Crear Recurso Padre'), array('controller' => 'acos', 'action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
	</ul>
</div>

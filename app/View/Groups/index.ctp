<div class="groups index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-th"></i><span class="break"></span> Grupos</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	
	<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable table-hover">
	<thead>
	<tr>
			
			<th><i class="icon-th"></i> Grupo</th>
			<th class="actions">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td class="actions">
			
<?php //echo $this->Html->link("<i class='fa-icon-search'></i> ", array('action' => 'view', $group['Group']['id']),array('type' => 'button','class' => 'btn btn-primary btn-small ','escape' => false)); ?>
			<?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ", array('action' => 'edit', $group['Group']['id']),array('type' => 'button',
    'class' => 'btn btn-success btn-small',
    'escape' => false)); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ", array('action' => 'delete', $group['Group']['id']),array('type' => 'button',
    'class' => 'btn btn-danger btn-small',
    'escape' => false), __('Are you sure you want to delete # %s?', $group['Group']['name'])); ?>
		
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> Crear Grupo", array('action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
	</ul>
</div>
<script>
	$(document).ready(function(){
		$('.datatable').dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página."
			}
		} );
	});
</script>

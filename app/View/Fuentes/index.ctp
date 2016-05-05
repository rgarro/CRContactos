<div class="fuentes index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-bullhorn"></i><span class="break"></span> Fuentes</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<h2><?php echo __('Fuentes'); ?></h2>
	<table class="table bootstrap-datatable datatable dataTable table-striped">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('texto'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fuentes as $fuente): ?>
	<tr>
		
		<td><?php echo h($fuente['Fuente']['texto']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $fuente['Fuente']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $fuente['Fuente']['id'])); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i>", array('action' => 'delete', $fuente['Fuente']['id']), array('type' => 'button',
    'class' => 'btn btn-danger btn-mini',
    'escape' => false), __('Are you sure you want to delete # %s?', $fuente['Fuente']['texto'])); ?>
		
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Crear Fuente', array('action' => 'add'),array('class' => 'btn btn-primary btn-small')); ?></li>
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
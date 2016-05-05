<div class="modelos index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="icon-cog"></i><span class="break"></span> Modelos</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<table class="table bootstrap-datatable datatable dataTable table-striped">
	<thead>
	<tr>
			
			<th><center><i class="fa-icon-barcode"></i> <?php echo $this->Paginator->sort('modelo'); ?></center></th>
			<th class="actions">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($modelos as $modelo): ?>
	<tr>
		<td>
			<center>
			<span class="badge">
			<?php echo $this->Html->image("{$modelo['Marca']['logo_file']}/{$modelo['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>
			<br>
			<h5><i class="icon-cog"></i> <?php echo h($modelo['Modelo']['modelo']); ?></h5></span>&nbsp;
			</center>	
		</td>
		<td class="actions">
		
			<?php //echo $this->Html->link("<i class='fa-icon-pencil'></i> ", array('action' => 'edit', $modelo['Modelo']['id']),array('type' => 'button',
    //'class' => 'btn btn-success btn-small ',
    //'escape' => false)); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ", array('action' => 'delete', $modelo['Modelo']['id']),array('type' => 'button',
    'class' => 'btn btn-danger btn-small ',
    'escape' => false), __('Are you sure you want to delete # %s?', $modelo['Modelo']['modelo'])); ?>
		
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
</div>
<div class="actions">
	<ul>
		<li><span class="label"><i class="fa-icon-plus"></i> <?php echo $this->Html->link(html_entity_decode("Crear Modelo"), array('action' => 'add'),array('class' => 'btn btn-primary btn-small')); ?></span>
	</ul>
</div>

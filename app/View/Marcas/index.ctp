<script type="text/javascript">
	$(document).ready(function(){
		
			Marcas.opt.marcaModelosModal = '#marcaModelosModal';
			Marcas.opt.marcaModelosContainer = '.marcaModelosContainer';
			Marcas.opt.marcaModelosUrl = '/index.php/marcas/marca_modelos';
			Marcas.opt.modelosbtn = '.modelosbtn';
			Marcas.opt.modelosContainer = '#modelosContainer';
		
		Marcas.init();
		
		$('.datatable').dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página."
			}
		} );
	});
</script>
<!-- begin modals -->
<!-- marca modelos -->
<div class="modal hide fade" id="modeloEditModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa fa-motorcycle"></i> Modelo</h3>
			</div>
			<div class="modal-body modeloEditContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- marca modelos -->
<div class="modal hide fade" id="modeloFotosModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-film"></i> Fotos</h3>
			</div>
			<div class="modal-body modeloFotosContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- marca modelos -->
<div class="modal hide fade" id="marcaModelosModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa fa-motorcycle"></i> Modelos</h3>
			</div>
			<div class="modal-body marcaModelosContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- end modals -->
<div class="marcas index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2 class="animated rollIn" ><i class="fa fa-motorcycle"></i><span class="break"></span>Marcas</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<table class="table bootstrap-datatable datatable dataTable table-striped">
	<thead>
	<tr>
			<th><i class="fa-icon-certificate"></i> Marca</th>	
	</tr>
	</thead>
	<tbody>
	<?php foreach ($marcas as $marca): ?>
	<tr>		
		<td><center><span class="badge"><h5><?php echo $this->Html->image("{$marca['Marca']['logo_file']}/{$marca['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>
			<span class="badge badge-inverse" style="min-width: 200px;padding: 10px;"><i class="fa-icon-certificate"></i> <?php echo h($marca['Marca']['nombre']); ?></span>  
				<span class="badge badge-inverse">
			<button class="btn btn-success btn-mini modelosbtn" marca_id="<?php echo $marca['Marca']['id'];?>"><i class="fa fa-motorcycle"></i> </button>		
			
			<?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ", array('action' => 'edit', $marca['Marca']['id']),array('type' => 'button',
    'class' => 'btn btn-success btn-mini ',
    'escape' => false)); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ", array('action' => 'delete', $marca['Marca']['id']),array('type' => 'button',
    'class' => 'btn btn-danger btn-mini',
    'escape' => false), __('Are you sure you want to delete # %s?', $marca['Marca']['nombre'])); ?></span>
		</h5></span></center>
			</td>	
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
</div>
<div class="actions">
	<ul>
		<span class="label"><i class="fa-icon-plus"></i> <?php echo $this->Html->link(html_entity_decode("Crear Marca"), array('action' => 'add'),array('class' => 'btn btn-primary btn-small')); ?></span>
	</ul>
</div>

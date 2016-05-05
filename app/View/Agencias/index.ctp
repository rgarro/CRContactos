<div class="agencias index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2 class="animated rollIn"><i class="icon-home"></i><span class="break"></span> Agencias</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<table class="table bootstrap-datatable datatable dataTable table-striped">
	<thead>
	<tr>
			<th><center><i class="icon-home"></i> Agencia</center></th>	
			
	</tr>
	</thead>
	<tbody >
	<?php foreach ($agencias as $agencia): ?>
	<tr>
		<td>
			<center>
			<span class="badge ">
			<?php echo $this->Html->image("{$agencia['Agencia']['logo_file']}/{$agencia['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-polaroid","width"=>"150px"));?>			
			<h5><i class="icon-home"></i> <?php echo $agencia['Agencia']['nombre']; ?></h5>&nbsp;
	<span class="badge badge-inverse">
			<div class="actions">
				<?php echo $this->Html->link("<i class='fa-icon-search'></i> ", array('action' => 'view', $agencia['Agencia']['id']),array('type' => 'button',
    'class' => 'btn btn-primary btn-mini ',
    'escape' => false)); ?>
    <a href='/index.php/agencias/lista_marcas/<?php echo $agencia['Agencia']['id'];?>' agencia_id="<?php echo $agencia['Agencia']['id'];?>" role='button' class='btn btn-inverse btn-mini modalid' data-toggle='modal' data-target='#agenciaMarcasModal'><i class='fa-icon-star'></i></a>
			<?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ", array('action' => 'edit', $agencia['Agencia']['id']),array('type' => 'button',
    'class' => 'btn btn-success btn-mini ',
    'escape' => false)); ?>
			<?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ", array('action' => 'delete', $agencia['Agencia']['id']),array('type' => 'button',
    'class' => 'btn btn-danger btn-mini ',
    'escape' => false), __('Are you sure you want to delete # %s?', $agencia['Agencia']['nombre'])); ?>
			</div></span>		
			</center></span>	
			</td>
		
		
		
		
		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
</div>
<div class="actions">
	<ul>
		
		<li><span class="label"><i class="fa-icon-plus"></i> <?php echo $this->Html->link(html_entity_decode("Crear Agencia"), array('action' => 'add'),array('class' => 'btn btn-primary btn-small')); ?></span>
	<li><span class="label"><i class="fa-icon-globe"></i> <?php echo $this->Html->link(html_entity_decode("Mapa"), "#/MapaAgencias/",array('class' => 'btn btn-primary btn-small')); ?></span>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		Agencias.opt.agenciaMarcasModal = '#agenciaMarcasModal';
		Agencias.opt.agenciaMarcasBtn = '#agenciaMarcasBtn';
		Agencias.init();
		
		$('.datatable').dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página."
			}
		} );
		
	});
</script>
<!-- begin agenciaMarcas Modal -->
<div class="modal hide fade" id="agenciaMarcasModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-star"></i> Marcas de la Agencia</h3>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
				
			</div>
		</div>							
<!-- end agenciaMarcas Modal -->

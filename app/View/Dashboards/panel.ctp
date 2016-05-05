<script type="text/javascript">

	function recargar_leads_atendiendo(){
		LeadManager.cargarAten();
	}

	$(document).ready(function(){
		
			LeadManager.opt.cajaNuevos = '#cajaNuevos';
			LeadManager.opt.reloadNewLeadsBtn = '.reload-new-leads';
			LeadManager.opt.removerLeadBtn = '.remover-lead';
			LeadManager.opt.detalleLeadBtn = '.detalle-lead';
			LeadManager.opt.detalleLeadContainer = '.detalleLeadContainer';
			LeadManager.opt.detalleLeadContainer = '.detalleLeadContainer';
			LeadManager.opt.detalleLeadModal = '#detalleLeadModal';
			LeadManager.opt.usuariosLeadBtn = '.usuarios-lead';
			LeadManager.opt.cajaProc = '#cajaProc';
		
		LeadManager.initD();
		window.setInterval(recargar_leads_atendiendo,300000);
	});
</script>
<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				<hr>
			</div>
			
			<div class="row-fluid">
<!-- empieza caja de leads en proceso-->
<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-leaf"></i><span class="break"></span> Atendiendo</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div id="cajaAten" class="box-content">
	procesando aqui
	</div>
<!-- termina caja de leads en proceso -->
<!-- begin modals -->
<!-- asignar lead -->
<div class="modal hide fade" id="asignarLeadModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-group"></i> Agentes del Lead</h3>
			</div>
			<div class="modal-body asignarLeadContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- lead detail -->
<div class="modal hide fade" id="detalleLeadModal" style="width: 80%;left: 5%;margin-left:auto;margin-right:auto;">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-money"></i> Lead</h3>
			</div>
			<div class="modal-body detalleLeadContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- end modals -->			
<hr>
			<?php echo $this->element('sidebar'); ?>
			</div>
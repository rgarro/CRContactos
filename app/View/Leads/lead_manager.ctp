<script type="text/javascript">
	
	function recargar_leads_nuevos(){
		LeadManager.cargarNuevos();
	}

	function recargar_leads_procesando(){
		LeadManager.cargarProc();
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
		
		LeadManager.init();
		//window.setInterval(recargar_leads_nuevos,300000);
		//window.setInterval(recargar_leads_procesando,310000);
	});
</script>
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
<div class="modal hide fade" style="width: 80%;left: 5%;margin-left:auto;margin-right:auto;" id="detalleLeadModal">
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
<div class="marcas index">
	<?php if($this->Session->read('is_admin')){?>
							<div class="well">
		<button type="button" class="btn btn-info btn-mini bulk-archivar-leads"><i class="fa fa-archive"></i> Archivar</button>
		<button type="button" class="btn btn-link btn-mini bulk-check-all"><i class="fa fa-check-square"></i> marcar todos</button>
		<button type="button" class="btn btn-link btn-mini bulk-uncheck"><i class="fa fa-square-o"></i> desmarcar todos</button>
		</div>
		<?php } ?>	
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-laptop"></i><span class="break"></span> Lead Manager</h2>
						&nbsp; &nbsp;<small>* auto refresca cada 5 minutos.</small> 						
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div class="box-content">
<!-- empieza caja de leads nuevos -->
<div class="box-header" data-original-title>
						<h2><i class="fa-icon-lemon"></i><span class="break"></span> Nuevos &nbsp; <button type="button" class="btn btn-mini reload-new-leads"><i class="fa-icon-retweet"></i> REFRESCAR</button> &nbsp;</h2>
						<div id="leads-nuevos-paginacion"> </div> 
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div id="cajaNuevos" class="box-content">
	Cargando Leads Nuevos ...
	</div>
<!-- termina caja de leads nuevos -->
<br>
<br>	
<!-- empieza caja de leads en proceso-->
<div class="box-header" data-original-title>
						<h2><i class="fa-icon-leaf"></i><span class="break"></span> Procesando&nbsp;</h2> 
						<div id="leads-procesando-paginacion"> </div> 
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div id="cajaProc" class="box-content">
	Cargando Leads en Proceso ...
	</div>
<!-- termina caja de leads en proceso -->		
	</div>
</div>						
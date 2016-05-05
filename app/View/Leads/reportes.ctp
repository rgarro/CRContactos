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
<div class="marcas index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-search"></i><span class="break"></span> Buscar Leads</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<form name="reportsForm" id="reportsForm" type="GET" class="form-inline well">
							  <div class="controls">
								<i class="fa-icon-star-empty"></i><input type="text" required="required" placeholder="Desde" id="desde" name="desde" class="span2"> 
								<i class="fa-icon-star"></i> <input type="text" placeholder="Hasta" id="hasta" name="hasta" required="required" class="span2"> 
								 
								 <i class="fa-icon-exclamation-sign"></i> 
								<select id="status" name="status" class="span2">
									<option value="0">Cualquier Status</option>
									<option value="1">Nuevo</option>
									<option value="2">Asignado</option>
									<option value="5">Activado</option>
									<option value="3">Vendido</option>
									<option value="4">Archivado</option>
								  </select>
								  <br>
								<i class="fa fa-motorcycle"></i> <select id="marca" name="marca" class="span2">
									<option value="0" selected="">Cualquier Marca</option>
									<?php
										foreach($marcas as $m){
									?>
									<option value="<?php echo $m['Marca']['id'];?>"><?php echo $m['Marca']['nombre'];?></option>
									<?php
										}
									?>
								  </select>  
								  <i class="fa fa-tags"></i> <select id="modelo" name="modelo" class="span2">
									<option value="todos" selected="">Cualquier Modelo</option>
									
								  </select>
								  <i class="fa-icon-group"></i>
								<select id="user_id" name="user_id" class="span2">
									<option value="0" selected="selected">Cualquier Agente</option>
									<?php foreach($users as $u){ ?>
									<option value="<?php echo $u['User']['id'];?>"><?php echo $u['User']['nombre'];?> <?php echo $u['User']['apellido'];?></option>
									<?php } ?>
								  </select>  
								  <button type="submit" class="btn btn-success btn-mini"><i class="fa-icon-search"></i> Buscar</button>
							  </div>
				  
	</form>	
<div id="reportContainer">
	
</div>	
	</div>
</div>
<script type="text/javascript">
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
			LeadManager.opt.desde = '#desde';
			LeadManager.opt.hasta = '#hasta';
			LeadManager.opt.status = '#status';
			LeadManager.opt.reporteUrl = '/index.php/leads/reporte_url';
			LeadManager.opt.reportsForm = '#reportsForm';
			LeadManager.opt.reportContainer = '#reportContainer';
			LeadManager.opt.marca = '#marca';
			LeadManager.opt.modelo = '#modelo';
		
		LeadManager.initC();
 });
</script>
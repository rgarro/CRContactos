<div class="marcas index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2 class="animated flash"><i class="fa fa-calendar"></i><span class="break"></span> Fechas</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<form name="reportsAdminFechaForm" id="reportsAdminFechaForm" type="GET" class="form-inline well">
							  <div class="controls">
								<i class="fa-icon-star-empty"></i><input type="text" required="required" placeholder="Desde" id="desdeR" name="desde" class="span2"> 
								<i class="fa-icon-star"></i> <input type="text" placeholder="Hasta" id="hastaR" name="hasta" required="required" class="span2"> 
								 
								

							
								
								  <button type="submit" class="btn btn-success btn-mini"><i class="fa-icon-search"></i> Buscar Leads</button>
							  </div>
				  
	</form>	
<div id="reportAdminFechaContainer">
	
</div>	
	</div>
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
</div>
<script type="text/javascript">
 $(document).ready(function(){
	ReportesAdmin.init();
 });
</script>
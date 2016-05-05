<div class="marcas index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa fa-motorcycle"></i><span class="break"></span> Reporte por Marcas</h2>
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
								 
								

							
								
								  <button type="submit" class="btn btn-success btn-mini"><i class="fa-icon-search"></i> Buscar</button>
							  </div>
				  
	</form>	
<div id="reportContainer">
	
</div>	
	</div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
		Reportes.opt.desde = '#desde';
		Reportes.opt.hasta = '#hasta';
		Reportes.opt.status = '#status';
		Reportes.opt.reporteUrl = '/index.php/leads/report_marca_url';
		Reportes.opt.reportsForm = '#reportsForm';
		Reportes.opt.reportContainer = '#reportContainer';

	Reportes.init();
 });
</script>
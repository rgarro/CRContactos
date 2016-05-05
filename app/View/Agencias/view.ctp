
<div class="agencias view">
		<div class="box-header btn-minimizeb   btn-minimizeb" data-original-title>
						<h2><i class="fa-icon-home"></i><span class="break"></span> <?php echo __('Agencia'); ?> <?php echo h($agencia['Agencia']['nombre']); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<div class="row-fluid">
	<div class="span6">
		<center>			
			<span class="badge"><?php echo $this->Html->image("{$agencia['Agencia']['logo_file']}/{$agencia['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-polaroid","width"=>"150px"));?>
		<br><h4><i class="fa-icon-home"></i> <?php echo h($agencia['Agencia']['nombre']); ?></h4></span>
		</center>
		<br>
		<div class="box-header btn-minimizeb   btn-minimizeb">
						<h2 class=""><i class="fa-icon-group"></i><span class="break"></span> Agentes</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content hide">
						
						
						    <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#administradores"><i class="fa-icon-user"></i> Administradores</a></li>
    <li><a href="#vendedores"><i class="fa-icon-group"></i> Vendedores</a></li>

    </ul>
     
    <div class="tab-content">
    <div class="tab-pane active" id="administradores">
    	<table class="table table-striped">
							  <thead>
								  <tr>
									  <th><i class="fa-icon-tag"></i> Nombre</th>
									  <th><i class="fa-icon-star"></i> Fecha</th>
									  <th><i class="fa-icon-cogs"></i></th>
									  <th>Status</th>                                          
								  </tr>
							  </thead>   
							  <tbody id="tablaAdministradores">
							  	    
							  </tbody>
						 </table>  
						<div class="actions">
							 <ul>
						 	<li><?php echo $this->Html->link("<i class='fa-icon-user-md'></i> Crear Administrador", array('plugin'=>'users','controller'=>'users','action' => 'crear_administrador'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
						 </ul>
						</div>
    </div>
    <div class="tab-pane" id="vendedores">
    	<table class="table table-striped">
							  <thead>
								  <tr>
									  <th><i class="fa-icon-tag"></i> Nombre</th>
									  <th><i class="fa-icon-star"></i> Fecha</th>
									  <th><i class="fa-icon-cogs"></i></th>
									  <th>Status</th>                                          
								  </tr>
							  </thead>   
							  <tbody id="tablaVendedores">
									
							  </tbody>
						 </table>  
						 <div class="actions">
							 <ul>
						 	<li><?php echo $this->Html->link("<i class='fa-icon-user-md'></i> Crear Vendedor", array('plugin'=>'users','controller'=>'users','action' => 'crear_vendedor'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
						 </ul>
						</div>
    </div>
    </div>
    <script>
    $(function () {
    $('#myTab a:last').tab('show');
    })
    </script>
					</div>
		<br>
		<div class="box-header btn-minimizeb   btn-minimizeb">
						<h2><i class="icon-globe"></i><span class="break"></span> Localidades</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content hide">
	<table class="table table-striped table-hover">
							  <thead>
								  <tr>
									  <th>Nombre</th>
									  <th>Canton</th>
									  <th>&nbsp</th>                                          
								  </tr>
							  </thead>   
							  <tbody id="localidadesTableContainer">    
							  </tbody>
						 </table>
						<div class="actions">
							<ul>
								<li>
									<button id="abreAgregarLocalidadFormBtn" type="button" class="btn btn-primary btn-small"><i class='fa-icon-plus'></i> Agregar Localidad</button>
								</li>
								<li>
									<button  id="abreLocalidatesMapaBtn" type="button" class="btn btn-primary btn-small"><i class='fa-icon-globe'></i> Mapa</button>
								</li>
							</ul>
						</div>   
					</div>
		<br>
		<div class="box-header btn-minimizeb   btn-minimizeb">
						<h2><i class="icon-home"></i><span class="break"></span> Agencia</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content hide">
						
	<ul class="dashboard-list">
		<li>
			<b><?php echo __('Razon Social'); ?>:</b> 
			<?php echo h($agencia['Agencia']['razon_social']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Cedula Juridica'); ?>:</b> 
			<?php echo h($agencia['Agencia']['cedula_juridica']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Direccion'); ?>:</b> 
			<?php echo h($agencia['Agencia']['direccion']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Distrito'); ?>:</b> 
			<?php echo h($agencia['Agencia']['canton']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Distrito'); ?>:</b> 
			<?php echo h($agencia['Agencia']['distrito']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Provincia'); ?>:</b> 
			<?php echo h($agencia['Agencia']['provincia']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Telefono'); ?>:</b>  
			<?php echo h($agencia['Agencia']['telefono']); ?>
			&nbsp;
		</li>
		<li>
			<b><?php echo __('Codigo Postal'); ?>:</b> 
			<?php echo h($agencia['Agencia']['codigo_postal']); ?>
			&nbsp;
		</li>
	</ul>
	</div>
<!-- begin localidades box -->
<script type="text/javascript">
	$(document).ready(function(){				
		
			Localidades.opt.abreAgregarLocalidadFormBtn = '#abreAgregarLocalidadFormBtn';
			Localidades.opt.localidadFormModal = '#localidadFormModal';
			Localidades.opt.localidadesFormContainer = '.localidadesFormContainer';
			Localidades.opt.LocalidadeAjaxAddForm = '#LocalidadeAjaxAddForm';
			Localidades.opt.nuevaLocalidadBtn = '#nuevaLocalidadBtn';
			Localidades.opt.nuevaLocalidadFrm = '#LocalidadeAjaxAddForm';
			Localidades.opt.agencia_id = <?php echo $agencia['Agencia']['id']; ?>;
			Localidades.opt.localidadesTableContainer = '#localidadesTableContainer';
			Localidades.opt.listaLocalidadesUrl = '/index.php/localidades/lista';
			Localidades.opt.abreLocalidatesMapaBtn = '#abreLocalidatesMapaBtn';
			Localidades.opt.editarlocalidadFormModal = '#editarlocalidadFormModal';
			Localidades.opt.editarlocalidadesFormContainer = '.editarlocalidadesFormContainer';
			Localidades.opt.LocalidadeAjaxEditForm = '#LocalidadeAjaxEditForm';
			Localidades.opt.doEditarLocalidadBtn = '#doEditarLocalidadBtn';
			Localidades.opt.localidaMapaModal = '#localidaMapaModal';
			Localidades.opt.localidadesMapaContainer = '.localidadesMapaContainer';
			Localidades.opt.localidadesVendedoresModal = '#localidadesVendedoresModal';
			Localidades.opt.vendedoresLocalidadesForm = '#vendedoresLocalidadesForm';
			Localidades.opt.localidadesVendedoresBtn = '#localidadesVendedoresBtn';
			Localidades.opt.localidadesAdministradoresModal = '#localidadesAdministradoresModal';
			Localidades.opt.localidadesAdministradoresBtn = '#localidadesAdministradoresBtn';
			Localidades.opt.abreEditarlocalidadBtn = '.editarlocalidad';
			Localidades.opt.borraLocalidadBtn = '.borralocalidadbtn';
			Localidades.opt.editarLocalidadUrl = '/index.php/localidades/ajax_edit/';
			Localidades.opt.editarlocalidadFormModal = '#editarlocalidadFormModal';
			Localidades.opt.editarlocalidadesFormContainer = '.editarlocalidadesFormContainer';
			Localidades.opt.LocalidadeAjaxEditForm = '#LocalidadeAjaxEditForm';
			Localidades.opt.doEditarLocalidadBtn = '#doEditarLocalidadBtn';
			Localidades.opt.localidaMapaModal = '#localidaMapaModal';
			Localidades.opt.localidadesMapaContainer = '.localidadesMapaContainer';
			Localidades.opt.localidadesMapaUrl = '/index.php/localidades/map_agencia/';
			Localidades.opt.localidadesVendedoresModal = '#localidadesVendedoresModal';
			Localidades.opt.vendedoresLocalidadesForm = '#vendedoresLocalidadesForm';
			Localidades.opt.localidadesVendedoresBtn = '#localidadesVendedoresBtn';
			Localidades.opt.asignarVendedoresUrl = '/index.php/localidades/asignar_vendedores';
			Localidades.opt.localidadesAdministradoresModal = '#localidadesAdministradoresModal';
			Localidades.opt.localidadesAdministradoresBtn = '#localidadesAdministradoresBtn';
			Localidades.opt.administradoresLocalidadesForm = '#administradoresLocalidadesForm';
			Localidades.opt.asignarAdministradoresUrl = '/index.php/localidades/asignar_administradores';
			Localidades.opt.nuevaLocalidadUrl = '/index.php/localidades/ajax_add';
		
		Localidades.initc();		
	});
</script>
<!-- begin form modal -->
<!-- new -->
<div class="modal hide fade" id="localidadFormModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-tag"></i> Crear Localidad</h3>
			</div>
			<div class="modal-body localidadesFormContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
				<button id="nuevaLocalidadBtn" class="btn btn-primary btn-small"><i class="fa-icon-save"></i> Guardar</button>
			</div>
		</div>
<!-- edit -->
<div class="modal hide fade" id="editarlocalidadFormModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-tag"></i> Editar Localidad</h3>
			</div>
			<div class="modal-body editarlocalidadesFormContainer">
				<h1>ffqwerqwerwqer</h1>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
				<button id="doEditarLocalidadBtn" class="btn btn-primary btn-small"><i class="fa-icon-save"></i> Guardar</button>
			</div>
		</div>
<!-- map -->
<div class="modal hide fade" id="localidaMapaModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-tag"></i> Mapa Localidades</h3>
			</div>
			<div class="modal-body localidadesMapaContainer">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- usuarios password -->
<div class="modal hide fade" id="userPasswordModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-group"></i> Cambiar Password de Usuario</h3>
			</div>
			<div class="user-pass-modal-body">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>						
<!-- vendedores localidades -->
<div class="modal hide fade" id="localidadesVendedoresModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-group"></i> Vendedores de la Localidad</h3>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
				<button id="localidadesVendedoresBtn" class="btn btn-primary btn-small"><i class="fa-icon-save"></i> Guardar</button>
			</div>
		</div>
<!-- administradores localidades -->
<div class="modal hide fade" id="localidadesAdministradoresModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-user"></i> Administradores de la Localidad</h3>
			</div>
			<div class="modal-body">
				weeeeeeee
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
				<button id="localidadesAdministradoresBtn" class="btn btn-primary btn-small"><i class="fa-icon-save"></i> Guardar</button>
			</div>
		</div>							
<!-- end form modal -->
<br>
<div class="box-header btn-minimizeb   btn-minimizeb">
						<h2><i class="fa-icon-money"></i><span class="break"></span> Leads</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content hide">
	<a href="#/CrearNuevoLead/" class="btn btn-success btn-mini"><i class="fa-icon-plus"></i> Agregar Lead</a>  
<a href="#/LeadManager/" class="btn btn-success btn-mini"><i class="fa-icon-briefcase"></i> Lead Manager</a>
                        <a href="#/Buscar/"  class="btn btn-success btn-mini"><i class="fa-icon-search"></i> Buscar</a>
                        
                        <br>
 <a href="#/ReporteMarca/"  class="btn btn-success btn-mini"><i class="fa fa-motorcycle"></i> Reporte Marca</a>  
 <a href="#/ReporteModelo/"  class="btn btn-success btn-mini"><i class="fa fa-tags"></i> Reporte Modelo</a>     
 <a href="#/ReporteVendedor/"  class="btn btn-success btn-mini"><i class="fa-icon-user"></i> Reporte Vendedor</a>                         
					</div>


<!-- end localidades box -->	
	</div>
	<div class="span6">
<!-- begin agencia herramientas box -->		
<script>
	$(document).ready(function(){
		
			Agencia.options.abreAgenciaModelosModalBtn = '#abreAgenciaModelosModalBtn';
			Agencia.options.abreAgenciaNotificacionesModalBtn = '#abreAgenciaNotificacionesModalBtn';
			Agencia.options.modeloscontainer = '.modeloscontainer';
			Agencia.options.lista_modelos_url = '/index.php/agencias/lista_modelos';
			Agencia.options.agenciaModeloModal = '#agenciaModeloModal';
			Agencia.options.agenciaModelosContainer = '#agenciaModelosContainer';
			Agencia.options.agenciaModelosForm = '#agenciaModelosForm';
			Agencia.options.asignarModelosBtn = '#asignarModelosBtn';
			Agencia.options.modelos_agencia_url = '/index.php/agencias/modelos_agencia';
			Agencia.options.removerModeloAgenciaBtn = '.removermodeloagencia';
		
		Agencia.id = <?php echo $agencia['Agencia']['id'];?>;
		Agencia.init();
	});
</script>
<!-- begin modelos modal -->
<div class="modal hide fade" id="agenciaModeloModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa fa-motorcycle"></i> Modelos</h3>
			</div>
			<div class="modal-body modeloscontainer">
			aaaaaaa
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>
<!-- end modelos modal -->			
<!-- begin notificaciones modal -->
<div class="modal hide fade" id="agenciaNotificacionesModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-envelope"></i> Notificaciones</h3>
			</div>
			<div class="modal-body notificacionescontainer">
			aaaaaaa
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>			
<!-- end notificaciones modal -->		
		<div class="box-header btn-minimizeb   btn-minimizeb">
						<h2><i class="fa fa-motorcycle"></i><span class="break"></span> Modelos Disponibles</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<div id="modelosBox">
</div>
				<div class="actions">
	
	<ul>
		<li>
			<button id="abreAgenciaModelosModalBtn" type="button" class="btn btn-inverse btn-small">
				<i class="fa fa-motorcycle"></i> Modelos
			</button>
		</li>
		<li>
			<button id="abreAgenciaNotificacionesModalBtn" type="button" class="btn btn-inverse btn-small">
				<i class="fa-icon-external-link"></i> Notificaciones
			</button>
		</li>
	</ul>
</div>		
		</div>
<!-- end agencia herramientas box -->		
					
					
</div>
</div>
</div>
					<li>
<?php if($this->Session->read('is_admin')){?>
<div class="actions">
	
	<ul>
		<li><?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ".__('Edit Agencia'), array('action' => 'edit', $agencia['Agencia']['id']),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?> </li>
	
	
	<li><?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ".__('Delete'), array('action' => 'delete', $this->Form->value('Agencia.id')), array('type' => 'button',
    'class' => 'btn btn-danger btn-small ',
    'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Agencia.id'))); ?></li>
		<li>
			<?php echo $this->Html->link("<i class='fa-icon-tasks'></i> ".__('List Agencias'), array('action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?>
		</li>
	
	</ul>
</div>
<?php } ?>
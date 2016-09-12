<!-- start: Main Menu -->
<div class="span2 main-menu-span">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="#/Dashboard/"><i class="fa-icon-dashboard icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
					<?php if($this->Session->read('is_admin')){?>
					<li>

						<li><a class="dropmenu" href="#"><i class="fa-icon-group"></i> <span class="hidden-tablet"> Usuarios</span></a>
							<ul class="nav nav-tabs nav-stacked main-menu">
								<li><a class="submenu" href="#/SuperAdmins/"><i class="fa fa-user-md"></i> <span class="hidden-tablet"> SuperAdmins</span></a></li>
<li>
								<a class="dropmenu" href="#"><i class="fa fa-expeditedssl"></i><span class="hidden-tablet"> Accesos</span></a>
							<ul class="nav nav-tabs nav-stacked main-menu">

					<li><a class="submenu" href="#/Grupos/"><i class="icon-th"></i> <span class="hidden-tablet"> Grupos</span></a></li>
								<!-- <li>
								<a class="submenu" href="/index.php/acos"><i class="icon-tasks"></i> <span class="hidden-tablet"> Recursos</span></a>
							</li>
							<li><a class="submenu" href="/index.php/aros_acos"><i class="icon-road"></i> <span class="hidden-tablet"> Accesos</span></a></li>
							--></ul>
							</li>
							</ul>
						</li>

								<li>
								<a class="dropmenu" href="#"><i class="fa-icon-truck"></i><span class="hidden-tablet"> Manejo de Datos</span></a>
							<ul class="nav nav-tabs nav-stacked main-menu">
								<li>
									<a class="submenu" href="#/Formfinales/"><i class="fa fa-camera"></i> <span class="hidden-tablet"> Finales Form</span></a>
								</li>
							<li>
								<a class="submenu" href="#/Agencias/"><i class="fa fa-institution"></i> <span class="hidden-tablet"> Agencias</span></a>
							</li>
							<li>
								<a class="submenu" href="#/Marcas/"><i class="fa fa-motorcycle"></i> <span class="hidden-tablet"> Marcas</span></a>
							</li>
							<li>
								<a class="submenu" href="#/TiposDeMoto/"><i class="fa-icon-tags"></i> <span class="hidden-tablet"> Tipos de Moto</span></a>
							</li>
							</ul>
							</li>
							<li>
								<a class="dropmenu" href="#"><i class="fa-icon-print"></i><span class="hidden-tablet"> Reportes</span></a>
							<ul class="nav nav-tabs nav-stacked main-menu">

					<li><a class="submenu" href="#/ReportesAdminFechas/"><i class="fa fa-calendar"></i> <span class="hidden-tablet"> Fechas</span></a></li>
					<li><a class="submenu" href="#/ReportesAdminMapa/"><i class="fa fa-map-o"></i> <span class="hidden-tablet"> Mapa</span></a></li>
								<!-- <li>
								<a class="submenu" href="/index.php/acos"><i class="icon-tasks"></i> <span class="hidden-tablet"> Recursos</span></a>
							</li>
							<li><a class="submenu" href="/index.php/aros_acos"><i class="icon-road"></i> <span class="hidden-tablet"> Accesos</span></a></li>
							--></ul>
							</li>
					</li>
					<?php } ?>
					<?php if(($this->Session->read('is_administrador') || $this->Session->read('is_admin')) && $this->Session->read('agencia_id')){?>
					<li>
						<a href="#/Agencia/"><i class="fa-icon-home"></i><span class="hidden-tablet"> Agencia</span></a>

					</li>
					<li>
								<a class="submenu" href="#/Fuentes/"><i class="fa-icon-bullhorn"></i> <span class="hidden-tablet"> Fuentes</span></a>
							</li>
					<?php } ?>
					<?php if($this->Session->read('is_vendedor')  || $this->Session->read('is_administrador') || ($this->Session->read('is_admin') && $this->Session->read('agencia_id')) ){?>
					<li>
						<a class="dropmenu" href="#"><i class="fa-icon-money"></i><span class="hidden-tablet"> Ventas</span></a>
						<ul class="nav nav-tabs nav-stacked main-menu">

					<li><a class="submenu" href="#/CrearNuevoLead/"><i class="fa-icon-plus"></i> <span class="hidden-tablet"> Lead</span></a></li>
					<?php if($this->Session->read('is_administrador') || ($this->Session->read('is_admin') && $this->Session->read('agencia_id'))){?>
					<li>
						<a class="submenu" href="#/Buscar/"><i class="fa-icon-search"></i><span class="hidden-tablet"> Buscar</span></a>

					</li>
					<?php } ?>
							<?php if($this->Session->read('is_administrador') || ($this->Session->read('is_admin') && $this->Session->read('agencia_id'))){?>
						<li><a class="submenu" href="#/LeadManager/"><i class="fa-icon-laptop"></i> <span class="hidden-tablet"> Manager</span></a></li>

							<?php } ?>
							</ul>
					</li>
					<?php if($this->Session->read('is_administrador') || ($this->Session->read('is_admin') && $this->Session->read('agencia_id'))){?>
					<li>
						<a class="dropmenu" href="#"><i class="fa-icon-print"></i><span class="hidden-tablet"> Reportes</span></a>
						<ul class="nav nav-tabs nav-stacked main-menu">
					<li><a class="submenu" href="#/ReporteMarca/"><i class="fa fa-motorcycle"></i> <span class="hidden-tablet"> Marca </span></a></li>
					<li><a class="submenu" href="#/ReporteModelo/"><i class="fa fa-tags"></i> <span class="hidden-tablet"> Modelo</span></a></li>
					<li>
						<a class="submenu" href="#/ReporteVendedor/"><i class="fa-icon-user"></i><span class="hidden-tablet"> Vendedor</span></a>
					</li>
							</ul>
					</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div><!--/.well -->
		</div><!--/span-->
			<!-- end: Main Menu -->
<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
			<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
	</div>
</noscript>

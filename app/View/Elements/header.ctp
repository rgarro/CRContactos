<div id="overlay">
		<ul>
		  <li class="li1"></li>
		  <li class="li2"></li>
		  <li class="li3"></li>
		  <li class="li4"></li>
		  <li class="li5"></li>
		  <li class="li6"></li>
		</ul>
	</div>	
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php echo $this->element('nav_branding');?>
				<?php if($this->Session->read('agencia_id')){ ?>
					<a class="brand" href="#/Dashboard/"><?php echo $this->Agenciahelper->display_agencia_top_logo($this->Session->read('agencia_id')); ?></a>
				<?php } ?>					
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<li ><img src="/img/13-0.gif" width="15px" style="padding-top:10px;" class="preloader"></li>
						
<?php if($this->Session->read('is_administrador') ){ ?>
						<li>
							<a class="btn btn-inverse"  href="#/LeadManager/">
								 <i class="fa-icon-lemon icon-withe"></i> 
								<span class="label label-success"><span class="leads-nuevos-total">-1</span><span class="hidden-phone"> nuevos</span></span>
							</a>
						</li>
<?php } ?>
<?php if($this->Session->read('is_vendedor')  || $this->Session->read('is_administrador') ){ ?>						
						<li>
							<a class="btn btn-inverse"  href="#/Dashboard/">
								 <i class="fa-icon-leaf icon-withe"></i> 
								<span class="label label-warning"><span class="leads-atendiendo-total">-1</span><span class="hidden-phone"> atendiendo</span></span>
							</a>
						</li>
<?php } ?>						
						<!-- end: Message Dropdown -->
						<li>		
							<?php echo $this->Html->link("<i class='icon-wrench icon-white'></i> ", array('plugin' => 'users', 'controller' => 'users', 'action' => 'edit'),array('escape' => FALSE)); ?>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user icon-white"></i> <small><?php echo $username;?></small> 
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<i class="fa-icon-user"></i> <?php echo $this->Html->link(__d('users', 'My Account'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'edit')); ?>
									</li>
								<li><?php echo $this->Html->link("<i class='icon-off'></i>  ".__d('users', 'Logout'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'),array('escape' => FALSE)); ?></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
	
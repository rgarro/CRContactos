<div class="box">
	<div class="box-header">
		<h2 class="animated flash"><i class="fa fa-user-md"></i> Super Administradores</h2>
	</div>
	<div class="box-content">
						<ul class="nav tab-menu nav-tabs" id="mySaTab">
							<li class="active"><a href="#listaSa"><i class="fa fa-icon-list"></i> Lista</a></li>
							<li class=""><a href="#crearSa"><i class="fa fa-icon-plus"></i> Nuevo</a></li>
							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="listaSa">
							
							</div>
							<div class="tab-pane" id="crearSa">
							
							</div>
						</div>
<!-- usuarios password -->
<div class="modal hide fade" id="saPasswordModal">
			<div class="modal-header">
				<?php echo $this->element('preloader_img');?>
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3><i class="fa-icon-group"></i> Cambiar Password de Usuario</h3>
			</div>
			<div class="sa-pass-modal-body">
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-small" data-dismiss="modal"><i class="fa-icon-off"></i> Cerrar</button>
			</div>
		</div>												
	</div>
<script>
$(document).ready(function(){
    $(sa.opt.tabs + ' a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
	});
	
	sa.init();
	
	$(document).on('click','.borra-sa',function(){
		var user_id =  $(this).attr("user_id");
				if(window.confirm("Borrar SuperAdmin?")){
					sa.delete(user_id);
				}
	})
	
	$(document).on('click','.cambia-sa',function(){
		var user_id =  $(this).attr("user_id");
		var status =  $(this).attr("status");
				if(window.confirm("Cambiar Status?")){
					sa.setStatus(user_id,status);
				}
	});
	
	$(document).on('click','.cambia-sa-pass',function(){
		var user_id =  $(this).attr("user_id");
		sa.show_change_user_pass(user_id);
	})
	
});
</script>	
</div>
<div class="users form" style="padding: 10px;">
<h4>Cambiar Password de <?php echo $user['User']['nombre'];?> <?php echo $user['User']['apellido'];?></h4>

	<?php
		echo $this->Form->create($model, array('action' => 'change_user_password','inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
));
		/*echo $this->Form->input('old_password', array(
			'label' => __d('users', 'Old Password'),
			'type' => 'password'));*/
			echo $this->Form->input('id',array("value"=>$user_id));
		echo $this->Form->input('password', array(
			'label' => __d('users', 'New Password'),
			'type' => 'password'));
		/*echo $this->Form->input('confirm_password', array(
			'label' => __d('users', 'Confirm'),
			'type' => 'password'));*/
		echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Cambiar"));
	?>
</div>
<script>
	$(document).ready(function(){
		
		<?php if(isset($_GET['my_user_id'])){ ?>
			$("#UserChangeUserPasswordForm").on("submit",function(){
			 $(this).ajaxSubmit({
			 	success:function(data){
			 		CRContactos_Manager.check_errors(data);
			 		$(sa.opt.passwordModal).modal("hide");
			 		noty({text: "Se cambio el Password del SuperAdmin.",layout:'topLeft',type:'success'});
//alert(data);			 		
			 	}
			 }); 
			return false;
		});
		<?php }else{ ?>
		$("#UserChangeUserPasswordForm").on("submit",function(){
			 $(this).ajaxSubmit({
			 	success:function(data){
			 		CRContactos_Manager.check_errors(data);
			 		$(Agencia.opt.userPasswordModal).modal("hide");
			 		noty({text: "Se cambio el Password del usuario.",layout:'topLeft',type:'success'});
//alert(data);			 		
			 	}
			 }); 
			return false;
		});
		<?php } ?>
	});
</script>
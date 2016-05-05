<?php
/**
 * Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-plus"></i><span class="break"></span> Crear Super Administrador</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
		<?php
			echo $this->Form->create($model, array(
				'id' => 'crearSaFrm',
				'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
));?>
<fieldset>
		<legend><i class="fa-icon-user"> Datos Personales</i></legend>
<?php
echo $this->Form->input('nombre', array(
				'label' => 'Nombre'));
echo $this->Form->input('apellido', array(
				'label' => 'Apelllido'));
echo $this->Form->input('telefono', array(
				'label' => 'Telefono'));								
?>
</fieldset>		
<fieldset>
		<legend><i class="fa-icon-laptop"> Datos Usuario</i></legend>
<?php
			echo $this->Form->input('username', array(
				'label' => __d('users', 'Username')));
			echo $this->Form->input('email', array(
				'label' => __d('users', 'E-mail (used as login)'),
				'error' => array('isValid' => __d('users', 'Must be a valid email address'),
				'isUnique' => __d('users', 'An account with that email already exists'))));
			echo $this->Form->input('password', array(
				'label' => __d('users', 'Password'),
				'type' => 'password'));
			echo $this->Form->input('temppassword', array(
				'label' => __d('users', 'Password (confirm)'),
				'type' => 'password'));
			//$tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos', 'plugin' => null));
			//echo $this->Form->input('tos', array(
				//'label' => __d('users', 'I have read and agreed to ') . $tosLink));
				echo $this->Form->input('is_admin', array('type'=>'hidden','value' => 1));
				echo $this->Form->input('email_verified', array('type'=>'hidden','value' => 1));
?>
</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Crear Super Administrador")); ?>
</div>
</div>
<script>
$(document).ready(function(){
   
	$(sa.opt.addFrm).on("submit",function(e){
		if (event.preventDefault) {
        	event.preventDefault();
    	}
    	// otherwise set the returnValue property of the event to false (IE)
    	event.returnValue = false;	
		var sa_datos = $(sa.opt.addFrm).serializeHash();				
			sa.add(sa_datos.data);
			return false;
		});
});
</script>
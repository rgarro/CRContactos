<div class="agencias form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="icon-home"></i><span class="break"></span> Nueva Agencia</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Agencia', array('type' => 'file',
	'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal'
)); ?>
	<fieldset>
		<legend><i class="icon-list-alt"></i> <?php echo __('infofieldset'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		?>
<img id="previewAgenciaPic" src="/img/motosil1.png" width="120" class='img-polaroid' style="margin-left: 18%;"/><br>		
<?php		
		echo $this->Form->input('Agencia.logo', array('type' => 'file')); 
     	echo $this->Form->input('Agencia.logo_file', array('type' => 'hidden')); 
		echo $this->Form->input('cedula_juridica');
		echo $this->Form->input('razon_social');
	?>	
	</fieldset>
	<fieldset>
		<legend><i class="fa-icon-globe"></i> Localización</legend>
	<?php	
		echo $this->Form->input('direccion');
		?>
		<small>Ej.: calle 25 ave 52</small>
		<?php
		echo $this->Form->input('canton');
		echo $this->Form->input('distrito');
		echo $this->Form->input('provincia',array('options' =>array('Alajuela'=>'Alajuela', 'Heredia'=>'Heredia','Cartago'=>'Cartago','SanJose'=>'SanJose','Puntarenas'=>'Puntarenas','Guanacaste'=>'Guanacaste','Limon'=>'Limon')));
		echo $this->Form->input('telefono');
		echo $this->Form->input('codigo_postal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link("<i class='icon-home'></i> ".__('List Agencias'), "#/Agencias/",array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
		
	</ul>
</div>
<script type="text/javascript" >
	$(document).ready(function(){
		$('#previewAgenciaPic').hide();
		
			$("#AgenciaLogo").change(function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previewAgenciaPic').attr('src', e.target.result);
                $('#previewAgenciaPic').show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
	});
</script>
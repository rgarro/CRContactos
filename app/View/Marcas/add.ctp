<div class="marcas form">
		<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-star"></i><span class="break"></span> <?php echo __('Add Marca'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Marca', array('type' => 'file',
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
		<legend><?php echo __('infofieldset'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
?>
<img id="previewMarcaPic" src="/img/motosil1.png" width="120" class='img-polaroid' style="margin-left: 18%;"/><br>
<?php		
	 echo $this->Form->input('Marca.logo', array('type' => 'file')); 
     echo $this->Form->input('Marca.logo_file', array('type' => 'hidden')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	
	<ul>

		<li><?php echo $this->Html->link("<i class='fa-icon-tasks'></i> ".__('List Marcas'), array('action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small',
    'escape' => false)); ?></li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#previewMarcaPic').hide();
		
			$("#MarcaLogo").change(function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previewMarcaPic').attr('src', e.target.result);
                $('#previewMarcaPic').show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
	});
</script>

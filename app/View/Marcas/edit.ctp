<div class="marcas form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-star"></i><span class="break"></span> <?php echo __('Edit Marca'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<h3><?php echo $this->Html->image("{$marca['Marca']['logo_file']}/{$marca['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid"));?>
	<i class="fa-icon-star"></i> <?php echo $marca['Marca']['nombre'];?>
</h3>
<!-- chage logo form -->
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
		<legend><i class="fa-icon-picture"></i> Cambiar Logo</legend>
	<?php
		echo $this->Form->input('id');
		?>
<img id="previewMarcaPic" src="/img/motosil1.png" width="120" class='img-polaroid' style="margin-left: 18%;"/><br>
<?php
		 echo $this->Form->input('Marca.logo', array('type' => 'file')); 
     echo $this->Form->input('Marca.logo_file', array('type' => 'hidden')); 
		
	?>
	</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Guadar")); ?>
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
<!-- change name form -->						
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
		<legend><i class="fa-icon-edit"></i> <?php echo __('infofieldset'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		
	?>
	
	</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Guadar")); ?>
</div>
</div>
<div class="actions">
	
	<ul>

		<li><?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ".__('Delete'), array('action' => 'delete', $this->Form->value('Marca.id')), array('type' => 'button',
    'class' => 'btn btn-danger btn-small ',
    'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Marca.id'))); ?></li>
	</ul>
</div>

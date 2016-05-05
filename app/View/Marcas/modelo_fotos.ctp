<div class="box-content">
<h3><?php echo $this->Html->image("{$modelo['Marca']['logo_file']}/{$modelo['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?> <?php echo $modelo['Modelo']['modelo'];?> <i class="fa-icon-picture"></i></h3>	
<div class="row">
<div id="modeloFotosListaContainer" class="span3">

</div>
</div>
<br>	
<?php 
echo $this->Form->create('ModeloPic', array(
										'type' => 'file',
										'inputDefaults' => array(
											'div' => 'control-group',
											'label' => array(
												'class' => 'control-label'
												),
											'wrapInput' => 'controls'
											),
										'class' => 'well form-horizontal',
										'url'=>array("controller"=>"marcas","action"=>"agregar_modelo_pic")
									)); ?>
	<fieldset>
		<legend><i class="fa-icon-camera-retro"></i> Agregar</legend>
		<center>
		<img id="previewModelPic" src="/img/motosil1.png" width="120" class='img-polaroid'/>
	<?php
		echo $this->Form->input('modelo_id',array("type"=>"hidden","value"=>$modelo['Modelo']['id']));
		echo $this->Form->input('ModeloPic.pic', array('type' => 'file')); 
     	echo $this->Form->input('ModeloPic.pic_file', array('type' => 'hidden')); 
	?>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="15" aria-valuemax="40" style="width: 60%;">
    60%
  </div>
</div>	
	<center>
	</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>__('Submit'))); ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var bar = $('.bar');
	var status = $('.progress');
   	status.hide();
   	$('#previewModelPic').hide();
   
   	$("#ModeloPicPic").change(function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previewModelPic').attr('src', e.target.result);
                $('#previewModelPic').show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
   
   $('#ModeloPicModeloFotosForm').on("reset",function(){
   	$('#previewModelPic').hide();
   });
   
	$('#ModeloPicModeloFotosForm').ajaxForm({
    	beforeSend: function() {
        	status.show();
        	var percentVal = '0%';
        	bar.css("width",percentVal);
    	},
    	uploadProgress: function(event, position, total, percentComplete) {
        	var percentVal = percentComplete + '%';       	
        	bar.css("width",percentVal);
    	},
    	success: function(data) {
			Marcas.check_errors(data);
			if(data.invalid_form == 1){
				Marcas.noty_form_errors(data.error_list);
				status.hide();
				$('#ModeloPicModeloFotosForm')[0].reset();
			}
			if(data.is_success == 1){
				var n = noty({text: "Imagen agregada.",layout:'topLeft',type:'success'});
				var percentVal = '100%';
        	bar.css("width",percentVal);
        	window.setTimeout(function(){
        		status.hide();
				Marcas.cargar_modelo_fotos(<?php echo $modelo['Modelo']['id'];?>);
				$('#ModeloPicModeloFotosForm')[0].reset();
        	},1000);
			}		
    	},
		dataType:'json'	
	});
});
</script>	
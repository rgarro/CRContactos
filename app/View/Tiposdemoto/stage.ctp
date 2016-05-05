<div class="box">
	<div class="box-header">
		<h2 class="animated rollIn"><i class="fa fa-tags"></i> Tipos de Moto</h2>
	</div>
	<div class="box-content">
						<ul class="nav tab-menu nav-tabs" id="myTipoTab">
							<li class="active"><a href="#listaTipos"><i class="fa fa-icon-list"></i> Lista</a></li>
							<li class=""><a href="#crear"><i class="fa fa-icon-plus"></i> Nuevo</a></li>
							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="listaTipos">
							
							</div>
							<div class="tab-pane" id="crear">
								
								<div class="eventos form">
<?php echo $this->Form->create('Tipo', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'form-horizontal style-form',
	'onSubmit'=>"javascript:return false"
)); ?>
	<fieldset>
		<legend>Tipo de Moto</legend>
	<?php
		echo $this->Form->input('nombre',array("label"=>'<i class="fa fa-tag"></i>  Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(array('class'=>'btn btn-success','label'=>__d('users', 'Crear'))); ?>
</div>
								
							</div>
						</div>					
	</div>
<script>
$(document).ready(function(){
    $(tipos.opt.tabs + ' a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
	});
	
	$(tipos.opt.addFrm).on("submit",function(e){
		var tipo_datos = $(tipos.opt.addFrm).serializeHash();					
			tipos.add(tipo_datos.data);
			return false;
		});
	
	tipos.init();
	
});
</script>	
</div>
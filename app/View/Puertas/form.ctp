<script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript" src="/app/webroot/js/jquery.serialize-hash.js"></script>
<script type="text/javascript" src="/app/webroot/js/crcontactos_manager.js"></script>
<script type="text/javascript" src="/app/webroot/js/agregar_lead_manualp.js"></script>
<script type="text/javascript">
function manage_position(position) {
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
	$("#LeadLat").attr("value",latitude);
	$("#LeadLon").attr("value",longitude);
}

	$(document).ready(function(){
		//navigator.geolocation.getCurrentPosition(manage_position);
		$("#LeadLat").attr("value","9.74891699");
		$("#LeadLon").attr("value","-83.75342799");
		AddLead.getOptions({
			'modelocheck':'.modelocheck',
			'LeadAgregarLeadDirectamenteForm':'#LeadFormForm',
			'LeadModelos':'#LeadModelos'
		});
		AddLead.init();
		$('#myCarousel').carousel();
	});
</script>
<div class="agencias form">

<?php
foreach($modelos_agencia as $m){
	if($m['Marca']['id'] == $_GET['marca_id']){
		$mm = $m;
	}
}
 echo $this->Form->create('Lead', array('type' => 'file',
	'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal',
	'style' => 'background-color: #FFFFFF;',
	'name'=>'test',
	'url'=>array("controller"=>"puertas","action"=>"form?agencia_id=".$_GET['agencia_id']."&marca_id=".$_GET['marca_id'])
)); ?>
	<fieldset style="background-color: #FFFFFF;">
		<h3>&nbsp; &nbsp; &nbsp; &nbsp;
			<img src="http://www.crmotos.com/motocicletas/logo-crm.jpg" width="75">&nbsp; &nbsp; &nbsp; &nbsp; Contacte su Agencia &nbsp; &nbsp;  &nbsp; &nbsp;
			<?php echo $this->Html->image("{$mm['Marca']['logo_file']}/{$mm['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"75"));?>
			</h3>
<?php
echo $this->Form->input('agencia_id', array('type'=>'hidden','value' => $_GET["agencia_id"]));
echo $this->Form->input('modelos', array('type'=>'hidden'));
echo $this->Form->input('marca_id', array('type'=>'hidden','value' => $_GET['marca_id']));
echo $this->Form->input('fuente', array('type'=>'hidden','value' => 'crmotos.com'));
?>
<!-- begin lista fotos -->
<small style="color:#9C1903;">* Seleccione un modelo.</small>
<div id="myCarousel" class="carousel slide">
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" style="min-height: 70px !important;">
<?php
$i = 0;
$ia = 0;

foreach($modelos_agencia as $mages){
	foreach($mages['Marca']['Modelo'] as $m){
	if($m['Marca']['id'] == $_GET['marca_id']){
?>
<?php
if($i==0){
?>
<div class="item <?php echo ($ia==0? 'active':'');?>">
                	<div class="row-fluid">
<?php
}
?>
<div style="float:left;margin-left: 5px;">
<span class="badge badge-important">
<?php
		if(count($m['ModeloPic'])){
?>
<?php echo $this->Html->image("{$m['ModeloPic'][0]['pic_file']}/{$m['ModeloPic'][0]['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"80px"));?>
<?php
		}else{

?>
<img id="previewModelPic" src="/img/motosil1.png" width="80" class='img-polaroid'/>
<?php
		}
?>
<br>
<br>
<input type="checkbox" name="checkgroup" value="<?php echo $m['modelo'];?>" class="modelocheck"/>	<i class="fa-icon-cog"></i> <?php echo $m['modelo'];?>

</span>
</div>
<?php
if($i==2){
?>
</div></div>
<?php
}
$i++;
$ia++;
if($i==3){
	$i = 0;
}
	}
}
}
?>
</div>
<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<!-- end-->
<!-- end lista fotos -->
	</fieldset>
	<fieldset>
		<h4 style="color:#9C1903;"><i class="fa-icon-user"></i> Datos Personales</h4>
<?php
echo $this->Form->input('nombre', array('label' => 'Nombre'));
echo $this->Form->input('primer_apellido', array('label' => 'Primer Apelllido'));
echo $this->Form->input('segundo_apellido', array('label' => 'Segundo Apelllido'));
echo $this->Form->input('email', array('label' => 'Email'));
echo $this->Form->input('celular', array('label' => 'Celular'));
echo $this->Form->input('telefono', array('label' => 'Telefono'));
echo $this->Form->input('horario',array('label'=>'Seleccione un horario','options' =>$this->App->opciones_horario()));
?>
	</fieldset>
	<fieldset>
		<h4 style="color:#9C1903;"><i class="fa-icon-globe"></i> Dirección</h4>
<?php
echo $this->Form->input('direccion', array('label' => 'Dirección'));
//echo $this->Form->input('distrito', array('label' => 'Distrito'));
echo $this->Form->input('canton', array('label' => 'Ciudad'));
echo $this->Form->input('provincia',array('label'=>'Seleccione la provincia','options' =>$this->App->opciones_provincias()));
echo $this->Form->input('status', array('type'=>'hidden','value' => 1));
?>
	</fieldset>
<fieldset>
		<h4 style="color:#9C1903;">Comentarios <i class="fa-icon-comment"></i></h4>
<?php
echo $this->Form->input('comentario', array('type'=>'textarea'));
//echo $this->Form->input('fuente', array('options'=>$fuentes));
echo $this->Form->input('boletin', array('type'=>'hidden','value' => 1));
echo $this->Form->input('lat', array('type'=>'hidden','value' => 0));
echo $this->Form->input('lon', array('type'=>'hidden','value' => 0));
?>
	</fieldset>
<?php echo $this->Form->end(array("class"=>"btn btn-danger","label"=>"Enviar")); ?>
</div>

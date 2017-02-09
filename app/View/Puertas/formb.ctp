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
		////navigator.geolocation.getCurrentPosition(manage_position);
		$("#LeadLat").attr("value","9.74891699");
		$("#LeadLon").attr("value","-83.75342799");
		AddLead.getOptions({
			'modelocheck':'.modelocheck',
			'LeadAgregarLeadDirectamenteForm':'#LeadFormForm',
			'LeadModelos':'#LeadModelos'
		});
		AddLead.initB();
	});
</script>
<div class="agencias form">
<?php
print_r($_SESSION);
if(isset($_SESSION["lead_set"]) && $_SESSION["lead_set"]==1){
    //$this->
    $_SESSION["lead_set"] = 0;
?>
<center>
	<?php
	if(isset($_SESSION["finale_data"])){
	list($fb1, $fb2) = array_chunk($_SESSION["finale_banners"], ceil(count($_SESSION["finale_banners"]) / 2));
	foreach($fb1 as $p){
	?>
	<a href="<?php echo $p["Publicidad"]['target_url'];?>" target="_blank"><img class="img-polaroid" src="/app/webroot/files/publicidad/<?php echo $p["Publicidad"]['id'];?>/<?php echo $p["Publicidad"]['Filename'];?>" /></a><br>
	<?php
}}
	?>
<?php
if(isset($_SESSION["finale_data"])){

	echo $_SESSION["finale_data"]['Formfinale']['content']."<br>";
	?>
<a href="<?php echo $_SESSION["finale_data"]['Formfinale']['target_url'];?>" target="_blank"><img class="img-polaroid" src="/app/webroot/files/formfinale/<?php echo $_SESSION["finale_data"]['Formfinale']['id'];?>/<?php echo $_SESSION["finale_data"]['Formfinale']['Filename'];?>" /></a>
<br>
<br>
<?php
foreach($fb2 as $p){
?>
<a href="<?php echo $p["Publicidad"]['target_url'];?>" target="_blank"><img class="img-polaroid" src="/app/webroot/files/publicidad/<?php echo $p["Publicidad"]['id'];?>/<?php echo $p["Publicidad"]['Filename'];?>" /></a><br>

<?php
}
?>
</center>
<?php
	unset($_SESSION["finale_banners"]);
	unset($_SESSION["finale_data"]);
}else{
	?>
	<h4 style="color:#9C1903;">Gracias por enviarnos su solicitud de Información.
	<br>
	Uno de nuestros Ejecutivos de Venta lo estará contactando para brindarle mayor información y toda la ayuda que usted necesite.</h4>
	<br>
	<?php
}
}else{
?>

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
	'url'=>array("controller"=>"puertas","action"=>"formb?agencia_id=".$_GET['agencia_id']."&marca_id=".$_GET['marca_id'])
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
<fieldset>
		<h4 style="color:#9C1903;"><i class="fa-icon-cogs"></i> Modelo</h4>
		<div class="control-group required">
			<div class="controls required">
<select name="data[Lead][modelos]" id="LeadModelos" required="required">
	<option value="" disabled=""  selected="">*Seleccione un modelo</option>
<?php
$i = 0;
$ia = 0;

foreach ($modelos_agencia as $k) {
foreach($k['Marca']['Modelo'] as $m){
	if($m['marca_id'] == $_GET['marca_id']){
?>
<option value="<?php echo $m['modelo'];?>"><?php echo $m['modelo'];?></option>
<?php
		}}}
?>
</select></div></div>
</fieldset>
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
<?php
}
?>
</div>

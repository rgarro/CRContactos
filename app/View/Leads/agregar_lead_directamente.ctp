
<script type="text/javascript">
	$(document).ready(function(){
		AddLead.modelocheck = '.modelocheck';
		AddLead.LeadAgregarLeadDirectamenteForm = '#LeadAgregarLeadDirectamenteForm';
		AddLead.LeadModelos = '#LeadModelos';
		AddLead.init();
	});
</script>
<div class="agencias form">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-money"></i><span class="break"></span> Agregar Lead</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php echo $this->Form->create('Lead', array('type' => 'file',
	'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'
		),
		'wrapInput' => 'controls'
	),
	'class' => 'well form-horizontal',
	'name'=>'test'
)); ?>
	<fieldset>
		<legend><i class="fa-icon-film"></i> Modelos</legend>
<?php
echo $this->Form->input('agencia_id', array('type'=>'hidden','value' => $this->Session->read("agencia_id")));
//echo $this->Form->input('modelos', array('type'=>'hidden'));
echo $this->Form->input('marca_id', array('type'=>'hidden','value' => $modelos_agencia[0]['Marca']['id']));
//print_r($modelos_agencia[0]);
//foreach($modelos_agencia as $m){
?>
<div class="control-group required">
			<div class="controls required">
<select name="data[Lead][modelos]" id="LeadModelos" required="required">
	<option value="" disabled=""  selected="">*Seleccione un modelo</option>	
<?php
$i = 0;
$ia = 0;
foreach ($modelos_agencia as $k) {
	

foreach($k['Marca']['Modelo'] as $m){
	//if($m['Modelo']['marca_id'] == $_GET['marca_id']){
?>
<option value="<?php echo $m['modelo'];?>"><?php echo $m['modelo'];?></option>
<?php
		}}	//}
?>
</select></div></div>
	</fieldset>
	<fieldset>
		<legend><i class="fa-icon-user"></i> Datos Personales</legend>
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
		<legend><i class="fa-icon-globe"></i> Dirección</legend>
<?php
echo $this->Form->input('direccion', array('label' => 'Dirección'));
//echo $this->Form->input('distrito', array('label' => 'Distrito'));
echo $this->Form->input('canton', array('label' => 'Ciudad'));
echo $this->Form->input('provincia',array('options' =>$this->App->opciones_provincias()));
echo $this->Form->input('status', array('type'=>'hidden','value' => 1));								
?>	
	</fieldset>	
	<fieldset>
		<legend>Comentarios <i class="fa-icon-comment"></i></legend>
<?php
echo $this->Form->input('comentario', array('type'=>'textarea'));
echo $this->Form->input('fuente', array('options'=>$fuentes));								
echo $this->Form->input('boletin', array('type'=>'hidden','value' => 1));								
echo $this->Form->input('lat', array('type'=>'hidden','value' => 0));
echo $this->Form->input('lon', array('type'=>'hidden','value' => 0));
?>	
	</fieldset>	
<?php echo $this->Form->end(array("class"=>"btn btn-success","label"=>"Crear")); ?>
</div>
</div>

<?php 
//echo $agencia['Agencia']['nombre'];?>
<div id="agenciaModelosContainer">
</div>
<br>
<form class="well form-inline" id="agenciaModelosForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="agencia_id" value="<?php echo $this->Session->read('agencia_id');?>"/>
<fieldset>
<center>
<i class="fa-icon-truck"></i>	
<select name="modelo_id">
<?php 
foreach($agencia_marcas as $am){ 
	foreach($am['Marca']['Modelo'] as $m){	
?>
	<option value="<?php echo $m['id'];?>"><?php echo $m['Marca']['nombre']." - ".$m['modelo'];?></option>
<?php } } ?>	
</select> <button id="asignarModelosBtnB" type="button" class="btn btn-success btn-small"><i class="fa-icon-road"></i> Asignar</button>
</center>
</fieldset>
</form>	
<h1><?php echo $agencia['Agencia']['nombre'];?></h1>
<div id="agenciaMarcasContainer">
</div>
<form class="well form-horizontal" id="agenciaMarcaForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="agencia_id" value="<?php echo $agencia['Agencia']['id'];?>"/>
<fieldset>
<legend>Marcas Disponibles</legend>
<select name="marca_id">
<?php foreach($marcas as $m){ ?>
	<option value="<?php echo $m['Marca']['id'];?>"><?php echo $m['Marca']['nombre'];?></option>
<?php } ?>	
</select>
</fieldset>
<br>
<button id="agenciaMarcasBtn" type="button" class="btn btn-primary btn-small"><i class="fa-icon-save"></i> Asignar Marca</button>
</form>		
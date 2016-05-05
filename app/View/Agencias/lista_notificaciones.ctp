<?php 
//echo $agencia['Agencia']['nombre'];?>
<div id="agenciaNotificacionesContainer">
</div>
<br>
<form class="well form-inline" id="agenciaNotificacionesForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="agencia_id" value="<?php echo $this->Session->read('agencia_id');?>"/>
<fieldset>
<center>
<i class="fa-icon-envelope"></i>	
 <input type="text" name="email" size="50" maxlength="70"/>
 <button id="asignarNotificacionBtn" type="button" class="btn btn-success btn-small"><i class="fa-icon-plane"></i> Asignar</button>
 <br>
 <span class="badge badge-warning"><small>* PorFavor digite dirección de email  <b>válida</b> nombre@dominio.com</small></span>
</center>
</fieldset>
</form>	
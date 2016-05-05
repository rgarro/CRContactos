<div class="well">
<dl>
	<dt><i class="glyphicon glyphicon-camera"></i> Foto</dt><dd><?php echo $this->Gravatar->displayProfilePicture("",$data['email']);?></dd>
	<dt><i class="glyphicon glyphicon-cog"></i> Modelos</dt><dd><?php echo $data['modelos']; ?></dd>
	<dt><i class="glyphicon glyphicon-user"></i> Nombre Completo</dt><dd><?php echo $data['nombre']." ".$data['primer_apellido']." ".$data['segundo_apellido']; ?></dd>
<dt><i class="glyphicon glyphicon-envelope"></i> Email</dt><dd><a class="btn btn-primary btn-sm" href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></dd>
<dt><i class="glyphicon glyphicon-phone"></i> Celular</dt><dd><?php echo $data['celular']; ?></dd>
<dt><i class="glyphicon glyphicon-phone-alt"></i> Teléfono</dt><dd><?php echo $data['telefono']; ?></dd>
<dt><i class="glyphicon glyphicon-phone-alt"></i> Dirección</dt><dd><?php echo $data['direccion']." ".$data['canton']." ".$data['provincia'] ; ?></dd>
<dt><i class="glyphicon glyphicon-comment"></i> Comentario</dt><dd><?php echo $data['comentario']; ?></dd>
<dt><i class="glyphicon glyphicon-comment"></i> Fuente</dt><dd><?php echo $data['fuente']; ?></dd>
<dt><i class="glyphicon glyphicon-envelope"></i> Recibir Boletín</dt><dd><?php echo ($data['boletin'] == 1? "si":"no"); ?></dd>

</dl>
</div>
<div class="alert alert-success">
<center>	
<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $data['lat']; ?>,<?php echo $data['lon']; ?>&zoom=14&size=400x400&markers=color:blue%7Clabel:S%7C<?php echo $data['lat']; ?>,<?php echo $data['lon']; ?>"/>
</center>
</div>
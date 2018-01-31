<p>Estimado <?php echo $data['nombre']." ".$data['primer_apellido'];?> :
<br><br>
Solicito informacion por medio de CRMotos.com del siguiente modelo:<br><br></p>
<div class="well">
<?php
foreach($pics as $p){
?>
<img src="http://crcontactos.com/<?php echo $p['file'];?>" alt="<?php echo $p['label'];?>" width="125px" class="img-thumbnail">
<?php
}
?><br>
 <?php echo $data['modelos']; ?>
<br>
<?php echo $data['comentario']; ?>
</div>
<p>Muchas Gracias por utilizar los servicios de <a href="http://crmotos.com" target="_blank">CRMotos.com</a></p>

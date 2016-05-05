<h4 class="alert alert-info"><i class="glyphicon glyphicon-user"></i> <?php echo $data['nombre']." ".$data['primer_apellido'];?> de <?php echo $data['canton']; ?> Busca <?php echo $data['modelos']; ?> <i class="glyphicon glyphicon-road"></i></h4>
<div class="well">
<?php
foreach($pics as $p){
?>
<img src="http://crcontactos.com/<?php echo $p['file'];?>" alt="<?php echo $p['label'];?>" width="125px" class="img-thumbnail">
<?php
}
?>
</div>
<?php
echo $this->element('lead_email_well_box',array('data'=>$data));
?>
<div class="alert alert-warning">
	<a href="http://crcontactos.com/#/LeadManager/" class="btn btn-primary btn-sm" role="button"><i class="glyphicon glyphicon-zoom-in"></i> Dar Seguimiento</a>
</div>	

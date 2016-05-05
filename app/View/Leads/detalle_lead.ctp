<?php
$box_id = "box".$lead['Lead']['id'];
$status_class = "badge ";
$status_text = ""; 
$fecha = "";
$is_seguidore = false;
$seguidore = array();
foreach($lead['Seguidores'] as $l){
	if($l['user_id'] == $user_id){
		$is_seguidore = true;
		$seguidore = $l;
	}
}

if($lead['Lead']['status'] == 1){
	$status_class .= "badge-success";
	$status_text = "Nuevo"; 
	$fecha = $lead['Lead']['creadad'];
}else{
	$fecha = $lead['Lead']['cambio'];
}
if($lead['Lead']['status'] == 2){
	$status_class .= "badge-warning";
	$status_text = "Asignado"; 
}
if($lead['Lead']['status'] == 3){
	$status_class .= "badge-important";
	$status_text = "Vendido"; 
}
if($lead['Lead']['status'] == 4){
	$status_class .= "badge-info";
	$status_text = "Archivado"; 
}
if($lead['Lead']['status'] == 5){
	$status_class .= "badge-inverse";
	$status_text = "Activo"; 
}
?>
<div class=r"row-fluid">
<div class="span4">
<h3><span class="badge <?php echo $status_class;?>"><i class="fa-icon-star"></i> <?php echo $status_text;?> &nbsp;&nbsp;&nbsp; <i class='fa-icon-calendar'></i> <?php echo $fecha;?></span></h3>	
<?php
if($lead['Lead']['status'] == 1){
?>
<div class="alert fade in">
            <button type="button" class="close">×</button>
            <strong>Atención:</strong> debe asignar seguidores antes. 
          </div>
<?php
}else{
?>
<!-- espacio activo -->
<h5>
<a class="quick-button-small span1">
							<i class="fa-icon-group"></i>
							<small>Agentes</small>
							<span class="notification"><?php echo count($lead['Seguidores']);?></span>
					</a> 
<a class="quick-button-small span1">
							<i class="fa-icon-tasks"></i>
							<small>Seguimientos</small>
							<span class="notification red total-seguimientos">0</span>
					</a>
</h5>	
<h4 class="badge <?php echo $status_class;?> switch span3">
<?php if($is_seguidore && $seguidore['status'] == 1){ ?>	
<button lead_seguidore_id="<?php echo $seguidore['id'];?>" type="button" class="btn btn-small activar-participacion">
	<image src="/img/animated-helmet-image-0005.gif" width="25"/>
Activar
</button>
<?php } else { ?>
<ul>
    <li lead_id="<?php echo $lead['Lead']['id'];?>" status="5" class="<?php if($lead['Lead']['status'] == 5){ echo 'on';};?>"><a href="javascript:void(0)"><i class="fa-icon-star"></i> Activar</a></li>
    <li lead_id="<?php echo $lead['Lead']['id'];?>" status="3" class="<?php if($lead['Lead']['status'] == 3){ echo 'on';};?>"><a href="javascript:void(0)"><i class="fa-icon-shopping-cart"></i> Vender</a></li>
    <li lead_id="<?php echo $lead['Lead']['id'];?>" status="4" class="<?php if($lead['Lead']['status'] == 4){ echo 'on';};?>"><a href="javascript:void(0)"><i class="fa-icon-inbox"></i> Archivar</a></li>
</ul>
<?php } ?>
<?php if($this->Session->read('is_administrador') && !$is_seguidore){ ?>

<?php } ?>
</h4> 
<script type="text/javascript">
$(document).ready(function(){
	
	
});
</script>   
<!-- begin seguimientos -->
<div id="listaSeguimientosContainer">
</div>
<?php 
echo $this->Form->create('LeadSeguimiento', array(
										'type' => 'file',
										'inputDefaults' => array(
											'div' => 'control-group',
											'label' => array(
												'class' => 'control-label'
												),
											'wrapInput' => 'controls'
											),
										'class' => 'form-vertical',
										'url'=>array("controller"=>"leads","action"=>"agregar_seguimiento")
									)); ?>
<span class="badge"><i class="fa-icon-comment"></i> Comentario<br><br>
<?php
	echo $this->Form->input('comentario',array('type'=>'textarea','rows'=>'2','div'=>false, 'label'=>false));
	echo $this->Form->input('lead_id',array("type"=>"hidden","value"=>$lead['Lead']['id']));	
?>
<?php echo $this->Form->end(array("class"=>"btn btn-mini btn-success","label"=>__('Agregar'))); ?>
</span>
<script type="text/javascript">
	$(document).ready(function(){
		LeadManager.cargar_comentarios(<?php echo $lead['Lead']['id'];?>);
		
		$("#LeadSeguimientoDetalleLeadForm").on("submit",function(){
			$.ajax({
				url:"/index.php/leads/agregar_seguimiento",
				data:$('#LeadSeguimientoDetalleLeadForm').serializeHash(),
				type:"POST",
				dataType:"json",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					var n = noty({text: "El Comentario ha sido agregado.",layout:'topLeft',type:'success'});
					LeadManager.cargar_comentarios(data.lead_id);
					$('#LeadSeguimientoDetalleLeadForm')[0].reset();
				}
			});			
			return false;
		});
	});
</script>
<div class="box-header btn-minimizeb  ">
						<h2><i class="icon-time"></i><span class="break"></span> Historia</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
							<?php
							foreach($lead['LeadHistoria'] as $h){
								switch($h['status']){
			case 2 :
				$status = "Asignado";
				$status_class = "badge-warning";
				break;
			case 3 :
				$status = "Vendido";
				$status_class = "badge-important";
				break;	
			case 1 :
				$status = "Nuevo";
				$status_class = "badge-success";
				break;
			case 4 :
				$status = "Archivado";
				$status_class = "badge-info";
				break;
			case 5 :
				$status = "Activo";
				$status_class = "badge-inverse";
				break;					
		}
							?>
							<li>
								
								<strong>Nombre:</strong> <a href="#"><i class="fa-icon-user"></i><?php echo $h['User']['nombre']." ".$h['User']['apellido'];?></a><br>
								<strong>Fecha:</strong> <?php echo $h['fecha']?><br>
								<strong>Status:</strong> <span class="badge <?php echo $status_class;?>"><?php echo $status;?></span>                                  
							</li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
<!-- end seguimientos -->
<!-- espacio activo -->						
<?php
}
?>
</div>	
<div class="span2">
    <dl>
    <dt><i class="glyphicon glyphicon-camera"></i> Foto</dt><dd><?php echo $this->Gravatar->displayProfilePicture("",$lead['Lead']['email']);?></dd>	
    <dt><i class='fa-icon-user'></i> Nombre Completo</dt>
    <dd><?php echo $lead['Lead']['nombre'];?> <?php echo $lead['Lead']['primer_apellido'];?> <?php echo $lead['Lead']['segundo_apellido'];?></dd>
     <dt><i class='fa-icon-envelope'></i> Email</dt>
    <dd><a href="mailto:<?php echo $lead['Lead']['email'];?>"><?php echo $lead['Lead']['email'];?></a></dd>
    <dt><i class='fa-icon-phone-sign'></i> Telefonos</dt>
    <dd><?php echo $lead['Lead']['telefono'];?> | <?php echo $lead['Lead']['celular'];?></dd>
      <dt><i class='fa-icon-dashboard'></i> Horario</dt>
    <dd><?php echo $lead['Lead']['horario'];?></dd>
    <dt><i class='fa-icon-map-marker'></i> Dirección</dt>
    <dd><?php echo $lead['Lead']['direccion'];?></dd>
     <dd><small><?php //echo $lead['Lead']['distrito'];?> <?php echo $lead['Lead']['canton'];?> | <?php echo $lead['Lead']['provincia'];?></small></dd>
       <dt><i class='fa-icon-calendar'></i> Creada</dt>
    <dd><?php echo $lead['Lead']['creadad'];?></dd>
     <dt><i class='fa-icon-globe'></i> Origen <small>*<?php echo $lead['Lead']['ip_origen'];?></small></dt>
    <dd>
    <dt><i class="fa-icon-comment"></i> Comentario</dt><dd><?php echo $lead['Lead']['comentario']; ?></dd>
    <dt><i class="fa-icon-map-marker"></i> Fuente</dt><dd><?php echo $lead['Lead']['fuente']; ?></dd>
<dt><i class="fa-icon-envelope"></i> Recibir Boletín</dt><dd><?php echo ($lead['Lead']['boletin'] == 1? "si":"no"); ?></dd>	
    	<center>	
<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $lead['Lead']['lat']; ?>,<?php echo $lead['Lead']['lon']; ?>&zoom=14&size=150x150&markers=color:blue%7Clabel:S%7C<?php echo $lead['Lead']['lat']; ?>,<?php echo $lead['Lead']['lon']; ?>"/><br>
<a target="_blank" href="http://maps.google.com/?q=<?php echo $lead['Lead']['lat']; ?>,<?php echo $lead['Lead']['lon']; ?>" class="btn btn-mini"><i class="fa-icon-link"></i> http://maps.google.com/?q=<?php echo $lead['Lead']['lat']; ?>,<?php echo $lead['Lead']['lon']; ?></a>
</center>
    </dd>
    </dl>
</div>
<div class="span2">
<dl>
<?php
foreach($pics as $p){
?>
<dt><?php echo $p['label'];?></dt>
<dl><img src="<?php echo $p['file'];?>" alt="<?php echo $p['label'];?>" width="125px" class="img-thumbnail"></dl>
<?php
}
?>
</dl>
</div>
<div>

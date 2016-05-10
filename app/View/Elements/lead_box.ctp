<?php
App::import('Model', 'Lead');
App::import('Model', 'LeadSeguidore');

$leadModel  = new Lead();
$user = new LeadSeguidore();

//print_r($lead);

$box_id = "box".$lead['Lead']['id'];
$container_id = "container".$lead['Lead']['id'];
$status_class = "badge ";
$status_text = ""; 
if($lead['Lead']['status'] == 1){
	$status_class .= "badge-success";
	$status_text = "nuevo"; 
}
if($lead['Lead']['status'] == 2){
	$status_class .= "badge-warning";
	$status_text = "asignada"; 
}
if($lead['Lead']['status'] == 5){
	$status_class .= "badge-inverse";
	$status_text = "activa"; 
}
if($lead['Lead']['status'] == 3){
	$status_class .= "badge-important";
	$status_text = "vendida"; 
}
if($lead['Lead']['status'] == 4){
	$status_class .= "badge-info";
	$status_text = "archivado"; 
}
$email_leads = $leadModel->findAllByEmailAndAgenciaId($lead['Lead']['email'],$_SESSION['agencia_id']);

?>
<span class="badge" id="<?php echo $box_id;?>" style="margin: 5px;padding-top: 10px;">
<span>
 <button type="button" container_id="<?php echo $container_id;?>"  action_class="show-top" class="btn btn-mini tresdbtn"><i class="fa fa-bicycle"></i></button>
 <button type="button" container_id="<?php echo $container_id;?>"  action_class="show-bottom" class="btn btn-mini tresdbtn"><i class="fa fa-child"></i></button>
 <button type="button" container_id="<?php echo $container_id;?>"  action_class="show-back" class="btn btn-mini tresdbtn"><i class="fa fa-envelope-o"></i></button>     
<button type="button" container_id="<?php echo $container_id;?>"  action_class="show-left" class="btn btn-mini tresdbtn"><i class="fa fa-laptop"></i></button>	  
    </span>
<section id="<?php echo $container_id;?>" class="tresdcontainer">
    <div id="cube" class="show-top">
      <figure class="front">
	  <img src="<?php echo $lead['pics'][0]['file'];?>" height="81px" width="108px"  class="img-circle"/> <span class="badge <?php echo $status_class;?>"><i class="fa-icon-star"></i> <?php echo $status_text;?></span>
	  </figure>
      <figure class="back">
	  <span>
	  <a class="btn btn-mini btn-inverse lead-email-btn" modal_id="leadModal<?php echo $lead['Lead']['id'];?>" style="float:left;" title="<?php echo $lead['Lead']['email'];?>"><i class="icon-envelope icon-white"></i>
      <span class="label hidden-phone"><?php echo count($email_leads);?></span></a>
	<br></span>
	  </figure>
      <figure class="right">
	  <span class="badge <?php echo $status_class;?>" style="margin-top: 5px;"><i class="fa-icon-cog"></i> <?php echo $lead['Lead']['modelos'];?>
	<br>
		<small>
			<i class="fa-icon-user"></i> <?php echo $lead['Lead']['nombre'];?> <?php echo $lead['Lead']['primer_apellido'];?>
			<br>
			<i class="fa-icon-calendar"></i> <?php echo $lead['Lead']['cambio'];?>
            <br>
			<i class="fa-icon-dashboard"></i> <?php echo $lead['Lead']['horario'];?>
			<br>
			<i class="fa-icon-map-marker"></i> <?php echo $lead['Lead']['canton'];?> - <?php echo $lead['Lead']['provincia'];?>
		</small>
	</span>
	</figure>
      <figure class="left">
	  <span class="badge badge-inverse" style="margin-bottom: 5px;margin-top: 5px;">
		<?php if($this->Session->read('is_administrador') || $this->Session->read('is_admin')){ ?>
		<button type="button" class="btn btn-danger btn-mini remover-lead" lead_id="<?php echo $lead['Lead']['id'];?>" box_id="<?php echo $box_id;?>"><i class="fa-icon-trash"></i></button>	
		<button type="button" class="btn btn-mini usuarios-lead" lead_id="<?php echo $lead['Lead']['id'];?>" box_id="<?php echo $box_id;?>"><i class="fa-icon-group"></i></button>
		<?php } ?>
		<?php if($this->Session->read('is_vendedor')  || $this->Session->read('is_administrador')  || $this->Session->read('is_admin')){?>
		<button type="button" class="btn btn-mini detalle-lead" lead_id="<?php echo $lead['Lead']['id'];?>" box_id="<?php echo $box_id;?>"><i class="fa-icon-zoom-in"></i></button>
		<?php } ?>
		
	</span>
	  </figure>
      <figure class="top">
	  <span class="badge">
	  <span class="badge <?php echo $status_class;?>"><i class="fa-icon-star"></i> <?php echo $status_text;?></span>
	  <br>
	  <img src="<?php echo $lead['pics'][0]['file'];?>" height="81px" width="108px"  class="img-circle"/>
	  <br>
	  <i class="fa-icon-cog"></i>
	  <?php echo $lead['Lead']['modelos'];?>
	  <br>
	  <i class="fa-icon-calendar"></i> <?php echo $lead['Lead']['cambio'];?>
	  <?php if($this->Session->read('is_admin')){?>
	  <br>
		<input type="checkbox" class="bulk-check-lead" lead_id="<?php echo $lead['Lead']['id'];?>"/>
		<?php } ?>
	  </span>
	  </figure>
      <figure class="bottom">
	  <span class="badge <?php echo $status_class;?>" style="margin-top: 5px;"><i class="fa-icon-cog"></i> <?php echo $lead['Lead']['modelos'];?>
	<br>
		<small>
			<i class="fa-icon-user"></i> <?php echo $lead['Lead']['nombre'];?> <?php echo $lead['Lead']['primer_apellido'];?>
			<br>
			<i class="fa-icon-calendar"></i> <?php echo $lead['Lead']['cambio'];?>
            <br>
			<i class="fa-icon-dashboard"></i> <?php echo $lead['Lead']['horario'];?>
			<br>
			<i class="fa-icon-map-marker"></i> <?php echo $lead['Lead']['canton'];?> - <?php echo $lead['Lead']['provincia'];?>
		</small>
	</span>
	  </figure>
    </div>
  </section>
	
    
	
	<br>
	
</span>
<div id="leadModal<?php echo $lead['Lead']['id'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
      <?php echo $this->element('preloader_img');?>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel"><span class="badge"><i class="icon-envelope"></i> <?php echo count($email_leads);?></span> <?php echo $lead['Lead']['email'];?></h3>
  </div>
  <div class="modal-body">
      <?php foreach($email_leads as $l){ 
    $sigue = false;

    if(count($l['Seguidores'])){
    $sigue = true;
   $seguidor_id = $l['Seguidores'][0]['user_id'];
    $seguidor = $user->findByUserId($seguidor_id);
        //print_r($seguidor);
}

      if($l['Lead']['status'] == 1){
	$status_class .= "badge-success";
          $btn_class = "btn-success";
	$status_text = "nuevo"; 
}
if($l['Lead']['status'] == 2){
	$status_class .= "badge-warning";
    $btn_class = "btn-warning";
	$status_text = "asignada"; 
}
if($l['Lead']['status'] == 5){
	$status_class .= "badge-inverse";
    $btn_class = "btn-inverse";
	$status_text = "activa"; 
}
if($l['Lead']['status'] == 3){
	$status_class .= "badge-important";
    $btn_class = "btn-danger";
	$status_text = "vendida"; 
}
if($l['Lead']['status'] == 4){
	$status_class .= "badge-info";
    $btn_class = "btn-info";
	$status_text = "archivado"; 
}
      ?>
      <a style="margin:3px;" class="btn btn-mini <?php echo $btn_class;?> detalle-lead" lead_id="<?php echo $l['Lead']['id'];?>" box_id="<?php echo $box_id;?>">
  <i class="fa-icon-zoom-in"></i>        <?php echo $l['Lead']['modelos'];?> <i class="fa-icon-calendar"></i> <?php echo $l['Lead']['creadad'];?> <?php echo $status_text;?>
          <?php if($sigue){ ?>
          <br>
          <i class="fa-icon-user"></i> <?php echo $seguidor['User']['nombre'].' '.$seguidor['User']['apellido'];?>
          <?php } ?>
      </a><br>
      <?php } ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
  </div>
</div>

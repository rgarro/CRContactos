<?php
if($sa['User']['active']){
	$btn_icon = "fa-unlock";
	$btn_class = "btn-success";
	$status = 0;
}else{
	$btn_icon = "fa-lock";
	$btn_class = "btn-warning";
	$status = 1;
}
?>
<li class="animated rollIn" id="saLi<?php echo $sa['User']['id'];?>" style="height:15em;">
<a href="javascript:return false;">
      <h2><?php echo $this->Gravatar->displayProfilePicture("",$sa['User']['email']);?>
      	<br>
      	<?php echo $sa['User']['nombre'];?> <?php echo $sa['User']['apellido'];?>
      	 </h2>
      	 <small><i class="fa fa-envelope"></i> <?php echo $sa['User']['email'];?></small><br>
      	 <?php if($_SESSION['Auth']['User']['id'] != $sa['User']['id']){?>
      <button type="button" class="btn btn-danger btn-mini borra-sa" li_id="saLi<?php echo $sa['User']['id'];?>" user_id="<?php echo $sa['User']['id'];?>"><i class="fa fa-trash"></i> </button>
 <button type="button" class="btn <?php echo $btn_class;?> btn-mini cambia-sa" status="<?php echo $status;?>" li_id="saLi<?php echo $sa['User']['id'];?>" user_id="<?php echo $sa['User']['id'];?>"><i class="fa <?php echo $btn_icon;?>"></i> </button>   
<button type="button" class="btn btn-primary btn-mini cambia-sa-pass" li_id="saLi<?php echo $sa['User']['id'];?>" user_id="<?php echo $sa['User']['id'];?>"><i class="fa fa-key"></i> </button>      
    <?php } ?>
     
    </a>
</li>

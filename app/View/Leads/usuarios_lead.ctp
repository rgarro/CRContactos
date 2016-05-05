<style>
#sortable1, #sortable2 {
border: 1px solid #eee;
width: 142px;
min-height: 20px;
list-style-type: none;
margin: 0;
padding: 3px 0 0 0;
float: left;
margin-right: 10px;
}
#sortable1 li, #sortable2 li {
margin: 0 3px 3px 3px;
padding: 3px;
font-size: 10px;
width: 120px;
}
</style>
<div class="well" style="float:left;">
<div style="float: left;">
<small class="badge badge-info" style="float:left;clear: right;"><i class="fa-icon-group"></i> Disponibles</small><br>	
<ul id="sortable1" class="connectedSortable">
<?php
$c = 0;
foreach($users as $u){
?>
<li id="mli<?php echo $c;?>" class="ui-state-default" user_id="<?php echo $u['User']['id']?>" lead_id="<?php echo $lead_id;?>"> <i class="fa-icon-user"></i> <?php echo $u['User']['nombre']." ".$u['User']['apellido'];?></li>
<?php
$c++;
}
?>	
</ul>
</div>
<div style="float: left;">
<small class="badge badge-warning" style="float:right;"><i class="fa-icon-group"></i> Seguidores</small><br>	
<ul id="sortable2" class="connectedSortable" style="min-height: 100px;border-color:#45A307;">
<?php
$c = 0;
foreach($seguidores as $u){
	if($u['LeadSeguidore']['status'] > 1){
		$fclass = "btn-success";
	}else{
		$fclass = "btn-warning";
	}
?>
<li id="mlib<?php echo $c;?>" class="ui-state-default <?php echo $fclass; ?>" user_id="<?php echo $u['User']['id']?>" lead_id="<?php echo $lead_id;?>"> <i class="fa-icon-user"></i> <?php echo $u['User']['nombre']." ".$u['User']['apellido'];?></li>
<?php
$c++;
}
?>
</ul>
</div>
</div>
<br>
 <p>
 <small> <i class="fa-icon-share-alt"></i> * Arrastrar a la derecha.</small>
</p>
<script type="text/javascript">
$(document).ready(function(){
	$("#sortable1, #sortable2").sortable({
		connectWith: ".connectedSortable"
	}).disableSelection();
	
	//Desasigna usuarios
	$("#sortable1").on("sortreceive",function(event,ui){		
		var mid = "#"+ui.item[0].id;
		var lead_id = $(mid).attr("lead_id");//ui.item[0].attributes[2].nodeValue;
		var user_id = $(mid).attr("user_id");//ui.item[0].attributes[1].nodeValue;
		LeadManager.desasignar_seguidor(lead_id,user_id);				
	});
	
	//Asigna usuarios
	$("#sortable2").on("sortreceive",function(event,ui){
        var mid = "#"+ui.item[0].id;
		var lead_id = $(mid).attr("lead_id");//ui.item[0].attributes[2].nodeValue;
		var user_id = $(mid).attr("user_id");//ui.item[0].attributes[1].nodeValue;
		LeadManager.asignar_seguidor(lead_id,user_id);				
	});
});
</script>

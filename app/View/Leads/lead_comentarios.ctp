<ul class="chat span4">
<?php 
foreach($seguimientos as $s){
?>	
	<li class="left">
		<img class="avatar" width="28" alt="Lucas" src="/img/genericface.png">
		<span class="message"><span class="arrow"></span>
		<span class="from"><b> <?php echo $s['User']['username'];?></b></span>
		<span class="time"><b><i class="fa-icon-calendar"></i> <?php echo $s['LeadSeguimiento']['fecha'];?></b></span>
		<span class="text">
		 <?php echo $s['LeadSeguimiento']['comentario'];?>
		</span>
		</span>	                                  
	</li>
<?php
}
?>								
</ul>
<script type="text/javascript">
$(document).ready(function(){
    $(".total-seguimientos").html("<?php echo count($seguimientos);?>");
});
</script>

<script>
	$(document).ready(function(){
		//Examples of how to assign the Colorbox event to elements
		$(".publicontacto").colorbox({rel:'group1', slideshow:true,slideshowAuto:true,speed:2000 ,transition:"fade",open:true,slideshowStop:"Detener",current:"{current} de {total}"});
		$(document).on("click",".cboxPhoto",function(){
			var url = $(this).attr('target_url');
			window.location.assign(url);
		});
	});
</script>
<div style="display: none;">
	<?php
	foreach($data as $d){
	?>
	<p><a class="publicontacto" href="http://crcontactos.com/app/webroot/files/publicidad/<?php echo $d['Publicidad']['id']; ?>/<?php echo $d['Publicidad']['Filename']; ?>" title="<?php //echo $d['Publicidad']['label']; ?>" target_url="<?php echo $d['Publicidad']['target_url']; ?>"><?php echo $d['Publicidad']['label']; ?></a></p>
	<?php
	}
	?>
</div>

<script type="text/javascript">
	
	function show_flash_gritt<?php echo time();?>(){
		
		var n = noty({text: '<?php echo $message; ?>',layout:'top',type:'warning'});	
	}
	
	$(document).ready(function(){
		setTimeout("show_flash_gritt<?php echo time();?>()",1000);
	});			
</script>
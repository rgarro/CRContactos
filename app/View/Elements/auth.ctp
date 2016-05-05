<script type="text/javascript">
	
	function show_flash_gritt<?php echo time();?>(){
		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: "Atención",
			// (string | mandatory) the text inside the notification
			text: '<?php echo $message; ?>',
			// (string | optional) the image to display on the left
			image: '/img/atention.png',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: '8000',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'my-sticky-class'
		});
	}
	
	$(document).ready(function(){
		setTimeout("show_flash_gritt<?php echo time();?>()",1000);
	});			
</script>
<!-- start: JavaScript-->
		<script src="/js/jquery-1.9.1.min.js"></script>
	<script src="/js/jquery-migrate-1.0.0.min.js"></script>	
		<script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="/js/jquery.ui.touch-punch.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery.cookie.js"></script>
		<script src='/js/fullcalendar.min.js'></script>
		<script src='/js/jquery.dataTables.min.js'></script>
		<script src="/js/excanvas.js"></script>
	<script src="/js/jquery.flot.min.js"></script>
	<script src="/js/jquery.flot.pie.min.js"></script>
	<script src="/js/jquery.flot.stack.js"></script>
	<script src="/js/jquery.flot.resize.min.js"></script>
		<script src="/js/jquery.chosen.min.js"></script>
		<script src="/js/jquery.uniform.min.js"></script>
		<script src="/js/jquery.cleditor.min.js"></script>
		<script src="/js/jquery.noty.js"></script>
		<script src="/js/jquery.elfinder.min.js"></script>
		<script src="/js/jquery.raty.min.js"></script>
		<script src="/js/jquery.iphone.toggle.js"></script>
		<script src="/js/jquery.uploadify-3.1.min.js"></script>
		<script src="/js/jquery.gritter.min.js"></script>
		<script src="/js/jquery.imagesloaded.js"></script>
		<script src="/js/jquery.masonry.min.js"></script>
		<script src="/js/jquery.knob.js"></script>
		<script src="/js/crcontactos_manager.js"></script>
		<script src="/js/jquery.sparkline.min.js"></script>
 <script src="/js/jquery.form.js"></script>
 <script src="/js/pace.min.js"></script>
 <script src="/js/jquery.route32.js"></script> 
<script src="/js/custom.js"></script>
<script src="/js/tipos.js"></script>
<script src="/js/jquery.serialize-hash.js"></script>
<script src="/js/lead_manager.js"></script>
<script src="/js/reportes.js"></script>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/js/handlebars.js"></script>
<script src="/js/localidades.js"></script>
<script src="/js/agencia.js"></script>
<script src="/js/agencias.js"></script>
<script src="/js/agregar_lead_manual.js"></script>
<script src="/js/marcas.js"></script>
<script src="/js/reportes_admin.js"></script>
<script src="/js/sa.js"></script>
<script src="/js/cRc/UI/rotate-box.js"></script>
		<script type="text/javascript">
	
	function message_welcome1(){
		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Welcome on Perfectum Dashboard',
			// (string | mandatory) the text inside the notification
			text: 'I hope you like this template',
			// (string | optional) the image to display on the left
			image: 'img/avatar.jpg',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'my-sticky-class'
		});
	}
	
	function message_welcome2(){
		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Perfectum is Amazing Theme',
			// (string | mandatory) the text inside the notification
			text: 'Perfectum works on all devices, computers, tablets and smartphones. Perfectum has lots of great features. Try It!',
			// (string | optional) the image to display on the left
			image: 'img/avatar.jpg',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'my-sticky-class'
		});
	}
	
	function message_welcome3(){
		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Buy Perfectum!',
			// (string | mandatory) the text inside the notification
			text: 'This great template can be yours today.',
			// (string | optional) the image to display on the left
			image: 'img/avatar.jpg',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'gritter-light'
		});
	}
	
	var no_is_loaded = true;
	var total_leads_nuevos = -2;
	
	function obtener_total_leads_nuevos(){
		$.ajax({
			url:"/index.php/leads/obtener_total_leads_nuevos",
			type:"GET",
			success:function(data){
				if(data.error == 1){
					if(data.timed_out == 1){
						window.location = "/index.php/";
					}
				}
				
				if(no_is_loaded){
					no_is_loaded = false;
				}else{
					if(data.total > total_leads_nuevos){
						var nuevos = data.total - total_leads_nuevos;
						noty({text: "Atención: Tiene " + nuevos + " leads nuevos.",layout:'top',type:'information'});
					}
				}
				total_leads_nuevos = data.total;
				$(".leads-nuevos-total").html(total_leads_nuevos);
			},
			dataType:'json'
		});	
	}
	
	
	var no_is_loadedb = true;
	var total_mis_leads = -2;
	
	function obtener_total_mis_leads(){
		$.ajax({
			url:"/index.php/leads/obtener_total_mis_leads",
			type:"GET",
			success:function(data){
				if(data.error == 1){
					if(data.timed_out == 1){
						window.location = "/index.php/";
					}
				}
				
				if(no_is_loadedb){
					no_is_loadedb = false;
				}else{
					if(data.total > total_mis_leads){
						var nuevos = data.total - total_mis_leads;
						noty({text: "Atención: Tiene " + nuevos + " leads asignados.",layout:'top',type:'information'});
					}
				}
				total_mis_leads = data.total;
				$(".leads-atendiendo-total").html(total_mis_leads);
			},
			dataType:'json'
		});	
	}

	$(document).ready(function(){
		$(".preloader").hide();
				
				$( document ).ajaxStart(function(){
					$(".preloader").show();
				});
				
				$( document ).ajaxStop(function(){
					$(".preloader").hide();
				});
		//setTimeout("message_welcome1()",5000);
		//setTimeout("message_welcome2()",10000);	
		//setTimeout("message_welcome3()",15000);
<?php if($this->Session->read('is_administrador')){ ?>
		obtener_total_leads_nuevos();
		window.setInterval(obtener_total_leads_nuevos,60000);
<?php } ?>
<?php if($this->Session->read('is_vendedor')  || $this->Session->read('is_administrador') ){ ?>
		obtener_total_mis_leads();
		window.setInterval(obtener_total_mis_leads,60000);
<?php } ?>		
	});			
	</script>
		<!-- end: JavaScript-->
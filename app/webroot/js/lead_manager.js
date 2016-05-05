/**
 * Lead Manager CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */
var LeadManager = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'options':{
		'cajaNuevos':'#cajaNuevos',
		'nuevosUrl':'/index.php/leads/leads_nuevos',
		'reloadNewLeadsBtn':'.reload-new-leads',
		'removerLeadBtn':'.remover-lead',
		'removerLeadUrl':'/index.php/leads/borra_lead',
		'detalleLeadBtn':'.detalle-lead',
		'detalleLeadContainer':'.detalleLeadContainer',
		'detalleLeadUrl':'/index.php/leads/detalle_lead',
		'detalleLeadContainer':'.detalleLeadContainer',
		'detalleLeadModal':'#detalleLeadModal',
		'usuariosLeadBtn':'.usuarios-lead',
		'usuariosLeadUrl':'/index.php/leads/usuarios_lead',
		'asignarLeadContainer':'.asignarLeadContainer',
		'asignarLeadModal':'#asignarLeadModal',
		'asignarSeguidorUrl':'/index.php/leads/asignar_seguidor',
		'desasignarSeguidorUrl':'/index.php/leads/desasignar_seguidor',
		'cajaProc':'#cajaProc',
		'procUrl':'/index.php/leads/leads_procesando',
		'cambiarLeadUrl':'/index.php/leads/cambiar_lead_status',
		'leadComentariosUrl':'/index.php/leads/lead_comentarios',
		'cajaAten':'#cajaAten',
		'atenUrl':'/index.php/leads/leads_atendiendo',
		'activarSeguimientoUrl':'/index.php/leads/activar_seguimiento',
		'totalProcesandoUrl':'/index.php/leads/total_leads_procesando',
		'totalProcesandoContainer':'#leads-procesando-paginacion',
		'totalNuevosUrl':'/index.php/leads/total_leads_nuevos',
		'totalNuevosContainer':'#leads-nuevos-paginacion'
	},
	'nuevos_off_set':0,
	'proc_off_set':0,
	'pag':25,
	'totalProcesando':function(){
		LeadManager.proc_off_set = 0;
		$.ajax({
			url:LeadManager.getOption('totalProcesandoUrl'),
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('totalProcesandoContainer')).html(data);
				LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
			}
		});
	},
	'totalNuevos':function(){
		LeadManager.nuevos_off_set = 0;
		$.ajax({
			url:LeadManager.getOption('totalNuevosUrl'),
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('totalNuevosContainer')).html(data);
				LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
			}
		});
	},
	'cargarNuevos':function(off_set,limit){
		$.ajax({
			url:LeadManager.getOption('nuevosUrl'),
			data:{
				off_set:off_set,
				limit:limit
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('cajaNuevos')).html(data);
			}
		});
	},
	'removerLead':function(lead_id){
		$.ajax({
			url:LeadManager.getOption('removerLeadUrl'),
			data:{
				lead_id:lead_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				LeadManager.check_errors(data);
				if(data.invalid_form == 1){						
					LeadManager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "El Lead ha sido removido del sistema.",layout:'topLeft',type:'success'});
					$(LeadManager.lastTrID).hide();
					obtener_total_leads_nuevos();
				}							
			}
		});			
	},
	'verLead':function(lead_id){
		$.ajax({
			url:LeadManager.getOption('detalleLeadUrl'),
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('detalleLeadContainer')).html(data);
				$(LeadManager.getOption('detalleLeadModal')).appendTo('body').modal('show');
			}
		});
	},
	'asignarLead':function(lead_id){
		$.ajax({
			url:LeadManager.getOption('usuariosLeadUrl'),
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('asignarLeadContainer')).html(data);
				$(LeadManager.getOption('asignarLeadModal')).appendTo('body').modal('show');
			}
		});
	},
	'asignar_seguidor':function(lead_id,user_id){
		$.ajax({
			url:LeadManager.getOption('asignarSeguidorUrl'),
			data:{
				lead_id:lead_id,
				user_id:user_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				LeadManager.check_errors(data);
				if(data.invalid_form == 1){						
					LeadManager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "El seguidor ha sido agregado.",layout:'topLeft',type:'success'});
			
				}							
			}
		});
	},
	'desasignar_seguidor':function(lead_id,user_id){
		$.ajax({
			url:LeadManager.getOption('desasignarSeguidorUrl'),
			data:{
				lead_id:lead_id,
				user_id:user_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				LeadManager.check_errors(data);
				if(data.invalid_form == 1){						
					LeadManager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "El seguidor ha sido desasignado.",layout:'topLeft',type:'success'});
			
				}							
			}
		});
	},
	'cargarProc':function(off_set,limit){
		$.ajax({
			url:LeadManager.getOption('procUrl'),
			data:{
				off_set:off_set,
				limit:limit
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('cajaProc')).html(data);
			}
		});
	},
	'cambiar_status_lead':function(lead_id,status){
		$.ajax({
			url:LeadManager.getOption('cambiarLeadUrl'),
			data:{
				lead_id:lead_id,
				status:status
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				LeadManager.check_errors(data);
				var n = noty({text: "El Status del Lead ha Cambiado.",layout:'topLeft',type:'success'});
				LeadManager.reloadLead(data.lead_id);
			}
		});
	},
	'reloadLead':function(lead_id){
		$.ajax({
			url:LeadManager.getOption('detalleLeadUrl'),
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('detalleLeadContainer')).html(data);
			}
		});
	},
	'cargar_comentarios':function(lead_id){
		$.ajax({
			url:LeadManager.getOption('leadComentariosUrl'),
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$("#listaSeguimientosContainer").html(data);
				$('#LeadSeguimientoDetalleLeadForm')[0].reset();
			}
		});
	},
	'activar_seguimiento':function(lead_seguidore_id){
		$.ajax({
			url:LeadManager.getOption('activarSeguimientoUrl'),
			data:{
				lead_seguidore_id:lead_seguidore_id
			},
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				var n = noty({text: "Se acaba de Notificar al Administrador que empezo seguimiento.",layout:'topLeft',type:'success'});
				LeadManager.reloadLead(data.lead_id);
			},
			dataType:"json"
		});
	},
	'init':function(){
		
		$(document).on("click",".nuevo-link",function(){
			var off_set = $(this).attr("off_set");
			var limit = $(this).attr("limit");
			LeadManager.nuevos_off_set = off_set;
			LeadManager.cargarNuevos(off_set,LeadManager.pag);
		});
		
		$(document).on("click",".procesando-link",function(){
				var off_set = $(this).attr("off_set");
				var limit = $(this).attr("limit");
				LeadManager.proc_off_set = off_set;
				LeadManager.cargarProc(off_set,LeadManager.pag);
		});
		
		$(document).on("click",".activar-participacion",function(){
			 if(window.confirm("Activar?")){
				var lead_seguidore_id = $(this).attr("lead_seguidore_id");
				LeadManager.activar_seguimiento(lead_seguidore_id); 	
			 }
		});
		
	    $(document).on("click",".switch ul li",function(){
	        var lead_id = $(this).attr("lead_id");
	        var status = $(this).attr("status");
	        if(window.confirm("Cambiar Status?")){
	        	$(".switch ul li").removeClass("on");
	        	$(this).addClass("on");
				LeadManager.cambiar_status_lead(lead_id,status);        	
	        }         
	    });
        $(document).on("click",".lead-email-btn",function(){
			var modal_id = "#" + $(this).attr('modal_id');
			$(modal_id).appendTo("body").modal("show");
		});
		//Modal
		$(LeadManager.getOption('detalleLeadModal')).on('hidden',function(){
			LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
	    	LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
		});
		
	    $(LeadManager.getOption('asignarLeadModal')).on('hidden',function(){
	    	LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
	    	LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
	     });
		
		//Cajas
		LeadManager.totalNuevos();
		LeadManager.totalProcesando();
		//Botones
		$(document).on("click",LeadManager.getOption('usuariosLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
		$(document).on("click",LeadManager.getOption('detalleLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.getOption('removerLeadBtn'),function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.getOption('reloadNewLeadsBtn'),function(){
			LeadManager.totalNuevos();
			LeadManager.totalProcesando();
		});
	},
	'cargarAten':function(){
		$.ajax({
			url:LeadManager.getOption('atenUrl'),
			type:"GET",
			success:function(data){
				LeadManager.check_errors(data);
				$(LeadManager.getOption('cajaAten')).html(data);
			}
		});
	},
	'initD':function(){
		$(document).on("click",".activar-participacion",function(){
			 if(window.confirm("Activar?")){
				var lead_seguidore_id = $(this).attr("lead_seguidore_id");
				LeadManager.activar_seguimiento(lead_seguidore_id); 	
			 }
		});
		
	    $(document).on("click",".switch ul li",function(){
	        var lead_id = $(this).attr("lead_id");
	        var status = $(this).attr("status");
	        if(window.confirm("Cambiar Status?")){
	        	$(".switch ul li").removeClass("on");
	        	$(this).addClass("on");
				LeadManager.cambiar_status_lead(lead_id,status);        	
	        }         
	    });
        $(document).on("click",".lead-email-btn",function(){
			var modal_id = "#" + $(this).attr('modal_id');
			$(modal_id).appendTo("body").modal("show");
		});
		//Modal
		$(LeadManager.getOption('detalleLeadModal')).on('hidden',function(){
			LeadManager.cargarAten();
		});
		
	    $(LeadManager.getOption('asignarLeadModal')).on('hidden',function(){
	    	LeadManager.cargarAten();
	     });
		
		//Cajas
		LeadManager.cargarAten();
		//Botones
		$(document).on("click",LeadManager.getOption('usuariosLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
		$(document).on("click",LeadManager.getOption('detalleLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.getOption('removerLeadBtn'),function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.getOption('reloadNewLeadsBtn'),function(){
			LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
		});
	},
	'initC':function(){
		$(document).on("click",".activar-participacion",function(){
			 if(window.confirm("Activar?")){
				var lead_seguidore_id = $(this).attr("lead_seguidore_id");
				LeadManager.activar_seguimiento(lead_seguidore_id); 	
			 }
		});
		
	    $(document).on("click",".switch ul li",function(){
	        var lead_id = $(this).attr("lead_id");
	        var status = $(this).attr("status");
	        if(window.confirm("Cambiar Status?")){
	        	$(".switch ul li").removeClass("on");
	        	$(this).addClass("on");
				LeadManager.cambiar_status_lead(lead_id,status);        	
	        }         
	    });
		$(LeadManager.getOption('marca')).change(function(){			
			$(LeadManager.getOption('modelo')).load('/index.php/leads/modelos_select', {
				'marca_id' : $(this).val()
			});
		});
		
		$(LeadManager.getOption('desde')).datepicker({dateFormat:'yy-mm-dd'});
		$(LeadManager.getOption('hasta')).datepicker({dateFormat:'yy-mm-dd'});
		
		$(LeadManager.getOption('reportsForm')).on("submit",function(){			
			$.ajax({
				url:LeadManager.getOption('reporteUrl'),
				data:$(LeadManager.getOption('reportsForm')).serializeHash(),
				type:"GET",
				success:function(data){
					LeadManager.check_errors(data);
					$(LeadManager.getOption('reportContainer')).html(data);
				}
			});			
			return false;
		});
		
		//Modal
		$(LeadManager.getOption('detalleLeadModal')).on('hidden',function(){
			LeadManager.cargarAten();
		});
		
	    $(LeadManager.getOption('asignarLeadModal')).on('hidden',function(){
	    	LeadManager.cargarAten();
	     });
		
		//Botones
		$(document).on("click",LeadManager.getOption('usuariosLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
        $(document).on("click",".lead-email-btn",function(){
			var modal_id = "#" + $(this).attr('modal_id');
			$(modal_id).appendTo("body").modal("show");
		});

		$(document).on("click",LeadManager.getOption('detalleLeadBtn'),function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.getOption('removerLeadBtn'),function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.getOption('reloadNewLeadsBtn'),function(){
			LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
		});
	}
});

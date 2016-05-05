/**
 * Lead Manager CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */
var LeadManager = {
	'opt':{
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
		'totalNuevosContainer':'#leads-nuevos-paginacion',
		'archivarLeadsUrl':'/index.php/leads/archivar_leads'
	},
	'nuevos_off_set':0,
	'proc_off_set':0,
	'pag':25,
	'totalProcesando':function(){
		LeadManager.proc_off_set = 0;
		$.ajax({
			url:LeadManager.opt.totalProcesandoUrl,
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.totalProcesandoContainer).html(data);
				LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
			}
		});
	},
	'totalNuevos':function(){
		LeadManager.nuevos_off_set = 0;
		$.ajax({
			url:LeadManager.opt.totalNuevosUrl,
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.totalNuevosContainer).html(data);
				LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
			}
		});
	},
	'cargarNuevos':function(off_set,limit){
		$.ajax({
			url:LeadManager.opt.nuevosUrl,
			data:{
				off_set:off_set,
				limit:limit
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.cajaNuevos).html(data);
			}
		});
	},
	'removerLead':function(lead_id){
		$.ajax({
			url:LeadManager.opt.removerLeadUrl,
			data:{
				lead_id:lead_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				if(data.invalid_form == 1){						
					CRContactos_Manager.noty_form_errors(data.error_list);
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
			url:LeadManager.opt.detalleLeadUrl,
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.detalleLeadContainer).html(data);
				$(LeadManager.opt.detalleLeadModal).appendTo('body').modal('show');
			}
		});
	},
	'asignarLead':function(lead_id){
		$.ajax({
			url:LeadManager.opt.usuariosLeadUrl,
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.asignarLeadContainer).html(data);
				$(LeadManager.opt.asignarLeadModal).appendTo('body').modal('show');
			}
		});
	},
	'asignar_seguidor':function(lead_id,user_id){
		$.ajax({
			url:LeadManager.opt.asignarSeguidorUrl,
			data:{
				lead_id:lead_id,
				user_id:user_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				if(data.invalid_form == 1){						
					CRContactos_Manager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "El seguidor ha sido agregado.",layout:'topLeft',type:'success'});
			
				}							
			}
		});
	},
	'desasignar_seguidor':function(lead_id,user_id){
		$.ajax({
			url:LeadManager.opt.desasignarSeguidorUrl,
			data:{
				lead_id:lead_id,
				user_id:user_id
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				if(data.invalid_form == 1){						
					CRContactos_Manager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "El seguidor ha sido desasignado.",layout:'topLeft',type:'success'});
			
				}							
			}
		});
	},
	'cargarProc':function(off_set,limit){
		$.ajax({
			url:LeadManager.opt.procUrl,
			data:{
				off_set:off_set,
				limit:limit
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.cajaProc).html(data);
			}
		});
	},
	'cambiar_status_lead':function(lead_id,status){
		$.ajax({
			url:LeadManager.opt.cambiarLeadUrl,
			data:{
				lead_id:lead_id,
				status:status
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				var n = noty({text: "El Status del Lead ha Cambiado.",layout:'topLeft',type:'success'});
				LeadManager.reloadLead(data.lead_id);
			}
		});
	},
	'reloadLead':function(lead_id){
		$.ajax({
			url:LeadManager.opt.detalleLeadUrl,
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.detalleLeadContainer).html(data);
			}
		});
	},
	'cargar_comentarios':function(lead_id){
		$.ajax({
			url:LeadManager.opt.leadComentariosUrl,
			data:{
				lead_id:lead_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$("#listaSeguimientosContainer").html(data);
				$('#LeadSeguimientoDetalleLeadForm')[0].reset();
			}
		});
	},
	'activar_seguimiento':function(lead_seguidore_id){
		$.ajax({
			url:LeadManager.opt.activarSeguimientoUrl,
			data:{
				lead_seguidore_id:lead_seguidore_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				var n = noty({text: "Se acaba de Notificar al Administrador que empezo seguimiento.",layout:'topLeft',type:'success'});
				LeadManager.reloadLead(data.lead_id);
			},
			dataType:"json"
		});
	},
	'archivar_leads':function(leads){
		$.ajax({
			url:LeadManager.opt.archivarLeadsUrl,
			data:{
				leads:leads,
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				if(data.invalid_form == 1){						
					CRContactos_Manager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: data.flash,layout:'topLeft',type:'success'});
					LeadManager.proc_off_set = 0;
					LeadManager.nuevos_off_set = 0;
					LeadManager.totalNuevos();
					LeadManager.totalProcesando();
				}							
			}
		});
	},
	'init':function(){
		
		$(document).on("click",".bulk-archivar-leads",function(){
			var leads = [];
			var i = 0;
			$(".bulk-check-lead").each(function(index,element){
				if($(element).is(':checked')){
					leads[i] = $(element).attr("lead_id")
					i = i + 1;
				}
			});
			if(i==0){
				var n = noty({text: "Debe Seleccionar al menos un Lead.",layout:'bottomLeft',type:'error'});			
			}else if(i>0){
				if(window.confirm("Archivar "+ leads.length + " leads?")){
					LeadManager.archivar_leads(leads);
				}
			}
		});
		
		$(document).on("click",".bulk-uncheck",function(){
			$(".bulk-check-lead").prop("checked",false);
		});
		
		$(document).on("click",".bulk-check-all",function(){
			$(".bulk-check-lead").prop("checked",true);
		});
		
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
		$(LeadManager.opt.detalleLeadModal).on('hidden',function(){
			LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
	    	LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
		});
		
	    $(LeadManager.opt.asignarLeadModal).on('hidden',function(){
	    	LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
	    	LeadManager.cargarProc(LeadManager.proc_off_set,LeadManager.pag);
	     });
		
		//Cajas
		LeadManager.totalNuevos();
		LeadManager.totalProcesando();
		//Botones
		$(document).on("click",LeadManager.opt.usuariosLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
		$(document).on("click",LeadManager.opt.detalleLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.opt.removerLeadBtn,function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.opt.reloadNewLeadsBtn,function(){
			LeadManager.totalNuevos();
			LeadManager.totalProcesando();
		});
	},
	'cargarAten':function(){
		$.ajax({
			url:LeadManager.opt.atenUrl,
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(LeadManager.opt.cajaAten).html(data);
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
		$(LeadManager.opt.detalleLeadModal).on('hidden',function(){
			LeadManager.cargarAten();
		});
		
	    $(LeadManager.opt.asignarLeadModal).on('hidden',function(){
	    	LeadManager.cargarAten();
	     });
		
		//Cajas
		LeadManager.cargarAten();
		//Botones
		$(document).on("click",LeadManager.opt.usuariosLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
		$(document).on("click",LeadManager.opt.detalleLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.opt.removerLeadBtn,function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.opt.reloadNewLeadsBtn,function(){
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
		$(LeadManager.opt.marca).change(function(){			
			$(LeadManager.opt.modelo).load('/index.php/leads/modelos_select', {
				'marca_id' : $(this).val()
			});
		});
		
		$(LeadManager.opt.desde).datepicker({dateFormat:'yy-mm-dd'});
		$(LeadManager.opt.hasta).datepicker({dateFormat:'yy-mm-dd'});
		
		$(LeadManager.opt.reportsForm).on("submit",function(){			
			$.ajax({
				url:LeadManager.opt.reporteUrl,
				data:$(LeadManager.opt.reportsForm).serializeHash(),
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(LeadManager.opt.reportContainer).html(data);
				}
			});			
			return false;
		});
		
		//Modal
		$(LeadManager.opt.detalleLeadModal).on('hidden',function(){
			LeadManager.cargarAten();
		});
		
	    $(LeadManager.opt.asignarLeadModal).on('hidden',function(){
	    	LeadManager.cargarAten();
	     });
		
		//Botones
		$(document).on("click",LeadManager.opt.usuariosLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.asignarLead(lead_id);
		});
		
        $(document).on("click",".lead-email-btn",function(){
			var modal_id = "#" + $(this).attr('modal_id');
			$(modal_id).appendTo("body").modal("show");
		});

		$(document).on("click",LeadManager.opt.detalleLeadBtn,function(){
			var lead_id = $(this).attr('lead_id');
			LeadManager.verLead(lead_id);
		});
		$(document).on("click",LeadManager.opt.removerLeadBtn,function(){
			if(window.confirm("Eliminar Lead?")){
				LeadManager.lastTrID = "#"+$(this).attr('box_id');
				var lead_id = $(this).attr('lead_id');
				LeadManager.removerLead(lead_id);
			}
		});
		
		$(document).on("click",LeadManager.opt.reloadNewLeadsBtn,function(){
			LeadManager.cargarNuevos(LeadManager.nuevos_off_set,LeadManager.pag);
		});
	}
};

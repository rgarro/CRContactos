/**
 * Manejo de Agencia CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Agencia = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'id':0,
	'mid':0,
	'lid':0,
	'opt':{
		'changeUserPassBtn':'.change-user-pass',
		'user_id':0,
		'userPasswordModal':'#userPasswordModal',
		'changePasswordContainer':'.user-pass-modal-body',
		'userPasswordUrl':'/index.php/users/users/change_user_password/'
	},
	'options':{
		'abreAgenciaModelosModalBtn':'#abreAgenciaModelosModalBtn',
		'abreAgenciaNotificacionesModalBtn':'#abreAgenciaNotificacionesModalBtn',
		'modeloscontainer':'.modeloscontainer',
		'lista_modelos_url':'/index.php/agencias/lista_modelos',
		'agenciaModeloModal':'#agenciaModeloModal',
		'agenciaModelosContainer':'#agenciaModelosContainer',
		'agenciaModelosForm':'#agenciaModelosForm',
		'asignarModelosBtn':'#asignarModelosBtn',
		'modelos_agencia_url':'/index.php/agencias/modelos_agencia',
		'agenciaModelosContainer':'#agenciaModelosContainer',
		'asignarModeloAgenciaUrl':'/index.php/agencias/asignar_modelo',
		'removerModeloAgenciaBtn':'.removermodeloagencia',
		'removerModeloAgenciaUrl':'/index.php/agencias/remover_modelo',
		'asignarModelosBtnB':'#asignarModelosBtnB',
		'listaNotificacionesUrl':'/index.php/agencias/lista_notificaciones',
		'agenciaNotificacionesModal':'#agenciaNotificacionesModal',
		'notificacionescontainer':'.notificacionescontainer',
		'asignarNotificacionBtn':'#asignarNotificacionBtn',
		'agregarAgenciaNotificacionUrl':'/index.php/agencias/asignar_notificacion',
		'agenciaNotificacionesForm':'#agenciaNotificacionesForm',
		'notificacionescontainer':'.notificacionescontainer',
		'notificaciones_agencia_url':'/index.php/agencias/notificaciones',
		'agenciaNotificacionesContainer':'#agenciaNotificacionesContainer',
		'removernotificacionagencia':'.removernotificacionagencia',
		'removerNotificacionAgenciaUrl':'/index.php/agencias/remover_notificacion'
	},
	'mostrarAgenciaModelos':function(){
		$.ajax({
			url:Agencia.getOption('lista_modelos_url'),
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);					
				$(Agencia.getOption('modeloscontainer')).html(data);
				$(Agencia.getOption('agenciaModeloModal')).appendTo("body").modal('show');
				Agencia.cargar_modelos();
			}
		});
	},
	'cargar_modelos':function(){
		$.ajax({
			url:Agencia.getOption('modelos_agencia_url'),
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);					
				$(Agencia.getOption('agenciaModelosContainer')).html(data);
			}
		});
	},
	'asignar_modelo_m':function(){
		$.ajax({
			url: Agencia.getOption('asignarModeloAgenciaUrl'),
			data:$(Agencia.getOption('agenciaModelosForm')).serializeHash(),
			type:'GET',
			success: function(data){				
				Agencia.check_errors(data);
				if(data.is_error == 1){
					noty({text: data.error_msg,layout:'bottomLeft',type:'error'});
				}
				if(data.is_success == 1){
					noty({text: "El Modelo ha sido Agregado.",layout:'topLeft',type:'success'});
					Agencia.cargar_modelos();
				}							
			},
			dataType: 'json'
		});
	},
	'remover_modelo':function(maid){		
		$.ajax({
			url:Agencia.getOption('removerModeloAgenciaUrl'),
			data:{
				maid: maid
			},
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);
				noty({text: "El Modelo ha sido Borrado.",layout:'topLeft',type:'success'});
				$(Agencia.lid).fadeOut();
			}
		});
	},
	'mostrarAgenciaNotificaciones':function(){
		$.ajax({
			url:Agencia.getOption('listaNotificacionesUrl'),
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);					
				$(Agencia.getOption('notificacionescontainer')).html(data);
				$(Agencia.getOption('agenciaNotificacionesModal')).appendTo("body").modal('show');
				Agencia.cargar_notificaciones();
			}
		});
	},
	'cargar_notificaciones':function(){
		$.ajax({
			url:Agencia.getOption('notificaciones_agencia_url'),
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);					
				$(Agencia.getOption('agenciaNotificacionesContainer')).html(data);
			}
		});
	},
	'asignar_notificacion':function(){
		var fd = $(Agencia.getOption('agenciaNotificacionesForm')).serializeHash();	
		$.ajax({
			url: Agencia.getOption('agregarAgenciaNotificacionUrl'),
			data: fd,
			type:'GET',
			success: function(data){		
				Agencia.check_errors(data);
				if(data.invalid_form == 1){						
					Agencia.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: "La Notificación ha sido Agregada.",layout:'topLeft',type:'success'});
					Agencia.cargar_notificaciones();
				}							
			},
			dataType: 'json'
		});
	},
	'remover_notificacion':function(nid){
		$.ajax({
			url:Agencia.getOption('removerNotificacionAgenciaUrl'),
			data:{
				nid: nid
			},
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);
				noty({text: "La Notificacion sido Borrada.",layout:'topLeft',type:'success'});
				$(Agencia.lid).fadeOut();
			}
		});
	},
	'cargar_modelos_box':function(){
		$.ajax({
			url:"/index.php/agencias/modelos_box",
			data:{
				agencia_id:Agencia.id
			},
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);
				$("#modelosBox").html(data);
			}
		});
	},
	'cargar_vendedores_box':function(){
		$.ajax({
			url:"/index.php/agencias/vendedores",
			data:{
				agencia_id:Agencia.id
			},
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);
				$("#tablaVendedores").html(data);
			}
		});
	},
	'cargar_administradores_box':function(){
		$.ajax({
			url:"/index.php/agencias/administradores",
			data:{
				agencia_id:Agencia.id
			},
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);
				$("#tablaAdministradores").html(data);
			}
		});
	},
	'cambiar_user_status':function(user_id,active){
		$.ajax({
			url:"/index.php/agencias/cambiar_user_status",
			data:{
				user_id:user_id,
				active:active
			},
			type:"GET",
			dataType:"json",
			success:function(data){
				Agencia.check_errors(data);
				noty({text: "Se cambio el status del usuario.",layout:'topLeft',type:'success'});
				Agencia.cargar_vendedores_box();
				Agencia.cargar_administradores_box();
			}
		});
	},
	'show_change_user_pass':function(){
		$.ajax({
			url:Agencia.opt.userPasswordUrl + Agencia.opt.user_id,
			type:"GET",
			success:function(data){
				Agencia.check_errors(data);					
				$(Agencia.opt.changePasswordContainer).html(data);
				$(Agencia.opt.userPasswordModal).appendTo("body").modal("show");
			}
		});
	},
	'init':function(){
		Agencia.cargar_modelos_box();
		Agencia.cargar_vendedores_box();
		Agencia.cargar_administradores_box();
		//Modals
		$(Agencia.getOption('agenciaModeloModal')).on('hidden', function () {
			Agencia.cargar_modelos_box();
	     });
		
		
		//Clicks
		$(document).on("click",Agencia.opt.changeUserPassBtn,function(){
			Agencia.opt.user_id = $(this).attr("user_id");
			Agencia.show_change_user_pass();
		});
		
		$(document).on("click",".change-user-status",function(){
			var user_id = $(this).attr("user_id");
			var active = $(this).attr("active");
			if(active==1){
				var msg = "Activar Usuario?"
			}else{
				var msg = "Desactivar Usuario?";
			}
			if(window.confirm(msg)){
				Agencia.cambiar_user_status(user_id,active);
			}
		});
		
		$(document).on("click",Agencia.getOption('removernotificacionagencia'),function(){
			//event.stopImmediatePropagation();
			Agencia.lid = "#"+$(this).attr("lid");
			var yourstate=window.confirm("Remover Notificacion?")
			if(yourstate){
				Agencia.remover_notificacion($(this).attr("nid"));
			}
		});
		
		$(document).on("click",Agencia.getOption('abreAgenciaNotificacionesModalBtn'),function(){
			Agencia.mostrarAgenciaNotificaciones();
		});
		
		$(document).on("click",Agencia.getOption('removerModeloAgenciaBtn'),function(event){
			event.stopImmediatePropagation();
			Agencia.lid = "#"+$(this).attr("lid");
			var yourstate=window.confirm("Remover Modelo?")
			if(yourstate){
				Agencia.remover_modelo($(this).attr("maid"));
			}

		});
			
		$(document).on("click",Agencia.getOption('asignarNotificacionBtn'),function(){		
			//event.stopInmediatePropagation();
		Agencia.asignar_notificacion();
		});
		
		$(document).on("click",Agencia.getOption('asignarModelosBtnB'),function(event){
			event.stopImmediatePropagation();
			Agencia.asignar_modelo_m();
		});
		
		$(document).on("click",Agencia.getOption('abreAgenciaModelosModalBtn'),function(){
			Agencia.mostrarAgenciaModelos();
		});
	}
});
/**
 * Superadmin Manage Methods
 * 
 * @author Rolando <rgarro@gmail.com> 
 */
var sa = {
		opt:{
			listaUrl:'/index.php/users/users/lista_sa',
			listaContainer:'#listaSa',
			nuevoFrmUrl:"/index.php/users/users/show_crear_sa",
			nuevoFrmContainer:"#crearSa",
			tabs:"#mySaTab",
			addFrm:"#crearSaFrm",
			addUrl:"/index.php/users/users/crear_sa",
			deleteUrl:"/index.php/users/users/delete_sa",
			setStatusUrl:"/index.php/users/users/set_user_status",
			passwordModal:"#saPasswordModal",
			userPasswordUrl:'/index.php/users/users/change_user_password/',
			changePasswordContainer:".sa-pass-modal-body"
		},
		add:function(sa_datos){
			$.ajax({
				url:sa.opt.addUrl,
				data:sa_datos,
				type:"GET",
				dataType:"json",
				success:function(data){
					CRContactos_Manager.check_errors(data);						
					if(data.invalid_form == 1){	
						CRContactos_Manager.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){				
						var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
						sa.lista();
						 $(sa.opt.addFrm).trigger('reset');
		                 $(sa.opt.tabs + ' a:first').tab('show');
					}		
				}
			});		
		},
		lista:function(){
			$.ajax({
				url:sa.opt.listaUrl,
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(sa.opt.listaContainer).html(data);
				}
		    });
		},
		addFrm:function(){
			$.ajax({
				url:sa.opt.nuevoFrmUrl,
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(sa.opt.nuevoFrmContainer).html(data);
				}
		    });
		},
		delete:function(user_id){
			$.ajax({
				url:sa.opt.deleteUrl,
				data:{
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
						var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
						sa.lista();
					}							
				}
			});		
		},
		setStatus:function(user_id,status){
			$.ajax({
				url:sa.opt.setStatusUrl,
				data:{
					user_id:user_id,
					status:status
				},
				type:"GET",
				dataType:"json",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					if(data.invalid_form == 1){						
						CRContactos_Manager.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
						sa.lista();
					}							
				}
			});		
		},
		show_change_user_pass:function(user_id){
			$.ajax({
				url:sa.opt.userPasswordUrl + user_id,
				data:{
					my_user_id:user_id
				},
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);					
					$(sa.opt.changePasswordContainer).html(data);
					$(sa.opt.passwordModal).appendTo("body").modal("show");
				}
			});
		},
		init:function(){
			sa.lista();
			sa.addFrm();
		}
};
var tipos = {
		opt:{
			'listaUrl':'/index.php/tiposdemoto/lista',
			'listaContainer':'#listaTipos',
			'addFrm':'#TipoStageForm',
			'addUrl':'/index.php/tiposdemoto/add',
			'tabs':'#myTipoTab',
			'borraBtn':'.borra-tipo',
			'li_id':'',
			'deleteUrl':'/index.php/tiposdemoto/delete',
		},
		lista:function(){
			$.ajax({
				url:tipos.opt.listaUrl,
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(tipos.opt.listaContainer).html(data);
				}
		    });
		},
		add:function(tipo_data){
			$.ajax({
				url:tipos.opt.addUrl,
				data:tipo_data,
				type:"GET",
				dataType:"json",
				success:function(data){
					CRContactos_Manager.check_errors(data);						
					if(data.invalid_form == 1){	
						CRContactos_Manager.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){				
						var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
						tipos.lista();
						 $(tipos.opt.addFrm).trigger('reset');
		                 $(tipos.opt.tabs + ' a:first').tab('show');
					}		
				}
			});			
		},'delete':function(tipo_id){
			$.ajax({
				url:tipos.opt.deleteUrl,
				data:{
					tipo_id:tipo_id
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
						$("#"+tipos.opt.li_id).addClass("animated rollOut");
					}							
				}
			});		
		},
		init:function(){
			tipos.lista();
			$(document).on('click',tipos.opt.borraBtn,function(){
				tipos.opt.li_id =  $(this).attr("li_id");
				var tipo_id =  $(this).attr("tipo_id");
				if(window.confirm("Borrar Tipo?")){
					tipos.delete(tipo_id);
				}
			});
		}
};
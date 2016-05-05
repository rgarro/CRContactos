/**
 * Manejo de Marcas CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Marcas = {
	'id':0,
	'mid':0,
	'lid':0,
	'opt':{
		'marcaModelosModal':'#marcaModelosModal',
		'marcaModelosContainer':'.marcaModelosContainer',
		'marcaModelosUrl':'/index.php/marcas/marca_modelos',
		'modelosbtn':'.modelosbtn',
		'modelosContainer':'#modelosContainer',
		'cargarMarcaModelosUrl':'/index.php/marcas/cargar_modelos',
		'ModeloAgregarMarcaForm':'#ModeloMarcaModelosForm',
		'borramodelobtn':'.borramodelobtn',
		'removerModeloUrl':'/index.php/marcas/remover_modelo',
		'abremodelofotosBtn':'.abremodelofotos',
		'modeloFotosUrl':'/index.php/marcas/modelo_fotos',
		'modeloFotosContainer':'.modeloFotosContainer',
		'modeloFotosModal':'#modeloFotosModal',
		'modelo_lista_fotos_url':'/index.php/marcas/modelo_lista_fotos',
		'modeloFotosListaContainer':'#modeloFotosListaContainer',
		'removerModeloPicBtn':'.removepic',
		'removerModeloPicUrl':'/index.php/marcas/remover_modelo_pic',
		'marcaModeloEditBtn':'.edit-modelo-btn',
		'modeloShowEditUrl':'/index.php/marcas/show_edit_modelo',
		'editModeloContainer':'.modeloEditContainer',
		'editModeloModal':'#modeloEditModal',
		'editModeloForm':'#ModeloShowEditModeloForm',
		'modeloEditUrl':'/index.php/marcas/edit_modelo'
	},
	'mostrar_marca_modelos':function(){
		$.ajax({
			url:Marcas.opt.marcaModelosUrl,
			data:{
				marca_id:Marcas.id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(Marcas.opt.marcaModelosContainer).html(data);
				$(Marcas.opt.marcaModelosModal).appendTo('body').modal('show');
				Marcas.cargar_marca_modelos();
			}
		});
	},
	'cargar_marca_modelos':function(){
		$.ajax({
			url:Marcas.opt.cargarMarcaModelosUrl,
			type:'GET',
			data:{
				marca_id:Marcas.id
			},
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(Marcas.opt.modelosContainer).html(data);
			}
		});
	},
	'remover_modelo':function(modelo_id){		
		$.ajax({
			url:Marcas.opt.removerModeloUrl,
			data:{
				modelo_id: modelo_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				noty({text: "El Modelo sido Borrado.",layout:'topLeft',type:'success'});
				$(Marcas.lid).fadeOut();
			},
			dataType:'json'
		});
	},
	'cargar_modelo_fotos':function(modelo_id){
		$.ajax({
			url:Marcas.opt.modelo_lista_fotos_url,
			data:{
				modelo_id:modelo_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(Marcas.opt.modeloFotosListaContainer).html(data);
			}
		})
	},
	'abre_modelo_fotos':function(modelo_id){
		$.ajax({
			url:Marcas.opt.modeloFotosUrl,
			data:{
				modelo_id:modelo_id
			},
			type:'GET',
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(Marcas.opt.modeloFotosContainer).html(data);
				$(Marcas.opt.modeloFotosModal).appendTo('body').modal('show');
				Marcas.cargar_modelo_fotos(modelo_id);
			}
		});
	},
	'removerModeloPic':function(modelo_pic_id){
		$.ajax({
			url:Marcas.opt.removerModeloPicUrl,
			data:{
				modelo_pic_id: modelo_pic_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				noty({text: "La Foto ha sido borrada.",layout:'topLeft',type:'success'});
				Marcas.cargar_modelo_fotos(Marcas.mid);
			},
			dataType:'json'
		});
	},
	'showModeloEdit':function(modelo_id){
		$.ajax({
			url:Marcas.opt.modeloShowEditUrl,
			data:{
				modelo_id:modelo_id
			},
			type:"GET",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				$(Marcas.opt.editModeloContainer).html(data);
				$(Marcas.opt.editModeloModal).appendTo('body').modal('show');
			}
		});
	},
	'editModelo':function(modelo_data){
		$.ajax({
			url:Marcas.opt.modeloEditUrl,
			data:modelo_data,
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);
				if(data.invalid_form == 1){						
					CRContactos_Manager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){
					var n = noty({text: data.flash,layout:'topLeft',type:'success'});
					$(Marcas.opt.editModeloModal).modal('hide');
					$(Marcas.opt.editModeloContainer).html(" ");
					Marcas.cargar_marca_modelos();
				}							
			}
		});			
	},
	'init':function(){
		//Modals
		$(Marcas.opt.modeloFotosModal).on('hidden', function () {
			Marcas.cargar_marca_modelos();
		});
		//Forms
		$(document).on('submit',Marcas.opt.ModeloAgregarMarcaForm,function(){
			var frm = $(Marcas.opt.ModeloAgregarMarcaForm);	
			$.ajax({
				url:frm.attr('action'),
				data:frm.serializeHash(),
				type:"POST",
				dataType:"json",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					if(data.invalid_form == 1){						
						CRContactos_Manager.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "El Modelo ha sido Agregado.",layout:'topLeft',type:'success'});
						$(Marcas.opt.ModeloAgregarMarcaForm).trigger('reset');
						Marcas.cargar_marca_modelos();
					}							
				}
			});			
			return false;
		});
		//Clicks
		$(document).on("click",Marcas.opt.marcaModeloEditBtn,function(){ 
			var  modelo_id = $(this).attr("modelo_id");
			Marcas.showModeloEdit(modelo_id);
		});
		
		$(document).on("click",Marcas.opt.removerModeloPicBtn,function(){
			if(window.confirm("Borrar Foto?")){
				Marcas.removerModeloPic($(this).attr("modelo_pic_id"));
			}
		});
		
		$(document).on("click",Marcas.opt.abremodelofotosBtn,function(){
			Marcas.mid = $(this).attr('modelo_id');
			Marcas.abre_modelo_fotos($(this).attr('modelo_id'));
		});
		
		$(document).on("click",Marcas.opt.borramodelobtn,function(){
			if(window.confirm("Borrar Modelo?")){
				Marcas.lid = "#"+$(this).attr("lid");
				Marcas.remover_modelo($(this).attr('modelo_id'));
			}
		});
		
		$(document).on("click",Marcas.opt.modelosbtn,function(){
			Marcas.id = $(this).attr('marca_id');
			Marcas.mostrar_marca_modelos();
		});
	}
};
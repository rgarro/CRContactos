/**
 * Manejo de Marcas CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Marcas = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'id':0,
	'mid':0,
	'lid':0,
	'options':{
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
		'removerModeloPicUrl':'/index.php/marcas/remover_modelo_pic'
	},
	'mostrar_marca_modelos':function(){
		$.ajax({
			url:Marcas.getOption('marcaModelosUrl'),
			data:{
				marca_id:Marcas.id
			},
			type:"GET",
			success:function(data){
				Marcas.check_errors(data);
				$(Marcas.getOption('marcaModelosContainer')).html(data);
				$(Marcas.getOption('marcaModelosModal')).appendTo('body').modal('show');
				Marcas.cargar_marca_modelos();
			}
		});
	},
	'cargar_marca_modelos':function(){
		$.ajax({
			url:Marcas.getOption('cargarMarcaModelosUrl'),
			type:'GET',
			data:{
				marca_id:Marcas.id
			},
			success:function(data){
				Marcas.check_errors(data);
				$(Marcas.getOption('modelosContainer')).html(data);
			}
		});
	},
	'remover_modelo':function(modelo_id){		
		$.ajax({
			url:Marcas.getOption('removerModeloUrl'),
			data:{
				modelo_id: modelo_id
			},
			type:"GET",
			success:function(data){
				Marcas.check_errors(data);
				noty({text: "El Modelo sido Borrado.",layout:'topLeft',type:'success'});
				$(Marcas.lid).fadeOut();
			},
			dataType:'json'
		});
	},
	'cargar_modelo_fotos':function(modelo_id){
		$.ajax({
			url:Marcas.getOption('modelo_lista_fotos_url'),
			data:{
				modelo_id:modelo_id
			},
			type:"GET",
			success:function(data){
				Marcas.check_errors(data);
				$(Marcas.getOption('modeloFotosListaContainer')).html(data);
			}
		})
	},
	'abre_modelo_fotos':function(modelo_id){
		$.ajax({
			url:Marcas.getOption('modeloFotosUrl'),
			data:{
				modelo_id:modelo_id
			},
			type:'GET',
			success:function(data){
				Marcas.check_errors(data);
				$(Marcas.getOption('modeloFotosContainer')).html(data);
				$(Marcas.getOption('modeloFotosModal')).appendTo('body').modal('show');
				Marcas.cargar_modelo_fotos(modelo_id);
			}
		});
	},
	'removerModeloPic':function(modelo_pic_id){
		$.ajax({
			url:Marcas.getOption('removerModeloPicUrl'),
			data:{
				modelo_pic_id: modelo_pic_id
			},
			type:"GET",
			success:function(data){
				Marcas.check_errors(data);
				noty({text: "La Foto ha sido borrada.",layout:'topLeft',type:'success'});
				Marcas.cargar_modelo_fotos(Marcas.mid);
			},
			dataType:'json'
		});
	},
	'init':function(){
		//Modals
		$(Marcas.getOption('modeloFotosModal')).on('hidden', function () {
			Marcas.cargar_marca_modelos();
		});
		//Forms
		$(document).on('submit',Marcas.getOption('ModeloAgregarMarcaForm'),function(){
			var frm = $(Marcas.getOption('ModeloAgregarMarcaForm'));	
			$.ajax({
				url:frm.attr('action'),
				data:frm.serializeHash(),
				type:"POST",
				dataType:"json",
				success:function(data){
					Marcas.check_errors(data);
					if(data.invalid_form == 1){						
						Marcas.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "El Modelo ha sido Agregado.",layout:'topLeft',type:'success'});
						Marcas.cargar_marca_modelos();
					}							
				}
			});			
			return false;
		});
		//Clicks
		$(document).on("click",Marcas.getOption('removerModeloPicBtn'),function(){
			if(window.confirm("Borrar Foto?")){
				Marcas.removerModeloPic($(this).attr("modelo_pic_id"));
			}
		});
		
		$(document).on("click",Marcas.getOption('abremodelofotosBtn'),function(){
			Marcas.mid = $(this).attr('modelo_id');
			Marcas.abre_modelo_fotos($(this).attr('modelo_id'));
		});
		
		$(document).on("click",Marcas.getOption('borramodelobtn'),function(){
			if(window.confirm("Borrar Modelo?")){
				Marcas.lid = "#"+$(this).attr("lid");
				Marcas.remover_modelo($(this).attr('modelo_id'));
			}
		});
		
		$(document).on("click",Marcas.getOption('modelosbtn'),function(){
			Marcas.id = $(this).attr('marca_id');
			Marcas.mostrar_marca_modelos();
		});
	}
});
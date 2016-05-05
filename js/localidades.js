/**
 * Maneja Loccalidades de Agencias CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryValidation
 * @uses Handlebars
 * 
 */
var Localidades = {
		'id':'',
		'opt':{
			'abreAgregarLocalidadFormBtn':'#abreAgregarLocalidadFormBtn',
			'localidadFormModal':'#localidadFormModal',
			'nuevaLocalidadUrl':'/index.php/localidades/ajax_add',
			'localidadesFormContainer':'#localidadesFormContainer',
			'LocalidadeAjaxAddForm':'#LocalidadeAjaxAddForm',
			'nuevaLocalidadBtn':'#nuevaLocalidadBtn',
			'nuevaLocalidadFrm':'#LocalidadeAjaxAddForm',
			'agencia_id':1,
			'localidadesTableContainer':'#localidadesTableContainer',
			'listaLocalidadesUrl':'/index.php/localidades/lista',
			'abreLocalidatesMapaBtn':'#abreLocalidatesMapaBtn',
			'abreEditarlocalidadBtn':'.editarlocalidad',
			'borraLocalidadBtn':'.borralocalidadbtn',
			'editarLocalidadUrl':'/index.php/localidades/ajax_edit/',
			'editarlocalidadFormModal':'#editarlocalidadFormModal',
			'editarlocalidadesFormContainer':'.editarlocalidadesFormContainer',
			'LocalidadeAjaxEditForm':'#LocalidadeAjaxEditForm',
			'doEditarLocalidadBtn':'#doEditarLocalidadBtn',
			'localidaMapaModal':'#localidaMapaModal',
			'localidadesMapaContainer':'.localidadesMapaContainer',
			'localidadesMapaUrl':'/index.php/localidades/map_agencia/',
			'localidadesVendedoresModal':'#localidadesVendedoresModal',
			'vendedoresLocalidadesForm':'#vendedoresLocalidadesForm',
			'localidadesVendedoresBtn':'#localidadesVendedoresBtn',
			'asignarVendedoresUrl':'/index.php/localidades/asignar_vendedores',
			'localidadesAdministradoresModal':'#localidadesAdministradoresModal',
			'localidadesAdministradoresBtn':'#localidadesAdministradoresBtn',
			'administradoresLocalidadesForm':'#administradoresLocalidadesForm',
			'asignarAdministradoresUrl':'/index.php/localidades/asignar_administradores'
		},
		'sources':{
			'row_src':"{{#each lista}}<tr id='loctr{{Localidade.id}}'><td>{{Localidade.nombre}}</td><td class='center'>{{Localidade.canton}}</td><td class='center'><button lid='{{Localidade.id}}' type='button' class='btn btn-success btn-small editarlocalidad'><i class='fa-icon-edit'></i></button> <a href='/index.php/localidades/lista_users_localidad/{{Localidade.id}}' role='button' class='btn btn-primary btn-small' data-toggle='modal' data-target='#localidadesVendedoresModal'><i class='fa-icon-group'></i></a> <a href='/index.php/localidades/lista_administradores_localidad/{{Localidade.id}}' role='button' class='btn btn-inverse btn-small' data-toggle='modal' data-target='#localidadesAdministradoresModal'><i class='fa-icon-user'></i></a></td></tr>{{/each}}"
		},
		'templates':{
			'row_tpl':''
		},
		'cargarFormularioCrear':function(){			
			$.ajax({
				url: Localidades.opt.nuevaLocalidadUrl,
				type:'GET',
				success: function(data){
					CRContactos_Manager.check_errors(data);
					$(Localidades.opt.localidadesFormContainer).html(data);
					$(Localidades.opt.localidadFormModal).appendTo("body").modal('show');
				}
				//dataType: 'html'
			});
		},
		'cargarFormularioEditar':function(localidad_id){
			$.ajax({
				url: Localidades.opt.editarLocalidadUrl + localidad_id,
				type:'GET',
				success: function(data){
					CRContactos_Manager.check_errors(data);					
					$(Localidades.opt.editarlocalidadesFormContainer).html(data);
					$(Localidades.opt.editarlocalidadFormModal).appendTo("body").modal('show');
				}
				//dataType: 'html'
			});
			
		},
		'guardarNuevaLocalidad':function(){
			var fd = $(Localidades.opt.nuevaLocalidadFrm).serializeHash();
			$.ajax({
				url: Localidades.opt.nuevaLocalidadUrl,
				data:fd.data,
				type:'POST',
				success: function(data){
					CRContactos_Manager.check_errors(data);
					if(data.invalid_form == 1){						
						Localidades.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "La Localidad ha sido Agregada.",layout:'topLeft',type:'success'});
						$(Localidades.opt.localidadFormModal).modal('hide');
						Localidades.listaLocalidades();
					}							
				},
				dataType: 'json'
			});
		},
		'guardarLocalidad':function(){
			var fd = $(Localidades.opt.LocalidadeAjaxEditForm).serializeHash();
			$.ajax({
				url: Localidades.opt.editarLocalidadUrl + Localidades.id,
				data:fd.data,
				type:'POST',
				success: function(data){
					CRContactos_Manager.check_errors(data);
					if(data.invalid_form == 1){						
						Localidades.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "La Localidad ha sido Actualizada.",layout:'topLeft',type:'success'});
						$(Localidades.opt.editarlocalidadFormModal).modal('hide');
						Localidades.listaLocalidades();
					}							
				},
				dataType: 'json'
			});
		},
		'listaLocalidades':function(){		
			$.ajax({
				url: Localidades.opt.listaLocalidadesUrl,
				data:{
					'agencia_id':Localidades.opt.agencia_id
				},
				type:'GET',
				success: function(data){
					CRContactos_Manager.check_errors(data);
					$(Localidades.opt.localidadesTableContainer).html(Localidades.templates.row_tpl({'lista':data.lista}));
				},
				dataType: 'json'
			});
		},
		'mapa':function(){
			$.ajax({
				url: Localidades.opt.localidadesMapaUrl + Localidades.opt.agencia_id,
				type:'GET',
				success: function(data){
					CRContactos_Manager.check_errors(data);			
					$(Localidades.opt.localidadesMapaContainer).html(data);
					$(Localidades.opt.localidaMapaModal).appendTo("body").modal('show');
				},
				//dataType: 'json'
			});
		},
		'asignar_vendedores':function(){
			$.ajax({
				url:Localidades.opt.asignarVendedoresUrl,
				type:'GET',
				data:$(Localidades.opt.vendedoresLocalidadesForm).serializeHash(),
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(Localidades.opt.localidadesVendedoresModal).modal("hide");					
				}
			});
		},
		'asignar_administradores':function(){
			$.ajax({
				url:Localidades.opt.asignarAdministradoresUrl,
				type:'GET',
				data:$(Localidades.opt.administradoresLocalidadesForm).serializeHash(),
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(Localidades.opt.localidadesAdministradoresModal).modal("hide");					
				}
			});
		},
		'initc':function(){
			//Preloaders
			//Localidades.init_preloaders();
	
			//data toggles tweaks
			$(Localidades.opt.localidadesVendedoresModal).appendTo("body");
		    $(Localidades.opt.localidadesVendedoresModal).on('hidden', function () {
		    	$(this).removeData('modal');
		     });
		    
		    $(Localidades.opt.localidadesAdministradoresModal).appendTo("body");
		    $(Localidades.opt.localidadesAdministradoresModal).on('hidden', function () {
		    	$(this).removeData('modal');
		     });
		        
			//Templates
			Localidades.templates.row_tpl = Handlebars.compile(Localidades.sources.row_src);
			
			//load info tables
			Localidades.listaLocalidades();
			
			//modals
			$(Localidades.opt.localidaMapaModal).on("shown",function(){
					google.maps.event.trigger(localidades_map_canvas, "resize");
			});
			
			//Clicks
			$(document).on("click",Localidades.opt.localidadesAdministradoresBtn,function(){
				Localidades.asignar_administradores();
			});
			
			$(document).on("click",Localidades.opt.localidadesVendedoresBtn,function(){
				Localidades.asignar_vendedores();
			});
			
			$(document).on("click",Localidades.opt.doEditarLocalidadBtn,function(){
				Localidades.guardarLocalidad();
			});
			
			$(document).on("click",Localidades.opt.abreEditarlocalidadBtn,function(){
				Localidades.id = $(this).attr("lid");
				Localidades.cargarFormularioEditar(Localidades.id);
			});
			
			/*$(document).on("click",Localidades.opt.borraLocalidadBtn,function(){
				alert('borrara');
			});*/
			
			$(document).on('click',Localidades.opt.abreLocalidatesMapaBtn,function(){
				Localidades.mapa();
			});
			
			$(document).on('click',Localidades.opt.nuevaLocalidadBtn,function(){
				Localidades.guardarNuevaLocalidad();
			});
			
			$(document).on('click',Localidades.opt.abreAgregarLocalidadFormBtn,function(){
				Localidades.cargarFormularioCrear();
			});
		}
};
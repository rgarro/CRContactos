/**
 * Maneja Loccalidades de Agencias CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryValidation
 * @uses Handlebars
 * 
 */
var Localidades = $.extend(CRContactos_Manager,{
		'getOptionsc':function(options){
			this.options = $.extend(this.options,options);
		},
		'id':'',
		'options':{
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
				url: Localidades.getOption('nuevaLocalidadUrl'),
				type:'GET',
				success: function(data){
					Localidades.check_errors(data);
					$(Localidades.getOption('localidadesFormContainer')).html(data);
					$(Localidades.getOption('localidadFormModal')).appendTo("body").modal('show');
				}
				//dataType: 'html'
			});
		},
		'cargarFormularioEditar':function(localidad_id){
			$.ajax({
				url: Localidades.getOption('editarLocalidadUrl') + localidad_id,
				type:'GET',
				success: function(data){
					Localidades.check_errors(data);					
					$(Localidades.getOption('editarlocalidadesFormContainer')).html(data);
					$(Localidades.getOption('editarlocalidadFormModal')).appendTo("body").modal('show');
				}
				//dataType: 'html'
			});
			
		},
		'guardarNuevaLocalidad':function(){
			var fd = $(Localidades.getOption('nuevaLocalidadFrm')).serializeHash();
			$.ajax({
				url: Localidades.getOption('nuevaLocalidadUrl'),
				data:fd.data,
				type:'POST',
				success: function(data){
					Localidades.check_errors(data);
					if(data.invalid_form == 1){						
						Localidades.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "La Localidad ha sido Agregada.",layout:'topLeft',type:'success'});
						$(Localidades.getOption('localidadFormModal')).modal('hide');
						Localidades.listaLocalidades();
					}							
				},
				dataType: 'json'
			});
		},
		'guardarLocalidad':function(){
			var fd = $(Localidades.getOption('LocalidadeAjaxEditForm')).serializeHash();
			$.ajax({
				url: Localidades.getOption('editarLocalidadUrl') + Localidades.id,
				data:fd.data,
				type:'POST',
				success: function(data){
					Localidades.check_errors(data);
					if(data.invalid_form == 1){						
						Localidades.noty_form_errors(data.error_list);
					}
					if(data.is_success == 1){
						var n = noty({text: "La Localidad ha sido Actualizada.",layout:'topLeft',type:'success'});
						$(Localidades.getOption('editarlocalidadFormModal')).modal('hide');
						Localidades.listaLocalidades();
					}							
				},
				dataType: 'json'
			});
		},
		'listaLocalidades':function(){		
			$.ajax({
				url: Localidades.getOption('listaLocalidadesUrl'),
				data:{
					'agencia_id':Localidades.getOption('agencia_id')
				},
				type:'GET',
				success: function(data){
					Localidades.check_errors(data);
					$(Localidades.getOption('localidadesTableContainer')).html(Localidades.templates.row_tpl({'lista':data.lista}));
				},
				dataType: 'json'
			});
		},
		'mapa':function(){
			$.ajax({
				url: Localidades.getOption('localidadesMapaUrl') + Localidades.getOption('agencia_id'),
				type:'GET',
				success: function(data){
					Localidades.check_errors(data);			
					$(Localidades.getOption('localidadesMapaContainer')).html(data);
					$(Localidades.getOption('localidaMapaModal')).appendTo("body").modal('show');
				},
				//dataType: 'json'
			});
		},
		'asignar_vendedores':function(){
			$.ajax({
				url:Localidades.getOption('asignarVendedoresUrl'),
				type:'GET',
				data:$(Localidades.getOption('vendedoresLocalidadesForm')).serializeHash(),
				success:function(data){
					Localidades.check_errors(data);
					$(Localidades.getOption('localidadesVendedoresModal')).modal("hide");					
				}
			});
		},
		'asignar_administradores':function(){
			$.ajax({
				url:Localidades.getOption('asignarAdministradoresUrl'),
				type:'GET',
				data:$(Localidades.getOption('administradoresLocalidadesForm')).serializeHash(),
				success:function(data){
					Localidades.check_errors(data);
					$(Localidades.getOption('localidadesAdministradoresModal')).modal("hide");					
				}
			});
		},
		'initc':function(){
			//Preloaders
			//Localidades.init_preloaders();
	
			//data toggles tweaks
			$(Localidades.getOption('localidadesVendedoresModal')).appendTo("body");
		    $(Localidades.getOption('localidadesVendedoresModal')).on('hidden', function () {
		    	$(this).removeData('modal');
		     });
		    
		    $(Localidades.getOption('localidadesAdministradoresModal')).appendTo("body");
		    $(Localidades.getOption('localidadesAdministradoresModal')).on('hidden', function () {
		    	$(this).removeData('modal');
		     });
		        
			//Templates
			Localidades.templates.row_tpl = Handlebars.compile(Localidades.sources.row_src);
			
			//load info tables
			Localidades.listaLocalidades();
			
			//modals
			$(Localidades.getOption('localidaMapaModal')).on("shown",function(){
					google.maps.event.trigger(localidades_map_canvas, "resize");
			});
			
			//Clicks
			$(document).on("click",Localidades.getOption('localidadesAdministradoresBtn'),function(){
				Localidades.asignar_administradores();
			});
			
			$(document).on("click",Localidades.getOption('localidadesVendedoresBtn'),function(){
				Localidades.asignar_vendedores();
			});
			
			$(document).on("click",Localidades.getOption('doEditarLocalidadBtn'),function(){
				Localidades.guardarLocalidad();
			});
			
			$(document).on("click",Localidades.getOption('abreEditarlocalidadBtn'),function(){
				Localidades.id = $(this).attr("lid");
				Localidades.cargarFormularioEditar(Localidades.id);
			});
			
			/*$(document).on("click",Localidades.getOption('borraLocalidadBtn'),function(){
				alert('borrara');
			});*/
			
			$(document).on('click',Localidades.getOption('abreLocalidatesMapaBtn'),function(){
				Localidades.mapa();
			});
			
			$(document).on('click',Localidades.getOption('nuevaLocalidadBtn'),function(){
				Localidades.guardarNuevaLocalidad();
			});
			
			$(document).on('click',Localidades.getOption('abreAgregarLocalidadFormBtn'),function(){
				Localidades.cargarFormularioCrear();
			});
		}
});
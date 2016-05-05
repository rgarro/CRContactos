/**
 * Manejo de Agencias CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Agencias = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'id':0,
	'mid':0,
	'lid':0,
	'options':{
		'agenciaMarcasModal':'#agenciaMarcasModal',
		'agenciaMarcasBtn':'#agenciaMarcasBtn',
		'asignarMarcasUrl':'/index.php/agencias/asignar_marcas',
		'marcasAgenciaUrl':'/index.php/agencias/marcas_agencia/',
		'agenciaMarcasContainer':'#agenciaMarcasContainer',
		'agenciaMarcaForm':'#agenciaMarcaForm',
		'quitarMarcaAgenciaBtn':'.quitarMarcaAgencia',
		'removerMarcaAgenciaUrl':'/index.php/agencias/borrar_marca'
	},
	'asignar_agencia':function(){
		$.ajax({
			url:Agencias.getOption('asignarMarcasUrl'),
			type:'GET',
			data:$(Agencias.getOption('agenciaMarcaForm')).serializeHash(),
			success:function(data){
				Agencias.check_errors(data);
				if(data.is_success == 1){					
					var n = noty({text: "La Marca ha sido Agregada.",layout:'topLeft',type:'success'});
					Agencias.cargar_marcas();
				}
				if(data.is_error == 1){
					var n = noty({text: data.error_msg,layout:'bottomLeft',type:'error'});
				}
				Agencias.cargar_marcas();
			},
			dataType:'json'
		});
	},
	'cargar_marcas':function(){
		$.ajax({
			url: Agencias.getOption('marcasAgenciaUrl') + Agencias.id,
			type:'GET',
			success: function(data){
				Agencias.check_errors(data);					
				$(Agencias.getOption('agenciaMarcasContainer')).html(data);
			}
			//dataType: 'html'
		});
	},
	'remover_marca':function(){
		$.ajax({
			url:Agencias.getOption('removerMarcaAgenciaUrl'),
			data:{
				mid:Agencias.mid
			},
			type:"GET",
			success:function(data){
				Agencias.check_errors(data);
				var n = noty({text: "La Marca ha sido Borrada.",layout:'topLeft',type:'success'});
				$(Agencias.lid).hide();
			}
		});
	},
	'init':function(){
		//Modal Tweaks
		$(Agencias.getOption('agenciaMarcasModal')).appendTo("body");
	    $(Agencias.getOption('agenciaMarcasModal')).on('hidden', function () {
	    	$(this).removeData('modal');
	     });
	    $(Agencias.getOption('agenciaMarcasModal')).on('shown', function () {
	    	Agencias.cargar_marcas();
	     });
	    //Clicks
	    $(document).on("click",Agencias.getOption('quitarMarcaAgenciaBtn'),function(){
	    	if(window.confirm("Quitar Marca?")){
	    		Agencias.mid = $(this).attr("mid");
		    	Agencias.lid = "#"+$(this).attr("lid");
		    	Agencias.remover_marca();
	    	}
	    });
	    
	    $(document).on('click','.modalid',function(){
	    	Agencias.id = $(this).attr("agencia_id");
	    });
	    
	    $(document).on("click",Agencias.getOption('agenciaMarcasBtn'),function(){
	    	Agencias.asignar_agencia();
	    });
	}
});
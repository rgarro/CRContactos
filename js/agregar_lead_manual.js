/**
 * Add Lead CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

function direct_lead_show_map(position) { 
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
	$("#LeadLat").attr("value",latitude);
	$("#LeadLon").attr("value",longitude);
}

var AddLead = {
	'opt':{
		'marcaModelosModal':'#marcaModelosModal',
		'LeadAgregarLeadDirectamenteForm':'#LeadAgregarLeadDirectamenteForm',
		'LeadModelos':'#LeadModelos',
		'addUrl':'/index.php/leads/agregar_lead_directamente_get'
	},
	'send_direct_lead':function(lead_datos){
		$.ajax({
			url:AddLead.opt.addUrl,
			data:lead_datos,
			type:"GET",
			dataType:"json",
			success:function(data){
				CRContactos_Manager.check_errors(data);						
				if(data.invalid_form == 1){	
					CRContactos_Manager.noty_form_errors(data.error_list);
				}
				if(data.is_success == 1){				
					var n = noty({text: data.flash,layout:'topLeft',type:'success','timeout':5000});
					 $(AddLead.opt.LeadAgregarLeadDirectamenteForm).trigger('reset');
				}		
			}
		});			
	},
	'init':function(){
		navigator.geolocation.getCurrentPosition(direct_lead_show_map);
		
		$(document).on("submit",AddLead.opt.LeadAgregarLeadDirectamenteForm,function(){
			var lead_datos = $(AddLead.opt.LeadAgregarLeadDirectamenteForm).serializeHash();
			AddLead.send_direct_lead(lead_datos.data);
			//noty({text: "Debe Seleccionar al menos un modelo.",layout:'bottomLeft',type:'error'});
			return false;
		});
	}
};
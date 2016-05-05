/**
 * Add Lead CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var AddLead = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'options':{
		'marcaModelosModal':'#marcaModelosModal',
		'LeadAgregarLeadDirectamenteForm':'#LeadAgregarLeadDirectamenteForm',
		'LeadModelos':'#LeadModelos'
	},
	'init':function(){
		$(document).on("submit",AddLead.getOption('LeadAgregarLeadDirectamenteForm'),function(){			
			var x = 0;
			var models = [];
			for(i=0; i<document.test.checkgroup.length; i++){
				if (document.test.checkgroup[i].checked==true){
					models[x] = document.test.checkgroup[i].value;
					x++;
				}
			}
			if(models.length > 0){
				$(AddLead.getOption('LeadModelos')).attr("value",models.join());
				return true;
			}else{
				noty({text: "Debe Seleccionar al menos un modelo.",layout:'bottomLeft',type:'error'});
				return false;
			}
		});
	}
});
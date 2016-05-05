/**
 * Reportes CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Reportes = $.extend(CRContactos_Manager,{
	'getOptions':function(options){
		this.options = $.extend(this.options,options);
	},
	'options':{
		'desde':'#desde',
		'hasta':'#hasta',
		'status':'#status',
		'reporteUrl':'/index.php/leads/reporte_url',
		'reportsForm':'#reportsForm',
		'reportContainer':'#reportContainer'
	},
	'init':function(){
		$(Reportes.getOption('desde')).datepicker({dateFormat:'yy-mm-dd'});
		$(Reportes.getOption('hasta')).datepicker({dateFormat:'yy-mm-dd'});
		
		$(Reportes.getOption('reportsForm')).on("submit",function(){
			$.ajax({
				url:Reportes.getOption('reporteUrl'),
				data:$(Reportes.getOption('reportsForm')).serializeHash(),
				type:"GET",
				success:function(data){
					Reportes.check_errors(data);
					$(Reportes.getOption('reportContainer')).html(data);
				}
			});			
			return false;
		});
		
	}
});
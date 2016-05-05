/**
 * Reportes CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 * @uses JQuery
 * @uses JQueryHash
 * 
 */

var Reportes = {
	'opt':{
		'desde':'#desde',
		'hasta':'#hasta',
		'status':'#status',
		'reporteUrl':'/index.php/leads/reporte_url',
		'reportsForm':'#reportsForm',
		'reportContainer':'#reportContainer'
	},
	'init':function(){
		$(Reportes.opt.desde).datepicker({dateFormat:'yy-mm-dd'});
		$(Reportes.opt.hasta).datepicker({dateFormat:'yy-mm-dd'});
		
		$(Reportes.opt.reportsForm).on("submit",function(){
			$.ajax({
				url:Reportes.opt.reporteUrl,
				data:$(Reportes.opt.reportsForm).serializeHash(),
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(Reportes.opt.reportContainer).html(data);
				}
			});			
			return false;
		});
		
	}
};
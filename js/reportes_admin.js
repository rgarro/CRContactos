var ReportesAdmin = {
	'opt':{
		'desde':'#desdeR',
		'hasta':'#hastaR',
		'status':'#status',
		'reporteUrl':'/index.php/reportesadmin/reporte_fecha_url',
		'reportsForm':'#reportsAdminFechaForm',
		'reportContainer':'#reportAdminFechaContainer'
	},
	'init':function(){
		$(ReportesAdmin.opt.desde).datepicker({dateFormat:'yy-mm-dd'});
		$(ReportesAdmin.opt.hasta).datepicker({dateFormat:'yy-mm-dd'});
		
		$(ReportesAdmin.opt.reportsForm).on("submit",function(){
			$.ajax({
				url:ReportesAdmin.opt.reporteUrl,
				data:$(ReportesAdmin.opt.reportsForm).serializeHash(),
				type:"GET",
				success:function(data){
					CRContactos_Manager.check_errors(data);
					$(ReportesAdmin.opt.reportContainer).html(data);
				}
			});			
			return false;
		});
		
	}
};
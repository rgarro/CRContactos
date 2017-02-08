/**
 * ColorBox crcontactos ajax mounter
 *
 * @author Rolando <rolando@emptyart.xyz>
 */
function colorMounter(){
	this.l = [];
	//this.url = "http://localhost:2001/index.php/publicidad/publicitybylabels";
	this.url = "http://crcontactos.com/index.php/publicidad/publicitybylabels";
}

colorMounter.prototype.isArrayOfLabels = function(labels){
	return Array.isArray(labels);
}

colorMounter.prototype.loadPublicityByLabels = function(labels){
	if(this.isArrayOfLabels(labels)){
		this.l = labels;
		$.ajax({
			url:this.url,
			data:{
				labels:this.l.join(",")
			},
			type:"GET",
			success:function(data){
				$(data).appendTo('body');
			}
		});
	}else{
		throw new Error("Labels must be an array of string ... ");
	}
}

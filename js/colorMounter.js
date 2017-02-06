/**
 * Created by rolando on 2/5/17.
 */
function colorMounter(){
	this.l = [];
	this.url = "";
}

colorMounter.prototype.isArrayOfLabels = function(labels){
	return Array.isArray(labels);
}

colorMounter.prototype.loadPublicityByLabels = function(labels){
	if(this.isArrayOfLabels(labels)){
		this.l = labels;
	}else{
		throw new Error("Labels must be an array of string");
	}
}

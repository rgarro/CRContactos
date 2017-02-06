/**
 * Created by rolando on 2/5/17.
 */
function colorMounter(labels){
	this.l = [];
}

colorMounter.prototype.isArrayOfLabels = function(labels){
	return Array.isArray(labels);
}

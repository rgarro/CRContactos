

$(document).ready(function(){
				  				  
				  $(document).on("click",".tresdbtn",function(evt){
								 var action_class = $(this).attr("action_class");
								 var container_id = $(this).attr("container_id");
								 var box = document.getElementById(container_id).children[0];
								 $(box).removeAttr("class");
								 $(box).addClass(action_class);
				   });
});
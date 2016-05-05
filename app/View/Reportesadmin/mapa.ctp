<div class="marcas index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2 class="animated flash"><i class="fa fa-plane"></i><span class="break"></span> Mapa</h2>
						<div class="box-icon">
							<?php echo $this->element('preloader_img');?>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
					
<div id="googleMap" style="width:100%;min-height:450px;height: 80%;"></div>
	</div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
 	
 
 	
 var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };
  	
 var mapProp = {
    center:new google.maps.LatLng(9.933,-84.084),
    zoom:11,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  
  <?php
  $i = 0;
foreach($leads as $l){
?>	

  
var icon<?php echo $i;?> = {
    url: "<?php echo $l['pics'][0]['file'];?>", // url
    scaledSize: new google.maps.Size(52,52), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};


var marker<?php echo $i;?> = new google.maps.Marker({
    position:{
        lat: <?php echo $l['Lead']['lat'];?>,
        lng: <?php echo $l['Lead']['lon'];?>
      },
       icon: icon<?php echo $i;?>,
      //shape: shape,
      title: "<?php echo $l['Lead']['modelos'];?>",
    label: "<?php echo $l['Lead']['modelos'];?>",
    map: map
  });

 var contentString<?php echo $i;?> = "<ul><li><img width='150' src='<?php echo $l['pics'][0]['file'];?>'/></li><li><b><?php echo $l['Marca']['nombre'];?></b> <?php echo $l['Lead']['modelos'];?></li><li><?php echo $l['Lead']['creadad'];?></li><li><?php $this->Gravatar->displayProfilePicture("",$l['Lead']['email']);?></li><li><?php echo $l['Lead']['nombre'];?> <?php echo $l['Lead']['primer_apellido'];?></li><li><?php echo $l['Lead']['email'];?></li><li><?php echo $l['Lead']['celular'];?></li></ul>";  
 var infowindow<?php echo $i;?> = new google.maps.InfoWindow({
    content: contentString<?php echo $i;?>
  });
  
  marker<?php echo $i;?>.addListener('click', function() {
    infowindow<?php echo $i;?>.open(map, marker<?php echo $i;?>);
  });
   
  <?php
  $i++;
   } 
   ?>
  
 });
</script>
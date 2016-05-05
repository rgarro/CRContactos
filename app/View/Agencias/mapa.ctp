<div class="agencias index">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="icon-globe"></i><span class="break"></span> Mapa Agencias</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	
    <?= $this->Html->script("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false); ?>
    <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>
 
    <?php
      $map_options = array(
        "id"           => "map_canvas",
        "width"        => "100%",
        "height"       => "500px",
        "zoom"         => 11,
        "type"         => "ROADMAP",
        "localize"     => true,
        //"latitude"     => $lat,
        //"longitude"    => $lon,
        //"marker"       => true,
        ///"markerIcon"   => "http://google-maps-icons.googlecode.com/files/home.png",
        ///"markerShadow" => "http://google-maps-icons.googlecode.com/files/shadow.png",
        //"infoWindow"   => true,
        "windowText"   => "Usted Esta Aqui"
      );
    ?>
 
  
    <?= $this->GoogleMap->map($map_options); ?>
	<?php 
	$i = 1;
	foreach ($agencias as $agencia): ?>
 <?=
      $this->GoogleMap->addMarker("map_canvas", $i, array("latitude" => $agencia['Agencia']['lat'], "longitude" => $agencia['Agencia']['lon']), array(
        "showWindow"   => true,
        "windowText"   => $agencia['Agencia']['nombre']."<br>".$this->Html->image("{$agencia['Agencia']['logo_file']}/{$agencia['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-polaroid")),
        "markerTitle"  => $agencia['Agencia']['nombre'],
        //"markerIcon"   => "http://crcontactos.com/app/webroot/files/agencia/logo/".$agencia['Agencia']['logo_file']."/".$agencia['Agencia']['logo'],
        //"markerIcon"   => "http://motoleads.local:3001/app/webroot/files/agencia/logo/".$agencia['Agencia']['logo_file']."/".$agencia['Agencia']['logo'],
         "markerIcon"   => "http://www.fenaractivo.com/img/icon-moto.png",
        "markerShadow" => "http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png"
      ));
	  $i++;
    ?>
<?php endforeach; ?>
	
	
</div>
</div>
<div class="actions">
	<ul>
		
		<li><?php echo $this->Html->link("<i class='icon-home'></i> ".__('List Agencias'), array('action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small ',
    'escape' => false)); ?></li>
	</ul>
</div>

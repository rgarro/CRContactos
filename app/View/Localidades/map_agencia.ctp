<div class="row">
	<div class="span3">
    <?php
      $map_options = array(
        "id"           => "localidades_map_canvas",
        "width"        => "500px",
        "height"       => "300px",
        "zoom"         => 11,
        "type"         => "ROADMAP",
        "localize"     => true,
        "style"		   => "mapmodal",
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
	foreach ($lista as $agencia): ?>
 <?=
      $this->GoogleMap->addMarker("localidades_map_canvas", $i, array("latitude" => $agencia['Localidade']['lat'], "longitude" => $agencia['Localidade']['lon']), array(
        "showWindow"   => true,
        "windowText"   => $agencia['Localidade']['nombre']."<br>".$this->Html->image("{$agencia['Agencia']['logo_file']}/{$agencia['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-polaroid")),
        "markerTitle"  => $agencia['Localidade']['nombre'],
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
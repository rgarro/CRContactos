<?php
App::uses('AppHelper', 'View/Helper');

class MotopinHelper extends Helper {
	
	public function passed(){
		return "yes";
	}
	
	public function map_pin_content_format($l){
		return  "<ul><li>".$l['Lead']['modelos']."</li><li>".$l['Lead']['creadad']."</li><li>".$l['Lead']['nombre'] ." ". $l['Lead']['primer_apellido']."</li><li>". $l['Lead']['email']."</li><li>". $l['Lead']['celular']."</li></ul>";
	}
	
}

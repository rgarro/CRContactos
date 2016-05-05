<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Agencia', 'Model');
App::uses('HtmlHelper', 'View/Helper');

class AgenciahelperHelper extends Helper {
	
	public function display_agencia_top_logo($agencia_id,$email=false){
		$ag = new Agencia();
		$agencia = $ag->findById($agencia_id);
		//return $this->Html->image("{$agencia['Agencia']['logo_file']}/{$agencia['Agencia']['logo']}", array('pathPrefix' => 'files/agencia/logo/',"class"=>"img-rounded","height"=>"75px"));
		if($email){
			return "<img src='http://crcontactos.com/app/webroot/files/agencia/logo/".$agencia['Agencia']['logo_file']."/".$agencia['Agencia']['logo']."' class='img-rounded' style='height:45px;width:auto;margin-top: -13px;'/>";
		}else{
			return "<img src='http://crcontactos.com/app/webroot/files/agencia/logo/".$agencia['Agencia']['logo_file']."/".$agencia['Agencia']['logo']."' class='img-rounded' style='height:45px;width:auto;'/>";
		}
	}
}

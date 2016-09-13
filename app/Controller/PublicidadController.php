<?php
 /**
  * Publicidad Controller
  *
  * @author Rolando <rolando@emptyart.xy>
  */
 App::uses('CakeEmail', 'Network/Email');
 //App::uses('CrcController', 'Controller');
 App::uses('AppController', 'Controller');
 //App::uses('Formfinale', 'Model');
class PublicidadController extends AppController {

	/*public function beforeFilter(){
		parent::beforeFilter();
			//$this->allow_only_sa();
		//$this->Security->unlockedActions = array('modelos_select','agregar_seguimiento','agregar_lead_directamente');
	}*/

	public function index(){
		$this->layout = "ajax";
	}



}

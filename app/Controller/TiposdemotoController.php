<?php
App::uses('CrcController', 'Controller');

class TiposdemotoController extends CrcController {

	public $uses = array('Tipo');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
	}

	public function stage() {
		$this->layout = "ajax";		
	}
	
	public function lista(){
		$this->layout = "ajax";
		$tipos = $this->Tipo->find('all');
		$this->set('tipos', $tipos);
	}
	
	public function add(){
		$this->layout = "ajax";
		if (isset($_GET['Tipo']['nombre'])) {
			$this->Tipo->create();
			if ($this->Tipo->save($_GET['Tipo'])) {
				$this->set('data',array('is_success'=>1,'flash'=>$_GET['Tipo']['nombre'].' ha sido agregado a la lista de tipos.'));
			} else {
				$errors = $this->Tipo->validationErrors;
				$this->set('data',array('is_success'=>0,'invalid_form'=>1,'error_list'=>$errors));
			}
			$this->render("/General/serialize_json");
		}
	}
	
	public function delete($id = null) {
		$this->layout = "ajax";
		$this->Tipo->id = $_GET['tipo_id'];;
		if (!$this->Tipo->exists()) {
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("servicio"=>'Invalid Tipo')));
		}
		if ($this->Tipo->delete()) {
			$data = array("is_success"=>1,"flash"=>'El Tipo ha sido borrado.');
		} else {
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("evento"=>"error borrando")));
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
}
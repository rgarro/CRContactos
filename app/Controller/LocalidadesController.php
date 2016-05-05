<?php
App::uses('CrcController', 'Controller');
/**
 * Localidades Controller
 *
 * @property Localidade $Localidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LocalidadesController extends CrcController {

public $uses = array('AdministradoreLocalidade','VendedoreLocalidade','Localidade','Administradore','User','Agencia','Vendedore');

	public function asignar_administradores(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read("agencia_id"));
		$this->layout = "ajax";
		$this->AdministradoreLocalidade->deleteAll(array("Localidade_id"=>$_GET['localidade_id']));
		if(count($_GET['user'])){
			foreach($_GET['user'] as $u){
				$vl = array("AdministradoreLocalidade"=>array("localidade_id"=>$_GET['localidade_id'],"administradore_id"=>$u));
				$this->AdministradoreLocalidade->create();
				$this->AdministradoreLocalidade->save($vl);
			}
		}
		$data = array("is_success"=>1);	
		$this->set('data', $data);
		$this->render("/General/serialize_json");	
	}

	public function lista_administradores_localidad($id){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read("agencia_id"));
		$this->layout = "ajax";
		$opt = array('conditions' => array('agencia_id' => $this->Session->read("agencia_id")));
		$this->set('administradores', $this->Administradore->find('all',$opt));
		$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
		$this->set('localidad', $this->Localidade->find('first', $options));
		$l = $this->Localidade->find('first', $options);
		$administradores_ids = array();
		foreach($l['AdministradoreLocalidade'] as $vl){
			$administradores_ids[] = $vl['administradore_id'];
		}
		$this->set("administradores_ids",$administradores_ids);
	}

	public function asignar_vendedores(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read("agencia_id"));
		$this->layout = "ajax";
		$this->VendedoreLocalidade->deleteAll(array("Localidade_id"=>$_GET['localidade_id']));
		if(count($_GET['user'])){
			foreach($_GET['user'] as $u){
				$vl = array("VendedoreLocalidade"=>array("localidade_id"=>$_GET['localidade_id'],"vendedore_id"=>$u));
				$this->VendedoreLocalidade->create();
				$this->VendedoreLocalidade->save($vl);
			}
		}
		$data = array("is_success"=>1);	
		$this->set('data', $data);
		$this->render("/General/serialize_json");	
	}

public function lista_users_localidad($id){
	$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read("agencia_id"));
		$this->layout = "ajax";
		$opt = array('conditions' => array('agencia_id' => $this->Session->read("agencia_id")));
		$this->set('vendedores', $this->Vendedore->find('all',$opt));
		$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
		$this->set('localidad', $this->Localidade->find('first', $options));
		$l = $this->Localidade->find('first', $options);
		$vendedores_ids = array();
		foreach($l['VendedoreLocalidade'] as $vl){
			$vendedores_ids[] = $vl['vendedore_id'];
		}
		$this->set("vendedores_ids",$vendedores_ids);
}

public function lista(){
	$this->layout = "ajax";
	$opt = array('conditions' => array('agencia_id' => $_GET['agencia_id']));
	$lista = $this->Localidade->find('all',$opt);
	$data = array("is_success"=>1,"lista"=>$lista);	
	$this->set('data', $data);
	$this->render("/General/serialize_json");	
}

public function map_agencia($id){
	$this->layout = "ajax";
	$opt = array('conditions' => array('agencia_id' => $id));
	$lista = $this->Localidade->find('all',$opt);
	$this->set("lista",$lista);
}

public function ajax_edit($id = null) {
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read("agencia_id"));
		$this->layout = "ajax";
		if (!$this->Localidade->exists($id)) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			 $this->Localidade->set($this->request->data);
			if($this->Localidade->validates()){
				if ($this->Localidade->save($this->request->data)) {
					$this->set('data',array("is_success"=>1));
				} else {
					$errors = array("Error"=>array("error saving."));
					$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
				}
			}else{
				$errors = $this->Localidade->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
			}
			$this->render("/General/serialize_json");
		} else {
			$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
			$this->request->data = $this->Localidade->find('first', $options);
		}
	}

public function ajax_add() {
	$this->allow_sa_and_admin();
	$this->_filter_employees_only($this->Session->read("agencia_id"));
	$this->layout = "ajax";
		if ($this->request->is('post')) {
			$this->Localidade->set($this->request->data);
			if($this->Localidade->validates()){
				if ($this->Localidade->save($this->request->data)) {
					$this->set('data',array("is_success"=>1));
				} else {
					$errors = array("Error"=>array("error saving."));
					$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
				}
			}else{
				$errors = $this->Localidade->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
			}
			$this->render("/General/serialize_json");
		}
		$agencias = $this->Localidade->Agencia->find('list');
		$this->set(compact('agencias'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->allow_only_sa();
		$this->Localidade->recursive = 0;
		$this->set('localidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->allow_only_sa();
		if (!$this->Localidade->exists($id)) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
		$this->set('localidade', $this->Localidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->allow_only_sa();
		if ($this->request->is('post')) {
			$this->Localidade->create();
			if ($this->Localidade->save($this->request->data)) {
				$this->Session->setFlash(__('The localidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localidade could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		}
		$agencias = $this->Localidade->Agencium->find('list');
		$this->set(compact('agencias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->allow_only_sa();
		if (!$this->Localidade->exists($id)) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Localidade->save($this->request->data)) {
				$this->Session->setFlash(__('The localidade has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localidade could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
			$this->request->data = $this->Localidade->find('first', $options);
		}
		$agencias = $this->Localidade->Agencium->find('list');
		$this->set(compact('agencias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->allow_only_sa();
		$this->Localidade->id = $id;
		if (!$this->Localidade->exists()) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Localidade->delete()) {
			$this->Session->setFlash(__('The localidade has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The localidade could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('CrcController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MarcasController extends CrcController {

/**
 * Components
 *
 * @var array
 */
	
	public $uses = array('Marca','Modelo','ModeloPic','Tipo');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
	}
	
	public function remover_modelo_pic(){
		$this->layout = "ajax";
		$this->ModeloPic->delete($_GET['modelo_pic_id']);
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");	
	}
	
	public function modelo_lista_fotos(){
		$this->layout = "ajax";
		$this->set("modelo",$this->Modelo->findById($_GET['modelo_id']));
	}
	
	public function modelo_fotos(){
		$this->layout = "ajax";
		$this->set("modelo",$this->Modelo->findById($_GET['modelo_id']));
	}
	
	public function remover_modelo(){
		$this->layout = "ajax";
		$this->Modelo->delete($_GET['modelo_id']);
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");	
	}
	
	public function agregar_modelo(){
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			$this->Modelo->create();
			if ($this->Modelo->save($this->request->data)) {
				$this->set('data',array("is_success"=>1));
			} else {
				$errors = $this->Modelo->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
			}
			$this->render("/General/serialize_json");
		}
	}

	public function cargar_modelos(){
		$this->layout = "ajax";	
		$this->set('modelos',$this->Modelo->findAllByMarcaId($_GET['marca_id']));
	}

	public function marca_modelos(){
		$this->layout = "ajax";	
		$tipos = $this->Tipo->find('all');
		$nombre_tipos = array();
		foreach($tipos as $t){
			$nombre_tipos[$t['Tipo']['nombre']] = $t['Tipo']['nombre'];
		}
		$this->set('nombre_tipos',$nombre_tipos);
		$this->set('marca',$this->Marca->findById($_GET['marca_id']));
	
	}
	
	public function show_edit_modelo(){
		$this->layout = "ajax";
		$modelo = $this->Modelo->findById($_GET['modelo_id']);	
		$this->set('modelo',$modelo);
		$tipos = $this->Tipo->find('all');
		$nombre_tipos = array();
		$nombre_tipos[$modelo['Modelo']['tipo']] = $modelo['Modelo']['tipo'];
		foreach($tipos as $t){
			$nombre_tipos[$t['Tipo']['nombre']] = $t['Tipo']['nombre'];
		}
		$this->set('nombre_tipos',$nombre_tipos);
		$options = array('conditions' => array('Modelo.Id' => $_GET['modelo_id']));
		$modelo = $this->Modelo->find('first', $options);
        $this->request->data = $modelo;
	}
	
	public function agregar_modelo_pic(){
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			$this->ModeloPic->create();
			if ($this->ModeloPic->save($this->request->data)) {
				$this->set('data',array("is_success"=>1));
			} else {
				$errors = $this->ModeloPic->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
			}
			$this->render("/General/serialize_json");
		}
	}
	
	public function edit_modelo(){
		$this->layout = "ajax";	
		if (!$this->Modelo->exists($_GET['Modelo']['id'])) {
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("modelo"=>'Modelo Invalido')));
		}
		if (isset($_GET['Modelo']['id'])) {
			if ($this->Modelo->save($_GET['Modelo'])) {
				$this->set('data',array("is_success"=>1,"flash"=>"El Modelo Ha sido actualizado"));
			} else {
				$errors = $this->Modelo->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
			}
			$this->render("/General/serialize_json");
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "ajax";
		$this->Marca->recursive = 0;
		$this->set('marcas', $this->Marca->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
		$this->set('marca', $this->Marca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Marca->create();
			if ($this->Marca->save($this->request->data)) {
				$this->Session->setFlash(__('The marca has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect('/#/Marcas/');
			} else {
				$this->Session->setFlash(__('The marca could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Marca->save($this->request->data)) {
				$this->Session->setFlash(__('The marca has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Marcas/');
			} else {
				$this->Session->setFlash(__('The marca could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
			$this->set('marca', $this->Marca->find('first', $options));
			$this->request->data = $this->Marca->find('first', $options);
			}
		} else {
			$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
			$this->set('marca', $this->Marca->find('first', $options));
			$this->request->data = $this->Marca->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Marca->delete()) {
			$this->Session->setFlash(__('The marca has been deleted.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		} else {
			$this->Session->setFlash(__('The marca could not be deleted. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		}
		return $this->redirect('/#/Marcas/');
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Marca->recursive = 0;
		$this->set('marcas', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
		$this->set('marca', $this->Marca->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Marca->create();
			if ($this->Marca->save($this->request->data)) {
				$this->Session->setFlash(__('The marca has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The marca could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Marca->save($this->request->data)) {
				$this->Session->setFlash(__('The marca has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The marca could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
			}
		} else {
			$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
			$this->request->data = $this->Marca->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Marca->delete()) {
			$this->Session->setFlash(__('The marca has been deleted.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		} else {
			$this->Session->setFlash(__('The marca could not be deleted. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

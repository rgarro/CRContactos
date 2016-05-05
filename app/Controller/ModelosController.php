<?php
App::uses('CrcController', 'Controller');
/**
 * Modelos Controller
 *
 * @property Modelo $Modelo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ModelosController extends CrcController {

/**
 * Components
 *
 * @var array
 */
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Modelo->recursive = 0;
		$this->set('modelos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modelo->exists($id)) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		$options = array('conditions' => array('Modelo.' . $this->Modelo->primaryKey => $id));
		$this->set('modelo', $this->Modelo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modelo->create();
			if ($this->Modelo->save($this->request->data)) {
				$this->Session->setFlash(__('The modelo has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modelo could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		}
		$marcas = $this->Modelo->Marca->find('list', array('fields' => array('Marca.id', 'Marca.nombre')));
		$this->set(compact('marcas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Modelo->exists($id)) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Modelo->save($this->request->data)) {
				$this->Session->setFlash(__('The modelo has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modelo could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Modelo.' . $this->Modelo->primaryKey => $id));
			$this->request->data = $this->Modelo->find('first', $options);
		}
		$marcas = $this->Modelo->Marca->find('list');
		$this->set(compact('marcas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Modelo->id = $id;
		if (!$this->Modelo->exists()) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Modelo->delete()) {
			$this->Session->setFlash(__('The modelo has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The modelo could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('CrcController', 'Controller');
/**
 * Acos Controller
 *
 * @property Aco $Aco
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AcosController extends CrcController {
	
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
		$this->Aco->recursive = 0;
		$this->set('acos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aco->exists($id)) {
			throw new NotFoundException(__('Invalid aco'));
		}
		$options = array('conditions' => array('Aco.' . $this->Aco->primaryKey => $id));
		$this->set('aco', $this->Aco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aco->create();
			if ($this->Aco->save($this->request->data)) {
				$this->Session->setFlash(__('The aco has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aco could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		}
		$parentAcos = $this->Aco->ParentAco->find('list');
		$aros = $this->Aco->Aro->find('list');
		$this->set(compact('parentAcos', 'aros'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Aco->exists($id)) {
			throw new NotFoundException(__('Invalid aco'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Aco->save($this->request->data)) {
				$this->Session->setFlash(__('The aco has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aco could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Aco.' . $this->Aco->primaryKey => $id));
			$this->request->data = $this->Aco->find('first', $options);
		}
		$parentAcos = $this->Aco->ParentAco->find('list');
		$aros = $this->Aco->Aro->find('list');
		$this->set(compact('parentAcos', 'aros'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aco->id = $id;
		if (!$this->Aco->exists()) {
			throw new NotFoundException(__('Invalid aco'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Aco->delete()) {
			$this->Session->setFlash(__('The aco has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The aco could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

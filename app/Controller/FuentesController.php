<?php
App::uses('CrcController', 'Controller');
/**
 * Fuentes Controller
 *
 * @property Fuente $Fuente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FuentesController extends CrcController {


	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "ajax";
		$this->Fuente->recursive = 0;
		$this->set('fuentes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fuente->exists($id)) {
			throw new NotFoundException(__('Invalid fuente'));
		}
		$options = array('conditions' => array('Fuente.' . $this->Fuente->primaryKey => $id));
		$this->set('fuente', $this->Fuente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fuente->create();
			if ($this->Fuente->save($this->request->data)) {
				$this->Session->setFlash(__('The fuente has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Fuentes/');
			} else {
				$this->Session->setFlash(__('The fuente could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
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
		if (!$this->Fuente->exists($id)) {
			throw new NotFoundException(__('Invalid fuente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fuente->save($this->request->data)) {
				$this->Session->setFlash(__('The fuente has been saved.'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Fuentes/');
			} else {
				$this->Session->setFlash(__('The fuente could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Fuente.' . $this->Fuente->primaryKey => $id));
			$this->request->data = $this->Fuente->find('first', $options);
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
		$this->Fuente->id = $id;
		if (!$this->Fuente->exists()) {
			throw new NotFoundException(__('Invalid fuente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Fuente->delete()) {
			$this->Session->setFlash(__('The fuente has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The fuente could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		//return $this->redirect(array('action' => 'index'));
		return $this->redirect('/#/Fuentes/');
	}
}

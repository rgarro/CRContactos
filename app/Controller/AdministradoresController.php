<?php
App::uses('AppController', 'Controller');
/**
 * Administradores Controller
 *
 * @property Administradore $Administradore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdministradoresController extends AppController {
public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Administradore','Users','Agencia');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Administradore->recursive = 0;
		$this->set('administradores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Administradore->exists($id)) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		$options = array('conditions' => array('Administradore.' . $this->Administradore->primaryKey => $id));
		$this->set('administradore', $this->Administradore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Administradore->create();
			if ($this->Administradore->save($this->request->data)) {
				$this->Session->setFlash(__('The administradore has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The administradore could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		}
		$users = $this->Administradore->User->find('list');
		$agencias = $this->Administradore->Agencia->find('list');
		$this->set(compact('users', 'agencias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Administradore->exists($id)) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Administradore->save($this->request->data)) {
				$this->Session->setFlash(__('The administradore has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The administradore could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Administradore.' . $this->Administradore->primaryKey => $id));
			$this->request->data = $this->Administradore->find('first', $options);
		}
		$users = $this->Administradore->User->find('list');
		$agencias = $this->Administradore->Agencia->find('list');
		$this->set(compact('users', 'agencias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Administradore->id = $id;
		if (!$this->Administradore->exists()) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Administradore->delete()) {
			$this->Session->setFlash(__('The administradore has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The administradore could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

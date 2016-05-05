<?php
App::uses('CrcController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GroupsController extends CrcController {


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
		$this->layout = "ajax";
		$this->Group->recursive = 0;
		$this->set('groups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Grupos/');
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
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
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Grupos/');
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
		}
		//return $this->redirect(array('action' => 'index'));
		return $this->redirect('/#/Grupos/');
	}
}

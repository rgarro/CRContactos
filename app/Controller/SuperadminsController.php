<?php
App::uses('CrcController', 'Controller');
/**
 * Superadmins Controller
 *
 * @property Superadmin $Superadmin
 * @property PaginatorComponent $Paginator
 */
class SuperadminsController extends CrcController {

	public $uses = array('Tipo');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
	}

	public function stage() {
		$this->layout = "ajax";		
	}

}

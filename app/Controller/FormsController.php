<?php
App::uses('AppController', 'Controller');
/**
 * Forms Controller
 *
 * @property Form $Form
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FormsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

}

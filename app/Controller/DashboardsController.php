<?php
App::uses('CrcController', 'Controller');
/**
 * Dashboards Controller
 *
 * @property Dashboard $Dashboard
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DashboardsController extends CrcController {

/**
 * Components
 *
 * @var array
 */
	
	public function panel(){
		if(isset($_GET['is_ajax']) && $_GET['is_ajax'] == 1){
			$this->layout = "ajax";
			$this->set("ajax",1);
		}
	}

}

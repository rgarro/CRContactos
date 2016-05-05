<?php
App::uses('AppController', 'Controller');
/**
 * Crc CRContactos Controller
 *
 */
class CrcController extends AppController {

	public $components = array(
		'Security' => array(
        	'csrfExpires' => '+1 hour',
        	'csrfUseOnce' => false
    		),
		'Auth' => array(
        	'authError' => 'Usted no esta autorizado para accesar ese lugar.',
            'authenticate' => array(
                'Form' => array(
                	'fields' => array('username' => 'email')
                )                
            )
        ),
        //'Acl',
		'Session',
		'Cookie',
		'Paginator',
		'Users.RememberMe',
		'RequestHandler'
		//'Geocoder'
	);
	
	public $helpers = array(
		'App',
		'Motopin',
		'Agenciahelper',
		'Session',
		'GoogleMap',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->RememberMe->restoreLoginFromCookie();
		if(!$this->Auth->loggedIn()){
			$this->handle_ajax_timeout();
		}
        $this->Auth->deny();
		$this->set('username',$this->Auth->user('username'));
    }
	
	protected function handle_ajax_timeout(){
		if($this->request->isAjax()){
			echo json_encode(array("error"=>1,"timed_out"=>1));
			exit;
		}
	}
	
	public function allow_only_sa(){
		if($this->Session->read('is_admin')){
				}else{
			$this->handle_ajax_timeout();
			$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			$this->redirect("/");
		}
	}
	
	public function allow_only_administrador(){
		if($this->Session->read('is_administrador')){
			}else{
			$this->handle_ajax_timeout();	
			$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			$this->redirect("/");
		}
	}
	
	public function allow_only_vendedor(){
		if($this->Session->read('is_vendedor')){
				}else{
			$this->handle_ajax_timeout();		
			$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			$this->redirect("/");
		}
	}
	
	public function allow_vendedor_and_admin(){
		if($this->Session->read('is_vendedor') == 1 OR $this->Session->read('is_administrador') == 1){
				
			}else{
			$this->handle_ajax_timeout();	
			$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			$this->redirect("/");
		}
	}
	
	public function allow_sa_and_admin(){
		if($this->Session->read('is_admin') == 1 || $this->Session->read('is_administrador') == 1){
						
			}else{
			$this->handle_ajax_timeout();	
			$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			$this->redirect("/");
		}
	}
	
	protected function _filter_employees_only($agencia_id){
		if(!$this->Auth->user('is_admin')){
			if($this->Session->check('agencia_id')){
				if($this->Session->read('agencia_id') != $agencia_id){
					$this->handle_ajax_timeout();
					$this->Session->setFlash('Acceso Denegado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
					return $this->redirect(array('/'));
				}
			}
		}
		if($this->Auth->user('is_admin')){
			$this->Session->write('agencia_id',$agencia_id);
		}
	}
	
}

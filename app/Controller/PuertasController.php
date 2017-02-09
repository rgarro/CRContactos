 <?php
/**
 * Static content controller.
 *
 * This file will render views from views/Doors/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('CrcController', 'Controller');


class PuertasController extends CrcController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array("Publicidad","Formfinale","Fuente","Lead","ModeloAgencia","Agencia","ModeloPic","MarcaAgencia");

	public $layout ="public";


	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Security->unlockedActions = array('form','formb');
    	$this->Auth->allow('frente', 'logout','form','formb');
	}

	public function formb(){
		$this->layout = "public_headerless";
		if(!isset($_GET['agencia_id']) || !is_numeric($_GET['agencia_id'])){
			echo "<h1>Agencia No Existe</h1>";
			exit;
		}

		/* begin finale block */
		if(isset($_GET['finale_label'])){
			$optf = array("conditions"=>array("Formfinale.label"=>$_GET['finale_label']));
			if($this->Formfinale->find('count',$optf)){
				//$finale_data = $this->Formfinale->findByLabel($_GET['finale_label']);
				$finale_data = $this->Formfinale->find("first",array("conditions"=>array("Formfinale.label"=>$_GET['finale_label'])));


				$banners = array();
				foreach($finale_data['Publifine'] as $f){
					$d = $this->Publicidad->findById($f['publicidad_id']);
					array_push($banners,$d);
				}

				$_SESSION['finale_banners'] = $banners;
				$_SESSION['finale_data'] = $finale_data;
			}
		}
		/* end finale block */
		$opt = array("conditions"=>array("id"=>$_GET['agencia_id']));
		if($this->Agencia->find('count',$opt)){
			if ($this->request->is('post')) {
				$this->Lead->create();
				if ($this->Lead->save($this->request->data['Lead'])) {
					//$this->Session->setFlash('Gracias!! Pronto le contactaremos.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
          $this->Session->write("lead_set",1);
					return $this->redirect(array('action' => 'formb?agencia_id='.$_GET['agencia_id']."&marca_id=".$_GET['marca_id']));
				} else {
					$this->Session->setFlash('Error agregando el lead.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				}
			}
			$opt = array("conditions"=>array("agencia_id"=>$_GET['agencia_id']),"recursive"=>3);
		$ma = $this->MarcaAgencia->find('all',$opt);
			$this->set("fuentes",$this->Fuente->find('list',array('conditions'=>array("agencia_id"=>$_GET['agencia_id']),'fields' => array('texto', 'texto'))));
			$this->set("modelos_agencia",$ma);
			//$this->set("agencia",$this->Agencia);
		}else{
			echo "<h1>Agencia No Existe</h1>";
			exit;
		}
	}

	public function form(){
		$this->layout = "public_headerless";
		if(!isset($_GET['agencia_id']) || !is_numeric($_GET['agencia_id'])){
			echo "<h1>Agencia No Existe</h1>";
			exit;
		}

		/* begin finale block */
		if(isset($_GET['finale_label'])){
			$optf = array("conditions"=>array("label"=>$_GET['finale_label']));
			if($this->Formfinale->find('count',$opt)){
				$finale_data = $this->Formfinale->findByLabel($_GET['finale_label']);
				$_SESSION['finale_data'] = $finale_data;
			}
		}
		/* end finale block */

		$opt = array("conditions"=>array("id"=>$_GET['agencia_id']));
		if($this->Agencia->find('count',$opt)){
			if ($this->request->is('post')) {
				$this->Lead->create();
				if ($this->Lead->save($this->request->data['Lead'])) {
					$this->Session->setFlash('Gracias!! Pronto le contactaremos.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
					return $this->redirect(array('action' => 'form?agencia_id='.$_GET['agencia_id']."&marca_id=".$_GET['marca_id']));
				} else {
					$this->Session->setFlash('Error agregando el lead.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				}
			}

			$opt = array("conditions"=>array("agencia_id"=>$_GET['agencia_id']),"recursive"=>3);
		$ma = $this->MarcaAgencia->find('all',$opt);

			$this->set("fuentes",$this->Fuente->find('list',array('conditions'=>array("agencia_id"=>$_GET['agencia_id']),'fields' => array('texto', 'texto'))));
			$this->set("modelos_agencia",$ma);
			//$this->set("agencia",$this->Agencia);
		}else{
			echo "<h1>Agencia No Existe</h1>";
			exit;
		}
	}

	public function frente() {
		if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
            	return $this->redirect($this->Auth->redirect());
        	}
        	$this->Session->setFlash(__('Invalid username or password, try again'));
    	}
	}

	public function logout() {
    	return $this->redirect($this->Auth->logout());
	}
}

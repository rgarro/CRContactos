<?php
/**
 * Agencias Controller
 *
 * @property Agencia $Agencia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @author Rolando <rgarro@gmail.com>
 */
App::uses('CrcController', 'Controller');

class AgenciasController extends CrcController {

	public $uses = array('Formfinale','ModeloPic','Notificacione','Marca','ModeloAgencia','MarcaAgencia','Administradore','User','Agencia','Vendedore','LeadSeguidore');

	public function cambiar_user_status(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->User->query("UPDATE users SET active='".$_GET['active']."' WHERE id='".$_GET['user_id']."'");
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function vendedores(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('agencia_id' => $this->Session->read('agencia_id')));
		$this->set('vendedores', $this->Vendedore->find('all',$opt));
	}

	public function administradores(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('agencia_id' => $this->Session->read('agencia_id')));
		$this->set('administradores', $this->Administradore->find('all',$opt));
	}

	public function remover_notificacion(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->Notificacione->delete($_GET['nid']);
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function delete_user(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		if($_GET['user_type'] == "administrador"){
			$this->Administradore->delete(['Administradore.user_id'=>$_GET['user_id']],true);
		}else{
			$this->Vendedore->delete(['Vendedore.user_id'=>$_GET['user_id']],true);
		}
		$this->LeadSeguidore->deleteAll(['LeadSeguidore.user_id'=>$_GET['user_id']],true);

		$this->User->query("DELETE FROM users WHERE id='".$_GET['user_id']."'");
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function notificaciones(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array("conditions"=>array("agencia_id"=>$this->Session->read('agencia_id')),'recursive' => 3);
		$this->set("notificaciones",$this->Notificacione->find('all',$opt));
	}

	public function asignar_notificacion(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$n = array("Notificacione"=>array("agencia_id"=>$this->Session->read('agencia_id'),"email"=>$_GET['email']));
		$this->Notificacione->set($n);
		if($this->Notificacione->validates()){
				if ($this->Notificacione->save($n)) {
					$this->set('data',array("is_success"=>1));
				} else {
					$errors = array("Error"=>array("error saving."));
					$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
				}
			}else{
				$errors = $this->Notificacione->validationErrors;
				$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
		}
		$this->render("/General/serialize_json");
	}

	public function lista_notificaciones(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
	}

	public function remover_modelo(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->ModeloAgencia->delete($_GET['maid']);
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function asignar_modelo(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array("conditions"=>array("agencia_id"=>$this->Session->read('agencia_id'),"modelo_id"=>$_GET['modelo_id']));
		if($this->ModeloAgencia->find('count',$opt) < 1){
			$ma = array("ModeloAgencia"=>array("agencia_id"=>$this->Session->read('agencia_id'),"modelo_id"=>$_GET['modelo_id']));
			$this->ModeloAgencia->create();
			$this->ModeloAgencia->save($ma);
			$data = array("is_success"=>1);
		}else{
			$data = array("is_error"=>1,"error_msg"=>"Este Modelo ya esta asignado.");
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function modelos_agencia(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array("conditions"=>array("agencia_id"=>$this->Session->read('agencia_id')),'recursive' => 3);
		$this->set("modelos_agencia",$this->ModeloAgencia->find('all',$opt));
	}

	public function lista_modelos(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array("conditions"=>array("agencia_id"=>$this->Session->read('agencia_id')),'recursive' => 3);
		$this->set("agencia_marcas",$this->MarcaAgencia->find('all',$opt));
	}

	public function borrar_marca(){
		$this->allow_only_sa();
		$this->layout = "ajax";
		$this->MarcaAgencia->delete($_GET['mid']);
		$data = array("is_success"=>1);
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function asignar_marcas(){
		$this->allow_only_sa();
		$this->layout = "ajax";
		$opt = array("conditions"=>array("agencia_id"=>$_GET['agencia_id'],"marca_id"=>$_GET['marca_id']));
		if($this->MarcaAgencia->find('count',$opt) < 1){
			$ma = array("MarcaAgencia"=>array("agencia_id"=>$_GET['agencia_id'],"marca_id"=>$_GET['marca_id']));
			$this->MarcaAgencia->create();
			$this->MarcaAgencia->save($ma);
			$data = array("is_success"=>1);
		}else{
			$data = array("is_error"=>1,"error_msg"=>"Esta Marca ya esta asignada.");
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function marcas_agencia($id){
		$this->allow_only_sa();
		$this->layout = "ajax";
		if (!$this->Agencia->exists($id)) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$opt = array("conditions"=>array("agencia_id"=>$id),"recursive"=>3);
		$mage = $this->MarcaAgencia->find('all',$opt);
		for($i=0;$i<count($mage);$i++){
		$mage[$i]['agmodels'] = $this->Marca->query("SELECT m.* FROM modelos as m, modelo_agencias as mg WHERE m.id = mg.modelo_id AND mg.agencia_id='".$mage[$i]['MarcaAgencia']['agencia_id']."' AND m.marca_id='".$mage[$i]['MarcaAgencia']['marca_id']."'");
			if(count($mage[$i]['agmodels'])){
				$x = 0;
				foreach($mage[$i]['agmodels'] as $mod){
$mage[$i]['agmodels'][$x]['pics'] =	$this->ModeloPic->findAllByModeloId($mod['m']['id'],array('*'),array('ModeloPic.id desc'));//('all',array("conditiond"=>array("ModeloPic.modelo_id"=>$mod['m']['id'])));
				$x++;
				}
			}
		}
		$this->set("marcas",$mage);
	}

	public function modelos_box(){
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$id = $_GET['agencia_id'];
		if (!$this->Agencia->exists($id)) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$opt = array("conditions"=>array("agencia_id"=>$id),"recursive"=>3);
		$mage = $this->MarcaAgencia->find('all',$opt);

		for($i=0;$i<count($mage);$i++){
		$mage[$i]['agmodels'] = $this->Marca->query("SELECT m.* FROM modelos as m, modelo_agencias as mg WHERE m.id = mg.modelo_id AND mg.agencia_id='".$mage[$i]['MarcaAgencia']['agencia_id']."' AND m.marca_id='".$mage[$i]['MarcaAgencia']['marca_id']."'");
			if(count($mage[$i]['agmodels'])){
				$x = 0;
				foreach($mage[$i]['agmodels'] as $mod){
$mage[$i]['agmodels'][$x]['pics'] =	$this->ModeloPic->findAllByModeloId($mod['m']['id'],array('*'),array('ModeloPic.id desc'));//('all',array("conditiond"=>array("ModeloPic.modelo_id"=>$mod['m']['id'])));
				$x++;
				}
			}
		}
		$this->set("finales",$this->Formfinale->find('all'));
		$this->set("marcas",$mage);
	}

	public function lista_marcas($id){
		$this->allow_only_sa();
		if (!$this->Agencia->exists($id)) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$this->Session->write("last_agencia_id",$id);
		$options = array('conditions' => array('Agencia.' . $this->Agencia->primaryKey => $id));
		$this->set('agencia',$this->Agencia->find('first', $options));
		$this->set('marcas',$this->Marca->find('all'));
	}

public function mapa() {
		$this->Agencia->recursive = 0;

		$this->set('agencias', $this->Agencia->find('all'));
		//$this->set('lat', $lat);
		//$this->set('lon', $lon);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->allow_only_sa();
		$this->layout = "ajax";
		$this->Agencia->recursive = 0;
		$this->set('agencias',$this->Agencia->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 	public function viewb() {
 		$id = $this->Session->read('agencia_id');
		$this->_filter_employees_only($id);
		$this->layout = "ajax";
		if (!$this->Agencia->exists($id)) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$options = array('conditions' => array('Agencia.' . $this->Agencia->primaryKey => $id));
		$data = $this->Agencia->find('first', $options);
		$_SESSION['agencia_nombre'] = $data['Agencia']['nombre'];
		$this->set('agencia', $data);
		$opt = array('conditions' => array('agencia_id' => $id));

		$this->set('administradores', $this->Administradore->find('all',$opt));
		$this->set('vendedores', $this->Vendedore->find('all',$opt));
	}


	public function view($id = null) {
		$this->_filter_employees_only($id);
		return $this->redirect('/#/Agencia/');

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->allow_only_sa();
		if ($this->request->is('post')) {
			$this->Agencia->create();



			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Agencias/');
			} else {



				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
//$this->render('sql');
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
		$this->allow_sa_and_admin();
		$this->_filter_employees_only($id);

		if (!$this->Agencia->exists($id)) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect('/#/Agencias/');
			} else {
				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'), 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
	$options = array('conditions' => array('Agencia.' . $this->Agencia->primaryKey => $id));
			$agencia = $this->Agencia->find('first', $options);
			$this->request->data = $agencia;
			$this->set('agencia', $agencia);
}
		} else {
			$options = array('conditions' => array('Agencia.' . $this->Agencia->primaryKey => $id));
			$agencia = $this->Agencia->find('first', $options);
			$this->request->data = $agencia;
			$this->set('agencia', $agencia);
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
		$this->allow_only_sa();
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Agencia->delete()) {
			$this->Session->setFlash(__('The agencia has been deleted.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		} else {
			$this->Session->setFlash(__('The agencia could not be deleted. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-error'
));
		}
		//return $this->redirect(array('action' => 'index'));
		return $this->redirect('/#/Agencias/');
	}
}

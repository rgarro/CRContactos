<?php
 /**
  * Publicidad Controller
  *
  * @author Rolando <rolando@emptyart.xy>
  */
 App::uses('CakeEmail', 'Network/Email');
 //App::uses('CrcController', 'Controller');
 App::uses('AppController', 'Controller');
 App::uses('Publicidad', 'Model');
class PublicidadController extends AppController {

	/*public function beforeFilter(){
		parent::beforeFilter();
			//$this->allow_only_sa();
		//$this->Security->unlockedActions = array('modelos_select','agregar_seguimiento','agregar_lead_directamente');
	}*/

	public function index(){
		$this->layout = "ajax";
	}

  public function originate(){
    //$this->allow_only_sa();
    $this->layout = "ajax";
    $this->Publicidad->create();
    //file_put_contents("/Users/rolando/Documents/Hangar/CRCarrosLeads/flash_debug.txt",print_r($_FILES,true)."\n");
    if ($this->Publicidad->save($this->request->data)) {
      $this->set('data',array("is_success"=>1,"flash"=>__('The Publicidad has been saved.')));
      $file_dir = WWW_ROOT."/files/publicidad/".$this->Publicidad->getLastInsertID();
      mkdir($file_dir);
      move_uploaded_file($_FILES['Publicidad']['tmp_name'],$file_dir."/".$_FILES['Publicidad']['name']);
    } else {
      $errors = $this->Publicidad->validationErrors;
      $this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
    }
    $this->render("/General/serialize_json");
  }

  public function lista(){
    $this->layout = "ajax";
    $total = $this->Publicidad->find('count');
    $data = array('total'=>$total,'data'=>$this->Publicidad->find('all',array("limit"=>$_GET['limit'],'offset'=>$_GET['offset'])));
    $this->set('data',$data);
    $this->render("/General/serialize_json");
  }

  public function borrar(){
    //$this->allow_only_sa();
    $this->layout = "ajax";
    $this->Publicidad->id = $_GET['id'];
    $data = $this->Publicidad->findById($_GET['id']);
    unlink(WWW_ROOT."/files/publicidad/".$data->id."/".$data->Filename);
    rmdir(WWW_ROOT."/files/publicidad/".$data->id);
    //$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("attachment"=>__('Invalid Attachment'))));
    $this->Publicidad->delete();
    $this->set('data', $data);
    $this->render("/General/serialize_json");
  }

}

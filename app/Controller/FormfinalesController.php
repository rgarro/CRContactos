<?php
 /**
  * Formfinales Controller
  *
  * @author Rolando <rolando@emptyart.xy>
  */
 App::uses('CakeEmail', 'Network/Email');
 //App::uses('CrcController', 'Controller');
 App::uses('AppController', 'Controller');
 App::uses('Formfinale', 'Model');
class FormfinalesController extends AppController {

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
    $this->Formfinale->create();
    //file_put_contents("/Users/rolando/Documents/Hangar/CRCarrosLeads/flash_debug.txt",print_r($_FILES,true)."\n");
    if ($this->Formfinale->save($this->request->data)) {
      $this->set('data',array("is_success"=>1,"flash"=>__('The Formfinale has been saved.')));
      $file_dir = WWW_ROOT."/files/formfinale/".$this->Formfinale->getLastInsertID();
      mkdir($file_dir);
      move_uploaded_file($_FILES['Formfinale']['tmp_name'],$file_dir."/".$_FILES['Formfinale']['name']);
    } else {
      $errors = $this->Formfinale->validationErrors;
      $this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>$errors));
    }
    $this->render("/General/serialize_json");
  }

  public function lista(){
    $this->layout = "ajax";
    $total = $this->Formfinale->find('count');
    $data = array('total'=>$total,'data'=>$this->Formfinale->find('all',array("limit"=>$_GET['limit'],'offset'=>$_GET['offset'])));
    $this->set('data',$data);
    $this->render("/General/serialize_json");
  }

  public function borrar(){
    //$this->allow_only_sa();
    $this->layout = "ajax";
    $this->Formfinale->id = $_GET['id'];
    $data = $this->Formfinale->findById($_GET['id']);
    unlink(WWW_ROOT."/files/formfinale/".$data->id."/".$data->Filename);
    rmdir(WWW_ROOT."/files/formfinale/".$data->id);
    //$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("attachment"=>__('Invalid Attachment'))));
    $this->Formfinale->delete();
    $this->set('data', $data);
    $this->render("/General/serialize_json");
  }

}

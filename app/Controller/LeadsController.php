<?php
/**
 * Leads Controller
 *
 * @author Rolando <rgarro@gmail.com>
 */
App::uses('CakeEmail', 'Network/Email'); 
App::uses('CrcController', 'Controller');
App::uses('Lead', 'Model');
 
class LeadsController extends CrcController {

	public $uses = array('Agencia','LeadHistoria','MarcaAgencia','Fuente','Marca','LeadSeguimiento','User','Administradore','Vendedore','Notificacione','Modelo','Lead','LeadSeguidore','ModeloAgencia','ModeloPic');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Security->unlockedActions = array('modelos_select','agregar_seguimiento','agregar_lead_directamente');
	}
	
	public function report_vendedor_url(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$agencia_id = $this->Session->read('agencia_id');
		$users = array();
		$result = array();
		$result['desde'] = $_GET['desde'];
		$result['hasta'] = $_GET['hasta'];
		$opt_ad = array(
				"conditions"=>array(
								"User.active"=>1,
								"Administradore.agencia_id"=>$agencia_id
								)
				);
				
		$opt_vend = array(
				"conditions"=>array(
								"User.active"=>1,
								"Vendedore.agencia_id"=>$agencia_id
								)
				);		
		$admins = $this->Administradore->find('all',$opt_ad);
		$vendedores = $this->Vendedore->find('all',$opt_vend);
		$i=0;
		foreach($admins as $adm){
			$users[$i]['User']['nombre'] = $adm['User']['nombre']." ".$adm['User']['apellido'];
			$users[$i]['User']['id'] = $adm['User']['id'];
			$i++; 
		}
		foreach($vendedores as $adm){
			$users[$i]['User']['nombre'] = $adm['User']['nombre']." ".$adm['User']['apellido'];
			$users[$i]['User']['id'] = $adm['User']['id'];
			$i++; 
		}

		for($i=0;$i<count($users);$i++){
			//begin
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.cambio BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.status = '2'"
									));
			$opt['joins'] = array(array('table' => 'lead_seguidores',
                                   'alias' => 'LeadSeguidore',
                                   'type' => 'INNER',
                                   'conditions' => array('Lead.id = LeadSeguidore.lead_id',"LeadSeguidore.user_id = '".$users[$i]['User']['id']."'")));						
			$users[$i]['User']['asignado'] = $this->Lead->find('count',$opt);
			//begin
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.cambio BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.status = '5'"
									));
			$opt['joins'] = array(array('table' => 'lead_seguidores',
                                   'alias' => 'LeadSeguidore',
                                   'type' => 'INNER',
                                   'conditions' => array('Lead.id = LeadSeguidore.lead_id',"LeadSeguidore.user_id = '".$users[$i]['User']['id']."'")));
			$users[$i]['User']['activo'] = $this->Lead->find('count',$opt);
			//begin
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.cambio BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.status = '4'"
									));
			$opt['joins'] = array(array('table' => 'lead_seguidores',
                                   'alias' => 'LeadSeguidore',
                                   'type' => 'INNER',
                                   'conditions' => array('Lead.id = LeadSeguidore.lead_id',"LeadSeguidore.user_id = '".$users[$i]['User']['id']."'")));
			$users[$i]['User']['archivado'] = $this->Lead->find('count',$opt);
			//begin
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.cambio BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.status = '3'"
									));
			$opt['joins'] = array(array('table' => 'lead_seguidores',
                                   'alias' => 'LeadSeguidore',
                                   'type' => 'INNER',
                                   'conditions' => array('Lead.id = LeadSeguidore.lead_id',"LeadSeguidore.user_id = '".$users[$i]['User']['id']."'")));
			$users[$i]['User']['vendido'] = $this->Lead->find('count',$opt);
			//begin
			$users[$i]['User']['total'] = $users[$i]['User']['asignado'] + $users[$i]['User']['activo'] + $users[$i]['User']['archivado'] + $users[$i]['User']['vendido'];
		}

		$result['users'] = $users;
		$_SESSION['reporte_vendedor_result'] = $result;		
		$this->set("result",$result);
	}
	
	
	public function reporte_vendedor(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
	}
	
	public function report_modelo_url(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array(
										"id" => $this->Session->read('agencia_id')
									),'recursive'=>3);
		$age = $this->Agencia->find('first',$opt);							
		$this->set('agencia',$age);
		$result = array();
		$result['desde'] = $_GET['desde'];
		$result['hasta'] = $_GET['hasta'];
		$result["marcas"] = array();
		$result['total'] = 0;
		$total = 0;
		$i=0;
		foreach($age['MarcaAgencia'] as $a){	
			$result["marcas"][$i]['marca'] = $a['Marca']['nombre'];
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.marca_id ='".$a['Marca']['id']."'"
									));
			$result["marcas"][$i]['total'] = $this->Lead->find('count',$opt);
			if($result["marcas"][$i]['total'] > 0){
				$sql = "SELECT DISTINCT(modelos) FROM leads WHERE agencia_id = '".$this->Session->read('agencia_id')."' AND marca_id ='".$a['Marca']['id']."' AND creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'";
				$res = $this->Lead->query($sql);
				$y=0;
				foreach($res as $r){
					
					$sqlb = "SELECT COUNT(*) as total FROM leads WHERE modelos LIKE '%". $r['leads']['modelos']."%' AND agencia_id = '".$this->Session->read('agencia_id')."' AND marca_id ='".$a['Marca']['id']."' AND creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'";
					$resb = $this->Lead->query($sqlb);
					$result["marcas"][$i]['modelos'][$y] = array('modelo'=>$r['leads']['modelos'],'total'=>$resb[0][0]['total']);					
					$y++;
				}				
			}
			$total = $total + $result["marcas"][$i]['total'];
			$i++;
		}
		$result['total'] = $total;	
		$_SESSION['reporte_modelo_result'] = $result;
		$this->set('result',$result);
		$this->set('total',$total);	
	}
	
	public function reporte_modelo(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
	}
	
	public function csv_downloads(){
		if($_GET['reporte']==1){
			$csv_str = 	$_SESSION['reporte_marca_result']['desde'].",".$_SESSION['reporte_marca_result']['hasta']."\n";
			foreach($_SESSION['reporte_marca_result']['marcas'] as $r){
				$csv_str .= $r['marca'].",".$r['total']."\n";
			}
			$csv_str .= "Total:,".$_SESSION['reporte_marca_result']['total']."\n";
			@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte_marca.csv");
			echo $csv_str;
			exit;								
		}
		if($_GET['reporte']==2){
			$csv_str = 	$_SESSION['reporte_modelo_result']['desde'].",".$_SESSION['reporte_marca_result']['hasta']."\n";
			foreach($_SESSION['reporte_modelo_result']['marcas'] as $r){
				$csv_str .= $r['marca'].",".$r['total']."\n";
				foreach($r['modelos'] as $m){ 
					$csv_str .= $m['modelo'].",".$m['total']."\n";
	 			}
			}
			$csv_str .= "Total:,".$_SESSION['reporte_modelo_result']['total']."\n";
			@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte_modelo.csv");
			echo $csv_str;
			exit;								
		}
	if($_GET['reporte']==3){
			$csv_str = 	$_SESSION['reporte_vendedor_result']['desde'].",".$_SESSION['reporte_vendedor_result']['hasta']."\n";
			$csv_str .= "nombre,asignado,activo,archivado,vendido,total\n";
			foreach($_SESSION['reporte_vendedor_result']['users'] as $r){
				$csv_str .= $r['User']['nombre'].",".$r['User']['asignado'].",".$r['User']['activo'].",".$r['User']['archivado'].",".$r['User']['vendido'].",".$r['User']['total']."\n";
			}
			
			@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte_vendedor.csv");
			echo $csv_str;
			exit;								
		}
    if($_GET['reporte']==4){
        $csv_str  = "marca,modelos,agencia,nombre,primer_apellido,segundo_apellido,email,direccion,provincia,celular,telefono,status,lat,lon,ip_origen,creada,cambio,comentario,boletin,fuente\n";
			foreach($_SESSION['reporte_result'] as $r){
			$csv_str  .=$r['Marca']['nombre'].",".str_replace(",","-",$r['Lead']['modelos']).",".$r['Agencia']['nombre'].",".$r['Lead']['nombre'].",".$r['Lead']['primer_apellido'].",".$r['Lead']['segundo_apellido'].",".$r['Lead']['email'].",".$r['Lead']['direccion'].",".$r['Lead']['provincia'].",".$r['Lead']['celular'].",".$r['Lead']['telefono'].",".$r['Lead']['status'].",".$r['Lead']['lat']." ,".$r['Lead']['lon'].",".$r['Lead']['ip_origen'].",".$r['Lead']['creadad'].",".$r['Lead']['cambio'].",".str_replace(",","-",$r['Lead']['comentario']).",".$r['Lead']['boletin'].",".$r['Lead']['fuente']."\n";
            }

			@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte".date("F-j-Y-g:i-a").".csv");
			echo $csv_str;
			exit;
		}
	}
	
	public function report_marca_url(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array(
										"id" => $this->Session->read('agencia_id')
									),'recursive'=>3);
		$age = $this->Agencia->find('first',$opt);							
		$this->set('agencia',$age);
		$result = array();
		$result['desde'] = $_GET['desde'];
		$result['hasta'] = $_GET['hasta'];
		$result["marcas"] = array();
		$result['total'] = 0;
		$total = 0;
		$i=0;
		foreach($age['MarcaAgencia'] as $a){	
			$result["marcas"][$i]['marca'] = $a['Marca']['nombre'];
			$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'",
										"Lead.marca_id ='".$a['Marca']['id']."'"
									));
			$result["marcas"][$i]['total'] = $this->Lead->find('count',$opt);
			$total = $total + $result["marcas"][$i]['total'];
			$i++;
		}
		$result['total'] = $total;
		$_SESSION['reporte_marca_result'] = $result;
		$this->set('result',$result);
		$this->set('total',$total);								
	}
	
	public function reporte_marca(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		/*$opt = array('conditions' => array(
										"agencia_id" => $this->Session->read('agencia_id')
									));
		$this->set('marcas',$this->MarcaAgencia->find('all',$opt));*/
		
	}
	
	public function modelos_select(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->set('modelos',$this->Modelo->findAllByMarcaId($_POST['marca_id']));		
	}
	
	public function reporte_url(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array(
										"Lead.agencia_id" => $this->Session->read('agencia_id'),
										"Lead.creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'"
									));
		if($_GET['status']>0){
			$opt['conditions'][] = "Lead.status ='".$_GET['status']."'";
		}
		if($_GET['marca']>0){
			$opt['conditions'][] = "Lead.marca_id ='".$_GET['marca']."'";
		}
		if($_GET['modelo'] != "todos"){
			$opt['conditions'][] = "Lead.modelos LIKE '%".$_GET['modelo']."%'";
		}							
		if($_GET['user_id']>0){
			$opt['joins'] = array(array('table' => 'lead_seguidores',
                                   'alias' => 'LeadSeguidore',
                                   'type' => 'INNER',
                                   'conditions' => array('Lead.id = LeadSeguidore.lead_id',"LeadSeguidore.user_id = '".$_GET['user_id']."'")));
		}
									
		$leads = $this->Lead->find('all',$opt);
		
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			$modelos = explode(",",$leads[$i]['Lead']['modelos']);
			$leads[$i]['pics'] = $this->_get_pics($modelos);
		}
		$_SESSION['reporte_result'] = $leads;
        $this->set("leads",$leads);
	}
	
	public function activar_seguimiento(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$l = $this->LeadSeguidore->findById($_GET['lead_seguidore_id']);
		$lb['LeadSeguidore'] = $l['LeadSeguidore'];
		$lb['LeadSeguidore']['status'] = 2;
		$this->LeadSeguidore->create();
		$this->LeadSeguidore->save($lb['LeadSeguidore']);
		//empieza notificacion
		$tos = array();
		$tos[] = $l['User']['email'];
		$nots = $this->Notificacione->findAllByAgenciaId($this->Session->read('agencia_id'));
		foreach($nots as $no){
			$tos[] = $no['Notificacione']['email'];
		}
		$lead = $this->Lead->findById($l['Lead']['id']);
		$title = "Agente: ".$l['User']['nombre']." ".$l['User']['apellido']." Sigue a ".Lead::setEmailSubject($lead);
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
		foreach($tos as $to){
			$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'status'=>$title,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_agente_sigue')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->replyTo($lead['Lead']['email'])
				->emailFormat('html')
				->to($to)
				->send();	
		}
		//status to acti vado
		$lead_data = array("Lead"=>array("id"=>$l['Lead']['id'],"cambio"=>date("Y-m-d H:i:s"),"status"=>5,"marca_id"=>$l['Lead']['marca_id']));
		$this->Lead->create();
		$this->Lead->save($lead_data);
		
		$history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$l['Lead']['id'],"fecha"=>date("Y-m-d H:i:s"),"status"=>5));
		$this->LeadHistoria->create();
		$this->LeadHistoria->save($history_data);
		//termina notificaciones  		
		$data = array("is_success"=>1,"lead_id"=>$l['Lead']['id']);  
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function reportes(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$agencia_id = $this->Session->read('agencia_id');
		$opt = array('conditions' => array(
										"agencia_id" => $this->Session->read('agencia_id')
									));
		$this->set('marcas',$this->MarcaAgencia->find('all',$opt));
		$users = array();
		$opt_ad = array(
				"conditions"=>array(
								"User.active"=>1,
								"Administradore.agencia_id"=>$agencia_id
								)
				);
		$opt_vend = array(
				"conditions"=>array(
								"User.active"=>1,
								"Vendedore.agencia_id"=>$agencia_id
								)
				);		
		$admins = $this->Administradore->find('all',$opt_ad);
		$vendedores = $this->Vendedore->find('all',$opt_vend);
		$i=0;
		foreach($admins as $adm){
			$users[$i]['User'] = $adm['User'];
			$i++; 
		}
		foreach($vendedores as $adm){
			$users[$i]['User'] = $adm['User'];
			$i++; 
		}		
		$this->set("users",$users);
	}
	
	public function lead_comentarios(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->set("seguimientos",$this->LeadSeguimiento->findAllByLeadId($_GET['lead_id']));
	}
	
	public function agregar_seguimiento(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$this->request->data['LeadSeguimiento']['fecha'] = date("Y-m-d H:i:s");
		$this->request->data['LeadSeguimiento']['user_id'] = $this->Auth->user('id');
		$this->LeadSeguimiento->create();
		$this->LeadSeguimiento->save($this->request->data['LeadSeguimiento']);
		$data = array("is_success"=>1,"lead_id"=>$this->request->data['LeadSeguimiento']['lead_id']);  
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function desasignar_seguidor(){
		//$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		//begin notificacion
		$user = $this->User->findById($_GET['user_id']);
		$lead = $this->Lead->findById($_GET['lead_id']);
				
		if(count($lead)){ //security check
			//status
		
			$title = "Dejar de Seguir a ".Lead::setEmailSubject($lead);
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
				
		$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_lead_desasignado')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->emailFormat('html')
				->to($user['User']['email'])
				->send();	
				
		//end notificacion
			
			$this->LeadSeguidore->deleteAll(array("LeadSeguidore.user_id"=>$_GET['user_id'],"LeadSeguidore.lead_id"=>$_GET['lead_id']));
			$data = array("is_success"=>1);
		}else{
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("lead"=>"error desasignando")));
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}

	public function archivar_leads(){
		$this->layout = "ajax";
		$leads = $_GET['leads'];
		for($i=0;$i<count($leads);$i++){
			$lead = $this->Lead->findById($leads[$i]);
			$lead_data = array("Lead"=>array("id"=>$leads[$i],"cambio"=>date("Y-m-d H:i:s"),"status"=>4));
			$this->Lead->create();
		  	$this->Lead->save($lead_data);
		   	$history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$leads[$i],"fecha"=>date("Y-m-d H:i:s"),"status"=>4));
			$this->LeadHistoria->create();
			$this->LeadHistoria->save($history_data);
			$segs = $this->LeadSeguidore->findAllByLeadId($leads[$i]);
		$tos = array();
		foreach($segs as $s){
			$tos[] = $s['User']['email'];
		}
		$nots = $this->Notificacione->findAllByAgenciaId($this->Session->read('agencia_id'));
		foreach($nots as $no){
				$tos[] = $no['Notificacione']['email'];
			}
		$lead = $this->Lead->findById($leads[$i]);
		
		if($lead['Lead']['status'] == 1){
			$status = "Nuevo"; 
		}
		if($lead['Lead']['status'] == 2){
			$status = "Asignado"; 
		}
		if($lead['Lead']['status'] == 3){
			$status = "Vendido"; 
		}
		if($lead['Lead']['status'] == 4){
			$status = "Archivado"; 
		}
		if($lead['Lead']['status'] == 5){
			$status = "Activo"; 
		}
		
		
		$title = "Status ".$status." ".Lead::setEmailSubject($lead);
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
		foreach($tos as $to){
			$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'status'=>$status,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_lead_cambio_status')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->emailFormat('html')
				->to($to)
				->replyTo($lead['Lead']['email'])
				->send();	
		}
		//termina notificaciones  		
		}
$data = array("is_success"=>1,"flash"=>" Se Archivaron ".count($leads));  
		$this->set('data', $data);
		$this->render("/General/serialize_json");  	
	}

	public function cambiar_lead_status(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		//change status
		$lead = $this->Lead->findById($_GET['lead_id']);
		  $lead_data = array("Lead"=>array("id"=>$_GET['lead_id'],"cambio"=>date("Y-m-d H:i:s"),"status"=>$_GET['status'],"marca_id"=>$lead['Lead']['marca_id']));
		  $this->Lead->create();
		  $this->Lead->save($lead_data);
		  
		  $history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$_GET['lead_id'],"fecha"=>date("Y-m-d H:i:s"),"status"=>$_GET['status']));
		$this->LeadHistoria->create();
		$this->LeadHistoria->save($history_data);
		//empieza notificaciones  
		 
		$segs = $this->LeadSeguidore->findAllByLeadId($_GET['lead_id']);
		$tos = array();
		foreach($segs as $s){
			$tos[] = $s['User']['email'];
		}
		$nots = $this->Notificacione->findAllByAgenciaId($this->Session->read('agencia_id'));
		foreach($nots as $no){
				$tos[] = $no['Notificacione']['email'];
			}
		$lead = $this->Lead->findById($_GET['lead_id']);
		
		if($lead['Lead']['status'] == 1){
			$status = "Nuevo"; 
		}
		if($lead['Lead']['status'] == 2){
			$status = "Asignado"; 
		}
		if($lead['Lead']['status'] == 3){
			$status = "Vendido"; 
		}
		if($lead['Lead']['status'] == 4){
			$status = "Archivado"; 
		}
		if($lead['Lead']['status'] == 5){
			$status = "Activo"; 
		}
		
		
		$title = "Status ".$status." ".Lead::setEmailSubject($lead);
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
		foreach($tos as $to){
			$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'status'=>$status,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_lead_cambio_status')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->emailFormat('html')
				->to($to)
				->replyTo($lead['Lead']['email'])
				->send();	
		}
		//termina notificaciones  		  
		$data = array("is_success"=>1,"lead_id"=>$_GET['lead_id']);  
		$this->set('data', $data);
		$this->render("/General/serialize_json");  		
	}
	
	public function asignar_seguidor(){
		//$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		//begin notificacion
		$user = $this->User->findById($_GET['user_id']);
		$lead = $this->Lead->findById($_GET['lead_id']);
				
		if(count($lead)){ //security check
			//status
			if($lead['Lead']['status'] == 1){
				$lead_data = array("Lead"=>array("id"=>$lead['Lead']['id'],"status"=>2,"marca_id"=>$lead['Lead']['marca_id']));
				$this->Lead->create();
				$this->Lead->save($lead_data);
				
				$history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$_GET['lead_id'],"fecha"=>date("Y-m-d H:i:s"),"status"=>2));
		$this->LeadHistoria->create();
		$this->LeadHistoria->save($history_data);
			}
		
		
			$title = "Debe Seguir a ".Lead::setEmailSubject($lead);;
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
				
		$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_lead_asignado')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->emailFormat('html')
				->to($user['User']['email'])
				->replyTo($lead['Lead']['email'])
				->send();	
				
		//end notificacion
			$s_data = array("LeadSeguidore"=>array("user_id"=>$_GET['user_id'],"lead_id"=>$_GET['lead_id'],"desde"=>date("Y-m-d H:i:s")));
			$this->LeadSeguidore->create();
			$this->LeadSeguidore->save($s_data);
			$data = array("is_success"=>1);
		}else{
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("lead"=>"error asignando")));
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function usuarios_lead(){
		//$this->allow_sa_and_admin();
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$agencia_id = $this->Session->read('agencia_id');
		$users = array();
		$seguidores = $this->LeadSeguidore->findAllByLeadId($_GET['lead_id']);
		$this->set("seguidores",$seguidores);
		$seguidores_ids = array();
		foreach($seguidores as $s){
			$seguidores_ids[] = $s['User']['id'];
		}

		$opt_ad = array(
				"conditions"=>array(
								"User.active"=>1,
								"Administradore.agencia_id"=>$agencia_id,
								"NOT"=>array("User.id"=>$seguidores_ids)
								)
				);
		$opt_vend = array(
				"conditions"=>array(
								"User.active"=>1,
								"Vendedore.agencia_id"=>$agencia_id,
								"NOT"=>array("User.id"=>$seguidores_ids)
								)
				);		
		$admins = $this->Administradore->find('all',$opt_ad);
		$vendedores = $this->Vendedore->find('all',$opt_vend);
		$i=0;
		foreach($admins as $adm){
			$users[$i]['User'] = $adm['User'];
			$i++; 
		}
		foreach($vendedores as $adm){
			$users[$i]['User'] = $adm['User'];
			$i++; 
		}		
		$this->set("users",$users);
		$this->set('lead_id',$_GET['lead_id']);		
	}
	
	public function detalle_lead(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$lead = $this->Lead->find('first',array("conditions"=>array("Lead.id"=>$_GET['lead_id'],"Lead.agencia_id"=>$this->Session->read('agencia_id')),"recursive"=>2));
		//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = $this->_get_pics($modelos);
		$this->set('user_id',$this->Auth->user('id'));	
		$this->set('pics',$pics);	
		$this->set('lead',$lead);	
	}
	
	public function borra_lead(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		//begin notificacion
		$notificaciones = $this->Notificacione->findAllByAgenciaId($this->Session->read('agencia_id'));
		$lead = $this->Lead->findByIdAndAgenciaId($_GET['lead_id'],$this->Session->read('agencia_id'));		
		if(count($lead)){ //security check
			$title = "Removido ".Lead::setEmailSubject($lead);;
			//modelo pics
			$modelos = explode(",",$lead['Lead']['modelos']);
			$pics = array();
			$pics = $this->_get_pics($modelos);
			foreach($notificaciones as $no){			
		$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'data'=>$lead['Lead'],'title'=>$title));
				$Email->template('notificar_lead_removido')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->subject($title)
				->emailFormat('html')
				->to($no['Notificacione']['email'])
				->replyTo($lead['Lead']['email'])
				->send();	
				}
		//end notificacion
			$this->Lead->delete($_GET['lead_id']);
			$data = array("is_success"=>1);
		}else{
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("lead"=>"error borrando")));
		}
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function leads_atendiendo(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('Lead.agencia_id' => $this->Session->read('agencia_id'),'LeadSeguidore.user_id'=>$this->Auth->user('id'),'(Lead.status = 2 OR Lead.status = 5)'));
		//$leads = $this->Lead->find('all',$opt);
		$leads = $this->LeadSeguidore->find('all',$opt);
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			$modelos = explode(",",$leads[$i]['Lead']['modelos']);
			$leads[$i]['pics'] = $this->_get_pics($modelos);
		}
		$this->set("leads",$leads);
	}
	
	public function _get_pics($modelos){
		$pics = array();
			$y = 0;
			foreach($modelos as $mod){
				$model = new Modelo();
				$tmp = $model->findByModelo($mod);
				if(isset($tmp['ModeloPic']) && count($tmp['ModeloPic'])){
					$pics[$y]['label'] = $mod;	
					$pics[$y]['file'] = "/app/webroot/files/modelo_pic/pic/".$tmp['ModeloPic'][0]['pic_file']."/".$tmp['ModeloPic'][0]['pic'];
				}else{
					$pics[$y]['label'] = $mod;
					$pics[$y]['file'] = "/img/motosil1.png";
				}
				$y++;
			}		
		return $pics;
	}
	
	public function leads_procesando(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('order'=>array('Lead.id DESC'),'conditions' => array('Lead.agencia_id' => $this->Session->read('agencia_id'),'(Lead.status = 2 OR Lead.status = 5)'),'offset' => $_GET['off_set'],'limit'=>$_GET['limit']);
		$leads = $this->Lead->find('all',$opt);
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			$modelos = explode(",",$leads[$i]['Lead']['modelos']);
			$leads[$i]['pics'] = $this->_get_pics($modelos);	
		}
		$this->set("leads",$leads);
	}
	
	public function total_leads_procesando(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('Lead.agencia_id' => $this->Session->read('agencia_id'),'(Lead.status = 2 OR Lead.status = 5)'));
		$total = $this->Lead->find('count',$opt);
		$this->set("total",$total);
		$this->set("limit",25);
	}
	
	public function total_leads_nuevos(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('Lead.agencia_id' => $this->Session->read('agencia_id'),'(Lead.status = 1)'));
		$total = $this->Lead->find('count',$opt);
		$this->set("total",$total);
		$this->set("limit",25);
	}
	
	public function leads_nuevos(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('order'=>array('Lead.id DESC'),'conditions' => array('agencia_id' => $this->Session->read('agencia_id'),'status' => 1),'offset' => $_GET['off_set'],'limit'=>$_GET['limit']);
		$leads = $this->Lead->find('all',$opt);
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			$modelos = explode(",",$leads[$i]['Lead']['modelos']);
			$leads[$i]['pics'] = $this->_get_pics($modelos);
		}
		$this->set("leads",$leads);
	}
	
	public function obtener_total_mis_leads(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('LeadSeguidore.user_id' => $this->Auth->user('id'),'(Lead.status = 2 OR Lead.status = 5)'));
		$data = array("total"=>$this->LeadSeguidore->find('count',$opt));
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function obtener_total_leads_nuevos(){
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		$this->layout = "ajax";
		$opt = array('conditions' => array('agencia_id' => $this->Session->read('agencia_id'),'status' => 1));
		$data = array("total"=>$this->Lead->find('count',$opt));
		$this->set('data', $data);
		$this->render("/General/serialize_json");
	}
	
	public function lead_manager(){
		$this->layout = "ajax";
		$this->_filter_employees_only($this->Session->read('agencia_id'));
	}
	
	public function agregar_lead_directamente_get(){
		$this->layout = "ajax";
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		if (isset($_GET['Lead']['email'])) {
			$this->Lead->create();
			if ($this->Lead->save($_GET['Lead'])) {
				$history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$this->Lead->getLastInsertId(),"fecha"=>date("Y-m-d H:i:s"),"status"=>1));
				$this->LeadHistoria->create();
				$this->LeadHistoria->save($history_data);
				$this->set('data',array('is_success'=>1,'flash'=>'El Lead #'.$this->Lead->getLastInsertId().' ha sido creado.'));
			} else {
				$errors = $this->Lead->validationErrors;
				$this->set('data',array('is_success'=>0,'invalid_form'=>1,'error_list'=>$errors));
			}	
		}else {
			$this->set('data',array("is_success"=>0,'invalid_form'=>1,"error_list"=>array("lead"=>"intento de lead sin datos")));
		}
		$this->render("/General/serialize_json");
	}
	
	public function agregar_lead_directamente(){
		$this->layout = "ajax";	
		$this->_filter_employees_only($this->Session->read('agencia_id'));
		if ($this->request->is('post')) {						
			$this->Lead->create();
			if ($this->Lead->save($this->request->data['Lead'])) {
				$history_data = array("LeadHistoria"=>array("user_id"=>$this->Auth->user('id'),"lead_id"=>$this->Lead->getLastInsertId(),"fecha"=>date("Y-m-d H:i:s"),"status"=>1));
				$this->LeadHistoria->create();
				$this->LeadHistoria->save($history_data);
				$this->Session->setFlash('El Lead Ha sido agregado.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
				return $this->redirect(array('action' => 'agregar_lead_directamente'));
			} else {
				$this->Session->setFlash('Error agregando el lead.', 'alert', array('plugin' => 'BoostCake','class' => 'alert-error'));
			}
		}
		$opt = array("conditions"=>array("agencia_id"=>$this->Session->read('agencia_id')),"recursive"=>3);
		$ma = $this->MarcaAgencia->find('all',$opt);
		$this->set("fuentes",$this->Fuente->find('list',array('conditions'=>array("agencia_id"=>$this->Session->read('agencia_id')),'fields' => array('texto', 'texto'))));
		$this->set("modelos_agencia",$ma);
	}

}

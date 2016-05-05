<?php
App::uses('CrcController', 'Controller');

class ReportesadminController extends CrcController {

	public $uses = array('Tipo','Agencia','LeadHistoria','MarcaAgencia','Fuente','Marca','LeadSeguimiento','User','Administradore','Vendedore','Notificacione','Modelo','Lead','LeadSeguidore','ModeloAgencia','ModeloPic');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->allow_only_sa();
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

	public function fechas_stage() {
		$this->layout = "ajax";		
	}
	
	public function mapa() {
		$this->layout = "ajax";
		$leads = $this->Lead->find('all',array('order'=>array('Lead.id DESC'),'limit'=>12));
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			$modelos = explode(",",$leads[$i]['Lead']['modelos']);	
			$leads[$i]['pics'] = $this->_get_pics($modelos);
		}
		$this->set('leads',$leads);				
	}
	
	public function reporte_fecha_url(){
		$this->layout = "ajax";
		$opt = array('conditions' => array(
										"Lead.creadad BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']." 23:00:00'"
									));
		
									
		$leads = $this->Lead->find('all',$opt);
		
		for($i=0;$i<count($leads);$i++){
			//modelo pics
			//$modelos = explode(",",$leads[$i]['Lead']['modelos']);
			$pics = array();
			$y = 0;
			$pics[$y]['label'] = $leads[$i]['Lead']['modelos'];
			$pics[$y]['file'] = "/img/motosil1.png";
			$leads[$i]['pics'] = $pics;//$this->_get_pics($modelos);
		}
		$_SESSION['reporteadmin_result'] = $leads;
        $this->set("leads",$leads);
	}
	
	public function csv_downloads(){
    if($_GET['reporte']==4){
        $csv_str  = "marca,modelos,agencia,nombre,primer_apellido,segundo_apellido,email,direccion,provincia,celular,telefono,status,lat,lon,ip_origen,creada,cambio,comentario,boletin,fuente\n";
			foreach($_SESSION['reporteadmin_result'] as $r){
			$csv_str  .=$r['Marca']['nombre'].",".str_replace(",","-",$r['Lead']['modelos']).",".$r['Agencia']['nombre'].",".$r['Lead']['nombre'].",".$r['Lead']['primer_apellido'].",".$r['Lead']['segundo_apellido'].",".$r['Lead']['email'].",".$r['Lead']['direccion'].",".$r['Lead']['provincia'].",".$r['Lead']['celular'].",".$r['Lead']['telefono'].",".$r['Lead']['status'].",".$r['Lead']['lat']." ,".$r['Lead']['lon'].",".$r['Lead']['ip_origen'].",".$r['Lead']['creadad'].",".$r['Lead']['cambio'].",".str_replace(",","-",$r['Lead']['comentario']).",".$r['Lead']['boletin'].",".$r['Lead']['fuente']."\n";
            }

			@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte".date("F-j-Y-g:i-a").".csv");
			echo $csv_str;
			exit;
		}
	}
}
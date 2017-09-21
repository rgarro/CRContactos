<?php
App::import('Vendor', 'PHPExcel');
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

			$pics = array();
			$y = 0;
			$pics[$y]['label'] = $leads[$i]['Lead']['modelos'];
			$pics[$y]['file'] = "/img/motosil1.png";
			$leads[$i]['pics'] = $pics;//$this->_get_pics($modelos);
			$modelo = (count(explode(",",$leads[$i]["Lead"]["modelos"]))? (explode(",",$leads[$i]["Lead"]["modelos"])[0]) :$leads[$i]["Lead"]["modelos"]);
			//$opts = ["recursive" => 0,"conditions"=>["Modelo.modelo"=>$modelo,"Modelo.marca_id"=>$leads[$i]["Lead"]["marca_id"]]];
			//$m = $this->Modelo->find('first',$opts);
			$m = $this->Modelo->query("SELECT * FROM modelos WHERE modelo = '".$modelo."' AND marca_id = '".$leads[$i]["Lead"]["marca_id"]."' LIMIT 1");
			$leads[$i]["Lead"]['cilindraje'] = $m[0]['modelos']['cilindraje'];
			$leads[$i]["Lead"]['tipo'] = $m[0]['modelos']['tipo'];
		}
		$_SESSION['reporteadmin_result'] = $leads;
        $this->set("leads",$leads);
	}

	public function csv_downloads(){
    if($_GET['reporte']==4){
				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("CRContactos")
					->setLastModifiedBy("Rolando Garro")
					->setTitle("Reporte: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT")
					->setSubject("CRCContactos Reporte")
					->setDescription("Dirco Reporte:#-".date("D, d M Y H:i:s"))
					->setKeywords("DircoReporte")
					->setCategory("DircoReporte");


				$objPHPExcel->setActiveSheetIndex(0);

				$objPHPExcel->getActiveSheet()->setCellValue('A1', "Marca");
				$objPHPExcel->getActiveSheet()->setCellValue('B1', "Modelos");
				$objPHPExcel->getActiveSheet()->setCellValue('C1', "Cilindraje");
				$objPHPExcel->getActiveSheet()->setCellValue('D1', "Tipo");
				$objPHPExcel->getActiveSheet()->setCellValue('E1', "Agencia");
				$objPHPExcel->getActiveSheet()->setCellValue('F1', "Nombre");
				$objPHPExcel->getActiveSheet()->setCellValue('G1', "Primer Apellido");
				$objPHPExcel->getActiveSheet()->setCellValue('H1', "Segundo Apellido");
				$objPHPExcel->getActiveSheet()->setCellValue('I1', "Email");
				$objPHPExcel->getActiveSheet()->setCellValue('J1', "Direccion");
				$objPHPExcel->getActiveSheet()->setCellValue('K1', "Provincia");
				$objPHPExcel->getActiveSheet()->setCellValue('L1', "Celular");
				$objPHPExcel->getActiveSheet()->setCellValue('M1', "Telefono");
				$objPHPExcel->getActiveSheet()->setCellValue('N1', "Status");
				$objPHPExcel->getActiveSheet()->setCellValue('O1', "Lat");
				$objPHPExcel->getActiveSheet()->setCellValue('P1', "Lon");
				$objPHPExcel->getActiveSheet()->setCellValue('Q1', "IP");
				$objPHPExcel->getActiveSheet()->setCellValue('R1', "Creada");
				$objPHPExcel->getActiveSheet()->setCellValue('S1', "Cambio");
				$objPHPExcel->getActiveSheet()->setCellValue('T1', "Comentario");
				$objPHPExcel->getActiveSheet()->setCellValue('U1', "Boletin");
				$objPHPExcel->getActiveSheet()->setCellValue('V1', "Fuente");

				$num = 2;
			foreach($_SESSION['reporteadmin_result'] as $r){

				$objPHPExcel->setActiveSheetIndex(0);

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$num, $r['Marca']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$num, $r['Lead']['modelos']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$num, $r['Lead']['cilindraje']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$num, $r['Lead']['tipo']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$num, $r['Agencia']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$num, $r['Lead']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$num, $r['Lead']['primer_apellido']);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$num, $r['Lead']['segundo_apellido']);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$num, $r['Lead']['email']);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$num, $r['Lead']['direccion']);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$num, $r['Lead']['provincia']);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$num, $r['Lead']['celular']);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$num, $r['Lead']['telefono']);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$num, $r['Lead']['status']);
				$objPHPExcel->getActiveSheet()->setCellValue('O'.$num, $r['Lead']['lat']);
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$num, $r['Lead']['lon']);
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.$num, $r['Lead']['ip_origen']);
				$objPHPExcel->getActiveSheet()->setCellValue('R'.$num, $r['Lead']['creadad']);
				$objPHPExcel->getActiveSheet()->setCellValue('S'.$num, $r['Lead']['cambio']);
				$objPHPExcel->getActiveSheet()->setCellValue('T'.$num, $r['Lead']['comentario']);
				$objPHPExcel->getActiveSheet()->setCellValue('U'.$num, $r['Lead']['boletin']);
				$objPHPExcel->getActiveSheet()->setCellValue('V'.$num, $r['Lead']['fuente']);
				$num ++;
			}
			header('Content-Type: application/vnd.ms-excel');
			//header('Content-Disposition: attachment;filename=\"'.$title.'\"');
			header('Content-Disposition: attachment;filename="crcontactos-reporte-fecha'.'.xls"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		}
	}
}

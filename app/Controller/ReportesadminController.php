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
        //$csv_str  = "marca,modelos,agencia,nombre,primer_apellido,segundo_apellido,email,direccion,provincia,celular,telefono,status,lat,lon,ip_origen,creada,cambio,comentario,boletin,fuente\n";
				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("CRContactos")
					->setLastModifiedBy("Rolando Garro")
					->setTitle("Reporte: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT")
					->setSubject("CRCContactos Reporte")
					->setDescription("Dirco Reporte:#-".date("D, d M Y H:i:s"))
					->setKeywords("DircoReporte")
					->setCategory("DircoReporte");

				//$csvstr = "Territorio,Zona,Supermercado,Item,Producto,Encargado,Planta,Bodega,Sistema,Observaciones,Cliente,Reporte,Fecha\n";
				$objPHPExcel->setActiveSheetIndex(0);

				$objPHPExcel->getActiveSheet()->setCellValue('A1', "Marca");
				$objPHPExcel->getActiveSheet()->setCellValue('B1', "Modelos");
				$objPHPExcel->getActiveSheet()->setCellValue('C1', "Agencia");
				$objPHPExcel->getActiveSheet()->setCellValue('D1', "Nombre");
				$objPHPExcel->getActiveSheet()->setCellValue('E1', "Primer Apellido");
				$objPHPExcel->getActiveSheet()->setCellValue('F1', "Segundo Apellido");
				$objPHPExcel->getActiveSheet()->setCellValue('G1', "Email");
				$objPHPExcel->getActiveSheet()->setCellValue('H1', "Direccion");
				$objPHPExcel->getActiveSheet()->setCellValue('I1', "Provincia");
				$objPHPExcel->getActiveSheet()->setCellValue('J1', "Celular");
				$objPHPExcel->getActiveSheet()->setCellValue('K1', "Telefono");
				$objPHPExcel->getActiveSheet()->setCellValue('L1', "Status");
				$objPHPExcel->getActiveSheet()->setCellValue('M1', "Lat");
				$objPHPExcel->getActiveSheet()->setCellValue('N1', "Lon");
				$objPHPExcel->getActiveSheet()->setCellValue('O1', "IP");
				$objPHPExcel->getActiveSheet()->setCellValue('P1', "Creada");
				$objPHPExcel->getActiveSheet()->setCellValue('Q1', "Cambio");
				$objPHPExcel->getActiveSheet()->setCellValue('R1', "Comentario");
				$objPHPExcel->getActiveSheet()->setCellValue('S1', "Boletin");
				$objPHPExcel->getActiveSheet()->setCellValue('T1', "Fuente");

				$num = 2;
			foreach($_SESSION['reporteadmin_result'] as $r){
				//$csv_str  .=$r['Marca']['nombre'].",".str_replace(",","-",$r['Lead']['modelos']).",".$r['Agencia']['nombre'].",".$r['Lead']['nombre'].",".$r['Lead']['primer_apellido'].",".$r['Lead']['segundo_apellido'].",".$r['Lead']['email'].",".$r['Lead']['direccion'].",".$r['Lead']['provincia'].",".$r['Lead']['celular'].",".$r['Lead']['telefono'].",".$r['Lead']['status'].",".$r['Lead']['lat']." ,".$r['Lead']['lon'].",".$r['Lead']['ip_origen'].",".$r['Lead']['creadad'].",".$r['Lead']['cambio'].",".str_replace(",","-",$r['Lead']['comentario']).",".$r['Lead']['boletin'].",".$r['Lead']['fuente']."\n";
				$objPHPExcel->setActiveSheetIndex(0);

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$num, $r['Marca']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$num, $r['Lead']['modelos']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$num, $r['Agencia']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$num, $r['Lead']['nombre']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$num, $r['Lead']['primer_apellido']);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$num, $r['Lead']['segundo_apellido']);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$num, $r['Lead']['email']);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$num, $r['Lead']['direccion']);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$num, $r['Lead']['provincia']);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$num, $r['Lead']['celular']);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$num, $r['Lead']['telefono']);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$num, $r['Lead']['status']);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$num, $r['Lead']['lat']);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$num, $r['Lead']['lon']);
				$objPHPExcel->getActiveSheet()->setCellValue('O'.$num, $r['Lead']['ip_origen']);
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$num, $r['Lead']['creadad']);
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.$num, $r['Lead']['cambio']);
				$objPHPExcel->getActiveSheet()->setCellValue('R'.$num, $r['Lead']['comentario']);
				$objPHPExcel->getActiveSheet()->setCellValue('S'.$num, $r['Lead']['boletin']);
				$objPHPExcel->getActiveSheet()->setCellValue('T'.$num, $r['Lead']['fuente']);
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
			/*@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
			@header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=reporte".date("F-j-Y-g:i-a").".csv");
			echo $csv_str;
			exit;*/
		}
	}
}

<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('MotopinHelper', 'View/Helper');

/**
 * MotopinHelper Test Case
 *
 */
class MotopinHelperTest extends CakeTestCase {

 public $testLead = array('Lead' => array
                (
                    'id' => 41,
                    'agencia_id' => 3,
                    'creadad' => '2015-09-03 16:58:48',
                    'modelos' => 'Pulsar 135 LS',
                    'nombre' => 'Rolando',
                    'primer_apellido' => 'Garro',
                    'segundo_apellido' => "", 
                    'email' => 'lama@auto.com',
                    'direccion' => '1990 Long Beach Blvd',
                    'canton' => 'Long Beach',
                    'distrito' =>'', 
                    'provincia' => 'Alajuela',
                    'cedula' =>'', 
                    'celular' => ' 83113213',
                    'telefono' => ' 80080080',
                    'status' => ' 1',
                    'lat' => ' 9.95936',
                    'lon' => ' -84.0702',
                    'ip_origen' => ' 127.0.0.1',
                    'cambio' => ' 2015-09-03 16:58:49',
                    'comentario' => ' ',
                    'boletin' => ' 0',
                    'fuente' => ' crmotos.com',
                    'marca_id' => ' 10',
                    'horario' => ' 5',
                ),

            'Agencia' => array
                (
                    'id' => '3',
                    'nombre' => ' Moto Mas',
                    'logo' => ' motomas_logo.png',
                    'logo_file' => ' 3',
                    'razon_social' => ' more cool',
                    'cedula_juridica' => ' 10000000001',
                    'direccion' => ' antojitos tibas',
                    'canton' => ' Tibas',
                    'distrito' => ' Colima',
                    'provincia' => ' SanJose',
                    'telefono' => ' 22973333',
                    'codigo_postal' => ' 11303',
                    'lat' => ' 0',
                    'lon' => ' 0',
                ),

            'Marca' => array
                (
                    'id' => ' 10',
                    'nombre' => ' Bajaj',
                    'logo' => ' logo-motocicletas-bajaj-costarica.jpg',
                    'logo_file' => ' 10'
                ),

            'Seguidores' => array
                (
                ),

            'LeadHistoria' => array
                (
                ),

            'pics' => array
                (
                    '0' => array
                        (
                            'label' => ' Pulsar 135 LS',
                            'file' => ' /app/webroot/files/modelo_pic/pic/10/pulsar135ls.jpg'
                        )

                )
        );

    

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Motopin = new MotopinHelper($View);
	}
	
	public function testIsTestable(){
		$this->assertTrue(true);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Motopin);

		parent::tearDown();
	}

/**
 * testMotopin method
 *
 * @return void
 */
	public function testMotopin() {
		$this->assertTrue(method_exists($this->Motopin, "passed"));
	}

	public function testMap_pin_content_formatExists(){
		$this->assertTrue(method_exists($this->Motopin,"map_pin_content_format"));
	}

	public function testMap_pin_content_formatReturnsEspecificFormat(){
		$pattern = "/<ul(.*?)>(.*?)<\/ul>/";	
		$this->assertRegExp($pattern,$this->Motopin->map_pin_content_format($this->testLead));
	}

}

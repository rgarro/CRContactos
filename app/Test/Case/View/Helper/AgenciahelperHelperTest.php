<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('AgenciahelperHelper', 'View/Helper');

/**
 * AgenciaHelper Test Case
 *
 */
class AgenciahelperHelperTest extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Agencia = new AgenciahelperHelper($View);
	}
	
	

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agencia);

		parent::tearDown();
	}



	public function testDisplay_agencia_top_logo(){
		$this->assertTrue(method_exists($this->Agencia,"display_agencia_top_logo"));
	}

	public function testDisplay_agencia_top_logoReturnsEspecificFormat(){
		$pattern = "/<img(.*?)>/";	
		$this->assertRegExp($pattern,$this->Agencia->display_agencia_top_logo(2));
	}

}

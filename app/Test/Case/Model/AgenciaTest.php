<?php
App::uses('Agencia', 'Model');

/**
 * Agencia Test Case
 *
 */
class AgenciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agencia = ClassRegistry::init('Agencia');
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

}

<?php
App::uses('ModeloAgencia', 'Model');

/**
 * ModeloAgencia Test Case
 *
 */
class ModeloAgenciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.modelo_agencia',
		'app.modelo',
		'app.marca',
		'app.agencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ModeloAgencia = ClassRegistry::init('ModeloAgencia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModeloAgencia);

		parent::tearDown();
	}

}

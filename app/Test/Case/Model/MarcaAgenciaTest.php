<?php
App::uses('MarcaAgencia', 'Model');

/**
 * MarcaAgencia Test Case
 *
 */
class MarcaAgenciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.marca_agencia',
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
		$this->MarcaAgencia = ClassRegistry::init('MarcaAgencia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MarcaAgencia);

		parent::tearDown();
	}

}

<?php
App::uses('Modelo', 'Model');

/**
 * Modelo Test Case
 *
 */
class ModeloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.modelo',
		'app.marca'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Modelo = ClassRegistry::init('Modelo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Modelo);

		parent::tearDown();
	}

}

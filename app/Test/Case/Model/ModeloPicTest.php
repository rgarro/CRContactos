<?php
App::uses('ModeloPic', 'Model');

/**
 * ModeloPic Test Case
 *
 */
class ModeloPicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.modelo_pic',
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
		$this->ModeloPic = ClassRegistry::init('ModeloPic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModeloPic);

		parent::tearDown();
	}

}

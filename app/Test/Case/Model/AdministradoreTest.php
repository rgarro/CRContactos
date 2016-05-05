<?php
App::uses('Administradore', 'Model');

/**
 * Administradore Test Case
 *
 */
class AdministradoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.administradore',
		'app.user',
		'app.agencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Administradore = ClassRegistry::init('Administradore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Administradore);

		parent::tearDown();
	}

}

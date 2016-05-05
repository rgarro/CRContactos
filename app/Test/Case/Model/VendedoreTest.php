<?php
App::uses('Vendedore', 'Model');

/**
 * Vendedore Test Case
 *
 */
class VendedoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vendedore',
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
		$this->Vendedore = ClassRegistry::init('Vendedore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vendedore);

		parent::tearDown();
	}

}

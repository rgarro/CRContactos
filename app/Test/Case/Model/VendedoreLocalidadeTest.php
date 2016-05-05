<?php
App::uses('VendedoreLocalidade', 'Model');

/**
 * VendedoreLocalidade Test Case
 *
 */
class VendedoreLocalidadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vendedore_localidade',
		'app.vendedore',
		'app.user',
		'app.agencia',
		'app.localidade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VendedoreLocalidade = ClassRegistry::init('VendedoreLocalidade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VendedoreLocalidade);

		parent::tearDown();
	}

}

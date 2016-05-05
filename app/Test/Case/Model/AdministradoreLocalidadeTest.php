<?php
App::uses('AdministradoreLocalidade', 'Model');

/**
 * AdministradoreLocalidade Test Case
 *
 */
class AdministradoreLocalidadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.administradore_localidade',
		'app.administradore',
		'app.user',
		'app.agencia',
		'app.localidade',
		'app.vendedore_localidade',
		'app.vendedore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdministradoreLocalidade = ClassRegistry::init('AdministradoreLocalidade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdministradoreLocalidade);

		parent::tearDown();
	}

}

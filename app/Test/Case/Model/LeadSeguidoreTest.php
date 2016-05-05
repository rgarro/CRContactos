<?php
App::uses('LeadSeguidore', 'Model');

/**
 * LeadSeguidore Test Case
 *
 */
class LeadSeguidoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lead_seguidore',
		'app.user',
		'app.lead',
		'app.agencia',
		'app.modelo_agencia',
		'app.modelo',
		'app.marca',
		'app.modelo_pic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LeadSeguidore = ClassRegistry::init('LeadSeguidore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LeadSeguidore);

		parent::tearDown();
	}

}

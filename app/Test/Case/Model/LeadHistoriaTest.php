<?php
App::uses('LeadHistoria', 'Model');

/**
 * LeadHistoria Test Case
 *
 */
class LeadHistoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lead_historia',
		'app.lead',
		'app.agencia',
		'app.modelo_agencia',
		'app.modelo',
		'app.marca',
		'app.marca_agencia',
		'app.modelo_pic',
		'app.lead_seguidore',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LeadHistoria = ClassRegistry::init('LeadHistoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LeadHistoria);

		parent::tearDown();
	}

}

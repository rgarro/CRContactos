<?php
App::uses('LeadSeguimiento', 'Model');

/**
 * LeadSeguimiento Test Case
 *
 */
class LeadSeguimientoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lead_seguimiento',
		'app.user',
		'app.lead',
		'app.agencia',
		'app.modelo_agencia',
		'app.modelo',
		'app.marca',
		'app.modelo_pic',
		'app.lead_seguidore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LeadSeguimiento = ClassRegistry::init('LeadSeguimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LeadSeguimiento);

		parent::tearDown();
	}

}

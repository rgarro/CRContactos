<?php
App::uses('Publifine', 'Model');

/**
 * Publifine Test Case
 *
 */
class PublifineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.publifine',
		'app.formfinale',
		'app.publicidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Publifine = ClassRegistry::init('Publifine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Publifine);

		parent::tearDown();
	}

}

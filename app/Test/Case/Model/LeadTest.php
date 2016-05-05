<?php
App::uses('Lead', 'Model');

/**
 * Lead Test Case
 *
 */
class LeadTest extends CakeTestCase {
public $dropTables = false;


/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		//parent::setUp();
		//$this->Lead = ClassRegistry::init('Lead');
		$this->Lead = new Lead();	
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		///unset($this->Lead);

		//parent::tearDown();
	}

	public function testSetEmailSubjectExist(){
		$this->assertTrue(method_exists($this->Lead,"setEmailSubject"));
	}

	public function testSetEmailSubjectReturnsEspecificFormat(){
		$l = $this->Lead->find('first');
		$pattern = "/(.*?) de (.*?) Busca (.*?)/";	
		$this->assertRegExp($pattern,$this->Lead->setEmailSubject($l));
	}

}

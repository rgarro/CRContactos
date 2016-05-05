<?php
/**
 * LeadHistoriaFixture
 *
 */
class LeadHistoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'key' => 'primary'),
		'lead_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true),
		'fecha' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'lead_id' => 1,
			'user_id' => 1,
			'status' => 1,
			'fecha' => 1413514857
		),
	);

}

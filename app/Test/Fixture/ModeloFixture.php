<?php
/**
 * ModeloFixture
 *
 */
class ModeloFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary'),
		'marca_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'modelo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'marca_id' => 1,
			'modelo' => 'Lorem ipsum dolor sit amet'
		),
	);

}

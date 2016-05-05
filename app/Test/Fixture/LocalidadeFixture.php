<?php
/**
 * LocalidadeFixture
 *
 */
class LocalidadeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary'),
		'agencia_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'direccion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'calles' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'canton' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false),
		'distrito' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false),
		'lat' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
		'lon' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
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
			'agencia_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit a',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'calles' => 1,
			'canton' => 1,
			'distrito' => 1,
			'lat' => 1,
			'lon' => 1
		),
	);

}

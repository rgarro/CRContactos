<?php
/**
 * MarcaAgenciaFixture
 *
 */
class MarcaAgenciaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary'),
		'marca_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'agencia_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'desde' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
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
			'agencia_id' => 1,
			'desde' => 1409273813
		),
	);

}

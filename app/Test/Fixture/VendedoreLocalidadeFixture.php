<?php
/**
 * VendedoreLocalidadeFixture
 *
 */
class VendedoreLocalidadeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary'),
		'vendedore_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'localidade_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
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
			'vendedore_id' => 1,
			'localidade_id' => 1,
			'desde' => 1409182914
		),
	);

}

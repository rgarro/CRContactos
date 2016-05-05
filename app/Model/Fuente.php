<?php
App::uses('AppModel', 'Model');
/**
 * Fuente Model
 *
 */
class Fuente extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'texto' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $belongsTo = array(
		'Agencia' => array(
			'className' => 'Agencia',
			'foreignKey' => 'agencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

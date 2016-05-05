<?php
App::uses('AppModel', 'Model');
/**
 * MarcaAgencia Model
 *
 * @property Marca $Marca
 * @property Agencia $Agencia
 */
class MarcaAgencia extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'marca_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'agencia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Marca' => array(
			'className' => 'Marca',
			'foreignKey' => 'marca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Agencia' => array(
			'className' => 'Agencia',
			'foreignKey' => 'agencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * ModeloAgencia Model
 *
 * @property Modelo $Modelo
 * @property Agencia $Agencia
 */
class ModeloAgencia extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'modelo_id' => array(
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
		'Modelo' => array(
			'className' => 'Modelo',
			'foreignKey' => 'modelo_id',
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

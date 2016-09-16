<?php
App::uses('AppModel', 'Model');
/**
 * Publifine Model
 *
 * @property Formfinale $Formfinale
 * @property Publicidad $Publicidad
 */
class Publifine extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'formfinale_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publicidad_id' => array(
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
		'Formfinale' => array(
			'className' => 'Formfinale',
			'foreignKey' => 'formfinale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Publicidad' => array(
			'className' => 'Publicidad',
			'foreignKey' => 'publicidad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

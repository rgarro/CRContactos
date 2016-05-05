<?php
App::uses('AppModel', 'Model');
/**
 * Tipo Model
 *
 */
class Tipo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
        		'rule'    => 'isUnique',
        		'message' => 'Este Tipo ya Existe.'
    		)
		),
	);
}

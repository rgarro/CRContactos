<?php
App::uses('AppModel', 'Model');
/**
 * Modelo Model
 *
 * @property Marca $Marca
 */
class Modelo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'modelo';

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
		'modelo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUniqueInMarca' => array(
        		'rule'    => "checkUniqueInMarca",//array('isUnique', array('modelo', 'marca_id'), false),//'isUnique',
        		'message' => 'Este Modelo ya Existe en esta Marca.'
    		)
		),
		'tipo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'cilindraje' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'number' => array(
				'rule' => array('range', 45, 2500),
				'message' => 'numero entre 45 y 2500'
				)
			)
	);

	public function checkUniqueInMarca($check){
		$c = array("Modelo.modelo"=>$this->data['Modelo']['modelo'],"Modelo.marca_id"=>$this->data['Modelo']['marca_id']);
		 $existingModelos = $this->find('count', array(
            'conditions' => $c,
            'recursive' => -1
        ));
		if($existingModelos > 0){
			return false;
		}else{
			return true;
		}
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
        'ModeloPic' => array(
            'className' => 'ModeloPic',
            'order' => 'ModeloPic.id DESC'
        )
    );
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
		)
	);
}

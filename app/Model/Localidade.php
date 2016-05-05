<?php
require_once ROOT.'/lib/CRContactos/CRContactos_Objeto.php';
App::uses('HttpSocket', 'Network/Http');
App::uses('AppModel', 'Model');
/**
 * Localidade Model
 *
 * @property Agencia $Agencia
 */
class Localidade extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'agencia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'calles' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerida.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),'direccion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
        		'rule'    => 'isUnique',
        		'message' => 'Esta Direccion Agencia ya Existe.'
    		)
		),
		'canton' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'distrito' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'provincia' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerida.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'allowedChoice' => array(
             'rule'    => array('inList', array('Alajuela', 'Heredia','Cartago','SanJose','Puntarenas','Guanacaste','Limon')),
             'message' => 'debe ser una provincia.'
         )
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agencia' => array(
			'className' => 'Agencia',
			'foreignKey' => 'agencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	 public $hasMany = array(
        'VendedoreLocalidade' => array(
            'className' => 'VendedoreLocalidade',
        ),
        'AdministradoreLocalidade' => array(
            'className' => 'AdministradoreLocalidade',
        )
    );
	
	public function beforeSave($options = array()) {
		$address = sprintf("%s,%s,%s,Costa Rica",$this->data['Localidade']['calles'],
										 //$this->data['Agencia']['distrito'],
										 $this->data['Localidade']['canton'],
										 $this->data['Localidade']['provincia']);
        $parameters = array();
        
        $parameters['address'] = $address;
        $parameters['sensor'] = 'false';
        
        $http = new HttpSocket();
        
        $response = $http->get('http://maps.googleapis.com/maps/api/geocode/json', $parameters);
        $response = json_decode($response);		
        
        if ($response->status == 'OK') {
            $this->data['Localidade']['lat'] = floatval($response->results[0]->geometry->location->lat);
            $this->data['Localidade']['lon'] = floatval($response->results[0]->geometry->location->lng);
            return true;
        }
        else {
              $this->data['Localidade']['lat'] = floatval(0);
            $this->data['Localidade']['lon'] = floatval(0);
            return true;
        }
	}
}

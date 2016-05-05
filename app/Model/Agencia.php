<?php
require_once ROOT.'/lib/CRContactos/CRContactos_Objeto.php';
App::uses('HttpSocket', 'Network/Http');
App::uses('AppModel', 'Model');
/**
 * Agencia Model
 *
 */
class Agencia extends AppModel {

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
        		'message' => 'Esta Agencia ya Existe.'
    		)
		),
		'logo' => array(
			'rule1' => array(
            	'rule' => array('isValidExtension', array('jpg', 'png', 'gif')),
        		'message' => 'Archivo debe ser una imagen png, jpg or gif extension'
         	),
        	'rule2' => array(
            	'rule' => 'isUnderPhpSizeLimit',
        		'message' => 'Archivo excede limite de upload'
        	)
		),
		'direccion' => array(
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
        		'message' => 'Esta Direccion Agencia ya Existe.'
    		)
		),
		'canton' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'distrito' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'provincia' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'allowedChoice' => array(
             'rule'    => array('inList', array('Alajuela', 'Heredia','Cartago','SanJose','Puntarenas','Guanacaste','Limon')),
             'message' => 'Enter either Foo or Bar.'
         )
		),
		'telefono' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe ser numérico',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'between' => array(
                'rule'    => array('between', 7, 10),
                'message' => 'Entre 7 y 10 caracteres'
            )
		),
	);
	
	public function beforeSave($options = array()) {
		if(isset($this->data['Agencia']['direccion'])){
		$address = sprintf("%s,%s,%s,Costa Rica",$this->data['Agencia']['direccion'],
										 //$this->data['Agencia']['distrito'],
										 $this->data['Agencia']['canton'],
										 $this->data['Agencia']['provincia']);
        $parameters = array();
        
        $parameters['address'] = $address;
        $parameters['sensor'] = 'false';
        
        $http = new HttpSocket();
        
        $response = $http->get('http://maps.googleapis.com/maps/api/geocode/json', $parameters);
        $response = json_decode($response);		
        
        if ($response->status == 'OK') {
            $this->data['Agencia']['lat'] = floatval($response->results[0]->geometry->location->lat);
            $this->data['Agencia']['lon'] = floatval($response->results[0]->geometry->location->lng);
            return true;
        }
        else {
              $this->data['Agencia']['lat'] = floatval(0);
            $this->data['Agencia']['lon'] = floatval(0);
            return true;
        }
		}
	}
	
	
	public $actsAs = array(
        'Upload.Upload' => array(
            'logo' => array(
                'fields' => array(
                    'dir' => 'logo_file'
                ),
                "uploadMethod"=>'php',
				"thumbsizes" => array(
									'80x80' => '80x80',
									'1280x768' => '1280x768'
									),
				'thumbnailMethod'	=> 'php'
            )
        )
    );
	
	public $hasMany = array(
        'ModeloAgencia' => array(
            'className' => 'ModeloAgencia',
        ), 'MarcaAgencia' => array(
            'className' => 'MarcaAgencia',
        )
    );
	
}

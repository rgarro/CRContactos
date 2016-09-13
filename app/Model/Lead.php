<?php
require_once 'lib/CRContactos/netgeo.php';

App::uses('CakeEmail', 'Network/Email');
App::uses('AppModel', 'Model');
App::uses('Notificacione', 'Model');
App::uses('Modelo', 'Model');
App::uses('Marca', 'Model');
App::uses('Lead', 'Model');
/**
 * Lead Model
 *
 * @property Agencia $Agencia
 */
class Lead extends AppModel {

	//public $actsAs = array('Containable');

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
			),
		),
		'modelos' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'primer_apellido' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'segundo_apellido' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		//'distrito' => array(
			//'notEmpty' => array(
				//'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		//),
		'provincia' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cedula' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between', 7, 10),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'celular' => array(
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
		'telefono' => array(
			/*'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Es requerido',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe ser numérico',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'between' => array(
                'rule'    => array('between', 7, 10),
                'message' => 'Entre 7 y 10 caracteres'
            )
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lat' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lon' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*'horario' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);


	public static function setEmailSubject($l){
		$marca = new Marca();
		$m = $marca->findById($l['Lead']['marca_id']);
			return $l['Lead']['nombre']." ".$l['Lead']['primer_apellido']." de ".$l['Lead']['canton']." Busca ".$m['Marca']['nombre']." ".$l['Lead']['modelos'];
	}

	public function beforeSave($options = array()){
		if(!isset($this->data['Lead']['id'])){
			//making csv friendly
			$this->data['Lead']['comentario'] = str_replace(","," ",$this->data['Lead']['comentario']);
			$this->data['Lead']['direccion'] = str_replace(","," ",$this->data['Lead']['direccion']);

			$this->data['Lead']['creadad'] = date("Y-m-d H:i:s");
			//geocode by ip	if client geolocation denied.
			if($this->data['Lead']['lat'] == 0){
				if(isset($_SERVER["REMOTE_ADDR"])){
					$ip = $_SERVER['REMOTE_ADDR'];
					//netGeo::getNetGeo($ip);
					//$this->data['Lead']['lat'] = netGeo::$Latitude->__toString();
					//$this->data['Lead']['lon'] = netGeo::$Longitude->__toString();
					$this->data['Lead']['lat'] = 9.9356142;
								$this->data['Lead']['lon'] = -84.1133451;
					$this->data['Lead']['ip_origen'] = $_SERVER["REMOTE_ADDR"];
				}else{
					$this->data['Lead']['lat'] = 9.9356142;
            		$this->data['Lead']['lon'] = -84.1133451;
					$this->data['Lead']['ip_origen'] = "127.0.0.1";
				}
			}


			//modelo pics
			$modelos = explode(",",$this->data['Lead']['modelos']);
			$pics = array();
			$y = 0;
			foreach($modelos as $mod){
				$model = new Modelo();
				$tmp = $model->findByModelo($mod);
				if(count($tmp['ModeloPic'])){
					$pics[$y]['label'] = $mod;
					$pics[$y]['file'] = "/app/webroot/files/modelo_pic/pic/".$tmp['ModeloPic'][0]['pic_file']."/".$tmp['ModeloPic'][0]['pic'];
				}else{
					$pics[$y]['label'] = $mod;
					$pics[$y]['file'] = "/img/motosil1.png";
				}
				$y++;
			}
			//notificaciones
			$n = new Notificacione();
			$notificaciones = $n->findAllByAgenciaId($this->data['Lead']['agencia_id']);
			$msg = "";
			foreach($this->data['Lead'] as $k => $v){
				$msg .= "<dt>".$k ."</dt><dd>".$v."</dd>";
			}

			//$title = $this->data['Lead']['nombre']." ".$this->data['Lead']['primer_apellido']." de ".$this->data['Lead']['canton']." Busca ".$this->data['Lead']['modelos'];
			$title = Lead::setEmailSubject($this->data);
			foreach($notificaciones as $no){
				$Email = new CakeEmail();
				$Email->viewVars(array('pics'=>$pics,'data'=>$this->data['Lead'],'msg' => $msg,'title'=>$title));
				$Email->template('notificar_nuevo_lead')
				->from(array('notificaciones@crcontactos.com' => 'Notificaciones CRContactos'))
				->replyTo($this->data['Lead']['email'])
				->subject($title)
				->emailFormat('html')
				->to($no['Notificacione']['email'])
				->send();
			}

		}
		$this->data['Lead']['cambio'] = date("Y-m-d H:i:s");
		/* begin send email to customer */
		$new_email = new CakeEmail();
		$new_email->viewVars(array('pics'=>$pics,'data'=>$this->data['Lead'],'msg' => $msg,'title'=>$title));
		$new_email->template('nuevo_notificacion_cliente','crmotos')
		->from(array('notificaciones@crmotos.com' => 'Notificaciones CRMotos'))
		->replyTo($this->data['Lead']['email'])
		->subject($title)
		->emailFormat('html')
		->to($this->data['Lead']['email'])
		->send();
;		/* end send email to customer  */
		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
        'Seguidores' => array(
            'className' => 'LeadSeguidore'
        ), 'LeadHistoria' => array(
            'className' => 'LeadHistoria'
        )
    );

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
		),'Marca' => array(
			'className' => 'Marca',
			'foreignKey' => 'marca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

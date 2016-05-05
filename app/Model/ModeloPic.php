<?php
App::uses('AppModel', 'Model');
/**
 * ModeloPic Model
 *
 * @property Modelo $Modelo
 */
class ModeloPic extends AppModel {

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
		'pic' => array(
			'rule1' => array(
            	'rule' => array('isValidExtension', array('jpg', 'png', 'gif')),
        		'message' => 'Archivo debe ser una imagen png, jpg or gif'
         	),
        	'rule2' => array(
            	'rule' => 'isUnderPhpSizeLimit',
        		'message' => 'Archivo excede limite de upload size'
        	)
		)
	);

	public $actsAs = array(
        'Upload.Upload' => array(
            'pic' => array(
                'fields' => array(
                    'dir' => 'pic_file'
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
		)
	);
}

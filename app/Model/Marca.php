<?php
App::uses('AppModel', 'Model');
/**
 * Marca Model
 *
 */
class Marca extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	public $validate = array(
		'nombre' => array(
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
        		'message' => 'Esta Marca ya Existe.'
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
    	)
	);

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
        'Modelo' => array(
            'className' => 'Modelo'
						'order' => 'Modelo.modelo ASC'
        ),
        'MarcaAgencia' => array(
            'className' => 'MarcaAgencia'
        )
    );
}

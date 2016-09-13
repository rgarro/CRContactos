<?php
App::uses('AppModel', 'Model');
/**
 * Formfinale Model
 *
 */
class Publicidad extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'label' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)/*,
			'isUnique' => array(
        		'rule'    => 'isUnique',
        		'message' => 'Esta Etiqueta ya Existe.'
    		)*/
		),
		/*'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)*/
	);

	public $actsAs = array(
        'Upload.Upload' => array(
            'Filename' => array(
                'fields' => array(
                    'dir' => 'name_file'
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

}

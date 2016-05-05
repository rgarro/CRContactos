<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	
	public function opciones_provincias(){
		return array('Alajuela'=>'Alajuela', 'Heredia'=>'Heredia','Cartago'=>'Cartago','San José'=>'San José','Puntarenas'=>'Puntarenas','Guanacaste'=>'Guanacaste','Limon'=>'Limon');
	}

    public function opciones_horario(){
		return array("","00:00am","01:00am","02:00am","03:00am","04:00am","05:00am","06:00am","07:00am","08:00am","09:00am","10:00am","11:00am","12:00pm","01:00pm","02:00pm","03:00pm","04:00pm","05:00pm","06:00pm","07:00pm","08:00pm","09:00pm","10:00pm","11:00pm");
	}
	
}

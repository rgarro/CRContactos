<?php
class LoginController extends UsersAppController {

	function index(){
		$this->redirect('/users/users/login');
	}
}
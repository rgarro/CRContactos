<?php
require_once 'common_init.php';


App::uses('Dispatcher', 'Routing');

$Dispatcher = new Dispatcher();
$Dispatcher->dispatch(
	new CakeRequest(),
	new CakeResponse()
);

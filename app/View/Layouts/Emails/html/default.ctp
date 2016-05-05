<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title>Mensaje desde CrContactos</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse">		
	<a class="navbar-brand" href="http://crcontactos.com/"><img src="http://crcontactos.com/img/logo-crcontactos-25pix.jpg" class="img-thumbnail crcontactos-logo" style="margin-top: -10px;"></a>	
<?php if(isset($data)){ ?>
	<a class="navbar-brand" href="http://crcontactos.com/#/Dashboard/"><?php echo $this->Agenciahelper->display_agencia_top_logo($data['agencia_id'],true); ?></a>
<?php } ?>	
	</div>	
<div class="container">	
	<?php echo $this->fetch('content'); ?>
</div>
</body>
</html>
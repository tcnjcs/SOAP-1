<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>

<!DOCTYPE html> <!-- This shows that this site is HTML5 based. -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<!-- <?php echo $this->Facebook->html(); ?> This line keeps messing up the FORMAT (or CSS) of our site! -->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		TCNJ SOAP | Login
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<?php echo $this->Html->css('bootstrap-responsive.css'); ?>

	<!-- Moved script files up here above body in order to call the invalidCredentials element. -->
	<script language='javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
	<script language='javascript' src='<?=$this->webroot?>js/bootstrap-modal.js'></script>
	<script language='javascript' src='<?=$this->webroot?>js/bootstrap-alert.js'></script>
</head>
<body>
	<div class="wrapper" style="padding-bottom: 0px;">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>

<?php echo $this->Facebook->init(); ?> 
</html>

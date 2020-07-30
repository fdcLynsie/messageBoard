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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Message Board');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		//css
		echo $this->Html->css("bootstrap.min.css"); 
		echo $this->Html->css("login.css"); 
		echo $this->Html->css("registration.css"); 
		echo $this->Html->css("user_index.css"); 
		echo $this->Html->css("edit_form.css"); 
		echo $this->Html->css('cake.generic');

		//javascript
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery-3.5.1.min.js');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- //font awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="../webroot/css/font-awesome.min.css">

	<!-- jquery -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<style>
	#panel-tabs{
		display:none !important;
	}
	body {
		font-size: 13px;
	}
	a.logout, a.login, a.add, a.index{
		color: white;
	}
	a.index{
		font-size: 25px;
	}
	a.action{
		margin-left: 20px !important;
		color: black;
	}
	a.action:hover{
		color: blue;
	}
	</style>
</head>
<body>
	<div id="container">
		<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown link
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				</ul>
			</div>
		</nav> -->
		<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
			<div class="container">
				<?php echo $this->HTML->link('Message Board', array('controller'=>'users', 'action'=>'index'), array('class' => 'index')); ?>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<!-- $logged_in and $current_user this is from AppController-->
						<?php if ($logged_in): ?>
							<!-- <li class="nav-item">
								<a class="" style="color: white" href="<?php echo $this->webroot;?>users/logout">Logout</a>|
							</li> -->
							<li class="nav-item">
								Welcome <?php echo $current_user['email']; ?> | <?php echo $this->HTML->link('Logout', array('controller'=>'users', 'action'=>'logout'), array('class' => 'logout')); ?>
							</li>
						<?php else: ?>
							<li class="nav-item">
								<?php echo $this->HTML->link('Login', array('controller'=>'users', 'action'=>'login'), array('class' => 'login')); ?> | <?php echo $this->HTML->link('Register', array('controller'=>'users', 'action'=>'add'), array('class' => 'add')); ?>
							</li> 
							
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid">
			<div id="content"    style="background-color: #343a40; !important" >
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->Session->Flash('authError'); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<!-- <?php echo $this->element('sql_dump'); ?> -->
	</div>
</body>
</html>

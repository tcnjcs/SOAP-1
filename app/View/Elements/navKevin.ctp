<?php $userId = $this->Session->read('Auth.User.username'); ?> <!-- get logged in user -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="/cakephp/index.php/">SOAP</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li class="dropdown" id="menu1">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
					      Data
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/cakephp/index.php/posts">Posts</a></li>
					      <li><a href="/cakephp/index.php/brownfields">Brownfields</a></li>
					      <li><a href="/cakephp/index.php/chemicals">Chemicals</a></li>
					      <li><a href="/cakephp/index.php/politicians">Politicians</a></li>
					      <!-- <li><a href="/cakephp/index.php/users">Users</a></li> -->
					      <li class="divider"></li>
					      <li><a href="query">Build Query</a></li>
					    </ul>
				  	</li>
				  	<?php echo $this->element('signinModal'); ?>
					<li class="dropdown" id="menu2">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
					      Visualize
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/cakephp/index.php/map">Map</a></li>
					      <li><a href="/cakephp/index.php/graph">Graph</a></li>
					    </ul>
				  	</li>
				  	<li class="dropdown" id="menu3">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3">
					      Help
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/cakephp/index.php/docs">Documentation</a></li>
					      <li><a href="http://dbzgokuanimationvideos.webs.com/Anime-For-Dummies-Anime-For-Dummies--Dragon-Ball-Z-e8949909%20(1).jpg">FAQ</a></li>
					    </ul>
				  	</li>
				</ul>
			</div>
			<ul class="nav pull-right">
			    <form class="navbar-search">
				    <input id="search" type="text" class="search-query span2" placeholder='Search'>
				</form>
				<li class='divider-vertical'></li>
				<li class="dropdown" id="menu4">
	          	<?php if($userId != null) echo '
	    			<a href="#menu4"
	          		class="dropdown-toggle"
	          		data-toggle="dropdown">
	         		Hello '.$userId.'!
	         		<b class="caret"></b></a>';
	         	?>
	         	<?php if($userId == null) echo '<a data-toggle="modal" href="#myModal">Sign In</a>'?>
	         		<ul class="dropdown-menu">
	          		<!-- <?php if($userId == null) echo '<li><a data-toggle="modal" href="/cakephp/app/View/Elements/signinModal">Sign-in</a>'?> -->
	          	
				<!--      	<?php if($userId == null) echo $this->Html->link('Login', array('controller' => 'Users', 'action'=>'login')); ?></li>
				      <li>
				      	<?php if($userId != null) echo $this->Html->link('Dashboard', array('controller' => 'Users', 'action'=>'dashboard')); ?>
					  	<?php if($userId != null) echo $this->Html->link('Logout', array('controller' => 'Users', 'action'=>'logout')); ?>
					  </li> -->
					  
				<!--	<?php if($userId == null) echo '
				      	<li><a href='.$this->element('signinModal').'</a></li>'; ?> -->
				      	

<!--				    <?php if($userId == null) echo '
				      	<li><a href="/cakephp/index.php/users/add">Create an Account</a></li> '  ?> -->
					
					<?php if($userId != null) echo '
				      	<li><a href="/cakephp/index.php/users/dashboard">Dashboard</a></li> '  ?>
					<?php if($userId != null) echo '
				      	<li><a href="/cakephp/index.php/users/logout">Log Out</a></li> '  ?>
				      	
					</ul>
				</li>
		    </ul>
		</div>
	</div>
</div>

<?php $userId = $this->Session->read('Auth.User.username'); ?> <!-- get logged in user -->
<?php $facebook_id = $this->Session->read('Auth.User.facebook_id'); ?> 
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
           		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">	
				<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          		</a>	
			<?php echo $this->Html->link('SOAP',array('controller' => 'pages', 'action' => 'main', 'full_base' => true),array('class' => 'brand')); ?> 
			<div class="nav-collapse">
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li class="dropdown" id="menu1">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
					      Data
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      	<li><?php echo $this->Html->link('Posts',array('controller' => 'posts', 'action' => 'index', 'full_base' => true)); ?> </li>
					      	<li><?php echo $this->Html->link('Chemicals',array('controller' => 'chemicals', 'action' => 'index', 'full_base' => true)); ?> </li>
						<li><?php echo $this->Html->link('Facilities',array('controller' => 'facilities', 'action' => 'index', 'full_base' => true)); ?> </li>
						<li><?php echo $this->Html->link('Politics',array('controller' => 'politicians', 'action' => 'index', 'full_base' => true)); ?> </li>
						<li class="divider"></li>
						<li><?php echo $this->Html->link('Query',array('controller' => 'pages', 'action' => 'query', 'full_base' => true)); ?> </li>
						<li><?php echo $this->Html->link('Uploads',array('controller' => 'uploads', 'action' => 'index', 'full_base' => true)); ?> </li>


					    </ul>
				  	</li>
					<li class="dropdown" id="menu2">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
					      Visualize
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
						<li><?php echo $this->Html->link('Map',array('controller' => 'pages', 'action' => 'map', 'full_base' => true)); ?> </li>
						<li><?php echo $this->Html->link('Graph',array('controller' => 'pages', 'action' => 'graph', 'full_base' => true)); ?> </li>



					    </ul>
				  	</li>
				  	<li class="dropdown" id="menu3">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3">
					      Help
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					    
						<li><?php echo $this->Html->link('Documentation',array('controller' => 'pages', 'action' => 'docs', 'full_base' => true)); ?> </li>

					  </ul>
				  	</li>
				</ul>
			<ul class="nav pull-right">
				<li class='divider-vertical'></li>
	          		<?php 
	          		if ($userId === null && $facebook_id === null)
	          		/*	echo '
						
						<li class="signinModal">
						<a data-toggle="modal" 
						href="#myModal">Log In</a>
						</li>';
				*/
					echo '
						
						<li class="signinModal">
					'. $this->Html->link('Log In',array('controller' => 'users', 'action' => 'login', 'full_base' => true)) .'
						</li>';

				else
					{
						echo '
						<li class="dropdown" id="menu4">
                            <a href="#menu4" class="dropdown-toggle" data-toggle="dropdown">Hello, '.$userId.'!<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>'. $this->Html->link('Dashboard',array('controller' => 'users', 'action' => 'dashboard', 'full_base' => true)).' </li>';
                                if ($facebook_id === null) echo '
                                    <li>'. $this->Html->link('Log Out',array('controller' => 'users', 'action' => 'logout', 'full_base' => true)).' </li>';
                                else
                                    echo '<li>'. $this->Html->link('Log Out',array('controller' => 'users', 'action' => 'logout', 'full_base' => true)).' </li>';
							echo '
                            </ul>
                        </li>';
					}
	         		?>
		   		 </ul>
			</div>
		</div>
	</div>
</div>

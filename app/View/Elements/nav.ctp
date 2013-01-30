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
			<a class="brand" href="/" >SOAP</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li class="dropdown" id="menu1">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
					      Data
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/posts">Posts</a></li>
					      <li><a href="/brownfields">Brownfields</a></li>
					      <li><a href="/chemicals">Chemicals</a></li>
					      <li><a href="/facilities">Facilities</a></li>
					      <li><a href="/politicians">Politicians</a></li>
					      <li class="divider"></li>
					      <li><a href="/query">Build Query</a></li>
					      <li><a href="/uploads">Upload</a></li>
					    </ul>
				  	</li>
					<li class="dropdown" id="menu2">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
					      Visualize
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/map">Map</a></li>
					      <li><a href="/graph">Graph</a></li>
					    </ul>
				  	</li>
				  	<li class="dropdown" id="menu3">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3">
					      Help
					      <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a href="/docs">Documentation</a></li>
					      <li><a href="http://dbzgokuanimationvideos.webs.com/Anime-For-Dummies-Anime-For-Dummies--Dragon-Ball-Z-e8949909%20(1).jpg">FAQ</a></li>
					    </ul>
				  	</li>
				</ul>
			<ul class="nav pull-right">
				<li class='divider-vertical'></li>
	          		<?php 
	          		if ($userId === null)
	          		/*	echo '
						
						<li class="signinModal">
						<a data-toggle="modal" 
						href="#myModal">Log In</a>
						</li>';
				*/
					echo '
						
						<li class="signinModal">
						<a href="/users/login">Log In</a>
						</li>';

				else
					{
						echo '
						<li class="dropdown" id="menu4">
						<a href="#menu4"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Hello '.$userId.'!
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/users/dashboard">Dashboard</a></li>';
						if ($facebook_id === null)
							echo '<li><a href="/users/logout" >Log Out</a></li>
							</ul>
							</li>';
						else
							echo '<li><a onclick="logout(\'/users/logout\');" >Log Out</a></li>
							</ul>
							</li>';
					}
	         		?>
		   		 </ul>
			</div>
		</div>
	</div>
</div>

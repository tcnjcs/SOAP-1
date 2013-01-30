<div id="invalidCredentials" class="modal hide" >
	<div class="modal-header" style="text-align: center;">
		<a class="close" data-dismiss="modal">×</a>
		<h2 style="color:#f5f3dc;">Log In</h2>
	</div>
	<div class="modal-body">
		<div class="alert alert-error alert-block" style="text-align:center;" >
			<a class="close" data-dismiss="alert">×</a>
			<!-- <?php echo $message; ?> -->
		</div>
		<?php 
			echo $this->Form->create('User', array('id' => 'usersform', 'type' => 'post',
				'url' => array('controller' => 'users', 'action' => 'login'))); 
		?>
		<div class="usersform row-fluid">
			<div class="span6">
				<div class="input text required">
					<label style="color:#013435;" for="UserUsername">Username</label>
					<input name="data[User][username]" maxlength="50" type="text" id="UserUsername"/>
				</div>
				<div class="input password required">
					<label style="color:#013435;" for="UserPassword">Password</label>
					<input name="data[User][password]" type="password" id="UserPassword"/>
				</div>
				<?php 
					echo $this->Form->button('Log In', array('type' => 'submit', 'class' => 'btn btn-primary'));
					//echo $this->Form->end();
				?>
				<button type="button" class="btn" onClick="location.href='/cakephp/index.php/users/add'">Register</button>
			</div>
			<div class="span4" style="padding:65px 0 0 0;">
				<?php
					$options= array( 
						'label' => '',
						'custom' => false,
						'redirect' => '/',
						'img' => 'facebook.png',
						'alt' => '',
						'id' => '',
						'show-faces' => true,	// fb button only
						'width' => 200,			// fb button only
						'max-rows' => 1			// fb button only
					); 
					echo $this->Facebook->login($options); //DON'T FORGET '$this'
				?>
			</div>
		</div>
	    </form>
	</div>

	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
<script type="text/javascript">
	$('#invalidCredentials').modal('toggle'); //or 'show'
	$('.alert').alert();
</script>

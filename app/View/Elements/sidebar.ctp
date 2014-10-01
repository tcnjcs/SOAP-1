<div class="well sidebar-nav">
	<ul class="nav nav-list" style="height: 100%">
		<li class="nav-header">Sites</li>
		<li>
		<li>		
			<?php echo $this->Html->link('Chemicals',array('controller' => 'chemicals', 'action' => 'index', 'full_base' => true)); ?> 	
		
		</li>
		<li>
			<?php echo $this->Html->link('Facilities',array('controller' => 'facilities', 'action' => 'index', 'full_base' => true)); ?> 	

		</li>
		<li>
		<li>
		<li class="nav-header">Politics</li>
		<!-- <li class="active"> -->
		<li>
			<?php echo $this->Html->link('Senators',array('controller' => 'senators', 'action' => 'index', 'full_base' => true)); ?> 	

		</li>
		<li>
			<?php echo $this->Html->link('Representatives',array('controller' => 'representatives', 'action' => 'index', 'full_base' => true)); ?> 	

		</li>
		<li>
			<?php echo $this->Html->link('Lobbyists',array('controller' => 'lobbyists', 'action' => 'index', 'full_base' => true)); ?> 	

		</li>
	</ul>
</div>

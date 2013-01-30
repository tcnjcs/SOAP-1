<div class="span2">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="span10">
	<div class="row-fluid">
		<div class="span3">Cleanup Name</div>
           	<div class="span3">Address</div>
            	<div class="span2">Municipality</div>
            	<div class="span2">County</div>
	</div>
	
	<!-- Here's where we loop through our $brownfields array -->
	<?php foreach ($brownfields as $brownfield): ?>
		<div class="row-fluid fluidTable">
			<div class="span3">
				<?php echo $this->Html->link($brownfield['Brownfield']['pi_name'], array('action' => 'view', $brownfield['Brownfield']['site_id'], $brownfield['Brownfield']['pi_name']));?>
			</div>
			<div class="span3">
				<?php echo $brownfield['Brownfield']['address']; ?>
			</div>
			<div class="span2">
				<?php echo $brownfield['Brownfield']['municipality']; ?>
			</div>
			<div class="span2">
				<?php echo $brownfield['Brownfield']['county']; ?>
			</div>
		</div>
        	<?php endforeach; ?>
    <div class="row-fluid">
	    <div class="span2" style="margin-top:12px; text-align:center;" >
		<?php echo $this->Paginator->counter("Page {:page} of {:pages}"); ?>		
	    </div>
	    
	    <div class="span7 pagination pagination-centered" >		
		<ul>
			<?php 
				echo $this->Paginator->prev('←', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li'));
				echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => ' ', 'currentClass' => 'active'));
				echo $this->Paginator->next('→', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li')); 
			?>	
		</ul>
	    </div>
	    <div class="span3" style="margin-top:12px" >
		<?php 
			echo 'Items per Page: ';
			echo $this->Html->link('25', array('controller' => 'brownfields', 'action' => 'index', 25)); echo ' | ';
			echo $this->Html->link('50', array('controller' => 'brownfields', 'action' => 'index', 50)); echo ' | ';
			echo $this->Html->link('75', array('controller' => 'brownfields', 'action' => 'index', 75)); echo ' | ';
			echo $this->Html->link('100', array('controller' => 'brownfields', 'action' => 'index', 100));
			//Can't go over 100 due to maxLimit (see cakePHP 2.0 book)
		 ?>
	    </div>
    </div> <!-- row-fluid -->
</div>

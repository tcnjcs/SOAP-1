<div class="span2">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="span10">
    <table class="table table-striped" style="border-top: 0px;">
	<thead>
		<tr>
            		<th class="span3" style="width:auto;">Cleanup Name</th>
           		<th class="span3" style="width:auto;">Address</th>
            		<th class="span3" style="width:auto;">Municipality</th>
            		<th class="span3" style="width:auto;">County</th>
    <!--        <th><?php echo $this->Paginator->sort('Cleanup Name', 'pi_name'); ?></th>
            <th><?php echo $this->Paginator->sort('Address', 'address'); ?></th>
			<th><?php echo $this->Paginator->sort('Municipality', 'municipality'); ?></th>
            <th><?php echo $this->Paginator->sort('County', 'county'); ?></th> -->

        	</tr>
	</thead>
	<tbody>
		<!-- Here's where we loop through our $brownfields array -->
		<?php foreach ($brownfields as $brownfield): ?>
			<tr>
				<td class="span3" style="width:auto;">
					<?php echo $this->Html->link($brownfield['Brownfield']['pi_name'], array('action' => 'view', $brownfield['Brownfield']['site_id'], $brownfield['Brownfield']['pi_name']));?>
					<!-- <?php echo $brownfield['Brownfield']['pi_name']; ?> -->
				</td>
				<td class="span3" style="width:auto;">
					<?php echo $brownfield['Brownfield']['address']; ?>
				</td>
				<td class="span3" style="width:auto;">
					<?php echo $brownfield['Brownfield']['municipality']; ?>
				</td>
				<td class="span3" style="width:auto;">
					<?php echo $brownfield['Brownfield']['county']; ?>
				</td>
			</tr>
        	<?php endforeach; ?>
	</tbody>
    </table>
    <div class="row-fluid">
	    <div class="span2" style="margin-top:12px; text-align:center;" >
		<?php echo $this->Paginator->counter("Page {:page} of {:pages}"); ?>		
	    </div>
	    
	    <div class="span7 pagination pagination-centered" >		
		<ul>
			<?php 
				echo $this->Paginator->prev('←', array('tag' => 'li'), null, array('class' => 'active', 'tag' => 'li'));
				echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => ' ', 'currentClass' => 'active', 'modulus' => '5'));
				echo $this->Paginator->next('→', array('tag' => 'li'), null, array('class' => 'active', 'tag' => 'li')); 
			?>	
		</ul>
	    </div>
	    <div class="span3" style="margin-top:12px; text-align:center;" >
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

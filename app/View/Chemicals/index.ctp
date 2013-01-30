<div class="span2">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="span10">
    <table class="table table-striped" style="border-top: 0px;">
        <thead>
		<tr>
		    <th class="span3" style="width:auto;">Chemical Name</th>
		    <th class="span3" style="width:auto;">CAS No.</th>
		    <th class="span3" style="width:auto;">Clear Air Act?</th>
		    <th class="span3" style="width:auto;">Metal?</th>
		    <th class="span3" style="width:auto;">Carcinogen?</th>
		    <th class="span3" style="width:auto;">PBT?</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($chemicals as $chemical): ?>
		<tr>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['chemical_name']; ?>
		    </td>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['cas_no']; ?>
		    </td>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['clear_air_act_chemical']; ?>
		    </td>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['metal']; ?>
		    </td>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['carcinogen']; ?>
		    </td>
		    <td class="span3" style="width:auto;">
			<?php echo $chemical['Chemical']['pbt']; ?>
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
			echo $this->Html->link('25', array('controller' => 'chemicals', 'action' => 'index', 25)); echo ' | ';
			echo $this->Html->link('50', array('controller' => 'chemicals', 'action' => 'index', 50)); echo ' | ';
			echo $this->Html->link('75', array('controller' => 'chemicals', 'action' => 'index', 75)); echo ' | ';
			echo $this->Html->link('100', array('controller' => 'chemicals', 'action' => 'index', 100));
			//Can't go over 100 due to maxLimit (see cakePHP 2.0 book)
		 ?>
	    </div>
    </div> <!-- row-fluid -->
  
</div>

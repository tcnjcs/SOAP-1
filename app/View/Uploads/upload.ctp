<div class="span2">
	<?php echo $this->element('sidebar'); ?>
</div>
<div class="span3">
	<?php
		echo $this->Form->create('Upload', array('type' => 'file'));
		echo $this->Form->input('Choose File', array('type' => 'file', 'label' => 'Choose CSV File'));
		echo "<br>";
		echo $this->Form->input('Data Type', array(
			'options' => array('Chemicals', 'Facilities', 'Politicians')
			)); 
		echo "<br>";	
		$options = array(
			//'div' => array(
			//	'class' => 'span3'
			//	),
			'label' => 'Submit',
			'class' => 'btn btn-primary',
			);
		echo $this->Form->end($options);
		//echo $this->Form->end(__('Submit'));
	?>
</div>
<div class="span3">
	<?php
		echo $this->Form->create('Upload');
		echo $this->Form->hidden('External Source', array('value' => '1'));
		$options = array(
			//'div' => array(
			//	'class' => 'span3'
			//	),
			'label' => 'Update Brownfields Using External Sources',
			'class' => 'btn btn-primary',
			);
		echo $this->Form->end($options);
		//echo $this->Form->end(__('Submit'));
	?>
</div>


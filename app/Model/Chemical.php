<?php
class Chemical extends AppModel { 
    public $validate = array(
        'cas_no' => array(
            'rule' => 'notEmpty'
        ),
        'carcinogen' => array(
            'rule' => 'notEmpty'
        ),
        'clear_air_act_chemical' => array(
            'rule' => 'notEmpty'
        ),
        'metal' => array(
            'rule' => 'notEmpty'
        ),
        'pbt' => array(
            'rule' => 'notEmpty'
        ),
        'chemical_name' => array(
            'rule' => 'notEmpty'
        )
    );
   
   function upload($filename) {
 	// to avoid having to tweak the contents of 
 	// $data you should use your db field name as the heading name 
	// eg: Post.id, Post.title, Post.description

	// open the file
 	$handle = fopen($filename, "r");	
 	// read the 1st row as headings
 	$header = fgetcsv($handle);
	// create a message container
	$return = array(
		'messages' => array(),
		'errors' => array(),
	);

	$i = 0;
 	// read each data row in the file
 	while (($row = fgetcsv($handle)) !== FALSE) {
 		$i++;
 		$data = array();
		
 		// for each header field 
 		foreach ($header as $k=>$head) {
 			// get the data field from Model.field
 			if (strpos($head,'.')!==false) {
				$h = explode('.',$head);
				$data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
			}
 			// get the data field from field
			else {
 				$data['Chemical'][$head]=(isset($row[$k])) ? $row[$k] : '';
			}
		}

		// see if we have an id 			
 		$id = isset($data['Chemical']['id']) ? $data['Chemical']['id'] : 0;

		// we have an id, so we update
		if ($id) {
 			// there is 2 options here, 
				 
			// option 1:
			// load the current row, and merge it with the new data
			//$this->recursive = -1;
 			//$post = $this->read(null,$id);
 			//$data['Post'] = array_merge($post['Post'],$data['Post']);
	 			
			// option 2:
 			// set the model id
 			$this->id = $id;
		}
			
		// or create a new record
		else {
 			$this->create();
		}
 			
		// see what we have
		//debug($data);
		//ob_flush();
			
		// validate the row
		$this->set($data);
		if (!$this->validates()) {
			//$this->_flash('warning');
			$return['errors'][] = __(sprintf('Post for Row %d failed to validate.',$i), true);
		}

		// save the row
		if (!$this->save($data)) {
			$return['errors'][] = __(sprintf('Post for Row %d failed to save.',$i), true);
		}

		// success message!
		else  {
			$return['messages'][] = __(sprintf('Post for Row %d was saved.',$i), true);
		} 
	}
 		
 	// close the file
 	fclose($handle);
 		
 	// return the messages
 	return $return;
 		
   }

}
?>

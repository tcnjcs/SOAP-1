<?php
class Politician extends AppModel { 
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'role' => array(
            'rule' => 'notEmpty'
        ),
        'district' => array(
            'rule' => 'notEmpty'
        ),
        'phone' => array(
            'rule' => 'notEmpty'
        ),
        'address' => array(
            'rule' => 'notEmpty'
        ),
        'imageurl' => array(
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
 				$data['Politican'][$head]=(isset($row[$k])) ? $row[$k] : '';
			}
		}

		// see if we have an id 			
 		$id = isset($data['Politican']['id']) ? $data['Politician']['id'] : 0;

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

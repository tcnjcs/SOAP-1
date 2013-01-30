<?php
App::uses('FB', 'Facebook.Lib');

class PoliticiansController extends AppController {
	var $paginate = array(
		'limit' => '150',
        	'order' => array(
            		'Politician.name' => 'asc'
        	)	
    	);

    public function index() {
	$data = $this->paginate('Politician');
        $this->set('politicians', $data);
    }
}
?>

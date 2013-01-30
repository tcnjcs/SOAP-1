<?php
class BrownfieldsController extends AppController {
	
	protected $limit;
	
    var $paginate = array(
        'limit' => 25,	//initial value
        'order' => array(
            'Brownfield.pi_name' => 'asc'
        )
    );


//    public function index() {
//         $this->set('brownfields', $this->Brownfield->find('all'));
//    }
    
//     public function index() {
//     // similar to findAll(), but fetches paged results
//     	$data = $this->paginate('Brownfield');
//     	$this->set('brownfields', $data);
// 	}
	
	public function index($inputLimit = 25) {	//Number in parameter determines number of results displayed
    // similar to findAll(), but fetches paged results
    	if ($inputLimit >= 25 && $inputLimit <= 200)	//Limit is stuck at 100 for some reason... perhaps PostgreSQL?
    	{
    		$this->limit = $inputLimit;
    		$this->paginate['limit'] = $this->limit;
    	}
    	$data = $this->paginate('Brownfield');
    	$this->set('brownfields', $data);
	}

    public function view($site_id = null, $pi_name = null) {	//Need to work on viewing individual brownfields...
//         $this->Brownfield->site_id = $site_id;
//         $this->set('brownfield', $this->Brownfield->read());
		$brownfieldResult = $this->Brownfield->find('first', array('conditions' => array(
			'Brownfield.site_id' => $site_id,
			'Brownfield.pi_name' => $pi_name)));
    	
    	//if (!isempty($brownfieldResult))
    		$this->set('brownfield', $brownfieldResult);
    }
}
?>
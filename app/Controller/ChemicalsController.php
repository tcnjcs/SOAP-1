<?php
class ChemicalsController extends AppController {
	
	protected $limit;
	
	var $paginate = array(
        'limit' => 25,
        'order' => array(
            'Chemical.chemical_name' => 'asc'
        )
    );
    
//    public function index() {
//         $this->set('chemicals', $this->Chemical->find('all'));
//    }

// 	public function index() {
//     // similar to findAll(), but fetches paged results
//     	$data = $this->paginate('Chemical');
//     	$this->set('chemicals', $data);
// 	}
	
	public function index($inputLimit = 25) {
    // similar to findAll(), but fetches paged results
    	if ($inputLimit >= 25 && $inputLimit <= 200)	//Limit is stuck at 100 for some reason... perhaps PostgreSQL?
    	{
    		$this->limit = $inputLimit;
    		$this->paginate['limit'] = $this->limit;
    	}
    	$data = $this->paginate('Chemical');
    	$this->set('chemicals', $data);
	}
    
    public function view($id = null) {
        //$this->Chemical->id = $id;
        $this->set('chemical', $this->Chemical->read());
    }
}
?>
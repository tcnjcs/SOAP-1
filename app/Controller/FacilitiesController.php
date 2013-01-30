<?php
class FacilitiesController extends AppController {
	
	protected $limit;
	
	public $helpers = array('GoogleMapV3');

	
    var $paginate = array(
        'limit' => 25,	//initial value
        'order' => array(
            'Facility.facility_name' => 'asc'
        )
    );

	public function index($inputLimit = 25) {	//Number in parameter determines number of results displayed
    // similar to findAll(), but fetches paged results
    	if ($inputLimit >= 25 && $inputLimit <= 200)	//Limit is stuck at 100 for some reason... perhaps PostgreSQL?
    	{
    		$this->limit = $inputLimit;
    		$this->paginate['limit'] = $this->limit;
    	}
    	$data = $this->paginate('Facility');
    	$this->set('facilities', $data);
	}

    public function view($tri_facility_id = null, $facility_name = null) {
		$facilityResult = $this->Facility->find('first', array('conditions' => array(
			'Facility.tri_facility_id' => $tri_facility_id,
			'Facility.facility_name' => $facility_name)));
			
    	$this->set('facility', $facilityResult);
    }
}
?>
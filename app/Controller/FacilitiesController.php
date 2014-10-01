<?php
class FacilitiesController extends AppController {
		
	public $helpers = array('GoogleMapV3', 'Js');
    
    public $components = array('RequestHandler');

	public function index() {
	}
    
    public function view($facility_id) {
        $facility_sql = 'SELECT facility_name, owner_name, dangerous_state, is_brownfield, location_id, county, municipality, latitude, longitude, x_coor, y_coor
                        FROM "newsoap"."facilities"
                        JOIN "newsoap"."locations" ON "newsoap"."facilities".location_id = "newsoap"."locations".id
                        JOIN ("newsoap"."owned_by" JOIN "newsoap"."owners" ON "newsoap"."owned_by".owner_id = "newsoap"."owners".id) as owned ON "newsoap"."facilities".id = owned.facility_id
                        JOIN "newsoap"."nn_data" ON "newsoap"."facilities".id = "newsoap"."nn_data".facility_id
                        WHERE "newsoap"."facilities".id = \'' . $facility_id . '\';';
        $facility_info = $this->Facility->query($facility_sql);
        $this->set('facility_info', $facility_info);
        $chem_sql = 'SELECT chemical_id, chemical_name, total_amount, fugair_amount, water_amount, stackair_amount
                    FROM "newsoap"."facilities"
                    JOIN ("newsoap"."contains" JOIN "newsoap"."chemicals" ON "newsoap"."contains".chemical_id = "newsoap"."chemicals".id) as chem ON "newsoap"."facilities".id = chem.facility_id
                    WHERE chem.facility_id = \'' . $facility_id . '\' ORDER BY chemical_name;';
		$chem_info = $this->Facility->query($chem_sql);
        $this->set('chem_info', $chem_info);
    }
    
    public function loadTable(){
        $this->autoRender = false;
        $data = $this->request->data;
        $limit = $data['limit'];
        $order = $data['order'];
        $offset = $data['offset'];
        $filters = $data['filters'];
        $fields = array();
        $fields[0] = "facility_name";
        $fields[1] = "location_id";
        $fields[2] = "county";
        $fields[3] = "owner_name";
        $fields[4] = "dangerous_state";
        $fields[5] = "is_brownfield";
        $sql = 'SELECT facilities.id, facility_name, location_id, county, owner_name, dangerous_state, is_brownfield 
                FROM "newsoap"."facilities"
                JOIN "newsoap"."locations" ON "newsoap"."facilities".location_id = "newsoap"."locations".id
                JOIN ("newsoap"."owned_by" JOIN "newsoap"."owners" ON "newsoap"."owned_by".owner_id = "newsoap"."owners".id) as owned ON "newsoap"."facilities".id = owned.facility_id
                JOIN "newsoap"."nn_data" ON "newsoap"."facilities".id = "newsoap"."nn_data".facility_id
                WHERE ';
        for($i = 0; $i < 6; $i++){
            $sql .= '(';
            for($j = 0; $j < count($filters[$i]); $j++){
                $sql .= '"' . $fields[$i] . '" ILIKE \'%' . $filters[$i][$j] . '%\'';
                if($j+1 < count($filters[$i])){
                    $sql .= ' AND ';
                }
                else{
                    $sql .= ')';
                }
            }
            if($i < count($filters)-1){
                $sql.= ' AND ';
            }
        }
        $sql .= ' ORDER BY ' . $order;
        $count = count($this->Facility->query($sql));
        $sql .=' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        if($this->RequestHandler->isAjax()){
            $result = array($count, $this->Facility->query($sql));
            return new CakeResponse(array('body' => json_encode($result)));
        }
    }
}
?>
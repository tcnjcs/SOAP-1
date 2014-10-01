<?php
class ChemicalsController extends AppController {
	
    public $helpers = array('GoogleMapV3', 'Js');
    
    public $components = array('RequestHandler');
    
    public function index() {
    }
    
    public function view($chem_id) {
        $chem_sql = 'SELECT chemical_name, carcinogenic, clean_air_act, metal, pbt
                    FROM "newsoap"."chemicals"
                    WHERE "newsoap"."chemicals".id = \'' . $chem_id . '\';';
        $chem_info = $this->Chemical->query($chem_sql);
        $this->set('chem_info', $chem_info);
        $facility_sql = 'SELECT facility_id, facility_name
                        FROM "newsoap"."chemicals"
                        JOIN ("newsoap"."contains" JOIN "newsoap"."facilities" ON "newsoap"."contains".facility_id = "newsoap"."facilities".id) as facility ON "newsoap"."chemicals".id = facility.chemical_id
                        WHERE facility.chemical_id = \'' . $chem_id . '\' ORDER BY facility_name;';
		$facility_info = $this->Chemical->query($facility_sql);
        $this->set('facility_info', $facility_info);
    }
    
    public function loadTable(){
        $this->autoRender = false;
        $data = $this->request->data;
        $limit = $data['limit'];
        $order = $data['order'];
        $offset = $data['offset'];
        $filters = $data['filters'];
        $fields = array();
        $fields[0] = "chemical_name";
        $fields[1] = "carcinogenic";
        $fields[2] = "clean_air_act";
        $fields[3] = "metal";
        $fields[4] = "pbt";
        $sql = 'SELECT chemicals.id, chemical_name, carcinogenic, clean_air_act, metal, pbt 
                FROM "newsoap"."chemicals"
                WHERE ';
        for($i = 0; $i < 5; $i++){
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
        $count = count($this->Chemical->query($sql));
        $sql .=' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        if($this->RequestHandler->isAjax()){
            $result = array($count, $this->Chemical->query($sql));
            return new CakeResponse(array('body' => json_encode($result)));
        }
    }
}
?>

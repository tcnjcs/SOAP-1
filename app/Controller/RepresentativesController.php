<?php

App::uses('FB', 'Facebook.Lib');

class RepresentativesController extends AppController {

    public $helpers = array('GoogleMapV3', 'Js');
    
    public $components = array('RequestHandler');

    public function index() {
    }
    
    public function loadTable(){
        $this->autoRender = false;
        $data = $this->request->data;
        $limit = $data['limit'];
        $order = $data['order'];
        $offset = $data['offset'];
        $filters = $data['filters'];
        $fields = array();
        $fields[0] = "name";
        $fields[1] = "party";
        $fields[2] = "date_elected";
        $fields[3] = "district_no";
        $sql = 'SELECT image_link, name, party, date_elected, district_no 
                FROM "newsoap"."politicians"
                WHERE chamber=\'lower\' AND ';
        for($i = 0; $i < 4; $i++){
            $sql .= '(';
            for($j = 0; $j < count($filters[$i]); $j++){
                $sql .= 'CAST("' . $fields[$i] . '" AS TEXT) ILIKE \'%' . $filters[$i][$j] . '%\'';
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
        $count = count($this->Representative->query($sql));
        $sql .=' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        $this->Representative->query($sql);
        if($this->RequestHandler->isAjax()){
            $result = array($count, $this->Representative->query($sql));
            return new CakeResponse(array('body' => json_encode($result)));
        }
    }
}
?>
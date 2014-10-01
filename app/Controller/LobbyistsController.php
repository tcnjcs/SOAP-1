<?php

App::uses('FB', 'Facebook.Lib');

class LobbyistsController extends AppController {

    public $helpers = array('GoogleMapV3', 'Js');
    
    public $components = array('RequestHandler');
    
    public function index() {
    }

}
?>
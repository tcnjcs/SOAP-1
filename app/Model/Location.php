<?php
    class Location extends AppModel {
        public $name = 'Location';
        public $hasOne = array(
            'Facility' => array(
                'className' => 'Facility',
            )
        );   
    }
?>
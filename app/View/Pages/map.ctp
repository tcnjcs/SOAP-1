<div class="span3">
    <?php echo $this->element('sidebar'); ?>
</div>
<div class="span9">
<ul class="nav nav-pills">
  <li class="active">
    <a href="#">Map</a>
  </li>
  <li><a href="#">Table</a></li>
  <li><a href="#">Grid</a></li>
</ul>
<?php
	$mapOptions= array( 
			'width'=>'800px',                //Width of the map 
			'height'=>'400px',                //Height of the map 
			'zoom'=>15,                        //Zoom 
			'type'=>'ROADMAP',                 //Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN) 
			'latitude'=>40.2679,    //Default latitude if the browser doesn't support localization or you don't want localization
			'longitude'=>-74.7790,    //Default longitude if the browser doesn't support localization or you don't want localization
			'localize'=>true,                //Boolean to localize your position or not 
			'marker'=>true,                    //Boolean to put a marker in the position or not 
			'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',    //Default icon of the marker 
			'infoWindow'=>true,                //Boolean to show an information window when you click the marker or not
			'windowText'=>'My Current Position'        //Default text inside the information window 
		); 
	echo $this->GoogleMapV3->map($mapOptions); //DON'T FORGET '$this'
?>
</div>
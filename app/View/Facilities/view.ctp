<!-- File: /app/View/Facilities/view.ctp -->
<div class=span2>
	<?php echo $this->element('sidebar'); ?>
</div>
<div class="span9">
    <style>
        .details{
            margin-bottom:25px;
        }
        hr{
            border-color:#013435;
            margin:5px;
        }
        h1{
            font-size:25px;
        }
        h2{
            font-size:20px;
        }
        h3{
            font-size:15px;
        }
        h4{
            font-size:12px;
        }
        a.pageLink{
            color:#037162;
        }
    </style>
    <h1 style="text-align:center;"><?php echo $facility_info[0][0]['facility_name']; ?></h1>
    <div class="details">
        <h1>Facility Details:</h1>
        <hr />
        <h3>Parent Company: <?php echo $facility_info[0][0]['owner_name']; ?></h3>
        <h3>Danger Level: <?php echo $facility_info[0][0]['dangerous_state']; ?> (out of 5)</h3>
        <h3>Brownfield: <?php echo $facility_info[0][0]['is_brownfield']; ?></h3>
    </div>
    <div class="details">
        <h1>Location details:</h1>
        <hr />
        <h3>Street Address: <?php echo $facility_info[0][0]['location_id']; ?></h3>
        <h3>County: <?php echo $facility_info[0][0]['county']; ?></h3>
        <h3>Municipality: <?php if($facility_info[0][0]['municipality'] == null) echo "N/A"; else echo $facility_info[0][0]['municipality']; ?></h3>
        <h3>
        <?php 
            if ($facility_info[0][0]['latitude'] == null || $facility_info[0][0]['longitude'] == null)
                echo 'Latitude: N/A, Longitude: N/A';
            else
                echo 'Latitude: ' . $facility_info[0][0]['latitude'] . ', ' . 'Longitude: ' . $facility_info[0][0]['longitude']; 
        ?>
        </h3>
        <h3>
        <?php 
            if ($facility_info[0][0]['x_coor'] == null || $facility_info[0][0]['y_coor'] == null)
                echo 'X Coordinate: N/A, Y Coordinate: N/A';
            else
                echo 'X Coordinate: ' . floatval($facility_info[0][0]['x_coor']) . ', ' . 'Y Coordinate: ' . -1*floatval($facility_info[0][0]['y_coor']); 
        ?>
        </h3>
    </div>
    <div class="details">
        <h1>Chemicals found on-site:</h1>
        <hr />
        <?php foreach ($chem_info as $chem): ?>
            <h3><a class="pageLink" href='/../SOAP/index.php/chemicals/view/<?php echo $chem[0]['chemical_id']; ?>'><?php echo $chem[0]['chemical_name']; ?></a></h3>
            <h4>Total Amount: <?php echo $chem[0]['total_amount']; ?></h4>
            <h4>Fugitive Air Amount: <?php echo $chem[0]['fugair_amount']; ?></h4>
            <h4>Water Amount: <?php echo $chem[0]['water_amount']; ?></h4>
            <h4>Stack Air Amount: <?php echo $chem[0]['stackair_amount']; ?></h4>
        <?php endforeach; ?>
    </div>
	<br>
	<br>
	<?php
        if($facility_info[0][0]['x_coor'] != null && $facility_info[0][0]['y_coor'] != null){
            $latitude = floatval($facility_info[0][0]['x_coor']);
            $longitude = -1*floatval($facility_info[0][0]['y_coor']);
            $mapOptions= array( 
                    'width'=>'100%',                //Width of the map 
                    'height'=>'350px',                //Height of the map 
                    'zoom'=>15,                        //Zoom 
                    'type'=>'ROADMAP',                 //Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN) 
                    'latitude'=>$latitude,    //Default latitude if the browser doesn't support localization or you don't want localization
                    'longitude'=>$longitude,    //Default longitude if the browser doesn't support localization or you don't want localization
                    'localize'=>false,                //Boolean to localize your position or not 
                    'marker'=>true,                    //Boolean to put a marker in the position or not 
                    'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',    //Default icon of the marker 
                    'infoWindow'=>true,                //Boolean to show an information window when you click the marker or not
                    'windowText'=>'My Position'        //Default text inside the information window 
                ); 
            echo $this->GoogleMapV3->map($mapOptions); //DON'T FORGET '$this'
            echo $this->GoogleMapV3->addMarker(array('infoWindow'=>false, 'latitude'=>$latitude, 'longitude'=>$longitude));
        }
    ?>
    <br>
    <br>
    <!--<?php echo $this->Facebook->share(); ?>
    <br>
    <br>
    <a href="https://twitter.com/share" class="twitter-share-button" data-text="TCNJ SOAP" data-via="TCNJSoap" data-size="large">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->
	<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script> -->
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fe8fc260b784686"></script>
<!-- AddThis Button END -->
	<br>
	<h4>Comments: </h4>
<!--	<div id="disqus_thread"></div>
	<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = 'tcnjsoap'; // required: replace example with your forum shortname
	
		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
-->
<style>
    .fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget iframe[style]{
        width:600px !important;
    }
</style>
<div class="facebook">
<?php echo $this->Facebook->comments(
		$options = array(
			'mobile' => 'false'
			)
		);  ?>
</div>
</div>

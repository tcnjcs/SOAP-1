<!-- File: /app/View/Facilities/view.ctp -->
<div class=span2>
	<?php echo $this->element('sidebar'); ?>
</div>
<div class=span7>
	<h1><?php echo ''.$facility['Facility']['facility_name'].''; ?></h1>
	<h2><?php echo 'TRI ID: '.$facility['Facility']['tri_facility_id'].''; ?></h2>
	<h2><?php echo 'Parent Company: '.$facility['Facility']['parent_company_name'].''; ?></h2>
	<h3><?php echo ''.$facility['Facility']['street_address'].' '.$facility['Facility']['zip'].''; ?></h3>
	<h3>Coordinates: <?php 
		if ($facility['Facility']['lat'] == null || $facility['Facility']['long'] == null)
			echo "N/A";
		else
			echo ''.$facility['Facility']['lat'].', '.$facility['Facility']['long'].''; 
		?></h3>
	<br>
	<br>
	<?php
		$mapOptions= array( 
                'width'=>'100%',                //Width of the map 
                'height'=>'350px',                //Height of the map 
                'zoom'=>15,                        //Zoom 
                'type'=>'ROADMAP',                 //Type of map (ROADMAP, SATELLITE, HYBRID or TERRAIN) 
                'latitude'=>$facility['Facility']['lat'],    //Default latitude if the browser doesn't support localization or you don't want localization
                'longitude'=>$facility['Facility']['long'],    //Default longitude if the browser doesn't support localization or you don't want localization
                'localize'=>false,                //Boolean to localize your position or not 
                'marker'=>true,                    //Boolean to put a marker in the position or not 
                'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png',    //Default icon of the marker 
                'infoWindow'=>true,                //Boolean to show an information window when you click the marker or not
                'windowText'=>'My Position'        //Default text inside the information window 
            ); 
        echo $this->GoogleMapV3->map($mapOptions); //DON'T FORGET '$this'
        echo $this->GoogleMapV3->addMarker(array('infoWindow'=>false, 'latitude'=>$facility['Facility']['lat'],'longitude'=>$facility['Facility']['long']));
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
	<h5>Comments: </h5>
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
<div class="facebook" width="100%">
<?php echo $this->Facebook->comments(
		$options = array(
			//'width' => '300%',
			'mobile' => 'false'
			)
		);  ?>
</div>	
	
</div>

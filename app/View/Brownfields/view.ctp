<!-- File: /app/View/Brownfields/view.ctp -->
<div class=span2>
	<?php echo $this->element('sidebar'); ?>
</div>
<div class=span7>
	<h1><?php echo h($brownfield['Brownfield']['pi_name'])?></h1>
	<h2><?php echo h($brownfield['Brownfield']['address'])?></h2>
	<h3>Municipality: <?php echo h($brownfield['Brownfield']['municipality'])?></h3>
	<h3>County: <?php echo h($brownfield['Brownfield']['county'])?></h3>
	<h3>Coordinates: <?php 
		if ($brownfield['Brownfield']['pi_x_coord'] == null || $brownfield['Brownfield']['pi_y_coord'] == null)
			echo "N/A";
		else
			echo ''.$brownfield['Brownfield']['pi_x_coord'].', '.$brownfield['Brownfield']['pi_y_coord'].''; 
		?></h3>
	<br>
	<br>
	<!--<?php echo $this->Facebook->share(); ?>
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
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
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
<?php echo $this->Facebook->comments(); ?>

</div>

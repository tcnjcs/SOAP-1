<!-- File: /app/View/Chemicals/view.ctp -->
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
	<h1 style="text-align:center;"><?php echo $chem_info[0][0]['chemical_name']; ?></h1>
    <div class="details">
        <h1>Chemical Details:</h1>
        <hr />
        <h3>Carcinogenic: <?php echo $chem_info[0][0]['carcinogenic']; ?></h3>
        <h3>Clean Air Act: <?php echo $chem_info[0][0]['clean_air_act']; ?></h3>
        <h3>Metal: <?php echo $chem_info[0][0]['metal']; ?></h3>
        <h3>PBT: <?php echo $chem_info[0][0]['pbt']; ?></h3>
    </div>
    <div class="details">
        <h1>Facilities that contain this chemical:</h1>
        <hr />
        <?php foreach ($facility_info as $facility): ?>
            <h3><a class="pageLink" href='/../SOAP/index.php/facilities/view/<?php echo $facility[0]['facility_id']; ?>'><?php echo $facility[0]['facility_name']; ?></a></h3>
        <?php endforeach; ?>
    </div>
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
    <style>
        .fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget iframe[style]{
            width:600px !important;
        }
    </style>
    <div class="facebook" width="100%">
    <?php echo $this->Facebook->comments(
            $options = array(
                //'width' => '300%',
                'mobile' => 'false'
                )
            );  ?>
    </div>
</div>

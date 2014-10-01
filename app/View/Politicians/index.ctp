<!doctype html>
<html>
    <head>
        <?php $this->Html->script('jquery'); ?>
        <script type="text/javascript" src="/cabect/SOAP/app/webroot/js/userQuery.js"></script>
    </head>
    <body>
        <div class="span2">
            <?php echo $this->element('sidebar'); ?>
        </div>
        <div class="span10" style="text-align:center;">
            <style>
                .pol_link{
                   width:300px;
                   height:120px;
                   border: 3px ridge white;
                   margin:30px;
                }
            </style>
            <h2>Explore the NJ state legislature:</h2>
            <a href="/SOAP/index.php/senators"><img class="pol_link" src="<?php echo $this->webroot; ?>/img/senate_link.jpg"></a><br>
            <a href="/SOAP/index.php/representatives"><img class="pol_link" src="<?php echo $this->webroot; ?>/img/rep_link.jpg"></a>
        </div>
    </body>
</html>


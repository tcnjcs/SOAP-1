<!doctype html>
<html>
    <head>
        <?php $this->Html->script('jquery'); ?>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>/js/userQuery.js"></script>
    </head>
    <body>
        <div class="span2">
            <?php echo $this->element('sidebar'); ?>
        </div>
        <div class="span9">
            <div style="text-align:center;"><input style="width:70%; padding-left:18px; background: white no-repeat scroll left center url('<?php echo $this->webroot; ?>img/icon_search.png');" id="mainSearchBar" type="text" placeholder="Search by representative's name or click 'options' for more advanced searching."><a title="Options" id="select_cog" href="#"><img style="position:relative; z-index:100; margin-left:-60px; margin-top:-7px;" src="<?php echo $this->webroot; ?>img/icon_cog.png"></a></div>
            <div id="options" style="display:none; color:white; margin-bottom:20px;">
                <label class="filterLabel">Filters:</label><br>
                <label class="filterLabel">Name</label><input class="filter" type="input"><br>
                <label class="filterLabel">Party</label><input class="filter" type="input"><br>
                <label class="filterLabel">Year Elected</label><input class="filter" type="input"><br>
                <label class="filterLabel">District Number</label><input class="filter" type="input"><br>
            </div>
            <input id="currentOffset" type="hidden">
            <input id="currentCount" type="hidden">
            <input id="currentLimit" type="hidden" value=30>
            <style>
                .thumbnails > li{
                }
                .thumbnails .caption{
                    overflow:hidden;
                    text-overflow:ellipsis;
                    white-space:nowrap;
                }
                .thumbnails img{
                    height:220px;
                    width:151px;
                }
            </style>
            <ul id="politicianList" class="thumbnails">
            </ul>
            <div class="row-fluid">
                <div class="span2" style="margin-top:12px; text-align:center;">
                    Page <span id="currentPage">1</span> of <span id="pageCount"></span><br><span id="totalResults"></span>	
                </div>
                <div id="pageList" class="span7 pagination pagination-centered">
                </div>
                <div class="span3" style="margin-top:12px; text-align:center;">
                    Items per Page:
                    <a href="#" class="limit" style="text-decoration:underline">30</a>
                    <a href="#" class="limit">60</a>
                    <a href="#" class="limit">90</a>
                    <a href="#" class="limit">120</a>
                </div>
                <script>
                   bindEventsPoliticians("representatives", "district_no");
                </script>
            </div> <!-- row-fluid -->
            <!-- <?php echo $this->Facebook->comments(); ?> -->
        </div>
        <div class="span1">
            <div style="position:fixed;">
                <a href='http://www.njleg.state.nj.us/SelectMun.asp' target='_blank'><img id="email" style="width:120px; height:80px;" src='<?php echo $this->webroot; ?>/img/email.png'></a>
            </div>
            <script>
                $("#email").mouseover(function(){
                    $(this).attr("src", "<?php echo $this->webroot; ?>/img/email_open.png");
                });
                $("#email").mouseout(function(){
                    $(this).attr("src", "<?php echo $this->webroot; ?>/img/email.png");
                });
            </script>
        </div>
        <?php $this->Js->writeBuffer(); ?>
    </body>
</html>


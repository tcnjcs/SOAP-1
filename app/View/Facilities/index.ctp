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
        <div class="span10">
            <div style="text-align:center;"><input style="width:70%; padding-left:18px; background: white no-repeat scroll left center url('<?php echo $this->webroot; ?>img/icon_search.png');" id="mainSearchBar" type="text" placeholder="Search by facility name or click 'options' for more advanced searching."><a title="Options" id="select_cog" href="#"><img style="position:relative; z-index:100; margin-left:-60px; margin-top:-7px;" src="<?php echo $this->webroot; ?>img/icon_cog.png"></a></div>
            <div id="options" style="display:none; color:white; margin-bottom:20px;">
                <label class="filterLabel">Filters:</label><br>
                <label class="filterLabel">Facility Name</label><input class="filter" type="input"><br>
                <label class="filterLabel">Address</label><input class="filter" type="input"><br>
                <label class="filterLabel">County</label><input class="filter" type="input"><br>
                <label class="filterLabel">Parent Company</label><input class="filter" type="input"><br>
                <label class="filterLabel">Danger Level</label><input class="filter" type="input"><br>
                <label class="filterLabel">Brownfield</label><input class="filter" type="input"><br>
            </div>
            <table class="table table-striped" style="border-top: 0px;">
                <thead>
                    <tr>
                        <th class="span3" style="width:auto;">Facility Name</th>
                        <th class="span3" style="width:auto;">Address</th>
                        <th class="span3" style="width:auto;">County</th>
                        <th class="span3" style="width:auto;">Parent Company</th>
                        <th class="span3" style="width:auto;">Danger Level</th>
                        <th class="span3" style="width:auto;">Brownfield</th>
                    </tr>
                </thead>
                <input id="currentOffset" type="hidden">
                <input id="currentCount" type="hidden">
                <input id="currentLimit" type="hidden" value=25>
                <tbody id="dataTable"> 
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="span2" style="margin-top:12px; text-align:center;">
                    Page <span id="currentPage">1</span> of <span id="pageCount"></span><br><span id="totalResults"></span>	
                </div>
                <div id="pageList" class="span7 pagination pagination-centered">
                </div>
                <div class="span3" style="margin-top:12px; text-align:center;">
                    Items per Page:
                    <a href="#" class="limit" style="text-decoration:underline">25</a>
                    <a href="#" class="limit">50</a>
                    <a href="#" class="limit">75</a>
                    <a href="#" class="limit">100</a>
                </div>
                <script>
                   bindEvents("facilities", "facility_name");
                </script>
            </div> <!-- row-fluid -->
        </div>
        <?php $this->Js->writeBuffer(); ?>
    </body>
</html>

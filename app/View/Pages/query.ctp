<!doctype html>
<html>
    <head>
        <?php $this->Html->script('jquery'); ?>
        <style>
            #condition_list{
                width:70%;
                border:1px solid black;
                margin-bottom:10px;
            }
           #include_list{
                margin-left:5%;
                margin-right:5%;
                background-color:white;
                color:black;
                border:1px solid black;
                text-align:center;
            }
            .include_option{
                margin-right:20px !important;
            }
            #condition_box{
                background-image:url('/SOAP/app/webroot/img/condition.png');
                background-position:right;
                background-repeat:no-repeat;
                display:none;
                border:3px ridge black;
                position:fixed;
                text-align:center;
                left:30%;
                right:30%;
                z-index:101;
                background-color:white;
                padding:20px;
            }
            #attribute_name{
                margin:10px;
            }
            #operator{
                margin:10px;
            }
            #keyword{
                margin:10px;
                width:80%;
            }
            #submit_condition{
                margin:10px;
            }
        </style>
    </head>
    <body>
        <div class="span9" style="text-align:center;">
            <h2>Build a Query!</h2>
            <label style="color:#013435;" for="dataset">Select an area for which you would like to query.</label>
            <form id="dataset_form" name="dataset">
              <input class="dataset_button" type="radio" name="dataset" value="Sites/Chemicals">Sites/Chemicals</option>
              <input class="dataset_button" type="radio" name="dataset" value="Politics">Politics</option>
            </form>
            <span style="margin-top:10px; margin-bottom:10px; display:none;" id="conditions">
                <div style="margin-bottom:30px;">
                    <h3>Conditions:</h3>
                    <select size="5" name="condition" id="condition_list">
                    </select>
                    <br>
                    <button id="add_condition">Add a condition</button>
                    <button id="delete_condition">Delete condition</button>
                </div>
                <h3>Include:</h3>
                <div id="include_list">
                </div>
            </span>
            <span id="overlay" style="display:none; background-color: rgba(0, 0, 0, 0.3); position:fixed; top:0px; bottom:0px; left:0px; right:0px; z-index:100;"></span>
            <div id="condition_box" style="display:none; border:1px solid black; position:fixed; text-align:center; top:40%; left:30%; right:30%; z-index:101; background-color:white; padding:20px;">
                <label style="color:black; font-size:24px;">Condition:</label>
                <br>
                <select id="attribute_name">
                    <option value="default" selected="selected">Select an attribute</option>
                </select>
                <br>
                <select id="operator">
                    <option value="default" selected="selected">Select a comparison operator</option>
                    <option value="ILIKE">=</option>
                    <option value="ILIKE">contains</option>
                    <option value="<"><</option>
                    <option value=">">></option>
                    <option value="<="><=</option>
                    <option value=">=">>=</option>
                    <option value="NOT ILIKE">!=</option>
                </select>
                <br>
                <input id="keyword" type="text" placeholder="Enter the keyword(s) for your search">
                <br>
                <button id="submit_condition" disabled>Add</button>
            </div>
            <br>
            <button style="margin:20px; display:none;" id="query" disabled>Query</button>
        </div>
        <div class="span3" style="background-color:white; border:1px solid black; min-height:300px;">
            <div id="query_preview" style="text-align:center; color:gray;">
                Query so far...
                <br>
                <br>
                SELECT <span id="select"></span>
                <br>
                <br>
                FROM <span id="from"></span>
                <br>
                <br>
                WHERE <span id="where"></span>
            </div>
        </div>
        <script>
            $(".dataset_button").click(function(){
                $("#attribute_name").html("<option value='default' selected='selected'>Select an attribute</option>");
                $("#include_list").html("");
                $("#select").html("*");
                if($(this).val() == "Sites/Chemicals"){
                    $("#from").html("Facilities, Locations, Chemicals");
                }
                else{
                    $("#from").html("Politicians");
                }
                $("#where").html("");
                $.ajax({
                    type: "GET",
                    url: "/SOAP/scripts/getAttributes.php",
                    data: {
                        dataset : $(this).val()
                    },
                    success: function(attributes){
                        attributes = JSON.parse(attributes);
                        for(var i = 0; i < attributes.length; i++){
                            $("#attribute_name").append("<option value='" + attributes[i][1] + "'>" + attributes[i][0] + "</option>");
                            if(i != 0 && i%4 == 0){
                                $("#include_list").append("<br>");
                            }
                            $("#include_list").append(attributes[i][0] + " <input class='include_option' name='" + attributes[i][0] + "' type='checkbox' value='" + attributes[i][1] + "'>");
                        }
                    }
                });
                $("#conditions").show();
                $("#condition_list").html("");
                $("#query").attr("disabled", "disabled");
                $("#query").show();
            });
            $("#add_condition").click(function(){
                $("#overlay").show();
                $("#condition_box").show();
            });
            $("#delete_condition").click(function(){
                if($("#condition_list").val() != null){
                    if(confirm("Are you sure you want to delete this condition?")){
                        $("#condition_list").find(":selected").remove();
                        if($("#condition_list option").length == 0){
                            $("#query").attr("disabled", "disabled");
                        }
                        $("#where").html("");
                        $("#condition_list option").each(function(){
                            $("#where").append($(this).html() + ", ");
                        });
                    }
                }
                else{
                    alert("You must select a condition in order to delete it.");
                }
            });
            $("#overlay").click(function(){
                $("#overlay").hide();
                $("#condition_box").hide();
            });
            $("#attribute_name").change(function(){
                if($(this).val() == "default"){
                    $("#submit_condition").attr("disabled", "disabled");
                }
                else{
                    if($("#operator").val() != "default"){
                        $("#submit_condition").removeAttr("disabled");
                    }
                }
            });
            $("#operator").change(function(){
                if($(this).val() == "default"){
                    $("#submit_condition").attr("disabled", "disabled");
                }
                else{
                    
                    if($("#attribute_name").val() != "default"){
                        $("#submit_condition").removeAttr("disabled");
                    }
                }
            });
            $("#submit_condition").click(function(){
                var condition_string = $("#attribute_name").find(":selected").html() + " " + $("#operator option:selected").html() + " \"" + $("#keyword").val() + "\"";
                if($("#operator option:selected").html() == "contains"){
                    $("#keyword").val("%" + $("#keyword").val() + "%");
                }
                $("#condition_list").append("<option value='" + $("#attribute_name").find(":selected").val() + " " + $("#operator").val() + " &apos;" + $("#keyword").val() + "&apos;' class='condition_option'>" + condition_string + "</option>");
                $("#submit_condition").attr("disabled", "disabled");
                $("#attribute_name").prop('selectedIndex', 0);
                $("#operator").prop('selectedIndex', 0);
                $("#keyword").val("");
                $("#condition_box").hide();
                $("#overlay").hide();
                $("#query").removeAttr("disabled");
                $("#where").html("");
                $("#condition_list option").each(function(){
                    $("#where").append($(this).html() + ", ");
                });
            });
            $(document).on("click", ".include_option", function(){
                if($("#include_list :checkbox:checked").length == 0){
                    $("#select").html("*");
                }
                else{
                    $("#select").html("");
                }
                $("#include_list").find(".include_option:checkbox:checked").each(function(){
                    $("#select").append($(this).attr("name") + ", ");
                });
            });
            $("#query").click(function(){
                var selected_names = new Array();
                var selected_attributes = new Array();
                if($(".include_option:checked").length == 0){
                    $(".include_option").each(function(){
                        selected_names.push($(this).attr("name"));
                        selected_attributes.push($(this).val());
                    });
                }
                else{
                    $(".include_option:checked").each(function(){
                        selected_names.push($(this).attr("name"));
                    });
                    $(".include_option:checked").each(function(){
                        selected_attributes.push($(this).val());
                    });
                }
                var tables = $(".dataset_button:checked").val();
                var conditions = new Array();
                $("#condition_list option").each(function(){
                    conditions.push($(this).val());
                });
                $.ajax({
                    type: "GET",
                    url: "/SOAP/scripts/query.php",
                    data: {
                        selected_names: selected_names,
                        selected_attributes: selected_attributes,
                        tables: tables,
                        conditions: conditions
                    },
                    success: function(timestamp){
                        window.location = "/SOAP/app/webroot/files/export_" + timestamp + ".csv";
			$.ajax({
			    type: "POST",
			    url: "/SOAP/scripts/delete_csv.php",
			    data: {
			        timestamp: timestamp	
			    }
			});
                    }
                })
            });
        </script>
    </body>    
</html>

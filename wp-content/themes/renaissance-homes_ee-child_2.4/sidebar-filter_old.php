 <!-- Reference the theme's stylesheet on the Google CDN -->
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/pepper-grinder/jquery-ui.css"
        type="text/css" rel="Stylesheet" />

<div id="sidebar">


    
    <div class="widget">
    
    
     <?php
    function slide_values2() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["amount1"]; ?>, <?php echo $_POST["amount2"]; ?><?php } else { echo "300, 900";}}?>
    
     <?php
    function size() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["size1"]; ?>, <?php echo $_POST["size2"]; ?><?php } else { echo "2, 4";}}?>
    
     <?php
    function bed() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["bed1"]; ?>, <?php echo $_POST["bed2"]; ?><?php } else { echo "2, 6";}}?>
    
    <?php
    function car() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["car1"]; ?>, <?php echo $_POST["car2"]; ?><?php } else { echo "1, 5";}}?>


<div id="filter-space"></div>  
<h4>Refine Your Search</h3>


<form name="range_form" method="post" id="range_form">
<div class="default-filter">
    
    
    Price: $<input name="amount1" type="text" id="amount1" >,000 - $<input name="amount2" type="text" id="amount2" >,000
    <div id="slider-range"></div>
      
          
    Bedrooms: <input name="bed1" type="text" id="bed1" > - <input name="bed2" type="text" id="bed2" >
    <div id="bed"></div>
    
    Garages: <input name="car1" type="text" id="car1" > - <input name="car2" type="text" id="car2" >
    <div id="car"></div>
    
    Square Footage: <input name="size1" type="text" id="size1" >,000 - <input name="size2" type="text" id="size2" >,000
    <div id="size"></div>
    
  
<SELECT NAME="sort">
    <OPTION VALUE="price" SELECTED>Sort by Price
    <OPTION VALUE="et_bedrooms_number">Sort by Bedrooms
    <OPTION VALUE="et_garages_number">Sort by Garages
    <OPTION VALUE="et_square_footage">Sort by Size
    </SELECT>
<BR>
<INPUT TYPE="submit" VALUE="Update">
     
</div>
</form>
    
    

    </div>
</div> <!-- end #sidebar -->

<script>
    $(function() {
	$( "#slider-range" ).slider({
    range: true,
    min: 300,
    max: 900,
	step: 5,
    values: [ <?php slide_values2(); ?> ], 
    slide: function( event, ui ) {
        $( "#amount1" ).val(ui.values[ 0 ]);            
        $( "#amount2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
        $('#range_form').trigger('submit');
    }
});

    $("#amount1").val($( "#slider-range" ).slider( "values", 0 ));
    $("#amount2").val($( "#slider-range" ).slider( "values", 1 ));

});

$(function() {
	$( "#size" ).slider({
    range: true,
    min: 2,
    max: 4,
	step: 1,
    values: [ <?php size(); ?> ], 
    slide: function( event, ui ) {
        $( "#size1" ).val(ui.values[ 0 ]);            
        $( "#size2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
        $('#range_form').trigger('submit');
    }
});

    $("#size1").val($( "#size" ).slider( "values", 0 ));
    $("#size2").val($( "#size" ).slider( "values", 1 ));

});

$(function() {
	$( "#bed" ).slider({
    range: true,
    min: 2,
    max: 6,
	step: 1,
    values: [ <?php bed(); ?> ], 
    slide: function( event, ui ) {
        $( "#bed1" ).val(ui.values[ 0 ]);            
        $( "#bed2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
        $('#range_form').trigger('submit');
    }
});

    $("#bed1").val($( "#bed" ).slider( "values", 0 ));
    $("#bed2").val($( "#bed" ).slider( "values", 1 ));

});

$(function() {
	$( "#car" ).slider({
    range: true,
    min: 1,
    max: 5,
	step: 1,
    values: [ <?php car(); ?> ], 
    slide: function( event, ui ) {
        $( "#car1" ).val(ui.values[ 0 ]);            
        $( "#car2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
        $('#range_form').trigger('submit');
    }
});

    $("#car1").val($( "#car" ).slider( "values", 0 ));
    $("#car2").val($( "#car" ).slider( "values", 1 ));

});



	</script>

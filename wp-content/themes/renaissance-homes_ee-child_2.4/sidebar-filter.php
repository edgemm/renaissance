 <!-- Reference the theme's stylesheet on the Google CDN -->
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/pepper-grinder/jquery-ui.css" type="text/css" rel="Stylesheet" />

<div id="sidebar">
    
    <div class="widget">    
    
    <?php
    $amountCap = 1200;
    
    function slide_values2() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["amount1"]; ?>, <?php echo $_POST["amount2"]; ?><?php } else { echo "400, 1200"; }}?>
    
     <?php
    function size() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["size1"]; ?>, <?php echo $_POST["size2"]; ?><?php } else { echo "1, 5";}}?>
    
     <?php
    function bed() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["bed1"]; ?>, <?php echo $_POST["bed2"]; ?><?php } else { echo "3, 6";}}?>
    
    <?php
    function car() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){?>
    <?php echo $_POST["car1"]; ?>, <?php echo $_POST["car2"]; ?><?php } else { echo "1, 5";}}?>

<div id="filter-space"></div>  
<h4 class ="widgettitle">Refine Your Search</h4>

<form name="range_form" method="post" id="range_form" onsubmit="return saveScrollPositions(this);">
<div class="default-filter">

<input type="hidden" name="scrollx" id="scrollx" value="0" />
<input type="hidden" name="scrolly" id="scrolly" value="0" />    
    
    Price: $<input name="amount1" type="text" id="amount1" >,000 - $<input name="amount2" type="text" id="amount2" >,000<span class="rh-mir-gte"><?php if( ( $_POST["amount2"] >= $amountCap ) || ( !isset( $_POST["amount2"] ) ) ) echo "+"; ?></span>
    <div id="slider-range"></div>
      
          
    Bedrooms: <input name="bed1" type="text" id="bed1" > - <input name="bed2" type="text" id="bed2" >
    <div id="bed"></div>
    
    Garages: <input name="car1" type="text" id="car1" > - <input name="car2" type="text" id="car2" >
    <div id="car"></div>
    
    Square Footage: <input name="size1" type="text" id="size1" >,000 - <input name="size2" type="text" id="size2" >,000
    <div id="size"></div>

</div>
</form>
   <div id="save-share">
<br>

<a href="http://www.renaissance-homes.com/myfav?fav=" class="read-more">Go to Favorites</a> 
<script> 
var myfavsave = $.cookie('myfav');
var _href = "/myfav?fav=";

$("a.read-more").attr("href", _href + myfavsave);
</script>
  
</div>

    </div>

</div> <!-- end #sidebar -->

<script type="text/javascript">
var amountCap = <?php echo $amountCap; ?>; // cap for home cost  - gfh

function priceValuesSubmit() { // set values of price to nubmers without commas - gfh
    var low = jQuery( "#amount1" ).val();
    var high = jQuery( "#amount2" ).val();
    jQuery( "#amount1" ).val( low.toString().replace(/,/g , "") );
    if ( high.toString().replace(/,/g , "") >= amountCap ) {
	jQuery( "#amount2" ).val( 99999999 ); // show all homes greater than cap
    } else {
	jQuery( "#amount2" ).val( high.toString().replace(/,/g , "") );
    }
    jQuery('#range_form').trigger('submit');
    jQuery( "#amount1" ).val( low.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    jQuery( "#amount2" ).val( high.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
}
    jQuery(document).ready(function ($) {
	$( "#slider-range" ).slider({
    range: true,
    min: 400,
    max: amountCap,
	step: 5,
    values: [ <?php slide_values2(); ?> ], 
    slide: function( event, ui ) {
        //$( "#amount1" ).val(ui.values[ 0 ]);
        //$( "#amount2" ).val(ui.values[ 1 ]);
        $( "#amount1" ).val( ui.values[ 0 ].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        $( "#amount2" ).val( ui.values[ 1 ].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );

	if ( ui.values[ 1 ] >= amountCap ) {
	    $( ".rh-mir-gte" ).html( "+" );
	} else {
	    $( ".rh-mir-gte" ).html( "" );
	}
    },
    stop : function (event, ui) {
	_gaq.push(['_trackEvent', 'click', 'search', 'price']);
	priceValuesSubmit();
    }
});

    // add comma for values over 1 mil - gfh
    var v1 = $( "#slider-range" ).slider( "values", 0 );
    var v2 = $( "#slider-range" ).slider( "values", 1 );
    
    v1 = v1.toString();
    v2 = v2.toString();
    
    if ( v1.length > 3/* && v1.indexOf( "," ) == -1*/ ) v1 = ( v1.substring( 0, v1.length - 3 ) + ',' + v1.slice( -3 ) );
    if ( v2.length > 3/* && v2.indexOf( "," ) == -1*/ ) v2 = ( v2.substring( 0, v2.length - 3 ) + ',' + v2.slice( -3 ) );
    
    $( "#amount1" ).val( v1 );
    $( "#amount2" ).val( v2 );

    //$("#amount1").val($( "#slider-range" ).slider( "values", 0 ));
    //$("#amount2").val($( "#slider-range" ).slider( "values", 1 ));

});

jQuery(document).ready(function ($) {
	$( "#size" ).slider({
    range: true,
    min: 1,
    max: 5,
	step: 1,
    values: [ <?php size(); ?> ], 
    slide: function( event, ui ) {
        $( "#size1" ).val(ui.values[ 0 ]);            
        $( "#size2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
	
	_gaq.push(['_trackEvent', 'click', 'search', 'size']);
        priceValuesSubmit();
    }
});

    $("#size1").val($( "#size" ).slider( "values", 0 ));
    $("#size2").val($( "#size" ).slider( "values", 1 ));

});

jQuery(document).ready(function ($) {
	$( "#bed" ).slider({
    range: true,
    min: 3,
    max: 6,
	step: 1,
    values: [ <?php bed(); ?> ], 
    slide: function( event, ui ) {
        $( "#bed1" ).val(ui.values[ 0 ]);            
        $( "#bed2" ).val(ui.values[ 1 ]); 
		},
    stop : function (event, ui) {
	
	_gaq.push(['_trackEvent', 'click', 'search', 'beds']);
        priceValuesSubmit();
    }
});

    $("#bed1").val($( "#bed" ).slider( "values", 0 ));
    $("#bed2").val($( "#bed" ).slider( "values", 1 ));

});

jQuery(document).ready(function ($) {
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
	
	_gaq.push(['_trackEvent', 'click', 'search', 'garages']);
        priceValuesSubmit();
    }
});

    $("#car1").val($( "#car" ).slider( "values", 0 ));
    $("#car2").val($( "#car" ).slider( "values", 1 ));

});

</script>
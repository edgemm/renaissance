<div id="gmaps-border">

<div id="map_canvas" style="width: 610px; height: 360px;"></div>

<img src="/wp-content/uploads/2012/06/neighborhood-mark-no-shadow.png"> -Neighborhood <img src="/wp-content/uploads/2012/06/vintage-mark-no-shadow.png"> -Vintage Collection

</div>

<?php



function vintage_map()

{

    global $post;

$myposts = query_posts( array( 'category__and' => array(4,9), 'posts_per_page' => 6 ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php
$smc_address = get_post_meta($post->ID, 'et_address', $single = true);
$smc_price = get_post_meta($post->ID, 'price', $single = true);
// see if latitude and longitude are set - gfh
$smc_geo_lat = get_post_meta($post->ID, 'geo_lat', $single = true);
$smc_geo_long = get_post_meta($post->ID, 'geo_long', $single = true);
?>



<?php
// use google geocode if lat and long not set in custom fields - gfh
if ( !get_field( 'geo_lat' ) || !get_field( 'geo_long' )  ) {
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');
$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;

update_post_meta( $post->ID, 'geo_lat', $lat );
update_post_meta( $post->ID, 'geo_long', $long );
} else { // set variables if lat and long custom fields set - gfh
    $lat = get_post_meta( $post->ID, 'geo_lat', $single = true );
    $long = get_post_meta( $post->ID, 'geo_long', $single = true );
    echo "<!-- the lat and long are both set -->";
}

?>



['<b>Vintage Collection</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo prettyPrice($smc_price); ?></p>', <? echo $lat; ?>,<? echo $long; ?>, '/wp-content/uploads/2012/06/vintage-mark.png'],



<?php endforeach;

wp_reset_query();



}



?>




<?php



function neighborhood_map()

{



    global $post;

$myposts = query_posts( array( 'category__and' => array(137), 'posts_per_page' => -1 ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>

<?php
$smc_address = get_post_meta($post->ID, 'et_address', $single = true);
$smc_price = get_post_meta($post->ID, 'price', $single = true);
// see if latitude and longitude are set - gfh
$smc_geo_lat = get_post_meta($post->ID, 'geo_lat', $single = true);
$smc_geo_long = get_post_meta($post->ID, 'geo_long', $single = true);
?>



<?php
// use google geocode if lat and long not set in custom fields - gfh
if ( !get_field( 'geo_lat' ) || !get_field( 'geo_long' )  ) {
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');
$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;

update_post_meta( $post->ID, 'geo_lat', $lat );
update_post_meta( $post->ID, 'geo_long', $long );
} else { // set variables if lat and long custom fields set - gfh
    $lat = get_post_meta( $post->ID, 'geo_lat', $single = true );
    $long = get_post_meta( $post->ID, 'geo_long', $single = true );
}

?>



['<b>Neighborhood</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo prettyPrice($smc_price); ?></p>', <? echo $lat; ?>,<? echo $long; ?>, '/wp-content/uploads/2012/06/neighborhood-mark.png'],


<?php endforeach;

wp_reset_query();



}



?>

<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>



<script type="text/javascript">  



  function initialize() {


geocoder = new google.maps.Geocoder();
var myOptions = {
zoom: 10,
center: new google.maps.LatLng(0, 0),
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(
document.getElementById("map_canvas"),
myOptions);
setMarkers(map, locations);
}


var locations = [
<?php vintage_map(); ?>
<?php neighborhood_map(); ?>

];



function setMarkers(map, locations) {

  var infowindow = new google.maps.InfoWindow();
  var bounds = new google.maps.LatLngBounds();
  var marker, i; 

 
  for (var i=0; i<locations.length; i++) { 

     marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
    icon: locations[i][3]
     

     });
	 
     google.maps.event.addListener(marker, 'click', (function(marker, i) {
       return function() {

        
         infowindow.setContent(locations[i][0]);
         infowindow.open(map, marker);
       }
     })(marker, i));

     bounds.extend(marker.getPosition());
     map.fitBounds(bounds);
    
 
   }
 }
 
</script>

<script type="text/javascript">
    window.onload = function () {
	console.log( locations );
        initialize();
    }
     
</script>
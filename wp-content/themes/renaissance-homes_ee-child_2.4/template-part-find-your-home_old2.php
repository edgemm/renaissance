


<div id="map_canvas" style="width: 623px; height: 480px;"></div>

<img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa.png"> -Neighborhood <img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa2.png"> -Vintage Collection

<?php



function vintage_map()

{

    global $post;

$myposts = query_posts( array( 'category__and' => array(4,9), 'posts_per_page' => 9, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>
<?php $smc_price = get_post_meta($post->ID, 'price', $single = true); ?>








['<b>Vintage Collection</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo $smc_price; ?></p>', '<? echo $smc_address; ?>', 'http://www.renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa2.png'],



<?php endforeach;

wp_reset_query();



}



?>




<?php



function neighborhood_map()

{



    global $post;

$myposts = query_posts( array( 'category__and' => array(137,), 'posts_per_page' => 2, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>
<?php $smc_price = get_post_meta($post->ID, 'price', $single = true); ?>






['<b>Neighborhood</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo $smc_price; ?></p>', '<? echo $smc_address; ?>', 'http://www.renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa.png'],



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
<?php vintage_map(); ?><?php neighborhood_map(); ?>

];



function setMarkers(map, locations) {

  var infowindow = new google.maps.InfoWindow();
  var bounds = new google.maps.LatLngBounds();
  var marker, i; 



  //CHANGED REMOVED EQUALS SIGN
  for (var i=0; i<locations.length; i++) { 


   //ADDED
   (function(i) {
   
  
   
   geocoder.geocode({'address': locations[i][1]}, function(results, status) {
	   
	  

     marker = new google.maps.Marker({
       position: results[0].geometry.location,

      //REMOVED COMMA
       
     map: map,
     icon: locations[i][2]
     

     });
	 
	



     google.maps.event.addListener(marker, 'click', (function(marker, i) {
       return function() {

         //CHANGED ORDER
         infowindow.setContent(locations[i][0]);
         infowindow.open(map, marker);
       }
     })(marker, i));

     bounds.extend(marker.getPosition());
     map.fitBounds(bounds);
     });

    // ADDED
    })(i);
   }
 }
 
</script>

<script type="text/javascript">
    window.onload = function () {
        initialize();
    }
     
</script>

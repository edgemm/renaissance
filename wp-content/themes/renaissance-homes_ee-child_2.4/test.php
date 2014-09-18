<?php

/*

Template Name: smc test

*/

?>



<?php



function vintage_map()

{

    global $post;

$myposts = query_posts( array( 'category__and' => array(4,9), 'posts_per_page' => 12, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>



<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');



$output= json_decode($geocode);



$lat = $output->results[0]->geometry->location->lat;

$long = $output->results[0]->geometry->location->lng;



?>



['<b>Vintage Collection</b><br><b><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></b>', <? echo $lat; ?>,<? echo $long; ?>, ],



<?php endforeach;

wp_reset_query();



}



?>



<?php



function neighborhood_map()

{



    global $post;

$myposts = query_posts( array( 'category__and' => array(137,), 'posts_per_page' => 10, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>



<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');



$output= json_decode($geocode);



$lat = $output->results[0]->geometry->location->lat;

$long = $output->results[0]->geometry->location->lng;



?>



['Neighborhood<br><a href="<?php the_permalink(); ?>"><?php the_title() ?></a>', <? echo $lat; ?>,<? echo $long; ?>, ],



<?php endforeach;

wp_reset_query();



}



?>
          <?php vintage_map(); ?>
          
          

<img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa2.png"> -Neighborhood <img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa.png"> -Vintage Collection





 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var berlin = new google.maps.LatLng(52.520816, 13.410186);

  var neighborhoods = [
    new google.maps.LatLng(52.511467, 13.447179),
    new google.maps.LatLng(52.549061, 13.422975),
    new google.maps.LatLng(52.497622, 13.396110),
    new google.maps.LatLng(52.517683, 13.394393)
  ];

  var markers = [];
  var iterator = 0;

  var map;

  function initialize() {
    var mapOptions = {
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: berlin
    };

    map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
  }

  function drop() {
    for (var i = 0; i < neighborhoods.length; i++) {
      setTimeout(function() {
        addMarker();
      }, i * 200);
    }
  }

  function addMarker() {
    markers.push(new google.maps.Marker({
      position: neighborhoods[iterator],
      map: map,
      draggable: false,
      animation: google.maps.Animation.DROP
    }));
    iterator++;
  }
</script>
<body onload="initialize()">
<div id="map_canvas" style="width: 500px; height: 400px;">map div</div>
<button id="drop" onclick="drop()">Drop Markers</button>
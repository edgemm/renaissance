<div id="gmaps-border">
<div id="map_smc" style="width: 625px; height: 480px;"></div>
</div>
<img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa.png"> -Neighborhood <img src="/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa2.png"> -Vintage Collection

<?php



function vintage_map()

{

    global $post;

$myposts = query_posts( array( 'category__and' => array(4,9), 'posts_per_page' => 12, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>
<?php $smc_price = get_post_meta($post->ID, 'price', $single = true); ?>




<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');



$output= json_decode($geocode);



$lat = $output->results[0]->geometry->location->lat;

$long = $output->results[0]->geometry->location->lng;



?>



['<b>Vintage Collection</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo $smc_price; ?></p>', <? echo $lat; ?>,<? echo $long; ?>, ],



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
<?php $smc_price = get_post_meta($post->ID, 'price', $single = true); ?>



<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');



$output= json_decode($geocode);



$lat = $output->results[0]->geometry->location->lat;

$long = $output->results[0]->geometry->location->lng;



?>



['<b>Neighborhood</b><br><h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5><p><? echo $smc_price; ?></p>', <? echo $lat; ?>,<? echo $long; ?>, ],



<?php endforeach;

wp_reset_query();



}



?>



 <script src="http://maps.google.com/maps/api/js?sensor=false" 

          type="text/javascript"></script>

  





  <script type="text/javascript">

    var locations = [

          <?php vintage_map(); ?>

    ];



    var locations2 = [

          <?php neighborhood_map(); ?>

    ];



    var map = new google.maps.Map(document.getElementById('map_smc'), {

      zoom: 10,

      center: new google.maps.LatLng(45.505384,-122.676086),

      mapTypeId: google.maps.MapTypeId.ROADMAP
	  

    });
	
	

    var infowindow = new google.maps.InfoWindow();



var marker, i;



    var image = '/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa2.png';



    for (i = 0; i < locations.length; i++) {  

      marker = new google.maps.Marker({

        position: new google.maps.LatLng(locations[i][1], locations[i][2]),

        map:map,

        animation: google.maps.Animation.DROP ,

        icon: image

  });
  
  

      google.maps.event.addListener(marker, 'click', (function(marker, i) {

        return function() {

          infowindow.setContent(locations[i][0]);

          infowindow.open(map, marker);

        }

      })(marker, i));

    }



var marker, i;

    var image2 = '/wp-content/themes/renaissance-homes_ee-child_2.2/images/villa.png';



    for (i = 0; i < locations2.length; i++) {  

      marker = new google.maps.Marker({

        position: new google.maps.LatLng(locations2[i][1], locations2[i][2]),

        map:map,

        animation: google.maps.Animation.DROP ,
  
	    icon: image2
		
	  }

  });


      google.maps.event.addListener(marker, 'click', (function(marker, i) {

        return function() {

          infowindow.setContent(locations2[i][0]);

          infowindow.open(map, marker);

        }

      })(marker, i));

    }
	
	</script>
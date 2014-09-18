<?php



global $post;

$myposts = query_posts( array( 'category__and' => array(4,9), 'posts_per_page' => 1, ) );

foreach( $myposts as $post ) :	setup_postdata($post); ?>



<?php $smc_address = get_post_meta($post->ID, 'et_address', $single = true); ?>



<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $smc_address).'&sensor=false');



$output= json_decode($geocode);



$lat = $output->results[0]->geometry->location->lat;

$long = $output->results[0]->geometry->location->lng;



?>



['<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>', <? echo $lat; ?>,<? echo $long; ?>, ],



<?php endforeach;

wp_reset_query();



?>


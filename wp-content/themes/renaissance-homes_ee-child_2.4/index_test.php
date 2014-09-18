           
          
<?php if ( in_category( '9' ) ) { ?>

 <?php get_header(); ?>



<?php if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');

if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');

if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');

if (is_category()) $post_number = get_option('elegantestate_catnum_posts'); ?>

   



<div id="content-top" class="content-page">

	<div id="menu-bg"></div>

	<div id="top-index-overlay"></div>





	<div id="content" class="clearfix">

    

    

		<div id="main-area">
        
        <?php if ( is_category( '9' ) ) { ?>
		
		
		<div id="breadcrumbs-smc2">

  <a href="/">Home</a> » Move-In Ready


      </div> <!-- .end smc breadcrumbs -->
		
		
		
		<?php } else { ?>

        
        <div id="breadcrumbs-smc2">

  <a href="/">Home</a> <span class="separate">&raquo;</span> <a href="/<?php $categories = get_the_category();

$cat_slug = $categories[0]->slug;

echo "$cat_slug"; ?>"><?php

$category = get_the_category(); 

echo $category[0]->cat_name;

?></a> » Move-In Ready


      </div> <!-- .end smc breadcrumbs -->
        
        <?php } ?>
        


<?php 

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

$sldamount1 = $_POST["amount1"];

$sldamount2 = $_POST["amount2"]; } else {

$sldamount1 = 300;

$sldamount2 = 900;

} ?>

<?php $slideramount1 = ('$' . $sldamount1 . ',000'); ?>

<?php $slideramount2 = ('$' . $sldamount2 . ',000'); ?>

<?php 

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

$sldsize1 = $_POST["size1"];

$sldsize2 = $_POST["size2"]; } else {

$sldsize1 = 2;

$sldsize2 = 5;

} ?>

<?php $slidersize1 = ($sldsize1 . ',000'); ?>

<?php $slidersize2 = ($sldsize2 . ',000'); ?>

<?php 

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

$sldbed1 = $_POST["bed1"];

$sldbed2 = $_POST["bed2"]; } else {

$sldbed1 = 1;

$sldbed2 = 7;

} ?>

<?php 

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

$sldcar1 = $_POST["car1"];

$sldcar2 = $_POST["car2"]; } else {

$sldcar1 = 1;

$sldcar2 = 5;

} ?>


 


<?php $args = array(

 	'post_type' => 'post',

	'cat'      => 9,
	
	'orderby'      => 'meta_value', 'meta_key' => 'price' ,
	
	'order' => 'DSC',
	
	'posts_per_page' => 100,

 	'meta_query' => array(

		'relation' => 'AND',

 		array(

 			'key' => 'et_bedrooms_number',

 			'value' => array( $sldbed1, $sldbed2 ),

			'type' => 'numeric',

 			'compare' => 'BETWEEN'

 		),

 		array(

		    'key' => 'price',

 			'value' => array( $slideramount1, $slideramount2 ),
			
			'type' => 'CHAR',

 			'compare' => 'BETWEEN'

 		),

		array(

		    'key' => 'et_square_footage',

 			'value' => array( $slidersize1, $slidersize2 ),

 			'compare' => 'BETWEEN'

 		),
		
		array(

		    'key' => 'et_garages_number',

 			'value' => array( $sldcar1, $sldcar2 ),

 			'compare' => 'BETWEEN'

 		)

 	)
	
  );

?>

       



			<?php $i = 1; ?>

			<?php // The Query

$the_query = new WP_Query( $args );

			 ?>
             
             
			<?php if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            


				<?php include('entry.php'); ?>


				<?php $i++; ?>
                
                
                			<?php endwhile; ?>


                
                             
                


				<div class="clear"></div>

				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }

				else { ?>

					 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>

				<?php } ?>

				

			<?php else : ?>

				<?php include ('no-results-filter.php'); ?>

			<?php endif; wp_reset_postdata(); ?>

			

			

		</div> <!-- end #main-area-->	

		

		<?php get_sidebar(filter); ?>

		

	<?php get_footer(); ?>		

    
    <?php } else { ?>
    
    <?php get_header(); ?>

<?php if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');
if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');
if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');
if (is_category()) $post_number = get_option('elegantestate_catnum_posts'); ?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>
 
	<div id="content" class="clearfix">
     
		<div id="main-area">
        
        <div id="breadcrumbs-smc2">

  <a href="/">Home</a> <span class="separate">&raquo;</span> <a href="/<?php $categories = get_the_category();

$cat_slug = $categories[0]->slug;

echo "$cat_slug"; ?>"><?php

$category = get_the_category(); 

echo $category[0]->cat_name;

?></a> » Floor Plans


      </div> <!-- .end smc breadcrumbs -->
        

			<?php $i = 1; ?>
			<?php global $query_string; 
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				

				
				<?php include('entry.php'); ?>
                
				
				
				<?php $i++; ?>
			<?php endwhile; ?>
				<div class="clear"></div>
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				else { ?>
					 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
				<?php } ?>
				
			<?php else : ?>
				<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
			<?php endif; wp_reset_query(); ?>
			
			
		</div> <!-- end #main-area-->	
		
		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>	
    	
    
   
    
    
    
    <?php } ?>
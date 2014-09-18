<?php







/*







Template Name: page email fav







*/











?>





<?php



$myfavcookie = $_COOKIE['myfav'];



$myfavcheck = explode( ',', $myfavcookie ) ;





?>







<?php get_header(fav); ?>







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



  <a href="/">Home</a> » Emailed Favorites





      </div> <!-- .end smc breadcrumbs -->

        

        

        







       

<?php 









?>









			<?php $i = 1; ?>



			<?php // The Query

			

			



			$myfavs2 = $_GET["fav"];

			$myfavs = $_COOKIE['myfav'] ;

			$myfavs_array = array ( $myfavs ) ;

			$myfavsarray = explode( ',', $myfavs2 ) ;





$the_query = new WP_Query( array( 'post_type' => 'post', 'post__in' => $myfavsarray  ) );



			 ?>

             

             

			<?php if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            



				<?php include('entry-email.php'); ?>





				<?php $i++; ?>

                

                

                			<?php endwhile; ?>





                

                             

                





				<div class="clear"></div>



				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }



				else { ?>



					 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>



				<?php } ?>



				



			<?php else : ?>



				<?php include ('no-results-myfav.php'); ?>



			<?php endif; wp_reset_postdata(); ?>



			



			



		</div> <!-- end #main-area-->

        

        

		



		<?php get_sidebar(emailfav); ?>



		



	<?php get_footer(); ?>		
<?php get_header(facebook); ?>

<?php if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');
if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');
if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');
if (is_category()) $post_number = get_option('elegantestate_catnum_posts'); ?>


    
                				


	<div id="content_facebook" class="clearfix">
    

    
		<div id="main-area_facebook">
        

           

			<?php $i = 1; ?>
			<?php global $query_string; 
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				

				
				<?php include('entry_facebook.php'); ?>
                
				
				
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
		
		

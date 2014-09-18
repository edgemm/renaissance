<?php get_header(); ?>
		<div id="content-top" class="content-blog">
        <div id="menu-bg"></div>	
		<div id="content" class="clearfix">
			<div id="main-area">
				<?php $i = 1; ?>
				<?php 
				$args=array(
				   'showposts'=>get_option('elegantestate_homepage_posts'),
				   'paged'=>$paged,
				   'category__not_in' => get_option('elegantestate_exlcats_recent'),
				);
				if (get_option('elegantestate_duplicate') == 'false')
					$args['post__not_in']= $ids;
				 query_posts( 'category_name=special' ); ?>
               
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
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
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
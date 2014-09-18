<?php
/* Template Name: Giving Back */

get_header();
the_post();
?>

<div id="content-top" class="fullwidth">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>

	<div id="content" class="clearfix fullwidth">
		<div id="main-area">
			<div class="main_entry">
				<h2 class="main_entry_title"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<?php

			$GLOBALS['parent_cat'] = 266;
			$GLOBALS['setTemplate'] = "gb";
			
			// title for filter area
			$filter_title = "Giving Back";
			
			$feat_args = array(
				'post_type'		=> 'post',
				'cat'			=> $GLOBALS['parent_cat'], // giving back category
				'orderby'		=> 'date',
				'order' 		=> 'DSC',
				'posts_per_page'	=> 1,
				'meta_key'		=> 'rh_featured_post',
				'meta_value'		=> '1'
			);
			
			$featured_query = new WP_Query( $feat_args );
			
			if ($featured_query->have_posts()) :
				while ( $featured_query->have_posts() ) :
				
					$featured_query->the_post();

					include( locate_template( 'includes/featured-entry.php' ) );
			
				endwhile;
			
			endif;
			
			?>

			<div class="full_entry giving-back clearfix">
			<?php
			// include posts from parent_cat and filters - gfh

			$GLOBALS['rh_current_post'] = get_the_ID();
			include( locate_template( 'includes/rh-post-archive.php' ) );
			?>
			</div> <!-- end .full_entry -->
		</div> <!-- end #main-area -->
<?php get_footer(); ?>
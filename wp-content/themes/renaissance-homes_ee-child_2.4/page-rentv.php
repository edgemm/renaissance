<?php
/* Template Name: Ren TV */
?>

<?php get_header(); ?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>
	
	<div id="content" class="clearfix">
		<div id="main-area">
		<?php
			// set parent category to rentv - gfh
			$GLOBALS['parent_cat'] = 265;

			$feat_args = array(
				'post_type'		=> 'post',
				'cat'			=> $GLOBALS['parent_cat'],
				'orderby'		=> 'date',
				'order' 		=> 'DSC',
				'posts_per_page'	=> 1,
				'meta_key'		=> 'featured_video',
				'meta_value'		=> '1'
			);

			$featured_query = new WP_Query( $feat_args );

			if ($featured_query->have_posts()) : // display featured video - gfh
				while ( $featured_query->have_posts() ) :
				
					$featured_query->the_post();

					include( locate_template( 'single-rentv.php' ) );

				endwhile;

			else : // if no featured video, show latest rentv post - gfh
				$rentv_args = array(
					'post_type'		=> 'post',
					'cat'			=> $GLOBALS['parent_cat'],
					'orderby'		=> 'date',
					'order' 		=> 'ASC',
					'posts_per_page'	=> 1					
				);

				$rentv_query = new WP_Query( $rentv_args );
			
				if ($rentv_query->have_posts()) :
					while ( $rentv_query->have_posts() ) :

						$rentv_query->the_post();
	
						include( locate_template( 'single-rentv.php' ) );
				
					endwhile;
				endif;			
			endif;
		?>
		</div><!-- end #main-area -->

		<?php get_sidebar('related-posts'); ?>

		<div class="clear"></div>

<?php

	if (function_exists('wp_pagenavi')) {
		wp_pagenavi();
	} else {
		include(TEMPLATEPATH . '/includes/navigation.php');
	}

wp_reset_postdata();

?>

<?php get_footer(); ?>
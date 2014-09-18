<?php
/*
Template Name: Living Green
*/
?>

<?php
the_post();
get_header();

if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');
if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');
if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');
if (is_category()) $post_number = get_option('elegantestate_catnum_posts'); ?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>
	<div id="content" class="clearfix">
		<div id="main-area">
		        <div id="breadcrumbs-smc2">
				<a href="/">Home</a> &raquo; Living Green
			</div> <!-- .end smc breadcrumbs *gfh -->		
			<div class="page-featured">

				<h1 class="single-title"><?php the_title(); ?></h1>

				<?php 
				if ( has_post_thumbnail() ) {
					$attrs = array( 'class' => 'page-featured-top-img' );
				?>
				<p class="page-featured-top"><?php the_post_thumbnail( 'full', $attrs ); ?></p>
				<?php } ?>

				<div class="featured_content"><?php the_content(); ?></div>
			</div>

			<div class="full_entry clearfix">

<?php

$args = array(
 	'post_type'	=> 'post',
	'cat'		=> 264,
	'orderby'      => 'date',
	'order' => 'DSC',
	'posts_per_page' => 100
	);

$i = 1;

// The Query

$the_query = new WP_Query( $args );

if ($the_query->have_posts()) :
	while ( $the_query->have_posts() ) :
	
		$the_query->the_post();
	
		include('includes/entry-living-green.php');
		$i++;

	endwhile;

?>
			</div> <!-- end .full_entry -->

			<div class="clear"></div>

<?php

	if (function_exists('wp_pagenavi')) {
		wp_pagenavi();
	} else {
		include(TEMPLATEPATH . '/includes/navigation.php');
	}

else :
	include ('no-results-filter.php');

endif;

wp_reset_postdata();

?>

		</div> <!-- end #main-area-->

		<?php get_sidebar(); ?>

	<?php get_footer(); ?>
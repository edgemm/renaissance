<?php
get_header();

the_post();

$fullWidthCats = array( 266 );
$showFullWidth = ( ( in_category( $fullWidthCats ) || post_is_in_descendant_category( $fullWidthCats ) ) && isset( $_GET['tmpl'] ) ) ? true : false;
?>

<div id="content-top" class="content-page<?php if ( $showFullWidth ) echo " fullwidth"; ?>">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>

	<div id="content" class="clearfix">
		<div id="main-area">
        
        <?php

if ( in_category('121') || post_is_in_descendant_category( '121' ) ) {
	include('single-gallery.php');
} elseif ( in_category('264') || post_is_in_descendant_category( '264' ) ) { // category: living green
	include('single-living-green.php');
} elseif ( in_category('265') || post_is_in_descendant_category( '265' ) ) { // category: ren tv
	include('single-rentv.php');       
} elseif ( ( in_category('266') || post_is_in_descendant_category( '266' ) ) && $_GET['tmpl'] == "gb" ) { // category: giving back
	include('single-giving-back.php');        
} elseif ( in_category('6') || post_is_in_descendant_category( '6' ) || in_category('271') || post_is_in_descendant_category( '271' ) ) { // category: news
include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
				<div class="full_entry clearfix">
					<?php if (get_option('elegantestate_thumbnails') == 'on') { ?>
						<?php $width = 159;
							  $height = 159;
							  $classtext = '';
							  $titletext = get_the_title();
						
							  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							  $thumb = $thumbnail["thumb"]; ?>							
					<?php }; ?>
					
					<div class="entry_content<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') echo(' setwidth') ?>">
						<?php if($thumb <> '') { ?>
							<div class="small-thumb">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
								<span class="overlay"></span>
							</div> 	<!-- end .small-thumb -->
						<?php }; ?>
						<h1 class="single-title"><?php the_title(); ?></h1>
						<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
						<?php the_content(); ?>

						<?php // display related posts if box is checked - gfh
						if ( !get_field( 'show_related_content' ) ) { ?>
						<div class="related clearfix">
							<h3 class="related-headline">Related Content</h3>
							<div class="related-posts">
						<?php
							$args = array(
								'post_type'		=> 'post',
								'category__not_in'	=> array( 136, 281 ),
								'orderby'      		=> 'rand',
								'posts_per_page' 	=> 5
							);
		
							remove_all_filters('posts_orderby');
							$the_query = new WP_Query( $args );
		
							if ($the_query->have_posts()) {
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									include( locate_template( 'includes/entry-related-post.php' ) );					
								endwhile;
							}
						?>
							</div>
						</div>
						<?php
						wp_reset_query();
						}
						?>
						
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
										
					<?php if (get_option('elegantestate_integration_single_bottom') <> '' && get_option('elegantestate_integrate_singlebottom_enable') == 'on') echo(get_option('elegantestate_integration_single_bottom')); ?>
			
					<?php if (get_option('elegantestate_468_enable') == 'on') { ?>
						<?php if(get_option('elegantestate_468_adsense') <> '') echo(get_option('elegantestate_468_adsense'));
						else { ?>
							<a href="<?php echo(get_option('elegantestate_468_url')); ?>"><img src="<?php echo(get_option('elegantestate_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
						<?php } ?>	
					<?php } ?>
				</div> <!-- end .full_entry -->
				
				<?php if (get_option('elegantestate_show_postcomments') == 'on') comments_template('', true); ?>

			<?php } else { ?>
            <div class="top-back-smc">
            <div class="post clearfix">
            
					
                    				<?php include('single-product.php'); ?>

				
                </div> <!-- end .post -->
                
				
			<?php } ?>
			
		</div> <!-- end #main-area-->

		<?php
		if( !$showFullWidth ) {
			if ( in_category( array( 9, 19 ) ) ) {
				get_sidebar(listing);
			} elseif ( in_category( 265 ) || post_is_in_descendant_category( 265 ) ) { // category: ren tv
			get_sidebar( "related-posts" );
			} else {
				get_sidebar();
			}
		} ?>
		
	<?php get_footer(); ?>		
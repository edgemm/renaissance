<?php get_header(); ?>

<?php the_post(); ?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>

	<div id="content" class="clearfix">
		<div id="main-area">
        
        
        
        
        <?php
/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}
?>
        
        	<?php  if ( in_category('121') || post_is_in_descendant_category( '121' ) ) {?>

              
					
                    				<?php include('single-gallery.php'); ?>
        

        <?php } if ( in_category('6') || post_is_in_descendant_category( '6' ) ) {?>
			<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
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
						
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
										
					<?php if (get_option('elegantestate_integration_single_bottom') <> '' && get_option('elegantestate_integrate_singlebottom_enable') == 'on') echo(get_option('elegantestate_integration_single_bottom')); ?>
			
					<?php if (get_option('elegantestate_468_enable') == 'on') { ?>
						<?php if(get_option('elegantestate_468_adsense') <> '') echo(get_option('elegantestate_468_adsense'));
						else { ?>
							<a href="<?php echo(get_option('elegantestate_468_url')); ?>"><img src="<?php echo(get_option('elegantestate_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
						<?php } ?>	
					
					
					<?php } else { ?>
            

            
				<div class="post clearfix">
					
                    				<?php include('single-product.php'); ?>

				
                </div> <!-- end .post -->
                
			<?php } ?>
				
				</div> <!-- end .full_entry -->
				
				<?php if (get_option('elegantestate_show_postcomments') == 'on') comments_template('', true); ?>
			<?php } ?>
			
		</div> <!-- end #main-area-->	
		
		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>		
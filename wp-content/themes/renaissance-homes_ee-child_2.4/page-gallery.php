<?php 

/*

Template Name: Gallery Page

*/

?>

<?php the_post(); ?>

<?php 

$et_ptemplate_settings = array();

$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );



$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];



$gallery_cats = isset( $et_ptemplate_settings['et_ptemplate_gallerycats'] ) ? $et_ptemplate_settings['et_ptemplate_gallerycats'] : array();

$et_ptemplate_gallery_perpage = isset( $et_ptemplate_settings['et_ptemplate_gallery_perpage'] ) ? $et_ptemplate_settings['et_ptemplate_gallery_perpage'] : 12;

?>

<?php get_header(); ?>

		

	<div id="content-top">

		<div id="menu-bg"></div>

		<div id="top-index-overlay"></div>



		<div id="content" class="clearfix<?php if($fullwidth) echo(' fullwidth');?>">

			<div id="main-area">

				<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>

			

				<div class="full_entry clearfix">

					<?php if (get_option('elegantestate_integration_single_top') <> '' && get_option('elegantestate_integrate_singletop_enable') == 'on') echo(get_option('elegantestate_integration_single_top')); ?>	

					

					<div class="entry_content<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') echo(' setwidth') ?>">

						<?php $width = 159;

							  $height = 159;

							  $classtext = '';

							  $titletext = get_the_title();

						

							  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);

							  $thumb = $thumbnail["thumb"]; ?>

						

						<?php if($thumb <> '' && get_option('elegantestate_page_thumbnails') == 'on') { ?>

							<div class="small-thumb">

								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>

								<span class="overlay"></span>

							</div> 	<!-- end .small-thumb -->

						<?php }; ?>

						

						<h1 class="single-title"><?php the_title(); ?></h1>

						<?php the_content(); ?>

						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>







<!-- start gallery menu -->

<div id="gallery-menu">
<div id="gallery-fix">

					<?php $menuClass = 'nav';

					$menuID = 'gallery';

					$primaryNav = '';

					if (function_exists('wp_nav_menu')) {

						$primaryNav = wp_nav_menu( array( 'theme_location' => 'gallery-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 

					};

					if ($primaryNav == '') { ?>

						<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">

							<?php if (get_option('elegantestate_swap_navbar') == 'false') { ?>

								<?php if (get_option('elegantestate_home_link') == 'on') { ?>

									<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','ElegantEstate') ?></a></li>

								<?php }; ?>

								

								<?php show_page_menu($menuClass,false,false); ?>

							<?php } else { ?>

								<?php show_categories_menu($menuClass,false); ?>

							<?php } ?>

						</ul> <!-- end ul#nav -->

					<?php }

					else echo($primaryNav); ?>

				</div> 
				</div>
<!-- end gallery menu -->









						<div id="et_pt_gallery" class="clearfix">

							<?php $gallery_query = ''; 

							if ( !empty($gallery_cats) ) $gallery_query = '&cat=' . implode(",", $gallery_cats);

							else echo '<!-- gallery category is not selected -->'; ?>

							<?php query_posts("showposts=$et_ptemplate_gallery_perpage&paged=$paged" . $gallery_query); ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								

								<?php $width = 207;

								$height = 136;

								$titletext = get_the_title();



								$thumbnail = get_thumbnail($width,$height,'portfolio',$titletext,$titletext,true,'Portfolio');

								$thumb = $thumbnail["thumb"]; ?>

								

								<div class="et_pt_gallery_entry">

									<div class="et_pt_item_image">

										<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'portfolio'); ?>

										<span class="overlay"></span>

										

										<a class="fancybox zoom-icon" title="<?php the_title(); ?>" rel="gallery" href="<?php echo($thumbnail['fullpath']); ?>"><?php _e('Zoom in','ElegantEstate'); ?></a>

										<a class="more-icon" href="<?php the_permalink(); ?>"><?php _e('Read more','ElegantEstate'); ?></a>

									</div> <!-- end .et_pt_item_image -->

								</div> <!-- end .et_pt_gallery_entry -->

								

							<?php endwhile; ?>

								<div class="page-nav clearfix">

									<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }

									else { ?>

										 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>

									<?php } ?>

								</div> <!-- end .entry -->

							<?php else : ?>

								<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>

							<?php endif; wp_reset_query(); ?>

						

						</div> <!-- end #et_pt_gallery -->

						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>

					</div> <!-- end .entry_content -->

					

				</div> <!-- .full_entry -->

				

				<?php if (get_option('elegantestate_show_pagescomments') == 'on') comments_template('', true); ?>

				

			</div> <!-- end #main-area -->



			<?php if (!$fullwidth) get_sidebar(); ?>

		

<?php get_footer(); ?>
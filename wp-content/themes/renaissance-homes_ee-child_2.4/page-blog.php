<?php 
/*
Template Name: Blog Page
*/
?>
<?php the_post(); ?>
<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];

$et_ptemplate_blogstyle = isset( $et_ptemplate_settings['et_ptemplate_blogstyle'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_blogstyle'] : (bool) $et_ptemplate_settings['et_ptemplate_blogstyle'];

$et_ptemplate_showthumb = isset( $et_ptemplate_settings['et_ptemplate_showthumb'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showthumb'] : (bool) $et_ptemplate_settings['et_ptemplate_showthumb'];

$blog_cats = isset( $et_ptemplate_settings['et_ptemplate_blogcats'] ) ? $et_ptemplate_settings['et_ptemplate_blogcats'] : array();
$et_ptemplate_blog_perpage = isset( $et_ptemplate_settings['et_ptemplate_blog_perpage'] ) ? $et_ptemplate_settings['et_ptemplate_blog_perpage'] : 10;
?>
<?php get_header(); ?>
		
	<div id="content-top" class="content-blog">
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
						
						
							<?php $cat_query = ''; 
							if ( !empty($blog_cats) ) $cat_query = '&cat=' . implode(",", $blog_cats);
							else echo '<!-- blog category is not selected -->'; ?>
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
								
									
									
																	
									
										
								
								
							<?php endwhile; ?>
								
									<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
									else { ?>
                                    
										 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
									<?php } ?>
								
							<?php else : ?>
								
							<?php endif; wp_reset_query(); ?>
						
						
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
					
				</div> <!-- .full_entry -->
				
				<?php if (get_option('elegantestate_show_pagescomments') == 'on') comments_template('', true); ?>
                
                
                
                <!-- smc added blog loop for special -->
               
                
				<?php $i = 1; ?>
				<?php 
				$args=array(
				   'showposts'=>get_option('elegantestate_homepage_posts'),
				   'paged'=>$paged,
				   'category__not_in' => get_option('elegantestate_exlcats_recent'),
				);
				if (get_option('elegantestate_duplicate') == 'false')
					$args['post__not_in']= $ids;
				 query_posts( "showposts=$et_ptemplate_blog_perpage&paged=$paged" . $cat_query ); ?>
               
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
				
                <!-- end smc added blog loop for special -->

                
                
                
                
				
			</div> <!-- end #main-area -->

			<?php if (!$fullwidth) get_sidebar(); ?>
		
<?php get_footer(); ?>
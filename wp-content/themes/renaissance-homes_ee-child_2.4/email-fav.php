<?php 
/*
Template Name: email-fav
*/
?>


<?php get_header(formsa); ?>


		
	<div id="content-top" class="content-page">
		<div id="menu-bg"></div>
		<div id="top-index-overlay"></div>

		<div id="content" class="clearfix">
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
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
					
				</div> <!-- .full_entry -->
				
				<?php if (get_option('elegantestate_show_pagescomments') == 'on') comments_template('', true); ?>
				
			</div> <!-- end #main-area -->

			<?php get_sidebar(forms); ?>
		
<?php get_footer(forms); ?>
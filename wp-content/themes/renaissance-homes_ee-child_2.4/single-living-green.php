<?php
	include(TEMPLATEPATH . '/includes/breadcrumbs.php');
?>
			<div class="full_entry clearfix">
				<?php if (get_option('elegantestate_thumbnails') == 'on') { ?>
					<?php
						$width = 159;
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
				<?php } ?>
			</div> <!-- end .full_entry -->
			
			<?php if (get_option('elegantestate_show_postcomments') == 'on') comments_template('', true); ?>
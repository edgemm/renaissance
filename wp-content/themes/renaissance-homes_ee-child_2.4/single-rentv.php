<?php

// set parent category to rentv - gfh
$GLOBALS['parent_cat'] = 265;

// get video URL
$yt_video_id = get_youtube_id( get_the_id() );

// get video transcript
$video_trans = get_post_meta($post->ID,'video_transcript',true);

// get description
$post_desc = get_the_content();

// check lengths of content and transcript - gfh
$charLim = 340;
$descLarge = strBigger( get_the_content(), $charLim );
$transLarge = strBigger( $video_trans, $charLim );

if ( !$descLarge ) $descShort = " shortText";
if ( !$transLarge ) $tranShort = " shortText";

// class for rentv video/image
$main_class = "rentv-featured";

// title for filter area
$filter_title = "Video Categories";

// display breadcrumbs
get_template_part('includes/breadcrumbs');
?>
<div class="full_entry rentv clearfix">
	<h1 class="single-title"><?php the_title(); ?></h1>
	<?php // display featured image if no video - gfh
	if ( isset( $yt_video_id ) || has_post_thumbnail() ) {					

		// show video if available, otherwise show featured image
		if ( isset( $yt_video_id ) ) {
			echo '<iframe class="' . $main_class . '" width="630" height="354" src="//www.youtube.com/embed/' . $yt_video_id . '?rel=0" frameborder="0" allowfullscreen></iframe>';
		} elseif ( has_post_thumbnail() ) {
			$attrs = array( 'class' => $main_class );
			the_post_thumbnail( 'full', $attrs );
		}
		
	}
	?>
	<div class="entry_content">
		
		<?php
		if ( isset( $yt_video_id ) ) {
		?>
		<ul class="rentv-nav clearfix">
			<li><a class="rentv-nav-item current" data-view="description" href="javascritp:void(0);">Description</a></li>
			<?php // display transcript option only if transcript is set - gfh
			if ( !empty( $video_trans ) ) echo '<li><a class="rentv-nav-item" data-view="transcript" href="javascritp:void(0);">Transcript</a></li>';
			?>
		</ul>
		<?php } ?>
		<div class="entry_description entry_text clipEntry current<?php echo $descShort; ?>" data-text="description">
			<?php the_content(); ?>
		</div>
		<?php
		if ( isset( $video_trans ) ) {
		?>
		<div class="entry_transcript entry_text clipEntry<?php echo $tranShort; ?>" data-text="transcript">
			<?php
			$trans_arr = preg_split("/[\r|\n]+/", $video_trans);

			foreach( $trans_arr as $a ) {
				echo '<p>' . $a . '</p>';
			}
			?>
		</div>
		<?php } ?>
		<?php // display more link only if needed - gfh
		if ( $descLarge || $transLarge ) echo '<p class="expand_text"><a class="expand_text_toggle" href="javascript:void(0);">Read More &raquo;</a></p>';
		?>
		<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
	</div> <!-- end .entry_content -->

	<?php
	// include posts from parent_cat and filters - gfh
	include( locate_template( 'includes/rh-filter-posts.php' ) );
	?>

	<?php if (get_option('elegantestate_integration_single_bottom') <> '' && get_option('elegantestate_integrate_singlebottom_enable') == 'on') echo(get_option('elegantestate_integration_single_bottom')); ?>

	<?php if (get_option('elegantestate_468_enable') == 'on') { ?>
		<?php if(get_option('elegantestate_468_adsense') <> '') echo(get_option('elegantestate_468_adsense'));
		else { ?>
			<a href="<?php echo(get_option('elegantestate_468_url')); ?>"><img src="<?php echo(get_option('elegantestate_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
		<?php } ?>	
	<?php } ?>
</div> <!-- end .full_entry -->

<?php if ( is_single() && get_option('elegantestate_show_postcomments') == 'on') comments_template('', true); ?>
<?php
// set filter subtitle based on parent category - gfh
switch( $GLOBALS['parent_cat'] ) {
	case 266:
		$archiveSubtitle = "What is Renaissance Homes up to in the community?";
		$catClassName = "giving-back";
		$archiveShowExcerpt = true;
		break;
}
?>


<div class="rh-archive">
	<h2 class="rh-archive-title"><?php echo $filter_title; ?></h2>
	<?php if( $archiveSubtitle ) echo '<p class="rh-archive-subtitle rh-subtitle">' . $archiveSubtitle . '</p>'; ?>

	<div class="rh-archive-content">

	<?php
	
	$args = array(
		'post_type'		=> 'post',
		'cat'			=> $GLOBALS['parent_cat'],
		'orderby'		=> 'date',
		'order' 		=> 'DSC',
		'posts_per_page'	=> -1
	);
	
	// The Query
	
	$the_query = new WP_Query( $args );
	
	if ($the_query->have_posts()) {
		while ( $the_query->have_posts() ) : $the_query->the_post();
			
		if ( get_the_id() != $GLOBALS['rh_current_post'] ) { // do not display post at top of page
	
			// featured image of post
			$thumb = '';
			$width = 230;
			$height = 142;
			$classtext = '';
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
			$thumb = $thumbnail["video-thmb"];
			
			$permalink = get_the_permalink();
			if( $GLOBALS['setTemplate'] ) $permalink = $permalink . "?tmpl=" . $GLOBALS['setTemplate'];
			?>	
		<div class="archive-post <?php echo $catClassName; ?>-post clearfix" data-template="<?php echo $GLOBALS['setTemplate']; ?>">
			<?php //if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="archive-thmb">
				<a href="<?php echo $permalink; ?>">
					<?php //print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<?php the_post_thumbnail( 'archive-thmb' ); ?>
				</a>
			</div> 	<!-- end .archive-thmb -->
			<?php } ?>
			<h2 class="title"><a class="title-link" href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h2>
			<?php // show excerpt for specific categories - gfh
			if( $archiveShowExcerpt ) { ?>
			<p class="archive-entry">
			<?php // create excerpt from post content
				$postContent = get_the_content(); // get post content to check length & print - gfh
				$postContent = strip_tags( strip_shortcodes( $postContent ) ); // remove HTML from content - gfh
				$postLength = 315; // length to cut off content on main page - gfh
			
				if ( strlen( $postContent ) > $postLength ) $postContent = substr( $postContent, 0, $postLength ) . "...";
				
				echo $postContent;
			?>
			</p>
			<a class="archive-entry-readmore" href="<?php echo $permalink; ?>" title="Read more of this article">Read More &raquo;</a>
			<?php } ?>
		</div> <!-- end .archive-post -->
	<?php
		} // end checking for post at top of page
	
	endwhile;
}
?>
	</div><!-- end .rh-archive-content -->
</div> <!-- end .rh-archive -->

<?php if (get_option('elegantestate_integration_single_bottom') <> '' && get_option('elegantestate_integrate_singlebottom_enable') == 'on') echo(get_option('elegantestate_integration_single_bottom')); ?>

<?php if (get_option('elegantestate_468_enable') == 'on') { ?>
	<?php if(get_option('elegantestate_468_adsense') <> '') echo(get_option('elegantestate_468_adsense'));
	else { ?>
		<a href="<?php echo(get_option('elegantestate_468_url')); ?>"><img src="<?php echo(get_option('elegantestate_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
	<?php } ?>	
<?php } ?>
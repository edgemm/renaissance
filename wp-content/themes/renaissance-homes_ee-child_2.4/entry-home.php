<?php
$thumb = '';
$width = 192;
$height = 108;
$classtext = '';
$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
$thumb = $thumbnail["video-thmb"];
?>
<div class="filter-post">
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="filter-thmb">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'video-thmb' ); ?>
		</a>
	</div> 	<!-- end .filter-thmb -->
	<?php } ?>
	<h2 class="title"><a class="title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p class="filter-entry">
	<?php // create excerpt from post content
		$postContent = get_the_content(); // get post content to check length & print - gfh
		$postContent = strip_shortcodes( $postContent ); // remove HTML from content - gfh
		$postContent = strip_tags( $postContent ); // remove HTML from content - gfh
		$postLength = 80; // length to cut off content on main page - gfh
	
		if ( strlen( $postContent ) > $postLength ) $postContent = substr( $postContent, 0, $postLength ) . "...";
		
		echo $postContent;
	?>
	</p>
	<!-- <a class="filter-entry-readmore" href="<?php the_permalink(); ?>" title="Read more of this article">Read More &raquo;</a> -->
</div> <!-- end .filter-post -->
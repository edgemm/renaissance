<?php

$parentCat = 265; // ID of parent cateogry - gfh

$catArgs = array(
	'type'          => 'post',
        'child_of'      => $GLOBALS['parent_cat'],
        'hide_empty'    => 1
);
$postCats = get_categories( $catArgs );
$postCatIds = array( $parentCat );

foreach( $postCats as $cats) {
    array_push( $postCatIds, $cats->cat_ID );
}

$sideArgs = array(
	'post_type'		=> 'post',
	'category__in'		=> $postCatIds,
	'orderby'		=> 'rand',
	'order' 		=> 'DSC',
	'posts_per_page'	=> 5
	);

$side_query = new WP_Query( $sideArgs );

?>

<div id="sidebar">
	<div class="sidebar-related">
		<h2 class="sidebar-headline">Related Videos</h2>
<?php 
if ($side_query->have_posts()) {
	while ( $side_query->have_posts() ) :
	
		$side_query->the_post();

		// featured image of post
		$thumb_attrs = array(
			'class' => 'filter-sidebar-thmb'
		);
		?>	
		<div class="sidebar-related-post">
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="filter-thmb sidebar-thmb">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'video-thmb', $thumb_attrs ); ?>
					<span class="overlay"><img class="filter-thmb-play" src="/wp-content/themes/renaissance-homes_ee-child_2.4/images/thmb-play.png" alt="Play" /></span>
				</a>
			</div> 	<!-- end .filter-thmb -->
			<?php } ?>
			<h2 class="title"><a class="title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div> <!-- end .filter-post -->
		<?php
		$i++;
	endwhile;
}
?>
	</div>
</div> <!-- end #sidebar -->
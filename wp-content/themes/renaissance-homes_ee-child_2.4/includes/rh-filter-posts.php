<?php
// set filter subtitle based on parent category - gfh
switch( $GLOBALS['parent_cat'] ) {
	case 252:
		$filterSubtitle = "What is Renaissance Homes up to in the community?";
		$catClassName = "giving-back";
		$filterShowExcerpt = true;
		break;
	case 253:
		$catClassName = "rentv";
		break;
}
?>


<div class="rh-filters">
	<h2 class="rh-filters-title"><?php echo $filter_title; ?></h2>
	<?php if( $filterSubtitle ) echo '<p class="rh-filter-subtitle rh-subtitle">' . $filterSubtitle . '</p>'; ?>
	<ul class="rh-post-filters clearfix">
		<li><a class="rh-post-filters-item selected" href="javascript:void(0)" data-filter="*">All</a></li>
	<?php

	$cat_args = array(
		'child_of'	=> $GLOBALS['parent_cat'],
		'hide_empty'	=> 1,
		'orderby'	=> 'name',
		'order'		=> 'ASC'
	);
	
	$categories = get_categories( $cat_args );
	
	foreach( $categories as $cats ) {
		$item =	'<li><a class="rh-post-filters-item" href="javascript:void(0);" ';

		// take name, make all lowercase and turn all spaces into hyphens
		$item .= 'data-filter=".' . strtolower( $cats->category_nicename ) . '"';
		$item .= '>';
		$item .= $cats->cat_name;
		$item .= '</a></li>';

		echo $item;
	}

	?>

	</ul>

	<div class="isoContent rh-filter-content">

	<?php
	
	$args = array(
		'post_type'		=> 'post',
		'cat'			=> $GLOBALS['parent_cat'],
		'orderby'		=> 'rand',
		'order' 		=> 'DSC',
		'posts_per_page'	=> 100
		);
	
	$i = 1;
	
	// The Query
	
	$the_query = new WP_Query( $args );
	
	if ($the_query->have_posts()) {
		while ( $the_query->have_posts() ) :
		
			$the_query->the_post();
	
			// featured image of post
			$thumb = '';
			$width = 192;
			$height = 108;
			$classtext = '';
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
			$thumb = $thumbnail["video-thmb"];
	
			// get all categories of post
			$categories = get_the_category();
			$catClass = ''; // store categories
	
			foreach( $categories as $postCats ) {
				$catClass .= " " . $postCats->category_nicename;
			}
			?>	
		<div class="filter-post <?php echo $catClassName; ?>-post<?php echo $catClass; ?>">
			<?php //if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="filter-thmb">
				<a href="<?php the_permalink(); ?>">
					<?php //print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<?php the_post_thumbnail( 'video-thmb' ); ?>
					<span class="overlay"><img class="filter-thmb-play" src="/wp-content/themes/renaissance-homes_ee-child_2.4/images/thmb-play.png" alt="Play" /></span>
				</a>
			</div> 	<!-- end .filter-thmb -->
			<?php } ?>
			<h2 class="title"><a class="title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php // show excerpt for specific categories - gfh
			if( $filterShowExcerpt ) { ?>
			<p class="filter-entry">
			<?php // create excerpt from post content
				$postContent = get_the_content(); // get post content to check length & print - gfh	
				$postLength = 150; // length to cut off content on main page - gfh
			
				if ( strlen( $postContent ) > $postLength ) {
					$pPos = strpos( $postContent, '</p>' );
			
					if ( $pPos !== false ) {
						$pPosEnd = $pPos + 4;
						$postExcerpt = substr( $postContent, 0, $pPosEnd );
						$postContent = $postExcerpt;
					} else {
						$postContent = substr( $postContent, 0, $postLength ) . "...";
					}
				}
				
				echo $postContent;
			?>
			</p>
			<a class="filter-entry-readmore" href="<?php the_permalink(); ?>" title="Read more of this article">Read More &raquo;</a>
			<?php } ?>
		</div> <!-- end .filter-post -->
		<?php
		$i++;
	endwhile;
}
?>
	</div><!-- end .rh-filter-content -->
</div> <!-- end .rh-filters -->

<?php if (get_option('elegantestate_integration_single_bottom') <> '' && get_option('elegantestate_integrate_singlebottom_enable') == 'on') echo(get_option('elegantestate_integration_single_bottom')); ?>

<?php if (get_option('elegantestate_468_enable') == 'on') { ?>
	<?php if(get_option('elegantestate_468_adsense') <> '') echo(get_option('elegantestate_468_adsense'));
	else { ?>
		<a href="<?php echo(get_option('elegantestate_468_url')); ?>"><img src="<?php echo(get_option('elegantestate_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
	<?php } ?>	
<?php } ?>
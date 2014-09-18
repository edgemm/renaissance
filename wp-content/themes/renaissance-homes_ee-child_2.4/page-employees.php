<?php
/* Template Name: Employees */
?>

<?php get_header(); ?>
<?php the_post(); ?>

<div id="content-top" class="fullwidth">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>

	<div id="content" class="clearfix fullwidth">
		<div id="main-area">
			<?php			
			get_template_part('includes/breadcrumbs');

			$GLOBALS['parent_cat'] = 271; // employees category			
			?>

			<div class="full_entry employees clearfix">
				
				<h1 class="single-title"><?php the_title(); ?></h1>
				<div class="heading-content"><?php the_content(); ?></div>

				<div class="sidefilter-content">
				<?php
		
				$args = array(
					'post_type'		=> 'post',
					'cat'			=> $GLOBALS['parent_cat'],
					'orderby'		=> 'rand',
					'order' 		=> 'DSC',
					'posts_per_page'	=> 100
				);
				
				$the_query = new WP_Query( $args );
				
				if ($the_query->have_posts()) {
					while ( $the_query->have_posts() ) :
					
						$the_query->the_post();
				
						// get all categories of post
						$categories = get_the_category();
						$catClass = ''; // store categories
				
						foreach( $categories as $postCats ) {
							$catClass .= " " . $postCats->category_nicename;
						}
				?>	
					<div class="sidefilter-post employee-post<?php echo $catClass; ?>" data-post_id="<?php the_ID(); ?>">
						<div class="sidefilter-thmb">
							<a href="<?php the_permalink(); ?>">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'thumbnail', array( 'class' => 'sidefilter-thmb' ) );
								} else {
									
								}
								?>
							</a>
						</div><!-- end .sidefilter-thmb -->
					</div> <!-- end .sidefilter-post -->
					<?php
					endwhile;
				}
				?>
				</div>
				<ul class="rh-sidefilters clearfix">
				<?php
			
				$cat_args = array(
					'child_of'	=> $GLOBALS['parent_cat'],
					'hide_empty'	=> 1,
					'orderby'	=> 'name',
					'order'		=> 'ASC'
				);
				
				$categories = get_categories( $cat_args );
				
				foreach( $categories as $cats ) {
					$item =	'<li><a class="rh-sidefilters-item" href="javascript:void(0);" ';
			
					// take name, make all lowercase and turn all spaces into hyphens
					$item .= 'data-filter=".' . strtolower( $cats->category_nicename ) . '"';
					$item .= '>';
					$item .= $cats->cat_name;
					$item .= '</a></li>';
			
					echo $item;
				}
			
				?>
					<li><a class="rh-sidefilters-item current" href="javascript:void(0)" data-filter="*">View All</a></li>			
				</ul>
			
			</div> <!-- end .full_entry -->
		</div> <!-- end #main-area -->
<?php get_footer(); ?>
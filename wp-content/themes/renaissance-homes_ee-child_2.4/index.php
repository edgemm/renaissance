<?php get_header(freshcat); ?>

<?php

if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');
if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');
if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');
if (is_category()) $post_number = get_option('elegantestate_catnum_posts');

// collect categories of all neighborhoods
$neighborhoods = array( 4, 165 ); // Neighborhood category IDs, include Metro and Vintage (not children of Neighborhood category)
$neighborhood_children = get_categories( array( 'child_of' => 137 ) );
foreach( $neighborhood_children as $c ) :
   array_push( $neighborhoods, $c->term_id );
endforeach;
//
$categories = get_the_category();
//$cat_ignore = array( 5, 9, 19, 62, 137 ); // categories: _Feature, _Move-in Ready, _Floor Plans, _Facebook, _Neighborhoods
// properly select neightborhood category
foreach( $categories as $c ) :
   if( in_array( $c->term_id, $neighborhoods ) ) :
      $cat_name = $c->cat_name;
      $cat_slug = $c->slug;
   endif;
endforeach;

?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>
                			
	<div id="content" class="clearfix">

		<div id="main-area">

			<div id="breadcrumbs-smc2">
				<a href="/">Home</a> <span class="separate">&raquo;</span> <a href="/<?php echo "$cat_slug"; ?>"><?php echo $cat_name; ?></a>
				<!--<a href="/">Home</a> <span class="separate">&raquo;</span> <a href="/metro-collection">Metro Collection</a>-->
			</div> <!-- .end smc breadcrumbs -->

			<?php $i = 1; ?>
			<?php global $query_string;
			
			$qry = $query_string . "&showposts=" . $post_number . "&paged=" . $paged;
			
			if ( is_category() ) :
				query_posts( $qry . "&cat=$cat" );
			else:
				query_posts( $qry );
			endif;
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php include('entry2.php'); ?>
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
			
			
		</div> <!-- end #main-area-->
		
		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>
    
<script type="text/javascript">
var myfavsave = $.cookie('myfav');
var _href = "/myfav?fav=";
$("a.read-more").attr("href", _href + myfavsave); 
</script>  
<?php get_header(freshcat); ?>

<?php if (is_archive()) $post_number = get_option('elegantestate_archivenum_posts');
if (is_search()) $post_number = get_option('elegantestate_searchnum_posts');
if (is_tag()) $post_number = get_option('elegantestate_tagnum_posts');
if (is_category()) $post_number = get_option('elegantestate_catnum_posts'); ?>

<div id="content-top" class="content-page">
	<div id="menu-bg"></div>
	<div id="top-index-overlay"></div>
                			
	<div id="content" class="clearfix">

		<div id="main-area">

			<div id="breadcrumbs-smc2">
				<a href="/">Home</a> <span class="separate">&raquo;</span> <a href="/<?php $categories = get_the_category();

					$cat_slug = $categories[0]->slug;
					echo "$cat_slug"; ?>"><?php
					$category = get_the_category(); 
					echo $category[0]->cat_name;
					?></a>
			</div> <!-- .end smc breadcrumbs -->

			<?php $i = 1; ?>
			<?php global $query_string; 
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
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
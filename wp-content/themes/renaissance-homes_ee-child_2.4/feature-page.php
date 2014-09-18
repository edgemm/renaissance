<?php
/* Template Name: feature-page */ 
?>

<?php get_header('home'); ?>
<?php the_post(); ?>

		
	
	<div id="container">	
		<div id="content" class="home-mod clearfix">			
			<div class="home_entry">
				<?php the_content(); ?>
				<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>				
			</div> <!-- .full_entry -->

			<?php get_sidebar("home"); ?>
			<div class="news_entries clearfix">
				<h2 class="news_headline">News</h2>
				<?php // feed of "_Special" news posts - gfh
				$news_args = array(
					'post_type'	=> 'post',
					'cat'		=> 14,
					'orderby'      => 'date',
					'order' => 'DSC',
					'posts_per_page' => 4
				);
				
				$news_query = new WP_Query( $news_args );
				
				if ($news_query->have_posts()) :
					while ( $news_query->have_posts() ) : $news_query->the_post();
						include('entry-home.php');
					endwhile;
				endif;
				wp_reset_query();
				?>

			</div> <!-- end .news_entries -->
		</div> <!-- end #content -->
	</div><!-- end #container -->

<?php get_footer('home'); ?>
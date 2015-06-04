<?php $first = 0; global $post_ID; ?>
<?php if ( wptouch_have_posts() ) { while ( wptouch_have_posts() ) { ?>

<?php wptouch_the_post(); ?>
<?php $first++; ?>

<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">

	<?php if ( is_sticky() ) echo '<div class="sticky-pushpin"></div>'; ?>

	<?php if ( classic_use_calendar_icons() || classic_use_thumbnail_icons() ) { ?>
		<?php if ( wptouch_get_comment_count() ) { ?> 
				<div class="comment-bubble <?php wptouch_comment_bubble_size(); ?>">
				<?php comments_number( '0', '1', '%' ); ?>
			</div>
		<?php } ?>
	<?php } ?>

	<?php if ( classic_use_calendar_icons() ) { ?>
		<?php include('../../Edgemm-smc-1.1/iphone/calendar-icons.php'); ?>	
	<?php } elseif ( classic_use_thumbnail_icons() ) { ?>
		<?php include('thumbnails2.php'); ?>
	<?php } ?>		
	
   
    
    
	<h2><a href="<?php wptouch_the_permalink(); ?>"><?php wptouch_the_title(); ?></a></h2>
    
     <!-- .product-types -->
   
   <?php $thumb = '';
	$width = 292;
	$height = 185;
	$classtext = '';
	$titletext = get_the_title();
	
	$thumb = $thumbnail["thumb"]; 
	$custom = get_post_custom($post->ID);
	$et_price = isset($custom["price"][0]) ? $custom["price"][0] : ''; 
	$et_address = isset($custom["et_address"][0]) ? $custom["et_address"][0] : '';
	
	$et_description = isset($custom["description"][0]) ? $custom["description"][0] : '';

$et_property_type = isset($custom["et_property_type"][0]) ? $custom["et_property_type"][0] : '';
$et_bedrooms_number = isset($custom["et_bedrooms_number"][0]) ? $custom["et_bedrooms_number"][0] : '';
$et_bathrooms_number = isset($custom["et_bathrooms_number"][0]) ? $custom["et_bathrooms_number"][0] : '';
$et_garages_number = isset($custom["et_garages_number"][0]) ? $custom["et_garages_number"][0] : '';
$et_square_footage = isset($custom["et_square_footage"][0]) ? $custom["et_square_footage"][0] : '';

	?>

 <!-- .product-types -->
    
    
    
    
    
    
 <?php if ($et_price <> '' ) {?>
						<span class="price2"><span><?php the_field('callout-text'); ?> <?php
 
if(get_field('hide_price'))
{
	
	
	
}

else {
 
?>
						<?php echo prettyPrice($et_price); } ?></span></span>
					<?php } ?>
    
    
        
       
      
      <div class="short"><?php echo($et_description); ?></div>
  
<div class="description2"><?php if ($et_bedrooms_number <> '') { ?><?php echo $et_bedrooms_number; ?> <?php _e('Bedroom','ElegantEstate');  ?> | <?php } ?><?php if ($et_bathrooms_number <> '') { ?><?php echo $et_bathrooms_number; ?> <?php _e('Bathroom','ElegantEstate');  ?> | <?php } ?><?php if ($et_garages_number <> '') { ?><?php echo $et_garages_number; ?> <?php _e('Car','ElegantEstate');  ?> | <?php } ?><?php if ($et_square_footage <> '') { ?><?php echo $et_square_footage; ?> <?php _e('sq ft','ElegantEstate');  ?><?php } ?></div>
    
 <div class="smcfix"></div>  

    
    
    
    

	<div class="date-author-wrap">
		<?php if ( !classic_use_calendar_icons() && classic_show_date_in_posts() ) { ?>
			<div class="<?php wptouch_date_classes(); ?>">
				<?php wptouch_the_time( 'F jS, Y' ); ?>
			</div>	
		<?php } ?>		
		<?php if ( classic_show_author_in_posts() ) { ?>
			<div class="post-author">
				<?php echo sprintf( __( 'by %s', 'wptouch-pro' ), get_the_author() ); ?> 
			</div>
		<?php } ?>
	</div>
					
	<?php if ( wptouch_has_tags() && classic_show_tags_in_posts() ) { ?>
		<div class="tags-and-categories">
			<?php _e( "Tags", "wptouch-pro" ); ?>: <?php wptouch_the_tags(); ?>
		</div>
	<?php } ?>
	
	<?php if ( wptouch_has_categories() && classic_show_categories_in_posts() ) { ?>
		<div class="tags-and-categories">
			<?php _e( "Categories", "wptouch-pro" ); ?>: <?php wptouch_the_categories(); ?>
		</div>
	<?php } ?>			
	<div class="<?php wptouch_content_classes(); ?> <?php if ( 1 == $first && !is_paged() ) { echo 'first-post'; } ?>">
		<?php if ( classic_mobile_first_full_post() && 1 == $first && !is_paged() ) { ?>

			<?php the_content(); ?>
			<a href="<?php wptouch_the_permalink(); ?>#comments" class="read-entry"><?php _e( "Comment On This Article", "wptouch-pro" ); ?></a>				

		<?php } elseif ( classic_mobile_show_all_full_post() ) { ?>

			<?php the_content(); ?>
			<a href="<?php wptouch_the_permalink(); ?>#comments" class="read-entry"><?php _e( "Comment On This Article", "wptouch-pro" ); ?></a>				

		<?php } else { ?>

			<?php the_excerpt(); ?>
			<a href="<?php wptouch_the_permalink(); ?>" class="read-entry"><?php _e( "View Details", "wptouch-pro" ); ?></a>

		<?php } ?>				
	</div>

</div><!-- .wptouch_posts_classes() -->

<?php } } ?>

<?php if ( wptouch_has_next_posts_link() ) { ?>
	<?php if ( !classic_is_ajax_enabled() ) { ?>	
		<div class="posts-nav post rounded-corners-8px">
			<div class="left"><?php previous_posts_link( __( "Back", "wptouch-pro" ) ) ?></div>
			<div class="right clearfix"><?php next_posts_link( __( "Next", "wptouch-pro" ) ) ?></div>
		</div>
	<?php } else { ?>
		<a class="load-more-link no-ajax" href="javascript:return false;" rel="<?php echo get_next_posts_page_link(); ?>">
			<?php _e( "Load More Entries&hellip;", "wptouch-pro" ); ?>
		</a>
	<?php } ?>
<?php } ?>
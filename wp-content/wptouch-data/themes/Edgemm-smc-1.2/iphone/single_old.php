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


<?php get_header(); ?>	

	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">

			
				
                
                
                
                <?php if ( in_category(9) ) { ?>
<?php include('thumbnails2.php'); ?>
<?php } else { ?>
<?php include('thumbnails.php'); ?>
<?php } ?>
                
			

			<h2><?php wptouch_the_title(); ?></h2>
            
            
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
						<span class="price2"><span><?php echo($et_price); ?></span></span>
					<?php } ?>
    
    
        
       
      
       <div class="short"><?php echo($et_description); ?></div>
  
<div class="description2"><?php if ($et_bedrooms_number <> '') { ?><?php echo $et_bedrooms_number; ?> <?php _e('Bedroom','ElegantEstate');  ?> | <?php } ?><?php if ($et_bathrooms_number <> '') { ?><?php echo $et_bathrooms_number; ?> <?php _e('Bathroom','ElegantEstate');  ?> | <?php } ?><?php if ($et_garages_number <> '') { ?><?php echo $et_garages_number; ?> <?php _e('Car','ElegantEstate');  ?> | <?php } ?><?php if ($et_square_footage <> '') { ?><?php echo $et_square_footage; ?> <?php _e('sq ft','ElegantEstate');  ?><?php } ?></div>
  
            
            
            
			<div class="date-author-wrap">
				<?php if ( classic_show_date_single() ) { ?>
					<div class="<?php wptouch_date_classes(); ?>">
						<?php _e( "Published on", "wptouch-pro" ); ?> <?php wptouch_the_time( 'F jS, Y' ); ?>
					</div>			
				<?php } ?>	
				<?php if ( classic_show_author_single() ) { ?>
					<div class="post-author">
						<?php _e( "Written by", "wptouch-pro" ); ?>: <?php the_author(); ?> 
					</div>
				<?php } ?>	
			</div>
		</div>
        
        
        
        
        
        
        
        	
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">

		<!-- text for 'back and 'next' is hidden via CSS, and replaced with arrow images -->
			<div class="post-navigation nav-top">
				<div class="post-nav-fwd">
					<?php classic_get_next_post_link(); ?>
				</div>				
				<div class="post-nav-middle">
					<?php if ( wptouch_get_comment_count() > 0 ) echo '<a href="javascript: return false" class="middle-link no-ajax">' . __( "Skip to Responses", "wptouch-pro" ) . '</a>' ; ?>
				</div>
				<div class="post-nav-back">
						<?php classic_get_previous_post_link(); ?>
				</div>
			</div>

			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php wptouch_the_content(); ?>

				<?php if ( classic_show_cats_single() || classic_show_tags_single() || wp_link_pages( 'echo=0' ) ) { ?>
                
                
                
                
                
                
                
                
                
                
                
					<div class="single-post-meta-bottom">
						<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Article Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          
	
						<?php if ( classic_show_cats_single() ) { ?>
							<div class="post-page-cats"><?php _e( "Categories", "wptouch-pro" ); ?>: <?php if ( the_category( ', ' ) ) the_category(); ?></div>
						<?php } ?>
	
						<?php if ( classic_show_tags_single() ) { ?>					
							<?php if ( function_exists( 'get_the_tags' ) ) the_tags( '<div class="post-page-tags">' . __( 'Tags', 'wptouch-pro' ) . ': ', ', ', '</div>' ); ?>  
						<?php } ?>
						
						<?php if ( classic_show_share_single() ) { ?>		
							<div id="action-buttons">			
								<a href="javascript:void(0);" id="share-toggle" class="grey-button no-ajax"><?php _e( "Share Article", "wptouch-pro" ); ?></a>
								&nbsp; &nbsp;
								<a href="javascript:void(0);" id="instapaper-toggle" class="grey-button no-ajax"><?php _e( "Save to Instapaper", "wptouch-pro" ); ?></a>
							</div>
							<ul id="share-links" class="post rounded-corners-8px">
								<li id="twitter">
									<a class="no-ajax" target="_blank" href="http://m.twitter.com/home/?status=<?php echo urlencode( html_entity_decode( wptouch_get_title() . ' -> ' . get_permalink() ) ); ?>"><?php _e( "Share on Twitter", "wptouch-pro" ); ?></a>
								</li>
								<li id="facebook">
									<a class="no-ajax" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title();?>"><?php _e( "Share on Facebook", "wptouch-pro" ); ?></a>
								</li>
								<li id="email">
									<a class="no-ajax" href="mailto:?subject=<?php
								wptouch_get_bloginfo('site_title'); ?>%20-%20<?php the_title_attribute();?>&body=<?php _e( "Check out this article:", "wptouch" ); ?>%20<?php the_permalink(); ?>"><?php _e( "Share via E-Mail", "wptouch-pro" ); ?></a>
								</li>
								<li id="delicious">
									<a class="no-ajax" target="_blank" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&title=<?php the_title();?>"><?php _e( "Save to Del.icio.us", "wptouch-pro" ); ?></a>
								</li>
							</ul>
						<?php } ?>

					</div>   
				<?php } ?>

			</div>

			<div class="post-navigation nav-bottom">
				<div class="post-nav-fwd">
					<?php classic_get_next_post_link(); ?>
				</div>	
				<div class="post-nav-middle">
					<a href="#header" class="back-to-top no-ajax"><?php _e( "Back to Top", "wptouch-pro" ); ?></a>
				</div>
				<div class="post-nav-back">
					<?php classic_get_previous_post_link(); ?>
				</div>
			</div>
		</div><!-- wptouch_posts_classes() -->

		<?php } ?>

		<?php comments_template(); ?>

<?php get_footer(); ?>
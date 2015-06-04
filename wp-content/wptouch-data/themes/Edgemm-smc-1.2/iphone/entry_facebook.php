<?php $blogcat = get_cat_ID(get_option('elegantestate_blog_cat')); ?>

	<?php $thumb = '';
	$width = 292;
	$height = 185;
	$classtext = '';
	$titletext = get_the_title();
	$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,true);
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

	<div class="entry<?php if ($i%2==0) echo ' second'; if ($i<3) echo ' first'; ?>">
		<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
			<div class="thumbnail">
				
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<span class="overlay2"></span>
					<?php if ($et_price <> '' ) {?>
						<span class="price2"><span><?php echo($et_price); ?></span></span>
					<?php } ?>
				</a>
			</div> 	<!-- end .thumbnail -->
		<?php } ?>
		<div class="title-smc"><h3 class="title"><a href="<?php the_permalink(); ?>" target="blank"><?php the_title(); ?></a></h3></div>
        

        
		<div class="hr2"></div> 
        
        
        <div class="products-smc">
        
        <div class="product-types clearfix">
        
       
      
     <div class="description">
      <p><?php echo($et_description); ?></p>
   </div> <!-- .description -->
   
    <?php if ($et_bedrooms_number <> '') { ?>
         <?php echo $et_bedrooms_number; ?> <?php _e('Bedroom','ElegantEstate');  ?> | </span>
      <?php } ?>
      <?php if ($et_bathrooms_number <> '') { ?>
         <?php echo $et_bathrooms_number; ?> <?php _e('Bathroom','ElegantEstate');  ?> | </span>
      <?php } ?>
      <?php if ($et_garages_number <> '') { ?>
           <?php echo $et_garages_number; ?> <?php _e('Car','ElegantEstate');  ?> | </span>
        <?php } ?>
      <?php if ($et_square_footage <> '') { ?>
         <?php echo $et_square_footage; ?> <?php _e('sq ft','ElegantEstate');  ?></span>
      <?php } ?>
   

	  
	 
       
      
      
   </div> <!-- .product-types -->
        
        </div>
        
        
		
		<a href="<?php the_permalink(); ?>" target="_blank" class="readmore"><span><?php _e('view details','ElegantEstate'); ?></span></a>
	</div> <!-- end .entry -->

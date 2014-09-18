<?php $custom = get_post_custom($post->ID);
$et_price = isset($custom["price"][0]) ? $custom["price"][0] : '';
if ($et_price <> '') $et_price = get_option('elegantestate_cur_sign') . $et_price;
$et_description = isset($custom["description"][0]) ? $custom["description"][0] : '';
$et_property_type = isset($custom["et_property_type"][0]) ? $custom["et_property_type"][0] : '';
$et_bedrooms_number = isset($custom["et_bedrooms_number"][0]) ? $custom["et_bedrooms_number"][0] : '';
$et_bathrooms_number = isset($custom["et_bathrooms_number"][0]) ? $custom["et_bathrooms_number"][0] : '';
$et_garages_number = isset($custom["et_garages_number"][0]) ? $custom["et_garages_number"][0] : '';
$et_square_footage = isset($custom["et_square_footage"][0]) ? $custom["et_square_footage"][0] : '';

$et_band =  isset($custom["et_band"][0]) ? $custom["et_band"][0] : '';

$integrate_gmaps = ( isset($custom["integrate_gmaps"][0]) && $custom["integrate_gmaps"][0] == 1 ) ? true : false;
/*$latidude = isset($custom["et_latitude"][0]) ? $custom["et_latitude"][0] : '40.713279732514515';
$longtitude = isset($custom["et_longtitude"][0]) ? $custom["et_longtitude"][0] : '-74.00542840361595'; */
$et_address = isset($custom["et_address"][0]) ? $custom["et_address"][0] : '270 Park Ave. New York';

$custom["thumbs"] = unserialize($custom["thumbs"][0]); ?>
  <div id="breadcrumbs-smc">
  <a href="/">Home</a> <span class="separate">&raquo;</span> <a href="<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>"><?php
$category = get_the_category(); 
echo $category[0]->cat_name;
?></a>



    
      </div> <!-- .end smc breadcrumbs -->

<?php if ($et_band <> '') { ?>
   <span class="band<?php echo(' '.$et_band); ?>"></span>
<?php }; ?>


<?php if (!empty($custom["thumbs"])) { ?>
   <div id="product-slider">
      <div id="product-slides">
         <?php for ($i = 0; $i <= count($custom["thumbs"])-1; $i++) { ?>
            <div class="item-slide">
               <a href="<?php echo($custom["thumbs"][$i]); ?>" class="fancybox">
                  <img src="<?php bloginfo('template_directory') ?>/timthumb.php?src=<?php echo et_multisite_thumbnail($custom["thumbs"][$i]); ?>&amp;w=293&amp;h=293&amp;zc=1" alt="" />
                  <span class="overlay"></span>
               </a>
            </div> <!-- .item-slide -->
         <?php }; ?>
      </div> <!-- #product-slides -->
      

      <?php if ($et_price <> '') { ?>
         <span class="price2"><span><?php the_field('callout-text'); ?> <?php
 
if(get_field('hide_price'))
{
	
	
	
}
else {
   if ( is_numeric( $et_price ) ) {
      echo prettyPrice($et_price);
   } else {
      echo $et_price;
   }
} ?></span></span>
      <?php }; ?>
   </div> <!-- #product-slider -->
<?php }; ?>
<div class="product-info">
   <h1 class="title"><?php the_title(); ?></h1>

  
  
   <div class="product-types clearfix">
      
     
      
     
     
     
     <div class="description">
     
      
      <p><?php echo($et_description); ?></p>
   
    
	  
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
         <?php echo $et_square_footage; ?> <?php _e('square ft','ElegantEstate');  ?></span>
      <?php } ?>
      
         </div> <!-- .description -->

   </div> <!-- .product-types -->
   <p></p>
   
   
  

</div> <!-- #product-info -->

<!-- #smc menu's -->
<!--This array of numbers for categories you do not want to have any buttons-->
<?php if ( in_category( array( 105, 64) ) ) { ?>
<?php } else { ?>
<div class="post-menu-smc">

    <h1 class="title-smc">Neighborhood Links</h1>

<!--This array of numbers for categories you do not want to have a MIR button-->

<p>
<?php if ( in_category( array( 92, 169, 172 ) ) ) { ?>
<?php } else { ?>
			    <a href="/category/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>+quick-move-ins" class="readmore-smc"><span>Move-In Ready</span></a>
<?php } ?>

<?php
// hide floorplan and amenities links for categories
//if ( !in_category( array( 123 ) ) ) { ?>
<a href="/category/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>+floor-plans" class="readmore-smc"><span>Available Floorplans</span></a>

<a href="/amenities/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>-included-finishes-and-features" class="readmore-smc"><span>Amenities</span></a>
<?php // } ?>

<a href=/contact-agent class="readmore-smc"><span>Contact Agent</span></a></p>
                          
                          

                          
</div>
<?php } ?>


                          


<div class="clear"></div>

<?php if (count($custom["thumbs"]) > 1) { ?>
</div>
</div>
<div class="post2 clearfix">
   <div id="product-thumbs" class="clearfix">
      <div id="product-thumb-items">
         <div id="smallthumbs">
            <?php for ($i = 0; $i <= count($custom["thumbs"])-1; $i++) { ?>
               <a href="#" class="small-controller<?php if($i==0) echo(' active'); if ($i==count($custom["thumbs"])-1) echo(' last') ?>" rel="<?php echo($i+1); ?>">
                  <img src="<?php bloginfo('template_directory') ?>/timthumb.php?src=<?php echo et_multisite_thumbnail($custom["thumbs"][$i]); ?>&amp;w=49&amp;h=49&amp;zc=1" alt="" />
                  <span class="overlay"></span>
               </a>
            <?php }; ?>
         </div>
         <a href="#" id="left-arrow"><?php _e('Previous','ElegantEstate');?></a>
         <a href="#" id="right-arrow"><?php _e('Next','ElegantEstate');?></a>
      </div> <!-- #product-thumb-items -->
   </div> <!-- #product-thumbs -->
<?php }; ?>

<!-- start smc floorplan code-->
<?php
$buttonlink_smc = get_field('floorplan_smc');
$buttonname_smc = get_field('floorplan_name');
if(get_field('floorplan_smc')){?>
<h2><?php the_field('listing_sub_title'); ?></h2>
    
<?php /*?><?php echo do_shortcode('[button id="button-fix" link="' . $buttonlink_smc . '" color="silver" newwindow="yes"] ' . $buttonname_smc . '[/button]'); ?>
<?php */?>
<a class="smallsilver2" id="button-fix2" target="blank" href="<?php echo $buttonlink_smc; ?>" onclick="_gaq.push(['_trackEvent', 'click', 'floorplan', 'floorplan button']);">View <?php echo $buttonname_smc; ?></a>
<?php } else { ?>   
<?php }; ?>
<!-- end smc floorplan code-->

<?php the_content(); ?>

<!-- start smc contact code-->
 <?php 
            if(get_field('agent_email'))
{ ?>
	
    <h4><strong>Contact</strong></h4>
              
               <p><?php the_field('agent_name'); ?> | <a onclick="_gaq.push(['_trackEvent', 'click', 'emails', 'agent-email']);" href="mailto:<?php the_field('agent_email'); ?>"><?php the_field('agent_email'); ?></a> | <a onclick="_gaq.push(['_trackEvent', 'click', 'calls', 'agent-call']);" href="tel:<?php the_field('agent_phone'); ?>"><?php the_field('agent_phone'); ?></a>
               
               
<?php 
            if(get_field('mls'))
{ ?>
               
                | MLS# <?php the_field('mls'); ?>
    
<?php }?></p>
<?php } ?>               
               
               
               
<?php 
            if(get_field('second_agent_email'))
{ ?>
	
              
               <p><?php the_field('second_agent_name'); ?> | <a onclick="_gaq.push(['_trackEvent', 'click', 'emails', 'agent-email']);" href="mailto:<?php the_field('second_agent_email'); ?>"><?php the_field('second_agent_email'); ?></a> | <a onclick="_gaq.push(['_trackEvent', 'click', 'calls', 'agent-call']);" href="tel:<?php the_field('second_agent_phone'); ?>"><?php the_field('second_agent_phone'); ?></a>
               
               <?php 
            if(get_field('mls'))
{ ?>
               
               
               
                | MLS# <?php the_field('mls'); ?>
          
<?php } ?></p>
<?php } ?>
<!-- end smc contact code-->

<?php // display related posts if box is not checked - gfh
if ( !get_field( 'show_related_content' ) ) { ?>
<div class="related clearfix">
        <h3 class="related-headline">Related Content</h3>
        <div class="related-posts">
<?php
        $args = array(
                'post_type'		=> 'post',
                'category__not_in'	=> array( 136, 281 ),
                'orderby'      		=> 'rand',
                'posts_per_page' 	=> 5
        );

        remove_all_filters('posts_orderby');
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) {
                while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        include( locate_template( 'includes/entry-related-post.php' ) );					
                endwhile;
        }
?>
        </div>
</div>
<?php
wp_reset_query();
}
?>
<div class="clear"></div>

<?php $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(" ", "+", $et_address).'&sensor=false');

$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;

?>

<?php if ($integrate_gmaps) { ?>
<?php $price_clean = array("COMING SOON", "SOLD", "Sold", "coming soon", "Coming Soon", "sold"); ?>
<?php echo do_shortcode( '[srp_profile lat="' . $lat . '" lng="' . $long . '" address="' . $et_address . '" listing_price="'.str_replace($price_clean, "", $et_price).'"]' ) ?>
   
   
   <?php }; ?>
<div class="addtoany_share_save_container">
<?php if( function_exists('ADDTOANY_SHARE_SAVE_KIT') ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
</div>
<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
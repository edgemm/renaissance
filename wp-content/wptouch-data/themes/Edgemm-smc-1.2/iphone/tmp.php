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
  <a href="/index.php">Home</a> <span class="separate">&raquo;</span> <a href="<?php $categories = get_the_category();
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
         <span class="price2"><span><?php echo($et_price); ?></span></span>
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

<?php if ( in_category(105) ) { ?>

<?php } else { ?>
<div class="post-menu-smc">

    <h1 class="title-smc">Neighborhood Links</h1>


                          <p><a href="/category/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>+quick-move-ins" class="readmore-smc"><span>Move-In Ready</span></a>

<a href="/category/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>+floor-plans" class="readmore-smc"><span>Available Floorplans</span>></a>

<a href="/amenities/<?php $categories = get_the_category();
$cat_slug = $categories[0]->slug;
echo "$cat_slug"; ?>-included-finishes-and-features" class="readmore-smc"><span>Amenities</span></a></p> 

<a href=/contact-agent class="readmore-smc"><span>Contact Agent</span></a></p>
                          
                          
                                                       
                          
</div>
<?php } ?>



                          



<div class="clear"></div>

<?php if (count($custom["thumbs"]) > 1) { ?>
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

<?php the_content(); ?>
<div class="clear"></div>

<?php if ($integrate_gmaps) { ?>
   <div id="gmaps-border">
      <div id="gmaps-container"></div>
   </div> <!-- end #gmaps-border -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.1&sensor=true"></script>
   <script type="text/javascript">
      //<![CDATA[
      var map;
      var geocoder;

      initialize();

      function initialize() {
         geocoder = new google.maps.Geocoder();
         geocoder.geocode({
            'address': '<?php echo $et_address; ?>',
            'partialmatch': true}, geocodeResult);   
      }

      function geocodeResult(results, status) {
         
         if (status == 'OK' && results.length > 0) {         
            var latlng = new google.maps.LatLng(results[0].geometry.location.b,results[0].geometry.location.c);
			var myOptions = {
			   zoom: 10,
			   center: results[0].geometry.location,
			   mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			
			map = new google.maps.Map(document.getElementById("gmaps-container"), myOptions);
			   var marker = new google.maps.Marker({
			   position: results[0].geometry.location,
			   map: map,
			   title:"<?php the_title(); ?>"
			});

            var contentString = '<div id="content">'+
            '<h3 id="firstHeading" class="firstHeading" style="padding-bottom: 15px;">'+marker.title+'</h3>'+
            '<div id="bodyContent">'+
            '<p><a target="_blank" href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='+escape(results[0].formatted_address)+'&amp;ie=UTF8&amp;view=map">'+results[0].formatted_address+'</a>'+
            '</p>'+
            '</div>'+
            '</div>';
            //&amp;sll=29.67226,-94.873971

            var infowindow = new google.maps.InfoWindow({
               content: contentString,
               maxWidth: 300
            });

            google.maps.event.addListener(marker, 'click', function() {
               infowindow.open(map,marker);
            });

            google.maps.event.trigger(marker, "click");

         } else {
            //alert("Geocode was not successful for the following reason: " + status);
         }
      }
      //]]>
   </script>
<?php }; ?>

<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
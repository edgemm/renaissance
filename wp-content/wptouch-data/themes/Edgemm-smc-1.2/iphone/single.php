<!-- .product-types -->
   
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

						<div>

			<div class="<?php wptouch_content_classes(); ?>">
           <?php 
            if(get_field('agent_email'))
{ ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="center"><a onclick="_gaq.push(['_trackEvent', 'click', 'emails', 'agent-email']);" href="mailto:<?php the_field('agent_email'); ?>" id="button-fix2" class="smallsilver2">Email Agent</a></td>
                <td width="50%" align="center"><a onclick="_gaq.push(['_trackEvent', 'click', 'calls', 'agent-call']);" href="tel:<?php the_field('agent_phone'); ?>" id="button-fix2" class="smallsilver2">Call Agent</a></td>
              </tr>
            </table>
<?php } ?>
            
            
             
            
           

<?php
$argsThumb = array(
	'numberposts'    => 1,
	'orderby'        => 'post_date', 
	'order'          => 'DESC',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'image',
	'post_status'    => null
);
$attachments = get_posts($argsThumb);
if ($attachments) {
	foreach ($attachments as $attachment) {
		//echo apply_filters('the_title', $attachment->post_title);
		echo '<div class="wptouch-image-attachment"><img src="'.wp_get_attachment_url($attachment->ID, 'thumbnail', false, false).'" /></div>';
	}
}
?>
            
            
				
				<!-- start smc floorplan code-->
<?php

$buttonlink_smc = get_field('floorplan_smc');
$buttonname_smc = get_field('floorplan_name');


if(get_field('floorplan_smc')){?>

<h2><?php the_field('listing_sub_title'); ?></h2>
    
<?php /*?><?php echo do_shortcode('[button id="button-fix" link="' . $buttonlink_smc . '" color="silver" newwindow="yes"] ' . $buttonname_smc . '[/button]'); ?>
<?php */?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a class="smallsilver2" id="button-fix2" target="blank" href="<?php echo $buttonlink_smc; ?>" onclick="_gaq.push(['_trackEvent', 'click', 'floorplan', 'floorplan button']);">View <?php echo $buttonname_smc; ?></a>
</td>
  </tr>
</table>



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
                
                
                
</div>
				<?php if ( classic_show_cats_single() || classic_show_tags_single() || wp_link_pages( 'echo=0' ) ) { ?>
                
                
                
                
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
               maxWidth: 200
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

 


<?php get_footer(); ?>
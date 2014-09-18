<?php
$postid = get_the_ID();
?>
<script>
function myfav_add<?php echo $postid; ?>() 
{
 // The function code goes here
_gaq.push(['_trackEvent', 'click', 'myfav', 'addfav']);
 // Create a cookie
var $=jQuery;
var myfavsave = $.cookie('myfav');
var postid = ",<?php echo $postid; ?>";
var myfavadded = myfavsave + postid;
$.cookie
	(
'myfav', myfavadded,
		{ 
		// The "expires" option defines how many days you want the cookie active. The default value is a session cookie, meaning the cookie will be deleted when the browser window is closed.
		expires: 360, 
		// The "path" option setting defines where in your site you want the cookie to be active. The default value is the page the cookie was defined on.
		path: '/' 
		
		} 
	);
/*$('#range_form').trigger('submit');	
*/
 $('#addmyfav<?php echo $postid; ?>').replaceWith('<div class="addmyfav" id="addmyfav<?php echo $postid; ?>"><a href="#" onClick="myfav_remove<?php echo $postid; ?>();return false">Remove from Favorites</a></div>') 
var myfavsave = $.cookie('myfav');
var _href = "/myfav?fav=";
$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);
}
function myfav_remove<?php echo $postid; ?>() 
{
	
 // The function code goes here
 // Create a cookie
var $=jQuery;
var myfavsave = $.cookie('myfav');
var myfavremove = myfavsave.replace(",<?php echo $postid; ?>","");
$.cookie
	(
'myfav', myfavremove,
		{ 
		// The "expires" option defines how many days you want the cookie active. The default value is a session cookie, meaning the cookie will be deleted when the browser window is closed.
		expires: 360, 
		// The "path" option setting defines where in your site you want the cookie to be active. The default value is the page the cookie was defined on.
		path: '/' 
		
		} 
	);
	
/*$('#range_form').trigger('submit');*/
$('#addmyfav<?php echo $postid; ?>').replaceWith('<div class="addmyfav" id="addmyfav<?php echo $postid; ?>"><a href="#" onClick="myfav_add<?php echo $postid; ?>();return false">Add to Favorites</a></div>') 
var myfavsave = $.cookie('myfav');
var _href = "/myfav?fav=";
$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);
}
</script>

<?php $blogcat = get_cat_ID(get_option('elegantestate_blog_cat')); ?>
<?php if ( ( ( is_category() && in_subcat($blogcat,$cat) ) || ( !is_category() && is_archive() ) ) || get_option('elegantestate_blog_style') == 'on' ) { ?>
	<?php if ($i==1) include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
    
   
	
	<?php $thumb = '';
	$width = 159;
	$height = 159;
	$classtext = '';
	$titletext = get_the_title();
	$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
	$thumb = $thumbnail["thumb"]; ?>
	
	<div class="full_entry clearfix">
    
    
    
    
		<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
			<div class="small-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<span class="overlay"></span>
				</a>
			</div> 	<!-- end .small-thumb -->
		<?php } ?>
		
		<div class="entry_content<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') echo(' setwidth') ?>">
			<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            
			<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
			<?php if (get_option('elegantestate_blog_style') == 'false') { ?>
				<p><?php truncate_post(300); ?></p>
			<?php } else { ?>
				<?php the_content(); ?>
			<?php } ?>
		</div> <!-- end .entry_content -->
		<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('Read more','ElegantEstate'); ?></span></a>
	</div> <!-- end .full_entry -->
<?php } else { ?>
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
    
<div class="addmyfav" id="addmyfav<?php echo $postid; ?>"><a href="#" onClick="myfav_add<?php echo $postid; ?>();return false">Add to Favorites</a></div>
<script>
var $=jQuery;
var myfav = $.cookie('myfav');
var myfavarray = myfav.split(',');
if ( $.inArray( '<?php echo $postid; ?>', myfavarray ) > -1 )
 { $('#addmyfav<?php echo $postid; ?>').replaceWith('<div class="addmyfav" id="addmyfav<?php echo $postid; ?>"><a href="#" onClick="myfav_remove<?php echo $postid; ?>();return false">Remove from Favorites</a></div>') }
 
var myfavsave = $.cookie('myfav');
var _href = "/myfav?fav=";
$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);
</script>
  
		<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
			<div class="thumbnail">
				<a href="<?php echo($thumbnail['fullpath']); ?>" class="fancybox">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<span class="overlay2"></span>
					<?php if ($et_price <> '' ) {?>
						<span class="price2"><span><?php the_field('callout-text'); ?> <?php
 
if(get_field('hide_price'))
{
	
	
	
}
else {
 
?>
						<?php echo prettyPrice($et_price); } ?></span></span>
					<?php } ?>
				</a>
			</div> 	<!-- end .thumbnail -->
		<?php } ?>
		<div class="title-smc"><h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
        
        
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
        
        
		
		<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('view details','ElegantEstate'); ?></span></a>
	</div> <!-- end .entry -->
<?php } ?>
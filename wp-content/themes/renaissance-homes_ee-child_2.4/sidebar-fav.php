 <!-- Reference the theme's stylesheet on the Google CDN -->
 
 <script>
 
function myfav_reset() 
{
 // The function code goes here

var $=jQuery;


$.cookie("myfav", null); 
}
</script>
 


<?php
$myfavcookie = $_COOKIE['myfav'];

$postid = get_the_ID();

$myfavremove = str_replace(",$postid", '', $myfavcookie);

?>


<div id="sidebar" class="aside-myFav">
<form name="range_form" method="post" action="#" id="range_form"></form>

    
    <div class="widget">
    
   <div id="filter-space"></div> 
   
   <h4 class="widgettitle">My Favorites</h4> 
<script>

var $=jQuery;

var myfav = $.cookie('myfav');

var myfavarray = myfav.split(',');

if ( $.inArray( '<?php echo $postid; ?>', myfavarray ) > -1 )
 { $('#addmyfav<?php echo $postid; ?>').replaceWith('<div class="addmyfav" id="addmyfav<?php echo $postid; ?>"><a href="#" onClick="myfav_remove<?php echo $postid; ?>();return false">Remove from Favorites</a></div>') }


</script>
		
        <div id="save-share">

          

<a href="#" class="read-more" onclick="history.back();return false">Back</a>

<a href="?reset" class="read-more" onClick="myfav_reset();">Reset My Favorites</a>


</div>

		</div>
<div class="widget">
   <h4 class="widgettitle">Email Favorites</h4> 
    <?php echo do_shortcode( '[contact-form-7 id="10621" title="Email My fav"]' ); ?>
</div>

 
</div>




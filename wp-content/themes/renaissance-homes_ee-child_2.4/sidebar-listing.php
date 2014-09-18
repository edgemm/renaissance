<?php
$myfavcookie = $_COOKIE['myfav'];
$myfavcheck = explode( ',', $myfavcookie ) ;
$postid = get_the_ID();
$myfavremove = str_replace(",$postid", '', $myfavcookie);
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

$('#save-share').replaceWith('<div id="save-share"><a href="?removed" class="read-more" onClick="myfav_remove<?php echo $postid; ?>(); return false;">Remove Favorite</a><a href="http://www.renaissance-homes.com/myfav?fav=" class="read-more">Go to Favorites</a></div>')

var myfavsave = $.cookie('myfav');

var _href = "/myfav?fav=";

$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);

}
function myfav_remove<?php echo $postid; ?>() 

{

 // The function code goes here

 /// Create a cookie


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

		// The "domain" option will allow this cookie to be used for a specific domain, including all subdomains (e.g. labs.openviewpartners.com). The default value is the domain of the page where the cookie was created.

		} 

	);

$('#save-share').replaceWith('<div id="save-share"><a href="?added" class="read-more" onClick="myfav_add<?php echo $postid; ?>(); return false;">Add to Favorites</a><a href="http://www.renaissance-homes.com/myfav?fav=" class="read-more">Go to Favorites</a></div>')

var myfavsave = $.cookie('myfav');

var _href = "/myfav?fav=";

$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);

 
}


</script> 


<div id="sidebar" class="aside-myFav">
    <div class="widget">
   <div id="filter-space"></div>
   <h4 class="widgettitle">Save to Favorites</h4> 

<div id="save-share">

<a href="?added" class="read-more" onClick="myfav_add<?php echo $postid; ?>(); return false;">Add to Favorites</a><a href="http://www.renaissance-homes.com/myfav?fav=" class="read-more">Go to Favoritess</a>


</div>
 

    
<script>
var myfavsave = $.cookie('myfav');

var _href = "/myfav?fav=";

$("a.read-more, a.myFav-link").attr("href", _href + myfavsave);	
	

var $=jQuery;

var myfav = $.cookie('myfav');

var myfavarray = myfav.split(',');

if ( $.inArray( '<?php echo $postid; ?>', myfavarray ) > -1 )
 { $('#save-share').replaceWith('<div id="save-share"><a href="?removed" class="read-more" onClick="myfav_remove<?php echo $postid; ?>(); return false;">Remove Favorite</a><a href="http://www.renaissance-homes.com/myfav?fav=" class="read-more">Go to Favorites</a></div>') }
 
var myfavsave = $.cookie('myfav');

var _href = "/myfav?fav=";

$("a.read-more, a.myFav-link").attr("href", _href + myfavsave); 
       
</script>    
</div>
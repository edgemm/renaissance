<?php
/*

Template Name: page my fav single

*/


?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script src="jquery.cookie.js"></script>

<?php

$myfavcookie = $_COOKIE['myfav'];

$myfavcheck = explode( ',', $myfavcookie ) ;

$postid = '9041';

$myfavremove = str_replace(",$postid", '', $myfavcookie);

?>

<script>
function myfav_add() 
{
 // The function code goes here
 
 _gaq.push(['_trackEvent', 'click', 'myfav', 'addfav']);
 
 // Create a cookie
$.cookie
	(
'myfav', '<?php echo $myfavcookie; ?>,<?php echo $postid; ?>',

		{ 
		// The "expires" option defines how many days you want the cookie active. The default value is a session cookie, meaning the cookie will be deleted when the browser window is closed.
		expires: 360, 
		// The "path" option setting defines where in your site you want the cookie to be active. The default value is the page the cookie was defined on.
		path: '/' 
		// The "domain" option will allow this cookie to be used for a specific domain, including all subdomains (e.g. labs.openviewpartners.com). The default value is the domain of the page where the cookie was created.
		
		} 
	);
}

function myfav_remove() 
{
 // The function code goes here
 // Create a cookie
$.cookie
	(
'myfav', '<?php echo $myfavremove?>',
		{ 
		// The "expires" option defines how many days you want the cookie active. The default value is a session cookie, meaning the cookie will be deleted when the browser window is closed.
		expires: 360, 
		// The "path" option setting defines where in your site you want the cookie to be active. The default value is the page the cookie was defined on.
		path: '/' 
		// The "domain" option will allow this cookie to be used for a specific domain, including all subdomains (e.g. labs.openviewpartners.com). The default value is the domain of the page where the cookie was created.
		} 
	);
}

function myfav_reset() 
{
 // The function code goes here
$.cookie("myfav", null); 
}
</script>

<a href="http://www.renaissance-homes.com/myfav?fav=<?php echo $_COOKIE['myfav'];?>">Go to My Favorites</a>

<br>
<br>

<a href="?reset&fav=<?php echo $_COOKIE['myfav'];?>" onClick="myfav_reset();">Reset My Favorites</a>

<br>
<br>

<?php 
if (in_array($postid, $myfavcheck)) { ?>

<a href="?remove&fav=<?php echo $_COOKIE['myfav'];?>" onClick="myfav_remove();">Remove this listing</a>

<?php } else { ?>

<a href="?add&fav=<?php echo $_COOKIE['myfav'];?>" onClick="myfav_add();">Add this listing</a

><?php } ?>

<br>
<br>

test <?php echo $_COOKIE['myfav'] ; ?>
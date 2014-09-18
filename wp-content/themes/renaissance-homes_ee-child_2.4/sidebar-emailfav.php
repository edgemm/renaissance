<?php $myfavs3 = $_GET["fav"]; ?>
<?php $sender = $_GET["sender"]; ?>








<div id="sidebar" class="aside-myFav">



<form name="range_form" method="post" id="range_form"></form>






    



    <div class="widget">



    



   <div id="filter-space"></div> 



   



   <h4 class="widgettitle">Emailed Favorites</h4> 



		



        <div id="save-share">





<script type="text/javascript">
    function myfav_add_all() {
        
		 // The function code goes here



 // Create a cookie
 
 function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}



var $=jQuery;

var myfavsave = $.cookie('myfav');

if (myfavsave = "null") {

var myfavsavefix = myfavsave.replace("null","");
var myfavemail = getUrlVars()["fav"];
var myfavsave2 = myfavemail + myfavsavefix;
	
	
} else {

var myfavemail = getUrlVars()["fav"];
var myfavsave2 = myfavemail + myfavsave;	
	
}



var myfavemail = getUrlVars()["fav"];

var myfavsave2 = myfavemail + myfavsavefix;


$.cookie



	('myfav', myfavsave2,		{ 


		// The "expires" option defines how many days you want the cookie active. The default value is a session cookie, meaning the cookie will be deleted when the browser window is closed.

		expires: 360, 

		// The "path" option setting defines where in your site you want the cookie to be active. The default value is the page the cookie was defined on.

		path: '/' } );
		


		
		
$('#range_form').trigger('submit');	
        
    }
</script>

<a class="read-more" onclick="myfav_add_all(); return false;" href="#">Add All</a>








<?php



$myfavs2 = $_COOKIE['myfav'];



 



 if ( $myfavs2 == "" )



 { ?>







<a href="/move-in-ready" class="read-more">New Search</a>











<?php } else { ?>




<a class="read-more" href="http://www.renaissance-homes.com/myfav?fav=<?php echo $_COOKIE['myfav']; ?>" rel="group">Your Favorites</a>







<?php } ?>


<p><?php echo $sender; ?> selected these Favorites.</p>
<em>To add them to your Favorites,
<br>select them individually by clicking
<br>Add to Favorites above the image
<br>or click Add All.</em>













		</div>















     



</div>
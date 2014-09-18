<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?></title>

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<!--[if lt IE 7]>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>

	<script type="text/javascript">DD_belatedPNG.fix('img#logo, #wrapper, #header, div#top-menu, #featured .overlay, #featured, #featured .description, #featured .description span.price, #featured span.price span, a.readmore, a.readmore span, div.hr, #controllers span#active-arrow, #featured a#left-arrow, #featured a#right-arrow, #content-top, .entry div.hr2, span.price2, span.price2 span, #content-bottom, #sidebar h4.widgettitle, #listings-bottom, #listings, input.view-button, .entry div.thumbnail span.overlay2, body.index #content-top, #menu-bg, body.index #top-index-overlay, span.overlay, .reply-container, .reply-container a, #product-thumb-items a#left-arrow , #product-thumb-items a#right-arrow');</script>

<![endif]-->

<!--[if IE 7]>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7style.css" />

<![endif]-->

<!--[if IE 8]>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie8style.css" />

<![endif]-->



<script type="text/javascript">

	document.documentElement.className = 'js';

</script>



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>





<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --> 

 

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --> 

		
 
 
 
  <!-- Reference jQuery and jQuery UI from the CDN. Remember
       that the order of these two elements is important -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

<script src="/jquery.cookie.js"></script>


		<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.5.5/jquery.validate.min.js" type="text/javascript"></script> 

		<script type="text/javascript">

					//jQuery.noConflict();

 

		$(document).ready(function() {

			

			var validator = $("#lassoSignupForm").validate({

				errorLabelContainer: $('#errorContainer'),

				errorClass: 'error',

				rules: {

					FirstName: "required",

					LastName: "required",

					"Emails[Primary]": { required: true, email: true },

					"Phones[Home]": "required",

 

				},

				messages: {

					FirstName: "Please enter a first name",

					LastName: "Please enter a last name",

					"Emails[Primary]": "Please enter an email address",

					"Phones[Home]": "Please enter your telephone number",

			

				}

			});

 

	});

		</script> 
        

  <script type="text/javascript">
function saveScrollPositions(theForm) {
if(theForm) {
var scrolly = typeof window.pageYOffset != 'undefined' ? window.pageYOffset : document.documentElement.scrollTop;
var scrollx = typeof window.pageXOffset != 'undefined' ? window.pageXOffset : document.documentElement.scrollLeft;
theForm.scrollx.value = scrollx;
theForm.scrolly.value = scrolly;
}
}
</script>

    
    
    

<script type="text/javascript" src="http://www.renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.3/ga_social_tracking.js"></script> 


<script type="text/javascript" src="http://www.renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.3/lunametrics-youtube.js"></script>
</head>

<?php 

$myfavcookie = $_COOKIE['myfav'];

$myfavcheck = explode( ',', $myfavcookie ) ;



?>




<body<?php if (is_home()) echo(' class="home"'); else echo(' class="index"'); ?> onLoad="JavaScript:checkRefresh();" onUnload="JavaScript:prepareForRefresh();">

 


 
	<div id="wrapper">

		<div id="container"<?php global $fullwidth; if ( is_page_template('page-full.php') || $fullwidth ) echo 'class="fullwidth"'; ?>>	

			<div id="header">

				

                <div id="logo-phone"><a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('elegantestate_logo') <> '') ? get_option('elegantestate_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?>

	  <img src="<?php echo $logo; ?>" alt="Logo" id="logo"/></a>

      

<!--<div id="best-builder"><a href="http://www.renaissance-homes.com/renaissance-homes-wins-“builder-of-the-year”-award" alt="Renaissance Homes 2011 Builder of the Year Award" title="Renaissance Homes Wins 2011 Builder of the Year Award"><img src="http://www.renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.2/images/2011-builder-of-the-year.png" alt="Renaissance Homes 2011 Builder of the Year Award"/></a></div>-->

      <div id=myfavs>
<a href="http://www.renaissance-homes.com/myfav?fav=<?php echo $_COOKIE['myfav']; ?>">My Favorites</a>      </div>

                  <div id="phone">

                  

                  

               

                  

                  </div>

              </div>



<div id="top-menu">

					<?php $menuClass = 'nav';

					$menuID = 'primary';

					$primaryNav = '';

					if (function_exists('wp_nav_menu')) {

						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 

					};

					if ($primaryNav == '') { ?>

						<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">

							<?php if (get_option('elegantestate_swap_navbar') == 'false') { ?>

								<?php if (get_option('elegantestate_home_link') == 'on') { ?>

									<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','ElegantEstate') ?></a></li>

								<?php }; ?>

								

								<?php show_page_menu($menuClass,false,false); ?>

							<?php } else { ?>

								<?php show_categories_menu($menuClass,false); ?>

							<?php } ?>

						</ul> <!-- end ul#nav -->

					<?php }

					else echo($primaryNav); ?>

				</div> <!-- end #top-menu -->

				

				

			</div> 	<!-- end #header -->




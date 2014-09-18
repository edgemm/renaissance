<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php echo get_post_meta($post->ID,'google-ab-code',true); ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="bsdFEL0SBohaVInal81_Pgq48-99amglL3xolXLJTL0" />
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
       
<!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
-->
<!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>       
-->       
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
-->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="/jquery.cookie.js"></script>

		<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.5.5/jquery.validate.min.js" type="text/javascript"></script> 
		<script type="text/javascript">
					//jQuery.noConflict();
 
		jQuery(document).ready(function ($) {
			
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


<body<?php if ( is_home() || is_front_page() || is_page( 14818) ) echo(' class="home"'); else echo(' class="index"'); ?> >
 

 
	<div id="wrapper">
		<?php if( is_front_page() || is_page( 14818) ) { ?>
		<div class="rh-slides">
		<?php // get from home slides post type with SlidesJS plugin - gfh
		// WP_Query arguments
		
		$slide_args = array (
			'post_type'		=> 'home_slider',
			'posts_per_page'	=> -1,
			'meta_key'		=> 'rh_home_slide_order',
			'orderby'		=> 'meta_value_num',
			'order'			=> 'ASC'
		);
		
		// The Query
		$slides = new WP_Query( $slide_args );
		
		// The Loop
		if ( $slides->have_posts() ) {
			while ( $slides->have_posts() ) {
				$slides->the_post();
				if( !get_field( 'rh_home_archive_slide' ) ) include( locate_template( 'includes/rh-slides-home.php' ) );
			}
		}
		
		// Restore original Post Data
		wp_reset_postdata(); ?>
		</div>
		<?php } // end check for home page ?>

		<?php // navigation menu - gfh
		include( locate_template( 'includes/rh-header-navigation.php' ) );
		?>
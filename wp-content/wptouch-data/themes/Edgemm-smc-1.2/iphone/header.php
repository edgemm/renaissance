<?php

// manual redirect to fix plugin conflict with updated WP core
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( $url == "http://renaissance-homes.com/" || $url == "http://www.renaissance-homes.com/" ) :

	header( 'Location: http://www.renaissance-homes.com/category/quick-move-ins/' ) ;

endif;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php wptouch_bloginfo('html_type'); ?>; charset=<?php wptouch_bloginfo('charset'); ?>" />
	<title><?php wptouch_title(); ?></title>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wptouch_head(); ?>
	<link type="text/css" rel="stylesheet" media="screen" href="<?php classic_the_static_css_url( 'iphone' ); ?>?version=<?php classic_the_static_css_version( 'iphone' ); ?>"></link>

<?php // redirect if move-in-ready page
if( is_page( 10347 ) ) {
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|android|ipad|playbook|silk|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	header('Location: http://renaissance-homes.com/category/quick-move-ins');
}
?>
    
<script type="text/javascript" src="http://renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.3/ga_social_tracking.js"></script> 
<script type="text/javascript" src="http://renaissance-homes.com/wp-content/themes/renaissance-homes_ee-child_2.3/lunametrics-youtube.js"></script>

    
</head>
<?php flush(); ?>
<body class="<?php wptouch_body_classes(); ?>">
<!-- New noscript check, we need js on always folks to do cool stuff -->
<noscript>
	<div id="noscript">
		<h2><?php _e( "Notice", "wptouch-pro" ); ?></h2>
		<p><?php _e( "JavaScript is currently off.", "wptouch-pro" ); ?></p>
		<p><?php _e( "Turn it on in browser settings to view this mobile website.", "wptouch" ); ?></p>
	</div>
</noscript>
	<?php if ( wptouch_has_welcome_message() ) { ?>
		<div id="welcome-message">
			<?php wptouch_the_welcome_message(); ?>
			<br /><br /><br />
			<a href="<?php wptouch_the_welcome_message_dismiss_url(); ?>" id="close-msg" role="button"><?php _e( "Close Message", "wptouch-pro" ); ?></a>	
		</div>
	<?php } ?>
	<?php if ( wptouch_prowl_tried_to_send_message() ) { ?>
		<div id="prowl-message" class="rounded-corners-8px">
			<?php if ( wptouch_prowl_message_succeeded() ) { ?>
				<span class="success"><?php _e( "Message sent successfully.", "wptouch-pro" ); ?></span>
			<?php } else { ?>
				<span class="failed"><?php _e( "Your message failed to send. Please try again.", "wptouch-pro" ); ?></span>
			<?php } ?>
		</div>
	<?php } ?>
	<div id="outer-ajax" class="testaroonie">
		<div id="inner-ajax">
			<div id="header">
				<?php if ( classic_mobile_has_logo() ) { ?>
					<a id="custom-logo-title" href="<?php wptouch_bloginfo( 'url' ); ?>" role="button">&nbsp;</a>
						<?php classic_mobile_logo_img(); ?>
				<?php } else { ?>
					<?php if ( classic_mobile_show_site_icon() ) { ?>
						<a href="<?php wptouch_bloginfo( 'url' ); ?>">
							<img id="logo-icon" src="<?php wptouch_the_site_menu_icon( WPTOUCH_ICON_HOME ) ; ?>" alt="logo" role="button" />
						</a>
					<?php } ?>
					<a id="logo-title" href="<?php wptouch_bloginfo( 'url' ); ?>" role="button">
						<?php wptouch_bloginfo( 'site_title' ); ?>
					</a>
				<?php } ?>
				<!-- If you disable the menu this menu button won't show, so you'll have to roll your own! -->
				<?php if ( wptouch_has_menu() ) { ?>
					<?php if ( classic_mobile_has_menu_icon() ) { ?>
						<a id="header-menu-toggle" class="no-ajax" href="#" role="button">
							<img src="<?php wptouch_bloginfo( 'template_directory' ); ?>/images/menu_toggle_icon.png" alt="menu image" />
						</a>
					<?php } else { ?>
						<a id="header-menu-toggle" class="no-ajax" href="#" role="button">
							<?php _e( "Menu", "wptouch-pro" ); ?>
						</a>
					<?php } ?>
				<?php } ?>
			</div>
			
			<!-- This brings in menu.php // remove it and the whole menu won't show at all -->
			<?php if ( wptouch_has_menu() ) { ?>
				<div id="main-menu" class="closed">
					<!-- The Hidden Search Bar -->
					<div id="search-bar">
						<div id="wptouch-search-inner">
							<form method="get" id="searchform" action="<?php wptouch_bloginfo( 'search_url' ); ?>/">
								<input type="text" name="s" id="search-input" tabindex="1" placeholder="<?php _e( 'Search', 'wptouch-pro' ); ?>&hellip;" />
								<input name="submit" type="hidden" id="search-submit-hidden" tabindex="2" />
							</form>
						</div>		
					</div>
					<!-- The WPtouch Tab-Bar // includes Page Menu -->
					<?php include_once( 'tab-bar.php' ); ?>	
				</div>
			<?php } ?>
			
			<?php do_action( 'wptouch_body_top' ); ?>
		
			<div id="content">
				<div id="wptouch-ad">
					<?php do_action( 'wptouch_advertising_top' ); ?>
				</div>
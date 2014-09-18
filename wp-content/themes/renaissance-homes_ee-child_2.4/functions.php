<?php

/*// Ajax Function to Load PHP Function myfunctionform1  smc 11/22/2013
add_action('wp_ajax_getmyfunctionform1', 'myfunctionform1');
add_action('wp_ajax_nopriv_getmyfunctionform1', 'myfunctionform1');

function myfunctionform1() { ?>

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
					FirstName: "Please enter a first name<br/>",
					LastName: "Please enter a last name<br/>",
					"Emails[Primary]": "Please enter an email address<br/>",
					"Phones[Home]": "Please enter your telephone number",
			
				}
			});
 
		});
</script>

    <div class="widget">
    
    <div id="lassoside">
    
<form method="post" name="lassoSignupForm" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php">

<input type="hidden" name="RatingID" value="19769">

<input type="hidden" name="ClientID" value="467" />
<input type="hidden" name="ProjectID" value="1472" />
<input type="hidden" name="SignupEmailLink" value="" />
<input type="hidden" name="SignupEmailSubject" value="" />
<input type="hidden" name="SignupThankyouLink" value="http://renaissance-homes.com/thank-you-for-signing-up" />
<input type="hidden" name="domainAccountId" value="LAS-756396-01" />
<input type="hidden" name="guid" value="" />
<input type="hidden" name="LassoUID" value="(9zAztkHGM" />

<h4 class="widgettitle">Newsletter Signup</h4>

<table width="0" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>First Name:</td>
  </tr>
  <tr>
    <td><input type="text" name="FirstName" value="" size="20" id="FirstName" /></td>
  </tr>
  <tr>
    <td>Last Name:</td>
  </tr>
  <tr>
    <td><input type="text" name="LastName" value="" size="20" id="LastName" /></td>
  </tr>
  <tr>
    <td>Email:</td>
  </tr>
  <tr>
    <td><input type="text" name="Emails[Primary]" value="" size="20" /></td>
  </tr>
  <tr>
    <td><input name="submit" type="submit" class="submit" value="Subscribe" /></td>
  </tr>
</table>
</form>
<div id="errorContainer"></div>
</div>
    </div>

<?php die(); }
// end Ajax Function to Load PHP Function myfunctionform1 smc 11/22/2013


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}*/

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

// add thumbnail sizes for RH - gfh
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'home-featured', 241, 99, true );
	add_image_size( 'video-thmb', 192, 108, true );
	add_image_size( 'archive-thmb', 230, 142, true );
	add_image_size( 'featured-view', 443, 249, true );
	add_image_size( 'employee', 350, 700 );
}

// add widget areas - gfh
add_action( 'after_setup_theme', 'rh_setup_theme' );
if ( ! function_exists( 'rh_setup_theme' ) ){
	function rh_setup_theme(){
		register_sidebar( array(
			'name' => 'Footer',
			'id' => 'footer',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>'
		));
	}
}

// custom post type for home page sliders - gfh
add_action( 'init', 'register_rh_home_slider' );

// add script for menu - gfh
function rh_scripts() {
	// generic scripts used across site - gfh
	wp_enqueue_script( 'rh-scripts', get_stylesheet_directory_uri() . '/js/rh-scripts.js', array(), '1.0.0', true );
	// living green scripts
	if ( is_page_template('page-living-green.php') ) wp_enqueue_script( 'living-green-scripts', get_stylesheet_directory_uri() . '/js/rh-living-green.js', array(), '1.0.0', true );
	// employees scripts
	if ( is_page_template('page-employees.php') ) {
		wp_enqueue_script( 'employee-scripts', get_stylesheet_directory_uri() . '/js/rh-employees.js', array(), '1.0.0', true );
	}
	// scripts for posts with filters
	$filter_cats = array( 265 );
	if ( ( is_page_template('page-giving-back.php') || ( is_page_template('page-rentv.php') ) ) || ( in_category( $filter_cats ) || post_is_in_descendant_category( $filter_cats ) ) ) {
		wp_enqueue_script( 'jquery-isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'filter-options-scripts', get_stylesheet_directory_uri() . '/js/rh-filter-options.js', array(), '1.0.0', true );
	}
	// home sliders
	if( is_home() || is_front_page() ) {
		// home sliders	
		wp_enqueue_script( 'jquery-slidesjs', get_stylesheet_directory_uri() . '/js/jquery.slides.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'slides-scripts', get_stylesheet_directory_uri() . '/js/rh-slides.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'rh_scripts' );

// custom post type for home page sliders - gfh
add_action( 'init', 'register_rh_home_slider' );

function register_rh_home_slider() {

    $labels = array( 
        'name' => _x( 'Home Sliders', 'home_slider' ),
        'singular_name' => _x( 'Home Slider', 'home_slider' ),
        'add_new' => _x( 'Add New Home Slider', 'home_slider' ),
        'add_new_item' => _x( 'Add New Home Slider', 'home_slider' ),
        'edit_item' => _x( 'Edit Home Slider', 'home_slider' ),
        'new_item' => _x( 'New Home Slider', 'home_slider' ),
        'view_item' => _x( 'View Home Slider', 'home_slider' ),
        'search_items' => _x( 'Search Home Sliders', 'home_slider' ),
        'not_found' => _x( 'No home sliders found', 'home_slider' ),
        'not_found_in_trash' => _x( 'No home sliders found in Trash', 'home_slider' ),
        'parent_item_colon' => _x( 'Parent Home Slider:', 'home_slider' ),
        'menu_name' => _x( 'Home Sliders', 'home_slider' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'Slider Order' ),
        'public' => true,
        'show_ui' => true,        
        'menu_position' => 100,        
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'home_slider', $args );
}

// get ID of YouTube video for specific post - gfh
function get_youtube_id( $p ) {
   $f_video_url = get_post_meta($p,'video_url',true);
   parse_str( parse_url( $f_video_url, PHP_URL_QUERY ), $f_video );
   
   return $f_video['v'];
}

// employee modal content
add_action('wp_ajax_get_employee', 'get_employee');
add_action('wp_ajax_nopriv_get_employee', 'get_employee');

function get_employee() {
   $post_id = $_POST['p_id'];
   $post_data = get_post($post_id);
   
   // get video URL
   $result['video_id'] = get_youtube_id( $post_id );

   $result['title'] = $post_data->post_title;
   $result['content'] = apply_filters('the_content', $post_data->post_content);
   $result['img'] = get_the_post_thumbnail( $post_id, 'employee', array( 'class' => 'employee-thmb' ) );

   echo json_encode($result);
   
   die();
}

function prettyPrice( $p ) {
   if( is_numeric( $p ) ) {
	// add extra if price > 1 million
	if ( strlen( $p ) > 6 ) $pBig = substr( $p, 0, -6 ) . ",";
	$pp = "$";
	$pp .= $pBig;
	$pp .= substr( $p, -6, 3 );
	$pp .= ",";
	$pp .= substr( $p, -3, 3 );
   } else {
	$pp = $p;
   }
   
   return $pp;
}

// check if string is longer than defined length (arg1 and arg2) - gfh
function strBigger( $c, $l ) {
  $large = ( strlen( $c ) > $l ) ? true : false;
  return $large;
}


function emailfavlinkcode() {
	return $_GET["fav"];
}
add_shortcode('emailfavlink', 'emailfavlinkcode');




function lasso1() {

    return '

	

	<div>



<form method="post" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php"> 



<input type="hidden" name="ClientID" value="467" />

<input type="hidden" name="ProjectID" value="1472" />

<input type="hidden" name="SignupEmailLink" value="http://www.renaissance-homes.com/eflyers/auto/index.html" />

<input type="hidden" name="SignupEmailSubject" value="Thank you for your interest in Renaissance Homes" />

<input type="hidden" name="SignupThankyouLink" value="http://www.renaissance-homes.com/thank-you" />

<input type="hidden" name="domainAccountId" value="LAS-756396-01" />

<input type="hidden" name="guid" value="" />

<input type="hidden" name="LassoUID" value="(9zAztkHGM" />



<div id="errorContainer"></div>

<p><strong>First Name</strong>

  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 



  <strong>Last Name</strong>

  <input type="text" name="LastName" value="" size="20" id="LastName" /> 



</p>

<p>  

  <strong>Address</strong>

<input type="text" name="Address" value="" size="25" id="Address" />

</p>

<p> 

  <strong>City</strong>

  <input type="text" name="City" value="" size="10" id="City" />

  <strong>State</strong>

<select name="Province">

  <option value="">

    <option value="AL">Alabama

      <option value="AK">Alaska

        <option value="AZ">Arizona

        <option value="AR">Arkansas

        <option value="CA">California

        <option value="CO">Colorado

        <option value="CT">Connecticut

        <option value="DE">Delaware

        <option value="FL">Florida

        <option value="GA">Georgia

        <option value="HI">Hawaii

        <option value="ID">Idaho

        <option value="IL">Illinois

        <option value="IN">Indiana

        <option value="IA">Iowa

        <option value="KS">Kansas

        <option value="KY">Kentucky

        <option value="LA">Louisiana

        <option value="ME">Maine

        <option value="MD">Maryland

        <option value="MA">Massachusetts

        <option value="MI">Michigan

        <option value="MN">Minnesota

        <option value="MS">Mississippi

        <option value="MO">Missouri

        <option value="MT">Montana

        <option value="NE">Nebraska

        <option value="NV">Nevada

        <option value="NH">New Hampshire

        <option value="NJ">New Jersey

        <option value="NM">New Mexico

        <option value="NY">New York

        <option value="NC">North Carolina

        <option value="ND">North Dakota

        <option value="OH">Ohio

        <option value="OK">Oklahoma

        <option value="OR">Oregon

        <option value="PA">Pennsylvania

        <option value="RI">Rhode Island

        <option value="SC">South Carolina

        <option value="SD">South Dakota

        <option value="TN">Tennessee

        <option value="TX">Texas

        <option value="UT">Utah

        <option value="VT">Vermont

        <option value="VA">Virginia

        <option value="WA">Washington

        <option value="DC">Washington D.C.

        <option value="WV">West Virginia

        <option value="WI">Wisconsin

        <option value="WY">Wyoming

      </SELECT> 



<strong>Zip</strong>

<input type="text" name="PostalCode" value="" size="10" />

</p>

<p><strong>Home  phone*</strong>

  <input type="text" name="Phones[Home]" value="" size="10" />

  <strong>Cell*</strong>

  <input type="text" name="Phones[Cell]" value=""  size="10" />

  <strong>Email</strong>

  <input type="text" name="Emails[Primary]" value="" size="20" /> 

</p>



<p><strong>How  would you like us to follow up with you?</strong><br />

  Phone<input name="ContactPreference" type="radio" value="Phone" />

  Email<input name="ContactPreference" type="radio" value="Email" />

  Mail<input name="ContactPreference" type="radio" value="Mail" />

  Any<input name="ContactPreference" type="radio" value="Any" />

</p> 



<p><strong>How  did you hear about us?</strong><br />

  <textarea name="How Heard" cols="40" rows="3" id="14029"></textarea>

</p> 

<p><strong>What  neighborhood are you interested in?</strong><br /> 

<input type="checkbox" name="Questions[14138][]" value="66777" />Renaissance Vintage – Portland

<br>

<input type="checkbox" name="Questions[14138][]" value="66776" />

Renaissance Woods – Lake Oswego

<br>

<input type="checkbox" name="Questions[14138][]" value="66775" />

Rosemont Pointe – West Linn

<br>

<input type="checkbox" name="Questions[14138][]" value="98896" />

Renaissance at Rychlick Farm - Sherwood

<br>

<input type="checkbox" name="Questions[14138][]" value="66774" />

Other



<input type="text" name="Questions[14139]" value="" maxlength="5000" size="30" />

</p> 



<p><strong>Is  there something specific you are looking for in your next home?</strong><br />

  <textarea name="Questions[14140]" cols="40" rows="3"></textarea>

</p> 



<p><strong>Comments:</strong><br /> 

<textarea name="Comments" cols="40" rows="3"></textarea></p>


		<input name="submit" type="submit" class="submit" value="Submit" />

</p> 



<p><em>*By providing a phone number, I authorize Renaissance  Homes to call me.</em></p> 



</form></div>

    

  ';

}





add_shortcode('lasso1', 'lasso1');



function lasso2() {

    return '

	

		<div>



<form method="post" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php"> 



<input type="hidden" name="ClientID" value="467" />

<input type="hidden" name="ProjectID" value="1472" />

<input type="hidden" name="SignupEmailLink" value="" />

<input type="hidden" name="SignupEmailSubject" value="" />

<input type="hidden" name="SignupThankyouLink" value="http://www.renaissance-homes.com/thank-you" />

<input type="hidden" name="domainAccountId" value="LAS-756396-01" />

<input type="hidden" name="guid" value="" />

<input type="hidden" name="LassoUID" value="(9zAztkHGM" />



<input type="hidden" name="RatingID" value="19798" />



<div id="errorContainer"></div>

<p><strong>First Name</strong>

  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 



  <strong>Last Name</strong>

  <input type="text" name="LastName" value="" size="20" id="LastName" /> 



</p>

<p>  

  <strong>Address</strong>

<input type="text" name="Address" value="" size="25" id="Address" />

</p>

<p> 

  <strong>City</strong>

  <input type="text" name="City" value="" size="10" id="City" />

  <strong>State</strong>

<select name="Province">

  <option value="">

    <option value="AL">Alabama

      <option value="AK">Alaska

        <option value="AZ">Arizona

        <option value="AR">Arkansas

        <option value="CA">California

        <option value="CO">Colorado

        <option value="CT">Connecticut

        <option value="DE">Delaware

        <option value="FL">Florida

        <option value="GA">Georgia

        <option value="HI">Hawaii

        <option value="ID">Idaho

        <option value="IL">Illinois

        <option value="IN">Indiana

        <option value="IA">Iowa

        <option value="KS">Kansas

        <option value="KY">Kentucky

        <option value="LA">Louisiana

        <option value="ME">Maine

        <option value="MD">Maryland

        <option value="MA">Massachusetts

        <option value="MI">Michigan

        <option value="MN">Minnesota

        <option value="MS">Mississippi

        <option value="MO">Missouri

        <option value="MT">Montana

        <option value="NE">Nebraska

        <option value="NV">Nevada

        <option value="NH">New Hampshire

        <option value="NJ">New Jersey

        <option value="NM">New Mexico

        <option value="NY">New York

        <option value="NC">North Carolina

        <option value="ND">North Dakota

        <option value="OH">Ohio

        <option value="OK">Oklahoma

        <option value="OR">Oregon

        <option value="PA">Pennsylvania

        <option value="RI">Rhode Island

        <option value="SC">South Carolina

        <option value="SD">South Dakota

        <option value="TN">Tennessee

        <option value="TX">Texas

        <option value="UT">Utah

        <option value="VT">Vermont

        <option value="VA">Virginia

        <option value="WA">Washington

        <option value="DC">Washington D.C.

        <option value="WV">West Virginia

        <option value="WI">Wisconsin

        <option value="WY">Wyoming

      </SELECT> 



<strong>Zip</strong>

<input type="text" name="PostalCode" value="" size="10" />

</p>

<p><strong>Home  phone*</strong>

  <input type="text" name="Phones[Home]" value="" size="10" /> 

  <strong>Cell*</strong>

  <input type="text" name="Phones[Cell]" value=""  size="10" />

  <strong>Email</strong>

  <input type="text" name="Emails[Primary]" value="" size="20" /> 



</p>



<p><strong>How  would you like us to follow up with you?</strong><br />

  Phone<input name="ContactPreference" type="radio" value="Phone" />

  Email<input name="ContactPreference" type="radio" value="Email" />

  Mail<input name="ContactPreference" type="radio" value="Mail" />

  Any<input name="ContactPreference" type="radio" value="Any" />

</p> 



<p><strong>How  did you hear about us?</strong><br />

  <textarea name="How Heard" cols="40" rows="3" id="14029"></textarea>

</p> 



<p><strong>Is  there something specific you are looking for?</strong><br />

  <textarea name="Questions[14140]" cols="40" rows="3"></textarea>

</p> 



<p><strong>Comments:</strong><br /> 

<textarea name="Comments" cols="40" rows="3"></textarea></p>

		<input name="submit" type="submit" class="submit" value="Submit" />

</p> 



<p><em>*By providing a phone number, I authorize Renaissance  Homes to call me.</em></p> 



</form></div>

    

  ';

}





add_shortcode('lasso2', 'lasso2');


function lasso3() {

    return '

	

	<div>



<form method="post" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php"> 

<input type="hidden" name="ClientID" value="467" />

<input type="hidden" name="ProjectID" value="1472" />

<input type="hidden" name="SignupEmailLink" value="" />

<input type="hidden" name="SignupEmailSubject" value="" />

<input type="hidden" name="SignupThankyouLink" value="http://www.renaissance-homes.com/thank-you" />

<input type="hidden" name="domainAccountId" value="LAS-756396-01" />

<input type="hidden" name="guid" value="" />

<input type="hidden" name="LassoUID" value="(9zAztkHGM" />


<div id="errorContainer"></div>

<div class="wrap-field">
  <strong>First Name</strong> <input type="text" name="FirstName" value="" size="20" id="FirstName" title="First Name" /> 

  <strong>Last Name</strong> <input type="text" name="LastName" value="" size="20" id="LastName" title="Last Name" /> 
</div>


<p>
  <strong>Phone*</strong> <input type="text" name="Phones[Primary]" value="" size="10" />

  <strong>Email</strong> <input type="text" name="Emails[Primary]" value="" size="20" /> 
</p>


<p>
  <strong>Which Renaissance neighborhoods interest you?</strong>
  <br /> 
  <input type="checkbox" name="Questions[14138][]" value="66777" /> Renaissance Vintage – Portland
  <br>
  <input type="checkbox" name="Questions[14138][]" value="66776" /> Renaissance Woods – Lake Oswego
  <br>
  <input type="checkbox" name="Questions[14138][]" value="66775" /> Rosemont Pointe – West Linn
  <br>
 <input type="checkbox" name="Questions[14138][]" value="98895" /> Sherwood View Estates - Sherwood
  <br>
  <input type="checkbox" name="Questions[14138][]" value="66774" /> Other <input type="text" name="Questions[14139]" value="" maxlength="5000" size="30" />
</p> 


<p>
  <strong>Comments:</strong>
  <br /> 
  <textarea name="Comments" cols="40" rows="5" title="Add your message here"></textarea></p>
</p> 

<input name="submit" type="submit" class="submit" value="Submit" />

<p style="margin-top: 20px"><em>*By providing a phone number, I authorize Renaissance Homes to call me.</em></p> 

</form></div>

    

  ';

}





add_shortcode('lasso3', 'lasso3');
 
function lassobuyland() {

    return '

	

		<div>



<form method="post" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php"> 



<input type="hidden" name="ClientID" value="467" />

<input type="hidden" name="ProjectID" value="1472" />

<input type="hidden" name="SignupEmailLink" value="" />

<input type="hidden" name="SignupEmailSubject" value="" />

<input type="hidden" name="SignupThankyouLink" value="http://www.renaissance-homes.com/thank-you" />

<input type="hidden" name="domainAccountId" value="LAS-756396-01" />

<input type="hidden" name="guid" value="" />

<input type="hidden" name="LassoUID" value="(9zAztkHGM" />



<input type="hidden" name="RatingID" value="19799" />



<div id="errorContainer"></div>

<p><strong>First Name</strong>

  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 



  <strong>Last Name</strong>

  <input type="text" name="LastName" value="" size="20" id="LastName" /> 



</p>

<p>  

  <strong>Address</strong>

<input type="text" name="Address" value="" size="25" id="Address" />

</p>

<p> 

  <strong>City</strong>

  <input type="text" name="City" value="" size="10" id="City" />

  <strong>State</strong>

<select name="Province">

  <option value="">

    <option value="AL">Alabama

      <option value="AK">Alaska

        <option value="AZ">Arizona

        <option value="AR">Arkansas

        <option value="CA">California

        <option value="CO">Colorado

        <option value="CT">Connecticut

        <option value="DE">Delaware

        <option value="FL">Florida

        <option value="GA">Georgia

        <option value="HI">Hawaii

        <option value="ID">Idaho

        <option value="IL">Illinois

        <option value="IN">Indiana

        <option value="IA">Iowa

        <option value="KS">Kansas

        <option value="KY">Kentucky

        <option value="LA">Louisiana

        <option value="ME">Maine

        <option value="MD">Maryland

        <option value="MA">Massachusetts

        <option value="MI">Michigan

        <option value="MN">Minnesota

        <option value="MS">Mississippi

        <option value="MO">Missouri

        <option value="MT">Montana

        <option value="NE">Nebraska

        <option value="NV">Nevada

        <option value="NH">New Hampshire

        <option value="NJ">New Jersey

        <option value="NM">New Mexico

        <option value="NY">New York

        <option value="NC">North Carolina

        <option value="ND">North Dakota

        <option value="OH">Ohio

        <option value="OK">Oklahoma

        <option value="OR">Oregon

        <option value="PA">Pennsylvania

        <option value="RI">Rhode Island

        <option value="SC">South Carolina

        <option value="SD">South Dakota

        <option value="TN">Tennessee

        <option value="TX">Texas

        <option value="UT">Utah

        <option value="VT">Vermont

        <option value="VA">Virginia

        <option value="WA">Washington

        <option value="DC">Washington D.C.

        <option value="WV">West Virginia

        <option value="WI">Wisconsin

        <option value="WY">Wyoming

      </SELECT> 



<strong>Zip</strong>

<input type="text" name="PostalCode" value="" size="10" />

</p>

<p><strong>Home  phone*</strong>

  <input type="text" name="Phones[Home]" value="" size="10" /> 

  <strong>Cell*</strong>

  <input type="text" name="Phones[Cell]" value=""  size="10" />

  <strong>Email</strong>

  <input type="text" name="Emails[Primary]" value="" size="20" /> 



</p>



<p><strong>How  would you like us to follow up with you?</strong><br />

  Phone<input name="ContactPreference" type="radio" value="Phone" />

  Email<input name="ContactPreference" type="radio" value="Email" />

  Mail<input name="ContactPreference" type="radio" value="Mail" />

  Any<input name="ContactPreference" type="radio" value="Any" />

</p> 



<p><strong>How  did you hear about us?</strong><br />

  <textarea name="How Heard" cols="40" rows="3" id="14029"></textarea>

</p> 



<p><strong>Tell us about your property:</strong><br />

  <textarea name="Questions[28598]" cols="40" rows="3"></textarea>

</p> 



<p><strong>Comments:</strong><br /> 

<textarea name="Comments" cols="40" rows="3"></textarea></p>

		<input name="submit" type="submit" class="submit" value="Submit" />

</p> 



<p><em>*By providing a phone number, I authorize Renaissance  Homes to call me.</em></p> 



</form></div>

    

  ';

}





add_shortcode('lassobuyland', 'lassobuyland');



function mp1() {

    return '<script type="text/javascript"

    src="http://maps.google.com/maps/api/js?sensor=false">

</script>

<script type="text/javascript">

  function initialize() {

    var latlng = new google.maps.LatLng(45.981695,-120.783691);

    var myOptions = {

      zoom: 5,

      center: latlng,

      mapTypeId: google.maps.MapTypeId.ROADMAP

    };

    var map = new google.maps.Map(document.getElementById("map_canvas"),

        myOptions);

		

		layer = new google.maps.FusionTablesLayer(518603);

layer.setMap(map);

		

  }



</script>



<body onload="initialize()">

  <div id="map_canvas" style="width:640px; height:480px"></div>

    

  ';

}





add_shortcode('map1', 'mp1');







function mp2() {

    return '<script type="text/javascript"

    src="http://maps.google.com/maps/api/js?sensor=false">

</script>

<script type="text/javascript">

  function initialize() {

    var latlng = new google.maps.LatLng(45.537137,-122.678833);

    var myOptions = {

      zoom: 10,

      center: latlng,

      mapTypeId: google.maps.MapTypeId.ROADMAP

    };

    var map = new google.maps.Map(document.getElementById("map_canvas"),

        myOptions);

		

		layer = new google.maps.FusionTablesLayer(517361);

layer.setMap(map);

		

  }



</script>



<body onload="initialize()">

  <div id="map_canvas" style="width:640px; height:480px"></div>

  

  

  ';

}





add_shortcode('map2', 'mp2');







function the_slug() {

$post_data = get_post($post->ID, ARRAY_A);

$slug = $post_data['post_name'];

return $slug; }



function get_cat_slug($cat_id) {

	$cat_id = (int) $cat_id;

	$category = &get_category($cat_id);

	return $category->slug;

}





function register_menus() {

	register_nav_menus(

		array(

			'primary-menu' => __( 'Primary Menu' ),

			'secondary-menu' => __( 'Secondary Menu' ),

			'footer-menu' => __( 'Footer Menu' ),

			'gallery-menu' => __( 'Gallery Menu' )

			

		)

	);

};

if (function_exists('register_nav_menus')) add_action( 'init', 'register_menus' );





// SMC Change code cleanup/content filtering config



function mytheme_tinymce_config( $init ) {



// Add to list of valid HTML elements (so they don't get stripped)



    // IFRAME

    $valid_iframe = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';

    // PRE

    $valid_pre = 'pre[id|name|class|style]';

    // DIV

    $valid_div = 'div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title]';



    // Concatenate 

    $cbnet_valid_elements = $valid_iframe . ',' . $valid_pre . ',' . $valid_div;



    // Add to extended_valid_elements if it alreay exists

    if ( isset( $init['extended_valid_elements'] ) ) {

        $init['extended_valid_elements'] .= ',' . $cbnet_valid_elements;

    } else {

        $init['extended_valid_elements'] = $cbnet_valid_elements;

    }



// Pass $init back to WordPress

    return $init;

}

add_filter('tiny_mce_before_init', 'mytheme_tinymce_config');



// End SMC Change code cleanup/content filtering config





update_option('image_default_link_type','post');







?>
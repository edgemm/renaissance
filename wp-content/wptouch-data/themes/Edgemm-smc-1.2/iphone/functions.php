<?php

// Add your device specific code here

// add $ and , to prices
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

// replace function to find thumbnails to allow featured image to be fallback image - gfh 2/12/14
remove_filter( 'wptouch_the_post_thumbnail', 'classic_the_post_thumbnail' ); // remove default function

function rhmobile_the_post_thumbnail( $thumbnail ) {
	global $post;
	
	$settings = wptouch_get_settings();	
	$custom_field_name = $settings->classic_custom_field_thumbnail_name;
	
	switch( $settings->classic_icon_type ) {
		case 'thumbnails':
			if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) {
				return $thumbnail;	
			}
			break;
		case 'simple_thumbs':
			if ( function_exists( 'p75GetThumbnail' ) && p75HasThumbnail( $post->ID ) ) {
				return p75GetThumbnail( $post->ID );	
			}
			break;
		case 'custom_thumbs':
			if ( get_post_meta( $post->ID, $custom_field_name, true ) ) {
				return get_post_meta( $post->ID, $custom_field_name, true );
			} else if ( get_post_meta( $post->ID, 'Thumbnail', true ) ) {
				return get_post_meta( $post->ID, 'Thumbnail', true );
			} else if ( get_post_meta( $post->ID, 'thumbnail', true ) ) {
				return get_post_meta( $post->ID, 'thumbnail', true );
			} else if (has_post_thumbnail( $post->ID ) ) {
				$thmb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
                                return $thmb[0];
                        }

			break;
	}		
	// return default if none of those exist
	return wptouch_get_bloginfo( 'template_directory' ) . '/images/default-thumbnail.png';
}
add_filter( 'wptouch_the_post_thumbnail', 'rhmobile_the_post_thumbnail' ); // add new function


// Dynamic archives heading text for archive result pages, and search
function classic_archive_text_smc() {
	global $wp_query;
	$total_results = $wp_query->found_posts;

	if ( !is_home() ) {
		echo '<div class="archive-text">';
	}
	if ( is_search() ) {
		echo sprintf( __( "Search results &rsaquo; %s", "wptouch-pro" ), get_search_query() );
		echo '&nbsp;(' . $total_results . ')';
	} if ( is_category() ) {
		echo sprintf( __( "%s", "wptouch-pro" ), single_cat_title( "", false ) );
	} elseif ( is_tag() ) {
		echo sprintf( __( "Tags &rsaquo; %s", "wptouch-pro" ), single_tag_title(" ", false ) );
	} elseif ( is_day() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wptouch-pro" ),  get_the_time( 'F jS, Y' ) );
	} elseif ( is_month() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wptouch-pro" ),  get_the_time( 'F, Y' ) );
	} elseif ( is_year() ) {
		echo sprintf( __( "Archives &rsaquo; %s", "wptouch-pro" ),  get_the_time( 'Y' ) );
	} elseif ( is_404() ) {
		echo( __( "404 Not Found", "wptouch-pro" ) );
	}
	if ( !is_home() ) {
		echo '</div>';
	}
}



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

function lasso1() {
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
<p><strong>First Name</strong>
  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 

  </p>
<p><strong>Last Name</strong>
  <input type="text" name="LastName" value="" size="20" id="LastName" /> 
  
</p>
<p>  
  <strong>Address</strong>
<input type="text" name="Address" value="" size="25" id="Address" />
</p>
<p> 
  <strong>City</strong>
  <input type="text" name="City" value="" size="10" id="City" />
  </p>
<p><strong>State</strong>
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
</p>
<p>  <strong>Zip</strong>
  <input type="text" name="PostalCode" value="" size="10" />
</p>
<p><strong>Home  phone*</strong>
  <input type="text" name="Phones[Home]" value="" size="10" /> 
  </p>
<p><strong>Cell*</strong>
  <input type="text" name="Phones[Cell]" value=""  size="10" />
  </p>
<p><strong>Email</strong>
  <input type="text" name="Emails[Primary]" value="" size="20" /> 
  
</p>

<p><strong>How  would you like us to follow up with you?</strong><br />
  Phone<input name="ContactPreference" type="radio" value="Phone" />
  Email<input name="ContactPreference" type="radio" value="Email" />
  Mail<input name="ContactPreference" type="radio" value="Mail" />
  Any<input name="ContactPreference" type="radio" value="Any" />
</p> 

<p><strong>How  did you hear about us?</strong><br />
  <textarea name="How Heard" cols="30" rows="3" id="14029"></textarea>
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
<input type="checkbox" name="Questions[14138][]" value="66774" />
Other

<input type="text" name="Questions[14139]" value="" maxlength="5000" size="20" />
</p> 

<p><strong>Is  there something specific you are looking for in your next home?</strong><br />
  <textarea name="Questions[14140]" cols="30" rows="3"></textarea>
</p> 

<p><strong>Comments:</strong><br /> 
<textarea name="Comments" cols="30" rows="3"></textarea></p>
		<input name="submit" type="submit" class="submit" value="Submit" />
</p> 

<p><em>*By providing a phone number, I authorize Renaissance  Homes to call me.</em></p> 

</form></div>
    
  ';
}


add_shortcode('lasso1', 'lasso1');


add_shortcode('button', 'et_button');
function et_button($atts, $content = null) {
	extract(shortcode_atts(array(
				"link" => "#",
				"color" => "blue",
				"type" => "small",
				"icon" => "download",
				"newwindow" => "no",
				"id" => '',
				"class" => '',
				"br" => 'no'
			), $atts));
	
	
	$output = '';
	$target = ($newwindow == 'yes') ? ' target="_blank"' : '';
	

	
	$id = ($id <> '') ? " id='{$id}'" : '';
	$class = ($class <> '') ? " {$class}" : '';
	
	if ($type == 'small')
		$output .= "<a{$id} href='{$link}' class='small-button small{$color}{$class}'{$target}><span>{$content}</span></a>";
	
	if ($type == 'big')
		$output .= "<a{$id} href='{$link}' class='big-button big{$color}{$class}'{$target}><span>{$content}</span></a>";
		
	if ($type == 'icon')
		$output .= "<a{$id} href='{$link}' class='icon-button {$icon}-icon{$class}'{$target}><span class='et-icon'><span>{$content}</span></span></a>";
	
	if ( $br == 'yes' ) $output .= '<br class="clear"/>';
		
	return $output;
}


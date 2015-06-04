<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php locate_template( 'blog-loop.php', true ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px">

			<?php if ( classic_use_thumbnail_icons() && classic_thumbs_on_pages() ) { ?>
				<?php locate_template( 'thumbnails.php', true ); ?>
			<?php } elseif ( wptouch_page_has_icon() ) { ?>
				<img src="<?php wptouch_page_the_icon(); ?>" alt="<?php the_title(); ?>-page-icon" />
			<?php } ?>

			<h2><?php wptouch_the_title(); ?></h2>

			<?php wp_link_pages( __( 'Pages in the article:', 'wptouch-pro' ), '', 'number' ); ?>

		</div>	
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php wptouch_the_content(); ?>
                
                
                
                <div>
              
               <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
                        
                        
<form method="post" id="lassoSignupForm" action="/verify.php"> 

<p><strong>First Name* </strong>

  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 

<br />

  <strong> Last Name* </strong>

  <input type="text" name="LastName" value="" size="20" id="LastName" /> 



</p>

<p>  

  <strong>Address </strong>

<input type="text" name="Address" value="" size="25" id="Address" />

</p>

<p> 

  <strong>City </strong>

  <input type="text" name="City" value="" size="10" id="City" />

  <strong> State </strong>

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



<strong> Zip </strong>

<input type="text" name="PostalCode" value="" size="10" />

</p>

<p><strong>Home  phone* </strong>

  <input type="text" name="PhoneHome" value="" size="10" />

  <strong> Cell </strong>

  <input type="text" name="PhoneCell" value=""  size="10" />

  <strong> Email* </strong>

  <input type="text" name="Email" value="" size="20" /> 

</p>



<p><strong>How  would you like us to follow up with you?</strong><br />

  Phone<input name="ContactPreference" type="radio" value="Phone" />

  Email<input name="ContactPreference" type="radio" value="Email" />

  Mail<input name="ContactPreference" type="radio" value="Mail" />

  Any<input name="ContactPreference" type="radio" value="Any" />

</p> 



<p><strong>How  did you hear about us?</strong><br />

  <textarea name="HowHeard" cols="40" rows="3" id="14029"></textarea>

</p> 

<p><strong>What  neighborhood are you interested in?</strong><br /> 

<input type="checkbox" name="Vintage" value="66777" />Renaissance Vintage – Portland

<br>

<input type="checkbox" name="Sherwood" value="98896" />

Renaissance at Rychlick Farm - Sherwood

<br>

<input type="checkbox" name="Tualatin" value="129604" />

Renaissance at Stono 93 - Tualatin

<br>

<input type="checkbox" name="Wilsonville" value="128348" />

Renaissance Boat Club - Wilsonville

<br>

<input type="checkbox" name="WestLinn" value="151172" />

Renaissance at Grandview, West Linn

<br>

<input type="checkbox" name="Other" value="66774" />

Other <input type="text" name="OtherBox" value="" maxlength="5000" size="30" />

</p> 


<p><strong>Is  there something specific you are looking for in your next home?</strong><br />

  <textarea name="NextHome" cols="40" rows="3"></textarea>

</p> 



<p><strong>Comments:</strong><br /> 

<textarea name="Comments" cols="40" rows="3"></textarea></p>

<p>

    

        <?php
          require_once('recaptchalib.php');
          $publickey = "6LcysN8SAAAAAJfa8hEV-qlnHIzy4HrTWGfY2Ipb"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
       

        
</p>


		<input name="submit" type="submit" class="submit" value="Submit" />
        
        

</p> 



<p><em>*By providing a phone number, I authorize Renaissance  Homes to call me.</em></p> 



</form>


<div id="errorContainer"></div>


</div>
                
                
                
			</div>
			
					<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          

		</div><!-- wptouch_posts_classes() -->

	<?php } ?>
	
	<?php if ( classic_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>
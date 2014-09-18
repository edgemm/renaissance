<?php 
/*
Template Name: Lasso Form 2
*/
?>


<?php the_post(); ?>
<?php get_header(forms2); ?>


		
	<div id="content-top" class="content-page">
		<div id="menu-bg"></div>
		<div id="top-index-overlay"></div>

		<div id="content" class="clearfix">
			<div id="main-area">
				<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
			
				<div class="full_entry clearfix">
					<?php if (get_option('elegantestate_integration_single_top') <> '' && get_option('elegantestate_integrate_singletop_enable') == 'on') echo(get_option('elegantestate_integration_single_top')); ?>	
					
					<div class="entry_content<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') echo(' setwidth') ?>">
						<?php $width = 159;
							  $height = 159;
							  $classtext = '';
							  $titletext = get_the_title();
						
							  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							  $thumb = $thumbnail["thumb"]; ?>
						
						<?php if($thumb <> '' && get_option('elegantestate_page_thumbnails') == 'on') { ?>
							<div class="small-thumb">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
								<span class="overlay"></span>
							</div> 	<!-- end .small-thumb -->
						<?php }; ?>
						
						<h1 class="single-title"><?php the_title(); ?></h1>
                        
						<?php the_content(); ?>
                        
                        
                        
                        
                      
			  <div>
              
               <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
                        
                        
<form method="post" id="lassoSignupForm" action="/verify.php"> 

<p><strong>First Name* </strong>

  <input type="text" name="FirstName" value="" size="20" id="FirstName" /> 



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

<input type="checkbox" name="Woods" value="66776" />

Renaissance Woods – Lake Oswego

<br>

<input type="checkbox" name="Rosemont" value="66775" />

Rosemont Pointe – West Linn

<br>

<input type="checkbox" name="Sherwood" value="98896" />

Renaissance at Rychlick Farm - Sherwood

<br>

<input type="checkbox" name="Other" value="66774" />

Other 



<input type="text" name="OtherBox" value="" maxlength="5000" size="30" />

</p> 



<p><strong>Is  there something specific you are looking for in your next home?</strong><br />

  <textarea name="NextHome" cols="40" rows="3"></textarea>

</p> 
<!-- testaroo -->


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
		
        
    


                        
                        
                        
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
					
				</div> <!-- .full_entry -->
				
				<?php if (get_option('elegantestate_show_pagescomments') == 'on') comments_template('', true); ?>
				
			</div> <!-- end #main-area -->

			<?php get_sidebar(forms); ?>
		
<?php get_footer(forms); ?>
<div id="sidebar">


	<?php if (get_option('elegantestate_listings') == 'on') include('sidebar-listings.php'); ?>
    
<div class="widget">

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

<div class="widget">

<h4 class="widgettitle">Facebook Fans</h4>

<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRenaissanceHomesPDX&amp;width=234&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=256726631010383" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:234px; height:258px;" allowTransparency="true"></iframe>

</div>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
	<?php endif; ?>		
</div> <!-- end #sidebar -->
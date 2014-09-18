<div id="sidebar">


	<?php if (get_option('elegantestate_listings') == 'on') include('sidebar-listings.php'); ?>
    
    <div class="widget">
    
    <div>

<form method="post" id="lassoSignupForm" action="http://www.mylasso.com/registrant_signup.php"> 

<input type="hidden" name="RatingID" value="19769">

<input type="hidden" name="ClientID" value="467" />
<input type="hidden" name="ProjectID" value="1472" />
<input type="hidden" name="SignupEmailLink" value="" />
<input type="hidden" name="SignupEmailSubject" value="" />
<input type="hidden" name="SignupThankyouLink" value="http://www.renaissance-homes.com/thank-you" />
<input type="hidden" name="domainAccountId" value="LAS-756396-01" />
<input type="hidden" name="guid" value="" />
<input type="hidden" name="LassoUID" value="(9zAztkHGM" />

<div id="errorContainer"></div>
<h4 class="widgettitle">Newsletter Signup</h4>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="28">First Name:</td>
    <td><input type="text" name="FirstName" value="" size="20" id="FirstName" /></td>
  </tr>
  <tr>
    <td width="100" height="26">Last Name:</td>
    <td><input type="text" name="LastName" value="" size="20" id="LastName" /></td>
  </tr>
  <tr>
    <td width="100" height="32">Email:</td>
    <td><input type="text" name="Emails[Primary]" value="" size="20" /></td>
  </tr>
  <tr>
    <td height="31" colspan="2" align="center" valign="bottom"><input name="submit" type="submit" class="submit" value="Subscribe" /></td>
    </tr>
</table>
</form></div>
    
    </div>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
	<?php endif; ?>		
</div> <!-- end #sidebar -->
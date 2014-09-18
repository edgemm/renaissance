<div id="sidebar">


	<?php if (get_option('elegantestate_listings') == 'on') include('sidebar-listings.php'); ?>
     
 <div class="widget">

<h4 class="widgettitle">Facebook Fans</h4>

<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRenaissanceHomesPDX&amp;width=234&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=256726631010383" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:234px; height:258px;" allowTransparency="true"></iframe>

</div>   
    
    

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
	<?php endif; ?>		
</div> <!-- end #sidebar -->
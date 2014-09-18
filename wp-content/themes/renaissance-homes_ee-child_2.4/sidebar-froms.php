<div id="sidebar">


	<?php if (get_option('elegantestate_listings') == 'on') include('sidebar-listings.php'); ?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
	<?php endif; ?>		
</div> <!-- end #sidebar -->
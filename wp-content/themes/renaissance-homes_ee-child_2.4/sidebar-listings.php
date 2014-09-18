<?php $listings1 = get_option('elegantestate_listings1');
$listings2 = get_option('elegantestate_listings2');
$listings3 = get_option('elegantestate_listings3');
$listings4 = get_option('elegantestate_listings4'); ?>
<div id="listings">
	
	
	<div id="listings-bottom">
		<div id="search-container">
			<form action="<?php bloginfo('url'); ?>/" id="searchform" method="get">
				<input type="text" id="searchinput" name="s" value="<?php _e('Type here to search ...','ElegantEstate'); ?>"/>
			</form>
		</div> <!-- end #search-container -->
	</div> <!-- end #listings-bottom -->
</div> <!-- end #listings -->
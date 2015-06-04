<div id="header">
				<a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('elegantestate_logo') <> '') ? get_option('elegantestate_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?>
	  <img src="<?php echo $logo; ?>" class="rh-logo" alt="Logo" /></a>
	  
				<span class="contact-slogan">Call 503.636.5600 to speak with us now.</span>
				
				<ul class="extraNav">
					<li class="extraNav-item extraNav-search">
						<a class="extraNav-link" href="javascript:void(0);">Search</a>
						<div class="search-container">
							<form action="http://renaissance-homes.com/" id="searchform" method="get">
								<input type="text" class="header-search" id="searchinput" name="s" value="Type here to search...">
							</form>
						</div>
					</li>
					<li class="extraNav-item"><a class="extraNav-link" href="/contact-us">Contact Us</a></li>
					<li class="extraNav-item"><a class="extraNav-link" href="/about-us/homeowner-services">Homeowner Services</a></li>
					<li class="extraNav-item"><a class="extraNav-link myFav-link" href="/myfav?fav=null">My Favorites</a></li>
				</ul>
			
				<div id="top-menu">
					<?php $menuClass = 'nav';
					$menuID = 'primary';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
					};
					if ($primaryNav == '') { ?>
						<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
							<?php if (get_option('elegantestate_swap_navbar') == 'false') { ?>
								<?php if (get_option('elegantestate_home_link') == 'on') { ?>
									<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','ElegantEstate') ?></a></li>
								<?php }; ?>
								
								<?php show_page_menu($menuClass,false,false); ?>
							<?php } else { ?>
								<?php show_categories_menu($menuClass,false); ?>
							<?php } ?>
						</ul> <!-- end ul#nav -->
					<?php }
					else echo($primaryNav); ?>
				</div> <!-- end #top-menu -->
				
				
			</div> 	<!-- end #header -->
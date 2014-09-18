			</div> <!-- end #content-->
		</div> <!-- end #content-top-->	
		<div id="content-bottom">	</div>
		
        <div id="foot-menu">
					<?php $menuClass = 'nav';
					$menuID = 'footer';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
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
                
                <div id="ehl"></div>
        
        
        <p id="copyright">Renaissance Homes is an equal opportunity builder. © 2011 Renaissance Homes. All home pricing and home availability are subject to change without notice. Floor plans, renderings, photography, virtual tours, videos, maps, square footage and dimensions are for illustration only and are subject to change without notice.<br />
Renaissance Homes<br />
16771 Boones Ferry Road<br />
Lake Oswego, Oregon 97035<br />
503.635.8400 FAX<br />
888.529.0509 Toll Free<br />
Email (<a href="mailto:Info@renaissance-homes.com">Info@renaissance-homes.com</a>)<br />
OR CCB #49955 / WA Labor &amp; Industries RENAICH957B1
</p>
					
		</div> 	
		<p><!-- end #container -->
		  </div> 	<!-- end #wrapper -->
		  
		  <?php include(TEMPLATEPATH . '/includes/scripts.php'); ?>
		  
		  <?php wp_footer(); ?></p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
        <script type="text/javascript">
var _ldstJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
_ldstJsHost += "www.mylasso.com";
document.write(unescape("%3Cscript src='" + _ldstJsHost + "/analytics.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
<!--
try {
var tracker = new LassoAnalytics('LAS-756396-01');
tracker.setTrackingDomain(_ldstJsHost);
tracker.init();
tracker.track();
} catch(error) {}
-->
</script>


<script type="text/javascript">
(function(i) {var u =navigator.userAgent;
var e=/*@cc_on!@*/false; var st = setTimeout;if(/webkit/i.test(u)){st(function(){var dr=document.readyState;
if(dr=="loaded"||dr=="complete"){i()}else{st(arguments.callee,10);}},10);}
else if((/mozilla/i.test(u)&&!/(compati)/.test(u)) || (/opera/i.test(u))){
document.addEventListener("DOMContentLoaded",i,false); } else if(e){     (
function(){var t=document.createElement("doc:rdy");try{t.doScroll("left");
i();t=null;}catch(e){st(arguments.callee,0);}})();}else{window.onload=i;}})
(function() {document.forms['lassoSignupForm'].guid.value = tracker.readCookie("ut");});
</script>

		</body>
</html>
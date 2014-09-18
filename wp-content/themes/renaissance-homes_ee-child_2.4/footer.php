			</div> <!-- end #content-->
		</div> <!-- end #content-top-->	
		<div id="content-bottom">	</div>
		</div><!-- end #container -->
		<?php if( is_page_template('page-employees.php') ) { ?>
		<div class="employee-wrapper">
		    <div id="employee-container">
			    <div class="employee-img employee-insert"></div>
			    <div class="employee-content">
				    <h2 class="employee-content-title employee-insert"></h2>
				    <div class="employee-content-desc employee-insert"></div>
			    </div>
		    </div>
		</div>
		<?php } ?>
		<div id="footer">
			<?php include('includes/footer-row.php'); ?>
			<div id="foot-menu">
				<ul class="footer-widgets">
					<?php dynamic_sidebar( 'footer' ); ?>
				</ul>
			</div>
		</div> <!-- end #footer -->
	</div> 	<!-- end #wrapper -->		  
		  <?php include(TEMPLATEPATH . '/includes/scripts.php'); ?>		  
		  <?php wp_footer(); ?>
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

</body>
</html>
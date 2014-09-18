			</div> <!-- end #content-->
		</div> <!-- end #content-top-->	
		<div id="content-bottom">	</div>
		</div><!-- end #container -->
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
		  
		  <?php wp_footer(); ?><
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
(function() {document.forms['lassoSignupForm'].guide.value = tracker.readCookie("ut");});
</script>
<?php
$scrollx = 0;
$scrolly = 0;
if(!empty($_REQUEST['scrollx'])) {
$scrollx = $_REQUEST['scrollx'];
}
if(!empty($_REQUEST['scrolly'])) {
$scrolly = $_REQUEST['scrolly'];
}
?>
<script type="text/javascript">
window.scrollTo(<?php echo "$scrollx" ?>, <?php echo "$scrolly" ?>);
</script>

</body>
</html>
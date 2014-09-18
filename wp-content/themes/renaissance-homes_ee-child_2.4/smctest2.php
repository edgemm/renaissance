<?php
/*
Template Name: smctest2
*/
?>

<?php the_post(); ?>
<?php get_header(); ?>

<script>
function injectStyles(rule) {
  var div = jQuery("<div />", {
    html: '&shy;<style>' + rule + '</style>'
  }).appendTo("body");    
}
</script>

<script>injectStyles('a#mytest:hover { color: red; }');</script>

		
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
                        
                        
                        <a id="mytest" href="#">Test</a>
                        
                        
                        
                        
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','ElegantEstate').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(__('Edit this page','ElegantEstate')); ?>
					</div> <!-- end .entry_content -->
					
				</div> <!-- .full_entry -->

				
<button id="testbutton">Load Sidebar</button>

<script>
jQuery(document).ready(function(){
		jQuery("#testbutton").click(function(){
			 jQuery.ajax({
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				type: 'POST',
				data: {
				action: 'getmyfunction'
				},
				dataType: 'html',
				success: function(response) {
				
				jQuery("#myResults").html(response);
				}
			});
		});	

	});
</script> 
                
				<?php if (get_option('elegantestate_show_pagescomments') == 'on') comments_template('', true); ?>
				
			</div> <!-- end #main-area -->
            
            
<div id="myResults"></div>
			
            
            
		
<?php get_footer(); ?>
jQuery(document).ready(function(){
		jQuery("#testbutton").click(function(){
			 jQuery.ajax({
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				type: 'POST',
				data: {
				action: 'stravyfuncajax22'
				},
				dataType: 'html',
				success: function(response) {
				alert(response);
				}
			});
		});	

	});
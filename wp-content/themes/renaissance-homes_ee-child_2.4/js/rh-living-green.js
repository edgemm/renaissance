(function($){

$(document).ready(function() {
    $( ".livingGreen-post .title-link" ).click(function(e) {
	e.preventDefault();
	$(this).parents( ".livingGreen-post" ).toggleClass( "showAdditional" );
    });
});

})(jQuery);
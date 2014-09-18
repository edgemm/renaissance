(function($){


var filterSelector = "*"; // default selector for isotope - gfh
var $container = $( ".isoContent" ); // set container for isotope container - gfh
$container.isotope({ filter: filterSelector }); // initialize isotope - gfh

// filter posts on page load based on GET var "t" - gfh
//if ( initFilter ) {
//   filterSelector = "." + initFilter;
//}



$( ".rh-post-filters-item" ).click(function(){
	// do nothing if already selected
	if ( $(this).hasClass( "selected" ) ) {
		return false;
	}
	
	// change selected category
	var $optionSet = $(this).parents( ".rh-post-filters" );
        $optionSet.find( ".selected" ).removeClass( "selected" );
        $(this).addClass( "selected" );
	
	// filter posts
	var selector = $(this).attr( "data-filter" );
	$container.isotope({ filter: selector });
	return false;	
});

$( ".rentv-nav-item" ).click(function(){
	if ( !$(this).hasClass( "current" ) ) {
		var view = $(this).attr( "data-view" );

		// remove current class from nav item and text container
		$( ".rentv-nav .current, .entry_content > .entry_text" ).removeClass( "current" );

		$( ".entry_content > .entry_text[data-text='" + view + "']" ).addClass( "current" );
		$(this).addClass( "current" );
	}

	return false;
});

$( ".expand_text_toggle" ).click(function(){
	var container = $( ".entry_content" );
	var t = $(this);
	
	if ( container.hasClass( "show" ) ) {
		t.html( "Read More &raquo;" );
	} else {
		t.html( "Read Less &raquo;" );
	}
	
	container.toggleClass( "show" );
})


})(jQuery);
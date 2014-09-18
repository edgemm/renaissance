(function($){

// set value of favorites to necessary anchors - gfh
$( "a.myFav-link" ).attr( 'href', function() {
	var myfavsave = $.cookie('myfav');
	var _href = "/myfav?fav=";
	return _href + myfavsave; 
});

function headerSearchVal() {
	var searchField = $( ".header-search" ),
	searchvalue = searchField.val();

	searchField.focus( function(){
		if ( $(this).val() === searchvalue ) $(this).val( '' );
	}).blur( function(){
		if ( $(this).val() === "" ) $(this).val( searchvalue );
	});

}
	
$( '.extraNav-search > a' ).click( function( e ) {
	e.preventDefault();
	$(this).parent().toggleClass( "show" );
	$( '.search-container' ).fadeToggle();
	headerSearchVal();
});

})(jQuery);
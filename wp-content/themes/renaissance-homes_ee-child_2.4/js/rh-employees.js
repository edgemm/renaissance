(function($){

var num = $( ".employee-post" ).length;
var empLink = ".sidefilter-thmb a";

$( empLink ).each(function(){
	$(this).addClass( "fancyBox" );
})

$( ".sidefilter-thmb" ).each(function(){
	var colors = ['#d9dcc9','#8da67c','#42311d'];
	var randomcolor = Math.floor( Math.random()*colors.length );
	$(this).css( { "background": colors[randomcolor], "border-color": colors[randomcolor] } );
});

// HIDE RANDOMS
var randomPeople = $( ".sidefilter-post" ).find( empLink ).get()
	.sort(function(){
		return Math.round(Math.random())-0.5;
	})
	.slice( 0, Math.round( num / 2 ) );
//$( randomPeople ).hide();

// TRIGGER ANIMATIONS
$( ".rh-sidefilters-item" ).click(function(){
	if ( !$(this).hasClass( "current" ) ) {
		$( ".rh-sidefilters-item" ).removeClass( "current" );

		var view = $(this).attr( "data-filter" );
		if ( view == "*" ) {
			$( ".sidefilter-post" ).find( empLink ).animate({opacity:"show", easing:"easeInQuad"}, 200);

		} else {
			$( ".sidefilter-post" ).not( view ).find( empLink ).animate({opacity:"hide", easing:"easeOutQuad"}, 200).promise().done(function(){
				$(view).find( empLink ).animate({opacity:"show", easing:"easeInQuad"}, 200);
			});
		}

		$(this).addClass( "current" );
	}

	return false;
});

$( empLink ).click(function(e){
	e.preventDefault();

	var post_id = $(this).parents( ".sidefilter-post" ).attr( "data-post_id" );

	$.ajax({
		type: "post",
		dataType: "json",
		url: "http://renaissance-homes.com/wp-admin/admin-ajax.php",
		data: {
			action: "get_employee",
			p_id: post_id
		},
		success: function( response ) {
			if ( response.video_id ) {
				$( "#employee-container .employee-img" ).empty().append( '<iframe width="350" height="197" src="//www.youtube.com/embed/' + response.video_id + '" frameborder="0" allowfullscreen></iframe>' );
			} else {
				$( "#employee-container .employee-img" ).empty().append( response.img );
			}
			$( "#employee-container .employee-content-title" ).empty().append( response.title );
			$( "#employee-container .employee-content-desc" ).empty().append( response.content );

			$.fancybox({
				'width':		880,
				'autoDimensions':	false,
				'type':			'inline',
				'scrolling':		'no',
				'padding':		'20',
				'centerOnScroll':	'yes',
				'href':			'#employee-container',
				'onClosed':		function(){
					$( ".employee-insert" ).empty();
				}
			});
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		}
	});
	
	return false;
});


})(jQuery);
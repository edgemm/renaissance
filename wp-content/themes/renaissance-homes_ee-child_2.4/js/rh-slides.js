(function($){

$( '.rh-slides' ).slidesjs({
	width: 960,
	height: 480,
	play: {
		active: false,
		interval: 99999,
		auto:true,
		swap: true
	},
	effect: {
		slide: {
			speed: 1500
		}
	},
	pagination: {
		active: false
	},
	navigation: {
		active: true
	},
	callback: {		
		start: function() {
			$( '.rh-slide-content' ).hide();
		},
		complete: function() {
			$( '.rh-slide-content' ).hide().fadeIn( 800 );
		}
	}
});

// Hide slider navs when less than 2 slides
var numSlides = $( '.rh-slide' ).length;
if (numSlides <= 1) {
	$( '.slidesjs-navigation' ).css( 'display', 'none' );
}

})(jQuery);
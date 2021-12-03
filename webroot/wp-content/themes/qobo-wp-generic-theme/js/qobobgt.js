function sameHeight() {
	var i;
	for (i = 0; i < arguments.length; i++) {
		var max_height = 0;
		$(arguments[i]).each(function() {
			if ($(this).height() > max_height) {
				max_height = $(this).height();
			}
		});
		max_height += 15;
		$(arguments[i]).each(function() {
			$(this).height(max_height);
		});
	}

}

/**
 * Usage: createSlider('#carousel_id,#thumbnail_slider_id', ...)
 * 
 * First goes the actual carousel id and then thumbnail slider id, if exists,
 * seperated by comma, in same quotation
 * 
 * This has predefined settings for flexslider. Change the settings from here if
 * necessery
 * 
 * NOTE: Not tested
 */
function createFlexSlider() {

	var i;
	for (i = 0; i < arguments.length; i++) {
		carousel = arguments[i].split(",");

		if (carousel.length == 2) {
			$(carousel[0]).flexslider({
				animation : "slide",
				controlNav : false,
				animationLoop : false,
				slideshow : false,
				itemWidth : 170,
				itemMargin : 5,
				asNavFor : carousel[1]
			});

			$(carousel[1]).flexslider({
				controlNav : false,
				animationLoop : false,
				slideshow : false,
				sync : carousel[0]
			});
		} else {
			$(carousel[0]).flexslider({
				animation : "slide",
				controlNav : false,
				animationLoop : false,
				slideshow : false,
				itemWidth : 170,
				itemMargin : 5,
			});
		}

	}

}

function stretch() {
	if (document.documentElement.offsetHeight < $(window).height()) {
		var fullHeight = $(window).height() - $("footer").outerHeight()
				- $("header").outerHeight();
		$("#main").css('min-height',fullHeight);
	}
}

function makeSlimScroll() {
	var i;
	for (i = 0; i < arguments.length; i++) {
		$(arguments[i]).slimScroll({
			height : '240px',
			width : '100%'
		});
	}
}

$(window).onresize = function(){
	stretch();
};

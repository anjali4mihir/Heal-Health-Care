jQuery(document).ready(function () {
	
	jQuery("body").click(function(){
		jQuery(".responsive_menu_dash").toggle("slide",{direction:"right"},500);
	});
	
	jQuery('.burger_menu a').click(function(){
		jQuery('.responsive_menu_dash').toggle("slide",{direction:"right"},500);
		event.stopPropagation();
	});
	
	jQuery('.pro_sliderr .owl-carousel').owlCarousel({
		items: 1,
		nav: false,
		margin: 0,
		loop: true,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 1
		  },
		  1000: {
			items: 1
		  }
		}
	});
	
	jQuery('.hott_sliderr .owl-carousel').owlCarousel({
		items: 1,
		nav: true,
		dots: false,
		margin: 0,
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: false,
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 1
		  },
		  1000: {
			items: 1
		  }
		}
	});
	
	jQuery('.recent_sliderr .owl-carousel').owlCarousel({
		items: 3,
		nav: true,
		dots: false,
		margin: 30,
		loop: true,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 2
		  },
		  1000: {
			items: 3
		  }
		}
	});
	
	jQuery('.testimss .owl-carousel').owlCarousel({
		items: 2,
		nav: true,
		dots: false,
		margin: 10,
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: false,
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 2
		  },
		  1000: {
			items: 2
		  }
		}
	});
	
	
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 956,
			max: 138080,
			values: [956, 138060],
			slide: function( event, ui ) {
				//	$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				$( "#firstamount" ).val("" + $( "#slider-range" ).slider( "values", 0 ));
				$( "#lasttamount" ).val("" + $( "#slider-range" ).slider( "values", 1 ));
			}
		});
		$( "#firstamount" ).val("" + $( "#slider-range" ).slider( "values", 0 ));
		$( "#lasttamount" ).val("" + $( "#slider-range" ).slider( "values", 1 ));
		// $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		// 	" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	});
	
	
	$('.slider1').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
				dots: false,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: false,
				dots: false,
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false,
				dots: false,
			}
		}	
		]

	});	
	
	
	
	
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true,
	  centerPadding: '0px'
	});
	
	
	
});
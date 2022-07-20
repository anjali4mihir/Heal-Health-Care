$( document ).ready(function() {
  if ($(window).width() >= 767) {
    var $animation_elements = $('.animation-element');
    var $window = $(window);
    
    function check_if_in_view() {
      var window_height = $window.height();
      var window_top_position = $window.scrollTop();
      var window_bottom_position = (window_top_position + window_height);
    
      $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);
    
        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
          $element.addClass('in-view');
        }
      });
    }
    
    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
  }

  $('.mobile-menu').click( function() {
    $(".menu").toggleClass("show-menu");
  });

  $('#view-specialities').click( function() {
    $(".show-all").toggleClass("visible");
	
	if($(".show-all").hasClass("visible")){
		$(this).text('View Less');
	}
	else{
		$(this).text('View All');
	}
  });

  $('.dropdown').click( function() {
    $(this).find('.sub-menu').toggleClass('show-menu');
  });
  
  $('.service-card').click( function() {
    $("#exampleModalCenter").show();
  });
  
  $('.close').click( function() {
    $("#exampleModalCenter").hide();
  });

});

    
 

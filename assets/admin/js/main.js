jQuery(document).ready(function () {
	
	jQuery(".inline_collection :checkbox").click(function () {
		var hiddenVar = ".area" + this.value;
		if (this.checked) jQuery(hiddenVar).show();
		else jQuery(hiddenVar).hide();
	});
	
	jQuery(".inline_collection1 :checkbox").click(function () {
		var hiddenVar = ".marea" + this.value;
		if (this.checked) jQuery(hiddenVar).show();
		else jQuery(hiddenVar).hide();
	});
	
	
	var nice = jQuery("html").niceScroll();
	jQuery("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true});
	
	jQuery(".toggle-password").click(function() {
		jQuery(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
			input.attr("type", "text");
			} else {
			input.attr("type", "password");
		}
	});
	
	$('#confirm_password').on('keyup', function () {
		if ($('#password-field').val() == $('#confirm_password').val()) {
			$('#message').html('<span class="lnr lnr-checkmark-circle"></span>').css('color', 'green');
		} else 
			$('#message').html('<span class="lnr lnr-cross-circle"></span>').css('color', 'red');
	});
	
	jQuery('.menu_iconn').click(function(){
		jQuery('.side_navigation').animate({width: "toggle"},50);
	});
	$('.comment-color').click(function() {
		$('.chat-section').slideToggle();
   });

   $(".notofication_top").click(function () {
	$('.notification-right-side-bar').addClass('open');
	  });
	  $(".notifi-close-icon").click(function () {
	$('.notification-right-side-bar').removeClass('open');
	  });  

   jQuery('html, body').stop().animate({
		scrollTop: $($(this).attr('href')).offset()
	  }, 300);
	  return false;
	  
	 
	
});


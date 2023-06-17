jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function pet_rescue_lite_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function pet_rescue_lite_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var pet_rescue_lite_Keyboard_loop = function (elem) {
    var pet_rescue_lite_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var pet_rescue_lite_firstTabbable = pet_rescue_lite_tabbable.first();
    var pet_rescue_lite_lastTabbable = pet_rescue_lite_tabbable.last();
    /*set focus on first input*/
    pet_rescue_lite_firstTabbable.focus();

    /*redirect last tab to first input*/
    pet_rescue_lite_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            pet_rescue_lite_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    pet_rescue_lite_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            pet_rescue_lite_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        pet_rescue_lite_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

jQuery('document').ready(function($){
    $('.main-search span a').click(function(){
        $(".searchform_page").slideDown(500);
        pet_rescue_lite_Keyboard_loop($('.searchform_page'));
    });

    $('.close a').click(function(){
        $(".searchform_page").slideUp(500);
    });
}); 

// sticky header
(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

})( jQuery );

jQuery(document).ready(function() {
	var owl = jQuery('#product-slide .owl-carousel');
		owl.owlCarousel({
			nav: true,
			autoplay:false,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
			navText : ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
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
	})
});
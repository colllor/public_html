// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup').fadeIn();
	    } else {
	        jQuery('.scrollup').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});

	jQuery('.search-show').click(function(){
		jQuery(".searchform-inner").addClass('open');
		jQuery('.searchform-inner').css('visibility','visible');
	});

	jQuery('.close').click(function(){
		jQuery(".searchform-inner").removeClass('open');
		jQuery('.searchform-inner').css('visibility','hidden');
	});
});

// preloader
jQuery(function($){
	setTimeout(function(){
		$("#pre-loader").delay(1000).fadeOut("slow");
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
	var owl = jQuery('#donate-section .owl-carousel');
		owl.owlCarousel({
			nav: true,
			autoplay:false,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
			navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
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

( function( window, document ) {
	
	function animal_wildlife_focus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const animal_wildlife_search = document.querySelector( '.searchform-inner' );

			if ( ! animal_wildlife_search || ! animal_wildlife_search.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...animal_wildlife_search.querySelectorAll( 'input, a, button' )],
				animal_wildlife_lastEl = elements[ elements.length - 1 ],
				animal_wildlife_firstEl = elements[0],
				animal_wildlife_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && animal_wildlife_lastEl === animal_wildlife_activeEl ) {
				e.preventDefault();
				animal_wildlife_firstEl.focus();
			}

			if ( shiftKey && tabKey && animal_wildlife_firstEl === animal_wildlife_activeEl ) {
				e.preventDefault();
				animal_wildlife_lastEl.focus();
			}
		} );
	}

	animal_wildlife_focus_search();
} )( window, document );
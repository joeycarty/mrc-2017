(function($){
	// calculate offsets for elements based on header height
	var $mainNav 				= $('.header-nav-wrapper'),
			$header 				= $('#main-header'),
			$headerHeight		= $header.outerHeight(),
			$scrollTop			= $(window).scrollTop(),
		  $elementOffset	= $header.offset().top,
		  $distance 			= ($elementOffset - $scrollTop),
			$topPadding 		= $distance + $headerHeight,
			$headerOpen 		= false,
			$mobileBreak		= 640,
			$windowWidth		= $(window).width();

	// smooth scroll to just above anchor points
	$(function (){
		$('a[href*="#"]:not([href="#"]):not([href*="popup"])').click(function() {
			if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top-$topPadding
					}, 1000);
					return false;
				}
			}
		});
	});

	// hide main navigation by default so if JS is disabled, 
	// menus are accessible
	$mainNav.css({'display': 'none'});

	function closeMenu(){
		$header.removeClass('header-nav-open');
		$('.header-main-area').css({'height': ''});
		$mainNav.hide();
		$headerOpen = false;
	}
	function openMenu(){
		$header.addClass('header-nav-open');
		// determine menu height
		var $menuHeight = $('.header-nav-wrapper').outerHeight();
		var $logoHeight = $('.header-logo').outerHeight();
		$('.header-main-area').css({'height': $menuHeight + $logoHeight});
		
		$mainNav.show();
		$headerOpen = true;
	}

	// open/close main navigation when triggr is clicked
	$(".trigger-menu-wrapper").click(function(){
		if(!$header.hasClass('header-nav-open')){ openMenu(); }
		else { closeMenu(); }
	});

	// prevents menu from closing when clicke
	$('.header-main-area').click(function(e) {
	    e.stopPropagation(); 
	});

	// if clicked outside of menu & menu's open, close menu
	$('body').click(function() {
		if($headerOpen){
	       closeMenu();
	   }
	});

	// hide menu when scrolling down, show when scrolling up
	var didScroll 		= true,
		lastScrollTop 	= 0,
		delta 			= 25;

	$(window).scroll(function(){
	    didScroll = true;
	});

	setInterval(function() {
	    if (didScroll) {
	        hasScrolled();
	        didScroll = false;
	    }
	}, 250);

	// hide or show header based on scroll direction
	// http://jsfiddle.net/mariusc23/s6mLJ/31/
	function hasScrolled() {
	    var st = $(this).scrollTop();
	    
	    // Make sure they scroll more than delta
	    if(Math.abs(lastScrollTop - st) <= delta){ return; }
	    
	    if (st > lastScrollTop && st > $headerHeight){  // Scroll Down
	        $header.removeClass('nav-down, header-nav-open').addClass('nav-up');
	        closeMenu();
	    } else { // Scroll Up
	        if(st + $(window).height() < $(document).height()) {
	            $header.removeClass('nav-up').addClass('nav-down');
	        }
	    }
	    lastScrollTop = st;
	}

	// adds class for styling input labels
	// when focused or filled
	$('form input, form textarea, form select').focus(function(){
		var $currentInputWrapper = $(this).parent().parent();
		$currentInputWrapper.addClass('input-filled');
	});

	// when input is no longer in focus, check if theres a value
	$('form input, form textarea, form select').blur(function(){
		var $currentInput = $(this);
		var $currentInputWrapper = $currentInput.parent().parent();

		if($currentInput.length === 0 || $currentInput.val() === ''){
			$currentInputWrapper.removeClass('input-filled');
		}
	});

	// toggle form/intro to start a project with form or file
	$('.form-selector a').click(function(){
		$('.form-selector').toggleClass('display-none');	// toggle form selector intros
		$('.select-form').toggleClass('display-none');		// toggle Start a Project forms
	});

	// toggle project list viewing
	$('#toggle-view a').click(function(){
		$('#toggle-view i').toggleClass('display-none'); 	// change icon
		$('.projects').toggleClass('client-list'); 			// toggle view type class
	});

	// parallax-ing shat
	// https://github.com/mmkjony/enllax.js
	// default ratio is -.05
	if($windowWidth > $mobileBreak){
		$('h2.undent, .hero .mrc-logo').enllax();
		$('.featured-project-preview .project-text').enllax({
			ratio: -0.08,
			offset: 10,
		});
		$('.featured-project-preview .project-thumbnail').enllax({
			ratio: 0.06,
			offset: -5,
		});
		$('.project-preview .project-thumbnail').enllax({
			ratio: 0.08,
			offset: 0,
		});
	}

	// using Sticky-Kit.js
	// make .side-nav elements sticky within their container
	$('.side-nav').stick_in_parent({
		offset_top: $topPadding,
		sticky_class: 'stuck',
	});

	function sideNavActiveStates(current){
		var $activeSection = $(current).attr('id');
		$('.side-nav li').removeClass('active');
		$('.side-nav a[href*=#' + $activeSection + ']').parent().addClass('active');
	}

	// waypoints for .side-nav active states when scrolling down
	$('.side-nav-follow').waypoint(function(direction){
		if(direction === 'down'){
			sideNavActiveStates(this.element);
		}
	}, { 
		offset: function() { return $topPadding+1; }
	});

	// waypoints for .side-nav active states when scrolling up
	$('.side-nav-follow').waypoint(function(direction){
		if(direction === 'up'){
			sideNavActiveStates(this.element);
		}
	}, {
		offset: function() { return -$topPadding; }
	});

	// Featherlight popup settings
	// https://github.com/noelboss/featherlight
	$.featherlight.defaults.closeIcon = 'close';
	$('.popup-gallery').featherlightGallery({
	    previousIcon: 'Newer',
	    nextIcon: 'Older',
	    galleryFadeIn: 0,
	    galleryFadeOut: 500, 
	    openSpeed: 500,
	});

})(jQuery);
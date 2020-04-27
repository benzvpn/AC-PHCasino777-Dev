(function($){

	'use strict';

	// Variables

	var window_width = $(window).width();
	var pageUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);


	
	/**********************
	*Mobile Menu Activatin
	***********************/ 

	var mainMenuNav = $('.main-navigation');
	mainMenuNav.meanmenu({
	    meanScreenWidth: '991',
	    meanMenuContainer: '.mobile-menu',
	    meanMenuClose: '<span class="menu-close"></span>',
	    meanMenuOpen: '<span class="menu-bar"></span>',
	    meanRevealPosition: 'right',
	    meanMenuCloseSize: '0',
	});

	/**********************
	*Verical Menu Expand
	***********************/ 

	function verticalMenuExpand(){
		$('.vertical-has-children > a').on('click', function(e){
			e.preventDefault();
			$(this).toggleClass('menu-open');
			$(this).siblings('.sub-menu').slideToggle('slow');
		})
	}
	
	$('#verticalHeader').slimScroll({
		alwaysVisible: true,
		railVisible: true,
		railColor: '#343434'
	});
	$('#miniCart').slimScroll({
		alwaysVisible: false,
		railVisible: true,
		railColor: '#343434'
	});

	function sideNavExpand(){
		$('.sidenav-open').on('click', function(e){
			e.preventDefault();
			$('.vertiacl-header-wrapper').addClass('nav-expand');
			$('.sidenav-close').toggleClass('expand');
		});	
		$('.sidenav-close').on('click', function(e){
			e.preventDefault();
			$(this).removeClass('expand');
			$('.vertiacl-header-wrapper').removeClass('nav-expand');
		});
	}

	


	/**********************
	*Adding Slide effect to dropdown
	***********************/ 

	function dropdownAnimation(){
		$('.dropdown').on('show.bs.dropdown', function(e){
		  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(500);
		});

		$('.dropdown').on('hide.bs.dropdown', function(e){
		  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(500);
		});		
	}




	/**********************
	*Homepage Slider Activation
	***********************/
	var homeSlider = $('.homepage-slider');
    homeSlider.on('init', function(e, slick) {
        var $firstAnimatingElements = $('div.single-slider').find('[data-animation]');
        doAnimations($firstAnimatingElements);  
    });
	homeSlider.slick({
		slidesToShow: 1,
		dots: true,
		autoplay: true,
		autoplaySpeed: 5000,
		prevArrow: '<i class="fa fa-angle-left slick-btn slick-prev"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-btn slick-next"></i>',
	});
    homeSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('div.single-slider[data-slick-index="' + nextSlide + '"]')
        .find('[data-animation]');
        doAnimations($animatingElements);  
    });
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationDuration = $this.data('duration');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                'animation-duration': $animationDuration,
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
        });
    }

	/**********************
	*Homepage Static Slider Activation
	***********************/
	
	$('.static-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: false,
		responsive: [{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3
					
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});







	$('.product-tab__link').on('click', function(){
		var parent = $(this).parent('.product-tab__item');
		parent.addClass('active');
		parent.siblings().removeClass('active');
	});



	/**********************
	* Sticky Header
	***********************/

	function stickyHeader(){
		$(window).on('scroll', function(){
			var headerHeight = $('.header')[0].getBoundingClientRect().height;
		    if ($(window).scrollTop() >= headerHeight) {
		        $('.fixed-header').addClass('sticky-header');
		    }
		    else {
		        $('.fixed-header').removeClass('sticky-header');
		    }
		});		
	}


	
	var updateTime = function() {
		document.getElementById("timenow")
		.innerHTML = moment().format('L HH:mm:ss');
	}
	setInterval(updateTime, 1000);

	/**********************
	*Initialization 
	***********************/
	
	dropdownAnimation();
	scrollToTop();
	stickyHeader();
	sideNavExpand();

})(jQuery);
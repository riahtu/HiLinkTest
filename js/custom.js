$(document).ready(function(){ 

		/*********** Nav menu ***************/
		$('.nav-icon').click(function(){
			$('.menu_nav_box').toggleClass('canvas-menu');
			return false;
		});
		
		 $('.scrolldown').on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
		});
		$(".banner-slider").owlCarousel({
			loop:true,
			autoplay:true,
			autoplayTimeout:3000,
			// smartSpeed:250,
			nav:true,
			dots:false,
			center:true,
			responsive:{
				0:{
					items:1
				},
			}

		});
		$(".programs-banner-slider").owlCarousel({
			loop:true,
			autoplay:true,
			autoplayTimeout:3000,
			// smartSpeed:250,
			nav:false,
			dots:true,
			center:true,
			responsive:{
				0:{
					items:1
				},
			}

		});	
		$( "#tabs" ).tabs();
});
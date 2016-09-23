$(function(){
	
	$('#slider_wrap').mobilyslider({
		content: '#da-slider',
		children: 'div',
		transition: 'fade',
		animationSpeed: 600,
		autoplay: false,
		autoplaySpeed: 6000,
		pauseOnHover: false,
		bullets: false,
		arrows: true,
		arrowsHide: false,
		prev: 'prev',
		next: 'next',
		animationStart: function(){},
		animationComplete: function(){}
	});
	
});
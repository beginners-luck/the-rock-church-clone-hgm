$(document).ready(function(){
	//Attach FastClick to eliminate delays for taps on mobile devices.
	FastClick.attach(document.body);
	
	//Hide any transitions from appearing before the page completely loads. 
	$(window).load(function() {
	  $("body").removeAttr('id');
	}); 
	
	/*//Page animations
	$(".animsition").animsition({
		inClass: 'fade-in',
		outClass: 'fade-out',
		inDuration: 1400,
		outDuration: 1000,
		linkElement: '.animsition-link',
		// e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
		loading: true,
		loadingParentElement: 'html', //animsition wrapper element
		loadingClass: 'animsition-loading',
		loadingInner: '<img src="' + window.location.protocol + "//" + window.location.host + '/wp-content/themes/tcc/images/loading.svg" />', // e.g '<img src="loading.svg" />'
		timeout: false,
		timeoutCountdown: 5000,
		onLoadEvent: true,
		browser: [ 'animation-duration', '-webkit-animation-duration'],
		overlay : false,
		overlayClass : 'animsition-overlay-slide',
		overlayParentElement : 'body',
		transition: function(url){ window.location.href = url; }
	});*/	
	
	//Lazy load image setup...
	lazyLoad = new LazyLoad({
		elements_selector: '.lazy'
	});
});
//charts
jQuery(document).ready(function () {
	
	$("#windChart").fancybox({
		'width' : 850,
		'height' : 450,
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'type' : 'iframe'
	});
	$("#tempChart").fancybox({
		'width' : 850,
		'height' : 450,
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'type' : 'iframe'
	});

});

//h2h sliders
$(document).ready(function () {
	
	$('#sliderH2Hcur, #sliderH2Hfor_1, #sliderH2Hfor_2, #sliderH2Hfor_3, #sliderH2Hfor_4, #sliderH2Hfor_5, #sliderH2Hfor_6, #sliderH2Hfor_7, #sliderH2Hfor_8, #sliderH2Hfor_9, #sliderH2Hfor_10').tinycarousel({
		pager : true,
		duration : 300
	});
	
});


//city map
jQuery(document).ready(function () {

	$("#cityMap").fancybox({
		'width' : 850,
		'height' : 500,
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'type' : 'iframe'
	});
});


//alert window - new in version 1.4
jQuery(document).ready(function () {

	$("#alertMessage").fancybox({
		'width' : 700,
		'height' : '80%',
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'type' : 'iframe'
	});
});
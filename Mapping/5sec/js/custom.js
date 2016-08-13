jQuery(document).ready(function($){
//$("html").removeClass("no-js").addClass("js");

/*----------------------------------------------------------*/
/* # BACK TOP */
/*----------------------------------------------------------*/
$(function(){
	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			$('.back-top').removeClass('downscaled');
		} else {
			$('.back-top').addClass('downscaled');
		}
	});
	$('.back-top').click(function(){
			$('body,html').animate({ scrollTop: 0 }, 800);

	});
});
 
/*----------------------------------------------------------*/
/* # NAVIGATION */
/*----------------------------------------------------------*/
//$('.header').waypoint('sticky', { offset: -1 });

//var docTop = $(window).scrollTop();
//if(docTop != 0){ $('.header').addClass('stuck');}

// Cache selectors
var topMenu = $(".header"),
    topMenuHeight = topMenu.outerHeight()+15,
    menuItems = topMenu.find("a").not('.external-link'),
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind to scroll
$(window).scroll(function(){
   var fromTop = $(this).scrollTop()+topMenuHeight;
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   menuItems
     .parent().removeClass("active")
     .end().filter("[href=#"+id+"]").parent().addClass("active");
})

// Scroll to section
menuItems.click(function(e){
	var href = $(this).attr("href"),
			offsetTop = href === "#" ? 0 : $(href).offset().top-topMenu.outerHeight()+1+42;
	$('html, body').stop().animate({ scrollTop: offsetTop }, 800);
	e.preventDefault();

});

// Mobile nav
$(".mobile-menu").click(function(){
	$(".menu").slideToggle(400);
});


/*----------------------------------------------------------*/
/* # PARALLAX & SCROLL */
/*----------------------------------------------------------*/

var w = $(window).width();
	if(w > 960){
	$('.slider').parallax("50%", -0.3);
	$('.testimonials').parallax("50%", -0.3);
	$('.twitter-feed').parallax("50%", -0.2);
	$('.call-to-action').parallax("50%", -0.2);
	$('.zoomer-bg').parallax("50%", -0.6);
}

$('html').niceScroll({
	horizrailenabled: false,
	autohidemode: false
});


/*----------------------------------------------------------*/
/* # SHOTS & LIGHTBOX */
/*----------------------------------------------------------*/
$(function(){
	var lb = $('.lightbox'),
		lbOverlay = $('.lightbox-overlay'),
		lbClose = $('.lightbox-close');

	$('.screenshot').click(function(){
		lbOverlay.removeClass('fadeOutUpBig').show();
		lb.removeClass('fadeOutDownBig').show();
		var lbImage = $(this).children('img').attr('src');
		var lbImageStr = lbImage.replace('-220x220','');
		lb.children('img').attr('src', lbImageStr);
	});

	lbClose.click(function(){
		lbOverlay.hide();
		lb.hide();
	});
});

// footer tipsy
$('.item-thumbs img').tipsy({containerClass: 'tipsy2', gravity: 's', html: true, title: function() { return '<div style="min-width: 590px; min-height: 305px;"><img src="' + this.getAttribute('original-title') + '" /></div>'; }});

});
//<jQuery positioning>
jQuery.fn.horizontal_center = function(parent) {
    if (parent.is('body')) {
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    } else {
        this.css("left", Math.max(0, ((parent.width() - $(this).outerWidth()) / 2) + parent.scrollLeft()) + "px");
    }
}
jQuery.fn.horizontal_left = function() {
    this.css("left", "0px");
}
jQuery.fn.horizontal_right = function() {
    this.css("right", "0px");
}

jQuery.fn.vertical_middle = function(parent) {
    if (parent.is('body')) {
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    } else {
        this.css("top", Math.max(0, ((parent.height() - $(this).outerHeight()) / 2) + parent.scrollTop()) + "px");
    }
}
jQuery.fn.vertical_top = function() {
    this.css("top", "0px");
}
jQuery.fn.horizontal_bottom = function() {
    this.css("bottom", "0px");
}
//</jQuery positioning>

jQuery.fn.sidebar = function(options) {
    //<calculate the maximum z-index on the page>
    var maxZindex = Math.max.apply(null, $.map($('body > *'), function(e, n) {
        return parseInt($(e).css('z-index')) || 1;
    }));
    //</calculate the maximum z-index on the page>

    //<default options>
    var settings = $.extend({
        //These are the defaults
        position: "absolute",
        direction: "left-right",
        positionHorizontal: "center", //enabled if direction is top-down or bottom-up; values: left,center,right
        positionVertical: "top", //enabled if direction is left-right or right-left; values: top,middle,bottom
        easingIn: 'swing',
        easingOut: 'swing',
        animationInDuration: 500,
        animationOutDuration: 100,
        delayIn: 0,
        delayOut: 0,
        reveal: 50,
        refreshOnWindowResize: true,
        zIndex: maxZindex
    }, options);
    //</default options>

    var sidebar = this;
    var parent = sidebar.parent();

    if (parent.is('body')) {
        settings.position = 'fixed';
    }

    sidebar.css('position', settings.position); //fixed,absolute
    sidebar.css('z-index', settings.zIndex); //fixed,absolute
    sidebar.show();

    sidebar.position = function() {
        if (settings.direction == 'top-down' || settings.direction == 'bottom-up') {
            switch (settings.positionHorizontal) {
                case "left":
                    sidebar.horizontal_left();
                    break;
                case "center":
                    sidebar.horizontal_center(parent);
                    break;
                case "right":
                    sidebar.horizontal_right();
                    break;
            }
        } else {
            switch (settings.positionVertical) {
                case "top":
                    sidebar.vertical_top();
                    break;
                case "middle":
                    sidebar.vertical_middle(parent);
                    break;
                case "bottom":
                    sidebar.vertical_bottom();
                    break;
            }
        }
    }

    var options_in = {};
    var options_out = {};

    switch (settings.direction) {
        case "left-right":
            sidebar.css('left', settings.reveal - sidebar.outerWidth());

            options_in['left'] = '0px';
            options_out['left'] = settings.reveal - sidebar.outerWidth() + 'px';
            break;
        case "right-left":
            sidebar.css('right', settings.reveal - sidebar.outerWidth());
            options_in['right'] = '0px';
            options_out['right'] = settings.reveal - sidebar.outerWidth() + 'px';
            break;
        case "top-down":
            sidebar.css('top', settings.reveal - sidebar.outerHeight());
            options_in['top'] = '0px';
            options_out['top'] = settings.reveal - sidebar.outerHeight() + 'px';
            break;
        case "bottom-up":
            sidebar.css('bottom', settings.reveal - sidebar.outerHeight());
            options_in['bottom'] = '0px';
            options_out['bottom'] = settings.reveal - sidebar.outerHeight() + 'px';
            break;
    }

    sidebar.mouseover(function() {
        $(sidebar).stop().delay(settings.delayIn).animate(
            options_in, {
                duration: settings.animationInDuration,
                easing: settings.easingIn
            }
        );
    });

    sidebar.mouseout(function() {
        $(sidebar).stop().delay(settings.delayOut).animate(
            options_out, {
                duration: settings.animationOutDuration,
                easing: settings.easingOut
            });
    });

    sidebar.position();

    if (settings.refreshOnWindowResize) {
        $(window).resize(function() {
            sidebar.position();
        });
    }
};
//Refactoring AJAX to use JS Objects
$(document).ready(function() {
  $("#tour").on("click", "button", function() {
    $.ajax('/photos.html', {
      data: {location: $("#tour").data('location')},
      success: function(response) {
        $('.photos').html(response).fadeIn();
      },
      error: function() {
        $('.photos').html('<li>There was a problem fetching the latest photos. Please try again.</li>');
      },
      timeout: 3000,
      beforeSend: function() {
        $('#tour').addClass('is-fetching');
      },
      complete: function() {
        $('#tour').removeClass('is-fetching');
      }
    });
  });
});


//converts to 
var tour = {
  init: function () {
  	$("#tour").on("click", "button", function() {
    $.ajax('/photos.html', {
      data: {location: $("#tour").data('location')},
      success: function(response) {
        $('.photos').html(response).fadeIn();
      },
      error: function() {
        $('.photos').html('<li>There was a problem fetching the latest photos. Please try again.</li>');
      },
      timeout: 3000,
      beforeSend: function() {
        $('#tour').addClass('is-fetching');
      },
      complete: function() {
        $('#tour').removeClass('is-fetching');
      }
    });
  });
  }
};
$(document).ready(function() {
  tour.init();
});

var tour = {
  init: function() {
    $("#tour").on("click", "button",this.fetchPhotos );
  },
  fetchPhotos: function() { 
      $.ajax('/photos.html', {
        data: {location: $("#tour").data('location')},
        success: function(response) {
          $('.photos').html(response).fadeIn();
        },
        error: function() {
          $('.photos').html('<li>There was a problem fetching the latest photos. Please try again.</li>');
        },
        timeout: 3000,
        beforeSend: function() {
          $('#tour').addClass('is-fetching');
        },
        complete: function() {
          $('#tour').removeClass('is-fetching');
        }
      });
    }
}
$(document).ready(function() { 
  tour.init();
});




function Tour(el) {
	console.log(el);
}

$(document).ready(function(){
	var tour = new Tour($('#paris'));
});



function Tour(el) {
  this.el = el;
  this.fetchPhotos = function(){}
  this.el.on('click', 'button',  this.fetchPhotos);
}
$(document).ready(function() { 
  var paris = new Tour($('#paris'));
});



function Tour(el) {
  var tour = this;
  this.el = el;
  this.fetchPhotos = function() {
    $.ajax('/photos.html', {
      context: tour,
      data: {location: el.data('location')},
      success: function(response) {
        this.el.find('.photos').html(response).fadeIn();
      },
      error: function() {
        this.el.find('.photos').html('<li>There was a problem fetching the latest photos. Please try again.</li>');
      },
      timeout: 3000,
      beforeSend: function() {
        this.el.addClass('is-fetching');
      },
      complete: function() {
        this.el.removeClass('is-fetching');
      }
    });
  };
  this.el.on('click', 'button', this.fetchPhotos);
}
$(document).ready(function() { 
  var paris = new Tour($('#paris'));
});

//use the below HTML

<div id="paris" data-location="paris">
  <button>Get Paris Photos</button>
  <ul class="photos">

  </ul>
</div>

<div id="london" data-location="london">
  <button>Get London Photos</button>
  <ul class="photos">

  </ul>
</div>



$(document).ready(function() {
  $('form').on('submit', function(event) {
    event.preventDefault();
    $.ajax('/book', {
      type: 'POST',
      data: $('form').serialize(),
      success: function(result){
      	$('.tour').html(result);
      }
    });
  });
});



$(document).ready(function() {
  $('form').on('submit', function(event) {
    event.preventDefault();
    $.ajax('/book', {
      type: 'POST',
      dataType: 'json',
      data: $('form').serialize(),
      success: function(response) {
        var message = $("<p></p>");
        message.append("Destination: " + response.destination + ". ");
        message.append("Price: " + response.price + ". ");
        message.append("Nights: " + response.nights + ". ");
        message.append("Confirmation: " + response.confirmation + ". ");
        $('.tour').html(message);
      }
    });
  });
});



$(document).ready(function(){
  // Get Weather
  $('button').on('show.weather', function() {
    var results = $(this).closest('li').find('.results');
    results.append('<p>Weather: 74&deg;</p>');
    //$(this).off('click.weather');
  });
  
  // Show Photos
  $('button').on('click.photos', function() {
    var tour = $(this).closest('li');
    var results = tour.find('.results');
    results.append('<p><img src="/assets/photos/'+tour.data('loc')+'.jpg" /></p>');
    $(this).off('show.weather');
    $('button').trigger('show.weather');
    
  });
});

//PLUGINS
$.fn.photofy = function() {
    	console.log(this);
    };

$(document).ready(function() {
    $('.tour').photofy();
});


$.fn.photofy = function(e) {
  this.each(function() {
    console.log(this);
  });
}

$(document).ready(function() {
  $('.tour').photofy();
});


$.fn.photofy = function() {
  
  this.each(function() {
    var tour = $(this);
    tour.on('click.photofy', '.see-photos', function(event){
      event.preventDefault();
      tour.addClass('is-showing-photofy')
    });
    console.log(this);
  });
}

$(document).ready(function() {
  $('.tour').photofy();
});


$.fn.photofy = function(options) {
  this.each(function() {
    var show = function(e) {
       e.preventDefault();
       settings.tour
               .addClass('is-showing-photofy')
               .find('.photos')
               .find('li:gt('+(settings.count-1)+')').hide();
     }
    var settings = $.extend({
      count: 3,
      tour: $(this)
    }, options);
     
     settings.tour.on('click.photofy', '.see-photos', show);
  });
}

$(document).ready(function() {
  $('.tour').photofy({ count: 1});
});
<a href="#" class="show-photos">Show All Photos</a>
<ul id="tourprices">
  <li class="tour" data-loc="london,uk">
    London, UK
    <ul class="photos">
      <li><img src="/assets/photos/london.jpg"></li>
      <li><img src="/assets/photos/london.jpg"></li>
      <li><img src="/assets/photos/london.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>

  <li class="tour" data-loc="paris,france">
    Paris, France
    <ul class="photos">
      <li><img src="/assets/photos/paris1.jpg"></li>
      <li><img src="/assets/photos/paris1.jpg"></li>
      <li><img src="/assets/photos/paris1.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>

  <li class="tour" data-loc="New York, NY, USA">
    New York, NY, USA
    <ul class="photos">
      <li><img src="/assets/photos/newyork1.jpg"></li>
      <li><img src="/assets/photos/newyork1.jpg"></li>
      <li><img src="/assets/photos/newyork1.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>
</ul>


*************************
$.fn.photofy = function(options) {
  this.each(function() {
    var show = function(e) {
      e.preventDefault();
      settings.tour
              .addClass('is-showing-photofy')
              .find('.photos')
              .find('li:gt('+(settings.count-1)+')')
              .hide();
    }
    var settings = $.extend({
      count: 3,
      tour: $(this)
    }, options);
    var remove = function(e) {
      e.preventDefault();
      settings.tour.fadeOut().off('.photofy');
    }
    settings.tour.on('click.photofy', '.see-photos', show);
    settings.tour.on('show.photofy', show);
    settings.tour.on('click.photofy', '.hide-tour', remove);
    
  });
}

$(document).ready(function() {
  $('.tour').photofy({ count: 1});
  
  $('.show-photos').on('click', function(e) {
    e.preventDefault();
    $('.tour').trigger('show.photofy');
  });
});

***********************************
<a href="#" class="show-photos">Show All Photos</a>
<ul id="tourprices">
  <li class="tour" data-loc="london,uk">
    London, UK
    <ul class="photos">
      <li><img src="/assets/photos/london.jpg"></li>
      <li><img src="/assets/photos/london.jpg"></li>
      <li><img src="/assets/photos/london.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>

  <li class="tour" data-loc="paris,france">
    Paris, France
    <ul class="photos">
      <li><img src="/assets/photos/paris1.jpg"></li>
      <li><img src="/assets/photos/paris1.jpg"></li>
      <li><img src="/assets/photos/paris1.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>

  <li class="tour" data-loc="New York, NY, USA">
    New York, NY, USA
    <ul class="photos">
      <li><img src="/assets/photos/newyork1.jpg"></li>
      <li><img src="/assets/photos/newyork1.jpg"></li>
      <li><img src="/assets/photos/newyork1.jpg"></li>
    </ul>
    <a href="#" class="see-photos">See Photos</a>
    <a href="#" class="hide-tour">Hide Tour</a>
  </li>
</ul>
***************************************************









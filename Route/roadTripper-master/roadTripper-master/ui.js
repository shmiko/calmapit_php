var rendererOptions = {
  draggable: true
};
var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);;
var directionsService = new google.maps.DirectionsService();
var geocoder = new google.maps.Geocoder();
var map;
var waypts = [];
var submit = document.getElementById('submit');
var add = document.getElementById('add');
var subtract = document.getElementById('subtract');
var inputa = $("#origin");
var inputb = $("#destination");
var dist = 0;

function calcCost (result) {

  dist = 0;

  var econ = $("#mpg");
  if(econ.val() == "") {
    econ.val("30");
  }

  var vol = $("#vol");
  if(vol.val() == "") {
    vol.val("10");
  }

  var cost = $("#cost");
  if(cost.val() == "") {
    cost.val("3.50");
  }

  for(i = 0; i < result.routes[0].legs.length; i++) {
    dist += result.routes[0].legs[i].distance.value;
  }

  dist = ((dist/1000)*0.621371).toFixed(1);
  var estm = ((dist * cost.val()) / econ.val()).toFixed(2);
  var fuels = ((dist / econ.val()) / vol.val()).toFixed(0);

  $("#estcost").html("Estimated Cost: $" + estm);
  $("#fillups").html("Fuel Stops: ~ " + fuels);
  $("#pdist").html("Distance: " + dist + " mi");
  $("#trip").css("border-color", "black");

  var inter = "<li>" + result.routes[0].legs[0].start_address + "</li>";
  for(i = 0; i < result.routes[0].legs.length; i++) {
    inter += "<li>" + result.routes[0].legs[i].end_address + "</li>";
  }

  $("#trip").html(inter);
}

function geocodeit(input) {
  var obj = geocoder.geocode({'address': input}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      return results[0].geometry.location;
    }
    else {
      alert('Geocode was not successful for the following reason: ' + status);
      return "didn't work";
    }
  });
  return obj;
}


function calcRoute () {
  $("#route").css("visibility", "visible");
  geocoder.geocode({'address': inputa.val()}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      var stpt = results[0].geometry.location;
      geocoder.geocode( {'address': inputb.val()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          var enpt = results[0].geometry.location;
          var request = {
            origin:stpt,
            destination:enpt,
            waypoints: waypts,
            optimizeWaypoints: false,
            travelMode: google.maps.TravelMode.DRIVING
          };
          directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);
              calcCost(response);
            }
          });
        } 
        else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    } 
    else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function initialize() {

  var mapOptions = {
    zoom: 2,
    center: new google.maps.LatLng(35.8, 0)
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);
  directionsDisplay.setMap(map);

  google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
    var leg = directionsDisplay.getDirections().routes[0].legs.length;
    inputa.val(directionsDisplay.getDirections().routes[0].legs[0].start_address);
    inputb.val(directionsDisplay.getDirections().routes[0].legs[leg - 1].end_address);
    if(directionsDisplay.getDirections().routes[0].legs.length > 1) {
      for(i = 0; i < waypts.length; i++) {
        waypts[i] = {location: directionsDisplay.getDirections().routes[0].legs[i + 1].start_address, stopover: true};
      }
    }
    calcCost(directionsDisplay.getDirections());
  });

  google.maps.event.addDomListener(submit, 'click', function() {
    calcRoute();
  });

  google.maps.event.addDomListener(add, 'click', function() {
    if(waypts.length < 8) {
      if(document.getElementById('waypoints').value !== "") {
        var test = geocodeit(document.getElementById('waypoints').value);
        console.log(test);
        waypts.push({location: document.getElementById('waypoints').value,
          stopover: true});
        console.log(waypts);
        if(document.getElementById('destination').value !== "") {
          calcRoute();
        }
      }
      else {}
    }
    else
      alert("Maximum waypoints allowed reached.")
    document.getElementById('waypoints').value = "";
  });

  google.maps.event.addDomListener(subtract, 'click', function() {
    if(waypts.length > 0) {
    waypts.pop();
    console.log(waypts);
    if(document.getElementById('destination').value !== "")
      calcRoute();
    }
    else {}
  });
};

google.maps.event.addDomListener(window, 'load', initialize);
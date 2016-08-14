// (function() {
  'use strict';

  var MYAPIKEY = "AIzaSyBvLNxZkZ9Nn69-QSghPArPGgvHcrYDoS0";
  var clientID = "1077954538494-n7adn1hemab92p21e2h86rusg9vhhtb7.apps.googleusercontent.com";



	var map;

	function initMap() {
		// Constructor creates a new map - only center and zoom are required.
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -33.869831, lng: 151.196872 },
			zoom: 12
		});

        var opera_house = {lat: -33.856159, lng: 151.215256};
        var marker = new google.maps.Marker({
          position: opera_house,
          map: map,
          title: 'Sydney Opera House'
        });
        
        var infowindow = new google.maps.InfoWindow({
        	content: 'The Sydney Opera House is a major tourist attraction on the harbour' + 
        	' with direct view of the Sydney Harbour Bridge'
        });
        marker.addListener('click', function(){
        	//arguments are for the destination map and the anchor point - if you do not use the marker variable you would specify a point.
    		infowindow.open(map, marker);
        });
	}


// }())
// (function() {
  'use strict';

  var MYAPIKEY = "AIzaSyBvLNxZkZ9Nn69-QSghPArPGgvHcrYDoS0";
  var clientID = "1077954538494-n7adn1hemab92p21e2h86rusg9vhhtb7.apps.googleusercontent.com";



	var map;
	function initMap() {
		// Constructor creates a new map - only center and zoom are required.
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 40.7413549, lng: -73.9980244},
			zoom: 13
		});
	}


// }())
// (function() {
  'use strict';

	var MYAPIKEY = "AIzaSyBvLNxZkZ9Nn69-QSghPArPGgvHcrYDoS0";
	var clientID = "1077954538494-n7adn1hemab92p21e2h86rusg9vhhtb7.apps.googleusercontent.com";

	var map;
	var markers = [];

	function initMap() {
        // Constructor creates a new map - only center and zoom are required.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.856159, lng: 151.215256},
          zoom: 13,
          mapTypeControl: false
        });
        // var opera_house = {lat: -33.856159, lng: 151.215256};
        // var oldMarker = new google.maps.Marker({
        //   position: opera_house,
        //   map: map,
        //   title: 'Sydney Opera House'
        // });

        //locations array - usually these would be served up via a database
        var locations = [
        	{title: 'Sydney Opera House', location: {lat: -33.856159, lng: 151.215256}},
        	{title: 'Sydney Harbour Bridge', location: {lat: -33.8523,lng: 151.2108}},
        	{title: 'Botanic Gardens', location: {lat: -33.8642,lng: 151.2166}},
        	{title: 'The Rocks', location: {lat: -33.8599,lng: 151.2090}},
        	{title: 'Glebe', location: {lat: -33.8798,lng: 151.1854}},
        	{title: 'Balmain', location: {lat: -33.8589,lng: 151.1791}}
        ];

        var largeInfowindow = new google.maps.InfoWindow();
        // The following group uses the location array to create an array of markers on initialize.
        for (var i = 0; i < locations.length; i++) {
          // Get the position from the location array.
          var position = locations[i].location;
          var title = locations[i].title;
          // Create a marker per location, and put into markers array.
           var marker = new google.maps.Marker({
            position: position,
            title: title,
            animation: google.maps.Animation.DROP,
            id: i
          });
          // Push the marker to our array of markers.
          markers.push(marker);
          // Create an onclick event to open an infowindow at each marker.
          marker.addListener('click', function() {
            populateInfoWindow(this, largeInfowindow);
          });
        }
        document.getElementById('show-listings').addEventListener('click', showListings);
        document.getElementById('hide-listings').addEventListener('click', hideListings);
      }
      // This function populates the infowindow when the marker is clicked. We'll only allow
      // one infowindow which will open at the marker that is clicked, and populate based
      // on that markers position.
      function populateInfoWindow(marker, infowindow) {
        // Check to make sure the infowindow is not already opened on this marker.
        if (infowindow.marker != marker) {
          infowindow.marker = marker;
          infowindow.setContent('<div>' + marker.title + '</div>');
          infowindow.open(map, marker);
          // Make sure the marker property is cleared if the infowindow is closed.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
        }
      }
      // This function will loop through the markers array and display them all.
      function showListings() {
        var bounds = new google.maps.LatLngBounds();
        // Extend the boundaries of the map for each marker and display the marker
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
          bounds.extend(markers[i].position);
        }
        map.fitBounds(bounds);
      }
      // This function will loop through the listings and hide them all.
      function hideListings() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
      }

// }())
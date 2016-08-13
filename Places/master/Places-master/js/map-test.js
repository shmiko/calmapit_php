/*!
 * PLACES JS Methods
 * Copyright 2013, Andrew Cobley
 */

var mapPath = './assets/map/geography-class_69fa4e.mbtiles';

var map = new L.Map('map',
{
	center: new L.LatLng(40.6681, -111.9364),
	zoom: 4
});

L.TileLayer('http://{s}.tile.cloudmade.com/API-key/997/256/{z}/{x}/{y}.png', {
	attribution: 'Map data &copy; [...]',
	maxZoom: 18
}).addTo(map);





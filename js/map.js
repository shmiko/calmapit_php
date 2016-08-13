function showMap(lat, lng) {
  var latitude = parseFloat(lat);
  var longitude = parseFloat(lng);
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById("map_canvas"));
    map.setCenter(new GLatLng(latitude, longitude), 5);
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());
    var latlng = new GLatLng(latitude, longitude);
    map.addOverlay(new GMarker(latlng));
  }
}

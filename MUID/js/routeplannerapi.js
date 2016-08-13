var latitude = 41.850033;
var longitude = -87.6500523;
var start;
var end;
var adsense = true;
var publisherid = "ca-google-maps_apidocs";
var adformat = "BANNER";
var adposition = "RIGHT_BOTTOM";
var adbackgroundColor = '#c4d4f3';
var adborderColor = '#e5ecf9';
var adtitleColor = '#0000cc';
var adtextColor = '#000000';
var adurlColor = '#009900';
var rendererOptions = {
    draggable: true
};
var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
var directionsService = new google.maps.DirectionsService();
var map;
var adUnit;

function initialize() {
    var centerpoint = new google.maps.LatLng(latitude, longitude);
    var mapOptions = {
        zoom: 7,
        center: centerpoint
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));
    google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
        computeTotalDistance(directionsDisplay.getDirections())
    });
    if (adsense == true) {
        var adUnitDiv = document.createElement('div');
        var adUnitOptions = {
            format: google.maps.adsense.AdFormat[adformat],
            position: google.maps.ControlPosition[adposition],
            backgroundColor: adbackgroundColor,
            borderColor: adborderColor,
            titleColor: adtitleColor,
            textColor: adtextColor,
            urlColor: adurlColor,
            publisherId: publisherid,
            map: map,
            visible: true
        };
        var adUnit = new google.maps.adsense.AdUnit(adUnitDiv, adUnitOptions)
    }
}

function calcRoute() {
    if (isEmpty(start)) {
        start = document.getElementById('start').value
    }
    if (isEmpty(end)) {
        end = document.getElementById('end').value
    }
    var selectedMode = document.getElementById('mode').value;
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode[selectedMode]
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response)
        }
    });
    GenrateShareLink()
}
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center)
});

function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value
    }
    total = total / 1000.0;
    document.getElementById('total').innerHTML = total + ' km'
}

function GenrateShareLink() {
    var start = document.getElementById('start').value;
    var end = document.getElementById('end').value;
    var safestart = start.replace(" ", "+");
    var safeend = end.replace(" ", "+");
    var sharelink = "https://maps.google.com?saddr=" + safestart + "&daddr=" + safeend;
    document.getElementById('share').innerHTML = "<a href='" + sharelink + "' target='_0' class='btn btn-success text-right'><i class='glyphicon glyphicon-link'></i></a>"
}

function isEmpty(str) {
    return (!str || 0 === str.length)
}